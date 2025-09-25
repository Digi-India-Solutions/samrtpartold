<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Admins extends Migration
{
	public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
           
			'username' => [
                'type' => 'VARCHAR',
                'constraint' => '250',
                'null' => false,
                'unique' => true
            ],
            'permission' => [
                'type' => 'TEXT',
                 'null' => true,
                 'unique' => false
            ],
            'firstname' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => TRUE
            ],
            'lastname' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => TRUE
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => false,
                'unique' => true
            ],
			'password'=>[
				'type'=>'VARCHAR',
				'constraint'=>'250',
				'null'=>false
			],
            'photo'=>[
				'type'=>'VARCHAR',
				'constraint'=>'250',
				'null'=>TRUE
			],
            'status'=>[
				'type'=>'INT',
				'constraint'=>'11',
				'null'=>false,
                'default'=>1
			],
          
            'last_login'=>[
				'type'=>'VARCHAR',
				'constraint'=>'250',
				'null'=>TRUE
			],
		
            'modify_date' => [
                'type' => 'datetime',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'datetime',
                'null' => true,
            ],
        'create_date datetime default current_timestamp',
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('admin');
    }

    public function down()
    {
        $this->forge->dropTable('admin');
    }
}
