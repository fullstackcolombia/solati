<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Book extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT','constraint' => 5,'unsigned' => TRUE,'auto_increment' => TRUE],
            'name' => ['type' => 'VARCHAR','constraint' => '100'],
            'description' => ['type' => 'VARCHAR','constraint' => '100','null' => TRUE],
			'status' => ['type' => 'VARCHAR','constraint' => '80','default' => 'active'],
            'created_at' => ['type' => 'timestamp','null' => TRUE],
			'updated_at' => ['type' => 'timestamp','null' => TRUE],
			'deleted_at' => ['type' => 'timestamp','null' => TRUE],
        ]);
        $this->forge->addKey('id', TRUE);
		//CREATE TABLE IF NOT EXISTS
        $this->forge->createTable('slt_book',TRUE);
		//CREAMOS UNOS LIBROS POR DEFECTO PARA RELLENAR LA TABLA CON DATOS DE EJEMPLO
		$model = new \App\Models\BookModel();
		$model->insert(['name' => 'What is Lorem Ipsum','description' => 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of.']);
		$model->insert(['name' => 'Why do we use it','description' => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered.']);
		$model->insert(['name' => 'Where does it come from','description' => 'All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary.']);
		$model->insert(['name' => 'Where can I get some','description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.']);
		$model->insert(['name' => 'The standard Lorem Ipsum','description' => 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.']);
    }

    public function down()
    {
        $this->forge->dropTable('slt_book',TRUE);
    }
}
