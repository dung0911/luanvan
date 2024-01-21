<?php
include( 'Db.class.php' );

class OrderDetail extends Db
 {
    function insertOrderDetail( $product_id, $order_id, $user_id, $price, $quantity, $amount, $size ) {
        $sql = 'INSERT INTO `carts`( `product_id`, `order_id`, `user_id`, `price`, `quantity`, `amount`, `size`) VALUES ( ?, ?, ?, ?, ?, ?,?)';
        return $this->insert( $sql, array( $product_id, $order_id, $user_id, $price, $quantity, $amount, $size ) );
    }

    function getOrderByID( $order_id ) {
        $sql = 'SELECT ca.size, ca.price, ca.quantity, ca.amount, ca.order_id, ca.product_id, pro.title, pro.price FROM `carts` ca INNER JOIN products pro on ca.product_id = pro.id WHERE order_id = ?';
        $data = $this->select( $sql, array( $order_id ) );
        return $data;
    }
}
?>