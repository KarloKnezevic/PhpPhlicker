<?php

namespace ctl;

use oipa\controller\Controller;

class Register implements Controller {

    public function display() {

        $errorMessage = null;

        if (isPost()) {

            $query = \db\DBPool::getInstance()->prepare("INSERT INTO users(name, surname, 
        email, username, password) VALUES (?,?,?,?,?)");

            if (!paramExists(post("name"))) {
                $errorMessage .= " Name is missing.";
            }

            if (!paramExists(post("surname"))) {
                $errorMessage .= " Surname is missing.";
            }
            
            if (!paramExists(post("username"))) {
                $errorMessage .= " Username is missing.";
            }

            if (!paramExists(post("email"))) {
                $errorMessage .= " Email is missing.";
            } else {
                $mail_pattern =
                        "/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*" .
                        "@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/";

                if (!preg_match($mail_pattern, post("email"))) {
                    $errorMessage .= " Mail not valid.";
                }
            }

            if (!paramExists(post("password"))) {
                $errorMessage .= " Password is missing.";
            }

            try {

                if (null === $errorMessage) {
                    $query->execute(array(
                        post("name"),
                        post("surname"),
                        post("email"),
                        post("username"),
                        sha1(post("password"))
                            )
                    );

                    redirect(\route\Route::get("index")->generate());
                }
            } catch (PDOException $e) {
                $errorMessage = "There is already a user with the same username.";
            }
        }

        echo new \templates\Main(array(
    "body" => new \templates\Register(array(
        "errorMessage" => $errorMessage
            )),
    "title" => "Register"
        ));
    }

}