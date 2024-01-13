<?php
include( 'Db.class.php' );

class Coupon extends Db
 {
    function getAll() {
        $sql = "select * from coupons where status = 'active'";
        return $this->select( $sql );
    }
}
?>