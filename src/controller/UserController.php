<?php

class UserController
{
    public function index()
    {
        $loader = new \Twig\Loader\FilesystemLoader('src/view');

        $twig = new \Twig\Environment($loader, [
            'auto_reload' => true
        ]);
        $template = $twig->load('login/login.html');

        $parameters['error'] = $_SESSION['msg_error'] ?? null;

        return $template->render($parameters);
    }

    public function signIn()
    {
        $user = new User();

        try {
            $user->setEmail($_POST['email']);
            $user->setPassword($_POST['password']);

            $user->validateLogin();

            
            header('Location: http://localhost/login-system/dashboard');
            
        } catch (\Exception $e) {
            $_SESSION['msg_error'] = array('msg' => $e->getMessage(), 'count' => 0);
            

            header('Location: http://localhost/login-system/');
        }
    }

    public function signUp() {
        $user = new User();

        header('Location: http://localhost/login-system/signup');
    }
}
