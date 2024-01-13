<?php
header( 'Access-Control-Allow-Origin: *' );
include( '../Config/config.php' );
include( '../Models/Banner.class.php' );

$action = isset( $_GET[ 'action' ] ) ? $_GET[ 'action' ] : '';
$banner = new Banner();
$message = array();
switch ( $action ) {
    case 'getAll':
    $message = $banner->getAll();
    break;
}

header( 'Content-Type: application/json; charset=utf-8' );
ob_clean();
echo json_encode( $message );
?>