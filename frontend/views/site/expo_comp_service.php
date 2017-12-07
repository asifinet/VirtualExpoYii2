
<?php define('__ROOT__', str_replace('\frontend', '',dirname(dirname(__DIR__)))); 
require_once(__ROOT__.'\common\config\Mysql.php'); 
  

       mysql_select_db($database_mysql, $mysql);
        $OwnerId = $_GET['id'];

	if ($_GET['action'] == 'listpoints') {
		$query = "SELECT g.id,g.company_rep_name,g.office_phone,g.primary_email,g.file
                    FROM expo_db.expo_company g
                    WHERE g.id = $OwnerId
	             ORDER BY g.id";
    
		   $result = mysql_query($query, $mysql) or die(mysql_error());
           $points = array();
		
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
             array_push($points, array('id' => $row['id'],
			                           'name' => $row['company_rep_name'],
			                            'phone' => $row['office_phone'],
									    'email' => $row['primary_email'],
										'mkt_dir' => $row['file	']));
		
		   
		}
		
		echo json_encode(array("company" => $points));
		exit;
	}
function success($data) { 
  die(json_encode(array('status' =>'success', 'data' =>$data))); 
}
	function fail($message) {
		die(json_encode(array('status' => 'fail', 'message' => $message)));
	}
	?>
    