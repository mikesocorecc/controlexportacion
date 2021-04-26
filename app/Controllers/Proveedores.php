<?php

namespace App\Controllers;
use App\Models\ProveedoresModel;

class Proveedores extends BaseController
{
    protected $productoModel;
    public function __construct()
    {
        $this->productoModel = new ProveedoresModel();
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
            'unidades'          => 'required',
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
                'unidades'    => $this->request->getVar('unidades'),                
                'fotografia' =>  $newName
            ];
            // Almaceno en la bd
            if($this->productoModel->save($data)){
                return redirect()->to('/productos')->with("msg", ["type" => "success","title" => "¡Exito!","body" => "Registro almacenado correctamente"]);
            }else{
                return redirect()->to('/productos')->with("msg", ["type" => "warning","title" => "¡Alerta!","body" => "Registro no almacenado"]);
            }            
        } else {
            return redirect()->to("/productos/crear")->with("errors", $this->validator->getErrors())->withInput();
        }
    }

    // Editar producto
    public function editar($id){
        $producto = $this->productoModel->where('id', $id)->first();
        $data = ["titulo" => "Editar producto", "datos" => $producto];
        return view('productos/editar', $data);
    }

    // Actualizar usuario
    public function update(){
        $id =  $this->request->getVar('id');
        $producto = $this->productoModel->where('id', $id)->first();
        $file = $this->request->getFile("fotografia");
        // validacion
        $input = $this->validate([
            'producto' => 'required',
            'sku' => 'required',
            'presentacion' => 'required',
            'volumen' => 'required',          
            'unidades' => 'required'           
        ]);

        if($input){
            
            $data = [
                'producto'     => $this->request->getVar('producto'),
                'sku'    => $this->request->getVar('sku'),
                'presentacion'    => $this->request->getVar('presentacion'),
                'volumen'    => $this->request->getVar('volumen'),                
                'unidades'    => $this->request->getVar('unidades')                
            ];
            // En caso de querer actualizar la imagen
            if($file != ""){
               $input2 =  $this->validate([
                    'fotografia' => 'uploaded[fotografia]|max_size[fotografia,4096]|mime_in[fotografia, image/jpg,image/jpeg,image/gif,image/png]'
                ]);
                if($input2){
                    $newName = strtotime("now").".".$file->getClientExtension();
                    $directory = "public/dist/img/productos/";
                    if($producto->fotografia != "default.png"){
                        unlink($directory."".$producto->fotografia);
                    }                    
                    $file->move($directory, $newName);
                    $item1 = [
                        'fotografia' =>  $newName
                    ];
                    $data = array_merge($data, $item1);
                }else{
                    return redirect()->to("/productos/editar/".$id)->with("errors", $this->validator->getErrors())->withInput();          
                }
                
            }         
            
           if($this->productoModel->update( $id, $data)){
               return redirect()->to('/productos')->with("msg", [ "type" => "success", "title" => "¡Exito!", "body" => "Registro almacenado correctamente" ]);
           } else{
               return redirect()->to('/productos')->with("msg", [ "type" => "warning", "title" => "¡Alerta!", "body" => "Registro no almacenado" ]);
           }               
        }else{
            return redirect()->to("/productos/editar/".$id)->with("errors", $this->validator->getErrors())->withInput();
        }
    }

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