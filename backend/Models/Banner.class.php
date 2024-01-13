<?php
include( 'Db.class.php' );

class Banner extends Db
 {
    function getAll() {
        $sql = 'select * from banners';
        return $this->select( $sql );
    }
}
?>