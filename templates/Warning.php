<?php

namespace templates;

use oipa\view\AbstractView;

class Warning extends AbstractView {

    private $warning;

    protected function outputHTML() {
        ?>
        <h1>Warning</h1>
        <div align="center"><img src="assets/img/warning.png" alt="Warning"></div>
        <div align="center">
            <p><?php echo __($this->warning); ?></p>
        </div>
    <?php }

    public function setWarning($w) {
        $this->warning = $w;
        return $this;
    }

}
