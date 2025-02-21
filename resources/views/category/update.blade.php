<x-form 
    :fields="[ 
        ['label' => '', 'name' => 'id', 'type' => 'hidden', 'value' => $category->id],
        ['label' => 'Name', 'name' => 'name', 'type' => 'text' , 'value' => $category->name],
        ['label' => 'Description', 'name' => 'description', 'type' => 'text' ,'value' => $category->description]

    ]"
    
    function="update"
    table="category"
/>
