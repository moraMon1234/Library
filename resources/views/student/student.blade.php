@php
    $columns = [
        ['label' => 'ID', 'field' => 'id'],
        ['label' => 'Name', 'field' => 'name'],
        ['label' => 'Email', 'field' => 'email'],
        ['label' => 'Phone', 'field' => 'phone'],

    ];

    $items = $students ->toArray(); 
@endphp

<x-tables :columns="$columns" :items="$items" table="student" />
