<?php
namespace App\Filters;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        if (!$session->get('isLoggedIn') and !$session->get('baja')!=0 ) {
            return redirect()->to('/login')->with('msg', 'Debes iniciar sesion');
        }
        
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}
