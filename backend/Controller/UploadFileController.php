<?php
header( 'Access-Control-Allow-Origin: *' );
// include( '../Config/config.php' );
// include( '../Models/UploadFile.class.php' );

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

class UploadFile {
    public function handleUpload( $file ) {
        // Đảm bảo rằng tệp đã được tải lên
        if ( !isset( $file[ 'tmp_name' ] ) || empty( $file[ 'tmp_name' ] ) ) {
            return false;
        }

        // Thư mục đích để lưu trữ ảnh tải lên
        $uploadDirectory = 'uploads/';

        // Tạo tên file mới để tránh trùng lặp
        $fileName = uniqid( 'uploaded_', true ) . '_' . basename( $file[ 'name' ] );

        // Đường dẫn đầy đủ của tệp đã tải lên
        $uploadFilePath = $uploadDirectory . $fileName;

        // Di chuyển tệp tải lên đến thư mục đích
        if ( move_uploaded_file( $file[ 'tmp_name' ], $uploadFilePath ) ) {
            // Xử lý thành công, có thể trả về đường dẫn đầy đủ của tệp đã lưu
            $baseUrl = 'https://shopluanvan.x10.mx//';
            $fullFilePath = $baseUrl . $uploadFilePath;

            return $fullFilePath;
        } else {
            // Xử lý thất bại, có thể xử lý lỗi hoặc trả về giá trị khác
            return false;
        }
    }
}

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
