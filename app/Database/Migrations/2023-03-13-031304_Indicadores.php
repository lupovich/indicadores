<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Indicadores extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nombreIndicador' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'codigoIndicador' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'unidadMedidaIndicador' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'valorIndicador' => [
                'type'       => 'DECIMAL(15,2)',
            ],
            'fechaIndicador' => [
                'type'       => 'DATE',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('indicadores');
    }

    public function down()
    {
        $this->forge->dropTable('indicadores');
    }
}
