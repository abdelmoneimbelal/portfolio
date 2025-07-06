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
        <textarea class="form-control" wire:model='aboutUs.description' rows="4" placeholder="Description"></textarea>
        @error('aboutUs.description')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-12 mt-2">
        <label class="form-label">Mission</label>
        <textarea class="form-control" wire:model='aboutUs.mission' rows="3" placeholder="Mission"></textarea>
        @error('aboutUs.mission')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-12 mt-2">
        <label class="form-label">Vision</label>
        <textarea class="form-control" wire:model='aboutUs.vision' rows="3" placeholder="Vision"></textarea>
        @error('aboutUs.vision')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-12 mt-2">
        <label class="form-label">Values</label>
        <textarea class="form-control" wire:model='aboutUs.values' rows="3" placeholder="Values"></textarea>
        @error('aboutUs.values')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-12 mt-4">
        <button class="btn btn-primary">@include('admin.loading', ['buttonName' => 'Submit'])</button>
    </div>
</form>

