<?php
include( 'Db.class.php' );

class Color extends Db
 {
    function getAll() {
        $sql = 'select * from colors';
        return $this->select( $sql );
    }
}
?>