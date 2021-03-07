<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->model('login_model');
	
	}

    public function index()
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
        $this->load->view('login', array('captcha' => $cap));
       
	}

	public function action()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('captcha', 'Captcha', 'trim|required');
		if ($this->form_validation->run() == FALSE) {

			$this->index();
		} else {

			$oword = $this->session->userdata('captcha_key');
			$nword = $this->input->post('captcha');
			$this->session->userdata('filename');
			unlink('./captcha/' . $this->session->userdata('filename'));
			if ($nword == $oword) {

				$email    = $this->security->xss_clean($this->input->post('email'));
				$password = $this->security->xss_clean($this->input->post('password'));

				$row = $this->login_model->login($email, $password);
				if ($row) {
				
						$this->session->set_userdata('name', $row['name']);
						$this->session->set_userdata('id', $row['u_id']);
						redirect('dashboard');
				
				} else {
					$this->session->set_flashdata('error', 'Invalid email and password');
					redirect('login');
				}
			} else {
				$this->session->set_flashdata('error', 'Invalid captcha key');
				redirect('login', 'refresh');
			}
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('name');
		$this->session->unset_userdata('id');
		redirect('login');	
	}

	public function signup()
	{
		$this->load->view('sign');
	}

	public function registration()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('fname', 'Full name', 'trim|required');
		if ($this->form_validation->run() == FALSE) {

			$this->signup();
		} else {

	
				$fname    = $this->security->xss_clean($this->input->post('fname'));
				$email    = $this->security->xss_clean($this->input->post('email'));
				$password = $this->security->xss_clean($this->input->post('password'));

				$data = 
				[
					'name' => $fname,
					'email'=> $email,
					'password' => $password
				];

				$row = $this->login_model->signup($data);
				if ($row) {
				$this->session->set_flashdata('success', 'Registration Successfull');
				redirect('login/registration');
				} else {
					$this->session->set_flashdata('error', 'Please try again');
					redirect('login/registration');
				}
		
		}
	}

	public function forgot()
	{
		$this->load->view('forgot');
	}
	public function forgot_action()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		if ($this->form_validation->run() == FALSE) {

			$this->forgot();
		} else {
			$email    = $this->security->xss_clean($this->input->post('email'));
			$row = $this->login_model->get_user_id($email);
			$user_id = $row['u_id'];

			$config = array(
				'protocol' => 'smtp',
				'smtp_host' => 'smtp.mailtrap.io',
				'smtp_port' => 2525,
				'smtp_user' => '33da9d7763e9db',
				'smtp_pass' => '2e67c9ba3c85ae',
				'mailtype'  => 'html',
				'crlf' => "\r\n",
				'newline' => "\r\n"
			);
			$msg = "<a href ='http://[::1]/codeigniter3/index.php/login/change_password/$user_id'>Link</a>";
			$this->load->library('email', $config);
			$this->email->from('safikulislam0786@gmail.com');
			$this->email->to($email);
			$this->email->subject('Password forgot link');
			$this->email->message($msg);
			if ($this->email->send()) {
				$this->session->set_flashdata('success', 'We have send password forgot link');
				redirect('login/forgot_action');
			} else {
				show_error($this->email->print_debugger());
			}
		}
	}

	public function change_password()
	{
		  $id = $this->uri->segment(3);
		  $this->load->view('change',['id'=>$id]);
	}

	public function update_password()
	{
		$this->form_validation->set_error_delimiters('', '');	
		$this->form_validation->set_rules('npassword', 'New password', 'trim|required');
		$this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|matches[npassword]');
		$this->form_validation->set_rules('user_id', 'id', 'trim|required');
		if ($this->form_validation->run() == FALSE) {

			   //echo validation_errors();

			//$this->change_password();
			$array =
			array(
				'status' => 'error',
				'msg' => validation_errors()
			);
			echo json_encode($array);  

		} else {
			
			$password = $this->security->xss_clean($this->input->post('npassword'));
			$user_id = $this->security->xss_clean($this->input->post('user_id'));
			
			$row = $this->login_model->update_password($user_id, $password);
			if ($row) {
				$array =
					array(
						'status' => 'success',
						'msg' => 'Password update successfully'
					);
				echo json_encode($array);  

				
			} else {

				$array =
					array(
						'status' => 'error',
						'msg' => 'Please try again'
					);
				echo json_encode($array);  
			}
		}
		
	}

}