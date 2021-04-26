<?php

namespace App\Controllers;
use App\Models\ComprasModel;
use App\Models\ProductosModel;
use App\Models\UsersModel;
use App\Models\ProveedoresModel;

class Inicio extends BaseController
{
	protected $comprasModel;
	protected $productosModel;
	protected $usersModel;
	protected $proveedoresModel;
    public function __construct(){
        $this->comprasModel = new ComprasModel();
        $this->productosModel = new ProductosModel();
        $this->usersModel = new UsersModel();
        $this->proveedoresModel = new ProveedoresModel();
    }

	public function index(){
		$compra = $this->comprasModel->selectCount('id')->first();
		$totalProductos = $this->productosModel->selectCount('id')->first();
		$totalUsuarios = $this->usersModel->selectCount('user_id')->first();
		$totalProveedores = $this->proveedoresModel->selectCount('id')->first();
		$data = [
            "compra" => $compra,                        
            "producto" => $totalProductos,                        
            "usuario" => $totalUsuarios,                        
            "proveedor" => $totalProveedores
        ];
		return view('inicio', $data);
	}
}
