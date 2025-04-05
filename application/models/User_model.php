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
}
?>
