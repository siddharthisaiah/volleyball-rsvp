<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class events_model extends CI_Model {

    public function __construct() {
        parent::__construct();
		$this->load->helper('string');
	}

    public function create_event($event_details)
    {
        $data = array(
            "name" => $event_details['event_name'],
            "description" => $event_details['event_description'],
            "event_date" => date('Y-m-d', strtotime($event_details['event_date'])),
            "time" => $event_details['event_time'],
            "limit" => $event_details['event_limit']
        );

        return $this->db->insert('events', $data);
    }

    
    public function get_all_events()
    {
        $this->db->select('*');
        $this->db->from('events');
        $this->db->order_by('event_date');
        $this->db->order_by('time');

        return $this->db->get()->result_array();
    }


    public function delete_event($event_id)
    {
        $this->db->where('id', $event_id);
        return $this->db->delete('events');
    }

    public function get_event_details($event_id)
    {
        $this->db->select('*');
        $this->db->from('events');
        $this->db->where('id', $event_id);

        return $this->db->get()->row_array();;
    }

    
    public function update_event($event_id, $event_details)
    {
        $data = array(
            "name" => $event_details['event_name'],
            "description" => $event_details['event_description'],
            "event_date" => date('Y-m-d', strtotime($event_details['event_date'])),
            "time" => $event_details['event_time'],
            "limit" => $event_details['event_limit']
        );
        
        $this->db->where('id', $event_id);
        return $this->db->update('events', $data);
    }


} //class ends
