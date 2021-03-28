<?php

class SignupController
{
    public function index()
    {
        $view = new View();
        return $view->renderView('signup');
    }

    public function success()
    {
        $view = new View();
        return $view->renderView('success');
    }

    public function signUp() 
    {
        $user = new User();

        try {
            $user->setName($_POST['name']);
            $user->setEmail($_POST['email']);
            $user->setPassword($_POST['password']);

            $user->createUser();

            header('Location: http://localhost/login-system/signup/success');
        } catch (\Exception $e) {
            echo $e;

            header('Location: http://localhost/login-system/signup');
        }
    }
}
