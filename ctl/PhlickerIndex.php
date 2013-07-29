<?php

namespace ctl;

use oipa\controller\Controller;

class PhlickerIndex implements Controller {
    
    public function display() {
        
        if (isLoggedIn()) {
            redirect(\route\Route::get("home")->generate());
        }
        
        echo new \templates\Main(array(
            "body" => new \templates\Index(),
                 "title" => "Phlicker"
        ));
        
    }
    
    
    
}