<?php
$session_data = $this->session->userdata('logged_in');
$global_id = $session_data['id'];
$global_username = $session_data['username'];
$global_nama_user = $session_data['nama_user'];
$global_akses_harga_jual = $session_data['akses_harga_jual'];
$global_level = $session_data['id_level'];
$nowclass = $this->uri->segment('1');
?>
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
<style>
.page-link{
	color:#000;
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
							
		} );
		} );
</script>
<div class="page-content">
			
			<div class="row">
				<div class="col-xs-12">
					<h4 class="lighter">
						<button class="btn btn-primary radius-4" onclick="javascript:$('.submit').click();" disabled>
							<i class="ace-icon fa fa-save bigger-160"></i>Save
						</button>
						<button class="btn btn-info radius-4" onclick="location.href='<?php echo site_url();?><?php echo $class_name;?>';"disabled>
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
												Data Entry 
											</a>
										</li>

										<li class="active">
											<a data-toggle="" href="<?php echo site_url();?><?php echo $class_name;?>">
												<i class="orange ace-icon fa fa-folder bigger-120"></i>
													Data List
											</a>
										</li>
								</ul>
								<style>
												.text100{
													width:100%;
													height:500px;
													overflow-y:auto;
													overflow-x:scroll;

												}
											</style>

								<div class="tab-content">
									<div id="#" class="tab-pane fade in active">
										<form method="post" id="formlist" action="">
											<input type="hidden" name="deleteid" id="deleteid" value="">
												<table id="listdata" class="table table-striped table-bordered table-hover" width="100%">
												<thead>
													<tr>
														
														<th width="300px">kode</th>
														<th width="300px">Nama Customer</th>
														<th width="300px">Alamat</th>
														<th width="300px">Kelurahan</th>
														<th width="300px">Kecamatan</th>
														<!-- <th width="300px">Kode Pos</th> -->
														<th width="300px">Kota</th>
														<th width="200px">Sales</th>
														<th width="300px">Cabang</th>
														<th width="150px">Action</th>											
													</tr>
												</thead>

												<tbody>
												<?php
												foreach($results as $result){                                
													print '<tr>';										
													
													print '<td>' . ($result["kategori_cust"]) . '-' . ($result["kode"]) . '</td>';
													print '<td>' . ($result["nama_customer"]) . '</td>';
													print '<td>' . ($result["alamat"]) . '</td>';
													print '<td>' . ($result["kelurahan"]) . '</td>';
													print '<td>' . ($result["kecamatan"]) . '</td>';
													//print '<td>' . ($result["kode_pos"]) . '</td>';
													print '<td>' . ($result["kota"]) . '</td>';
													print '<td>' . ($result["nama_sales"]) . '</td>';
													print '<td>' . ($result["nama_cabang"]) . '</td>';
												
													print '<td class="">';
													print '<a target="" class="btn btn-xs btn-primary" href="' . site_url() . $class_name . '/entry/?id=' . $result["id"] . '">Edit</a>';
															print '&nbsp;';
															if($global_level==2){
																print '<a target="" class="btn btn-xs btn-danger" onclick="hapus(' . $result["id"] . ');">Delete</a>';
															}else{
																print '';
															}
															print '&nbsp;';
													print '</td>';
													print '</tr>';
												}								
												?>
												</tbody>
											</table>
											</div>

											

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
	function hapus(id){
		var pesan = "";
		pesan = "Anda yakin akan hapus data ini?";
		
		var r = confirm(pesan);
		
		if (r == true) {
			location.href='<?php echo site_url();?><?php echo $class_name;?>/delete_data?id=' + id;
		}
	}
</script>
