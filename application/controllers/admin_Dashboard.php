<?php
class admin_Dashboard extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url'); // Load URL helper
        $this->load->model('User_model'); // Load the UserModel
        $this->load->library('email'); // Load email library

        // Uncomment this if you want to restrict access to logged-in users
        // if (!$this->session->userdata('logged_in')) {
        //     redirect('login');
        // }
    }

    public function index() {
        $data['profiles'] = $this->User_model->get_pending_profiles(); // Fetch pending profiles
        $this->load->view('admin_dashboard', $data); // Pass data to the view
    }
}