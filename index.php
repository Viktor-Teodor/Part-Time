<?php

echo "congrats, your request got logged";

include_once 'DB.php';
include_once 'Logs.php';

$database = new Database();

$db = $database->getConnection();

// initialize object
$log = new Logs($db);

//echo (isset($log));
$request = $_SERVER['REDIRECT_URL'];
$aux=explode("/",$request);
//var_dump($request);


if (isset($_SERVER['REQUEST_METHOD'])){
	switch ($aux[1]) {
    case 'add_message' :
        	$log->name=$_SERVER['REQUEST_METHOD'];
        	$log->description=$_SERVER['REMOTE_ADDR'];
        	$log->message=$aux[2];
        	$log->modified=date('Y-m-d H:i:s');
        	
	        $log->create();
    break;
        
    case 'delete_all_messages' :
        $query="DELETE FROM logs";
        $stmt=$db->prepare($query);
        $stmt->execute();
        echo ("All the log entries have been deleted");
    break;
        
    case 'view_messages' :
        require __DIR__ . '/display.php';
    break;
    
    case 'confid.php' :
        require __DIR__ . '/confid.php';
    break;
}
}

?>