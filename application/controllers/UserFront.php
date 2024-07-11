<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/User.php';

class UserFront extends User
{
    public function __construct()
    {
        parent::__construct();
    }
}