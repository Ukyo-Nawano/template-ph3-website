<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>新規クイズ問題作成</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form method="POST" action="{{ route('admin.store') }}">
        @csrf
        <div class="mb-3">
            <label for="quiz_title" class="form-label">クイズのタイトル</label>
            <input type="text" class="form-control" id="quiz_title" name="name" value="{{ old('name') }}" required>
        </div>
        <button type="submit" class="btn btn-primary">登録</button>
    </form>

</body>

</html>