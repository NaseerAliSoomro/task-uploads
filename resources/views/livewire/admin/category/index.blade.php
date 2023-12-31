<div>
    <!-- Delete Modal -->
    <div wire:ignore class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Category</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="destroyCategory">
                    @csrf
                    <div class="modal-body">
                        <h3 class="text-danger">Are you sure you want to delete?</h3>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @if (session()->has('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('category.create') }}" class="btn btn-primary text-white float-right">Add Category</a>
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
                            @forelse ($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->slug }}</td>
                                    <td>{{ $category->status == '1' ? 'Visible' : 'Hidden' }}</td>
                                    <td>
                                        <a href="{{ route('category.show', $category->id) }}"
                                            class="btn btn-primary btn-sm text-white">View</a>
                                        <a href="{{ route('category.edit', $category->id) }}"
                                            class="btn btn-success btn-sm text-white">Edit</a>
                                        <button wire:click="deleteCategory({{ $category->id }})"
                                            class="btn btn-danger btn-sm text-white" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal">Delete</button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">No Record Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div>
                        {{ $categories->links() }}
                    </div>
                    {{-- Alternative way to render pagination with Bootstrap 4 styling --}}
                    {{-- {{  $categories->links('pagination::bootstrap-4') }} --}}
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        window.addEventListener('close-modal', event => {
            $('#deleteModal').modal('hide');
        });
    </script>
@endpush
