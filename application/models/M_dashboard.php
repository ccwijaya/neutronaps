<?php
class M_dashboard extends CI_Model {
	
	public function get_total_unit(){
		// extract($param);
			
		$session_data = $this->session->userdata('logged_in');		
		$user_id = $session_data['id'];
		$id_proyek = $session_data['id_proyek'];
		
		
		$this->db->select ( 'count(a.id) as total' );
        $this->db->from("unit a");
		$this->db->join('web_user b', 'a.create_user = b.id', 'left');
		// $this->db->join('unit_kategori b', 'a.id_kategori = b.id', 'left');
		
		if($id_proyek!=0){
			$this->db->where("b.id_proyek", $id_proyek);
		}

		$session_data = $this->session->userdata('logged_in');
		if($session_data['id_level']<2){
			$this->db->where("a.create_user", $session_data['id']);
		}
		// $this->db->where("a.is_active", 1);
		$this->db->order_by('a.id', 'DESC');
        $query = $this->db->get();
        // debug($this->db->last_query());
        $result = $query->result_array();	
    
        return $result;
		
	}

	public function get_ots_po_vendor($id=""){
		$session_data = $this->session->userdata('logged_in');		
		//$id_cabang = $session_data['id_cabang'];
		
		$this->db->select ( "a.total_po, a.total_ots_po, (a.total_po - a.total_ots_po) as total_po_close" );
		$this->db->from("view_summary_ots_po_vendor a");
			
		//$this->db->where("a.id");
		//if($id!=""){
			//$this->db->where("a.id", $id);
		//}
		//if($id_cabang!=0){
			//$this->db->where("a.id_cabang", $id_cabang);
		//}
		
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;

	}

	// public function get_ots_so($id=""){
	// 	$session_data = $this->session->userdata('logged_in');		
	// 	//$id_cabang = $session_data['id_cabang'];
		
	// 	$this->db->select ( "a.total_so, a.total_ots_so, (a.total_so - a.total_ots_so) as total_so_close" );
	// 	$this->db->from("view_summary_ots_so a");
			
	// 	//$this->db->where("a.id");
	// 	//if($id!=""){
	// 		//$this->db->where("a.id", $id);
	// 	//}
	// 	//if($id_cabang!=0){
	// 		//$this->db->where("a.id_cabang", $id_cabang);
	// 	//}
		
	// 	$query = $this->db->get();
	// 	//debug($this->db->last_query());
	// 	$result = $query->result_array();	

	// 	return $result;

	// }

	public function get_ots_inq($id=""){
		$session_data = $this->session->userdata('logged_in');		
		//$id_cabang = $session_data['id_cabang'];
		
		$this->db->select ( "a.total_ots_inq" );
		$this->db->from("view_summary_ots_inq a");
			
		//$this->db->where("a.id");
		//if($id!=""){
			//$this->db->where("a.id", $id);
		//}
		//if($id_cabang!=0){
			//$this->db->where("a.id_cabang", $id_cabang);
		//}
		
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
		//if($id_cabang!=0){
			//$this->db->where("a.id_cabang", $id_cabang);
		//}

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

	public function get_notif_report_eng($id=""){
		$session_data = $this->session->userdata('logged_in');		
		$id_cabang = $session_data['id_cabang'];
		
		$this->db->select ( 'a.*, sum(a.is_notif_eng) as notif' );
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

	public function get_notif_report_inv($id=""){
		$session_data = $this->session->userdata('logged_in');		
		$id_cabang = $session_data['id_cabang'];
		
		$this->db->select ( 'a.*, sum(a.is_notif_inv) as notif' );
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

	public function get_notif_po_intrnl($id=""){
	
		
		$this->db->select ( 'a.*, IFNULL(SUM(a.notif_intrnl),0) - IFNULL(SUM(b.notif_done_intrnl),0) as notif' );
		$this->db->from('inv_pembelian a');
		$this->db->join('sls_po_customer b', 'b.id_po_internal = a.id', 'left');
			
		if($id!=""){
			$this->db->where("a.id", $id);
		}
		$this->db->where("a.id_cabang_tjn", 1);
	
		$query = $this->db->get();
	//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;

	}
	public function get_notif_po_central($id=""){
		//$session_data = $this->session->userdata('logged_in');		
		//$id_cabang = $session_data['id_cabang'];
		
		$this->db->select ( 'a.*, sum(a.notif_central) as notif' );
		$this->db->from("inv_pembelian a");
			
		//$this->db->where("a.id");
		if($id!=""){
			$this->db->where("a.id", $id);
		}
		//if($id_cabang!=0){
			//$this->db->where("a.id_cabang", $id_cabang);
		//}
		
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;

	}
	
	public function get_notif_so_brc($id=""){
		$session_data = $this->session->userdata('logged_in');		
		$id_cabang = $session_data['id_cabang'];
		
		$this->db->select ( 'a.*, sum(a.notif_cbg) as notif' );
		$this->db->from("sls_po_customer a");
		$this->db->join('inv_pembelian x', 'x.id_po_customer = a.id', 'left');
		$this->db->join('inv_po_import y', 'y.id_po_customer = a.id', 'left');
		//$this->db->join('sls_pelanggan b', 'a.id_customer = b.id', 'left');
		// $this->db->join('sls_terjemahan_part c', 'c.id = a.id_translate', 'left');
		// $this->db->join('sls_terjemahan_part c', 'c.id = a.id_translate', 'left');
		//$this->db->join('sls_tipe_bayar d', 'd.id = a.id_tipe_bayar', 'left');			
		$this->db->where("x.id_po_customer IS NULL");
		$this->db->where("y.id_po_customer IS NULL");
		if($id!=""){
			$this->db->where("a.id IS NULL", $id);
		}
		if($id_cabang!=0){
			$this->db->where("a.id_cabang", $id_cabang);
		}
		
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;

	}

	public function get_notif_po_cbg_brc($id=""){
	
		
		$this->db->select ( 'a.*, IFNULL(SUM(a.notif_cbg_brc),0) - IFNULL(SUM(b.notif_done_cbg_brc),0) as notif' );
		$this->db->from('inv_pembelian a');
		$this->db->join('sls_po_customer b', 'b.id_po_cabang = a.id', 'left');
			
		if($id!=""){
			$this->db->where("a.id", $id);
		}
	
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;

	}
	
	public function get_total_unit_proses(){
		// extract($param);
			
		$session_data = $this->session->userdata('logged_in');		
		$user_id = $session_data['id'];
		$id_proyek = $session_data['id_proyek'];
		
		
		$this->db->select ( 'count(a.id) as total' );
        $this->db->from("unit a");
		$this->db->join('web_user b', 'a.create_user = b.id', 'left');
		// $this->db->join('unit_kategori b', 'a.id_kategori = b.id', 'left');
		$this->db->where("a.status_unit", 1);
		
		if($id_proyek!=0){
			$this->db->where("b.id_proyek", $id_proyek);
		}
		// $this->db->where("a.is_active", 1);
		$this->db->order_by('a.id', 'DESC');
        $query = $this->db->get();
        // debug($this->db->last_query());
        $result = $query->result_array();	
    
        return $result;
		
	}
	
	public function get_notif_campaign($id=""){
		$session_data = $this->session->userdata('logged_in');		
		$id_cabang = $session_data['id_cabang'];
		
		$this->db->select ( 'a.*, sum(a.notif_campaign) as notif' );
		$this->db->from("sls_quotation a");
			
		//$this->db->where("a.id");
		if($id!=""){
			$this->db->where("a.id", $id);
		}
		if($id_cabang!=0){
			$this->db->where("a.id_cabang", $id_cabang);
		}
		
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;

	}

	public function get_notif_eng($id=""){
		$session_data = $this->session->userdata('logged_in');		
		$id_cabang = $session_data['id_cabang'];
		
		$this->db->select ( 'a.*, sum(a.notif_eng) as notif' );
		$this->db->from('sls_terjemahan_part a');
		$this->db->join('sls_pelanggan b', 'a.id_customer = b.id', 'left');
		$this->db->join('inv_inq c', 'c.id_sales_tech = a.id', 'left');		
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

	public function get_notif_hc($id=""){
		//$session_data = $this->session->userdata('logged_in');		
		//$id_cabang = $session_data['id_cabang'];
		
		$this->db->select ( 'a.*, sum(a.notif_hc) as notif' );
		$this->db->from("sls_quotation a");
			
		//$this->db->where("a.id");
		if($id!=""){
			$this->db->where("a.id", $id);
		}
		//if($id_cabang!=0){
			//$this->db->where("a.id_cabang", $id_cabang);
		//}
		
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;

	}
	
	public function get_total_sertifikat(){
		// extract($param);
			
		$session_data = $this->session->userdata('logged_in');		
		$user_id = $session_data['id'];
		$id_proyek = $session_data['id_proyek'];
		
		
		$this->db->select ( 'count(a.id) as total' );
        $this->db->from("unit a");
		$this->db->join('web_user b', 'a.create_user = b.id', 'left');
		// $this->db->join('unit_kategori b', 'a.id_kategori = b.id', 'left');
		
		if($id_proyek!=0){
			$this->db->where("b.id_proyek", $id_proyek);
		}
		$this->db->where("a.nomor_sertifikat<>''");
		$this->db->order_by('a.id', 'DESC');
        $query = $this->db->get();
        // debug($this->db->last_query());
        $result = $query->result_array();	
    
        return $result;
		
    }
	
	public function get_total_roya(){
		// extract($param);
			
		$session_data = $this->session->userdata('logged_in');		
		$user_id = $session_data['id'];
		$id_proyek = $session_data['id_proyek'];
		
		$this->db->select ( 'count(a.id) as total' );
        $this->db->from("unit a");
		$this->db->join('web_user b', 'a.create_user = b.id', 'left');
		// $this->db->join('unit_kategori b', 'a.id_kategori = b.id', 'left');
		
		if($id_proyek!=0){
			$this->db->where("b.id_proyek", $id_proyek);
		}
		$this->db->where("a.nomor_roya<>''");
		$this->db->order_by('a.id', 'DESC');
        $query = $this->db->get();
        // debug($this->db->last_query());
        $result = $query->result_array();	
    
        return $result;
		
    }
	
	public function get_total_ajb(){
		// extract($param);
			
		$session_data = $this->session->userdata('logged_in');		
		$user_id = $session_data['id'];
		$id_proyek = $session_data['id_proyek'];
		
		
		$this->db->select ( 'count(a.id) as total' );
        $this->db->from("unit a");
		$this->db->join('web_user b', 'a.create_user = b.id', 'left');
		// $this->db->join('unit_kategori b', 'a.id_kategori = b.id', 'left');
		
		if($id_proyek!=0){
			$this->db->where("b.id_proyek", $id_proyek);
		}
		$this->db->where("a.nomor_ajb<>''");
		$this->db->order_by('a.id', 'DESC');
        $query = $this->db->get();
        // debug($this->db->last_query());
        $result = $query->result_array();	
    
        return $result;
		
    }
	
	public function get_total_harga_jual(){
		// extract($param);
			
		$session_data = $this->session->userdata('logged_in');		
		$user_id = $session_data['id'];
		$id_proyek = $session_data['id_proyek'];
		
		
		$this->db->select ( 'sum(a.harga_jual) as total' );
        $this->db->from("unit a");
		$this->db->join('web_user b', 'a.create_user = b.id', 'left');
		// $this->db->join('unit_kategori b', 'a.id_kategori = b.id', 'left');
		
		if($id_proyek!=0){
			$this->db->where("b.id_proyek", $id_proyek);
		}
		// $this->db->where("a.nomor_ajb<>''");
		$this->db->order_by('a.id', 'DESC');
        $query = $this->db->get();
        // debug($this->db->last_query());
        $result = $query->result_array();	
    
        return $result;
		
    }
	public function get_total_tahap(){
		// extract($param);
			
		$session_data = $this->session->userdata('logged_in');		
		$user_id = $session_data['id'];
		$id_proyek = $session_data['id_proyek'];
		
		$this->db->select ( 'sum(a.nominal) as total' );
        $this->db->from("unit_tahap a");
		$this->db->join('unit b', 'a.id_unit = b.id', 'left');
		$this->db->join('web_user c', 'b.create_user = c.id', 'left');
		// $this->db->join('unit_kategori b', 'a.id_kategori = b.id', 'left');
		
		if($id_proyek!=0){
			$this->db->where("c.id_proyek", $id_proyek);
		}
		// $this->db->where("a.nomor_ajb<>''");
		$this->db->order_by('a.id', 'DESC');
        $query = $this->db->get();
        // debug($this->db->last_query());
        $result = $query->result_array();	
    
        return $result;
		
    }
	public function get_total_tahap1(){
		// extract($param);
			
		$session_data = $this->session->userdata('logged_in');		
		$user_id = $session_data['id'];
		$id_proyek = $session_data['id_proyek'];
		
		$this->db->select ( 'sum(a.nominal) as total' );
        $this->db->from("unit_tahap a");
		$this->db->join('web_user b', 'a.create_user = b.id', 'left');
		// $this->db->join('unit_kategori b', 'a.id_kategori = b.id', 'left');
		
		if($id_proyek!=0){
			$this->db->where("b.id_proyek", $id_proyek);
		}			
		$this->db->where("a.tahap_ke", 1);
		// $this->db->where("a.nomor_ajb<>''");
		$this->db->order_by('a.id', 'DESC');
        $query = $this->db->get();
        // debug($this->db->last_query());
        $result = $query->result_array();	
    
        return $result;
		
    }
	public function get_total_tahap2(){
		// extract($param);
			
		$session_data = $this->session->userdata('logged_in');		
		$user_id = $session_data['id'];
		$id_proyek = $session_data['id_proyek'];
		
		$this->db->select ( 'sum(a.nominal) as total' );
        $this->db->from("unit_tahap a");
		$this->db->join('web_user b', 'a.create_user = b.id', 'left');
		// $this->db->join('unit_kategori b', 'a.id_kategori = b.id', 'left');
		
		if($id_proyek!=0){
			$this->db->where("b.id_proyek", $id_proyek);
		}		$this->db->where("a.tahap_ke", 2);
		// $this->db->where("a.nomor_ajb<>''");
		$this->db->order_by('a.id', 'DESC');
        $query = $this->db->get();
        // debug($this->db->last_query());
        $result = $query->result_array();	
    
        return $result;
		
    }
	
	public function get_total_tahap3(){
		// extract($param);
			
		$session_data = $this->session->userdata('logged_in');		
		$user_id = $session_data['id'];
		$id_proyek = $session_data['id_proyek'];
		
		
		$this->db->select ( 'sum(a.nominal) as total' );
        $this->db->from("unit_tahap a");
		$this->db->join('web_user b', 'a.create_user = b.id', 'left');
		// $this->db->join('unit_kategori b', 'a.id_kategori = b.id', 'left');
		
		if($id_proyek!=0){
			$this->db->where("b.id_proyek", $id_proyek);
		}		$this->db->where("a.tahap_ke", 3);
		// $this->db->where("a.nomor_ajb<>''");
		$this->db->order_by('a.id', 'DESC');
        $query = $this->db->get();
        // debug($this->db->last_query());
        $result = $query->result_array();	
    
        return $result;
		
    }
	
	public function get_total_tahap4(){
		// extract($param);
			
		$session_data = $this->session->userdata('logged_in');		
		$user_id = $session_data['id'];
		$id_proyek = $session_data['id_proyek'];
		
		$this->db->select ( 'sum(a.nominal) as total' );
        $this->db->from("unit_tahap a");
		$this->db->join('web_user b', 'a.create_user = b.id', 'left');
		// $this->db->join('unit_kategori b', 'a.id_kategori = b.id', 'left');
		
		if($id_proyek!=0){
			$this->db->where("b.id_proyek", $id_proyek);
		}		$this->db->where("a.tahap_ke", 4);
		// $this->db->where("a.nomor_ajb<>''");
		$this->db->order_by('a.id', 'DESC');
        $query = $this->db->get();
        // debug($this->db->last_query());
        $result = $query->result_array();	
    
        return $result;
		
    }
	
	public function get_total_uang_muka(){
		// extract($param);
			
		$session_data = $this->session->userdata('logged_in');		
		$user_id = $session_data['id'];
		$id_proyek = $session_data['id_proyek'];
		
		$this->db->select ( 'sum(a.uang_muka) as total' );
        $this->db->from("unit_uang_muka a");
		$this->db->join('unit b', 'a.id_unit = b.id', 'left');
		$this->db->join('web_user c', 'b.create_user = c.id', 'left');
		// $this->db->join('unit_kategori b', 'a.id_kategori = b.id', 'left');
		
		if($id_proyek!=0){
			$this->db->where("c.id_proyek", $id_proyek);
		}
		// $this->db->where("a.nomor_ajb<>''");
		$this->db->order_by('a.id', 'DESC');
        $query = $this->db->get();
        // debug($this->db->last_query());
        $result = $query->result_array();	
    
        return $result;
		
    }
	
	
	public function get_surat_ke_pusat(){
		// extract($param);
			
		$session_data = $this->session->userdata('logged_in');		
		$user_id = $session_data['id'];
		$id_proyek = $session_data['id_proyek'];
		
		$this->db->distinct();
		$this->db->select('d.nama as nama_proyek, a.pusat_surat' );
        $this->db->from("unit_tahap a");
		$this->db->join('unit b', 'a.id_unit = b.id', 'left');
		$this->db->join('web_user c', 'b.create_user = c.id', 'left');
		$this->db->join('proyek d', 'c.id_proyek = d.id', 'left');
		$this->db->where("a.pusat_surat <> '' AND (konfirmasi_surat = '' OR konfirmasi_surat IS NULL)");
		
		if($id_proyek!=0){
			$this->db->where("c.id_proyek", $id_proyek);
		}
		// $this->db->where("a.nomor_ajb<>''");
		$this->db->order_by('a.id', 'DESC');
        $query = $this->db->get();
        // debug($this->db->last_query());
        $result = $query->result_array();	
    
        return $result;
		
    }
	public function get_konfirmasi(){
		// extract($param);
			
		$session_data = $this->session->userdata('logged_in');		
		$user_id = $session_data['id'];
		$id_proyek = $session_data['id_proyek'];
		
		$this->db->distinct();
		$this->db->select('d.nama as nama_proyek, a.konfirmasi_surat' );
        $this->db->from("unit_tahap a");
		$this->db->join('unit b', 'a.id_unit = b.id', 'left');
		$this->db->join('web_user c', 'b.create_user = c.id', 'left');
		$this->db->join('proyek d', 'c.id_proyek = d.id', 'left');
		$this->db->where("a.konfirmasi_surat <> '' AND (promise_surat = '' OR promise_surat IS NULL)");
		
		if($id_proyek!=0){
			$this->db->where("c.id_proyek", $id_proyek);
		}
		// $this->db->where("a.nomor_ajb<>''");
		$this->db->order_by('a.id', 'DESC');
        $query = $this->db->get();
        // debug($this->db->last_query());
        $result = $query->result_array();	
    
        return $result;
		
    }
	
	public function get_promise(){
		// extract($param);
			
		$session_data = $this->session->userdata('logged_in');		
		$user_id = $session_data['id'];
		$id_proyek = $session_data['id_proyek'];
		
		$this->db->distinct();
		$this->db->select('d.nama as nama_proyek, a.promise_surat' );
        $this->db->from("unit_tahap a");
		$this->db->join('unit b', 'a.id_unit = b.id', 'left');
		$this->db->join('web_user c', 'b.create_user = c.id', 'left');
		$this->db->join('proyek d', 'c.id_proyek = d.id', 'left');
		$this->db->where("a.promise_surat <> '' AND (nota_dinas_surat = '' OR nota_dinas_surat IS NULL)");
		
		if($id_proyek!=0){
			$this->db->where("c.id_proyek", $id_proyek);
		}
		// $this->db->where("a.nomor_ajb<>''");
		$this->db->order_by('a.id', 'DESC');
        $query = $this->db->get();
        // debug($this->db->last_query());
        $result = $query->result_array();	
    
        return $result;
		
    }
	
	public function get_unit_ndr(){
		// extract($param);
			
		$session_data = $this->session->userdata('logged_in');		
		$user_id = $session_data['id'];
		$id_proyek = $session_data['id_proyek'];
		
		$this->db->distinct();
		$this->db->select('d.nama as nama_proyek, a.nama, a.lantai' );
        $this->db->from("unit a");
		$this->db->join('web_user c', 'a.create_user = c.id', 'left');
		$this->db->join('proyek d', 'c.id_proyek = d.id', 'left');
		$this->db->where("a.status_unit", 1);
		$this->db->where("a.id NOT IN (SELECT id_unit FROM unit_tahap)");
		
		if($id_proyek!=0){
			$this->db->where("c.id_proyek", $id_proyek);
		}
		// $this->db->where("a.nomor_ajb<>''");
		$this->db->order_by('a.id', 'DESC');
        $query = $this->db->get();
        // debug($this->db->last_query());
        $result = $query->result_array();	
    
        return $result;
		
	}
	
	public function get_notif($id=""){
		$session_data = $this->session->userdata('logged_in');		
		$id_cabang = $session_data['id_cabang'];
		
		$this->db->select ( 'a.*, sum(a.notif) as notif, a.id_cabang, a.create_user' );
		$this->db->from('sls_terjemahan_part a');
		$this->db->join('sls_pelanggan b', 'a.id_customer = b.id', 'left');
		$this->db->join('inv_inq c', 'c.id_sales_tech = a.id', 'left');	
		$this->db->group_by('a.id_cabang');	
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

	public function get_notif_approve_cuti_gm($id=""){
		//$session_data = $this->session->userdata('logged_in');		
		//$id_cabang = $session_data['id_cabang'];
		
		$this->db->select ( 'a.*, sum(a.notif_to_gm) as notif' );
		$this->db->from("hr_pengajuan_cuti a");
			
		//$this->db->where("a.id");
		if($id!=""){
			$this->db->where("a.id", $id);
		}
		//if($id_cabang!=0){
			//$this->db->where("a.id_cabang", $id_cabang);
		//}
		
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;

	}

	public function get_notif_approve_izin_gm($id=""){
		//$session_data = $this->session->userdata('logged_in');		
		//$id_cabang = $session_data['id_cabang'];
		
		$this->db->select ( 'a.*, sum(a.notif_to_gm) as notif' );
		$this->db->from("hr_pengajuan_izin a");
			
		//$this->db->where("a.id");
		if($id!=""){
			$this->db->where("a.id", $id);
		}
		//if($id_cabang!=0){
			//$this->db->where("a.id_cabang", $id_cabang);
		//}
		
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;

	}

	public function get_notif_approve_izin_pers_gm($id=""){
		//$session_data = $this->session->userdata('logged_in');		
		//$id_cabang = $session_data['id_cabang'];
		
		$this->db->select ( 'a.*, sum(a.notif_to_gm) as notif' );
		$this->db->from("hr_pengajuan_izin a");
		$this->db->where("a.is_personal", 1);
			
		//$this->db->where("a.id");
		if($id!=""){
			$this->db->where("a.id", $id);
		}
		//if($id_cabang!=0){
			//$this->db->where("a.id_cabang", $id_cabang);
		//}
		
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;

	}

	public function get_notif_approve_field_break_gm($id=""){
		//$session_data = $this->session->userdata('logged_in');		
		//$id_cabang = $session_data['id_cabang'];
		
		$this->db->select ( 'a.*, sum(a.notif_to_gm) as notif' );
		$this->db->from("hr_pengajuan_field_break a");
			
		//$this->db->where("a.id");
		if($id!=""){
			$this->db->where("a.id", $id);
		}
		//if($id_cabang!=0){
			//$this->db->where("a.id_cabang", $id_cabang);
		//}
		
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;

	}

	public function get_notif_approve_tjg_gm($id=""){
		//$session_data = $this->session->userdata('logged_in');		
		//$id_cabang = $session_data['id_cabang'];
		
		$this->db->select ( 'a.*, sum(a.notif_to_gm) as notif' );
		$this->db->from("hr_pengajuan_tunjangan a");
			
		//$this->db->where("a.id");
		if($id!=""){
			$this->db->where("a.id", $id);
		}
		//if($id_cabang!=0){
			//$this->db->where("a.id_cabang", $id_cabang);
		//}
		
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;

	}
	
	public function get_notif_inv($id=""){
		$session_data = $this->session->userdata('logged_in');		
		$id_cabang = $session_data['id_cabang'];
		
		$this->db->select ( 'a.*, sum(a.notif_to_inv) as notif_to_inv' );
		$this->db->from("sls_terjemahan_part a");
		$this->db->join('inv_inq x', 'x.id_sales_tech = a.id', 'left');
		$this->db->join('sls_pelanggan b', 'a.id_customer = b.id', 'left');
		// $this->db->join('sls_terjemahan_part c', 'c.id = a.id_translate', 'left');
		// $this->db->join('sls_terjemahan_part c', 'c.id = a.id_translate', 'left');
		//$this->db->join('sls_tipe_bayar d', 'd.id = a.id_tipe_bayar', 'left');			
		$this->db->where("x.id_sales_tech IS NULL");
		if($id!=""){
			$this->db->where("a.id", $id);
		}
		if($id_cabang!=0){
			$this->db->where("a.id_cabang", $id_cabang);
		}
		
		$query = $this->db->get();
		// debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;

	}

	public function get_notif_quote_branch($id=""){
		$session_data = $this->session->userdata('logged_in');		
		$id_cabang = $session_data['id_cabang'];
		
		$this->db->select ( 'a.*' );
		$this->db->from('view_notif_quote_branch a');
	
		if($id!=""){
			$this->db->where("a.id", $id);
		}
		if($id_cabang!=0){
			$this->db->where("a.id_cabang", $id_cabang);
		}
	
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;

	}

	public function get_notif_quote_spot($id=""){
		$session_data = $this->session->userdata('logged_in');		
		$id_cabang = $session_data['id_cabang'];
		
		$this->db->select ( 'a.*' );
		$this->db->from('view_notif_quote_spot a');
	
		if($id!=""){
			$this->db->where("a.id", $id);
		}
		if($id_cabang!=0){
			$this->db->where("a.id_cabang", $id_cabang);
		}
	
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;

	}

	public function get_notif_quote_interco($id=""){
		$session_data = $this->session->userdata('logged_in');		
		$id_cabang = $session_data['id_cabang'];
		
		$this->db->select ( 'a.*' );
		$this->db->from('view_notif_quote_interco a');
	
		if($id!=""){
			$this->db->where("a.id", $id);
		}
		if($id_cabang!=0){
			$this->db->where("a.id_cabang", $id_cabang);
		}
	
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;

	}

	public function get_notif_quote_retail($id=""){
		$session_data = $this->session->userdata('logged_in');		
		$id_cabang = $session_data['id_cabang'];
		
		$this->db->select ( 'a.*' );
		$this->db->from('view_notif_quote_retail a');
	
		if($id!=""){
			$this->db->where("a.id", $id);
		}
		if($id_cabang!=0){
			$this->db->where("a.id_cabang", $id_cabang);
		}
	
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;

	}

	public function get_notif_po_local($id=""){
		$session_data = $this->session->userdata('logged_in');		
		$id_cabang = $session_data['id_cabang'];
		
		$this->db->select ( 'a.*, sum(a.notif) as notif' );
		$this->db->from("inv_pembelian a");
			
		//$this->db->where("a.id");
		if($id!=""){
			$this->db->where("a.id", $id);
		}
		if($id_cabang!=0){
			$this->db->where("a.id_cabang", $id_cabang);
		}
		
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;

	}

	public function get_notif_po_branch($id=""){
		$session_data = $this->session->userdata('logged_in');		
		$id_cabang = $session_data['id_cabang'];
		
		$this->db->select ( 'a.*, sum(a.notif_pst) as notif' );
		$this->db->from("inv_pembelian a");
			
		//$this->db->where("a.id");
		if($id!=""){
			$this->db->where("a.id", $id);
		}
		if($id_cabang!=0){
			$this->db->where("a.id_cabang", $id_cabang);
		}
		
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;

	}

	public function get_notif_po_import($id=""){
		$session_data = $this->session->userdata('logged_in');		
		$id_cabang = $session_data['id_cabang'];
		
		$this->db->select ( 'a.*, sum(a.notif_import) as notif' );
		$this->db->from("inv_pembelian a");
			
		//$this->db->where("a.id");
		if($id!=""){
			$this->db->where("a.id", $id);
		}
		if($id_cabang!=0){
			$this->db->where("a.id_cabang", $id_cabang);
		}
		
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;

	}

	public function get_notif_cust_crdt($id=""){
		$session_data = $this->session->userdata('logged_in');		
		$id_cabang = $session_data['id_cabang'];
		
		$this->db->select ( 'a.*, sum(a.notif) as notif' );
		$this->db->from("sls_pelanggan a");
			
		//$this->db->where("a.id");
		if($id!=""){
			$this->db->where("a.id", $id);
		}
		if($id_cabang!=0){
			$this->db->where("a.id_cabang", $id_cabang);
		}
		
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;

	}

	public function get_notif_so($id=""){
		$session_data = $this->session->userdata('logged_in');		
		$id_cabang = $session_data['id_cabang'];
		
		$this->db->select ( 'a.*, sum(a.notif) as notif' );
		$this->db->from("sls_po_customer a");
		$this->db->join('inv_pembelian x', 'x.id_po_customer = a.id', 'left');
		//$this->db->join('sls_pelanggan b', 'a.id_customer = b.id', 'left');
		// $this->db->join('sls_terjemahan_part c', 'c.id = a.id_translate', 'left');
		// $this->db->join('sls_terjemahan_part c', 'c.id = a.id_translate', 'left');
		//$this->db->join('sls_tipe_bayar d', 'd.id = a.id_tipe_bayar', 'left');			
		$this->db->where("x.id_po_customer IS NULL");
		if($id!=""){
			$this->db->where("a.id IS NULL", $id);
		}
		if($id_cabang!=0){
			$this->db->where("a.id_cabang", $id_cabang);
		}
		
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;

	}

	public function get_notif_inv_all($id=""){
		$session_data = $this->session->userdata('logged_in');		
		$id_cabang = $session_data['id_cabang'];
		
		$this->db->select ( 'a.*, (sum(a.notif_to_inv)+sum(a.notif_to_inv_branch)) AS notif_inv_all' );
		$this->db->from("sls_terjemahan_part a");
		$this->db->join('inv_inq x', 'x.id_sales_tech = a.id', 'left');
		$this->db->join('sls_pelanggan b', 'a.id_customer = b.id', 'left');
		// $this->db->join('sls_terjemahan_part c', 'c.id = a.id_translate', 'left');
		// $this->db->join('sls_terjemahan_part c', 'c.id = a.id_translate', 'left');
		//$this->db->join('sls_tipe_bayar d', 'd.id = a.id_tipe_bayar', 'left');			
		$this->db->where("x.id_sales_tech IS NULL");
		if($id!=""){
			$this->db->where("a.id", $id);
		}
		if($id_cabang!=0){
			$this->db->where("a.id_cabang", $id_cabang);
		}
		
		$query = $this->db->get();
		// debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;

	}

	public function get_notif_po_cbg($id=""){
		
		
		$this->db->select ( 'a.*, IFNULL(SUM(a.notif_cbg),0) - IFNULL(SUM(b.notif_done_cbg),0) as notif' );
		$this->db->from('inv_pembelian a');
		$this->db->join('sls_po_customer b', 'b.id_po_cabang = a.id', 'left');
		//$this->db->join('inv_inq c', 'c.id_sales_tech = a.id', 'left');		
		if($id!=""){
			$this->db->where("a.id", $id);
		}
		
	
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

	public function get_notif_all_approval($id=""){
		$session_data = $this->session->userdata('logged_in');		
		$id_cabang = $session_data['id_cabang'];
		
		$this->db->select ( 'sum(a.notif_all) AS notif_all' );
		$this->db->from("view_all_notif_approval a");
		//$this->db->where("a.is_auto", 1);
			
		//$this->db->where("a.id");
		if($id!=""){
			$this->db->where("a.id", $id);
		}
		//if($id_cabang!=0){
			//$this->db->where("a.id_cabang", $id_cabang);
		//}
		
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;

	}

	

	
	
	
}

