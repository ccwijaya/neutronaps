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
    $('#listdata').DataTable();
} );
</script>
<div class="page-content">
			
			<div class="row">
				<div class="col-xs-12">
					<h4 class="lighter">
						<button class="btn btn-primary radius-4" onclick="javascript:$('.submit').click();" disabled>
							<i class="ace-icon fa fa-save"></i>Save
						</button>
						<button class="btn btn-info radius-4" onclick="location.href='<?php echo site_url();?><?php echo $class_name;?>';"disabled>
							<i class="ace-icon fa fa-close"></i>Cancel
						</button>
					</h4>
					
					<div class="row">
						<div class="col-xs-12">
							<div class="tabbable">
								<ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab4">
									
									<li class="">
											<a data-toggle="" href="<?php echo site_url();?><?php echo $class_name;?>/entry">
												<i class="green ace-icon fa fa-home bigger-120"></i>
												Entry Form
											</a>
										</li>
										<li class="active">
											<a data-toggle="" href="<?php echo site_url();?><?php echo $class_name;?>">
												<i class="orange ace-icon fa fa-folder bigger-120"></i>
													Data List
											</a>
										</li>
								</ul>

								<div class="tab-content">
									<div id="#" class="tab-pane fade in active">
										<form method="post" id="formlist" action="">
											<input type="hidden" name="deleteid" id="deleteid" value="">
											<table id="listdata" class="table table-striped table-bordered table-hover" width=100%>
												<thead>
													<tr>											
														<th>User ID</th>											
														<th>Nama User</th>											
														<!-- <th>Hak Akses</th>									 -->
														<th>Action</th>											
													</tr>
												</thead>

												<tbody>
												<?php
												foreach($results as $result){    
													$hak_akases= $result["id_level"];
													 if($result["id_level"] == 1){
														$hak_akases = "User";
													 }
													 if($result["id_level"] == 2){
														$hak_akases = "Administrator";
													 }
													
													print '<tr>';										
													print '<td>' . ($result["user_id"]) . '</td>';
													print '<td>' . ($result["nama_user"]) . '</td>';
													// print '<td>' . ($hak_akases) . '</td>';
													print '<td class="">
															<a target="" class="btn btn-xs btn-warning" href="' . site_url() . $class_name . '/entry/?id=' . $result["id"] . '">Edit</a>
															<a target="" class="btn btn-xs btn-danger" onclick="hapus(' . $result["id"] . ');">Delete</a>
														</td>';
													// print '<td><a target="" class="btn btn-sm btn-info" href="' . site_url(). 'user/modul/?id=' . $result->id . '">Modul</a></td>';
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
