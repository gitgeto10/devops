<?php
namespace App\Models;

use CodeIgniter\Model; 

class FactureModel extends Model
{
    protected $table = 'factures';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'total'];
}