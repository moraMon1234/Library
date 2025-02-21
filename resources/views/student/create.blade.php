<x-form 
    :fields="[ 
        ['label' => 'Name', 'name' => 'name', 'type' => 'text'],
        ['label' => 'Email', 'name' => 'email', 'type' => 'email'], 
        ['label' => 'Phone', 'name' => 'phone', 'type' => 'number']
    ]"
    
    function="store"
    table="student"
/>
