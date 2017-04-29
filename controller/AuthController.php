<?php

class AuthController extends BaseController
{
    public function get_login()
    {
        if(@$_SESSION['user_id'])
            unset($_SESSION['user_id']);

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

        if (!password_verify($_POST['password'], $user->password))
            $this->showErrorAndTerminate("Wrong password!");


        $_SESSION['user_id'] = $user->user_id;
        $_SESSION['message'] = "Logged in successfully";
        $this->redirect('Checklist', 'index');
    }

    public function logout()
    {
        unset($_SESSION['user']);
        $_SESSION['message'] = "Logged out successfully";
        $this->redirect('auth', 'login');
    }

    public function get_register()
    {
        $this->renderView('auth/register');
    }

    public function post_register()
    {
        $potential_partner=User::findFirst(['ready_state' =>0]);
        $user = new User();
        $user ->firstname = $_POST['firstname'];
        $user ->lastname = $_POST['lastname'];
        $user ->email =$_POST['email'];
        $user ->password = password_hash($_POST['password']),
            PASSWORD_DEFAULT);
        $user ->ready_state =0;
        $user ->save();

        if ($potential_partner){
            $potential_partner->ready_state =1;
            $potential_partner->save();
            $user->ready_state=1;
            $user->save();
            $program = new Program();
            $program->user_id1=min($user->user_id, $potential_partner->user_id);
            $program->user_id2=max($user->user_id, $potential_partner->user_id);
            $program->start_date=date('Y-m-d');
            $program->save();
        }
        $_SESSION['message']="Sign up successful!";
        $this->redirect('auth','login');
    }

}
