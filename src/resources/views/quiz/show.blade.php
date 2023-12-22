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

    <h2>設問</h2>
    <main class="main">
        @foreach ($questions as $question)
        <div class="quiz" id="quiz">
            <div class="quiz_all">
                <div class="quiz_statement">
                    <h1 class="quiz_statement_q">
                        Q{{$question->quiz_id}}
                    </h1>
                    <p class="quiz_statement_text">
                        {{ $question->text }}
                    </p>
                </div>

                <div class="quiz_main">
                    <img src="{{ asset('images/' . $question->image) }}" alt="Image" class="quiz_img">
                </div>

                {{-- 選択肢のリストを表示 --}}
                <div class="choice_flex">
                    @foreach ($question->choices as $choice)
                    <li class="choice" data-correct="{{ $choice->is_correct }}">
                        <button class="button quiz_block_answer_button">{{ $choice->text }}</button>
                    </li>
                    @endforeach
                </div>

                <div class="quiz_statement">
                    <h1 class="quiz_statement_q quiz_statement_a">
                        A
                    </h1>
                </div>



                <p class="result hidden"></p>

                <div class="quiz_false">
                    <h2 class="quiz_false_result">
                        不正解...
                    </h2>
                    <div class="quiz_false_block">
                        <div class="quiz_false_block_font">
                            A
                        </div>
                        @foreach ($question->choices as $choice)
                        @if ($choice->is_correct)
                        <p class="quiz_false_block_text">
                            {{ $choice->text }}
                        </p>
                        @endif
                        @endforeach
                    </div>
                </div>
                <div class="quiz_right">
                    <h2 class="quiz_right_result quiz_false_result">
                        正解 !
                    </h2>
                    <div class="quiz_false_block">
                        <div class="quiz_false_block_font">
                            A
                        </div>
                        @foreach ($question->choices as $choice)
                        @if ($choice->is_correct)
                        <p class="quiz_false_block_text">
                            {{ $choice->text }}
                        </p>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endforeach


    </main>
    <script src="{{ asset('js/quiz.js') }}"></script>
</body>

</html>