<?php

use route\DefaultRoute;
use route\Route;

Route::register("index", new DefaultRoute("index", array(
    "controller" => "phlickerIndex",
    "action" => "display")));

Route::register("home", new DefaultRoute("home", array(
    "controller" => "userAccountPage",
    "action" => "display"
        ))
);

Route::register("login", new DefaultRoute("login", array(
    "controller" => "login",
    "action" => "display"
        ))
);

Route::register("search", new DefaultRoute("search", array(
    "controller" => "search",
    "action" => "display"
        ))
);

Route::register("logout", new DefaultRoute("logout", array(
    "controller" => "logout",
    "action" => "display"
        ))
);

Route::register("register", new DefaultRoute("register", array(
    "controller" => "register",
    "action" => "display"
        ))
);

Route::register("comment", new DefaultRoute("comment", array(
    "controller" => "addComment",
    "action" => "display"
        ))
);

Route::register("addGallery", new DefaultRoute("addGallery", array(
    "controller" => "addGallery",
    "action" => "display"
        ))
);

Route::register("addPhoto", new DefaultRoute("addPhoto", array(
    "controller" => "addPhoto",
    "action" => "display"
        ))
);

Route::register("admin", new DefaultRoute("admin", array(
    "controller" => "admin",
    "action" => "display"
        ))
);

Route::register("galleryList", new DefaultRoute("galleryList", array(
    "controller" => "galleryList",
    "action" => "display"
        ))
);

Route::register("photoList", new DefaultRoute("photoList", array(
    "controller" => "photoList",
    "action" => "display"
        ))
);

Route::register("editGallery", new DefaultRoute("editGallery/<id>", array(
    "controller" => "editGallery",
    "action" => "display"
        ), array(
            "id" => "\\d+"
        ))
);

Route::register("editPhoto", new DefaultRoute("editPhoto/<id>", array(
    "controller" => "editPhoto",
    "action" => "display"
        ), array(
            "id" => "\\d+"
        ))
);

Route::register("viewPhoto", new DefaultRoute("viewPhoto/<id>", array(
    "controller" => "viewPhoto",
    "action" => "display"
        ), array(
            "id" => "\\d+"
        ))
);

Route::register("photoRetrieval", new DefaultRoute("photoRetrieval/<id>/<size>", array(
    "controller" => "photoRetrieval",
    "action" => "display"
        ), array(
            "id" => "\\d+",
            "size" => "original|small|medium"
        ))
);

Route::register("empty", new DefaultRoute("", array(
    "controller" => "phlickerIndex",
    "action" => "display"
        ))
);

Route::register("e404", new DefaultRoute("error/404", array(
    "controller" => "e404",
    "action" => "display"
        ))
);