<?php
include( 'Db.class.php' );

class ProductReview extends Db
 {
    function getCommentByID( $product_id ) {
        $sql = "SELECT * FROM product_reviews where product_id = ? and status = 'active' ";
        $data = $this->select( $sql, array( $product_id ) );
        return $data;
    }

    function insertComment( $user_id, $product_id, $review ) {
        $sql = 'INSERT INTO `product_reviews`(`user_id`, `product_id` ,`review`) VALUES (?,?,?)';
        return $this->insert( $sql, array( $user_id, $product_id, $review ) );
    }
}
?>