<?php
$session_data = $this->session->userdata('logged_in');
$global_id = $session_data['id'];
$global_username = $session_data['username'];
$global_nama_user = $session_data['nama_user'];
$global_jabatan_user = $session_data['jabatan'];
$global_akses_harga_jual = $session_data['akses_harga_jual'];
$global_akses_input_harga = $session_data['akses_input_harga'];
$nowclass = $this->uri->segment('1');

$id = "";
$ticket_number = "-AUTO NUMBER-";
$requested_date = "";
$due_date = "";
$target_date = "";
$requested_by = "";
$requested_position = "";
$module_development = "";
$note_request = "";
$reason_request = "";
$status = "";
$reason_plus = "";



if ($results != "") {
	foreach ($results as $result) {
		$id = $result["id"];
		$ticket_number = $result["ticket_number"];
		$requested_date = $result["requested_date"];
		$due_date = $result["due_date"];
		$target_date = $result["target_date"];
		$requested_by = $result["requested_by"];
		$requested_position = $result["requested_position"];
		$module_development = $result["module_development"];
		$note_request = $result["note_request"];
		$reason_request = $result["reason_request"];
		$status = $result["status"];
		$reason_plus = $result["reason_plus"];
	}
}

?>



<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="<?php echo base_url(); ?>">Home</a>
				</li>
				<li>
					<a href="<?php echo base_url(); ?><?php echo $class_name; ?>"><?php echo $form_title; ?></a>
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
						<button class="btn btn-info radius-4" onclick="location.href='<?php echo site_url(); ?><?php echo $class_name; ?>';">
							<i class="ace-icon fa fa-close"></i>Cancel
						</button>
					</h4>


					<form id="formentry" name="formentry" class="form-horizontal" enctype="multipart/form-data" action="<?php echo base_url(); ?><?php echo $class_name; ?>/simpan" method="post" data-parsley-validate>
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
											<a data-toggle="" href="<?php echo site_url(); ?><?php echo $class_name; ?>">
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
											// debug($reason_request);
											//echo texthidden("is_pembulatan", $is_pembulatan);									
											echo texthidden("id", $id);
											//echo texthidden("id_sales", $global_sales);
											echo '<div class="row">';
											echo '<div class="col-xs-12 col-sm-2">';
											echo '<label>No. Timeline</label>';
											$param["name"] = "ticket_number";
											//$param["class_column"] = "col-lg-12";
											$param["readonly"] = "Y";
											$param["value"] = $ticket_number;
											echo textbox($param);
											unset($param);
											echo '</div>';

											echo '<div class="col-xs-12 col-sm-2">';
											echo '<label>Request date</label>';
											$param["name"] = "requested_date";
											// $param["class_column"] = "col-xs-12";
											$param["readonly"] = "Y";
											// date('d M Y')
											$param["value"] = ($requested_date == "" ? date('d M Y') : format_date($requested_date));
											echo textbox($param);
											unset($param);
											echo '</div>';


											echo '<div class="col-xs-12 col-sm-2">';
											echo '<label>Due date</label>';
											$param["name"] = "due_date";
											//$param["class_column"] = "col-xs-12";
											$param["disabled"] = "Y";
											$param["value"] = format_date($due_date);
											$due_date ? $param["readonly"] = "Y" : "";
											if($due_date){
												echo textbox($param);
											}else{
												echo datepicker($param);
											}
											unset($param);
											echo '</div>';

											echo '<div class="col-xs-12 col-sm-2">';
											echo '<label>Target date</label>';
											$param["name"] = "target_date";
											//$param["class_column"] = "col-xs-12";
											$param["disabled"] = "Y";
											$param["value"] = format_date($target_date);
											if($target_date){
												echo textbox($param);
											}else{
												echo datepicker($param);
											}
											unset($param);
											echo '</div>';
											echo '</div>';

											echo "<div class='row'>";
											echo '<div class="col-xs-12 col-sm-4">';
											echo '<label>Requested by</label>';
											$param["name"] = "requested_by";
											//$param["class_column"] = "col-xs-12";
											$param["value"] = $global_nama_user;
											$param["readonly"] = "Y";
											echo textbox($param);
											unset($param);
											echo '</div>';

											echo '<div class="col-xs-12 col-sm-4">';
											echo '<label>Position</label>';
											$param["name"] = "requested_position";
											//$param["class_column"] = "col-xs-12";
											$param["required"] = "Y";
											$param["readonly"] = "Y";
											$param["value"] = $global_jabatan_user;
											echo textbox($param);
											unset($param);
											echo '</div>';
											echo '</div>';

											echo '<div class="row">';
											echo '<div class="col-xs-12 col-sm-3">';
											echo '<label>Module development</label>';
											$param["name"] = "module_development";
											//$param["class_column"] = "col-lg-5";
											$param["placeholder"] = "--Pilih Module--";
											$param["required"] = "Y";
											$param["value"] = $module_development;
											$options["0"] = "--Pilih Module--";
											foreach ($rs_menu as $data) {
												$options[$data["keterangan_menu"]] = $data["keterangan_menu"];
											}
											$param["options"] = $options;
											echo combobox($param);
											unset($options);
											echo '</div>';
											echo '</div>';

											echo '<div class="row">';
											echo '<div class="col-xs-12 col-sm-8">';
											echo '<label>Note request</label>';
											$param["name"] = "note_request";
											$param["class_column"] = "col-xs-12";
											$param["required"] = "Y";
											$param["value"] = $note_request;
											echo textarea($param);
											unset($param);
											echo '</div>';
											echo '</div>';

											echo '<div class="row">';
											echo '<div class="col-xs-12 col-sm-8">';
											echo '<label>Reason request</label>';
											$param["name"] = "reason_request";
											$param["class_column"] = "col-xs-12";
											$param["required"] = "Y";
											$param["value"] = $reason_request;
											echo textarea($param);
											unset($param);
											echo '</div>';
											echo '</div>';

											if ($status == 3) {
												echo '<div class="row">';
												echo '<div class="col-xs-12 col-sm-8">';
												echo '<label>Tambahan info</label>';
												$param["name"] = "reason_plus";
												$param["class_column"] = "col-xs-12";
												$param["required"] = "Y";
												$param["value"] = $reason_plus;
												echo textarea($param);
												unset($param);
												echo '</div>';
												echo '</div>';
											}

											echo '<div class="row">';
											echo '<div class="col-xs-12 col-sm-3">';
											echo '<label>Status</label>';
											$param["name"] = "status";
											//$param["class_column"] = "col-lg-5";
											$param["placeholder"] = "--Status--";
											$param["required"] = "Y";
											$param["value"] = $status;
											$options[0] = "--Status--";
											$options[1] = "Reject";
											$options[2] = "Approve";
											// foreach ($rs_cabang as $data) {
											// 	$options[$data["id"]] = $data["nama_cabang"];
											// }
											$param["options"] = $options;
											echo combobox($param);
											unset($options);
											echo '</div>';
											echo '</div>';

											?>
											</br>
											</br>
											</br>
											</br>
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
	.chosen-container {
		width: 100% !important;
	}
</style>
<script>
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