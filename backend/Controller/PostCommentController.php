<?php
header( 'Access-Control-Allow-Origin: *' );
include( '../Config/config.php' );
include( '../Models/PostComment.class.php' );

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
