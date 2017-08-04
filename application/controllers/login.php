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
		 //$this->load->database();
 		$this->load->library(array('session'));
        $this->load->model('functions_model', 'functions');

		$this->load->library('session');
		$this->load->helper('form');
		$this->load->library('form_validation');       
		$this->load->helper('url');
		$this->load->helper('language');


		
    }

	public function index()
	{	
		
		$data['title'] = 'Onion CRM';
		$data['system_name'] = 'Onion CRM';
		$this->login();
		$this->load->view('themes/includes_header',$data);
		$this->load->view('themes/includes_login_navbar');	
		$this->load->view('themes/login');
		$this->load->view('themes/includes_footer');

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
		
		$sql ="SELECT * FROM taikhoan_view WHERE email = ? AND matkhau = ? ";
		$result = $this->functions->query_my($sql,array($email,$password));

		$num_row = count($result);
		if ($num_row > 0) {
			
			$this->session->set_userdata('login_user_id',$result[0]['taikhoan_id']);
			$this->session->set_userdata('name', $result[0]['email']);
			
			$list_nhom = array();
			for($i=0;$i<$num_row;$i++){
		 		$list_nhom[$i] = $result[$i]['tennhom'];
		 	}
		$this->session->set_userdata('login_type',$list_nhom);
        return 'success';
		}
		

		//print_r($result);
		//die();
		// $credential = array('email' => $email, 'matkhau' => $password);

		// $query = $this->db->get_where('taikhoan_view', $credential);
        // $num_row= $query->num_rows();
		// if ($num_row > 0) {
        //     $row = $query->row();
        //     $this->session->set_userdata('login_user_id', $row->taikhoan_id);
        //     $this->session->set_userdata('name', $row->email);

		// 	$list_nhom = array();
		// 	for($i=0;$i<$num_row;$i++){
		// 		$list_nhom[$i] = $query->row($i)->tennhom;
		// 	}
        //      $this->session->set_userdata('login_type',$list_nhom);
        //     return 'success';
        // }

		return 'invalid';
	 }

	 function logout() {
        $this->session->sess_destroy();
        $this->session->set_flashdata('logout_notification', 'logged_out');
        redirect(base_url(), 'refresh');
    }
}
