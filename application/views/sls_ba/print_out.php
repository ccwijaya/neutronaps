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
				padding-top: 300px;
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
				font-size: 15px;
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
				color: #228B22;
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
		}
	</style>
</head>

<body onload="window.print();">
	<div class="divWraper">
		<div class="divHeader">
			<img class="header" src="<?php echo base_url(); ?>asset/image/header.jpg">

			<div class="quotation">BERITA ACARA PELAKSANAAN FUMIGASI</div>
			<div class="no_bukti">Nomor: <?php echo $rs_data[0]["no_bukti"]; ?></div>
			<div class="isi_ba">Sehubungan dengan permintaan fungigasi dari <?php echo ($rs_data[0]["nama_customer"]); ?> maka pada hari ini tanggal <?php echo format_date($rs_data[0]["tanggal"]); ?> PT. NEUTRON MITRA ABADI
		    telah melaksanakan fumigasi dengan disaksikan oleh pemilik barang sebagai berikut:</div>
			
		</div>
		


		<div class="divContent">
		
		
		

		</div>
			
		<div class="divFooter">
			

			<table border=0 width=100%>
				

				<tr>


					<td width=100% valign=top>
						<table border=0 width=30% class="">



						</table>
						<table border=0 width=95% class="">
							<tr>
								<td valign="top">1. No Container / Seal</td>
								<td>
									: <?php echo ($rs_data[0]["no_container"]); ?>
								</td>
							</tr>
							<tr>
								<td valign="top">2. Tujuan</td>
								<td>
									: <?php echo ($rs_data[0]["tujuan"]); ?>
								</td>
							</tr>

							<tr>
								<td valign="top">3. Jenis Container</td>
								<td>
									: <?php echo ($rs_data[0]["jenis_container"]); ?>
								</td>
							</tr>

							<tr>
								<td valign="top">4. Customer</td>
								<td>
									: <?php echo ($rs_data[0]["nama_customer"]); ?>
								</td>
							</tr>

							<tr>
								<td valign="top">5. Tempat Fumigasi</td>
								<td>
									: <?php echo ($rs_data[0]["tempat_fumigasi"]); ?>
								</td>
							</tr>

							<tr>
								<td valign="top">6. Waktu Pelepasan Fumigasi</td>
								<td>
									: <?php echo ($rs_data[0]["waktu_pelepasan"]); ?>
								</td>
							</tr>

							<tr>
								<td valign="top">7. Durasi Fumigasi</td>
								<td>
									: <?php echo ($rs_data[0]["durasi_fumigasi"]); ?>
								</td>
							</tr>

							<tr>
								<td valign="top">8. Fumigan yang digunakan</td>
								<td>
									: <?php echo ($rs_data[0]["nama_produk"]); ?>
								</td>
							</tr>

							<tr>
								<td valign="top">9. Dosis Fumigasi</td>
								<td>
									: <?php echo ($rs_data[0]["dosis_fumigasi"]); ?>
								</td>
							</tr>

							<tr>
								<td valign="top">10. Keterangan</td>
								<td>
									: <?php echo ($rs_data[0]["keterangan"]); ?>
								</td>
							</tr>

							<tr>
								<td valign="top">&nbsp;</td>
								<td>
								&nbsp;
								</td>
							</tr>
							<tr>
								<td valign="top">&nbsp;</td>
								<td>
								&nbsp;
								</td>
							</tr>

							<tr>
								<td valign="top" colspan="3">Demikian berita acara pelaksanaan fumigasi ini dibuat dengan sebenarnya dan untuk digunakan sebagai mestinya</td>
								
							</tr>
							

						</table>
						<!-- <div class="isi_ba">Demikian</div> -->

						</br>
						</br>
						</br>
						<table border=0 width=100% class="">

							
						<tr>
							<td align="center" colspan="2">Mengetahui,</td> <td></td> <td align="center"><?php echo format_date($rs_data[0]["tanggal"]); ?></td>
						</tr>
						<tr>
							<td align="center" colspan="2">Kuasa / Pemilik Barang,</td> <td></td> <td align="center">Pelaksana,</td>
						</tr>

						<tr>
							<td align="center" colspan="2"><?php echo ($rs_data[0]["nama_customer"]); ?></td><td></td><td align="center">PT. NEUTRON MITRA ABADI<td>
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
							<td align="center"></td><td></td>
						</tr>
						<tr>
							<td align="center"></td><td></td>
						</tr>
						<tr>
							<td align="center" colspan="2">Nama & Cap</td> <td></td> <td align="center"><?php echo ($rs_data[0]["nama_sales"]); ?></td>
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
