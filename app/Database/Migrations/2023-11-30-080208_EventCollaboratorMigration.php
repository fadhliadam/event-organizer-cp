<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class EventCollaboratorMigration extends Migration
{
    public function up()
    {
        // Initialize add field
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'user_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'event_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'deleted_at DATETIME DEFAULT NULL',
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('user_id', 'users', 'id', '', 'CASCADE');
        $this->forge->addForeignKey('event_id', 'events', 'id', '', 'CASCADE');
        $this->forge->createTable('event_collaborators');
    }

    public function down()
    {
        // Drop table event_collaborators
        $this->forge->dropTable('event_collaborators');
    }
}
