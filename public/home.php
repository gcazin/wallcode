<?php

use App\App;
use App\Autoloader;

require '../app/App.php';
require '../app/Autoloader.php';
Autoloader::register();

require '../vendor/autoload.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title><?= App::getTitle('Home') ?></title>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/computer.css">
    <link rel="stylesheet" href="css/buttons.css">
    <link rel="stylesheet" type="text/css" href="css/hljs/default.css">
    <link rel=stylesheet href="js/codemirror/lib/codemirror.css">
    <link rel="stylesheet" href="css/inputs.css">
</head>
<body>
<div class="container">
    <div class="homepage">
    <div class="menu">
        <div class="menu__title">
            WallpaperCode<span class="hljs-title">()</span>
        </div>
    </div>
    <div class="content">
        <div class="flex__half">
            <div class="flex__half-text">
                <div class="flex__half-primary-text">
                    <h1>Make your own custom wallpaper</h1>
                </div>
                <a class="btn btn-outline-danger btn-lg" href="#wallpaper" role="button">Generate wallpaper</a>
            </div>
        </div>
        <div class="flex__half">
            <div class="flex__half-text">
                <?php require '../pages/computer.php'; ?>
            </div>
        </div>
    </div>
    </div>
    <div class="generator" id="wallpaper">
        <div class="menu">
            <div class="menu__title">
                Generator<span class="hljs-title">()</span>
            </div>
        </div>
        <div class="generator__form">
            <form action="wallpaper.php" method="post">
                <p class="explanation">
                    Put your code in the box below, choose your language code, click on "Generate" and tada, your wallpaper is created automatically!
                </p>
                <div class="input-group mt-2">
                    <textarea name="code" id="generator" placeholder="Type your code here..."></textarea>
                </div>
                <div class="input-group mt-2">
                    <select class="form-control" name="language">
                        <option value="html">HTML</option>
                        <option value="php" selected>PHP</option>
                    </select>
                </div>
                <div class="input-group mt-2">
                    <button class="btn btn-danger btn-block">Generate</button>
                </div>
            </form>
        </div>
        <footer>
            <div class="footer__left">
                <p>Librairies used: <a href="https://getbootstrap.com/">Bootstrap</a> (Buttons, and inputs), <a
                            href="https://codemirror.net">CodeMirror</a>, <a href="https://github.com/scrivo/highlight.php">highlight.php</a></p>
            </div>
            <div class="footer__right">© Copyright 2019 - <?= date('Y'); ?>, Guillaume Cazin.</div>
        </footer>
    </div>
</div>
<script src="js/codemirror/lib/codemirror.js"></script>
<script src="js/codemirror/mode/xml/xml.js"></script>
<script src="js/codemirror/mode/javascript/javascript.js"></script>
<script src="js/codemirror/mode/css/css.js"></script>
<script src="js/codemirror/mode/htmlmixed/htmlmixed.js"></script>
<script src="js/codemirror/addon/edit/matchbrackets.js"></script>
<script src="js/codemirror/doc/activebookmark.js"></script>
<script src="js/codemirror/addon/display/placeholder.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script>
    var editor = CodeMirror.fromTextArea(document.getElementById("generator"), {
        lineNumbers: true,
        mode: "text/x-php",
        matchBrackets: true,
        placeholder: "Type your code here..."
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
</body>
</html>
