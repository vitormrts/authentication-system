<?php

class LoginController
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

    public function check()
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
}
