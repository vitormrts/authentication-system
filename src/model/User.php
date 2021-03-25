<?php

use lib\database\Connection;

class User
{
    private $id;
    private $name;
    private $email;
    private $password;

    public function validateLogin()
    {
        $connection = Connection::getConnection(); // conectar no banco de dados

        // selecionar o usuario que possui o mesmo email do informado
        $sql = 'SELECT * FROM user WHERE email = :email';

        $stmt = $connection->prepare($sql);
        $stmt->bindValue(':email', $this->email);
        $stmt->execute();

        echo $stmt->rowCount();

        if ($stmt->rowCount()) {
            $result = $stmt->fetch();

            if ($result['password'] === $this->password) {
                $_SESSION['usr'] = $result['id'];

                echo "CORRETO";

                return true;
            }
        }

        throw new \Exception('Login invalido.');

        // conferir se a senha esta correta

        // se tudo isso tiver ok, criaremos uma session e direcionaremos o para um dashboard
        // se nao, redireicionar para a pag inicial
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPassword()
    {
        return $this->password;
    }

}
