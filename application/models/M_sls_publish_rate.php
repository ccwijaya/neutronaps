<?php
class M_sls_publish_rate extends CI_Model {
	
	public function get_data($param){
		extract($param);

		$this->db->select ( 'a.*' );
		$this->db->from("sls_publish_rate a");
		$this->db->order_by("a.area_loading", "ASC");
		$this->db->order_by("a.loading_kota", "ASC");
		$this->db->order_by("a.unloading_kota", "ASC");
		//$this->db->order_by("a.moda", "ASC");
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
    }

	public function get_data_jabo_tronton_wingbox($param){
		extract($param);

		$this->db->select ( 'a.*' );
		$this->db->from("sls_publish_rate a");
		$this->db->where("a.area_loading", "JABODETABEKSER");
		$this->db->where("a.moda", "TRONTON");
		$this->db->where("a.tipe_box", "WINGBOX");
		//$this->db->order_by("a.area_loading", "ASC");
		$this->db->order_by("a.loading_kota", "ASC");
		$this->db->order_by("a.unloading_kota", "ASC");
		//$this->db->order_by("a.moda", "ASC");
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
    }

	public function get_data_jabo_tronton_box($param){
		extract($param);

		$this->db->select ( 'a.*' );
		$this->db->from("sls_publish_rate a");
		$this->db->where("a.area_loading", "JABODETABEKSER");
		$this->db->where("a.moda", "TRONTON");
		$this->db->where("a.tipe_box", "BOX");
		//$this->db->order_by("a.area_loading", "ASC");
		$this->db->order_by("a.loading_kota", "ASC");
		$this->db->order_by("a.unloading_kota", "ASC");
		//$this->db->order_by("a.moda", "ASC");
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
    }

	public function get_data_jabo_tronton_bak($param){
		extract($param);

		$this->db->select ( 'a.*' );
		$this->db->from("sls_publish_rate a");
		$this->db->where("a.area_loading", "JABODETABEKSER");
		$this->db->where("a.moda", "TRONTON");
		$this->db->where("a.tipe_box", "BAK");
		//$this->db->order_by("a.area_loading", "ASC");
		$this->db->order_by("a.loading_kota", "ASC");
		$this->db->order_by("a.unloading_kota", "ASC");
		//$this->db->order_by("a.moda", "ASC");
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
    }

	public function get_data_jabo_cdd_long_box($param){
		extract($param);

		$this->db->select ( 'a.*' );
		$this->db->from("sls_publish_rate a");
		$this->db->where("a.area_loading", "JABODETABEKSER");
		$this->db->where("a.moda", "CDD (LONG)");
		$this->db->where("a.tipe_box", "BOX");
		//$this->db->order_by("a.area_loading", "ASC");
		$this->db->order_by("a.loading_kota", "ASC");
		$this->db->order_by("a.unloading_kota", "ASC");
		//$this->db->order_by("a.moda", "ASC");
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
    }

	public function get_data_jabo_cdd_long_bak($param){
		extract($param);

		$this->db->select ( 'a.*' );
		$this->db->from("sls_publish_rate a");
		$this->db->where("a.area_loading", "JABODETABEKSER");
		$this->db->where("a.moda", "CDD (LONG)");
		$this->db->where("a.tipe_box", "BAK");
		//$this->db->order_by("a.area_loading", "ASC");
		$this->db->order_by("a.loading_kota", "ASC");
		$this->db->order_by("a.unloading_kota", "ASC");
		//$this->db->order_by("a.moda", "ASC");
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
    }

	public function get_data_jabo_cdd_6_box($param){
		extract($param);

		$this->db->select ( 'a.*' );
		$this->db->from("sls_publish_rate a");
		$this->db->where("a.area_loading", "JABODETABEKSER");
		$this->db->where("a.moda", "CDD 6 RODA");
		$this->db->where("a.tipe_box", "BOX");
		//$this->db->order_by("a.area_loading", "ASC");
		$this->db->order_by("a.loading_kota", "ASC");
		$this->db->order_by("a.unloading_kota", "ASC");
		//$this->db->order_by("a.moda", "ASC");
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
    }

	public function get_data_jabo_cdd_6_bak($param){
		extract($param);

		$this->db->select ( 'a.*' );
		$this->db->from("sls_publish_rate a");
		$this->db->where("a.area_loading", "JABODETABEKSER");
		$this->db->where("a.moda", "CDD 6 RODA");
		$this->db->where("a.tipe_box", "BAK");
		//$this->db->order_by("a.area_loading", "ASC");
		$this->db->order_by("a.loading_kota", "ASC");
		$this->db->order_by("a.unloading_kota", "ASC");
		//$this->db->order_by("a.moda", "ASC");
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
    }

	public function get_data_jabo_fuso_bak($param){
		extract($param);

		$this->db->select ( 'a.*' );
		$this->db->from("sls_publish_rate a");
		$this->db->where("a.area_loading", "JABODETABEKSER");
		$this->db->where("a.moda", "FUSO");
		$this->db->where("a.tipe_box", "BAK");
		//$this->db->order_by("a.area_loading", "ASC");
		$this->db->order_by("a.loading_kota", "ASC");
		$this->db->order_by("a.unloading_kota", "ASC");
		//$this->db->order_by("a.moda", "ASC");
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
    }

	public function get_data_jabo_fuso_box($param){
		extract($param);

		$this->db->select ( 'a.*' );
		$this->db->from("sls_publish_rate a");
		$this->db->where("a.area_loading", "JABODETABEKSER");
		$this->db->where("a.moda", "FUSO");
		$this->db->where("a.tipe_box", "BOX");
		//$this->db->order_by("a.area_loading", "ASC");
		$this->db->order_by("a.loading_kota", "ASC");
		$this->db->order_by("a.unloading_kota", "ASC");
		//$this->db->order_by("a.moda", "ASC");
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
    }

	public function get_data_jabo_trailer_20($param){
		extract($param);

		$this->db->select ( 'a.*' );
		$this->db->from("sls_publish_rate a");
		$this->db->where("a.area_loading", "JABODETABEKSER");
		$this->db->where("a.moda", "TRAILER 20 FEET");
		$this->db->where("a.tipe_box", "CONTAINER 20");
		//$this->db->order_by("a.area_loading", "ASC");
		$this->db->order_by("a.loading_kota", "ASC");
		$this->db->order_by("a.unloading_kota", "ASC");
		//$this->db->order_by("a.moda", "ASC");
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
    }

	public function get_data_jabo_trailer_40($param){
		extract($param);

		$this->db->select ( 'a.*' );
		$this->db->from("sls_publish_rate a");
		$this->db->where("a.area_loading", "JABODETABEKSER");
		$this->db->where("a.moda", "TRAILER 40 FEET");
		$this->db->where("a.tipe_box", "CONTAINER 40");
		//$this->db->order_by("a.area_loading", "ASC");
		$this->db->order_by("a.loading_kota", "ASC");
		$this->db->order_by("a.unloading_kota", "ASC");
		//$this->db->order_by("a.moda", "ASC");
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
    }

	public function get_data_barat_tronton_wingbox($param){
		extract($param);

		$this->db->select ( 'a.*' );
		$this->db->from("sls_publish_rate a");
		$this->db->where("a.area_loading", "BARAT");
		$this->db->where("a.moda", "TRONTON");
		$this->db->where("a.tipe_box", "WINGBOX");
		//$this->db->order_by("a.area_loading", "ASC");
		$this->db->order_by("a.loading_kota", "ASC");
		$this->db->order_by("a.unloading_kota", "ASC");
		//$this->db->order_by("a.moda", "ASC");
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
    }

	public function get_data_barat_tronton_box($param){
		extract($param);

		$this->db->select ( 'a.*' );
		$this->db->from("sls_publish_rate a");
		$this->db->where("a.area_loading", "BARAT");
		$this->db->where("a.moda", "TRONTON");
		$this->db->where("a.tipe_box", "BOX");
		//$this->db->order_by("a.area_loading", "ASC");
		$this->db->order_by("a.loading_kota", "ASC");
		$this->db->order_by("a.unloading_kota", "ASC");
		//$this->db->order_by("a.moda", "ASC");
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
    }

	public function get_data_barat_tronton_bak($param){
		extract($param);

		$this->db->select ( 'a.*' );
		$this->db->from("sls_publish_rate a");
		$this->db->where("a.area_loading", "BARAT");
		$this->db->where("a.moda", "TRONTON");
		$this->db->where("a.tipe_box", "BAK");
		//$this->db->order_by("a.area_loading", "ASC");
		$this->db->order_by("a.loading_kota", "ASC");
		$this->db->order_by("a.unloading_kota", "ASC");
		//$this->db->order_by("a.moda", "ASC");
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
    }

	public function get_data_barat_cdd_long_box($param){
		extract($param);

		$this->db->select ( 'a.*' );
		$this->db->from("sls_publish_rate a");
		$this->db->where("a.area_loading", "BARAT");
		$this->db->where("a.moda", "CDD (LONG)");
		$this->db->where("a.tipe_box", "BOX");
		//$this->db->order_by("a.area_loading", "ASC");
		$this->db->order_by("a.loading_kota", "ASC");
		$this->db->order_by("a.unloading_kota", "ASC");
		//$this->db->order_by("a.moda", "ASC");
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
    }

	public function get_data_barat_cdd_long_bak($param){
		extract($param);

		$this->db->select ( 'a.*' );
		$this->db->from("sls_publish_rate a");
		$this->db->where("a.area_loading", "BARAT");
		$this->db->where("a.moda", "CDD (LONG)");
		$this->db->where("a.tipe_box", "BAK");
		//$this->db->order_by("a.area_loading", "ASC");
		$this->db->order_by("a.loading_kota", "ASC");
		$this->db->order_by("a.unloading_kota", "ASC");
		//$this->db->order_by("a.moda", "ASC");
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
    }

	public function get_data_barat_cdd_6_box($param){
		extract($param);

		$this->db->select ( 'a.*' );
		$this->db->from("sls_publish_rate a");
		$this->db->where("a.area_loading", "BARAT");
		$this->db->where("a.moda", "CDD 6 RODA");
		$this->db->where("a.tipe_box", "BOX");
		//$this->db->order_by("a.area_loading", "ASC");
		$this->db->order_by("a.loading_kota", "ASC");
		$this->db->order_by("a.unloading_kota", "ASC");
		//$this->db->order_by("a.moda", "ASC");
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
    }

	public function get_data_barat_cdd_6_bak($param){
		extract($param);

		$this->db->select ( 'a.*' );
		$this->db->from("sls_publish_rate a");
		$this->db->where("a.area_loading", "BARAT");
		$this->db->where("a.moda", "CDD 6 RODA");
		$this->db->where("a.tipe_box", "BAK");
		//$this->db->order_by("a.area_loading", "ASC");
		$this->db->order_by("a.loading_kota", "ASC");
		$this->db->order_by("a.unloading_kota", "ASC");
		//$this->db->order_by("a.moda", "ASC");
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
    }

	public function get_data_barat_fuso_bak($param){
		extract($param);

		$this->db->select ( 'a.*' );
		$this->db->from("sls_publish_rate a");
		$this->db->where("a.area_loading", "BARAT");
		$this->db->where("a.moda", "FUSO");
		$this->db->where("a.tipe_box", "BAK");
		//$this->db->order_by("a.area_loading", "ASC");
		$this->db->order_by("a.loading_kota", "ASC");
		$this->db->order_by("a.unloading_kota", "ASC");
		//$this->db->order_by("a.moda", "ASC");
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
    }

	public function get_data_barat_fuso_box($param){
		extract($param);

		$this->db->select ( 'a.*' );
		$this->db->from("sls_publish_rate a");
		$this->db->where("a.area_loading", "BARAT");
		$this->db->where("a.moda", "FUSO");
		$this->db->where("a.tipe_box", "BOX");
		//$this->db->order_by("a.area_loading", "ASC");
		$this->db->order_by("a.loading_kota", "ASC");
		$this->db->order_by("a.unloading_kota", "ASC");
		//$this->db->order_by("a.moda", "ASC");
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
    }

	public function get_data_barat_trailer_20($param){
		extract($param);

		$this->db->select ( 'a.*' );
		$this->db->from("sls_publish_rate a");
		$this->db->where("a.area_loading", "BARAT");
		$this->db->where("a.moda", "TRAILER 20 FEET");
		$this->db->where("a.tipe_box", "CONTAINER 20");
		//$this->db->order_by("a.area_loading", "ASC");
		$this->db->order_by("a.loading_kota", "ASC");
		$this->db->order_by("a.unloading_kota", "ASC");
		//$this->db->order_by("a.moda", "ASC");
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
    }

	public function get_data_barat_trailer_40($param){
		extract($param);

		$this->db->select ( 'a.*' );
		$this->db->from("sls_publish_rate a");
		$this->db->where("a.area_loading", "BARAT");
		$this->db->where("a.moda", "TRAILER 40 FEET");
		$this->db->where("a.tipe_box", "CONTAINER 40");
		//$this->db->order_by("a.area_loading", "ASC");
		$this->db->order_by("a.loading_kota", "ASC");
		$this->db->order_by("a.unloading_kota", "ASC");
		//$this->db->order_by("a.moda", "ASC");
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
    }

	public function get_data_tengah_tronton_wingbox($param){
		extract($param);

		$this->db->select ( 'a.*' );
		$this->db->from("sls_publish_rate a");
		$this->db->where("a.area_loading", "TENGAH");
		$this->db->where("a.moda", "TRONTON");
		$this->db->where("a.tipe_box", "WINGBOX");
		//$this->db->order_by("a.area_loading", "ASC");
		$this->db->order_by("a.loading_kota", "ASC");
		$this->db->order_by("a.unloading_kota", "ASC");
		//$this->db->order_by("a.moda", "ASC");
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
    }

	public function get_data_tengah_tronton_box($param){
		extract($param);

		$this->db->select ( 'a.*' );
		$this->db->from("sls_publish_rate a");
		$this->db->where("a.area_loading", "TENGAH");
		$this->db->where("a.moda", "TRONTON");
		$this->db->where("a.tipe_box", "BOX");
		//$this->db->order_by("a.area_loading", "ASC");
		$this->db->order_by("a.loading_kota", "ASC");
		$this->db->order_by("a.unloading_kota", "ASC");
		//$this->db->order_by("a.moda", "ASC");
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
    }

	public function get_data_tengah_tronton_bak($param){
		extract($param);

		$this->db->select ( 'a.*' );
		$this->db->from("sls_publish_rate a");
		$this->db->where("a.area_loading", "TENGAH");
		$this->db->where("a.moda", "TRONTON");
		$this->db->where("a.tipe_box", "BAK");
		//$this->db->order_by("a.area_loading", "ASC");
		$this->db->order_by("a.loading_kota", "ASC");
		$this->db->order_by("a.unloading_kota", "ASC");
		//$this->db->order_by("a.moda", "ASC");
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
    }

	public function get_data_tengah_cdd_long_box($param){
		extract($param);

		$this->db->select ( 'a.*' );
		$this->db->from("sls_publish_rate a");
		$this->db->where("a.area_loading", "TENGAH");
		$this->db->where("a.moda", "CDD (LONG)");
		$this->db->where("a.tipe_box", "BOX");
		//$this->db->order_by("a.area_loading", "ASC");
		$this->db->order_by("a.loading_kota", "ASC");
		$this->db->order_by("a.unloading_kota", "ASC");
		//$this->db->order_by("a.moda", "ASC");
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
    }

	public function get_data_tengah_cdd_long_bak($param){
		extract($param);

		$this->db->select ( 'a.*' );
		$this->db->from("sls_publish_rate a");
		$this->db->where("a.area_loading", "TENGAH");
		$this->db->where("a.moda", "CDD (LONG)");
		$this->db->where("a.tipe_box", "BAK");
		//$this->db->order_by("a.area_loading", "ASC");
		$this->db->order_by("a.loading_kota", "ASC");
		$this->db->order_by("a.unloading_kota", "ASC");
		//$this->db->order_by("a.moda", "ASC");
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
    }

	public function get_data_tengah_cdd_6_box($param){
		extract($param);

		$this->db->select ( 'a.*' );
		$this->db->from("sls_publish_rate a");
		$this->db->where("a.area_loading", "TENGAH");
		$this->db->where("a.moda", "CDD 6 RODA");
		$this->db->where("a.tipe_box", "BOX");
		//$this->db->order_by("a.area_loading", "ASC");
		$this->db->order_by("a.loading_kota", "ASC");
		$this->db->order_by("a.unloading_kota", "ASC");
		//$this->db->order_by("a.moda", "ASC");
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
    }

	public function get_data_tengah_cdd_6_bak($param){
		extract($param);

		$this->db->select ( 'a.*' );
		$this->db->from("sls_publish_rate a");
		$this->db->where("a.area_loading", "TENGAH");
		$this->db->where("a.moda", "CDD 6 RODA");
		$this->db->where("a.tipe_box", "BAK");
		//$this->db->order_by("a.area_loading", "ASC");
		$this->db->order_by("a.loading_kota", "ASC");
		$this->db->order_by("a.unloading_kota", "ASC");
		//$this->db->order_by("a.moda", "ASC");
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
    }

	public function get_data_tengah_fuso_bak($param){
		extract($param);

		$this->db->select ( 'a.*' );
		$this->db->from("sls_publish_rate a");
		$this->db->where("a.area_loading", "TENGAH");
		$this->db->where("a.moda", "FUSO");
		$this->db->where("a.tipe_box", "BAK");
		//$this->db->order_by("a.area_loading", "ASC");
		$this->db->order_by("a.loading_kota", "ASC");
		$this->db->order_by("a.unloading_kota", "ASC");
		//$this->db->order_by("a.moda", "ASC");
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
    }

	public function get_data_tengah_fuso_box($param){
		extract($param);

		$this->db->select ( 'a.*' );
		$this->db->from("sls_publish_rate a");
		$this->db->where("a.area_loading", "TENGAH");
		$this->db->where("a.moda", "FUSO");
		$this->db->where("a.tipe_box", "BOX");
		//$this->db->order_by("a.area_loading", "ASC");
		$this->db->order_by("a.loading_kota", "ASC");
		$this->db->order_by("a.unloading_kota", "ASC");
		//$this->db->order_by("a.moda", "ASC");
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
    }

	public function get_data_tengah_trailer_20($param){
		extract($param);

		$this->db->select ( 'a.*' );
		$this->db->from("sls_publish_rate a");
		$this->db->where("a.area_loading", "TENGAH");
		$this->db->where("a.moda", "TRAILER 20 FEET");
		$this->db->where("a.tipe_box", "CONTAINER 20");
		//$this->db->order_by("a.area_loading", "ASC");
		$this->db->order_by("a.loading_kota", "ASC");
		$this->db->order_by("a.unloading_kota", "ASC");
		//$this->db->order_by("a.moda", "ASC");
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
    }

	public function get_data_tengah_trailer_40($param){
		extract($param);

		$this->db->select ( 'a.*' );
		$this->db->from("sls_publish_rate a");
		$this->db->where("a.area_loading", "TENGAH");
		$this->db->where("a.moda", "TRAILER 40 FEET");
		$this->db->where("a.tipe_box", "CONTAINER 40");
		//$this->db->order_by("a.area_loading", "ASC");
		$this->db->order_by("a.loading_kota", "ASC");
		$this->db->order_by("a.unloading_kota", "ASC");
		//$this->db->order_by("a.moda", "ASC");
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
    }

	public function get_data_timur_tronton_wingbox($param){
		extract($param);

		$this->db->select ( 'a.*' );
		$this->db->from("sls_publish_rate a");
		$this->db->where("a.area_loading", "TIMUR");
		$this->db->where("a.moda", "TRONTON");
		$this->db->where("a.tipe_box", "WINGBOX");
		//$this->db->order_by("a.area_loading", "ASC");
		$this->db->order_by("a.loading_kota", "ASC");
		$this->db->order_by("a.unloading_kota", "ASC");
		//$this->db->order_by("a.moda", "ASC");
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
    }

	public function get_data_timur_tronton_box($param){
		extract($param);

		$this->db->select ( 'a.*' );
		$this->db->from("sls_publish_rate a");
		$this->db->where("a.area_loading", "TIMUR");
		$this->db->where("a.moda", "TRONTON");
		$this->db->where("a.tipe_box", "BOX");
		//$this->db->order_by("a.area_loading", "ASC");
		$this->db->order_by("a.loading_kota", "ASC");
		$this->db->order_by("a.unloading_kota", "ASC");
		//$this->db->order_by("a.moda", "ASC");
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
    }

	public function get_data_timur_tronton_bak($param){
		extract($param);

		$this->db->select ( 'a.*' );
		$this->db->from("sls_publish_rate a");
		$this->db->where("a.area_loading", "TIMUR");
		$this->db->where("a.moda", "TRONTON");
		$this->db->where("a.tipe_box", "BAK");
		//$this->db->order_by("a.area_loading", "ASC");
		$this->db->order_by("a.loading_kota", "ASC");
		$this->db->order_by("a.unloading_kota", "ASC");
		//$this->db->order_by("a.moda", "ASC");
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
    }

	public function get_data_timur_cdd_long_box($param){
		extract($param);

		$this->db->select ( 'a.*' );
		$this->db->from("sls_publish_rate a");
		$this->db->where("a.area_loading", "TIMUR");
		$this->db->where("a.moda", "CDD (LONG)");
		$this->db->where("a.tipe_box", "BOX");
		//$this->db->order_by("a.area_loading", "ASC");
		$this->db->order_by("a.loading_kota", "ASC");
		$this->db->order_by("a.unloading_kota", "ASC");
		//$this->db->order_by("a.moda", "ASC");
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
    }

	public function get_data_timur_cdd_long_bak($param){
		extract($param);

		$this->db->select ( 'a.*' );
		$this->db->from("sls_publish_rate a");
		$this->db->where("a.area_loading", "TIMUR");
		$this->db->where("a.moda", "CDD (LONG)");
		$this->db->where("a.tipe_box", "BAK");
		//$this->db->order_by("a.area_loading", "ASC");
		$this->db->order_by("a.loading_kota", "ASC");
		$this->db->order_by("a.unloading_kota", "ASC");
		//$this->db->order_by("a.moda", "ASC");
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
    }

	public function get_data_timur_cdd_6_box($param){
		extract($param);

		$this->db->select ( 'a.*' );
		$this->db->from("sls_publish_rate a");
		$this->db->where("a.area_loading", "TIMUR");
		$this->db->where("a.moda", "CDD 6 RODA");
		$this->db->where("a.tipe_box", "BOX");
		//$this->db->order_by("a.area_loading", "ASC");
		$this->db->order_by("a.loading_kota", "ASC");
		$this->db->order_by("a.unloading_kota", "ASC");
		//$this->db->order_by("a.moda", "ASC");
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
    }

	public function get_data_timur_cdd_6_bak($param){
		extract($param);

		$this->db->select ( 'a.*' );
		$this->db->from("sls_publish_rate a");
		$this->db->where("a.area_loading", "TIMUR");
		$this->db->where("a.moda", "CDD 6 RODA");
		$this->db->where("a.tipe_box", "BAK");
		//$this->db->order_by("a.area_loading", "ASC");
		$this->db->order_by("a.loading_kota", "ASC");
		$this->db->order_by("a.unloading_kota", "ASC");
		//$this->db->order_by("a.moda", "ASC");
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
    }

	public function get_data_timur_fuso_bak($param){
		extract($param);

		$this->db->select ( 'a.*' );
		$this->db->from("sls_publish_rate a");
		$this->db->where("a.area_loading", "TIMUR");
		$this->db->where("a.moda", "FUSO");
		$this->db->where("a.tipe_box", "BAK");
		//$this->db->order_by("a.area_loading", "ASC");
		$this->db->order_by("a.loading_kota", "ASC");
		$this->db->order_by("a.unloading_kota", "ASC");
		//$this->db->order_by("a.moda", "ASC");
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
    }

	public function get_data_timur_fuso_box($param){
		extract($param);

		$this->db->select ( 'a.*' );
		$this->db->from("sls_publish_rate a");
		$this->db->where("a.area_loading", "TIMUR");
		$this->db->where("a.moda", "FUSO");
		$this->db->where("a.tipe_box", "BOX");
		//$this->db->order_by("a.area_loading", "ASC");
		$this->db->order_by("a.loading_kota", "ASC");
		$this->db->order_by("a.unloading_kota", "ASC");
		//$this->db->order_by("a.moda", "ASC");
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
    }

	public function get_data_timur_trailer_20($param){
		extract($param);

		$this->db->select ( 'a.*' );
		$this->db->from("sls_publish_rate a");
		$this->db->where("a.area_loading", "TIMUR");
		$this->db->where("a.moda", "TRAILER 20 FEET");
		$this->db->where("a.tipe_box", "CONTAINER 20");
		//$this->db->order_by("a.area_loading", "ASC");
		$this->db->order_by("a.loading_kota", "ASC");
		$this->db->order_by("a.unloading_kota", "ASC");
		//$this->db->order_by("a.moda", "ASC");
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
    }

	public function get_data_timur_trailer_40($param){
		extract($param);

		$this->db->select ( 'a.*' );
		$this->db->from("sls_publish_rate a");
		$this->db->where("a.area_loading", "TIMUR");
		$this->db->where("a.moda", "TRAILER 40 FEET");
		$this->db->where("a.tipe_box", "CONTAINER 40");
		//$this->db->order_by("a.area_loading", "ASC");
		$this->db->order_by("a.loading_kota", "ASC");
		$this->db->order_by("a.unloading_kota", "ASC");
		//$this->db->order_by("a.moda", "ASC");
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
    }

	public function get_data_bali_tronton_wingbox($param){
		extract($param);

		$this->db->select ( 'a.*' );
		$this->db->from("sls_publish_rate a");
		$this->db->where("a.area_loading", "BALI");
		$this->db->where("a.moda", "TRONTON");
		$this->db->where("a.tipe_box", "WINGBOX");
		//$this->db->order_by("a.area_loading", "ASC");
		$this->db->order_by("a.loading_kota", "ASC");
		$this->db->order_by("a.unloading_kota", "ASC");
		//$this->db->order_by("a.moda", "ASC");
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
    }

	public function get_data_bali_tronton_box($param){
		extract($param);

		$this->db->select ( 'a.*' );
		$this->db->from("sls_publish_rate a");
		$this->db->where("a.area_loading", "BALI");
		$this->db->where("a.moda", "TRONTON");
		$this->db->where("a.tipe_box", "BOX");
		//$this->db->order_by("a.area_loading", "ASC");
		$this->db->order_by("a.loading_kota", "ASC");
		$this->db->order_by("a.unloading_kota", "ASC");
		//$this->db->order_by("a.moda", "ASC");
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
    }

	public function get_data_bali_tronton_bak($param){
		extract($param);

		$this->db->select ( 'a.*' );
		$this->db->from("sls_publish_rate a");
		$this->db->where("a.area_loading", "BALI");
		$this->db->where("a.moda", "TRONTON");
		$this->db->where("a.tipe_box", "BAK");
		//$this->db->order_by("a.area_loading", "ASC");
		$this->db->order_by("a.loading_kota", "ASC");
		$this->db->order_by("a.unloading_kota", "ASC");
		//$this->db->order_by("a.moda", "ASC");
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
    }

	public function get_data_bali_cdd_long_box($param){
		extract($param);

		$this->db->select ( 'a.*' );
		$this->db->from("sls_publish_rate a");
		$this->db->where("a.area_loading", "BALI");
		$this->db->where("a.moda", "CDD (LONG)");
		$this->db->where("a.tipe_box", "BOX");
		//$this->db->order_by("a.area_loading", "ASC");
		$this->db->order_by("a.loading_kota", "ASC");
		$this->db->order_by("a.unloading_kota", "ASC");
		//$this->db->order_by("a.moda", "ASC");
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
    }

	public function get_data_bali_cdd_long_bak($param){
		extract($param);

		$this->db->select ( 'a.*' );
		$this->db->from("sls_publish_rate a");
		$this->db->where("a.area_loading", "BALI");
		$this->db->where("a.moda", "CDD (LONG)");
		$this->db->where("a.tipe_box", "BAK");
		//$this->db->order_by("a.area_loading", "ASC");
		$this->db->order_by("a.loading_kota", "ASC");
		$this->db->order_by("a.unloading_kota", "ASC");
		//$this->db->order_by("a.moda", "ASC");
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
    }

	public function get_data_bali_cdd_6_box($param){
		extract($param);

		$this->db->select ( 'a.*' );
		$this->db->from("sls_publish_rate a");
		$this->db->where("a.area_loading", "BALI");
		$this->db->where("a.moda", "CDD 6 RODA");
		$this->db->where("a.tipe_box", "BOX");
		//$this->db->order_by("a.area_loading", "ASC");
		$this->db->order_by("a.loading_kota", "ASC");
		$this->db->order_by("a.unloading_kota", "ASC");
		//$this->db->order_by("a.moda", "ASC");
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
    }

	public function get_data_bali_cdd_6_bak($param){
		extract($param);

		$this->db->select ( 'a.*' );
		$this->db->from("sls_publish_rate a");
		$this->db->where("a.area_loading", "BALI");
		$this->db->where("a.moda", "CDD 6 RODA");
		$this->db->where("a.tipe_box", "BAK");
		//$this->db->order_by("a.area_loading", "ASC");
		$this->db->order_by("a.loading_kota", "ASC");
		$this->db->order_by("a.unloading_kota", "ASC");
		//$this->db->order_by("a.moda", "ASC");
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
    }

	public function get_data_bali_fuso_bak($param){
		extract($param);

		$this->db->select ( 'a.*' );
		$this->db->from("sls_publish_rate a");
		$this->db->where("a.area_loading", "BALI");
		$this->db->where("a.moda", "FUSO");
		$this->db->where("a.tipe_box", "BAK");
		//$this->db->order_by("a.area_loading", "ASC");
		$this->db->order_by("a.loading_kota", "ASC");
		$this->db->order_by("a.unloading_kota", "ASC");
		//$this->db->order_by("a.moda", "ASC");
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
    }

	public function get_data_bali_fuso_box($param){
		extract($param);

		$this->db->select ( 'a.*' );
		$this->db->from("sls_publish_rate a");
		$this->db->where("a.area_loading", "BALI");
		$this->db->where("a.moda", "FUSO");
		$this->db->where("a.tipe_box", "BOX");
		//$this->db->order_by("a.area_loading", "ASC");
		$this->db->order_by("a.loading_kota", "ASC");
		$this->db->order_by("a.unloading_kota", "ASC");
		//$this->db->order_by("a.moda", "ASC");
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
    }

	public function get_data_bali_trailer_20($param){
		extract($param);

		$this->db->select ( 'a.*' );
		$this->db->from("sls_publish_rate a");
		$this->db->where("a.area_loading", "BALI");
		$this->db->where("a.moda", "TRAILER 20 FEET");
		$this->db->where("a.tipe_box", "CONTAINER 20");
		//$this->db->order_by("a.area_loading", "ASC");
		$this->db->order_by("a.loading_kota", "ASC");
		$this->db->order_by("a.unloading_kota", "ASC");
		//$this->db->order_by("a.moda", "ASC");
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
    }

	public function get_data_bali_trailer_40($param){
		extract($param);

		$this->db->select ( 'a.*' );
		$this->db->from("sls_publish_rate a");
		$this->db->where("a.area_loading", "BALI");
		$this->db->where("a.moda", "TRAILER 40 FEET");
		$this->db->where("a.tipe_box", "CONTAINER 40");
		//$this->db->order_by("a.area_loading", "ASC");
		$this->db->order_by("a.loading_kota", "ASC");
		$this->db->order_by("a.unloading_kota", "ASC");
		//$this->db->order_by("a.moda", "ASC");
		$query = $this->db->get();
		//debug($this->db->last_query());
		$result = $query->result_array();	

		return $result;
    }

	public function get_paf($id=""){
		$session_data = $this->session->userdata('logged_in');		
		$this->db->distinct();
		$this->db->select ( 'a.*, b.nama_customer' );
        $this->db->from("sls_paf a");
		$this->db->join('customer b', 'a.id_customer = b.id', 'left');
		$this->db->where("a.is_pre_project", 1);
        $query = $this->db->get();
        // debug($this->db->last_query());

        $result = $query->result_array();	

        return $result;
    }
	
	
}

