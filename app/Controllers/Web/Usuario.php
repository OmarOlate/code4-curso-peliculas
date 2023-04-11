<?php

namespace App\Controllers\Web;

use App\Controllers\BaseController;
use App\Models\UsuarioModel;

class Usuario extends BaseController
{
    public function create_user()
    {
        $usuarioModel = new UsuarioModel();

        $usuarioModel->insert(
            [
                'user' => 'admin',
                'email' => 'admin@gmail.com',
                'pass' => $usuarioModel->passHash('admin'),
            ]
        );
    }
    public function probate_pass()
    {
        $usuarioModel = new UsuarioModel();
        var_dump($usuarioModel->passVerificar('admin','$2y$10$Lr6LCtpt/NCTdiVrj6Ny5uqGyX7FJFoAVLufUif2Df3Yj76E62PWa'));
    }
    public function index()
    {
    }
    public function login()
    {
        echo view('web/usuario/login');
    }
    public function login_post()
    {
        $usuarioModel = new UsuarioModel();

        $user = $this->request->getPost('user'); // o usuario
        $pass = $this->request->getPost('pass'); // contraseña
        
        $usuario = $usuarioModel->select('id,user,email,pass,type_user')
        ->orWhere('email',$user)
        ->orWhere('user',$user)
        ->first();

        if(!$usuario){
            return redirect()->back()->with('mensaje','Usuario y/o contraseña inválida');
        }

        if($usuarioModel->passVerificar($pass, $usuario->pass))
        {
            $session = session();
            unset($usuario->pass);
            session()->set('usuario',$usuario);

            return redirect()->to('/dashboard/categoria')->with('mensaje', "Bienvenid@ $usuario->user");
        }
        return redirect()->back()->with('mensaje','Usuario y/o contraseña inválida');


    }
    public function register()
    {
        echo view('web/usuario/register');
    }
    public function register_post()
    {
        $usuarioModel = new UsuarioModel();


        if($this->validate('usuarios'))
        {
            $usuarioModel->insert([
                'user'=> $this->request->getPost('user'),
                'email'=> $this->request->getPost('email'),
                'pass'=> $usuarioModel->passHash($this->request->getPost('pass')),
            ]);
            return redirect()->to(route_to('usuario.login'))->with('mensaje', "Cuenta creada con éxito");
        }
        session()->setFlashdata([
            'validation' => $this->validator
        ]); 
        return redirect()->back()->withInput();
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to(route_to('usuario.login'));
    }
}
