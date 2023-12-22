<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>Edit Quiz Title</h2>

<form action="{{ route('admin.update', ['quiz' => $quiz]) }}" method="POST">
    @csrf
    @method('patch')

    <label for="name">Quiz Title</label>
    <input type="text" name="name" value="{{ $quiz->name }}" required>

    <button type="submit">Update</button>
</form>
</body>
</html>