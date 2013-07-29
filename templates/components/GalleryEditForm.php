<?php

namespace templates\components;

use oipa\view\AbstractView;

class GalleryEditForm extends AbstractView {

    /**
     *
     * @var \models\Gallery
     */
    private $gallery;

    protected function outputHTML() {
        ?>

            <form action="<?php echo \route\Route::get("editGallery")->generate(array("id" => $this->gallery->ID)); ?>" method="POST">
            <table align="center">
                <tr>
                    <td align="left">New Gallery Name:</td>
                    <td><input type="text" name="name" id="name" value="<?php echo $this->gallery->name ?>"></td>
                </tr>
                <tr>
                    <td align="left">New Gallery Description:</td>
                    <td><textarea rows="4" cols="50" name="description" id="description"><?php echo $this->gallery->description ?></textarea></td>
                </tr>
                <tr>
                    <td> <input type="hidden" name="gid" value="<?php echo $this->gallery->ID; ?>"> </td><td><input type="submit" value="Save changes"></td>
                </tr>
            </table>
        </form>

    <?php
    }

    public function setGallery(\models\Gallery $gallery) {
        $this->gallery = $gallery;
        return $this;
    }

}
