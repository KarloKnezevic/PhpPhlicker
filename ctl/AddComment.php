<?php

namespace ctl;

use oipa\controller\Controller;

class AddComment implements Controller {

    public function display() {
        if (!isLoggedIn()) {
            redirect(\route\Route::get("index")->generate());
        }

        if (isPost()) {

            if (!paramExists(post("comment"))) {
                echo new \templates\Main(array(
            "body" => new \templates\Warning(array(
                "warning" => "Cannot submit empty comment."
                    )),
            "title" => "Warning"
                ));
                return;
            }

            $comment = new \models\Comment;
            $comment->id_user = user()->ID;

            $comment->id_image = post("pid");
            $comment->comment = post("comment");
            $comment->time = date("Y-m-d H:i:s");

            $comment->save();

            redirect(\route\Route::get("viewPhoto")->generate(array( "id"=> post("pid"))));
        
            
            }

        echo new \templates\Main(array(
    "body" => new \templates\Error(array(
        "error" => "No post request."
            )),
    "title" => "Error"
        ));
    }

}
