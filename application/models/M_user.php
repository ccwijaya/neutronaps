<?php
class M_user extends CI_Model {

	private $table_master_name = "web_user";

	public function get_user($id=""){
		
		$this->db->select ( 'a.*, b.nama_cabang' );
        $this->db->from($this->table_master_name . " a");
		$this->db->join('cabang b', 'a.id_cabang = b.id', 'left');
		//$this->db->join('sls_terjemahan_part c', 'b.id = c.id_cabang', 'left');
		if($id!=""){
			$this->db->where("a.id", $id);
		}
		$this->db->where("a.is_active", 1);
		$this->db->order_by('a.nama_user', 'ASC');
        $query = $this->db->get();
        //debug($this->db->last_query());
		$result = $query->result_array();	
    
        return $result;
		
	}
	
	public function get_user_by_id($id){
		
		$this->db->select('a.*');
		$this->db->from('web_user a');
		//$this->db->join('web_access b', 'a.id=b.id_user', "left");
		$this->db->where('a.id', $id);
		
		$query = $this->db->get();
        
        $result = $query->result_array();
    
        return $result;
    }
	
	public function get_cabang(){
		
		$this->db->select ( 'a.*' );
        $this->db->from("cabang a");
		// if($id!=""){
			// $this->db->where("a.id", $id);
		// }
		$this->db->order_by('a.nama_cabang', 'ASC');
        $query = $this->db->get();
        // debug($this->db->last_query());
        $result = $query->result_array();	
    
        return $result;
		
	}

	public function get_karyawan(){
		
		$this->db->select ( 'a.*' );
        $this->db->from("hr_karyawan a");
		// if($id!=""){
			// $this->db->where("a.id", $id);
		// }
		$this->db->order_by('a.nik', 'ASC');
        $query = $this->db->get();
        // debug($this->db->last_query());
        $result = $query->result_array();	
    
        return $result;
		
	}
	
	public function get_level(){
		
		$this->db->select ( 'a.*' );
        $this->db->from("web_user_level a");
		// if($id!=""){
			// $this->db->where("a.id", $id);
		// }
		$this->db->order_by('a.id', 'ASC');
        $query = $this->db->get();
        // debug($this->db->last_query());
        $result = $query->result_array();	
    
        return $result;
		
	}
	
	public function get_menu_list_new(){
		
		$this->db->select ( 'a.*, b.id as ada' );
        $this->db->from("web_user_menu_list a");
		$this->db->join('web_user_menu b', 'b.id_menu = a.id and b.id_user', 'left');
		//if($id!=""){
			//$this->db->where("b.id_user", $id);
		//}
		$this->db->where("a.department", "Customer Service");
		$this->db->order_by('a.department', 'ASC');
        $query = $this->db->get();
        // debug($this->db->last_query());
        $result = $query->result_array();	
    
        return $result;
		
	}

	public function get_menu_list_cs(){
		
		$this->db->select ( 'a.*, b.id as ada' );
        $this->db->from("web_user_menu_list a");
		$this->db->join('web_user_menu b', 'b.id_menu = a.id and b.id_user', 'left');
		//if($id!=""){
			//$this->db->where("b.id_user", $id);
		//}
		$this->db->where('a.department', 'Customer Service');
		$this->db->order_by('a.department', 'ASC');
        $query = $this->db->get();
        // debug($this->db->last_query());
        $result = $query->result_array();	
    
        return $result;
		
	}
	
	public function get_menu_list_edit($id_user){
		
		$this->db->select ( 'a.*, IFNULL(b.id, 0) as ada' );
        $this->db->from("web_user_menu_list a");
		$this->db->join('web_user_menu b', 'b.id_menu = a.id and b.id_user='.$id_user.'', 'left');
		// if($id!=""){
			// $this->db->where("b.id_user", $id);
		// }
		//$this->db->where('a.department', 'Customer Service');
		$this->db->order_by('a.department', 'ASC');
		$this->db->order_by('a.keterangan_menu', 'ASC');
        $query = $this->db->get();
        // debug($this->db->last_query());
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
		
		$this->db->select ( 'a.*, sum(a.rdq_brc) as notif, sum(d.ready_quote_branch) as notif_done' );
		$this->db->from('sls_terjemahan_part a');
		$this->db->join('sls_pelanggan b', 'a.id_customer = b.id', 'left');
		$this->db->join('inv_inq c', 'c.id_sales_tech = a.id', 'left');
		$this->db->join('sls_quotation d', 'd.id_inq = a.id', 'left');			
		if($id!=""){
			$this->db->where("a.id", $id);
		}
		if($id_cabang!=0){
			$this->db->where("a.id_cabang", $id_cabang);
		}
		$this->db->where("a.rdq_brc", 1);

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

	public function get_notif_quote_spot($id=""){
		$session_data = $this->session->userdata('logged_in');		
		$id_cabang = $session_data['id_cabang'];
		
		$this->db->select ( 'a.*, sum(a.rdq_spt) as notif, sum(d.ready_quote_spot) as notif_done' );
		$this->db->from('sls_terjemahan_part a');
		$this->db->join('sls_pelanggan b', 'a.id_customer = b.id', 'left');
		$this->db->join('inv_inq c', 'c.id_sales_tech = a.id', 'left');	
		$this->db->join('sls_quotation d', 'd.id_inq = a.id', 'left');	
		if($id!=""){
			$this->db->where("a.id", $id);
		}
		if($id_cabang!=0){
			$this->db->where("a.id_cabang", $id_cabang);
		}
		$this->db->where("a.rdq_spt", 1);

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

	public function get_notif_quote_interco($id=""){
		$session_data = $this->session->userdata('logged_in');		
		$id_cabang = $session_data['id_cabang'];
		
		$this->db->select ( 'a.*, sum(a.rdq_itr) as notif, sum(d.ready_quote_interco) as notif_done' );
		$this->db->from('sls_terjemahan_part a');
		$this->db->join('sls_pelanggan b', 'a.id_customer = b.id', 'left');
		$this->db->join('inv_inq c', 'c.id_sales_tech = a.id', 'left');	
		$this->db->join('sls_quotation d', 'd.id_inq = a.id', 'left');	
		if($id!=""){
			$this->db->where("a.id", $id);
		}
		if($id_cabang!=0){
			$this->db->where("a.id_cabang", $id_cabang);
		}
		$this->db->where("a.rdq_itr", 1);

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

	public function get_notif_quote_retail($id=""){
		$session_data = $this->session->userdata('logged_in');		
		$id_cabang = $session_data['id_cabang'];
		
		$this->db->select ( 'a.*, sum(a.rdq_rtl) as notif, sum(d.ready_quote_retail) as notif_done' );
		$this->db->from('sls_terjemahan_part a');
		$this->db->join('sls_pelanggan b', 'a.id_customer = b.id', 'left');
		$this->db->join('inv_inq c', 'c.id_sales_tech = a.id', 'left');	
		$this->db->join('sls_quotation d', 'd.id_inq = a.id', 'left');	
		if($id!=""){
			$this->db->where("a.id", $id);
		}
		if($id_cabang!=0){
			$this->db->where("a.id_cabang", $id_cabang);
		}
		$this->db->where("a.rdq_rtl", 1);

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
	
	public function simpan_data($data, $id = ""){
		$result = 0;
		
		if($id!=""){		
			$this->db->where('id', nvl($id, 0));
			
			$result = $this->db->update("web_user", $data);
		} else {			
			$result = $this->db->insert("web_user", $data);			
		}
		return $result;
				
    }
	
	public function reset_data($id){
		$this->db->where('id_user', $id);
        $result = $this->db->delete("web_user_menu");
				
		return $result;
    }
	
	public function simpan_data_detail($data, $id = ""){
		$result = 0;
		
		if($id!=""){		
			$this->db->where('id', nvl($id, 0));
			
			$result = $this->db->update("web_user_menu", $data);
		} else {			
			$result = $this->db->insert("web_user_menu", $data);			
		}
		return $result;
				
    }
		
	public function delete_data($id){
		$this->db->where('id', $id);
        // $result = $this->db->delete("web_user");
		//==Tidak dihapus, tapi di non aktifkan
		$data["is_active"] = 0;
		$result = $this->db->update("web_user", $data);
		
// echo $this->db->last_query();
// exit();
		return $result;		
	}	
	
}

