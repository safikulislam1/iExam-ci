<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    function __construct()
    {
        parent::__construct();

        $this->load->model('login_model');
        if (!($this->session->userdata('id'))) {

            redirect('login');
        }
    }

    public function index()
    {
        
        $user_id = $this->session->userdata('id');
        $row = $this->login_model->all_data($user_id);
    
        $this->load->view('dashboard/index',['row'=>$row]);
    }
    public function step1()
    {
       
        $this->load->view('dashboard/step1');
    }
    public function step2()
    {
        
        $user_id = $this->session->userdata('id');
      
        $row = $this->login_model->status_step1($user_id);
         $status = $row['basic_status'];
       
     
        $this->load->view('dashboard/step2',['status'=>$status]);
    }
    public function step3()
    {
       
        $user_id = $this->session->userdata('id');
        $row = $this->login_model->status_step2($user_id);
        $status = $row['file_status'];
        $this->load->view('dashboard/step3', ['status' => $status]);
    }
    public function step1_action()
    {
        $this->form_validation->set_rules('fname', 'First name', 'trim|required');
        $this->form_validation->set_rules('lname', 'Last name', 'trim|required');
        $this->form_validation->set_rules('father', 'Father name', 'trim|required');
        $this->form_validation->set_rules('mother', 'Mother name', 'trim|required');
        $this->form_validation->set_rules('sex', 'Sex', 'trim|required');
        $this->form_validation->set_rules('date', 'Date', 'trim|required');
        $this->form_validation->set_rules('address', 'Address', 'trim|required');
        $this->form_validation->set_rules('city', 'City', 'trim|required');
        $this->form_validation->set_rules('state', 'State', 'trim|required');
        $this->form_validation->set_rules('code', 'Zip', 'trim|required');
        $this->form_validation->set_rules('check', 'check', 'trim|required');
        
        if ($this->form_validation->run() == FALSE) {

            $this->step1();
        } else {
           $data = [
                'fname' => $this->input->post('fname'),
                'lname' => $this->input->post('lname'),
                'father' => $this->input->post('father'),
                'mother' => $this->input->post('mother'),
                'sex' => $this->input->post('sex'),
                'date' => $this->input->post('date'),
                'address' => $this->input->post('address'),
                'city' => $this->input->post('city'),
                'state' => $this->input->post('state'),
                'zip' => $this->input->post('code'),
                'user_id' => $this->session->userdata('id'),
                'basic_status'    => 1
           ];

            $clean_data = $this->security->xss_clean($data);

            $row = $this->login_model->basic($clean_data);
            if ($row) {
                $this->session->set_flashdata('success', 'First step complate');
                redirect('dashboard/step1');
            }
            else{
                $this->session->set_flashdata('error', 'Please Try again');
                redirect('dashboard/step1');
            }
        }
    }
    public function photo_upload()
    {
      
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'jpg|jpeg|png';
        // $config['max_size']             = 100;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('photo')) {

             echo 'fail';
          ;
        } else {
                $data = $this->upload->data();
                $image_path = base_url("uploads/" . $data['raw_name'] . $data['file_ext']);
                $this->session->set_userdata('photo',$image_path);
                echo  '<img src="'. $image_path. '" alt=" " style="width:100px; height:100px;">';
           
        }
    }
    public function sign_upload()
    {

        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'jpg|jpeg|png';
        // $config['max_size']             = 100;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('signature')) {

        } else {
            $data = $this->upload->data();
            $sign_path = base_url("uploads/" . $data['raw_name'] . $data['file_ext']);
            $this->session->set_userdata('sign',$sign_path);
            echo  '<img src="' . $sign_path . '" alt=" " style="width:100px; height:100px;">';
        }
    }
    public function upload_data()
    {
        $photo = $this->session->userdata('photo');
        $sign = $this->session->userdata('sign');
        $id = $this->session->userdata('id');
        $data = [
            'photo' => $photo,
            'signature' => $sign,
            'user_id'   => $id,
            'file_status'    => 1
        ];
        $row = $this->login_model->file_upload($data);
        if ($row) {
            echo 1;
               
        }else{
            echo 0;
           
        }
        
    }

    public function payment()
    {
        include_once './stripe/config.php'; 
        $token = $this->input->post('stripeToken');

        $data = \Stripe\Charge::create([
            "amount" => 50000,
            "currency" => "inr",
            "description" => "Safikul Islam des",
            "source" => $token,
            "metadata" => ["order_id" => "1", "name" => "Safikul"]
        ]);

        $data = [
            'str_amount' => $data->amount/100,
            'str_trn'    => $data->balance_transaction,
            'str_pay_id' => $data->id,
            'str_last'   => $data['source']->last4,
            'str_brand'  => $data['source']->brand,
            'user_id'    => $this->session->userdata('id')
        ];

        $row = $this->login_model->stripe_payment($data);
        if ($row) {
            $this->session->set_flashdata('success', 'Payment complate');
            redirect('dashboard/step3');
        } else {
            $this->session->set_flashdata('error', 'Please Try again');
            redirect('dashboard/step3');
        }
        //print_r($data);

       
    }

    public function print($id)
    {
       
        $row = $this->login_model->all_data($id);
        $this->load->view('dashboard/print', ['row' => $row]);
    }

}
