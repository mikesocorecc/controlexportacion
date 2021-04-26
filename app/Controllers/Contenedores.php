<?php

namespace App\Controllers;
use App\Models\ContenedoresModel;
use App\Models\ProductosModel;

class Contenedores extends BaseController
{
    protected $contenedorModel;
    protected $productosModel;
    public function __construct()
    {
        $this->contenedorModel = new ContenedoresModel();
        $this->productosModel = new ProductosModel();
    }

    // Listar proveedores
    public function index(){        
        $data = [
            "titulo" => "Administra los contenedores",            
            "datos" =>  $this->contenedorModel->findAll(),
            "productos" =>  $this->productosModel->findAll()
        ];
        return view('contenedores/index', $data);
    }

    // //vista Crear proveedor
    public function crear(){
        $data = [
            "titulo" => "Crear un nuevo contenedor",
            "productos" => $this->productosModel->findAll()
        ];
        return view('contenedores/crear', $data);
    }

    // // Almacenar proveedor
    public function store(){
        // Validacion de campos
        $input = $this->validate([
            'identificacion' => 'required',
            'producto' => 'required',
            'cantidad' => 'required',
            'fechaArribo' => 'required',
            'lugarArribo' => 'required',       
            'aeropuertodestino' => 'required'
        ]);

        //Comprueba la validacion e inserta registros
        if ($input) {                                                            
            $data = [
                'identificacion'     => $this->request->getVar('identificacion', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                'producto'     => $this->request->getVar('producto', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                'cantidad'    => $this->request->getVar('cantidad', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                'fechaArribo'    => $this->request->getVar('fechaArribo', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                'lugarArribo'    => $this->request->getVar('lugarArribo', FILTER_SANITIZE_FULL_SPECIAL_CHARS),                
                'aeropuertodestino'    => $this->request->getVar('aeropuertodestino', FILTER_SANITIZE_FULL_SPECIAL_CHARS)                
            ];
            // Almaceno en la bd y redirecciono a la vista index
            if($this->contenedorModel->save($data)){
                return redirect()->to('/contenedores')->with("msg", ["type" => "info","title" => "¡Exito!","body" => "Registro almacenado correctamente"]);
            }else{
                return redirect()->to('/contenedores')->with("msg", ["type" => "warning","title" => "¡Alerta!","body" => "Registro no almacenado"]);
            }            
        } else {
            return redirect()->to("/contenedores/crear")->with("errors", $this->validator->getErrors())->withInput();
        }
    }

    // vista Editar proveedor
    public function editar($id){        
        $data = [
            "titulo" => "Editar proveedor",
            "datos" => $this->contenedorModel->where('id', $id)->first(),
            "productos" => $this->productosModel->findAll()
         ];
        return view('contenedores/editar', $data);
    }

    // Actualizar proveedor
    public function update(){        
        $id =  $this->request->getVar('id', FILTER_SANITIZE_FULL_SPECIAL_CHARS);            
        // validacion de los campos
        $input = $this->validate([
            'identificacion' => 'required',
            'producto' => 'required',
            'cantidad' => 'required',
            'fechaArribo' => 'required',
            'lugarArribo' => 'required',       
            'aeropuertodestino' => 'required' 
        ]);

        // Comprueba la validacion y actualiza el registro
        if($input){            
            $data = [
                'identificacion'     => $this->request->getVar('identificacion', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                'producto'     => $this->request->getVar('producto', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                'cantidad'    => $this->request->getVar('cantidad', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                'fechaArribo'    => $this->request->getVar('fechaArribo', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                'lugarArribo'    => $this->request->getVar('lugarArribo', FILTER_SANITIZE_FULL_SPECIAL_CHARS),              
                'aeropuertodestino'    => $this->request->getVar('aeropuertodestino', FILTER_SANITIZE_FULL_SPECIAL_CHARS)              
            ];                              
           if($this->contenedorModel->update( $id, $data)){
               return redirect()->to('/contenedores')->with("msg", [ "type" => "info", "title" => "¡Exito!", "body" => "Registro almacenado correctamente" ]);
           } else{
               return redirect()->to('/contenedores')->with("msg", [ "type" => "warning", "title" => "¡Alerta!", "body" => "Registro no almacenado" ]);
           }               
        }else{
            return redirect()->to("/contenedores/editar/".$id)->with("errors", $this->validator->getErrors())->withInput();
        }
    }

// Eliminar usuario
public function delete(){    
    $id = $this->request->getVar("id", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $this->contenedorModel->where("id" ,$id);
    $resultado = $this->contenedorModel->delete();
    if($resultado){
        $respuesta = [
            "id" => $id,
            "resultado" => "correcto"
        ];
    }else{
        $respuesta = [
            "id" => $id,
            "resultado" => "error"
        ];
    }
    
    die(json_encode($respuesta));
}


}