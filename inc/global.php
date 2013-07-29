<?php

require_once dirname(__FILE__) . '/../db/DBPool.php';
require_once 'func.php';

$sessionName = "SSPkk44356";

//imenuj sjednicu (postavi ime kolačića)
session_name($sessionName);
//započni sjednicu s klijentom
session_start();

spl_autoload_register(function ($classname) {
            $fileName = "./" . str_replace("\\", "/", $classname) . ".php";
            if (!is_readable($fileName)) {
                return false;
            }

            require_once $fileName;

            return true;
        }
);

require_once "route.php";