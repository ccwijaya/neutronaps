<?php
class M_home extends CI_Model {

	public function get_data($id=""){
		$session_data = $this->session->userdata('logged_in');		
		
		$this->db->select ( 'e.id as id_vm, a.*, b.nama_cabang, c.nama_customer, c.alamat, c.kota, c.kode_pos, d.nama_sales');
		$this->db->from("profit_margin a");
		$this->db->join('cabang b', 'a.id_cabang = b.id', 'left');
		$this->db->join('customer c', 'a.id_customer = c.id', 'left');
		$this->db->join('sales d', 'a.id_sales = d.id', 'left');
		$this->db->join('vm_grouping_v e', 'a.id = e.id_re', 'left');
		$this->db->where("a.is_hold", 0);
		$this->db->where("a.id_customer<>", 183);
		$this->db->where("a.is_pairing", NULL);
		
		if($id!=""){
			$this->db->where("a.id", $id);
		}
		

		//$session_data = $this->session->userdata('logged_in');
		// if($session_data['id_level']<2){
		// 	$this->db->where("a.create_user", $session_data['id']);
		// }

		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;

	}
	
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

		// $session_data = $this->session->userdata('logged_in');
		// if($session_data['id_level']<2){
		// 	$this->db->where("a.create_user", $session_data['id']);
		// }
		// $this->db->where("a.is_active", 1);
		$this->db->order_by('a.id', 'DESC');
        $query = $this->db->get();
        // debug($this->db->last_query());
        $result = $query->result_array();	
    
        return $result;
		
	}

	public function get_paf_sb(){
		$session_data = $this->session->userdata('logged_in');		
		//$id_cabang = $session_data['id_cabang'];
		
		$this->db->select ( 'a.*, b.nama_customer' );
		$this->db->from("sls_paf a");
		$this->db->join('customer b', 'a.id_customer = b.id', 'left');
		//$this->db->where("a.is_hold_paf<>",0);
		//$this->db->where("a.status_ops", "SEND BACK" );
		//$this->db->where("(a.status_pai = 'SEND BACK' OR a.respons_cs<>'')");
		$this->db->where("(a.status_pai = 'SEND BACK' OR a.respons_cs<>'' AND a.status_pai<>'VERIFIED')");
		//$this->db->where("(a.no_bukti LIKE 'SJY%' OR a.no_bukti like 'SJH%' OR a.no_bukti like 'SJ2%')");
		
	
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;

	}

	public function get_rate_project(){
		$session_data = $this->session->userdata('logged_in');		
		//$id_cabang = $session_data['id_cabang'];
		
		$this->db->select ( 'a.*, sum(a.dir) as total_dir' );
		$this->db->from("view_detail_rate_project_post a");
		//$this->db->join('customer b', 'a.id_customer = b.id', 'left');
		$this->db->where("a.kategori_cust", 'EXT');
		$this->db->where("a.id_quote", NULL);
		$this->db->group_by('a.no_bukti');
		$this->db->order_by('a.tanggal', 'DESC');
		
		
	
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;

	}

	public function get_rate_project_detail($id){
		$session_data = $this->session->userdata('logged_in');		
		//$id_cabang = $session_data['id_cabang'];
		
		$this->db->select ( 'a.*, a.dir as total_dir' );
		$this->db->from("view_detail_rate_project_post a");
		//$this->db->join('customer b', 'a.id_customer = b.id', 'left');
		$this->db->where("a.kategori_cust", 'EXT');
		$this->db->where("a.id_quote", NULL);
		$this->db->where("a.id", $id);
		//$this->db->group_by('a.no_bukti');
		$this->db->order_by('a.tanggal', 'DESC');
		
		
	
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;

	}

	public function get_paf_progress(){
		$session_data = $this->session->userdata('logged_in');		
		//$id_cabang = $session_data['id_cabang'];
		
		$this->db->select ( 'a.*, b.nama_customer, c.id' );
		$this->db->from("sls_paf a");
		$this->db->join('customer b', 'a.id_customer = b.id', 'left');
		$this->db->join('pa_project_summary c', 'c.id_paf = a.id', 'left');
		
		$this->db->where("a.tanggal<>''");
		// $this->db->where("a.status_ops<>", "SEND BACK" );
		
	
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;

	}	
	
}

