<?php
namespace App\Models;
use CodeIgniter\Model;

class MlaDevelopmentWorkImageModel extends Model
{
    protected $table = 'mla_developmentwork_images';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = ['developmentwork_id', 'image'];
    protected $useTimestamps = true;
    

    public function getImagesByWorkIds(array $workIds): array
    {
        if ($workIds === [] || !$this->db->tableExists($this->table)) return [];
        $rows = $this->whereIn('developmentwork_id', $workIds)->orderBy('id')->findAll();
        $images = [];
        foreach ($rows as $row) $images[$row['developmentwork_id']][] = $row['image'];
        return $images;
    }
}
