
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
$no_bukti = "-- AUTO NUMBER --";
$tanggal = date("Y-m-d");
$id_customer = "";
$keterangan = "";
$id_produk_jasa = "";





if($results != ""){							
	foreach($results as $result){
		$id = $result["id"];
		$nama_sales = $result["nama_sales"];
		$id_cabang = $result["id_cabang"];
		$no_bukti = $result["no_bukti"];
		$tanggal = $result["tanggal"];
		$id_customer = $result["id_customer"];
		$keterangan = $result["keterangan"];
		$id_produk_jasa = $result["id_produk_jasa"];
		

		
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
				
					<?php if($id!=""){ ?>
							<a class="btn btn-purple radius-4" target="_blank" href="<?php echo site_url();?><?php echo $class_name;?>/print_out/?id=<?php echo $id;?>"><i class="ace-icon fa fa-print "></i>Print Quotation</a>
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
													$param["name"] = "nama_sales";
													$param["class_column"] = "col-xs-12";
													$param["required"] = "Y";
													$param["value"] = $nama_sales;
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
													echo'<div class="col-xs-12 col-sm-5">';
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

													?>
														<p>
										
														<p>
													
												<div class="row">
													
												
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
													
															<a id="btn_add" target="" class="btn btn-sm btn-info" onclick="">Tambah</a>
															<p>
																<div class="text100">
																<table id="list_detail" class="table table-striped table-bordered table-hover" width=100%>
																	<thead>
																		<tr>
																			<th width="50">No.</th>
																			<th width="200">FUMIGATION SERVICE</th>
																		
																			<th width="100">PRICE</th>
																			
																			<th rowspan=2 width="100">Action</th>

																		</tr>
																																					
																		
																		
																	</thead>

																	<tbody>

																	<?php
																	$i=1;
																	//$ver_tarif_sales = 0;
																	//$color = "";
															
																	foreach($rs_detail_pnl as $result){	
																		
																		//debug($color);
																		
																		print '<tr>';										
																		print '<td>'.$i.'.</td>';
																		///print '<td><input type="hidden" id="combo_rute_moda_'.$i.'" name="combo_rute_moda[]" value="' . $result["id_rute"] . '">' . textbox_detail2("", "", $result["rute"].' | '.$result["unit"]) . '</td>';
																		print '<td>' . combo_detail($rs_produk_jasa_detail, "combo_jasa_detail_".$i, "a_combo_jasa_detail[]", $result["id_produk_jasa_detail"], "onchange='change_combo_produk_jasa_detail(".$i.");'"). '</td>';
																		print '<td>' . numericbox_detail("harga_".$i, "harga[]", format_number($result["harga"])) . '</td>';
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
																	//$ix=1;
															
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
				
				//hitung_total();
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
	
	$("#list_detail").on("click", "#btn_del", function() {
		$(this).closest("tr").remove();
	});
	
	$(document).on('focus','input:text', function () {
        var self = $(this);
    })

	//hitung_total();
    
});




function add_row_detail(){
	
	var_append_produk = "";
	var_append_produk += "<tr><td>"+last_counter+".</td>";
	var_append_produk += "<td>"+combo_detail(rs_produk_jasa_detail, "combo_jasa_detail_"+last_counter, "combo_jasa_detail[]", "", "onchange='change_combo_jasa_detail("+last_counter+");'")+"</td>";
	var_append_produk += "<td>"+numericbox_detail("harga_"+last_counter, "harga[]", "")+"</td>";
	var_append_produk += "<td><a target='' class='btn btn-xs btn-danger' id='btn_del'>Delete</a></td>";
	var_append_produk += "</tr>";
	
	$('#list_detail').append(var_append_produk);
	
	$("#combo_produk_jasa_detail_"+last_counter).chosen();
	//$("#status_koreksi_"+last_counter).chosen();
	
	
	last_counter++;
	
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

var rs_produk_jasa_detail = jQuery.parseJSON( '<?php echo (json_encode($rs_produk_jasa_detail)); ?>' );
var last_counter = <?php echo $i; ?>;

var var_append_produk = "";


$( "input" ).each(function( index, o ) {
	// console.log( index + ": " + o.id + ": " + $( this ).text() );
});



</script>
