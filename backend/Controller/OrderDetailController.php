<?php
header( 'Access-Control-Allow-Origin: *' );
include( '../Config/config.php' );
include( '../Models/OrderDetail.class.php' );

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

// class OrderDetail extends Db
//  {
//     function insertOrderDetail( $product_id, $order_id, $user_id, $price, $quantity, $amount, $size ) {
//         $sql = 'INSERT INTO `carts`( `product_id`, `order_id`, `user_id`, `price`, `quantity`, `amount`, `size`) VALUES ( ?, ?, ?, ?, ?, ?,?)';
//         return $this->insert( $sql, array( $product_id, $order_id, $user_id, $price, $quantity, $amount, $size ) );
//     }

//     function getOrderByID( $order_id ) {
//         $sql = 'SELECT * FROM `carts` ca INNER JOIN products pro on ca.product_id = pro.id WHERE order_id = ?';
//         $data = $this->select( $sql, array( $order_id ) );
//         return $data;
//     }
// }

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
