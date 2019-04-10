<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
		parent::__construct();
        $this->load->model('users_model');
    }

    public function index() {

        if($this->session->logged_in)
        {
            redirect('home');
        }
        
        $data['title'] = "Login";
        $this->load->view("login/login_header", $data);
        $this->load->view("login/login_view");
        $this->load->view("login/login_footer");
    }

    public function authenticate()
    {

        // check if username and password match
        $username = $this->input->post('username');
        $password = $this->input->post('password');


        // login credentials
        if($this->is_valid_login_credentials($username, $password))
        {
            //set session data
            $this->set_session_data($username);
            redirect('home');
        }
        else
        {
            // TODO: show error message as a flash message
            echo "INVALID LOGIN CREDENTIALS";
        }
        // set cookie
        // redirec to home
    }

    public function is_valid_login_credentials($username, $password)
    {
        return ($username == 'siddharth@test.com') && ($password == 'test');
    }


    public function set_session_data($username)
    {
        //TODO: get details from user table
        $session_data = array(
            'username'   => 'siddharth@test.com',
            'first_name' => 'siddharth',
            'last_name'  => 'isaiah',
            'email'      => 'siddharthisaiah@gmail.com',
            'logged_in'  => TRUE,
            'user_role'  => 'admin',
            'is_fb_user' => FALSE
        );

        $this->session->set_userdata($session_data);
    }

    public function is_registered_fb_user()
    {
        $fb_id = $this->input->post('user_id');

        if($this->users_model->is_registered_fb_user($fb_id))
        {
            echo json_encode(array('status' => 'success', 'message' => 'user is a registered FB user'));
        }
        else
        {
            echo json_encode(array('status' => 'failure', 'message' => 'user has not registered throught FB'));
        }
    }


    public function login_or_register_fb_user() {

        $fb_user_id = $this->input->post('userId');
        $access_token = $this->input->post('accessToken');
        $first_name = $this->input->post('firstName');
        $last_name = $this->input->post('lastName');
        $profile_pic_url = $this->input->post('picUrl');

        //        echo $user_id, $access_token, $first_name, $last_name, $profile_pic_url;

        if ($this->users_model->is_registered_fb_user($fb_user_id))
        {
            $user_details = $this->users_model->get_fb_user_details($fb_user_id);

            if (    $access_token != $user_details['fb_access_token']
                 || $profile_pic_url != $user_details['profile_pic_user']
                 || $first_name != $user_details['f_name']
                 || $last_name != $user_details['l_name'] )
            {
                // if access token and profile pic are different then update it
                $update_fb_user = $this->users_model->update_fb_user_details($fb_user_id, $access_token, $first_name, $last_name, $profile_pic_url);

                if ($update_fb_user)
                {
                    $user_details = $this->users_model->get_fb_user_details($fb_user_id);
                }
                else
                {
                    echo "something went wrong. could not get user details";
                }
            }

        }
        else
        {
            // get details and register user
            $register_fb_user = $this->users_model->register_fb_user($fb_user_id, $access_token, $first_name, $last_name, $profile_pic_url);

            if ($register_fb_user)
            {
                $user_details = $this->users_model->get_fb_user_details($fb_user_id);
            }
            else
            {
                echo "something went wrong. could not get user details";
            }

        }

        // set session details

        $session_data = array(
            'username'   => $user_details['f_name'] . " " . $user_details['l_name'],
            'first_name' => $user_details['f_name'],
            'last_name'  => $user_details['l_name'],
            'logged_in'  => TRUE,
            'user_role'  => 'admin',
            'is_fb_user' => TRUE,
            'fb_user_id' => $user_details['fb_user_id'],
            'id' => $user_details['id']
        );

        $this->session->set_userdata($session_data);

        redirect('home');

    }


    public function logout()
    {
        session_destroy();
        redirect('login');
    }
        
    


} //class ends
