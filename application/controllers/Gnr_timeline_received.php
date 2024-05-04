<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class gnr_timeline_received extends CI_Controller
{
    private $class_name = "gnr_timeline_received";
	private $form_title = "Gnr Timeline Received";
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper("custom");
		$this->load->model("M_gnr_timeline_received");
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

			$results = $this->M_gnr_timeline_received->get_data();
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
			// $rs_cabang = $this->m_sales->get_cabang();

			if($id != ""){
				$results = $this->M_gnr_timeline_received->get_data($id);
			}
			$data['results'] = $results;
			// $data['rs_cabang'] = $rs_cabang;

			$rs_menu = $this->M_gnr_timeline_received->get_menu();
			$data['rs_menu'] = $rs_menu;

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
		if($data["id"]==""){
		// 	// $data["no_bukti"] = $this->input->post('no_bukti');
		$data["ticket_number"] = "PBL-TL-" . addzero(get_last_counter("AR-"), 3);
		// 	// YPH-FP-Q-23-0320-001
		}
				
		//$data["ticket_number"] = "PBL-" . $this->input->post('ticket_number');
		$data["requested_date"] = db_date($this->input->post('requested_date'));
		$data["due_date"] = db_date($this->input->post('due_date'));
		$data["target_date"] = db_date($this->input->post('target_date'));
		$data["requested_by"] = $this->input->post('requested_by');
		$data["requested_position"] = $this->input->post('requested_position');
		$data["module_development"] = $this->input->post('module_development');
		$data["note_request"] = $this->input->post('note_request');
		$data["reason_request"] = $this->input->post('reason_request');
		$data["status"] = $this->input->post('status');
		$data["reason_plus"] = $this->input->post('reason_plus');
		
		// debug($data);
		$result = 0;
		$result = $this->M_gnr_timeline_received->simpan_data($data, $data["id"]);	

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
		
		$result = $this->M_gnr_timeline_received->delete_data($id);		
		
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
