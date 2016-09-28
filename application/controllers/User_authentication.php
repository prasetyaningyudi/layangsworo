<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_authentication extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->library('session');		
		$this->load->helper('url');			
		$this->load->database();		
	}
	
	public function index(){
		$this->login();
	}
	
	public function login(){
		$this->load->view('index_view');
	}
	
	public function logout(){	
		$this->session->sess_destroy();
		redirect('User_authentication/');
	}	
}
