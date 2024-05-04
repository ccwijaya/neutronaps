<?php
class M_gnr_timeline_approval extends CI_Model {
    private $main_table = "criticsuggestion";
	
	public function get_data($id=""){
		$this->db->select ( '*' );
		$this->db->from($this->main_table . " a");
		// $this->db->join('cabang b', 'a.id_cabang = b.id', 'left');
		// $this->db->join('proyek z', 'z.id = b.id_proyek', 'left');		
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

		// debug($result);

		return $result;
	}

	public function get_menu(){
		$this->db->select ( 'a.*' );
		$this->db->from("web_user_menu_list a");

		//$this->db->where("a.periode", $tahun);
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
	}

	public function simpan_data($data, &$id = ""){
		// debug($data);
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
