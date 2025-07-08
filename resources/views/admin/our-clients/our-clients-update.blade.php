<x-edit-model title="Edit Client">
    <div class="col-md-12 mb-3">
        <label class="form-label">Name</label>
        <input type="text" class="form-control" placeholder="Client Name" wire:model='name' />
        @include('admin.error', ['property' => 'name'])
    </div>
    <div class="col-md-12 mb-3">
        <label class="form-label">Description</label>
        <textarea class="form-control" placeholder="Client Description" wire:model='description' rows="3"></textarea>
        @include('admin.error', ['property' => 'description'])
    </div>
    <div class="col-md-12 mb-0">
        <label class="form-label">Image</label>
        @if ($current_image)
            <div class="mb-2">
                <p class="text-muted small">Current Image:</p>
                <img src="{{ str_starts_with($current_image, 'storage/') ? Storage::url(str_replace('storage/', '', $current_image)) : asset($current_image) }}" alt="Current" style="width: 100px; height: 100px; object-fit: cover; border-radius: 5px;">
            </div>
        @endif
        <input type="file" class="form-control" wire:model='image' accept="image/*" />
        @include('admin.error', ['property' => 'image'])
        @if ($image)
            <div class="mt-2">
                <p class="text-muted small">New Image Preview:</p>
                <img src="{{ $image->temporaryUrl() }}" alt="Preview" style="width: 100px; height: 100px; object-fit: cover; border-radius: 5px;">
            </div>
        @endif
    </div>
</x-edit-model> 