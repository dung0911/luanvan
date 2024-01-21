<?php
header( 'Access-Control-Allow-Origin: *' );
header( 'Access-Control-Allow-Methods: POST, GET, OPTIONS' );
header( 'Access-Control-Allow-Headers: Content-Type' );
include( '../Config/config.php' );
include( '../Models/Order.class.php' );
// $databaseConfig = [
//     'host' => '127.0.0.1',
//     'port' => '3306',
//     'database' => 'diyadblz_lvtn',
//     'username' => 'diyadblz_lvtn',
//     'password' => '123456',
// ];
// try {
//     $pdo = new PDO(
//         "mysql:host={$databaseConfig['host']};port={$databaseConfig['port']};dbname={$databaseConfig['database']}",
//         $databaseConfig[ 'username' ],
//         $databaseConfig[ 'password' ]
//     );

//     // Thực hiện các truy vấn SQL bằng PDO
//     $stmt = $pdo->query( 'SELECT * FROM users' );
//     $result = $stmt->fetchAll( PDO::FETCH_ASSOC );

//     // In ra màn hình kết quả
//     echo json_encode( $result );
// } catch ( PDOException $e ) {
//     // Xử lý lỗi kết nối
//     echo 'Connection failed: ' . $e->getMessage();
// }

// class Order extends Db
//  {
//     function insertOrder( $order_number, $user_id, $sub_total, $shipping_id, $coupon, $total_amount, $quantity, $payment_method, $payment_status, $first_name, $last_name,
//     $email, $phone, $country, $post_code, $address1, $address2 ) {
//         $sql = 'INSERT INTO `orders`( `order_number`, `user_id`, `sub_total`, `shipping_id`, `coupon`, `total_amount`, `quantity`, `payment_method`, `payment_status`, `first_name`,
//         `last_name`, `email`, `phone`, `country`, `post_code`, `address1`, `address2` )
//         VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? )';
//         return  $this->insert( $sql, array( $order_number, $user_id, $sub_total, $shipping_id, $coupon, $total_amount, $quantity, $payment_method, $payment_status, $first_name, $last_name,
//         $email, $phone, $country, $post_code, $address1, $address2 ) );
//     }

//     function getOrderByUser( $user_id ) {
//         $sql = 'select * from orders where user_id = ? order by status';
//         $data = $this->select( $sql, array( $user_id ) );
//         return $data;
//     }

//     function getOrderById( $id ) {
//         $sql = 'select * from orders where id = ? order by status, created_at desc';
//         $data = $this->select( $sql, array( $id ) );
//         return $data;
//     }

//     function getShipFromOrderId( $id ) {
//         $sql = 'select s.price from shippings s inner join orders o on s.id = o.shipping_id where o.id = ?';
//         $data = $this->select( $sql, array( $id ) );
//         return $data;
//     }

//     public function insertOrder2( $order_number, $user_id, $sub_total, $shipping_id, $coupon, $total_amount, $quantity, $payment_method, $payment_status, $first_name, $last_name, $email, $phone, $country, $post_code, $address1, $address2 ) {
//         $sql = 'INSERT INTO `orders`(`order_number`, `user_id`, `sub_total`, `shipping_id`, `coupon`, `total_amount`, `quantity`, `payment_method`, `payment_status`, `first_name`, `last_name`, `email`, `phone`, `country`, `post_code`, `address1`, `address2`)
//         VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?) ON DUPLICATE KEY UPDATE `order_number` = `order_number` + 1';

//         $result = $this->insert2( $sql, array( $order_number, $user_id, $sub_total, $shipping_id, $coupon, $total_amount, $quantity, $payment_method, $payment_status, $first_name, $last_name, $email, $phone, $country, $post_code, $address1, $address2 ) );
//         if ( $result[ 'rowCount' ] > 0 ) {
//             return [ 'message' => true, 'id' => $result[ 'lastInsertId' ] ];
//         } else {
//             return [ 'message' => false, 'id' => $result[ 'lastInsertId' ] ];
//         }
//     }

//     function updateOrder( $status, $id ) {
//         $sql = 'UPDATE `orders` SET `status`=?  WHERE id = ?';
//         return $this->update( $sql, array( $status, $id ) );
//     }

// }

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
