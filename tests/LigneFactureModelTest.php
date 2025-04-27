<?php
namespace App\Tests\Models;

use PHPUnit\Framework\TestCase;
use App\Models\LigneFactureModel;

class LigneFactureModelTest extends TestCase {
    protected $db;

    protected function setUp(): void
    {
        parent::setUp();
        $this->db = db_connect(); // Connexion à la base de données
    }
    public function testInsertLigneFacture()
    {
        // Insérer un utilisateur manuellement
        $this->db->table('users')->insert([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        $userId = $this->db->insertID();

        // Insérer une facture pour ce user
        $this->db->table('factures')->insert([
            'user_id' => $userId,
            'total' => 0,
        ]);
        $factureId = $this->db->insertID();

        // Insérer un article
        $this->db->table('article')->insert([
            'ref' => 'REF001',
            'nom' => 'Test Article',
            'prixUnitaire' => 10.00,
            'qte' => 100,
        ]);
        $articleId = $this->db->insertID();

        // Maintenant on peut tester l'insertion d'une lignefacture
        $this->db->table('lignefacture')->insert([
            'id_facture' => $factureId,
            'id_article' => $articleId,
            'quantity'   => 2,
            'sub_total'  => 20.00,
        ]);

        $inserted = $this->db->affectedRows();

        $this->assertEquals(1, $inserted); 
    }


    public function testFindAllLignesFacture() {
        $model = new LigneFactureModel();
        $lines = $model->findAll();
        
        $this->assertIsArray($lines, "findAll retourne un tableau !");
        $this->assertNotEmpty($lines, "Des lignes de facture existent !");
    }
}

?>