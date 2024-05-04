<?php
class M_pa_sp extends CI_Model {
	private $main_table = "pa_sp";
	
	public function get_data($id=""){
		$session_data = $this->session->userdata('logged_in');		
		$id_cabang = $session_data['id_cabang'];

		$this->db->select ( 'a.*' );
		$this->db->from($this->main_table . " a");
		$this->db->join('customer b', 'a.id_customer = b.id', 'left');
		$this->db->join('sales z', 'z.id = b.id_sales', 'left');		
		if($id!=""){
			$this->db->where("a.id", $id);
		}

		if($id_cabang!=0){
			$this->db->where("a.id", $id_cabang);
		}

		$session_data = $this->session->userdata('logged_in');
		if($session_data['id_level']<2){
			$this->db->where("a.create_user", $session_data['id']);
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

	public function get_data2($search, $limit="", $start="", $id=""){
		$session_data = $this->session->userdata('logged_in');		
		$id_cabang = $session_data['id_cabang'];

		extract($search);
		$this->db->select ( 'a.*, b.pic, b.nama_customer, z.nama_sales' );
		$this->db->from('pa_sp a');
		$this->db->join('customer b', 'a.id_customer = b.id', 'left');
		$this->db->join('sales z', 'z.id = b.id_sales', 'left');		
		//$this->db->order_by('a.loading', 'ASC');		
		if($id!=""){
			$this->db->where("a.id", $id);
		}
		//$this->db->where("a.loading<>", "");

		if($id_cabang!=0){
			$this->db->where("a.id", $id_cabang);
		}

		$session_data = $this->session->userdata('logged_in');
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

	public function get_paf(){

		//$tahun = date("Y");
		$this->db->select ( 'a.*, b.nama_customer' );
		$this->db->from("sls_paf a");
		$this->db->join('customer b', 'b.id = a.id_customer', 'left');

		$this->db->where("a.status_pai<> ''");
		$this->db->where("a.status_ops <> ''");
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

	public function get_paf_rute_tarif_by_id($param){
		extract($param);
		
		$this->db->select ( 'a.*, b.rute_tarif, b.id_moda_tarif, b.id_tipe_box_tarif' );
		$this->db->from("sls_paf a");
		$this->db->join('view_rute_paf_date_plus3 b', 'b.id_paf = a.id', 'left');	
		$this->db->where("b.post_date <=5 ");	
		$this->db->where("a.id", $id);
		//$this->db->group_by('b.id');
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;

	}

	public function get_quotation(){

		//$tahun = date("Y");
		$this->db->select ( 'a.*, b.nama_customer' );
		$this->db->from("sls_quotation a");
		$this->db->join('customer b', 'b.id = a.id_customer', 'left');

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
			
		$this->db->select ( "a.id, CONCAT(a.rute) as nama" );
		$this->db->from("view_rute a");
			
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
		//debug($this->db->last_query());
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

	// public function get_detail_volume_rute($id){
	// 	$this->db->select ( 'a.*' );
	// 	$this->db->from("pa_sp_volume_rute_kirim a");
	// 	$this->db->where("a.id_sp", $id);
	// 	$query = $this->db->get();
	// 	// debug($this->db->last_query());
	// 	$result = $query->result_array();	

	// 	return $result;
	// }

	public function get_detail_tarif_kirim($id){
		$this->db->select ( 'a.*' );
		$this->db->from("pa_sp_tarif_kirim a");
		$this->db->where("a.id_sp", $id);
		$query = $this->db->get();
		// debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

	// public function get_detail_pod($id){
	// 	$this->db->select ( 'a.*' );
	// 	$this->db->from("sls_paf_pod a");
	// 	$this->db->where("a.id_paf", $id);
	// 	$query = $this->db->get();
	// 	// debug($this->db->last_query());
	// 	$result = $query->result_array();	

	// 	return $result;
	// }

	public function get_detail_matrix($id){
		$this->db->select ( 'a.*' );
		$this->db->from("pa_sp_matrix_komunikasi a");
		$this->db->where("a.id_sp", $id);
		$query = $this->db->get();
		// debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

	public function get_detail_matrix_pbl($id){
		$this->db->select ( 'a.*' );
		$this->db->from("pa_sp_matrix_komunikasi_pbl a");
		$this->db->where("a.id_sp", $id);
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

	// public function simpan_data_detail_volume_rute($data, &$id = ""){
	// 	$result = 0;
		
	// 	$result = $this->db->insert("sls_paf_volume_rute_kirim", $data);
	// 	$id = $this->db->insert_id();
	
	// 	return $result;
	// }
	
	// public function reset_data_volume_rute($id){
	// 	$this->db->where('id_sp', $id);
    //     $result = $this->db->delete("pa_sp_volume_rute_kirim");
				
	// 	return $result;
	// }

	public function simpan_data_detail_tarif_kirim($data, &$id = ""){
		$result = 0;
		
		$result = $this->db->insert("pa_sp_tarif_kirim", $data);
		$id = $this->db->insert_id();
	
		return $result;
	}
	
	public function reset_data_tarif_kirim($id){
		$this->db->where('id_sp', $id);
        $result = $this->db->delete("pa_sp_tarif_kirim");
				
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
		
		$result = $this->db->insert("pa_sp_matrix_komunikasi", $data);
		$id = $this->db->insert_id();
	
		return $result;
	}

	public function simpan_data_detail_matrix_pbl($data, &$id = ""){
		$result = 0;
		
		$result = $this->db->insert("pa_sp_matrix_komunikasi_pbl", $data);
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
		$this->db->where('id_sp', $id);
        $result = $this->db->delete("pa_sp_matrix_komunikasi");
				
		return $result;
	}

	public function reset_data_matrix_pbl($id){
		$this->db->where('id_sp', $id);
        $result = $this->db->delete("pa_sp_matrix_komunikasi_pbl");
				
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
