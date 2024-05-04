<?php
class M_mel_bm extends CI_Model {
	private $main_table = "mel_bm";
	
	public function get_data($id=""){
		$session_data = $this->session->userdata('logged_in');		
		//$id_cabang = $session_data['id_cabang'];
		
		$this->db->select ( 'a.*');
		$this->db->from($this->main_table . " a");
		//$this->db->join('sls_sales_database_cust b', 'a.id_db_customer = b.id', 'left');
		//$this->db->join('cabang d', 'a.id_cabang = d.id', 'left');
		//$this->db->join('sls_salesman c', 'a.id_sales = c.id', 'left');
		
		if($id!=""){
			$this->db->where("a.id", $id);
		}
		// if($id_cabang!=0){
		// 	$this->db->where("a.id_cabang", $id_cabang);
		// }

		// $session_data = $this->session->userdata('logged_in');
		// if($session_data['id_level']<2){
		// 	$this->db->where("a.create_user", $session_data['id']);
		// }

		$query = $this->db->get();
	//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;

	}

	public function get_detail_mel($id){
		$this->db->select ( 'a.*' );
		$this->db->from("mel_detail a");
		$this->db->where("a.id_mel_bm", $id);
		$query = $this->db->get();
		// debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

	public function get_detail_bm($id){
		$this->db->select ( 'a.*' );
		$this->db->from("bm_detail a");
		$this->db->where("a.id_mel_bm", $id);
		$query = $this->db->get();
		// debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}
	
	public function get_detail_product($id){
		$this->db->select ( 'a.*' );
		$this->db->from("sls_activity_setting_product a");
		$this->db->where("a.id_activity_setting", $id);
		$query = $this->db->get();
		// debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

	// public function get_cabang(){
	// 	$session_data = $this->session->userdata('logged_in');		
	// 	$id_cabang = $session_data['id_cabang'];
		
	// 	$this->db->select ( 'a.*' );
	// 	$this->db->from("cabang a");
		
	// 	if($id_cabang!=0){
	// 		$this->db->where("a.id", $id_cabang);
	// 	}
		
	// 	$query = $this->db->get();
	// 	// debug($this->db->last_query());
	// 	$result = $query->result_array();	

	// 	return $result;
	// }

	public function get_salesman(){
		$this->db->select ( 'a.*' );
		$this->db->from("sls_salesman a");
		$query = $this->db->get();
		// debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

	public function get_segment(){
		$this->db->select ( 'a.*' );
		$this->db->from("sls_segment a");
		$query = $this->db->get();
		// debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

	public function get_area1(){
		$this->db->select ( "a.id, CONCAT(a.kawasan) as nama" );
		$this->db->from("kawasan a");
		//$this->db->group_by('a.kawasan');
		$query = $this->db->get();
		// debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

	public function get_area2(){
		$this->db->select ( "a.id, CONCAT(a.kawasan) as nama" );
		$this->db->from("kawasan a");
		//$this->db->group_by('a.kawasan');	
		$query = $this->db->get();
		// debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

	public function get_db_customer(){
		$session_data = $this->session->userdata('logged_in');		
		$id_cabang = $session_data['id_cabang'];
		
		$this->db->select ( 'a.*' );
		$this->db->from("sls_sales_database_cust a");
		//$this->db->where("a.status","1");
		
		if($id_cabang!=0){
			$this->db->where("a.id_cabang", $id_cabang);
		}
		$query = $this->db->get();
		// debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

	// public function get_product(){
	// 	$this->db->select ( "a.id, CONCAT(a.nama_asset) as nama" );
	// 	$this->db->from("hr_asset a");
	// 	$query = $this->db->get();
	// 	// debug($this->db->last_query());
	// 	$result = $query->result_array();	

	// 	return $result;
	// }

	
	
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
		
		$result = $this->db->insert("bm_detail", $data);
		$id = $this->db->insert_id();
	
		return $result;
	}
	
	public function reset_data($id){
		$this->db->where('id_mel_bm', $id);
        $result = $this->db->delete("bm_detail");
				
		return $result;
	}

	public function simpan_data_detail_mel($data, &$id = ""){
		$result = 0;
		
		$result = $this->db->insert("mel_detail", $data);
		$id = $this->db->insert_id();
	
		return $result;
	}
	
	public function reset_data_mel($id){
		$this->db->where('id_mel_bm', $id);
        $result = $this->db->delete("mel_detail");
				
		return $result;
	}
	
	public function delete_data($id){
		$this->db->where('id', $id);
        $result = $this->db->delete($this->main_table);
				
		return $result;
    }
}
