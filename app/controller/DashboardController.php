<?php


class DashboardController
{
    public function index()
    {
        $view = new ViewHelper();
        return $view->renderView('dashboard', false, true);
    }

    public function logout()
    {
        unset($_SESSION['usr']);
        session_destroy();

        header("Location: http://localhost/login-system");
    }
}
?>