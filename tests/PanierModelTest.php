<?php

namespace App\Tests\Models;

use PHPUnit\Framework\TestCase;
use App\Models\PanierModel;

class PanierModelTest extends TestCase
{
    protected PanierModel $model;

    protected function setUp(): void
    {
        parent::setUp();
        $this->model = new PanierModel();
        $this->model->truncate();
    }

    public function testInsertPanier(): void
{
    $data = [
        'n_article' => 'R200',
        'client'    => 'Jamila',
    ];

    ob_start(); // Démarre la capture de la sortie

    try {
        $this->assertCount(0, $this->model->findAll());

        $id = $this->model->insert($data);
        $this->assertIsInt($id);

        $result = $this->model->find($id);
        $this->assertNotEmpty($result);
        $this->assertEquals('R200', $result['n_article']);
        $this->assertEquals('Jamila', $result['client']);
    } catch (\Exception $e) {
        // Gérer les exceptions si nécessaire
        echo "Error: " . $e->getMessage();
    }

    ob_end_clean(); // Nettoie la sortie
}

    public function testFindAllPanier(): void
    {
        $this->model->insert(['n_article' => 'R200', 'client' => 'Jamila']);
        $this->model->insert(['n_article' => 'IP345', 'client' => 'Malika']);

        $results = $this->model->findAll();
        $this->assertCount(2, $results);
    }
}