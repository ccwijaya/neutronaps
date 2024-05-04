<?php
$id = "";
$id_level = "";
$nama_user = "";
$user_id = "";
$passwd = "";
$no_hp = "";
$email = "";
$id_cabang = "";

if($results != ""){							
	foreach($results as $result){
		$id = $result->id;
		$id_level = $result ->id_level;
		$nama_user = $result->nama_user;
		$user_id = $result->user_id;
		$passwd = $result->passwd;
		// $url_foto = $result->url_foto;
		$no_hp = $result->no_hp;
		$email = $result->email;
		$id_cabang = $result->id_cabang;
	}
}

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
								<button class="btn btn-app btn-success btn-xs radius-4" onclick="javascript:$('.submit').click();">
									<i class="ace-icon fa fa-save bigger-160"></i>Save
								</button>
								<button class="btn btn-app btn-warning btn-xs radius-4" onclick="location.href='<?php echo site_url();?><?php echo $class_name;?>';">
									<i class="ace-icon fa fa-close bigger-160"></i>Cancel
								</button>
							</h4>
					
							<div class="row">
								<div class="col-xs-12">
									<div class="tabbable">
										<ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab4">
											<li class="active">
												<a data-toggle="" href="<?php echo site_url();?><?php echo $class_name;?>/entry">
													<i class="blue ace-icon fa fa-pencil bigger-120"></i>
														Entry Form
												</a>
											</li>
											<li>
												<a data-toggle="" href="<?php echo site_url();?><?php echo $class_name;?>">
													<i class="orange ace-icon fa fa-folder bigger-120"></i>
														Data List
												</a>
											</li>
										</ul>
										<script language=javascript>
	
									/** After windod Load */  
									$(window).bind("load", function() {  
										window.setTimeout(function() {  
											$(".alert").fadeTo(22000, 0).slideUp(500, function() {  
											$(this).remove();  
											});  
										}, 500);  
										});  
									
									$(document).ready(function() {
										$('#listdata').DataTable({
											scrollY: "300px",
											scrollX: true,
											scrollCollapse: true
																
											} );
											} );
									</script>
									<?php if($this->session->flashdata('info')){ ?>  
										<div class="alert alert-info">  
											<button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
											<strong></strong> <?php echo $this->session->flashdata('info'); ?>  
										</div>  
									<?php } else if($this->session->flashdata('error')){ ?>  
									<div class="alert alert-danger">  
										<a href="#" class="close" data-dismiss="alert">&times;</a>  
										<strong>Error!</strong> <?php echo $this->session->flashdata('error'); ?>  
									</div>  
									<?php }?>

											<div class="tab-content">
												<div id="#" class="tab-pane fade in active">
													<form id="formentry" class="form-horizontal" enctype="multipart/form-data" action="<?php echo base_url();?><?php echo $class_name;?>/simpan" method="post" data-parsley-validate>
														</br>
														<div class="col-md-offset-2">
					
								  <?php
									
									echo texthidden("id", $id);
									
									
									if($id==""){							
										echo '<p class="btn-warning"> &nbsp; NB: Username tidak boleh ada spasi. Secara otomatis username yang didaftarkan akan sama dengan password untuk login. Username yang baru didaftarkan diharapkan segera mengubah passwordnya.</p>';
										echo '<div class="row">';
										$param["title"] = "Username";
										$param["name"] = "user_id";
										$param["class_column"] = "col-lg-5";
										$param["required"] = "Y";
										$param["value"] = $user_id;
										echo textbox($param);
										unset($param);
										echo '</div>';
									} else {
										echo texthidden("user_id", $user_id);
									}
									
									echo '<div class="row">';
									$param["title"] = "Nama Lengkap";
									$param["name"] = "nama_user";
									$param["class_column"] = "col-lg-5";
									$param["required"] = "Y";
									$param["value"] = $nama_user;
									echo textbox($param);
									unset($param);
									echo '</div>';

									echo '<div class="row">';
									$param["title"] = "Password";
									$param["name"] = "passwd";
									$param["class_column"] = "col-lg-5";
									$param["required"] = "Y";
									$param["value"] = $passwd;
									echo textbox($param);
									unset($param);
									echo '</div>';
									
									echo '<div class="row">';
									$param["title"] = "Email";
									$param["name"] = "email";
									$param["class_column"] = "col-lg-5";
									$param["required"] = "Y";
									$param["value"] = $email;
									echo textbox($param);
									unset($param);
									echo '</div>';
									
									echo '<div class="row">';
									$param["title"] = "Nomor Telepon";
									$param["name"] = "no_hp";
									$param["class_column"] = "col-lg-5";
									$param["required"] = "Y";
									$param["value"] = $no_hp;
									echo textbox($param);
									unset($param);
									echo '</div>';

									echo '<div class="row">';
									$param["title"] = "Level";
									$param["name"] = "id_level";
									$param["class_column"] = "col-lg-5";
									$param["placeholder"] = "Pilih Level";
									$param["required"] = "";
									$param["value"] = $id_level;
									$options["0"] = "Pilih Level";
									foreach ($rs_level as $data) {
										$options[$data["id"]] = $data["nama"];
									}
									$param["options"] = $options;
									echo combobox($param);
									unset($options);
									echo '</div>';
								
									
									
									echo'<div class="row">';
									$param["title"] = "Branch";
									$param["name"] = "id_cabang";
									$param["class_column"] = "col-lg-5";
									$param["placeholder"] = "Select Branch";
									$param["required"] = "Y";
									$param["value"] = $id_cabang;
									$options["0"] = "PUSAT";
									foreach ($rs_cabang as $data) {
									$options[$data["id"]] = $data["kode"]. "  |  " .$data["nama_cabang"];
									}
									$param["options"] = $options;
									echo combobox($param);
									unset($options);
									echo '</div>';
									
									?>

									<?php
									$i=1;
									foreach($rs_menu_list as $result){
										
										?>
									<div class="form-group form-check">
    									<label class="form-check-label">
      										<input class="form-check-input" type="checkbox" name="nama[]" value="<?php echo $result["id"]; ?>"> <?php echo $result["keterangan_menu"]; ?>
    									</label>
  									</div>
										<?php
										// echo $result["kode"];
										// echo "<br>";
										
										// $i++;
									}								
									?>
							
									<input class="submit btn btn-danger" type="submit" value="Submit" style="display:none;">
									</div>	
													</form>
												</div>
											</div>
								
								</div>
							</div>
						</div><!-- /.row -->
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.page-content-->
	</div>
</div><!-- /.main-content -->