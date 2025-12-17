<form class="row" wire:submit.prevent='submit'>
    @if (session()->has('message'))
        <div class="alert alert-primary my-success-alert">
            {{ session('message') }}
        </div>
    @endif

    <div class="col-md-6">
        <label class="form-label">Title</label>
        <input type="text" class="form-control" placeholder="Title" wire:model='aboutUs.title' />
        @error('aboutUs.title')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    
    <div class="col-md-6 mt-2">
        <label class="form-label">Years of Experience</label>
        <input type="number" class="form-control" placeholder="Years of Experience" wire:model='aboutUs.years_experience' />
        @error('aboutUs.years_experience')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    
    <div class="col-md-6 mt-2">
        <label class="form-label">Projects Completed</label>
        <input type="number" class="form-control" placeholder="Projects Completed" wire:model='aboutUs.projects_completed' />
        @error('aboutUs.projects_completed')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    
    <div class="col-md-6 mt-2">
        <label class="form-label">Happy Clients</label>
        <input type="number" class="form-control" placeholder="Happy Clients" wire:model='aboutUs.happy_clients' />
        @error('aboutUs.happy_clients')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-6 mt-2">
        <label class="form-label">Image</label>
        <input type="file" class="form-control" wire:model='image' />
        @error('image')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        @if ($image)
            <div class="col-md-6 mt-2">
                <img src="{{ $image->temporaryUrl() }}" alt="Image" width="150" height="150" class="rounded">
            </div>
        @elseif ($aboutUs->image)
            <div class="col-md-6 mt-2">
                <img src="{{ asset($aboutUs->image) }}" alt="Image" width="150" height="150" class="rounded">
            </div>
        @endif
    </div>

    <div class="col-md-6 mt-2">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" wire:model='aboutUs.is_active' id="is_active">
            <label class="form-check-label" for="is_active">
                Is Active
            </label>
        </div>
        @error('aboutUs.is_active')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-12 mt-2">
        <label class="form-label">Description</label>
        <div wire:ignore>
            <textarea id="description" class="form-control" placeholder="Description"></textarea>
        </div>
        @error('aboutUs.description')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-12 mt-2">
        <label class="form-label">Mission</label>
        <div wire:ignore>
            <textarea id="mission" class="form-control" placeholder="Mission"></textarea>
        </div>
        @error('aboutUs.mission')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-12 mt-2">
        <label class="form-label">Vision</label>
        <div wire:ignore>
            <textarea id="vision" class="form-control" placeholder="Vision"></textarea>
        </div>
        @error('aboutUs.vision')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-12 mt-2">
        <label class="form-label">Values</label>
        <div wire:ignore>
            <textarea id="values" class="form-control" placeholder="Values"></textarea>
        </div>
        @error('aboutUs.values')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-12 mt-4">
        <button class="btn btn-primary">@include('admin.loading', ['buttonName' => 'Submit'])</button>
    </div>
</form>

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
            var editors = {
                description: false,
                mission: false,
                vision: false,
                values: false
            };

            function initSummernote(editorId, propertyName) {
                var $textarea = $('#' + editorId);
                
                if ($textarea.length && !editors[editorId]) {
                    // Get content from Livewire
                    var content = @this.get('aboutUs.' + propertyName) || '';
                    
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
                                // Use debounce to avoid too many updates
                                clearTimeout(window.summernoteTimeout);
                                window.summernoteTimeout = setTimeout(function() {
                                    @this.set('aboutUs.' + propertyName, contents);
                                }, 300);
                            }
                        }
                    });
                    
                    // Set content
                    if (content) {
                        setTimeout(function() {
                            $textarea.summernote('code', content);
                        }, 200);
                    }
                    
                    editors[editorId] = true;
                }
            }

            function destroySummernote(editorId) {
                var $textarea = $('#' + editorId);
                if ($textarea.length && $textarea.summernote) {
                    try {
                        $textarea.summernote('destroy');
                    } catch(e) {}
                    editors[editorId] = false;
                }
            }

            function initAllEditors() {
                initSummernote('description', 'description');
                initSummernote('mission', 'mission');
                initSummernote('vision', 'vision');
                initSummernote('values', 'values');
            }

            function destroyAllEditors() {
                destroySummernote('description');
                destroySummernote('mission');
                destroySummernote('vision');
                destroySummernote('values');
            }

            // Initialize when page loads
            $(document).ready(function() {
                setTimeout(initAllEditors, 400);
            });

            // When Livewire updates
            document.addEventListener('livewire:init', function() {
                Livewire.hook('morph.updated', ({ el, component }) => {
                    setTimeout(function() {
                        // Reinitialize editors if needed
                        var $description = $('#description');
                        var $mission = $('#mission');
                        var $vision = $('#vision');
                        var $values = $('#values');
                        
                        if ($description.length && !$description.next('.note-editor').length) {
                            editors.description = false;
                            initSummernote('description', 'description');
                        }
                        if ($mission.length && !$mission.next('.note-editor').length) {
                            editors.mission = false;
                            initSummernote('mission', 'mission');
                        }
                        if ($vision.length && !$vision.next('.note-editor').length) {
                            editors.vision = false;
                            initSummernote('vision', 'vision');
                        }
                        if ($values.length && !$values.next('.note-editor').length) {
                            editors.values = false;
                            initSummernote('values', 'values');
                        }
                        
                        // Update content if changed from Livewire
                        var descriptionContent = @this.get('aboutUs.description') || '';
                        var missionContent = @this.get('aboutUs.mission') || '';
                        var visionContent = @this.get('aboutUs.vision') || '';
                        var valuesContent = @this.get('aboutUs.values') || '';
                        
                        if ($description.summernote && descriptionContent) {
                            var currentDesc = $description.summernote('code');
                            if (currentDesc.trim() !== descriptionContent.trim()) {
                                $description.summernote('code', descriptionContent);
                            }
                        }
                        if ($mission.summernote && missionContent) {
                            var currentMission = $mission.summernote('code');
                            if (currentMission.trim() !== missionContent.trim()) {
                                $mission.summernote('code', missionContent);
                            }
                        }
                        if ($vision.summernote && visionContent) {
                            var currentVision = $vision.summernote('code');
                            if (currentVision.trim() !== visionContent.trim()) {
                                $vision.summernote('code', visionContent);
                            }
                        }
                        if ($values.summernote && valuesContent) {
                            var currentValues = $values.summernote('code');
                            if (currentValues.trim() !== valuesContent.trim()) {
                                $values.summernote('code', valuesContent);
                            }
                        }
                    }, 600);
                });
            });
        })();
    </script>
@endpush
