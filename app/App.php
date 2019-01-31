<?php
namespace App;

class App {

    private static $title;

    public static function getTitle($title) {
        self::$title = $title;
        return self::$title . ' | WallpaperCode';
    }

}
