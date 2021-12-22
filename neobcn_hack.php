<?php
/**
 * Càrrega de les constants personalitzades.
 */
require_once "neobcn_constants.php";

function neobcnInit(){
    $psr4 = new neobcn\CiPsr4Namespaces();
    $psr4->inicializar();
}