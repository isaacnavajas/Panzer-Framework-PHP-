<?php

if (defined('__FILE__') && realpath(__FILE__) === realpath($_SERVER['SCRIPT_FILENAME'])) {
    http_response_code(403);
    echo "Acceso prohibido";
    exit(); 
}

ini_set('display_errors', 1);
error_reporting(E_ALL);

/*
* require_once('./Honoo/ORMHonoo/HelpersHonoo/passwordEncryption.php');
*
* Ejemplo para cifrar la password
* $key = "este_valor_tiene_que_ser_el_que_devuelve_el_metodo_randomKEY";
* $iv = "este_valor_tiene_que_ser_el_que_devuelve_el_metodo_randomIV"; 
* $password = "&Prueba77";
* $encryptionHelper = new EncryptionHelper($key, $iv);
* $randomKEY = $encryptionHelper->randomPseudoKEY();
* $randomIV = $encryptionHelper->randomPseudoIV();
* $encryptedPassword = $encryptionHelper->encrypt($password);
* var_dump("Este es el valor para el key:" . $randomKEY);
* var_dump("Este es el valor para el iv:" . $randomIV);
* var_dump("Este es el valor para la password:" . $encryptedPassword);
*/


require_once('./Honoo/kernel.php');

$myAppKernel = new Kernel();
$myAppKernel->coreRouter();
$myAppKernel->helpers();
$myAppKernel->env();


