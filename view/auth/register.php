<html>

<head>
    <title>Motivator Register</title>
    <link rel='stylesheet' type='text/css' href='/css/bootstrap.min.css'>
    <script src="/js/libs/jquery.js"></script>
    <script src="/js/libs/bootstrap.min.js"></script>
    <script src="/js/registervalidate.js"></script>
</head>

<body>

</body>

<form class="form-inline" action="register.php" method="POST" onsubmit="return validatePassword()">

    <fieldset>
        <div>
            <div class="form-group">
                <label><b>First Name</b></label> <br>
                <input type="text" class="form-control" placeholder="Enter firstname" name="firstname" required>
                <br>
            </div>

            <div class="form-group">
                <label><b>Last Name</b></label><br>
                <input type="text" placeholder="Enter lastname" name="lastname" required><br>
            </div>

            <div class="form-group">
                <label><b>Email</b></label><br>
                <input type="email" placeholder="Enter Your Email" name="email" required><br>
            </div>

            <div class="form-group">
                <label><b>Password</b></label><br>
                <input type="password" placeholder="Enter Password" name="password" required><br>
            </div>

            <div class="form-group">
                <label><b>Repeat Password</b></label><br>
                <input type="password" placeholder="Repeat Password" name="repeatpassword" required><br>
            </div>

            <button type="submit" class="btn btn-primary">Register</button>
        </div>
    </fieldset>
</form>

<?php
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];
//$passwordHash = password_hash($password, PASSWORD_DEFAULT);



$cInsert = mysqli_prepare($dbc, "insert into Users (firstname,lastname,password)  VALUES (?,?,?)");
mysqli_stmt_bind_param($cInsert, "sss", $firstname, $lastname, $password);
mysqli_stmt_execute($cInsert);
$cid = mysqli_stmt_insert_id($cInsert);
$_SESSION["cid"] = $cid;
mysqli_stmt_close($cInsert);

?>


</html>