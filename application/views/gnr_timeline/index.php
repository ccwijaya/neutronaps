<?php
$session_data = $this->session->userdata('logged_in');
$global_id = $session_data['id'];
$global_username = $session_data['username'];
$global_nama_user = $session_data['nama_user'];
$global_level = $session_data['id_level'];
$global_akses_harga_jual = $session_data['akses_harga_jual'];
$nowclass = $this->uri->segment('1');
?>
<div class="main-content">
	<div class="main-content-inner">

		<!-- /.breadcrumb -->
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="<?php echo base_url(); ?>">Home</a>
				</li>
				<li>
					<a href="<?php echo base_url(); ?><?php echo $class_name; ?>"><?php echo $form_title; ?></a>
				</li>
				<li class="active">Data List</li>
			</ul>
		</div>
		<!-- END OF breadcrumb -->
		<style>
			.page-link {
				color: #000;
			}
		</style>
		<script language=javascript>
			<?php
			$msg = $this->session->flashdata('msg');
			$tipe = $this->session->flashdata('tipe');
			if (!empty($msg)) {
				echo "toastr[\"$tipe\"]('$msg');";
				$this->session->unset_userdata('msg');
			}
			?>

			$(document).ready(function() {
				$('#listdata').DataTable({
					scrollY: "300px",
					scrollX: true,
					scrollCollapse: true

				});
			});
		</script>
		<div class="page-content">

			<div class="row">
				<div class="col-xs-12">
					<h4 class="lighter">
						<button class="btn btn-primary radius-4" onclick="javascript:$('.submit').click();" disabled>
							<i class="ace-icon fa fa-save bigger-160"></i>Save
						</button>
						<button class="btn btn-info radius-4" onclick="location.href='<?php echo site_url(); ?><?php echo $class_name; ?>';" disabled>
							<i class="ace-icon fa fa-close bigger-160"></i>Cancel
						</button>
					</h4>

					<div class="row">
						<div class="col-xs-12">
							<div class="tabbable">
								<ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab4">

									<li class="">
										<a data-toggle="" href="<?php echo site_url(); ?><?php echo $class_name; ?>/entry">
											<i class="green ace-icon fa fa-home bigger-120"></i>
											Data Entry
										</a>
									</li>

									<!-- <li <?php if ($global_akses_harga_jual == 0) {
													echo 'class="hidden"';
												} else {
													echo '';
												} ?>>
											<a data-toggle="#" href="#">
											GL Distribution
											</a>
										</li>

										<li class="disabled">
											<a data-toggle="#" href="#">
											Conversion Unit
											</a>
										</li> -->

									<!-- <li class="disabled">
											<a data-toggle="#" href="#"disabled>
											Product Locations
											</a>
										</li> -->
									<!-- <li class="disabled">
										<a data-toggle="#" href="#"disabled>
											Detail Hose Qty
											</a>
										</li> -->
									<!-- <li <?php if ($global_akses_harga_jual == 0) {
													echo 'class="hidden"';
												} else {
													echo '';
												} ?>>
											<a data-toggle="#" href="#"disabled>
											History Price
											</a>
										</li>
										<li <?php if ($global_akses_harga_jual == 0) {
												echo 'class="hidden"';
											} else {
												echo '';
											} ?>>
											<a data-toggle="#" href="#"disabled>
											Selling Price
											</a>
										</li> -->
									<li class="active">
										<a data-toggle="" href="<?php echo site_url(); ?><?php echo $class_name; ?>">
											<i class="orange ace-icon fa fa-folder bigger-120"></i>
											Data List
										</a>
									</li>
								</ul>
								<style>
									.text100 {
										width: 100%;
										height: 500px;
										overflow-y: auto;
										overflow-x: scroll;

									}
								</style>

								<div class="tab-content">
									<div id="#" class="tab-pane fade in active">
										<form method="post" id="formlist" action="">
											<input type="hidden" name="deleteid" id="deleteid" value="">
											<table id="listdata" class="table table-striped table-bordered table-hover" width="100%">
												<thead>
													<tr>
														<!-- <th width="150">No Aktivasi Cabang</th> -->
														<th style="width: 8%;">Kode</th>
														<th>Requested date</th>
														<th style="width: 10%;">Due date</th>
														<!-- <th>Target date</th> -->
														<th>Requested by</th>
														<th>Module development</th>
														<th>Status</th>
														<!-- <th>Note request</th> -->
														<!-- <th>Reason request</th> -->

														<!--<th>Week</th>-->

														<th width="200">Action</th>
													</tr>
												</thead>

												<tbody>
													<?php
													foreach ($results as $result) {
														print '<tr>';
														//print '<td>' . ($result["nama_salesman"]) . '</td>';	
														//print '<td>' . ($result["no_report"]) . '</td>';
														print '<td>' . ($result["ticket_number"]) . '</td>';
														print '<td align="center">' . $result["requested_date"] . '</td>';
														print '<td align="center">' . $result["due_date"] . '</td>';
														//print '<td>' . ($result["periode"]) . '</td>';
														//print '<td align="right"> Rp.' . format_number($result["tarif"]) . '</td>';
														// print '<td align="center">' . ($result["target_date"]) . '</td>';
														print '<td align="center">' . ($result["requested_by"]) . '</td>';
														print '<td align="center">' . ($result["module_development"]) . '</td>';
														switch ($result["status"]) {
															case 0:
																print '<td align="center">
																<span class="label label-warning">
																Waiting Approval
																</span>
																</td>';
																break;
															case 1:
																print '<td align="center">
																<span class="label label-danger">
																Rejected
																</span>
																</td>';
																break;
															case 2:
																print '<td align="center">
																<span class="label label-info">
																On Check by Programmer
																</span>
																</td>';
																break;
															case 3:
																print '<td align="center">
																<span class="label label-warning">
																Tolong diberikan info tambahan / set meeting
																</span>
																</td>';
																break;
															case 4:
																print '<td align="center">
																<span class="label label-warning">
																On Progress
																</span>
																</td>';
																break;
															case 5:
																print '<td align="center">
																<span class="label label-lg label-success arrowed-right">
																Done
																</span>
																</td>';
																break;
														}
														// print '<td align="center">' . ($result["note_request"]) . '</td>';
														// print '<td align="center">' . ($result["reason_request"]) . '</td>';
														//print '<td>' . ($result["minggu"]) . '</td>';

														print '<td class="" align="center">';
														//if($result["ready_quote_retail"]==""){
														if ($result["status"] == 3) {
															if ($result["reason_plus"]) {
																print '<a target="" class="btn btn-info" href="' . site_url() . $class_name . '/entry/?id=' . $result["id"] . '">View</a>';
															} else {
																print '<a target="" class="btn btn-warning" href="' . site_url() . $class_name . '/entry/?id=' . $result["id"] . '">Tambah Info</a>';
															}
														} else if ($result["status"] == 1) {
															print '';
														} else {
															print '<a target="" class="btn btn-info" href="' . site_url() . $class_name . '/entry/?id=' . $result["id"] . '">View</a>';
														}
														print '&nbsp;';
														if ($global_level == 2) {
															print '<a target="" class="btn btn-danger" onclick="hapus(' . $result["id"] . ');">Delete</a>';
														} else {
															print '';
														}
														print '&nbsp;';

														//if($result["rdq_rtl"]==1){
														//print '<a target="" class="btn btn-primary " href="' . site_url() .'sls_quotation/entry/">Create Quotation</a>';
														//} else {
														//if($result["rdq_rtl"]==2){
														//print '<span class="label label-lg label-danger arrowed-right">NO QUOTE <i class="ace-icon fa fa-sad bigger-120"></i></span>';
														//} else{
														//print '<span class="label label-lg label-warning arrowed-right">PENDING <i class="ace-icon fa fa-exclamation-triangle bigger-120"></i></span>';


														//}

														//}


														//} else {

														//if($result["ready_quote_retail"]==1){
														//print '<a target="" class="btn btn-info" href="' . site_url() . $class_name . '/entry/?id=' . $result["id"] . '">Edit</a>';
														//print '&nbsp;';
														//print '<a target="" class="btn btn-danger" onclick="hapus(' . $result["id"] . ');">Delete</a>';
														//print '&nbsp;';
														//print '<span class="label label-lg label-success arrowed-right">DONE <i class="ace-icon fa fa-check bigger-120"></i></span>';
														//} else{
														//print '<a target="" class="btn btn-info" href="' . site_url() . $class_name . '/entry/?id=' . $result["id"] . '">Edit</a>';
														//print '&nbsp;';
														//print '<a target="" class="btn btn-danger" onclick="hapus(' . $result["id"] . ');">Delete</a>';
														//print '&nbsp;';
														//print '<span class="label label-xlg label-primary arrowed arrowed-right">PENDING <i class="ace-icon fa fa-exclamation-triangle bigger-120"></i></span>';
														//}





														//}
														print '</td>';
														print '</tr>';
													}
													?>
												</tbody>
											</table>
									</div>

									<!-- <div class="row">
												<div class="col">
													Tampilkan pagination
													<?php //echo $pagination; 
													?>
												</div>
											</div>-->

									</form>
								</div>
							</div>
						</div>
					</div>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.page-content -->
	</div>
</div><!-- /.main-content -->
<script>
	function hapus(id) {
		var pesan = "";
		pesan = "Anda yakin akan hapus data ini?";

		var r = confirm(pesan);

		if (r == true) {
			location.href = '<?php echo site_url(); ?><?php echo $class_name; ?>/delete_data?id=' + id;
		}
	}
</script>