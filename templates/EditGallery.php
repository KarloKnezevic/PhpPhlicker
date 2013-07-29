<?php

namespace templates;

use oipa\view\AbstractView;

class EditGallery extends AbstractView {
    
    private $galleryID;
    
    protected function outputHTML() {
        $gallery = new \models\Gallery();
        $gallery->load($this->galleryID);
        echo new components\GalleryEditForm(array(
            "gallery" => $gallery
        ));
    }
    
    public function setGalleryID($id) {
        $this->galleryID = $id;
        return $this;
    }
}
