<?php

namespace App\Controllers;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Zend\Diactoros\Response\HtmlResponse;

class BaseController {

    protected $templateEngine;

    public function __construct() {
        $loader = new FilesystemLoader('../views');
        $this->templateEngine = new Environment($loader, [
            'debug' => true,
            'cache' => '../views/compilation_cache',
        ]);
    }

    public function renderHTML($filename, $data = []) {
        return new HtmlResponse($this->templateEngine->render($filename, $data));
    }
}
