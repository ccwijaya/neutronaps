<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sls_po_customer extends CI_Controller {

	private $class_name = "sls_po_customer";
	private $form_title = "PO Customer";
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper("custom");
		$this->load->model("m_sls_po_customer");
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

			$results = $this->m_sls_po_customer->get_data();
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
			//$rs_cabang = $this->m_sls_po_customer->get_cabang();
			//$rs_act_setting = $this->m_sls_po_customer->get_act_setting();
			//$rs_segment = $this->m_sls_po_customer->get_segment();
			$rs_quotation = $this->m_sls_po_customer->get_quotation($id);
			$rs_customer = $this->m_sls_po_customer->get_customer($id);
			$rs_detail_rr = $this->m_sls_po_customer->get_detail_rr($id);
			$rs_cabang = $this->m_sls_po_customer->get_cabang($id);
			$rs_produk_jasa = $this->m_sls_po_customer->get_produk_jasa($id);
			$rs_produk_jasa_detail = $this->m_sls_po_customer->get_produk_jasa_detail($id);
			$rs_sales = $this->m_sls_po_customer->get_sales($id);
			
			
			
			//debug($rs_product);
			

			//$rs_satuan = $this->m_sls_po_customer->get_satuan();
			// debug($rs_customer);
			//$rs_detail_pretelan = $this->m_sls_inquiry->get_detail_pretelan($id);
			
			if($id != ""){
				$results = $this->m_sls_po_customer->get_data($id);
				// debug($rs_customer);
			}
			$data['results'] = $results;
			$data['rs_cabang'] = $rs_cabang;
			$data['rs_quotation'] = $rs_quotation;
			$data['rs_produk_jasa'] = $rs_produk_jasa;
			$data['rs_produk_jasa_detail'] = $rs_produk_jasa_detail;
			$data['rs_sales'] = $rs_sales;
			$data['rs_customer'] = $rs_customer;
			//$data['rs_salesman'] = $rs_salesman;
			//$data['rs_db_customer'] = $rs_db_customer;
			$data['rs_detail_rr'] = $rs_detail_rr;
			
			
			
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
			
			
			$data["rs_data"] = $this->m_sls_po_customer->get_data($id);
			//$data["rs_detail"] = $this->m_sls_po_customer->get_detail($id);
			$data["rs_detail_print"] = $this->m_sls_po_customer->get_detail_print($id);
			// debug($rs_data);
			//$data["results"] = $this->m_sls_po_customer->get_data($id);

			$this->load->view($data['class_name'] . '/print_out', $data);
			
		}
		else
		{
			redirect('login', 'refresh');
		}
	}

	function get_pelanggan_by_id() {
		$data["id"] = $this->input->get('id');
		$results = $this->m_sls_po_customer->get_pelanggan_by_id($data);
		echo json_encode($results);
	
	}

	function get_quote_detail_by_id() {
		$data["id"] = $this->input->get('id');
		$results = $this->m_sls_po_customer->get_quote_detail_by_id($data);
		echo json_encode($results);
	
	}

	function get_produk_jasa_detail_by_id() {
		$data["id"] = $this->input->get('id');
		$results = $this->m_sls_po_customer->get_produk_jasa_detail_by_id($data);
		echo json_encode($results);
	
	}

	
	function simpan() {
		// debug($this->input->post());
		$data["id"] = $this->input->post('id');
		if($data["id"]==""){
			// $data["no_bukti"] = $this->input->post('no_bukti');
			$data["no_bukti"] = "NMA-SRT-" . date('d') . "-" . date('m') . date('y') . "-" . addzero(get_last_counter("NMA-SRT" . date('Y-m-d')), 3);
			// YPH-FP-Q-23-0320-001
		}
		$data["id_quotation"] = $this->input->post('id_quotation');
		$data["nama_sales"] = $this->input->post('nama_sales');
		$data["id_cabang"] = $this->input->post('id_cabang');
		$data["tanggal"] = db_date($this->input->post('tanggal'));
		$data["id_customer"] = $this->input->post('id_customer');
		$data["id_produk_jasa"] = $this->input->post('id_produk_jasa');
		$data["keterangan"] = $this->input->post('keterangan');
		$data["no_reff"] = $this->input->post('no_reff');
		$data["id_shipper"] = $this->input->post('id_shipper');
		$data["consignee"] = $this->input->post('consignee');
		$data["alamat_consignee"] = $this->input->post('alamat_consignee');
		$data["notify_party"] = $this->input->post('notify_party');
		$data["alamat_notify_party"] = $this->input->post('alamat_notify_party');
		$data["vessel"] = $this->input->post('vessel');
		$data["pol"] = $this->input->post('pol');
		$data["pod"] = $this->input->post('pod');
		$data["dog"] = $this->input->post('dog');
		$data["weight"] = $this->input->post('weight');


		//$data["status_approve"] = 0;
		

		// debug($this->input->post());
		$result = 0;
		$result = $this->m_sls_po_customer->simpan_data($data, $data["id"]);	

		if($result!=0){
			
			$result = $this->m_sls_po_customer->reset_data($data["id"]);
			//$result = $this->m_sls_po_customer->reset_data_pic($data["id"]);
			
			if($this->input->post('combo_produk_jasa_detail') != ""){
				$a_combo_produk_jasa_detail = $this->input->post('combo_produk_jasa_detail');
				$a_harga = $this->input->post('harga');
				
				

				// debug($a_id_nama_harga);
				
				
				for($i=0;$i<count($a_combo_produk_jasa_detail);$i++){
					// debug(count());
					$data_detail["id_po_customer"] = $data["id"];
					$data_detail["id_produk_jasa_detail"] = $a_combo_produk_jasa_detail[$i];
					$data_detail["harga"] = db_numeric($a_harga[$i]);
				
					
					
					
					
					

					//debug($data_detail);

					
					$result = $this->m_sls_po_customer->simpan_data_detail($data_detail);	
				}
			}

			// if($this->input->post('nama_pic') != ""){
			// 	$a_nama_pic = $this->input->post('nama_pic');
			// 	$a_department_pic = $this->input->post('department_pic');
			// 	$a_department_position = $this->input->post('department_position');
				
			// 	for($i=0;$i<count($a_nama_pic);$i++){
			// 		// debug(count());
			// 		$data_pic["id_sales_visit_report"] = $data["id"];
			// 		$data_pic["nama_pic"] = $a_nama_pic[$i];
			// 		$data_pic["department_pic"] = $a_department_pic[$i];
			// 		$data_pic["department_position"] = $a_department_position[$i];
					
			// 		$result = $this->m_sls_po_customer->simpan_data_pic($data_pic);	
			// 	}
			// }
			
			
			
			
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
		
		$result = $this->m_sls_po_customer->delete_data($id);
		
		$result = $this->m_sls_po_customer->reset_data($id);
		//$result = $this->m_sls_po_customer->reset_data_pic($id);
		
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
