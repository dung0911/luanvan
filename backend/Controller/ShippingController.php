<?php
header( 'Access-Control-Allow-Origin: *' );
// include( '../Config/config.php' );
// include( '../Models/Shipping.class.php' );

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

class Shipping extends Db
 {
    function getAll() {
        $sql = "select * from shippings where status = 'active'";
        return $this->select( $sql );
    }
}

$action = isset( $_GET[ 'action' ] ) ? $_GET[ 'action' ] : '';
$products = new Shipping();
$message = array();
switch ( $action ) {
    case 'getAll':
    $message = $products->getAll();
    break;
}

header( 'Content-Type: application/json; charset=utf-8' );
ob_clean();
echo json_encode( $message );
?>
