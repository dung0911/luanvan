<?php
header( 'Access-Control-Allow-Origin: *' );
include( '../Config/config.php' );
include( '../Models/Product.class.php' );

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

// class Product extends Db
//  {
//     function getAll() {
//         $sql = 'select * from products';
//         return $this->select( $sql );
//     }

//     function getByID( $productID ) {
//         $sql = 'select * from products where id = ?';
//         $data = $this->select( $sql, array( $productID ) );
//         return ( $data != null )?$data[ 0 ]:null;
//     }

//     function getByIDCat( $cat_id ) {
//         $sql = 'select pro.photo, pro.title, pro.price, pro.size, pro.title, pro.id from products pro inner join categories cat on cat.id = pro.cat_id where pro.cat_id = ?';
//         $data = $this->select( $sql, array( $cat_id ) );
//         return $data;
//     }

//     function getAllFeatureProducts() {
//         $sql = 'select * from products where is_featured = 1';
//         return $this->select( $sql );
//     }

//     function findByTitle( $title ) {
//         $title = "'%".$title."%'";
//         $sql = 'select * from products where title like '.$title;
//         $data = $this->select( $sql );
//         return $data;
//     }

//     function updateProduct( $stock, $id ) {
//         $sql = 'UPDATE `products` SET `stock`= ? WHERE id = ?';
//         return $this->update( $sql, array( $stock, $id ) );
//     }
// }

$action = isset( $_GET[ 'action' ] ) ? $_GET[ 'action' ] : '';
$products = new Product();
$message = array();
switch ( $action ) {
    case 'getAll':
    $message = $products->getAll();
    break;
    case 'getAllFeatureProducts':
    $message = $products->getAllFeatureProducts();
    break;
    case 'getByID':
    $productID = $_GET[ 'productID' ];
    $message = $products->getByID( $productID );
    break;
    case 'getByIDCat':
    $cat_id = $_GET[ 'cat_id' ];
    $message = $products->getByIDCat( $cat_id );
    break;
    case 'findByTitle':
    $title = $_GET[ 'title' ];
    $message = $products->findByTitle( $title );
    break;
    case 'updateProduct':
    $stock = $_GET[ 'stock' ];
    $id = $_GET[ 'id' ];

    $message = ( $products->updateProduct( $stock, $id ) > 0 )?true:false;
    break;
}

header( 'Content-Type: application/json; charset=utf-8' );
ob_clean();
echo json_encode( $message );
?>