<?php
class M_component extends CI_Model {
	private $main_table = "hr_karyawan";
	
	public function get_data($id=""){
		//$session_data = $this->session->userdata('logged_in');		
		//$id_cabang = $session_data['id_cabang'];
		
		$this->db->select ( 'a.*' );
		$this->db->from($this->main_table . " a");
		//$this->db->join('sls_pelanggan b', 'a.id_customer = b.id', 'left');
		//$this->db->join('inv_inq c', 'c.id_sales_tech = a.id', 'left');
		//$this->db->join('sls_salesman c', 'c.id = a.id_salesman', 'left');
		//$this->db->join('sls_tipe_bayar d', 'd.id = a.id_tipe_bayar', 'left');			
		// if($id!=""){
		// 	$this->db->where("a.id", $id);
		// }
		// if($id_cabang!=0){
		// 	$this->db->where("a.id_cabang", $id_cabang);
		// }

		//$session_data = $this->session->userdata('logged_in');
		//if($session_data['id_level']<2){
			//$this->db->where("a.create_user", $session_data['id']);
		//}
		
		// $this->db->where("a.is_active", 1);
		// $this->db->group_by('a.id');		$this->db->order_by('a.id', 'DESC');
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;

	}

	public function get_data_ultah($id=""){
		//$session_data = $this->session->userdata('logged_in');		
		//$id_cabang = $session_data['id_cabang'];
		
		$this->db->select ( 'a.*' );
		$this->db->from('hr_karyawan a');
		//$this->db->join('sls_pelanggan b', 'a.id_customer = b.id', 'left');
		//$this->db->join('inv_inq c', 'c.id_sales_tech = a.id', 'left');
		//$this->db->join('sls_salesman c', 'c.id = a.id_salesman', 'left');
		//$this->db->join('sls_tipe_bayar d', 'd.id = a.id_tipe_bayar', 'left');			
		//if($id!=""){
			//$this->db->where("a.id", $id);
		//}
		// if($id_cabang!=0){
		// 	$this->db->where("a.id_cabang", $id_cabang);
		// }

		//$session_data = $this->session->userdata('logged_in');
		//if($session_data['id_level']<2){
			//$this->db->where("a.create_user", $session_data['id']);
		//}
		
		// $this->db->where("a.is_active", 1);
		// $this->db->group_by('a.id');		$this->db->order_by('a.id', 'DESC');
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;

	}

	public function get_notif_report($id=""){
		$session_data = $this->session->userdata('logged_in');		
		$id_cabang = $session_data['id_cabang'];
		
		$this->db->select ( 'a.*, sum(a.is_notif_cs) as notif' );
		$this->db->from('sls_sales_visit_report a');
		//$this->db->join('sls_pelanggan b', 'a.id_customer = b.id', 'left');
		//$this->db->join('inv_inq c', 'c.id_sales_tech = a.id', 'left');		
		if($id!=""){
			$this->db->where("a.id", $id);
		}
		if($id_cabang!=0){
			$this->db->where("a.id_cabang", $id_cabang);
		}

		//$session_data = $this->session->userdata('logged_in');
		//if($session_data['id_level']<2){
			//$this->db->where("a.create_user", $session_data['id']);
		//}
		// if($id_proyek!=0){
		// $this->db->where("b.id_proyek", $id_proyek);
		// }
		// $this->db->where("a.is_active", 1);
		// $this->db->group_by('a.id');		$this->db->order_by('a.id', 'DESC');
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;

	}

	public function get_notif_approve_bom($id=""){
		$session_data = $this->session->userdata('logged_in');		
		//$id_cabang = $session_data['id_cabang'];
		
		$this->db->select ( 'b.no_customer, b.nama_customer, b.alamat, b.kota, b.kode_pos, a.no_bukti, sum(a.notif_approve_bom) as notif' );
		$this->db->from('sls_terjemahan_part a');
		$this->db->join('sls_pelanggan b', 'a.id_customer = b.id', 'left');
		//$this->db->join('sls_terjemahan_part c', 'c.id = a.id_translate', 'left');
		//$this->db->join('sls_tipe_bayar d', 'd.id = a.id_tipe_bayar', 'left');			
		if($id!=""){
			$this->db->where("a.id", $id);
		}
		//if($id_cabang!=0){
			//$this->db->where("a.id_cabang", $id_cabang);
		//}

		//$session_data = $this->session->userdata('logged_in');
		//if($session_data['id_level']<2){
			//$this->db->where("a.create_user", $session_data['id']);
		//}
		
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;

	}

	public function get_notif($id=""){
		$session_data = $this->session->userdata('logged_in');		
		$id_cabang = $session_data['id_cabang'];
		
		$this->db->select ( 'a.*, sum(a.notif) as notif' );
		$this->db->from($this->main_table . " a");
		$this->db->join('sls_pelanggan b', 'a.id_customer = b.id', 'left');
		$this->db->join('inv_inq c', 'c.id_sales_tech = a.id', 'left');		
		if($id!=""){
			$this->db->where("a.id", $id);
		}
		if($id_cabang!=0){
			$this->db->where("a.id_cabang", $id_cabang);
		}

		//$session_data = $this->session->userdata('logged_in');
		//if($session_data['id_level']<2){
			//$this->db->where("a.create_user", $session_data['id']);
		//}
		// if($id_proyek!=0){
		// $this->db->where("b.id_proyek", $id_proyek);
		// }
		// $this->db->where("a.is_active", 1);
		// $this->db->group_by('a.id');		$this->db->order_by('a.id', 'DESC');
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;

	}
	
	
	public function get_detail($id){
		$this->db->select ( 'a.*' );
		$this->db->from("sls_terjemahan_part_detail a");
		$this->db->where("a.id_terjemahan_part", $id);
		$query = $this->db->get();
		// debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

	public function get_qty_inq_by_inq_part_terjemahan($param){
		extract($param);
		
		$this->db->select ( 'a.*, a.qty' );
		$this->db->from("sls_terjemahan_part_detail a");
		//$this->db->join('inv_merek b', 'b.id = a.id_merek', 'left');		
		$this->db->where("a.inq_product", $id);
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;

	}


	public function duplicate_sls_terjemahan_part($id){
		
		$sql = "INSERT INTO sls_terjemahan_part (id_cabang, id_customer, id_inq, no_bukti, no_inq, tanggal, tgl_inq, keterangan, is_auto, id_original) SELECT id_cabang, id_customer, id_inq, no_bukti, no_inq, tanggal, tgl_inq, keterangan, is_auto, ".$id." FROM sls_terjemahan_part WHERE id=" . $id;

		$query = $this->db->query($sql);  
		// debug($this->db->last_query());
		// $result = $query->result_array();
		
		return $this->db->insert_id();

		// return $result;
	}
	
	public function duplicate_sls_terjemahan_part_detail($id, $id_new){
		
		$sql = "INSERT INTO sls_terjemahan_part_detail (id_terjemahan_part, inq_product, inq_desc, brand, uom, qty, ket_inq, type_part) SELECT ".$id_new.", inq_product, inq_desc, brand, uom, qty, ket_inq, type_part FROM sls_terjemahan_part_detail WHERE id_terjemahan_part=" . $id;

		$query = $this->db->query($sql);  
		// debug($this->db->last_query());
		// $result = $query->result_array();
		return $this->db->insert_id();
		// return $result;
	}
	
	public function duplicate_sls_terjemahan_part_detail_detail($id, $id_new){
		
		$sql = "INSERT INTO sls_terjemahan_part_detail_detail (id_sls_inq_part, id_product, inq_part_terjemahan, inq_desc_terjemahan, brand_terjemahan, uom_terjemahan, qty_terjemahan, ket_inq_terjemahan, type_part_terjemahan) SELECT ".$id_new.", id_product, inq_part_terjemahan, inq_desc_terjemahan, brand_terjemahan, uom_terjemahan, qty_terjemahan, ket_inq_terjemahan, type_part_terjemahan FROM sls_terjemahan_part_detail_detail WHERE id_sls_inq_part=" . $id;

		$query = $this->db->query($sql);  
		// debug($this->db->last_query());
		// $result = $query->result_array();
		return $this->db->insert_id();
		// return $result;
	}

	public function get_detail_terjemahan($id){
		$this->db->select ( 'a.*' );
		$this->db->from("sls_terjemahan_part_detail_detail a");
		$this->db->where("a.id_terjemahan_part", $id);
		$query = $this->db->get();
		// debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}
	
	public function get_merek(){
		
		$this->db->select ( 'a.*' );
        $this->db->from("inv_merek a");
		// if($id!=""){
			// $this->db->where("a.id", $id);
		// }
		$this->db->order_by('a.nama_merek', 'ASC');
        $query = $this->db->get();
        // debug($this->db->last_query());
        $result = $query->result_array();	
    
        return $result;
		
	}

	public function get_detail_jasa($id){
		$this->db->select ( 'a.*' );
		$this->db->from("sls_quotation_jasa a");
		$this->db->where("a.id_quotation", $id);
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

	public function get_salesman(){
		$this->db->select ( 'a.*' );
		$this->db->from("sls_salesman a");
		$query = $this->db->get();
		// debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

	public function get_matauang(){
		$this->db->select ( 'a.*' );
		$this->db->from("gl_matauang a");
		$query = $this->db->get();
		// debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

	public function get_customer(){
		$session_data = $this->session->userdata('logged_in');		
		$id_cabang = $session_data['id_cabang'];
		
		$this->db->select ( 'a.*' );
		$this->db->from("sls_pelanggan a");
		$this->db->where("a.status","1");
		
		if($id_cabang!=0){
			$this->db->where("a.id_cabang", $id_cabang);
		}
		$query = $this->db->get();
		// debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}
	public function get_product(){
		$this->db->select ( "a.id, CONCAT(a.kode_barang,' - ', a.nama_part) as nama" );
		$this->db->from("inv_persediaan a");
		$query = $this->db->get();
		// debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}
	public function get_satuan(){
		$this->db->select ( "a.id, a.nama_satuan as nama" );
		$this->db->from("inv_satuan a");
		$query = $this->db->get();
		// debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}
	public function get_inq_part($id_terjemahan_part){
		$this->db->select ( "a.id, CONCAT(a.kode_barang,' - ', a.nama_part) as nama" );
		$this->db->from("inv_persediaan a");
		$this->db->join('sls_terjemahan_part_detail b', 'a.id = b.inq_product', '');
		$this->db->where("b.id_terjemahan_part", $id_terjemahan_part);
		$query = $this->db->get();
		// debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}
	
	public function get_pelanggan_by_id($param){
		extract($param);
		
		$this->db->select ( 'a.*, b.nama_harga' );
		// $this->db->select ( "a.id, CONCAT(a.no_bukti,' - ', a.tanggal) as title" );
		$this->db->from("sls_pelanggan a");
		$this->db->join('sls_nama_harga b', 'b.id = a.id_nama_harga', 'left');		
		// if($id!=""){
		$this->db->where("a.id", $id);
		
		$query = $this->db->get();
		// debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;

	}
	
	public function get_product_by_id($param){
		extract($param);
		
		$this->db->select ( 'a.*, b.nama_merek' );
		$this->db->from("inv_persediaan a");
		$this->db->join('inv_merek b', 'b.id = a.id_merek', 'left');		
		$this->db->where("a.id", $id);
		$query = $this->db->get();
		// debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;

	}
	
	
	public function get_satuan_by_id_product($param){
		extract($param);
		
		$this->db->distinct();
		$this->db->select("a.id, a.nama_satuan,a.deskripsi");
		$this->db->from("inv_satuan a");
		$this->db->join('inv_persediaan_satuan b', 'a.id = b.satuan_konv', '');		
		$this->db->where("b.id_persediaan", $id);
		$query = $this->db->get();
		// debug($this->db->last_query());
		$result = $query->result_array();	

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
	
	public function simpan_data_detail($data, &$id = ""){
		$result = 0;
		
		$result = $this->db->insert("sls_terjemahan_part_detail", $data);
		$id = $this->db->insert_id();
	
		return $result;
	}
	
	public function simpan_data_terjemahan($data, &$id = ""){
		$result = 0;
		
		$result = $this->db->insert("sls_terjemahan_part_detail_detail", $data);
		$id = $this->db->insert_id();
	
		return $result;
    }
	
	//public function simpan_data_jasa($data, &$id = ""){
		//$result = 0;
		
		//$result = $this->db->insert("sls_quotation_jasa", $data);
		//$id = $this->db->insert_id();
	
		//return $result;
    //}
	
	public function reset_data($id){
		$this->db->where('id_terjemahan_part', $id);
        $result = $this->db->delete("sls_terjemahan_part_detail");
				
		return $result;
	}
	
	public function reset_data_terjemahan($id){
		$this->db->where('id_terjemahan_part', $id);
        $result = $this->db->delete("sls_terjemahan_part_detail_detail");
				
		return $result;
    }
	
	public function simpan_product($data, &$id = ""){
		$result = 0;
		
		$result = $this->db->insert("inv_persediaan", $data);
		$id = $this->db->insert_id();
	
		return $result;
	}
	
	//public function reset_data_jasa($id){
		//$this->db->where('id_quotation', $id);
        //$result = $this->db->delete("sls_quotation_jasa");
				
		//return $result;
    //}
	
	public function delete_data($id){
		$this->db->where('id', $id);
        $result = $this->db->delete($this->main_table);
				
		return $result;
    }
}