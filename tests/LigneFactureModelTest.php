<?php
namespace App\Tests\Models;

use PHPUnit\Framework\TestCase;
use App\Models\LigneFactureModel;

class LigneFactureModelTest extends TestCase {
    public function testInsertLigneFacture() {
        $model = new LigneFactureModel();
        $data = ['id_facture' => 1, 'id_article' => 1, 'quantity' => 3, 'sub_total' => 300];
        $id = $model->insert($data);
        $this->assertGreaterThan(0, $id, "LigneFacture inséré avec ID > 0!");
    }
    public function testFindAllLignesFacture() {
        $model = new LigneFactureModel();
        
        $lines = $model->findAll(); 
        
        $this->assertIsArray($lines, "findAll retourne un tableau !");
    }
}

?>