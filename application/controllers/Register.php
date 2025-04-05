<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
	 public function __construct() {
        parent::__construct();
        $this->load->model('User_model'); // Load the User model
    }

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$this->load->view('register');
	}

	public function register_process() { 
        // Form Validation Rules
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.emailid]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required|numeric');
        $this->form_validation->set_rules('city', 'City', 'required');
        $this->form_validation->set_rules('province', 'Province', 'required');
        $this->form_validation->set_rules('postalcode', 'Postalcode', 'required');
        $this->form_validation->set_rules('country', 'Country', 'required'); 

        if ($this->form_validation->run() == FALSE) {

            // Validation failed, reload form with errors
            $this->session->set_flashdata('success', 'Registration failed!Please check your input.');
            redirect('register');
        } else {
            // Data for insertion
            $data = array(
                'fname' => $this->input->post('name'),
                'lname' => $this->input->post('lname'),
                'emailid' => $this->input->post('username'),
                'password' => md5($this->input->post('password')), // Hash password
                'address1' => $this->input->post('address'),
                'address2' => $this->input->post('address2'),
                'city' => $this->input->post('city'),
                'province' => $this->input->post('province'),
                'postalcode' => $this->input->post('postalcode'),
                'country' => $this->input->post('country'),
                'mobile' => $this->input->post('phone'),
                'usertype' => $this->input->post('user_type'),
            );

            // Insert user into DB
            if ($this->User_model->register_user($data)) {
                $this->session->set_flashdata('success', 'Registration successful!Check your email for verifiation.');
                redirect('register');
                //echo "Registration successful! Check your email for verifiation.";
            } else {
                //echo "Registration Failed!";
                $this->session->set_flashdata('success', 'Registration failed!');
                redirect('register');
            }
        }
    }
}
