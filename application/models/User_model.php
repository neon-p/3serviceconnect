<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database(); // Load database
    }

    public function register_user($data) {
        return $this->db->insert('users', $data);
    }

    public function get_user_by_id($user_id) {
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('users'); // Fetch from 'users' table
        return $query->row_array(); // Return user data as an array
    }

    public function update_user($user_id, $data) {
        $this->db->where('user_id', $user_id);
        return $this->db->update('users', $data);
    }

    public function get_all_services() {
        $query = $this->db->get('services'); // Fetch all rows from the 'services' table
        return $query->result_array(); // Return the result as an array
    }

    public function get_pending_profiles() {
        $this->db->where('status', '0'); // Filter by 'pending' status
        $query = $this->db->get('users'); // Fetch from 'users' table
        return $query->result_array(); // Return the result as an array of profiles
    }
}
?>
