<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_authentication extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->library('session');		
		$this->load->helper('url');			
		$this->load->database();
		$this->load->model('menu_model');		
	}
	
	public function index(){
		$this->login();
	}
	
	public function login(){
		$data['menu'] = $this->menu_model->get_menu();
		$data['sub_menu'] = $this->menu_model->get_sub_menu();
		$data['data_table'] = 'yes';

		//view
		$this->load->view('seg_header_view', $data);
		$this->load->view('seg_navbar_view');
		$this->load->view('seg_sidebar_view', $data);
		$this->load->view('content');
		$this->load->view('seg_footer_view');
	}	
	
	public function login1(){
	}
	
	public function logout(){	
		$this->session->sess_destroy();
		redirect('User_authentication/');
	}	
	
	public function no_permission(){
		$data['menu'] = $this->menu_model->get_menu();
		$data['sub_menu'] = $this->menu_model->get_sub_menu();
		$data['data_table'] = 'no';
		$data['breadcurm'] = 'Home / No Permission';

		//view
		$this->load->view('seg_header_view', $data);
		$this->load->view('seg_navbar_view');
		$this->load->view('seg_sidebar_view', $data);
		$this->load->view('seg_breadcurm_view');
		$this->load->view('no_permission_view', $data);
		$this->load->view('seg_footer_view');			
	}
}
