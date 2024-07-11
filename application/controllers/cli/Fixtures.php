<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . '../vendor/autoload.php';

class Fixtures extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function index($count = 100) {
        $faker = Faker\Factory::create();

        for ($i = 0; $i < $count; $i++) {
            $data = [
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => $faker->unique()->safeEmail,
                'phone' => $faker->phoneNumber,
                'street_address' => $faker->streetAddress,
                'street_number' => $faker->buildingNumber,
                'city' => $faker->city,
                'state' => $faker->state,
                'postal_code' => $faker->postcode,
                'country' => $faker->country,
                'job_status' => $faker->jobTitle,
                'logged_at' => $faker->dateTimeThisYear()->format('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
            ];

            $this->db->insert('users', $data);
        }

        echo "$count users generated successfully.";
    }
}
