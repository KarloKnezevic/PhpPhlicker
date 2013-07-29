<?php

namespace templates\components;

use oipa\view\AbstractView;

class AdminForm extends AbstractView {

    /**
     *
     * @var \models\User
     */
    private $user;

    protected function outputHTML() {
        ?>

        <form action="<?php echo \route\Route::get("admin")->generate(); ?>" method="POST">
            <p>
                <label for="name">New First Name:</label>
                <input type="text" name="name" id="name" value="<?php echo $this->user->name ?>">
            </p>
            <p>
                <label for="surname">New Last Name:</label>
                <input type="text" name="surname" id="surname" value="<?php echo $this->user->surname ?>">
            </p>
            <p>
                <label for="email">New Email:</label>
                <input type="text" name="email" id="email" value="<?php echo $this->user->email ?>">
            </p>
            <p>
                <label for="newpassword">New Password:</label>
                <input type="password" name="newpassword" id="newpassword">
            </p>
            <p>
                <label for="oldpassword">Old Password:</label>
                <input type="password" name="oldpassword" id="oldpassword">
            </p>
            <p>
                <button type="submit" class="btn btn-danger">Change Userdata</button>
            </p>
        </form>
        <?php
    }

    public function setUser(\models\User $user) {
        $this->user = $user;
        return $this;
    }

}
