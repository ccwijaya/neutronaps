<?php if ( ! defined('BASEPATH')) exit('no direct script access allowed');

class Salesman extends CI_Controller {

    private $class_name = "salesman";
    private $form_title = "Master Salesman";

    function __construct()
    {
        parent::__construct();
        $this->load->helper('custom');
        $this->load->model('m_salesman');

    }

    function index()
    {
        if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');

			$data['username'] = $session_data['username'];
			if(!check_hak_akses($session_data['id'], $this->class_name)){
				$this->session->set_flashdata('tipe', 'danger');
				$this->session->set_flashdata('msg', 'Anda tidak memiliki hak akses.');
				redirect('home', 'refresh');
			}
			
            $data['form_title'] = $this->form_title;
            $data['class_name'] = $this->class_name;

            $results = $this->m_salesman->get_data();
			$data['results'] = $results;
			
			// $rs_notif = $this->m_salesman->get_notif();
			// $data['rs_notif'] = $rs_notif;

			// $rs_notif_report = $this->m_salesman->get_notif_report();
			// $data['rs_notif_report'] = $rs_notif;


			// $rs_notif_inv = $this->m_salesman->get_notif_inv();
			// $data['rs_notif_inv'] = $rs_notif_inv;


            $this->load->view('component/header', $data);
            $this->load->view($data['class_name']. '/index', $data);
            $this->load->view('component/jsclass', $data);
            $this->load->view('component/footer', $data);
        }
        else
        {
            redirect('login','refersh');
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
			// $rs_notif = $this->m_salesman->get_notif();
			// $rs_notif_report = $this->m_salesman->get_notif_report();
			// $rs_notif_inv = $this->m_salesman->get_notif_inv();
            $rs_cabang = $this->m_salesman->get_cabang();
			
			if($id != ""){
				$results = $this->m_salesman->get_data($id);
			}
			// $data['rs_notif'] = $rs_notif;
			// $data['rs_notif_report'] = $rs_notif_report;
			// $data['rs_notif_inv'] = $rs_notif_inv;
			$data['results'] = $results;
			$data['rs_cabang'] = $rs_cabang;

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
		$error = "";
		$data["id"] = $this->input->post('id');
		$result = 0;
		
		if (strpos($this->input->post('salesman_id'), ' ') > 0) {
			// echo 'A white space exists between the string';
		}
		else
		{
			// echo 'There is no white space in the string';
			$data["salesman_id"] = $this->input->post('salesman_id');
			$data["nama_salesman"] = $this->input->post('nama_salesman');
			$data["no_hp"] = $this->input->post('no_hp');
			$data["email"] = $this->input->post('email');
            $data["keterangan"] = $this->input->post('keterangan');
            $data["id_cabang"] = $this->input->post('id_cabang');
            $data["is_active"] = $this->input->post('is_active');
            $data["account"] = $this->input->post('account');
			
			
			$result = $this->m_salesman->simpan_data($data, $data["id"]);
		}
	
		if($result!=0){			
			$this->session->set_flashdata('success', 'Data Saved');  
		} else {
			$this->session->set_flashdata('error', 'Data Not Saved.');
		}
		
		redirect($this->class_name . '/entry?id=' . $data['id'], 'refresh');
	}

	
	function delete_data() {
		
		$id = $this->input->get('id');
		$result = 0;
		
		$result = $this->m_salesman->delete_data($id);		
		
		if($result==1){			
			$this->session->set_flashdata('success', 'Data Success Deleted');  
		} else {
			$this->session->set_flashdata('error', 'Data Not Deleted.');
		}
	
		redirect($this->class_name . '/index?id=' . $data['id'], 'refresh');
	}
	
	
}

?>

