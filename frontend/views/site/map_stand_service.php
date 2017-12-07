
<?php define('__ROOT__', str_replace('\frontend', '',dirname(dirname(__DIR__)))); 
require_once(__ROOT__.'\common\config\Mysql.php'); 
  

       mysql_select_db($database_mysql, $mysql);
                   $eventID = $_GET['eventid'];

	if ($_GET['action'] == 'listpoints') {
		$query = "SELECT g.id
                        ,g.event_id
                        ,g.code
                        ,g.event_status
                        ,g.price
                        ,g.sq_meter
                        ,g.image_ext
                        ,g.description
                        ,g.logo_pos
                        ,g.email_sent
						,stand_owner_id
						,username
                    FROM expo_db.expo_stand g
                    WHERE g.event_id = $eventID 
	             ORDER BY g.id";
				            
		   $result = mysql_query($query, $mysql) or die(mysql_error());
           $points = array();
		
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
             array_push($points, array('id' => $row['id'],
			                           'evnt_id' => $row['event_id'],
									    'code' => $row['code'],
			                            'price' => $row['price'],
									    'sq_meter' => $row['sq_meter'],
										'image_ext' => $row['image_ext'],
										'description' => $row['description'],
										'logo_pos' => $row['logo_pos'],
										'username' => $row['username'],
										'compid' => $row['stand_owner_id']));
		
		   
		}
		
		echo json_encode(array("StandDetails" => $points));
		exit;
	}
function success($data) { 
  die(json_encode(array('status' =>'success', 'data' =>$data))); 
}
	function fail($message) {
		die(json_encode(array('status' => 'fail', 'message' => $message)));
	}
	?>
    