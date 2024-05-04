<?php
class M_sls_pre_project extends CI_Model {
	private $main_table = "sls_paf";
	
	public function get_data($id=""){
		$session_data = $this->session->userdata('logged_in');		
		$id_cabang = $session_data['id_cabang'];
		$is_cat_customer = $session_data['is_cat_customer'];

		$this->db->select ( 'a.*, b.pic, b.nama_customer, c.nama_cabang, d.no_bukti_pog' );
		$this->db->from($this->main_table . " a");
		$this->db->join('customer b', 'a.id_customer = b.id', 'left');
		$this->db->join('sales z', 'z.id = b.id_sales', 'left');	
		$this->db->join('cabang c', 'c.id = a.id_cabang', 'left');	
		$this->db->join('pa_project_summary d', 'a.id = d.id_paf', 'left');	
		$this->db->where("a.is_pre_project", 1);
		if($id!=""){
			$this->db->where("a.id", $id);
		}

		if($id_cabang!=0){
			$this->db->where("a.id_cabang", $id_cabang);
		}

		if($is_cat_customer == 1){
			$this->db->where("b.kategori_cust", "EXT");
		}

		if($is_cat_customer == 2){
			$this->db->where("b.kategori_cust", "INT");
		}

		if($session_data['id_level']<2){
			$this->db->where("a.create_user", $session_data['id']);
		}

		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;

	}

	public function get_data2($search, $limit="", $start="", $id=""){
		$session_data = $this->session->userdata('logged_in');		
		$id_cabang = $session_data['id_cabang'];
		$id_sales = $session_data['id_sales'];
		$nama_user = $session_data['nama_user'];
		

		extract($search);
		$this->db->select ( 'a.*, b.pic, b.nama_customer, z.nama_sales' );
		$this->db->from('sls_paf a');
		$this->db->join('customer b', 'a.id_customer = b.id', 'left');
		$this->db->join('sales z', 'z.id = b.id_sales', 'left');
		//$this->db->where("b.kategori_cust", "EXT");	
		if($id!=""){
			$this->db->where("a.id", $id);
		}
		//$this->db->where("a.loading<>", "");

		if($id_cabang!=0){
			$this->db->where("a.id_cabang", $id_cabang);
		}

		// if($nama_user!="Busines & Development"){
		// 	$this->db->where("z.nama_sales", $nama_user);
		// }

		//$session_data = $this->session->userdata('logged_in');
		if($session_data['id_level']<2){
			$this->db->where("a.create_user", $session_data['id']);
		}

		if(isset($word)!=""){
			$this->db->where("
				(a.id LIKE '%" . $word . "%' OR
				a.no_bukti LIKE '%" . $word . "%' OR
				a.tanggal LIKE '%" . $word . "%' OR
				b.nama_customer LIKE '%" . $word . "%')
				");
		}
		
		
		if(isset($sort)){
		if($sort!=""){
			$this->db->order_by('a.'.$sort.'', 'ASC');
		} else {
			$this->db->order_by('a.id', 'DESC');			
		}
		} else {
			$this->db->order_by('a.id', 'DESC');			
		}

		if($limit!=""){
			$this->db->limit($limit, $start);
		}
		// if($id_proyek!=0){
		// $this->db->where("b.id_proyek", $id_proyek);
		// }
		// $this->db->where("a.is_active", 1);
		// $this->db->group_by('a.id');		$this->db->order_by('a.id', 'DESC');
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

	public function get_customer(){

		//$tahun = date("Y");
		$this->db->select ( 'a.*' );
		$this->db->from("customer a");

		//$this->db->where("a.periode", $tahun);
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

	public function get_cabang(){

		//$tahun = date("Y");
		$this->db->select ( 'a.*' );
		$this->db->from("cabang a");

		//$this->db->where("a.periode", $tahun);
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

	public function get_tipe_box(){

		//$tahun = date("Y");
		$this->db->select ( "a.id, a.nama_muatan, CONCAT(a.nama_muatan) as nama" );
		$this->db->from("jenis_muatan a");

		//$this->db->where("a.periode", $tahun);
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

	public function get_area1(){

		//$tahun = date("Y");
		$this->db->select ( "a.id, CONCAT(a.area,' - ', a.area_kecamatan) as nama" );
		$this->db->from("area a");

		$this->db->where("a.is_distribusi", 0);
		$this->db->where("a.area_kecamatan<>", "");
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

	public function get_area2(){

		//$tahun = date("Y");
		$this->db->select ( "a.id, CONCAT(a.area,' - ', a.area_kecamatan) as nama" );
		$this->db->from("area a");

		$this->db->where("a.is_distribusi", 0);
		$this->db->where("a.area_kecamatan<>", "");
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

	public function get_rute(){
		$session_data = $this->session->userdata('logged_in');		
		//$id_cabang = $session_data['id_cabang'];
			
		$this->db->select ( "a.id, CONCAT(a.rute,'|',b.unit,' ',a.tipe_box) as nama" );
		$this->db->from("view_rute a");
		$this->db->join('moda b', 'b.id = a.id_moda', 'left');	
			
		// if($id_cabang!=0){
		//$this->db->where("a.id_cost_tol<>", "");
		$this->db->where("a.loading<>", "");
		// }
	
		
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

	public function get_rute_by_id($param){
		extract($param);
		
		$this->db->select ( 'a.*, b.unit' );
		$this->db->from("view_rute a");
		$this->db->join('moda b', 'b.id = a.id_moda', 'left');		
		$this->db->where("a.id", $id);
		$query = $this->db->get();
		// debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;

	}

	public function get_loading_by_area1($param){
		extract($param);
		
		$this->db->select ( 'a.*' );
		// $this->db->select ( "a.id, CONCAT(a.no_bukti,' - ', a.tanggal) as title" );
		$this->db->from("area a");
		//$this->db->join('sls_nama_harga b', 'b.id = a.id_nama_harga', 'left');		
		// if($id!=""){
		$this->db->where("a.id", $id);
		//$this->db->where("a.status", 1);
		
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;

	}

	public function get_loading_by_area2($param){
		extract($param);
		
		$this->db->select ( 'a.*' );
		// $this->db->select ( "a.id, CONCAT(a.no_bukti,' - ', a.tanggal) as title" );
		$this->db->from("area a");
		//$this->db->join('sls_nama_harga b', 'b.id = a.id_nama_harga', 'left');		
		// if($id!=""){
		$this->db->where("a.id", $id);
		//$this->db->where("a.status", 1);
		
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;

	}

	public function get_detail_volume_rute($id){
		$this->db->select ( 'a.*' );
		$this->db->from("sls_paf_volume_rute_kirim a");
		$this->db->where("a.id_paf", $id);
		$query = $this->db->get();
		// debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

	public function get_detail_tarif_kirim($id){
		$this->db->select ( 'a.*, b.rute, b.unit, b.rute, c.unit' );
		$this->db->from("sls_paf_tarif_kirim a");
		$this->db->join('view_rute b', 'b.id = a.rute_tarif', 'left');
		$this->db->join('moda c', 'c.id = a.id_moda_tarif', 'left');
		$this->db->where("a.id_paf", $id);
		$query = $this->db->get();
		// debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

	public function get_detail_pod($id){
		$this->db->select ( 'a.*' );
		$this->db->from("sls_paf_pod a");
		$this->db->where("a.id_paf", $id);
		$query = $this->db->get();
		// debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

	public function get_detail_matrix($id){
		$this->db->select ( 'a.*' );
		$this->db->from("sls_paf_matrix_komunikasi a");
		$this->db->where("a.id_paf", $id);
		$query = $this->db->get();
		// debug($this->db->last_query());
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

	public function get_detail_matrix_pbl($id){
		$this->db->select ( 'a.*' );
		$this->db->from("sls_paf_matrix_komunikasi_pbl a");
		$this->db->where("a.id_paf", $id);
		$query = $this->db->get();
		// debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

	public function get_detail_dimensi_box($id){
		$this->db->select ( 'a.*, a.is_dimensi_box as ada' );
		$this->db->from("sls_paf_dimensi_box a");
		$this->db->where("a.id_paf", $id);
		$this->db->where("a.id <>", 7);
		$this->db->where("a.id <>", 8);
		$this->db->where("a.id <>", 11);
		$this->db->where("a.id <>", 12);
		$this->db->where("a.id <>", 13);
		$this->db->where("a.id <>", 14);
		$query = $this->db->get();
		// debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

	public function get_rute_exists($param){
		extract($param);
		
		// $this->db->distinct();
		$this->db->select('a.*');
		$this->db->from("rute a");
		if($id!=""){
		$this->db->where("a.loading", $loading);
		$this->db->where("a.id <> '" . $id . "'");
		} else {
		$this->db->where("a.loading = '" . $loading . "'");
		}
		$query = $this->db->get();
		// debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;

	}

	// public function get_notif_report($id=""){
	// 	$session_data = $this->session->userdata('logged_in');		
	// 	$id_cabang = $session_data['id_cabang'];
		
	// 	$this->db->select ( 'a.*, sum(a.is_notif_cs) as notif' );
	// 	$this->db->from('sls_sales_visit_report a');
	// 	//$this->db->join('sls_pelanggan b', 'a.id_customer = b.id', 'left');
	// 	//$this->db->join('inv_inq c', 'c.id_sales_tech = a.id', 'left');		
	// 	if($id!=""){
	// 		$this->db->where("a.id", $id);
	// 	}
	// 	if($id_cabang!=0){
	// 		$this->db->where("a.id_cabang", $id_cabang);
	// 	}

	// 	//$session_data = $this->session->userdata('logged_in');
	// 	//if($session_data['id_level']<2){
	// 		//$this->db->where("a.create_user", $session_data['id']);
	// 	//}
	// 	// if($id_proyek!=0){
	// 	// $this->db->where("b.id_proyek", $id_proyek);
	// 	// }
	// 	// $this->db->where("a.is_active", 1);
	// 	// $this->db->group_by('a.id');		$this->db->order_by('a.id', 'DESC');
	// 	$query = $this->db->get();
	// 	//debug($this->db->last_query());
	// 	$result = $query->result_array();	

	// 	return $result;

	// }

	public function simpan_data_detail_volume_rute($data, &$id = ""){
		$result = 0;
		
		$result = $this->db->insert("sls_paf_volume_rute_kirim", $data);
		$id = $this->db->insert_id();
	
		return $result;
	}
	
	public function reset_data_volume_rute($id){
		$this->db->where('id_paf', $id);
        $result = $this->db->delete("sls_paf_volume_rute_kirim");
				
		return $result;
	}

	public function simpan_data_detail_tarif_kirim($data, &$id = ""){
		$result = 0;
		
		$result = $this->db->insert("sls_paf_tarif_kirim", $data);
		$id = $this->db->insert_id();
	
		return $result;
	}
	
	public function reset_data_tarif_kirim($id){
		$this->db->where('id_paf', $id);
        $result = $this->db->delete("sls_paf_tarif_kirim");
				
		return $result;
	}

	public function simpan_data_detail_pod($data, &$id = ""){
		$result = 0;
		
		$result = $this->db->insert("sls_paf_pod", $data);
		$id = $this->db->insert_id();
	
		return $result;
	}
	
	public function reset_data_pod($id){
		$this->db->where('id_paf', $id);
        $result = $this->db->delete("sls_paf_pod");
				
		return $result;
	}

	public function simpan_data_detail_matrix($data, &$id = ""){
		$result = 0;
		
		$result = $this->db->insert("sls_paf_matrix_komunikasi", $data);
		$id = $this->db->insert_id();
	
		return $result;
	}

	public function simpan_data_detail_matrix_pbl($data, &$id = ""){
		$result = 0;
		
		$result = $this->db->insert("sls_paf_matrix_komunikasi_pbl", $data);
		$id = $this->db->insert_id();
	
		return $result;
	}

	public function simpan_data_detail_dimensi_box($data, &$id = ""){
		$result = 0;
		
		$result = $this->db->insert("sls_paf_dimensi_box", $data);
		$id = $this->db->insert_id();
	
		return $result;
	}

	public function simpan_rute($data, &$id = ""){
		$result = 0;
		
		$result = $this->db->insert("rute", $data);
		$id = $this->db->insert_id();
	
		return $result;
	}

	public function reset_data_matrix($id){
		$this->db->where('id_paf', $id);
        $result = $this->db->delete("sls_paf_matrix_komunikasi");
				
		return $result;
	}

	public function reset_data_matrix_pbl($id){
		$this->db->where('id_paf', $id);
        $result = $this->db->delete("sls_paf_matrix_komunikasi_pbl");
				
		return $result;
	}

	public function reset_data_dimensi_box($id){
		$this->db->where('id_paf', $id);
        $result = $this->db->delete("sls_paf_dimensi_box");
				
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
	
	public function delete_data($id){
		$this->db->where('id', $id);
        $result = $this->db->delete($this->main_table);
				
		return $result;
    }
}
