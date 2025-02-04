<div>
    <div class="mb-3">
        <input type="text" class="form-control w-25" placeholder="Search" wire:model.live='search'>
    </div>

    <div class="table-responsive text-nowrap">
        @if (count($data) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th width="50%">Name</th>
                        <th width="20%">Icon</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($data as $record)
                        <tr>
                            <td>
                                <strong>{{ $record->name }}</strong>
                            </td>
                            <td>
                                <strong><i class="{{ $record->icon }} fa-2x text-secondary mb-3"></i></strong>
                            </td>
                            <td>
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#"
                                        wire:click.prevent="$dispatch('serviceShow', { id: {{ $record->id }} })">
                                        <i class="bx bx-show me-1"></i>
                                        Show
                                    </a>
                                    <a class="dropdown-item" href="#"
                                        wire:click.prevent="$dispatch('serviceUpdate', { id: {{ $record->id }} })">
                                        <i class="bx bx-edit-alt me-1"></i>
                                        Edit
                                    </a>
                                    <a class="dropdown-item" href="#"
                                        wire:click.prevent="$dispatch('serviceDelete', { id: {{ $record->id }} })">
                                        <i class="bx bx-trash me-1"></i>
                                        Delete
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $data->links() }}
        @else
            <span class="text-danger">No results found</span>
        @endif
    </div>
</div>
