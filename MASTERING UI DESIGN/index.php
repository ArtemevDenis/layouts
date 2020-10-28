<!DOCTYPE HTML >
<html lang="ru">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Одностраничник</title>
    <link href="css/style.css" type="text/css" rel="stylesheet">
</head>

<body>
<div style="position: absolute; display: flex">
    <a href="?lang=ru">RU</a>
    <a href="?lang=en">EU</a>
</div>
<?php
if (isset($_GET['lang'])) {
    if ($_GET['lang'] == 'ru')
        $data = file('./data/9_2.txt');
    else if ($_GET['lang'] == 'fr')
        $data = file('./data/9_3.txt');
    else
        $data = file('./data/9_1.txt');
} else
    $data = file('./data/9_1.txt');

$logo_title = [];
$logo_descr = [];
$left_menu = [];
$quote_text = [];
$quote_author = [];


for ($i = 0; $i < count($data); ++$i) {
    $item = $data[$i];
    stripos($item, '/');
    $prefix = mb_strimwidth($item, 0, stripos($item, '/'), "");
    $text_item = mb_strimwidth($item, stripos($item, '/') + 1, strlen($item) - stripos($item, '/'), "");
    switch ($prefix) {
        case 'logo-title':
            array_push($logo_title, $text_item);
            break;
        case 'logo-descr':
            array_push($logo_descr, $text_item);
            break;
        case 'left-menu':
            array_push($left_menu, $text_item);
            break;
        case 'quote-text':
            array_push($quote_text, $text_item);
            break;
        case 'quote-author':
            array_push($quote_author, $text_item);
            break;
        default:
            break;
    }
}
?>
<header class="header themes-dark">
    <div class="inner">
        <div class="head">
            <div class="logo">
                <a href=""><img src="img/The-Verge-logo.png"/></a>
            </div>
            <div class="title">
                <p>
                    <?php echo $logo_title[0] ?>
                </p>
                <div class="by">
                    <?php
                    for ($i = 0; $i < count($logo_descr); ++$i) {
                        echo "<p>" . $logo_descr[$i] . "</p>";
                    }
                    ?>
                </div>

            </div>

            <div class="book"><img src="img/Book cover.png"/></div>
        </div>
        <div class="content">
            <nav class="menu">
                <?php
                for ($i = 0; $i < count($left_menu); ++$i) {
                    if (stristr($left_menu[$i], '/OFF')) {
                        $text_off = strripos($left_menu[$i], '/');
                        echo "<p ><a href=\"#\" class='disable'>" . stristr($left_menu[$i], '/OFF', true) . "</a></p>";
                    } else
                        echo "<p ><a href=\"#\" >" . $left_menu[$i] . "</a></p>";
                }
                ?>
            </nav>
            <div class="description">
                <h2 class="title">Quis nostrud exercitation amet
                </h2>
                <p class="text">Quis nostrud exercitation amet, consectetur adipisicing elit, sed do eiusmod tempor
                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                    ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                <p class="text">Quis nostrud exercitation amet, consectetur adipisicing elit, sed do eiusmod tempor
                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                    ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
        </div>
        <div class="action-block">
            <p class="text">Get the first chapter free</p>
            <p class="text">Or</p>
            <button class="button">Buy a copy</button>
        </div>
    </div>
</header>
<section class="about-book themes-light">
    <div class="inner">
        <div class="title-block">
            <h2 class="title">About the book</h2>

        </div>
        <div class="content row">
            <div class="col-40">
                <div class="video"><img src="img/Tablet mockup.png"/></div>
            </div>
            <div class="col-60 wrapper">

                <?php

                $quote_author_html = "";
                for ($i = 0; $i < count($quote_author); ++$i) {
                    if (stristr($quote_author[$i], '/OFF'))
                        $quote_author_html = $quote_author_html . "<a href=\"#\" class='author disable'>" . stristr($quote_author[$i], '/OFF', true) . "</a> ";
                    else
                        $quote_author_html = $quote_author_html . "<a href=\"#\" class='author' >" . $quote_author[$i] . "</a> ";
                }

                for ($i = 0; $i < count($quote_text); ++$i) {
                    if (stristr($quote_text[$i], '/OFF')) {
                        echo "<div class=\"quote-block disable\"><div class=\"icon\"></div>";
                        echo "<p class='text'>" . stristr($quote_text[$i], '/OFF', true) . " " . $quote_author_html . "</p>";
                    } else {

                        echo "<div class=\"quote-block\"><div class=\"icon\"></div>";
                        echo "<p class=\"text\">" . $quote_text[$i] . $quote_author_html . "</p>";
                    }
                    echo "</div>";
                }
                ?>
                <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                    incididunt ut labore et dolore magna aliqua. Ut entim ad minim veniam, quis nostrud exercitation ea
                    commodo consequat. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                    incididunt ut labore et dolore magna aliqua.</p>
                <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                    incididunt ut labore et dolore magna aliqua. Ut entim ad minim veniam, quis nostrud exercitation ea
                    commodo consequat. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                    incididunt ut labore et dolore magna aliqua.</p>
                <p class="text">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                    commodo consequat. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                    incididunt ut labore et dolore magna aliqua.</p>
            </div>
        </div>
    </div>
</section>
<section class="video-book themes-dark">
    <div class="inner">
        <div class="title-block">
            <h2 class="title">Book video review</h2>
            <p class="subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
        </div>
        <div class="content row">
            <div class="col-50">
                <div class="video"><img src="img/Vimeo-player-ebook-c2d.png"/></div>
            </div>
            <div class="col-50 wrapper">
                <p class="text">Then grab the first 2 chapters FREE, directly to your inbox. Get to see firsthand how to
                    master UI design principles. Then grab the first 2 chapters FREE, directly to your inbox. Get to see
                    firsthand how to master UI design principles.</p>
                <p class="text">Get started with chapter 1 on Visual Hierarchy.Then grab the first 2 chapters FREE,
                    directly to your inbox. Get to see firsthand how to master UI design principles. Get started with
                    chapter 1 on Visual Hierarchy.Then grab the first 2 chapters FREE, directly to your inbox. Get to
                    see firsthand how to master UI design principles.</p>
                <p class="text">Get started with chapter 1 on Visual Hierarchy. Get started with chapter 1 on Visual
                    Hierarchy. Get started with chapter 1 on Visual Hierarchy.Then grab the first 2 chapters, Get
                    started with chapter 1 on Visual Hierarchy.Then grab the first.</p>
            </div>
        </div>
    </div>
</section>
<div class="white-line"></div>
<section class="free-chapters themes-dark">
    <div class="inner">
        <div class="content">
            <div class="text">
                <p>Then grab the first 2 chapters FREE, directly to your inbox. Get to see firsthand how
                    to master UI design principles.</p>
                <p class="text">Get started with chapter 1 on Visual Hierarchy.</p>
            </div>
            <form class="form-send-chapters" action="">
                <input class="input" type="email" placeholder="Enter your email address"/>
                <button class="button" type="submit">Send me the chapters</button>
            </form>
            <small class="small">We guarantee 100% privacy. Your information will never be shared.</small>
        </div>
    </div>
</section>
<footer class="footer">
    <div class="inner">
        <div class="content">
            <div class="copyright">
                <div class="text left">© Mastering UI Design: The book, 2016</div>
                <div class="text right">
                    <a class="links" href="">Privacy</a>
                    <a class="links" href="">Terms of Use</a>
                </div>
            </div>
            <div class="social">
                <a href=""><img src="img/Twitter.png"/></a>
                <a href=""><img src="img/Facebook.png"/></a>
                <a href=""><img src="img/Instagram.png"/></a>
                <a href=""><img src="img/Dribbble.png"/></a>
                <a href=""><img src="img/LinkedIn.png"/></a>
            </div>
        </div>
    </div>
</footer>
</body>

</html>