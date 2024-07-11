<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . '../vendor/autoload.php';

class Cron extends CI_Controller 
{
    public const INACTIVITY_MONTHS = 36;

    public function __construct() 
    {
        parent::__construct();

        if (php_sapi_name() !== 'cli') {
            show_404();
        }
    }

    public function deleteInactiveUsers()
    {
        $this->load->model('UserModel');

        $deletedRows = $this->UserModel->deleteInactives(self::INACTIVITY_MONTHS);

        echo "$deletedRows inactive users deleted successfully.\n";
    }
}
