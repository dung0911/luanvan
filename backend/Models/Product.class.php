<?php
include( 'Db.class.php' );

class Product extends Db
 {
    function getAll() {
        $sql = 'select * from products';
        return $this->select( $sql );
    }

    function getByID( $productID ) {
        $sql = 'select * from products where id = ?';
        $data = $this->select( $sql, array( $productID ) );
        return ( $data != null )?$data[ 0 ]:null;
    }

    function getByIDCat( $cat_id ) {
        $sql = 'select pro.photo, pro.title, pro.price, pro.size, pro.title, pro.id from products pro inner join categories cat on cat.id = pro.cat_id where pro.child_cat_id = ?';
        $data = $this->select( $sql, array( $cat_id ) );
        return $data;
    }

    function getAllFeatureProducts() {
        $sql = 'select * from products where is_featured = 1';
        return $this->select( $sql );
    }

    function findByTitle( $title ) {
        $title = "'%".$title."%'";
        $sql = 'select * from products where title like '.$title;
        $data = $this->select( $sql );
        return $data;
    }

    function updateProduct( $stock, $id ) {
        $sql = 'UPDATE `products` SET `stock`= ? WHERE id = ?';
        return $this->update( $sql, array( $stock, $id ) );
    }
}
?>