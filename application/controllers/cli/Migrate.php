<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migrate extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!is_cli()) {
            exit('No direct script access allowed');
        }
        
        $this->load->library('migration');
    }

    public function index()
    {
        if ($this->migration->current()) {
            echo "Migration successful!";
        } else {
            echo $this->migration->error_string();
        }
    }
}
