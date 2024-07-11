<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_users_table extends CI_Migration
{
    public function up()
    {
        $this->dbforge->add_field([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'first_name' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'last_name' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'phone' => [
                'type' => 'VARCHAR',
                'constraint' => '15',
                'null' => TRUE,
            ],
            'address' => [
                'type' => 'TEXT',
                'null' => TRUE,
            ],
            'job_status' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => TRUE,
            ],
            'logged_at' => [
                'type' => 'DATETIME',
                'null' => TRUE,
            ],
        ]);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('users');

        // Ajouter les champs 'created_at' et 'updated_at' avec des expressions SQL brutes
        $this->db->query('ALTER TABLE `users` ADD `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP');
        $this->db->query('ALTER TABLE `users` ADD `updated_at` DATETIME NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP');
        
        // Ajout des index
        $this->db->query('CREATE INDEX idx_logged_at ON users(logged_at)');
        $this->db->query('CREATE INDEX idx_email ON users(email)');
        $this->db->query('CREATE INDEX idx_phone ON users(phone)');
    }

    public function down()
    {
        // Suppression de la table 'users'
        $this->dbforge->drop_table('users');
    }
}
