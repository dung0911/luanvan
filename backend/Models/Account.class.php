<?php

class Account extends Db
 {
    function getAll() {
        $sql = 'select * from users';
        return $this->select( $sql );
    }

    function getByID( $id ) {
        $sql = 'select * from users where id = ?';
        $data = $this->select( $sql, array( $id ) );
        return ( $data != null )?$data[ 0 ]:null;
    }

    function checkLogin( $email, $password ) {
        $sql = 'SELECT * FROM `users` WHERE email = ?';
        $userData = $this->select( $sql, array( $email ) );

        if ( $userData ) {
            // Lấy mật khẩu đã lưu trong cơ sở dữ liệu
            $storedPasswordHash = $userData[ 0 ][ 'password' ];

            // Kiểm tra mật khẩu đã nhập với mật khẩu đã lưu bằng bcrypt
            if ( password_verify( $password, $storedPasswordHash ) ) {
                // Mật khẩu khớp, trả về dữ liệu người dùng
                return $userData[ 0 ];
            } else {
                // Mật khẩu không khớp
                return null;
            }
        } else {
            // Người dùng không tồn tại với email đã nhập
            return null;
        }
    }

    function checkEmailExisted( $email ) {
        $sql = 'select * from `users` where email = ?';
        $data = $this->select( $sql, array( $email ) );
        return ( $data != null )?true:false;
    }

    function insertAccount( $name, $email, $password, $role ) {
        $sql = 'INSERT INTO `users`(`name`, `email`, `password`, `role`) VALUES (?,?,?,?)';
        return $this->insert( $sql, array( $name, $email, $password, $role ) );
    }

    function updateAccount( $name, $email, $password, $photo, $sodienthoai, $diachi, $quocgia, $id ) {
        $sql = 'UPDATE `users` SET`name`=?,`email`=?,`password`=?,`photo`=?,`sodienthoai`=?,`diachi`=?,`quocgia`=?  WHERE id = ?';
        return $this->update( $sql, array( $name, $email, $password, $photo, $sodienthoai, $diachi, $quocgia, $id ) );
    }
}

?>