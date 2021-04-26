<?php

namespace App\Controllers;
use App\Models\ProveedoresModel;

class Proveedores extends BaseController
{
    protected $proveedorModel;
    public function __construct()
    {
        $this->proveedorModel = new ProveedoresModel();
    }

    // Listar proveedores
    public function index(){        
        $data = [
            "titulo" => "Administra los proveedores",            
            "datos" =>  $this->proveedorModel->findAll()
        ];
        return view('proveedores/index', $data);
    }

    // //vista Crear proveedor
    public function crear(){
        $data = [
            "titulo" => "Crear un nuevo proveedor"
        ];
        return view('proveedores/crear', $data);
    }

    // // Almacenar proveedor
    public function store(){
        // Validacion de campos
        $input = $this->validate([
            'proveedor'          => 'required',
            'direccion'          => 'required',
            'telefono'         => 'required',
            'telefonoContacto'          => 'required'            
        ]);

        //Comprueba la validacion e inserta registros
        if ($input) {                                                            
            $data = [
                'proveedor'     => $this->request->getVar('proveedor', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                'direccion'    => $this->request->getVar('direccion', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                'telefono'    => $this->request->getVar('telefono', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                'telefonoContacto'    => $this->request->getVar('telefonoContacto', FILTER_SANITIZE_FULL_SPECIAL_CHARS)                
            ];
            // Almaceno en la bd y redirecciono a la vista index
            if($this->proveedorModel->save($data)){
                return redirect()->to('/proveedores')->with("msg", ["type" => "success","title" => "¡Exito!","body" => "Registro almacenado correctamente"]);
            }else{
                return redirect()->to('/proveedores')->with("msg", ["type" => "warning","title" => "¡Alerta!","body" => "Registro no almacenado"]);
            }            
        } else {
            return redirect()->to("/proveedores/crear")->with("errors", $this->validator->getErrors())->withInput();
        }
    }

    // vista Editar proveedor
    public function editar($id){        
        $data = ["titulo" => "Editar proveedor", "datos" => $this->proveedorModel->where('id', $id)->first()];
        return view('proveedores/editar', $data);
    }

    // Actualizar proveedor
    public function update(){        
        $id =  $this->request->getVar('id', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $proveedor = $this->proveedorModel->where('id', $id)->first();        
        // validacion
        $input = $this->validate([
            'proveedor'          => 'required',
            'direccion'          => 'required',
            'telefono'         => 'required',
            'telefonoContacto'          => 'required'      
        ]);

        // Comprueba la validacion y actualiza el registro
        if($input){            
            $data = [
                'proveedor'     => $this->request->getVar('proveedor', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                'direccion'    => $this->request->getVar('direccion', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                'telefono'    => $this->request->getVar('telefono', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                'telefonoContacto'    => $this->request->getVar('telefonoContacto', FILTER_SANITIZE_FULL_SPECIAL_CHARS)              
            ];                              
           if($this->proveedorModel->update( $id, $data)){
               return redirect()->to('/proveedores')->with("msg", [ "type" => "success", "title" => "¡Exito!", "body" => "Registro almacenado correctamente" ]);
           } else{
               return redirect()->to('/proveedores')->with("msg", [ "type" => "warning", "title" => "¡Alerta!", "body" => "Registro no almacenado" ]);
           }               
        }else{
            return redirect()->to("/proveedores/editar/".$id)->with("errors", $this->validator->getErrors())->withInput();
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