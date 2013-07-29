<?php

namespace templates;

use oipa\view\AbstractView;

include_once dirname(__FILE__) . '/../lib/HtmlLibrary.php';

class Index extends AbstractView {

    protected function outputHTML() {
        ?>

        <p><a href="<?php echo \route\Route::get("login")->generate(); ?>" title="Login">Login</a></p>
        <p><a href="<?php echo \route\Route::get("register")->generate(); ?>" title="Register">Register</a></p>

        <?php
        $image = new \models\Image();
        $imageCollection = $image->loadAll();

        if (null === $imageCollection) {
            return;
        }

        shuffle($imageCollection);
        $n = count($imageCollection);
        $imagesOnPage = 50;
        $imagesPerLine = 10;
        ?>
        <div align="center">
            <?php
            for ($i = 0; $i < $imagesOnPage; $i++) {
                if ($i % $imagesPerLine === 0) {
                    ?>
                    <br/>
                    <?php
                }
                echo create_element("a", array(
                    "href" => \route\Route::get("viewPhoto")->generate(array("id"=>$imageCollection[$i % $n]->ID)),
                    "contents" => create_element("img", array(
                        "src" => \route\Route::get("photoRetrieval")->generate(array("id" => $imageCollection[$i % $n]->ID, "size" => "small")),
                        "alt" => $imageCollection[$i % $n]->description,
                        "title" => $imageCollection[$i % $n]->name
                ))));
            }
            ?>
        </div>
        <?php
    }

}
