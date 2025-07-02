<x-show-modal title="Show Project">
    <div class="modal-body">
        @if($project)
            <div class="row">
                <!-- Project Image -->
                <div class="col-md-6 mb-3">
                    <div class="card">
                        <div class="card-body text-center">
                            <div class="main-image-container"
                                style="position: relative; overflow: hidden; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.15);">
                                <img src="{{ asset($project->image) }}" alt="{{ $project->name }}" class="img-fluid"
                                    style="max-height: 300px; width: 100%; object-fit: cover; cursor: pointer; transition: transform 0.3s ease;"
                                    onmouseover="this.style.transform='scale(1.02)'"
                                    onmouseout="this.style.transform='scale(1)'"
                                    onclick="openImageModal('{{ asset($project->image) }}', '{{ $project->name }} - Main Image')">
                            </div>
                            <h6 class="mt-3 text-primary">Main Image</h6>
                        </div>
                    </div>
                </div>

                <!-- Project Details -->
                <div class="col-md-6 mb-3">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="mb-0"><i class="bx bx-info-circle me-2"></i>Project Information</h6>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-primary mb-3">{{ $project->name }}</h5>
                            <div class="mb-3">
                                <strong><i class="bx bx-category me-1"></i>Category:</strong>
                                <span class="badge bg-primary ms-2">{{ $project->category?->name ?? 'No Category' }}</span>
                            </div>
                            @if($project->link)
                                <div class="mb-3">
                                    <strong><i class="bx bx-link me-1"></i>Link:</strong>
                                    <a href="{{ $project->link }}" target="_blank" class="text-primary ms-2">
                                        <i class="bx bx-external-link"></i> {{ $project->link }}
                                    </a>
                                </div>
                            @endif
                            <div class="mb-2">
                                <strong><i class="bx bx-calendar-plus me-1"></i>Created:</strong>
                                <span class="text-muted ms-2">{{ $project->created_at->format('M d, Y H:i') }}</span>
                            </div>
                            <div class="mb-2">
                                <strong><i class="bx bx-calendar-check me-1"></i>Updated:</strong>
                                <span class="text-muted ms-2">{{ $project->updated_at->format('M d, Y H:i') }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Project Description -->
                <div class="col-12 mb-3">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="mb-0"><i class="bx bx-file-text me-2"></i>Description</h6>
                        </div>
                        <div class="card-body">
                            <p class="mb-0" style="line-height: 1.6; color: #555;">{{ $project->description }}</p>
                        </div>
                    </div>
                </div>

                <!-- Gallery Images -->
                @if($project->images->count() > 0)
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0"><i class="bx bx-images me-2"></i>Gallery Images
                                    ({{ $project->images->count() }} images)</h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    @foreach($project->images as $index => $galleryImage)
                                        <div class="col-md-4 col-sm-6 mb-3">
                                            <div class="text-center">
                                                <div class="gallery-item"
                                                    style="position: relative; overflow: hidden; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                                                    <img src="{{ asset($galleryImage->image) }}"
                                                        alt="Gallery Image {{ $index + 1 }}" class="img-fluid"
                                                        style="max-height: 200px; width: 100%; object-fit: cover; cursor: pointer; transition: transform 0.3s ease;"
                                                        onmouseover="this.style.transform='scale(1.05)'"
                                                        onmouseout="this.style.transform='scale(1)'"
                                                        onclick="openImageModal('{{ asset($galleryImage->image) }}', '{{ $project->name }} - Image {{ $index + 1 }}')">
                                                    <div class="gallery-overlay"
                                                        style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0,0,0,0.5); opacity: 0; transition: opacity 0.3s ease; display: flex; align-items: center; justify-content: center;">
                                                        <i class="bx bx-zoom-in text-white" style="font-size: 2rem;"></i>
                                                    </div>
                                                </div>
                                                <small class="d-block text-muted mt-2">Image {{ $index + 1 }}</small>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-12">
                        <div class="alert alert-info text-center">
                            <i class="bx bx-image me-2"></i>
                            No gallery images available for this project.
                        </div>
                    </div>
                @endif
            </div>
        @else
            <div class="text-center">
                <div class="spinner-border" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        @endif
    </div>
</x-show-modal>