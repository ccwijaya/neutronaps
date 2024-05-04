<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo get_title_name();?></title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
  
<style>

@media screen {
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
		padding-top: 0px;
		padding-left:30px;
		padding-right:50px;
		//height:auto;
		//width:auto;
		border:0;
		background-color: white;
	}
	div.divContent2 {
		padding-top: 0px;
		padding-left:30px;
		padding-right:50px;
		//height:auto;
		//width:auto;
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
		padding-top: 250px;

		padding-left:30px;
		padding-right:35px;
		height:auto;
		width:auto;
		border:0;
		background-color: white;
	}	
	div.divContent2 {
		padding-top: 0px;

		padding-left:30px;
		padding-right:35px;
		height:auto;
		width:auto;
		border:0;
		background-color: white;
	}	
	div.divNextpage {
		padding-top: 350px;
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
		// position: fixed;
		padding-left:30px;
		padding-right:30px;
		//margin-right:1px;
		padding-bottom: 160px;
		// height:400px;
		//width:100%;
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

	.pickinglist{
		color:black;
		//background-color:#3b5288;
		width:100%;
		padding:5px;
		text-align:center;
		font-weight:bold;
		font-size:13px;
		
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
<body>
	<div class="divHeader">
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<table width=100%>
	<tr><td valign="center" width=100% class="pickinglist">PICKING LIST</td></tr>
	</table>
		<table width=100%>	
			<tr>
				<td width=50% valign="top" style="padding-left:30px;">
					<br>
					<table border=0 width=100% class="">
						<tr>
							<td>CUSTOMER</td>
							<td>:</td>
							<td><?php echo $rs_data[0]["nama_customer"]; ?></td>
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
							<td valign="top">ADDRESS</td>
							<td valign="top">:</td>
							<td><?php echo $rs_data[0]["alamat"]; ?>
							dfgfdgf fg fgfgf fdgfdgfd fdgfd dfgdfgdfg fdgdfgdfgdfgdfgdfgdf dfgdf fdgdfgd dfgdf</td>
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
							<td valign="top">PO Number</td>
							<td valign="top">:</td>
							<td>NO 123456</td>
						</tr>
					</table>
					
					
				</td>

				<td width=30% valign="top" style="padding-right:15px;">
					<br>
						<table class="" width="58%">
							<tr>
								<td>PL Number</td>
								<td>:</td>
								<td>pTtets</td>
							</tr>
							<tr>
								<td>Date</td>
								<td>:</td>
								<td><?php echo format_date($rs_data[0]["tanggal"]); ?></td>
							</tr>
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
		
		//$data['total_subtotal'] = 0;
		//$data['total_discount'] = 0;
		//$data['total_total'] = 0;
		//$data['total_ppn'] = 0;
		//$data['total_grandtotal'] = 0;
	?>
						<table class="table_detail" width=100%>
							<tr>
								<th width="30">No.</th>
								<th width="200">Description</th>
								<th width="80">Brand</th>
								<th width="40">Qty</th>
								<th width="50">Unit</th>
								<th width="100">OH</th>
								<th width="90">Location Part</th>
							</tr>
						
								<?php 
								$total_row = count($rs_detail);
								$sisa = $total_row;
								while($sisa >= $limit){
									$sisa = $sisa - $limit;
								}
								$sisa = $limit - $sisa;
								
								// debug($sisa);
								foreach($rs_detail as $result){  
									$counter++;
									$loop++;
								//$total += $result["harga_satuan"] * $result["qty"] * $result["detail_kurs_konversi"];
								if($loop == ($limit+1)){
								?>
								<tr>
									<td class="only_top" colspan="8">&nbsp;</td>
								</tr>
						</table>
						<div class="divNextpage"></div>
						<table class="table_detail" width=100%>
							<tr>
								<th width="30">No.</th>
								<th width="200">Description</th>
								<th width="80">Brand</th>
								<th width="40">Qty</th>
								<th width="50">Unit</th>
								<th width="100">OH</th>
								<th width="90">Location Part</th>
							</tr>
							<?php
							$loop = 1;
							}
							?>
							<tr>
								<td class="leftright2"><?php echo ($counter); ?></td>
								<td class="leftright2"><?php echo ($result["nama_part"]); ?></td>
								<td class="leftright2" align="center"><?php echo ($result["nama_merek"]); ?></td>
								<td class="leftright2" align="right"><?php echo format_number($result["qty"]); ?></td>
								<td class="leftright2" align="center"><?php echo ($result["nama_satuan"]); ?></td>
								<td class="leftright2" align="center"></td>
								<td class="leftright2" align="center"></td>
							</tr>
							<?php 
			
						//$data['total_subtotal'] += $result["harga_satuan"] * $result["qty"] * $result["detail_kurs_konversi"] ;
						//if($rs_data[0]["jenis_discount"]=="NOMINAL"){
							///$data['total_discount'] +=  $result["detail_discount"] * $result["detail_kurs_konversi"] ;
						///} /else {
							//$data['total_discount'] += $result["harga_satuan"] * $result["qty"] * $result["detail_discount"] / 100 * $result["detail_kurs_konversi"] ;
						//}
						if($loop == $limit){
							//$this->print_footer($data);
						}
					}

					for($ix=0;$ix<$sisa;$ix++){
						echo  '<tr>
							<td class="leftright2">&nbsp;</td>
							<td class="leftright2">&nbsp;</td>
							<td class="leftright2">&nbsp;</td>
							<td class="leftright2">&nbsp;</td>
							<td class="leftright2">&nbsp;</td>
							<td class="leftright2">&nbsp;</td>
							<td class="leftright2">&nbsp;</td>
			
							</tr>';
						}				
			
			
					?>
					<tr>
				<td colspan=7 class="no_border only_top">&nbsp;</td>
				
			</tr>
			
			</table>
			
			
	
	</div>
	
	<div class="divContent2">
	
			<table class="table_detail" width=100%>
							<tr>
							
								<th width="90">Sales Admin</th>
								<th width="80">Inventory Control</th>
								<th width="60">Picker</th>
								<th width="50">Suppervisor</th>
								<th width="80">Assembler</th>
								<th width="90">Technisian Head</th>
							</tr>
							
							<tr>
								
								<td class="leftright2"></td>
								<td class="leftright2" align="center"></td>
								<td class="leftright2" align="right"></td>
								<td class="leftright2" align="center"></td>
								<td class="leftright2" align="center"></td>
								<td class="leftright2" align="center"></td>
							</tr>
							
			
							<tr>
							<td class="leftright2">&nbsp;</td>
							<td class="leftright2">&nbsp;</td>
							<td class="leftright2">&nbsp;</td>
							<td class="leftright2">&nbsp;</td>
							<td class="leftright2">&nbsp;</td>
							<td class="leftright2">&nbsp;</td>
							
			
							</tr>	
							<tr>
							<td class="leftright2">&nbsp;</td>
							<td class="leftright2">&nbsp;</td>
							<td class="leftright2">&nbsp;</td>
							<td class="leftright2">&nbsp;</td>
							<td class="leftright2">&nbsp;</td>
							<td class="leftright2">&nbsp;</td>
							
			
							</tr>

							<tr>
							<td class="leftright2">&nbsp;</td>
							<td class="leftright2">&nbsp;</td>
							<td class="leftright2">&nbsp;</td>
							<td class="leftright2">&nbsp;</td>
							<td class="leftright2">&nbsp;</td>
							<td class="leftright2">&nbsp;</td>
							
			
							</tr>		
			
			
				
					<tr>
				<td colspan=7 class="no_border only_top">&nbsp;</td>
				
			</tr>
			
			</table>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
	</div>
</body>
</html>
