<form class="form-inline" action="register.php" method="POST" onsubmit="return validatePassword()">

    <div class="form-group">
        <label for="firstName" class="col-sm-2 control-label">First Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="firstName" required name="firstname">
        </div>
    </div>

    <div class="form-group">
        <label for="lastName" class="col-sm-2 control-label">Last Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="lastName" required name="lastname">
        </div>
    </div>

    <div class="form-group">
        <label for="Email" class="col-sm-2 control-label">Email</label>
        <div class="col-sm-10">
            <input type="email" class="form-control" id="Email" required name="email">
        </div>
    </div>

    <div class="form-group">
        <label for="Password" class="col-sm-2 control-label">Password</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="password" required name="password">
        </div>
    </div>

    <div class="form-group">
        <label for="RepeatPassword" class="col-sm-2 control-label">Repeat Password</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="repeatpassword" name="repeatpassword" required>
        </div>
    </div>


    <div class="form-group">
        <div class="col-sm-10 col-sm-offset-2">
            <button type="submit" class="btn btn-primary">Register</button>
            <a href="<?= get_link('auth', 'login') ?>" class="btn btn-default">Go Back</a>
        </div>
    </div>

</form>

<script>
    function validatePassword() {
        var password = document.getElementById("password")
            , repeatpassword = document.getElementById("repeatpassword");
        if (password.value !== repeatpassword.value) {
            alert("Passwords Don't Match");
            return false;
        }
        return true;
    }
</script>