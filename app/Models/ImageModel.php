<?php

namespace App\Models;

use CodeIgniter\Model;

class ImageModel extends Model
{
    protected $table = 'images';
    protected $allowedFields = ['caption', 'name', 'nim', 'phone', 'location', 'path'];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField = 'deleted_at';
}
