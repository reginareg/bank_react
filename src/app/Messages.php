<?php
namespace Bankas;

class Messages {

    private static $bag;

    public static function init() : void {
       self::$bag = $_SESSION['messages'] ?? [];
       unset($_SESSION['messages']);
    }

    public static function add(string $text, string $type) : void {
        $_SESSION['messages'][] = ['messages' => $text, 'type' => $type];
    }

    public static function get() : array {
        return self::$bag;
    }

}