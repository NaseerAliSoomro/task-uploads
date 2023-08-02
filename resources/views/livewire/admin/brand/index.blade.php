<div>
    <div class="row">
        <div class="card">
            <div class="card-header">
                <button class="btn btn-primary text-white float-end" data-bs-toggle="modal" data-bs-target="#insertBrandModal">
                    Add Brand </button>
            </div>

            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($brands as $brand)
                            <tr>
                                <td>{{ $brand->id }}</td>
                                <td>{{ $brand->name }}</td>
                                <td>{{ $brand->slug }}</td>
                                <td>{{ $brand->status == '1' ? 'Visible' : 'Hidden' }}</td>
                                <td>
                                    <a href="{{ route('brand.show', $brand->id) }}"
                                        class="btn btn-primary btn-sm text-white">View</a>
                                    <a href="{{ route('brand.edit', $brand->id) }}"
                                        class="btn btn-success btn-sm text-white">Edit</a>
                                    <button wire:click="delete({{ $brand->id }})"
                                        class="btn btn-danger btn-sm text-white" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal">Delete</button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">No Record Found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div>
                    {{ $brands->links() }}
                </div>
                {{-- Alternative way to render pagination with Bootstrap 4 styling --}}
                {{-- {{  $categories->links('pagination::bootstrap-4') }} --}}
            </div>
        </div>
    </div>
</div>
@include('livewire.admin.brand.brand_modal')

@push('scripts')
    <script>
        window.addEventListener('close-modal', event => {
            $('#deleteModal').modal('hide');
        });
    </script>
@endpush
