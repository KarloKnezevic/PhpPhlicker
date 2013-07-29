<?php

namespace templates;

use \oipa\view\AbstractView;

class Main extends AbstractView {

    /**
     *
     * @var type string
     */
    private $title;

    /**
     *
     * @var type mixed
     */
    private $body;

    protected function outputHTML() {
        ?>
        <!doctype html>
        <html>
            <head>
                
    
    
                <title><?php echo $this->title; ?></title>
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta name="description" content="PHP SSP 2013">
                <meta name="author" content="Karlo Knezevic, karlo.knezevic@fer.hr">
                <link href="http://php.fer.hr/~kk44356/ssp/assets/css/bootstrap.css" rel="stylesheet">
                <script src="http://code.jquery.com/jquery.js"></script>
                <script src="http://php.fer.hr/~kk44356/ssp/assets/js/bootstrap.js"></script>
            </head>
            <body bgcolor="#99FFFF">
                <table width="100%">
                    <tr>
                        <td align="left"><img src="http://php.fer.hr/~kk44356/ssp/assets/img/phlickr_small_dots.png" alt="Phlickr"></td>
                        <td align="left"><h1><?php echo $this->title; ?></h1></td>
                        <?php if (isLoggedIn()) { ?>
                            <td align="center"><?php echo new Search(); ?></td>
                            <td align="right"><a href="<?php echo \route\Route::get("logout")->generate(); ?>" title="Logout"><button class="btn btn-danger" type="button">Logout</button></a></td>
                        <?php } else { ?>
                            <td align="right"><a href="<?php echo \route\Route::get("index")->generate(); ?>" title="Phlicker"><button class="btn btn-primary" type="button">Phlicker</button></a></td>
                            <td align="right"><a href="<?php echo \route\Route::get("login")->generate(); ?>" title="Login"><button class="btn btn-success" type="button">Login</button></a></td>
                        <?php } ?>
                    </tr>
                </table>

                <hr/>
                <?php if (isLoggedIn()) { ?>
                    <table>
                        <tr>
                            <td><a href="<?php echo \route\Route::get("home")->generate(); ?>"><button class="btn btn-primary" type="button">Home</button></a></td>
                            <td><a href="<?php echo \route\Route::get("galleryList")->generate(); ?>"><button class="btn btn-primary" type="button">Galleries</button></a></td>
                            <td><a href="<?php echo \route\Route::get("photoList")->generate(); ?>"><button class="btn btn-primary" type="button">Photos</button></a></td>
                            <td><a href="<?php echo \route\Route::get("addGallery")->generate(); ?>"><button class="btn btn-primary" type="button">Add Gallery</button></a></td>
                            <td><a href="<?php echo \route\Route::get("addPhoto")->generate(); ?>"><button class="btn btn-primary" type="button">Add Photo</button></a></td>
                        </tr>
                    </table>
                    <hr/>
                <?php } ?>
                <?php
                try {
                    echo $this->body;
                } catch (oipa\model\NotFoundException $e) {
                    ?>
                    <img src="assets/img/404notfound.png" alt="Phlickr">
                    <?php
                } catch (\Exception $e) {
                    ?>
                    <img src="assets/img/error.png" alt="Phlickr">
                    <?php
                }
                ?>

            </body>
        </html>

        <?php
    }

    public function setTitle($title) {
        $this->title = $title;
        return $this;
    }

    public function setBody($body) {
        $this->body = $body;
        return $this;
    }

}
