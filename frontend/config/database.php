<?php


	$baseURL = "";
	$imageURL = "";


function anti_injection($sql){

   $sql = preg_replace(sql_regcase("/(from|select|insert|delete|where|drop table|like|show tables|\'|'\| |=|-|;|,|\|'|<|>|#|\*|--|\\\\)/"), "" ,$sql);


 
   $sql = trim($sql);
   $sql = strip_tags($sql);

   $sql = (get_magic_quotes_gpc()) ? $sql : addslashes($sql);

   return $sql;
} 



	$user	=	"root"			;
	$host	=	"localhost"			;	
	$dsn	=	"_d87333borneo"	;
		
	$con	=	mysql_connect("localhost", "root", "a4tech007");//mysql_connect($dsn, $user, $pass);
	mysql_select_db("_d87333borneo");
	
	$title = "Borneo E-Bankink Smart Solution.... Admin Panel!";
	$copyright = "<p>� Copyright 2010 borneo smart solution Sdn bhd. All Rights Reserved.
  <!-- end #footer -->
</p>
";
    $limitDefine = 10;
?>