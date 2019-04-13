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


    public function get_event_confirmed_user_details($id)
    {
        $event_limit = $this->get_event_limit($id);

        $this->db->select('u.f_name, l_name');
        $this->db->from('users as u');
        $this->db->join('event_attendees as ea', 'ea.user_id = u.id');
        $this->db->where('ea.event_id', $id);
        $this->db->order_by('ea.updated_at', 'ASC');

        $users = $this->db->get()->result_array();
        return array_slice($users, 0, $event_limit);
    }


    public function get_event_waitlisted_user_details($id)
    {
        $event_limit = $this->get_event_limit($id);

        $this->db->select('u.f_name, l_name');
        $this->db->from('users as u');
        $this->db->join('event_attendees as ea', 'ea.user_id = u.id');
        $this->db->where('ea.event_id', $id);
        $this->db->order_by('ea.updated_at', 'ASC');

        $users = $this->db->get()->result_array();
        return array_slice($users, $event_limit);
    }


    public function get_event_limit($id)
    {
        $this->db->select('limit');
        $this->db->from('events');
        $this->db->where('id', $id);

        return $this->db->get()->row_array()['limit'];
    }


    public function get_event_comments($id)
    {
        $this->db->select('c.id, c.event_id, c.user_id, c.comment, c.created_on, u.f_name, u.l_name, u.profile_pic_url');
        $this->db->from('comments AS c');
        $this->db->join('users as u', 'c.user_id = u.id');
        $this->db->where('c.event_id', $id);
        $this->db->order_by('c.created_on', 'DESC');

        return $this->db->get()->result_array();
    }

    public function save_comment($event_id, $comment)
    {
        // whos making the comment
        $user_id = $this->users_model->get_user_details_from_session()['id'];
        $timestamp = date("Y-m-d H:i:s");

        $data = array(
            'event_id' => $event_id,
            'user_id' => $user_id,
            'comment' => $comment,
            'created_on' => $timestamp);

        return $this->db->insert('comments', $data);
    }

    public function is_user_going_for_event($id)
    {
        $user_id = $this->users_model->get_user_details_from_session()['id'];
        $this->db->select('*');
        $this->db->from('event_attendees');
        $this->db->where('event_id', $id);
        $this->db->where('user_id', $user_id);

        return $this->db->get()->num_rows() > 0;
    }


    public function rsvp_to_event($event_id)
    {
        $user_id = $this->users_model->get_user_details_from_session()['id'];
        $timestamp = date("Y-m-d H:i:s");
        
        $data = array(
            "event_id" => $event_id,
            "user_id" => $user_id,
            "updated_at" => $timestamp);

        return $this->db->insert("event_attendees", $data);
    }

    public function cancel_rsvp_to_event($event_id)
    {
        $user_id = $this->users_model->get_user_details_from_session()['id'];

        $this->db->where('event_id', $event_id);
        $this->db->where('user_id', $user_id);

        return $this->db->delete('event_attendees');
    }
    


} //class ends
