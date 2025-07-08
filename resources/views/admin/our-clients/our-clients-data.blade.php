<div>
    <div class="mb-3">
        <input type="text" class="form-control w-25" placeholder="Search" wire:model.live='search'>
    </div>

    <div class="table-responsive text-nowrap">
        @if (count($data) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($data as $record)
                        <tr>
                            <td>
                                @if($record->image)
                                    <img src="{{ asset($record->image) }}" alt="{{ $record->name }}" 
                                         style="width: 50px; height: 50px; object-fit: cover; border-radius: 5px;">
                                @else
                                    <div style="width: 50px; height: 50px; background: #f0f0f0; border-radius: 5px; display: flex; align-items: center; justify-content: center;">
                                        <i class="bx bx-image text-muted"></i>
                                    </div>
                                @endif
                            </td>
                            <td>
                                <strong>{{ $record->name }}</strong>
                            </td>
                            <td>
                                {{ Str::limit($record->description, 50) }}
                            </td>
                            <td>
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#"
                                        wire:click.prevent="$dispatch('ourClientUpdate', { id: {{ $record->id }} })">
                                        <i class="bx bx-edit-alt me-1"></i>
                                        Edit
                                    </a>
                                    <a class="dropdown-item" href="#"
                                        wire:click.prevent="$dispatch('ourClientDelete', { id: {{ $record->id }} })">
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
            <div class="text-center py-4">
                <i class="bx bx-info-circle fs-4 text-muted"></i>
                <p class="text-muted mt-2">No clients found</p>
            </div>
        @endif
    </div>
</div>
