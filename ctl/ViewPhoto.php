<?php

namespace ctl;

use oipa\controller\Controller;

class ViewPhoto implements Controller {

    public function display() {

        $photoID = \dispatcher\DefaultDispatcher::instance()->getMatched()->getParam("id");

        if (null === $photoID) {
            redirect(\route\Route::get("home")->generate());
        }

        echo new \templates\Main(array(
    "body" => new \templates\ViewPhoto(array(
        "photoID" => $photoID
            )),
    "title" => "View Photo"
        ));
    }

}
