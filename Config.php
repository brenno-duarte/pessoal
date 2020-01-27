<?php

/*error_reporting(E_ALL);
ini_set("display_errors", 1);*/

if($_SERVER['REQUEST_URI'] == "/index.php"){
    header("Location: https://smwdigital.com.br");
    die();	
}

define('ROOT_PATH', dirname(__FILE__));
define('CONTACT', 'https://api.whatsapp.com/send?l=pt_pt&phone=5588997286802');