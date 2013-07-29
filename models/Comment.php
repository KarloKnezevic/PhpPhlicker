<?php

namespace models;

use oipa\model\AbstractDBModel;

class Comment extends AbstractDBModel {

    public function getColumns() {
        return array("id_user", "id_image", "comment", "time");
    }

    public function getPrimaryKeyColumn() {
        return "ID";
    }

    public function getTable() {
        return "comment";
    }

}
