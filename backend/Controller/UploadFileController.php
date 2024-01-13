<?php
header( 'Access-Control-Allow-Origin: *' );
include( '../Config/config.php' );
include( '../Models/UploadFile.class.php' );

$action = isset( $_GET[ 'action' ] ) ? $_GET[ 'action' ] : '';
$products = new UploadFile();
$message = array();
switch ( $action ) {
    case 'handleUpload':
    if ( $_SERVER[ 'REQUEST_METHOD' ] === 'POST' && isset( $_FILES[ 'file' ] ) ) {
        // Gọi phương thức handleUpload từ UploadFile Model
        $result = $uploadModel->handleUpload( $_FILES[ 'file' ] );

        if ( $result ) {
            // Upload thành công
            $message[ 'status' ] = 'success';
            $message[ 'url' ] = $result;
        } else {
            // Upload thất bại
            $message[ 'status' ] = 'error';
            $message[ 'message' ] = 'Failed to upload file.';
        }
    } else {
        // Yêu cầu không hợp lệ
        $message[ 'status' ] = 'error';
        $message[ 'message' ] = 'Invalid request.';
    }
    break;

}

header( 'Content-Type: application/json; charset=utf-8' );
ob_clean();
echo json_encode( $message );
?>
