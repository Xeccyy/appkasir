
-- Database Backup --
-- Ver. : 1.0.1
-- Host : Server Host
-- Generating Time : Jan 26, 2024 at 09:21:53:AM


CREATE TABLE `detailpenjualan` (
  `DetailID` int(11) NOT NULL AUTO_INCREMENT,
  `PenjualanID` int(11) NOT NULL,
  `ProdukID` int(11) NOT NULL,
  `JumlahProduk` int(11) NOT NULL,
  `Harga` decimal(10,2) NOT NULL,
  PRIMARY KEY (`DetailID`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO detailpenjualan VALUES
("1","1","5","1","3500.00"),
("2","1","6","1","30000.00"),
("3","1","7","1","12000.00"),
("4","1","8","1","20000.00"),
("5","1","9","1","25000.00"),
("6","2","5","1","3500.00"),
("7","2","6","1","30000.00"),
("8","2","7","1","12000.00"),
("9","2","8","1","20000.00"),
("10","2","9","1","25000.00"),
("11","3","14","1","30000.00"),
("12","3","13","1","30000.00"),
("13","3","12","1","15000.00"),
("14","3","11","1","15000.00"),
("15","3","10","1","15000.00"),
("16","4","15","1","40000.00"),
("17","4","6","1","30000.00"),
("18","4","9","1","25000.00"),
("19","4","11","1","15000.00"),
("20","4","12","1","15000.00"),
("21","5","24","1","4000.00"),
("22","5","19","1","40000.00"),
("23","5","18","1","25000.00"),
("24","5","5","1","3500.00"),
("25","5","8","1","20000.00"),
("27","7","5","5","3500.00"),
("28","7","7","2","12000.00"),
("29","8","8","3","20000.00");

CREATE TABLE `keranjang` (
  `KeranjangID` int(10) NOT NULL AUTO_INCREMENT,
  `ProdukID` int(10) NOT NULL,
  `Jumlah` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  PRIMARY KEY (`KeranjangID`)
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO keranjang VALUES
("106","6","1","1");

CREATE TABLE `pelanggan` (
  `PelangganID` int(11) NOT NULL AUTO_INCREMENT,
  `NamaPelanggan` varchar(255) NOT NULL,
  `Alamat` text NOT NULL,
  `NomorTelepon` varchar(15) NOT NULL,
  PRIMARY KEY (`PelangganID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO pelanggan VALUES
("1","Umum","Umum","000000"),
("2","Dewa Abimayu","Jalan Arjuna II No 2","085738014582"),
("3","Andi Perayoga","Jln Kerobokan Banjar Anyar","087860635630"),
("4","Zaid Assya","Jln Tegal Dukuh Selatan","085738910245"),
("5","Cahyo Yehuda","Jalan Gunung Andakasa","085677453667"),
("6","Chelsea Widyadari","Jln Asemang Kangin Tibubeneng","081234542784");

CREATE TABLE `penjualan` (
  `PenjualanID` int(11) NOT NULL AUTO_INCREMENT,
  `TanggalPenjualan` date NOT NULL,
  `TotalHarga` decimal(10,2) NOT NULL,
  `PelangganID` int(11) NOT NULL,
  PRIMARY KEY (`PenjualanID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO penjualan VALUES
("1","2024-01-18","90500.00","1"),
("2","2024-01-18","90500.00","3"),
("3","2024-01-18","105000.00","4"),
("4","2024-01-18","125000.00","5"),
("5","2024-01-18","92500.00","6"),
("7","2024-01-25","41500.00","3"),
("8","2024-01-25","60000.00","6");

CREATE TABLE `produk` (
  `ProdukID` int(11) NOT NULL AUTO_INCREMENT,
  `Barcode` varchar(25) NOT NULL,
  `NamaProduk` varchar(255) NOT NULL,
  `Harga` decimal(10,2) NOT NULL,
  `Stok` int(11) NOT NULL,
  PRIMARY KEY (`ProdukID`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO produk VALUES
("5","8996001523216","Mie Instant Ayam Bawang","3500.00","15"),
("6","7118441101378","ABC KECAP MANIS POUCH 600","30000.00","10"),
("7","8991002101654","ABC KOPI SUSU BAG 20X32G","12000.00","14"),
("8","711844330207","ABC MACKEREL TOMATO 155GR","20000.00","15"),
("9","711844120013","ABC SAMBAL ASLI 340ML","25000.00","12"),
("10","711844120075","ABC SAMBAL EXTRA PEDAS 415","15000.00","14"),
("11","711844120099","ABC SAMBAL MANIS PEDAS 41","15000.00","15"),
("12","711844130012","ABC TOMATO KETCHUP 340ML","15000.00","15"),
("13","9415007006329","ANLENE MILK ACTIFIT 600 G","30000.00","19"),
("14","9415007006329","ANLENE MILK GOLD 51+ 600 ","30000.00","20"),
("15","8993169762051","AYAM JAGO BERAS WANGI BIRU 5 KG","40000.00","15"),
("16","8999999715250","CLEAR MAN SHAMPOO ACTIV 180 ML","32000.00","15"),
("17","8991111112114","CLEAN&CLEAR ACNE CLEARING CLEANSER 100G","34000.00","13"),
("18","8993989311699","CLAS MILD ROKOK KRETEK 16S","25000.00","13"),
("19","8999999717858","CITRA BODY LOTION WHITE 120ML","40000.00","13"),
("20","8999999711849","CITRA BODY LOTION MANGIR 120ML","42000.00","18"),
("21","089686598315","CHITATO PLAIN SALT 19GR","12000.00","23"),
("22","089686598056","CHITATO BEEF BBQ 75GR","23000.00","13"),
("23","089686590135","CHIKI BALLS CHICKEN 12 G","5000.00","15"),
("24","089686600247","CHEETOS ROASTED CORN 48GR","4000.00","12"),
("25","8999999717858","CITRA BODY LOTION WHITE 120ML","12000.00","12");

CREATE TABLE `user` (
  `id_user` int(18) NOT NULL AUTO_INCREMENT,
  `nama` varchar(225) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `hak_akses` int(1) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO user VALUES
("1","Dewa","xeccy","admin","1"),
("5","Abimayu","admin1","admin1","2");