<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model {

        public function __construct(){
			// Call the CI_Model constructor
			parent::__construct();
        }

        public function get_menu(){
			$this->db->select('ID');
			$this->db->select('NAMA_MENU');
			$this->db->select('PERMALINK');
			$this->db->select('ICON');
			$this->db->select('MENU_ORDER');
			$this->db->select('MENU_ID');
			$this->db->from('MENU');
			$this->db->where('STATUS_MENU=1');		
			$this->db->where('MENU_ID', NULL);	
			$this->db->order_by('MENU_ORDER');			
			$query = $this->db->get(); 
			return $query->result();
        }
		
        public function get_sub_menu(){
			$this->db->select('ID');
			$this->db->select('NAMA_MENU');
			$this->db->select('PERMALINK');
			$this->db->select('ICON');
			$this->db->select('MENU_ORDER');
			$this->db->select('MENU_ID');
			$this->db->from('MENU');
			$this->db->where('STATUS_MENU=1');		
			$this->db->where('MENU_ID IS NOT NULL');		
			$this->db->order_by('MENU_ID');		
			$this->db->order_by('MENU_ORDER');		
			$query = $this->db->get(); 
			return $query->result();
        }		
}