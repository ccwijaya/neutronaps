<?php
class M_dist_profit_margin extends CI_Model {
	private $main_table = "dist_profit_margin";
	
	public function get_data($id=""){
		$session_data = $this->session->userdata('logged_in');		
		
		$this->db->select ( 'a.*, b.nama_cabang, c.nama_customer, c.alamat, c.kota, c.kode_pos, d.nama_sales');
		$this->db->from($this->main_table . " a");
		$this->db->join('cabang b', 'a.id_cabang = b.id', 'left');
		$this->db->join('customer c', 'a.id_customer = c.id', 'left');
		$this->db->join('sales d', 'a.id_sales = d.id', 'left');
		
		if($id!=""){
			$this->db->where("a.id", $id);
		}
		

		//$session_data = $this->session->userdata('logged_in');
		// if($session_data['id_level']<2){
		// 	$this->db->where("a.create_user", $session_data['id']);
		// }

		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;

	}
	
	public function get_detail_pnl($id){
		$this->db->select ( 'a.*, b.loading' );
		$this->db->from("dist_profit_margin_detail a");
		$this->db->join('rute b', 'a.id_rute = b.id', 'left');
		$this->db->where("a.id_profit", $id);
		
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

	public function get_detail($id){
		$this->db->select ( 'a.*, c.loading, c.unloading, f.unit, c.tipe_box, e.nama_user, e.ttd, b.nama_approved, b.ttd_approved, g.nama_customer' );
		$this->db->from("dist_profit_margin_detail a");
		$this->db->join('dist_profit_margin b', 'a.id_profit = b.id', 'left');
		$this->db->join('view_dist_rute c', 'a.id_rute = c.id', 'left');
		$this->db->join('web_user e', 'e.id = b.create_user', 'left');
		$this->db->join('view_kategori_kirim d', 'a.id_kategori_kirim = d.id', 'left');
		$this->db->join('moda f', 'c.id_moda = f.id', 'left');
		$this->db->join('customer g', 'b.id_customer = g.id', 'left');
		$this->db->where("a.id_profit", $id);
		$this->db->group_by("c.id", $id);
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

	public function get_detail_print($id){
		$this->db->select ( 'a.*, c.loading, c.unloading, f.unit, c.tipe_box, e.nama_user, e.ttd, b.nama_approved, b.ttd_approved, g.nama_customer' );
		$this->db->from("dist_profit_margin_detail a");
		$this->db->join('dist_profit_margin b', 'a.id_profit = b.id', 'left');
		$this->db->join('view_dist_rute c', 'a.id_rute = c.id', 'left');
		$this->db->join('web_user e', 'e.id = b.create_user', 'left');
		$this->db->join('view_kategori_kirim d', 'a.id_kategori_kirim = d.id', 'left');
		$this->db->join('moda f', 'c.id_moda = f.id', 'left');
		$this->db->join('customer g', 'b.id_customer = g.id', 'left');
		$this->db->where("a.status_verif < 3");
		$this->db->where("a.id_profit", $id);
		$this->db->group_by("c.id", $id);
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

	public function get_re_detail_by_id($param){
		extract($param);
		
		$session_data = $this->session->userdata('logged_in');		
		$id_cabang = $session_data['id_cabang'];
			
		$this->db->select ( 'a.*, c.id_rute, c.tarif_sales' );
		$this->db->from("sls_dist_rate_request a");
		//$this->db->join('customer b', 'a.id_customer = b.id', 'left');
		$this->db->join('sls_dist_rate_request_detail c', 'a.id = c.id_rr', 'left');
		$this->db->where("a.id", $id);
		//$this->db->where("a.status_pai <> ''");
		//$this->db->where("a.status_ops <> ''");
		if($id_cabang!=0){
			$this->db->where("a.id_cabang", $id_cabang);
		}

		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

	public function get_rr(){
		$session_data = $this->session->userdata('logged_in');		
		$id_cabang = $session_data['id_cabang'];
			
		$this->db->select ( 'a.*, b.nama_customer' );
		$this->db->from("sls_dist_rate_request a");
		$this->db->join('customer b', 'a.id_customer = b.id', 'left');
		//$this->db->where("a.status_pai<> ''");
		//$this->db->where("a.status_ops <> ''");
		if($id_cabang!=0){
			$this->db->where("a.id_cabang", $id_cabang);
		}

		$query = $this->db->get();
		// debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

	public function get_cabang(){
		$session_data = $this->session->userdata('logged_in');		
		$id_cabang = $session_data['id_cabang'];
			
		$this->db->select ( 'a.*' );
		$this->db->from("cabang a");
			
		if($id_cabang!=0){
			$this->db->where("a.id_cabang", $id_cabang);
		}

		$query = $this->db->get();
		// debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

	public function get_rute(){
		$session_data = $this->session->userdata('logged_in');		
		//$id_cabang = $session_data['id_cabang'];
			
		$this->db->select ( "a.id, a.id_cost_tol, CONCAT(a.loading,'-',a.unloading,' | ',a.unit,' ', a.tipe_box,' | ', a.nama_kategori) as nama" );
		$this->db->from("view_dist_rute_moda a");
			
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
		$this->db->from("view_dist_rute_moda a");
		$this->db->where("a.id_cost_tol<>", "");
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
		
		$result = $this->db->insert("dist_profit_margin_detail", $data);
		$id = $this->db->insert_id();
	
		return $result;
	}
	
	public function reset_data($id){
		$this->db->where('id_profit', $id);
        $result = $this->db->delete("dist_profit_margin_detail");
				
		return $result;
	}
	
	public function delete_data($id){
		$this->db->where('id', $id);
        $result = $this->db->delete($this->main_table);
				
		return $result;
    }
}
