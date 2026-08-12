<?php
 namespace App\Models;

 use CodeIgniter\Model;

 class ConstituencyModel extends Model{

   protected $table            = 'constituencies';

   protected $primarykey       = 'id';

   protected $useAutoIncrement = true;

   protected $returnType       = 'array';

   protected $allowedfields    = [
       'state_id',
       'district_id',
       'constituency_name',
       'constituency_code',
       'status'
   ];

    protected $useTimestamps    = true;

    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';
 }
?>