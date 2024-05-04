<?php
class M_sls_salesman extends CI_Model {

	private $table_master_name = "sls_salesman";

	public function get_data($id=""){
		
		$this->db->select ( 'a.*, b.nama_cabang' );
        $this->db->from($this->table_master_name . " a");
		$this->db->join('cabang b', 'a.id_cabang = b.id', 'left');
		if($id!=""){
			$this->db->where("a.id", $id);
		}

		$session_data = $this->session->userdata('logged_in');
		if($session_data['id_level']<2){
			$this->db->where("a.create_user", $session_data['id']);
		}
		
		$this->db->where("a.is_active", 1);
		$this->db->order_by('a.nama_salesman', 'ASC');
        $query = $this->db->get();
        // debug($this->db->last_query());
        $result = $query->result();	
    
        return $result;
		
	}

	public function get_notif_report($id=""){
		$session_data = $this->session->userdata('logged_in');		
		$id_cabang = $session_data['id_cabang'];
		
		$this->db->select ( 'a.*, sum(a.is_notif_cs) as notif' );
		$this->db->from('sls_sales_visit_report a');
		//$this->db->join('sls_pelanggan b', 'a.id_customer = b.id', 'left');
		//$this->db->join('inv_inq c', 'c.id_sales_tech = a.id', 'left');		
		if($id!=""){
			$this->db->where("a.id", $id);
		}
		if($id_cabang!=0){
			$this->db->where("a.id_cabang", $id_cabang);
		}

		//$session_data = $this->session->userdata('logged_in');
		//if($session_data['id_level']<2){
			//$this->db->where("a.create_user", $session_data['id']);
		//}
		// if($id_proyek!=0){
		// $this->db->where("b.id_proyek", $id_proyek);
		// }
		// $this->db->where("a.is_active", 1);
		// $this->db->group_by('a.id');		$this->db->order_by('a.id', 'DESC');
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;

	}
	
	public function get_notif($id=""){
		$session_data = $this->session->userdata('logged_in');		
		$id_cabang = $session_data['id_cabang'];
		
		$this->db->select ( 'a.*, sum(a.notif) as notif' );
		$this->db->from('sls_terjemahan_part a');
		$this->db->join('sls_pelanggan b', 'a.id_customer = b.id', 'left');
		$this->db->join('inv_inq c', 'c.id_sales_tech = a.id', 'left');		
		if($id!=""){
			$this->db->where("a.id", $id);
		}
		if($id_cabang!=0){
			$this->db->where("a.id_cabang", $id_cabang);
		}

		//$session_data = $this->session->userdata('logged_in');
		//if($session_data['id_level']<2){
			//$this->db->where("a.create_user", $session_data['id']);
		//}
		// if($id_proyek!=0){
		// $this->db->where("b.id_proyek", $id_proyek);
		// }
		// $this->db->where("a.is_active", 1);
		// $this->db->group_by('a.id');		$this->db->order_by('a.id', 'DESC');
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;

	}

	public function get_notif_inv($id=""){
		$session_data = $this->session->userdata('logged_in');		
		$id_cabang = $session_data['id_cabang'];
		
		$this->db->select ( 'a.*, sum(a.notif_to_inv) as notif_to_inv' );
		$this->db->from("sls_terjemahan_part a");
		$this->db->join('inv_inq x', 'x.id_sales_tech = a.id', 'left');
		$this->db->join('sls_pelanggan b', 'a.id_customer = b.id', 'left');
		// $this->db->join('sls_terjemahan_part c', 'c.id = a.id_translate', 'left');
		// $this->db->join('sls_terjemahan_part c', 'c.id = a.id_translate', 'left');
		//$this->db->join('sls_tipe_bayar d', 'd.id = a.id_tipe_bayar', 'left');			
		$this->db->where("x.id_sales_tech IS NULL");
		if($id!=""){
			$this->db->where("a.id", $id);
		}
		if($id_cabang!=0){
			$this->db->where("a.id_cabang", $id_cabang);
		}
		
		$query = $this->db->get();
		// debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;

	}
	
	public function get_cabang(){
		
		$this->db->select ( 'a.*' );
        $this->db->from("cabang a");
		// if($id!=""){
			// $this->db->where("a.id", $id);
		// }
		$this->db->order_by('a.nama_cabang', 'ASC');
        $query = $this->db->get();
        // debug($this->db->last_query());
        $result = $query->result_array();	
    
        return $result;
		
	}
	
	public function simpan_data($data, $id = ""){
		$result = 0;
		
		if($id!=""){		
			$this->db->where('id', nvl($id, 0));
			
			$result = $this->db->update("sls_salesman", $data);
		} else {			
			$result = $this->db->insert("sls_salesman", $data);			
		}
		return $result;
				
    }
		
    public function delete_data($id){
		$this->db->where('id', $id);
        $result = $this->db->delete($this->main_table);
				
		return $result;
	
	}	
	
}

