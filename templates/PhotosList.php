<?php

namespace templates;

use oipa\view\AbstractView;

include_once dirname(__FILE__) . '/../lib/HtmlLibrary.php';

class PhotosList extends AbstractView {

    protected function outputHTML() {
        $g = new \models\Gallery();
        $i = new \models\Image();

        $galleryCollection = $g->loadAll("WHERE id_user = " . user()->ID);

        if (null === $galleryCollection) {
            ?>
            <h3>None Gallery Created.</h3>
            <p>To create new gallery go <a href="<?php echo \route\Route::get("addGallery")->generate(); ?>">here</a> and add some photo to gallery.</p>
            <?php
            return;
        }


        foreach ($galleryCollection as $gallery) {
            $imageCollection = $i->loadAll("WHERE id_gallery = " . $gallery->ID);
            ?>

            <table class="table table-striped">
                <tr>
                    <th>Gallery name</th>
                    <th>Gallery size</th>
                    <th>Gallery description</th>
                </tr>
                <tr class="info">
                    <td align="center"><?php echo __($gallery->name); ?></td>
                    <td align="center"><?php echo null === $imageCollection ? 0 : count($imageCollection); ?></td>
                    <td align="center"><?php echo __($gallery->description) ?></td>
                </tr>
            </table>

            <?php
            if (null === $imageCollection) {
                continue;
            }
            ?>
            <table class="table table-striped">
                <?php foreach ($imageCollection as $image) {
                    ?>
                    <tr>
                        <td align="left">
                            <?php
                            echo create_element("a", array(
                                "href" => \route\Route::get("viewPhoto")->generate(array("id"=>$image->ID)),
                                "contents" => create_element("img", array(
                                    "src" => \route\Route::get("photoRetrieval")->generate(array("id" => $image->ID, "size" => "small")),
                                    "alt" => $image->description,
                                    "title" => $image->name
                            ))));
                            ?>
                        </td>
                        <td align="center">
                            <?php
                            echo __($image->name);
                            ?>
                        </td>
                        <td align="center">
                            <?php
                            echo create_element("a", array("href" => \route\Route::get("editPhoto")->generate(array("id"=>$image->ID)),
                                "contents" => "Edit Photo"));
                            ?>
                        </td>
                    </tr>
            <?php } ?>

            </table>
            <?php
        }
    }

}

