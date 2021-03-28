<?php

class SignupController
{
    public function index()
    {
        $loader = new \Twig\Loader\FilesystemLoader('app/view');

        $twig = new \Twig\Environment($loader, [
            'auto_reload' => true,
        ]);

        $template = $twig->load('signup.html');

        return $template->render();
    }

    public function success()
    {
        $loader = new \Twig\Loader\FilesystemLoader('app/view');

        $twig = new \Twig\Environment($loader, [
            'auto_reload' => true,
        ]);

        $template = $twig->load('success.html');

        return $template->render();
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
