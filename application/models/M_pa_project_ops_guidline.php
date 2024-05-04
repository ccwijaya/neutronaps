<?php
class M_pa_project_ops_guidline extends CI_Model {
	private $main_table = "pa_project_summary";
	
	public function get_data($id=""){
		$session_data = $this->session->userdata('logged_in');		
		$id_cabang = $session_data['id_cabang'];
		
		$this->db->select ( 'a.*, b.nama_cabang, c.nama_customer, c.alamat, c.kota, c.kode_pos, d.nama_sales, e.no_bukti as no_paf');
		$this->db->from($this->main_table . " a");
		$this->db->join('cabang b', 'a.id_cabang = b.id', 'left');
		$this->db->join('customer c', 'a.id_customer = c.id', 'left');
		$this->db->join('sales d', 'a.id_sales = d.id', 'left');
		$this->db->join('sls_paf e', 'a.id_paf = e.id', 'left');
		
		if($id!=""){
			$this->db->where("a.id", $id);
		}

		if($id_cabang!=0){
			$this->db->where("a.id_cabang", $id_cabang);
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
	
	public function get_detail_ps($id){
		$this->db->select ( 'a.*, b.loading, b.rute, b.tipe_box, c.unit' );
		$this->db->from("pa_project_summary_detail a");
		$this->db->join('view_rute b', 'a.id_rute = b.id', 'left');
		$this->db->join('moda c', 'b.id_moda = c.id', 'left');
		$this->db->where("a.id_ps", $id);
		
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

	public function get_detail($id){
		$this->db->select ( 'a.*, c.loading, c.unloading, f.unit, c.tipe_box, e.nama_user, e.ttd, b.nama_approved, b.ttd_approved, g.nama_customer' );
		$this->db->from("pa_project_summary_detail a");
		$this->db->join('pa_project_summary b', 'a.id_ps = b.id', 'left');
		$this->db->join('view_rute c', 'a.id_rute = c.id', 'left');
		$this->db->join('web_user e', 'e.id = b.create_user', 'left');
		$this->db->join('view_kategori_kirim d', 'a.id_kategori_kirim = d.id', 'left');
		$this->db->join('moda f', 'c.id_moda = f.id', 'left');
		$this->db->join('customer g', 'b.id_customer = g.id', 'left');
		$this->db->where("a.id_ps", $id);
		$this->db->group_by("c.id", $id);
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

	public function get_detail_dimensi_box($id){
		$this->db->select ( 'a.*, a.is_dimensi_box as ada' );
		$this->db->from("sls_paf_dimensi_box a");
		$this->db->where("a.id_paf", $id);
		// $this->db->where("a.id <>", 7);
		// $this->db->where("a.id <>", 8);
		// $this->db->where("a.id <>", 11);
		// $this->db->where("a.id <>", 12);
		// $this->db->where("a.id <>", 13);
		// $this->db->where("a.id <>", 14);
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

	public function get_paf(){
		$session_data = $this->session->userdata('logged_in');		
		$id_cabang = $session_data['id_cabang'];
			
		$this->db->select ( 'a.*, b.nama_customer' );
		$this->db->from("sls_paf a");
		$this->db->join('customer b', 'a.id_customer = b.id', 'left');
		$this->db->where("a.status_pai<> ''");
		//$this->db->where("a.status_ops <> ''");
		if($id_cabang!=0){
			$this->db->where("a.id_cabang", $id_cabang);
		}

		$query = $this->db->get();
		// debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

	public function get_contract(){
		$session_data = $this->session->userdata('logged_in');		
		$id_cabang = $session_data['id_cabang'];
			
		$this->db->select ( 'a.*, b.nama_customer' );
		$this->db->from("sls_quotation a");
		$this->db->join('customer b', 'a.id_customer = b.id', 'left');
		//$this->db->where("a.is_contract", 1);
		$this->db->where("a.no_contract<>", NULL);
		//$this->db->where("a.status_ops <> ''");
		//if($id_cabang!=0){
			//$this->db->where("a.id_cabang", $id_cabang);
		//}

		$query = $this->db->get();
		// debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

	public function get_ps_detail_by_id($param){
		extract($param);
		$session_data = $this->session->userdata('logged_in');		
		$id_cabang = $session_data['id_cabang'];
			
		$this->db->select ( 'a.*, b.nama_customer, c.rute_tarif, c.id_tipe_box_tarif, c.tarif_kirim, c.satuan_tarif, 
							c.est_jadwal_muat_tarif, c.tonase_ton_tarif, c.cbm_tarif, c.ton_bulan, c.trip_bulan, c.ton_minggu, c.trip_minggu, c.min_trip_hari, 
							c.ton_minggu_pbl, c.trip_minggu_pbl, c.min_trip_hari_pbl, c.ton_minggu_vend, c.trip_minggu_vend, c.min_trip_hari_vend, c.unit_pbl, c.unit_vendor, c.post_date' );
		$this->db->from("sls_paf a");
		$this->db->join('customer b', 'a.id_customer = b.id', 'left');
		$this->db->join('view_rute_paf_date_plus3 c', 'a.id = c.id_paf', 'left');
		$this->db->where("c.post_date <=5 ");
		$this->db->where("a.status_pai <> ''");
		$this->db->where("a.status_ops <> ''");
		$this->db->where("a.id", $id);
		if($id_cabang!=0){
			$this->db->where("a.id_cabang", $id_cabang);
		}

		$query = $this->db->get();
		// debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

	public function get_matrix_detail_by_id($param){
		extract($param);
		$session_data = $this->session->userdata('logged_in');		
		$id_cabang = $session_data['id_cabang'];
			
		$this->db->select ( 'a.*' );
		$this->db->from("sls_paf_matrix_komunikasi a");
		$this->db->where("a.id_paf", $id);
		//if($id_cabang!=0){
			//$this->db->where("a.id_cabang", $id_cabang);
		//}

		$query = $this->db->get();
		// debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

	public function get_matrix_pbl_detail_by_id($param){
		extract($param);
		$session_data = $this->session->userdata('logged_in');		
		$id_cabang = $session_data['id_cabang'];
			
		$this->db->select ( 'a.*' );
		$this->db->from("sls_paf_matrix_komunikasi_pbl a");
		$this->db->where("a.id_paf", $id);
		//if($id_cabang!=0){
			//$this->db->where("a.id_cabang", $id_cabang);
		//}

		$query = $this->db->get();
		// debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

	public function get_paf_by_id_customer($param){
		extract($param);
		
		// $this->db->distinct();
		$this->db->select('a.*');
		$this->db->from("sls_paf a");
		$this->db->where("a.id_customer", $id);
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;

	}

	public function get_pool_check(){

		//$tahun = date("Y");
		$this->db->select ( "a.id,  CONCAT(a.pool_check) as nama" );
		$this->db->from("pool_check a");

		//$this->db->where("a.periode", $tahun);
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

	public function get_detail_grv($id){
		//extract($param);
		$session_data = $this->session->userdata('logged_in');		
		$id_cabang = $session_data['id_cabang'];
			
		$this->db->select ( 'a.*, b.transporter, b.grade, b.moda, b.tipe_box, b.pool, b.vol_ton, b.vol_trip, b.area, b.rute_grv' );
		$this->db->from("pa_project_summary a");
		$this->db->join('pa_project_summary_grv b', 'a.id = b.id_ps', 'left');
		$this->db->where("a.id", $id);
		if($id_cabang!=0){
			$this->db->where("a.id_cabang", $id_cabang);
		}

		$query = $this->db->get();
		// debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

	public function get_detail_matrix($id){
		//extract($param);
		$session_data = $this->session->userdata('logged_in');		
		$id_cabang = $session_data['id_cabang'];
			
		$this->db->select ( 'a.*, b.nama_mtx, b.jabatan_mtx, b.fungsi_tugas_mtx, b.no_telp_mtx, b.email_mtx' );
		$this->db->from("pa_project_summary a");
		$this->db->join('pa_project_summary_matrix b', 'a.id = b.id_ps', 'left');
		$this->db->where("a.id", $id);
		if($id_cabang!=0){
			$this->db->where("a.id_cabang", $id_cabang);
		}

		$query = $this->db->get();
		// debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

	public function get_detail_matrix_pbl($id){
		//extract($param);
		$session_data = $this->session->userdata('logged_in');		
		$id_cabang = $session_data['id_cabang'];
			
		$this->db->select ( 'a.*, b.nama_mtx_pbl, b.jabatan_mtx_pbl, b.fungsi_tugas_mtx_pbl, b.no_telp_mtx_pbl, b.email_mtx_pbl' );
		$this->db->from("pa_project_summary a");
		$this->db->join('pa_project_summary_matrix_pbl b', 'a.id = b.id_ps', 'left');
		$this->db->where("a.id", $id);
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
			
		$result = $this->db->insert("pa_project_summary_detail", $data);
		$id = $this->db->insert_id();
		
		return $result;
	}
	
	public function reset_data($id){
		$this->db->where('id_ps', $id);
    	 $result = $this->db->delete("pa_project_summary_detail");
				
		return $result;
	}

	public function simpan_data_detail_grv($data, &$id = ""){
		$result = 0;
		
		$result = $this->db->insert("pa_project_summary_grv", $data);
		$id = $this->db->insert_id();
	
		return $result;
	}
	
	public function reset_data_grv($id){
		$this->db->where('id_ps', $id);
        $result = $this->db->delete("pa_project_summary_grv");
				
		return $result;
	}

	
	
	public function delete_data($id){
		$this->db->where('id', $id);
        $result = $this->db->delete($this->main_table);
				
		return $result;
    }
}
