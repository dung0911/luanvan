<?php
header( 'Access-Control-Allow-Origin: *' );
include( '../Config/config.php' );
include( '../Models/Category.class.php' );

$action = isset( $_GET[ 'action' ] ) ? $_GET[ 'action' ] : '';
$products = new Category();
$message = array();
switch ( $action ) {
    case 'getAll':
    $message = $products->getAll();
    break;
    case 'getByID':
    $id = $_GET[ 'id' ];
    $message = $products->getByID( $id );
    break;
}

header( 'Content-Type: application/json; charset=utf-8' );
ob_clean();
echo json_encode( $message );
?>