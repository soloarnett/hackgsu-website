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
				INNER JOIN mentor_requests ON mentor_requests.mentor_id = mentors.mentor_id
				WHERE mentor_requests.id = '".$id."'
				LIMIT 1
			");
			return $result[0]['mentor_name'];
		}

		public function assignMentor($requestid){

			$db = new Db;
			$result = $db -> select("SELECT id, mentor_id, email FROM mentors WHERE MATCH skills AGAINST ((SELECT description FROM mentor_requests WHERE id='".$requestid."') IN BOOLEAN MODE) && status = 'available' && NOT deferred = '".$requestid."' LIMIT 1");

			// echo "<script type=\"text/javascript\">console.log('request id is ". $requestid ."');</script>";
			foreach ($result as $value) {
				$id = $value['id'];
			}
			if (empty($id)) {
				// echo "<script type=\"text/javascript\">console.log('id is ". $id ."');</script>";
				$result = $db -> select("SELECT id, mentor_id, email FROM mentors WHERE (NOT(deferred = '".$requestid."') && status = 'available') ORDER BY timestamp ASC LIMIT 1");
				foreach ($result as $value) {
					$id = $value['id'];
				}
				// echo "<script type=\"text/javascript\">console.log('". empty($id)."');</script>";
				if (empty($id) == false) {

					$result = $this -> setMentor($requestid, $result);
				}
			}else{
				$result = $this -> setMentor($requestid, $result);
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
			$txt = "This message is to inform you that you've been assigned to help a student with the following issue(s):". $studentInfo[0]['description'] .". You can locate this student on Floor " . $studentInfo[0]['floor'] . ", ";
			if (empty($studentInfo[0]['room'])) {
				$txt .= "near Room " . $studentInfo[0]['nearest_room'];
			}else{
				$txt .= "Room " . $studentInfo[0]['room'];
			}

			$txt .= ". The student is wearing a " . $studentInfo[0]['shirt_color'] . " shirt. If you have any issues or need assistance, please visit the Help Desk. When you have completed the request, visit http://hackgsu.com/hackbot.php?search_text=mentor" . $studentInfo[0]['id'] . "&submit= and click Complete Request.";
			$headers = "From: noreply@hackgsu.com\r\n" . "Bcc: solomonarnett@gmail.com\r\n";

			// echo "<script type=\"text/javascript\">console.log(\"Email is " . $txt . "\");</script>";

			mail($to,$subject,$txt,$headers);
		}

		public function getStudentInfo($id){
			$db = new Db;
			$result = $db -> select("SELECT * FROM mentor_requests WHERE id = '".$id."'");
			return $result;
		}

		public function validateEmailByRequest($requestid, $email){
			$db = new Db;
			// echo "<script type=\"text/javascript\">console.log('".$requestid ."')</script>";
			// echo "<script type=\"text/javascript\">console.log('".$email ."')</script>";
			$result = $db -> select("SELECT 'true' FROM mentors
				INNER JOIN mentor_requests ON mentor_requests.mentor_id = mentors.mentor_id
				WHERE mentor_requests.id = '".$requestid."' && mentors.email = '".$email."'");
			// foreach ($result as $value) {
				// $result = $value['true'];
			// }
			// echo "<script type=\"text/javascript\">console.log('".$result[0]['true'] ."')</script>";
			if (empty($result[0]['true']) == false) {
				$result = $db -> query("UPDATE `mentors` SET `status`='available', `timestamp` = now() WHERE email = '".$email."'");
				$result = $db -> query("UPDATE `mentor_requests` SET `status`='completed' WHERE id = '".$requestid."'");
				$result = $db -> query("UPDATE `mentors` SET `deferred`='0' WHERE deferred = '".$requestid."'");
				$this -> assignMentorAfterFree();
			}
		}

		public function assignMentorAfterFree(){
			$db = new Db;
			$result = $db -> select("SELECT id FROM `mentor_requests` WHERE status='waiting' ORDER BY timestamp ASC LIMIT 1");
			// echo "<script type=\"text/javascript\">console.log('".$result[0]['id'] ."')</script>";
			if (empty($result[0]['id']) == false) {
				$mentorAssign = $this -> assignMentor($result[0]['id']);
			}
		}

		public function deferRequest($requestid, $email){

			$db = new Db;
			// echo "<script type=\"text/javascript\">console.log('".$requestid ."')</script>";
			// echo "<script type=\"text/javascript\">console.log('".$email ."')</script>";
			$result = $db -> select("SELECT 'true' FROM mentors
				INNER JOIN mentor_requests ON mentor_requests.mentor_id = mentors.mentor_id
				WHERE mentor_requests.id = '".$requestid."' && mentors.email = '".$email."'");
			// foreach ($result as $value) {
				// $result = $value['true'];
			// }
			// echo "<script type=\"text/javascript\">console.log('".$result[0]['true'] ."')</script>";
			if (empty($result[0]['true']) == false) {
				$result = $db -> query("UPDATE `mentors` SET `status`='available', `timestamp` = now(), `deferred`='".$requestid."' WHERE email = '".$email."'");
				$result = $db -> query("UPDATE `mentor_requests` SET `status`='waiting' WHERE id = '".$requestid."'");
				$this -> assignMentorAfterFree();
			}
		}
	}







?>