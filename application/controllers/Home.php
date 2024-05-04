<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper("custom");
		$this->load->model("m_home");
	}

	function index()
	{
		// debug($this->session->userdata('logged_in'));
		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$data['form_title'] = "Home";

			//$param = array();
			
			//$id = $this->input->get('id');

			$tanggal = ($this->input->get('tanggal'));
			
			if($tanggal == ""){
				$tanggal = date("Y-m-01");
			}
			
			$data['tanggal_cal'] = explode("-", $tanggal);
			
			$data['tanggal'] = $tanggal;

			//$rs_paf_sb = $this->m_home->get_paf_sb();
			//$data['rs_paf_sb'] = $rs_paf_sb;

			//$rs_rate_project = $this->m_home->get_rate_project();
			//$data['rs_rate_project'] = $rs_rate_project;

			//$rs_rate_project_detail = $this->m_home->get_rate_project_detail($id);
			//$data['rs_rate_project_detail'] = $rs_rate_project_detail;

			//$rs_paf_progress = $this->m_home->get_paf_progress();
			//$data['rs_paf_progress'] = $rs_paf_progress;
			

			$this->load->view('component/header', $data);
			$this->load->view('home/index', $data);
			$this->load->view('component/jsclass', $data);
			$this->load->view('component/footer2', $data);

		}
		else
		{
		//If no session, redirect to login page
			redirect('login', 'refresh');
		}
	}

	function rate_detail()
	{
		// debug($this->session->userdata('logged_in'));
		if($this->session->userdata('logged_in'))
		{
			$results = "";
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$data['form_title'] = "Home";
			//$data['class_name'] = $this->class_name;
			$param = array();
			
			$id = $this->input->get('id');
			//$rs_cabang = $this->m_profit_margin->get_cabang();
			//$rs_act_setting = $this->m_profit_margin->get_act_setting();
			//$rs_segment = $this->m_profit_margin->get_segment();
			// $rs_rr = $this->m_home->get_rr();
			// $rs_customer = $this->m_home->get_customer($id);
			// $rs_detail_pnl = $this->m_home->get_detail_pnl($id);
			// $rs_cabang = $this->m_home->get_cabang($id);
			// $rs_sales = $this->m_home->get_sales($id);
			// $rs_rute = $this->m_home->get_rute($id);
			// $rs_kategori_kirim = $this->m_home->get_kategori_kirim($id);
			// $rs_jenis_muatan = $this->m_home->get_jenis_muatan($id);

			//$rs_rate_project_detail = $this->m_home->get_rate_project_detail($id);
			//$data['rs_rate_project_detail'] = $rs_rate_project_detail;
			
			//debug($rs_product);
			

			//$rs_satuan = $this->m_profit_margin->get_satuan();
			// debug($rs_customer);
			//$rs_detail_pretelan = $this->m_sls_inquiry->get_detail_pretelan($id);
			
			if($id != ""){
				$results = $this->m_home->get_data($id);
				// debug($rs_customer);
			}
			$data['results'] = $results;
			// $data['rs_cabang'] = $rs_cabang;
			// $data['rs_sales'] = $rs_sales;
			// $data['rs_customer'] = $rs_customer;
			// //$data['rs_salesman'] = $rs_salesman;
			// //$data['rs_db_customer'] = $rs_db_customer;
			// $data['rs_detail_pnl'] = $rs_detail_pnl;
			// $data['rs_rute'] = $rs_rute;
			// $data['rs_kategori_kirim'] = $rs_kategori_kirim;
			// $data['rs_jenis_muatan'] = $rs_jenis_muatan;
			// $data['rs_rr'] = $rs_rr;
			//$data['rs_rate_project_detail'] = $rs_rate_project_detail;
			

			$this->load->view('component/header', $data);
			$this->load->view('home/rate_detail', $data);
			$this->load->view('component/jsclass', $data);
			$this->load->view('component/footer2', $data);

		}
		else
		{
		//If no session, redirect to login page
			redirect('login', 'refresh');
		}
	}



	function change_proyek()
	{
		// debug($this->session->userdata('logged_in'));
		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			
			$id_proyek = ($this->input->get('id_proyek'));
			
			$sess_array = array(
				'id' => $session_data['id'],
				'username' => $session_data['username'],
				'id_proyek' => $id_proyek,					
				'nama_user' => $session_data['nama_user'],					
			);
			$this->session->set_userdata('logged_in', $sess_array);
			
			redirect('home', 'refresh');
		}
		else
		{
		//If no session, redirect to login page
		}
	}
	
	function change_status() {			
		$session_data = $this->session->userdata('logged_in');
		if($this->input->post('id') != ""){
			// if(user_access_modul($session_data['id'], "4", "bupdate")==false){restricted_area();}
		} else {
			// if(user_access_modul($session_data['id'], "4", "binsert")==false){restricted_area();}
		}
		
		$data["id"] = $this->input->get('id');
		$data["status"] = $this->input->get('status');
		
		// debug($data);
		$results = 0;
		$result = 0;
		
		$result = $this->m_home->simpan_data($data, $data["id"]);
		
		if($result==1){			
			$this->session->set_flashdata('tipe', 'success');
			$this->session->set_flashdata('msg', 'Data telah tersimpan.');
		} else {			
			$this->session->set_flashdata('tipe', 'error');
			$this->session->set_flashdata('msg', 'Data gagal tersimpan.');
		}
		
		redirect('home/', 'refresh');
	}
	
	function logout()
	{
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect('home', 'refresh');
	}
	
}

?>
