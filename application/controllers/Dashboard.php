<?php
class Dashboard extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('User_model'); // Ensure the User_model is loaded

        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        }
    }


    public function index() {
        // Fetch user profile details
        $user_id = $this->session->userdata('user_id');
        $data['user'] = $this->User_model->get_user_by_id($user_id);

        // Fetch activity history
        //$data['activity_history'] = $this->User_model->get_activity_history($user_id);

        // Load the dashboard view with the data
        $this->load->view('dashboard', $data);
    }

    public function myprofile() {
        $user_id = $this->session->userdata('user_id'); 
        $data['user'] = $this->User_model->get_user_by_id($user_id);
        $this->load->view('profile', $data);
    }

    public function editprofile() {
        $user_id = $this->session->userdata('user_id'); 
        $data['user'] = $this->User_model->get_user_by_id($user_id);
        $this->load->view('editprofile', $data);
    }
    
    public function update_profile() {
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }

        $user_id = $this->session->userdata('user_id');

        // Form Validation Rules
        $this->form_validation->set_rules('fname', 'First Name', 'required');
        $this->form_validation->set_rules('lname', 'Last Name', 'required');
        $this->form_validation->set_rules('mobile', 'Phone Number', 'required');
        $this->form_validation->set_rules('address1', 'Address', 'required');

        $this->form_validation->set_rules('city', 'City', 'required');
        $this->form_validation->set_rules('province', 'Province', 'required');
        $this->form_validation->set_rules('postalcode', 'Postal code', 'required');
        $this->form_validation->set_rules('country', 'Country', 'required'); 

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('success', 'Update failed! Please check your input.');
            redirect('editprofile');
        } else {
            // Prepare Data for Update
            $update_data = array(
                'fname' => $this->input->post('fname'),
                'lname' => $this->input->post('lname'),
                'mobile' => $this->input->post('mobile'),
                'address1' => $this->input->post('address1'),
                'address2' => $this->input->post('address2'),
                'city' => $this->input->post('city'),
                'province' => $this->input->post('province'),
                'postalcode' => $this->input->post('postalcode'),
                'country' => $this->input->post('country'),
                'usertype' => $this->input->post('user_type'),
            );

            // Update User Information
            $this->User_model->update_user($user_id, $update_data);

            // Set success message
            $this->session->set_flashdata('success', 'Profile updated successfully!');
            redirect('editprofile');
        }
    }
}