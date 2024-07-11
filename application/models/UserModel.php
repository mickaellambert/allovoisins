<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model
{
    public const OPTIONAL_FIELDS = ['state', 'job_status'];

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function selectAll(int $limit, int $offset)
    {
        $this->db->limit($limit, $offset);
        $query = $this->db->get('users');
        return $query->result_array();
    }

    public function selectOne(int $id)
    {
        $query = $this->db->get_where('users', ['id' => $id]);
        return $query->row_array();
    }

    public function insert(array $data)
    {
        return $this->db->insert('users', $data);
    }

    public function update(int $id, array $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('users', $data);
    }

    public function delete(int $id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('users');
    }

    public function deleteInactives(int $months)
    {
        $date = date('Y-m-d H:i:s', strtotime("-$months months"));
        
        $this->db->where('logged_at <', $date);
        $this->db->delete('users');
        
        return $this->db->affected_rows();
    }
}
