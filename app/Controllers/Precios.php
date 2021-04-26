<?php

namespace App\Controllers;
use App\Models\CatalgospreciosModel;
use App\Models\ProductosModel;
use App\Models\ProveedoresModel;

class Precios extends BaseController
{
    protected $preciosModel;
    protected $productosModel;
    protected $proveedoresModel;
    public function __construct()
    {
        $this->preciosModel = new CatalgospreciosModel();
        $this->productosModel = new ProductosModel();
        $this->proveedoresModel = new ProveedoresModel();
    }

    // Listar catalogos de precios
    public function index(){               
        $this->preciosModel->select(' catalogosprecios .*, productos.producto, proveedores.proveedor ');
        $this->preciosModel->join('productos ', 'catalogosprecios.productoid  = productos.id ');
        $this->preciosModel->join('proveedores ', 'catalogosprecios.proveedorid  = proveedores.id');                    
        $resultado = $this->preciosModel->findAll();                
        $data = [
            "titulo" => "Administra los precios por proveedores",            
            "datos" =>  $resultado       
        ];
        return view('precios/index', $data);
    }

    // //vista Crear catalogos de precios
    public function crear(){      
        $data = [
            "titulo" => "Crear un nuevo precio de producto",
            "productos" => $this->productosModel->findAll(),
            "proveedores" => $this->proveedoresModel->findAll()
        ];
        return view('precios/crear', $data);
    }

    // // Almacenar catalogos de precios
    public function store(){
        // Validacion de campos
        $input = $this->validate([
            'productoid'          => 'required',
            'proveedorid'          => 'required',
            'precio'         => 'required'                    
        ]);

        //Comprueba la validacion e inserta registros
        if ($input) {                                                            
            $data = [
                'productoid'     => $this->request->getVar('productoid'),
                'proveedorid'    => $this->request->getVar('proveedorid'),
                'precio'    => $this->request->getVar('precio')              
            ];
            // Almaceno en la bd y redirecciono a la vista index
            if($this->preciosModel->save($data)){
                return redirect()->to('/precios')->with("msg", ["type" => "info","title" => "¡Exito!","body" => "Registro almacenado correctamente"]);
            }else{
                return redirect()->to('/precios')->with("msg", ["type" => "warning","title" => "¡Alerta!","body" => "Registro no almacenado"]);
            }            
        } else {
            return redirect()->to("/precios/crear")->with("errors", $this->validator->getErrors())->withInput();
        }
    }

    // vista Editar catalogos de precios
    public function editar($id){
        $catalogoprecio = $this->preciosModel->where('id', $id)->first();
        $productos = $this->productosModel->findAll();
        $proveedores = $this->proveedoresModel->findAll();
        $data = ["titulo" => "Editar precio", "datos" => $catalogoprecio, "productos" => $productos, "proveedores" => $proveedores ];
        return view('precios/editar', $data);
    }

    // Actualizar catalogos de precios
    public function update(){        
        $id =  $this->request->getVar('id');
        $proveedor = $this->preciosModel->where('id', $id)->first();        
        // validacion
        $input = $this->validate([
            'productoid'          => 'required',
            'proveedorid'          => 'required',
            'precio'         => 'required'      
        ]);

        // Comprueba la validacion y actualiza el registro
        if($input){            
            $data = [
                'productoid'     => $this->request->getVar('productoid', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                'proveedorid'    => $this->request->getVar('proveedorid', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                'precio'    => $this->request->getVar('precio', FILTER_SANITIZE_FULL_SPECIAL_CHARS)               
            ];    

           if($this->preciosModel->update($id, $data)){
               return redirect()->to('/precios')->with("msg", [ "type" => "info", "title" => "¡Exito!", "body" => "Registro almacenado correctamente" ]);
           } else{
               return redirect()->to('/precios')->with("msg", [ "type" => "warning", "title" => "¡Alerta!", "body" => "Registro no almacenado" ]);
           }               
        }else{
            return redirect()->to("/precios/editar/".$id)->with("errors", $this->validator->getErrors())->withInput();
        }
    }

    // Metodo para obtener el precio dado el id del producto y el id del proveedor
    public function  obtenerprecio(){
        $idproveedor = $this->request->getVar("idproveedor", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $idproducto = $this->request->getVar("idproducto", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $this->preciosModel->select('precio');
        $this->preciosModel->where('productoid', $idproducto);
        $this->preciosModel->where('proveedorid', $idproveedor);
        $resultado = $this->preciosModel->findAll();     
        // Si no hay un precio registrado
        if(empty($resultado)){
           $respuesta = [ "respuesta" => "vacia" ];
            die(json_encode($respuesta));   
        }                   
        die(json_encode($resultado, JSON_UNESCAPED_UNICODE));         
    }

// Eliminar usuario
public function delete(){    
    $id = $this->request->getVar("id",FILTER_SANITIZE_FULL_SPECIAL_CHARS );
    $this->preciosModel->where("id" ,$id);
    $resultado = $this->preciosModel->delete();
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