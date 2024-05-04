<?php
class M_cost_tol_dist extends CI_Model {
	private $main_table = "cost_tol";
	
	public function get_data($id=""){
		$session_data = $this->session->userdata('logged_in');		
		//$id_cabang = $session_data['id_cabang'];
		
		$this->db->select ( 'a.*,d.unit, b.loading, b.unloading, c.nama_kategori');
		$this->db->from($this->main_table . " a");
		$this->db->join('rute b', 'a.id_rute = b.id', 'left');
		$this->db->join('kategori_kirim c', 'a.id_kategori_kirim = c.id', 'left');
		$this->db->join('moda d', 'b.id_moda = d.id', 'left');
		$this->db->where("a.is_distribusi", 1);
		if($id!=""){
			$this->db->where("a.id", $id);
		}
		// if($id_cabang!=0){
		$this->db->group_by("a.id");
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

	public function get_detail_tol($id){
		$this->db->select ( 'a.*' );
		$this->db->from("cost_tol_detail a");
		$this->db->where("a.id_cost_tol", $id);
		$query = $this->db->get();
		// debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

	// public function get_detail_lembur($id){
	// 	$this->db->select ( 'a.*' );
	// 	$this->db->from("umk_lembur_detail a");
	// 	$this->db->where("a.id_umk", $id);
	// 	$query = $this->db->get();
	// 	// debug($this->db->last_query());
	// 	$result = $query->result_array();	

	// 	return $result;
	// }
	
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

	public function get_rute(){
		$this->db->select ( 'a.*, b.unit' );
		$this->db->from("rute a");
		$this->db->join('moda b', 'b.id = a.id_moda', 'left');
		$this->db->where("a.is_distribusi", 1);
		$query = $this->db->get();
		// debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

	public function get_kategori_kirim(){
		$this->db->select ( 'a.*' );
		$this->db->from("view_kategori_kirim a");
		$query = $this->db->get();
		// debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

	public function get_golongan_moda($param){
		extract($param);
		
		$this->db->select ( 'a.*, b.unit, b.golongan' );
		$this->db->from("rute a");
		$this->db->join('moda b', 'b.id = a.id_moda', 'left');	
		$this->db->where("a.id", $id);
		$query = $this->db->get();
		// debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;

	}

	// public function get_area(){
	// 	$this->db->select ( 'a.*' );
	// 	$this->db->from("sls_areapenjualan a");
	// 	$query = $this->db->get();
	// 	// debug($this->db->last_query());
	// 	$result = $query->result_array();	

	// 	return $result;
	// }

	// public function get_db_customer(){
	// 	$session_data = $this->session->userdata('logged_in');		
	// 	$id_cabang = $session_data['id_cabang'];
		
	// 	$this->db->select ( 'a.*' );
	// 	$this->db->from("sls_sales_database_cust a");
	// 	//$this->db->where("a.status","1");
		
	// 	if($id_cabang!=0){
	// 		$this->db->where("a.id_cabang", $id_cabang);
	// 	}
	// 	$query = $this->db->get();
	// 	// debug($this->db->last_query());
	// 	$result = $query->result_array();	

	// 	return $result;
	// }

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
		
		$result = $this->db->insert("cost_tol_detail", $data);
		$id = $this->db->insert_id();
	
		return $result;
	}
	
	public function reset_data($id){
		$this->db->where('id_cost_tol', $id);
        $result = $this->db->delete("cost_tol_detail");
				
		return $result;
	}

	// public function simpan_data_detail_lembur($data, &$id = ""){
	// 	$result = 0;
		
	// 	$result = $this->db->insert("umk_lembur_detail", $data);
	// 	$id = $this->db->insert_id();
	
	// 	return $result;
	// }
	
	// public function reset_data_lembur($id){
	// 	$this->db->where('id_umk', $id);
    //     $result = $this->db->delete("umk_lembur_detail");
				
	// 	return $result;
	// }
	
	public function delete_data($id){
		$this->db->where('id', $id);
        $result = $this->db->delete($this->main_table);
				
		return $result;
    }
}
