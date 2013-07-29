<?php

namespace templates\components;

use oipa\view\AbstractView;

class LoginForm extends AbstractView {

    protected function outputHTML() {
        ?>

        <form action="<?php echo \route\Route::get("login")->generate(); ?>" method="POST">
            <p>
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" value="<?php echo __(post("email")) ?>">
            </p>
            <p>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password">
            </p>
            <p>
                <button type="submit" class="btn btn-success">Login</button>
            </p>
        </form>

        <?php
    }

}
