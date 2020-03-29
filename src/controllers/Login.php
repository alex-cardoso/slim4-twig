<?php

namespace src\controllers;

use src\controllers\Base;
use src\database\models\User;
use src\helpers\Errors;

class Login extends Base
{

    private $user;

    public function __construct()
    {
        $this->user = new User;
    }

    public function index($request, $response, $args)
    {
        $error = Errors::getError('login');

        return $this->getTwig()->render($response, 'login.twig', [
            'title' => 'Login',
            'error' => $error
        ]);
    }

    public function store($request, $response)
    {
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

        $userFound = $this->user->findUserBy('email', $email);

        if (!$userFound) {
            Errors::setError('login', 'Usuário ou senha inválidos');
            return $response->withSTatus(301)->withHeader('Location', '/login');
        }

        $userPasswordVerified = password_verify($password, $userFound->password);

        if (!$userPasswordVerified) {
            Errors::setError('login', 'Usuário ou senha inválidos');
            return $response->withSTatus(301)->withHeader('Location', '/login');
        }

        $_SESSION['logged'] = true;
        $_SESSION['user'] = $userFound;
        return $response->withSTatus(301)->withHeader('Location', '/');
    }
}