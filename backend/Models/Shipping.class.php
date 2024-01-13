<?php
include( 'Db.class.php' );

class Shipping extends Db
 {
    function getAll() {
        $sql = "select * from shippings where status = 'active'";
        return $this->select( $sql );
    }
}
?>