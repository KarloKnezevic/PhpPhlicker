<?php

namespace templates;

use oipa\view\AbstractView;

include_once dirname(__FILE__) . '/../lib/HtmlLibrary.php';

class ViewPhoto extends AbstractView {

    private $photoID;

    protected function outputHTML() {

        $image = new \models\Image();
        $image->load($this->photoID);
        $image->views += 1;
        $image->save();

        ?>
        <p>Here you can better take a look photo, photo statistics and also make a comment.</p>
        <p>Views number: <?php echo $image->views; ?></p>
        <p>Image name: <?php echo $image->name; ?></p>
        <p>Views description: <?php echo $image->description; ?></p>
        <div align="center">
            <?php
            echo create_element("img", array(
                "src" => \route\Route::get("photoRetrieval")->generate(array("id" => $this->photoID, "size" => "original")),
                "alt" => $image->description,
                "title" => $image->name
            ));
            ?>
        </div>
        <?php
        echo new components\CommentForm(array(
    "photoID" => $this->photoID
        ));
        ?>
        <p>Previous comments:</p>
        <?php
        $comment = new \models\Comment();
        $commentCollection = $comment->loadAll("WHERE id_image = " . $this->photoID);
        if (null === $commentCollection) {
            ?>
            <p>No comments so far...</p>
            <?php
            return;
        }
        ?>
        <table align="center">
            <tr>
                <th>User</th>
                <th>Comment</th>
                <th>Time</th>
            </tr>
            <?php
            foreach ($commentCollection as $comm) {
                $user = new \models\User();
                $user->load($comm->id_user);
                ?>
                <tr>
                    <td><?php echo __($user->username); ?></td>
                    <td><?php echo $this->smartParser($comm->comment); ?></td>
                    <td><?php echo $comm->time; ?></td>
                </tr>
            <?php }
            ?>
        </table>
        <?php
    }
    
    private function smartParser($text) {
        
        $text = __($text);
        
        if (preg_match('/([\*\*]+)([\w|\s|\W]+)\1/', $text)) {
            $text = preg_replace('/([\*\*]+)([\w|\s|\W]+)\1/', '<b>$2</b>', $text);
        }
        
        if (preg_match('$([//]+)([\w|\s|\W]+)\1$', $text)) {
            $text = preg_replace('$([//]+)([\w|\s|\W]+)\1$', '<i>$2</i>', $text);
        }
        
        if (preg_match('/\[u\]([\w|\s|\W]+)\[\\\\u\]/', $text)) {
            $text = preg_replace('/\[u\]([\w|\s|\W]+)\[\\\\u\]/', '<u>$1</u>', $text);
        }
        
        $text = str_replace(":)", "<img src=\"http://www.hscripts.com/freeimages/icons/web-basic-icons/happy-smiley/smiley2.gif\" alt=\"Smile\">", $text);
        $text = str_replace(":(", "<img src=\"http://www.pcflank.com/img/i_smile3.gif\" alt=\"Sad\">", $text);
        $text = str_replace(":O", "<img src=\"http://www.madamechocolate.com/images/smile_sm.png\" alt=\"O\">", $text);
        $text = str_replace(":-)", "<img src=\"http://media-cache-ec4.pinimg.com/avatars/emismile4music-1362967337_30.jpg\" alt=\"Smile\">", $text);
        $text = str_replace(":-(", "<img src=\"http://www.cad-forums.com/public/style_emoticons/default/smile02.gif\" alt=\"Sad\">", $text);
        $text = str_replace(":-O", "<img src=\"http://th106.photobucket.com/albums/m249/Blue_Farce/monkey%20emotes/Yellows/th_smile.jpg\" alt=\"O\">", $text);

        return $text;
       
    }

    public function setPhotoID($pid) {
        $this->photoID = $pid;
        return $this;
    }

}