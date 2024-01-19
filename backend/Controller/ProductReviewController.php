<?php
header( 'Access-Control-Allow-Origin: *' );
// include( '../Config/config.php' );
// include( '../Models/ProductReview.class.php' );

$databaseConfig = [
    'host' => '127.0.0.1',
    'port' => '3306',
    'database' => 'diyadblz_lvtn',
    'username' => 'diyadblz_lvtn',
    'password' => '123456',
];
try {
    $pdo = new PDO(
        "mysql:host={$databaseConfig['host']};port={$databaseConfig['port']};dbname={$databaseConfig['database']}",
        $databaseConfig[ 'username' ],
        $databaseConfig[ 'password' ]
    );

    // Thực hiện các truy vấn SQL bằng PDO
    $stmt = $pdo->query( 'SELECT * FROM users' );
    $result = $stmt->fetchAll( PDO::FETCH_ASSOC );

    // In ra màn hình kết quả
    echo json_encode( $result );
} catch ( PDOException $e ) {
    // Xử lý lỗi kết nối
    echo 'Connection failed: ' . $e->getMessage();
}

class ProductReview extends Db
 {
    function getCommentByID( $product_id ) {
        $sql = "SELECT * FROM product_reviews where product_id = ? and status = 'active' ";
        $data = $this->select( $sql, array( $product_id ) );
        return $data;
    }

    function insertComment( $user_id, $product_id, $review ) {
        $sql = 'INSERT INTO `product_reviews`(`user_id`, `product_id` ,`review`) VALUES (?,?,?)';
        return $this->insert( $sql, array( $user_id, $product_id, $review ) );
    }
}

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
