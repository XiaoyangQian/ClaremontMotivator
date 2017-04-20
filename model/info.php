<?php
	class InfoRow {
		public static function getInfo(){
			$infoList = array();
			$dbc = connect_to_db("motivator");

			$user_id = 1;

			$partner_select = $dbc->prepare("SELECT partner_id FROM users 
													WHERE user_id=?");
			$partner_select->bind_param("i", $user_id);
			$partner_select->execute();
			$partner_select->bind_result($partner_id);
				
			if ($partner_select->fetch()) {
				echo 'yay'.$partner_id;
			} else {
				echo 'nay';
			}
			$infoList["partner_id"] = $partner_id;
			$partner_select->free_result();
			$partner_select->close();

			$fname_select = $dbc->prepare("SELECT firstname FROM users WHERE user_id=?");
			$fname_select->bind_param("i", $partner_id);
			$fname_select->execute();
			$fname_select->bind_result($firstname);
			if($fname_select->fetch()){
				echo "<tr><td>First Name: </td><td> $firstname </td></tr>";
			} else{
				echo 'nay';
			}
			$infoList["partner_firstname"] = $firstname;
			$fname_select->free_result();
			$fname_select->close();

			$lname_select = $dbc->prepare("SELECT lastname FROM users WHERE user_id=?");
			$lname_select->bind_param("i", $partner_id);
			$lname_select->execute();
			$lname_select->bind_result($lastname);
			if($lname_select->fetch()){
				echo "<tr><td>Last Name:</td><td>$lastname</td></tr>";
			} else{
				echo 'nay';
			}
			$infoList["partner_lastname"] = $lastname;
			$lname_select->free_result();
			$lname_select->close();

			$school_select = $dbc->prepare("SELECT school FROM users WHERE user_id=?");
			$school_select->bind_param("i", $partner_id);
			$school_select->execute();
			$school_select->bind_result($school);
			if($school_select->fetch()){
				echo "<tr><td>College:</td><td>$school</td></tr>";
			} else{
				echo 'nay';
			}
			$infoList["partner_school"] = $school;
			$school_select->free_result();
			$school_select->close();


			$phone_select = $dbc->prepare("SELECT phonenumber FROM users WHERE user_id=?");
			$phone_select->bind_param("i", $partner_id);
			$phone_select->execute();
			$phone_select->bind_result($phonenumber);
			if($phone_select->fetch()){
				echo "<tr><td>Phone Number:</td><td>$phonenumber</td></tr>";
			} else{
				echo 'nay';
			}
			$infoList["partner_phonenumber"] = $phonenumber;
			$phone_select->free_result();
			$phone_select->close();

			$email_select = $dbc->prepare("SELECT email FROM users WHERE user_id=?");
			$email_select->bind_param("i", $partner_id);
			$email_select->execute();
			$email_select->bind_result($email);
			if($email_select->fetch()){
				echo "<tr><td>Email:</td><td>$email</td></tr>";
			} else{
				echo 'nay';
			}
			$infoList["partner_email"] = $email;
			$email_select->free_result();
			$email_select->close();	

			return $infoList;
		}
	}

?>