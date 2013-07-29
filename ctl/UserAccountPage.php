<?php

namespace ctl;

use oipa\controller\Controller;

class UserAccountPage implements Controller {

    public function display() {

        if (!isLoggedIn()) {
            redirect(\route\Route::get("index")->generate());
        }

        echo new \templates\Main(array("body" => new \templates\UserAccountMainPage(array(
        "user" => user())),
    "title" => "User Account"
        ));
    }

}
