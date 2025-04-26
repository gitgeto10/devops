<?php
namespace App\Tests\Models;

use PHPUnit\Framework\TestCase;
use App\Models\ArticleModel;

class ArticleModelTest extends TestCase {
    protected $model;

    protected function setUp(): void {
        $this->model = new ArticleModel();
    }

    public function testInsertArticle() {
        $data = [
            'ref' => 'ART001',
            'nom' => 'Produit A',
            'prixUnitaire' => 120,
            'qte' => 5
        ];
        // Check before insert
        if ($data['prixUnitaire'] <= 0 || $data['qte'] <= 0) {
            $this->markTestSkipped("Insertion non effectuée: prix unitaire et quantité doivent être > 0");
        }
        $id = $this->model->insert($data);

        $article = $this->model->find($id);
        $this->assertGreaterThan(0, $article['prixUnitaire'], "Prix unitaire doit être > 0");
        $this->assertGreaterThan(0, $article['qte'], "Quantité doit être > 0");
    }
}
