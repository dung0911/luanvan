<?php
header( 'Access-Control-Allow-Origin: *' );
include( '../Config/config.php' );
include( '../Models/OrderDetail.class.php' );

$action = isset( $_GET[ 'action' ] ) ? $_GET[ 'action' ] : '';
$products = new OrderDetail();
$message = array();
switch ( $action ) {
    case 'insertOrderDetail':
    $product_id = $_GET[ 'product_id' ];
    $order_id = $_GET[ 'order_id' ];
    $user_id = $_GET[ 'user_id' ];
    $price = $_GET[ 'price' ];
    $quantity = $_GET[ 'quantity' ];
    $amount = $_GET[ 'amount' ];
    $size = $_GET[ 'size' ];

    $message = ( $products->insertOrderDetail( $product_id, $order_id, $user_id, $price, $quantity, $amount, $size ) > 0 )?true:false;
    break;
    case 'getOrderByID':
    $order_id = $_GET[ 'order_id' ];
    $message = $products->getOrderByID( $order_id );
    break;
}

header( 'Content-Type: application/json; charset=utf-8' );
ob_clean();
echo json_encode( $message );
?>