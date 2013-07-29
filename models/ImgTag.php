<?php

namespace models;

use oipa\model\AbstractDBModel;

class ImgTag extends AbstractDBModel {
    
    public function getColumns() {
        return array("id_image", "tag");
    }

    public function getPrimaryKeyColumn() {
        return "ID";
    }

    public function getTable() {
        return "tags";
    }

    
}