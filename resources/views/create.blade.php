<x-form 
    :fields="[ 
        ['label' => 'Title', 'name' => 'name', 'type' => 'text'],
        ['label' => 'Description', 'name' => 'description', 'type' => 'textarea'],
        ['label' => 'Price', 'name' => 'price', 'type' => 'number'],
        ['label' => 'Author', 'name' => 'author_id', 'type' => 'select', 'options' => $authors->map(fn($a) => ['value' => $a->id, 'label' => $a->name])->toArray()],
        ['label' => 'Student', 'name' => 'student_id', 'type' => 'select', 'options' => $students->map(fn($s) => ['value' => $s->id, 'label' => $s->name])->toArray()],
        ['label' => 'Categories', 'name' => 'categories', 'type' => 'multiselect', 'options' => $categories->map(fn($c) => ['value' => $c->id, 'label' => $c->name])->toArray()],
        ['label' => 'Book Image', 'name' => 'image', 'type' => 'file']
    ]"
    
    function="store"
    table="book"
/>
