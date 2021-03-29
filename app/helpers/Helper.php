<?php



class ViewHelper
{
    private $parameters = array();

    public function renderView($file, $parameters = false, $page = 'signin') {
        $loader = new \Twig\Loader\FilesystemLoader('app/view');
    
        $twig = new \Twig\Environment($loader, [
            'auto_reload' => true,
        ]);
    
        $template = $twig->load($file . '.html');

        if ($parameters === 'error') {
            $this->parameters['error'] = $_SESSION['msg_error']['msg'] ?? null;
        } else if ($parameters === 'username') {
            $this->parameters['name_user'] = $_SESSION['usr']['name_user']; 
        }

        $this->parameters['page'] = $page;
    
        return $template->render($this->parameters);
    }
}



?>