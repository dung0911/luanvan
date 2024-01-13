<?php
include( 'Db.class.php' );

class PostComment extends Db
 {
    function getByIDCom( $post_id ) {
        $sql = "SELECT * FROM `post_comments`po inner join users u on u.id = po.user_id inner join posts post on po.post_id = post.id where po.post_id = ? and po.status ='active'";
        $data = $this->select( $sql, array( $post_id ) );
        return $data;
    }

    function getAllComment() {
        $sql = "select * from post_comments where status ='active'";
        return $this->select( $sql );
    }

    function getCommentByUser( $user_id ) {
        $sql = "SELECT * FROM post_comments where user_id = ? where status ='active'";
        $data = $this->select( $sql, array( $post_id ) );
        return ( $data != null )?$data[ 0 ]:null;
    }

    function insertComment( $user_id, $post_id, $comment ) {
        $sql = 'INSERT INTO `post_comments`(`user_id`, `post_id`, `comment`) VALUES (?,?,?)';
        return $this->insert( $sql, array( $user_id, $post_id, $comment ) );
    }
}
?>