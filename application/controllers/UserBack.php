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
        $limit = $this->input->get('limit');
        $offset = $this->input->get('offset');

        $this->form_validation->set_data(['limit' => $limit, 'offset' => $offset]);
        $this->form_validation->set_rules('limit', 'Limit', 'required|integer|greater_than[0]');
        $this->form_validation->set_rules('offset', 'Offset', 'required|integer|greater_than_equal_to[0]');

        if ($this->form_validation->run()) {
            $data['users'] = $this->UserModel->selectAll($limit, $offset);
            
            $this->output
                ->set_status_header(HttpStatus::OK)
                ->set_content_type('application/json')
                ->set_output(json_encode($data));
        } else {
            $this->error(strip_tags(validation_errors()));
        }
        
    }
}