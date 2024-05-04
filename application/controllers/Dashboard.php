<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper("custom");
		$this->load->model("m_dashboard");
	}

	function index()
	{
		// debug($this->session->userdata('logged_in'));
		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$data['form_title'] = "Home";

			$tanggal = ($this->input->get('tanggal'));
			
			if($tanggal == ""){
				$tanggal = date("Y-m-01");
			}
			
			$data['tanggal_cal'] = explode("-", $tanggal);
			
			$data['tanggal'] = $tanggal;

			//$rs_ots_po_vendor = $this->m_dashboard->get_ots_po_vendor();
			//$data['rs_ots_po_vendor'] = $rs_ots_po_vendor;

			//$rs_ots_so = $this->m_dashboard->get_ots_so();
			//$data['rs_ots_so'] = $rs_ots_so;

			//$rs_ots_inq = $this->m_dashboard->get_ots_inq();
			//$data['rs_ots_inq'] = $rs_ots_inq;

			// $rs_notif = $this->m_dashboard->get_notif();
			// $data['rs_notif'] = $rs_notif;

			// $rs_notif_report = $this->m_dashboard->get_notif_report();
			// $data['rs_notif_report'] = $rs_notif_report;

			// $rs_notif_report_inv = $this->m_dashboard->get_notif_report_inv();
			// $data['rs_notif_report_inv'] = $rs_notif_report_inv;

			// $rs_notif_eng = $this->m_dashboard->get_notif_eng();
			// $data['rs_notif_eng'] = $rs_notif_eng;

			// $rs_notif_inv = $this->m_dashboard->get_notif_inv();
			// $data['rs_notif_inv'] = $rs_notif_inv;

			// $rs_notif_campaign = $this->m_dashboard->get_notif_campaign();
			// $data['rs_notif_campaign'] = $rs_notif_campaign;

			// $rs_notif_discount = $this->m_dashboard->get_notif_discount();
			// $data['rs_notif_discount'] = $rs_notif_discount;
			
			// $rs_notif_hc = $this->m_dashboard->get_notif_hc();
			// $data['rs_notif_hc'] = $rs_notif_hc;

			// $rs_notif_po_cbg = $this->m_dashboard->get_notif_po_cbg();
			// $data['rs_notif_po_cbg'] = $rs_notif_po_cbg;

			// $rs_notif_po_intrnl = $this->m_dashboard->get_notif_po_intrnl();
			// $data['rs_notif_po_intrnl'] = $rs_notif_po_intrnl;

			// $rs_notif_inv_all = $this->m_dashboard->get_notif_inv_all();
			// $data['rs_notif_inv_all'] = $rs_notif_inv_all;

			// $rs_notif_po_local = $this->m_dashboard->get_notif_po_local();
			// $data['rs_notif_po_local'] = $rs_notif_po_local;

			// $rs_notif_po_central = $this->m_dashboard->get_notif_po_central();
			// $data['rs_notif_po_central'] = $rs_notif_po_central;

			// $rs_notif_po_branch= $this->m_dashboard->get_notif_po_branch();
			// $data['rs_notif_po_branch'] = $rs_notif_po_branch;

			// $rs_notif_po_import = $this->m_dashboard->get_notif_po_import();
			// $data['rs_notif_po_import'] = $rs_notif_po_import;

			// $rs_notif_cust_crdt = $this->m_dashboard->get_notif_cust_crdt();
			// $data['rs_notif_cust_crdt'] = $rs_notif_cust_crdt;

			// $rs_notif_so = $this->m_dashboard->get_notif_so();
			// $data['rs_notif_so'] = $rs_notif_so;

			// $rs_notif_so_brc = $this->m_dashboard->get_notif_so_brc();
			// $data['rs_notif_so_brc'] = $rs_notif_so_brc;

			// $rs_notif_po_cbg_brc = $this->m_dashboard->get_notif_po_cbg_brc();
			// $data['rs_notif_po_cbg_brc'] = $rs_notif_po_cbg_brc;

			// $rs_notif_quote_retail = $this->m_dashboard->get_notif_quote_retail();
			// $data['rs_notif_quote_retail'] = $rs_notif_quote_retail;

			// $rs_notif_quote_interco = $this->m_dashboard->get_notif_quote_interco();
			// $data['rs_notif_quote_interco'] = $rs_notif_quote_interco;

			// $rs_notif_quote_spot = $this->m_dashboard->get_notif_quote_spot();
			// $data['rs_notif_quote_spot'] = $rs_notif_quote_spot;

			// $rs_notif_quote_branch = $this->m_dashboard->get_notif_quote_branch();
			// $data['rs_notif_quote_branch'] = $rs_notif_quote_branch;

			// $rs_notif_all_approval= $this->m_dashboard->get_notif_all_approval();
			// $data['rs_notif_all_approval'] = $rs_notif_all_approval;

			// $rs_notif_all_approval= $this->m_dashboard->get_notif_all_approval();
			// $data['rs_notif_all_approval'] = $rs_notif_all_approval;

			// $rs_notif_approval_bom= $this->m_dashboard->get_notif_approve_bom();
			// $data['rs_notif_approval_bom'] = $rs_notif_approval_bom;

			// $rs_notif_report_eng= $this->m_dashboard->get_notif_report_eng();
			// $data['rs_notif_report_eng'] = $rs_notif_report_eng;

			// $rs_notif_approve_cuti_gm= $this->m_dashboard->get_notif_approve_cuti_gm();
			// $data['rs_notif_approve_cuti_gm'] = $rs_notif_approve_cuti_gm;

			// $rs_notif_approve_izin_gm= $this->m_dashboard->get_notif_approve_izin_gm();
			// $data['rs_notif_approve_izin_gm'] = $rs_notif_approve_izin_gm;

			// $rs_notif_approve_izin_pers_gm= $this->m_dashboard->get_notif_approve_izin_pers_gm();
			// $data['rs_notif_approve_izin_pers_gm'] = $rs_notif_approve_izin_pers_gm;

			// $rs_notif_approve_field_break_gm= $this->m_dashboard->get_notif_approve_field_break_gm();
			// $data['rs_notif_approve_field_break_gm'] = $rs_notif_approve_field_break_gm;

			// $rs_notif_approve_tjg_gm= $this->m_dashboard->get_notif_approve_tjg_gm();
			// $data['rs_notif_approve_tjg_gm'] = $rs_notif_approve_tjg_gm;
			
			// $total_unit = $this->m_dashboard->get_total_unit($data);
			// $data['total_unit'] = $total_unit;
			
			// $total_unit_proses = $this->m_dashboard->get_total_unit_proses($data);
			// $data['total_unit_proses'] = $total_unit_proses;
			
			// $total_sertifikat = $this->m_dashboard->get_total_sertifikat($data);
			// $data['total_sertifikat'] = $total_sertifikat;
			
			// $total_roya = $this->m_dashboard->get_total_roya($data);
			// $data['total_roya'] = $total_roya;
			
			// $total_ajb = $this->m_dashboard->get_total_ajb($data);
			// $data['total_ajb'] = $total_ajb;
			
			// $total_harga_jual = $this->m_dashboard->get_total_harga_jual($data);
			// $data['total_harga_jual'] = $total_harga_jual;
			
			// $total_tahap = $this->m_dashboard->get_total_tahap($data);
			// $data['total_tahap'] = $total_tahap;
			
			// $total_tahap1 = $this->m_dashboard->get_total_tahap1($data);
			// $data['total_tahap1'] = $total_tahap1;
			
			// $total_tahap2 = $this->m_dashboard->get_total_tahap2($data);
			// $data['total_tahap2'] = $total_tahap2;
			
			// $total_tahap3 = $this->m_dashboard->get_total_tahap3($data);
			// $data['total_tahap3'] = $total_tahap3;
			
			// $total_tahap4 = $this->m_dashboard->get_total_tahap4($data);
			// $data['total_tahap4'] = $total_tahap4;
			
			// $total_uang_muka = $this->m_dashboard->get_total_uang_muka($data);
			// $data['total_uang_muka'] = $total_uang_muka;
			
			// $rs_surat_ke_pusat = $this->m_dashboard->get_surat_ke_pusat($data);
			// $data['rs_surat_ke_pusat'] = $rs_surat_ke_pusat;
			
			// $rs_konfirmasi = $this->m_dashboard->get_konfirmasi($data);
			// $data['rs_konfirmasi'] = $rs_konfirmasi;
			
			// $rs_promise = $this->m_dashboard->get_promise($data);
			// $data['rs_promise'] = $rs_promise;
			
			// $rs_unit_ndr = $this->m_dashboard->get_unit_ndr($data);
			// $data['rs_unit_ndr'] = $rs_unit_ndr;
			
			
			// debug($data);

			$this->load->view('component/header', $data);
			$this->load->view('dashboard/index', $data);
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
		
		$result = $this->m_dashboard->simpan_data($data, $data["id"]);
		
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