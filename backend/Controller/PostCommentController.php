<?php
header( 'Access-Control-Allow-Origin: *' );
include( '../Config/config.php' );
include( '../Models/PostComment.class.php' );

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

// class PostComment extends Db
//  {
//     function getByIDCom( $post_id ) {
//         $sql = "SELECT * FROM `post_comments`po inner join users u on u.id = po.user_id inner join posts post on po.post_id = post.id where po.post_id = ? and po.status ='active'";
//         $data = $this->select( $sql, array( $post_id ) );
//         return $data;
//     }

//     function getAllComment() {
//         $sql = "select * from post_comments where status ='active'";
//         return $this->select( $sql );
//     }

//     function getCommentByUser( $user_id ) {
//         $sql = "SELECT * FROM post_comments where user_id = ? where status ='active'";
//         $data = $this->select( $sql, array( $post_id ) );
//         return ( $data != null )?$data[ 0 ]:null;
//     }

//     function insertComment( $user_id, $post_id, $comment ) {
//         $sql = 'INSERT INTO `post_comments`(`user_id`, `post_id`, `comment`) VALUES (?,?,?)';
//         return $this->insert( $sql, array( $user_id, $post_id, $comment ) );
//     }
// }
$action = isset( $_GET[ 'action' ] ) ? $_GET[ 'action' ] : '';
$products = new PostComment();
$message = array();
switch ( $action ) {
    case 'getAllComment':
    $message = $products->getAllComment();
    break;
    case 'getByIDCom':
    $post_id = $_GET[ 'post_id' ];
    $message = $products->getByIDCom( $post_id );
    break;
    case 'getCommentByUser':
    $user_id = $_GET[ 'user_id' ];
    $message =  ( $products->getCommentByUser( $user_id ) > 0 )?true:false;
    break;
    case 'insertComment':
    $user_id = $_GET[ 'user_id' ];
    $post_id = $_GET[ 'post_id' ];
    $comment = $_GET[ 'comment' ];
    $message = ( $products->insertComment( $user_id, $post_id, $comment ) > 0 )?true:false;
    break;

}

header( 'Content-Type: application/json; charset=utf-8' );
ob_clean();
echo json_encode( $message );
?>
