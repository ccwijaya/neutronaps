
<?php
$session_data = $this->session->userdata('logged_in');
$global_id = $session_data['id'];
$global_username = $session_data['username'];
$global_nama_user = $session_data['nama_user'];
$global_cabang = $session_data['id_cabang'];
//$global_pass_email = $session_data['pass_email'];
//$global_sales = $session_data['id_sales'];
$nowclass = $this->uri->segment('1');

$id = "";
$id_paf = "";
$id_pre_quote = "";
$id_sales = "";
$id_cabang = "";
$no_bukti = "-- AUTO NUMBER --";
$tanggal = date("Y-m-d");
$id_customer = "";
$keterangan = "";
$status_proses_q = "";
$status_approve_q = "";
$attach_quote_app = "";
$attach_quote_old = "";
$tc_moda = "";
$is_nego = "";
$is_deal = "";
$is_reject = "";





if($results != ""){							
	foreach($results as $result){
		$id = $result["id"];
		$id_paf = $result["id_paf"];
		$id_pre_quote = $result["id_pre_quote"];
		$id_sales = $result["id_sales"];
		$id_cabang = $result["id_cabang"];
		$no_bukti = $result["no_bukti"];
		$tanggal = $result["tanggal"];
		$id_customer = $result["id_customer"];
		$keterangan = $result["keterangan"];
		$status_proses_q = $result["status_proses_q"];
		$status_approve_q = $result["status_approve_q"];
		$attach_quote_app = $result["attach_quote_app"];
		$attach_quote_old = $result["attach_quote_old"];
		$tc_moda = $result["tc_moda"];
		$is_nego = $result["is_nego"];
		$is_deal = $result["is_deal"];
		$is_reject = $result["is_reject"];
		

		
	}
}

$digit_decimal = 2;




function numericbox_detail($id, $name, $value){
	$sreturn = '';
	$sreturn .= '<input type="text" style="text-align:right;" step="any" class="form-control numericbox ' . $id . '" id="' . $id . '" name="' . $name . '" value="' . $value . '" >';
	return $sreturn;
}

function numericbox_detail2($id, $name, $value){
	$sreturn = '';
	$sreturn .= '<input type="text" style="text-align:right;" step="any" class="form-control numericbox ' . $id . '" id="' . $id . '" name="' . $name . '" value="' . $value . '" disabled>';
	return $sreturn;
}

function hiddenbox_detail($id, $name, $value){
	$sreturn = '';
	$sreturn .= '<input type="hidden" id="' . $id . '" name="' . $name . '" value="' . $value . '">';
	
	return $sreturn;
}

function textbox_detail($id, $name, $value){
	$sreturn = '';
	$sreturn .= '<input type="text" class="form-control" id="' . $id . '" name="' . $name . '" value="' . $value . '">';
	
	return $sreturn;
}

function textbox_detail2($id, $name, $value){
	$sreturn = '';
	$sreturn .= '<input type="text" class="form-control" id="' . $id . '" name="' . $name . '" value="' . $value . '" disabled>';
	
	return $sreturn;
}

function datepicker_detail($id, $name, $value){
	$sreturn = '';
	// $sreturn .= '<input type="text" class="form-control" id="' . $id . '" name="' . $name . '" value="' . $value . '">';
	$sreturn .= '<input type="text" class="form-control date-picker" data-date-format="dd M yyyy" id="' . $id . '" name="' . $name . '" value="' . $value . '" autocomplete="off">';
	
	return $sreturn;
}

function combo_detail($rs_opsi, $id, $name, $value, $attr){
	$sreturn = "";
	$sreturn .= "<select class='form-control chosen-select' name='".$name."' id='".$id."' ".$attr.">";
	$sreturn .= "<option value=''>--</option>";
	foreach($rs_opsi as $result){                                
		$sreturn .= "<option value='" . $result["id"] . "' " . iif($value==$result["id"], "selected", "") . ">" . $result["nama"] . "</option>";
	}
	$sreturn .= "</select>";
	// debug($sreturn);
	return $sreturn;
}

function combo_detail2($rs_opsi, $id, $name, $value, $attr){
	$sreturn = "";
	$sreturn .= "<select class='form-control chosen-select' name='".$name."' id='".$id."' ".$attr." disabled>";
	$sreturn .= "<option value=''>--</option>";
	foreach($rs_opsi as $result){                                
		$sreturn .= "<option value='" . $result["id"] . "' " . iif($value==$result["id"], "selected", "") . ">" . $result["nama"] . "</option>";
	}
	$sreturn .= "</select>";
	// debug($sreturn);
	return $sreturn;
}

?>



<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="<?php echo base_url();?>">Beranda</a>
				</li>
				<li>
					<a href="<?php echo base_url();?><?php echo $class_name;?>"><?php echo $form_title;?></a>
				</li>
				<!-- <li class="active">Entry Form</li> -->
			</ul><!-- /.breadcrumb -->
		</div>

		<div class="page-content">
			

			<div class="row">
				<div class="col-xs-12">
				<h4 class="lighter">
					<button class="btn btn-primary radius-4" onclick="javascript:$('.submit').click();">
						<i class="ace-icon fa fa-save"></i>Submit
					</button>
					<!-- <a class="btn btn-purple radius-4" target="_blank" href="<?php echo site_url();?><?php echo $class_name;?>/send_email/?id=<?php echo $id;?>">
							<i class="ace-icon fa fa-envelope"></i>Send to Email
						</a> -->
					<!-- <button class="btn btn-info radius-4" type="reset" onclick="location.href='<?php echo site_url();?><?php echo $class_name;?>';">
						<i class="ace-icon fa fa-close"></i>Batal
					</button> -->
					<!-- <?php //if($id!=""){ ?>
						<a class="btn btn-purple <?php echo iif($status_approve_q, "", "disabled"); ?> radius-4" target="_blank" href="<?php echo site_url();?><?php echo $class_name;?>/print_out/?id=<?php echo $id;?>">
						<i class="ace-icon fa fa-print "></i><?php if($status_approve_q !=1){ echo 'Waiting Approve'; } else { echo 'Print Quotation';}?>
					</a>
					<?php //} ?> -->
				
					<?php if($id!="" && $is_nego!=1){ ?>
							<?php if($tc_moda==1){ ?>
								<a class="btn btn-purple radius-4" target="_blank" href="<?php echo site_url();?><?php echo $class_name;?>/print_out_40_ft/?id=<?php echo $id;?>"><i class="ace-icon fa fa-print "></i>Print Quotation</a>
							<?php }?>
							<?php if($tc_moda==2){ ?>
								<a class="btn btn-purple radius-4" target="_blank" href="<?php echo site_url();?><?php echo $class_name;?>/print_out_20_ft/?id=<?php echo $id;?>"><i class="ace-icon fa fa-print "></i>Print Quotation</a>
							<?php }?>
							<?php if($tc_moda==3){ ?>
								<a class="btn btn-purple radius-4" target="_blank" href="<?php echo site_url();?><?php echo $class_name;?>/print_out/?id=<?php echo $id;?>"><i class="ace-icon fa fa-print "></i>Print Quotation</a>
							<?php }?>
							<?php if($tc_moda==4){ ?>
								<a class="btn btn-purple radius-4" target="_blank" href="<?php echo site_url();?><?php echo $class_name;?>/print_out_fuso/?id=<?php echo $id;?>"><i class="ace-icon fa fa-print "></i>Print Quotation</a>
							<?php }?>
							<?php if($tc_moda==5){ ?>
								<a class="btn btn-purple radius-4" target="_blank" href="<?php echo site_url();?><?php echo $class_name;?>/print_out_cdd_long/?id=<?php echo $id;?>"><i class="ace-icon fa fa-print "></i>Print Quotation</a>
							<?php }?>
							<?php if($tc_moda==6){ ?>
								<a class="btn btn-purple radius-4" target="_blank" href="<?php echo site_url();?><?php echo $class_name;?>/print_out_cdd_std/?id=<?php echo $id;?>"><i class="ace-icon fa fa-print "></i>Print Quotation</a>
							<?php }?>
							<?php if($tc_moda==7){ ?>
								<a class="btn btn-purple radius-4" target="_blank" href="<?php echo site_url();?><?php echo $class_name;?>/print_out_cde_long/?id=<?php echo $id;?>"><i class="ace-icon fa fa-print "></i>Print Quotation</a>
							<?php }?>
							<?php if($tc_moda==8){ ?>
								<a class="btn btn-purple radius-4" target="_blank" href="<?php echo site_url();?><?php echo $class_name;?>/print_out_cde_std/?id=<?php echo $id;?>"><i class="ace-icon fa fa-print "></i>Print Quotation</a>
							<?php }?>
							<?php if($tc_moda==9){ ?>
								<a class="btn btn-purple radius-4" target="_blank" href="<?php echo site_url();?><?php echo $class_name;?>/print_out_minibox/?id=<?php echo $id;?>"><i class="ace-icon fa fa-print "></i>Print Quotation</a>
							<?php }?>
							<?php if($tc_moda==10){ ?>
								<a class="btn btn-purple radius-4" target="_blank" href="<?php echo site_url();?><?php echo $class_name;?>/print_out_40_ft_ff/?id=<?php echo $id;?>"><i class="ace-icon fa fa-print "></i>Print Quotation</a>
							<?php }?>
							<?php if($tc_moda==11){ ?>
								<a class="btn btn-purple radius-4" target="_blank" href="<?php echo site_url();?><?php echo $class_name;?>/print_out_20_ft_ff/?id=<?php echo $id;?>"><i class="ace-icon fa fa-print "></i>Print Quotation</a>
							<?php }?>
					<?php } else {
						if($id!=""){?>
						Negotiation Rate Processing...
						<?php }?>
					<?php }?>												
				</h4>

					<form id="formentry" class="form-horizontal" role="form" enctype="multipart/form-data" action="<?php echo base_url();?><?php echo $class_name;?>/simpan" method="post" data-parsley-validate>
					
						<div class="row">
							<div class="col-xs-12">
									<div class="tabbable">
										<ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab">
											<li class="active">
												<a data-toggle="tab" href="#tab1">
													<i class="green ace-icon fa fa-home bigger-120"></i>
													Entry Form
												</a>
											</li>
											<li class="">
												<a data-toggle="" href="<?php echo site_url();?><?php echo $class_name;?>">
													<i class="orange ace-icon fa fa-folder bigger-120"></i>
													Data List
												</a>
											</li>

										</ul>

										<script language=javascript>
										/** After windod Load */  
										$(window).bind("load", function() {  
											window.setTimeout(function() {  
												$(".alert").fadeTo(10000, 0).slideUp(100, function() {  
												$(this).remove();  
												});  
											}, 100);  
											});
										</script>
											
										<?php if($this->session->flashdata('success')){ ?>  
     									<div class="alert alert-success">  
	 									<button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
       									<strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>  
     									</div>  
   										<?php } else if($this->session->flashdata('error')){ ?>  
     									<div class="alert alert-danger">  
       									<a href="#" class="close" data-dismiss="alert">&times;</a>  
											<strong>Error!</strong> <?php echo $this->session->flashdata('error'); ?>  
										</div>  
										<?php }?>
										
										<div class="tab-content">
											
											
										<div id="tab1" class="tab-pane fade in active">
												<div class="col-md-offset-0">
													<div class="row">
															<div class="col-xs-12 col-sm-12">
																<!-- <h2 class="header smaller blue">
																	Input LHC
																</h2> -->
															</div>
													</div>
														<p>
														<p>
													<?php									
													echo texthidden("id", $id);
													echo texthidden("id_paf", $id_paf);
													// echo texthidden("nama_mgr", $global_nama_user);
													// echo texthidden("id_cabang", $global_cabang);
													// echo texthidden("no_act", $no_act);
													//echo texthidden("pass_email", $global_pass_email);
													//debug($id_cabang);
													echo'<div class="row">';
													echo'<div class="col-xs-12 col-sm-1">';
													echo'<label class="block">';
													$param["title"] = "Negotiation";
													$param["name"] = "is_nego";
													//$param["class_column"] = "col-xs-12";
													$param["required"] = "";
													$param["value"] = $is_nego;
													echo checkbox($param);
													unset($param);
													echo'</label>';
													echo'</div>';

													echo'<div class="col-xs-12 col-sm-2">';
													echo'<label class="block">';
													$param["title"] = "Deal";
													$param["name"] = "is_deal";
													//$param["class_column"] = "col-xs-12";
													$param["required"] = "";
													$param["value"] = $is_deal;
													echo checkbox($param);
													unset($param);
													echo'</label>';
													echo'</div>';

													// echo'<div class="col-xs-12 col-sm-2">';
													// echo'<label class="block">';
													// $param["title"] = "Reject";
													// $param["name"] = "is_reject";
													// //$param["class_column"] = "col-xs-12";
													// $param["required"] = "";
													// $param["value"] = $is_reject;
													// echo checkbox($param);
													// unset($param);
													// echo'</label>';
													// echo'</div>';
													echo'</div>';
													
													echo'<div class="row">';
													echo'<div class="col-xs-12 col-sm-3">';
													echo '<label>No. Quotation</label>';
													$param["name"] = "no_bukti";
													//$param["class_column"] = "col-lg-12";
													$param["readonly"] = "Y";
													$param["value"] = $no_bukti;
													echo textbox($param);
													unset($param);
													echo '</div>';

													echo'<div class="col-xs-12 col-sm-2">';
													echo '<label>Date</label>';
													$param["name"] = "tanggal";
													$param["class_column"] = "col-xs-12";
													$param["required"] = "Y";
													$param["value"] = format_date($tanggal);
													echo datepicker($param);
													unset($param);
													echo '</div>';

													echo'<div class="col-xs-12 col-sm-3">';
													echo '<label>Rate Expedition Number</label>';
													$param["name"] = "id_pre_quote";
													//$param["class_column"] = "col-lg-5";
													$param["placeholder"] = "--Select Rate Expedition Number--";
													$param["required"] = "Y";
													$param["value"] = $id_pre_quote;
													$options["0"] = "--Select Rate Expedition Number--";
													foreach ($rs_pre_quote as $data) {
														$options[$data["id"]] = $data["no_bukti"] .' - '. $data["nama_customer"];
													}
													$param["options"] = $options;
													echo combobox($param);
													unset($options);
													echo '</div>';

													echo'<div class="col-xs-12 col-sm-3">';
													echo '<label>Customer</label>';
													$param["name"] = "id_customer";
													//$param["class_column"] = "col-lg-5";
													$param["placeholder"] = "--Pilih Customer--";
													$param["required"] = "Y";
													$param["value"] = $id_customer;
													$options["0"] = "--Pilih Customer--";
													foreach ($rs_customer as $data) {
														$options[$data["id"]] = $data["nama_customer"];
													}
													$param["options"] = $options;
													echo combobox($param);
													unset($options);
													echo '</div>';

													
													echo '</div>';

													// echo'<div class="col-xs-12 col-sm-3">';
													// echo '<label>Cabang Sebelumnya</label>';
													// $param["name"] = "cabang_sebelum";
													// $param["class_column"] = "col-xs-12";
													// $param["required"] = "Y";
													// $param["value"] = $cabang_sebelum;
													// echo textbox($param);
													// unset($param);
													// echo '</div>';

													// echo'<div class="col-xs-12 col-sm-3">';
													// echo '<label>Status Cabang</label>';
													// $param["name"] = "status_cabang";
													// //$param["class_column"] = "col-md-6";
													// $param["placeholder"] = "Select Status";
													// $param["required"] = "Y";
													// $param["value"] = $status_cabang;
													// $options[""] = "Select";
													// $options["Sedang Operasi"] = "Sedang Operasi";
													// $options["Tutup Sementara Untuk Pindah"] = "Tutup Sementara Untuk Pindah";
													// $options["Pindah Lokasi"] = "Pindah Lokasi";
													
													// $param["options"] = $options;
													// echo combobox($param);
													// unset($options);
													// ////echo '</div>';
													// echo '</div>';
													

													echo'<div class="row">';

													

													echo'<div class="col-xs-12 col-sm-3">';
													echo '<label>Cabang</label>';
													$param["name"] = "id_cabang";
													//$param["class_column"] = "col-lg-5";
													$param["placeholder"] = "--Pilih Sales--";
													$param["required"] = "Y";
													$param["value"] = $id_cabang;
													$options["0"] = "--Pilih Sales--";
													foreach ($rs_cabang as $data) {
														$options[$data["id"]] = $data["nama_cabang"];
													}
													$param["options"] = $options;
													echo combobox($param);
													unset($options);
													echo '</div>';

													echo'<div class="col-xs-12 col-sm-3">';
													echo '<label>Sales Name</label>';
													$param["name"] = "id_sales";
													$param["class_column"] = "col-xs-12";
													$param["required"] = "Y";
													$param["value"] = $id_sales;
													echo textbox($param);
													unset($param);
													echo '</div>';
													

													echo'<div class="col-xs-12 col-sm-5">';
													echo '<label>Keterangan</label>';
													$param["name"] = "keterangan";
													$param["class_column"] = "col-xs-12";
													$param["required"] = "";
													$param["value"] = $keterangan;
													echo textarea($param);
													unset($param);
													echo '</div>';
													
													echo '</div>';

													echo'<div class="row">';
													// echo'<div class="col-xs-12 col-sm-3">';
													// echo '<label>Nama Pimpinan</label>';
													// $param["name"] = "nama_pimpinan";
													// $param["class_column"] = "col-xs-12";
													// $param["required"] = "Y";
													// $param["value"] = $nama_pimpinan;
													// echo textbox($param);
													// unset($param);
													// echo '</div>';

													// echo'<div class="col-xs-12 col-sm-3">';
													// echo '<label>No. HP Pimpinan</label>';
													// $param["name"] = "no_hp_pimpinan";
													// $param["class_column"] = "col-xs-12";
													// $param["required"] = "Y";
													// $param["value"] = $no_hp_pimpinan;
													// echo textbox($param);
													// unset($param);
													// echo '</div>';

													
																									
													// echo'<div class="col-xs-12 col-sm-3">';
													// echo '<label>No. HP Manager</label>';
													// $param["name"] = "no_hp_mgr";
													// $param["class_column"] = "col-xs-12";
													// $param["required"] = "Y";
													// $param["value"] = $no_hp_mgr;
													// echo textbox($param);
													// unset($param);
													// echo '</div>';
													echo '</div>';

													// echo'<div class="row">';
													// echo'<div class="col-xs-12 col-sm-3">';
													// echo '<label>Jumlah Staff</label>';
													// $param["name"] = "jumlah_staff";
													// $param["class_column"] = "col-xs-12";
													// $param["required"] = "Y";
													// $param["value"] = $jumlah_staff;
													// echo textbox($param);
													// unset($param);
													// echo '</div>';

													// echo'<div class="col-xs-12 col-sm-3">';
													// echo '<label>Tanggal Kontrak Ruko</label>';
													// $param["name"] = "tgl_kontrak_ruko";
													// $param["class_column"] = "col-xs-12";
													// $param["required"] = "Y";
													// $param["value"] = format_date($tgl_kontrak_ruko);
													// echo datepicker($param);
													// unset($param);
													// echo '</div>';

													// echo'<div class="col-xs-12 col-sm-3">';
													// echo '<label>Tanggal Buka Cabang</label>';
													// $param["name"] = "tgl_soft_opening";
													// $param["class_column"] = "col-xs-12";
													// $param["required"] = "";
													// $param["value"] = format_date($tgl_soft_opening);
													// echo datepicker($param);
													// unset($param);
													// echo '</div>';

													// echo'<div class="col-xs-12 col-sm-3">';
													// echo '<label>Tanggal Habis Kontrak</label>';
													// $param["name"] = "tgl_habis_kontrak";
													// $param["class_column"] = "col-xs-12";
													// $param["required"] = "Y";
													// $param["value"] = format_date($tgl_habis_kontrak);
													// echo datepicker($param);
													// unset($param);
													// echo '</div>';
													
													
													echo '</div>';

													// echo'<div class="row">';
													// echo'<div class="col-xs-12 col-sm-6">';
													// echo '<label>Alamat Cabang</label>';
													// $param["name"] = "alamat_cbg";
													// $param["class_column"] = "col-xs-12";
													// $param["required"] = "Y";
													// $param["value"] = $alamat_cbg;
													// echo textarea($param);
													// unset($param);
													// echo '</div>';

													// echo'<div class="col-xs-12 col-sm-6">';
													// echo '<label>Link Google Maps</label>';
													// $param["name"] = "link_google_maps";
													// $param["class_column"] = "col-xs-12";
													// $param["required"] = "Y";
													// $param["value"] = $link_google_maps;
													// echo textarea($param);
													// unset($param);
													// echo '</div>';
													echo '</div>';

													echo'<div class="row">';
													
													echo '</div>';

													?>
														<p>
										
														<p>
													
												<div class="row">
													<div class="col-xs-12 col-sm-2">
														<label>Attachment Quotation App</label>
														<div class="input-group">
															<div class="custom-file">
															
																<?php echo '<a class="btn btn-success btn-xs" href="' . base_url() . 'upload/' . $attach_quote_app . '" target="_blank">'.$attach_quote_app.'</a>';?>
																<input type="file" id="attach_quote_app" name="attach_quote_app">
																
																
															</div>                      
														</div>
													
													</div>
												  	
													<div class="col-xs-12 col-sm-2">
														<label>Attachment Quotation Old</label>
														<div class="input-group">
															<div class="custom-file">
															
																<?php echo '<a class="btn btn-success btn-xs" href="' . base_url() . 'upload/' . $attach_quote_old . '" target="_blank">'.$attach_quote_old.'</a>';?>
																<input type="file" id="attach_quote_old" name="attach_quote_old">
																
															</div>                      
														</div>
													
													</div>
													<?php
													echo'<div class="col-xs-12 col-sm-3">';
													echo '<label>T&C Moda</label>';
													$param["name"] = "tc_moda";
													//$param["class_column"] = "col-lg-5";
													$param["placeholder"] = "--Pilih Sales--";
													$param["required"] = "Y";
													$param["value"] = $tc_moda;
													$options[""] = "--Select T&C Moda--";
													$options["10"] = "Trailer 40 FF";
													$options["11"] = "Trailer 20 FF";
													$options["1"] = "Trailer 40";
													$options["2"] = "Trailer 20";
													$options["3"] = "Tronton";
													$options["4"] = "Fuso";
													$options["5"] = "CDD Long";
													$options["6"] = "CDD Standar";
													$options["7"] = "CDE Long";
													$options["8"] = "CDE Standar";
													$options["9"] = "L300";
													$param["options"] = $options;
													echo combobox($param);
													unset($options);
													echo '</div>';

													
													?>
												</div>
														<p>
															<p>
											

															<style>
																.text100{
																	width:100%;
																	height:380px;
																	overflow-y:auto;
																	overflow-x:scroll;

																}

																.text101{
																	width:100%;
																	height:500px;
																	overflow-y:auto;
																	overflow-x:scroll;

																}
															</style>
													
															<!-- <a id="btn_add" target="" class="btn btn-sm btn-info" onclick="">Tambah</a>  -->
															<p>
																<div class="text100">
																<table id="list_detail" class="table table-striped table-bordered table-hover" width=100%>
																	<thead>
																		<tr>
																			<th width="50">No.</th>
																			<th width="600">Delivery Route</th>
																			<!-- <th width="200">Moda</th> -->
																			<th width="100">Type Box</th>
																			<!-- <th width="100">Total Cost</th> -->
																			<th width="100">Customer Rate</th>
																			<th width="100">PBL Rate</th>
																			<th width="100">Negotiation Rate</th>
																			<!-- <th width="100">Status</th> -->
																			<th rowspan=2 width="100">Action</th>

																		</tr>
																																					
																		
																		
																	</thead>

																	<tbody>

																	<?php
																	$i=1;
																	//$ver_tarif_sales = 0;
																	//$color = "";
															
																	foreach($rs_detail_pnl as $result){

																		// $tarif_sales = $result["tarif_sales"];
																		// $margin_15 = $result["margin_15"] - 100000;
																		// $margin_20 = $result["margin_20"] - 100000;
																		// $margin_30 = $result["margin_30"] - 100000;
																		// $margin_40 = $result["margin_40"] - 100000;
																		// $color = "";

																		// if($tarif_sales <= $margin_15){
																		// 	$color = "#FF4749";
																		// }
																		
																		// if($tarif_sales >= $margin_15){
																		// 	$color = "#FF4749";
																		// }

																		// if($tarif_sales <= $margin_20){
																		// 	$color = "#FFBE3B";
																		// }
																		// if($tarif_sales >= $margin_20){
																		// 	$color = "#FFBE3B";
																		// }

																		// if($tarif_sales <= $margin_30){
																		// 	$color = "#82FF84";
																		// }

																		// if($tarif_sales >= $margin_30){
																		// 	$color = "#82FF84";
																		// }

																		// if($tarif_sales >= $margin_40){
																		// 	$color = "#549BFF";
																		// }
																		
																		//debug($color);
																		
																		print '<tr>';										
																		print '<td>'.$i.'.</td>';
																		print '<td><input type="hidden" id="combo_rute_moda_'.$i.'" name="combo_rute_moda[]" value="' . $result["id_rute"] . '">' . textbox_detail2("", "", $result["rute"].' | '.$result["unit"]) . '</td>';
																		//print '<td>' . combo_detail2($rs_rute, "combo_rute_moda_".$i, "combo_rute_moda[]", $result["id_rute"], "onchange='change_combo_rute(".$i.");'"). '</td>';
																		//print '<td>' . combo_detail2($rs_moda, "id_moda_".$i, "id_moda[]", $result["id_moda"], "onchange='change_combo_moda(".$i.");'"). '</td>';
																		print '<td align ="center">' . textbox_detail2("jenis_muatan_".$i, "jenis_muatan[]", ($result["jenis_muatan"])) . '</td>';
																		print hiddenbox_detail("total_cost_".$i, "total_cost[]", ($result["total_cost"]), "disabled");
																		//print '<td>' . numericbox_detail("total_cost_".$i, "total_cost[]", format_number($result["total_cost"])) . '</td>';
																		print '<td>' . numericbox_detail2("tarif_sales_".$i, "tarif_sales[]", format_number($result["tarif_sales"])) . '</td>';
																		print '<td>' . numericbox_detail2("tarif_pbl_".$i, "tarif_pbl[]", format_number($result["tarif_pbl"])) . '</td>';
																		print '<td>' . numericbox_detail("tarif_nego_".$i, "tarif_nego[]", format_number($result["tarif_nego"])) . '</td>';
																		// print hiddenbox_detail("status_verif_".$i, "status_verif[]", ($result["status_verif"]), "disabled");
																		//print '<td>' . combo_detail($rs_status_koreksi, "status_koreksi_".$i, "status_koreksi[]", $result["status_koreksi"], ""). '</td>';
																		print '<td class="">
																		<a target="" class="btn btn-xs btn-danger" id="btn_del">Delete</a>
																		</td>';
																		
																		print '</tr>';
																		
																		$i++;
																	}								
																	?>
																
																	
																	</tbody>
																</table>
																
																
																
																
																</div>

																
															
															
															

																	<?php
																	$ix=1;
															
																	//foreach($rs_detail_pic as $result){
																		
																	// 	print '<tr>';										
																	// 	print '<td>'.$ix.'.</td>';
																	// 	print '<td>' . textbox_detail("nama_pic_".$ix, "nama_pic[]", $result["nama_pic"]) . '</td>';
																	// 	print '<td>' . textbox_detail("department_pic_".$ix, "department_pic[]", $result["department_pic"]) . '</td>';
																	// 	print '<td>' . textbox_detail("department_position_".$ix, "department_position[]", $result["department_position"]) . '</td>';	
																	// 	//print '<td>' . numericbox_detail("price_".$i, "price[]", format_number($result["price"])) . '</td>';
																	// 	//print '<td>' . textbox_detail("usage_".$i, "usage[]", $result["usage"]) . '</td>';
																	// 	print '<td class="">
																	// 			<a target="" class="btn btn-xs btn-danger" id="btn_del2">Delete</a>
																	// 		</td>';
																	// 	print '</tr>';
																		
																	//$ix++;
																	//}								
																	?>
																
																	
																	
												
																
																
																</div>
																
														
															
															
												
														<?php 
														
														
														?>
													
	
												</div>
												
													
											</div>
											
											
										</div>	
											
									</div>
									
									<input class="submit btn btn-danger" type="submit" value="Submit" style="display:none;">
									
								</div>
								
						</div>
						
					</form>
					
					
					<!-- PAGE CONTENT ENDS -->
				</div><!-- /.col -->
				
			</div><!-- /.row -->
		</div><!-- /.page-content -->
	</div>
</div><!-- /.main-content -->
<!-- <nav class="navbar navbar-dark bg-success navbar-expand fixed-bottom d-md-none d-lg-none d-xl-none">
    <ul class="navbar-nav nav-justified w-100">
        <li class="nav-item">
            <a href="#" class="nav-link text-center">
                <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-house" fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                    <path fill-rule="evenodd"
                        d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                </svg>
                <span class="small d-block">Home</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link text-center">
                <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z" />
                    <path fill-rule="evenodd"
                        d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z" />
                </svg>
                <span class="small d-block">Search</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link text-center">
                <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-person" fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M10 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                </svg>
                <span class="small d-block">Profile</span>
            </a>
        </li>
    </ul>
</nav> -->


<style>
.chosen-container { width: 100% !important; }

</style>
<script>


//$('.dropdown-toggle').dropdown()

$(document).ready(function(){

	$( "#formentry" ).submit(function() {
		console.log( "Handler for .click() called." );
		$('input, select').prop('disabled', false);
		var is_valid = 1;
		//for(x=1;x<last_counter;x++){
			
			sample_taken = $('#sample_taken').val();
			

			if(sample_taken < 1){
				
				alert("wajib diisi");
				//is_valid = 0;
			}
			
		//}
		if(!is_valid){
			return false;
		}
	});
	$(document).on('focus','input:text', function () {
        var self = $(this);
    })

	.on('blur','input:text', function () {
        var self = $(this),
            val = jQuery.trim(self.val());
			// console.log(self.attr('class').includes("numericbox"));
			if(self.attr('class').includes("numericbox")){
			
				self.val(toRp(val,3));
				
				
				console.log("self:"+self[0].id);
				// console.log(self[0]['íd']);
				
				hitung_total();
			}
    });

	$( "#formentrydetail" ).submit(function() {
		console.log( "Handler for .click() called." );
		$('input, select').prop('disabled', false);
		// return false;
		
		if(cek_part_exists()==false){
			return false;
		}
		
			// return false;
	});

	$("#id_pre_quote").chosen().change(function(){
		$(this).find('option:selected').each(function(){
			var id = $(this).val();
			var text = $(this).text();
			
			last_counter = 1;
			$("#list_detail > tbody").html("");
			
			// console.log("id:"+id);
			// console.log("text:"+text);
			
			$.ajax({
				type: "GET",
				async: false,
				url: "<?php echo base_url(); ?>" + "sls_quotation/get_pq_detail_by_id",			
				data: {id: id},
				dataType: 'json',
				success: function(res) {
					console.log("RES : " + res);
					
					if (res){						
						//== sample json code : [{"id":"1","nama":"aaa - 2020-03-04"},{"id":"2","nama":"asd - 2020-03-05"}] ==//
						//== looping row ==//
						$.each(res, function() {
							//== looping column ==//
						  $.each(this, function(k, v) {
							/// do stuff

							if(k=="id_cabang"){
								$("#id_cabang").val(v);
								$('#id_cabang').trigger("chosen:updated");
							}
						
							if(k=="id_sales"){
								$("#id_sales").val(v);
								//$('#id_sales').trigger("chosen:updated");
							}

							if(k=="id_paf"){
								$("#id_paf").val(v);
								//$('#id_sales').trigger("chosen:updated");
							}

							if(k=="id_customer"){
								$("#id_customer").val(v);
								$('#id_customer').trigger("chosen:updated");
							}
							
							if(k=="id_rute"){
								console.log("id_rute : " + v);
								
								add_row_detail();
								
								$("#combo_rute_moda_" + (last_counter-1)).val(v);
								$("#combo_rute_moda_" + (last_counter-1)).trigger("chosen:updated");
								
								//change_combo_rute(last_counter-1);
							}

							if(k=="id_moda"){
								console.log("id_moda : " + v);
								
								add_row_detail();
								
								$("#id_moda_" + (last_counter-1)).val(v);
								$("#id_moda_" + (last_counter-1)).trigger("chosen:updated");
								
								//change_combo_rute(last_counter-1);
							}

							if(k=="tipe_box"){
								// var xx = $("#is_pembulatan").val();
								// console.log("xx:"+xx);
								// if(xx==1){
								// 	digit_decimal = 0;
								// } else {
								// 	digit_decimal = 2;
								// }
								$("#jenis_muatan_" + (last_counter-1)).val(v);
							}

							if(k=="tarif_approved"){
								// var xx = $("#is_pembulatan").val();
								// console.log("xx:"+xx);
								// if(xx==1){
								// 	digit_decimal = 0;
								// } else {
								// 	digit_decimal = 2;
								// }
								$("#tarif_pbl_" + (last_counter-1)).val(toRp(v, 0));
							}

							if(k=="total_cost"){
								// var xx = $("#is_pembulatan").val();
								// console.log("xx:"+xx);
								// if(xx==1){
								// 	digit_decimal = 0;
								// } else {
								// 	digit_decimal = 2;
								// }
								$("#total_cost_" + (last_counter-1)).val(toRp(v, 0));
							}

							if(k=="tarif_sales"){
								
								$("#tarif_sales_" + (last_counter-1)).val(toRp(v, 0));
							}

							
							console.log(k + " : " + v);
						  });
						});
					}
				}
			});
			
			//hitung_total();
			//change_combo_rute(xcounter);
			
			// console.log("last counter detail : " + last_counter);
			// console.log("last counter jasa : " + last_counter_jasa);
			
		
		});
	});

	$("#id_customer").chosen().change(function(){
		$(this).find('option:selected').each(function(){
			var id = $(this).val();
			var text = $(this).text();
			
			console.log(id);
			// console.log(text);
			$.ajax({
				type: "GET",
				async: false,
				url: "<?php echo base_url(); ?>" + "/sls_quotation/get_pelanggan_by_id",			
				data: {id: id},
				dataType: 'json',
				success: function(res) {
					console.log("RES : " + res);
					
					if (res){
						//== sample json code : [{"id":"1","nama":"aaa - 2020-03-04"},{"id":"2","nama":"asd - 2020-03-05"}] ==//
						//== looping row ==//
						$.each(res, function() {
							//== looping column ==//
						  $.each(this, function(k, v) {
							/// do stuff
							if(k=="id_cabang"){
								$("#id_cabang").val(v);
								$('#id_cabang').trigger("chosen:updated");
							}
						
							if(k=="id_sales"){
								$("#id_sales").val(v);
								$('#id_sales').trigger("chosen:updated");
							}
							
							console.log(k + " : " + v);
						  });

						});
					}
				}
			});
		
		});
    });
	
	

 
 
    $('#btn_add').on( 'click', function () {
		
		add_row_detail();
		//add_row_detail2();
    } );

	$('#btn_add2').on( 'click', function () {
		
		add_row_pic();
    } );
	
	
	
	$("#list_detail").on("click", "#btn_del", function() {
		$(this).closest("tr").remove();
	});

	$("#list_detail2").on("click", "#btn_del2", function() {
		$(this).closest("tr").remove();
	});

	
	$(document).on('focus','input:text', function () {
        var self = $(this);
    })

	hitung_total();
    
});

function change_combo_rute(xcounter){
	console.log("change_combo_rute:" + xcounter);
	var text = $("#combo_rute_moda_"+xcounter+" option:selected").text();
	console.log("text:" + text);

	
	var id_rute = $("#combo_rute_moda_"+xcounter).val();

	
	
	$.ajax({
		type: "GET",
		async: false,
		url: "<?php echo base_url(); ?>" + "sls_quotation/get_rute_by_id",			
		data: {id: id_rute},
		dataType: 'json',
		success: function(res) {
			// console.log("RES : " + res);
			
			if (res){
				//== sample json code : [{"id":"1","nama":"aaa - 2020-03-04"},{"id":"2","nama":"asd - 2020-03-05"}] ==//
				//== looping row ==//
				$.each(res, function() {
					//== looping column ==//
				  $.each(this, function(k, v) {
					/// do stuff

					if(k=="id_moda"){
						$("#id_moda_").val(v);
						$('#id_moda_').trigger("chosen:updated");
					}

					if(k=="tipe_box"){
						$("#jenis_muatan_"+xcounter).val(v);
					}


					if(k=="tarif_approved"){
						$("#tarif_pbl_"+xcounter).val(toRp(v,2));
					}

					if(k=="total_cost"){
						$("#total_cost_"+xcounter).val(toRp(v,2));
					}
					
					// if(k=="satuan_besar"){
					// 	// alert(v);
					// 	satuan_besar = v;
					// 	// $("#combo_satuan_"+xcounter).val(v);
					// 	// $("div.id_100 select").val("val2");
					// }
					
					console.log(k + " : " + v);
				  });
				});
			}
		}
	});
	//hitung_total();
	
	//console.log("satuan_besar:"+satuan_besar);
	// console.log("is_pembulatan:"+is_pembulatan);
	
	//modify_option_combo_satuan(xcounter, satuan_besar);
	// modify_option_combo_nama_harga(xcounter, id_product, default_nama_harga);
	
	// change_combo_nama_harga(xcounter)
	
}

function change_combo_kategori_kirim(xcounter){
	console.log("change_combo_kategori_kirim:" + xcounter);
	var text = $("#id_kategori_kirim_"+xcounter+" option:selected").text();
	console.log("text:" + text);

	
	var id_kategori_kirim = $("#id_kategori_kirim_"+xcounter).val();
	
	
	
	$.ajax({
		type: "GET",
		async: false,
		url: "<?php echo base_url(); ?>" + "profit_margin/get_kategori_kirim_by_id",			
		data: {id: id_kategori_kirim},
		dataType: 'json',
		success: function(res) {
			// console.log("RES : " + res);
			
			if (res){
				//== sample json code : [{"id":"1","nama":"aaa - 2020-03-04"},{"id":"2","nama":"asd - 2020-03-05"}] ==//
				//== looping row ==//
				$.each(res, function() {
					//== looping column ==//
				  $.each(this, function(k, v) {
					/// do stuff
					// if(k=="pool"){
					// 	$("#pool_pm_"+xcounter).val(v);
					// }

					// if(k=="umk_supir"){
					// 	$("#uang_harian_supir_pm_"+xcounter).val(toRp(v,2));
					// }

					// if(k=="total_lembur_supir"){
					// 	$("#lembur_supir_pm_"+xcounter).val(toRp(v,2));
					// }

					// if(k=="umk_kenek"){
					// 	$("#uang_harian_kenek_pm_"+xcounter).val(toRp(v,2));
					// }

					// if(k=="total_lembur_kenek"){
					// 	$("#lembur_kenek_pm_"+xcounter).val(toRp(v,2));
					// }

					// if(k=="bongkar"){
					// 	$("#bongkar_pm_"+xcounter).val(toRp(v,2));
					// }

					// if(k=="muat"){
					// 	$("#muat_pm_"+xcounter).val(toRp(v,2));
					// }

					// if(k=="pulsa"){
					// 	$("#internet_pm_"+xcounter).val(toRp(v,2));
					// }					
					
					console.log(k + " : " + v);
				  });
				});
			}
		}
	});
	hitung_total();
	
	
	
}

function add_row_detail(){
	
	var_append_rute = "";
	var_append_rute += "<tr><td>"+last_counter+".</td>";
	var_append_rute += "<td>"+combo_detail2(rs_rute, "combo_rute_moda_"+last_counter, "combo_rute_moda[]", "", "onchange='change_combo_rute("+last_counter+");'")+"</td>";
	//var_append_rute += "<td>"+combo_detail2(rs_moda, "id_moda_"+last_counter, "id_moda[]", "", "onchange='change_combo_moda("+last_counter+");'")+"</td>";
	//var_append_rute += "<td>"+combo_detail(rs_kategori_kirim, "id_kategori_kirim_"+last_counter, "id_kategori_kirim[]", "", "onchange='change_combo_kategori_kirim("+last_counter+");'")+"</td>";
	var_append_rute += "<td align ='center'>"+textbox_detail2("jenis_muatan_"+last_counter, "jenis_muatan[]", "")+"</td>";
	var_append_rute += hiddenbox_detail("total_cost_"+last_counter, "total_cost[]", "", "disabled");
	//var_append_rute += "<td>"+numericbox_detail2("total_cost_"+last_counter, "total_cost[]", "")+"</td>";
	var_append_rute += "<td>"+numericbox_detail2("tarif_sales_"+last_counter, "tarif_sales[]", "")+"</td>";
	var_append_rute += "<td>"+numericbox_detail2("tarif_pbl_"+last_counter, "tarif_pbl[]", "")+"</td>";
	var_append_rute += "<td>"+numericbox_detail("tarif_nego_"+last_counter, "tarif_nego[]", "")+"</td>";
	//var_append_rute += "<td>"+combo_detail(rs_status_koreksi, "status_koreksi_"+last_counter, "status_koreksi[]", "", "onchange='change_combo_status_koreksi("+last_counter+");'")+"</td>";
	var_append_rute += "<td><a target='' class='btn btn-xs btn-danger' id='btn_del'>Delete</a></td>";
	var_append_rute += "</tr>";
	
	$('#list_detail').append(var_append_rute);
	
	$("#combo_rute_moda_"+last_counter).chosen();
	$("#status_koreksi_"+last_counter).chosen();
	
	
	last_counter++;
	
}

function add_row_pic(){
	
	//set_rs_inq_part();
	
	var_append_pic= "";
	var_append_pic += "<tr><td>"+last_counter_pic+".</td>";
	
	var_append_pic += "<td>"+textbox_detail("nama_pic_"+last_counter_pic, "nama_pic[]", "")+"</td>";
	var_append_pic += "<td>"+textbox_detail("department_pic_"+last_counter_pic, "department_pic[]", "")+"</td>";
	var_append_pic += "<td>"+textbox_detail("department_position_"+last_counter_pic, "department_position[]", "")+"</td>";
	
	
	var_append_pic += "<td><a target='' class='btn btn-xs btn-danger' id='btn_del2'>Delete</a></td>";
	var_append_pic += "</tr>";
	
	$('#list_detail2').append(var_append_pic);
	
	
	last_counter_pic++;
	
}

function numericbox_detail(id, name, value){
	var sreturn = '';
	sreturn += '<input type="text" style="text-align:right;" step="any" class="form-control numericbox" id="' + id + '" name="' + name + '" value="' + value + '">';
	return sreturn;
}

function numericbox_detail2(id, name, value){
	var sreturn = '';
	sreturn += '<input type="text" style="text-align:right;" step="any" class="form-control numericbox" id="' + id + '" name="' + name + '" value="' + value + '" disabled>';
	return sreturn;
}

function hiddenbox_detail(id, name, value){
	var sreturn = '';
	sreturn += '<input type="hidden" id="' + id + '" name="' + name + '" value="' + value + '">';
	return sreturn;
}

function textbox_detail(id, name, value){
	var sreturn = '';
	sreturn += '<input type="text" class="form-control" id="' + id + '" name="' + name + '" value="' + value + '">';
	return sreturn;
}

function textbox_detail2(id, name, value){
	var sreturn = '';
	sreturn += '<input type="text" class="form-control" id="' + id + '" name="' + name + '" value="' + value + '" disabled>';
	return sreturn;
}

function datepicker_detail(id, name, value){
	var sreturn = '';
	sreturn += '<input type="text" class="form-control date-picker" data-date-format="dd M yyyy" autocomplete="off" id="' + id + '" name="' + name + '" value="' + value + '">';
	return sreturn;
}

function combo_detail(rs_opsi, id, name, value, attr){
	sreturn = "";
	sreturn += "<select class='form-control chosen-select' name='"+name+"' id='"+id+"' "+attr+">";
	sreturn += "<option value=''>--</option>";
	var cid = "";
	var cnama = "";
	
	if (rs_opsi){
		//== sample json code : [{"id":"1","nama":"aaa - 2020-03-04"},{"id":"2","nama":"asd - 2020-03-05"}] ==//
		//== looping row ==//
		$.each(rs_opsi, function() {
			//== looping column ==//
			$.each(this, function(k, v) {
				/// do stuff
				if(k=="id"){
					cid = v;
				}
				if(k=="nama"){
					cnama = v;
				}
				// console.log(k + " : " + v);
			});
			sreturn += "<option value='" + cid + "' " + (value==cid ? "selected" : "") + ">" + cnama + "</option>";
		});
	}
	
	sreturn += "</select>";
	return sreturn;
}

function combo_detail2(rs_opsi, id, name, value, attr){
	sreturn = "";
	sreturn += "<select class='form-control chosen-select' name='"+name+"' id='"+id+"' "+attr+" disabled>";
	sreturn += "<option value=''>--</option>";
	var cid = "";
	var cnama = "";
	
	if (rs_opsi){
		//== sample json code : [{"id":"1","nama":"aaa - 2020-03-04"},{"id":"2","nama":"asd - 2020-03-05"}] ==//
		//== looping row ==//
		$.each(rs_opsi, function() {
			//== looping column ==//
			$.each(this, function(k, v) {
				/// do stuff
				if(k=="id"){
					cid = v;
				}
				if(k=="nama"){
					cnama = v;
				}
				// console.log(k + " : " + v);
			});
			sreturn += "<option value='" + cid + "' " + (value==cid ? "selected" : "") + ">" + cnama + "</option>";
		});
	}
	
	sreturn += "</select>";
	return sreturn;
}

var rs_rute = jQuery.parseJSON( '<?php echo (json_encode($rs_rute)); ?>' );
var rs_moda = jQuery.parseJSON( '<?php echo (json_encode($rs_moda)); ?>' );
var rs_jenis_muatan = jQuery.parseJSON( '<?php echo (json_encode($rs_jenis_muatan)); ?>' );
//var rs_status_koreksi = jQuery.parseJSON( '<?php //echo (json_encode($rs_status_koreksi)); ?>' );
var last_counter = <?php echo $i; ?>;
var last_counter_pic = <?php echo $ix; ?>;
// var last_counter_terjemahan = <?php //echo $ix; ?>;

var var_append_rute = "";
var var_append_pic = "";

var qty = 0;
var tt = 0;
var total_km =0;
var total_umk_supir = 0;
var total_umk_kenek = 0;
var total_ujp = 0;
var total_cost = 0;
var margin_15 = 0;
var margin_20 = 0;
var margin_30 = 0;
var margin_40 = 0;
var margin_vendor = 0;
var persentase_vendor = 0;

function change_digit_decimal(){ 
	for(x=1;x<last_counter;x++){
		km_pool = toNumeric($('#km_pool_pm_'+x).val());
		km_rute = toNumeric($('#km_lan_pm_'+x).val());
		total_km = toNumeric($('#total_km_pm_'+x).val());
		total_hari = toNumeric($('#total_hari_pm_'+x).val());
		total_umk_supir = toNumeric($('#total_umk_supir_pm_'+x).val());
		total_umk_kenek = toNumeric($('#total_umk_kenek_pm_'+x).val());
		tol = toNumeric($('#tol_pm_'+x).val());
		kapal = toNumeric($('#kapal_pm_'+x).val());
		total_bbm = toNumeric($('#total_bbm_pm_'+x).val());
		bongkar = toNumeric($('#bongkar_pm_'+x).val());
		muat = toNumeric($('#muat_pm_'+x).val());
		mel = toNumeric($('#mel_pm_'+x).val());
		internet = toNumeric($('#internet_pm_'+x).val());
		total_ujp = toNumeric($('#total_ujp_pm_'+x).val());
		total_varian_cost = toNumeric($('#total_varian_cost_'+x).val());
		fix_cost = toNumeric($('#fix_cost_'+x).val());
		asuransi = toNumeric($('#asuransi_pm_'+x).val());
		load_unload = toNumeric($('#load_unload_pm_'+x).val());
		klaim_kerusakan = toNumeric($('#klaim_kerusakan_pm_'+x).val());
		total_cost = toNumeric($('#total_cost_'+x).val());
		margin_15 = toNumeric($('#margin_15_'+x).val());
		margin_20 = toNumeric($('#margin_20_'+x).val());
		margin_30 = toNumeric($('#margin_30_'+x).val());
		margin_40 = toNumeric($('#margin_40_'+x).val());
		tarif_sales = toNumeric($('#tarif_sales_'+x).val());
		tarif_vendor = toNumeric($('#tarif_vendor_'+x).val());
		margin_vendor = toNumeric($('#margin_vendor_'+x).val());
		persentase_vendor = toNumeric($('#persentase_vendor_'+x).val());
		
			
		$('#km_pool_pm_'+x).val(toRp(km_pool, 0));
		$('#km_lan_pm_'+x).val(toRp(km_rute, 0));
		$('#total_km_pm_'+x).val(toRp(total_km, 0));
		$('#total_hari_pm_'+x).val(toRp(total_hari, 0));
		$('#total_umk_supir_pm_'+x).val(toRp(total_umk_supir, 0));
		$('#total_umk_kenek_pm_'+x).val(toRp(total_umk_kenek, 0));
		$('#tol_pm_'+x).val(toRp(tol, 0));
		$('#kapal_pm_'+x).val(toRp(kapal, 0));
		$('#total_bbm_pm_'+x).val(toRp(total_bbm, 0));
		$('#bongkar_pm_'+x).val(toRp(bongkar, 0));
		$('#muat_pm_'+x).val(toRp(muat, 0));
		$('#mel_pm_'+x).val(toRp(mel, 0));
		$('#internet_pm_'+x).val(toRp(internet, 0));
		$('#total_ujp_pm_'+x).val(toRp(total_ujp, 0));
		$('#total_varian_cost_'+x).val(toRp(total_varian_cost, 0));
		$('#fix_cost_'+x).val(toRp(fix_cost, 0));
		$('#asuransi_pm_'+x).val(toRp(asuransi, 0));
		$('#load_unload_pm_'+x).val(toRp(load_unload, 0));
		$('#klaim_kerusakan_pm_'+x).val(toRp(klaim_kerusakan, 0));
		$('#total_cost_'+x).val(toRp(total_cost, 0));
		$('#margin_15_'+x).val(toRp(margin_15, 0));
		$('#margin_20_'+x).val(toRp(margin_20, 0));
		$('#margin_30_'+x).val(toRp(margin_30, 0));
		$('#margin_40_'+x).val(toRp(margin_40, 0));
		$('#tarif_vendor_'+x).val(toRp(tarif_vendor, 0));
		$('#tarif_sales_'+x).val(toRp(tarif_sales, 0));
		$('#margin_vendor_'+x).val(toRp(margin_vendor, 0));
		$('#persentase_vendor_'+x).val(toRp(persentase_vendor, 0));
		
		
	}

}

function hitung_total(){ 

change_digit_decimal();
//console.log(toNumeric(toRp(this.value)));

total_km = 0;
total_umk_supir = 0;
total_umk_kenek = 0;
total_ujp = 0;
total_cost =0;
tarif_approved =0;
margin_15 =0;
margin_20 =0;
margin_30 =0;
margin_40 =0;
margin_vendor =0;
persentase_vendor =0;

for(x=1;x<last_counter;x++){
	
	km_pool = toNumeric($('#km_pool_pm_'+x).val());
	km_rute = toNumeric($('#km_lan_pm_'+x).val());
	total_hari = toNumeric($('#total_hari_pm_'+x).val());
	uang_harian_supir = toNumeric($('#uang_harian_supir_pm_'+x).val());
	lembur_supir = toNumeric($('#lembur_supir_pm_'+x).val());
	uang_harian_kenek = toNumeric($('#uang_harian_kenek_pm_'+x).val());
	lembur_kenek = toNumeric($('#lembur_kenek_pm_'+x).val());
	tol = toNumeric($('#tol_pm_'+x).val());
	kapal = toNumeric($('#kapal_pm_'+x).val());
	total_bbm = toNumeric($('#total_bbm_pm_'+x).val());
	bongkar = toNumeric($('#bongkar_pm_'+x).val());
	muat = toNumeric($('#muat_pm_'+x).val());
	mel = toNumeric($('#mel_pm_'+x).val());
	internet = toNumeric($('#internet_pm_'+x).val());
	total_varian_cost = toNumeric($('#total_varian_cost_'+x).val());
	fix_cost = toNumeric($('#fix_cost_'+x).val());
	asuransi = toNumeric($('#asuransi_pm_'+x).val());
	load_unload = toNumeric($('#load_unload_pm_'+x).val());
	klaim_kerusakan = toNumeric($('#klaim_kerusakan_pm_'+x).val());
	tarif_sales = toNumeric($('#tarif_sales_'+x).val());
	tarif_vendor = toNumeric($('#tarif_vendor_'+x).val());
	//tarif_approved = toNumeric($('#tarif_approved_'+x).val());

	total_umk_supir = (uang_harian_supir + lembur_supir) * total_hari;
	total_umk_kenek = (uang_harian_kenek + lembur_kenek) * total_hari
	total_km = (km_pool + km_rute);
	total_ujp = total_umk_supir + total_umk_kenek + tol + kapal + total_bbm + bongkar + muat + mel + internet;

	total_cost = total_ujp + total_varian_cost + fix_cost + asuransi + load_unload + klaim_kerusakan;
	tarif_approved = total_cost*20/100+total_cost;

	margin_15 = total_cost*15/100+total_cost;
	margin_20 = total_cost*20/100+total_cost;
	margin_30 = total_cost*30/100+total_cost;
	margin_40 = total_cost*40/100+total_cost;
	margin_vendor = tarif_sales - tarif_vendor;
	persentase_vendor = (margin_vendor / tarif_sales)* 100;
	
	$('#total_km_pm_'+x).val(toRp(total_km,0));
	$('#total_umk_supir_pm_'+x).val(toRp(total_umk_supir,0));
	$('#total_umk_kenek_pm_'+x).val(toRp(total_umk_kenek,0));
	$('#total_ujp_pm_'+x).val(toRp(total_ujp,0));
	$('#total_cost_'+x).val(toRp(total_cost,0));
	$('#margin_15_'+x).val(toRp(margin_15,0));
	$('#margin_20_'+x).val(toRp(margin_20,0));
	$('#margin_30_'+x).val(toRp(margin_30,0));
	$('#margin_40_'+x).val(toRp(margin_40,0));
	$('#tarif_approved_'+x).val(toRp(tarif_approved,0));
	$('#margin_vendor_'+x).val(toRp(margin_vendor,0));
	$('#persentase_vendor_'+x).val(toRp(persentase_vendor,0));
	
	
}
$( "input" ).each(function( index, o ) {
	// console.log( index + ": " + o.id + ": " + $( this ).text() );
});

}


hitung_total();


</script>
