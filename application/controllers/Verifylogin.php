<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Verifylogin extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('user','',TRUE);
		$this->load->helper("custom");
	}

	function index(){
		// debug("X");
		
		//Field validation succeeded.  Validate against database
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		//query the database
		$result = $this->user->login($username, $password);
		// debug(count($result));
		// debug(($result));

		if(count($result)>0){
			$sess_array = array();
			foreach($result as $row){
				$sess_array = array(
					'id' => $row->id,
					'username' => $row->user_id,
					'id_cabang' => $row->id_cabang,
					'id_karyawan' => $row->id_karyawan,
					'id_gudang' => $row->id_gudang,
					'id_sales' => $row->id_sales,						
					'nama_user' => $row->nama_user,	
					'email' => $row->email,
					'pass_email' => $row->pass_email,					
					'id_level' => $row->id_level,
					'is_cat_customer' => $row->is_cat_customer,
					'level_jabatan' => $row->level_jabatan,
					'jabatan' => $row->jabatan,
					'level_izin' => $row->level_izin,
					'id_pengajuan' => $row->id_pengajuan,
					
					'sls' => $row->sls,
					
					'main_menu' => $row->main_menu,
					
					'stg' => $row->stg,
					
					'verify' => $row->verify,
		
					'approval' => $row->approval,

					'edit_akses' => $row->edit_akses,
					'delete_akses' => $row->delete_akses,
					'keterangan' => $row->keterangan,
					'foto' => $row->foto,
					'ttd_pengajuan' => $row->ttd_pengajuan,
					'ttd_pengajuan_check' => $row->ttd_pengajuan_check,
					'ttd' => $row->ttd,
					'dash_home' => $row->dash_home,
					
				
					

				);
				$this->session->set_userdata('logged_in', $sess_array);
			}

			$this->user->tracking_login($row->id);
			// if($row->own!=1){
			// 	redirect('sls_activity_entry_visitor/entry', 'refresh');
			// }
			//if($row->own==1){
				redirect('', 'refresh');
			//}
					
		} else {
			$this->session->set_flashdata('tipe', 'error');
			$this->session->set_flashdata('msg', 'Anda tidak mendapat akses.');
			
			redirect('login', 'refresh');
		}

	}

}
?>
