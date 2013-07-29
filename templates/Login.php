<?php

namespace templates;

use oipa\view\AbstractView;
use templates\components\LoginForm;

class Login extends AbstractView {
    
    private $errorMessage;

    protected function outputHTML() {
        
        if (null !== $this->errorMessage) {
            echo $this->errorMessage;
        }

        echo new LoginForm();
        ?>

        <p>
            Need an account? Create it <a href="<?php echo \route\Route::get("register")->generate(); ?>" title="Register"> here.</a>
        </p>

        <?php

    }
    
    public function setErrorMessage($errorMessage) {
        $this->errorMessage = $errorMessage;
        return $this;
    }

}