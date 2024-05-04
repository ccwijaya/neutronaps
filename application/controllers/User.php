<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	private $class_name = "user";
	private $form_title = "Master User";
	
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
			//$rs_karyawan = $this->m_user->get_karyawan();
			$rs_level = $this->m_user->get_level();
			$rs_menu = $this->m_user->get_menu_list_new();
			$rs_menu_cs = $this->m_user->get_menu_list_cs();
			
			if($id != ""){
				//$results = $this->m_user->get_user($id);
				$rs_menu = $this->m_user->get_menu_list_edit($id);
				$results = $this->m_user->get_user_by_id($id);
			}
			$data['results'] = $results;
			$data['rs_cabang'] = $rs_cabang;
			//$data['rs_karyawan'] = $rs_karyawan;
			$data['rs_level'] = $rs_level;
			$data['rs_menu'] = $rs_menu;
			$data['rs_menu_cs'] = $rs_menu_cs;

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
//debug($this->input->post());
		//$error = "";
		$data["id"] = $this->input->post('id');
		
		
		//if (strpos($this->input->post('user_id'), ' ') > 0) {
			// echo 'A white space exists between the string';
		//}
		//else
		//{
			// echo 'There is no white space in the string';
			$data["user_id"] = $this->input->post('user_id');
			$data["id_karyawan"] = $this->input->post('id_karyawan');
			$data["level_jabatan"] = $this->input->post('level_jabatan');
			//if($data["id"]==""){
				$data["passwd"] = md5($this->input->post('passwd'));
			//}
			
			$data["nama_user"] = $this->input->post('nama_user');
			$data["email"] = $this->input->post('email');
			$data["no_hp"] = $this->input->post('no_hp');
			$data["id_cabang"] = $this->input->post('id_cabang');
			$data["id_level"] = $this->input->post('id_level');
			$data["is_cat_customer"] = $this->input->post('is_cat_customer');
			$data["akses_harga_jual"] = $this->input->post('akses_harga_jual');
			$data["akses_input_harga"] = $this->input->post('akses_input_harga');
			$data["warehouse"] = $this->input->post('warehouse');
			$data["trucking"] = $this->input->post('trucking');
			$data["vm"] = $this->input->post('vm');
			$data["pa"] = $this->input->post('pa');
			$data["cs_branch"] = $this->input->post('cs_branch');
			$data["inv_branch"] = $this->input->post('inv_branch');
			$data["inv"] = $this->input->post('inv');
			$data["sls"] = $this->input->post('sls');
			$data["eng"] = $this->input->post('eng');
			$data["hrd"] = $this->input->post('hrd');
			$data["driver"] = $this->input->post('driver');
			$data["gm"] = $this->input->post('gm');
			$data["main_menu"] = $this->input->post('main_menu');
			$data["ywp"] = $this->input->post('ywp');
			$data["stg"] = $this->input->post('stg');
			$data["ops"] = $this->input->post('ops');
			$data["acc"] = $this->input->post('acc');
			$data["po_account"] = $this->input->post('po_account');
			$data["verify"] = $this->input->post('verify');
			$data["approval"] = $this->input->post('approval');
			$data["delete_akses"] = $this->input->post('delete_akses');
			$data["foto"] = "avatar2.png";
			$data["dash_home"] = $this->input->post('dash_home');

			//== UPLOAD ==//
			$config['upload_path'] = './asset/ace/images/avatars';
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
		//}

		
		
		if($result==1){
			
			$result = $this->m_user->reset_data($data["id"]);
			
			foreach($_POST as $i => $stuff) {
				if (strpos($i, 'menu_') !== false) {
					$id_menu = str_replace("menu_", "", $i);
					// var_dump($i);
					// var_dump($stuff);
					// echo "<br>";
					$data_detail["id_user"] = $data["id"];
					$data_detail["id_menu"] = $id_menu;
					$result = $this->m_user->simpan_data_detail($data_detail);	
				}
					
			}

			$this->session->set_flashdata('success', 'Data Saved');  
		} else {
			$this->session->set_flashdata('error', 'Data Not Saved.');
		}
		
		redirect($this->class_name . '/entry?id=' . $data['id'], 'refresh');
	}

	function get_menu_list_edit() {
		$data["id"] = $this->input->get('id');
		$results = $this->m_user->get_menu_list_edit($data);
		echo json_encode($results);
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
