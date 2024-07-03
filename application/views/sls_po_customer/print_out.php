<!DOCTYPE html>
<html lang="en">

<head>
	<title><?php echo get_title_name(); ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<style>
		@media screen {
			.divWraper {
				display: none;
			}

			body {

				padding-left: 0px;
				padding-right: 0px;
				//margin-bottom:300px;
				background-color: #6f6c6c;
			}

			div.divHeader {

				//position: fixed;
				top: 0;
				//height:auto;
				width: 100%;
				//border:0;
				background-color: white;
			}

			div.divContent {
				padding-top: 100px;
				padding-left: 30px;
				padding-right: 50px;
				height: auto;
				width: auto;
				border: 0;
				background-color: white;
			}
		}

		@media print {
			div.divHeader {
				position: fixed;
				top: 5;
				height: auto;
				width: 100%;
				border: 0;
				background-color: white;
			}

			div.divContent {
				padding-top: 290px;
				padding-left: 30px;
				padding-right: 35px;
				height: auto;
				width: auto;
				border: 0;
				background-color: white;
			}

			div.divNextpage {
				padding-top: 350px;
				page-break-before: always;
				background-color: white;
			}
		}

		@media screen,
		print {
			body {
				font-family: arial;
				font-size: 12px;
				//background-color: #6f6c6c;
			}

			.header {
				//position: fixed;

				width: 98%;
				background-color: white;
			}

			.data_header {
				border-collapse: collapse;
				width: 100%;
				border: 1px solid #000;
				background-color: white;
			}

			.term {
				border-collapse: collapse;
				border: 1px solid #000;
				background-color: white;
			}

			.table_detail {
				border-collapse: collapse;
				border: 0;
				background-color: white;
			}

			.data_header td,
			th {
				border-top: 1px solid #000;
				border-bottom: 1px solid #000;
				background-color: white;
			}

			.table_detail th {
				border: 1px solid #000;
				background-color: #228B22;
				color: white;
			}

			.leftright1 {
				border-left: 1px solid #000;
				border-right: 1px solid #000;
				padding: 2px 5px;
				// padding:0;
				background-color: #ebf3f7;

			}

			.leftright2 {
				border-left: 1px solid #000;
				border-right: 1px solid #000;
				padding: 2px 5px;
				// padding:0;
				background-color: white;

			}

			.allborder {
				border: 1px solid #000;
				padding: 0px 0px;
				/* // padding:0; */
				/* //background-color: white;		 */
			}

			.only_top {
				border-top: 1px solid #000;
			}

			.no_border td,
			tr {
				border: 0;
			}

			div.divFooter {
				padding-left: 30px;
				padding-top: 0px;
				/* padding-bottom: -300px; */
				border: 0;
				background-color: white;
			}

			.customer {
				color: white;
				background-color: #228B22;
				width: 60%;
				padding: 5px;
				text-align: left;
				/* font-weight:bold; */
				font-size: 12px;
				/* padding-top: -100px; */

			}

			

			.quotation {
				color: black;
				padding-top: 10px;
				font-weight: bold;
				font-size: 20px;
				font-family: arial;
				// width:100%;
				text-align: center;
			}

			.no_bukti {
				color: black;
				font-weight: bold;
				font-size: 15px;
				font-family: arial;
				// width:100%;
				text-align: center;
			}

			.isi_ba {
				color: black;
				padding-top: 30px;
				padding-left: 30px;
				padding-right: 50px;
				font-size: 15px;
				font-family: arial;
		
				text-align: justify;
			}
			hr {
				
				border: none;
				height: 4px;
				color: #333; 
				background-color: #333;
				
			}

			
		}
	</style>
</head>

<body onload="window.print();">
	<div class="divWraper">
		<div class="divHeader">
			<img class="header" src="<?php echo base_url(); ?>asset/image/header.jpg">
			<div class="quotation">Certificate Of Fumigation</div>
			<div class="no_bukti"><?php echo $rs_data[0]["no_bukti"]; ?></div>
			<div class="isi_ba">This is to certify that the following regulated article(s) has been fumigated according to the appropriate procedures to conform  
			the current phytosanitary requirements of the importing country :</div>
			</br>
			<div class="quotation">ARTICLE DETAILS</div>
		</div>
		<div class="divContent">
		<hr>
		
		</div>
			
		<div class="divFooter">
			

			<table border=0 width=100%>
				<tr>


					<td width=100% valign=top>
						<table border=0 width=30% class="">



						</table>
						<table border=0 width=70% class="">
							<tr>
								<td valign="top">DESCRIPTION OF GOODS</td>
								<td>: <?php echo ($rs_data[0]["dog"]); ?></td>
							</tr>
							<tr>
								<td valign="top">QUANTITY DECLARED</td>
								<td>: <?php echo ($rs_data[0]["weight"]); ?></td>
							</tr>
							<tr>
								<td valign="top">CONSIGNMENT LINK</td>
								<td>: <?php echo ($rs_data[0]["consignment_link"]); ?></td>		
							</tr>

							<tr>
								<td valign="top">VESSEL / VOYAGE</td>
								<td>: <?php echo ($rs_data[0]["vessel"]); ?></td>		
							</tr>

							<tr>
								<td valign="top">CONNECTING VESSEL</td>
								<td>: <?php echo ($rs_data[0]["vessel"]); ?></td>		
							</tr>
						
								
							

						</table>


						</br>
						<table border=0 width=100% class="">

							<tr>
								<td align="center" colspan="2">Provided by,</td>
								<td></td>
							</tr>
							<tr>
								<td align="center" colspan="2">PT. NEUTRON MITRA ABADI</td>
								<td></td>
							</tr>

							<tr>
								<td align="center">&nbsp;</td>
							</tr>
							<tr>
								<td align="center">&nbsp;</td>
							</tr>
							<tr>
								<td align="center">&nbsp;</td>
							</tr>
							<tr>
								<td align="center"><?php echo ($rs_data[0]["nama_sales"]); ?></td>
								<td></td>
							</tr>
							<tr>
								<td align="center">Sales Executive</td>
							</tr>

							<tr>
								<td></td>
							</tr>
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
