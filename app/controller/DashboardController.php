<?php


class DashboardController
{
    public function index()
    {
        $view = new View();
        return $view->renderView('dashboard', 'username');
    }

    public function logout()
    {
        unset($_SESSION['usr']);
        session_destroy();

        header("Location: http://localhost/login-system");
    }
}
?>