<?php
header( 'Access-Control-Allow-Origin: *' );
include( '../Config/config.php' );
include( '../Models/Coupon.class.php' );

$action = isset( $_GET[ 'action' ] ) ? $_GET[ 'action' ] : '';
$products = new Coupon();
$message = array();
switch ( $action ) {
    case 'getAll':
    $message = $products->getAll();
    break;
}

header( 'Content-Type: application/json; charset=utf-8' );
ob_clean();
echo json_encode( $message );
?>
