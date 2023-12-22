<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Edit 設問</h2>

    <form action="{{ route('admin.questionUpdate', ['question' => $question->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <label for="name">Quiz Title</label>
        <input type="text" name="name" value="{{ $quiz->name }}" required>

        <label for="text">設問</label>
        <input type="text" name="text" value="{{ $question->text }}" required>

        <label for="choices">選択肢</label>
        @foreach ($choices as $choice)
        <input type="text" name="choices[]" value="{{ $choice->text }}" required>
        @endforeach

        <label for="correct_choice">正解選択</label>
        <select name="correct_choice" id="correct_choice">
            @foreach ($question->choices as $choice)
            <option value="{{ $choice->text }}" @if ($choice->text === $question->correct_choice) selected @endif>
                {{ $choice->text }}
            </option>
            @endforeach
        </select>

        <label for="image">画像:</label>
        <input type="file" name="image" id="image">

        <button type="submit">Update</button>
    </form>





</body>

</html>