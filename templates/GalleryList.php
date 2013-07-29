<?php

namespace templates;

use oipa\view\AbstractView;

include_once dirname(__FILE__) . '/../lib/HtmlLibrary.php';

class GalleryList extends AbstractView {

    protected function outputHTML() {
        $gallery = new \models\Gallery();
        $userGalleryCol = $gallery->loadAll("WHERE id_user = " . user()->ID);

        if (null === $userGalleryCol) {
            ?>
            <h3>None Gallery Created.</h3>
            <p>To create new gallery go <a href="<?php echo \route\Route::get("addGallery")->generate(); ?>">here.</a></p>
            <?php
            return;
        }
        ?>


        <p>Click on gallery name to edit it.</p>

        <table width="75%" class="table-striped">
            <tr>
                <th>Name</th>
                <th>Description</th>
            </tr>
            <?php foreach ($userGalleryCol as $gallery) { ?>
                <tr>
                    <td align="left">
                        <?php
                        echo create_element("a", array("href" => \route\Route::get("editGallery")->generate(array("id" => $gallery->ID)),
                            "contents" => __($gallery->name)));
                        ?>
                    </td>
                    <td align="left"><?php echo __($gallery->description); ?></td>
                </tr>
            <?php } ?>
        </table>
        <?php
    }

}
