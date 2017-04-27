<form action="../checklist/main.php" method="POST">
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
<!---->
<?php
//if ($_SERVER['REQUEST_METHOD'] == "GET") {
//
//} else {
//    $psw_select = $dbc->prepare("SELECT password FROM users
//							WHERE user_id=$_POST['password']");
//	$result = password_verify($psw_select, $_POST['password']);
//	$success = ($result) ? 'True' : 'False';
//}
//
//?>
