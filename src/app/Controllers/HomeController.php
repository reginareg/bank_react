<?php
namespace Bankas\Controllers;
use Bankas\App;

class HomeController {

    public function index() {
        return App::view('home', ['title' => 'Girios bankas'] );
    }
    
    public function psl2 () {
        return App::view ('psl2');
    } 
    public function psl3 () {
        return App::view ('psl3');
    } 
    public function psl4 () {
        return App::view ('psl4');
    } 
    public function psl5 () {
        return App::view ('psl5');
    } 





}