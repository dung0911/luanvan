<?php
header( 'Access-Control-Allow-Origin: *' );
include( '../Config/config.php' );
include( '../Models/WishList.class.php' );

$action = isset( $_GET[ 'action' ] ) ? $_GET[ 'action' ] : '';
$products = new WishList();
$message = array();
switch ( $action ) {
    case 'getAllByUser':
    $user_id = $_GET[ 'user_id' ];
    $message = $products->getAllByUser( $user_id );
    break;
    case 'insertWishlist':
    $productID = $_GET[ 'product_id' ];
    $user_id = $_GET[ 'user_id' ];
    $message = ( $products->insertWishlist( $productID, $user_id ) > 0 )?true:false;
    break;
    case 'deleteWishlists':
    $product_id = $_GET[ 'product_id' ];
    $user_id = $_GET[ 'user_id' ];
    $message = ( $products->deleteWishlists( $user_id, $product_id ) > 0 )?true:false;
    break;

}

header( 'Content-Type: application/json; charset=utf-8' );
ob_clean();
echo json_encode( $message );
?>
