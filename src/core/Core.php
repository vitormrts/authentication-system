<?php

class Core
{
    private $url;

    private $controller;
    private $method = 'index';
    private $params = array();

    private $user;

    public function __construct()
    {
        $this->user = $_SESSION['usr'] ?? null;
    }

    public function start($request)
    {
        if (isset($request['url'])) { // se existir url
            $this->url = explode('/', $request['url']); // cria um array com a string separada por '/'

            $this->controller = ucfirst($this->url[0]) . 'Controller';
            array_shift($this->url); // apaga a primeira posicao do array

            if (isset($this->url[0]) && !empty($this->url[0])) {
                $this->method = $this->url[0];
                array_shift($this->url);

                echo $this->url[0];

                if (isset($this->url[0]) && !empty($this->url[0])) {
                    $this->params = $this->url;
                }
            }
        }

        if ($this->user) {
            $pg_permission = ['DashboardController'];

            if (!isset($this->controller) || !in_array($this->controller, $pg_permission)) {
                $this->controller = 'DashboardController';
                $this->method = 'index';
            }
        } else {
            $pg_permission = ['LoginController'];

            if (!isset($this->controller) || !in_array($this->controller, $pg_permission)) {
                $this->controller = 'LoginController';
                $this->method = 'index';
            }
        }

        return call_user_func(array(new $this->controller, $this->method), $this->params);
    }
}