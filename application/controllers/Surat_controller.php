<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_controller extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->library('session');		
		$this->load->helper('url');			
		$this->load->database();
		$this->load->model('menu_model');		
	}
	
	public function index(){
		//load surat list
		$tables = array('SURAT', 'INSTANSI');
		$this->db->select('SURAT.ID');
		$this->db->select('NOMOR_SURAT');
		$this->db->select('TGL_SURAT');
		$this->db->select('HAL_SURAT');
		$this->db->select('NOMOR_AGENDA');
		$this->db->select('INSTANSI.NAMA_INSTANSI');	
		$this->db->from($tables);
		$this->db->WHERE('INSTANSI.ID = SURAT.INSTANSI_ID');
		$this->db->limit(100);
		$this->db->order_by('SURAT.ID', 'DESC');
		$query = $this->db->get(); 
		$data['record'] = $query->result();		
		/*
		$tables = array('SURAT', 'INSTANSI', 'LOG_SURAT', 'STATUS_SURAT');		
		$this->db->select('LOG_SURAT.ID');
		$this->db->select('LOG_SURAT.LOG_DATE');
		$this->db->select('LOG_SURAT.KETERANGAN');
		$this->db->select('LOG_SURAT.SURAT_ID');		
		$this->db->select('SURAT.NOMOR_SURAT');
		$this->db->select('SURAT.TGL_SURAT');
		$this->db->select('SURAT.HAL_SURAT');
		$this->db->select('SURAT.NOMOR_AGENDA');
		$this->db->select('INSTANSI.NAMA_INSTANSI');
		$this->db->select('STATUS_SURAT.NAMA_STATUS');
		$this->db->from($tables);
		$this->db->WHERE('LOG_SURAT.SURAT_ID = SURAT.ID');		
		$this->db->WHERE('LOG_SURAT.STATUS_SURAT_ID = STATUS_SURAT.ID');		
		$this->db->WHERE('SURAT.INSTANSI_ID = INSTANSI.ID');		
		$query = $this->db->get(); 
		$data['record'] = $query->result();
		*/
		
		$data['menu'] = $this->menu_model->get_menu();
		$data['sub_menu'] = $this->menu_model->get_sub_menu();
		$data['data_table'] = 'yes';
		$data['breadcurm'] = 'Home / Surat / List';
		
		//view
		$this->load->view('seg_header_view', $data);
		$this->load->view('seg_navbar_view');
		$this->load->view('seg_sidebar_view', $data);
		$this->load->view('seg_breadcurm_view');
		$this->load->view('surat_index_view');
		$this->load->view('seg_footer_view');		
	}
	
	public function rekam(){
		if(isset($_POST['submit'])){			
			//insert ke database
			$data['saveddata'] = array(
				'NOMOR_SURAT' => $_POST['nomor'],
				'TGL_SURAT' => $_POST['tgl'],
				'HAL_SURAT' => $_POST['hal'],
				'NOMOR_AGENDA' => $_POST['noagenda'],
				'INSTANSI_ID' => $_POST['instansi'],
			);			
			$this->db->insert('SURAT', $data['saveddata']);
			$last_insert_id = $this->db->insert_id();
			
			$data1['saveddata'] = array(
				'SURAT_ID' => $last_insert_id,
				'STATUS_SURAT_ID' => '1',
				'USER_ID' => '1',
			);	
			$this->db->insert('LOG_SURAT', $data1['saveddata']);
			header("location: " . base_url()."Surat_controller/");	
		}else{
			//load instansi list
			$this->db->select('ID');
			$this->db->select('NAMA_INSTANSI');
			$this->db->from('INSTANSI');
			$this->db->order_by('NAMA_INSTANSI', 'ASC');		
			$query = $this->db->get(); 
			$data['record'] = $query->result();	
			
			$data['menu'] = $this->menu_model->get_menu();
			$data['sub_menu'] = $this->menu_model->get_sub_menu();
			$data['data_table'] = 'no';
			$data['breadcurm'] = 'Home / Surat / Rekam';			
			
			//view
			$this->load->view('seg_header_view', $data);
			$this->load->view('seg_navbar_view');
			$this->load->view('seg_sidebar_view', $data);
			$this->load->view('seg_breadcurm_view');
			$this->load->view('surat_rekam_view');
			$this->load->view('seg_footer_view');
		}				
	}	
	
	public function ubah($id=null){
		if($id == null){
			header("location: " . base_url()."User_authentication/no_permission");
		}else{
			//load ruang by id
			$this->db->select('ID');
			$this->db->select('NOMOR_SURAT');
			$this->db->select('TGL_SURAT');
			$this->db->select('HAL_SURAT');
			$this->db->select('NOMOR_AGENDA');
			$this->db->select('INSTANSI_ID');	
			$this->db->from('SURAT');	
			$this->db->where('ID', $id);	
			$query = $this->db->get();	
			$data['record'] = $query->result();

			if($data['record'] != null){				
				if(isset($_POST['submit'])){
					//insert ke database
					$data['saveddata'] = array(
						'NOMOR_SURAT' => $_POST['nomor'],
						'TGL_SURAT' => $_POST['tgl'],
						'HAL_SURAT' => $_POST['hal'],
						'NOMOR_AGENDA' => $_POST['noagenda'],
						'INSTANSI_ID' => $_POST['instansi'],
					);
					$this->db->where('ID', $_POST['id']);
					$this->db->update('SURAT', $data['saveddata']);	
					header("location: " . base_url()."Surat_controller/");
				}else{
					//Passing data
					$data['menu'] = $this->menu_model->get_menu();
					$data['sub_menu'] = $this->menu_model->get_sub_menu();
					$data['data_table'] = 'no';						
					$data['breadcurm'] = 'Home / Surat / Ubah';

					//load instansi list
					$this->db->select('ID');
					$this->db->select('NAMA_INSTANSI');
					$this->db->from('INSTANSI');
					$this->db->order_by('NAMA_INSTANSI', 'ASC');		
					$query = $this->db->get(); 
					$data['record1'] = $query->result();						
					
					//Load View
					$this->load->view('seg_header_view', $data);
					$this->load->view('seg_navbar_view');
					$this->load->view('seg_sidebar_view', $data);
					$this->load->view('seg_breadcurm_view');
					$this->load->view('surat_ubah_view');
					$this->load->view('seg_footer_view');
				}
			}else{
				header("location: " . base_url()."Surat_controller/");
			}			
		}		
	}
}
