<?php
header( 'Access-Control-Allow-Origin: *' );
include( '../Config/config.php' );
include( '../Models/WishList.class.php' );

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

// class WishList extends Db
//  {
//     function getAllByUser( $user_id ) {
//         $sql = 'select * from wishlists w inner join products p on p.id = w.product_id where user_id = ? group by product_id';
//         $data = $this->select( $sql, array( $user_id ) );
//         return $data;
//     }

//     function insertWishlist( $productID, $user_id ) {
//         $sql = 'INSERT INTO `wishlists`(`product_id`, `user_id`) VALUES (?,?)';
//         return $this->insert( $sql, array( $productID, $user_id ) );
//     }

//     function deleteWishlists( $user_id, $product_id ) {
//         $sql = 'delete from wishlists where user_id = ? and product_id = ?';
//         return $this->insert( $sql, array( $user_id, $product_id ) );
//     }
// }

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
