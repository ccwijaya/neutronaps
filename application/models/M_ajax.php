<?php
class M_ajax extends CI_Model {

	// Cara panggil dari view : $this->m_ajax->get_value("tbl_master_user", "vname_user", "iid", 1);
	public function get_value($table, $column, $filter_column, $value_column) {
		$sReturn = "";

		$this->db->select($column); 
		$this->db->from($table);
		$this->db->where($filter_column,$value_column);
		// $this->db->limit(1, 1);

		$query = $this->db->get();
		$sReturn = $query->result_array();
		foreach ($sReturn as $row)
		{
			$sReturn = $row[$column];
		}
		// debug($this->db->last_query());
		return $sReturn;
	}
	
	// Cara panggil dari view : $this->m_ajax->user_access("admin", "1", "bview");
	public function user_access($username, $iid_modul, $type) {
		$sReturnValue = "";

		$this->db->select($type); 
		$this->db->from("tbl_master_user_akses");
		$this->db->where("vid_user",$username);
		$this->db->where("iid_modul",$iid_modul);		

		$query = $this->db->get();
		if ($query->num_rows() > 0){
			$sReturn = NVL($query->result_array(), 0);
			$sReturnValue = $sReturn[0][$type];
		} 
		// var_dump( $this->db );
		// echo $this->db->queries[1];
		// echo $this->db->last_query();
		// exit();
		return $sReturnValue;
	}
	
	public function get_data_by_sql($sql){
		// debug($sql);
		if(instr($sql, "DROP")){
			return 10;
		}
		
		if(instr($sql, "INSERT")){
			return 10;
		}
		
		if(instr($sql, "UPDATE")){
			return 10;
		}
		
        $query = $this->db->query($sql);  
		// var_dump($query->num_rows());
		return $query->num_rows();
    }
	
	public function get_data_by_sql2($sql){
		// debug($sql);
		if(instr($sql, "DROP")){
			return 10;
		}
		
		if(instr($sql, "INSERT")){
			return 10;
		}
		
		if(instr($sql, "UPDATE")){
			return 10;
		}
		
        $query = $this->db->query($sql);  
		// var_dump($query->result());
		return $query->result_array();
		// return $query->result();
    }
	
	public function run_query_by_sql($sql){
		// debug($sql);
		if(instr($sql, "DROP")){
			return "FALSE";
		}
		
		// if(instr($sql, "SELECT")){
			// return "FALSE";
		// }
						
		if (!$this->db->query($sql)) {
			return "FALSE";
		}
		else {
			return "TRUE";
		}
		
		// return $this->db->error();
		// if ($this->db->error()) {
			// return "FALSE";
		// }


        // $query = $this->db->query($sql);  
		// // var_dump($query->result());
		// return $query->result_array();
		// // return $query->result();
    }
}

