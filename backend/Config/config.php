<?php
$configDB = array();
$configDB[ 'host' ] 		 = 'http://shopluanvan.x10.mx/';
$configDB[ 'database' ]	 = 'diyadblz_lvtn';
$configDB[ 'username' ] 	 = 'diyadblz_lvtn';
$configDB[ 'password' ] 	 = '123456';

define( 'HOST', $configDB[ 'host' ] );
define( 'DB_NAME', $configDB[ 'database' ] );
define( 'DB_USER', $configDB[ 'username' ] );
define( 'DB_PASS', $configDB[ 'password' ] );
define( 'ROOT', dirname( dirname( __FILE__ ) ) );
define( 'BASE_URL', 'http://'.$_SERVER[ 'SERVER_NAME' ].'/lab/' );
define( 'TOP_SELLER', 3 );
define( 'STRLEN_MO_TA', 60 );
define( 'KHOA_HOC_MOT_TRANG', 12 );
?>
