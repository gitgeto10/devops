<?php

namespace Tests;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;
use App\Models\FactureModel;
use App\Models\UserModel;

final class FactureModelTest extends CIUnitTestCase
{
    public function testCreateFacture()
    {
        $userModel = new UserModel();
        $userData = [
            'name'  => 'Test User',
            'email' => 'testuser@example.com'
        ];
        $userId = $userModel->insert($userData);

        $this->assertGreaterThan(0, $userId, 'User ID should be greater than 0');

        $factureModel = new FactureModel();
        $factureData = [
            'user_id' => $userId,
            'total'   => 150.75
        ];
        $factureId = $factureModel->insert($factureData);

        $this->assertIsInt($factureId, 'Facture ID should be an integer');
        $this->assertGreaterThan(0, $factureId, 'Facture ID should be greater than 0');
    }
}
