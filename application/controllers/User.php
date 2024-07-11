<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('UserModel');
        $this->load->library(['form_validation', 'HttpStatus']);
    }
    
    public function error($message, $status_code = HttpStatus::BAD_REQUEST)
    {
        $this->output->set_status_header($status_code)
                     ->set_content_type('application/json')
                     ->set_output(json_encode(['status' => 'error', 'message' => $message]));
    }
}
