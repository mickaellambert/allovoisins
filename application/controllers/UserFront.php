<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/User.php';

class UserFront extends User
{
    public function __construct()
    {
        parent::__construct();
    }

    public function add()
    {
        $data = json_decode($this->input->raw_input_stream, true);

        if ($this->validate($data)) {
            $this->UserModel->insert($data);

            $this->output
                ->set_status_header(HttpStatus::CREATED)
                ->set_content_type('application/json')
                ->set_output(json_encode(['status' => 'User created']));
        } else {
            $this->error(validation_errors(), HttpStatus::BAD_REQUEST);
        }
    }
}