<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

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
        $this->load->model('defaultload');
        $this->load->database();
        $this->load->library('session');
		$this->load->helper('url');

    }

	public function index()
	{
		if ($this->session->userdata('login_user_id') < 1)
            redirect(base_url() . 'login', 'refresh');
	}
	 function dashboard()
	{
		if ($this->session->userdata('login_user_id') < 1)
            redirect(base_url() . 'login', 'refresh');	
		
		$data['title'] = 'Onion CRM';
		$data['system_name'] = 'Onion CRM';
 
		
		$this->load->view('themes/includes_header',$data);
		$this->load->view('themes/includes_navbar');
		
		$list_nhom = $this->session->userdata('login_type');
		
		foreach($list_nhom as $value){
			if ($value == 'admin'){
				$this->load->view('themes/admin/includes_admin_menu');
				break;
			}else{
				if ($value == 'warehouse')
					$this->load->view('themes/warehouse/includes_warehouse_menu');
				if ($value == 'sales')
					$this->load->view('themes/sales/includes_sales_menu');
				if ($value == 'marketing')
					$this->load->view('themes/marketing/includes_marketing_menu');		
			}
		}
		
		


		$this->load->view('themes/includes_navbar_end');
		$this->load->view('themes/index');
		$this->load->view('themes/includes_footer');
	}
	
}
