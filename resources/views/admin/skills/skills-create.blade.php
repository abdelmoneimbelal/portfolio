<!-- Modal -->
<div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Add new skill</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent='store'>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-0">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" placeholder="Name" wire:model='skill.name' />
                            @error('skill.name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col mb-0">
                            <label class="form-label">Progress</label>
                            <input type="number" class="form-control" placeholder="10" min="1" max="100"
                                wire:model='skill.progress' />
                            @error('skill.progress')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="bx bx-save"></i> Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
