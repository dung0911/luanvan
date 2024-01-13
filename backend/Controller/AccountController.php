<?php
header( 'Access-Control-Allow-Origin: *' );
// header( 'Content-Type: application/json;' );
// header( 'Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS' );
// header( 'Access-Control-Max-Age: 3600' );
// header( "Access-Control-Allow-Headers: Content-Type,
//     Access-Control-Allow-Headers, Authorization, X-Requested-With" );

include( '../Config/config.php' );
include( '../Models/Db.class.php' );
include( '../Models/Account.class.php' );

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