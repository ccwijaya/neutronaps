<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo get_title_name();?></title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
  
<style>

@media screen {
	.divWraper{
		display:none;
	}

	body{
	
		padding-left:0px;
		padding-right:0px;
		//margin-bottom:300px;
		background-color: #6f6c6c;
	}	
	div.divHeader {
	
		//position: fixed;
		top: 0;
		//height:auto;
		width:100%;
		//border:0;
		background-color: white;
	}	
	div.divContent {
		padding-top: 100px;
		padding-left:30px;
		padding-right:50px;
		height:auto;
		width:auto;
		border:0;
		background-color: white;
	}
}

@media print {
	div.divHeader {
		position: fixed;
		top: 0;
		height:auto;
		width:100%;
		border:0;
		background-color: white;
	}	
	div.divContent {
		padding-top: 360px;

		padding-left:30px;
		padding-right:35px;
		height:auto;
		width:auto;
		border:0;
		background-color: white;
	}	
	div.divNextpage {
		padding-top: 360px;
		page-break-before: always;
		background-color: white;
	}
}

@media screen,print {
	body{
		font-family:arial;
		font-size:12px;
		//background-color: #6f6c6c;
	}	
	.header{
		//position: fixed;
		
		width: 100%;
		background-color: white;
	}	
	.data_header{
		border-collapse: collapse;
		width: 100%;
		border: 1px solid #000;	
		background-color: white;		
	}
	.term{
		border-collapse: collapse;
		border: 1px solid #000;	
		background-color: white;		
	}
	.table_detail{
		border-collapse: collapse;
		border: 0;
		background-color: white;
	}
	.data_header td, th {    
		border-top: 1px solid #000;			
		border-bottom: 1px solid #000;
		background-color: white;			
	}
	.table_detail th {    
		border: 1px solid #000;
		background-color: #3b5288;
		color:white;
	}
	.leftright1{    
		border-left: 1px solid #000;			
		border-right: 1px solid #000;
		padding:2px 5px;		
		// padding:0;
		background-color: #ebf3f7;	

	}

	.leftright2{    
		border-left: 1px solid #000;			
		border-right: 1px solid #000;
		padding:2px 5px;		
		// padding:0;
		background-color: white;	

	}

	.allborder{    
		border: 1px solid #000;
		padding:0px 0px;		
		// padding:0;
		//background-color: white;		
	}	
	.only_top{
		border-top: 1px solid #000;			
	}
	.no_border td, tr{
		border:0;
	}	
	div.divFooter {
		padding-left:30px;
		padding-top: 10px;
		/* padding-bottom: -300px; */
		border:0;
		background-color: white;	
	}
	.customer{
		color:white;
		background-color:#3b5288;
		width:60%;
		padding:5px;
		text-align:left;
		//font-weight:bold;
		font-size:12px;
		
	}

	.quotation{
		color:#3b5288;
		font-weight:bold;
		font-size:25px;
		font-family:arial;
		// width:100%;
		text-align:center;
	}
}
</style>
</head>
<body onload="window.print();">
	<div class="divWraper">
	<div class="divHeader">
	<img class="header" src="<?php echo base_url();?>asset/image/header.jpg" >
		<table width=100%>
			

			<tr>
				<td width=60% valign="top" style="padding-left:30px;">
					<br>
					<table border=0 width=40% class="">
						<tr><td class="customer">CUSTOMER</td></tr>
					</table>
					<table border=0 width=70% class="">
						
						<tr><td><?php echo ($rs_data[0]["nama_customer"]); ?></td></tr>
						<?php
						$alamat1 = "";
						$alamat2 = "";
						$a_alamat = explode(PHP_EOL, $rs_data[0]["alamat"]);
						if(isset($a_alamat[0])){
							$alamat1 = $a_alamat[0];
						}if(isset($a_alamat[1])){
							$alamat2 = $a_alamat[1];
						}

						?>
						<tr><td><?php echo ($alamat1); ?></td></tr>
						<tr><td><?php echo ($alamat2); ?></td></tr>
						<tr><td><?php echo ($rs_data[0]["kota"]) . " " . $rs_data[0]["kode_pos"]; ?></td></tr>
						<tr><td>UP:</td></tr>	
						<tr><td>&nbsp;</td></tr>
					</table>
					
				</td>

				<td width=50% valign="top" style="padding-right:50px;">
					<div class="quotation">QUOTATION</div>
						<table class="data_header">
							<tr>
								<td>Date</td>
								<td>:</td>
								<td><?php echo format_date($rs_data[0]["tanggal"]); ?></td>
							</tr>
							<!-- <tr>
								<td>Your REF</td>
								<td>:</td>
								<td><?php echo $rs_data[0]["no_reff"]; ?></td>
							</tr> -->
							<tr>
								<td>No. Quotation</td>
								<td>:</td>
								<td><?php echo $rs_data[0]["no_bukti"]; ?></td>
							</tr>
							
							<tr>
								<td>Sales Name</td>
								<td>:</td>
								<td><?php echo $rs_data[0]["id_sales"]; ?></td>
							</tr>
							<tr>
								<td>Effective Date</td>
								<td>:</td>
								<td><?php echo date('d M y'); ?></td>
							</tr>
							<!-- <tr>
								<td>T.O.P</td>
								<td>:</td>
								<td><?php echo $rs_data[0]["lama_bayar"]; ?> Days</td>
							</tr> -->
						</table>
				</td>
			</tr>
		</table>
	</div>
	
	<div class="divContent">
	<?php
		$counter = 0;
		$limit = 25;
		$loop = 0;
		$total = 0;
		
		// $data['total_subtotal'] = 0;
		// $data['total_discount'] = 0;
		// $data['total_total'] = 0;
		// $data['total_ppn'] = 0;
		$data['total_grandtotal'] = 0;
	?>
		<table class="table_detail" width=100%>
					<tr>
						<th width="30">No.</th>
						<th width="200">Delivery Route</th>
						<th width="100">Moda Transportation</th>
						<th width="80">Rate Expedition</th>
						<th width="50">Rate Customer</th>
					</tr>
			
			<?php 
			$total_row = count($rs_detail_print);
			$sisa = $total_row;
			while($sisa >= $limit){
				$sisa = $sisa - $limit;
			}
			 $sisa = $limit - $sisa;

			 $data["total_tarif_pbl"] = 0;
			 //$data["total_tarif_pbl"] = 0;
			
			// debug($sisa);
			foreach($rs_detail_print as $result){  
				$counter++;
				$loop++;

				$tarif_pbl = 0;
				$tarif_sales = 0;
				$color = "";

				if($result["tarif_pbl"] != $result["tarif_sales"]){
					$color = "style='background-color: #ADD8E6'";
				}
				if($result["tarif_pbl"] == $result["tarif_sales"]){
					$color = "style='background-color: white'";
				}
				//$kategori = $result["nama_kategori"];
				// if($kategori=="REGULAR | OPTIONAL TOL"){
				// 	$kategori = "REGULAR";
				// }
				//$total += $result["harga_satuan"] * $result["qty"] * $result["detail_kurs_konversi"];
				if($loop == ($limit+1)){
					?>
					<tr>
					<td class="only_top" colspan="6">&nbsp;</td>
					</tr>
					</table>
					<div class="divNextpage"></div>
				<table class="table_detail" width=100%>
					<tr>
						<th width="30">No.</th>
						<th width="200">Delivery Route</th>
						<th width="100">Moda Transportation</th>
						<th width="80">Rate Expedition</th>
						<th width="50">Rate Customer</th>
					</tr>
					<?php
					
					$loop = 1;
				}
			?>
			<tr>
				<td class="leftright2"><?php echo ($counter); ?></td>
				<td class="leftright2"><?php echo ($result["loading"]); ?> - <?php echo ($result["unloading"]); ?></td>
				<td class="leftright2" align="center"><?php echo ($result["unit"]); ?> <?php echo ($result["tipe_box"]); ?></td>
				<!-- <td class="leftright2" align="center"><?php //echo ($kategori); ?></td> -->
				<td class="leftright2" align="right" <?php echo $color;?>>Rp.<?php echo format_number($result["tarif_pbl"]); ?> / Trip</td>
				<td class="leftright2" align="right">Rp.<?php echo format_number($result["tarif_sales"]); ?> / Trip</td>
				<!-- <td class="leftright2" align="right">Rp.<?php //echo format_number($result["tarif_approved"],0); ?></td> -->
				
			</tr>
			<?php 

			$data["total_tarif_pbl"] += $result["tarif_pbl"];
			//$data["total_tarif_pbl"] += $result["tarif_approved"];
			
				
				if($loop == $limit){
					// $this->print_footer($data);
				}
			}

			for($ix=0;$ix<$sisa;$ix++){
				// echo  '<tr>
				// <td class="leftright2"></td>
				// <td class="leftright2"></td>
				// <td class="leftright2"></td>
				// <td class="leftright2"></td>
				
				
				
				
				// </tr>';
			}				
			
		
			?>
			<tr>
			<tr>
					<td colspan=5 rowspan="1" class="leftright4 only_top font_size2" valign="top">&nbsp;</td>
					<!-- <td class="allborder leftbtmtop font_size" align="right">Total Rate &nbsp;</td>
					<td class="allborder leftbtmtop font_size" align="right">Rp.<?php //echo format_number($data['total_tarif_pbl'], 0); ?>&nbsp;</td> -->
					
				</tr>
				
			</tr>
			
			
		</table>
	
	</div>

	


	<div class="divFooter">
	<button style="background-color: #ADD8E6">&nbsp;&nbsp;</button>
    Tarif net PBL
		</br>
		<p>
	
		<table border=0 width=100%>
			<table>
				<tr><td class="customer">TERM & CONDITIONS</td></tr>
			</table>
		
			<tr>
			
				
				<td width=100% valign=top>
				<table border=0 width=30% class="">
				
						
							
						</table>
						<table border=0 width=95% class="">
								<tr>
									
									<td>1. Tarif pengiriman barang adalah Free On Truck  (FOT) dan atau tidak termasuk biaya bongkar muat barang.</td>	
								</tr>
								<tr>
									
									<td>2. Maksimum kapasitas muatan unit kendaraan Tronton Wingbox = 20 Ton</td>	
								</tr>
								<tr>
								
									<td>3. Permintaan unit armada pengiriman diinformasikan H-1 kepada PIC Michelle Email: michelle.melisa@pbl.co.id No. HP: 0813-1964-8701 dan DI CC kepada Bapak Yovi Reynold Email: yovi.reynold@pbl.co.id, No. HP: 0813-8047-7826.</td>	
								</tr>
								
								<tr>
								
									<td>4.Tarif pengiriman barang berlaku efektif terhitung dari tanggal <?php echo date('d M y'); ?>.</td>
								</tr>
								
								<tr>
									<td>5. Tarif pengiriman barang tidak termasuk asuransi barang.</td>
								</tr>
								<tr>
									<td>6.Kerusakan tidak terduga (Force Majeure) merupakan tanggung jawab dari Pemilik Barang.</td>
								</tr>

								<tr>
									<td>7.Kerusakan, kehilangan dan atau kelalaian dalam proses pengiriman barang, merupakan tanggung jawab PT. Panca Budi</td>
								</tr>
								<tr>
									<td>&nbsp;&nbsp;&nbsp;&nbsp;Logistindo berdasarkan kepada kriteria klaim retur pengiriman yang telah disepakati.</td>
								</tr>
							
								<tr>
									<td>8. Jangka waktu pelunasan tagihan (TOP) adalah 
									<?php 
									if($rs_data[0]["cash"]==1){ 
										echo "2 Hari";
									}
									if($rs_data[0]["cash"]!=1){ 
										echo "";
									}

									if($rs_data[0]["days_7"]==1){ 
										echo "7 Hari";
									}
									if($rs_data[0]["days_7"]!=1){ 
										echo "";
									}

									if($rs_data[0]["days_14"]==1){ 
										echo "14 Hari";
									}
									if($rs_data[0]["days_14"]!=1){ 
										echo "";
									}

									if($rs_data[0]["days_21"]==1){ 
										echo "21 Hari";
									}
									if($rs_data[0]["days_21"]!=1){ 
										echo "";
									}

									if($rs_data[0]["days_30"]==1){ 
										echo "30 Hari";
									}
									if($rs_data[0]["days_30"]!=1){ 
										echo "";
									}
									?>
									setelah invoice diterima.</td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td>9. Apabila terdapat kondisi khusus dan atau tidak normal dalam proses pengiriman barang maka berlaku ketentuan sebagai berikut:</td>
								</tr>
								<tr>
									<td>&nbsp;&nbsp;&nbsp;&nbsp;a) Biaya Overnight hari pertama dikenakan biaya sebesar Rp.500.000,-.</td>
								</tr>
								<tr>
									<td>&nbsp;&nbsp;&nbsp;&nbsp;b) Biaya Overnight hari kedua dikenakan 25%% dari tarif pengiriman.</td>
								</tr>
								<tr>
									<td>&nbsp;&nbsp;&nbsp;&nbsp;c) Biaya Overnight hari ketiga dan seterusnya dikenakan 100>% dari tarif pengiriman.</td>
								</tr>
								<tr>
									<td>10. Biaya pembatalan unit  armada apabila unit armada  sudah dalam perjalanan maupun tiba dilokasi muat akan dikenakan denda</td>
								</tr>
								<tr>
									<td>&nbsp;&nbsp;&nbsp;&nbsp; Sebesar 50% dari tarif pengiriman.</td>
								</tr>
								<tr>
									<td>11. Biaya Multi Pickup & Multi Drop</td>
								</tr>
								<?php 
								$total_dalam_kota = $rs_data[0]["biaya_multidrop_dalam"];
								$total_luar_kota = $rs_data[0]["biaya_multidrop_luar"];
								
								?>

								<tr>
									<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;a) Dalam Kota Rp.375.000,- / Titik</td>
								</tr>
								<tr>
									<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b) Luar Kota Rp.625.000,- / Titik</td>
								<!-- </tr>
								<tr>
									<td>12. Biaya Multi Pickup</td>
								</tr>
								<?php 
								//$total_dalam_kota = $rs_data[0]["biaya_pickup_dalam"];
								//$total_luar_kota = $rs_data[0]["biaya_pickup_luar"];
								
								?>

								<tr>
									<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;a) Dalam Kota Rp.<?php echo format_number($total_dalam_kota,0); ?>,- / Titik</td>
								</tr>
								<tr>
									<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b) Luar Kota Rp.<?php echo format_number($total_luar_kota,0); ?>,- / Titik</td>
								</tr> -->
								<tr>
									<td>12. Tarif pengiriman barang dapat ditinjau kembali jika terjadi perubahan kebijakan pemerintah (UMK, Harga BBM, Tarif Tol, &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;tandarisasi Kapasitas Muatan Kendaraan / ODOL)</td>
								</tr>
								<tr>
									<td>13. Pembayaran transfer ke Bank:</td>
								</tr>
								<tr>
									<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;a) Nama Bank: OCBC NISP</td>
								</tr>
								<tr>
									<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b) Nomor Rekening: 5458-000-39-111</td>
								</tr>
								<tr>
									<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;c) Nama Rekening: PANCA BUDI LOGISTINDO</td>
								</tr>
								
						</table>
					
								
					
					<table border=0 width=100% class="">
						
							<tr><td align="center">Provided by,</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td align="center">Approved by,</td></tr>
							<tr><td align="center">PT. PANCA BUDI LOGISTINDO</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td align="center"><?php echo ($rs_data[0]["nama_customer"]); ?><td></tr>
							
							<tr><td align="center">&nbsp;</td></tr>
							<tr><td align="center">&nbsp;</td></tr>
							<tr><td align="center">&nbsp;</td></tr>
							<tr><td align="center">Yovi Reynold</td></tr>
							<tr><td align="center">Business & Development Director</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td align="center">(.................................................)</td></tr>
							
							<tr>
								<td></td>
							</tr
							<tr>
								<td></td>
							</tr>
					</table>
				</td>
				
			</tr>
		</table>
	</div>
	</div>
</body>
</html>
