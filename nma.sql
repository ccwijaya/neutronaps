﻿# Host: localhost  (Version 5.5.5-10.1.8-MariaDB)
# Date: 2024-05-04 17:30:51
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "cabang"
#


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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

#
# Data for table "counter"
#


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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "customer"
#


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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "sales"
#


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
# Structure for table "sls_quotation"
#

DROP TABLE IF EXISTS `sls_quotation`;
CREATE TABLE `sls_quotation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_paf` int(11) DEFAULT NULL,
  `is_pre_project` int(11) DEFAULT '0',
  `id_pre_quote` int(11) DEFAULT NULL,
  `is_distribution` int(11) DEFAULT '0',
  `is_contract` int(11) NOT NULL DEFAULT '0',
  `tc_moda` int(11) DEFAULT NULL,
  `id_sales` varchar(255) DEFAULT NULL,
  `id_cabang` int(11) DEFAULT NULL,
  `no_bukti` varchar(255) DEFAULT NULL,
  `no_contract` varchar(255) DEFAULT NULL,
  `cvp` int(11) DEFAULT NULL,
  `tanggal` varchar(255) DEFAULT NULL,
  `tanggal_contract` date DEFAULT NULL,
  `id_customer` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `status_proses_q` int(11) DEFAULT NULL,
  `status_approve_q` int(11) DEFAULT NULL,
  `waktu_approved_q` datetime DEFAULT NULL,
  `nama_approved_q` varchar(255) DEFAULT NULL,
  `ttd_approved_q` varchar(255) DEFAULT NULL,
  `attach_quote_app` varchar(255) DEFAULT NULL,
  `attach_quote_old` varchar(255) DEFAULT NULL,
  `is_nego` int(11) DEFAULT NULL,
  `is_deal` int(11) DEFAULT NULL,
  `is_reject` int(11) DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "sls_quotation"
#


#
# Structure for table "sls_quotation_detail"
#

DROP TABLE IF EXISTS `sls_quotation_detail`;
CREATE TABLE `sls_quotation_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_quotation` varchar(255) DEFAULT NULL,
  `id_profit` int(11) DEFAULT NULL,
  `id_rute` int(11) DEFAULT NULL,
  `loading` varchar(255) DEFAULT NULL,
  `unloading` varchar(255) DEFAULT NULL,
  `id_moda` int(11) DEFAULT NULL,
  `jenis_muatan` varchar(255) DEFAULT NULL,
  `id_kategori_kirim` int(11) DEFAULT NULL,
  `tarif_nego` decimal(10,2) DEFAULT NULL,
  `koreksi_tarif` decimal(10,2) DEFAULT NULL,
  `volume_trip` decimal(10,2) DEFAULT NULL,
  `total_cost` decimal(10,2) DEFAULT NULL,
  `tarif_sales` decimal(10,2) DEFAULT NULL,
  `status_verif` varchar(255) DEFAULT NULL,
  `status_koreksi` int(11) DEFAULT NULL,
  `tarif_pbl` decimal(10,2) DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "sls_quotation_detail"
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "web_log"
#

INSERT INTO `web_log` VALUES (1,'admin','admin123',1,'','2024-04-30 11:28:39'),(2,'admin','admin123',1,'','2024-04-30 11:32:27'),(3,'admin','admin140313',0,'','2024-05-04 12:17:36'),(4,'admin','admin123',1,'','2024-05-04 12:17:39');

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

INSERT INTO `web_user` VALUES (1,'admin',NULL,NULL,2,4,'Logistic Analyst Spv',NULL,0,'Admin','0192023a7bbd73250516f069df18b500','081298868898','admin@gmail.com',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,1,1,3,NULL,NULL,'avatar2.png','ttd.jpeg',NULL,NULL,0,1,'2024-05-04 12:17:39',1,NULL,'2022-12-19 02:14:00',1,'2024-05-04 12:17:39');

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
) ENGINE=InnoDB AUTO_INCREMENT=4615 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

#
# Data for table "web_user_menu"
#

INSERT INTO `web_user_menu` VALUES (4603,1,8,1,'2024-04-30 11:11:21',NULL,NULL),(4604,1,7,1,'2024-04-30 11:11:21',NULL,NULL),(4605,1,12,1,'2024-04-30 11:11:21',NULL,NULL),(4606,1,10,1,'2024-04-30 11:11:21',NULL,NULL),(4607,1,11,1,'2024-04-30 11:11:21',NULL,NULL),(4608,1,5,1,'2024-04-30 11:11:21',NULL,NULL),(4609,1,6,1,'2024-04-30 11:11:21',NULL,NULL),(4610,1,3,1,'2024-04-30 11:11:21',NULL,NULL),(4611,1,4,1,'2024-04-30 11:11:21',NULL,NULL),(4612,1,2,1,'2024-04-30 11:11:21',NULL,NULL),(4613,1,9,1,'2024-04-30 11:11:21',NULL,NULL),(4614,1,1,1,'2024-04-30 11:11:21',NULL,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

#
# Data for table "web_user_menu_list"
#

INSERT INTO `web_user_menu_list` VALUES (1,'user','Setting','User Setup',NULL,NULL,NULL,NULL,NULL),(2,'profil','Setting','Profile',NULL,NULL,NULL,NULL,NULL),(3,'cabang','Setting','Master Cabang',NULL,NULL,NULL,NULL,NULL),(4,'sales','Setting','Master Sales',NULL,NULL,NULL,NULL,NULL),(5,'customer','Sales','Master Customer Trucking',NULL,NULL,NULL,NULL,NULL),(6,'sls_quotation','Sales','Quotation',NULL,NULL,NULL,NULL,NULL),(7,'gnr_timeline','All Dept','Timeline Progress',NULL,NULL,NULL,NULL,NULL),(8,'gnr_timeline','All Dept','Time Line',NULL,NULL,NULL,NULL,NULL),(9,'gnr_timeline_received','Setting','Time Line Receiving',NULL,NULL,NULL,NULL,NULL),(10,'gnr_timeline_Approval','Approval','Time Line Approval',NULL,NULL,NULL,NULL,NULL),(11,'sls_contract','Sales','Contract',NULL,NULL,NULL,NULL,NULL),(12,'sls_quotation_unlock','Approval','Quotation Unlock',NULL,NULL,NULL,NULL,NULL);

#
# View "view_contract"
#

DROP VIEW IF EXISTS `view_contract`;
CREATE
  ALGORITHM = UNDEFINED
  VIEW `view_contract`
  AS
SELECT
  `a`.`id`,
  `a`.`no_contract`,
  `a`.`tanggal_contract`,
  `b`.`id_rute`,
  `c`.`rute`,
  `d`.`unit` AS 'moda',
  `c`.`tipe_box`,
  `b`.`tarif_pbl`,
  `b`.`tarif_nego`,
  IF(`b`.`tarif_nego`, `b`.`tarif_nego`, `b`.`tarif_pbl`) AS 'tarif_contract'
FROM
  (((`sls_quotation` a
    LEFT JOIN `sls_quotation_detail` b ON ((`a`.`id` = `b`.`id_quotation`)))
    LEFT JOIN `view_rute` c ON ((`b`.`id_rute` = `c`.`id`)))
    LEFT JOIN `moda` d ON ((`d`.`id` = `c`.`id_moda`)));

#
# View "view_quotation"
#

DROP VIEW IF EXISTS `view_quotation`;
CREATE
  ALGORITHM = UNDEFINED
  VIEW `view_quotation`
  AS
SELECT
  `a`.`id`,
  `a`.`id_paf`,
  `a`.`is_pre_project`,
  `a`.`id_pre_quote`,
  `a`.`is_distribution`,
  `a`.`is_contract`,
  `a`.`tc_moda`,
  `a`.`id_sales`,
  `a`.`id_cabang`,
  `a`.`no_bukti`,
  `a`.`no_contract`,
  `a`.`cvp`,
  `a`.`tanggal`,
  `a`.`tanggal_contract`,
  `a`.`id_customer`,
  `a`.`keterangan`,
  `a`.`status_proses_q`,
  `a`.`status_approve_q`,
  `a`.`waktu_approved_q`,
  `a`.`nama_approved_q`,
  `a`.`ttd_approved_q`,
  `a`.`attach_quote_app`,
  `a`.`attach_quote_old`,
  `a`.`is_nego`,
  `a`.`is_deal`,
  `a`.`is_reject`,
  `a`.`create_user`,
  `a`.`create_time`,
  `a`.`update_user`,
  `a`.`update_time`,
  (TO_DAYS(CURDATE()) - TO_DAYS(`a`.`create_time`)) AS 'selisih'
FROM
  `sls_quotation` a;
