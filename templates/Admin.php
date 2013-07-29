<?php

namespace templates;

use oipa\view\AbstractView;
use templates\components\AdminForm;

class Admin extends AbstractView {
    
    /**
     * 
     * @var \models\User
     */
    private $user;
    
    protected function outputHTML() {
        echo new AdminForm(array(
            "user" => $this->user
        ));
    }
    
    public function setUser(\models\User $user) {
        $this->user = $user;
        return $this;
    }
}
