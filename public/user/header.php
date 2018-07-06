<?php
include_once("../../../app/conf/App.php");
use \app\conf\App;
use \app\inc\Session;

new App();
Session::start();
\app\models\Database::setDb("mapcentia");
$sTable = 'users';
if ((isset($_SESSION['zone']))) {
    $prefix = (isset(App::$param['domainPrefix']) ? App::$param['domainPrefix'] : "") . $_SESSION['zone'] . ".";
} else {
    $prefix = "";
}
if (isset(App::$param['domain'])) {
    $host = "//" . $prefix . App::$param['domain'] . ":" . $_SERVER['SERVER_PORT'];
} else {
    $host = App::$param['host'];
}

if (isset(App::$param['cdnSubDomain'])) {
    $bits = explode("://", $host);
    $cdnHost = $bits[0] . "://" . App::$param['cdnSubDomain'] . "." . $bits[1];
} else {
    $cdnHost = $host;
}