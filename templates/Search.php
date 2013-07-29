<?php

namespace templates;

use oipa\view\AbstractView;

class Search extends AbstractView {
    
    protected function outputHTML() {
        echo new components\SearchForm();
    }
}
