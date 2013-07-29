<?php

require_once 'inc/global.php';

try {
    \dispatcher\DefaultDispatcher::instance()->dispatch();
} catch (\oipa\model\NotFoundException $e) {
    redirect(\route\Route::get("e404")->generate());
}
