<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Component extends CI_Controller {

	private $class_name = "component";
	private $form_title = "component";
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper("custom");
		$this->load->model("m_component");
		$this->load->library('fpdf_master');
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

			$results = $this->m_component->get_data();
			$data['results'] = $results;
			
			$rs_ultah = $this->m_component->get_data_ultah();
			$data['rs_ultah'] = $rs_ultah;
			// $rs_notif = $this->m_component->get_notif();
			// $data['rs_notif'] = $rs_notif;
			
			

			// $rs_notif_approval_bom = $this->m_component->get_notif_approve_bom();
			// $data['rs_notif_approval_bom'] = $rs_notif_approval_bom;


			//$this->load->view('component/header', $data);
			$this->load->view($data['class_name'] . '/header', $data);
			//$this->load->view('component/jsclass', $data);
			//$this->load->view('component/footer', $data);
		}
		else
		{
			//If no session, redirect to login page
			redirect('login', 'refresh');
		}
	}

	
	
	
	
}

?>