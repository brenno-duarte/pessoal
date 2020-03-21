<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

session_start();

if($_SERVER['REQUEST_URI'] == "/index.php"){
    header("Location: https://smwdigital.com.br");
    die();	
}

define('ROOT_PATH', dirname(__FILE__));
define('CONTACT', 'https://api.whatsapp.com/send?l=pt_pt&phone=5588997186408');

# URL Completa
define('URL_C', $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);

/*# Configurações do banco teste
define('DB_CONFIG', [
    'drive' => 'mysql',
    'host' => 'localhost',
    'dbname' => 'db_blog',
    'user' => 'brenno',
    'pass' => '123'
]);*/

# Configurações do banco servidor
define('DB_CONFIG', [
    'drive' => 'mysql',
    'host' => '162.241.3.14',
    'dbname' => 'smwdig14_smwdigital',
    'user' => 'smwdig14_brenno',
    'pass' => 'b3st1nth3w0rld@swmd1g1t4l'
]);

# INFO DO SISTEMA

define('SYSTEM_INFO', [
    'DEV' => 'SMW Digital',
    'VERSION' => '1.1.0',
    'DATE_UPDATE' => '21/04/2020'
]);

# EMPRESA LICENCIADA

define('LICENSED', 'SMW Digital');