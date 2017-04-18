<html>
	
	<head>
		<title>Motivator Register</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<link rel='stylesheet' type='text/css' href='//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
	</head>

	<form action="mainChecklist.php" method="POST">
	  <div>
	    <label><b>first name</b></label>
	    <input type="text" placeholder="Enter first name" name="firstname" required>
	  </div>

	  <div>
	    <label><b>first name</b></label>
	    <input type="text" placeholder="Enter last name" name="lastname" required>
	  </div>

	  <div>
	    <label><b>Password</b></label>
	    <input type="password" placeholder="Enter Password" name="password" required>
	  </div>

	  <div>
		<button type="submit">Login</button>
	  </div>

	</form>

<?php
if  ($_SERVER['REQUEST_METHOD']=="GET"){

}

else {
	$dbc = connect_to_db("motivator");
$psw_select = $dbc->prepare("SELECT password FROM users 
							WHERE user_id=$_POST['password']");
	$result = password_verify($psw_select, $_POST['password']);
	$success = ($result) ? 'True': 'False';	
}

?>
			



</html>