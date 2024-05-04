<?php
class M_sls_rate_request_sf extends CI_Model {
	private $main_table = "sls_rate_request";
	
	public function get_data($id=""){
		$session_data = $this->session->userdata('logged_in');		
		$id_cabang = $session_data['id_cabang'];
		$is_cat_customer = $session_data['is_cat_customer'];
		
		$this->db->select ( 'a.*, b.nama_cabang, c.nama_customer, c.alamat, c.kota, c.kode_pos, d.nama_sales, e.no_bukti as no_paf, f.nama_user');
		$this->db->from($this->main_table . " a");
		$this->db->join('cabang b', 'a.id_cabang = b.id', 'left');
		$this->db->join('customer c', 'a.id_customer = c.id', 'left');
		$this->db->join('sales d', 'a.id_sales = d.id', 'left');
		$this->db->join('sls_paf e', 'a.id_paf = e.id', 'left');
		$this->db->join('web_user f', 'a.create_user = f.id', 'left');
		
		if($id!=""){
			$this->db->where("a.id", $id);
		}

		if($id_cabang!=0){
			$this->db->where("a.id_cabang", $id_cabang);
		}

		if($is_cat_customer == 1){
			$this->db->where("c.kategori_cust", "EXT");
		}

		if($is_cat_customer == 2){
			$this->db->where("c.kategori_cust", "INT");
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
	
	public function get_detail_rr($id){
		$this->db->select ( "a.*, b.loading, CONCAT(b.rute,' | ', b.pool,' | ', b.unit,' ', b.tipe_box,' | ', b.nama_kategori) as rute" );
		$this->db->from("sls_rate_request_detail a");
		$this->db->join('view_rute_rr b', 'a.id_rute = b.id', 'left');
		$this->db->where("a.id_rr", $id);
		//$this->db->group_by("b.id_rute");
		
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

	public function get_detail($id){
		$this->db->select ( 'a.*, c.loading, c.unloading, f.unit, c.tipe_box, e.nama_user, e.ttd, b.nama_approved, b.ttd_approved, g.nama_customer' );
		$this->db->from("sls_rate_request_detail a");
		$this->db->join('sls_rate_request b', 'a.id_rr = b.id', 'left');
		$this->db->join('view_rute c', 'a.id_rute = c.id', 'left');
		$this->db->join('web_user e', 'e.id = b.create_user', 'left');
		$this->db->join('view_kategori_kirim d', 'a.id_kategori_kirim = d.id', 'left');
		$this->db->join('moda f', 'c.id_moda = f.id', 'left');
		$this->db->join('customer g', 'b.id_customer = g.id', 'left');
		$this->db->where("a.id_rr", $id);
		$this->db->group_by("c.id", $id);
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

	public function get_paf(){
		$session_data = $this->session->userdata('logged_in');		
		$id_cabang = $session_data['id_cabang'];
			
		$this->db->select ( 'a.*, b.nama_customer' );
		$this->db->from("sls_paf a");
		$this->db->join('customer b', 'a.id_customer = b.id', 'left');
		$this->db->where("a.status_pai", "VERIFIED");
		//$this->db->where("a.status_ops", "VERIFIED");
		if($id_cabang!=0){
			$this->db->where("a.id_cabang", $id_cabang);
		}

		$query = $this->db->get();
		// debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

	public function get_rr_detail_by_id($param){
		extract($param);
		$session_data = $this->session->userdata('logged_in');		
		$id_cabang = $session_data['id_cabang'];
			
		$this->db->select ( 'a.*, b.nama_customer, c.rute_tarif, c.id_tipe_box_tarif, c.tarif_kirim, c.satuan_tarif, c.post_date' );
		$this->db->from("sls_paf a");
		$this->db->join('customer b', 'a.id_customer = b.id', 'left');
		$this->db->join('view_rute_paf_date_plus3 c', 'a.id = c.id_paf', 'left');
		//$this->db->where("c.post_date <=20 ");
		$this->db->where("a.status_pai", "VERIFIED");
		//$this->db->where("c.id_rute_re", 0);
		//$this->db->where("a.status_ops", "VERIFIED");
		$this->db->where("a.id", $id);
		if($id_cabang!=0){
			$this->db->where("a.id_cabang", $id_cabang);
		}

		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

	public function get_rute(){
		$session_data = $this->session->userdata('logged_in');		
		//$id_cabang = $session_data['id_cabang'];
			
		$this->db->select ( "a.id, a.id_cost_tol, CONCAT(a.loading,' - ',a.unloading,' | ',a.pool,' | ',a.unit,' ', a.tipe_box,' | ', a.nama_kategori) as nama" );
		$this->db->from("view_rute_moda a");
			
		// if($id_cabang!=0){
		$this->db->where("a.id_cost_tol<>", "");
		$this->db->where("a.loading<>", "");
		// }
	
		
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

	public function get_kategori_kirim(){
		$session_data = $this->session->userdata('logged_in');		
		//$id_cabang = $session_data['id_cabang'];
			
		$this->db->select ( "a.id, CONCAT(a.nama_kategori) as nama" );
		$this->db->from("view_kategori_kirim a");
			
		// if($id_cabang!=0){
		// 	$this->db->where("a.id", $id_cabang);
		// }
	
		
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

	public function get_rute_by_id($param){
		extract($param);
		
		$this->db->select ( 'a.*' );
		$this->db->from("view_rute_moda a");
		//$this->db->join('inv_merek b', 'b.id = a.id_merek', 'left');		
		$this->db->where("a.id", $id);
		$query = $this->db->get();
		// debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;

	}

	public function get_kategori_kirim_by_id($param){
		extract($param);
		
		$this->db->select ( 'a.*' );
		$this->db->from("view_kategori_kirim a");
		//$this->db->join('inv_merek b', 'b.id = a.id_merek', 'left');		
		$this->db->where("a.id", $id);
		$query = $this->db->get();
		// debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;

	}

	// public function get_act_setting(){
	// 	$session_data = $this->session->userdata('logged_in');		
	// 	//$id_cabang = $session_data['id_cabang'];
		
	// 	$this->db->select ( 'a.*' );
	// 	$this->db->from("sls_activity_setting a");
	// 	//$this->db->join('cabang d', 'a.id_cabang = d.id', 'left');
		
	// 	// if($id_cabang!=0){
	// 	// 	$this->db->where("a.id_cabang", $id_cabang);
	// 	// }
	// 	$session_data = $this->session->userdata('logged_in');
	// 	if($session_data['id_level']<2){
	// 		$this->db->where("a.create_user", $session_data['id']);
	// 	}
		
	// 	$query = $this->db->get();
	// 	// debug($this->db->last_query());
	// 	$result = $query->result_array();	

	// 	return $result;
	// }

	public function get_sales(){
	$this->db->select ( 'a.*' );
	$this->db->from("sales a");
	$query = $this->db->get();
	// 	// debug($this->db->last_query());
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

	public function get_jenis_muatan(){
		$session_data = $this->session->userdata('logged_in');		
		//$id_cabang = $session_data['id_cabang'];
			
		$this->db->select ( "a.id, CONCAT(a.nama_muatan) as nama" );
		$this->db->from("jenis_muatan a");
			
		// if($id_cabang!=0){
		// 	$this->db->where("a.id", $id_cabang);
		// }
	
		
		$query = $this->db->get();
		//debug($this->db->last_query());
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

	// public function get_segment(){
	// 	$this->db->select ( 'a.*' );
	// 	$this->db->from("sls_segment a");
	// 	$query = $this->db->get();
	// 	// debug($this->db->last_query());
	// 	$result = $query->result_array();	

	// 	return $result;
	// }

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
		
		$result = $this->db->insert("sls_rate_request_detail", $data);
		$id = $this->db->insert_id();
	
		return $result;
	}
	
	public function reset_data($id){
		$this->db->where('id_rr', $id);
        $result = $this->db->delete("sls_rate_request_detail");
				
		return $result;
	}
	
	public function delete_data($id){
		$this->db->where('id', $id);
        $result = $this->db->delete($this->main_table);
				
		return $result;
    }
}
