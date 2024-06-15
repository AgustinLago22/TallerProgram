<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthAdmin implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        if (!$session->get('loggedIn') and $session->get('baja')!=0) {
            return redirect()->to('/login')->with('msg', 'Debes iniciar sesion');
        }

        if ($session->get('perfilID') != 1) {

            return redirect()->to('/')->with('msg', 'No puedes acceder');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}