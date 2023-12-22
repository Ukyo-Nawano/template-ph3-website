<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>新規クエスチョン問題作成</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="POST" action="{{ route('admin.questionStore') }}" enctype="multipart/form-data">
    @csrf

    <label for="quiz_id">クイズタイトル:</label>
    <select name="quiz_id" id="quiz_id">
        @foreach ($quizzes as $quiz)
        <option value="{{ $quiz->id }}">{{ $quiz->name }}</option>
        @endforeach
    </select>

    <div class="question-container">
        <label for="text">設問のテキスト:</label>
        <input type="text" class="form-control" name="text" value="{{ old('text') }}" required>

        <label>選択肢:</label>
        <input type="text" name="choices[0]" value="{{ old('choices.0') }}" required>
        <input type="text" name="choices[1]" value="{{ old('choices.1') }}" required>
        <input type="text" name="choices[2]" value="{{ old('choices.2') }}" required>

        <label>正解の選択肢:</label>
        <input type="radio" name="correct_choice" value="0"> 1
        <input type="radio" name="correct_choice" value="1"> 2
        <input type="radio" name="correct_choice" value="2"> 3

        <label for="image">画像:</label>
        <input type="file" name="image" id="image">
    </div>

    <button type="submit" class="btn btn-primary">登録</button>
</form>




</body>

</html>