<?php 

	class faq{
		
		public function selectAll(){
			/*
				FUNCTION NAME:	selectAll
				PARAMETERS:		none
				DESCRIPTION:	will select all faq posts and return them as rows in an array
			*/
			
			$db = new Db;

			$rows = $db -> select("SELECT `hackbot_type`, `title`, `content`, `date_modified`, `date_posted` FROM `faq`");

			return $rows;
			
		}

		public function select($select, $where, $value){
			/*
				FUNCTION NAME:	selectAll
				PARAMETERS:		none
				DESCRIPTION:	will select all faq posts and return them as rows in an array
			*/
			
			$db = new Db;

			$rows = $db -> select("SELECT `$select` FROM `faq` WHERE $where'='$value");

			return $rows;
			
		}

	}









?>