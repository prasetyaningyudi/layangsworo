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
	
	public function index($id=null){
		if($id == null){
			header("location: " . base_url()."User_authentication/no_permission");
		}else{	
			//chek kewenangan masing-masing agar tidak bisa melihat surat orang lain
			if(true){
				$tables = array('DISPOSISI', 'SURAT','INSTANSI','STATUS_SURAT', 'SIFAT_SURAT');				
				$this->db->select('DISPOSISI.SURAT_ID');
				$this->db->select('SURAT.NOMOR_SURAT');
				$this->db->select('SURAT.TGL_SURAT');
				$this->db->select('SURAT.HAL_SURAT');
				$this->db->select('INSTANSI.NAMA_INSTANSI');
				$this->db->select('STATUS_SURAT.NAMA_STATUS');
				$this->db->select('SIFAT_SURAT.NAMA_SIFAT');
				$this->db->from($tables);
				$this->db->WHERE('DISPOSISI.SURAT_ID=SURAT.ID');			
				$this->db->WHERE('SURAT.INSTANSI_ID=INSTANSI.ID');			
				$this->db->WHERE('SURAT.STATUS_SURAT_ID=STATUS_SURAT.ID');			
				$this->db->WHERE('SURAT.SIFAT_SURAT_ID=SIFAT_SURAT.ID');			
				$this->db->WHERE('DISPOSISI.UNIT_ID', $id);
				$this->db->distinct();
				$this->db->limit(100);
				$this->db->order_by('SURAT.ID', 'DESC');
				$query = $this->db->get(); 
				$data['record'] = $query->result();		
				
				$data['menu'] = $this->menu_model->get_menu();
				$data['sub_menu'] = $this->menu_model->get_sub_menu();
				$data['data_table'] = 'yes';
				$data['breadcurm'] = 'Home / Surat / List Disposisi';
				
				//view
				$this->load->view('seg_header_view', $data);
				$this->load->view('seg_navbar_view');
				$this->load->view('seg_sidebar_view', $data);
				$this->load->view('seg_breadcurm_view');
				$this->load->view('disposisi_index_view');
				$this->load->view('seg_footer_view');					
			}else{
				header("location: " . base_url()."User_authentication/no_permission");
			}
		}
	}
	
	public function terima(){
		
	}
	
	public function rekam($id=null){
		if($id == null){
			header("location: " . base_url()."User_authentication/no_permission");
		}else{		
			//load surat	
			$this->db->select('SURAT.ID');
			$this->db->select('SURAT.TGL_SURAT');
			$this->db->select('SURAT.NOMOR_SURAT');
			$this->db->select('SURAT.NOMOR_AGENDA');
			$this->db->from('SURAT');
			$this->db->WHERE('SURAT.ID', $id);				
			$this->db->WHERE('SURAT.STATUS_SURAT_ID', '1');				
			$query = $this->db->get(); 
			$data['record'] = $query->result();
			
			if($data['record'] != null){
				if(isset($_POST['submit'])){
					if(isset($_POST['unit']) && isset($_POST['petunjuk'])){
						//insert ke database SURAT
						$data['saveddata'] = array(
							'NOMOR_AGENDA' => $_POST['nomoragenda'],
							'SIFAT_SURAT_ID' => $_POST['sifat'],
							'STATUS_SURAT_ID' => '2',
						);
						$this->db->where('ID', $_POST['id']);
						$this->db->update('SURAT', $data['saveddata']);	

						//insert ke database Disposisi
						foreach($_POST['unit'] as $item){
							foreach($_POST['petunjuk'] as $value){
								$data1['saveddata'] = array(
									'SURAT_ID' => $_POST['id'],
									'UNIT_ID' => $item,
									'PETUNJUK_DISPOSISI_ID' => $value,
									'KETERANGAN_DISPOSISI' => $_POST['catatan'], //ingat di edit
								);	
								$this->db->insert('DISPOSISI', $data1['saveddata']);								
							}							
						}
						
						//insert ke database LOG
						$data1['saveddata'] = array(
							'SURAT_ID' => $_POST['id'],
							'STATUS_SURAT_ID' => '2',
							'USER_ID' => '1', //ingat di edit
						);	
						$this->db->insert('LOG_SURAT', $data1['saveddata']);						
						header("location: " . base_url()."Surat_controller/");
					}else{
						header("location: " . base_url()."Disposisi_controller/rekam/".$_POST['id']);
					}
				}else{	
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
					
					//load petunjuk disposisi
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
			}else{
				header("location: " . base_url()."User_authentication/no_permission");
			}
		}
	}	
}
