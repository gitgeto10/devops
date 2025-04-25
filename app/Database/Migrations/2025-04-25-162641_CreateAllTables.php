<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAllTables extends Migration
{
    public function up()
    {
        // Table users
        $this->forge->addField([
            'id'    => ['type' => 'INT', 'auto_increment' => true],
            'name'  => ['type' => 'VARCHAR', 'constraint' => 100],
            'email' => ['type' => 'VARCHAR', 'constraint' => 100],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('users');

        // Table factures
        $this->forge->addField([
            'id'       => ['type' => 'INT', 'auto_increment' => true],
            'user_id'  => ['type' => 'INT'],
            'total'    => ['type' => 'DECIMAL', 'constraint' => '10,2'],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('factures');

        // Table article
        $this->forge->addField([
            'id'           => ['type' => 'INT', 'auto_increment' => true],
            'ref'          => ['type' => 'VARCHAR', 'constraint' => 50],
            'nom'          => ['type' => 'VARCHAR', 'constraint' => 255],
            'prixUnitaire' => ['type' => 'DECIMAL', 'constraint' => '10,2'],
            'qte'          => ['type' => 'INT'],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('article');

        // Table lignefacture
        $this->forge->addField([
            'id'         => ['type' => 'INT', 'auto_increment' => true],
            'id_facture' => ['type' => 'INT'],
            'id_article' => ['type' => 'INT'],
            'quantity'   => ['type' => 'INT'],
            'sub_total'  => ['type' => 'DECIMAL', 'constraint' => '10,2'],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_facture', 'factures', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_article', 'article', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('lignefacture');

        // Table panier
        $this->forge->addField([
            'id'        => ['type' => 'INT', 'auto_increment' => true],
            'n_article' => ['type' => 'VARCHAR', 'constraint' => 255],
            'client'    => ['type' => 'VARCHAR', 'constraint' => 25],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('panier');

        // Table bonlivraison
        $this->forge->addField([
            'id'            => ['type' => 'INT', 'auto_increment' => true],
            'status'        => ['type' => 'VARCHAR', 'constraint' => 255],
            'delivery_date' => ['type' => 'DATE'],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('bonlivraison');

        // Table lignebonlivraison
        $this->forge->addField([
            'id'              => ['type' => 'INT', 'auto_increment' => true],
            'id_bonlivraison' => ['type' => 'INT'],
            'designation'     => ['type' => 'VARCHAR', 'constraint' => 255],
            'quantity'        => ['type' => 'INT'],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_bonlivraison', 'bonlivraison', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('lignebonlivraison');
    }

    public function down()
    {
        $this->forge->dropTable('lignebonlivraison');
        $this->forge->dropTable('bonlivraison');
        $this->forge->dropTable('panier');
        $this->forge->dropTable('lignefacture');
        $this->forge->dropTable('article');
        $this->forge->dropTable('factures');
        $this->forge->dropTable('users');
    }

}
