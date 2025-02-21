@php
    $columns = [
        ['label' => 'ID', 'field' => 'id'],
        ['label' => 'Name', 'field' => 'name'],
        ['label' => 'Description', 'field' => 'description'],
        ['label' => 'Price', 'field' => 'price'],
        ['label' => 'Author', 'field' => 'author.name'],
        ['label' => 'Student', 'field' => 'student.name'],
        ['label' => 'Image', 'field' => 'image']
    ];

    $items = $books->toArray(); 
@endphp

<x-tables :columns="$columns" :items="$items" table="book" />
