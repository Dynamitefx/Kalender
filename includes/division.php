<?php 
	class Division{
		public $divisionName;
		private $divisionId;

		public function __construct($divisionId, $divisionName){
				$this->divisionName = $divisionName;
				$this->divisionId = $divisionId;
		}
		
	}
?>