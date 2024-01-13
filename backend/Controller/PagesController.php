<?php
header( 'Access-Control-Allow-Origin: *' );
// header( 'Content-Type: application/json;' );
// header( 'Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS' );
// header( 'Access-Control-Max-Age: 3600' );
// header( "Access-Control-Allow-Headers: Content-Type,
//     Access-Control-Allow-Headers, Authorization, X-Requested-With" );

include( '../Config/config.php' );
include( '../Models/Db.class.php' );
include( '../Models/Pages.class.php' );

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