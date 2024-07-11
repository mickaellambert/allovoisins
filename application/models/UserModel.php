<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function selectAll($limit, $offset)
    {
        $this->db->limit($limit, $offset);
        $query = $this->db->get('users');
        return $query->result_array();
    }

    public function selectOne($id)
    {
        $query = $this->db->get_where('users', ['id' => $id]);
        return $query->row_array();
    }

    public function insert($data)
    {
        return $this->db->insert('users', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('users', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('users');
    }
}
