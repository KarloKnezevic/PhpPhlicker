<?php

namespace ctl;

use oipa\controller\Controller;

class AddPhoto implements Controller {

    public function display() {

        //ako korisnik nije prijavljen
        if (!isLoggedIn()) {
            redirect(\route\Route::get("index")->generate());
        }

        if (isPost("gallery_id")) {

            $postphotofield = "photo";
            if (!is_uploaded_file($_FILES[$postphotofield]["tmp_name"])) {
                echo new \templates\Main(array(
            "body" => new \templates\Error(array(
                "error" => "Image must be selected."
                    )),
            "title" => "Error"
                ));
                return;
            }

            $image = new models\Image();
            $image->id_gallery = post("gallery_id");
            $image->name = post("photo_name");
            $image->description = post("photo_description");
            $image->views = 0;
            $image->image = readImg($_FILES[$postphotofield]["tmp_name"]);
            $image->format = strtolower(end(explode(".", $_FILES[$postphotofield]["name"])));

            $image->save();

            $tag = new \models\ImgTag();

            $tag->id_image = $image->getPrimaryKey();
            $tag->tag = post("photo_tag");
            if (paramExists(post("photo_tag"))) {
                $tag->save();
            } else {
                echo new \templates\Main(array(
            "body" => new \templates\Warning(array(
                "warning" => "Image added. Tag for image is not added - it was empty."
                    )),
            "title" => "Warning"
                ));
                return;
            }


            redirect(\route\Route::get("home")->generate());
        }

        echo new \templates\Main(array(
    "body" => new \templates\AddPhoto(),
    "title" => "Add Photo"
        ));
    }

}
