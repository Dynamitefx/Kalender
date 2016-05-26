<?php 

	/*
	1: Database kald
	2
	*/

	require_once("includes/db.php");

	$db = new database();
	$db->init();
	$email = "tobias";
	$password = 123;
	$usertype = 1;
	$eventName = "Event 1";
	$datetime = '22-05-1185';
	
	

	//$db->createUser($username,$password, $usertype);
	//$name = $db->getUser();
	echo "<br>";
	//$leaguename = $db->getLeague();
	//$db->createEvent($eventName,$startDate,$endDate,$eventApproved);
    /*  

        $users = $db->getAllUser();
        echo $users->parentId;
    */
        $db->getUser(1);
	$db->closeCon();
?>
