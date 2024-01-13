<?php
include( 'Db.class.php' );

class PostCategory extends Db
 {
    function getAll() {
        $sql = 'select * from post_categories';
        return $this->select( $sql );
    }

    function getAllPostByCategory( $post_cat_id ) {
        $sql = 'select po.id, po.title, po.photo, po.description, po.slug, po.created_at, po.added_by from posts po inner join post_categories post_cat on post_cat.id = po.post_cat_id where po.post_cat_id = ?';
        $data = $this->select( $sql, array( $post_cat_id ) );
        return $data;
    }
}
?>