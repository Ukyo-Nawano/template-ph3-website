<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/quiz.css') }}">
    <link rel="stylesheet" href="{{ asset('css/toppage.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700&family=Plus+Jakarta+Sans:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    <header class="header" id="header">
        <div class="header_posse">
            <img src="../img/logo.png" alt="POSSE">
        </div>
        <input type="checkbox" id="header_button"></input>
        <label for="header_click" class="header_open">
            <span></span>
        </label>
        <nav class="header_nav">
            <ul class="header_nav_ul">
                <li class="header_nav_ul_top">
                    <a href="../トップページ/toppage.html">POSSEとは</a>
                </li>
                <li class="header_nav_ul_quiz">
                    <a href="../クイズページ/quiz.html">クイズ</a>
                </li>
            </ul>
            <div class="header_nav_line">
                <a href="https://line.me/R/ti/p/@651htnqp?from=page" target="_blank" rel="noopener noreferrer" class="lineHeaderLink">
                    <img src="../img/lineicon.png" class="lineHeaderIcon">
                    <span class="lineHeaderText">
                        POSSE公式LINEを追加
                    </span>
                    <img src="../img/icon-link-light.png" class="lineHeaderLight">
            </div>
            </a>
            <a href="" class="header_nav_site">
                POSSE 公式サイト
                <img src="../img/icon-link-dark.png" class="LineHeaderDark">
            </a>
            <ul class="header_nav_sns">
                <li class="header_nav_sns_icon">
                    <a href="https://twitter.com/posse_program"><img src="../img/icon-twitter.png" alt="twitter" class="header_nav_sns_icon_img"></a>
                </li>
                <li class="header_nav_sns_icon">
                    <a href="https://www.instagram.com/posse_programming/"><img src="../img/icon-instagram.png" alt="instagram" class="header_nav_sns_icon_img"></a>
                </li>
            </ul>
        </nav>
    </header>

    <div class="hero">
        <div class="hero_quiz">
            <p class="hero_quiz_posse">
                POSSE課題
        </div>
    </div>


        @if (session('message'))
        <div class="message">
            {{ session('message') }}
        </div>
        @endif
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        @foreach($quizzes as $quiz)
        <div class="route">
            <a href="{{ route('quiz.show', ['quiz' => $quiz->id]) }}">{{ $quiz->name }}</a>
            <a href="{{ route('quiz.edit', ['quiz' => $quiz->id]) }}">編集</a>
            <button id="delete_modal_open" class="delete_modal_open" data-quiz-id="{{ $quiz->id }}">削除</button>
        </div>
        @endforeach

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
            <form action="" method="POST" id="delete_form">
                @csrf
                @method('DELETE')
                <button type="submit" class="postButton modalPostButton delete_complete_button" id="delete_complete_button">削除</button>
            </form>
            <button id="cancelButton" class="btn btn-secondary">キャンセル</button>
        </div>

        <!-- ここまでmodal -->


    <main class="main">
        <div class="quiz" id="quiz">
            @foreach ($questions as $question)
            <div class="quiz_all">
                <div class="quiz_statement">
                    <h1 class="quiz_statement_q">
                        Q{{$question->quiz_id}}
                    </h1>
                    <p class="quiz_statement_text" data-quiz="${questionNumber}">
                        {{$question->text}}
                    </p>
                </div>
                <div class="quiz_main">
                    <img src="{{ $question->image }}" class="quiz_main_picture">
                </div>
                @endforeach
            </div>
        </div>
    </main>

    <div class="line main">
        <div class="line_content main">
            <img src="./img/lineicon.png" class="line_content_icon">
            <div class="line_content_title">
                <h1 class="line_content_title_text">POSSE 公式LINE
                </h1>
            </div>
        </div>
        <div class="line_text">
            <p>公式LINEにてご質問を随時受け付けております。
                <br>詳細やPOSSE最新情報につきましては、公式LINEにてお知らせ致しますので
                <br>下記ボタンより友達追加をお願いします！
            </p>
        </div>
        <a href="https://line.me/R/ti/p/@651htnqp?from=page" target="_blank" rel="noopener noreferrer" class="line_link">
            <div class="line_link_add">
                <p>LINE追加</p>
                <img src="./img/icon-link-dark.png" class="line_link_add_img">
            </div>
        </a>
    </div>


    <footer class="footer main">
        <div class="footer_logo">
            <img src="./img/logo.png" alt="POSSE">
        </div>
        <nav class="footer_nav">
            <div class="footer_nav_page">
                <a href="">POSSE公式サイト</a>
            </div>
            <div class="footer_nav_sns">
                <div class="footer_nav_sns_twitter">
                    <a href="https://twitter.com/posse_program"><img src="./img/icon-twitter.png" alt="twitter" class="footer_nav_sns_twitter_icon"></a>
                </div>
                <div class="footer_nav_sns_instagram footer_nav_sns_twitter">
                    <a href="https://www.instagram.com/posse_programming/"><img src="./img/icon-instagram.png" alt="instagram" class="footer_nav_sns_instagram_icon"></a>
                </div>
            </div>
        </nav>
        <div class="footer_copy">
            <small>©︎2022 POSSE</small>
        </div>
    </footer>
    <script src="{{ asset('js/quiz.js') }}"></script>
</body>

</html>