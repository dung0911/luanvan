<?php
include('config.php');

// Thử kết nối đến cơ sở dữ liệu
$conn = mysqli_connect($configDB['host'], $configDB['username'], $configDB['password'], $configDB['database']);

// Kiểm tra kết nối
if (!$conn) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . mysqli_connect_error());
}

// Viết câu truy vấn SQL
$sql = "SELECT * FROM products";

// Thực hiện truy vấn
$result = mysqli_query($conn, $sql);

// Kiểm tra và in ra dữ liệu
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        print_r($row);
    }
} else {
    die("Lỗi truy vấn SQL: " . mysqli_error($conn));
}

// Đóng kết nối
mysqli_close($conn);
?>
