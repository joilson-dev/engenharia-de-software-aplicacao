<?php

namespace Classes;

use Models\ClassLogin;

class ClassPassword
{
    private $db;

    public function __construct()
    {
        $this->db = new ClassLogin();
    }

    public function passwordHash($senha)
    {
        return password_hash($senha, PASSWORD_DEFAULT);
    }

    #Verifica se o hash da senha esta correto
    public function verifyHash($email, $senha)
    {
        $hashDb = $this->db->getDataUser($email);
        return password_verify($senha, $hashDb["data"]["senha"]);
    }
}