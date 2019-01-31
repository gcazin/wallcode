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
    <meta charset="utf-8">
    <title><?= App::getTitle('Home'); ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel=stylesheet href="js/codemirror/lib/codemirror.css">
    <script src="js/codemirror/lib/codemirror.js"></script>
    <script src="js/codemirror/mode/xml/xml.js"></script>
    <script src="js/codemirror/mode/javascript/javascript.js"></script>
    <script src="js/codemirror/mode/css/css.js"></script>
    <script src="js/codemirror/mode/htmlmixed/htmlmixed.js"></script>
    <script src="js/codemirror/addon/edit/matchbrackets.js"></script>
    <script src="js/codemirror/doc/activebookmark.js"></script>
</head>
<body style="background: #1B1B1B">
<div class="container">
    <div class="jumbotron mt-5">
        <h1 style="text-align: center;">CodeWall</h1>
        <form action="traitement.php" method="post">
            <label for="code">Entrez votre code ci-dessus : </label>
            <textarea id="demotext" name="code"></textarea>
            <select class="form-control mt-2" name="language" id="language">
                <option value="php">PHP</option>
                <option value="html">HTML</option>
            </select>
            <div class="input-group">
                <input type="text" name="color" class="form-control mt-2" placeholder="Color">
            </div>
            <button class="btn btn-primary mt-2" type="submit">Valider</button>
        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script>
    var editor = CodeMirror.fromTextArea(document.getElementById("demotext"), {
        lineNumbers: true,
        mode: "text/x-php",
        matchBrackets: true
    });
</script>
<script src="js/codemirror/lib/codemirror.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</body>
</html>
