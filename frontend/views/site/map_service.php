
<?php define('__ROOT__', str_replace('\frontend', '',dirname(dirname(__DIR__)))); 
require_once(__ROOT__.'\common\config\Mysql.php'); 
  
       mysql_select_db($database_mysql, $mysql);

	if ($_GET['action'] == 'listpoints') {
		$query = "SELECT g.id,g.name,g.location,g.latitude,g.longitude,start_date,start_time,end_date,end_time 
                    FROM expo_db.expo_event g
	             ORDER BY g.id";
    
		   $result = mysql_query($query, $mysql) or die(mysql_error());
           $points = array();
		
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
             array_push($points, array('id' => $row['id'],
			                            'loc' => $row['location'],
					                    'lat' => $row['latitude'], 
									    'lng' => $row['longitude']));
		
		   
		}
		
		echo json_encode(array("Locations" => $points));
		exit;
	}
function success($data) { 
  die(json_encode(array('status' =>'success', 'data' =>$data))); 
}
	function fail($message) {
		die(json_encode(array('status' => 'fail', 'message' => $message)));
	}
	?>
    