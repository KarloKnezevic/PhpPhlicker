<?php

namespace templates;

use oipa\view\AbstractView;

class Error extends AbstractView {

    private $error;

    protected function outputHTML() {
        ?>
        <h1>Error</h1>
        <div align="center"><img src="assets/img/error.png" alt="Error"></div>
        <div align="center">
            <p><?php echo __($this->error); ?></p>
        </div>
    <?php }

    public function setError($e) {
        $this->error = $e;
        return $this;
    }

}
