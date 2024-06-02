<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Produk_Jasa extends CI_Controller {

	private $class_name = "produk_jasa";
	private $form_title = "Master Produk Jasar";
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper("custom");
		$this->load->model("m_produk_jasa");
	}

	function index()
	{
		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			// if(user_access_modul($session_data['id'], "9", "bview")==false){restricted_area();}

			$data['username'] = $session_data['username'];
			// debug(check_hak_akses($session_data['id'], $this->class_name));
			if(!check_hak_akses($session_data['id'], $this->class_name)){
				$this->session->set_flashdata('tipe', 'danger');
				$this->session->set_flashdata('msg', 'Anda tidak memiliki hak akses.');
				redirect('home', 'refresh');
			}
			
			$data['form_title'] = $this->form_title;
			$data['class_name'] = $this->class_name;

			$results = $this->m_produk_jasa->get_data();
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
			$param = array();
			
			$id = $this->input->get('id');
			//$rs_sales = $this->m_produk_jasa->get_sales();
			//$rs_cabang = $this->m_produk_jasa->get_cabang();
			
			if($id != ""){
				$results = $this->m_produk_jasa->get_data($id);
			}
			$data['results'] = $results;
			//$data['rs_sales'] = $rs_sales;
			//$data['rs_cabang'] = $rs_cabang;

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
		$data["id"] = $this->input->post('id');
		$data["kode_produk"] = $this->input->post('kode_produk');
		$data["kode_reg"] = $this->input->post('kode_reg');
		$data["nama_produk"] = $this->input->post('nama_produk');
		$data["deskripsi"] = $this->input->post('deskripsi');;
		// debug($data);
		$result = 0;
		$result = $this->m_produk_jasa->simpan_data($data, $data["id"]);	

		if($result!=0){			
			$this->session->set_flashdata('tipe', 'success');
			$this->session->set_flashdata('msg', 'Data telah tersimpan.');
		} else {			
			$this->session->set_flashdata('tipe', 'error');
			$this->session->set_flashdata('msg', 'Data gagal tersimpan.');
		}
		
		redirect($this->class_name . '/', 'refresh');
	}

	
	function delete_data() {
		
		$id = $this->input->get('id');
		$result = 0;
		
		$result = $this->m_produk_jasa->delete_data($id);		
		
		if($result==1){			
			$this->session->set_flashdata('tipe', 'success');
			$this->session->set_flashdata('msg', 'Data telah dihapus.');
		} else {
			$this->session->set_flashdata('tipe', 'error');
			$this->session->set_flashdata('msg', 'Data gagal dihapus.');
		}
	
		redirect($this->class_name . '/', 'refresh');
	}
	
	
}

?>
