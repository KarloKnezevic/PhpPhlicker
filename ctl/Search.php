<?php

namespace ctl;

use oipa\controller\Controller;

class Search implements Controller {

    public function display() {

        //ako korisnik nije prijavljen
        if (!isLoggedIn()) {
            redirect(\route\Route::get("index")->generate());
        }

        if (isPost()) {

            $searchTerm = post("search");

            $tags = new \models\ImgTag();
            $collection = $tags->loadAll("WHERE tag = \"" . $searchTerm . "\"");

            echo new \templates\Main(array(
        "body" => new \templates\SearchResult(array(
            "results" => $collection
                )),
        "title" => "Search results"
            ));
            return;
        }

        echo new \templates\Main(array(
    "body" => new \templates\UserAccountMainPage(array(
        "user" => user()
            )),
    "title" => "User Account"
        ));
    }

}
