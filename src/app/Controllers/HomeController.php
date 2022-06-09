<?php
namespace Bankas\Controllers;
use Bankas\App;

class HomeController {

    public function index() {
        return App::view('home', ['title' => 'Girios bankas'] );
    }
    
    public function list () {
        return App::view ('list');
    } 
    public function create () {
        return App::view ('create');
    } 
    public function add () {
        return App::view ('add');
    } 
    public function deduct () {
        return App::view ('deduct');
    } 

}

    public function list () {
        return App::view (list);
    }