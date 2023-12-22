<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css'])
    <link rel="stylesheet" href="{{ asset('css/toppage.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700&amp;family=Plus+Jakarta+Sans:wght@400;700&amp;display=swap" rel="stylesheet">
</head>

<body>
    <header class="flex justify-between pl-6 py-3.5 fixed z-10 bg-white items-center w-full md:py-7.5 ">
        <div class="pl-3 z-50">
            <img src="{{ asset('images/logo.png') }}" alt="POSSE" class="py-10">
        </div>
        <input type="checkbox" id="headerButtonClick"></input>
        <label for="headerButtonClick" class="md:flex justify-center z-90 top-5 bottom-7.5 w-15 h-15 items-center">
            <span class="before"></span>
        </label>
        <nav class="flex">
            <ul class="flex">
                <li class="mr-8 mt-4">
                    <a href="../トップページ/toppage.html">POSSEとは</a>
                </li>
                <li class="mt-4">
                    <a href="{{ route('quiz.index'); }}">クイズ</a>
                </li>
            </ul>
            <div class="hidden">
                <a href="https://line.me/R/ti/p/@651htnqp?from=page" target="_blank" rel="noopener noreferrer" class="lineHeaderLink hidden">
                    <img src="{{ asset('images/lineicon.png') }}" class="lineHeaderIcon hidden">
                    <span class="lineHeaderText">
                        POSSE公式LINEを追加
                    </span>
                    <img src="{{ asset('images/icon-link-light.png') }}" class="lineHeaderLight hidden">
            </div>
            </a>
            <a href="" class="hidden">
                POSSE 公式サイト
                <img src="{{ asset('images/icon-link-dark.png') }}" class="LineHeaderDark">
            </a>
            <ul class="flex pr-6">
                <li class="w-12 h-12 ml-5 rounded-full bg-white shadow-xs text-center">
                    <a href="https://twitter.com/posse_program"><img src="{{ asset('images/icon-twitter.png') }}" alt="twitter" class="w-6 h-5 translate-y-4"></a>
                </li>
                <li class="instagram">
                    <a href="https://www.instagram.com/posse_programming/"><img src="{{ asset('images/icon-instagram.png') }}" alt="instagram" class="instagramIcon"></a>
                </li>
            </ul>
        </nav>
    </header>



    <hero class="hero">
        <div class="heroMain">
            <div class="heroBack">
                <h1 class="heroTitle">学生プログラミングコミュニティ POSSE（ポッセ）
                </h1>
                <div class="heroText">自分史上最高
                    <br>を仲間と。
                </div>
            </div>
            <picture class="mainHero">
                <img src="{{ asset('images/img-hero.png') }}" class="mainHeroPicture">
            </picture>
        </div>
        <div>
            <ul>
                <li class="heroScroll">
                    Scroll Down
                </li>
            </ul>
        </div>
    </hero>


    <div class="mainPosse">
        <h2 class="mainH">
            POSSEとは
            <p class="mainHsub">
                About POSSE
            </p>
        </h2>
    </div>
    <div class="mainText">
        <picture class="mainImg">
            <img src="{{ asset('images/img-about.png') }}" class="mainPicture">
        </picture>
        <div class="mainPtext">
            <p class="mainP">
                学生プログラミングコミュニティ 「POSSE(ポッセ)」は、人格とプログラミング、二つの面での成長をスローガンに活動しており、大学生だけが集まって学びを深めるコミュニティです。
                <br>プログラミングだけではありません。オフラインでのイベントや、旅行など様々な企画を行っています！
                <br>それらを通じて、夏休みの大半をPOSSEで出来た仲間と過ごす人もたくさんいるほどメンバーとの仲が深まります。
            </p>
        </div>
    </div>
    </main>

    <div class="lineMain">
        <div class="lineLm">
            <img src="{{ asset('images/lineicon.png') }}"class="lineMainIcon">
            <h1 class="lineTitle">POSSE 公式LINE
            </h1>
        </div>
        <div class="lineMainText">
            <p>公式LINEにてご質問を随時受け付けております。
                <br>詳細やPOSSE最新情報につきましては、公式LINEにてお知らせ致しますので
                <br>下記ボタンより友達追加をお願いします！
            </p>
        </div>
        <a href="https://line.me/R/ti/p/@651htnqp?from=page" target="_blank" rel="noopener noreferrer" class="lineMainLink">
            <div class="lineWhite">
                <p class="lineAdd">LINE追加
                </p>
                <img src="{{ asset('images/icon-link-dark.png') }}" class="lined">
            </div>
        </a>
    </div>
    </div>

    <footer class="footer">
        <div class="posseLogoFooter">
            <img src="{{ asset('images/logo.png') }}" alt="POSSE">
        </div>
        <nav class="topFooter">
            <div class="topFooterPage">
                <a href="">POSSE公式サイト</a>
            </div>
            <div class="tiFooter">
                <div class="twitterFooter">
                    <a href="https://twitter.com/posse_program"><img src="{{ asset('images/icon-twitter.png') }}" alt="twitter" class="twitterIconFooter"></a>
                </div>
                <div class="instagramFooter">
                    <a href="https://www.instagram.com/posse_programming/"><img src="{{ asset('images/icon-instagram.png') }}" alt="instagram" class="instagramIconFooter"></a>
                </div>
            </div>
        </nav>
        <div class="copyRight">
            <small>©︎2022 POSSE</small>
        </div>
    </footer>

    <a href="https://line.me/R/ti/p/@651htnqp?from=page" target="_blank" rel="noopener noreferrer" class="lineLink">
        <div class="lineFooter">
            <img src="{{ asset('images/lineicon.png') }}" class="lineIcon">
            <p class="lineText">
                <span class="lineTextP">
                    POSSE
                </span>
                <span>
                    公式LINEで
                </span>
                <br>最新情報をGET！
            </p>
            <img src="{{ asset('images/icon-link-light.png') }}" class="lineDark">
        </div>
    </a>

</body>

</html>