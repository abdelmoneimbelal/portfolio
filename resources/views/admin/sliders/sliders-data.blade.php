<div>
    <div class="mb-3 d-flex gap-3">
        <input type="text" class="form-control w-25" placeholder="Search" wire:model.live='search'>
        <select class="form-select w-25" wire:model.live='status_filter'>
            <option value="all">All Sliders</option>
            <option value="active">Active Only</option>
            <option value="inactive">Inactive Only</option>
        </select>
    </div>

    <div class="table-responsive text-nowrap">
        @if (count($data) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Link</th>
                        <th>Status</th>
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
                                {{ Str::limit($record->description, 50) }}
                            </td>
                            <td>
                                @if($record->image)
                                    <img src="{{ asset($record->image) }}" alt="{{ $record->name }}" width="50" height="50" class="rounded">
                                @else
                                    No Image
                                @endif
                            </td>
                            <td>
                                @if($record->link)
                                    <a href="{{ $record->link }}" target="_blank" class="btn btn-sm btn-outline-primary">View</a>
                                @else
                                    No Link
                                @endif
                            </td>
                            <td>
                                @if((bool) $record->is_active)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#"
                                        wire:click.prevent="$dispatch('sliderUpdate', { id: {{ $record->id }} })">
                                        <i class="bx bx-edit-alt me-1"></i>
                                        Edit
                                    </a>
                                    <a class="dropdown-item" href="#"
                                        wire:click.prevent="$dispatch('sliderDelete', { id: {{ $record->id }} })">
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