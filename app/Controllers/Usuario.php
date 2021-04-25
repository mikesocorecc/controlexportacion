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
        $usuarios = $this->usuario->findAll();
        $data = [
            "titulo" => "Administra los usurios",
            "datos" =>  $usuarios
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
            'first_name'          => 'required',
            'last_name'          => 'required',
            'email'         => 'required|valid_email|is_unique[users.email]',
            'user'          => 'required',
            'password'      => 'required',
            'image' => [
                'uploaded[image]',
                'mime_in[image,image/jpg,image/jpeg,image/gif,image/png]',
                'max_size[image,4096]',
            ],
        ]);
          
        if ($input) {
            $file = $this->request->getFile("image");
            $newName = strtotime("now").".".$file->getClientExtension();
            $directory = "public/dist/img/profile/";
            $file->move($directory, $newName);
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

            return redirect()->to('/usuario')->with("msg", [
                "type" => "success",
                "title" => "¡Exito!",
                "body" => "Registro almacenado correctamente"
            ]);
        } else {
            return redirect()->to('/usuario')->with("msg", [
                "type" => "warning",
                "title" => "¡Alerta!",
                "body" => "El Registro no pudo ser almacenado"
            ]);
        }
    }

    // Editar usuario
    // public function editar($id){
    //     $usuario = $this->usuario->where('user_id', $id)->first();
    //     $data = ["titulo" => "Editar usuario", "datos" => $usuario];
    //     return view('users/editar', $data);
    // }

    // Actualizar usuario
    // public function update(){
    //     $id =  $this->request->getVar('id');
    //     $usuario = $this->usuario->where('user_id', $id)->first();
    //     $file = $this->request->getFile("image");
    //     // validacion
    //     $input = $this->validate([
    //         'first_name'          => 'required',
    //         'last_name'          => 'required',
    //         'email'         => 'required|max_length[50]|valid_email',
    //         'user'          => 'required',
    //     ]);

    //     if($input){
    //         $data = [
    //             'first_name'     => $this->request->getVar('first_name'),
    //             'last_name'    => $this->request->getVar('last_name'),
    //             'email'    => $this->request->getVar('email'),
    //             'user'    => $this->request->getVar('user'),
    //         ];

    //         // En caso de querer actualizar la imagen
    //         if($file != ""){
    //             $newName = strtotime("now").".".$file->getClientExtension();
    //             $directory = "public/dist/img/profile/";
    //             unlink($directory."".$usuario->image);
    //             $file->move($directory, $newName);
    //             $item1 = [
    //                 'image' =>  $newName
    //             ];
    //             $data = array_merge($data, $item1);
    //         }
    //         // En caso
    //         if($request->getVar('password') != NULL){
    //             $item2 = [
    //                 'password' => password_hash($request->getVar('password'), PASSWORD_DEFAULT)
    //             ];
    //             $data = array_merge($data, $item2);
    //         }

    //         $this->usuario->update( $id, $data);
    //         $alert = [
    //             "bg" => "bg-success",
    //             "type" => "¡Exito!",
    //             "msg" => "Registro agregado correctamente"
    //         ];
    //         session()->setFlashdata($alert);
    //         return redirect()->to('/usuario');

    //     }else{
    //         $alert = [
    //             "bg" => "bg-warning",
    //             "type" => "¡Warning!",
    //             "msg" => "No se pudo realizar el registro"
    //         ];
    //         session()->setFlashdata($alert);
    //         return redirect()->to('/usuario');
    //     }
    // }

// Eliminar usuario
//     public function delete(){
//         $request = \Config\Services::request();
//         $id = $request->getVar("id");
//         $this->usuario->where("user_id" ,$id);
//         $resultado = $this->usuario->delete();
//         if($resultado){
//             $respuesta = [
//                 "id" => $id,
//                 "resultado" => "correcto"
//             ];
//         }else{
//             $respuesta = [
//                 "id" => $id,
//                 "resultado" => "error"
//             ];
//         }
        
//         die(json_encode($respuesta));
//     }
    
// }
}