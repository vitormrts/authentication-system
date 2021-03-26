<?php


class SigninController
{
    public function index()
    {
        $loader = new \Twig\Loader\FilesystemLoader('src/view');

        $twig = new \Twig\Environment($loader, [
            'auto_reload' => true,
        ]);

        $template = $twig->load('signin/signin.html');

        $this->parameters['error'] = $_SESSION['msg_error'] ?? null;

        return $template->render($this->parameters);
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
