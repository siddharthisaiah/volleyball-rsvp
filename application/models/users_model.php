<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class users_model extends CI_Model {

    public function __construct() {
        parent::__construct();
		$this->load->helper('string');
	}


    public function is_registered_fb_user($fb_user_id)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('fb_user_id', $fb_user_id);

        return $this->db->get()->num_rows() > 0;
    }

    public function get_fb_user_details($fb_user_id)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('fb_user_id', $fb_user_id);
        
        return $this->db->get()->row_array();
    }

    public function update_fb_user_details($fb_user_id, $access_token, $first_name, $last_name, $profile_pic_url) {
        $data = array(
            'f_name' => $first_name,
            'l_name' => $last_name,
            'fb_access_token' => $access_token,
            'profile_pic_url' => $profile_pic_url);

        $this->db->where('fb_user_id', $fb_user_id);
        return $this->db->update('users', $data);
    }

    public function register_fb_user($fb_user_id, $access_token, $first_name, $last_name, $profile_pic_url)
    {
        $data = array(
            'f_name' => $first_name,
            'l_name' => $last_name,
            'fb_access_token' => $access_token,
            'profile_pic_url' => $profile_pic_url,
            'fb_user_id' => $fb_user_id
        );
        return $this->db->insert('users', $data);

    }


    public function get_user_details_from_session()
    {
        $user_id = $this->session->id;
        
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id', $user_id);
        
        return $this->db->get()->row_array();
    }

} //class ends
