<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
ini_set('error_reporting',!E_NOTICE ); 
$hostname_mysql = "localhost";
$database_mysql = "expo_db";
$username_mysql = "root";
$password_mysql = "";
$mysql = mysql_pconnect($hostname_mysql, $username_mysql, $password_mysql) or trigger_error(mysql_error(),E_USER_ERROR); 
?>