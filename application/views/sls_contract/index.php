<?php
$session_data = $this->session->userdata('logged_in');
$global_id = $session_data['id'];
$global_username = $session_data['username'];
$global_nama_user = $session_data['nama_user'];
$global_level = $session_data['id_level'];
$global_delete = $session_data['delete_akses'];
//$global_pass_email = $session_data['pass_email'];
//$global_sales = $session_data['id_sales'];
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
											<a data-toggle="" href="#">
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
												<table id="listdata" class="table table-striped table-bordered table-hover" width="100%">
									<thead>
										<tr>
											<th width="150">No Contract</th>
											<th>Contract Date</th>
											<th width="150">No Quotation</th>
											<th>Quotation Date</th>
											<!-- <th>Branch</th> -->
											<th>Customer</th>
											<th>Sales Name</th>
											<!-- <th>Attach Quote App</th>
											<th>Attach Quote Old</th> -->
											<!-- <th width="180">Status Negotiation</th>
											<th width="180">Status Quotation</th>	 -->
											<!-- <th width="180">Remarks</th> -->
											<th width="150">Action</th>											
										</tr>
									</thead>

									<tbody>
									<?php
									foreach($results as $result){   
										// $status = "";
										// $status_proses_pq = $result["status_proses_pq"];
										// $tanggal_pre = $result["tanggal_pre"];
										// $no_pre_quote = $result["no_pre_quote"];

										// if($status_proses_pq == 1){
										// 	$status = "processed";
										// }

										// if($status_proses_pq != 1){
										// 	$status = "Waiting processed";
										// } 
										
										// if($no_pre_quote != ""){
										// 	$no_pre_quote = $result["no_pre_quote"];
										// }

										// if($no_pre_quote == ""){
										// 	$no_pre_quote = "Pending...";
										// }

										// if($tanggal_pre != ""){
										// 	$tanggal_pre = $result["tanggal_pre"];
										// }

										// if($tanggal_pre == ""){
										// 	$tanggal_pre = "Pending...";
										// }

										print '<tr>';		
										//print '<td>' . ($result["nama_salesman"]) . '</td>';	
										// print '<td>' . $no_pre_quote . '</td>';	
										
										// if($tanggal_pre == ""){
										// 	print '<td>Pending...</td>';
										// }
										// if($tanggal_pre != ""){
										// 	print '<td>' . format_date($tanggal_pre) . '</td>';	
										// }
										if($result["no_contract"]!=""){
											print '<td>' . $result["no_contract"] . '</td>';	
										}else{
											print '<td>Pending...</td>';
										}

										if($result["tanggal_contract"]!=""){
											print '<td>' . format_date($result["tanggal_contract"]) . '</td>';	
										}else{
											print '<td>Pending...</td>';
										}

										
										print '<td>' . $result["no_bukti"] . '</td>';	
										print '<td>' . format_date($result["tanggal"]) . '</td>';		
										//print '<td>' . ($result["nama_cabang"]) . '</td>';
										print '<td>' . ($result["nama_customer"]) . '</td>';		
										print '<td>' . ($result["id_sales"]) . '</td>';
										// print '<td>';
										// print '<a class="btn btn-success btn-xs" href="' . base_url() . 'upload/' . $result["attach_quote_app"] . '" target="_blank">'.$result["attach_quote_app"].'</a>';
										// print '</td>';
										// print '<td>';
										// print '<a class="btn btn-success btn-xs" href="' . base_url() . 'upload/' . $result["attach_quote_old"] . '" target="_blank">'.$result["attach_quote_old"].'</a>';
										// print '</td>';
										
										// print '<td>';
										// 	if($result["is_nego"]==1){
										// 	print'<span class="label label-lg label-warning arrowed-right">Waiting Approval <i class="ace-icon fa fa-warning bigger-120"></i>';
										// 	}
										// 	if($result["is_nego"]==2){
										// 		print'<span class="label label-lg label-success arrowed-right">Approved <i class="ace-icon fa fa-check bigger-120"></i>';
										// 	}
										// 	if($result["is_nego"]<1){
										// 		print'<span class="">-';
										// 	}
										// print'</td>';

										// print '<td>';
										
										// 	if($result["selisih"]<=7){
										// 		if($result["is_deal"]==1){
										// 			print'<span class="label label-lg label-success arrowed-right=">Deal <i class="ace-icon fa fa-check bigger-120"></i>';
										// 		}else{
										// 			print'<span class="label label-lg label-warning arrowed-right=">Waiting Deal...';
										// 		}
												
										// 	}
										// 	if($result["selisih"]>7){
										// 		if($result["is_deal"]==1){
										// 			print'<span class="label label-lg label-success arrowed-right=">Deal <i class="ace-icon fa fa-check bigger-120"></i>';
										// 		}else{
										// 			print'<span class="label label-lg label-danger arrowed-right">Expired more than 7 Days';
										// 		}
										// 	}
											
										// print'</td>';
										// if($status_proses_pq ==1){
										// 	print '<td><span class="label label-lg label-success arrowed-right">' . ($status) . '<i class="ace-icon fa fa-check bigger-120"></i></td>';
										// }

										// if($result["status_approve_pq"] !=1){
										// 	print '<td><span class="label label-lg label-warning arrowed-right">Waiting Approve<i class="ace-icon fa fa-warning bigger-120"></i></td>';
										// }
										// if($result["status_approve_pq"] ==1){
										// 	print '<td><span class="label label-lg label-success arrowed-right">Approved<i class="ace-icon fa fa-check bigger-120"></i></td>';
										// }

										
										//print '<td>' . ($result["minggu"]) . '</td>';
										//print '<td>' . ($result["keterangan"]) . '</td>';
										
										print '<td class="" align="center">';
										//if($result["ready_quote_retail"]==""){
											print '<a target="" class="btn btn-info" href="' . site_url() . $class_name . '/entry/?id=' . $result["id"] . '">View</a>';
											print '&nbsp;';
											if($global_delete==1){
												print '<a target="" class="btn-sm btn-danger" onclick="hapus(' . $result["id"] . ');"><i class="ace-icon fa fa-trash"></i></a>';
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
