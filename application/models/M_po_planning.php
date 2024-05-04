<?php
class M_po_planning extends CI_Model {
	private $main_table = "po_account";
	
	public function get_data($id=""){
		$session_data = $this->session->userdata('logged_in');		
		//$id_cabang = $session_data['id_cabang'];
		$is_cat_customer = $session_data['is_cat_customer'];
		
		$this->db->select ( 'a.*, b.no_po, b.tanggal_po');
		$this->db->from($this->main_table . " a");
		$this->db->join('po_transfer b', 'b.id = a.id_po_account', 'left');
		//$this->db->join('customer c', 'a.id_customer = c.id', 'left');
		//$this->db->join('sales d', 'a.id_sales = d.id', 'left');
		//$this->db->join('sls_paf e', 'a.id_paf = e.id', 'left');
		//$this->db->join('web_user f', 'a.create_user = f.id', 'left');
		$this->db->where("a.status_bayar", "Sudah Bayar");
		
		if($id!=""){
			$this->db->where("a.id", $id);
		}

		$session_data = $this->session->userdata('logged_in');
		if($session_data['id_level']<2){
			$this->db->where("a.create_user", $session_data['id']);
		}

		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;

	}
	
	public function get_detail_po_account($id){
		$this->db->select ( "a.*" );
		$this->db->from("po_account_detail a");
		//$this->db->join('view_rute_rr b', 'a.id_rute = b.id', 'left');
		$this->db->where("a.id_po_account", $id);
		//$this->db->group_by("b.id_rute");
		
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

	public function get_detail_po_account_pln($id){
		$this->db->select ( "a.*" );
		$this->db->from("po_account_planning a");
		//$this->db->join('view_rute_rr b', 'a.id_rute = b.id', 'left');
		$this->db->where("a.id_po_account", $id);
		//$this->db->group_by("b.id_rute");
		
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

	
	public function get_unloading(){
		$session_data = $this->session->userdata('logged_in');		
		//$id_cabang = $session_data['id_cabang'];
			
		$this->db->select ( 'a.*, CONCAT(a.nama_unloading) as nama' );
		$this->db->from("po_master_unloading a");
			
		// if($id_cabang!=0){
		// 	$this->db->where("a.id", $id_cabang);
		// }

		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

	public function get_cabang(){
		$session_data = $this->session->userdata('logged_in');		
		$id_cabang = $session_data['id_cabang'];
			
		$this->db->select ( 'a.*' );
		$this->db->from("cabang a");
			
		if($id_cabang!=0){
			$this->db->where("a.id", $id_cabang);
		}

		$query = $this->db->get();
		// debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

	

	public function get_po_account(){
		$session_data = $this->session->userdata('logged_in');		
		//$id_cabang = $session_data['id_cabang'];
			
		$this->db->select ( 'a.*' );
		$this->db->from("po_transfer a");
		//$this->db->join('customer b', 'a.id_customer = b.id', 'left');
		//$this->db->where("a.status_pai", "VERIFIED");
		//$this->db->where("a.status_ops", "VERIFIED");
		// if($id_cabang!=0){
		// 	$this->db->where("a.id_cabang", $id_cabang);
		// }

		$query = $this->db->get();
		// debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

	public function get_po_account_by_id($param){
		extract($param);
		
		$this->db->select ( 'a.*' );
		$this->db->from("po_transfer a");
		//$this->db->join('inv_merek b', 'b.id = a.id_merek', 'left');		
		$this->db->where("a.id", $id);
		$query = $this->db->get();
		// debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;

	}


	public function get_customer(){
	$this->db->select ( 'a.*' );
	$this->db->from("customer a");
	$query = $this->db->get();
	// debug($this->db->last_query());
	$result = $query->result_array();	
	
	return $result;
	}


	public function get_pelanggan_by_id($param){
		extract($param);
		
		$this->db->select ( 'a.*, b.nama_sales' );
		// $this->db->select ( "a.id, CONCAT(a.no_bukti,' - ', a.tanggal) as title" );
		$this->db->from("customer a");
		$this->db->join('sales b', 'b.id = a.id_sales', 'left');		
		// if($id!=""){
		$this->db->where("a.id", $id);
		//$this->db->where("a.status", 1);
		
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;

	}

	
	
	public function simpan_data($data, &$id = ""){
		$result = 0;
		
		if($id!=""){		
			$this->db->where('id', nvl($id, 0));			
			$result = $this->db->update($this->main_table, $data);
		} else {
			$result = $this->db->insert($this->main_table, $data);
			$id = $this->db->insert_id();
		}
		return $result;
    }	
	
	public function simpan_data_detail($data, &$id = ""){
		$result = 0;
		
		$result = $this->db->insert("po_account_detail", $data);
		$id = $this->db->insert_id();
	
		return $result;
	}

	public function simpan_data_detail_pln($data, &$id = ""){
		$result = 0;
		
		$result = $this->db->insert("po_account_planning", $data);
		$id = $this->db->insert_id();
	
		return $result;
	}
	
	public function reset_data($id){
		$this->db->where('id_po_account', $id);
        $result = $this->db->delete("po_account_detail");
				
		return $result;
	}

	public function reset_data_pln($id){
		$this->db->where('id_po_account', $id);
        $result = $this->db->delete("po_account_planning");
				
		return $result;
	}
	
	public function delete_data($id){
		$this->db->where('id', $id);
        $result = $this->db->delete($this->main_table);
				
		return $result;
    }
}
