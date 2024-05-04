<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fpdf_master {
		
	public function __construct() {
		
		require_once APPPATH.'third_party/fpdf/Fpdf.php';
		require_once APPPATH.'third_party/fpdf/fpdf_table.php';
		// require_once APPPATH.'third_party/fpdf/fpdf_invoice.php';
		// require_once APPPATH.'third_party/fpdf/mc_table.php';
		
		// $pdf = new FPDF();
		$pdf = new PDF("L", "mm");
		// $pdf = new PDF_MC_Table();
		// $pdf = new PDF_Invoice();
		// $pdf->AddPage();
		
		$CI =& get_instance();
		$CI->fpdf = $pdf;
		
	}
	
}