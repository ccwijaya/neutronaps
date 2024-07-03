<?php

	$can_access_warehouse = false;
	$can_access_trucking = false;
	$can_access_vm = false;
	$can_access_pa = false;
	$can_access_acc = false;
	$can_access_sls = false;
	$can_access_ops = false;
	$can_access_verify = false;
	
	$can_access_stg = false;
	$can_access_approval = false;
	$can_access_level = false;
	$can_access_level_jabatan = false;
	$can_access_pengajuan = false;
	$can_access_po_account = false;
	$dash_home = false;

	$session_data = $this->session->userdata('logged_in');
	$global_id = $session_data['id'];
	$global_username = $session_data['username'];
	$global_nama_user = $session_data['nama_user'];
	$global_foto = $session_data['foto'];
	$global_level = $session_data['id_level']; //akses_level
	$global_level_bajatan = $session_data['level_jabatan']; //level_jabatan
	$global_pengajuan = $session_data['id_pengajuan'];
	$global_pengajuan2 = $session_data['id_pengajuan'];
	$nowclass = $this->uri->segment('1');

	if($session_data['warehouse']=="1"){
		$can_access_warehouse = true;
	}
	if($session_data['trucking']=="1"){
		$can_access_trucking = true;
	}
	if($session_data['vm']=="1"){
		$can_access_vm = true;
	}

	if($session_data['pa']=="1"){
		$can_access_pa = true;
	}

	if($session_data['acc']=="1"){
		$can_access_acc = true;
	}

	if($session_data['sls']=="1"){
		$can_access_sls = true;
	}

	if($session_data['ops']=="1"){
		$can_access_ops = true;
	}

	if($session_data['verify']=="1"){
		$can_access_verify = true;
	}

	if($session_data['po_account']=="1"){
		$can_access_po_account = true;
	}
	
	if($session_data['stg']=="1"){
		$can_access_stg = true;
	}

	if($session_data['approval']=="1"){
		$can_access_approval = true;
	}

	if($session_data['id_level']=="2"){
		$can_access_level = true;
	}

	if($session_data['dash_home']=="1"){
		$dash_home = true;
	}

	


//debug($bulan);
	$sql_user = "SELECT nama_user FROM web_user WHERE id=" . nvl($global_id, 0) . " LIMIT 1 ";
	$global_nama_user = get_value($sql_user);	
	$global_nama_user = $global_nama_user[0]['nama_user'];
		
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title><?php echo get_title_name();?></title>

		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		
		<!-- jquery js -->
		<script src="<?php echo base_url();?><?php echo get_folder_template();?>js/jquery-2.1.4.min.js"></script>
		<script src="<?php echo base_url();?><?php echo get_folder_template();?>chartjs/Chart.js"></script>

		<link rel="icon" type="image/ico" href="<?php echo base_url();?><?php echo get_folder_template();?>images/avatars/pbl.png">

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="<?php echo base_url();?><?php echo get_folder_template();?>css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo base_url();?><?php echo get_folder_template();?>font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="<?php echo base_url();?><?php echo get_folder_template();?>css/jquery-ui.custom.min.css" />
		<link rel="stylesheet" href="<?php echo base_url();?><?php echo get_folder_template();?>css/chosen.min.css" />
		<link rel="stylesheet" href="<?php echo base_url();?><?php echo get_folder_template();?>css/bootstrap-datepicker3.min.css" />
		<link rel="stylesheet" href="<?php echo base_url();?><?php echo get_folder_template();?>css/bootstrap-timepicker.min.css" />
		<link rel="stylesheet" href="<?php echo base_url();?><?php echo get_folder_template();?>css/daterangepicker.min.css" />
		<link rel="stylesheet" href="<?php echo base_url();?><?php echo get_folder_template();?>css/bootstrap-datetimepicker.min.css" />
		<link rel="stylesheet" href="<?php echo base_url();?><?php echo get_folder_template();?>css/bootstrap-colorpicker.min.css" />
		<link rel="stylesheet" href="<?php echo base_url();?><?php echo get_folder_template();?>css/responsive.dataTables.min.css" />
		
		<!-- toastr -->
		<link rel="stylesheet" href="<?php echo base_url();?><?php echo get_folder_template();?>toastr/css/toastr.min.css">
		<link rel="stylesheet" href="<?php echo base_url();?><?php echo get_folder_template();?>toastr/css/toastr.css">
		<!-- <link rel="stylesheet" href="<?php echo base_url();?><?php echo get_folder_template();?>toastr/css/demo.css"> -->
		<link rel="stylesheet" href="<?php echo base_url();?><?php echo get_folder_template();?>toastr/css/jquerysctipttop.css">
		<script src="<?php echo base_url();?><?php echo get_folder_template();?>toastr/js/toastr.min.js"></script>
		<script src="<?php echo base_url();?><?php echo get_folder_template();?>toastr/js/toastr.js"></script>
	
		<!-- text fonts -->
		<link rel="stylesheet" href="<?php echo base_url();?><?php echo get_folder_template();?>css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="<?php echo base_url();?><?php echo get_folder_template();?>css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="<?php echo base_url();?><?php echo get_folder_template();?>css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="<?php echo base_url();?><?php echo get_folder_template();?>css/ace-skins.min.css" />
		<link rel="stylesheet" href="<?php echo base_url();?><?php echo get_folder_template();?>css/ace-rtl.min.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="<?php echo base_url();?><?php echo get_folder_template();?>css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="<?php echo base_url();?><?php echo get_folder_template();?>js/ace-extra.min.js"></script>

		<!-- editor content email -->
		<script src="<?php echo base_url();?>asset/ckeditor/ckeditor.js"></script>
		<script src="<?php echo base_url();?>asset/ckeditor/samples/js/sample.js"></script>
		
		<link rel="stylesheet" href="<?php echo base_url();?>asset/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css">
		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="<?php echo base_url();?><?php echo get_folder_template();?>js/html5shiv.min.js"></script>
		<script src="<?php echo base_url();?><?php echo get_folder_template();?>js/respond.min.js"></script>
		<![endif]-->

		<script src="<?php echo base_url();?><?php echo get_folder_template();?>js/bootstrap-tag.min.js"></script>
		<style>
		.blink_me {
			animation: blinker 2s ease infinite;
		}
		
		@keyframes blinker {
		  50% {
			opacity: 0;
		  }
		}

		.btn.btn-app.btn-xs{
			font-size:10px;
			height:40px;
			width:60px;
			padding-top:0;
			line-height:0.8;
			margin-top:-5px;
		}
		.numericbox{
			text-align:right;
		}
		.bordered{
			border:1px solid;
		}
		a:visited {
			color: white;
		}

		
		.preloader {
		position: fixed;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		z-index: 9999;
		background-color:rgba(255,255,255,0.6);
		}
		.preloader .loading {
		position: absolute;
		left: 50%;
		top: 50%;
		transform: translate(-50%,-50%);
		font: 14px arial;
		}
		</style>
		<script>
			$(document).ready(function(){
			$(".preloader").fadeOut();
			})
    	</script>

		<script>
		// document.onreadystatechange = function () {
		// if (document.readyState === "complete") {
		// console.log(document.readyState);
		// document.getElementById("PreLoaderBar").style.display = "none";
		// }
		// }
		</script>
		<style type="text/css">
		.progress {
		position: relative;
		height: 2px;
		display: block;
		width: 100%;
		background-color: white;
		border-radius: 2px;
		background-clip: padding-box;
		/*margin: 0.5rem 0 1rem 0;*/
		overflow: hidden;

		}
		.progress .indeterminate {
		background-color:black; }
		.progress .indeterminate:before {
		content: '';
		position: absolute;
		background-color: #2C67B1;
		top: 0;
		left: 0;
		bottom: 0;
		will-change: left, right;
		-webkit-animation: indeterminate 2.1s cubic-bezier(0.65, 0.815, 0.735, 0.395) infinite;
		animation: indeterminate 2.1s cubic-bezier(0.65, 0.815, 0.735, 0.395) infinite; }
		.progress .indeterminate:after {
		content: '';
		position: absolute;
		background-color: #2C67B1;
		top: 0;
		left: 0;
		bottom: 0;
		will-change: left, right;
		-webkit-animation: indeterminate-short 2.1s cubic-bezier(0.165, 0.84, 0.44, 1) infinite;
		animation: indeterminate-short 2.1s cubic-bezier(0.165, 0.84, 0.44, 1) infinite;
		-webkit-animation-delay: 1.15s;
		animation-delay: 1.15s; }


		@-webkit-keyframes indeterminate {
		0% {
		left: -35%;
		right: 100%; }
		60% {
		left: 100%;
		right: -90%; }
		100% {
		left: 100%;
		right: -90%; } }
		@keyframes indeterminate {
		0% {
		left: -35%;
		right: 100%; }
		60% {
		left: 100%;
		right: -90%; }
		100% {
		left: 100%;
		right: -90%; } }
		@-webkit-keyframes indeterminate-short {
		0% {
		left: -200%;
		right: 100%; }
		60% {
		left: 107%;
		right: -8%; }
		100% {
		left: 107%;
		right: -8%; } }
		@keyframes indeterminate-short {
		0% {
		left: -200%;
		right: 100%; }
		60% {
		left: 107%;
		right: -8%; }
		100% {
		left: 107%;
		right: -8%; } }
		</style>
		
	</head>

	<body class="no-skin">

		<div class="preloader">
		<div class="loading">
			<img src="<?php echo base_url();?><?php echo get_folder_template();?>images/loading/loading.gif" width="80">
			<p>Please wait...</p>
		</div>
		</div>
		<div id="navbar" class="navbar navbar-default ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="" class="navbar-brand">
						<small>
							<i class="fa fa-bank"></i>
							<b><?php echo get_app_name(); ?></b>
						</small>
					</a>
				</div>

				<?php
					//$today = date('Y-m-d H:i:s');
					//debug($today);
					// $re_notif = "";
					// $rs_re = get_value("SELECT id FROM view_re_to_vm");
													
					// $re_notif = count($rs_re);


					// $rr_notif = "";
					// $rs_rr = get_value("SELECT id FROM view_rr_to_pa");
													
					// $rr_notif = count($rs_rr);
				?>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
				


						
						
						
					
						
						
						
						<!-- <li class="purple dropdown-modal">
							<a href="<?php echo base_url();?>#">
								<i class="ace-icon <?php echo $icon;?> icon-animated-bell"></i><b><?php echo $ucapan;?> &nbsp;<?php echo $nama_user_ultah;?>&nbsp;</b>
							</a>
						</li> -->
						
						<li class="light-blue dropdown-modal">
						
						
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="<?php echo base_url();?><?php echo get_folder_template();?>images/avatars/<?php echo $global_foto;?>" alt="Jason's Photo" />
								<span class="user-info">
									<h6>Welcome,</h6>
									<?php echo $global_nama_user;?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
							
								<li>
									<a href="<?php echo base_url();?>profile">
										<i class="ace-icon fa fa-user"></i>
										Profile
									</a>
								</li>

								<li class="divider"></li>
							
								<li>
									<a href="<?php echo base_url();?>logout">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>
					</ul>
					<div class="ace-settings-container" id="ace-settings-container">
							<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
								<i class="ace-icon fa fa-cog bigger-250"></i>
								Setting
							</div>

							<div class="ace-settings-box clearfix" id="ace-settings-box">
								<div class="pull-left width-50">
									<div class="ace-settings-item">
										<div class="pull-left">
											<select id="skin-colorpicker" class="hide">
												<option data-skin="no-skin" value="#438EB9">#438EB9</option>
												<option data-skin="skin-1" value="#222A2D">#222A2D</option>
												<option data-skin="skin-2" value="#C6487E">#C6487E</option>
												<option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
											</select>
										</div>
										<span>&nbsp; Choose Skin</span>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-navbar" autocomplete="off" />
										<label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-sidebar" autocomplete="off" />
										<label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-breadcrumbs" autocomplete="off" />
										<label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-rtl" autocomplete="off" />
										<label class="lbl" for="ace-settings-rtl"> Right To Left rtl</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-add-container" autocomplete="off" />
										<label class="lbl" for="ace-settings-add-container">
											Inside
											<b>.container</b>
										</label>
									</div>
								</div><!-- /.pull-left -->

								<div class="pull-left width-50">
									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-hover" autocomplete="off" />
										<label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-compact" autocomplete="off" />
										<label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-highlight" autocomplete="off" />
										<label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
									</div>
								</div><!-- /.pull-left -->
							</div><!-- /.ace-settings-box -->
						</div><!-- /.ace-settings-container -->

				</div>
			</div><!-- /.navbar-container -->
		</div>

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar responsive ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>
				

					<ul class="nav nav-list">
							<?php if($can_access_sls){ ?>
								<li class="<?php echo is_open($nowclass, "customer,sales,produk_jasa,produk_jasa_detail,sls_quotation,sls_contract,sls_po_customer,sls_wo,sls_sertifikat,sls_invoice,sls_ba"); ?> <?php echo is_active($nowclass, "customer,sales,produk_jasa,produk_jasa_detail,sls_quotation,sls_contract,sls_po_customer,sls_wo,sls_sertifikat,sls_invoice,sls_ba"); ?>"><a href="#" class="dropdown-toggle"><i class="menu-icon fa fa-bar-chart"></i>SALES<b class="arrow fa fa-angle-down"></b></a><b class="arrow"></b>
									<ul class="submenu">
										<li class="<?php echo is_open($nowclass, "customer,sales,produk_jasa,produk_jasa_detail"); ?> <?php echo is_active($nowclass, "customer,sales,produk_jasa,produk_jasa_detail"); ?>"><a href="#" class="dropdown-toggle"><i class="menu-icon fa fa-"></i>Master<b class="arrow fa fa-angle-down"></b></a><b class="arrow"></b>
											<ul class="submenu">
												<li class="<?php echo is_active($nowclass, "sales"); ?>"><a href="<?php echo base_url("sales"); ?>"><i class="menu-icon"></i>Sales</a><b class="arrow"></b></li>
												<li class="<?php echo is_active($nowclass, "customer"); ?>"><a href="<?php echo base_url("customer"); ?>"><i class="menu-icon"></i>Customer</a><b class="arrow"></b></li>
												<li class="<?php echo is_active($nowclass, "produk_jasa"); ?>"><a href="<?php echo base_url("produk_jasa"); ?>"><i class="menu-icon"></i>Product Service</a><b class="arrow"></b></li>
												<li class="<?php echo is_active($nowclass, "produk_jasa_detail"); ?>"><a href="<?php echo base_url("produk_jasa_detail"); ?>"><i class="menu-icon"></i>Product Service Details</a><b class="arrow"></b></li>
											</ul>	
										
										</li>
								</li>

							
										<li class="<?php echo is_open($nowclass, "sls_quotation,sls_contract,sls_po_customer,sls_wo,sls_sertifikat,sls_invoice,sls_ba"); ?> <?php echo is_active($nowclass, "sls_quotation,sls_contract,sls_po_customer,sls_wo,sls_sertifikat,sls_invoice,sls_ba"); ?>"><a href="#" class="dropdown-toggle"><i class="menu-icon fa fa-"></i>Transaction<b class="arrow fa fa-angle-down"></b></a><b class="arrow"></b>
											<ul class="submenu">
											<li class="<?php echo is_active($nowclass, "sls_quotation"); ?>"><a href="<?php echo base_url("sls_quotation"); ?>"><i class="menu-icon"></i>Quotation</a><b class="arrow"></b></li>	
												<!-- <li class="<?php echo is_active($nowclass, "sls_contract_"); ?>"><a href="<?php echo base_url("sls_contract_"); ?>"><i class="menu-icon"></i>Project Release</a><b class="arrow"></b></li>	 -->
												<li class="<?php echo is_active($nowclass, "sls_po_customer"); ?>"><a href="<?php echo base_url("sls_po_customer"); ?>"><i class="menu-icon"></i>Sertifikat</a><b class="arrow"></b></li>
												<!-- <li class="<?php echo is_active($nowclass, "sls_wo"); ?>"><a href="<?php echo base_url("sls_wo"); ?>"><i class="menu-icon"></i>Work Order</a><b class="arrow"></b></li> -->
												<li class="<?php echo is_active($nowclass, "sls_ba"); ?>"><a href="<?php echo base_url("sls_ba"); ?>"><i class="menu-icon"></i>Berita Acara</a><b class="arrow"></b></li>
												<!-- <li class="<?php echo is_active($nowclass, "sls_sertifikat"); ?>"><a href="<?php echo base_url("sls_sertifikat"); ?>"><i class="menu-icon"></i>Certification</a><b class="arrow"></b></li> -->
												<li class="<?php echo is_active($nowclass, "sls_invoice"); ?>"><a href="<?php echo base_url("sls_invoice"); ?>"><i class="menu-icon"></i>Invoice</a><b class="arrow"></b></li>
												
											</ul>
										</li>
								

								
										<li class="<?php echo is_open($nowclass, "sls_lap_penjualan"); ?> <?php echo is_active($nowclass, "sls_lap_penjualan"); ?>"><a href="#" class="dropdown-toggle"><i class="menu-icon fa fa-"></i>Reporting<b class="arrow fa fa-angle-down"></b></a><b class="arrow"></b>
											<ul class="submenu">
												<li class="<?php echo is_active($nowclass, "sls_lap_penjualan"); ?>"><a href="<?php echo base_url("sls_lap_penjualan"); ?>"><i class="menu-icon"></i>Sales Report</a><b class="arrow"></b></li>
											</ul>
										</li>
										
									

									</ul>	
								</li>
							<?php } ?>

							<?php if($can_access_approval){ ?>
								<li class="<?php echo is_open($nowclass, "sls_quotation_verify"); ?> <?php echo is_active($nowclass, "sls_quotation_verify"); ?>"><a href="#" class="dropdown-toggle"><i class="menu-icon fa fa-pencil"></i>APPROVAL<b class="arrow fa fa-angle-down"></b></a><b class="arrow"></b>
									<ul class="submenu">
										
										<li class="<?php echo is_active($nowclass, "sls_quotation_verify"); ?>"><a href="<?php echo base_url("sls_quotation_verify"); ?>"><i class="menu-icon"></i>Quotation Verify</a><b class="arrow"></b></li>
									
								
									</ul>
								</li>
							<?php } ?>
				
							<li class="<?php echo is_open($nowclass, "gnr_timeline"); ?> <?php echo is_active($nowclass, "gnr_timeline"); ?>"><a href="#" class="dropdown-toggle"><i class="menu-icon fa fa-list-alt"></i>MAIN MENU<b class="arrow fa fa-angle-down"></b></a><b class="arrow"></b>
								<ul class="submenu">
									<li class="<?php echo is_active($nowclass, "gnr_timeline"); ?>"><a href="<?php echo base_url("gnr_timeline"); ?>"><i class="menu-icon"></i>Time Line Module</a><b class="arrow"></b></li>
								</ul>
							</li>
					

					<?php if($can_access_stg){ ?>
					<li class="<?php echo is_open($nowclass, "user,logout,cabang,kategori_kirim,kategori_kirim_dist,gnr_timeline_received"); ?> <?php echo is_active($nowclass, "user,logout,cabang,kategori_kirim,kategori_kirim_dist,gnr_timeline_received"); ?>"><a href="#" class="dropdown-toggle"><i class="menu-icon fa fa-wrench"></i>SETTINGS<b class="arrow fa fa-angle-down"></b></a><b class="arrow"></b>
						<ul class="submenu">
							<li class="<?php echo is_active($nowclass, "cabang"); ?>"><a href="<?php echo base_url("cabang"); ?>"><i class="menu-icon fa fa-caret-right"></i>Cabang</a><b class="arrow"></b></li>
							<li class="<?php echo is_active($nowclass, "gnr_timeline_received"); ?>"><a href="<?php echo base_url("gnr_timeline_received"); ?>"><i class="menu-icon fa fa-caret-right"></i>Time Line Developer</a><b class="arrow"></b></li>
							<li class="<?php echo is_active($nowclass, "user"); ?>"><a href="<?php echo base_url("user"); ?>"><i class="menu-icon fa fa-caret-right"></i>Users</a><b class="arrow"></b></li>
							<li class="<?php echo is_active($nowclass, "logout"); ?>"><a href="<?php echo base_url("logout"); ?>"><i class="menu-icon fa fa-caret-right"></i>Logout</a><b class="arrow"></b></li>
						</ul>
					</li>
					<?php } ?>

				</ul>


				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>

<?php
function is_active($nowclass, $str){
	$sreturn = "";
	
	$counter = ListCount($str, ",");
	for($i=0;$i<=$counter;$i++){
		if(ListItem($str, ",", $i)==$nowclass){
			$sreturn = "active";
		}
	}
	return $sreturn;
}
function is_open($nowclass, $str){
	$sreturn = "";
	
	$counter = ListCount($str, ",");
	for($i=0;$i<=$counter;$i++){
		if(ListItem($str, ",", $i)==$nowclass){
			$sreturn = "open";
		}
	}
	return $sreturn;
}
?>
