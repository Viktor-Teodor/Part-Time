<!DOCTYPE>

<html>
	<head>
		<title>Check the logs</title>
	</head>

<body>

<?php

	// include database and object files
	include_once 'DB.php';
	include_once 'Logs.php';
 
	// instantiate database and product object
	$database = new Database();
	$db = $database->getConnection();
 
	// initialize object
	$log = new Logs($db);

	$stmt = $log->read();
	$num = $stmt->rowCount();
	
	// check if more than 0 record found
	if($num>0){
	 
		echo '<table class="table">
			  <thead>
				<tr>
				  <th scope="col">Id</th>
				  <th scope="col">Name of method</th>
				  <th scope="col">IP address</th>
				  <th scope="col">Message</th>
				  <th scope="col">Time</th>
				</tr>
			  </thead>';
			  
			  
		// retrieve our table contents
		// fetch() is faster than fetchAll()
		// http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
		echo '<tbody>';
		
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			// extract row
			// this will make $row['name'] to
			// just $name only
			extract($row);
	 
			echo '
				<tr>
				  <th scope="row">'.$id.'</th>
				  <td>'.$name.'</td>
				  <td>'.$description.'</td>
				  <td>'.$message.'</td>
				  <td>'.$modified.'</td>
				</tr>';
		}
		
		echo'</tbody>
			</table>';
	}
		
		
?>


</body>
</html>