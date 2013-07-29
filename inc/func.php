<?php

/**
 * Ispisuje siguran string od HTML koda.
 * @param string $v
 * @return string
 */
function __($v) {
    return htmlentities($v, ENT_QUOTES, "utf-8");
}

/**
 * Iz URL-a dohvaća parametar imena $v. Ukoliko parametra nema, null vraćen.
 * @param string $v
 * @param type $d
 * @return type
 */
function get($v, $d = null) {
    return isset($_GET[$v]) ? $_GET[$v] : $d;
}

/**
 * Iz tijela HTTP zahtjeva dohvaća parametar imena $v. 
 * Ukoliko parametra nema, null vraćen.
 * @param string $v
 * @param type $d
 * @return type
 */
function post($v, $d = null) {
    return isset($_POST[$v]) ? $_POST[$v] : $d;
}

/**
 * Provjera je li zahtjev POST. Ako je zahtjev POST, provjerava se postoji
 * li parametar naziva $key. Ako parametar ne postoji, null vraćen.
 * @param type $key
 * @return type
 */
function isPost($key = null) {
    if (null === $key) {
        return count($_POST) > 0;
    }

    return null !== post($key);
}

function paramExists($param) {
    if (null !== $param && !empty($param)) return true;
    return false;
}

/**
 * Usmjeravanje na URL.
 * @param type $url
 */
function redirect($url) {
    header("Location: " . $url);
    die();
}

/**
 * Provjera prijavljenosti korisnika.
 * @return type true ako je korisnik prijavljen, false inače
 */
function isLoggedIn() {
    return isset($_SESSION["userID"]);
}

function userID() {
    if (isLoggedIn()) {
        return $_SESSION["userID"];
    }
    
    return null;
}

function readImg($name) {
    $fp = fopen($name, 'r');
    $data = fread($fp, filesize($name));
    fclose($fp);
    return $data;
}

function user() {
    $user = new models\User();
    
    try {
        $user->load(userID());
    } catch (\oipa\model\NotFoundException $e) {
        return null;
    }
    
    return $user;
}
