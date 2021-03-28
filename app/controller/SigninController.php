<?php

class SigninController
{
    public function index()
    {
        $view = new View();
        return $view->renderView('signin', 'error');
    }

    public function signIn()
    {
        $user = new User();

        try {
            $user->setEmail($_POST['email']);
            $user->setPassword($_POST['password']);

            $user->validateUser();

            header('Location: http://localhost/login-system/dashboard');

        } catch (\Exception $e) {
            $_SESSION['msg_error'] = array('msg' => $e->getMessage(), 'count' => 0);

            header('Location: http://localhost/login-system');
        }
    }

}
