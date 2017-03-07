<?php 


	class events{

		public function upcoming(){
			/*
				FUNCTION NAME:	upcoming
				PARAMETERS:		none
				DESCRIPTION:	select the next 3 upcoming events and return them
			*/
			
			$db = new Db;

			$rows = $db -> select("SELECT * FROM `events` WHERE date >= now() ORDER BY date ASC LIMIT 3");
			
			return $rows;
		}

		public function upcoming_food(){
			/*
				FUNCTION NAME:	upcoming_food
				PARAMETERS:		none
				DESCRIPTION:	returns upcoming food events
			*/
			
			$db = new Db;
			$rows = $db -> select("SELECT * FROM `events` WHERE type = 'food' AND date >= now() ORDER BY date ASC LIMIT 2");

			return $rows;
		}

		public function previous_food(){
			/*
				FUNCTION NAME:	previous_food
				PARAMETERS:		none
				DESCRIPTION:	returns previous food events
			*/
			
			$db = new Db;
			$rows = $db -> select("SELECT * FROM `events` WHERE type = 'food' AND date < now() ORDER BY date DESC LIMIT 2");

			return $rows;
		}

		public function featured(){
			/*
				FUNCTION NAME:	featured
				PARAMETERS:		none
				DESCRIPTION:	returns top 4 featured events
			*/
			
			$db = new Db;
			$rows = $db -> select("SELECT * FROM `events` WHERE type = 'featured' AND date >= now() ORDER BY date ASC LIMIT 4");

			return $rows;
		}

		public function eventsByDate($month, $day){
			/*
				FUNCTION NAME:	eventsByDay
				PARAMETERS:		day
				DESCRIPTION:	returns all events on a given day
			*/
			
			$db = new Db;
			$rows = $db -> select("SELECT * FROM `events` WHERE date BETWEEN '2017-". $month ."-". $day ." 00:00:00' AND '2017-". $month ."-". $day ." 23:59:59' ORDER BY date ASC");

			return $rows;
		}

		public function nextEvent(){
			/*
				FUNCTION NAME:	nextEvent
				PARAMETERS:		none
				DESCRIPTION:	returns the next event
			*/
			
			$db = new Db;
			$rows = $db -> select("SELECT * FROM `events` WHERE date >= now() ORDER BY date LIMIT 1");

			return $rows;
		}

		public function nextFood(){
			/*
				FUNCTION NAME:	nextFood
				PARAMETERS:		none
				DESCRIPTION:	returns the next food event
			*/
			
			$db = new Db;
			$rows = $db -> select("SELECT * FROM `events` WHERE date >= now() AND type = 'food' ORDER BY date LIMIT 1");

			return $rows;
		}





	}















?>