<?php

namespace ctl;

use oipa\controller\Controller;

class AddGallery implements Controller {

    public function display() {

        //ako korisnik nije prijavljen
        if (!isLoggedIn()) {
            redirect(\route\Route::get("index")->generate());
        }

        if (null != isPost("gallery_name")) {

            $gallery = new \models\Gallery();

            try {

                if (!paramExists(post("gallery_name"))) {
                    echo new \templates\Main(array(
                "body" => new \templates\Error(array(
                    "error" => "Gallery name must exist."
                        )),
                "title" => "Error"
                    ));
                    return;
                }

                $gallery->id_user = user()->ID;
                $gallery->name = post("gallery_name");
                $gallery->description = post("gallery_description");

                $gallery->save();
            } catch (Exception $e) {
                //ZASAD NEMA PROVJERE GREŠKE
            }

            redirect(\route\Route::get("home")->generate());
        }

        echo new \templates\Main(array(
    "body" => new \templates\AddGallery(),
    "title" => "Add Gallery"
        ));
    }

}
