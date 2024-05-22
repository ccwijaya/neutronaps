<?php
class M_produk_jasa extends CI_Model {
	private $main_table = "produk_jasa";
	
	public function get_data($id=""){
		$session_data = $this->session->userdata('logged_in');		
		//$id_cabang = $session_data['id_cabang'];
		//$id_sales = $session_data['id_sales'];
		//$is_cat_customer = $session_data['is_cat_customer'];	

		$this->db->select ( 'a.*' );
		$this->db->from($this->main_table . " a");
		//$this->db->join('sales b', 'a.id_sales = b.id', 'left');
		//$this->db->join('cabang c', 'a.id_cabang = c.id', 'left');
		// $this->db->join('proyek z', 'z.id = b.id_proyek', 'left');		
		if($id!=""){
			$this->db->where("a.id", $id);
		}

		// if($id_cabang!=0){
		// 	$this->db->where("a.id_cabang", $id_cabang);
		// }

		// if($is_cat_customer == 1){
		// 	$this->db->where("a.kategori_cust", "EXT");
		// }

		// if($is_cat_customer == 2){
		// 	$this->db->where("a.kategori_cust", "INT");
		// }

		// $session_data = $this->session->userdata('logged_in');
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

	// public function get_sales(){

	// 	//$tahun = date("Y");
	// 	$this->db->select ( 'a.*' );
	// 	$this->db->from("sales a");

	// 	//$this->db->where("a.periode", $tahun);
	// 	$query = $this->db->get();
	// 	//debug($this->db->last_query());
	// 	$result = $query->result_array();	

	// 	return $result;
	// }

	// public function get_cabang(){
		
	// 	$this->db->select ( 'a.*' );
    //     $this->db->from("cabang a");
	// 	// if($id!=""){
	// 		// $this->db->where("a.id", $id);
	// 	// }
	// 	$this->db->order_by('a.nama_cabang', 'ASC');
    //     $query = $this->db->get();
    //     // debug($this->db->last_query());
    //     $result = $query->result_array();	
    
    //     return $result;
		
	// }

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
