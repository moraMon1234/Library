<x-form 
    :fields="[ 
        ['label' => '', 'name' => 'id', 'type' => 'hidden', 'value' => $author->id],
        ['label' => 'Name', 'name' => 'name', 'type' => 'text', 'value' => $author->name],
        ['label' => 'Email', 'name' => 'email', 'type' => 'email', 'value' => $author->email],
        ['label' => 'Job Description', 'name' => 'job_description', 'type' => 'textarea', 'value' => $author->job_description],
        ['label' => 'Bio', 'name' => 'bio', 'type' => 'textarea', 'value' => $author->bio],
        ['label' => 'Book', 'name' => 'book_id', 'type' => 'select', 
            'value' => $author->book_id, 
            'options' => $books->map(fn($book) => ['value' => $book->id, 'label' => $book->name])->toArray()
        ],
        [
            'label' => 'Author Image', 
            'name' => 'profile_image', 
            'type' => 'file',
            'image' => $author->profile_image ? asset('storage/images/' . $author->profile_image) : null
        ]
    ]"

    function="update"
    table="author"
/>
