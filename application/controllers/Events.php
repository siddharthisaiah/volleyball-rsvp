<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller {

    public function __construct() {
		parent::__construct();
    }

    public function index() {
        echo $this->uri->segment(0);
    }

} //class ends
