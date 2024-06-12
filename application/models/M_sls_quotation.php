<?php
class M_sls_quotation extends CI_Model {
	private $main_table = "sls_quotation";
	
	public function get_data($id=""){
		$session_data = $this->session->userdata('logged_in');		
		$id_cabang = $session_data['id_cabang'];
		$is_cat_customer = $session_data['is_cat_customer'];
		
		$this->db->select ( 'a.*, b.nama_cabang, c.nama_customer, c.alamat, c.kota, c.kode_pos, d.nama_sales, f.nama_user');
		$this->db->from($this->main_table . " a");
		$this->db->join('cabang b', 'a.id_cabang = b.id', 'left');
		$this->db->join('customer c', 'a.id_customer = c.id', 'left');
		$this->db->join('sales d', 'a.nama_sales = d.nama_sales', 'left');
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
		$this->db->select ( "a.*" );
		$this->db->from("sls_quotation_detail a");
		//$this->db->join('view_rute_rr b', 'a.id_rute = b.id', 'left');
		$this->db->where("a.id_rr", $id);
		//$this->db->group_by("b.id_rute");
		
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

	public function get_detail($id){
		$this->db->select ( 'a.*, e.nama_user, e.ttd, b.nama_approved, b.ttd_approved, g.nama_customer' );
		$this->db->from("sls_quotation_detail a");
		$this->db->join('sls_quotation b', 'a.id_rr = b.id', 'left');
		
		$this->db->join('web_user e', 'e.id = b.create_user', 'left');
		
		
		$this->db->join('customer g', 'b.id_customer = g.id', 'left');
		$this->db->where("a.id_rr", $id);
		$this->db->group_by("c.id", $id);
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

	public function get_detail_print($id){
		$this->db->select ( 'a.*, e.nama_user, e.jabatan, g.nama_customer, h.nama_sales, h.keterangan' );
		$this->db->from("sls_quotation_detail a");
		$this->db->join('sls_quotation b', 'a.id_quotation = b.id', 'left');
		//$this->db->join('view_rute c', 'a.id_rute = c.id', 'left');
		$this->db->join('web_user e', 'e.id = b.create_user', 'left');
		//$this->db->join('view_kategori_kirim d', 'a.id_kategori_kirim = d.id', 'left');
		//$this->db->join('moda f', 'c.id_moda = f.id', 'left');
		$this->db->join('customer g', 'b.id_customer = g.id', 'left');
		$this->db->join('sales h', 'h.nama_sales = b.nama_sales', 'left');
	
		//$this->db->where("a.status_koreksi",1);
		$this->db->where("a.id_quotation", $id);
		//$this->db->group_by("c.id", $id);
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

	public function get_produk_jasa(){
		//$session_data = $this->session->userdata('logged_in');		
			
		$this->db->select ( "a.*" );
		$this->db->from("produk_jasa a");
		
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

	

	

	public function get_produk_jasa_detail(){
		//$session_data = $this->session->userdata('logged_in');		
			
		$this->db->select ( "a.id, a.nama_jasa as nama" );
		$this->db->from("produk_jasa_detail a");
		
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

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
		$this->db->where('id_rr', $id);
        $result = $this->db->delete("sls_quotation_detail");
				
		return $result;
	}
	
	public function delete_data($id){
		$this->db->where('id', $id);
        $result = $this->db->delete($this->main_table);
				
		return $result;
    }
}
