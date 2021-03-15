# Host: localhost  (Version 5.5.5-10.1.37-MariaDB)
# Date: 2020-09-20 18:16:28
# Generator: MySQL-Front 6.1  (Build 1.26)


#
# Structure for table "jasa_pengiriman"
#

DROP TABLE IF EXISTS `jasa_pengiriman`;
CREATE TABLE `jasa_pengiriman` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(255) NOT NULL DEFAULT '',
  `nama` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

#
# Data for table "jasa_pengiriman"
#

INSERT INTO `jasa_pengiriman` VALUES (1,'jne','JNE'),(2,'pos','POS'),(3,'tiki','TIKI');

#
# Structure for table "kategori"
#

DROP TABLE IF EXISTS `kategori`;
CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(255) NOT NULL DEFAULT '',
  `slug` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

#
# Data for table "kategori"
#

INSERT INTO `kategori` VALUES (15,'Hijab','hijab'),(17,'Aksesoris','Aksesoris');

#
# Structure for table "order_refund"
#

DROP TABLE IF EXISTS `order_refund`;
CREATE TABLE `order_refund` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orders_id` int(11) NOT NULL DEFAULT '0',
  `foto` varchar(255) NOT NULL DEFAULT '',
  `alasan` text NOT NULL,
  `refund_transfer` varchar(255) NOT NULL DEFAULT '',
  `status` varchar(255) DEFAULT 'Pending',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "order_refund"
#

INSERT INTO `order_refund` VALUES (1,1,'20200920124757refund-1.jpg','asd','asd','Pending');

#
# Structure for table "pembayaran"
#

DROP TABLE IF EXISTS `pembayaran`;
CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orders_id` int(11) NOT NULL DEFAULT '0',
  `nama` varchar(255) NOT NULL DEFAULT '',
  `bank` varchar(255) NOT NULL DEFAULT '',
  `jumlah` int(11) NOT NULL DEFAULT '0',
  `tanggal` date NOT NULL DEFAULT '0000-00-00',
  `bukti` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `orders_id` (`orders_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "pembayaran"
#

INSERT INTO `pembayaran` VALUES (1,1,'aa','asd',196000,'2020-09-20','20200920102500bukti-1.jpg');

#
# Structure for table "produk"
#

DROP TABLE IF EXISTS `produk`;
CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_id` int(11) NOT NULL DEFAULT '0',
  `nama_produk` varchar(255) NOT NULL DEFAULT '',
  `slug` varchar(255) NOT NULL DEFAULT '',
  `deskripsi` mediumtext NOT NULL,
  `harga_produk` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `berat` double(8,2) DEFAULT NULL,
  `tgl_masuk` date NOT NULL DEFAULT '0000-00-00',
  `gambar` varchar(255) NOT NULL DEFAULT '',
  `dibeli` int(11) DEFAULT NULL,
  `diskon` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_produk`),
  KEY `kategori_id` (`kategori_id`),
  CONSTRAINT `kategori_id` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

#
# Data for table "produk"
#

INSERT INTO `produk` VALUES (10,15,'Fatimah','Fatimah','Hijab Aisyah Hijab instan langsung slup, Praktis, Ga ribet, tanpa jarum, tanpa peniti',80000,9,2.00,'2020-02-12','202012020010FB_IMG_1581467254426.jpg',0,10),(11,17,'Bros Aisyah','Bros Aisyah','Kuat, Anti Karat, Simple, Awet',25000,4,2.00,'2020-02-20','202012082915FB_IMG_1581468367285.jpg',0,0),(12,15,'Umama','Umama','Hijab instan langsung slup, Praktis, Ga ribet, tanpa jarum, tanpa peniti',50000,12,2.00,'2020-02-28','202012083030FB_IMG_1581467331945.jpg',2,0),(13,17,'Bros Aisyah','Bros Aisyah','Kuat, Anti Karat, Simple, Awet',40000,9,1.00,'2020-02-20','202012083150FB_IMG_1581468191857.jpg',1,2),(14,15,'Aisyah','Aisyah','Hijab Aisyah Hijab instan langsung slup, Praktis, Ga ribet, tanpa jarum, tanpa peniti',60000,12,2.00,'2020-02-18','202012083325FB_IMG_1581467357872.jpg',2,0),(15,15,'Fatimah','Fatimah','Hijab Aisyah Hijab instan langsung slup, Praktis, Ga ribet, tanpa jarum, tanpa peniti',85000,12,2.00,'2020-02-13','202013051717FB_IMG_1581467293480.jpg',0,0),(16,15,'Fatimah','Fatimah','Hijab Aisyah Hijab instan langsung slup, Praktis, Ga ribet, tanpa jarum, tanpa peniti',85000,12,2.00,'2020-02-13','202013052046FB_IMG_1581467398302.jpg',1,0),(17,15,'Aisyah','Aisyah','Hijab Aisyah Hijab instan langsung slup, Praktis, Ga ribet, tanpa jarum, tanpa peniti',65000,12,2.00,'2020-02-13','202013052153FB_IMG_1581467401200.jpg',1,0),(18,15,'Fatimah','Fatimah','Hijab Aisyah Hijab instan langsung slup, Praktis, Ga ribet, tanpa jarum, tanpa peniti',90000,12,2.00,'2020-02-13','202013052302FB_IMG_1581467706867.jpg',0,0),(19,17,'Bros Aisyah','Bros Aisyah','Kuat, Anti Karat, Simple, Awet',25000,12,1.00,'2020-02-13','202013052440FB_IMG_1581468349594.jpg',0,0),(20,17,'Bros Fatimah','Bros Fatimah','Kuat, Anti Karat, Simple, Awet',25000,12,1.00,'2020-02-13','202013052550FB_IMG_1581468367285.jpg',0,0),(21,17,'Bros Aisyah','Bros Aisyah','Kuat, Anti Karat, Simple, Awet',30000,12,1.00,'2020-02-13','202013052655FB_IMG_1581468379388.jpg',0,0),(22,17,'Bros Aisyah','Bros Aisyah','Kuat, Anti Karat, Simple, Awet',35000,12,1.00,'2020-02-13','202013052806FB_IMG_1581468381958.jpg',0,0),(23,17,'Bros Fatimah','Bros Fatimah','Kuat, Anti Karat, Simple, Awet',2000,12,1.00,'2020-02-13','202013053017FB_IMG_1581468384275.jpg',0,0),(24,15,'Fatimah','Fatimah','Hijab instan langsung slup, Praktis, Ga ribet, tanpa jarum, tanpa peniti',80000,12,1.00,'2020-02-13','202013053132FB_IMG_1581468103536.jpg',0,0),(25,15,'Umi','Umi','Hijab instan langsung slup, Praktis, Ga ribet, tanpa jarum, tanpa peniti',60000,11,1.00,'2020-02-13','202013053224FB_IMG_1581467328212.jpg',0,0),(26,15,'Umama','Umama','Hijab instan langsung slup, Praktis, Ga ribet, tanpa jarum, tanpa peniti',75000,12,1.00,'2020-02-13','202013053317FB_IMG_1581467335327.jpg',0,0),(27,15,'Aisyah','Aisyah','Hijab instan langsung slup, Praktis, Ga ribet, tanpa jarum, tanpa peniti',45000,10,1.00,'2020-02-13','202013053428FB_IMG_1581467288614.jpg',0,0),(28,15,'Fatimah','Fatimah','Hijab instan langsung slup, Praktis, Ga ribet, tanpa jarum, tanpa peniti',65000,30,2.00,'2020-02-13','202013053624FB_IMG_1581467384180.jpg',0,0),(29,15,'Umi','Umi','Hijab instan langsung slup, Praktis, Ga ribet, tanpa jarum, tanpa peniti',70000,5,1.00,'2020-02-13','202013053733FB_IMG_1581467404471.jpg',0,0),(30,15,'Fatimah','Fatimah','Hijab instan langsung slup, Praktis, Ga ribet, tanpa jarum, tanpa peniti',90000,3,1.00,'2020-02-13','202013054351FB_IMG_1581468468919.jpg',0,0),(31,15,'Aisyah','Aisyah','Hijab instan langsung slup, Praktis, Ga ribet, tanpa jarum, tanpa peniti',75000,5,1.00,'2020-02-13','202013054453FB_IMG_1581468645344.jpg',0,0),(32,17,'Bros Umi','Bros Umi','Kuat, Anti Karat, Simple, Awet',30000,19,1.00,'2020-02-13','202013054555FB_IMG_1581468411032.jpg',0,0),(33,17,'Bros Umi','Bros Umi','Kuat, Anti Karat, Simple, Awet',35000,5,1.00,'2020-02-13','202013054651FB_IMG_1581468408997.jpg',0,0),(34,17,'Bros Al','Bros Al','Kuat, Anti Karat, Simple, Awet',30000,5,1.00,'2020-02-13','202013054750FB_IMG_1581468406998.jpg',0,0),(35,17,'Bros Alif','Bros Alif','Kuat, Anti Karat, Simple, Awet',35000,2,1.00,'2020-02-13','202013054859FB_IMG_1581468404781.jpg',0,0),(36,17,'Bros Al','Bros Al','Kuat, Anti Karat, Simple, Awet',30000,3,1.00,'2020-02-13','202013055011FB_IMG_1581468402529.jpg',0,0),(37,17,'Bros Alif','Bros Alif','Kuat, Anti Karat, Simple, Awet',75000,8,1.00,'2020-02-13','202013055225FB_IMG_1581468400182.jpg',0,0),(38,17,'Bros Al','Bros Al','Kuat, Anti Karat, Simple, Awet',30000,8,1.00,'2020-02-13','202013055330FB_IMG_1581468398060.jpg',0,0),(39,15,'Fatimah','Fatimah','Hijab instan langsung slup, Praktis, Ga ribet, tanpa jarum, tanpa peniti',25000,2,1.00,'2020-02-13','202013123547FB_IMG_1581467412756.jpg',0,0);

#
# Structure for table "users"
#

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `no_hp` varchar(13) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `level` varchar(255) NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

#
# Data for table "users"
#

INSERT INTO `users` VALUES (1,'hhhh','hhh@gmail.com','839787a428a626a79586f23b998d7434','','','admin'),(6,'amanah','sugierpl@yahoo.com','7743900015b6b880f6c937b10780acc2','','','user'),(7,'amanah','cumicumie@gmail.com','cbf470e02455c01904e5332956d35ff8','','','user'),(20,'test','cumicumie8@gmail.com','e10adc3949ba59abbe56e057f20f883e','085','qwerty','user');

#
# Structure for table "orders"
#

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id_orders` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `nama_kustomer` varchar(255) NOT NULL DEFAULT '',
  `alamat` text NOT NULL,
  `telpon` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `status_order` varchar(255) NOT NULL DEFAULT 'Baru',
  `kota` varchar(255) NOT NULL DEFAULT '',
  `subtotal` int(11) NOT NULL DEFAULT '0',
  `ongkir` int(11) NOT NULL DEFAULT '0',
  `kurir` varchar(255) NOT NULL DEFAULT '',
  `total` int(11) NOT NULL DEFAULT '0',
  `resi` varchar(255) DEFAULT NULL,
  `tgl_orders` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id_orders`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

#
# Data for table "orders"
#

INSERT INTO `orders` VALUES (1,20,'test','qwerty','085','cumicumie8@gmail.com','Diterima','Tulang Bawang Barat',155000,41000,'jne',196000,'17295958718','2020-09-20'),(2,20,'test','qwerty','085','cumicumie8@gmail.com','Pending','Seram Bagian Timur',25000,94000,'jne',119000,'','2020-09-20');

#
# Structure for table "order_detail"
#

DROP TABLE IF EXISTS `order_detail`;
CREATE TABLE `order_detail` (
  `id_order_detail` int(11) NOT NULL AUTO_INCREMENT,
  `orders_id` int(11) NOT NULL DEFAULT '0',
  `produk_id` int(11) NOT NULL DEFAULT '0',
  `harga` varchar(255) NOT NULL DEFAULT '',
  `berat` double(8,2) DEFAULT NULL,
  `jumlah` int(11) NOT NULL DEFAULT '0',
  `subberat` int(11) NOT NULL DEFAULT '0',
  `subharga` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_order_detail`),
  KEY `orders_id` (`orders_id`),
  KEY `produk_id` (`produk_id`),
  CONSTRAINT `orders_id` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`id_orders`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `produk_id` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "order_detail"
#

INSERT INTO `order_detail` VALUES (1,1,39,'25000',1.00,5,5,125000),(2,1,38,'30000',1.00,1,1,30000),(3,2,39,'25000',1.00,1,1,25000);
