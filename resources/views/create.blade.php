<!doctype html>
<html lang="en">
    <head>
        <title>Create New Book</title>
        <meta charset="utf-8" />
    </head>

    <body>
        <h1>You Can create a new book</h1>
        <form action="/books/store" method="post">
            @csrf
            <label for="title" >Title:</label>
            <input type="text" name="name">

            <label for="description" >Description:</label>
            <textarea name="description"></textarea>

            <label for="price" >Price:</label>
            <input type="number" name="price">

            <input type="submit" value="Create Book">


        </form>
    </body>
</html>
