<?php

class AuthController extends BaseController
{
    public function get_login()
    {
        $this->renderView('auth/login');
    }

    public function post_login()
    {

//        $psw_select = $dbc->prepare("SELECT password FROM users
//							WHERE user_id=$_POST['password']");
//	$result = password_verify($psw_select, $_POST['password']);
//	$success = ($result) ? 'True' : 'False';
    }
}
