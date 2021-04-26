<?php 
    namespace App\Models;
    use CodeIgniter\Model;

    class EnviosModel extends Model{
        protected $table      = 'envios';
        protected $primaryKey = 'id';    
        protected $useAutoIncrement = true;
        protected $returnType     = 'object';
        protected $useSoftDeletes = false;
    
        protected $allowedFields = ['contenedorid', 'fechaEntrega','paisDestino'];
    
        protected $useTimestamps = true;
        protected $createdField  = 'created_at';
        protected $updatedField  = 'updated_at';      
        protected $deletedField  = 'deleted_at';  
            
        protected $validationRules    = [];
        protected $validationMessages = [];
        protected $skipValidation     = false;
    }
?>