<?php

class AuthController extends BaseController
{
    public function get_login()
    {
        $this->renderView('auth/login');
    }

    public function post_login()
    {
        $user = User::findFirst([
            'firstname' => $_POST['firstname'],
            'lastname' => $_POST['lastname']
        ]);

        if (!$user)
            $this->showErrorAndTerminate("User not found!");

        if (!password_verify($_POST['password'], $user['password']))
            $this->showErrorAndTerminate("Wrong password!");


        $_SESSION['user'] = $user;
        $_SESSION['message'] = "Logged in successfully";
        $this->redirect('PartnerInfo', 'ls');
    }

    public function logout()
    {
        unset($_SESSION['user']);
        $_SESSION['message'] = "Logged out successfully";
        $this->redirect('auth', 'login');
    }

}
