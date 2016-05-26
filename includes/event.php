<?php 

	class Event{

		private $startTime;
		private $endTime;
		private $name;
		private $id;

		public function __construct($startTime,$endTime){
			$this->startTime = $startTime;
			$this->endTime 	 = $endTime;
		}
		
		public function getStartTime(){
				return $this->startTime;
		}

		public function getEndTime(){
				return $this->endTime;
		}

		public function getEventName(){
				return $this->name;
		}
		public function getID(){
				return $this->id;
		}
		
	}
?>