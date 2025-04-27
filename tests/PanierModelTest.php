<?php

namespace App\Tests\Models;

use PHPUnit\Framework\TestCase;
use App\Models\PanierModel;

class PanierModelTest extends TestCase {
    protected PanierModel $model;

    protected function setUp(): void
    {
        parent::setUp();
        
        // Initialisation du modèle
        $this->model = new PanierModel();
        
        // Vide la table avant chaque test
        $this->model->truncate();
    }

    public function testFindAllPanier(): void
    {
        // Insertion de 2 entrées dans la table
        $this->model->insert(['n_article' => 'R200', 'client' => 'Jamila']);
        $this->model->insert(['n_article' => 'IP345', 'client' => 'Malika']);
        
        // Vérifier que nous avons bien 2 résultats
        $results = $this->model->findAll();
        $this->assertCount(2, $results, "La table contient 2 articles.");
    }

    public function testInsertPanier(): void
    {
        // Données à insérer
        $data = ['n_article' => 'R200', 'client' => 'Jamila'];
        
        // Vérifier que la table est vide avant l'insertion
        $this->assertCount(0, $this->model->findAll(), "La table doit être vide avant l'insertion.");
        
        // Insertion des données
        $id = $this->model->insert($data);
        
        // Vérification de l'ID retourné
        $this->assertGreaterThan(0, $id, "L'ID retourné après insertion doit être supérieur à 0.");
        
        // Récupération du panier inséré par son ID
        $result = $this->model->find($id);
        
        // Vérification que le résultat n'est pas vide
        $this->assertNotEmpty($result, "Le panier inséré doit être retrouvé dans la base de données.");
        
        // Vérification des valeurs insérées
        $this->assertEquals('R200', $result['n_article'], "Le numéro d'article ne correspond pas.");
        $this->assertEquals('Jamila', $result['client'], "Le nom du client ne correspond pas.");
    }
}
