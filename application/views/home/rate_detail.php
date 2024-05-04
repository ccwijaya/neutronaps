<?php 

foreach($rs_rate_project_detail as $result){
	// $id = $result["id"];
	// $id_paf = $result["id_paf"];
	// $id_rr = $result["id_rr"];
	// $id_sales = $result["id_sales"];
	// $id_cabang = $result["id_cabang"];
	$no_paf = $result["no_paf"];
	$no_bukti = $result["no_bukti"];
	$tanggal = $result["tanggal"];
	$nama_customer = $result["nama_customer"];
	// $keterangan = $result["keterangan"];
	$status_approve = $result["status_approve"];
	$waktu_approved = $result["waktu_approved"];

	if($result["status_approve"]< 1){
		$status = "Waiting Approval";
	}
	if($result["status_approve"]==1){
		$status = "Approved";
	}

	if($result["status_approve"]==2){
		$status = "Correction Progress";
	}

	if($result["status_approve"]==3){
		$status = "Disapproved";
	}
	

	
}

function hiddenbox_detail($id, $name, $value){
	$sreturn = '';
	$sreturn .= '<input type="hidden" id="' . $id . '" name="' . $name . '" value="' . $value . '">';
	
	return $sreturn;
}

?>
<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="<?php echo site_url();?>">Home</a>
				</li>
				<li class="active">Dashboard</li>
			</ul>
			
		</div>
		<div class="page-content">
				<?php
					$msg = $this->session->flashdata('msg');
					$tipe = $this->session->flashdata('tipe');
					if (!empty($msg)) {
				?>
						
						<div class="alert blink_me alert-<?php echo $tipe;?>">
							<button type="button" class="close" data-dismiss="alert">
								<i class="ace-icon fa fa-times"></i>
							</button>
							<?php echo $msg;?>
							<br />
						</div>
						
				<?php
						$this->session->unset_userdata('msg');
					}
				?>
			
    					<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								

								

								<style>
												.text100{
													width:100%;
													height:500px;
													overflow-y:auto;
													overflow-x:scroll;

												}

												.text101{
													width:100%;
													height:200px;
													overflow-y:auto;
													overflow-x:scroll;

												}
											</style>
								

								

								<div class="row">
									<div class="col-sm-12">
										<div class="widget-box transparent">
											<div class="widget-header widget-header-flat">
												<!-- <div class="widget-header widget-header-large"> -->
													<h3 class="widget-title grey lighter">
														<!-- <i class="ace-icon fa fa-leaf green"></i> -->
														<?php echo $nama_customer ?> | <?php echo $no_paf ?>
													</h3>
													<p>

													<!-- <div class="widget-toolbar no-border invoice-info"> -->
														<span class="">RE Number:</span>
														<span class=""><?php echo $no_bukti ?></span>

														<br />
														<span class="invoice-info-label">Date:</span>
														<span class=""><?php echo format_date($tanggal) ?></span>
														<p>
													<!-- </div> -->
												<!-- </div> -->
												<h5 class="widget-title lighter">
												Status Approval : <?php echo $status ?> | Approval Date : <?php echo $waktu_approved ?>
												<!-- <span class="label label-success arrowed-right arrowed-in"><?php // echo $status ?></span> -->
													
												</h5>

												<div class="widget-toolbar">
													<a href="#" data-action="collapse">
														<i class="ace-icon fa fa-chevron-up"></i>
													</a>
												</div>
											</div>

											<div class="text100">
											<div class="widget-body">
												<div class="widget-main no-padding">
													<table class="table table-bordered table-striped" width=100%>
														<thead class="thin-border-bottom">
															<tr>
															<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>No.
																</th>
																<!-- <th>
																	<i class="ace-icon fa fa-caret-right blue"></i>No PAF
																</th> -->
																<!-- <th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Customers
																</th>

																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Rate Number
																</th> -->
																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Rute
																</th>
																<!-- <th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Total Cost
																</th> -->
																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Rate Customer
																</th>
																

																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Rate PBL
																</th>

																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Single Trip %
																</th>

																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Multi Trip %
																</th>
																

																<th class="hidden-480">
																	<i class="ace-icon fa fa-caret-right blue"></i>Approval by
																</th>

															

																
																<!-- <th class="hidden-480">
																	<i class="ace-icon fa fa-caret-right blue"></i>Status Project
																</th>
																<th class="hidden-480">
																	<i class="ace-icon fa fa-caret-right blue"></i>Approval Date Time
																</th> -->
															</tr>
														</thead>

														<tbody>
														<?php
														$xi=1;
														foreach($rs_rate_project_detail as $result){	
															$dir="";
															$status = "";

															if($result["total_dir"] > 0){
																$dir = "BD Director";
															}
															if($result["total_dir"]  < 1){
																$dir = "Project Manager";
															}

															if($result["status_approve"]< 1){
																$status = "Waiting Approval";
															}
															if($result["status_approve"]==1){
																$status = "Creating Quotation";
															}

															if($result["status_approve"]==2){
																$status = "Correction";
															}

															if($result["status_approve"]==3){
																$status = "Disapproved";
															}

															 

															print '<tr>';										
															print '<td width="50">' . ($xi) . '</td>';
                              								//print '<td width="150">' . ($result["no_paf"]) . '</td>';
															//print '<td width="200">' . ($result["nama_customer"]) . '</td>';
															//print '<td width="200">' . ($result["no_bukti"]) . '</td>';
															print '<td width="400">' . ($result["rute"]) . '</td>';
															//print hiddenbox_detail("total_cost_".$xi, "total_cost[]", $result["total_cost"]);
															//print '<td width="150">' . format_number($result["total_cost"]) . '</td>';
															print '<td width="150">' . format_number($result["tarif_customer"]) . '</td>';
															print '<td width="150">' . format_number($result["tarif_pbl"]) . '</td>';
															$total_cost = $result["total_cost"];
															$persen_single = ($result["tarif_pbl"] - $result["total_cost"]) / $result["total_cost"]*100;
															print '<td width="150">' . format_number($persen_single) . '</td>';
															print '<td width="150"></td>';
															print '<td width="200">' . ($dir) . '</td>';
															// if($result["status_approve"]==1){
															// 	if($result["is_time"]  <= 3){
															// 		print '<td width="200"><span class="label label-success arrowed-right arrowed-in"><a href="https://pms.pancabudi.com/sls_quotation/entry" target="_blank">' . ($status) . '</a></span> <p><span class="label label-info arrowed-in arrowed-in"><a href="">View Detail</a></span></td>';
															// 	}else{
															// 		print '<td width="200"><span class="label label-danger arrowed-right arrowed-in">Expired more than 3 days</span> <p><span class="label label-info arrowed-in arrowed-in"><a href="">View Detail</a></span></td>';
															// 	}
															// }
																				
															// if($result["status_approve"]==2){
															// 	print '<td width="200"><span class="label label-info arrowed-right arrowed-in">' . ($status) . '</span> <p><span class="label label-info arrowed-in arrowed-in"><a href="">View Detail</a></span></td>';
															// }
															// if($result["status_approve"]==3){
															// 	print '<td width="200"><span class="label label-danger arrowed-right arrowed-in">' . ($status) . '</span> <p><span class="label label-info arrowed-in arrowed-in"><a href="">View Detail</a></span></td>';
															// }
															// if($result["status_approve"]<1){
															// 	if($result["total_dir"]  < 1){
															// 		print '<td width="200"><span class="label label-warning arrowed-right arrowed-in"><a href="https://pms.pancabudi.com/profit_margin_approval_pai/entry/?id=' . $result["id"] . '" target="_blank">' . ($status) . '</a></span> <p><span class="label label-info arrowed-in arrowed-in"><a href="">View Detail</a></span></td>';	
															// 	}
															// 	if($result["total_dir"] > 0){
															// 		print '<td width="200"><span class="label label-warning arrowed-right arrowed-in"><a href="https://pms.pancabudi.com/profit_margin_approval/entry/?id=' . $result["id"] . '" target="_blank">' . ($status) . '</a></span> <p><span class="label label-info arrowed-in arrowed-in"><a href="">View Detail</a></span></td>';
															// 	}
															// }
															// print '<td width="200">' . ($result["waktu_approved"]) . '</td>';
															print '</tr>';
															$xi++;
														}
														?>
														</tbody>
													</table>
												</div><!-- /.widget-main -->
											</div><!-- /.widget-body -->
											</div><!-- /.css -->
										</div><!-- /.widget-box -->
									</div><!-- /.col -->

								
								</div><!-- /.row -->

								

								<div class="row">
									
								</div><!-- /.row -->
									

									<div class="hr hr32 hr-dotted"></div>

									<div class="row">
									
								</div><!-- /.row -->

								

								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
			
					
		</div><!-- /.page-content -->
	</div>
</div><!-- /.main-content -->
	

<script src="<?php echo base_url();?><?php echo get_folder_template();?>js/jquery.easypiechart.min.js"></script>
<script src="<?php echo base_url();?><?php echo get_folder_template();?>js/jquery.sparkline.index.min.js"></script>
<script src="<?php echo base_url();?><?php echo get_folder_template();?>js/jquery.flot.min.js"></script>
<script src="<?php echo base_url();?><?php echo get_folder_template();?>js/jquery.flot.pie.min.js"></script>
<script src="<?php echo base_url();?><?php echo get_folder_template();?>js/jquery.flot.resize.min.js"></script>


<style>
* {box-sizing: border-box;}
ul {list-style-type: none;}
body {font-family: arial;}

.month {
  padding: 70px 25px;
  width: 100%;
  background: #1abc9c;
  text-align: center;
}

.month ul {
  margin: 0;
  padding: 0;
}

.month ul li {
  color: white;
  font-size: 20px;
  text-transform: uppercase;
  letter-spacing: 3px;
}

.month .prev {
  float: left;
  padding-top: 10px;
}

.month .next {
  float: right;
  padding-top: 10px;
}

.weekdays {
  margin-top: 270px;
  margin-left: 0px;
  padding: 0px 0;
  background-color: white;

}



.weekdays li {
  display: inline-block;
  width: 13.6%;
  color: #666;
  text-align: center;
}

.weekdays4 {
  margin-top: -10px;
  margin-right: auto;
  float: right;
  
}

.weekdays5 {
  margin-top: 30px;
 
  float: left;
  
}

.weekdays2 {
  margin-top: 0px;
  padding: 0px 0;
  background-color: white;
  float: right;
}



.weekdays2 li {
  display: inline-block;
  width: 13.6%;
  color: #666;
  text-align: center;
}

.weekdays3 {
  margin-top: 0px;
  margin-left: 0px;
  padding: 0px 0;
  background-color: white;
  
 
}

img.tengah {
    margin-left: auto;
    margin-right: auto;
}

.weekdays3 li {
  display: inline-block;
  width: 13.6%;
  color: #666;
  text-align: center;
}

.days {
  padding: 10px 0;
  background: #eee;
  margin: 0;
}

.days li {
  list-style-type: none;
  display: inline-block;
  width: 13.6%;
  text-align: center;
  margin-bottom: 5px;
  font-size:12px;
  color: #777;
}

.days li .active {
  padding: 5px;
  background: #1abc9c;
  color: white !important
}

.days li .notif {
  padding: 5px;
  background: #335500;
  color: white !important
}

/* Add media queries for smaller screens */
@media screen and (max-width:720px) {
  .weekdays li, .days li {width: 13.1%;}
}

@media screen and (max-width: 420px) {
  .weekdays li, .days li {width: 12.5%;}
  .days li .active {padding: 2px;}
}

@media screen and (max-width: 290px) {
  .weekdays li, .days li {width: 12.2%;}
}

/* Add media queries for smaller screens */
@media screen and (max-width:720px) {
  .weekdays2 li, .days li {width: 13.1%;}
}

@media screen and (max-width: 420px) {
  .weekdays2 li, .days li {width: 12.5%;}
  .days li .active {padding: 2px;}
}

@media screen and (max-width: 290px) {
  .weekdays2 li, .days li {width: 12.2%;}
}


/* Add media queries for smaller screens */
@media screen and (max-width:720px) {
  .weekdays3 li, .days li {width: 13.1%;}
}

@media screen and (max-width: 420px) {
  .weekdays3 li, .days li {width: 12.5%;}
  .days li .active {padding: 2px;}
}

@media screen and (max-width: 290px) {
  .weekdays3 li, .days li {width: 12.2%;}
}

/* Add media queries for smaller screens */
@media screen and (max-width:720px) {
  .weekdays4 li, .days li {width: 13.1%;}
}

@media screen and (max-width: 420px) {
  .weekdays4 li, .days li {width: 12.5%;}
  .days li .active {padding: 2px;}
}

@media screen and (max-width: 290px) {
  .weekdays4 li, .days li {width: 12.2%;}
}

/* Add media queries for smaller screens */
@media screen and (max-width:720px) {
  .weekdays5 li, .days li {width: 13.1%;}
}

@media screen and (max-width: 420px) {
  .weekdays5 li, .days li {width: 12.5%;}
  .days li .active {padding: 2px;}
}

@media screen and (max-width: 290px) {
  .weekdays5 li, .days li {width: 12.2%;}
}
</style>

<style>
  /* (A) RAINBOW COLOR SEQUENCE */
@keyframes rainbow {
  0% { color: #fc0303 }
  17% { color: #45f52a }
  34% { color: #2a7bf5 }
  51% { color: #2af5e4 }
  68% { color: #c92af5 }
  85% { color: #f5dd2a }
  100% { color: #66655d }
}
 
/* (B) ATTACH RAINBOW EFFECT */
.rainbow {
  animation-name: rainbow;
  animation-duration: 1s;
  animation-iteration-count: infinite;
}
</style>

<script>
	
$( ".prev" ).click(function() {
	var tgl_prev = $("#tgl_prev").val();	
	location.href='<?php echo site_url();?>home/?tanggal=' + tgl_prev;
});

$( ".next" ).click(function() {
	var tgl_next = $("#tgl_next").val();	
	location.href='<?php echo site_url();?>home/?tanggal=' + tgl_next;
});


	function change_status(id, status){
		var set_status = 0;
		var pesan = "";
		
		if(status==1){
			set_status = 0;
			pesan = "Anda yakin akan mengubah status ini?";
		} else {
			set_status = 1;			
			pesan = "Anda yakin akan mengubah status ini?";
		}
		var r = confirm(pesan);
		
		if (r == true) {
			location.href='<?php echo site_url();?>home/change_status?id=' + id + '&status=' + set_status;
		}
	}



	
</script>



