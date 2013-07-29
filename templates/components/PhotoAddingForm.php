<?php

namespace templates\components;

use oipa\view\AbstractView;

include_once dirname(__FILE__) . '/../../lib/HtmlLibrary.php';

class PhotoAddingForm extends AbstractView {

    protected function outputHTML() {
        ?>
        <form action="<?php echo \route\Route::get("addPhoto")->generate(); ?>" method="post" enctype="multipart/form-data">
            <table align="center">
                <tr>
                    <td align="left">Photo Title</td>
                    <td><textarea rows="1" cols="50" name="photo_name"></textarea></td>
                </tr>
                <tr>
                    <td align="left">Photo Tag</td>
                    <td><textarea rows="1" cols="50" name="photo_tag"></textarea></td>
                </tr>
                <tr>
                    <td align="left">Photo Description</td>
                    <td><textarea rows="4" cols="50" name="photo_description"></textarea></td>
                </tr>
                <tr>
                    <td align="left">Browse Photo</td>
                    <td><input type="file" name="photo"></td>
                </tr>
                <?php
                
                    $user = user();
                    $gallery = new \models\Gallery();
                    $galleries = $gallery->loadAll("WHERE id_user = " . $user->ID);
                    
                    $selection_options = array();
                    for ($i = 0; $i < count($galleries); $i++) {
                        $selection_options[$i] = create_element("option", array(
                            "value" => $galleries[$i]->ID,
                            "contents" => __($galleries[$i]->name))
                        );
                    }
                
                ?>
                <tr>
                    <td align="left">Select Gallery</td>
                    <td><?php echo create_select(
                            array("name" => "gallery_id",
                                "contents" => $selection_options)); ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td><button type="submit" class="btn btn-danger">Upload Photo</button></td>
                </tr>
            </table>
        </form>
        <?php
    }

}