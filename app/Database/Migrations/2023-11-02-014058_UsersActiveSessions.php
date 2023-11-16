<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UsersActiveSessions extends Migration
{
  public function up()
  {
      $this->forge->addField([
          'ip' => [
              'type' => 'VARCHAR',
              'constraint' => 255, // Ajusta la longitud según tus necesidades
              'unique' => true, // Para que sea clave primaria y única
          ],
          'email' => [
              'type' => 'VARCHAR',
              'constraint' => 255,
              'unique' => true,
          ],
          'client' => [
              'type' => 'VARCHAR',
              'constraint' => 255,
              'unique' => true,
          ],
          'session_started_at' => [
              'type' => 'DATETIME',
              'null' => false,
          ],
          'session_ends_at' => [
              'type' => 'DATETIME',
              'null' => false,
          ],
      ]);

      $this->forge->addPrimaryKey(['ip', 'email', 'client']);
      $this->forge->createTable('users_active_sessions'); // Nombre de la tabla actualizado
  }

  public function down()
  {
      $this->forge->dropTable('users_active_sessions'); // Nombre de la tabla actualizado
  }
}
