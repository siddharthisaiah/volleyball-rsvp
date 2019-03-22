<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
		parent::__construct();
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
            'logged_in'  => TRUE
        );

        $this->session->set_userdata($session_data);
    }

} //class ends
