<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/User.php';

class UserBack extends User
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $limit = $this->input->get('limit') ?: 10;
        $offset = $this->input->get('offset') ?: 0;

        $data['users'] = $this->UserModel->selectAll($limit, $offset);

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
    }
}