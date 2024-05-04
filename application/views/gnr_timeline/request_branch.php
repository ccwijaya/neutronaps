<div class="main-content">
	<div class="main-content-inner">
	
		<!-- /.breadcrumb -->
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="<?php echo base_url();?>">Home</a>
				</li>
				<li>
					<a href="<?php echo base_url();?><?php echo $class_name;?>"><?php echo $form_title;?></a>
				</li>
				<li class="active">Data List</li>
			</ul>
		</div>
		<!-- END OF breadcrumb -->

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
							
		} );
		} );
</script>
<div class="page-content">
			
			<div class="row">
				<div class="col-xs-12">
					<h4 class="lighter">
						<button class="btn btn-app btn-success btn-xs radius-4" onclick="javascript:$('.submit').click();" disabled>
							<i class="ace-icon fa fa-save bigger-160"></i>Save
						</button>
						<button class="btn btn-app btn-warning btn-xs radius-4" onclick="location.href='<?php echo site_url();?><?php echo $class_name;?>';"disabled>
							<i class="ace-icon fa fa-close bigger-160"></i>Cancel
						</button>
					</h4>
					
					<div class="row">
						<div class="col-xs-12">
							<div class="tabbable">
								<ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab4">
									
									<li class="">
											<a data-toggle="" href="<?php echo site_url();?><?php echo $class_name;?>/entry">
												<i class="green ace-icon fa fa-home bigger-120"></i>
												Vendor Inquiry
											</a>
										</li>
										<li class="">
											<a data-toggle="" href="<?php echo site_url();?><?php echo $class_name;?>">
												<i class="orange ace-icon fa fa-folder bigger-120"></i>
												Inquiry Sent
											</a>
										</li>
										<li>
											<a data-toggle="" href="<?php echo site_url();?><?php echo $class_name;?>/request">
												<i class="orange ace-icon fa fa-folder bigger-120"></i>
												Inquiry Requested <?php  //foreach($rs_notif_inv as $result){if($result["notif_to_inv"]==0){print '<span class=" badge-danger">';}else{print '<span class=" badge badge-danger">';if($result["notif_to_inv"]==0){ echo "";}else{echo $result["notif_to_inv"];}}}?>
											</a>
										</li>
										<li class="active">
											<a data-toggle="" href="<?php echo site_url();?><?php echo $class_name;?>/request_branch">
												<i class="orange ace-icon fa fa-folder bigger-120"></i>
												Inquiry Requested Branch <?php  //foreach($rs_notif_inv_branch as $result){if($result["notif_to_inv_branch"]==0){print '<span class=" badge-danger">';}else{print '<span class=" badge badge-danger">';if($result["notif_to_inv_branch"]==0){ echo "";}else{echo $result["notif_to_inv_branch"];}}}?>
											</a>
										</li>
										
								</ul>

								<div class="tab-content">
									<div id="#" class="tab-pane fade in active">
										<form method="post" id="formlist" action="">
											<input type="hidden" name="deleteid" id="deleteid" value="">
												<table id="listdata" class="table table-striped table-bordered table-hover" width="100%">
									<thead>
										<tr>
											<th>Transaction Number</th>
											<th>Date</th>
											<th>No Customer</th>
											<th>Customer Name</th>
											<th>No. Translation</th>
											<th>Action</th>											
										</tr>
									</thead>

									<tbody>
									<?php
									foreach($results as $result){                                
										print '<tr>';										
										print '<td>' . ($result["no_bukti"]) . '</td>';
										print '<td>' . format_date($result["tanggal"]) . '</td>';
										print '<td>' . ($result["no_customer"]) . '</td>';
										print '<td>' . ($result["nama_customer"]) . '</td>';
										print '<td>' . ($result["no_bukti"]) . '</td>';
										//print '<td>' . ($result["notif_to_inv"]) . '</td>';
										print '<td class="">
												<a target="" class="btn btn-xs btn-purple" href="' . site_url() . $class_name . '/entry/?id_sales_tech=' . $result["id"] . '">Create Inquiry</a>
											</td>';
										print '</tr>';
									}								
									?>
									</tbody>
								</table>
								</form>
									</div>
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
	function hapus(id){
		var pesan = "";
		pesan = "Anda yakin akan hapus data ini?";
		
		var r = confirm(pesan);
		
		if (r == true) {
			location.href='<?php echo site_url();?><?php echo $class_name;?>/delete_data?id=' + id;
		}
	}
</script>