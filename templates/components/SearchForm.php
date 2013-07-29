<?php

namespace templates\components;

use oipa\view\AbstractView;

class SearchForm extends AbstractView {

    protected function outputHTML() {
        ?>
        <form action="<?php echo \route\Route::get("search")->generate(); ?>" method="POST">
            <p>
                <input type="search" name="search" id="search" placeholder="Search something…">
                <button type="submit" class="btn">Search</button>
            </p>
        </form>
        <?php
    }

}
