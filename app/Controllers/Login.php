<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UsersModel;

class Login extends BaseController{

	protected $usuario;

    public function __construct()
    {
        $this->usuario = new UsersModel();
	}
	
	public function index(){
		return view("login");			
	}	

	public function auth(){
		              
			$session = session();
			
			$user = $this->request->getVar('user', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
			$password = $this->request->getVar('password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
			$data = $this->usuario->where('user', $user)->first();
			// Si existe el usuario
			if($data){
				$pass = $data->password;
				$verify_pass = password_verify($password, $pass);
				if($verify_pass){
					$sesion_data = [
					'user_id' => $data->user_id,
					'first_name' => $data->first_name,
					'last_name' => $data->last_name,
					'user' => $data->user,
					'email' => $data->email,
					'image' => $data->image,
					'created_at' => $data->created_at,
					'logged_in' => TRUE
					];
					$session->set($sesion_data);
					return redirect()->to('/inicio');
				}else{
					$session->setFlashdata('msg', 'Contraseña y/o correo incorrectos');
					return redirect()->to('/login');
				}
			}else{
				$session->setFlashdata('msg', 'Ingrese un correo electronico');
				return redirect()->to('/login');
			}
		}

		// Cerrar sesion
		public function logout(){
			$session = session();
			$session->destroy();
			return redirect()->to('/login');
		}
} 
