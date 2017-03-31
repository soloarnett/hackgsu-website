<?php 

	class mentors{

		public function createRequest($firstname, $email, $studentid, $description, $floor, $roomNum, $nearestRoom, $shirt){
			$db = new Db;
			$result = "";
			if (empty($studentid)) {
				$studentid = 0000;
				// $studentid = $this -> randomStudent(10000);
			}
			if (empty($roomNum)) {
				$result = $db -> query("INSERT INTO `mentor_requests`(`student_name`, `student_email`, `student_id`, `description`, `floor`, `nearest_room`, `shirt_color`) VALUES ('" . $firstname . "', '" . $email . "', '" . $studentid . "', '" . $description . "', '" . $floor . "', '" . $nearestRoom . "', '" . $shirt . "')");
			}elseif (empty($nearestRoom)) {
				$result = $db -> query("INSERT INTO `mentor_requests`(`student_name`, `student_email`, `student_id`, `description`, `floor`, `room`, `shirt_color`) VALUES ('" . $firstname . "', '" . $email . "', '" . $studentid . "', '" . $description . "', '" . $floor . "', '" . $roomNum . "', '" . $shirt . "')");
			}

			$id = mysqli_insert_id($db->connect());
			$mentorAssign = $this -> assignMentor($id);
			$result = $this -> checkStatusById($id);
			$result2 = $db -> query("INSERT INTO `everything`(`typeid`, `type`, `tags`) VALUES ('".$result[0]['id']."','mrequest','MENTOR".$result[0]['id']."')");
			return $result;
		}

		public function randomStudent($input){
			$db = new Db;
			$result = $db -> select("SELECT * FROM `mentor_requests` WHERE student_id = '".$input."'");
			if (empty($result) == false) {
				$random = rand(10000, 99999);
				randomStudent($random);
			}else{
				return $input;
			}
		}

		public function checkStatusById($id){
			$db = new Db;
			$result = $db -> select("SELECT * FROM `mentor_requests` WHERE id = '" .$id."'");
			return $result;
		}

		public function getMentorNameById($id){
			$db = new Db;
			$result = $db -> select("
				SELECT mentors.mentor_name
				FROM mentors
				INNER JOIN mentor_requests ON mentor_requests.mentor_id = mentors.id
				WHERE mentor_requests.id = '".$id."'
				LIMIT 1
			");
			return $result[0]['mentor_name'];
		}

		public function assignMentor($requestId){
			$db = new Db;
			$result = $db -> query("
				SELECT id, mentor_id, email FROM mentors WHERE MATCH(skills) AGAINST ((
				SELECT description FROM mentor_requests WHERE id='".$requestId."')
				IN BOOLEAN MODE) && status = 'available' LIMIT 1"
			);

			foreach ($result as $value) {
				$id = $value['id'];
			}

			if (empty($id)) {
				// echo "<script type=\"text/javascript\">console.log('". empty($id)."');</script>";
				$result = $db -> select("SELECT id, mentor_id, email FROM mentors WHERE status = 'available' LIMIT 1");
				foreach ($result as $value) {
					$id = $value['id'];
				}
				// echo "<script type=\"text/javascript\">console.log('". empty($id)."');</script>";
				if (empty($id) == false) {

					$result = $this -> setMentor($requestId, $result);
				}
			}else{
				$result = $this -> setMentor($requestId, $result);
			}
		}

		public function setMentor($request, $result){
			if (empty($result) == false) {
				$db = new Db;
				foreach ($result as $value) {
					$id = $value['id'];
					$mentorid = $value['mentor_id'];
					$email = $value['email'];
				}
				$mentorBusy = $db -> query("UPDATE `mentors` SET `status`='busy' WHERE id = '".$id."'");
				$mentorAssigned = $db -> query("UPDATE `mentor_requests` SET `status`='accepted',`mentor_id`='".$mentorid."' WHERE id = '".$request."'");
				$request = $this -> getStudentInfo($request);
				$this -> emailMentor($email, $request);
			}
		}

		public function emailMentor($email, $studentInfo){
			$to = "$email";
			// echo "<script type=\"text/javascript\">console.log(\"Email is " . $email . "\");</script>";
			$subject = "You've been assigned to ". $studentInfo[0]['student_name'];
			$txt = "This message is to inform you that you've been assigned to help a student with the following issue(s):<br><br>". $studentInfo[0]['description'] ."<br><br>You can locate this student on Floor " . $studentInfo[0]['floor'] . ", ";
			if (empty($studentInfo[0]['room'])) {
				$txt .= "near Room " . $studentInfo[0]['nearest_room'];
			}else{
				$txt .= "Room " . $studentInfo[0]['room'];
			}

			$txt .= "<br><br>The student is wearing a " . $studentInfo[0]['shirt_color'] . " shirt.<br><br>If you have any issues or need assistance, please visit the Help Desk.";
			$headers = "From: noreply@hackgsu.com";

			// echo "<script type=\"text/javascript\">console.log(\"Email is " . $txt . "\");</script>";

			mail($to,$subject,$txt,$headers);
		}

		public function getStudentInfo($id){
			$db = new Db;
			$result = $db -> select("SELECT * FROM mentor_requests WHERE id = '".$id."'");
			return $result;
		}
	}







?>