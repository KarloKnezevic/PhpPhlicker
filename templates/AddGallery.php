<?php

namespace templates;

use oipa\view\AbstractView;
use templates\components\GalleryAddingForm;

class AddGallery extends AbstractView {
    
    protected function outputHTML() {
        echo new GalleryAddingForm();
    }
}
