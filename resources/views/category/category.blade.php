@php
    $columns = [
        ['label' => 'ID', 'field' => 'id'],
        ['label' => 'Name', 'field' => 'name'],
        ['label' => 'Description', 'field' => 'description'],
    ];

    $items = $categories ->toArray(); 
@endphp

<x-tables :columns="$columns" :items="$items" table="category" />
