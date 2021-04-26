<?php

namespace App\Controllers;
use App\Models\UsersModel;

class Usuario extends BaseController
{
    protected $usuario;
    public function __construct()
    {
        $this->usuario = new UsersModel();
    }

    // Listar usuarios
    public function index()
    {        
        $data = [
            "titulo" => "Administra los usurios",
            "datos" => $this->usuario->findAll()
        ];
        return view('users/index', $data);
    }

    // Crear usaurios
    public function create()
    {
        $data = [
            "titulo" => "Crear un nuevo usuario"
        ];
        return view('users/crear', $data);
    }

    // Almacenar usuarios
    public function store()
    {
        $input = $this->validate([
            'first_name'          => 'required|alpha_numeric_punct',
            'last_name'          => 'required|alpha_numeric_punct',
            'email'         => 'required|valid_email|is_unique[users.email]',
            'user'          => 'required|alpha_numeric_punct',
            'password'      => 'required'            
        ]);
          
        if ($input) {
           
            $file = $this->request->getFile("image");            
            if (!$file->isValid()) {
                $newName = "default.png";                              
            }else{
                $newName = strtotime("now").".".$file->getClientExtension();
                $directory = "public/dist/img/profile/";
                $file->move($directory, $newName);                     
            }                 
            $data = [
                'first_name'     => $this->request->getVar('first_name'),
                'last_name'    => $this->request->getVar('last_name'),
                'email'    => $this->request->getVar('email'),
                'user'    => $this->request->getVar('user'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'image' =>  $newName
            ];
            // Almaceno en la bd
            $this->usuario->save($data);
            return redirect()->to('/usuario')->with("msg", ["type" => "success","title" => "¡Exito!", "body" => "Registro almacenado correctamente"]);
        } else {
            return redirect()->to('/usuario')->with("msg", [ "type" => "warning", "title" => "¡Alerta!", "body" => "El Registro no pudo ser almacenado"]);
        }
    }    
}