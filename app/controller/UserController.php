<?php

class UserController
{
    // private $page = 'signin';

    public function index()
    {
        $view = new ViewHelper();
        return $view->renderView('auth', 'error');
    }


    // public function signUp()
    // {
    //     $view = new ViewHelper();
    //     return $view->renderView('auth', 'error', 'signup');
        
    //     // header('Location: http://localhost/login-system');
    // }

    public function renderSignIn()
    {
        $view = new ViewHelper();
        return $view->renderView('signin', 'error');
    }

    public function success()
    {
        $view = new ViewHelper();
        return $view->renderView('success');
    }

    public function signUp() 
    {
        $user = new User();
        $view = new ViewHelper();

        try {
            $user->setName($_POST['name']);
            $user->setEmail($_POST['email']);
            $user->setPassword($_POST['password']);

            $user->createUser();

            return $this->success();

        } catch (\Exception $e) {
            return $view->renderView('auth', 'error', 'signup');
        }
    }

    public function signIn()
    {
        $this->page = 'signin';
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
