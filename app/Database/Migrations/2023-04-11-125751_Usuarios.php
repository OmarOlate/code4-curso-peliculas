<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Usuarios extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'user' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'unique' => TRUE
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'unique' => TRUE
            ],
            'pass' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'type_user' => [
                'type' => 'ENUM',
                'constraint' => ['admin','regular'],
                'default' => 'regular'
            ],
        ]);
        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('usuarios');
    }

    public function down()
    {
        $this->forge->dropTable('usuarios');
    }
}
