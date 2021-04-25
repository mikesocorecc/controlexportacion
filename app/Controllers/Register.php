<?php 
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UserModel;

class Register extends Controller{
    public function index(){
        //include helper form
        helper(['form']);
        $data = [];
        echo view('register', $data);
    }

    public function save(){
        $request = \Config\Services::request();                        
        helper(['form']);        
        // $rules = [
        //     'name'          => 'required|min_length[3]|max_length[20]',
        //     'email'         => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.user_email]',
        //     'password'      => 'required|min_length[6]|max_length[200]',
        //     'confpassword'  => 'matches[password]'
        // ];
         
        // if($this->validate($rules)){
            $model = new UserModel();
            $data = [
                'user_name'     => $request->getVar('name'),
                'user_email'    => $request->getVar('email'),
                'user_password' => password_hash($request->getVar('password'), PASSWORD_DEFAULT)
            ];
            $model->save($data);
            return redirect()->to('/login');
        // }else{
            // $data['validation'] = $this->validator;
            // echo view('register', $data);
        // }         
    }

}
