<?php
namespace Bankas\Controllers;
use Bankas\App;
use Bankas\Messages as M;

class HomeController {

    public function index() {
        return App::view('home', ['title' => 'Girios bankas'] );
    }
    
    public function list ( ) {
        return App::view ('list', ['messages' => M::get()]);
    } 
    public function dolist () {
        // M::add( 'tekstas' ir 'tipas');
        return App::redirect ('list');
    }

    public function create () {
        return App::view ('create', ['messages' => M::get()]);
    } 
    public function docreate () {
        // M::add( 'tekstas' ir 'tipas');
        return App::redirect ('create');
    }

    public function add () {
        return App::view ('add', ['messages' => M::get()]);
    } 
    public function doadd () {
        // M::add( 'tekstas' ir 'tipas');
        return App::redirect ('add');
    }

    public function deduct () {
        return App::view ('deduct', ['messages' => M::get()]);
    } 
    public function dodeduct () {
        // M::add( 'tekstas' ir 'tipas');
        return App::redirect ('deduct');
    }

    
   
}