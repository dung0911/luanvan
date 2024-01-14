<?php
header( 'Access-Control-Allow-Origin: *' );
header( 'Access-Control-Allow-Methods: POST, GET, OPTIONS' );
header( 'Access-Control-Allow-Headers: Content-Type' );
include( '../Config/config.php' );
include( '../Models/Order.class.php' );

$action = isset( $_GET[ 'action' ] ) ? $_GET[ 'action' ] : '';
$products = new Order();
$message = array();

switch ( $action ) {
    case 'insertOrder':
    $order_number = $_GET[ 'order_number' ];
    $user_id = $_GET[ 'user_id' ];
    $sub_total = $_GET[ 'sub_total' ];
    $shipping_id = $_GET[ 'shipping_id' ];
    $coupon = $_GET[ 'coupon' ];
    $total_amount = $_GET[ 'total_amount' ];
    $quantity = $_GET[ 'quantity' ];
    $payment_method = $_GET[ 'payment_method' ];
    $payment_status = $_GET[ 'payment_status' ];
    $first_name = $_GET[ 'first_name' ];
    $last_name = $_GET[ 'last_name' ];
    $email = $_GET[ 'email' ];
    $phone = $_GET[ 'phone' ];
    $country = $_GET[ 'country' ];
    $post_code = $_GET[ 'post_code' ];
    $address1 = $_GET[ 'address1' ];
    $address2 = $_GET[ 'address2' ];

    $message = $products->insertOrder2( $order_number, $user_id, $sub_total, $shipping_id, $coupon, $total_amount, $quantity, $payment_method, $payment_status, $first_name, $last_name, $email, $phone, $country, $post_code, $address1, $address2 );
    break;

    case 'getOrderByUser':
    $user_id = $_GET[ 'user_id' ];
    $message = $products->getOrderByUser( $user_id );
    break;

    case 'getOrderById':
    $id = $_GET[ 'id' ];
    $message = $products->getOrderById( $id );
    break;

    case 'updateOrder':
    $id = $_GET[ 'id' ];
    $status = $_GET[ 'status' ];
    $message = $products->updateOrder( $status, $id );
    break;

    case 'getShipFromOrderId':
    $id = $_GET[ 'id' ];
    $message = $products->getShipFromOrderId( $id );
    break;
}

header( 'Content-Type: application/json; charset=utf-8' );
ob_clean();
echo json_encode( $message );
?>
