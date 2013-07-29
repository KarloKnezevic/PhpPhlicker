<?php

namespace templates;

use oipa\view\AbstractView;

include_once dirname(__FILE__) . '/../lib/HtmlLibrary.php';

class EditPhoto extends AbstractView {

    private $photoID;

    protected function outputHTML() {
        $image = new \models\Image();
        $image->load($this->photoID);

        echo new components\PhotoEditForm(array(
    "photo" => $image
        ));
        ?>
        <div align="center">
            <?php
            echo create_element("img", array(
                "src" => \route\Route::get("photoRetrieval")->generate(array("id" => $this->photoID, "size" => "original")),
                "alt" => $image->description, "title" => $image->name
            ));
            ?>
        </div>
        <?php
    }

    public function setPhotoID($pid) {
        $this->photoID = $pid;
        return $this;
    }

}
