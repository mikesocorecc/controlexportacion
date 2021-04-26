<?php 
    namespace App\Models;
    use CodeIgniter\Model;

    class ProveedoresModel extends Model{
        protected $table      = 'proveedores';
        protected $primaryKey = 'id';    
        protected $useAutoIncrement = true;
        protected $returnType     = 'object';
        protected $useSoftDeletes = false;
    
        protected $allowedFields = ['proveedor', 'direccion','telefono','telefonoContacto'];
    
        protected $useTimestamps = true;
        protected $createdField  = 'created_at';
        protected $updatedField  = 'updated_at';      
        protected $deletedField  = 'deleted_at';  
            
        protected $validationRules    = [];
        protected $validationMessages = [];
        protected $skipValidation     = false;
    }
?>