<?php
namespace App\Models;

use CodeIgniter\Model;

class LigneFactureModel extends Model {
    protected $table = 'lignefacture';
    protected $primaryKey = 'id'; 
    protected $allowedFields = ['id_facture', 'id_article', 'quantity', 'sub_total'];
}
?>