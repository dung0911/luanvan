<?php
include( 'Db.class.php' );

class WishList extends Db
 {
    function getAllByUser( $user_id ) {
        $sql = 'select * from wishlists w inner join products p on p.id = w.product_id where user_id = ? group by product_id';
        $data = $this->select( $sql, array( $user_id ) );
        return $data;
    }

    function insertWishlist( $productID, $user_id ) {
        $sql = 'INSERT INTO `wishlists`(`product_id`, `user_id`) VALUES (?,?)';
        return $this->insert( $sql, array( $productID, $user_id ) );
    }

    function deleteWishlists( $user_id, $product_id ) {
        $sql = 'delete from wishlists where user_id = ? and product_id = ?';
        return $this->insert( $sql, array( $user_id, $product_id ) );
    }
}
?>