<form class="row" wire:submit.prevent='submit'>
    @if (session()->has('message'))
        <div class="alert alert-primary my-success-alert">
            {{ session('message') }}
        </div>
    @endif

    <div class="col-md-6">
        <label class="form-label">Name</label>
        <input type="text" class="form-control" placeholder="Name" wire:model='settings.name' />
        @error('settings.name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-6">
        <label class="form-label">Email</label>
        <input type="text" class="form-control" placeholder="Email" wire:model='settings.email' />
        @error('settings.email')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-6 mt-2">
        <label class="form-label">Address</label>
        <input type="text" class="form-control" placeholder="Address" wire:model='settings.address' />
        @error('settings.address')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-6 mt-2">
        <label class="form-label">Phone</label>
        <input type="text" class="form-control" placeholder="Phone" wire:model='settings.phone' />
        @error('settings.phone')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-6 mt-2">
        <label class="form-label">Facebook</label>
        <input type="text" class="form-control" placeholder="Facebook" wire:model='settings.facebook' />
        @error('settings.facebook')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-6 mt-2">
        <label class="form-label">Twitter</label>
        <input type="text" class="form-control" placeholder="Twitter" wire:model='settings.twitter' />
        @error('settings.twitter')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-6 mt-2">
        <label class="form-label">Linkedin</label>
        <input type="text" class="form-control" placeholder="Linkedin" wire:model='settings.linkedin' />
        @error('settings.linkedin')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-6 mt-2">
        <label class="form-label">Instagram</label>
        <input type="url" class="form-control" placeholder="Instagram" wire:model='settings.instagram' />
        @error('settings.instagram')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-6 mt-2">
        <label class="form-label">Logo</label>
        <input type="file" class="form-control" wire:model='logo' />
        @error('logo')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        @if ($logo)
            <div class="col-md-6 mt-2">
                {{-- <label class="form-label">Logo Preview</label> --}}
                <img src="{{ $logo->temporaryUrl() }}" alt="Logo" width="150" height="150" class="rounded">
            </div>
        @elseif ($settings->logo)
            <div class="col-md-6 mt-2">
                <img src="{{ asset($settings->logo) }}" alt="Logo" width="150" height="150" class="rounded">
            </div>
        @endif
    </div>

    <div class="col-md-6 mt-2">
        <label class="form-label">Favicon</label>
        <input type="file" class="form-control" wire:model='favicon' />
        @error('favicon')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        @if ($favicon)
            <div class="col-md-6 mt-2">
                {{-- <label class="form-label">Favicon Preview</label> --}}
                <img src="{{ $favicon->temporaryUrl() }}" alt="Favicon" width="150" height="150" class="rounded">
            </div>
        @elseif ($settings->favicon)
            <div class="col-md-6 mt-2">
                <img src="{{ asset($settings->favicon) }}" alt="Favicon" width="150" height="150" class="rounded">
            </div>
        @endif
    </div>

    <div class="col-md-6 mt-2">
        <label class="form-label">Description</label>
        <textarea class="form-control" wire:model='settings.description' rows="3"></textarea>
        @error('settings.description')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-12 mt-4">
        <button class="btn btn-primary">@include('admin.loading', ['buttonName' => 'Submit'])</button>
    </div>
</form>