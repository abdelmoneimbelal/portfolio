<x-edit-model title="Add New Project">
    <div class="col-md-6 mb-0">
        <label class="form-label">Name</label>
        <input type="text" class="form-control" placeholder="Name" wire:model='name' />
        @include('admin.error', ['property' => 'name'])
    </div>
    <div class="col-md-6 mb-0">
        <label class="form-label">Link</label>
        <input type="url" class="form-control" placeholder="Link" wire:model='link' />
        @include('admin.error', ['property' => 'link'])
    </div>

    <div class="col-md-6 mb-0 mt-2" x-data="{ uploading: false, progress: 0 }" x-on:livewire-upload-start="uploading = true"
        x-on:livewire-upload-finish="uploading = false" x-on:livewire-upload-cancel="uploading = false"
        x-on:livewire-upload-error="uploading = false"
        x-on:livewire-upload-progress="progress = $event.detail.progress">
        <label class="form-label">Image</label>
        <input type="file" class="form-control" wire:model='image' />
        @include('admin.error', ['property' => 'image'])
    </div>

    <div class="col-md-6 mb-0 mt-2">
        <label class="form-label">Category</label>
        <select class="form-control" wire:model='category_id'>
            <option value="">Select Category</option>
            @if (count($categories) > 0)
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" wire:key="category-{{ $category->id }}">{{ $category->name }}
                    </option>
                @endforeach
            @endif
        </select>
        @include('admin.error', ['property' => 'category_id'])
    </div>

    @if ($image)
        <div class="my-4">
            <img src="{{ $image->temporaryUrl() }}" width="150" height="150" class="rounded">
        </div>
    @endif

    <div class="col-md-12 mb-3 mt-2" x-data="{ uploading: false, progress: 0 }" x-on:livewire-upload-start="uploading = true"
        x-on:livewire-upload-finish="uploading = false" x-on:livewire-upload-cancel="uploading = false"
        x-on:livewire-upload-error="uploading = false"
        x-on:livewire-upload-progress="progress = $event.detail.progress">
        <label class="form-label">Gallery Images (Max 6 images)</label>
        <input type="file" class="form-control" wire:model='gallery_images' multiple />
        <!-- Progress Bar -->
        <div x-show="uploading">
            <progress max="100" x-bind:value="progress"></progress>
        </div>
        <small class="text-muted">You can select multiple images. Maximum 6 images allowed. Leave empty to keep current gallery.</small>
        @include('admin.error', ['property' => 'gallery_images.*'])
    </div>

    @if (!empty($gallery_images))
        <div class="col-md-12 mb-3">
            <label class="form-label">New Gallery Preview</label>
            <div class="row">
                @foreach ($gallery_images as $index => $galleryImage)
                    <div class="col-md-4 mb-2">
                        <img src="{{ $galleryImage->temporaryUrl() }}" width="150" height="150" class="rounded">
                        <small class="d-block text-muted">Image {{ $index + 1 }}</small>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    @if ($project && $project->images->count() > 0)
        <div class="col-md-12 mb-3">
            <label class="form-label">Current Gallery</label>
            <div class="row">
                @foreach ($project->images as $index => $galleryImage)
                    <div class="col-md-4 mb-2">
                        <img src="{{ asset($galleryImage->image) }}" width="150" height="150" class="rounded">
                        <small class="d-block text-muted">Image {{ $index + 1 }}</small>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <div class="col-md-12 mb-0 mt-2">
        <label class="form-label">Description</label>
        <div wire:ignore>
            <textarea id="description2" class="form-control" placeholder="Description"></textarea>
        </div>
        @include('admin.error', ['property' => 'description'])
    </div>
</x-edit-model>

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet">
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>
    <script>
        (function() {
            'use strict';
            
            if (typeof jQuery === 'undefined') {
                console.error('jQuery is required for Summernote');
                return;
            }

            var $ = jQuery;
            var isInitialized = false;

            function initSummernote() {
                var $textarea = $('#description2');
                
                if ($textarea.length && !isInitialized) {
                    // Get description from Livewire
                    var descriptionContent = @this.get('description') || '';
                    
                    // Destroy if exists
                    if ($textarea.summernote) {
                        try {
                            $textarea.summernote('destroy');
                        } catch(e) {}
                    }
                    
                    // Initialize
                    $textarea.summernote({
                        height: 300,
                        toolbar: [
                            ['style', ['style']],
                            ['font', ['bold', 'underline', 'clear', 'italic', 'strikethrough']],
                            ['alignment', ['alignLeft', 'alignCenter', 'alignRight', 'alignJustify']],
                            ['blockquote', ['blockquote']],
                            ['fontname', ['fontname']],
                            ['color', ['color']],
                            ['para', ['ul', 'ol', 'paragraph', 'height', 'lineheight']],
                            ['fontsize', ['fontsize']],
                            ['height', ['height']],
                            ['table', ['table']],
                            ['insert', ['link', 'picture', 'video']],
                            ['view', ['fullscreen', 'codeview', 'help']],
                            ['undo', ['undo', 'redo']]
                        ],
                        callbacks: {
                            onChange: function(contents, $editable) {
                                @this.set('description', contents);
                            }
                        }
                    });
                    
                    // Set content
                    if (descriptionContent) {
                        setTimeout(function() {
                            $textarea.summernote('code', descriptionContent);
                        }, 200);
                    }
                    
                    isInitialized = true;
                }
            }

            function destroySummernote() {
                var $textarea = $('#description2');
                if ($textarea.length && $textarea.summernote) {
                    try {
                        $textarea.summernote('destroy');
                    } catch(e) {}
                    isInitialized = false;
                }
            }

            // When modal is shown
            $(document).on('shown.bs.modal', '#editModal', function() {
                isInitialized = false;
                setTimeout(initSummernote, 400);
            });

            // When modal is hidden
            $(document).on('hidden.bs.modal', '#editModal', function() {
                destroySummernote();
            });

            // When Livewire updates
            document.addEventListener('livewire:init', function() {
                Livewire.hook('morph.updated', ({ el, component }) => {
                    setTimeout(function() {
                        var editModal = document.getElementById('editModal');
                        if (editModal && editModal.classList.contains('show')) {
                            var $textarea = $('#description2');
                            if ($textarea.length) {
                                if (!$textarea.next('.note-editor').length) {
                                    // Not initialized, initialize it
                                    isInitialized = false;
                                    initSummernote();
                                } else {
                                    // Already initialized, just update content if needed
                                    var descriptionContent = @this.get('description') || '';
                                    if (descriptionContent) {
                                        var currentContent = $textarea.summernote('code');
                                        // Only update if different to avoid cursor issues
                                        if (currentContent.trim() !== descriptionContent.trim()) {
                                            $textarea.summernote('code', descriptionContent);
                                        }
                                    }
                                }
                            }
                        }
                    }, 600);
                });
            });
        })();
    </script>
@endpush