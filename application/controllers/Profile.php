<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {
	
	private $class_name = "profile";
	private $form_title = "Profile User";
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper("custom");
		$this->load->model("m_user");
		$this->load->library('upload');
	}

	function index()
	{
		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			// if(user_access_modul($session_data['id'], "9", "bview")==false){restricted_area();}

			//$data['username'] = $session_data['username'];
			//if(!check_hak_akses($session_data['id'], $this->class_name)){
				//$this->session->set_flashdata('tipe', 'danger');
				//$this->session->set_flashdata('msg', 'Anda tidak memiliki hak akses.');
				//redirect('home', 'refresh');
			//}
			
			$data['form_title'] = $this->form_title;
			$data['class_name'] = $this->class_name;
			
			$id = $session_data['id'];

			if($id != ""){
				$results = $this->m_user->get_user($id);
			}
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
function simpan() {			
		$error = "";
		$data["id"] = $this->input->post('id');
		$data["user_id"] = $this->input->post('user_id');
		if($this->input->post('passwd')!=""){
			$data["passwd"] = md5($this->input->post('passwd'));			
		}
		$data["nama_user"] = $this->input->post('nama_user');
		$data["email"] = $this->input->post('email');
		$data["no_hp"] = $this->input->post('no_hp');
		$data["foto"] = "avatar2.png";
		$data["ttd"] = $this->input->post('ttd');
		// $data["id_jabatan"] = $this->input->post('id_jabatan');

		//== UPLOAD ==//
		$config['upload_path'] = './upload/';
		$config['allowed_types'] = '*';
		$config['max_size'] = '20480'; //20mb
		$config['file_name'] = 'attach1_' . date("YmdHis");
		$config['overwrite'] = true;		

		$this->upload->initialize($config);
		
		if($this->upload->do_upload('foto')){
			$image_bukti = $this->upload->data();
			$data["foto"] = $image_bukti['file_name'];
		}
		
		$config['file_name'] = 'attach2_' . date("YmdHis");
		$this->upload->initialize($config);

		if($this->upload->do_upload('ttd')){
			$image_bukti = $this->upload->data();
			$data["ttd"] = $image_bukti['file_name'];
		}
		
		$config['file_name'] = 'attach3_' . date("YmdHis");
		$this->upload->initialize($config);
				
		$result = 0;
		
		$result = $this->m_user->simpan_data($data, $data["id"]);
		
		if($result==1){			
			$this->session->set_flashdata('tipe', 'success');
			$this->session->set_flashdata('msg', 'Data telah tersimpan.');
		} else {			
			$this->session->set_flashdata('tipe', 'error');
			$this->session->set_flashdata('msg', 'Data gagal tersimpan.');
		}
		
		redirect('logout/', 'refresh');
	}

}

?>
