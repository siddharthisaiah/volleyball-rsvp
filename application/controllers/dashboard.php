<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
		parent::__construct();
    }

    public function index() {
        //TODO: dashboard
        $data['title'] = 'Home | BKK Volleyball';
        $this->load->view("templates/header_view", $data);
        $this->load->view("dashboard");
        $this->load->view("templates/footer_view");
    }

} //class ends
