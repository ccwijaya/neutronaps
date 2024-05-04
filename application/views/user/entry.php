<?php
$id = "";
$nama_user = "";
$user_id = "";
// $id_karyawan = "";
$level_jabatan = "";
$passwd = "";
$no_hp = "";
$email = "";
$id_cabang = "";
$id_level = "";
$akses_harga_jual = "";
$akses_input_harga = "";
$foto = "";
$ttd = "";
$warehouse ="";
$trucking ="";
$vm ="";
$pa ="";
$cs_branch ="";
$inv ="";
$inv_branch="";
$sls ="";
$stg ="";
$acc ="";
$ops ="";
$verify ="";
$approval ="";
$delete_akses ="";
$is_cat_customer = "";
$po_account = "";
$dash_home = "";

if($results != ""){							
	foreach($results as $result){
		$id = $result["id"];
		$nama_user = $result["nama_user"];
		$user_id = $result["user_id"];
		// $id_karyawan = $result["id_karyawan"];
		$level_jabatan = $result["level_jabatan"];
		$passwd = $result["passwd"];
		// $url_foto = $result->url_foto;
		$no_hp = $result["no_hp"];
		$email = $result["email"];
		$id_cabang = $result["id_cabang"];
		$id_level = $result["id_level"];
		$akses_harga_jual = $result["akses_harga_jual"];
		$akses_input_harga = $result["akses_input_harga"];
		$foto = $result["foto"];
		$ttd = $result["ttd"];
		$warehouse = $result["warehouse"];
		$trucking = $result["trucking"];
		$vm = $result["vm"];
		$pa = $result["pa"];
		$cs_branch = $result["cs_branch"];
		$sls = $result["sls"];
		$stg = $result["stg"];
		$acc = $result["acc"];
		$ops = $result["ops"];
		$verify = $result["verify"];
		$approval = $result["approval"];
		$delete_akses = $result["delete_akses"];
		$is_cat_customer = $result["is_cat_customer"];
		$po_account = $result["po_account"];
		$dash_home = $result["dash_home"];
		
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
								<button class="btn btn-primary radius-4" onclick="javascript:$('.submit').click();">
									<i class="ace-icon fa fa-save"></i>Save
								</button>
								<button class="btn btn-info radius-4" onclick="location.href='<?php echo site_url();?><?php echo $class_name;?>';">
									<i class="ace-icon fa fa-close"></i>Cancel
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
												$(".alert").fadeTo(10000, 0).slideUp(100, function() {  
												$(this).remove();  
												});  
											}, 100);  
											});
										</script>
											
										<?php if($this->session->flashdata('success')){ ?>  
     									<div class="alert alert-success">  
	 									<button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
       									<strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>  
     									</div>  
   										<?php } else if($this->session->flashdata('error')){ ?>  
     									<div class="alert alert-danger">  
       									<a href="#" class="close" data-dismiss="alert">&times;</a>  
											<strong>Error!</strong> <?php echo $this->session->flashdata('error'); ?>  
										</div>  
										<?php }?>

										<div class="tab-content">
											<div id="#" class="tab-pane fade in active">
												<div class="col-md-offset-0">
													<form id="formentry" class="form-horizontal" action="<?php echo base_url();?><?php echo $class_name;?>/simpan" method="post" data-parsley-validate>
													
														<div class="row">
															<div class="col-xs-12 col-sm-12">
																<h3 class="header smaller blue">User Info</h3>
															</div>
														</div>
													<?php
														
														echo texthidden("id", $id);
														echo texthidden("foto", "avatar2.png");
														
														
														//if($id==""){							
															//echo '<p class="btn-warning"> &nbsp; NB: Username tidak boleh ada spasi. Secara otomatis username yang didaftarkan akan sama dengan password untuk login. Username yang baru didaftarkan diharapkan segera mengubah passwordnya.</p>';
															
															echo '<div class="row">';
															echo'<div class="col-xs-12 col-sm-3">';
															echo '<label>Username</label>';
															$param["name"] = "user_id";
															//$param["class_column"] = "col-sx-12";
															$param["required"] = "Y";
															$param["value"] = $user_id;
															echo textbox($param);
															unset($param);
															echo '</div>';

															echo'<div class="col-xs-12 col-sm-3">';
															echo '<label>Name</label>';
															$param["name"] = "nama_user";
															//$param["class_column"] = "col-sx-12";
															$param["required"] = "Y";
															$param["value"] = $nama_user;
															echo textbox($param);
															unset($param);
															echo '</div>';

															echo'<div class="col-xs-12 col-sm-3">';
															echo '<label>Email</label>';
															$param["name"] = "email";
															$param["class_column"] = "col-xs-12";
															$param["required"] = "Y";
															$param["value"] = $email;
															echo textbox($param);
															unset($param);
															echo '</div>';

															echo'<div class="col-xs-12 col-sm-3">';
															echo '<label>Phone Number</label>';
															$param["name"] = "no_hp";
															$param["class_column"] = "col-xs-12";
															$param["required"] = "Y";
															$param["value"] = $no_hp;
															echo textbox($param);
															unset($param);
															echo '</div>';

															
															echo '</div>';
													

															echo '<div class="row">';
															if($id!=""){
																echo'<div class="col-xs-12 col-sm-3">';
																echo '<label>Password</label>';
																$param["name"] = "passwd";
																$param["class_column"] = "col-xs-12";
																$param["required"] = "Y";
																$param["value"] = $passwd;
																echo textbox($param);
																unset($param);
																echo '</div>';
															}
															// echo'<div class="col-xs-12 col-sm-3">';
															// echo '<label>Password</label>';
															// $param["name"] = "passwd";
															// $param["class_column"] = "col-xs-12";
															// $param["required"] = "Y";
															// $param["value"] = $passwd;
															// echo textbox($param);
															// unset($param);
															// echo '</div>';

															echo'<div class="col-xs-12 col-sm-2">';
															echo '<label>Branch</label>';
															$param["name"] = "id_cabang";
															$param["class_column"] = "col-xs-12";
															$param["placeholder"] = "Select Branch";
															$param["required"] = "";
															$param["value"] = $id_cabang;
															$options["0"] = "PUSAT";
															foreach ($rs_cabang as $data) {
																$options[$data["id"]] = $data["kode"] . " - " . $data["nama_cabang"];
															}
															$param["options"] = $options;
															echo combobox($param);
															unset($options);
															echo '</div>';

															// echo'<div class="col-xs-12 col-sm-3">';
															// echo '<label>NIK</label>';
															// $param["name"] = "id_karyawan";
															// //$param["class_column"] = "col-xs-12";
															// $param["placeholder"] = "Select Branch";
															// $param["required"] = "";
															// $param["value"] = $id_karyawan;
															// $options["0"] = "Select an Option";
															// foreach ($rs_karyawan as $data) {
															// 	$options[$data["id"]] = $data["nik"] . " - " . $data["nama_kary"];
															// }
															// $param["options"] = $options;
															// echo combobox($param);
															// unset($options);
															// echo '</div>';
															echo '</div>';
															
															?>
															<div class="row">
																<div class="col-xs-12 col-sm-12">
																	<h3 class="header smaller blue">Menu Access</h3>
																</div>
															</div>
															<?php
															echo'<div class="row">';
															

															echo'<div class="col-xs-12 col-sm-2">';
															echo '<label>SALES</label>';
															$param["name"] = "sls";
															$param["class_column"] = "col-xs-12";
															$param["placeholder"] = "Select";
															$param["required"] = "";
															$param["value"] = $sls;
															$options["0"] = "NO";
															$options["1"] = "YES";
															$param["options"] = $options;
															echo combobox($param);
															unset($options);
															echo '</div>';

															echo'<div class="col-xs-12 col-sm-2">';
															echo '<label>APPROVAL</label>';
															$param["name"] = "approval";
															$param["class_column"] = "col-xs-12";
															$param["placeholder"] = "Select";
															$param["required"] = "";
															$param["value"] = $approval;
															$options["0"] = "NO";
															$options["1"] = "YES";
															$param["options"] = $options;
															echo combobox($param);
															unset($options);
															echo '</div>';

															
															echo'<div class="col-xs-12 col-sm-2">';
															echo '<label>SETTINGS</label>';
															$param["name"] = "stg";
															$param["class_column"] = "col-xs-12";
															$param["placeholder"] = "Select";
															$param["required"] = "";
															$param["value"] = $stg;
															$options["0"] = "NO";
															$options["1"] = "YES";
															$param["options"] = $options;
															echo combobox($param);
															unset($options);
															echo '</div>';

															echo '</div>';




															?>
															<div class="row">
																<div class="col-xs-12 col-sm-12">
																	<h3 class="header smaller blue">Level</h3>
																</div>
															</div>
															<?php
															
															echo '<div class="row">';
															echo '<div class="col-xs-12 col-sm-2">';
															echo '<label>Level Access</label>';
															$param["name"] = "id_level";
															$param["class_column"] = "col-xs-12";
															$param["placeholder"] = "Select Level";
															$param["required"] = "";
															$param["value"] = $id_level;
															$options[""] = "";
															foreach ($rs_level as $data) {
																$options[$data["id"]] = $data["nama"];
															}
															$param["options"] = $options;
															echo combobox($param);
															unset($options);
															echo '</div>';

															echo'<div class="col-xs-12 col-sm-2">';
															echo '<label>Level Position</label>';
															$param["name"] = "level_jabatan";
															$param["class_column"] = "col-xs-12";
															$param["placeholder"] = "Select Level";
															$param["required"] = "";
															$param["value"] = $level_jabatan;
															$options["0"] = "Select an Option";
															$options["1"] = "Staff";
															$options["3"] = "Spv";
															$options["4"] = "Manager";
															$options["5"] = "Director";
															$param["options"] = $options;
															echo combobox($param);
															unset($options);
															echo '</div>';

															echo'<div class="col-xs-12 col-sm-3">';
															echo '<label>Level Category Account</label>';
															$param["name"] = "is_cat_customer";
															$param["class_column"] = "col-xs-12";
															$param["placeholder"] = "Select Level";
															$param["required"] = "";
															$param["value"] = $is_cat_customer;
															$options["0"] = "Select an Option";
															$options["1"] = "External";
															$options["2"] = "Internal";
															$options["3"] = "All";
															$param["options"] = $options;
															echo combobox($param);
															unset($options);
															echo '</div>';

															echo'<div class="col-xs-12 col-sm-2">';
															echo '<label>Delete Privilages</label>';
															$param["name"] = "delete_akses";
															$param["class_column"] = "col-xs-12";
															$param["placeholder"] = "Select";
															$param["required"] = "";
															$param["value"] = $delete_akses;
															$options["0"] = "NO";
															$options["1"] = "YES";
															$param["options"] = $options;
															echo combobox($param);
															unset($options);
															echo '</div>';

															echo'<div class="col-xs-12 col-sm-2">';
															echo '<label>Dashboard Access</label>';
															$param["name"] = "dash_home";
															$param["class_column"] = "col-xs-12";
															$param["placeholder"] = "Select";
															$param["required"] = "";
															$param["value"] = $dash_home;
															$options["0"] = "NO";
															$options["1"] = "YES";
															$param["options"] = $options;
															echo combobox($param);
															unset($options);
															echo '</div>';

															// echo '<div class="col-xs-12 col-sm-2">';
															// echo '<label>Price Input Access</label>';
															// $param["name"] = "akses_input_harga";
															// $param["class_column"] = "col-xs-12";
															// $param["placeholder"] = "Select";
															// $param["required"] = "";
															// $param["value"] = $akses_input_harga;
															// $options[""] = "-- Select --";
															// $options["1"] = "YES";
															// $options["0"] = "NO";
															// $param["options"] = $options;
															// echo combobox($param);
															// unset($options);
															// echo '</div>';
															echo '</div>';
														
															echo '</br>';

															// echo '<div class="row">';
															// echo '<div class="col-xs-4 col-sm-1">';
															// echo '<label>Foto</label>';
															// echo '</div>';
															// echo '</div>';
															// echo '<div class="row">';
															// echo '<div class="col-xs-12 col-sm-3">';
															// echo '<div class="input-group">';
															// echo '<div class="custom-file">';
															// echo '<a class="btn btn-success btn-xs" href="' . base_url() . 'upload/' . $foto . '" target="_blank">'.$foto.'</a>';
															// echo '<input type="file" id="foto" name="foto">';
															// echo '</div>';                 
															// echo '</div>';
															// echo '</div>';
															// echo '</div>';

															// echo '<br/>';
															// echo '<br/>';

															// echo '<div class="row">';
															// echo '<div class="col-xs-4 col-sm-1">';
															// echo '<label>Sign</label>';
															// echo '</div>';
															// echo '</div>';
															// echo '<div class="row">';
															// echo '<div class="col-xs-12 col-sm-3">';
															// echo '<div class="input-group">';
															// echo '<div class="custom-file">';
															// echo '<a class="btn btn-success btn-xs" href="' . base_url() . 'upload/' . $ttd . '" target="_blank">'.$ttd.'</a>';
															// echo '<input type="file" id="ttd" name="ttd">';
															// echo '</div>';                 
															// echo '</div>';
															// echo '</div>';
															// echo '</div>';

															echo '<br/>';
															echo '<br/>';
														
													
														
															if($id==""){
																echo'';
															}else{

															
														//echo '<h3>Modul Access</h3>';
															
														?>
														<div class="row">
																<div class="col-xs-12 col-sm-12">
																	<h3 class="header smaller blue">Modul Access</h3>
																</div>
															</div>
														<style>
															.text100{
																width:100%;
																height:500px;
																overflow-y:auto;
																overflow-x:scroll;

															}
														</style>

														<div class="text100">
														<table id="" class="table table-striped table-bordered table-hover" width=100%>
														<thead>
															<tr>
																<th width="80">No.</th>
																<th width="80">Check</th>										
																<th >Moduls</th>
																<th >Department</th>											
																										
																	
																																							
															</tr>
														</thead>

														<tbody>
														<style>
																.hide {
																	opacity: 0;
																}
														</style>
														<?php
														$ii=1;
													
														foreach($rs_menu as $result){                                
															
															print '<tr>';										
															print '<td>'.$ii.'.</td>';
															
															print '<td><div class="hide";>'.
															$param["name"] = "menu_" . $result['id'];
															print'</div>';
															$param["value"] = iif($result['ada']>0, 1, 0);
															echo checkbox($param);
															unset($param);"</td>";
															
															print '<td>' . $result["keterangan_menu"].'</td>';
															print '<td>' . $result["department"] . '</td>';
															
															print '</tr>';
															
															$ii++;
														}								
														?>
														</tbody>
													</table>
													</div>
													</br>
													

												<?php } ?>
															
														
												
														<input class="submit btn btn-danger" type="submit" value="Submit" style="display:none;">
													</form>
												</div>
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
<script language=javascript>

$('.dropdown-toggle').dropdown()

$(document).ready(function() {
    $('#listdata').DataTable();

	$("#id_karyawan").chosen().change(function(){
		$(this).find('option:selected').each(function(){
			var id = $(this).val();
			var text = $(this).text();
			
			console.log(id);
			// console.log(text);
			
			$.ajax({
				type: "GET",
				async: false,
				url: "<?php echo base_url(); ?>" + "/hr_pengajuan_cuti/get_karyawan_by_id",			
				data: {id: id},
				dataType: 'json',
				success: function(res) {
					console.log("RES : " + res);
					
					if (res){
						//== sample json code : [{"id":"1","nama":"aaa - 2020-03-04"},{"id":"2","nama":"asd - 2020-03-05"}] ==//
						//== looping row ==//
						$.each(res, function() {
							//== looping column ==//
						  $.each(this, function(k, v) {
							/// do stuff
							//if(k=="nik"){
								//$("#nik").val(v);
						//	}
							//if(k=="jabatan"){
								//$("#level_jabatan").val(v);
								//$('#id_matauang').trigger("chosen:updated");
							//}
							//if(k=="saldo_akhir"){
								//$("#sisa_cuti_sebelum").val(v);
								//$('#id_matauang').trigger("chosen:updated");
							//}
							
							console.log(k + " : " + v);
						  });
						});
					}
				}
			});		
		});
    });	
} );

			jQuery(function($) {
				//initiate dataTables plugin
				var myTable = 
				$('#dynamic-table')
				//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
				.DataTable( {
					bAutoWidth: false,
					"aoColumns": [
					  { "bSortable": false },
					  null, null,null, null, null,
					  { "bSortable": false }
					],
					"aaSorting": [],
					
					
					//"bProcessing": true,
			        //"bServerSide": true,
			        //"sAjaxSource": "http://127.0.0.1/table.php"	,
			
					//,
					//"sScrollY": "200px",
					//"bPaginate": false,
			
					//"sScrollX": "100%",
					//"sScrollXInner": "120%",
					//"bScrollCollapse": true,
					//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
					//you may want to wrap the table inside a "div.dataTables_borderWrap" element
			
					//"iDisplayLength": 50
			
			
					select: {
						style: 'multi'
					}
			    } );
			
				
				
				$.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';
				
				new $.fn.dataTable.Buttons( myTable, {
					buttons: [
					  {
						"extend": "colvis",
						"text": "<i class='fa fa-search bigger-110 blue'></i> <span class='hidden'>Show/hide columns</span>",
						"className": "btn btn-white btn-primary btn-bold",
						columns: ':not(:first):not(:last)'
					  },
					  {
						"extend": "copy",
						"text": "<i class='fa fa-copy bigger-110 pink'></i> <span class='hidden'>Copy to clipboard</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					  {
						"extend": "csv",
						"text": "<i class='fa fa-database bigger-110 orange'></i> <span class='hidden'>Export to CSV</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					  {
						"extend": "excel",
						"text": "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'>Export to Excel</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					  {
						"extend": "pdf",
						"text": "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'>Export to PDF</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					  {
						"extend": "print",
						"text": "<i class='fa fa-print bigger-110 grey'></i> <span class='hidden'>Print</span>",
						"className": "btn btn-white btn-primary btn-bold",
						autoPrint: false,
						message: 'This print was produced using the Print button for DataTables'
					  }		  
					]
				} );
				myTable.buttons().container().appendTo( $('.tableTools-container') );
				
				//style the message box
				var defaultCopyAction = myTable.button(1).action();
				myTable.button(1).action(function (e, dt, button, config) {
					defaultCopyAction(e, dt, button, config);
					$('.dt-button-info').addClass('gritter-item-wrapper gritter-info gritter-center white');
				});
				
				
				var defaultColvisAction = myTable.button(0).action();
				myTable.button(0).action(function (e, dt, button, config) {
					
					defaultColvisAction(e, dt, button, config);
					
					
					if($('.dt-button-collection > .dropdown-menu').length == 0) {
						$('.dt-button-collection')
						.wrapInner('<ul class="dropdown-menu dropdown-light dropdown-caret dropdown-caret" />')
						.find('a').attr('href', '#').wrap("<li />")
					}
					$('.dt-button-collection').appendTo('.tableTools-container .dt-buttons')
				});
			
				////
			
				setTimeout(function() {
					$($('.tableTools-container')).find('a.dt-button').each(function() {
						var div = $(this).find(' > div').first();
						if(div.length == 1) div.tooltip({container: 'body', title: div.parent().text()});
						else $(this).tooltip({container: 'body', title: $(this).text()});
					});
				}, 500);
				
				
				
				
				
				myTable.on( 'select', function ( e, dt, type, index ) {
					if ( type === 'row' ) {
						$( myTable.row( index ).node() ).find('input:checkbox').prop('checked', true);
					}
				} );
				myTable.on( 'deselect', function ( e, dt, type, index ) {
					if ( type === 'row' ) {
						$( myTable.row( index ).node() ).find('input:checkbox').prop('checked', false);
					}
				} );
			
			
			
			
				/////////////////////////////////
				//table checkboxes
				$('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);
				
				//select/deselect all rows according to table header checkbox
				$('#dynamic-table > thead > tr > th input[type=checkbox], #dynamic-table_wrapper input[type=checkbox]').eq(0).on('click', function(){
					var th_checked = this.checked;//checkbox inside "TH" table header
					
					$('#dynamic-table').find('tbody > tr').each(function(){
						var row = this;
						if(th_checked) myTable.row(row).select();
						else  myTable.row(row).deselect();
					});
				});
				
				//select/deselect a row when the checkbox is checked/unchecked
				$('#dynamic-table').on('click', 'td input[type=checkbox]' , function(){
					var row = $(this).closest('tr').get(0);
					if(this.checked) myTable.row(row).deselect();
					else myTable.row(row).select();
				});
			
			
			
				$(document).on('click', '#dynamic-table .dropdown-toggle', function(e) {
					e.stopImmediatePropagation();
					e.stopPropagation();
					e.preventDefault();
				});
				
				
				
				//And for the first simple table, which doesn't have TableTools or dataTables
				//select/deselect all rows according to table header checkbox
				var active_class = 'active';
				$('#simple-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
					var th_checked = this.checked;//checkbox inside "TH" table header
					
					$(this).closest('table').find('tbody > tr').each(function(){
						var row = this;
						if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
						else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
					});
				});
				
				//select/deselect a row when the checkbox is checked/unchecked
				$('#simple-table').on('click', 'td input[type=checkbox]' , function(){
					var $row = $(this).closest('tr');
					if($row.is('.detail-row ')) return;
					if(this.checked) $row.addClass(active_class);
					else $row.removeClass(active_class);
				});
			
				
			
				/********************************/
				//add tooltip for small view action buttons in dropdown menu
				$('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				
				//tooltip placement on right or left
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('table')
					var off1 = $parent.offset();
					var w1 = $parent.width();
			
					var off2 = $source.offset();
					//var w2 = $source.width();
			
					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}
				
				
				
				
				/***************/
				$('.show-details-btn').on('click', function(e) {
					e.preventDefault();
					$(this).closest('tr').next().toggleClass('open');
					$(this).find(ace.vars['.icon']).toggleClass('fa-angle-double-down').toggleClass('fa-angle-double-up');
				});
				/***************/
				
				
				
				
				
				/**
				//add horizontal scrollbars to a simple table
				$('#simple-table').css({'width':'2000px', 'max-width': 'none'}).wrap('<div style="width: 1000px;" />').parent().ace_scroll(
				  {
					horizontal: true,
					styleClass: 'scroll-top scroll-dark scroll-visible',//show the scrollbars on top(default is bottom)
					size: 2000,
					mouseWheelLock: true
				  }
				).css('padding-top', '12px');
				*/
			
			
			})
		</script>
