<?php
class M_sls_contract extends CI_Model {
	private $main_table = "sls_quotation";
	
	public function get_data($id=""){
		$session_data = $this->session->userdata('logged_in');		
		$id_cabang = $session_data['id_cabang'];
		$is_cat_customer = $session_data['is_cat_customer'];	
		
		$this->db->select ( 'a.*, b.nama_cabang, c.nama_customer, c.pic, c.alamat, c.kota, c.kode_pos, d.nama_sales, d.keterangan, d.no_wa, d.email_sales, d.contact_admin, e.nama_user, e.jabatan, f.cash, f.days_7, f.days_14, f.days_21, f.days_30, f.biaya_overnight, f.biaya_overnight_mid, f.biaya_overnight2, f.biaya_overnight3, f.biaya_pickup_dalam, f.biaya_pickup_luar, f.biaya_multidrop_dalam, f.biaya_multidrop_dalam_mid, f.biaya_multidrop_luar, f.biaya_multidrop_luar_mid, f.informasi_lain, f.edit_tc_1, f.edit_tc_2, f.edit_tc_3');
		$this->db->from('view_quotation a');
		$this->db->join('cabang b', 'a.id_cabang = b.id', 'left');
		$this->db->join('customer c', 'a.id_customer = c.id', 'left');
		$this->db->join('sales d', 'a.id_sales = d.nama_sales', 'left');
		$this->db->join('web_user e', 'e.id = a.create_user', 'left');
		$this->db->join('sls_paf f', 'f.id = a.id_paf', 'left');
		$this->db->where("a.is_pre_project<>", 1);
		$this->db->where("a.is_deal", 1);
		
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
		

		//$session_data = $this->session->userdata('logged_in');
		if($session_data['id_level']<2){
			$this->db->where("a.create_user", $session_data['id']);
		}

		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;

	}
	
	public function get_detail_pnl($id){
		$this->db->select ( 'a.*, b.rute, d.nama_kategori, e.unit' );
		$this->db->from("sls_quotation_detail a");
		$this->db->join('view_rute b', 'a.id_rute = b.id', 'left');
		$this->db->join('view_kategori_kirim d', 'a.id_kategori_kirim = d.id', 'left');
		$this->db->join('moda e', 'b.id_moda = e.id', 'left');
		//$this->db->where("a.status_verif < 3");
		$this->db->where("a.id_quotation", $id);
		
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

	public function get_detail($id){
		$this->db->select ( 'a.*, c.loading, c.unloading, f.unit, c.tipe_box, e.nama_user, g.nama_customer, d.nama_kategori' );
		$this->db->from("sls_quotation_detail a");
		$this->db->join('sls_quotation b', 'a.id_profit = b.id', 'left');
		$this->db->join('view_rute c', 'a.id_rute = c.id', 'left');
		$this->db->join('web_user e', 'e.id = b.create_user', 'left');
		$this->db->join('view_kategori_kirim d', 'a.id_kategori_kirim = d.id', 'left');
		$this->db->join('moda f', 'c.id_moda = f.id', 'left');
		$this->db->join('customer g', 'b.id_customer = g.id', 'left');
		//$this->db->where("a.status_verif < 2");
		$this->db->where("a.id_quotation", $id);
		$this->db->group_by("c.id", $id);
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

	public function get_detail_print($id){
		$this->db->select ( 'a.*, c.satuan_konversi, c.loading, c.unloading, f.unit, c.tipe_box, e.nama_user, e.jabatan, g.nama_customer' );
		$this->db->from("sls_quotation_detail a");
		$this->db->join('sls_quotation b', 'a.id_profit = b.id', 'left');
		$this->db->join('view_rute c', 'a.id_rute = c.id', 'left');
		$this->db->join('web_user e', 'e.id = b.create_user', 'left');
		$this->db->join('view_kategori_kirim d', 'a.id_kategori_kirim = d.id', 'left');
		$this->db->join('moda f', 'c.id_moda = f.id', 'left');
		$this->db->join('customer g', 'b.id_customer = g.id', 'left');
		$this->db->order_by("c.loading", "ASC");
		$this->db->order_by("c.unloading", "ASC");
		//$this->db->where("a.status_koreksi",1);
		$this->db->where("a.id_quotation", $id);
		//$this->db->group_by("c.id", $id);
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

	public function get_pq_detail_by_id($param){
		extract($param);
		$session_data = $this->session->userdata('logged_in');		
		$id_cabang = $session_data['id_cabang'];
			
		$this->db->select ( 'a.*, c.id_rute, c.tarif_sales, c.tarif_nego, c.total_cost, c.tarif_approved, tipe_box' );
		$this->db->from("profit_margin a");
		$this->db->join('profit_margin_detail c', 'a.id = c.id_profit', 'left');
		$this->db->join('view_rute d', 'c.id_rute = d.id', 'left');
		$this->db->where("a.id", $id);
		//$this->db->join('rute d', 'd.id = c.id_rute', 'left');
		//$this->db->group_by("c.id_rute", );
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
		$this->db->from("sls_rate_request a");
		$this->db->join('customer b', 'a.id_customer = b.id', 'left');
		//$this->db->where("a.status_pai <> ''");
		//$this->db->where("a.status_ops <> ''");
		if($id_cabang!=0){
			$this->db->where("a.id_cabang", $id_cabang);
		}

		$query = $this->db->get();
		// debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

	public function get_pre_quote(){
		$session_data = $this->session->userdata('logged_in');		
		$id_cabang = $session_data['id_cabang'];
			
		$this->db->select ( 'a.*, b.nama_customer' );
		$this->db->from("profit_margin a");
		$this->db->join('customer b', 'a.id_customer = b.id', 'left');
		$this->db->where("a.status_approve",1);
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
			$this->db->where("a.id", $id_cabang);
		}

		$query = $this->db->get();
		// debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

	public function get_moda(){

		//$tahun = date("Y");
		$this->db->select ( "a.id, a.unit,  CONCAT(a.unit) as nama" );
		$this->db->from("moda a");

		//$this->db->where("a.periode", $tahun);
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

	public function get_rute(){
		$session_data = $this->session->userdata('logged_in');		
		//$id_cabang = $session_data['id_cabang'];
			
		$this->db->select ( "a.id, a.id_cost_tol, CONCAT(a.loading,'-',a.unloading,' | ',a.unit,' ', a.tipe_box,' | ', a.nama_kategori) as nama" );
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
		//$this->db->where("a.id", $id);
		$query = $this->db->get();
		//debug($this->db->last_query());
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

	public function get_status_koreksi(){
		$session_data = $this->session->userdata('logged_in');		
		//$id_cabang = $session_data['id_cabang'];
			
		$this->db->select ( "a.id, CONCAT(a.nama_koreksi) as nama" );
		$this->db->from("status_koreksi a");
			
		// if($id_cabang!=0){
		// 	$this->db->where("a.id", $id_cabang);
		// }
	
		
		$query = $this->db->get();
		//debug($this->db->last_query());
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
		
		$result = $this->db->insert("sls_quotation_detail", $data);
		$id = $this->db->insert_id();
	
		return $result;
	}
	
	public function reset_data($id){
		$this->db->where('id_quotation', $id);
        $result = $this->db->delete("sls_quotation_detail");
				
		return $result;
	}
	
	public function delete_data($id){
		$this->db->where('id', $id);
        $result = $this->db->delete($this->main_table);
				
		return $result;
    }
}
