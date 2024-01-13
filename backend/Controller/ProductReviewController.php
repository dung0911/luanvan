<?php
header( 'Access-Control-Allow-Origin: *' );
include( '../Config/config.php' );
include( '../Models/ProductReview.class.php' );

$action = isset( $_GET[ 'action' ] ) ? $_GET[ 'action' ] : '';
$products = new ProductReview();
$message = array();
switch ( $action ) {
    case 'getCommentByID':
    $product_id = $_GET[ 'product_id' ];
    $message = $products->getCommentByID( $product_id );
    break;

    case 'insertComment':
    $user_id = $_GET[ 'user_id' ];
    $product_id = $_GET[ 'product_id' ];
    $review = $_GET[ 'review' ];
    $message = ( $products->insertComment( $user_id, $product_id, $review ) > 0 )?true:false;
    break;

}

header( 'Content-Type: application/json; charset=utf-8' );
ob_clean();
echo json_encode( $message );
?>
