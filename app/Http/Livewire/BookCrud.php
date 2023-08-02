<?php

// app/Http/Livewire/BookCrud.php
namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Book;

class BookCrud extends Component
{
    public $books, $title, $author, $description, $selected_id;
    public $updateMode = false;

    public function render()
    {
        $this->books = Book::all();
        return view('livewire.book-crud');
    }

    private function resetInputFields(){
        $this->title = '';
        $this->author = '';
        $this->description = '';
    }

    public function store()
    {
        $this->validate([
            'title' => 'required',
            'author' => 'required',
            'description' => 'required',
        ]);

        Book::create([
            'title' => $this->title,
            'author' => $this->author,
            'description' => $this->description
        ]);

        $this->resetInputFields();
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $this->selected_id = $id;
        $this->title = $book->title;
        $this->author = $book->author;
        $this->description = $book->description;
        $this->updateMode = true;
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function update()
    {
        $this->validate([
            'title' => 'required',
            'author' => 'required',
            'description' => 'required',
        ]);

        if ($this->selected_id) {
            $book = Book::find($this->selected_id);
            $book->update([
                'title' => $this->title,
                'author' => $this->author,
                'description' => $this->description
            ]);

            $this->updateMode = false;
            $this->resetInputFields();
        }
    }

    public function delete($id)
    {
        if ($id) {
            Book::where('id', $id)->delete();
        }
    }
}
