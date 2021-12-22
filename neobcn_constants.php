<?php  defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Paquet de llibreries pròpies
 */
const SMAPSDK = APPPATH . "SmapSDK" . DIRECTORY_SEPARATOR;

/**
 * Enrutador personalitzat
 */
const SMAPSDK_ROUTINGS = APPPATH . "SmapSDK\\Router\\routings.php";

/**
 * Directori de vistes per a poder migrar de projecte sense haver de refactoritzar el codi.
 */
const SMAPSDKVIEWS = SMAPSDK . "Views\\";

/**
 * Paquet del DOM
 */
const WEBSITE = SMAPSDK . "Html\\Dom\\";

/**
 * Paquet de templates responsive.
 */
const MENUSWEB = SMAPSDK . "Html\\Sources\\Navegacio\\templates\\";

/**
 * Ruta als assets
 */
const ASSETS_PATH = 'assets' . DIRECTORY_SEPARATOR;

/**
 * Ruta al directori de les imatges
 */
const ASSETS_IMATGES_PATH = 'assets' . DIRECTORY_SEPARATOR . 'imatges' . DIRECTORY_SEPARATOR;

/**
 * Defineix l'entorn de desenvolupament
 */
const ENTORN_DEV = 'development';

/**
 * Determina si l'enviament d'alertes via E-mail, està actiu (TRUE) o no (FALSE).
 */
const ACTIVAR_ALERTES_VIA_EMAIL = FALSE;

/**
 * Defineix el títol de l'aplicatiu.
 */
const TITOL_APLICACIO = "";

/**
 * Defineix el nóm de domini de l'aplicatiu.
 */
const DOMINI_APLICACIO = ( ENVIRONMENT == ENTORN_DEV ) ? "DEVELOPMENT" : "PRODUCTION";

/**
 * Defineix el nom de la connexió a la Base de Dades per defecte.
 */
const BD_DEFECTE = 'default';