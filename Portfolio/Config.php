<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

define('ROOT_PATH', dirname(__FILE__));
define('JWT_KEY', 'chavedeseguranca');
define('SYSTEM_INFO', [
    'version' => '2.5.1',
    'dateVersion' => '02/12/2019'
]);
define('URL', '127.0.0.1/Clinicalsys');

# CONFIGURAÇÕES DO BANCO
define('DB_DRIVE', 'sqlite:banco/sistemas.db');
/*define('DB_HOST', 'localhost');
define('DB_DATABASE', 'db_clinicalsys');
define('DB_USER', 'brenno');
define('DB_PASSWORD', '123');*/