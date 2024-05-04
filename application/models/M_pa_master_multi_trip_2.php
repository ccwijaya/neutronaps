<?php
class M_pa_master_multi_trip extends CI_Model {
	private $main_table = "dist_rute";
	
	public function get_data($id=""){
		$this->db->select ( 'a.*,b.unit' );
		$this->db->from($this->main_table . " a");
		$this->db->join('moda b', 'a.id_moda = b.id', 'left');
		//$this->db->join('area ', 'z.id = b.id_proyek', 'left');		
		if($id!=""){
			$this->db->where("a.id", $id);
		}

		// $session_data = $this->session->userdata('logged_in');
		// if($session_data['id_level']<2){
		// 	$this->db->where("a.create_user", $session_data['id']);
		// }

		
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

		extract($search);
		$this->db->select ( 'a.*,b.unit' );
		$this->db->from('view_dist_rute a');
		$this->db->join('moda b', 'a.id_moda = b.id', 'left');
		// $this->db->join('proyek z', 'z.id = b.id_proyek', 'left');	
		$this->db->order_by('a.id', 'ASC');		
		if($id!=""){
			$this->db->where("a.id", $id);
		}
		//$this->db->where("a.loading<>", "");

		// $session_data = $this->session->userdata('logged_in');
		// if($session_data['id_level']<2){
		// 	$this->db->where("a.create_user", $session_data['id']);
		// }
		if(isset($word)!=""){
			$this->db->where("
				(a.id LIKE '%" . $word . "%' OR
				a.rute LIKE '%" . $word . "%' OR
				a.loading LIKE '%" . $word . "%' OR
				a.unloading LIKE '%" . $word . "%' OR
				b.unit LIKE '%" . $word . "%')
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

	public function get_moda(){

		//$tahun = date("Y");
		$this->db->select ( 'a.*' );
		$this->db->from("moda a");

		//$this->db->where("a.periode", $tahun);
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

	public function get_satuan(){

		//$tahun = date("Y");
		$this->db->select ( 'a.*' );
		$this->db->from("satuan_konversi a");

		//$this->db->where("a.periode", $tahun);
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

	public function get_biaya_ops(){

		//$tahun = date("Y");
		$this->db->select ( 'a.*' );
		$this->db->from("view_dist_biaya_ops a");

		//$this->db->where("a.periode", $tahun);
		$this->db->order_by('a.unit', 'ASC');	
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

	public function get_dist_dop($param){
		extract($param);
		
		$this->db->select ( 'a.*' );
		$this->db->from("dist_area a");
		//$this->db->join('inv_merek b', 'b.id = a.id_merek', 'left');		
		$this->db->where("a.id", $id);
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;

	}

	public function get_satuan_konversi($param){
		extract($param);
		
		$this->db->select ( 'a.*' );
		$this->db->from("satuan_konversi a");
		//$this->db->join('inv_merek b', 'b.id = a.id_merek', 'left');		
		$this->db->where("a.id", $id);
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;

	}

	public function get_rute_mt(){
		$session_data = $this->session->userdata('logged_in');		
		//$id_cabang = $session_data['id_cabang'];
			
		$this->db->select ( "a.id, a.pool_pm, a.km_pool_pm, CONCAT(a.rute, ' | ' ,a.unit, ' | ' ,a.nama_customer) as nama" );
		$this->db->from("view_rute_customer a");
			
		// if($id_cabang!=0){
		//$this->db->where("a.id_cost_tol<>", "");
		//$this->db->where("a.loading<>", "");
		// }
	
		
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

	public function get_tipe_box(){

		//$tahun = date("Y");
		$this->db->select ( 'a.*' );
		$this->db->from("jenis_muatan a");

		//$this->db->where("a.periode", $tahun);
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

	public function get_area1(){

		//$tahun = date("Y");
		$this->db->select ( 'a.*' );
		$this->db->from("dist_area a");

		$this->db->where("a.is_loading", 1);
		$this->db->where("a.area_kecamatan<>", "");
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

	public function get_area2(){

		//$tahun = date("Y");
		$this->db->select ( 'a.*' );
		$this->db->from("dist_area a");

		$this->db->where("a.is_loading", 0);
		$this->db->where("a.area_kecamatan<>", "");
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

	public function get_loading_by_area1($param){
		extract($param);
		
		$this->db->select ( 'a.*' );
		// $this->db->select ( "a.id, CONCAT(a.no_bukti,' - ', a.tanggal) as title" );
		$this->db->from("dist_area a");
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
		$this->db->from("dist_area a");
		//$this->db->join('sls_nama_harga b', 'b.id = a.id_nama_harga', 'left');		
		// if($id!=""){
		$this->db->where("a.id", $id);
		//$this->db->where("a.status", 1);
		
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;

	}

	public function get_detail_dop($id){
		$this->db->select ( 'a.*' );
		$this->db->from("dist_rute_detail a");
		$this->db->where("a.id_rute_dist", $id);
		$query = $this->db->get();
		// debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

	public function get_detail_vendor($id){
		$this->db->select ( 'a.*' );
		$this->db->from("dist_rute_tarif_vendor_reff a");
		$this->db->where("a.id_rute", $id);
		$query = $this->db->get();
		// debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

	public function get_detail_customer($id){
		$this->db->select ( 'a.*' );
		$this->db->from("dist_rute_tarif_customer_reff a");
		$this->db->where("a.id_rute", $id);
		$query = $this->db->get();
		// debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

	public function get_detail_platform($id){
		$this->db->select ( 'a.*' );
		$this->db->from("dist_rute_tarif_platform_reff a");
		$this->db->where("a.id_rute", $id);
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

	public function simpan_data_detail_vendor($data, &$id = ""){
		$result = 0;
		
		$result = $this->db->insert("dist_rute_tarif_vendor_Reff", $data);
		$id = $this->db->insert_id();
	
		return $result;
	}

	public function simpan_data_detail_dop($data, &$id = ""){
		$result = 0;
		
		$result = $this->db->insert("dist_rute_detail", $data);
		$id = $this->db->insert_id();
	
		return $result;
	}

	public function reset_data_dop($id){
		$this->db->where('id_rute_dist', $id);
        $result = $this->db->delete("dist_rute_detail");
				
		return $result;
	}
	
	public function reset_data_vendor($id){
		$this->db->where('id_rute', $id);
        $result = $this->db->delete("dist_rute_tarif_vendor_Reff");
				
		return $result;
	}

	public function simpan_data_detail_customer($data, &$id = ""){
		$result = 0;
		
		$result = $this->db->insert("dist_rute_tarif_customer_Reff", $data);
		$id = $this->db->insert_id();
	
		return $result;
	}
	
	public function reset_data_customer($id){
		$this->db->where('id_rute', $id);
        $result = $this->db->delete("dist_rute_tarif_customer_Reff");
				
		return $result;
	}

	public function simpan_data_detail_platform($data, &$id = ""){
		$result = 0;
		
		$result = $this->db->insert("dist_rute_tarif_platform_Reff", $data);
		$id = $this->db->insert_id();
	
		return $result;
	}
	
	public function reset_data_platform($id){
		$this->db->where('id_rute', $id);
        $result = $this->db->delete("dist_rute_tarif_platform_Reff");
				
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
