<x-create-model title="Add New Client">
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
        <input type="file" class="form-control" wire:model='image' accept="image/*" />
        @include('admin.error', ['property' => 'image'])
        @if ($image)
            <div class="mt-2">
                <img src="{{ $image->temporaryUrl() }}" alt="Preview" style="width: 100px; height: 100px; object-fit: cover;">
            </div>
        @endif
    </div>
</x-create-model>
