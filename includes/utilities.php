<?php 

	class Ulti{
		static function error($error_message){
				if(PRODUCTION){
						echo "FEJL";
				}else{
						echo "Failed to connect to database, check your data." . $this->con->connect_errno . $this->con->connect_error;
				}
		}
	}
?>