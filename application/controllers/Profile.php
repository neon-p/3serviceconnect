<?php
class Profile extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('User_model');
        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        }
    }

    public function myprofile() {
        $user_id = $this->session->userdata('user_id'); 
        $data['user'] = $this->User_model->get_user_by_id($user_id);
        $this->load->view('profile',$data);
    }

    public function editprofile() {
        $user_id = $this->session->userdata('user_id'); 
        $data['user'] = $this->User_model->get_user_by_id($user_id);
        $this->load->view('editprofile',$data);
    }

    public function update_listings() {
        $user_id = $this->session->userdata('user_id'); 
        $data['services'] = $this->User_model->get_all_services();
        $this->load->view('update_listings',$data);
    }

    public function save_update_listings() {
        $user_id = $this->session->userdata('user_id'); 
        $this->form_validation->set_rules('service_id', 'Service', 'required');
        $this->form_validation->set_rules('hourly_rate', 'Hourly Rate', 'required|numeric');
        $this->form_validation->set_rules('availability', 'Availability'| 'required');

        if ($this->form_validation->run() == FALSE) {
            // Validation failed, redirect back with error message
            $this->session->set_flashdata('error', validation_errors());
            redirect('update_listings');
        } else {
            // Prepare Data for Update
            $provider_data = array(
                'user_id' => $user_id,
                'service_id' => $this->input->post('service_id'),
                'hourly_rate' => $this->input->post('hourly_rate'),
                'availability' => $this->input->post('availability'),
                'rating' => 0,
                'bookings' => 0,
            );

            // Update Provider Details
            $this->db->where('user_id', $user_id);
            $existing_provider = $this->db->get('provider_details')->row_array();

            if ($existing_provider) {
                // Update existing record
                $this->db->where('user_id', $user_id);
                $this->db->update('provider_details', $provider_data);
            } else {
                // Insert new record
                $this->db->insert('provider_details', $provider_data);
            }

            // Redirect with success message
            $this->session->set_flashdata('success', 'Listing updated successfully!');
            redirect('myprofile');
        }
    }

    public function complete_profile() {
        $user_id = $this->session->userdata('user_id');
        // Load the complete_profile view
        $this->load->view('complete_profile', $user_id);
    }

    public function save_complete_profile() {
        $user_id = $this->session->userdata('user_id');

        $this->form_validation->set_rules('certification_file', 'Certification', 'required');
        $this->form_validation->set_rules('past_projects_file', 'Past Project', 'required');
        $this->form_validation->set_rules('years_of_experience', 'Years of experience'| 'required');

        // Handle file uploads
        $config['upload_path'] = './uploads/'; // Directory to store uploaded files
        $config['allowed_types'] = 'pdf|doc|docx|jpg|png'; // Allowed file types
        $config['max_size'] = 2048; // Max file size in KB (2MB)
        $config['encrypt_name'] = TRUE; // Encrypt file name to avoid conflicts

        $this->load->library('upload', $config);

        // Upload certification file
        $certification_file_path = '';
        if (!empty($_FILES['certification_file']['name'])) {
            if ($this->upload->do_upload('certification_file')) {
                $certification_file_path = './uploads/' . $this->upload->data('file_name');
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('complete_profile');
            }
        }

        // Upload past projects file
        $past_projects_file_path = '';
        if (!empty($_FILES['past_projects_file']['name'])) {
            if ($this->upload->do_upload('past_projects_file')) {
                $past_projects_file_path = './uploads/' . $this->upload->data('file_name');
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('complete_profile');
            }
        }

        if ($this->form_validation->run() == FALSE) {
            // Validation failed, redirect back with error message
            $this->session->set_flashdata('error', validation_errors());
            redirect('complete_profile');
        } else {

            // Prepare Data for Update
            $provider_data = array(
                'user_id' => $user_id,
                'years_of_experience' => $this->input->post('years_of_experience'),
                'past_project' => $past_projects_file_path, // Save past projects file path
                'certifications' => $certification_file_path, // Save certification file path
            );
    
            
            // Insert or update provider details
            $this->db->where('user_id', $user_id);
            $existing_provider = $this->db->get('certification')->row_array();

            if ($existing_provider) {
                // Update existing record
                $this->db->where('user_id', $user_id);
                $this->db->update('certification', $provider_data);
            } else {
                // Insert new record
                $this->db->insert('certification', $provider_data);
            }

            // Update `users` table with `status=2`
            $this->db->where('user_id', $user_id);
            $this->db->update('users', array('status' => 2));

            // Redirect with success message
            $this->session->set_flashdata('success', 'Document uploaded successfully!');
            redirect('myprofile');
        }
    }


    public function update_availability() {
        // Get the visibility value from the POST request
        $availability = $this->input->post('availability');
    
        // Get the user ID from the session (assuming it's stored in the session)
        $user_id = $this->session->userdata('user_id');
    
        // Check if user ID exists
        if ($user_id) {
            // Update the visibility in the database
            $this->db->where('user_id', $user_id);
            $this->db->update('provider_details', ['availability' => $availability]);
    
            // Redirect back to the profile page with a success message
            $this->session->set_flashdata('success', 'Availability updated successfully!');
            redirect('myprofile');
        } else {
            // Redirect back with an error message if user ID is not found
            $this->session->set_flashdata('error', 'Error: User not logged in.');
            redirect('myprofile');
        }
    }

    public function update_visibility() {
        // Get the visibility value from the POST request
        $visibility = $this->input->post('visibility_provider') ? 1 : 0;
    
        // Get the user ID from the session (assuming it's stored in the session)
        $user_id = $this->session->userdata('user_id');
    
        // Check if user ID exists
        if ($user_id) {
            // Update the visibility in the database
            $this->db->where('user_id', $user_id);
            $this->db->update('users', ['visibility_provider' => $visibility]);
    
            // Redirect back to the profile page with a success message
            $this->session->set_flashdata('success', 'Visibility updated successfully!');
            redirect('myprofile');
        } else {
            // Redirect back with an error message if user ID is not found
            $this->session->set_flashdata('error', 'Error: User not logged in.');
            redirect('myprofile');
        }
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
            $this->session->set_flashdata('success', 'Update failed!Please check your input.');
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
            );

            // Update User Information
            $this->User_model->update_user($user_id, $update_data);

            // Set success message
            $this->session->set_flashdata('success', 'Profile updated successfully!');
            redirect('editprofile');
        }
    }
}
