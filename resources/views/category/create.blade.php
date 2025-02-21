<x-form 
    :fields="[ 
        ['label' => 'Name', 'name' => 'name', 'type' => 'text'],
        ['label' => 'Description', 'name' => 'description', 'type' => 'text']
    ]"
    
    function="store"
    table="category"
/>
