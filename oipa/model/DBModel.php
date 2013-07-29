<?php

namespace oipa\model;

interface DBModel extends Model {

    public function save();

    /**
     * @param mixed $pk
     *
     * @return void
     */
    public function load($pk);

    /**
     * @return void
     */
    public function delete();

}