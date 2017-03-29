<?php 

	class everything{
		
		public function selectAll(){
			/*
				FUNCTION NAME:	selectAll
				PARAMETERS:		none
				DESCRIPTION:	will select all posts and return them as rows in an array
			*/
			
			$db = new Db;

			$rows = $db -> select("SELECT * FROM `everything`");

			return $rows;
			
		}

		public function select($select, $where, $value){
			/*
				FUNCTION NAME:	selectAll
				PARAMETERS:		none
				DESCRIPTION:	will select all posts and return them as rows in an array
			*/
			
			$db = new Db;

			$rows = $db -> select("SELECT LOWER(`$select`) FROM `everything` WHERE $where'='LOWER($value)");

			return $rows;
			
		}

		public function selectFromTags($tags){
			$tagArray = array_map('trim', explode(' ', $tags));
			$strToSearch = "";
			if (sizeof($tagArray) > 1) {
				for ($i=0; $i < sizeof($tagArray); $i++) {
					$strToSearch .= trim($tagArray[$i]);
					if ($i < (sizeof(tagArray))) {
						$strToSearch .= ",";
					}
				}
			}else{
				$strToSearch = trim($tags);
			}
			
			$db = new Db;
			$rows = $db -> select("SELECT * FROM `everything` WHERE MATCH(tags) AGAINST ('+$strToSearch*' IN BOOLEAN MODE)");
			return $rows;
		}
		public function selectFromTagsLimited($tags){
			$tagArray = array_map('trim', explode(' ', $tags));
			$strToSearch = "";
			if (sizeof($tagArray) > 1) {
				// echo "<script type=\"text/javascript\">console.log('size of tag array is " . sizeof($tagArray) . "')</script>";
				for ($i=0; $i < sizeof($tagArray); $i++) {
					$strToSearch .= "*" . trim($tagArray[$i]);
					// echo "<script type=\"text/javascript\">console.log('i is " . $i . "')</script>";
					// if ($i++ < sizeof(tagArray)) {
						$strToSearch .= "* ";
						// echo "<script type=\"text/javascript\">console.log('comma added')</script>";
					// }else{
					// 	$strToSearch .= "*";
					// }
				}
				$strToSearch = substr($strToSearch, 0, (strlen($strToSearch) - 1));
			}else{
				$strToSearch = "*" . $tags . "*";
				
			} 
			// echo "<script type=\"text/javascript\">console.log('strToSearch is " . $strToSearch . "')</script>";
			
			$db = new Db;
			$rows = $db -> select("SELECT * FROM `everything` WHERE MATCH(tags) AGAINST ('".$strToSearch."' IN BOOLEAN MODE)");
			return $rows;
		}

		public function selectType($type){
			$db = new Db;

			$rows = $db -> select("SELECT * FROM `everything` WHERE type=$type");

			return $rows;
		}

		public function selectOpen($select, $where){
			/*
				FUNCTION NAME:	selectOpen
				PARAMETERS:		none
				DESCRIPTION:	will select all post that match the search query based on multiple where conditions
			*/
			
			
			$db = new Db;

			$rows = $db -> select("SELECT `$select` FROM `everything` WHERE $where");

			return $rows;
		}

		public function selectById($id){
			/*
				FUNCTION NAME:	selectById
				PARAMETERS:		id
				DESCRIPTION:	searches the everything table for a specific id and returns the result
			*/
			
			$db = new Db;
			
			$rows = $db -> select("SELECT * FROM `everything` WHERE id=$id");
			
			return $rows;
		}

	}












?>