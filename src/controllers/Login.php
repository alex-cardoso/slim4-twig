<?php

namespace src\controllers;

use src\controllers\Base;
use src\database\models\User;
use src\helpers\Flash;

class Login extends Base
{

    private $user;

    public function __construct()
    {
        $this->user = new User;
    }

    public function index($request, $response, $args)
    {
        $error = Flash::getError('login');

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
            Flash::setError('login', 'Usuário ou senha inválidos');
            return $response->withSTatus(301)->withHeader('Location', '/login');
        }

        $userPasswordVerified = password_verify($password, $userFound->password);

        if (!$userPasswordVerified) {
            Flash::setError('login', 'Usuário ou senha inválidos');
            return $response->withSTatus(301)->withHeader('Location', '/login');
        }

        $_SESSION['logged'] = true;
        $_SESSION['user'] = $userFound;
        return $response->withSTatus(200)->withHeader('Location', '/');
    }

    public function destroy($request, $response)
    {
        unset($_SESSION['logged']);
        unset($_SESSION['user']);
        return $response->withSTatus(200)->withHeader('Location', '/');
    }
}