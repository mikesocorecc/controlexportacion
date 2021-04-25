<?php 
    namespace App\Models;
    use CodeIgniter\Model;

    class UsersModel extends Model{
        protected $table      = 'users';
        protected $primaryKey = 'user_id';    
        protected $useAutoIncrement = true;
        protected $returnType     = 'object';
        protected $useSoftDeletes = false;
    
        protected $allowedFields = ['first_name', 'last_name','email','user', 'password', 'image', 'status'];
    
        protected $useTimestamps = true;
        protected $createdField  = 'created_at';
        protected $updatedField  = 'updated_at';      
        protected $deletedField  = 'deleted_at';  
            
        protected $validationRules    = [];
        protected $validationMessages = [];
        protected $skipValidation     = false;
    }
?>