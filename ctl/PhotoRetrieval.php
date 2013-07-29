<?php

namespace ctl;

use oipa\controller\Controller;

class PhotoRetrieval implements Controller {

    public function display() {

        //ako korisnik nije prijavljen
        //zakomentirano zbog naslovne stranice da bude vidljivo za neprijavljene korisnike
        /* if (!isLoggedIn()) {
          redirect("index.php");
          } */

        //ukoliko se pristupa bez parametara
        if (null === \dispatcher\DefaultDispatcher::instance()->getMatched()->getParam("id") || 
                null === \dispatcher\DefaultDispatcher::instance()->getMatched()->getParam("size")) {
            redirect(\route\Route::get("home")->generate());
        }

        $image = new \models\Image;

        $im = $image->getIm(\dispatcher\DefaultDispatcher::instance()->getMatched()->getParam("id"), 
                \dispatcher\DefaultDispatcher::instance()->getMatched()->getParam("size"));
        $fileType = $image->fileType();

        //POSTAVLJANJE ZAGLAVLJA!
        $format = "Content-Type: image/" . $fileType;
        header($format);

        switch ($fileType) {
            case "jpg":
            case "jpeg":
                imagejpeg($im);
                break;
            case "png":
                imagepng($im);
                break;
            case "gif":
                imagegif($im);
                break;
            default:
                imagepng($im);
        }

        imagedestroy($im);
    }

}
