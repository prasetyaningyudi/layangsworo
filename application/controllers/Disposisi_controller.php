<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Disposisi_controller extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->library('session');		
		$this->load->helper('url');			
		$this->load->database();
		$this->load->model('menu_model');		
	}
	
	public function index(){

	}
	
	public function rekam($id=null){
		if($id == null){
			header("location: " . base_url()."User_authentication/no_permission");
		}else{		
			//load log penerimaan surat
			$tables = array('SURAT','LOG_SURAT');		
			$this->db->select('LOG_SURAT.ID');
			$this->db->select('LOG_SURAT.LOG_DATE');
			$this->db->select('LOG_SURAT.SURAT_ID');
			$this->db->select('SURAT.NOMOR_AGENDA');
			$this->db->select('LOG_SURAT.STATUS_SURAT_ID');
			$this->db->from($tables);
			$this->db->WHERE('LOG_SURAT.SURAT_ID = SURAT.ID');	
			$this->db->WHERE('LOG_SURAT.SURAT_ID', $id);				
			$this->db->WHERE('LOG_SURAT.STATUS_SURAT_ID', '1');				
			$query = $this->db->get(); 
			$data['record'] = $query->result();	

			//load list sifat
			$this->db->select('ID');
			$this->db->select('NAMA_SIFAT');
			$this->db->from('SIFAT_SURAT');
			$this->db->order_by('ID', 'ASC');	
			$query = $this->db->get(); 
			$data['record1'] = $query->result();				
			
			//load list unit
			$this->db->select('ID');
			$this->db->select('NAMA_UNIT');
			$this->db->from('UNIT');
			$this->db->order_by('ID', 'ASC');	
			$query = $this->db->get(); 
			$data['record2'] = $query->result();
			
			//load list unit
			$this->db->select('ID');
			$this->db->select('NAMA_PETUNJUK');
			$this->db->from('PETUNJUK_DISPOSISI');
			$this->db->order_by('ID', 'ASC');	
			$query = $this->db->get(); 
			$data['record3'] = $query->result();			
			
			//passing data
			$data['menu'] = $this->menu_model->get_menu();
			$data['sub_menu'] = $this->menu_model->get_sub_menu();
			$data['data_table'] = 'no';
			$data['breadcurm'] = 'Home / Surat / Rekam Disposisi Surat';
			
			//view
			$this->load->view('seg_header_view', $data);
			$this->load->view('seg_navbar_view');
			$this->load->view('seg_sidebar_view', $data);
			$this->load->view('seg_breadcurm_view');
			$this->load->view('disposisi_rekam_view', $data);
			$this->load->view('seg_footer_view');
		}
	}	
}
