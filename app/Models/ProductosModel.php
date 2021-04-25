<?php 
    namespace App\Models;
    use CodeIgniter\Model;

    class ProductosModel extends Model{
        protected $table      = 'productos';
        protected $primaryKey = 'id';    
        protected $useAutoIncrement = true;
        protected $returnType     = 'object';
        protected $useSoftDeletes = false;
    
        protected $allowedFields = ['producto', 'sku','presentacion','volumen', 'fotografia'];
    
        protected $useTimestamps = true;
        protected $createdField  = 'created_at';
        protected $updatedField  = 'updated_at';      
        protected $deletedField  = 'deleted_at';  
            
        protected $validationRules    = [];
        protected $validationMessages = [];
        protected $skipValidation     = false;
    }
?>