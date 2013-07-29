<?php

namespace models;

use oipa\model\AbstractDBModel;

class Gallery extends AbstractDBModel {

    public function getColumns() {
        return array("id_user", "name", "description");
    }

    public function getPrimaryKeyColumn() {
        return "ID";
    }

    public function getTable() {
        return "gallery";
    }

}
