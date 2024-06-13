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
				font-weight: bold;
				font-size: 25px;
				font-family: arial;
				// width:100%;
				text-align: center;
			}
		}
	</style>
</head>

<body onload="window.print();">
	<div class="divWraper">
		<div class="divHeader">
			<img class="header" src="<?php echo base_url(); ?>asset/image/header.jpg">
			<table width=100%>


				<tr>
					<td width=60% valign="top" style="padding-left:30px;">
						<br>
						<table border=0 width=40% class="">
							<tr>
								<td class="customer">CUSTOMER</td>
							</tr>
						</table>
						<table border=0 width=70% class="">

							<tr>
								<td><?php echo ($rs_data[0]["nama_customer"]); ?></td>
							</tr>
							<?php
							$alamat1 = "";
							$alamat2 = "";
							$a_alamat = explode(PHP_EOL, $rs_data[0]["alamat"]);
							if (isset($a_alamat[0])) {
								$alamat1 = $a_alamat[0];
							}
							if (isset($a_alamat[1])) {
								$alamat2 = $a_alamat[1];
							}

							?>
							<tr>
								<td><?php echo ($alamat1); ?></td>
							</tr>
							<tr>
								<td><?php echo ($alamat2); ?></td>
							</tr>
							<tr>
								<td><?php echo ($rs_data[0]["kota"]) . " " . $rs_data[0]["kode_pos"]; ?></td>
							</tr>
							<tr>
								<td>UP: <?php echo $rs_data[0]["pic"]; ?></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
							</tr>
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
								<td><?php echo $rs_data[0]["nama_sales"]; ?></td>
							</tr>
							<tr>
								<td>Effective Date</td>
								<td>:</td>
								<td><?php echo format_date($rs_data[0]["tanggal"]); ?><?php //echo date('d M y'); 
																						?></td>
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
		<!-- <p>Dengan Hormat</p>
		<p>Bersama ini perkenalkan kami dari PT. NEUTRON MITRA ABADI adalah perusahaan yang bergerak pada bidang jasa fumigasi dengan nomor registrasi <b>ID-0057-MB dan ID-0060-PH3</b>. Dengan ini kami penawaran
						</br> -->
		<b><?php echo $rs_data[0]["nama_produk"]; ?></b>
		<p>
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
					<th width="30">NO.</th>
					<th width="250">SERVICE</th>
					<th width="120">RATE PRICE</th>
					<!-- <th width="50">PBL Rate</th> -->
				</tr>

				<?php
				$total_row = count($rs_detail_print);
				$sisa = $total_row;
				while ($sisa >= $limit) {
					$sisa = $sisa - $limit;
				}
				$sisa = $limit - $sisa;

				$data["total_tarif_nego"] = 0;
				//$data["total_tarif_pbl"] = 0;

				// debug($sisa);
				foreach ($rs_detail_print as $result) {
					$counter++;
					$loop++;
					if ($loop == ($limit + 1)) {
				?>
						<tr>
							<td class="only_top" colspan="6">&nbsp;</td>
						</tr>
			</table>
			<div class="divNextpage"></div>
			<table class="table_detail" width=100%>
				<tr>
					<th width="30">NO.</th>
					<th width="250">SERVICE</th>
					<th width="120">RATE PRICE</th>
					<!-- <th width="50">PBL Rate</th> -->
				</tr>
			<?php

						$loop = 1;
					}
			?>
			<tr>
				<td class="leftright2" align="center"><?php echo ($counter); ?></td>
				<td class="leftright2"><?php echo ($result["nama_jasa"]); ?></td>
				<td class="leftright2" align="center">Rp.<?php echo format_number($result["harga"],0); ?></td>
			</tr>
		<?php

					// $data["total_tarif_nego"] += $result["tarif_pbl"];
					//$data["total_tarif_pbl"] += $result["tarif_approved"];


					if ($loop == $limit) {
						// $this->print_footer($data);
					}
				}

				for ($ix = 0; $ix < $sisa; $ix++) {
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
			<td colspan=4 rowspan="1" class="leftright4 only_top font_size2" valign="top">&nbsp;</td>
			<!-- <td class="allborder leftbtmtop font_size" align="right">Total Rate &nbsp;</td>
					<td class="allborder leftbtmtop font_size" align="right">Rp.<?php //echo format_number($data['total_tarif_nego'], 0); 
																				?>&nbsp;</td> -->
		</tr>
		</tr>
			</table>
		</div>
			
		<div class="divFooter">
			

			<table border=0 width=100%>
				<table>
					<tr>
						<td class="customer">TERM & CONDITIONS</td>
					</tr>
				</table>

				<tr>


					<td width=100% valign=top>
						<table border=0 width=30% class="">



						</table>
						<table border=0 width=95% class="">
							<tr>
								<td valign="top">1.</td>
								<td>
									Harga belum termasuk PPn 11%
								</td>
							</tr>
							<tr>
								<td valign="top">2.</td>
								<td>
									SPK diterima 2 (dua) hari sebelum pekerjaan
								</td>
							</tr>
							<tr>

								<td valign="top">3.</td>
								<td>
									Payment 2 (dua) minggu setelah invoice diterima
								</td>
						
								<tr>
									<td>4.</td><td>Pembayaran transfer ke Bank:</td>
								</tr>
								<tr>
									<td></td><td>a) Nama Bank: MANDIRI</td>
								</tr>
								<tr>
									<td></td><td>b) Cabang: Radio Dalam, Jakarta Selatan</td>
								</tr>
								<tr>
									<td></td><td>c) Nomor Rekening: </td>
								</tr>
								<tr>
									<td></td><td>d) Nama Rekening: PT. NEUTRON MITRA ABADI</td>
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
