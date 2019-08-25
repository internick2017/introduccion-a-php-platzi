<?php

namespace App\Controllers;

use App\Models\User;
use Respect\Validation\Validator as v;
use Zend\Diactoros\Response\RedirectResponse;
use Zend\Diactoros\ServerRequest;
use Zend\Diactoros\Response\HtmlResponse;

class AuthController extends BaseController
{
    public function getLogin()
    {
        return $this->renderHTML('login.twig');
    }

    public function postLogin(ServerRequest $request)
    {
        $postData = $request->getParsedBody();
        $user = User::where('email', $postData['email'])->first();
        if ($user) {
            if (password_verify($postData['password'], $user->password)) {
                $_SESSION['userId'] = $user->id;
                return new RedirectResponse('/david/admin');
            }

            return $this->renderHTML('login.twig', [
                'responseMessage' => 'Bad credentials'
            ]);
        }
    }

    public function getLogout()
    {
        unset($_SESSION['userId']);

        return new RedirectResponse('/david/login');
    }

    public function passwordHash()
    {
        return new HtmlResponse(\password_hash('123', PASSWORD_DEFAULT));
    }
}
