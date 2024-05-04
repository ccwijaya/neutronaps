<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	private $class_name = "user";
	private $form_title = "Master User";
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper("custom");
		$this->load->model("m_user");

	}

	function index()
	{
		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			// if(user_access_modul($session_data['id'], "9", "bview")==false){restricted_area();}

			$data['username'] = $session_data['username'];
			if(!check_hak_akses($session_data['id'], $this->class_name)){
				$this->session->set_flashdata('tipe', 'danger');
				$this->session->set_flashdata('msg', 'Anda tidak memiliki hak akses.');
				redirect('home', 'refresh');
			}
			
			$data['form_title'] = $this->form_title;
			$data['class_name'] = $this->class_name;

			$results = $this->m_user->get_user();
			$data['results'] = $results;

			$this->load->view('component/header', $data);
			$this->load->view($data['class_name'] . '/index', $data);
			$this->load->view('component/jsclass', $data);
			$this->load->view('component/footer', $data);
		}
		else
		{
			//If no session, redirect to login page
			redirect('login', 'refresh');
		}
	}
	
	function entry() {
		if($this->session->userdata('logged_in'))
		{
			$results = "";
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$data['form_title'] = $this->form_title;
			$data['class_name'] = $this->class_name;
			
			$id = $this->input->get('id');
			$rs_cabang = $this->m_user->get_cabang();
			$rs_level = $this->m_user->get_level();
			$rs_menu_list = $this->m_user->get_menu_list();
			//$rs_web_user_menu = $this->m_user->get_web_user_menu();
			
			if($id != ""){
				$results = $this->m_user->get_user($id);
			}
			$data['results'] = $results;
			$data['rs_cabang'] = $rs_cabang;
			$data['rs_level'] = $rs_level;
			$data['rs_menu_list'] = $rs_menu_list;
			//$data['rs_web_user_menu'] = $rs_web_user_menu;

			$this->load->view('component/header', $data);
			$this->load->view($data['class_name'] . '/entry', $data);
			$this->load->view('component/jsclass', $data);
			$this->load->view('component/footer', $data);
		}
		else
		{
			//If no session, redirect to login page
			redirect('login', 'refresh');
		}
	}
	
	function simpan() {			
		$error = "";
		$data["id"] = $this->input->post('id');
		$result = 0;
		
		if (strpos($this->input->post('user_id'), ' ') > 0) {
			// echo 'A white space exists between the string';
		}
		else
		{
			// echo 'There is no white space in the string';
			$data["user_id"] = $this->input->post('user_id');
			$data["id_level"] = $this->input->post('id_level');
			$data["passwd"] = $this->input->post('passwd');
			$data["nama_user"] = $this->input->post('nama_user');
			$data["email"] = $this->input->post('email');
			$data["no_hp"] = $this->input->post('no_hp');
			$data["id_cabang"] = $this->input->post('id_cabang');
			
			
			$result = $this->m_user->simpan_data($data, $data["id"]);
	
		}
		
		if($result!=0){
			//$result = $this->m_inv_formula_assy->reset_formula_induk($data["id"]);

			$this->session->set_flashdata('tipe', 'success');
			$this->session->set_flashdata('msg', 'Data telah tersimpan.');
		} else {			
			$this->session->set_flashdata('tipe', 'error');
			$this->session->set_flashdata('msg', 'Data gagal tersimpan.');
		}
		
		redirect('user/', 'refresh');
	}

	
	function delete_data() {
		
		$id = $this->input->get('id');
		$result = 0;
		
		$result = $this->m_user->delete_data($id);		
		
		if($result==1){			
			$this->session->set_flashdata('tipe', 'success');
			$this->session->set_flashdata('msg', 'Data telah dihapus.');
		} else {
			$this->session->set_flashdata('tipe', 'error');
			$this->session->set_flashdata('msg', 'Data gagal dihapus.');
			// break;
		}
	
		redirect('user/', 'refresh');
	}
	
}

?>