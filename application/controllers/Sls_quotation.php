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
			//$rs_rr = $this->m_sls_quotation->get_rr();
			$rs_customer = $this->m_sls_quotation->get_customer($id);
			$rs_detail_pnl = $this->m_sls_quotation->get_detail_pnl($id);
			$rs_cabang = $this->m_sls_quotation->get_cabang($id);
			$rs_sales = $this->m_sls_quotation->get_sales($id);
			$rs_produk_jasa_detail = $this->m_sls_quotation->get_produk_jasa_detail();
			$rs_produk_jasa = $this->m_sls_quotation->get_produk_jasa();
			//$rs_moda = $this->m_sls_quotation->get_moda($id);
			//$rs_kategori_kirim = $this->m_sls_quotation->get_kategori_kirim($id);
			//$rs_jenis_muatan = $this->m_sls_quotation->get_jenis_muatan($id);
			//$rs_status_koreksi = $this->m_sls_quotation->get_status_koreksi($id);
			//$rs_pre_quote = $this->m_sls_quotation->get_pre_quote($id);
			
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
			$data['rs_produk_jasa'] = $rs_produk_jasa;
			$data['rs_produk_jasa_detail'] = $rs_produk_jasa_detail;
			//$data['rs_moda'] = $rs_moda;
			//$data['rs_kategori_kirim'] = $rs_kategori_kirim;
			//$data['rs_jenis_muatan'] = $rs_jenis_muatan;
			//$data['rs_rr'] = $rs_rr;
			//$data['rs_status_koreksi'] = $rs_status_koreksi;
			//$data['rs_pre_quote'] = $rs_pre_quote;
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
			$data["no_bukti"] = "PJF-NMA-" . date('d') . "-" . date('m') . date('y') . "-" . addzero(get_last_counter("QUOTATION-" . date('Y-m-d')), 3);
			// YPH-FP-Q-23-0320-001
		}
		$data["tanggal"] = db_date($this->input->post('tanggal'));
		$data["nama_sales"] = $this->input->post('nama_sales');
		$data["id_cabang"] = $this->input->post('id_cabang');
		$data["id_customer"] = $this->input->post('id_customer');
		$data["id_produk_jasa"] = $this->input->post('id_produk_jasa');
		$data["keterangan"] = $this->input->post('keterangan');


		//== UPLOAD ==//
		// $config['upload_path'] = './upload/';
		// $config['allowed_types'] = '*';
		// $config['max_size'] = '20480'; //20mb
		// $config['overwrite'] = true;	
		
		// $config['file_name'] = 'Quotation_App_' . date("YmdHis");	
		// $this->upload->initialize($config);
		// if($this->upload->do_upload('attach_quote_app')){
		// 	$image_bukti = $this->upload->data();
		// 	$data["attach_quote_app"] = $image_bukti['file_name'];
		// }
		
		// $config['file_name'] = 'Quotation_Old_' . date("YmdHis");
		// $this->upload->initialize($config);
		// if($this->upload->do_upload('attach_quote_old')){
		// 	$image_bukti = $this->upload->data();
		// 	$data["attach_quote_old"] = $image_bukti['file_name'];
		// }
		
		// debug($this->input->post());
		$result = 0;
		$result = $this->m_sls_quotation->simpan_data($data, $data["id"]);	

		if($result!=0){
			
			$result = $this->m_sls_quotation->reset_data($data["id"]);
			//$result = $this->m_sls_quotation->reset_data_pic($data["id"]);
			
			if($this->input->post('combo_jasa_detail') != ""){
				$a_combo_jasa_detail = $this->input->post('combo_jasa_detail');
				$a_harga = $this->input->post('harga');
			
				

				// debug($a_id_nama_harga);
				
				
				for($i=0;$i<count($a_combo_jasa_detail);$i++){
					// debug(count());
					$data_detail["id_quotation"] = $data["id"];
					$data_detail["id_produk_jasa_detail"] = $a_combo_jasa_detail[$i];					
					$data_detail["harga"] = db_numeric($a_harga[$i]);
					
					

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
