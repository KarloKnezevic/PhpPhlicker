<?php

namespace templates\components;

use oipa\view\AbstractView;

class GalleryAddingForm extends AbstractView {

    protected function outputHTML() {
        ?>
        <form action="<?php echo \route\Route::get("addGallery")->generate(); ?>" method="POST">
            <table align="center">
                <tr>
                    <td align="left">Gallery Title</td>
                    <td><textarea rows="1" cols="50" name="gallery_name"></textarea></td>
                </tr>
                <tr>
                    <td align="left">Gallery Description</td>
                    <td><textarea rows="4" cols="50" name="gallery_description"></textarea></td>
                </tr>
                <tr>
                    <td></td><td><button type="submit" class="btn btn-danger">Create Gallery</button></td>
                </tr>
            </table>
        </form>
    <?php
    }

}
