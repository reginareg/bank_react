<?php
namespace Bankas\Controllers;
use Bankas\App;
use Bankas\Messages as M;

class LoginController {

    public function showLogin() {
        return App::view('login', ['messages' => M::get()]);
    }

    public function doLogin() {
        $users = json_decode(file_get_contents(App::APP.'data/users.json'));
        foreach($users as $user) {
            if ($_POST['name'] != $user->name) {
                continue;
            }
            if (md5($_POST['psw']) != $user->psw) {
                M::add('Blogai įvesti duomenys', 'alert');
                return App::redirect('login');
            } else {
                App::authAdd($user);
                M::add('Labas, '.$user->full_name, 'success');
                return App::redirect('list');
            }
        }
        M::add('Blogai įvesti duomenys', 'alert');
        return App::redirect('login');
    }

    public function doLogout() {
        App::authRem();
        M::add('Ate', 'success');
        return App::redirect('login');
    }
}