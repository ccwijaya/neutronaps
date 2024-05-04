<?php
class M_biaya_ops extends CI_Model {
	private $main_table = "biaya_ops";
	
	public function get_data($id=""){
		$session_data = $this->session->userdata('logged_in');		
		//$id_cabang = $session_data['id_cabang'];
		
		$this->db->select ( 'a.*, b.unit');
		$this->db->from($this->main_table . " a");
		$this->db->join('moda b', 'a.id_moda = b.id', 'left');
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

	public function get_detail_parkir($id){
		$this->db->select ( 'a.*' );
		$this->db->from("biaya_ops_parkir_detail a");
		$this->db->where("a.id_ops", $id);
		$query = $this->db->get();
		// debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

	public function get_detail_bm($id){
		$this->db->select ( 'a.*' );
		$this->db->from("biaya_ops_bm_detail a");
		$this->db->where("a.id_ops", $id);
		$query = $this->db->get();
		// debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

	public function get_detail_pasar($id){
		$this->db->select ( 'a.*' );
		$this->db->from("biaya_ops_pasar_detail a");
		$this->db->where("a.id_ops", $id);
		$query = $this->db->get();
		// debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

	public function get_detail_jlraya($id){
		$this->db->select ( 'a.*' );
		$this->db->from("biaya_ops_jlraya_detail a");
		$this->db->where("a.id_ops", $id);
		$query = $this->db->get();
		// debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

	public function get_detail_lain($id){
		$this->db->select ( 'a.*' );
		$this->db->from("biaya_ops_lain_detail a");
		$this->db->where("a.id_ops", $id);
		$query = $this->db->get();
		// debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}
	
	// public function get_detail_product($id){
	// 	$this->db->select ( 'a.*' );
	// 	$this->db->from("sls_activity_setting_product a");
	// 	$this->db->where("a.id_activity_setting", $id);
	// 	$query = $this->db->get();
	// 	// debug($this->db->last_query());
	// 	$result = $query->result_array();	

	// 	return $result;
	// }

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

	public function get_moda(){
		$this->db->select ( 'a.*' );
		$this->db->from("moda a");
		$this->db->where("a.is_distribusi", 1);
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

	public function get_area(){
		$this->db->select ( 'a.*' );
		$this->db->from("sls_areapenjualan a");
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
		
		$result = $this->db->insert("biaya_ops_parkir_detail", $data);
		$id = $this->db->insert_id();
	
		return $result;
	}
	
	public function reset_data($id){
		$this->db->where('id_ops', $id);
        $result = $this->db->delete("biaya_ops_parkir_detail");
				
		return $result;
	}

	public function simpan_data_detail_bm($data, &$id = ""){
		$result = 0;
		
		$result = $this->db->insert("biaya_ops_bm_detail", $data);
		$id = $this->db->insert_id();
	
		return $result;
	}
	
	public function reset_data_bm($id){
		$this->db->where('id_ops', $id);
        $result = $this->db->delete("biaya_ops_bm_detail");
				
		return $result;
	}

	public function simpan_data_detail_pasar($data, &$id = ""){
		$result = 0;
		
		$result = $this->db->insert("biaya_ops_pasar_detail", $data);
		$id = $this->db->insert_id();
	
		return $result;
	}
	
	public function reset_data_pasar($id){
		$this->db->where('id_ops', $id);
        $result = $this->db->delete("biaya_ops_pasar_detail");
				
		return $result;
	}

	public function simpan_data_detail_jlraya($data, &$id = ""){
		$result = 0;
		
		$result = $this->db->insert("biaya_ops_jlraya_detail", $data);
		$id = $this->db->insert_id();
	
		return $result;
	}
	
	public function reset_data_jlraya($id){
		$this->db->where('id_ops', $id);
        $result = $this->db->delete("biaya_ops_jlraya_detail");
				
		return $result;
	}

	public function simpan_data_detail_lain($data, &$id = ""){
		$result = 0;
		
		$result = $this->db->insert("biaya_ops_lain_detail", $data);
		$id = $this->db->insert_id();
	
		return $result;
	}
	
	public function reset_data_lain($id){
		$this->db->where('id_ops', $id);
        $result = $this->db->delete("biaya_ops_lain_detail");
				
		return $result;
	}
	
	public function delete_data($id){
		$this->db->where('id', $id);
        $result = $this->db->delete($this->main_table);
				
		return $result;
    }
}
