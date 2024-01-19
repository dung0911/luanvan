<?php
header( 'Access-Control-Allow-Origin: *' );
// include( '../Config/config.php' );
// include( '../Models/PostCategory.class.php' );

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

class PostCategory extends Db
 {
    function getAll() {
        $sql = 'select * from post_categories';
        return $this->select( $sql );
    }

    function getAllPostByCategory( $post_cat_id ) {
        $sql = 'select po.id, po.title, po.photo, po.description, po.slug, po.created_at, po.added_by from posts po inner join post_categories post_cat on post_cat.id = po.post_cat_id where po.post_cat_id = ?';
        $data = $this->select( $sql, array( $post_cat_id ) );
        return $data;
    }
}

$action = isset( $_GET[ 'action' ] ) ? $_GET[ 'action' ] : '';
$products = new PostCategory();
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
