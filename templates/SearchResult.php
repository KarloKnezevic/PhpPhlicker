<?php

namespace templates;

use oipa\view\AbstractView;
include_once dirname(__FILE__) . '/../lib/HtmlLibrary.php';

class SearchResult extends AbstractView {

    private $results;

    protected function outputHTML() {
        if (null === $this->results) {
            ?>
            <p>
                None image with requested tag is found.
            </p>
            <?php
            return;
        }
        ?>
        <table> 
            <?php
            foreach ($this->results as $res) {
                $imgID = $res->id_image;
                $image = new \models\Image();
                $image->load($imgID);
                ?>
                <tr>
                    <td><?php
                        echo create_element("a", array(
                            "href" => \route\Route::get("viewPhoto")->generate(array("id"=>$image->ID)),
                            "contents" => create_element("img", array(
                                "src" => \route\Route::get("photoRetrieval")->generate(array("id" => $image->ID, "size" => "small")),
                                "alt" => $image->description,
                                "title" => $image->name
                        ))));
                        ?>
                    </td>
                    <td>
            <?php echo __($image->name) ?>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
        <?php
    }

    public function setResults($sr) {
        $this->results = $sr;
        return $this;
    }

}
