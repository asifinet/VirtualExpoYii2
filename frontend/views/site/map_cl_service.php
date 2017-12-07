
<?php define('__ROOT__', str_replace('\frontend', '',dirname(dirname(__DIR__)))); 
require_once(__ROOT__.'\common\config\Mysql.php'); 
  
       mysql_select_db($database_mysql, $mysql);
$eventID=$_GET['eventid'];

	if ($_GET['action'] == 'listpoints') {
		$query = "SELECT g.id,g.name,g.location,g.latitude,g.longitude,start_date,start_time,end_date,end_time 
                    FROM expo_db.expo_event g
                    WHERE g.id = $eventID 
	             ORDER BY g.id";
    
		   $result = mysql_query($query, $mysql) or die(mysql_error());
           $points = array();
		
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
             array_push($points, array('id' => $row['id'],
			                           'name' => $row['name'],
			                            'loc' => $row['location'],
									    'st_date' => $row['start_date'],
										'st_time' => $row['start_time'],
										'ed_date' => $row['end_date'],
										'ed_time' => $row['end_time'],
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
    