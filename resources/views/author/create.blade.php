<x-form 
    :fields="[ 
        ['label' => 'Name', 'name' => 'name', 'type' => 'text'],
        ['label' => 'Email', 'name' => 'email', 'type' => 'email'], 
        ['label' => 'Job Description', 'name' => 'job_description', 'type' => 'text'],
        ['label' => 'Bio', 'name' => 'bio', 'type' => 'textarea'],
        ['label' => 'Book', 'name' => 'books_id', 'type' => 'select', 
            'options' => $books->map(fn($a) => ['value' => $a->id, 'label' => $a->name])->toArray()],
        ['label' => 'Author Image', 'name' => 'profile_image', 'type' => 'file']
    ]"
    function="store"
    table="author"
/>
