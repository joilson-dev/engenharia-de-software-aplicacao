<?php

namespace Classes;

use Models\ClassCadastro;
use Models\ClassLogin;
use ZxcvbnPhp\Zxcvbn;
use Classes\ClassPassword;
use Models\ClassCrud;
use Classes\ClassSession;
use Classes\ClassMail;

class ClassValidate
{
    private $erro = [];
    private $cadastro;
    private $password;
    private $login;
    private $tentativas;
    private $session;
    private $email;

    public function __construct()
    {
        $this->cadastro = new ClassCadastro();
        $this->password = new ClassPassword();
        $this->login = new ClassLogin();
        $this->session = new ClassSession();
        $this->email = new ClassMail();
    }

    public function getErro()
    {
        return $this->erro;
    }

    public function setErro($erro)
    {
        array_push($this->erro, $erro);
    }

    #validar se todos os campos foram preencidos
    public function validateFields($par)
    {
        $i = 0;
        foreach ($par as $key => $values) {
            if (empty($values)) {
                $i++;
            }
        }
        if ($i == 0) {
            return true;
        } else {
            $this->setErro("Preencha todos os dados!");
            return false;
        }
    }

    #valida se o dado e um email
    public function validateEmail($par)
    {
        if (filter_var($par, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            $this->setErro("Email invalido!");
            return false;
        }
    }

    #valida se o email existe no banco de dados (action null para cadastro)
    public function validateIssetEmail($email, $action = null)
    {
        $b = $this->cadastro->getIssetEmail($email);

        if ($action == null) {
            if ($b > 0) {
                $this->setErro("Email ja cadastrado");
                return false;
            } else {
                return true;
            }
        } else {
            if ($b > 0) {
                return true;
            } else {
                $this->setErro("Email não cadastrado");
                return false;
            }
        }
    }

    #valida se o dado e uma data
    public function validateData($par)
    {
        $data = \DateTime::createFromFormat("d/m/Y", $par);
        if (($data) && ($data->format("d/m/Y") === $par)) {
            return true;
        } else {
            $this->setErro("Data inválida!");
            return false;
        }
    }

    #valida se o dado e um cpf
    public function validateCpf($par)
    {
        $par = preg_replace('/[^0-9]/is', '', $par);

        // Verifica se foi informado todos os digitos corretamente
        if (strlen($par) != 11) {
            $this->setErro("Cpf invalida");
            return false;
        }

        // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
        if (preg_match('/(\d)\1{10}/', $par)) {
            $this->setErro("Cpf invalida");
            return false;
        }

        // Faz o calculo para validar o CPF
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $par[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($par[$c] != $d) {
                $this->setErro("Cpf invalida");
                return false;
            }
        }
        return true;
    }

    #verifica se a senha e igual a confirma senha
    public function validateConfSenha($senha, $senhaConf)
    {
        if ($senha === $senhaConf) {
            return true;
        } else {
            $this->setErro('Senha diferente de confimar senha!');
        }
    }

    #verifica a força da senha
    public function validateStrongSenha($senha, $par = null)
    {
        $zxcvbn = new Zxcvbn();
        $strength = $zxcvbn->passwordStrength($senha);

        if ($par == null) {
            if ($strength['score'] >= 3) {
                return true;
            } else {
                $this->setErro('Utilize uma senha mais forte!');
            }
        } else {
            /* LOGIN */
        }
    }

    #verificação da sena digitada com o hash do bd
    public function validateSenha($email, $senha)
    {
        if ($this->password->verifyHash($email, $senha)) {
            return true;
        } else {
            $this->setErro("Usuario ou senha invalido");
        }
    }

    #verifica se o captcha esta correto
    public function validateCaptcha($captcha, $score = 0.5)
    {
        $return = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . SECRETKEY . "&response={$captcha}");
        $response = json_decode($return);
        if ($response->success == true && $response->score >= $score) {
            return true;
        } else {
            $this->setErro("Captcha Inválido! Atualize a página e tente novamente.");
        }
    }

    #Validação final do cadastro
    public function validateFinalCad($arrVar)
    {
        if (count($this->getErro()) > 0) {
            $arrResponse = [
                "retorno" => "erro",
                "erros" => $this->getErro()
            ];
        } else {
            $this->email->sendMail(
                $arrVar['email'],
                $arrVar['nome'],
                $arrVar['token'],
                "Confirmação de Cadastro",
                "
                 <strong>Cadastro do Site </strong><br>
                 Confirme seu email <a href='".DIRPAGE."controllers/controllerConfirmacao/{$arrVar['email']}/{$arrVar['token']}'>clicando aqui</a>.
                "
            );
            $arrResponse = [
                "retorno" => "success",
                "erros" => null
            ];
            $this->cadastro->insertCad($arrVar);
        }
        return json_encode($arrResponse);
    }

    #validação das tentativas  
    public function validateAttemptLogin()
    {
        if ($this->login->countAttempt() >= 5) {
            $this->setErro("Voce realizou mais de cinco tentativas");
            $this->tentativas = true;
            return false;
        } else {
            $this->tentativas = false;
            return true;
        }
    }

    #Metodo de validação de confirmação de email
    public function validateUserActive($email)
    {
        $user = $this->login->getDataUser($email);
        if ($user["data"]["status"] == "confirmation") {
            if (strtotime($user["data"]["dataCriacao"]) <= strtotime(date("Y-m-d H:i:s")) - 432000) {
                $this->setErro("Ative seu cadastro pelo link do email");
                return false;
            } else {
                return true;
            }
        } else {
            return true;
        }
    }

    #Validação final do login
    public function validateFinalLogin($email)
    {
        if (count($this->getErro()) > 0) {
            $this->login->insertAttempt();

            $arrResponse = [
                "retorno" => "erro",
                "erros" => $this->getErro(),
                "tentativas" => $this->tentativas
            ];
        } else {
            $this->login->deleteAttempt();
            $this->session->setSession($email);

            $arrResponse=[
                "retorno"=>"success",
                "page"=>'areaRestrita',
                "tentativas"=>$this->tentativas
            ];
        }

        return json_encode($arrResponse);
    }
}
