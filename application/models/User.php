<?php
Class User extends CI_Model
{

	function login2($username, $password){
		$this->db->select('a.id, a.user_id, a.passwd');
		$this->db->from('web_user a');
		//$this->db->join('web_access b', 'b.id_user = a.id', 'left');
		$this->db->where('a.is_active', 1);
		$this->db->where('a.user_id', $username);
		$this->db->where('a.passwd', $password);
		$this->db->limit(1);
		
		$query = $this->db->get();
		//debug($this->db->last_query());

		$this->tracking_user($username, $password, $query->num_rows());

		return $query->result();
		// if($query -> num_rows() == 1){
		// } else {
			// return false;
		// }
	}

	function login($username, $password){
		$this -> db -> select('*');
		$this -> db -> from('web_user');
		// $this -> db -> where('is_active', 1);
		$this -> db -> where('user_id', $username);
		$this -> db -> where('passwd', MD5($password));
		//$this -> db -> where('passwd', $password);
		$this -> db -> limit(1);
		$query = $this -> db -> get();
		// debug($this->db->last_query());

		$this->tracking_user($username, $password, $query->num_rows());

		return $query->result();
		// if($query -> num_rows() == 1){
		// } else {
			// return false;
		// }
	}
 
 
 
	function tracking_user($username, $password, $status){

		$sql = "INSERT INTO web_log (status, user_id, password, timing) VALUES (" . $status . ", '" . $username . "', '" . $password . "', '" . date("Y-m-d H:i:s") . "' )";
		$this->db->query($sql);
	}
	
	function tracking_login($id){
		$this->db->where('id', $id);
		$data["last_login"] = date("Y-m-d H:i:s");
		$this->db->update("web_user", $data);
	}
}
?>
