<?php

namespace templates;

use oipa\view\AbstractView;

class UserAccountMainPage extends AbstractView {

    /**
     *
     * @var \models\User
     */
    private $user;

    protected function outputHTML() {
        ?>

        <table>
            <tr>
                <td>First Name:</td>
                <td><?php echo __($this->user->name); ?></td>
            </tr>
            <tr>
                <td>Last Name:</td>
                <td><?php echo __($this->user->surname); ?></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><?php echo __($this->user->email); ?></td>
            </tr>
            <tr>
                <td>Username:</td>
                <td><?php echo __($this->user->username); ?></td>
            </tr>
            <tr>
                <td>Admin Settings Change:</td>
                <td><a href="<?php echo \route\Route::get("admin")->generate(); ?>"><button class="btn btn-danger" type="button">Admin</button></a></td>
            </tr>

        </table>

        <p>
            You can search all photos by tags.
            <?php
            echo new Search();
            ?>
        </p>

        <?php
    }

    public function setUser(\models\User $user) {
        $this->user = $user;
        return $this;
    }

}
