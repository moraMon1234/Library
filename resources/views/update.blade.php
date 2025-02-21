<x-form 
    :fields="[ 
        ['label' => '', 'name' => 'id', 'type' => 'hidden', 'value' => $book->id],
        ['label' => 'Title', 'name' => 'name', 'type' => 'text', 'value' => $book->name],
        ['label' => 'Description', 'name' => 'description', 'type' => 'textarea', 'value' => $book->description],
        ['label' => 'Price', 'name' => 'price', 'type' => 'number', 'value' => $book->price],
        ['label' => 'Author', 'name' => 'author_id', 'type' => 'select', 'value' => $book->author_id, 'options' => $authors->map(fn($a) => ['value' => $a->id, 'label' => $a->name])->toArray()],
        ['label' => 'Student', 'name' => 'student_id', 'type' => 'select', 'value' => $book->student_id, 'options' => $students->map(fn($s) => ['value' => $s->id, 'label' => $s->name])->toArray()],
        ['label' => 'Categories', 'name' => 'categories', 'type' => 'multiselect', 'value' => $book->categories->pluck('id')->toArray(), 'options' => $categories->map(fn($c) => ['value' => $c->id, 'label' => $c->name])->toArray()],
        [
            'label' => 'Book Image', 
            'name' => 'image', 
            'type' => 'file',
            'image' => $book->image ? asset('storage/images/'. $book->image) : null
        ]

    ]"

    function="update"
    table="book"
/>
