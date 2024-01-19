<?php
header( 'Access-Control-Allow-Origin: *' );
// header( 'Content-Type: application/json;' );
// header( 'Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS' );
// header( 'Access-Control-Max-Age: 3600' );
// header( "Access-Control-Allow-Headers: Content-Type,
//     Access-Control-Allow-Headers, Authorization, X-Requested-With" );

include( '../Config/config.php' );
// include( '../Models/Db.class.php' );
// include( '../Models/Pages.class.php' );

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

class Pages extends Db
 {
    function getAll() {
        $sql = 'select * from posts';
        return $this->select( $sql );
    }

    function getByID( $blogId ) {
        $sql = 'select * from posts where id = ?';
        $data = $this->select( $sql, array( $blogId ) );
        return ( $data != null )?$data[ 0 ]:null;
    }

    function getAllPostByCategory( $post_cat_id ) {
        $sql = 'select po.id, po.title, po.photo, po.description from posts po inner join post_categories post_cat on post_cat.id = po.post_cat_id where po.post_cat_id = ?';
        $data = $this->select( $sql, array( $post_cat_id ) );
        return $data;
    }

    function findByTitle( $title ) {
        $title = "'%".$title."%'";
        $sql = 'select * from posts where title like '.$title;
        $data = $this->select( $sql );
        return $data;
    }
}

$action = isset( $_GET[ 'action' ] ) ? $_GET[ 'action' ] : '';
$pages = new Pages();
$message = array();
switch ( $action ) {
    case 'getAll':
    $message = $pages->getAll();
    break;
    case 'getByID':
    $blogId = $_GET[ 'blogId' ];
    $message = $pages->getByID( $blogId );
    break;
    case 'getAllPostByCategory':
    $post_cat_id = $_GET[ 'post_cat_id' ];
    $message = $pages->getAllPostByCategory( $post_cat_id );
    break;
    case 'findByTitle':
    $title = $_GET[ 'title' ];
    $message = $pages->findByTitle( $title );
    break;
}

header( 'Content-Type: application/json; charset=utf-8' );
ob_clean();
echo json_encode( $message );
?>