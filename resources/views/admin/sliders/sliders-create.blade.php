<x-create-model title="Add New Slider">
    <div class="col-md-12 mb-3">
        <label class="form-label">Name</label>
        <input type="text" class="form-control" placeholder="Name" wire:model='name' />
        @include('admin.error', ['property' => 'name'])
    </div>
    <div class="col-md-12 mb-3">
        <label class="form-label">Description</label>
        <textarea class="form-control" placeholder="Description" wire:model='description' rows="3"></textarea>
        @include('admin.error', ['property' => 'description'])
    </div>
    <div class="col-md-12 mb-3" x-data="{ uploading: false, progress: 0 }" x-on:livewire-upload-start="uploading = true"
        x-on:livewire-upload-finish="uploading = false" x-on:livewire-upload-cancel="uploading = false"
        x-on:livewire-upload-error="uploading = false"
        x-on:livewire-upload-progress="progress = $event.detail.progress">
        <label class="form-label">Image</label>
        <input type="file" class="form-control" wire:model='image' />
        <!-- Progress Bar -->
        <div x-show="uploading">
            <progress max="100" x-bind:value="progress"></progress>
        </div>
        @include('admin.error', ['property' => 'image'])
    </div>
    @if ($image)
        <div class="col-md-12 mb-3">
            <label class="form-label">Image Preview</label>
            <div class="my-2">
                <img src="{{ $image->temporaryUrl() }}" width="150" height="150px" class="rounded">
            </div>
        </div>
    @endif
    <div class="col-md-12 mb-3">
        <label class="form-label">Link</label>
        <input type="url" class="form-control" placeholder="Link" wire:model='link' />
        @include('admin.error', ['property' => 'link'])
    </div>
    <div class="col-md-12 mb-0">
        <label class="form-label d-block">Status</label>
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" wire:model='is_active' id="is_active_create">
            <label class="form-check-label" for="is_active_create">
                <span x-text="$wire.is_active ? 'Active' : 'Inactive'"></span>
            </label>
        </div>
        @include('admin.error', ['property' => 'is_active'])
    </div>
</x-create-model>
