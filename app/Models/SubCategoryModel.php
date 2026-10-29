<?php
  namespace App\Models;

  use CodeIgniter\Model;

  class SubCategoryModel extends Model
  {
    protected $table = 'sub_categories';
    protected $primaryKey = 'id';
    protected $returnType = 'array';

    protected $allowedFields = [
      'category_id',
      'sub_category_name',
      'is_active'
    ];
  }