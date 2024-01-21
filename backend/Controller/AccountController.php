<?php
header( 'Access-Control-Allow-Origin: *' );
header( 'Content-Type: application/json;' );
header( 'Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS' );
header( 'Access-Control-Max-Age: 3600' );
header( "Access-Control-Allow-Headers: Content-Type,
    Access-Control-Allow-Headers, Authorization, X-Requested-With" );

include( '../Config/config.php' );
include( '../Models/Db.class.php' );
include( '../Models/Account.class.php' );

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

// class Account extends Db
//  {
//     function getAll() {
//         $sql = 'select * from users';
//         return $this->select( $sql );
//     }

//     function getByID( $id ) {
//         $sql = 'select * from users where id = ?';
//         $data = $this->select( $sql, array( $id ) );
//         return ( $data != null )?$data[ 0 ]:null;
//     }

//     function checkLogin( $email, $password ) {
//         $sql = 'SELECT * FROM `users` WHERE email = ?';
//         $userData = $this->select( $sql, array( $email ) );

//         if ( $userData ) {
//             // Lấy mật khẩu đã lưu trong cơ sở dữ liệu
//             $storedPasswordHash = $userData[ 0 ][ 'password' ];

//             // Kiểm tra mật khẩu đã nhập với mật khẩu đã lưu bằng bcrypt
//             if ( password_verify( $password, $storedPasswordHash ) ) {
//                 // Mật khẩu khớp, trả về dữ liệu người dùng
//                 return $userData[ 0 ];
//             } else {
//                 // Mật khẩu không khớp
//                 return null;
//             }
//         } else {
//             // Người dùng không tồn tại với email đã nhập
//             return null;
//         }
//     }

//     function checkEmailExisted( $email ) {
//         $sql = 'select * from `users` where email = ?';
//         $data = $this->select( $sql, array( $email ) );
//         return ( $data != null )?true:false;
//     }

//     function insertAccount( $name, $email, $password, $role ) {
//         $sql = 'INSERT INTO `users`(`name`, `email`, `password`, `role`) VALUES (?,?,?,?)';
//         return $this->insert( $sql, array( $name, $email, $password, $role ) );
//     }

//     function updateAccount( $name, $email, $password, $photo, $sodienthoai, $diachi, $quocgia, $id ) {
//         $sql = 'UPDATE `users` SET`name`=?,`email`=?,`password`=?,`photo`=?,`sodienthoai`=?,`diachi`=?,`quocgia`=?  WHERE id = ?';
//         return $this->update( $sql, array( $name, $email, $password, $photo, $sodienthoai, $diachi, $quocgia, $id ) );
//     }
// }


$action = isset( $_GET[ 'action' ] ) ? $_GET[ 'action' ] : '';
$account = new Account();
$message = array();
switch ( $action ) {
    case 'getAll':
    $message = $account->getAll();
    break;
    case 'getByID':
    $id = $_GET[ 'id' ];
    $message = $account->getByID( $id );
    break;
    case 'checkLogin':
    $email = $_GET[ 'email' ];
    $password = $_GET[ 'password' ];
    $message = $account->checkLogin( $email, $password );
    break;
    case 'checkEmailExisted':
    $email = $_GET[ 'email' ];
    $message = $account->checkEmailExisted( $email );
    break;
    case 'insertAccount':
    $name = $_GET[ 'name' ];
    $email = $_GET[ 'email' ];
    $password = password_hash( $_GET[ 'password' ], PASSWORD_BCRYPT );
    // Mã hóa mật khẩu bằng bcrypt
    $role = $_GET[ 'role' ];
    $message = ( $account->insertAccount( $name, $email, $password, $role ) > 0 )?true:false;
    break;
    case 'updateAccount':
    $name = $_GET[ 'name' ];
    $email = $_GET[ 'email' ];
    $password = password_hash( $_GET[ 'password' ], PASSWORD_BCRYPT );
    $photo = $_GET[ 'photo' ];
    $id = $_GET[ 'id' ];
    $sodienthoai = $_GET[ 'sodienthoai' ];
    $diachi = $_GET[ 'diachi' ];
    $quocgia = $_GET[ 'quocgia' ];

    $message = ( $account->updateAccount( $name, $email, $password, $photo, $sodienthoai, $diachi, $quocgia, $id ) > 0 )?true:false;
    break;
}

header( 'Content-Type: application/json; charset=utf-8' );
ob_clean();
echo json_encode( $message );
?>