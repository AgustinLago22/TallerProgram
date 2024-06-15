<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
class Home extends Controller{
    public function principal(){

       
        #pasa la info
        $datos['header'] = view ('components/header');
        $datos['footer'] = view ('components/footer');
        
        return view('Pages/principal',$datos);

    }

    public function about(){
        #pasa la info
        $datos['header'] = view ('components/header');
        $datos['footer'] = view ('components/footer');
        
        return view('Pages/about',$datos);
    }
    public function contact(){
        #pasa la info
        $datos['header'] = view ('components/header');
        $datos['footer'] = view ('components/footer');
        
        return view('Pages/contact',$datos);
    }
    public function FAQ(){
        #pasa la info
        $datos['header'] = view ('components/header');
        $datos['footer'] = view ('components/footer');
        
        return view('Pages/FAQ',$datos);
    }
    public function comercializacion(){
        #pasa la info
        $datos['header'] = view ('components/header');
        $datos['footer'] = view ('components/footer');
        
        return view('Pages/comercializacion',$datos);
    }
    public function terminos(){
        $datos['header'] = view ('components/header');
        $datos['footer'] = view ('components/footer');
        
        return view('Pages/terminos',$datos);
    }
    public function priv(){
        $datos['header'] = view ('components/header');
        $datos['footer'] = view ('components/footer');
        
        return view('Pages/priv',$datos);
    }
    public function Construccion(){
        $datos['header'] = view ('components/header');
        $datos['footer'] = view ('components/footer');
        
        return view('Products/Construccion',$datos);
    }
    public function Catalogo(){
        $datos['header'] = view ('components/header');
        $datos['footer'] = view ('components/footer');
        
        return view('Pages/Catalogo',$datos);
    }
    public function Login(){
        $datos['header'] = view ('components/header');
        $datos['footer'] = view ('components/footer');
        
        return view('Pages/login',$datos);
    }
    public function Signup(){
        $datos['header'] = view ('components/header');
        $datos['footer'] = view ('components/footer');
        
        return view('Pages/signup',$datos);
    }
    public function Forget(){
        $datos['header'] = view ('components/header');
        $datos['footer'] = view ('components/footer');
        
        return view('Pages/forget',$datos);
    }
    
    public function Perfil(){
        $datos['header'] = view ('components/header');
        $datos['footer'] = view ('components/footer');
        
        return view('Pages/perfil',$datos);
    }
  
}

