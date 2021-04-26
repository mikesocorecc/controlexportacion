<?php

namespace App\Controllers;
use App\Models\ComprasModel;
use App\Models\UsersModel;
use App\Models\DetallecomprasModel;
use App\Models\CatalgospreciosModel;
use App\Models\ProductosModel;
use App\Models\ProveedoresModel;

class Compras extends BaseController
{
    protected $compraModel;
    protected $usuarioModel;
    protected $detallecompraModel;
    protected $preciosModel;
    protected $productosModel;
    protected $proveedoresModel; 
    public function __construct()
    {
        $this->compraModel = new ComprasModel();
        $this->usuarioModel = new UsersModel();
        $this->detallecompraModel = new DetallecomprasModel();
        $this->preciosModel = new CatalgospreciosModel();
        $this->productosModel = new ProductosModel();
        $this->proveedoresModel = new ProveedoresModel();
    }

    // Mostrar el detalle de la compra
    public function  show($id){        
      $detalleCompra = $this->detallecompraModel->where('compraid', $id)->findAll();
      $compra = $this->compraModel->where('id', $id)->first();
      $productos = $this->productosModel->findAll();
      $proveedores = $this->proveedoresModel->findAll(); 
      $usuarios =  $this->usuarioModel->findAll(); 
        $data = [
            "titulo" => "Detalle de la compra",
            "datos" => $detalleCompra,
            "productos" => $productos,
            "proveedores" => $proveedores,
            "usuarios" => $usuarios,
            "compra" => $compra
        ];
        return view('compras/show', $data);
    }


    // Listar compras
    public function index(){
        $compras = $this->compraModel->findAll();
        $usuarios = $this->usuarioModel->findAll();
        $productos = $this->productosModel->findAll();
        $proveedores = $this->proveedoresModel->findAll();
        $data = [
            "titulo" => "Administra las compras",            
            "datos" =>  $compras,
            "usuarios" =>  $usuarios
        ];
        return view('compras/index', $data);
    }

    // //vista Crear compra
    public function crear(){
        $compras = $this->compraModel->findAll();
        $productos = $this->productosModel->findAll();
        $proveedores = $this->proveedoresModel->findAll();
        $data = [
            "titulo" => "Crear una nueva compra",            
            "datos" =>  $compras,
            "productos" =>  $productos,
            "proveedores" =>  $proveedores
        ];

        return view('compras/crear', $data);
    }

    // // Almacenar compra
    public function store(){
        // dd($this->request->getVar('precio')[0]);
        $totalRegistros = count($this->request->getVar('precio'));
        // Validacion de campos
        $input = $this->validate([
            'precio' => 'required',
            'cantidad' => 'required',
            'productoid' => 'required',
            'proveedorid' => 'required'            
        ]);

        //Comprueba la validacion e inserta registros
        if ($input) {    

            $data = [
                'usuarioid'     => $this->request->getVar('usuarioid', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                'fechacompra'    => date("Y-m-d"),                
                'totalcompra'    => $this->request->getVar('total_pagar', FILTER_SANITIZE_FULL_SPECIAL_CHARS),                                         
            ];
            
            // Almaceno en la tabla compras y luego en el detalle de la compra            
              if($this->compraModel->save($data)){   
                  $idInsertado = $this->compraModel->insertID();                
                for ($i=0; $i < $totalRegistros ; $i++) { 
                    $data2 = [
                        'compraid'     => $idInsertado,
                        'productoid'    => $this->request->getVar('productoid', FILTER_SANITIZE_FULL_SPECIAL_CHARS)[$i],
                        'proveedorid'    => $this->request->getVar('proveedorid', FILTER_SANITIZE_FULL_SPECIAL_CHARS)[$i],
                        'cantidad'    => $this->request->getVar('cantidad', FILTER_SANITIZE_FULL_SPECIAL_CHARS)[$i],                                         
                        'precio'    => $this->request->getVar('precio', FILTER_SANITIZE_FULL_SPECIAL_CHARS)[$i]                                        
                    ]; 
                    $this->detallecompraModel->save($data2); 
                }                              
                return redirect()->to('/compras')->with("msg", ["type" => "success","title" => "¡Exito!","body" => "Registro almacenado correctamente"]);
                }else{
                    return redirect()->to('/compras')->with("msg", ["type" => "warning","title" => "¡Alerta!","body" => "Registro no almacenado"]);
                }
                                             
        } else {
            return redirect()->to("/compras/crear")->with("errors", $this->validator->getErrors())->withInput();
        }
    }

    // vista Editar proveedor
    public function editar($id){
        $proveedor = $this->contenedorModel->where('id', $id)->first();
        $data = ["titulo" => "Editar proveedor", "datos" => $proveedor];
        return view('contenedores/editar', $data);
    }

    // Actualizar proveedor
    public function update(){        
        $id =  $this->request->getVar('id', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $proveedor = $this->contenedorModel->where('id', $id)->first();        
        // validacion de los campos
        $input = $this->validate([
            'producto' => 'required',
            'cantidad' => 'required',
            'fechaArribo' => 'required',
            'lugarArribo' => 'required',       
            'aeropuertodestino' => 'required' 
        ]);

        // Comprueba la validacion y actualiza el registro
        if($input){            
            $data = [
                'producto'     => $this->request->getVar('producto', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                'cantidad'    => $this->request->getVar('cantidad', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                'fechaArribo'    => $this->request->getVar('fechaArribo', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                'lugarArribo'    => $this->request->getVar('lugarArribo', FILTER_SANITIZE_FULL_SPECIAL_CHARS),              
                'aeropuertodestino'    => $this->request->getVar('aeropuertodestino', FILTER_SANITIZE_FULL_SPECIAL_CHARS)              
            ];                              
           if($this->contenedorModel->update( $id, $data)){
               return redirect()->to('/contenedores')->with("msg", [ "type" => "success", "title" => "¡Exito!", "body" => "Registro almacenado correctamente" ]);
           } else{
               return redirect()->to('/contenedores')->with("msg", [ "type" => "warning", "title" => "¡Alerta!", "body" => "Registro no almacenado" ]);
           }               
        }else{
            return redirect()->to("/contenedores/editar/".$id)->with("errors", $this->validator->getErrors())->withInput();
        }
    }
}