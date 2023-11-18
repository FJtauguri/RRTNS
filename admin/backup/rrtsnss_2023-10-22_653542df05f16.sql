

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `confirm_password` varchar(100) NOT NULL,
  `admin_image` varchar(100) NOT NULL,
  `admin_type` varchar(100) NOT NULL,
  `admin_added` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO admin VALUES("1","Jane","M.","Doe","admin","admin","admin","","Admin","2015-09-05 11:40:50","0");
INSERT INTO admin VALUES("2","John","J.","Doe","encoder","encoder","encoder","","Encoder","2015-09-29 11:40:50","0");
INSERT INTO admin VALUES("3","Anonymous","Anonymous","Anonymous","anonymous","anonymous","anonymous","","Encoder","2015-11-25 15:21:01","1");



CREATE TABLE `allowed_book` (
  `allowed_book_id` int(11) NOT NULL AUTO_INCREMENT,
  `qntty_books` int(11) NOT NULL,
  PRIMARY KEY (`allowed_book_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO allowed_book VALUES("1","3");



CREATE TABLE `allowed_days` (
  `allowed_days_id` int(11) NOT NULL AUTO_INCREMENT,
  `no_of_days` int(11) NOT NULL,
  PRIMARY KEY (`allowed_days_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO allowed_days VALUES("1","3");



CREATE TABLE `barcode` (
  `barcode_id` int(11) NOT NULL AUTO_INCREMENT,
  `pre_barcode` varchar(100) NOT NULL,
  `mid_barcode` int(100) NOT NULL,
  `suf_barcode` varchar(100) NOT NULL,
  PRIMARY KEY (`barcode_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO barcode VALUES("1","VNHS","1","LMS");
INSERT INTO barcode VALUES("2","VNHS","2","LMS");
INSERT INTO barcode VALUES("3","VNHS","3","LMS");
INSERT INTO barcode VALUES("4","VNHS","4","LMS");
INSERT INTO barcode VALUES("5","VNHS","5","LMS");
INSERT INTO barcode VALUES("6","VNHS","6","LMS");
INSERT INTO barcode VALUES("7","VNHS","7","LMS");
INSERT INTO barcode VALUES("8","VNHS","8","LMS");
INSERT INTO barcode VALUES("9","VNHS","9","LMS");
INSERT INTO barcode VALUES("10","VNHS","10","LMS");
INSERT INTO barcode VALUES("11","VNHS","11","LMS");
INSERT INTO barcode VALUES("12","VNHS","12","LMS");
INSERT INTO barcode VALUES("13","VNHS","13","LMS");
INSERT INTO barcode VALUES("14","VNHS","13","LMS");
INSERT INTO barcode VALUES("15","VNHS","14","LMS");
INSERT INTO barcode VALUES("16","RRTS","15","NSH");



CREATE TABLE `book` (
  `book_id` int(11) NOT NULL AUTO_INCREMENT,
  `book_title` varchar(100) NOT NULL,
  `category_id` int(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `author_2` varchar(100) NOT NULL,
  `author_3` varchar(100) NOT NULL,
  `author_4` varchar(100) NOT NULL,
  `author_5` varchar(100) NOT NULL,
  `book_copies` int(11) NOT NULL,
  `book_pub` varchar(100) NOT NULL,
  `publisher_name` varchar(100) NOT NULL,
  `isbn` varchar(50) NOT NULL,
  `copyright_year` int(11) NOT NULL,
  `status` varchar(30) NOT NULL,
  `book_barcode` varchar(100) NOT NULL,
  `book_image` varchar(100) NOT NULL,
  `date_added` datetime NOT NULL,
  `remarks` varchar(100) NOT NULL,
  PRIMARY KEY (`book_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO book VALUES("1","English Expressways : Second Year","1","Virginia F. Bermudez","Remedios F. Nery","Josephine M. Cruz","Milagrosa A. San Juan","","15","2010","SD Publications, INC.","978-971-0315-72-7","2010","Old","VNHS1LMS","IMG_0019.JPG","2015-12-14 01:06:46","Available");
INSERT INTO book VALUES("2","DAYBOOK of Critical Reading and Writing","8","Fran Claggett","Louann Reid","Ruth Vinz","","","20","1978","Doubleday Canada Limited","0-669-46432-5","1978","Old","VNHS2LMS","IMG_0006 - Copy.JPG","2015-12-14 01:11:06","Available");
INSERT INTO book VALUES("3","Getting to Know-Puerto Rico","2","Frances Robins","","","","","1","Coward-McCann","1967","","0","Old","VNHS3LMS","","2015-12-14 01:21:47","Available");
INSERT INTO book VALUES("4","Lotta on Troublemaker Street","2","Astrid Lindgren","","","","","0","Aladdin Paperbacks","2001","0-689-84673-8","1962","Replacement","VNHS4LMS","","2015-12-14 01:43:06","Not Available");
INSERT INTO book VALUES("5","Great Days of Whailing","8","Henry Beetle Hough","","","","","1","","","","0","Damaged","VNHS5LMS","","2015-12-14 02:05:16","Not Available");
INSERT INTO book VALUES("6","Even Big Guys Cry","2","Alex Karras","","","","","1","","","","0","Lost","VNHS6LMS","","2015-12-14 02:05:47","Not Available");
INSERT INTO book VALUES("7","Gintong Pamana Wika at Panitikan - Ikalawang Taon","6","Lolita R. Nakpil","Leticia F. Dominguez","","","","12","2000","SD Publications, INC.","971-07-1885-1","2000","Old","VNHS7LMS","IMG_0029 - Copy.JPG","2015-12-14 02:20:36","Available");
INSERT INTO book VALUES("8","test","4","Author 1","Author 2","","","","1","Publication","Publisher","ISBN ","0","New","VNHS8LMS","s1 - Copy - Copy (4).jpg","2023-09-30 11:35:46","Available");
INSERT INTO book VALUES("9","Noli","2","Jose Rizal","","","","","8","2000","Department of education","none","0","New","VNHS10LMS","","2023-09-30 11:50:44","Available");
INSERT INTO book VALUES("10","Noli","2","Jose Rizal","","","","","8","2000","Department of education","none","0","New","VNHS11LMS","","2023-09-30 11:51:10","Available");
INSERT INTO book VALUES("11","Noli","2","Jose Rizal","","","","","7","2000","Department of education","none","0","New","VNHS12LMS","","2023-09-30 11:51:57","Available");
INSERT INTO book VALUES("12","q","5","q","","","","","1","","","q","0","Lost","VNHS13LMS","","2023-10-15 20:03:31","Not Available");
INSERT INTO book VALUES("13","q","5","q","","","","","1","","","q","0","Lost","VNHS13LMS","","2023-10-15 20:05:04","Not Available");
INSERT INTO book VALUES("14","ss","3","ss","","","","","2","","","ss","0","Old","VNHS14LMS","","2023-10-15 20:05:29","Available");
INSERT INTO book VALUES("15","qwe","5","qwe","","","","","2","","","qwe","0","Old","RRTS15NSH","","2023-10-15 20:06:14","Available");



CREATE TABLE `borrow_book` (
  `borrow_book_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `date_borrowed` datetime NOT NULL,
  `due_date` datetime NOT NULL,
  `date_returned` datetime NOT NULL,
  `borrowed_status` varchar(100) NOT NULL,
  `book_penalty` varchar(100) NOT NULL,
  PRIMARY KEY (`borrow_book_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO borrow_book VALUES("1","2","7","2015-11-14 02:50:27","2015-11-17 02:50:27","2015-12-14 02:57:34","returned","27");
INSERT INTO borrow_book VALUES("2","1","7","2015-11-14 02:50:58","2015-11-17 02:50:58","2015-12-14 02:57:37","returned","27");
INSERT INTO borrow_book VALUES("3","4","7","2015-12-14 02:51:59","2015-12-17 02:51:59","2015-12-14 02:57:45","returned","No Penalty");
INSERT INTO borrow_book VALUES("4","4","3","2015-12-14 02:53:15","2015-12-17 02:53:15","2015-12-14 02:57:48","returned","No Penalty");
INSERT INTO borrow_book VALUES("5","17","7","2015-12-14 03:08:49","2015-12-17 03:08:49","0000-00-00 00:00:00","borrowed","");
INSERT INTO borrow_book VALUES("6","4","7","2015-12-14 03:08:59","2015-12-17 03:08:59","0000-00-00 00:00:00","borrowed","");
INSERT INTO borrow_book VALUES("7","20","7","2015-12-14 03:09:07","2015-12-17 03:09:07","0000-00-00 00:00:00","borrowed","");
INSERT INTO borrow_book VALUES("8","14","4","2015-12-14 08:32:14","2015-12-17 08:32:14","0000-00-00 00:00:00","borrowed","");
INSERT INTO borrow_book VALUES("9","41","11","2023-10-15 00:07:17","2023-10-18 00:07:17","0000-00-00 00:00:00","borrowed","");



CREATE TABLE `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `classname` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`category_id`),
  UNIQUE KEY `category_id` (`category_id`),
  KEY `classid` (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=801 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO category VALUES("1","Textbook");
INSERT INTO category VALUES("2","English");
INSERT INTO category VALUES("3","Math");
INSERT INTO category VALUES("4","Science");
INSERT INTO category VALUES("5","Encyclopedia");
INSERT INTO category VALUES("6","Filipiniana");
INSERT INTO category VALUES("7","Novel");
INSERT INTO category VALUES("8","General");
INSERT INTO category VALUES("9","References");



CREATE TABLE `penalty` (
  `penalty_id` int(11) NOT NULL AUTO_INCREMENT,
  `penalty_amount` int(11) NOT NULL,
  PRIMARY KEY (`penalty_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO penalty VALUES("1","1");



CREATE TABLE `report` (
  `report_id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `detail_action` varchar(100) NOT NULL,
  `date_transaction` datetime NOT NULL,
  PRIMARY KEY (`report_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO report VALUES("1","7","2","Jane M. Doe","Borrowed Book","2015-12-14 02:50:30");
INSERT INTO report VALUES("2","7","1","Jane M. Doe","Borrowed Book","2015-12-14 02:51:00");
INSERT INTO report VALUES("3","7","4","Jane M. Doe","Borrowed Book","2015-12-14 02:52:01");
INSERT INTO report VALUES("4","3","4","Jane M. Doe","Borrowed Book","2015-12-14 02:53:16");
INSERT INTO report VALUES("5","7","2","Jane M. Doe","Returned Book","2015-12-14 02:57:34");
INSERT INTO report VALUES("6","7","1","Jane M. Doe","Returned Book","2015-12-14 02:57:37");
INSERT INTO report VALUES("7","7","4","Jane M. Doe","Returned Book","2015-12-14 02:57:45");
INSERT INTO report VALUES("8","3","4","Jane M. Doe","Returned Book","2015-12-14 02:57:48");
INSERT INTO report VALUES("9","7","17","Jane M. Doe","Borrowed Book","2015-12-14 03:08:51");
INSERT INTO report VALUES("10","7","4","Jane M. Doe","Borrowed Book","2015-12-14 03:09:01");
INSERT INTO report VALUES("11","7","20","Jane M. Doe","Borrowed Book","2015-12-14 03:09:08");
INSERT INTO report VALUES("12","4","14","Jane M. Doe","Borrowed Book","2015-12-14 08:32:16");
INSERT INTO report VALUES("13","11","41","Jane M. Doe","Borrowed Book","2023-10-15 00:07:19");



CREATE TABLE `return_book` (
  `return_book_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `date_borrowed` datetime NOT NULL,
  `due_date` datetime NOT NULL,
  `date_returned` datetime NOT NULL,
  `book_penalty` varchar(100) NOT NULL,
  PRIMARY KEY (`return_book_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO return_book VALUES("1","2","7","2015-11-14 02:50:27","2015-11-17 02:50:27","2015-12-14 02:57:31","27");
INSERT INTO return_book VALUES("2","1","7","2015-11-14 02:50:58","2015-11-17 02:50:58","2015-12-14 02:57:30","27");
INSERT INTO return_book VALUES("3","4","7","2015-12-14 02:51:59","2015-12-17 02:51:59","2015-12-13 02:57:29","No Penalty");
INSERT INTO return_book VALUES("4","4","3","2015-12-14 02:53:15","2015-12-17 02:53:15","2015-12-14 02:57:45","No Penalty");



CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `school_number` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL,
  `section` varchar(100) NOT NULL,
  `user_image` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `user_added` datetime NOT NULL,
  `status2` int(11) NOT NULL DEFAULT 0,
  `password` varchar(256) NOT NULL DEFAULT 'default123',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;




CREATE TABLE `user_log` (
  `user_log_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `date_log` datetime NOT NULL,
  PRIMARY KEY (`user_log_id`)
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO user_log VALUES("1","19","MARY BERYL TULMO LUMAPAN","2015-12-14 08:33:56");
INSERT INTO user_log VALUES("2","40","CRISTALLY MALAPITAN ANIAN","2015-12-14 08:39:11");
INSERT INTO user_log VALUES("3","1","KERVIN KARL OSORIO CABUS","2015-12-14 10:35:20");
INSERT INTO user_log VALUES("4","7","ANDRIA CASIANO PIT","2015-12-14 10:36:12");
INSERT INTO user_log VALUES("5","10","REGINE DOMINGUEZ SALANATIN","2015-12-14 10:36:29");
INSERT INTO user_log VALUES("6","18","ROZEL CHILES PALMA JANDOG","2015-12-14 10:37:03");
INSERT INTO user_log VALUES("7","3","GERALD MANOSO PELINGON","2015-12-14 10:37:23");
INSERT INTO user_log VALUES("8","8","ANGELA CASTILLO REJAS","2015-12-14 10:37:26");
INSERT INTO user_log VALUES("9","17","CRISTY GAYLE CADAYDAY GOSIAOCO","2015-12-14 10:37:38");
INSERT INTO user_log VALUES("10","9","ROWELA UNTAL ROGERO","2015-12-14 10:38:05");
INSERT INTO user_log VALUES("11","17","CRISTY GAYLE CADAYDAY GOSIAOCO","2015-12-14 10:38:29");
INSERT INTO user_log VALUES("12","16","RATCHEL YANOS GALVAN","2015-12-14 10:38:29");
INSERT INTO user_log VALUES("13","15","REYNAN DATULAYTA GABALES","2015-12-14 10:38:34");
INSERT INTO user_log VALUES("14","12","SUNDAY HECHANOVA FELIPE","2015-12-14 10:38:37");
INSERT INTO user_log VALUES("15","12","SUNDAY HECHANOVA FELIPE","2015-12-14 10:38:48");
INSERT INTO user_log VALUES("16","9","ROWELA UNTAL ROGERO","2015-12-14 10:38:56");
INSERT INTO user_log VALUES("17","7","ANDRIA CASIANO PIT","2015-12-14 10:39:01");
INSERT INTO user_log VALUES("18","5","JAN MICHAEL ALABE PORCEL","2015-12-14 10:39:04");
INSERT INTO user_log VALUES("19","5","JAN MICHAEL ALABE PORCEL","2015-12-14 10:39:06");
INSERT INTO user_log VALUES("20","17","CRISTY GAYLE CADAYDAY GOSIAOCO","2015-12-14 10:40:34");
INSERT INTO user_log VALUES("21","16","RATCHEL YANOS GALVAN","2015-12-14 10:40:39");
INSERT INTO user_log VALUES("22","15","REYNAN DATULAYTA GABALES","2015-12-14 10:40:45");
INSERT INTO user_log VALUES("23","14","CHRISTOPHER ARGUELLES FRIAS","2015-12-14 10:40:51");
INSERT INTO user_log VALUES("24","14","CHRISTOPHER ARGUELLES FRIAS","2015-12-14 10:41:01");
INSERT INTO user_log VALUES("25","25","JOEZER COLENE LEGIRO GALIMBA","2015-12-14 10:41:08");
INSERT INTO user_log VALUES("26","18","ROZEL CHILES PALMA JANDOG","2015-12-14 10:41:16");
INSERT INTO user_log VALUES("27","20","REGINA MARIE DELAPER MACHAN","2015-12-14 10:41:20");
INSERT INTO user_log VALUES("28","19","MARY BERYL TULMO LUMAPAN","2015-12-14 10:41:21");
INSERT INTO user_log VALUES("29","20","REGINA MARIE DELAPER MACHAN","2015-12-14 10:41:22");
INSERT INTO user_log VALUES("30","23","MARK ANGELO BOJOS CAMACHO","2015-12-14 10:41:28");
INSERT INTO user_log VALUES("31","23","MARK ANGELO BOJOS CAMACHO","2015-12-14 10:41:29");
INSERT INTO user_log VALUES("32","24","RGEE LOUIZE ESTARES DELIMA","2015-12-14 10:41:29");
INSERT INTO user_log VALUES("33","22","KENNETH JUANEZA BENIT","2015-12-14 10:41:31");
INSERT INTO user_log VALUES("34","19","MARY BERYL TULMO LUMAPAN","2015-12-14 10:41:32");
INSERT INTO user_log VALUES("35","18","ROZEL CHILES PALMA JANDOG","2015-12-14 10:41:32");
INSERT INTO user_log VALUES("36","13","JOEMAR MENDOZA FRANCISCO","2015-12-14 10:41:37");
INSERT INTO user_log VALUES("37","11","JOHN MARK PAMPLIEGA CASTEN","2015-12-14 10:41:41");
INSERT INTO user_log VALUES("38","10","REGINE DOMINGUEZ SALANATIN","2015-12-14 10:41:45");
INSERT INTO user_log VALUES("39","10","REGINE DOMINGUEZ SALANATIN","2015-12-14 10:41:48");
INSERT INTO user_log VALUES("40","10","REGINE DOMINGUEZ SALANATIN","2015-12-14 10:41:50");
INSERT INTO user_log VALUES("41","25","JOEZER COLENE LEGIRO GALIMBA","2015-12-14 10:42:06");
INSERT INTO user_log VALUES("42","26","JULIAH ARANGOTE ABEDONG","2015-12-14 10:42:07");
INSERT INTO user_log VALUES("43","19","MARY BERYL TULMO LUMAPAN","2015-12-14 10:42:11");
INSERT INTO user_log VALUES("44","19","MARY BERYL TULMO LUMAPAN","2015-12-14 10:42:16");
INSERT INTO user_log VALUES("45","23","MARK ANGELO BOJOS CAMACHO","2015-12-14 10:42:22");
INSERT INTO user_log VALUES("46","21","MARLON GAJO BALANGAO","2015-12-14 10:43:00");
INSERT INTO user_log VALUES("47","18","ROZEL CHILES PALMA JANDOG","2015-12-14 10:43:48");
INSERT INTO user_log VALUES("48","18","ROZEL CHILES PALMA JANDOG","2015-12-14 10:43:55");
INSERT INTO user_log VALUES("49","20","REGINA MARIE DELAPER MACHAN","2015-12-14 10:44:01");
INSERT INTO user_log VALUES("50","25","JOEZER COLENE LEGIRO GALIMBA","2015-12-14 10:44:07");
INSERT INTO user_log VALUES("51","23","MARK ANGELO BOJOS CAMACHO","2015-12-14 10:44:25");
INSERT INTO user_log VALUES("52","23","MARK ANGELO BOJOS CAMACHO","2015-12-14 10:44:27");
INSERT INTO user_log VALUES("53","23","MARK ANGELO BOJOS CAMACHO","2015-12-14 10:44:32");
INSERT INTO user_log VALUES("54","28","NICOLE ANN PAGSUBERON ABILGOS","2015-12-14 11:05:19");
INSERT INTO user_log VALUES("55","35","RALPH JERO CENTINO DEMERIN","2015-12-14 11:05:22");
INSERT INTO user_log VALUES("56","28","NICOLE ANN PAGSUBERON ABILGOS","2015-12-14 11:05:28");
INSERT INTO user_log VALUES("57","28","NICOLE ANN PAGSUBERON ABILGOS","2015-12-14 11:09:11");
INSERT INTO user_log VALUES("58","32","JOSHUA SUICO CARPENTERO","2015-12-14 11:09:18");
INSERT INTO user_log VALUES("59","36","TRESHIA SALVANTE ABENIR","2015-12-14 11:16:09");
INSERT INTO user_log VALUES("60","38","ELLA MARIE MARTENECIO ALVAREZ","2015-12-14 11:16:13");
INSERT INTO user_log VALUES("61","38","ELLA MARIE MARTENECIO ALVAREZ","2015-12-14 11:16:15");
INSERT INTO user_log VALUES("62","37","MA THERESA MAE CORDOVA ALLES","2015-12-14 11:16:19");
INSERT INTO user_log VALUES("63","36","TRESHIA SALVANTE ABENIR","2015-12-14 11:16:48");
INSERT INTO user_log VALUES("64","38","ELLA MARIE MARTENECIO ALVAREZ","2015-12-14 11:16:50");
INSERT INTO user_log VALUES("65","39","LOVELY ANN YUBARA AMAR","2015-12-14 11:16:55");
INSERT INTO user_log VALUES("66","38","ELLA MARIE MARTENECIO ALVAREZ","2015-12-14 11:32:50");
INSERT INTO user_log VALUES("67","33","JERSON PIDO DAMPOG","2015-12-14 11:33:15");
INSERT INTO user_log VALUES("68","19","MARY BERYL TULMO LUMAPAN","2015-12-14 11:33:16");
INSERT INTO user_log VALUES("69","27","CHRISTINE MAE SALAZAR ABETO","2015-12-14 11:33:18");
INSERT INTO user_log VALUES("70","28","NICOLE ANN PAGSUBERON ABILGOS","2015-12-14 11:33:19");
INSERT INTO user_log VALUES("71","19","MARY BERYL TULMO LUMAPAN","2015-12-14 11:34:29");
INSERT INTO user_log VALUES("72","18","ROZEL CHILES PALMA JANDOG","2015-12-14 11:34:39");
INSERT INTO user_log VALUES("73","24","RGEE LOUIZE ESTARES DELIMA","2015-12-14 11:34:42");
INSERT INTO user_log VALUES("74","33","JERSON PIDO DAMPOG","2015-12-14 11:35:04");
INSERT INTO user_log VALUES("75","9","ROWELA UNTAL ROGERO","2015-12-14 11:35:21");
INSERT INTO user_log VALUES("76","5","JAN MICHAEL ALABE PORCEL","2015-12-14 11:35:24");
INSERT INTO user_log VALUES("77","33","JERSON PIDO DAMPOG","2015-12-14 11:38:01");
INSERT INTO user_log VALUES("78","33","JERSON PIDO DAMPOG","2015-12-14 11:40:11");
INSERT INTO user_log VALUES("79","30","MARNYL DUNLAO BACOLINA","2015-12-14 11:40:17");
INSERT INTO user_log VALUES("80","31","REXXER ANDREI DE LOS SANTOS BELEBER","2015-12-14 11:49:45");
INSERT INTO user_log VALUES("81","30","MARNYL DUNLAO BACOLINA","2015-12-14 11:49:50");
INSERT INTO user_log VALUES("82","33","JERSON PIDO DAMPOG","2015-12-14 11:50:45");
INSERT INTO user_log VALUES("83","28","NICOLE ANN PAGSUBERON ABILGOS","2015-12-14 11:50:56");
INSERT INTO user_log VALUES("84","29","JANESSA DOROTEO ARGUELLES","2015-12-14 11:53:03");
INSERT INTO user_log VALUES("85","20","REGINA MARIE DELAPER MACHAN","2015-12-14 13:52:30");
INSERT INTO user_log VALUES("86","34","JESS LORD ARROYO DE LA CRUZ","2015-12-14 14:11:26");
INSERT INTO user_log VALUES("87","30","MARNYL DUNLAO BACOLINA","2015-12-14 14:12:05");
INSERT INTO user_log VALUES("88","33","JERSON PIDO DAMPOG","2015-12-14 14:24:28");
INSERT INTO user_log VALUES("89","33","JERSON PIDO DAMPOG","2015-12-14 14:25:03");
INSERT INTO user_log VALUES("90","33","JERSON PIDO DAMPOG","2015-12-14 14:25:06");
INSERT INTO user_log VALUES("91","33","JERSON PIDO DAMPOG","2015-12-14 14:25:12");
INSERT INTO user_log VALUES("92","28","NICOLE ANN PAGSUBERON ABILGOS","2015-12-14 14:25:56");
INSERT INTO user_log VALUES("93","34","JESS LORD ARROYO DE LA CRUZ","2015-12-14 14:26:46");
INSERT INTO user_log VALUES("94","30","MARNYL DUNLAO BACOLINA","2015-12-14 14:26:52");
INSERT INTO user_log VALUES("95","30","MARNYL DUNLAO BACOLINA","2015-12-14 14:27:44");
INSERT INTO user_log VALUES("96","34","JESS LORD ARROYO DE LA CRUZ","2015-12-14 14:28:01");

