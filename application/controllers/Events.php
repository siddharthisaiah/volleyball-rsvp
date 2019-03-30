<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller {

    public function __construct() {
		parent::__construct();
    }

    public function index() {
        $data['title'] = 'Volleyball | Events';
        $this->load->view("templates/header_view", $data);
        $this->load->view("events_view");
        $this->load->view("templates/footer_view");
        
    }

    public function create()
    {
        $data['title'] = 'New Event | Volleyball';
        $this->load->view("templates/header_view", $data);
        $this->load->view("create_event_view");
        $this->load->view("templates/footer_view");
    }

} //class ends
