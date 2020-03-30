<?php

namespace src\controllers;

use src\controllers\Base;

class NotFound extends Base
{
    public function index($request, $response, $args)
    {
        return $this->getTwig()->render($response, '404.html', [
            'title' => '404',
        ]);
    }
}