<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 function __construct() {
        parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
        $this->load->database();
        $this->load->library('session');
		$this->load->helper('url');
		$this->load->helper('language');
		
    }

	public function index()
	{	

		$this->login();
		$this->load->view('themes/login');

	}


	function login(){
		if($this->input->post('submit')){
			$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
			$this->form_validation->set_rules('password', 'password', 'trim|required');
			if ($this->form_validation->run()){
				$email = $this->input->get_post('email', TRUE);
				$password = $this->input->get_post('password', TRUE);
				$login_status = $this->validate_login($email, $password);
				 if ($login_status == 'success') {
            			redirect(base_url() . 'index/dashboard', 'refresh');
				 }else{
					$this->session->set_flashdata('login_error',TRUE);
					$this->session->set_flashdata('message', 'Invalid Login');
					return false;
				 }

			}
		}
	}


	 function validate_login($email = '', $password = '') {
		$credential = array('email' => $email, 'matkhau' => $password);

		$query = $this->db->get_where('taikhoan_view', $credential);
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $this->session->set_userdata('login_user_id', $row->taikhoan_id);
            $this->session->set_userdata('name', $row->email);
            $this->session->set_userdata('login_type', $row->tennhom);
            return 'success';
        }

		return 'invalid';
	 }

	 function logout() {
        $this->session->sess_destroy();
        $this->session->set_flashdata('logout_notification', 'logged_out');
        redirect(base_url(), 'refresh');
    }
}
