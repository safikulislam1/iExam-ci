<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    function __construct()
    {
        parent::__construct();

        $this->load->model('admin_model');
    }

    public function index()
    {
        if (!($this->session->userdata('id'))) {
           
            redirect('admin/login');
        }
    
        $row = $this->admin_model->all_data();
        //print_r($row);
        $this->load->view('admin/index',['row'=>$row]);
    }

    public function login()
    {
        $file = $this->session->userdata('filename');
        if ($file && file_exists('./captcha/' . $file)) {
            unlink('./captcha/' . $this->session->userdata('filename'));
        }
        $vals = array(
            'img_path'      => './captcha/',
            'img_url'       =>  base_url('captcha'),
            'font_path'     => base_url('font/arial.ttf'),
            'font_size'     => 20,
            'word_length'   => 5,
            'img_height'    => 36,
            'pool'          => 'ABCDEFGHIJKLMNOPQRSTUVWXYZ',

            'colors'        => array(
                'background' => array(0, 0, 0),
                'border' => array(0, 0, 0),
                'text' => array(255, 255, 255),
                'grid' => array(0, 0, 0)
            )
        );
        $cap = create_captcha($vals);
        $this->session->set_userdata('captcha_key', $cap['word']);
        $this->session->set_userdata('filename', $cap['filename']);
        $this->load->view('admin/login', array('captcha' => $cap));
    }

    public function action()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('captcha', 'Captcha', 'trim|required');
        if ($this->form_validation->run() == FALSE) {

            $this->login();
        } else {

            $oword = $this->session->userdata('captcha_key');
            $nword = $this->input->post('captcha');
            $this->session->userdata('filename');
            unlink('./captcha/' . $this->session->userdata('filename'));
            if ($nword == $oword) {

                $email    = $this->security->xss_clean($this->input->post('email'));
                $password = $this->security->xss_clean($this->input->post('password'));

                $row = $this->admin_model->login($email, $password);
                if ($row) {

                    $this->session->set_userdata('name', $row[0]->name);
                    $this->session->set_userdata('id', $row[0]->id);
                    redirect('admin');
                } else {
                    $this->session->set_flashdata('error', 'Invalid email and password');
                    redirect('admin/login');
                }
            } else {
                $this->session->set_flashdata('error', 'Invalid captcha key');
                redirect('admin/login', 'refresh');
            }
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('id');
        redirect('admin/login');
    }
}