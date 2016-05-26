<?php 

/*namespace database;
use database\Database;
*/
require_once("config/config.php");
require_once("user.php");
require_once("utilities.php");
class Database
{

	private $sql;
	private $con;

	public function __construct(){
	}

	public function init(){
			//Laver min connection udenfor constructorern så jeg ikke opretter connection til database før jeg skal bruge den.
			$this->con = new mysqli(HOST, USER, PASSWORD, DB);
			$this->con->set_charset('utf8'); 
			if ($this->con->connect_errno) { 
				Ulti::error("Failed to connect to database, check your data." . $this->con->connect_errno . $this->con->connect_error);
				return false;
			}
			return true;
	}

	public function query($sql){
		return $this->con->query($sql);
	}
	/*
			USERS
	*/
	public function createUser($username,$password,$usertype){
		$sql  = $this->con->prepare("INSERT INTO parent(parent_username,parent_password,usertype_id) VALUES(?,?,?)");
		$sql->bind_param("sss",$username,$password,$usertype);
		$sql->execute();
	}

	public function getAllUser(){
		$sql = "SELECT * FROM parent";
		$result = $this->query($sql);
		while ($row = $result->fetch_object()) {
			$user = new User($row->parent_id, $row->parent_firstname,$row->parent_lastname,$row->parent_username,$row->parent_email, $row->usertype_id);
		}
		return $user;
	}
	public function getUserById($userid){
		$sql = "SELECT * FROM `parent` WHERE usertype_id = " . $userid;
		$result = $this->query($sql);
		while($row = $result->fetch_object()){
			$userById = new User($row->parent_id, $row->parent_firstname,$row->parent_lastname,$row->parent_username,$row->parent_email, $row->usertype_id); 
		}
		return $userById;
	}
	
	/*
			EVENTS
	*/
	public function getEvents($eventName, $eventDate, $startDate, $endDate){
			$sql =  $this->con->prepare("SELECT event_starttime, event_endtime FROM event");
			return $sql;
	}
	public function createEvent($eventName, $startDate, $endDate, $eventApproved){
			$sql = $this->con->prepare("INSERT INTO event(event_name, event_date, event_starttime, event_endtime, event_approved) VALUES(?,NOW(),?,?,?)");
			$sql->bind_param("ssss",$eventName,$startDate,$endDate,$eventApproved);
			$sql->execute();
			//var_dump($sql);
	}
	public function getEventsById(){
			$sql = $this->con->prepare("SELECT * FROM `event` WHERE event_id = $eventid");
	}
	/*
		LEAGUE
	*/
	public function getLeague($leagueName){
			$sql = $this->con->prepare("SELECT league_name FROM league");
			$sql->execute();
			$sql->bind_result($leagueName);
			while ($sql->fetch()) {
				echo $leagueName . "<br>";
			}
	}

	public function closeCon(){
		mysqli_close($this->con);
	}
}
?>