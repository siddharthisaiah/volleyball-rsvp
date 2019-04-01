<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller {

    public function __construct() {
		parent::__construct();
        $this->load->model('events_model');
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

    public function create_form()
    {
        $event_details = array(
            "event_name" => $this->input->post('event_name'),
            "event_description" => $this->input->post('event_description'),
            "event_date" => $this->input->post('event_date'),
            "event_time" => $this->input->post('event_time'),
            "event_limit" => $this->input->post('event_limit')
        );


        $create_event_successfully = $this->events_model->create_event($event_details);

        if($create_event_successfully)
        {
            echo json_encode(array("status" => "success", "message" => "Event created successfully"));
        }
        else
        {
            echo json_encode(array("status" => "failure", "message" => "Could not create event. Please try again later"));
        }
    }

} //class ends
