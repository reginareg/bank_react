<?php

namespace Bankas\Controllers;
use Bankas\App;
use Bankas\Safe;
use Bankas\Messages as M;
class AccountController {

  public function __construct()
  {
      if (!LogController::isLogged()) {
          App::redirect('login');
      }
  }
    public function list(){

        $users = Safe::get()->showAll();
        $link = 'http://'.App::DOMAIN.'/';
        return App::view('accounts', ['title' => 'Bankas', 'users' => $users, 'link' => $link, 'messages' => M::get()]);
    }
    public function add(string $id){
        $user = Safe::get()->show($id);
        return App::view('add', ['title' => 'Bankas', 'users' => $user, 'messages' => M::get()]); 
    }
    public function addMoney(string $id){
      $duomenys = Safe::get()->show($id);
          if ($duomenys['client'] == $id && $_POST['add'] > 0) {
            $duomenys['suma'] += $_POST['add'];
            Safe::get()->update($id, $duomenys);
            M::add('Pinigai pridėti', 'success');
            return App::redirect('accounts');
          }
        
        M::add('OBS! Neteisingai įvesta suma!', 'alert');
        return App::redirect('add/'.$id);
    }
    public function deduct($id){
        $user = Safe::get()->show($id);
        return App::view('deduct', ['title' => 'Bankas', 'users' => $user, 'messages' => M::get()]); 
    }

    public function outMoney(string $id){
      $duomenys = Safe::get()->show($id);
          if ($duomenys['client'] == $id 
          && $duomenys['suma'] >= $_POST['deduct'] 
          && $_POST['deduct'] >= 0) 
          {
            $duomenys['suma'] -= $_POST['deduct'];
            Safe::get()->update($id, $duomenys);
            M::add('Pinigai nuskaičiuoti', 'success');
            return App::redirect('accounts');
          }
            
        
        M::add('OBS! Sąskaitoje yra per mažai pinigų arba neteisingai įvesta suma!', 'alert');
        return App::redirect('deduct/'.$id);
        
    }
    public function deleteAccount(string $id){
          $duomenys = Safe::get()->show($id);
          if ($duomenys['client'] == $id && $duomenys['suma'] == 0) {
            Safe::get()->delete($id);
            M::add('Vartotojas ištrintas iš sistemos', 'success');
            return App::redirect('accounts');
          }
         M::add('Sąskaitos, kurioje yra pinigų ištrinti negalima!', 'alert');
            return App::redirect('accounts');
    }
}