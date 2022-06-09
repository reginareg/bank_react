<?php
 namespace Bankas;
 use Bankas\Controllers\HomeController;


class App {

    public static function start () {

        $uri = explode('/', $_SERVER['REQUEST_URI']);
        array_shift($uri);
        self::route($uri);

        print_r($_SERVER['REQUEST_URI']);

        print_r($uri);

        // echo 'valio';
    }

    public static function view (string $name, array $data = []) {
        extract ($data);
        return require __DIR__ .' /../views/'.$name.'.php';
    }

    private static function route (array $uri){

        $m = $_SERVER['$REQUEST_METHOD'];

        if (count($uri) == 1 && $uri [0] === '') {
           return (new HomeController()) -> index ();
        }
           
        if ('GET' == $M && count($uri) == 1 && $uri [0] === 'psl2') {
            return (new HomeController()) -> psl2 ();
        }
        if ('POST' == $M && count($uri) == 1 && $uri [0] === 'psl2') {
            return (new HomeController()) -> dopsl2 ();
        }

        if ('GET' == $M && count($uri) == 1 && $uri [0] === 'psl3') {
            return (new HomeController()) -> psl3 ();

        if ('POST' == $M && count($uri) == 1 && $uri [0] === 'psl3') {
            return (new HomeController()) -> dopsl3 ();
        }

        if ('GET' == $M && count($uri) == 1 && $uri [0] === 'psl4') {
            return (new HomeController()) -> psl4 ();
        }
        if ('POST' == $M && count($uri) == 1 && $uri [0] === 'psl4') {
            return (new HomeController()) -> dopsl4 ();
        }

        if ('GET' == $M &&count($uri) == 1 && $uri [0] === 'psl5') {
            return (new HomeController()) -> psl5 ();
        }
        if ('POST' == $M &&count($uri) == 1 && $uri [0] === 'psl5') {
            return (new HomeController()) -> dopsl5 ();
        }


        // } else {
        //     echo 'kitka';
        // }

    }