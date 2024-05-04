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
				top: 0;
				height: auto;
				width: 100%;
				border: 0;
				background-color: white;
			}

			div.divContent {
				padding-top: 340px;
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

				width: 95%;
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
				background-color: #3b5288;
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
				background-color: #3b5288;
				width: 60%;
				padding: 5px;
				text-align: left;
				/* font-weight:bold; */
				font-size: 12px;
				/* padding-top: -100px; */

			}

			.quotation {
				color: #3b5288;
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
								<td><?php echo $rs_data[0]["id_sales"]; ?></td>
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
					<th width="250">Delivery Route</th>
					<th width="120">Moda Transportation</th>
					<th width="80">Rate Expedition</th>
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
					$status_koreksi = $result["status_koreksi"];
					$tarif_final = 0;
					if($status_koreksi==0){
						$tarif_final = $result["tarif_pbl"];
					}else{
						$tarif_final = $result["tarif_nego"];
					}
					//$kategori = $result["nama_kategori"];
					// if($kategori=="REGULAR | OPTIONAL TOL"){
					// 	$kategori = "REGULAR";
					// }
					//$total += $result["harga_satuan"] * $result["qty"] * $result["detail_kurs_konversi"];
					if ($loop == ($limit + 1)) {
				?>
						<tr>
							<td class="only_top" colspan="6">&nbsp;</td>
						</tr>
			</table>
			<div class="divNextpage"></div>
			<table class="table_detail" width=100%>
				<tr>
					<th width="30">No.</th>
					<th width="250">Delivery Route</th>
					<th width="120">Moda Transportation</th>
					<th width="80">Rate Expedition</th>
					<!-- <th width="50">PBL Rate</th> -->
				</tr>
			<?php

						$loop = 1;
					}
			?>
			<tr>
				<td class="leftright2"><?php echo ($counter); ?></td>
				<td class="leftright2"><?php echo ($result["loading"]); ?> - <?php echo ($result["unloading"]); ?></td>
				<td class="leftright2" align="center"><?php echo ($result["unit"]); ?> <?php echo ($result["tipe_box"]); ?></td>
				<td class="leftright2" align="right">Rp.<?php echo format_number($tarif_final); ?> / <?php echo ($result["satuan_konversi"]); ?></td>
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
								<td valign="top">1. </td>
								<td>Tarif pengiriman barang adalah Door to Door (FCL) tidak termasuk biaya packing barang atau biaya lainnya di pelabuhan, untuk LCL Door to Door min charge 100 Kg (jika dibawah 100 Kg maka akan dikenakan charge minimal).</td>
							</tr>
							<tr>
								<td valign="top">2. </td>
								<td>Jika terdapat biaya lain diluar harga Quotation yang sudah disepakati maka akan dikenakan charge sesuai receipt yang berlaku.</td>
							</tr>
							<tr>

								<td valign="top">3. </td>
								<td>Tarif diatas tidak termasuk PPN dan PPH 23 (PPN & PPH mengikuti ketentuan pelayaran yang berlaku.</td>
							</tr>
							<?php
									if ($rs_data[0]["informasi_lain"]!="") { ?>
								<tr>
									<td valign="top">4.</td><td><?php echo $rs_data[0]["informasi_lain"]; ?></td>
								</tr>
								<?php } ?>
							<tr>
									<td valign="top"><?php if ($rs_data[0]["informasi_lain"]!="") { echo '5'; }else { echo '4';}?>.</td><td>Tarif yang tercantum diatas sudah termasuk biaya asuransi. Ketentuan klaim pada asuransi mengikuti dengan klausal yang berlaku, diantaranya apabila terjadi kerusakan dan atau kehilangan pada objek pengiriman yang disebabkan oleh pihak transporter dan dapat dibuktikan selama masa pengiriman maka untuk klaim kerugian tersebut pihak customer wajib mengikuti ketentuan / prosedur yang diberlakukan perusahaan asuransi tersebut.</td>
								</tr>
								<tr>
									<td valign="top"><?php if ($rs_data[0]["informasi_lain"]!="") { echo '6'; }else { echo '5';}?>.</td><td>Permintaan unit container Door to Door wajib diinformasikan maksimal H-7 kepada PIC <?php echo ($rs_data[0]["contact_admin"]); ?> dan DI CC kepada <?php echo ($rs_data[0]["nama_sales"]); ?> Email: <?php echo ($rs_data[0]["email_sales"]); ?>, No. HP: <?php echo ($rs_data[0]["no_wa"]); ?>.</td>
								</tr>

								<tr>
									<td valign="top"><?php if ($rs_data[0]["informasi_lain"]!="") { echo '7'; }else { echo '6';}?>.</td><td>Ketentuan pembayaran adalah 50% sebelum barang dimuat dan 50% sisa pelunasan setelah 14 Hari invoice diterima.</td>
								</tr>

								<tr>
								
									<td valign="top"><?php if ($rs_data[0]["informasi_lain"]!="") { echo '8'; }else { echo '7';}?>.</td><td>Muatan wajib mengikuti segala bentuk ketentuan berat dan dimensi container yang dipesan.</td>
								</tr>
								
								<tr>
									<td valign="top"><?php if ($rs_data[0]["informasi_lain"]!="") { echo '9'; }else { echo '8';}?>.</td><td>Biaya cancelation fee akan dikenakan sebesar 50% dari tarif yang berlaku apabila terjadi pembatalan jika pengiriman tersebut sudah dibooking kepada pihak pelayaran.</td>
								</tr>

								<tr>
									<td valign="top"><?php if ($rs_data[0]["informasi_lain"]!="") { echo '10'; }else { echo '9';}?>.</td><td>Tarif penawaran diatas tidak mengikat dan dapat berubah sewaktu waktu mengikuti ketentuan pelayaran yang ada.</td>
								</tr>
								
								
								
								<tr>
									<td><?php if ($rs_data[0]["informasi_lain"]!="") { echo '11'; }else { echo '10';}?>.</td><td>Pembayaran transfer ke Bank:</td>
								</tr>
								<tr>
									<td></td><td>a) Nama Bank: OCBC NISP</td>
								</tr>
								<tr>
									<td></td><td>b) Cabang: Kuningan, Jakarta Selatan</td>
								</tr>
								<tr>
									<td></td><td>c) Nomor Rekening: 5458-000-39-111</td>
								</tr>
								<tr>
									<td></td><td>d) Nama Rekening: PANCA BUDI LOGISTINDO</td>
								</tr>

						</table>



						<table border=0 width=100% class="">

							<tr>
								<td align="center" colspan="2">Provided by,</td>
								<td></td>
							</tr>
							<tr>
								<td align="center" colspan="2">PT. PANCA BUDI LOGISTINDO</td>
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
