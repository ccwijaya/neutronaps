<?php
class M_sls_ba extends CI_Model {
	private $main_table = "sls_ba";
	
	public function get_data($id=""){
		$session_data = $this->session->userdata('logged_in');		
		$id_cabang = $session_data['id_cabang'];
		$is_cat_customer = $session_data['is_cat_customer'];
		
		$this->db->select ( 'a.*, b.nama_cabang, c.nama_customer, c.alamat, c.pic, c.kota, c.kode_pos, d.nama_sales, f.nama_user, g.nama_produk');
		$this->db->from($this->main_table . " a");
		$this->db->join('cabang b', 'a.id_cabang = b.id', 'left');
		$this->db->join('customer c', 'a.id_customer = c.id', 'left');
		$this->db->join('sales d', 'a.nama_sales = d.nama_sales', 'left');
		$this->db->join('web_user f', 'a.create_user = f.id', 'left');
		$this->db->join('produk_jasa g', 'a.id_produk_jasa = g.id', 'left');
		
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
	
	public function get_detail_rr($id){
		$this->db->select ( "a.*" );
		$this->db->from("sls_ba_detail a");
		//$this->db->join('view_rute_rr b', 'a.id_rute = b.id', 'left');
		$this->db->where("a.id_ba", $id);
		//$this->db->group_by("b.id_rute");
		
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

	public function get_detail($id){
		$this->db->select ( 'a.*, e.nama_user, e.ttd, b.nama_approved, b.ttd_approved, g.nama_customer' );
		$this->db->from("sls_ba_detail a");
		$this->db->join('sls_ba b', 'a.id_po_customer = b.id', 'left');
		
		$this->db->join('web_user e', 'e.id = b.create_user', 'left');
		
		
		$this->db->join('customer g', 'b.id_customer = g.id', 'left');
		$this->db->where("a.id_ba", $id);
		//$this->db->group_by("c.id", $id);
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

	public function get_detail_print($id){
		$this->db->select ( 'a.*, c.nama_jasa, e.nama_user, e.jabatan, g.nama_customer, h.nama_sales, h.keterangan' );
		$this->db->from("sls_ba_detail a");
		$this->db->join('sls_ba b', 'a.id_ba = b.id', 'left');
		$this->db->join('produk_jasa_detail c', 'a.id_produk_jasa_detail = c.id', 'left');
		$this->db->join('web_user e', 'e.id = b.create_user', 'left');
		//$this->db->join('view_kategori_kirim d', 'a.id_kategori_kirim = d.id', 'left');
		//$this->db->join('moda f', 'c.id_moda = f.id', 'left');
		$this->db->join('customer g', 'b.id_customer = g.id', 'left');
		$this->db->join('sales h', 'h.nama_sales = b.nama_sales', 'left');
	
		//$this->db->where("a.status_koreksi",1);
		$this->db->where("a.id_ba", $id);
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

	public function get_po_customer(){
		$session_data = $this->session->userdata('logged_in');		
		$id_cabang = $session_data['id_cabang'];
			
		$this->db->select ( 'a.*' );
		$this->db->from("sls_po_customer a");
			
		// if($id_cabang!=0){
		// 	$this->db->where("a.id", $id_cabang);
		// }

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

	

	public function get_po_detail_by_id($param){
		extract($param);
		
		$this->db->select ( 'a.*, b.id_produk_jasa_detail as id_produk_detail, d.nama_produk, e.nama_jasa, b.harga, c.nama_sales' );
		$this->db->from("sls_po_customer a");
		$this->db->join('sls_po_customer_detail b', 'b.id_po_customer = a.id', 'left');	
		$this->db->join('sales c', 'c.nama_sales = a.nama_sales', 'left');	
		$this->db->join('produk_jasa d', 'd.id = a.id_produk_jasa', 'left');	
		$this->db->join('produk_jasa_detail e', 'e.id = b.id_produk_jasa_detail', 'left');			
		// if($id!=""){
		$this->db->where("a.id", $id);
		//$this->db->where("a.status", 1);
		
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;

	}

	public function get_produk_jasa_detail_by_id($param){
		extract($param);
		
		$this->db->select ( 'a.id_produk_jasa_detail, b.nama_jasa, a.harga as harga_jasa' );
		$this->db->from("sls_po_customer_detail a");
		$this->db->join('produk_jasa_detail b', 'b.id = a.id_produk_jasa_detail', 'left');			
		// if($id!=""){
		$this->db->where("b.id", $id);
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
		
		$result = $this->db->insert("sls_ba_detail", $data);
		$id = $this->db->insert_id();
	
		return $result;
	}
	
	public function reset_data($id){
		$this->db->where('id_ba', $id);
        $result = $this->db->delete("sls_ba_detail");
				
		return $result;
	}
	
	public function delete_data($id){
		$this->db->where('id', $id);
        $result = $this->db->delete($this->main_table);
				
		return $result;
    }
}
