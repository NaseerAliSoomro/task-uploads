<!-- livewire/book-crud.blade.php -->
<div>
    <div>
        <h1>Laravel Livewire CRUD Example</h1>
        <form>
            <input type="text" wire:model="title" placeholder="Title">
            @error('title') <span>{{ $message }}</span> @enderror

            <input type="text" wire:model="author" placeholder="Author">
            @error('author') <span>{{ $message }}</span> @enderror

            <input type="text" wire:model="description" placeholder="Description">
            @error('description') <span>{{ $message }}</span> @enderror

            @if($updateMode)
                <button wire:click.prevent="update()">Update</button>
                <button wire:click.prevent="cancel()">Cancel</button>
            @else
                <button wire:click.prevent="store()">Save</button>
            @endif
        </form>
    </div>

    <div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                <tr>
                    <td>{{ $book->id }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->description }}</td>
                    <td>
                        <button wire:click="edit({{ $book->id }})">Edit</button>
                        <button wire:click="delete({{ $book->id }})">Delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
