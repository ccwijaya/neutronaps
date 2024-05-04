<?php
$session_data = $this->session->userdata('logged_in');
$global_id = $session_data['id'];
$global_username = $session_data['username'];
$global_nama_user = $session_data['nama_user'];
$global_akses_harga_jual = $session_data['akses_harga_jual'];
$global_akses_input_harga = $session_data['akses_input_harga'];
$nowclass = $this->uri->segment('1');


$id = "";
$id_sales = "";
$id_cabang = "";
$kode = "";
$kategori_cust = "";
$nama_customer = "";
$alamat = "";
$pic = "";
$jabatan = "";
$kota = "";
$kecamatan = "";
$kelurahan = "";
$kode_pos = "";
$contact1 = "";
$email1 = "";
$contact2 = "";
$email2 = "";
$website = "";
$keterangan = "";


if($results != ""){							
	foreach($results as $result){
		$id = $result["id"];
		$id_sales = $result["id_sales"];
		$id_cabang = $result["id_cabang"];
		$kode = $result["kode"];
		$kategori_cust =  $result["kategori_cust"];
		$nama_customer = $result["nama_customer"];
		$alamat = $result["alamat"];
		$pic = $result["pic"];
		$jabatan = $result["jabatan"];
		$kota = $result["kota"];
		$kecamatan = $result["kecamatan"];
		$kelurahan = $result["kelurahan"];
		$kode_pos = $result["kode_pos"];
		$contact1 = $result["contact1"];
		$email1 = $result["email1"];
		$contact2 = $result["contact2"];
		$email2 = $result["email2"];
		$website = $result["website"];
		$keterangan = $result["keterangan"];
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
												echo '<label>Kode</label>';
												$param["name"] = "kode";
												//$param["class_column"] = "col-lg-5";
												$param["required"] = "Y";
												$param["value"] = $kode;
												echo textbox2($param);
												unset($param);
												echo '</div>';
												

												echo'<div class="col-xs-12 col-sm-4">';
												echo '<label>Nama Customer</label>';
												$param["name"] = "nama_customer";
												//$param["class_column"] = "col-lg-5";
												$param["required"] = "Y";
												$param["value"] = $nama_customer;
												echo textbox2($param);
												unset($param);
												echo '</div>';

												echo'<div class="col-xs-12 col-sm-3">';
												echo '<label>Kategori Customer</label>';
												$param["name"] = "kategori_cust";
												//$param["class_column"] = "col-lg-5";
												$param["placeholder"] = "--Pilih Kategori--";
												$param["required"] = "Y";
												$param["value"] = $kategori_cust;
												$options[""] = "--Pilih Kategori Customer--";
												$options["INT"] = "INTERNAL";
												$options["EXT"] = "EXTERNAL";
												
												$param["options"] = $options;
												echo combobox($param);
												unset($options);
												echo '</div>';
												echo '</div>';

												echo'<div class="row">';
												echo'<div class="col-xs-12 col-sm-3">';
												echo '<label>Sales</label>';
												$param["name"] = "id_sales";
												//$param["class_column"] = "col-lg-5";
												$param["placeholder"] = "--Pilih Sales--";
												$param["required"] = "Y";
												$param["value"] = $id_sales;
												$options["0"] = "--Pilih Sales--";
												foreach ($rs_sales as $data) {
													$options[$data["id"]] = $data["nama_sales"];
												}
												$param["options"] = $options;
												echo combobox($param);
												unset($options);
												echo '</div>';

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
												echo '</div>';

												echo'<div class="row">';
												echo'<div class="col-xs-12 col-sm-6">';
												echo '<label>Alamat</label>';
												$param["name"] = "alamat";
												//$param["class_column"] = "col-lg-5";
												$param["required"] = "Y";
												$param["value"] = $alamat;
												echo textarea($param);
												unset($param);
												echo '</div>';
												echo '</div>';

												echo'<div class="row">';
												echo'<div class="col-xs-12 col-sm-3">';
												echo '<label>Kota</label>';
												$param["name"] = "kota";
												//$param["class_column"] = "col-lg-5";
												$param["required"] = "Y";
												$param["value"] = $kota;
												echo textbox2($param);
												unset($param);
												echo '</div>';

												//cho'<div class="row">';
												echo'<div class="col-xs-12 col-sm-3">';
												echo '<label>Kecamatan</label>';
												$param["name"] = "kecamatan";
												//$param["class_column"] = "col-lg-5";
												$param["required"] = "Y";
												$param["value"] = $kecamatan;
												echo textbox2($param);
												unset($param);
												echo '</div>';
												echo '</div>';

												echo'<div class="row">';
												echo'<div class="col-xs-12 col-sm-3">';
												echo '<label>Kelurahan</label>';
												$param["name"] = "kelurahan";
												//$param["class_column"] = "col-lg-5";
												$param["required"] = "Y";
												$param["value"] = $kelurahan;
												echo textbox2($param);
												unset($param);
												echo '</div>';

												echo'<div class="col-xs-12 col-sm-3">';
												echo '<label>Kode Pos</label>';
												$param["name"] = "kode_pos";
												//$param["class_column"] = "col-lg-5";
												$param["required"] = "Y";
												$param["value"] = $kode_pos;
												echo textbox2($param);
												unset($param);
												echo '</div>';
												echo '</div>';

												echo'<div class="row">';
												echo'<div class="col-xs-12 col-sm-3">';
												echo '<label>PIC</label>';
												$param["name"] = "pic";
												//$param["class_column"] = "col-lg-5";
												$param["required"] = "Y";
												$param["value"] = $pic;
												echo textbox2($param);
												unset($param);
												echo '</div>';

												echo'<div class="col-xs-12 col-sm-3">';
												echo '<label>Jabatan</label>';
												$param["name"] = "jabatan";
												//$param["class_column"] = "col-lg-5";
												$param["required"] = "Y";
												$param["value"] = $jabatan;
												echo textbox2($param);
												unset($param);
												echo '</div>';
												echo '</div>';

												echo'<div class="row">';
												echo'<div class="col-xs-12 col-sm-3">';
												echo '<label>No Telp</label>';
												$param["name"] = "contact1";
												//$param["class_column"] = "col-lg-5";
												$param["required"] = "Y";
												$param["value"] = $contact1;
												echo textbox2($param);
												unset($param);
												echo '</div>';

												echo'<div class="col-xs-12 col-sm-3">';
												echo '<label>No HP</label>';
												$param["name"] = "contact2";
												//$param["class_column"] = "col-lg-5";
												$param["required"] = "Y";
												$param["value"] = $contact2;
												echo textbox2($param);
												unset($param);
												echo '</div>';
												echo '</div>';

												

												echo'<div class="row">';
												// echo'<div class="col-xs-12 col-sm-3">';
												// echo '<label>Waktu Tempuh</label>';
												// $param["name"] = "waktu_tempuh";
												// //$param["class_column"] = "col-lg-5";
												// $param["required"] = "Y";
												// $param["value"] = format_number($waktu_tempuh);
												// echo numericbox($param);
												// unset($param);
												// echo '</div>';

												// echo'<div class="col-xs-12 col-sm-3">';
												// echo '<label>Waktu Operasional</label>';
												// $param["name"] = "waktu_ops";
												// //$param["class_column"] = "col-lg-5";
												// $param["required"] = "Y";
												// $param["value"] = format_number($waktu_ops);
												// echo numericbox($param);
												// unset($param);
												// echo '</div>';

												// echo'<div class="col-xs-12 col-sm-3">';
												// echo '<label>Total Waktu</label>';
												// $param["name"] = "total_waktu";
												// //$param["class_column"] = "col-lg-5";
												// $param["required"] = "Y";
												// $param["value"] = format_number($total_waktu);
												// echo numericbox($param);
												// unset($param);
												// echo '</div>';

												// echo '</br>';

												// echo'<div class="col-xs-12 col-sm-3">';
												// echo '<label>Wkt Tempuh (Hari)</label>';
												// //echo'<div class="col-lg-12">';
												// echo'<input type="text" style="text-align:right;" step="any" class="form-control numericbox" id="txt4" name="waktu_tempuh" value="' . format_number($waktu_tempuh) . '" onkeyup="sum();"">';
												// echo'</div>';

												// echo'<div class="col-xs-12 col-sm-3">';
												// echo '<label>Waktu Ops (Hari)</label>';
												// //echo'<div class="col-lg-12">';
												// echo'<input type="text" style="text-align:right;" step="any" class="form-control numericbox" id="txt5" name="waktu_ops" value="' . format_number($waktu_ops) . '" onkeyup="sum();"">';
												// echo'</div>';

												// echo'<div class="col-xs-12 col-sm-3">';
												// echo '<label>Total Hari</label>';
												// //echo'<div class="col-lg-12">';
												// echo'<input type="text" style="text-align:right;" step="any" class="form-control numericbox" id="txt6" name="total_waktu" value="' . format_number($total_waktu) . '" >';
												// echo'</div>';
												// echo '</div>';

												// echo '</br>';

												echo'<div class="row">';
												// echo'<div class="col-xs-12 col-sm-3">';
												// echo '<label>Total Biaya Tol</label>';
												// $param["name"] = "total_tol";
												// //$param["class_column"] = "col-lg-5";
												// $param["required"] = "Y";
												// $param["value"] = format_number($total_tol);
												// echo numericbox($param);
												// unset($param);
												// echo '</div>';

												// echo'<div class="col-xs-12 col-sm-3">';
												// echo '<label>Biaya Kapal / Very</label>';
												// $param["name"] = "biaya_kapal";
												// //$param["class_column"] = "col-lg-5";
												// $param["required"] = "";
												// $param["value"] = format_number($biaya_kapal);
												// echo numericbox($param);
												// unset($param);
												// echo '</div>';
												echo '</div>';
												
												
											

												echo'<div class="row">';
												// echo'<div class="col-xs-12 col-sm-3">';
												// echo '<label>Merek</label>';
												// $param["name"] = "id_merek";
												// //$param["class_column"] = "col-lg-5";
												// $param["placeholder"] = "Pilih Merek";
												// $param["required"] = "Y";
												// $param["value"] = $id_merek;
												// $options["0"] = "-----";
												// foreach ($rs_merek as $data) {
												// 	$options[$data["id"]] = $data["kode"] . " - " . $data["nama_merek"];
												// }
												// $param["options"] = $options;
												// echo combobox($param);
												// unset($options);
												// echo '</div>';

												// echo'<div class="col-xs-12 col-sm-3">';
												// echo '<label>Kategori</label>';
												// $param["name"] = "id_kat_aset";
												// //$param["class_column"] = "col-lg-5";
												// $param["placeholder"] = "Pilih Klompok";
												// $param["required"] = "Y";
												// $param["value"] = $id_kat_aset;
												// $options["0"] = "-----";
												// foreach ($rs_kat_asset as $data) {
												// 	$options[$data["id"]] = $data["kode"] . " - " . $data["nama_kategori"];
												// }
												// $param["options"] = $options;
												// echo combobox($param);
												// unset($options);
												// echo '</div>';

												// echo'<div class="col-xs-12 col-sm-2">';
												// echo '<label>Satuan</label>';
												// $param["name"] = "id_satuan";
												// //$param["class_column"] = "col-lg-4";
												// $param["required"] = "Y";
												// $param["value"] = $id_satuan;
												// $options["0"] = "-----";
												// foreach ($rs_satuan as $data) {
												// 	$options[$data["id"]] = $data["nama_satuan"];
												// }
												// $param["options"] = $options;
												// echo combobox($param);
												// unset($options);
												// echo '</div>';
												echo '</div>';

												echo '<div class="row">';
												// echo'<div class="col-xs-12 col-sm-3">';
												// echo '<label>Color</label>';
												// $param["name"] = "warna";
												// //$param["class_column"] = "col-lg-5";
												// $param["required"] = "Y";
												// $param["value"] = $warna;
												// echo textbox2($param);
												// unset($param);
												// echo '</div>';

												// echo'<div class="col-xs-12 col-sm-3">';
												// echo '<label>Size</label>';
												// $param["name"] = "ukuran";
												// //$param["class_column"] = "col-lg-5";
												// $param["required"] = "Y";
												// $param["value"] = $ukuran;
												// echo textbox2($param);
												// unset($param);
												// echo '</div>';

												// echo'<div class="col-xs-12 col-sm-2">';
												// echo '<label>Status</label>';
												// $param["name"] = "is_active";
												// //$param["class_column"] = "col-lg-12";
												// $param["placeholder"] = "Pilih Status";
												// $param["required"] = "Y";
												// $param["value"] = $is_active;
												// $options["0"] = "TIDAK AKTIF";
												// $options["1"] = "AKTIF";
												// $param["options"] = $options;
												// echo combobox($param);
												// unset($options);
												// echo '</div>';
												echo '</div>';
												
												

												echo'<div class="row">';
												// echo'<div class="col-xs-12 col-sm-8">';
												// echo '<label>Description</label>';
												// $param["name"] = "deskripsi";
												// //$param["class_column"] = "col-lg-12";
												// $param["required"] = "";
												// $param["value"] = $deskripsi;
												// echo textarea($param);
												// unset($param);
												// echo '</div>';
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




