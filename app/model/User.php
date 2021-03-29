<?php

use app\config\Connection;

class User
{
    private $id;
    private $name;
    private $email;
    private $password;

    public function validateUser()
    {
        $connection = Connection::getConnection(); // conectar no banco de dados

        // selecionar o usuario que possui o mesmo email do informado
        $sql = 'SELECT * FROM user WHERE email = :email';

        $stmt = $connection->prepare($sql);
        $stmt->bindValue(':email', $this->email);
        $stmt->execute();

        if ($stmt->rowCount()) {
            $result = $stmt->fetch();

            // conferir se a senha esta correta
            // se tudo isso tiver ok, criaremos uma session e direcionaremos o para um dashboard
            // se nao, redireicionar para a pag inicial
            if ($result['password'] === $this->password) {
                $_SESSION['usr'] = array(
                    'id_user' => $result['id'],
                    'name_user' => $result['name'],
                );

                return true;
            }
        }

        throw new \Exception('It was not possible login.');
    }

    public function getEmptyField() {
        $empty = array();

        if (strlen($this->name) == 0) {
            $empty.array_push($empty, $this->name);
        }
        if (strlen($this->email) == 0) {
            $empty.array_push($empty, $this->email);
        }
        if (strlen($this->password) == 0) {
            $empty.array_push($empty, $this->password);
        }

        return $empty;
    }

    public function emailAlreadyExists() {
        $connection = Connection::getConnection();

        $sql = 'SELECT * FROM user WHERE email = :email';

        $stmt = $connection->prepare($sql);
        $stmt->bindValue(':email', $this->email);
        $stmt->execute();

        if ($stmt->rowCount() == 0) {
            return false;
        }

        return true;
    }

    public function createUser()
    {
        $connection = Connection::getConnection();

        $sql = 'INSERT INTO user VALUES (DEFAULT, :name, :email, :password)';

        $stmt = $connection->prepare($sql);

        $emptyField = $this->getEmptyField();

        if (count($emptyField) == 0 && !$this->emailAlreadyExists()) {
            $stmt->bindValue(':name', $this->name);
            $stmt->bindValue(':email', $this->email);
            $stmt->bindValue(':password', $this->password);

            if ($stmt->execute()) {
                return true;
            }
        }
        
        if (count($emptyField) != 0) {
            throw new \Exception("One or more fields are empty.");
        }
        else if ($this->emailAlreadyExists()) {
            throw new \Exception("Email already exists.");
        }

        throw new \Exception('It was not possible to create a user.');
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
