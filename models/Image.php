<?php

namespace models;

use oipa\model\AbstractDBModel;

class Image extends AbstractDBModel {

    private $id;

    public function getColumns() {
        return array("id_gallery", "name", "description", "views", "image", "format");
    }

    public function getPrimaryKeyColumn() {
        return "ID";
    }

    public function getTable() {
        return "image";
    }

    public function getIm($id, $size) {
        $this->id = $id;

        switch ($size) {
            case "original": return $this->original();
                break;
            case "small": return $this->small();
                break;
            case "medium": return $this->medium();
                break;
            default: return $this->original();
        }
    }

    public function fileType() {
        $this->load($this->id);
        return $this->format;
    }

    private function original() {

        $this->load($this->id);

        $im = imagecreatefromstring($this->image);
        return $im;
    }

    private function small() {
        return $this->resizeOriginal(64, 64);
    }

    private function medium() {
        return $this->resizeOriginal(128, 128);
    }

    private function resizeOriginal($w, $h) {
        $original = $this->original();
        $width = imagesx($original);
        $height = imagesy($original);
        $sizew = $w;
        $sizeh = $h;
        $resized = imagecreatetruecolor($sizew, $sizeh);
        imagecopyresized($resized, $original, 0, 0, 0, 0, $sizew, $sizeh, $width, $height);
        return $resized;
    }

}
