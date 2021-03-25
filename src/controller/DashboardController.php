<?php


class DashboardController
{
    public function index()
    {
        echo 'Logado com sucesso <a href="http://localhost/login-system/dashboard/logout"> Fazer Logout</a>';
    }

    public function logout()
    {
        unset($_SESSION['usr']);
        session_destroy();

        header("Location: http://localhost/login-system");
    }
}
?>