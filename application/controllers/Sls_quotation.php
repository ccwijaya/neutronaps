<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sls_quotation extends CI_Controller {

	private $class_name = "sls_quotation";
	private $form_title = "Quotation";
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper("custom");
		$this->load->model("m_sls_quotation");
		//$this->load->library('fpdf_master');
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

			$results = $this->m_sls_quotation->get_data();
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
			//$rs_cabang = $this->m_sls_quotation->get_cabang();
			//$rs_act_setting = $this->m_sls_quotation->get_act_setting();
			//$rs_segment = $this->m_sls_quotation->get_segment();
			$rs_rr = $this->m_sls_quotation->get_rr();
			$rs_customer = $this->m_sls_quotation->get_customer($id);
			$rs_detail_pnl = $this->m_sls_quotation->get_detail_pnl($id);
			$rs_cabang = $this->m_sls_quotation->get_cabang($id);
			$rs_sales = $this->m_sls_quotation->get_sales($id);
			$rs_rute = $this->m_sls_quotation->get_rute($id);
			$rs_moda = $this->m_sls_quotation->get_moda($id);
			$rs_kategori_kirim = $this->m_sls_quotation->get_kategori_kirim($id);
			$rs_jenis_muatan = $this->m_sls_quotation->get_jenis_muatan($id);
			$rs_status_koreksi = $this->m_sls_quotation->get_status_koreksi($id);
			$rs_pre_quote = $this->m_sls_quotation->get_pre_quote($id);
			
			//debug($rs_product);
			

			//$rs_satuan = $this->m_sls_quotation->get_satuan();
			// debug($rs_customer);
			//$rs_detail_pretelan = $this->m_sls_inquiry->get_detail_pretelan($id);
			
			if($id != ""){
				$results = $this->m_sls_quotation->get_data($id);
				// debug($rs_customer);
			}
			$data['results'] = $results;
			$data['rs_cabang'] = $rs_cabang;
			$data['rs_sales'] = $rs_sales;
			$data['rs_customer'] = $rs_customer;
			//$data['rs_salesman'] = $rs_salesman;
			//$data['rs_db_customer'] = $rs_db_customer;
			$data['rs_detail_pnl'] = $rs_detail_pnl;
			$data['rs_rute'] = $rs_rute;
			$data['rs_moda'] = $rs_moda;
			$data['rs_kategori_kirim'] = $rs_kategori_kirim;
			$data['rs_jenis_muatan'] = $rs_jenis_muatan;
			$data['rs_rr'] = $rs_rr;
			$data['rs_status_koreksi'] = $rs_status_koreksi;
			$data['rs_pre_quote'] = $rs_pre_quote;
			//$data['rs_detail_pic'] = $rs_detail_pic;
			
			//$data['rs_detail_pretelan'] = $rs_detail_pretelan;

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
	
	
	
	function print_out() {
		if($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');

			$data['username'] = $session_data['username'];
			$data['form_title'] = $this->form_title;
			$data['class_name'] = $this->class_name;			
			$data['total'] = 0;			
			
			$id = $this->input->get('id');
			
			
			$data["rs_data"] = $this->m_sls_quotation->get_data($id);
			$data["rs_detail"] = $this->m_sls_quotation->get_detail($id);
			$data["rs_detail_print"] = $this->m_sls_quotation->get_detail_print($id);
			// debug($rs_data);
			//$data["results"] = $this->m_sls_quotation->get_data($id);

			$this->load->view($data['class_name'] . '/print_out', $data);
			
		}
		else
		{
			redirect('login', 'refresh');
		}
	}

	function print_out_20_ft() {
		if($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');

			$data['username'] = $session_data['username'];
			$data['form_title'] = $this->form_title;
			$data['class_name'] = $this->class_name;			
			$data['total'] = 0;			
			
			$id = $this->input->get('id');
			
			
			$data["rs_data"] = $this->m_sls_quotation->get_data($id);
			$data["rs_detail"] = $this->m_sls_quotation->get_detail($id);
			$data["rs_detail_print"] = $this->m_sls_quotation->get_detail_print($id);
			// debug($rs_data);
			//$data["results"] = $this->m_sls_quotation->get_data($id);

			$this->load->view($data['class_name'] . '/print_out_20_ft', $data);
			
		}
		else
		{
			redirect('login', 'refresh');
		}
	}

	function print_out_20_ft_ff() {
		if($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');

			$data['username'] = $session_data['username'];
			$data['form_title'] = $this->form_title;
			$data['class_name'] = $this->class_name;			
			$data['total'] = 0;			
			
			$id = $this->input->get('id');
			
			
			$data["rs_data"] = $this->m_sls_quotation->get_data($id);
			$data["rs_detail"] = $this->m_sls_quotation->get_detail($id);
			$data["rs_detail_print"] = $this->m_sls_quotation->get_detail_print($id);
			// debug($rs_data);
			//$data["results"] = $this->m_sls_quotation->get_data($id);

			$this->load->view($data['class_name'] . '/print_out_20_ft_ff', $data);
			
		}
		else
		{
			redirect('login', 'refresh');
		}
	}

	function print_out_40_ft() {
		if($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');

			$data['username'] = $session_data['username'];
			$data['form_title'] = $this->form_title;
			$data['class_name'] = $this->class_name;			
			$data['total'] = 0;			
			
			$id = $this->input->get('id');
			
			
			$data["rs_data"] = $this->m_sls_quotation->get_data($id);
			$data["rs_detail"] = $this->m_sls_quotation->get_detail($id);
			$data["rs_detail_print"] = $this->m_sls_quotation->get_detail_print($id);
			// debug($rs_data);
			//$data["results"] = $this->m_sls_quotation->get_data($id);

			$this->load->view($data['class_name'] . '/print_out_40_ft', $data);
			
		}
		else
		{
			redirect('login', 'refresh');
		}
	}

	function print_out_40_ft_ff() {
		if($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');

			$data['username'] = $session_data['username'];
			$data['form_title'] = $this->form_title;
			$data['class_name'] = $this->class_name;			
			$data['total'] = 0;			
			
			$id = $this->input->get('id');
			
			
			$data["rs_data"] = $this->m_sls_quotation->get_data($id);
			$data["rs_detail"] = $this->m_sls_quotation->get_detail($id);
			$data["rs_detail_print"] = $this->m_sls_quotation->get_detail_print($id);
			// debug($rs_data);
			//$data["results"] = $this->m_sls_quotation->get_data($id);

			$this->load->view($data['class_name'] . '/print_out_40_ft_ff', $data);
			
		}
		else
		{
			redirect('login', 'refresh');
		}
	}

	function print_out_fuso() {
		if($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');

			$data['username'] = $session_data['username'];
			$data['form_title'] = $this->form_title;
			$data['class_name'] = $this->class_name;			
			$data['total'] = 0;			
			
			$id = $this->input->get('id');
			
			
			$data["rs_data"] = $this->m_sls_quotation->get_data($id);
			$data["rs_detail"] = $this->m_sls_quotation->get_detail($id);
			$data["rs_detail_print"] = $this->m_sls_quotation->get_detail_print($id);
			// debug($rs_data);
			//$data["results"] = $this->m_sls_quotation->get_data($id);

			$this->load->view($data['class_name'] . '/print_out_fuso', $data);
			
		}
		else
		{
			redirect('login', 'refresh');
		}
	}

	function print_out_cdd_long() {
		if($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');

			$data['username'] = $session_data['username'];
			$data['form_title'] = $this->form_title;
			$data['class_name'] = $this->class_name;			
			$data['total'] = 0;			
			
			$id = $this->input->get('id');
			
			
			$data["rs_data"] = $this->m_sls_quotation->get_data($id);
			$data["rs_detail"] = $this->m_sls_quotation->get_detail($id);
			$data["rs_detail_print"] = $this->m_sls_quotation->get_detail_print($id);
			// debug($rs_data);
			//$data["results"] = $this->m_sls_quotation->get_data($id);

			$this->load->view($data['class_name'] . '/print_out_cdd_long', $data);
			
		}
		else
		{
			redirect('login', 'refresh');
		}
	}

	function print_out_cdd_std() {
		if($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');

			$data['username'] = $session_data['username'];
			$data['form_title'] = $this->form_title;
			$data['class_name'] = $this->class_name;			
			$data['total'] = 0;			
			
			$id = $this->input->get('id');
			
			
			$data["rs_data"] = $this->m_sls_quotation->get_data($id);
			$data["rs_detail"] = $this->m_sls_quotation->get_detail($id);
			$data["rs_detail_print"] = $this->m_sls_quotation->get_detail_print($id);
			// debug($rs_data);
			//$data["results"] = $this->m_sls_quotation->get_data($id);

			$this->load->view($data['class_name'] . '/print_out_cdd_std', $data);
			
		}
		else
		{
			redirect('login', 'refresh');
		}
	}

	function print_out_cde_long() {
		if($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');

			$data['username'] = $session_data['username'];
			$data['form_title'] = $this->form_title;
			$data['class_name'] = $this->class_name;			
			$data['total'] = 0;			
			
			$id = $this->input->get('id');
			
			
			$data["rs_data"] = $this->m_sls_quotation->get_data($id);
			$data["rs_detail"] = $this->m_sls_quotation->get_detail($id);
			$data["rs_detail_print"] = $this->m_sls_quotation->get_detail_print($id);
			// debug($rs_data);
			//$data["results"] = $this->m_sls_quotation->get_data($id);

			$this->load->view($data['class_name'] . '/print_out_cde_long', $data);
			
		}
		else
		{
			redirect('login', 'refresh');
		}
	}

	function print_out_cde_std() {
		if($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');

			$data['username'] = $session_data['username'];
			$data['form_title'] = $this->form_title;
			$data['class_name'] = $this->class_name;			
			$data['total'] = 0;			
			
			$id = $this->input->get('id');
			
			
			$data["rs_data"] = $this->m_sls_quotation->get_data($id);
			$data["rs_detail"] = $this->m_sls_quotation->get_detail($id);
			$data["rs_detail_print"] = $this->m_sls_quotation->get_detail_print($id);
			// debug($rs_data);
			//$data["results"] = $this->m_sls_quotation->get_data($id);

			$this->load->view($data['class_name'] . '/print_out_cde_std', $data);
			
		}
		else
		{
			redirect('login', 'refresh');
		}
	}

	function print_out_minibox() {
		if($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');

			$data['username'] = $session_data['username'];
			$data['form_title'] = $this->form_title;
			$data['class_name'] = $this->class_name;			
			$data['total'] = 0;			
			
			$id = $this->input->get('id');
			
			
			$data["rs_data"] = $this->m_sls_quotation->get_data($id);
			$data["rs_detail"] = $this->m_sls_quotation->get_detail($id);
			$data["rs_detail_print"] = $this->m_sls_quotation->get_detail_print($id);
			// debug($rs_data);
			//$data["results"] = $this->m_sls_quotation->get_data($id);

			$this->load->view($data['class_name'] . '/print_out_minibox', $data);
			
		}
		else
		{
			redirect('login', 'refresh');
		}
	}

	function get_pelanggan_by_id() {
		$data["id"] = $this->input->get('id');
		$results = $this->m_sls_quotation->get_pelanggan_by_id($data);
		echo json_encode($results);
	
	}

	function get_rute_by_id() {
		$data["id"] = $this->input->get('id');
		$results = $this->m_sls_quotation->get_rute_by_id($data);
		echo json_encode($results);
	
	}

	function get_kategori_kirim_by_id() {
		$data["id"] = $this->input->get('id');
		$results = $this->m_sls_quotation->get_kategori_kirim_by_id($data);
		echo json_encode($results);
	
	}

	function get_pq_detail_by_id() {
		$data["id"] = $this->input->get('id');
		$results = $this->m_sls_quotation->get_pq_detail_by_id($data);
		echo json_encode($results);
	
	}

	// function get_segment_by_id_db_customer() {
	// 	$data["id"] = $this->input->get('id');
	// 	// $data["id_cabang"] = $this->input->get('id_cabang');
	// 	$results = $this->m_sls_quotation->get_segment_by_id_db_customer($data);
	// 	echo json_encode($results);
	// }

	
	function simpan() {
		// debug($this->input->post());
		$data["id"] = $this->input->post('id');
		if($data["id"]==""){
			// $data["no_bukti"] = $this->input->post('no_bukti');
			$data["no_bukti"] = "PBL-Q-" . date('d') . "-" . date('m') . date('y') . "-" . addzero(get_last_counter("QUOTATION-" . date('Y-m-d')), 3);
			// YPH-FP-Q-23-0320-001
		}
		//$data["no_pre_quote"] = "PBL-PQ" . date('d') . "-" . date('m') . date('y') . "-" . addzero(get_last_counter("PQ-" . date('Y-m-d')), 3);
		$data["id_paf"] = $this->input->post('id_paf');
		$data["tanggal"] = db_date($this->input->post('tanggal'));
		$data["id_pre_quote"] = $this->input->post('id_pre_quote');
		$data["id_sales"] = $this->input->post('id_sales');
		$data["id_cabang"] = $this->input->post('id_cabang');
		$data["id_customer"] = $this->input->post('id_customer');
		$data["keterangan"] = $this->input->post('keterangan');

		$data["tc_moda"] = $this->input->post('tc_moda');
		$data["is_deal"] = $this->input->post('is_deal');
		if($data["is_deal"]!=1){
			$data["is_nego"] = $this->input->post('is_nego');
		}
		
		$data["is_reject"] = $this->input->post('is_reject');
		//$data["status_proses_q"] = 1;


		//== UPLOAD ==//
		$config['upload_path'] = './upload/';
		$config['allowed_types'] = '*';
		$config['max_size'] = '20480'; //20mb
		$config['overwrite'] = true;	
		
		$config['file_name'] = 'Quotation_App_' . date("YmdHis");	
		$this->upload->initialize($config);
		if($this->upload->do_upload('attach_quote_app')){
			$image_bukti = $this->upload->data();
			$data["attach_quote_app"] = $image_bukti['file_name'];
		}
		
		$config['file_name'] = 'Quotation_Old_' . date("YmdHis");
		$this->upload->initialize($config);
		if($this->upload->do_upload('attach_quote_old')){
			$image_bukti = $this->upload->data();
			$data["attach_quote_old"] = $image_bukti['file_name'];
		}
		
		// debug($this->input->post());
		$result = 0;
		$result = $this->m_sls_quotation->simpan_data($data, $data["id"]);	

		if($result!=0){
			
			$result = $this->m_sls_quotation->reset_data($data["id"]);
			//$result = $this->m_sls_quotation->reset_data_pic($data["id"]);
			
			if($this->input->post('combo_rute_moda') != ""){
				$a_combo_rute_moda = $this->input->post('combo_rute_moda');
				$a_jenis_muatan = $this->input->post('jenis_muatan');
				// $a_pool_pm = $this->input->post('pool_pm');
				// $a_km_pool_pm = $this->input->post('km_pool_pm');
				// $a_km_lan_pm = $this->input->post('km_lan_pm');
				// $a_total_km_pm = $this->input->post('total_km_pm');
				//$a_tempuh_hari_pm = $this->input->post('tempuh_hari_pm');
				//$a_hari_ops = $this->input->post('hari_ops');
				// $a_total_hari_pm = $this->input->post('total_hari_pm');
				// $a_tol_pm = $this->input->post('tol_pm');
				// $a_kapal_pm = $this->input->post('kapal_pm');
				// $a_ratio_pm = $this->input->post('ratio_pm');
				// $a_liter_pm = $this->input->post('liter_pm');
				// $a_harga_ltr_pm = $this->input->post('harga_ltr_pm');
				// $a_total_bbm_pm = $this->input->post('total_bbm_pm');
				// $a_id_kategori_kirim = $this->input->post('id_kategori_kirim');
				// $a_uang_harian_supir_pm = $this->input->post('uang_harian_supir_pm');
				// $a_lembur_supir_pm = $this->input->post('lembur_supir_pm');
				// $a_total_umk_supir_pm = $this->input->post('total_umk_supir_pm');
				// $a_uang_harian_kenek_pm = $this->input->post('uang_harian_kenek_pm');
				// $a_lembur_kenek_pm = $this->input->post('lembur_kenek_pm');
				// $a_total_umk_kenek_pm = $this->input->post('total_umk_kenek_pm');
				
				// $a_bongkar_pm = $this->input->post('bongkar_pm');
				// $a_muat_pm = $this->input->post('muat_pm');
				// $a_mel_pm = $this->input->post('mel_pm');
				// $a_internet_pm = $this->input->post('internet_pm');
				// $a_total_ujp_pm = $this->input->post('total_ujp_pm');
				// $a_asuransi_pm = $this->input->post('asuransi_pm');
				// $a_load_unload_pm = $this->input->post('load_unload_pm');
				// $a_klaim_kerusakan_pm = $this->input->post('klaim_kerusakan_pm');
				// $a_spareparts_pm = $this->input->post('spareparts_pm');	
				// $a_total_varian_cost = $this->input->post('total_varian_cost');
				// $a_fix_cost = $this->input->post('fix_cost');
				$a_total_cost = $this->input->post('total_cost');
				// $a_margin_15 = $this->input->post('margin_15');
				// $a_margin_20 = $this->input->post('margin_20');
				// $a_margin_30 = $this->input->post('margin_30');
				// $a_margin_40 = $this->input->post('margin_40');
				
				$a_volume_trip = $this->input->post('volume_trip');
				$a_tarif_sales = $this->input->post('tarif_sales');
				//$a_reff_sales = $this->input->post('reff_sales');
				// $a_tarif_vendor = $this->input->post('tarif_vendor');
				// $a_margin_vendor = $this->input->post('margin_vendor');
				// $a_persentase_vendor = $this->input->post('persentase_vendor');
				// $a_reff_vendor = $this->input->post('reff_vendor');
				// $a_tarif_platform = $this->input->post('tarif_platform');
				// $a_reff_platform = $this->input->post('reff_platform');
				// $a_tarif_internal = $this->input->post('tarif_internal');
				// $a_reff_internal = $this->input->post('reff_internal');
				$a_tarif_pbl = $this->input->post('tarif_pbl');
				$a_tarif_nego = $this->input->post('tarif_nego');
				$a_status_koreksi = $this->input->post('status_koreksi');
				$a_status_verif = $this->input->post('status_verif');
				

				// debug($a_id_nama_harga);
				
				
				for($i=0;$i<count($a_combo_rute_moda);$i++){
					// debug(count());
					$data_detail["id_quotation"] = $data["id"];
					$data_detail["id_rute"] = $a_combo_rute_moda[$i];
					$data_detail["jenis_muatan"] = $a_jenis_muatan[$i];
					// $data_detail["pool_pm"] = $a_pool_pm[$i];
					// $data_detail["km_pool_pm"] = db_numeric($a_km_pool_pm[$i]);
					// $data_detail["km_lan_pm"] = db_numeric($a_km_lan_pm[$i]);
					// $data_detail["total_km_pm"] = db_numeric($a_total_km_pm[$i]);
					//$data_detail["tempuh_hari_pm"] = db_numeric($a_tempuh_hari_pm[$i]);
					//$data_detail["hari_ops"] = db_numeric($a_hari_ops[$i]);
					// $data_detail["total_hari_pm"] = db_numeric($a_total_hari_pm[$i]);
					// $data_detail["tol_pm"] = db_numeric($a_tol_pm[$i]);
					// $data_detail["kapal_pm"] = db_numeric($a_kapal_pm[$i]);
					// $data_detail["ratio_pm"] = db_numeric($a_ratio_pm[$i]);
					// $data_detail["liter_pm"] = db_numeric($a_liter_pm[$i]);
					// $data_detail["harga_ltr_pm"] = db_numeric($a_harga_ltr_pm[$i]);
					// $data_detail["total_bbm_pm"] = db_numeric($a_total_bbm_pm[$i]);
					// $data_detail["id_kategori_kirim"] = $a_id_kategori_kirim[$i];
					// $data_detail["uang_harian_supir_pm"] = db_numeric($a_uang_harian_supir_pm[$i]);
					// $data_detail["lembur_supir_pm"] = db_numeric($a_lembur_supir_pm[$i]);
					// $data_detail["total_umk_supir_pm"] = db_numeric($a_total_umk_supir_pm[$i]);
					// $data_detail["uang_harian_kenek_pm"] = db_numeric($a_uang_harian_kenek_pm[$i]);
					// $data_detail["lembur_kenek_pm"] = db_numeric($a_lembur_kenek_pm[$i]);
					// $data_detail["total_umk_kenek_pm"] = db_numeric($a_total_umk_kenek_pm[$i]);
					
					// $data_detail["bongkar_pm"] = db_numeric($a_bongkar_pm[$i]);
					// $data_detail["muat_pm"] = db_numeric($a_muat_pm[$i]);
					// $data_detail["mel_pm"] = db_numeric($a_mel_pm[$i]);
					// $data_detail["internet_pm"] = db_numeric($a_internet_pm[$i]);
					// $data_detail["total_ujp_pm"] = db_numeric($a_total_ujp_pm[$i]);
					// $data_detail["asuransi_pm"] = db_numeric($a_asuransi_pm[$i]);
					// $data_detail["load_unload_pm"] = db_numeric($a_load_unload_pm[$i]);
					// $data_detail["klaim_kerusakan_pm"] = db_numeric($a_klaim_kerusakan_pm[$i]);
					// $data_detail["spareparts_pm"] = db_numeric($a_spareparts_pm[$i]);
					// $data_detail["total_varian_cost"] = db_numeric($a_total_varian_cost[$i]);
					// $data_detail["fix_cost"] = db_numeric($a_fix_cost[$i]);
					$data_detail["total_cost"] = db_numeric($a_total_cost[$i]);
					// $data_detail["margin_15"] = db_numeric($a_margin_15[$i]);
					// $data_detail["margin_20"] = db_numeric($a_margin_20[$i]);
					// $data_detail["margin_30"] = db_numeric($a_margin_30[$i]);
					// $data_detail["margin_40"] = db_numeric($a_margin_40[$i]);
					
					$data_detail["volume_trip"] = db_numeric($a_volume_trip[$i]);
					$data_detail["tarif_sales"] = db_numeric($a_tarif_sales[$i]);
					//$data_detail["reff_sales"] = db_numeric($a_reff_sales[$i]);
					// $data_detail["tarif_vendor"] = db_numeric($a_tarif_vendor[$i]);
					// $data_detail["margin_vendor"] = db_numeric($a_margin_vendor[$i]);
					// $data_detail["persentase_vendor"] = db_numeric($a_persentase_vendor[$i]);
					// $data_detail["reff_vendor"] = db_numeric($a_reff_vendor[$i]);
					// $data_detail["tarif_platform"] = db_numeric($a_tarif_platform[$i]);
					// $data_detail["reff_platform"] = db_numeric($a_reff_platform[$i]);
					// $data_detail["tarif_internal"] = db_numeric($a_tarif_internal[$i]);
					// $data_detail["reff_internal"] = db_numeric($a_reff_internal[$i]);
					$data_detail["tarif_pbl"] = db_numeric($a_tarif_pbl[$i]);
					$data_detail["tarif_nego"] = db_numeric($a_tarif_nego[$i]);
					$data_detail["status_koreksi"] = db_numeric($a_status_koreksi[$i]);
					$data_detail["status_verif"] = $a_status_verif[$i];
					
					
					
					
					

					// debug($data_detail);

					
					$result = $this->m_sls_quotation->simpan_data_detail($data_detail);	
				}
			}
				
			$this->session->set_flashdata('success', 'Data Tersimpan');  
		} else {
			$this->session->set_flashdata('error', 'Data gagal tersimpan.');
		}
		
		// redirect($this->class_name . '/', 'refresh');
		redirect($this->class_name . '/entry?id=' . $data['id'], 'refresh');
	}

	
	function delete_data() {
		
		$id = $this->input->get('id');
		$result = 0;
		
		$result = $this->m_sls_quotation->delete_data($id);
		
		$result = $this->m_sls_quotation->reset_data($id);
		//$result = $this->m_sls_quotation->reset_data_pic($id);
		
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
