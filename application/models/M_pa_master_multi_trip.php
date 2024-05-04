<?php
class M_pa_master_multi_trip extends CI_Model {
	private $main_table = "profit_margin_mt";
	
	public function get_data($id=""){
		$this->db->select ( 'a.*, b.rute, c.no_bukti as re_number, d.unit, b.tipe_box' );
		$this->db->from('profit_margin_mt a');
		$this->db->join('view_rute b', 'a.id_rute_main = b.id', 'left');
		$this->db->join('profit_margin c', 'c.id = a.id_profit_mt', 'left');
		$this->db->join('moda d', 'd.id = b.id_moda', 'left');		
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
		$this->db->select ( 'a.*, b.rute, c.no_bukti as re_number, d.unit, b.tipe_box' );
		$this->db->from('profit_margin_mt a');
		$this->db->join('view_rute b', 'a.id_rute_main = b.id', 'left');
		$this->db->join('profit_margin c', 'c.id = a.id_profit_mt', 'left');
		$this->db->join('moda d', 'd.id = b.id_moda', 'left');	
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
				a.no_bukti LIKE '%" . $word . "%' OR
				b.rute LIKE '%" . $word . "%')
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

	public function get_rute_mt(){
		$session_data = $this->session->userdata('logged_in');		
		//$id_cabang = $session_data['id_cabang'];
			
		$this->db->select ( "a.id, a.pool_pm, a.km_pool_pm, CONCAT(a.rute, ' | ' ,a.unit, ' | ' ,a.nama_customer) as nama" );
		$this->db->from("view_rute_customer a");
		//$this->db->group_by('a.rute_group');
		// if($id_cabang!=0){
		//$this->db->where("a.id_cost_tol<>", "");
		//$this->db->where("a.loading<>", "");
		// }
	
		
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

	public function get_rute($id_profit_mt){
		$session_data = $this->session->userdata('logged_in');		
		//$id_cabang = $session_data['id_cabang'];
			
		$this->db->select ( "a.*" );
		$this->db->from("view_rute_customer a");
		if($id_profit_mt!=""){
			$this->db->where("a.id_profit", $id_profit_mt);
		}
		$this->db->group_by('a.rute_group');
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

	public function get_re(){
		$session_data = $this->session->userdata('logged_in');		
		$id_cabang = $session_data['id_cabang'];
			
		$this->db->select ( 'a.*, b.nama_customer' );
		$this->db->from("profit_margin a");
		$this->db->join('customer b', 'a.id_customer = b.id', 'left');
		//$this->db->where("a.id", $id);
		//$this->db->where("a.status_ops <> ''");
		if($id_cabang!=0){
			$this->db->where("a.id_cabang", $id_cabang);
		}

		$query = $this->db->get();
		// debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

	public function get_request_mt($id=""){
		$session_data = $this->session->userdata('logged_in');		
		$id_cabang = $session_data['id_cabang'];
		
		$this->db->select ( 'a.*, a.id as id_profit_mt' );
		$this->db->from("profit_margin a");
		$this->db->join('customer b', 'a.id_customer = b.id', 'left');
				
		//$this->db->where("x.id IS NULL");
		$this->db->where("b.nama_customer <>", "EMPTY");
		//$this->db->where("a.status_approve<>", 1);
		$this->db->where("a.is_pre_project<>", 1);

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

	public function get_rute_mt_by_id($param){
		extract($param);
		
		$this->db->select ( 'a.*' );
		$this->db->from("view_rute_customer a");
		//$this->db->join('inv_merek b', 'b.id = a.id_merek', 'left');		
		//$this->db->where("a.id", $id);
		$this->db->where("a.id", $id);
		$this->db->group_by('a.rute_group');
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;

	}

	public function get_detail_mt($id){
		$this->db->select ( 'a.*' );
		$this->db->from("profit_margin_multi_trip a");
		$this->db->where("a.id_mt", $id);
		$query = $this->db->get();
		// debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

	public function simpan_data_detail_mt($data, &$id = ""){
		$result = 0;
		
		$result = $this->db->insert("profit_margin_multi_trip", $data);
		$id = $this->db->insert_id();
	
		return $result;
	}

	public function reset_data_mt($id){
		$this->db->where('id_mt', $id);
        $result = $this->db->delete("profit_margin_multi_trip");
				
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
