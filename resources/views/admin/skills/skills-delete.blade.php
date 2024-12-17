<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Delete skill</h5>
                {{-- <h5 class="modal-title" id="exampleModalLabel1">{{ $title }}</h5> --}}
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent='submit'>
                <div class="modal-body">
                    Are you sure you want to delete this record ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary d-flex" data-bs-dismiss="modal">
                      <i class="bx bx-x pe-1"></i>  Close
                    </button>
                    <button type="submit" class="btn btn-outline-danger d-flex">
                       <i class="bx bx-trash pe-1"></i> @include('admin.loading', ['buttonName' => 'Delete'])
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
