<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function login($email, $password)
    {
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $query = $this->db->get('admin');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function all_data()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('basic_info', 'basic_info.user_id = user.u_id');
        $this->db->join('file', 'file.user_id = user.u_id');
        $this->db->join('stripe', 'stripe.user_id = user.u_id');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    } 
}