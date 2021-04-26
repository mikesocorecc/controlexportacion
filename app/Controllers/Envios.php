<?php

namespace App\Controllers;
use App\Models\EnviosModel;
use App\Models\ContenedoresModel;

class Envios extends BaseController
{
    protected $envioModel;
    protected $contenedorModel;
    public function __construct()
    {
        $this->envioModel = new EnviosModel();
        $this->contenedorModel = new ContenedoresModel();
    }

    // Listar proveedores
    public function index(){        
        $data = [
            "titulo" => "Administra los envios",            
            "datos" =>  $this->envioModel->findAll(),
            "contenedores" => $this->contenedorModel->findAll()
        ];
        return view('envios/index', $data);
    }

    // //vista Crear proveedor
    public function crear(){
        $data = [
            "titulo" => "Crear un nuevo envio",
            "contenedores" => $this->contenedorModel->findAll()
        ];
        return view('envios/crear', $data);
    }

    // // Almacenar proveedor
    public function store(){
        // Validacion de campos
        $input = $this->validate([
            'contenedorid'          => 'required',
            'fechaEntrega'          => 'required',
            'paisDestino'         => 'required'                      
        ]);

        //Comprueba la validacion e inserta registros
        if ($input) {                                                            
            $data = [
                'contenedorid'     => $this->request->getVar('contenedorid', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                'fechaEntrega'    => $this->request->getVar('fechaEntrega', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                'paisDestino'    => $this->request->getVar('paisDestino', FILTER_SANITIZE_FULL_SPECIAL_CHARS)                            
            ];
            // Almaceno en la bd y redirecciono a la vista index
            if($this->envioModel->save($data)){
                return redirect()->to('/envios')->with("msg", ["type" => "success","title" => "¡Exito!","body" => "Registro almacenado correctamente"]);
            }else{
                return redirect()->to('/envios')->with("msg", ["type" => "warning","title" => "¡Alerta!","body" => "Registro no almacenado"]);
            }            
        } else {
            return redirect()->to("/envios/crear")->with("errors", $this->validator->getErrors())->withInput();
        }
    }

    // vista Editar proveedor
    public function editar($id){        
        $data = [
            "titulo" => "Editar envio",
            "datos" => $this->envioModel->where('id', $id)->first(),
            "contenedores" => $this->contenedorModel->findAll()
        ];
        return view('envios/editar', $data);
    }

    // Actualizar proveedor
    public function update(){        
        $id =  $this->request->getVar('id');           
        // validacion
        $input = $this->validate([
            'contenedorid'          => 'required',
            'fechaEntrega'          => 'required',
            'paisDestino'         => 'required'    
        ]);

        // Comprueba la validacion y actualiza el registro
        if($input){            
            $data = [
                'contenedorid'     => $this->request->getVar('contenedorid', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                'fechaEntrega'    => $this->request->getVar('fechaEntrega', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                'paisDestino'    => $this->request->getVar('paisDestino', FILTER_SANITIZE_FULL_SPECIAL_CHARS)                
            ];                              
           if($this->envioModel->update( $id, $data)){
               return redirect()->to('/envios')->with("msg", [ "type" => "success", "title" => "¡Exito!", "body" => "Registro almacenado correctamente" ]);
           } else{
               return redirect()->to('/envios')->with("msg", [ "type" => "warning", "title" => "¡Alerta!", "body" => "Registro no almacenado" ]);
           }               
        }else{
            return redirect()->to("/envios/editar/".$id)->with("errors", $this->validator->getErrors())->withInput();
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