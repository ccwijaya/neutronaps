
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
$nama_sales = "";
$id_cabang = "";
$id_quotation = "";
$no_bukti = "-- AUTO NUMBER --";
$tanggal = date("Y-m-d");
$id_customer = "";
$id_produk_jasa = "";
$keterangan = "";
$id_shipper = "";
$no_reff = "";
$consignee = "";
$alamat_consignee = "";
$notify_party = "";
$alamat_notify_party = "";
$vessel = "";
$pol = "";
$pod = "";
$dog = "";
$weight = "";



if($results != ""){							
	foreach($results as $result){
		$id = $result["id"];
		$id_quotation = $result["id_quotation"];
		$nama_sales = $result["nama_sales"];
		$id_cabang = $result["id_cabang"];
		$no_bukti = $result["no_bukti"];
		$tanggal = $result["tanggal"];
		$id_customer = $result["id_customer"];
		$id_produk_jasa = $result["id_produk_jasa"];
		$keterangan = $result["keterangan"];
		$id_shipper = $result["id_shipper"];
		$no_reff = $result["no_reff"];
		$consignee = $result["consignee"];
		$alamat_consignee = $result["alamat_consignee"];
		$notify_party = $result["notify_party"];
		$alamat_notify_party = $result["alamat_notify_party"];
		$vessel = $result["vessel"];
		$pol = $result["pol"];
		$pod = $result["pod"];
		$dog = $result["dog"];
		$weight = $result["weight"];

		
	}
}

$digit_decimal = 2;




function numericbox_detail($id, $name, $value){
	$sreturn = '';
	$sreturn .= '<input type="text" style="text-align:right;" step="any" class="form-control numericbox ' . $id . '" id="' . $id . '" name="' . $name . '" value="' . $value . '">';
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
						<i class="ace-icon fa fa-save"></i>Simpan
					</button>
					<!-- <a class="btn btn-purple radius-4" target="_blank" href="<?php echo site_url();?><?php echo $class_name;?>/send_email/?id=<?php echo $id;?>">
							<i class="ace-icon fa fa-envelope"></i>Send to Email
						</a> -->
					<!-- <button class="btn btn-info radius-4" type="reset" onclick="location.href='<?php echo site_url();?><?php echo $class_name;?>';">
						<i class="ace-icon fa fa-close"></i>Batal
					</button> -->
					<?php if($id!=""){ ?>
						<a class="btn btn-purple radius-4" target="_blank" href="<?php echo site_url();?><?php echo $class_name;?>/print_out/?id=<?php echo $id;?>">
							<i class="ace-icon fa fa-print "></i>Print Sertifikat
						</a>
					<?php } ?>
					
																	
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
												<div class="col-md-offset-2">
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
													//echo texthidden("id_sales", $global_sales);
													// echo texthidden("nama_mgr", $global_nama_user);
													// echo texthidden("id_cabang", $global_cabang);
													// echo texthidden("no_act", $no_act);
													//echo texthidden("pass_email", $global_pass_email);
													//debug($id_cabang);
													
													echo'<div class="row">';
													echo'<div class="col-xs-12 col-sm-3">';
													echo '<label>No. Sertifikat</label>';
													$param["name"] = "no_bukti";
													//$param["class_column"] = "col-lg-12";
													$param["readonly"] = "Y";
													$param["value"] = $no_bukti;
													echo textbox($param);
													unset($param);
													echo '</div>';

													echo'<div class="col-xs-12 col-sm-3">';
													echo '<label>No. Reff</label>';
													$param["name"] = "no_reff";
													//$param["class_column"] = "col-lg-12";
													$param["required"] = "Y";
													$param["value"] = $no_reff;
													echo textbox($param);
													unset($param);
													echo '</div>';

													echo'<div class="col-xs-12 col-sm-3">';
													echo '<label>Tanggal</label>';
													$param["name"] = "tanggal";
													$param["class_column"] = "col-xs-12";
													$param["required"] = "Y";
													$param["value"] = format_date($tanggal);
													echo datepicker($param);
													unset($param);
													echo '</div>';
													echo '</div>';

													echo'<div class="row">';
													echo'<div class="col-xs-12 col-sm-3">';
													echo '<label>No. Quotation</label>';
													$param["name"] = "id_quotation";
													//$param["class_column"] = "col-lg-5";
													$param["placeholder"] = "--Pilih Quotation--";
													$param["required"] = "Y";
													$param["value"] = $id_quotation;
													$options["0"] = "--Pilih Quotation--";
													foreach ($rs_quotation as $data) {
														$options[$data["id"]] = $data["no_bukti"];
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

													echo'<div class="col-xs-12 col-sm-3">';
													echo '<label>Sales Name</label>';
													$param["name"] = "nama_sales";
													//$param["class_column"] = "col-xs-12";
													$param["required"] = "Y";
													$param["value"] = $nama_sales;
													echo textbox($param);
													unset($param);
													echo '</div>';
													echo '</div>';	

													echo'<div class="row">';
													echo'<div class="col-xs-12 col-sm-3">';
													echo '<label>Cabang</label>';
													$param["name"] = "id_cabang";
													//$param["class_column"] = "col-lg-5";
													$param["placeholder"] = "--Pilih Cabang--";
													$param["required"] = "Y";
													$param["value"] = $id_cabang;
													$options["0"] = "--Pilih Cabang--";
													foreach ($rs_cabang as $data) {
														$options[$data["id"]] = $data["nama_cabang"];
													}
													$param["options"] = $options;
													echo combobox($param);
													unset($options);
													echo '</div>';
							
												
													echo'<div class="col-xs-12 col-sm-3">';
													echo '<label>Shipper</label>';
													$param["name"] = "id_shipper";
													//$param["class_column"] = "col-lg-5";
													$param["placeholder"] = "--Pilih Shipper--";
													$param["required"] = "Y";
													$param["value"] = $id_shipper;
													$options["0"] = "--Pilih Shipper--";
													foreach ($rs_customer as $data) {
														$options[$data["id"]] = $data["nama_customer"];
													}
													$param["options"] = $options;
													echo combobox($param);
													unset($options);
													echo '</div>';	
													echo '</div>';

													echo'<div class="row">';
													echo'<div class="col-xs-12 col-sm-3">';
													echo '<label>Consignee</label>';
													$param["name"] = "consignee";
													//$param["class_column"] = "col-xs-12";
													$param["required"] = "Y";
													$param["value"] = $consignee;
													echo textbox($param);
													unset($param);
													echo '</div>';

													echo'<div class="col-xs-12 col-sm-6">';
													echo '<label>Alamat Consignee</label>';
													$param["name"] = "alamat_consignee";
													$param["class_column"] = "col-xs-12";
													$param["required"] = "Y";
													$param["value"] = $alamat_consignee;
													echo textarea($param);
													unset($param);
													echo '</div>';
													echo '</div>';
													
													echo'<div class="row">';
													echo'<div class="col-xs-12 col-sm-3">';
													echo '<label>Notify Party</label>';
													$param["name"] = "notify_party";
													//$param["class_column"] = "col-xs-12";
													$param["required"] = "Y";
													$param["value"] = $notify_party;
													echo textbox($param);
													unset($param);
													echo '</div>';
													

													echo'<div class="col-xs-12 col-sm-6">';
													echo '<label>Alamat Notify Party</label>';
													$param["name"] = "alamat_notify_party";
													$param["class_column"] = "col-xs-12";
													$param["required"] = "";
													$param["value"] = $alamat_notify_party;
													echo textarea($param);
													unset($param);
													echo '</div>';
													echo '</div>';

													echo'<div class="row">';
													echo'<div class="col-xs-12 col-sm-3">';
													echo '<label>Port of Loading</label>';
													$param["name"] = "pol";
													//$param["class_column"] = "col-xs-12";
													$param["required"] = "Y";
													$param["value"] = $pol;
													echo textbox($param);
													unset($param);
													echo '</div>';

													echo'<div class="col-xs-12 col-sm-3">';
													echo '<label>Port of Destination</label>';
													$param["name"] = "pod";
													//$param["class_column"] = "col-xs-12";
													$param["required"] = "Y";
													$param["value"] = $pod;
													echo textbox($param);
													unset($param);
													echo '</div>';
													
													echo'<div class="col-xs-12 col-sm-3">';
													echo '<label>Vessel/Voyage</label>';
													$param["name"] = "vessel";
													//$param["class_column"] = "col-xs-12";
													$param["required"] = "Y";
													$param["value"] = $vessel;
													echo textbox($param);
													unset($param);
													echo '</div>';
													echo '</div>';



													echo'<div class="row">';
													echo'<div class="col-xs-12 col-sm-3">';
													echo '<label>Declare</label>';
													$param["name"] = "weight";
													//$param["class_column"] = "col-xs-12";
													$param["required"] = "Y";
													$param["value"] = $weight;
													echo textbox($param);
													unset($param);
													echo '</div>';


													echo'<div class="col-xs-12 col-sm-5">';
													echo '<label>Description of Goods</label>';
													$param["name"] = "dog";
													$param["class_column"] = "col-xs-12";
													$param["required"] = "";
													$param["value"] = $dog;
													echo textarea($param);
													unset($param);
													echo '</div>';
													
													echo '</div>';

													echo'<div class="row">';
													echo'<div class="col-xs-12 col-sm-3">';
													echo '<label>Produk Jasa</label>';
													$param["name"] = "id_produk_jasa";
													//$param["class_column"] = "col-lg-5";
													$param["placeholder"] = "--Pilih Sales--";
													$param["required"] = "Y";
													$param["value"] = $id_produk_jasa;
													$options["0"] = "--Pilih Produk Jasa--";
													foreach ($rs_produk_jasa as $data) {
														$options[$data["id"]] = $data["nama_produk"];
													}
													$param["options"] = $options;
													echo combobox($param);
													unset($options);
													echo '</div>';
											
													echo '</div>';
													echo '</div>';

													echo '</div>';

												

													?>
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
															<p>
															<p>
															<a id="btn_add" target="" class="btn btn-sm btn-info" onclick="">Tambah</a> 
															<p>
																<div class="text100">
																<table id="list_detail" class="table table-striped table-bordered table-hover" width=100%>
																	<thead>
																		<tr>
																			<th width="50">No.</th>
																			<th width="550">Produk Jasa Details</th>
																			
																			<th width="200">Price</th>
																			
			
																			<th rowspan=2 width="80">Action</th>											
																		</tr>
																			
																		
																		
																	</thead>

																	<tbody>

																	<?php
																	$i=1;
																	//$ver_tarif_sales = 0;
																	//$color = "";
															
																	foreach($rs_detail_rr as $result){

																		
																		
																		print '<tr>';										
																		print '<td>'.$i.'.</td>';
																		print '<td>' . combo_detail($rs_produk_jasa_detail, "combo_produk_jasa_detail_".$i, "combo_produk_jasa_detail[]", $result["id_produk_jasa_detail"], "onchange='change_combo_produk_jasa_detail(".$i.");'"). '</td>';
																		print '<td>' . numericbox_detail("harga_".$i, "harga[]", format_number($result["harga"],2)) . '</td>';
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
			
				self.val(toRp(val,2));
				
				
				console.log("self:"+self[0].id);
				// console.log(self[0]['íd']);
				
				
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

	$("#id_quotation").chosen().change(function(){
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
				url: "<?php echo base_url(); ?>" + "sls_po_customer/get_quote_detail_by_id",			
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

							if(k=="id_produk_jasa"){
								$("#id_produk_jasa").val(v);
								$('#id_produk_jasa').trigger("chosen:updated");
							}
						
							if(k=="nama_sales"){
								$("#nama_sales").val(v);
								//$('#id_sales').trigger("chosen:updated");
							}

							if(k=="id_customer"){
								$("#id_customer").val(v);
								$('#id_customer').trigger("chosen:updated");
							}
							
							if(k=="id_produk_detail"){
								console.log("id_produk_detail : " + v);
								
								add_row_detail();
								
								$("#combo_produk_jasa_detail_" + (last_counter-1)).val(v);
								$("#combo_produk_jasa_detail_" + (last_counter-1)).trigger("chosen:updated");
								
								change_combo_produk_jasa_detail(last_counter-1);
							}

							if(k=="harga"){
								$("#harga_" + (last_counter-1)).val(v);
								//$('#id_sales').trigger("chosen:updated");
							}

							// if(k=="id_po"){
							// 	console.log("id_po : " + v);
										
							// 			add_row_detail();
										
							// 			$("#id_po_account_" + (last_counter-1)).val(v);
							// 			$("#id_po_account_" + (last_counter-1)).trigger("chosen:updated");
										
							// 			change_combo_po_account(last_counter-1);
							// }

							// if(k=="harga"){
							// 	// var xx = $("#is_pembulatan").val();
							// 	// console.log("xx:"+xx);
							// 	// if(xx==1){
							// 	// 	digit_decimal = 0;
							// 	// } else {
							// 	// 	digit_decimal = 2;
							// 	// }
							// 	$("#harga_" + (last_counter-1)).val(toRp(v, 2));
							// }

							
							console.log(k + " : " + v);
						  });
						});
					}
				}
			});
			
			hitung_total();
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
						
							if(k=="nama_sales"){
								$("#nama_sales").val(v);
								//$('#id_sales').trigger("chosen:updated");
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

function change_combo_produk_jasa_detail(xcounter){
	console.log("change_combo_produk_jasa_detail:" + xcounter);
	var text = $("#combo_produk_jasa_detail_"+xcounter+" option:selected").text();
	console.log("text:" + text);

	
	var id_jasa_detail = $("#combo_produk_jasa_detail_"+xcounter).val();

	
	
	$.ajax({
		type: "GET",
		async: false,
		url: "<?php echo base_url(); ?>" + "sls_po_customer/get_produk_jasa_detail_by_id",			
		data: {id: id_jasa_detail},
		dataType: 'json',
		success: function(res) {
			// console.log("RES : " + res);
			
			if (res){
				
				//== looping row ==//
				$.each(res, function() {
					//== looping column ==//
				  $.each(this, function(k, v) {
					/// do stuff
					
					if(k=="harga_jasa"){
						$("#harga_"+xcounter).val(toRp(v,2));
					}

					
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
	var_append_rute += "<td>"+combo_detail(rs_produk_jasa_detail, "combo_produk_jasa_detail_"+last_counter, "combo_produk_jasa_detail[]", "", "onchange='change_combo_produk_jasa_detail("+last_counter+");'")+"</td>";
	
	var_append_rute += "<td>"+numericbox_detail("harga_"+last_counter, "harga[]", "")+"</td>";

	
	var_append_rute += "<td><a target='' class='btn btn-xs btn-danger' id='btn_del'>Delete</a></td>";
	var_append_rute += "</tr>";
	
	$('#list_detail').append(var_append_rute);
	
	$("#combo_produk_jasa_detail_"+last_counter).chosen();
	//$("#id_kategori_kirim_"+last_counter).chosen();
	
	
	last_counter++;
	
}



function numericbox_detail(id, name, value){
	var sreturn = '';
	sreturn += '<input type="text" style="text-align:right;" step="any" class="form-control numericbox" id="' + id + '" name="' + name + '" value="' + value + '">';
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


var rs_produk_jasa_detail = jQuery.parseJSON( '<?php echo (json_encode($rs_produk_jasa_detail)); ?>' );


var last_counter = <?php echo $i; ?>;


var var_append_rute = "";


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
		$('#tarif_sales_'+x).val(toRp(tarif_sales, 2));
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
