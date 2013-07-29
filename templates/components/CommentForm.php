<?php

namespace templates\components;

use oipa\view\AbstractView;

class CommentForm extends AbstractView {

    private $photoID;

    protected function outputHTML() {
        ?>
        <form action="<?php echo \route\Route::get("comment")->generate(); ?>" method="POST">
            <table align="center">
                <tr>
                    <?php if (isLoggedIn()) { ?>
                    <td align="left"><?php echo user()->username; ?></td>
                    <td><textarea rows="4" cols="50" name="comment" placeholder="Make some comment..."></textarea></td>
                    <td><input type="hidden" name="pid" value="<?php echo $this->photoID; ?>"> </td>
                    <td><input type="submit" value="Comment"></td>
                    <?php } ?>
                </tr>
            </table>
        </form>
        <?php
    }

    public function setPhotoID($photoID) {
        $this->photoID = $photoID;
        return $this;
    }

}

