<?php

namespace ctl;

use oipa\controller\Controller;

class Login implements Controller {

    public function display() {

        $errorMessage = null;

        if (isPost()) {

            $query = \db\DBPool::getInstance()->prepare(
                    "SELECT id FROM users WHERE username = ? AND password = ?");

            try {
                $query->execute(array(
                    post("username"), sha1(post("password"))
                        )
                );

                //ako je upit djelovao na neki redak
                if ($query->rowCount() > 0) {
                    $row = $query->fetch();
                    $_SESSION["userID"] = $row->id;
                    redirect(\route\Route::get("home")->generate());
                }
            } catch (PDOException $e) {
                $errorMessage = "Please, try again or contact admin.";
            }

            $errorMessage .= "Invalid username and/or password.";
        }

        echo new \templates\Main(array(
    "body" => new \templates\Login(array(
        "errorMessage" => $errorMessage
            )),
    "title" => "Login"
        ));
    }

}
