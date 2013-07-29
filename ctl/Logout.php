<?php

namespace ctl;

use oipa\controller\Controller;

class Logout implements Controller {

    public function display() {

        //ako korisnik nije prijavljen
        if (!isLoggedIn()) {
            redirect(\route\Route::get("index")->generate());
        }

        //briši ključ user iz hash mape
        unset($_SESSION["user"]);
        //uništi SESSID
        session_destroy();
        //vrati se na login obrazac
        redirect(\route\Route::get("login")->generate());
    }

}
