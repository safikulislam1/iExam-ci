<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

    public function signup($data)
    {
        $q = $this->db->insert('user', $data);
        if ($q) {
            return true;
        }
        return false;
    }

    public function login($email, $password)
    {
        $this->db->where('email', $email);
        $this->db->where('password',$password);
        $query = $this->db->get('user');
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }
    public function basic($data)
    {
        $q = $this->db->insert('basic_info',$data);
        if ($q) {
              return true;
        }
         return false;
    }
    public function status_step1($user_id)
    {
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('basic_info');
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }
    public function status_step2($user_id)
    {
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('file');
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    public function file_upload($data)
    {
        $q = $this->db->insert('file', $data);
        if ($q) {
            return true;
        }
        return false;
    }

    public function stripe_payment($data)
    {
        $q = $this->db->insert('stripe', $data);
        if ($q) {
            return true;
        }
        return false;
    }

    public function all_data($user_id)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('basic_info', 'basic_info.user_id = user.u_id');
        $this->db->join('file', 'file.user_id = user.u_id');
        $this->db->join('stripe', 'stripe.user_id = user.u_id');
        $this->db->where('user.u_id',$user_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }
    public function get_user_id($email)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('user');
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    public function update_password($user_id,$password)
    {
        $this->db->set('password', $password);
        $this->db->where('u_id', $user_id);
        $q = $this->db->update('user');
        if ($q) {
            return true;
        }
        return false;
    }
}