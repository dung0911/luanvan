<?php

class Pages extends Db
 {
    function getAll() {
        $sql = 'select * from posts';
        return $this->select( $sql );
    }

    function getByID( $blogId ) {
        $sql = 'select * from posts where id = ?';
        $data = $this->select( $sql, array( $blogId ) );
        return ( $data != null )?$data[ 0 ]:null;
    }

    function getAllPostByCategory( $post_cat_id ) {
        $sql = 'select po.id, po.title, po.photo, po.description from posts po inner join post_categories post_cat on post_cat.id = po.post_cat_id where po.post_cat_id = ?';
        $data = $this->select( $sql, array( $post_cat_id ) );
        return $data;
    }

    function findByTitle( $title ) {
        $title = "'%".$title."%'";
        $sql = "select * from posts where title like ".$title;
        $data = $this->select( $sql );
        return $data;
    }
}
?>