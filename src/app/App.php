<?php
 namespace Bankas;
 use Bankas\Controllers\HomeController;
 use Bankas\Controllers\LoginController;
 use Bankas\Messages;

class App {

    const DOMAIN = 'girios-bankas.lt';
    const APP = __DIR__ . '/../';

    public static function start () {
        session_start();
        Messages::init();
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

    public static function redirect ($url = '') {
        header('Location: http://'.self::DOMAIN.'/'.$url);
    }
    public static function authAdd(object $user ) {
        $_SESSION['auth'] = 1;
        $_SESSION['user'] = $user;
    }
    public static function authRem() {
        unset($_SESSION['auth'], $_SESSION['user']);
        $_SESSION['user'] = $user;
    }
    public static function auth() : bool {
        return isset($_SESSION['auth']) && $_SESSION['auth'] == 1;
    }


    private static function route (array $uri){

        $m = $_SERVER['REQUEST_METHOD'];

        //Login

        if ('GET' == $m && count($uri) == 1 && $uri [0] === 'login') {
            return (new LoginController()) -> showLogin ();
        }
        if ('POST' == $m && count($uri) == 1 && $uri [0] === 'login') {
            return (new LoginController()) -> doLogin ();
        }
        if ('POST' == $m && count($uri) == 1 && $uri [0] === 'logout') {
            return (new LoginController()) -> Logout ();
        }


        if (count($uri) == 1 && $uri [0] === '') {
           return (new HomeController()) -> index ();
        }
           
        
        if ('GET' == $m && count($uri) == 1 && $uri [0] === 'list') {
            return (new HomeController()) -> list ();
        }
        if ('POST' == $m && count($uri) == 1 && $uri [0] === 'list') {
            return (new HomeController()) -> dolist ();
        }

        if ('GET' == $m && count($uri) == 1 && $uri [0] === 'create') {
            if (!self::auth()) {
                return self::redirect('login');
            }
            return (new HomeController)->create();
        }
        if ('POST' == $m && count($uri) == 1 && $uri [0] === 'create') {
            return (new HomeController()) -> docreate ();
        }

        if ('GET' == $m && count($uri) == 1 && $uri [0] === 'add') {
            return (new HomeController()) -> add ();
        }
        if ('POST' == $m && count($uri) == 1 && $uri [0] === 'add') {
            return (new HomeController()) -> doadd ();
        }

        if ('GET' == $m &&count($uri) == 1 && $uri [0] === 'deduct') {
            return (new HomeController()) -> deduct ();
        }
        if ('POST' == $m &&count($uri) == 1 && $uri [0] === 'deduct') {
            return (new HomeController()) -> dodeduct ();
        }


        // } else {
        //     echo 'kitka';
        // }
        }
    }