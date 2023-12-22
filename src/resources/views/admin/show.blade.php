<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/reset.css">
    <!-- <link rel="stylesheet" href="./css/quiz.css"> -->
    <link rel="stylesheet" href="{{ asset('css/quiz.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700&family=Plus+Jakarta+Sans:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    <h1>{{ $quiz->name }}</h1>

    <h2>クイズ設問一覧</h2>
    <h3>
        <a href="{{ route('admin.questionCreate') }}">新規作成</a>
    </h3>
    @foreach ($questions as $question)
    @if ($question->trashed())
            <span class="text-gray-500">{{ $question->text }}(削除済み)</span>
            @else
            @endif
    @endforeach

    <main class="main">
        @foreach ($questions as $question)
        <div class="route">
            @if ($question->trashed())
            <span class="text-gray-500">{{ $question->text }}(削除済み)</span>
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @else
            <a href="{{ route('admin.questionEdit', ['id' => $question->id]) }}">編集</a>
            <button id="delete_question_modal_open" class="delete_question_modal_open" data-question-id="{{ $question->id }}">削除</button>
            @endif
        </div>
        <div class="quiz" id="quiz">
            <div class="quiz_all">


                <!-- ここからmodalページ -->
                <div id="modalOverlay"></div>
                <div class="modalMain" id="modalMain">
                    <div class="modalFlex">
                        <div class="modalCloseButton">
                            <button type="button" class="closeButton">
                                <div class="close" id="close">×</div>
                            </button>
                        </div>
                        <div class="modal_body">
                            本当に削除しますか？
                        </div>
                    </div>
                    <form action="{{('admin.questionDestroy')}}" method="POST" id="delete_question_form">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="postButton modalPostButton delete_complete_button" id="delete_complete_button">削除</button>
                    </form>
                    <button id="cancelButton" class="btn btn-secondary">キャンセル</button>
                </div>

                <!-- ここまでmodal -->


                <div class="quiz_statement">
                    <h1 class="quiz_statement_q">
                        Q{{ $question->id }}
                    </h1>
                    <p class="quiz_statement_text">
                        {{ $question->text }}
                    </p>
                    {{-- 選択肢のリストを表示 --}}
                    <ul class="choices">
                        @foreach ($question->choices as $choice)
                        <li class="choice" data-correct="{{ $choice->is_correct }}">
                            <button class="button quiz_block_answer_button">{{ $choice->text }}</button>
                        </li>
                        @endforeach
                    </ul>
                    <!-- <img src="{{ asset('images/' . session('question_' . $question->id . '_image')) }}" alt="Image"> -->
                    <img src="{{ asset('images/' . $question->image) }}" alt="Image">
                </div>
            </div>
        </div>
        @endforeach
        <div class="pagination">
            {{ $questions->links() }}
        </div>
    </main>

    <script src="{{ asset('js/quiz.js') }}"></script>
</body>

</html>