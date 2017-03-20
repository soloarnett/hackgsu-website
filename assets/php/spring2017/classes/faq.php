<?php 

	class faq{
		
		public function selectAll(){
			/*
				FUNCTION NAME:	selectAll
				PARAMETERS:		none
				DESCRIPTION:	will select all faq posts and return them as rows in an array
			*/
			
			$db = new Db;

			// $rows = $db -> select("SELECT `hackbot_type`, `title`, `content`, `date_modified`, `date_posted` FROM `faq`");
			$rows = $db -> select("SELECT * FROM `faq`");

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

		public function selectWhere($where){
			/*
				FUNCTION NAME:	selectWhere
				PARAMETERS:		none
				DESCRIPTION:	will select all faq post that match multiple where conditions
			*/
			
			
			$db = new Db;

			$rows = $db -> select("SELECT * FROM `faq` WHERE $where");

			return $rows;
		}

		public function selectById($id){
			/*
				FUNCTION NAME:	selectById
				PARAMETERS:		none
				DESCRIPTION:	will select 1 post that matches the given id
			*/
			
			
			$db = new Db;

			$rows = $db -> select("SELECT * FROM `faq` WHERE id='$id'");

			return $rows;
		}

	}









?>