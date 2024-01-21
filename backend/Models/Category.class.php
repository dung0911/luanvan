<?php
include( 'Db.class.php' );

class Category extends Db
 {
    function getAll() {
        $sql = 'select * from categories where is_parent = 0 ';
        return $this->select( $sql );
    }

    function getByID( $id ) {
        $sql = 'select * from categories where id = ? and is_parent = 0';
        $data = $this->select( $sql, array( $id ) );
        return ( $data != null )?$data[ 0 ]:null;
    }
}
?>