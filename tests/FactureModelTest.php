<?php

namespace Tests;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;
use App\Models\FactureModel;

final class FactureModelTest extends CIUnitTestCase
{
    public function testCreateFacture()
    {
        $model = new FactureModel();

        $data = [
            'user_id' => 1,
            'total'   => 100.00
        ];

        $this->assertNotNull($data['user_id'], 'user_id can\'t be null');
        $this->assertGreaterThan(0, $data['total'], 'total should be greater than 0');

        $inserted = $model->insert($data, true); 

        $this->assertIsInt($inserted);
        $this->assertGreaterThan(0, $inserted, 'Insert ID should be > 0');
    }
}