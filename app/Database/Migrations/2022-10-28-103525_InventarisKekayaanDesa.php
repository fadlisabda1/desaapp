<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class InventarisKekayaanDesa extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_inventaris_kekayaan_desa'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'jenis_barang'       => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'lokasi' => [
                'type' => 'VARCHAR',
                'constraint' => '30',
            ],
            'jumlah' => [
                'type' => 'VARCHAR',
                'constraint' => '30',
            ],
            'sumber_pembiayaan' => [
                'type' => 'VARCHAR',
                'constraint' => '30',
            ],
            'perkiraan_biaya' => [
                'type' => 'int',
                'constraint' => '9',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
        ]);
        $this->forge->addKey('id_inventaris_kekayaan_desa', true); //primary key
        $this->forge->createTable('inventaris_kekayaan_desa');
    }

    public function down()
    {
        $this->forge->dropTable('inventaris_kekayaan_desa');
    }
}
