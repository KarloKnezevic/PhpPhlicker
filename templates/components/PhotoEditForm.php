<?php

namespace templates\components;

use oipa\view\AbstractView;

class PhotoEditForm extends AbstractView {

    private $photo;

    protected function outputHTML() {
        ?>

            <form action="<?php echo \route\Route::get("editPhoto")->generate(array("id"=>$this->photo->ID)); ?>" method="POST">
            <table align="center">
                <tr>
                    <td>New Photo Name:</td>
                    <td><input type="text" name="name" id="name" value="<?php echo $this->photo->name ?>"></td>
                </tr>
                <tr>
                    <td>New Photo Description:</td>
                    <td><textarea rows="4" cols="50" name="description" id="description"><?php echo $this->photo->description ?></textarea></td>
                </tr>
                <tr>
                    <td>New Tag:</td>
                    <td> <input type="text" name="tag" id="tag"></td>
                </tr>
                <tr>
                    <td>Select New Gallery</td>


                    <?php
                    $user = user();
                    $gallery = new \models\Gallery();
                    $galleries = $gallery->loadAll("WHERE id_user = " . $user->ID);

                    $selection_options = array();
                    for ($i = 0; $i < count($galleries); $i++) {

                        if ($this->photo->id_gallery === $galleries[$i]->ID) {
                            $selection_options[$i] = create_element("option", array(
                                "value" => $galleries[$i]->ID,
                                "contents" => __($galleries[$i]->name),
                                "selected" => "true"
                            ));
                            continue;
                        }

                        $selection_options[$i] = create_element("option", array(
                            "value" => $galleries[$i]->ID,
                            "contents" => __($galleries[$i]->name))
                        );
                    }
                    ?>

                    <td><?php
                        echo create_select(
                                array("name" => "gallery_id",
                                    "contents" => $selection_options));
                        ?></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="pid" value="<?php echo $this->photo->ID; ?>"> </td>
                    <td><input type="submit" value="Save changes"></td>
                </tr>
            </table>
        </form>

        <?php
        $tags = new \models\ImgTag();
        $tagCollection = $tags->loadAll("WHERE id_image = " . $this->photo->getPrimaryKey());

        if (null === $tagCollection) {
            echo "Image has no tags.";
        } else {
            echo "Image tags: ";
            foreach ($tagCollection as $tag) {
                echo "Tag: " . $tag->tag . ", ";
            }
        }
        ?>


        <?php
    }

    public function setPhoto(\models\Image $photo) {
        $this->photo = $photo;
        return $this;
    }

}