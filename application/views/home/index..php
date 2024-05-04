
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
			
			<!-- 
			<div class="row">
				<div class="col-lg-12">
					PAGE CONTENT BEGINS -->
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

          $hari=date('d');
          $bulan=date('m');
          // $nama_user_ultah="";
          // $ucapan="";
          // $icon="";
          // $gambar_ultah="";
          // $tgl_ultah="";

          // $sql = "SELECT a.nama_kary, a.hari, a.bulan, a.ucapan, a.icon, a.gambar_ultah, a.tgl_lahir_tampil FROM view_tanggal_lahir_kary a 
          //     WHERE a.hari=".$hari." AND a.bulan=".$bulan." ";
          // $rs_ultah = get_value($sql);	
          // if(count($rs_ultah)>0){
          //   $nama_user_ultah = $rs_ultah[0]['nama_kary'];
          //   $ucapan = $rs_ultah[0]['ucapan'];
          //   $icon = $rs_ultah[0]['icon'];
          //   $gambar_ultah = $rs_ultah[0]['gambar_ultah'];
          //   $tgl_ultah = $rs_ultah[0]['tgl_lahir_tampil'];
          // }
          ?>
          
			
          <!-- <div class="weekdays3">
            <img class="" src="<?php echo base_url();?><?php echo get_folder_template();?>images/bg-img/yph_logo.jpg" width="38%" alt="">
          </div> -->

         
            <div class="weekdays5">
              
              <div class="col-xs-12 col-sm-12">
                <!-- <span class="rainbow"><h1><b><?php echo $ucapan;?><p><?php echo $nama_user_ultah;?></b></h1></span>
                <span class="rainbow"><h3><b><?php echo $tgl_ultah;?></b></h3></span> -->
              </div>
<?php
							

?>
              
             
            </div>
       
         

            <!-- <div class="weekdays4">
                <img class="" src="<?php echo base_url();?><?php echo get_folder_template();?>images/bg-img/logo_2022.png" width="100%" alt="">
            </div> -->
        
            
          <!-- <div class="weekdays">
            <img src="<?php echo base_url();?><?php echo get_folder_template();?>images/bg-img/14.png" width="28%" alt="">
            
          </div> -->
          
          <!-- /.page-header -->
          
         
     
      <!-- /.page-header -->
			
					
		</div><!-- /.page-content -->
	</div>
</div><!-- /.main-content -->
	




<script>
	function paid(id){
		
		$('#id').val(id);
		$('#myModals').modal('show');
		
	}
</script>


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
