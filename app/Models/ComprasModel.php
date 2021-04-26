<?php 
    namespace App\Models;
    use CodeIgniter\Model;

    class ComprasModel extends Model{
        protected $table      = 'compras';
        protected $primaryKey = 'id';    
        protected $useAutoIncrement = true;
        protected $returnType     = 'object';
        protected $useSoftDeletes = false;
    
        protected $allowedFields = ['producto', 'cantidad','fechaArribo','lugarArribo', 'aeropuertodestino', 'unidades'];
    
        protected $useTimestamps = true;
        protected $createdField  = 'created_at';
        protected $updatedField  = 'updated_at';      
        protected $deletedField  = 'deleted_at';  
            
        protected $validationRules    = [];
        protected $validationMessages = [];
        protected $skipValidation     = false;
    }
?>