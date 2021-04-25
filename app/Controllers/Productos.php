<?php

namespace App\Controllers;
use App\Models\ProductosModel;

class Productos extends BaseController
{
    protected $productoModel;
    public function __construct()
    {
        $this->productoModel = new ProductosModel();
    }

    // Listar Productos
    public function index(){
        $productos = $this->productoModel->findAll();
        $data = [
            "titulo" => "Administra los productos",            
            "datos" =>  $productos
        ];
        return view('productos/index', $data);
    }

    // // Crear Producto
    public function crear(){
        $data = [
            "titulo" => "Crear un nuevo producto"
        ];
        return view('productos/crear', $data);
    }

    // // Almacenar usuarios
    public function store(){
        $input = $this->validate([
            'producto'          => 'required',
            'sku'          => 'required',
            'presentacion'         => 'required',
            'volumen'          => 'required',
            'fotografia'  => 'uploaded[fotografia]|max_size[fotografia,4096]|mime_in[fotografia, image/jpg,image/jpeg,image/gif,image/png]'           
        ]);

        //Comprueba la validacion
        if ($input) {
            $file = $this->request->getFile("fotografia");
            $newName = strtotime("now").".".$file->getClientExtension();
            $directory = "public/dist/img/productos/";
            $file->move($directory, $newName);
            $data = [
                'producto'     => $this->request->getVar('producto'),
                'sku'    => $this->request->getVar('sku'),
                'presentacion'    => $this->request->getVar('presentacion'),
                'volumen'    => $this->request->getVar('volumen'),                
                'fotografia' =>  $newName
            ];
            // Almaceno en la bd
            if($this->productoModel->save($data)){
                return redirect()->to('/productos')->with("msg", [
                    "type" => "success",
                    "title" => "¡Exito!",
                    "body" => "Registro almacenado correctamente"
                ]);
            }else{
                return redirect()->to('/productos')->with("msg", [
                    "type" => "warning",
                    "title" => "¡Alerta!",
                    "body" => "Registro no almacenado"
                ]);
            }

            
        } else {
            return redirect()->to("/productos/crear")->with("errors", $this->validator->getErrors())->withInput();
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