<?php

namespace templates;

use oipa\view\AbstractView;
use templates\components\PhotoAddingForm;

class AddPhoto extends AbstractView {
    
    protected function outputHTML() {
        echo new PhotoAddingForm(); 
    }
}
