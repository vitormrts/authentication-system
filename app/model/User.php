<?php


class User {
    private $id;
    private $name;
    private $email;
    private $password;

    public function validateLogin() {
        // conectar no banco de dados
        // selecionar o usuario que possui o mesmo email do informado
        // conferir se a senha esta correta
        
        // se tudo isso tiver ok, criaremos uma session e direcionaremos o para um dashboard
        // se nao, redireicionar para a pag inicial
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getName() {
        return $this->name;
    }

    public function getPassword() {
        return $this->password;
    }

}