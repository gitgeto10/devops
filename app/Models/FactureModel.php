<?php
namespace App\Models;

use CodeIgniter\Model; // Ensure CodeIgniter is properly autoloaded in composer.json

class FactureModel extends Model
{
    protected $table = 'factures';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'total'];
}