<?php
class Login extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper(['form', 'url']);
        $this->load->library(['session', 'form_validation']);
        $this->load->database();
    }

    public function index() {
        $this->load->view('login');
    }

    public function auth() {
        // Validate form input
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login');
        } else {

            // Get user input
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            // Query the database
            $this->db->where('emailid', $email);
            $user = $this->db->get('users')->row();


            if ($user&& md5($password)==$user->password){
                // Set session data
                $this->session->set_userdata([
                    'user_id' => $user->user_id,
                    'username' => $user->fname,
                    'email' => $user->emailid,
                    'logged_in' => TRUE
                ]);

                // Redirect to dashboard or home page
                redirect('dashboard');
            } else {
                if($user->status==0) {
                    // Set error message
                    $this->session->set_flashdata('error', 'Your account has not yet been activated. Please check your email for verification!');
                    redirect('login');
                } else {
                    // Set error message
                    $this->session->set_flashdata('error', 'Invalid Email or Password');
                    redirect('login');
                }
            }
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('login');
    }
}
