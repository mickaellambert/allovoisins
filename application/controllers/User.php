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

    public function update($id)
    {
        $data = json_decode($this->input->raw_input_stream, true);
        
        if ($this->validate($data, true)) {
            $this->UserModel->update($id, $data);

            $this->output->set_status_header(HttpStatus::OK)
                         ->set_content_type('application/json')
                         ->set_output(json_encode(['result' => 'User updated']));
        } else {
            $this->error(validation_errors(), HttpStatus::BAD_REQUEST);
        }
    }

    protected function validate($data, $update = false)
    {
        $rules = [
            'first_name' => 'max_length[100]',
            'last_name' => 'max_length[100]',
            'email' => 'valid_email|max_length[100]',
            'phone' => 'max_length[15]',
            'street_address' => 'max_length[255]',
            'street_number' => 'max_length[10]',
            'city' => 'max_length[100]',
            'state' => 'max_length[100]',
            'postal_code' => 'max_length[20]',
            'country' => 'max_length[100]',
            'job_status' => 'max_length[100]'
        ];

        if (!$update) {
            $rules = array_map(function($rule) {
                return 'required|' . $rule;
            }, $rules);
        }

        $this->form_validation->set_data($data);

        foreach ($rules as $field => $rule) {
            $this->form_validation->set_rules($field, ucfirst(str_replace('_', ' ', $field)), $rule);
        }

        return $this->form_validation->run();
    }
    
    public function error($message, $status_code = HttpStatus::BAD_REQUEST)
    {
        $this->output->set_status_header($status_code)
                     ->set_content_type('application/json')
                     ->set_output(json_encode(['status' => 'error', 'message' => $message]));
    }
}
