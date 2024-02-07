<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Form</title>
</head>
<body>
<h1>Edit Form</h1>
<form action="{{ route('edit.update', $data->id) }}" method="POST">
    @csrf
    @method('POST')
    <label for="column1">Column 1:</label>
    <input type="text" name="column1" value="{{ $data->name }}"><br>

    <label for="column2">Column 2:</label>
    <input type="text" name="column2" value="{{ $data->description }}"><br>


    <button type="submit">Submit</button>
</form>
</body>
</html>
