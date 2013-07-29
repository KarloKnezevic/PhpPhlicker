<?php

namespace ctl;

use oipa\controller\Controller;

class EditGallery implements Controller {

    public function display() {

        //ako korisnik nije prijavljen
        if (!isLoggedIn()) {
            redirect(\route\Route::get("index")->generate());
        }

        if (isPost()) {

            if (!paramExists(post("name"))) {
                echo new \templates\Main(array(
            "body" => new \templates\Error(array(
                "error" => "Gallery name missing."
                    )),
            "title" => "Error"
                ));
                return;
            }

            $gallery = new \models\Gallery();
            $gallery->load(post("gid"));

            $gallery->name = post("name");
            $gallery->description = post("description");

            $gallery->save();

            redirect(\route\Route::get("galleryList")->generate());
        }

        $galleryID = \dispatcher\DefaultDispatcher::instance()->getMatched()->getParam("id");

        if (null === $galleryID) {
            redirect(\route\Route::get("home")->generate());
        }

        echo new \templates\Main(array(
    "body" => new \templates\EditGallery(array(
        "galleryID" => $galleryID
            )),
    "title" => "Edit Gallery"
        ));
    }

}

