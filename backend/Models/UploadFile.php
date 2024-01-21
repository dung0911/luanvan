<?php
include( 'Db.class.php' );

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
            $baseUrl = 'http://127.0.0.1:8000/uploads//';
            $fullFilePath = $baseUrl . $uploadFilePath;

            return $fullFilePath;
        } else {
            // Xử lý thất bại, có thể xử lý lỗi hoặc trả về giá trị khác
            return false;
        }
    }
}
?>