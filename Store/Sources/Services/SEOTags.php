<?php

class SEOTags {

    private static $meta = [
        "title" => '',
        "description" => '',
        "author" => '',
        "index" => '',
        "follow" => ''
    ];

    private static $link = [
        "canonical" => ''
    ];

    private static $tags = [
        "type" => '',
        "title" => '',
        "description" => '',
        "url" => '',
        "image" => '',
        "imageAlt" => ''
    ];

    public static function openGraph($args = []){
        self::$tags['type'] = $args[0];
        self::$tags['title'] = $args[1];
        self::$tags['description'] = $args[2];
        self::$tags['url'] = $args[3];
        self::$tags['image'] = $args[4];
        self::$tags['imageAlt'] = $args[5];

        return self::$tags;
    }

    public static function linkTags($args = []){
        self::$link['canonical'] = $args[0];

        return self::$link;
    }

    public static function metaTags($args = []){
        self::$meta['title'] = $args[0];
        self::$meta['description'] = $args[1];
        self::$meta['author'] = $args[2];
        self::$meta['index'] = $args[3];
        self::$meta['follow'] = $args[4];

        return self::$meta;
    }
}