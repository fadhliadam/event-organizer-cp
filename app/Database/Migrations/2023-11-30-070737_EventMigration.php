<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class EventMigration extends Migration
{
    public function up()
    {
        // Initialize add field
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'description' => [
                'type' => 'TEXT',
            ],
            'banner' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'target_audience' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'quota' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true
            ],
            'event_type' => [ // online = 0 (false), offline = 1 (true)
                'type' => 'TINYINT',
                'constraint' => 1,
                'unsigned' => true,
                'default' => false
            ],
            'link' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
                'default' => null
            ],
            'price' => [
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => true
            ],
            'date' => [
                'type' => 'DATE',
            ],
            'country' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'province' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'city' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'postal_code' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'street' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'host' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'host_email' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'required_approval' => [ // not required (0), required (1)
                'type' => 'TINYINT',
                'constraint' => 1,
                'unsigned' => true,
                'default' => false
            ],
            'is_completed' => [
                'type' => 'TINYINT', // not completed (0), completed (1)
                'constraint' => 1,
                'unsigned' => true,
                'default' => false
            ],
            'category_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'owner' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'deleted_at DATETIME DEFAULT NULL',
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('category_id', 'categories', 'id', '', 'CASCADE');
        $this->forge->addForeignKey('owner', 'users', 'id', '', 'CASCADE');
        $this->forge->createTable('events');
    }

    public function down()
    {
        // Drop table events
        $this->forge->dropTable('events');
    }
}
