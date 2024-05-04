<?php
$id = "";
$nama_user = "";
$user_id = "";
$no_hp = "";
$email = "";
$passwd = "";
$foto = "";
$ttd = "";
//$id_jabatan = "";

if($results != ""){							
	foreach($results as $result){
		$id = $result["id"];
		$nama_user = $result["nama_user"];
		$user_id = $result["user_id"];
		
		$no_hp = $result["no_hp"];
		$email = $result["email"];
		$foto = $result["foto"];
		$ttd = $result["ttd"];
		//$id_jabatan = $result->id_jabatan;
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
			
			<div class="page-header">
				<h1>
					<?php echo $form_title;?>
					<small class="hidden-480">
						<i class="ace-icon fa fa-angle-double-right"></i>
						Entry Form
					</small>
					<div class="pull-right">
									
					<button class="btn btn-app btn-warning btn-xs radius-4" onclick="location.href='<?php echo site_url();?><?php echo $class_name;?>';">
						<i class="ace-icon fa fa-close bigger-160"></i>Cancel
					</button>
					<button class="btn btn-app btn-success btn-xs radius-4" onclick="javascript:$('.submit').click();">
						<i class="ace-icon fa fa-save bigger-160"></i>Save
					</button>
						
					</div>	
				</h1>							
			</div><!-- /.page-header -->
			
			<div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->
					
					<div class="row">
						<div class="col-xs-12">
							<div class="clearfix">
								<div class="pull-right tableTools-container"></div>
							</div>

							<!-- div.table-responsive -->

							<!-- div.dataTables_borderWrap -->
							<div>
								
								<form id="formentry" action="<?php echo base_url();?><?php echo $class_name;?>/simpan" method="post" data-parsley-validate>
					
								  <?php
									
									echo texthidden("id", $id);
									
																		
									
							echo '<div class="row">';
							$param["title"] = "Username";
							$param["name"] = "user_id";
							$param["class_column"] = "col-lg-5";
							$param["required"] = "Y";
							$param["value"] = $user_id;
							echo textbox($param);
							unset($param);
							echo '</div>';
						// } else {
							// echo texthidden("user_id", $user_id);
						// }
						
						echo '<div class="row">';
						$param["title"] = "Password (kosongkan jika tidak ingin mengganti)";
						$param["name"] = "passwd";
						$param["class_column"] = "col-lg-5";
						// $param["required"] = "Y";
						$param["value"] = $passwd;
						echo textpassword($param);
						unset($param);
						echo '</div>';
						
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

				

															echo '<br/>';
															echo '<br/>';
						
						
						
									
									
									
		?>
							
									<input class="submit btn btn-danger" type="submit" value="Submit" style="display:none;">
								</form>
								
							</div>
						</div>
					</div>
					
					<!-- PAGE CONTENT ENDS -->
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.page-content -->
	</div>
</div><!-- /.main-content -->
