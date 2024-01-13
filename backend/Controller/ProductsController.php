<?php
header( 'Access-Control-Allow-Origin: *' );
include( '../Config/config.php' );
include( '../Models/Product.class.php' );

$action = isset( $_GET[ 'action' ] ) ? $_GET[ 'action' ] : '';
$products = new Product();
$message = array();
switch ( $action ) {
    case 'getAll':
    $message = $products->getAll();
    break;
    case 'getAllFeatureProducts':
    $message = $products->getAllFeatureProducts();
    break;
    case 'getByID':
    $productID = $_GET[ 'productID' ];
    $message = $products->getByID( $productID );
    break;
    case 'getByIDCat':
    $cat_id = $_GET[ 'cat_id' ];
    $message = $products->getByIDCat( $cat_id );
    break;
    case 'findByTitle':
    $title = $_GET[ 'title' ];
    $message = $products->findByTitle( $title );
    break;
    case 'updateProduct':
    $stock = $_GET[ 'stock' ];
    $id = $_GET[ 'id' ];

    $message = ( $products->updateProduct( $stock, $id ) > 0 )?true:false;
    break;
}

header( 'Content-Type: application/json; charset=utf-8' );
ob_clean();
echo json_encode( $message );
?>