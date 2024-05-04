<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends CI_Controller{
	function __construct(){
	  parent::__construct();
	  if($this->session->userdata('logged_in') !== TRUE){
		redirect('login');
	  }
	}
   
	function index(){
	  //Allowing akses to admin only
		if($this->session->userdata('jabatan')==='1'){
			

			$this->load->view('component/header');
			$this->load->view('component/jsclass');
			$this->load->view('component/footer');
		}else{
			echo "Access Denied";
		}
   
	}
   
	function spv_cs(){
	  //Allowing akses to staff only
	  if($this->session->userdata('jabatan')==='2'){
		$this->load->view('component/header');
		$this->load->view('component/jsclass');
		$this->load->view('component/footer');
	  }else{
		  echo "Access Denied";
	  }
	}
   
	function staff_cs(){
	  //Allowing akses to author only
	  if($this->session->userdata('jabatan')==='3'){
		$this->load->view('component/header');
			$this->load->view('component/jsclass');
			$this->load->view('component/footer');
	  }else{
		  echo "Access Denied";
	  }
	}
   
  }

?>