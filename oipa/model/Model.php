<?php

namespace oipa\model;

interface Model extends \Serializable {

    public function equals(Model $model);

}