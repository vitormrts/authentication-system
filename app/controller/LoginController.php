<?php


class LoginController {
    public function index() {
        $loader = new \Twig\Loader\FilesystemLoader('app/view');

        $twig = new \Twig\Environment($loader);
        $template = $twig->load('login.html');

        return $template->render();
    }
}

?>