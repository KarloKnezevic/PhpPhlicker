<?php

namespace ctl;

use oipa\controller\Controller;

class PhotoList implements Controller {

    public function display() {

        //ako korisnik nije prijavljen
        if (!isLoggedIn()) {
            redirect(\route\Route::get("index")->generate());
        }

        echo new \templates\Main(array(
    "body" => new \templates\PhotosList(),
    "title" => "Photo List"
        ));
    }

}
