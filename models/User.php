<?php

namespace models;

use oipa\model\AbstractDBModel;

class User extends AbstractDBModel {

    public function getColumns() {
        return array("name", "surname", "email", "username", "password");
    }

    public function getPrimaryKeyColumn() {
        return "ID";
    }

    public function getTable() {
        return "users";
    }

}
