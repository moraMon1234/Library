<x-form 
    :fields="[ 
        ['label' => '', 'name' => 'id', 'type' => 'hidden', 'value' => $student->id],
        ['label' => 'Name', 'name' => 'name', 'type' => 'text' , 'value' => $student->name],
        ['label' => 'Email', 'name' => 'email', 'type' => 'email' , 'value' => $student->email], 
        ['label' => 'Phone', 'name' => 'phone', 'type' => 'number' , 'value' => $student->phone]
    ]"
    
    function="update"
    table="student"
/>
