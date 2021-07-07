<?php

namespace Models;

class ClassCadastro extends ClassCrud
{
    #Realizara a inserção no banco de dados
    public function insertCad($arrVar)
    {
        $this->insertDB(
            "users",
            "?,?,?,?,?,?,?,?,?",
            array(
                0,
                $arrVar['nome'],
                $arrVar['email'],
                $arrVar['hashSenha'],
                $arrVar['dataNascimento'],
                $arrVar['cpf'],
                $arrVar['dataCreate'],
                'user',
                'active'
            )
        );

        $this->insertDB(
            "confirmation",
            "?,?,?",
            array(
                0,
                $arrVar['email'],
                $arrVar['token']
            )
        );
    }

    #verifica diretamente no banco se o email esta cadastrado
    public function getIssetEmail($email)
    {
        $b = $this->selectDB(
            "*",
            "users",
            "where email = ?",
            array(
                $email
            )
        );
        return $r = $b->rowCount();
    }

    #verifica a confimarção do cadastro pelo email
    public function confirmationCad($email, $token)
    {
        $b = $this->selectDB(
            "*",
            "confirmation",
            "where email=? and token=?",
            array(
                $email,
                $token
            )
        );
        $r = $b->rowCount();

        if ($r > 0) {
            $this->deleteDB(
                "confirmation",
                "email = ?",
                array($email)
            );

            $this->updateDB(
                "users",
                "status = ?",
                "email = ?",
                array(
                    "active",
                    $email
                )
            );
            return true;
        }else{
            return false;
        }
    }
}
