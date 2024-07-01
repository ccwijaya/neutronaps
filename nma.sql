# Host: localhost  (Version 5.5.5-10.1.8-MariaDB)
# Date: 2024-07-01 16:01:39
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "cabang"
#

DROP TABLE IF EXISTS `cabang`;
CREATE TABLE `cabang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(255) DEFAULT NULL,
  `nama_cabang` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `create_user` int(11) DEFAULT '0',
  `create_time` datetime DEFAULT NULL,
  `update_user` int(11) DEFAULT '0',
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Data for table "cabang"
#

INSERT INTO `cabang` VALUES (1,'C001`','JAKARTA','Head Office',1,'2024-05-22 14:50:29',0,NULL);

#
# Structure for table "commodity"
#

DROP TABLE IF EXISTS `commodity`;
CREATE TABLE `commodity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_commodity` varchar(255) DEFAULT NULL,
  `nama_commodity` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Data for table "commodity"
#

INSERT INTO `commodity` VALUES (1,NULL,NULL,NULL,NULL,NULL,NULL,NULL);

#
# Structure for table "counter"
#

DROP TABLE IF EXISTS `counter`;
CREATE TABLE `counter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(100) DEFAULT NULL,
  `last_counter` int(11) DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

#
# Data for table "counter"
#

INSERT INTO `counter` VALUES (1,'QUOTATION-2024-06-02',2,NULL,NULL,NULL,NULL),(2,'NMA-Q2024-06-12',1,NULL,NULL,NULL,NULL),(3,'NMA-Q2024-06-20',3,NULL,NULL,NULL,NULL),(4,'NMA-WO2024-07-01',1,NULL,NULL,NULL,NULL);

#
# Structure for table "criticsuggestion"
#

DROP TABLE IF EXISTS `criticsuggestion`;
CREATE TABLE `criticsuggestion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ticket_number` varchar(100) DEFAULT NULL,
  `requested_date` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `target_date` date DEFAULT NULL,
  `requested_by` varchar(255) DEFAULT NULL,
  `requested_position` varchar(255) DEFAULT NULL,
  `module_development` varchar(255) DEFAULT NULL,
  `note_request` text,
  `reason_request` text,
  `reason_plus` text,
  `status` int(11) DEFAULT '0',
  `create_user` int(11) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "criticsuggestion"
#


#
# Structure for table "customer"
#

DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_sales` int(11) DEFAULT NULL,
  `id_cabang` int(11) DEFAULT NULL,
  `kategori_produk` varchar(255) DEFAULT NULL,
  `kode` varchar(255) DEFAULT NULL,
  `kategori_cust` varchar(255) DEFAULT NULL,
  `nama_customer` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `kota` varchar(255) DEFAULT NULL,
  `kecamatan` varchar(255) DEFAULT NULL,
  `kelurahan` varchar(255) DEFAULT NULL,
  `kode_pos` varchar(255) DEFAULT NULL,
  `pic` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `contact1` varchar(255) DEFAULT NULL,
  `email1` varchar(255) DEFAULT NULL,
  `contact2` varchar(255) DEFAULT NULL,
  `email2` varchar(255) DEFAULT NULL,
  `fax` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `industri` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Data for table "customer"
#

INSERT INTO `customer` VALUES (1,1,1,'2','K001','EXT','PT. PAUL BUANA INDONESIA','PERGUDANGAN TAMAN TEKNO BSD','TANGERANG SELATAN','BSD','BSD','10000','SITI','EKSPOR','02155002000',NULL,'089992828289',NULL,NULL,NULL,NULL,NULL,1,'2024-05-22 14:56:14',NULL,NULL);

#
# Structure for table "gudang"
#

DROP TABLE IF EXISTS `gudang`;
CREATE TABLE `gudang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(255) DEFAULT NULL,
  `nama_gudang` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `create_user` int(11) DEFAULT '0',
  `create_time` datetime DEFAULT NULL,
  `update_user` int(11) DEFAULT '0',
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "gudang"
#

INSERT INTO `gudang` VALUES (1,'GAS','GUDANG AGUS SALIM','GUDANG PUSAT AGUS SALIM',0,NULL,2,'2023-05-27 04:42:06'),(2,'GNP','GUDANG GUNUNG PUTRI','GUDANG CABANG GUNUNG PUTRI',0,NULL,2,'2023-05-27 04:42:17'),(3,'GSJ','GUDANG SIDOARJO','GUDANG CABANG SIDOARJO',0,NULL,2,'2023-05-27 04:42:38'),(4,'GPW','GUDANG PURWAKARTA','GUDANG CABANG PURWAKARTA',0,NULL,2,'2023-05-27 04:42:28');

#
# Structure for table "produk_jasa"
#

DROP TABLE IF EXISTS `produk_jasa`;
CREATE TABLE `produk_jasa` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `kode_produk` varchar(5) CHARACTER SET armscii8 DEFAULT NULL,
  `kode_reg` varchar(255) DEFAULT NULL,
  `nama_produk` varchar(100) CHARACTER SET armscii8 DEFAULT NULL,
  `deskripsi` longtext CHARACTER SET armscii8,
  `create_user` int(11) DEFAULT '0',
  `create_time` datetime DEFAULT NULL,
  `update_user` int(11) DEFAULT '0',
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

#
# Data for table "produk_jasa"
#

INSERT INTO `produk_jasa` VALUES (1,'FM001','ID0057MB','FUMIGASI METHYL','Fumigasi Menggunakan Methyl Bromide (Ch3Br)',1,'2024-05-22 16:42:25',1,'2024-06-02 15:38:27'),(2,'FM002','ID0063PH','FUMIGASI PHOSPHINE','Ffumigasi Menggunakan Tablet Phosphine (Ph3)',1,'2024-05-22 16:43:22',1,'2024-06-02 15:39:32');

#
# Structure for table "produk_jasa_detail"
#

DROP TABLE IF EXISTS `produk_jasa_detail`;
CREATE TABLE `produk_jasa_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_jasa_detail` varchar(255) DEFAULT NULL,
  `nama_jasa` varchar(255) DEFAULT '',
  `keterangan` varchar(255) DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

#
# Data for table "produk_jasa_detail"
#

INSERT INTO `produk_jasa_detail` VALUES (1,'J001','20 FEET','Test 1234',NULL,NULL,1,'2024-06-02 16:26:55'),(2,'J002','40 FEET',NULL,NULL,NULL,NULL,NULL),(3,'J003','LCL 1, 5 Cbm',NULL,NULL,NULL,NULL,NULL),(4,'J004','Per Cbm',NULL,NULL,NULL,NULL,NULL);

#
# Structure for table "sales"
#

DROP TABLE IF EXISTS `sales`;
CREATE TABLE `sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cabang` int(11) DEFAULT NULL,
  `kode` varchar(255) DEFAULT NULL,
  `nama_sales` varchar(255) DEFAULT NULL,
  `no_wa` varchar(255) DEFAULT NULL,
  `email_sales` varchar(255) DEFAULT NULL,
  `contact_admin` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Data for table "sales"
#

INSERT INTO `sales` VALUES (1,1,'S001','Santoso',NULL,NULL,NULL,'Sales Jakarta',1,'2024-05-22 14:52:55',NULL,NULL);

#
# Structure for table "setting_email"
#

DROP TABLE IF EXISTS `setting_email`;
CREATE TABLE `setting_email` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `active` int(11) DEFAULT '1',
  `create_user` int(11) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "setting_email"
#


#
# Structure for table "sls_ba"
#

DROP TABLE IF EXISTS `sls_ba`;
CREATE TABLE `sls_ba` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_po_customer` int(11) DEFAULT NULL,
  `id_cabang` int(11) DEFAULT NULL,
  `no_bukti` varchar(255) DEFAULT NULL,
  `no_reff` varchar(255) DEFAULT NULL,
  `tanggal` varchar(255) DEFAULT NULL,
  `id_customer` varchar(255) DEFAULT NULL,
  `id_shipper` varchar(255) DEFAULT NULL,
  `consignee` varchar(255) DEFAULT NULL,
  `alamat_consignee` longtext,
  `notify_party` longtext,
  `alamat_notify_party` longtext,
  `vessel` varchar(255) DEFAULT NULL,
  `pol` varchar(255) DEFAULT NULL,
  `pod` varchar(255) DEFAULT NULL,
  `dog` longtext,
  `weight` varchar(255) DEFAULT NULL,
  `nama_sales` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `id_produk_jasa` int(11) DEFAULT NULL,
  `status_approve` int(11) DEFAULT NULL,
  `nama_approved` varchar(255) DEFAULT NULL,
  `waktu_approved` datetime DEFAULT NULL,
  `ttd_approved` varchar(255) DEFAULT NULL,
  `no_container` varchar(255) DEFAULT NULL,
  `tujuan` varchar(255) DEFAULT NULL,
  `jenis_container` varchar(255) DEFAULT NULL,
  `tempat_fumigasi` varchar(255) DEFAULT NULL,
  `waktu_pelepasan` varchar(255) DEFAULT NULL,
  `durasi_fumigasi` varchar(255) DEFAULT NULL,
  `fumigan_digunakan` varchar(255) DEFAULT NULL,
  `dosis_fumigan` varchar(255) DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "sls_ba"
#


#
# Structure for table "sls_ba_detail"
#

DROP TABLE IF EXISTS `sls_ba_detail`;
CREATE TABLE `sls_ba_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ba` int(11) DEFAULT NULL,
  `id_produk_jasa_detail` int(11) DEFAULT NULL,
  `harga` decimal(10,2) DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "sls_ba_detail"
#


#
# Structure for table "sls_po_customer"
#

DROP TABLE IF EXISTS `sls_po_customer`;
CREATE TABLE `sls_po_customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_quotation` int(11) DEFAULT NULL,
  `id_cabang` int(11) DEFAULT NULL,
  `no_bukti` varchar(255) DEFAULT NULL,
  `no_reff` varchar(255) DEFAULT NULL,
  `tanggal` varchar(255) DEFAULT NULL,
  `id_customer` varchar(255) DEFAULT NULL,
  `id_shipper` varchar(255) DEFAULT NULL,
  `consignee` varchar(255) DEFAULT NULL,
  `alamat_consignee` longtext,
  `notify_party` longtext,
  `alamat_notify_party` longtext,
  `vessel` varchar(255) DEFAULT NULL,
  `pol` varchar(255) DEFAULT NULL,
  `pod` varchar(255) DEFAULT NULL,
  `dog` longtext,
  `weight` varchar(255) DEFAULT NULL,
  `nama_sales` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `id_produk_jasa` int(11) DEFAULT NULL,
  `status_approve` int(11) DEFAULT NULL,
  `nama_approved` varchar(255) DEFAULT NULL,
  `waktu_approved` datetime DEFAULT NULL,
  `ttd_approved` varchar(255) DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "sls_po_customer"
#

INSERT INTO `sls_po_customer` VALUES (1,2,1,'NMA-WO-01-0724-001','00050','2024-07-01','1','1','ewrewr','fdsdfsdfdsd','ewewwdfdfs','trhgfdfs','sdfsdf','fdteerg','fdgdfgd','dfgfdhdg','sdfsdfs','Santoso',NULL,2,NULL,NULL,NULL,NULL,1,'2024-07-01 10:21:23',NULL,NULL);

#
# Structure for table "sls_po_customer_detail"
#

DROP TABLE IF EXISTS `sls_po_customer_detail`;
CREATE TABLE `sls_po_customer_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_po_customer` int(11) DEFAULT NULL,
  `id_produk_jasa_detail` int(11) DEFAULT NULL,
  `harga` decimal(10,2) DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "sls_po_customer_detail"
#

INSERT INTO `sls_po_customer_detail` VALUES (1,1,3,34.00,1,'2024-07-01 10:21:23',NULL,NULL),(2,1,1,567.00,1,'2024-07-01 10:21:23',NULL,NULL),(3,1,4,9090.00,1,'2024-07-01 10:21:23',NULL,NULL);

#
# Structure for table "sls_quotation"
#

DROP TABLE IF EXISTS `sls_quotation`;
CREATE TABLE `sls_quotation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cabang` int(11) DEFAULT NULL,
  `no_bukti` varchar(255) DEFAULT NULL,
  `tanggal` varchar(255) DEFAULT NULL,
  `id_customer` varchar(255) DEFAULT NULL,
  `nama_sales` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `id_produk_jasa` int(11) DEFAULT NULL,
  `status_approve` int(11) DEFAULT NULL,
  `nama_approved` varchar(255) DEFAULT NULL,
  `waktu_approved` datetime DEFAULT NULL,
  `ttd_approved` varchar(255) DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "sls_quotation"
#

INSERT INTO `sls_quotation` VALUES (2,1,'NMA-Q-12-0624-001','2024-06-12','1','Santoso','',2,NULL,NULL,NULL,NULL,1,'2024-06-12 18:01:59',1,'2024-06-24 12:02:08');

#
# Structure for table "sls_quotation_detail"
#

DROP TABLE IF EXISTS `sls_quotation_detail`;
CREATE TABLE `sls_quotation_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_rr` int(11) DEFAULT NULL,
  `id_produk_jasa_detail` int(11) DEFAULT NULL,
  `harga` decimal(10,2) DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "sls_quotation_detail"
#

INSERT INTO `sls_quotation_detail` VALUES (35,2,3,34.00,1,'2024-06-24 12:02:08',NULL,NULL),(36,2,1,567.00,1,'2024-06-24 12:02:08',NULL,NULL),(37,2,4,9090.00,1,'2024-06-24 12:02:08',NULL,NULL);

#
# Structure for table "sls_rate_request"
#

DROP TABLE IF EXISTS `sls_rate_request`;
CREATE TABLE `sls_rate_request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_paf` int(11) DEFAULT NULL,
  `is_pre_project` int(11) DEFAULT NULL,
  `is_dist` int(11) DEFAULT NULL,
  `id_sales` varchar(255) DEFAULT NULL,
  `id_cabang` int(11) DEFAULT NULL,
  `no_bukti` varchar(255) DEFAULT NULL,
  `tanggal` varchar(255) DEFAULT NULL,
  `id_customer` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `status_approve` int(11) DEFAULT NULL,
  `nama_approved` varchar(255) DEFAULT NULL,
  `waktu_approved` datetime DEFAULT NULL,
  `ttd_approved` varchar(255) DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "sls_rate_request"
#


#
# Structure for table "sls_rate_request_detail"
#

DROP TABLE IF EXISTS `sls_rate_request_detail`;
CREATE TABLE `sls_rate_request_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_rr` int(11) DEFAULT NULL,
  `id_rute` int(11) DEFAULT NULL,
  `id_moda` int(11) DEFAULT NULL,
  `id_kategori_kirim` int(11) DEFAULT NULL,
  `jenis_muatan` varchar(255) DEFAULT NULL,
  `pool_pm` varchar(255) DEFAULT NULL,
  `km_pool_pm` decimal(10,2) DEFAULT NULL,
  `km_lan_pm` decimal(10,2) DEFAULT NULL,
  `total_km_pm` decimal(10,2) DEFAULT NULL,
  `tempuh_hari_pm` decimal(10,2) DEFAULT NULL,
  `hari_ops` decimal(10,2) DEFAULT NULL,
  `total_hari_pm` decimal(10,2) DEFAULT NULL,
  `ratio_pm` decimal(10,2) DEFAULT NULL,
  `liter_pm` decimal(10,2) DEFAULT NULL,
  `harga_ltr_pm` decimal(10,2) DEFAULT NULL,
  `total_bbm_pm` decimal(10,2) DEFAULT NULL,
  `uang_harian_supir_pm` decimal(10,2) DEFAULT NULL,
  `lembur_supir_pm` decimal(10,2) DEFAULT NULL,
  `total_umk_supir_pm` decimal(10,2) DEFAULT NULL,
  `uang_harian_kenek_pm` decimal(10,2) DEFAULT NULL,
  `lembur_kenek_pm` decimal(10,2) DEFAULT NULL,
  `total_umk_kenek_pm` decimal(10,2) DEFAULT NULL,
  `tol_pm` decimal(10,2) DEFAULT NULL,
  `kapal_pm` decimal(10,2) DEFAULT NULL,
  `bongkar_pm` decimal(10,2) DEFAULT NULL,
  `muat_pm` decimal(10,2) DEFAULT NULL,
  `mel_pm` decimal(10,2) DEFAULT NULL,
  `internet_pm` decimal(10,2) DEFAULT NULL,
  `total_ujp_pm` decimal(10,2) DEFAULT NULL,
  `asuransi_pm` decimal(10,2) DEFAULT NULL,
  `load_unload_pm` decimal(10,2) DEFAULT NULL,
  `klaim_kerusakan_pm` decimal(10,2) DEFAULT NULL,
  `spareparts_pm` decimal(10,2) DEFAULT NULL,
  `pod_pm` decimal(10,2) DEFAULT NULL,
  `total_varian_cost` decimal(10,2) DEFAULT NULL,
  `fix_cost` decimal(10,2) DEFAULT NULL,
  `test` varchar(255) DEFAULT NULL,
  `total_cost` decimal(10,2) DEFAULT NULL,
  `margin_15` decimal(10,2) DEFAULT NULL,
  `margin_20` decimal(10,2) DEFAULT NULL,
  `margin_30` decimal(10,2) DEFAULT NULL,
  `margin_40` decimal(10,2) DEFAULT NULL,
  `margin_50` decimal(10,2) DEFAULT NULL,
  `tarif_approved` decimal(10,2) DEFAULT NULL,
  `koreksi_tarif` decimal(10,2) DEFAULT NULL,
  `volume_trip` decimal(10,2) DEFAULT NULL,
  `tarif_sales` decimal(10,2) DEFAULT NULL,
  `reff_sales` varchar(255) DEFAULT NULL,
  `tarif_vendor` decimal(10,2) DEFAULT NULL,
  `margin_vendor` decimal(10,2) DEFAULT NULL,
  `persentase_vendor` decimal(10,2) DEFAULT NULL,
  `reff_vendor` varchar(255) DEFAULT NULL,
  `tarif_internal` decimal(10,2) DEFAULT NULL,
  `reff_internal` varchar(255) DEFAULT NULL,
  `tarif_platform` decimal(10,2) DEFAULT NULL,
  `reff_platform` varchar(100) DEFAULT NULL,
  `status_verif` varchar(255) DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "sls_rate_request_detail"
#


#
# Structure for table "status_verif"
#

DROP TABLE IF EXISTS `status_verif`;
CREATE TABLE `status_verif` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_verif` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

#
# Data for table "status_verif"
#

INSERT INTO `status_verif` VALUES (1,'Approved',NULL,NULL,NULL,NULL,NULL),(2,'Negotiable',NULL,NULL,NULL,NULL,NULL),(3,'Disapprove',NULL,NULL,NULL,NULL,NULL);

#
# Structure for table "web_access"
#

DROP TABLE IF EXISTS `web_access`;
CREATE TABLE `web_access` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `acc_fin` int(11) DEFAULT NULL,
  `cs` int(11) DEFAULT NULL,
  `inv` int(11) DEFAULT NULL,
  `sls` int(11) DEFAULT NULL,
  `eng` int(11) DEFAULT NULL,
  `hrd` int(11) DEFAULT NULL,
  `gm` int(11) DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "web_access"
#

INSERT INTO `web_access` VALUES (1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);

#
# Structure for table "web_log"
#

DROP TABLE IF EXISTS `web_log`;
CREATE TABLE `web_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(100) DEFAULT '',
  `password` varchar(100) DEFAULT '',
  `status` int(11) DEFAULT NULL,
  `ip` varchar(100) DEFAULT '',
  `timing` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "web_log"
#

INSERT INTO `web_log` VALUES (1,'admin','admin123',1,'','2024-04-30 11:28:39'),(2,'admin','admin123',1,'','2024-04-30 11:32:27'),(3,'admin','admin140313',0,'','2024-05-04 12:17:36'),(4,'admin','admin123',1,'','2024-05-04 12:17:39'),(5,'admin','admin123',1,'','2024-05-22 14:49:36'),(6,'candra','ccw140313',0,'','2024-06-02 15:56:09'),(7,'candra','ccw140313',0,'','2024-06-02 15:56:14'),(8,'candra','ccw140313',0,'','2024-06-03 11:12:29'),(9,'admin','admin12',0,'','2024-06-03 11:39:01'),(10,'admin','admin123',1,'','2024-06-03 11:39:05'),(11,'admin','admin123',1,'','2024-06-11 12:08:52'),(12,'admin','admin123',1,'','2024-06-11 16:25:02'),(13,'admin','admin123',1,'','2024-06-12 09:48:34'),(14,'admin','admin123',1,'','2024-06-12 10:39:55'),(15,'admin','admin123',1,'','2024-06-12 10:46:08'),(16,'admin','admin123',1,'','2024-06-12 16:28:48'),(17,'admin','admin123',1,'','2024-06-12 16:39:52'),(18,'admin','admin123',1,'','2024-06-12 17:18:13'),(19,'admin','admin123',1,'','2024-06-12 17:54:24'),(20,'admin','admin123',1,'','2024-06-13 04:43:54'),(21,'admin','admin123',1,'','2024-06-20 13:37:56'),(22,'admin','admin123',1,'','2024-06-24 11:04:59'),(23,'admin','admin123',1,'','2024-06-26 03:15:43'),(24,'admin','admin123',1,'','2024-06-26 09:33:47'),(25,'admin','admin123',1,'','2024-06-27 04:40:49'),(26,'admin','admin123',1,'','2024-07-01 09:36:54');

#
# Structure for table "web_user"
#

DROP TABLE IF EXISTS `web_user`;
CREATE TABLE `web_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(100) DEFAULT '',
  `id_karyawan` varchar(255) DEFAULT NULL,
  `id_sales` int(11) DEFAULT NULL,
  `id_level` int(11) DEFAULT NULL,
  `level_jabatan` int(11) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `level_izin` int(11) DEFAULT NULL,
  `id_pengajuan` int(11) DEFAULT '0',
  `nama_user` varchar(100) DEFAULT '',
  `passwd` varchar(100) DEFAULT '',
  `no_hp` varchar(100) DEFAULT '',
  `email` varchar(100) DEFAULT '',
  `pass_email` varchar(255) DEFAULT NULL,
  `id_cabang` int(11) DEFAULT '0',
  `id_gudang` int(11) DEFAULT NULL,
  `warehouse` int(11) DEFAULT NULL,
  `trucking` int(11) DEFAULT NULL,
  `cs_branch` int(11) DEFAULT NULL,
  `vm` int(11) DEFAULT NULL,
  `pa` int(11) DEFAULT NULL,
  `inv_branch` varchar(255) DEFAULT NULL,
  `inv` int(11) DEFAULT NULL,
  `sls` int(11) DEFAULT NULL,
  `eng` int(11) DEFAULT NULL,
  `hrd` int(11) DEFAULT NULL,
  `driver` int(11) DEFAULT NULL,
  `gm` int(11) DEFAULT NULL,
  `main_menu` int(11) DEFAULT NULL,
  `ywp` int(11) DEFAULT NULL,
  `app_cuti` int(11) DEFAULT NULL,
  `stg` int(11) DEFAULT NULL,
  `acc` int(11) DEFAULT NULL,
  `ops` int(11) DEFAULT NULL,
  `po_account` int(11) DEFAULT NULL,
  `dash_home` int(11) DEFAULT NULL,
  `verify` int(11) DEFAULT NULL,
  `approval` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT '1',
  `is_cat_customer` int(11) DEFAULT NULL,
  `akses_harga_jual` int(11) DEFAULT NULL,
  `akses_input_harga` int(11) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `ttd` varchar(255) DEFAULT NULL,
  `ttd_pengajuan` varchar(255) DEFAULT NULL,
  `ttd_pengajuan_check` varchar(255) DEFAULT NULL,
  `edit_akses` int(2) DEFAULT '0',
  `delete_akses` int(11) DEFAULT '0',
  `last_login` datetime DEFAULT NULL,
  `create_user` int(11) DEFAULT '0',
  `keterangan` varchar(255) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_user` int(11) DEFAULT '0',
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "web_user"
#

INSERT INTO `web_user` VALUES (1,'admin',NULL,NULL,2,4,'Logistic Analyst Spv',NULL,0,'Admin','0192023a7bbd73250516f069df18b500','081298868898','admin@gmail.com',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,1,1,3,NULL,NULL,'avatar2.png','ttd.jpeg',NULL,NULL,0,1,'2024-07-01 09:36:54',1,NULL,'2022-12-19 02:14:00',1,'2024-07-01 09:36:54');

#
# Structure for table "web_user_level"
#

DROP TABLE IF EXISTS `web_user_level`;
CREATE TABLE `web_user_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

#
# Data for table "web_user_level"
#

INSERT INTO `web_user_level` VALUES (1,'Terbatas',NULL,NULL,NULL,NULL),(2,'Menyeluruh',NULL,NULL,NULL,NULL);

#
# Structure for table "web_user_menu"
#

DROP TABLE IF EXISTS `web_user_menu`;
CREATE TABLE `web_user_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `id_menu` int(11) DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx1` (`id_user`),
  KEY `idx2` (`id_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=4618 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

#
# Data for table "web_user_menu"
#

INSERT INTO `web_user_menu` VALUES (4603,1,8,1,'2024-04-30 11:11:21',NULL,NULL),(4604,1,7,1,'2024-04-30 11:11:21',NULL,NULL),(4605,1,12,1,'2024-04-30 11:11:21',NULL,NULL),(4606,1,10,1,'2024-04-30 11:11:21',NULL,NULL),(4607,1,11,1,'2024-04-30 11:11:21',NULL,NULL),(4608,1,5,1,'2024-04-30 11:11:21',NULL,NULL),(4609,1,6,1,'2024-04-30 11:11:21',NULL,NULL),(4610,1,3,1,'2024-04-30 11:11:21',NULL,NULL),(4611,1,4,1,'2024-04-30 11:11:21',NULL,NULL),(4612,1,2,1,'2024-04-30 11:11:21',NULL,NULL),(4613,1,9,1,'2024-04-30 11:11:21',NULL,NULL),(4614,1,1,1,'2024-04-30 11:11:21',NULL,NULL),(4615,1,13,NULL,NULL,NULL,NULL),(4616,1,14,NULL,NULL,NULL,NULL),(4617,1,15,NULL,NULL,NULL,NULL),(4618,1,16,NULL,NULL,NULL,NULL);

#
# Structure for table "web_user_menu_list"
#

DROP TABLE IF EXISTS `web_user_menu_list`;
CREATE TABLE `web_user_menu_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `keterangan_menu` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

#
# Data for table "web_user_menu_list"
#

INSERT INTO `web_user_menu_list` VALUES (1,'user','Setting','User Setup',NULL,NULL,NULL,NULL,NULL),(2,'profil','Setting','Profile',NULL,NULL,NULL,NULL,NULL),(3,'cabang','Setting','Master Cabang',NULL,NULL,NULL,NULL,NULL),(4,'sales','Setting','Master Sales',NULL,NULL,NULL,NULL,NULL),(5,'customer','Sales','Master Customer Trucking',NULL,NULL,NULL,NULL,NULL),(6,'sls_quotation','Sales','Quotation',NULL,NULL,NULL,NULL,NULL),(7,'gnr_timeline','All Dept','Timeline Progress',NULL,NULL,NULL,NULL,NULL),(8,'gnr_timeline','All Dept','Time Line',NULL,NULL,NULL,NULL,NULL),(9,'gnr_timeline_received','Setting','Time Line Receiving',NULL,NULL,NULL,NULL,NULL),(10,'gnr_timeline_Approval','Approval','Time Line Approval',NULL,NULL,NULL,NULL,NULL),(11,'sls_contract','Sales','Contract',NULL,NULL,NULL,NULL,NULL),(12,'sls_quotation_unlock','Approval','Quotation Unlock',NULL,NULL,NULL,NULL,NULL),(13,'produk_jasa','Admin','Produk Jasa',NULL,NULL,NULL,NULL,NULL),(14,'produk_jasa_detail','Admin','Produk Jasa Detail',NULL,NULL,NULL,NULL,NULL),(15,'sls_po_customer','Admin','PO Customer',NULL,NULL,NULL,NULL,NULL),(16,'sls_ba','Admin','Berita Acara',NULL,NULL,NULL,NULL,NULL);

#
# View "view_customer"
#

DROP VIEW IF EXISTS `view_customer`;
CREATE
  ALGORITHM = UNDEFINED
  VIEW `view_customer`
  AS
SELECT
  `a`.`nama_customer`, `b`.`nama_sales`
FROM
  (`customer` a
    JOIN `sales` b ON ((`b`.`id` = `a`.`id_sales`)));
