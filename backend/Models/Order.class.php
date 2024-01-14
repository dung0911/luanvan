<?php
include( 'Db.class.php' );

class Order extends Db
 {
    function insertOrder( $order_number, $user_id, $sub_total, $shipping_id, $coupon, $total_amount, $quantity, $payment_method, $payment_status, $first_name, $last_name,
    $email, $phone, $country, $post_code, $address1, $address2 ) {
        $sql = 'INSERT INTO `orders`( `order_number`, `user_id`, `sub_total`, `shipping_id`, `coupon`, `total_amount`, `quantity`, `payment_method`, `payment_status`, `first_name`,
        `last_name`, `email`, `phone`, `country`, `post_code`, `address1`, `address2` )
        VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? )';
        return  $this->insert( $sql, array( $order_number, $user_id, $sub_total, $shipping_id, $coupon, $total_amount, $quantity, $payment_method, $payment_status, $first_name, $last_name,
        $email, $phone, $country, $post_code, $address1, $address2 ) );
    }

    function getOrderByUser( $user_id ) {
        $sql = 'select * from orders where user_id = ? order by status';
        $data = $this->select( $sql, array( $user_id ) );
        return $data;
    }

    function getOrderById( $id ) {
        $sql = 'select * from orders where id = ? order by status';
        $data = $this->select( $sql, array( $id ) );
        return $data;
    }

    function getShipFromOrderId( $id ) {
        $sql = 'select s.price from shippings s inner join orders o on s.id = o.shipping_id where o.id = ?';
        $data = $this->select( $sql, array( $id ) );
        return $data;
    }

    public function insertOrder2( $order_number, $user_id, $sub_total, $shipping_id, $coupon, $total_amount, $quantity, $payment_method, $payment_status, $first_name, $last_name, $email, $phone, $country, $post_code, $address1, $address2 ) {
        $sql = 'INSERT INTO `orders`(`order_number`, `user_id`, `sub_total`, `shipping_id`, `coupon`, `total_amount`, `quantity`, `payment_method`, `payment_status`, `first_name`, `last_name`, `email`, `phone`, `country`, `post_code`, `address1`, `address2`)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?) ON DUPLICATE KEY UPDATE `order_number` = `order_number` + 1';

        $result = $this->insert2( $sql, array( $order_number, $user_id, $sub_total, $shipping_id, $coupon, $total_amount, $quantity, $payment_method, $payment_status, $first_name, $last_name, $email, $phone, $country, $post_code, $address1, $address2 ) );
        if ( $result[ 'rowCount' ] > 0 ) {
            return [ 'message' => true, 'id' => $result[ 'lastInsertId' ] ];
        } else {
            return [ 'message' => false, 'id' => $result[ 'lastInsertId' ] ];
        }
    }

    function updateOrder( $status, $id ) {
        $sql = 'UPDATE `orders` SET `status`=?  WHERE id = ?';
        return $this->update( $sql, array( $status, $id ) );
    }

}
?>