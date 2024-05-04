<?php
class M_po_lap_ots extends CI_Model {

	public function get_data($param){
		extract($param);

		$this->db->select ( 'a.*' );
		$this->db->from("view_ots_po_account_post a");
		$this->db->order_by("a.no_po", "asc");

		if($id_account!=""){
			$this->db->where("a.id_account", $id_account);
		}

		if($id_po!=""){
			$this->db->where("a.id_po", $id_po);
		}

		if(isset($tanggal_awal)){
			$this->db->where("a.tanggal >= '" . db_date($tanggal_awal) . "'");
			$this->db->where("a.tanggal <= '" . db_date($tanggal_akhir) . "'");
		}

		//$this->db->group_by('a.id_po');
		//$this->db->group_by('a.id_po_detail');
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();

		return $result;
    }

	public function get_account($id=""){
		//$session_data = $this->session->userdata('logged_in');
		//$user_id = $session_data['id'];
		// $id_proyek = $session_data['id_proyek'];

		$this->db->distinct();
		$this->db->select ( 'a.id_account, a.account' );
        $this->db->from("po_transfer a");
		// $this->db->join('web_user c', 'a.create_user = c.id', 'left');
		// $this->db->join('proyek z', 'z.id = c.id_proyek', 'left');

		// $this->db->where("a.bank<>''");

		// if($id_proyek!=0){
			// $this->db->where("c.id_proyek", $id_proyek);
		// }

		// $this->db->where("a.is_active", 1);
		$this->db->order_by('a.account', 'ASC');
		$this->db->group_by('a.id_account');
        $query = $this->db->get();
        // debug($this->db->last_query());

        $result = $query->result_array();

        return $result;
    }

	public function get_po($id=""){
		//$session_data = $this->session->userdata('logged_in');
		//$user_id = $session_data['id'];

		$this->db->distinct();
		$this->db->select ( 'a.id, a.no_po' );
        $this->db->from("po_transfer a");

		$this->db->order_by('a.no_po', 'ASC');
		$this->db->group_by('a.id');
        $query = $this->db->get();
        // debug($this->db->last_query());

        $result = $query->result_array();

        return $result;
    }
}

