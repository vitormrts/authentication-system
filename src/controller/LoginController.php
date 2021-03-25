<?php

class LoginController
{
    public function index()
    {
        $loader = new \Twig\Loader\FilesystemLoader('src/view');

        $twig = new \Twig\Environment($loader);
        $template = $twig->load('login.html');

        return $template->render();
    }

    public function check()
    {
        $user = new User();

        try {
            $user->setEmail($_POST['email']);
            $user->setPassword($_POST['password']);
            $user->validateLogin();
        } catch (\Exception $e) {
            header('Location: http://localhost/login-system/');
        }
    }
}
