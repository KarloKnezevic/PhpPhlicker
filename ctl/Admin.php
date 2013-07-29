<?php

namespace ctl;

use oipa\controller\Controller;

class Admin implements Controller {

    public function display() {

        //ako korisnik nije prijavljen
        if (!isLoggedIn()) {
            redirect(\route\Route::get("index")->generate());
        }

        if (isPost()) {

            $user = new \models\User();
            $user->load(user()->ID);

            if (sha1(post("oldpassword")) === $user->password) {
                if (paramExists(post("newpassword")) &&
                        sha1(post("oldpassword")) !== sha1(post("newpassword")))
                    $user->password = sha1(post("newpassword"));
            } else {
                echo new \templates\Main(array(
            "body" => new \templates\Error(array(
                "error" => "For changing admin settings must authorize."
                    )),
            "title" => "Error"
                ));
                return;
            }

            if (paramExists(post("name")))
                $user->name = post("name");

            if (paramExists(post("surname")))
                $user->surname = post("surname");

            if (paramExists(post("email")))
                $user->email = post("email");

            $user->save();

            redirect(\route\Route::get("home")->generate());
        }

        echo new \templates\Main(array(
    "body" => new \templates\Admin(array(
        "user" => user()
            )),
    "title" => "User Admin"
        ));
    }

}
