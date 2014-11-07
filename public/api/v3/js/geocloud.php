<?php
use \app\conf\App;
use \app\inc\Util;


header('Content-type: application/javascript');
include_once("../../../../app/conf/App.php");
new \app\conf\App();

// Set the host names if they are not set in App.php
App::$param['protocol'] = App::$param['protocol'] ?: Util::protocol();
App::$param['host'] = App::$param['host'] ?: App::$param['protocol'] . "://" . $_SERVER['SERVER_NAME'] . ":" . $_SERVER['SERVER_PORT'];

echo "window.geocloud_host = \"" . \app\conf\App::$param['host'] . "\";\n";
echo "window.geocloud_maplib = \"" . ((isset($_GET["maplib"])) ? $_GET["maplib"] : "leaflet") . "\";\n";
if (isset($_GET["callback"])) {
    echo "window.geocloud_callback = \"" . $_GET["callback"] . "\";\n";
    require_once('async_loader.js');

} else {
    require_once('sync_loader.js');
}