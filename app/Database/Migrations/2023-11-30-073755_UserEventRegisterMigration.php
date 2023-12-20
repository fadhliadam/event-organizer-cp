<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserEventRegisterMigration extends Migration
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
            'status' => [ // 0 = pending, 1 = accepted
                'type' => 'TINYINT', 
                'constraint' => 1,
                'unsigned' => true,
                'default' => false
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'deleted_at DATETIME DEFAULT NULL', // fill if user is rejected from event
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('user_id', 'users', 'id', '', 'CASCADE');
        $this->forge->addForeignKey('event_id', 'events', 'id', '', 'CASCADE');
        $this->forge->createTable('user_event_registers');
    }

    public function down()
    {
        // Drop table user event registers
        $this->forge->dropTable('user_event_registers');
    }
}
