<?php

namespace templates;

use oipa\view\AbstractView;
use templates\components\RegistrationForm;

class Register extends AbstractView {

    private $errorMessage;

    protected function outputHTML() {

        if (null !== $this->errorMessage) {
            echo $this->errorMessage;
        }

        echo new RegistrationForm();
    }

    public function setErrorMessage($errorMessage) {
        $this->errorMessage = $errorMessage;
        return $this;
    }

}
