<?php
$session_data = $this->session->userdata('logged_in');
$global_id = $session_data['id'];
$global_username = $session_data['username'];
$global_nama_user = $session_data['nama_user'];
$global_akses_harga_jual = $session_data['akses_harga_jual'];
$global_akses_input_harga = $session_data['akses_input_harga'];
$nowclass = $this->uri->segment('1');


$id = "";
$kode_produk = "";
$nama_produk = "";
$deskripsi = "";



if($results != ""){							
	foreach($results as $result){
		$id = $result["id"];
		$kode_produk = $result["kode_produk"];
		$nama_produk = $result["nama_produk"];
		$deskripsi = $result["deskripsi"];
		
	}
}

// $digit_decimal = 2;
// $digit_decimal3 = 2;
//if($is_pembulatan){
	//$digit_decimal = 0;
	//$digit_decimal3 = 0;
//}



?>



<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="<?php echo base_url();?>">Home</a>
				</li>
				<li>
					<a href="<?php echo base_url();?><?php echo $class_name;?>"><?php echo $form_title;?></a>
				</li>
				<li class="active">Entry Form</li>
			</ul><!-- /.breadcrumb -->
		</div>

		<div class="page-content">
			

			<div class="row">
				<div class="col-xs-12">
					<h4 class="lighter">
						<button class="btn btn-primary radius-4" onclick="javascript:$('.submit').click();">
							<i class="ace-icon fa fa-save"></i>Save
						</button>
						<button class="btn btn-info radius-4" onclick="location.href='<?php echo site_url();?><?php echo $class_name;?>';">
							<i class="ace-icon fa fa-close"></i>Cancel
						</button>
					</h4>
			
					
					<form id="formentry" name="formentry" class="form-horizontal" enctype="multipart/form-data" action="<?php echo base_url();?><?php echo $class_name;?>/simpan" method="post" data-parsley-validate>
						<div class="row">
							<div class="col-xs-12">
									<div class="tabbable">
									<ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab">
											<li class="active">
												<a data-toggle="tab" href="#tab1">
													<i class="green ace-icon fa fa-home bigger-120"></i>
													Data Entry 
												</a>
											</li>

											<li>
												<a data-toggle="" href="<?php echo site_url();?><?php echo $class_name;?>">
													<i class="orange ace-icon fa fa-folder bigger-120"></i>
														Data List
												</a>
											</li>

										</ul>
										
										<div class="tab-content">
											
											<div id="tab1" class="tab-pane fade  in active col-md-offset-3">
												</br>
												</br>

											
												
												
												<?php
												//echo texthidden("is_pembulatan", $is_pembulatan);									
												echo texthidden("id", $id);
												//$total_km = $km_pool + $km_rute;
									
									
												echo'<div class="row">';

												echo'<div class="col-xs-12 col-sm-2">';
												echo '<label>Kode Produk/Jasa</label>';
												$param["name"] = "kode_produk";
												//$param["class_column"] = "col-lg-5";
												$param["required"] = "Y";
												$param["value"] = $kode_produk;
												echo textbox2($param);
												unset($param);
												echo '</div>';
												

												echo'<div class="col-xs-12 col-sm-4">';
												echo '<label>Nama Produk/Jasa</label>';
												$param["name"] = "nama_produk";
												//$param["class_column"] = "col-lg-5";
												$param["required"] = "Y";
												$param["value"] = $nama_produk;
												echo textbox2($param);
												unset($param);
												echo '</div>';

												echo'<div class="col-xs-12 col-sm-4">';
												echo '<label>Deskripsi Produk/Jasa</label>';
												$param["name"] = "deskripsi";
												//$param["class_column"] = "col-lg-5";
												$param["required"] = "Y";
												$param["value"] = $deskripsi;
												echo textbox2($param);
												unset($param);
												echo '</div>';
												echo '</div>';
																					
												?>
												</br>
												</br>
												</br>
												</br>
												
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


<style>
.chosen-container { width: 100% !important; }
</style>
<script>
// function sum() {
//       var km_pool = document.getElementById('txt1').value;
//       var km_rute = document.getElementById('txt2').value;
//       var result = parseInt(km_pool) + parseInt(km_rute);
//       if (!isNaN(result)) {
//          document.getElementById('txt3').value = result;
//       }
// }

function sum() {
      var pool = document.getElementById('txt1').value;
      var rute = document.getElementById('txt2').value;
	  var wk_tph = document.getElementById('txt4').value;
      var wk_ops = document.getElementById('txt5').value;
      var result = parseFloat(pool) + parseFloat(rute);
	  var result2 = parseFloat(wk_tph) + parseFloat(wk_ops);
      if (!isNaN(result)) {
         document.getElementById('txt3').value = result;
      }
	  if (!isNaN(result2)) {
         document.getElementById('txt6').value = result2;
      }
}






</script>




