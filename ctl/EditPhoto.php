<?php

namespace ctl;

use oipa\controller\Controller;

class EditPhoto implements Controller {

    public function display() {

        //ako korisnik nije prijavljen
        if (!isLoggedIn()) {
            redirect(\route\Route::get("index")->generate());
        }

        if (isPost()) {

            $image = new \models\Image();
            $image->load(post("pid"));

            if (!post("gallery_id")) {
                echo new \templates\Main(array(
            "body" => new \templates\Error(array(
                "error" => "Gallery missing."
                    )),
            "title" => "Error"
                ));
                return;
            }

            if (paramExists(post("name")))
                $image->name = post("name");
            if (paramExists(post("description")))
                $image->description = post("description");

            $image->id_gallery = post("gallery_id");

            $image->save();

            $tag = new \models\ImgTag();
            $tag->id_image = $image->getPrimaryKey();
            $tag->tag = post("tag");

            if (paramExists(post("tag"))) {
                $tag->save();
            } else {
                echo new \templates\Main(array(
            "body" => new \templates\Warning(array(
                "warning" => "Image changed. Tag is not changed - it was empty."
                    )),
            "title" => "Warning"
                ));
                return;
            }

            redirect(\route\Route::get("photoList")->generate());
        }

        $photoID = \dispatcher\DefaultDispatcher::instance()->getMatched()->getParam("id");

        if (null === $photoID) {
            redirect(\route\Route::get("home")->generate());
        }

        echo new \templates\Main(array(
    "body" => new \templates\EditPhoto(array(
        "photoID" => $photoID
            )),
    "title" => "Edit Photo"
        ));
    }

}
