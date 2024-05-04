<?php
$session_data = $this->session->userdata('logged_in');
$global_id = $session_data['id'];
$global_username = $session_data['username'];
$global_nama_user = $session_data['nama_user'];
$dash_home = $session_data['dash_home'];
$nowclass = $this->uri->segment('1');
?>
<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="#">Home</a>
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
								<div class="alert alert-block alert-info">
									<button type="button" class="close" data-dismiss="alert">
										<i class="ace-icon fa fa-times"></i>
									</button>

									<i class="ace-icon fa fa-check blue"></i>

									Welcome to
									<strong class="blue">
										FUMIGATION MANAGEMENT SYSTEM 
										<small></small>
									</strong>
								</div>
							<?php if($dash_home==1) {?>
								<div class="row">
									<div class="space-5"></div>

										<div class="col-sm-12 infobox-container">
											

											<div class="infobox infobox-green">
												<div class="infobox-icon">
													<i class="ace-icon fa fa-inbox"></i>
												</div>

												<?php
													$today = date('Y-m-d H:i:s');
													//debug($today);
													$total_data_customer = "";
													$rs_cust = get_value("SELECT a.id FROM customer a");
														
													$total_data_customer = count($rs_cust);
												?>
												<div class="infobox-data">
													<span class="infobox-data-number"><?php echo format_number($total_data_customer); ?></span>
													<div class="infobox-content">Total Customer</div>
												</div>

												<!-- <div class="badge badge-success">
													+32%
													<i class="ace-icon fa fa-arrow-up"></i>
												</div> -->
											</div>

											

											

											

											

											<div class="infobox infobox-green">
												<div class="infobox-icon">
													<i class="ace-icon fa fa-dollar"></i>
												</div>
												<?php
													//$today = date('Y-m-d H:i:s');
													//debug($today);
													$total_data_quote = "";
													$rs_quote = get_value("SELECT id FROM sls_quotation where is_pre_project<>1");
														
													$total_data_quote = count($rs_quote);
												?>

												<div class="infobox-data">
													<span class="infobox-data-number"><?php echo format_number($total_data_quote); ?></span>
													<div class="infobox-content">Quotation released</div>
												</div>
											</div>

											<div class="infobox infobox-green">
												<div class="infobox-icon">
													<i class="ace-icon fa fa-dollar"></i>
												</div>
												<?php
													//$today = date('Y-m-d H:i:s');
													//debug($today);
													$total_data_quote = "";
													$rs_quote = get_value("SELECT id FROM sls_quotation WHERE is_contract=1");
														
													$total_data_quote = count($rs_quote);
												?>

												<div class="infobox-data">
													<span class="infobox-data-number" id="total_data_quote_"><?php echo format_number($total_data_quote); ?></span>
													<div class="infobox-content">Contract released</div>
												</div>
											</div>

										

											<!-- <div class="space-2"></div> -->

											<div class="infobox infobox-blue">
												<div class="infobox-icon">
													<i class="ace-icon fa fa-inbox"></i>
												</div>

												<?php
													//$today = date('Y-m-d H:i:s');
													//debug($today);
													// $total_data_pog = "";
													// $rs_pog = get_value("SELECT id FROM pa_project_summary WHERE no_bukti_pog <>''");
														
													// $total_data_pog = count($rs_pog);
												?>

												<div class="infobox-data">
													<span class="infobox-data-number"><?php echo format_number(0); ?></span>
													<div class="infobox-content">Total PO Customer</div>
												</div>
											</div>

											<div class="infobox infobox-blue">
												<div class="infobox-icon">
													<i class="ace-icon fa fa-certificate"></i>
												</div>

												<?php
													//$today = date('Y-m-d H:i:s');
													//debug($today);
													// $total_data_pog_vm = "";
													// $rs_pog_vm = get_value("SELECT id FROM pa_project_summary WHERE status_verify_pog=1");
														
													// $total_data_pog_vm = count($rs_pog_vm);
												?>

												<div class="infobox-data">
													<span class="infobox-data-number"><?php echo format_number(0); ?></span>
													<div class="infobox-content">Total Certificate</div>
												</div>
											</div>

											<div class="infobox infobox-green">
												<div class="infobox-icon">
													<i class="ace-icon fa fa-dollar"></i>
												</div>

												<?php
													//$today = date('Y-m-d H:i:s');
													//debug($today);
													// $total_data_pog_ops = "";
													// $rs_pog_ops = get_value("SELECT id FROM pa_project_summary WHERE is_received=1");
														
													// $total_data_pog_ops = count($rs_pog_ops);
												?>

												<div class="infobox-data">
													<span class="infobox-data-number"><?php echo format_number(0); ?></span>
													<div class="infobox-content">Total Invoice</div>
												</div>
											</div>

											
										</div>
										

									
								</div>
								

								<style>
												.text100{
													width:100%;
													height:200px;
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
								

								<!-- <div class="hr hr32 hr-dotted"></div> -->

								
								<p>
								<div class="vspace-12-sm"></div>
								

								

								

								<div class="row">
									
								</div><!-- /.row -->
									

									<!-- <div class="hr hr32 hr-dotted"></div> -->

									<div class="row">
									
								</div><!-- /.row -->

								

								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
						<?php }?>
			
					
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



