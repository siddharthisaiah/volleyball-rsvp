<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller {

    public function __construct() {
		parent::__construct();
        $this->load->model('events_model');

        if (!$this->session->logged_in)
        {
            redirect('login');
        }
        
    }

    public function index() {

        $data['title'] = 'Volleyball | Events';
        $data['events'] = $this->events_model->get_all_events();
        
        $this->load->view("templates/header_view", $data);
        $this->load->view("events_view", $data);
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

    public function delete()
    {
        $event_id = $this->input->post('event_id');
        $delete_event = $this->events_model->delete_event($event_id);

        if($delete_event)
        {
            echo json_encode(array("status" => "success", "message" => "Event deleted successfully"));
        }
        else
        {
            echo json_encode(array("status" => "failure", "message" => "Event could not be deleted. Please try again later"));
        }
    }

    public function update($event_id)
    {
        // get the event details
        $data['title'] = 'Update | Volleyball';
        $data['event_details'] = $this->events_model->get_event_details($event_id);

        $this->load->view("templates/header_view", $data);
        $this->load->view("update_event_view", $data);
        $this->load->view("templates/footer_view");
    }

    public function update_form()
    {
        $event_id = $this->input->post('event_id');
        $event_details = array(
            "event_name" => $this->input->post('event_name'),
            "event_description" => $this->input->post('event_description'),
            "event_date" => $this->input->post('event_date'),
            "event_time" => $this->input->post('event_time'),
            "event_limit" => $this->input->post('event_limit')
        );


        $update_event_successfully = $this->events_model->update_event($event_id, $event_details);

        if($update_event_successfully)
        {
            echo json_encode(array("status" => "success", "message" => "Event updated successfully"));
        }
        else
        {
            echo json_encode(array("status" => "failure", "message" => "Could not update event. Please try again later"));
        }
    }


    public function details($id)
    {
        # Get all the details of the event and display it to user
        $data['title'] = "Event Details";
        $data['event_id'] = $id;

        // TODO: get all event details
        $data['event_details'] = $this->events_model->get_event_details($id); // row array
        $data['confirmed_users'] = $this->events_model->get_event_confirmed_user_details($id); 
        $data['waitlisted_users'] = $this->events_model->get_event_waitlisted_user_details($id);
        $data['comments'] = $this->events_model->get_event_comments($id);
            
        // TODO: get all attendees, and waitlisted ppls
        // TODO: get all comments for the event (discussion board)
        
        $this->load->view("templates/header_view", $data);
        $this->load->view("events_details_view", $data);
        $this->load->view("templates/footer_view");
    }

} //class ends
