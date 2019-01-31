<?php

use App\App;
use App\Autoloader;
use Highlight\Highlighter;

require '../app/App.php';

require '../app/Autoloader.php';
Autoloader::register();

require_once '../app/Highlight/Autoloader.php';
spl_autoload_register("Highlight\\Autoloader::load");

$hl = new Highlighter();

if (isset($_POST)) {
    if (isset($_POST['code']) && isset($_POST['language'])) {
        $code = $_POST['code'];
        $language = $_POST['language'];
        $highlight = $hl->highlight($language, $code);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/hljs/default.css">
    <title><?= App::getTitle('Generator'); ?></title>
    <link rel="stylesheet" href="css/main.css">
    <style>canvas {
            height: 100% !important;
            width: 100% !important;
        }</style>
</head>
<body>
<pre id="code" style="background: #1B1B1B;">
    <code class="hljs <?= $highlight->language ?>"><?= $highlight->value ?></code>
</pre>
<button type="button" style="position: absolute; right: 10px; bottom: 10px;" class="btn btn-secondary btn-sm"
        data-toggle="modal" data-target="#wallpaper" onclick="capture()">Save wallpaper
</button>

<div class="modal fade" id="wallpaper" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Aperçu du fond d'écran généré</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="capture"></div>
            <div class="modal-footer">
                <a id="download" download="myImage.jpg" href="" onclick="download_img(this);">Download</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>
<script src="js/jquery.js"></script>
<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
        integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
        crossorigin="anonymous"></script>
<script type="text/javascript">
    function capture() {
        html2canvas(document.getElementById('code')).then(function (canvas) {
            if (document.getElementsByClassName('wallpaper').length < 1) {
                console.log(document.getElementsByClassName('wallpaper').length);
                document.getElementById('capture').appendChild(canvas).setAttribute('class', 'wallpaper');
            }
        });
    };

    download_img = function(el) {
        var image = canvas.toDataURL("image/jpg");
        el.href = image;
    };
</script>
</body>
</html>
