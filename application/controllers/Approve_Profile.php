<?php
class Approve_Profile extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('User_model'); // Load the UserModel
        $this->load->library('email'); // Load the Email library
        $this->load->library('session'); // Load the Session library
    }

    public function approve_profile($user_id) {
        $data = ['status' => '1']; // Set status to '1' for approved
        if ($this->User_model->update_user($user_id, $data)) {
            // Fetch user details
            $user = $this->User_model->get_user_by_id($user_id);

            // Configure email settings
            $config = [
                'protocol' => 'smtp',
                'smtp_host' => 'smtp.example.com', // Replace with your SMTP host
                'smtp_port' => 587, // Replace with your SMTP port
                'smtp_user' => 'your_email@example.com', // Replace with your email
                'smtp_pass' => 'your_email_password', // Replace with your email password
                'mailtype' => 'html',
                'charset' => 'utf-8',
                'wordwrap' => TRUE
            ];
            $this->email->initialize($config);

            // Send email confirmation
            $this->email->from('polashbaidya01@gmail.com', 'Admin'); // Replace with your email
            $this->email->to($user['emailid']); // User's email
            $this->email->subject('Profile Approved');
            $this->email->message('Dear ' . $user['fname'] . ', your profile has been approved. You can now log in to your account.');

            if ($this->email->send()) {
                $this->session->set_flashdata('success', 'Profile approved and email sent successfully.');
            } else {
                $this->session->set_flashdata('error', 'Profile approved, but email could not be sent.');
            }
        } else {
            $this->session->set_flashdata('error', 'Failed to approve profile.');
        }
        redirect('admin_Dashboard');
    }
}