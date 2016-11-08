<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Instansi_controller extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('session');		
		$this->load->helper('url');			
		$this->load->database();	
		$this->load->model('menu_model');			
	}

	public function index(){
		//load list instansi
		$this->db->select('ID');
		$this->db->select('NAMA_INSTANSI');
		$this->db->from('INSTANSI');
		$this->db->order_by('NAMA_INSTANSI', 'ASC');	
		$query = $this->db->get(); 
		$data['record'] = $query->result();		
		
		//Passing data
		//$data['role_access'] = array('1','2','3');
		$data['menu'] = $this->menu_model->get_menu();
		$data['sub_menu'] = $this->menu_model->get_sub_menu();		
		$data['data_table'] = "yes";
		$data['breadcurm'] = 'Home / Instansi / List';
		//$data['about'] = "yes";
		
		//Load View
		$this->load->view('seg_header_view', $data);
		$this->load->view('seg_navbar_view');
		$this->load->view('seg_sidebar_view', $data);
		$this->load->view('seg_breadcurm_view');
		$this->load->view('instansi_index_view');
		$this->load->view('seg_footer_view');
	}
	
	public function rekam(){
		if(isset($_POST['submit'])){			
			//insert ke database
			$data['saveddata'] = array(
				'NAMA_INSTANSI' => $_POST['instansi'],
			);			
			$this->db->insert('INSTANSI', $data['saveddata']);
			header("location: " . base_url()."Instansi_controller/");
		}else{
			//Passing data
			$data['menu'] = $this->menu_model->get_menu();
			$data['sub_menu'] = $this->menu_model->get_sub_menu();
			$data['data_table'] = 'no';	
			$data['breadcurm'] = 'Home / Instansi / Rekam';
			//$data['role_access'] = array('1', '3');
			//$data['about'] = "no";
			
			//Load View
			$this->load->view('seg_header_view', $data);
			$this->load->view('seg_navbar_view');
			$this->load->view('seg_sidebar_view', $data);
			$this->load->view('seg_breadcurm_view');
			$this->load->view('instansi_rekam_view');
			$this->load->view('seg_footer_view');
		}				
	}

	public function ubah($id=null){
		if($id == null){
			header("location: " . base_url()."User_authentication/no_permission");
		}else{
			//load instansi by id
			$this->db->select('ID');	
			$this->db->select('NAMA_INSTANSI');	
			$this->db->from('INSTANSI');	
			$this->db->where('ID', $id);	
			$query = $this->db->get();	
			$data['record'] = $query->result();

			if($data['record'] != null){				
				if(isset($_POST['submit'])){
					//insert ke database
					$data['saveddata'] = array(
						'NAMA_INSTANSI' => $_POST['instansi'],
					);
					$this->db->where('ID', $_POST['id']);
					$this->db->update('INSTANSI', $data['saveddata']);	
					header("location: " . base_url()."Instansi_controller/");
				}else{
					//Passing data
					$data['menu'] = $this->menu_model->get_menu();
					$data['sub_menu'] = $this->menu_model->get_sub_menu();
					$data['data_table'] = 'no';	
					$data['breadcurm'] = 'Home / Instansi / Ubah';
					//$data['role_access'] = array('1', '3');
					//$data['about'] = "no";			
					
					//Load View
					$this->load->view('seg_header_view', $data);
					$this->load->view('seg_navbar_view');
					$this->load->view('seg_sidebar_view', $data);
					$this->load->view('seg_breadcurm_view');
					$this->load->view('instansi_ubah_view');
					$this->load->view('seg_footer_view');
				}
			}else{
				header("location: " . base_url()."Instansi_controller/");
			}			
		}
	}	
}


