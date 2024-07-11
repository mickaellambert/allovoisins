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
            ],
            'street_address' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'street_number' => [
                'type' => 'VARCHAR',
                'constraint' => '10',
            ],
            'city' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'state' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'postal_code' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
            ],
            'country' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'job_status' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
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
        $this->db->query('CREATE INDEX idx_city ON users(city)');
        $this->db->query('CREATE INDEX idx_state ON users(state)');
        $this->db->query('CREATE INDEX idx_postal_code ON users(postal_code)');
        $this->db->query('CREATE INDEX idx_country ON users(country)');
        $this->db->query('CREATE INDEX idx_phone ON users(phone)');
    }

    public function down()
    {
        // Suppression de la table 'users'
        $this->dbforge->drop_table('users');
    }
}
