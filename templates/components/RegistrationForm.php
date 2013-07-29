<?php

namespace templates\components;

use oipa\view\AbstractView;

class RegistrationForm extends AbstractView {

    protected function outputHTML() {
        ?>
        <form action="<?php echo \route\Route::get("register")->generate(); ?>" method="POST">
            <table>
                <tr>
                    <td>First Name:</td>
                    <td><input type="text" name="name" id="name" value="<?php echo __(post("name")) ?>"></td>
                </tr>
                <tr>
                    <td>Last Name:</td>
                    <td><input type="text" name="surname" id="surname" value="<?php echo __(post("surname")) ?>"></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><input type="text" name="email" id="email" value="<?php echo __(post("email")) ?>"></td>
                </tr>
                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="username" id="username"></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="password" id="password"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><button type="submit" class="btn btn-warning">Register</button></td>
                </tr>
            </table>
        </form>

        <?php
    }

}
