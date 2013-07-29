<?php

namespace ctl;

use oipa\controller\Controller;

class E404 implements Controller {

    public function display() {

        echo new \templates\Main(array(
                                      "title"   => "Not found",
                                      "body"    => new \templates\E404()
                                 ));
    }
}