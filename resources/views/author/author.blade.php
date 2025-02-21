@php
    $columns = [
        ['label' => 'ID', 'field' => 'id'],
        ['label' => 'Name', 'field' => 'name'],
        ['label' => 'Email', 'field' => 'email'],
        ['label' => 'Job Description', 'field' => 'job_description'],
        ['label' => 'Bio', 'field' => 'bio'],
        ['label' => 'Book', 'field' => 'book.name'],
        ['label' => 'Image', 'field' => 'profile_image']
    ];

    $items = $authors ->toArray(); 
@endphp

<x-tables :columns="$columns" :items="$items" table="author" />
