<?php

class View
{
    private $parameters = array();

    public function renderView($file, $parameters = false) {
        $loader = new \Twig\Loader\FilesystemLoader('app/view');
    
        $twig = new \Twig\Environment($loader, [
            'auto_reload' => true,
        ]);
    
        $template = $twig->load($file . '.html');

        if ($parameters === 'error') {
            $this->parameters['error'] = $_SESSION['msg_error'] ?? null;
        } else if ($parameters === 'username') {
            $this->parameters['name_user'] = $_SESSION['usr']['name_user']; 
        }
    
        return $template->render($this->parameters);
    }
}




?>