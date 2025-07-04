<div>
    <div class="mb-3">
        <input type="text" class="form-control w-25" placeholder="Search" wire:model.live='search'>
    </div>

    <div class="table-responsive text-nowrap">
        @if (count($data) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th width="30%">Name</th>
                        <th width="20%">Category</th>
                        <th width="20%">Image</th>
                        <th width="20%">Gallery</th>
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
                                {{ $record->category?->name }}
                            </td>
                            <td>
                                <img src="{{ asset($record->image) }}" width="50" height="50" class="rounded">
                            </td>
                            <td>
                                @if($record->images->count() > 0)
                                    <div class="d-flex flex-wrap gap-1">
                                        @foreach($record->images->take(3) as $galleryImage)
                                            <img src="{{ asset($galleryImage->image) }}" width="30" height="30" class="rounded">
                                        @endforeach
                                        @if($record->images->count() > 3)
                                            <span class="badge bg-secondary">+{{ $record->images->count() - 3 }}</span>
                                        @endif
                                    </div>
                                @else
                                    <span class="text-muted">No gallery</span>
                                @endif
                            </td>
                            <td>
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#"
                                        wire:click.prevent="$dispatch('projectShow', { id: {{ $record->id }} })">
                                        <i class="bx bx-show me-1"></i>
                                        Show
                                    </a>

                                    <a class="dropdown-item" href="#"
                                        wire:click.prevent="$dispatch('projectUpdate', { id: {{ $record->id }} })">
                                        <i class="bx bx-edit-alt me-1"></i>
                                        Edit
                                    </a>

                                    <a class="dropdown-item" href="#"
                                        wire:click.prevent="$dispatch('projectDelete', { id: {{ $record->id }} })">
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
