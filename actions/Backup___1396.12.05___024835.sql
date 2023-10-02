SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
--
-- Database: `myclassir_crm`
--




CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;


INSERT INTO category VALUES
("1","مشتریان طلایی"),
("2","مشتریان نقره ای"),
("3","مشتریان برنزی"),
("4","مشتری");




CREATE TABLE `city` (
  `id` int(12) unsigned NOT NULL AUTO_INCREMENT,
  `province_id` int(12) unsigned NOT NULL,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=441 DEFAULT CHARSET=utf8;


INSERT INTO city VALUES
("1","1","تبريز"),
("2","1","كندوان"),
("3","1","بندر شرفخانه"),
("4","1","مراغه"),
("5","1","ميانه"),
("6","1","شبستر"),
("7","1","مرند"),
("8","1","جلفا"),
("9","1","سراب"),
("10","1","هاديشهر"),
("11","1","بناب"),
("12","1","كليبر"),
("13","1","تسوج"),
("14","1","اهر"),
("15","1","هريس"),
("16","1","عجبشير"),
("17","1","هشترود"),
("18","1","ملكان"),
("19","1","بستان آباد"),
("20","1","ورزقان"),
("21","1","اسكو"),
("22","1","آذر شهر"),
("23","1","قره آغاج"),
("24","1","ممقان"),
("25","1","صوفیان"),
("26","1","ایلخچی"),
("27","1","خسروشهر"),
("28","1","باسمنج"),
("29","1","سهند"),
("30","2","اروميه"),
("31","2","نقده"),
("32","2","ماكو"),
("33","2","تكاب"),
("34","2","خوي"),
("35","2","مهاباد"),
("36","2","سر دشت"),
("37","2","چالدران"),
("38","2","بوكان"),
("39","2","مياندوآب"),
("40","2","سلماس"),
("41","2","شاهين دژ"),
("42","2","پيرانشهر"),
("43","2","سيه چشمه"),
("44","2","اشنويه"),
("45","2","چایپاره"),
("46","2","پلدشت"),
("47","2","شوط"),
("48","3","اردبيل"),
("49","3","سرعين"),
("50","3","بيله سوار"),
("51","3","پارس آباد"),
("52","3","خلخال"),
("53","3","مشگين شهر"),
("54","3","مغان"),
("55","3","نمين"),
("56","3","نير"),
("57","3","كوثر"),
("58","3","كيوي"),
("59","3","گرمي"),
("60","4","اصفهان"),
("61","4","فريدن"),
("62","4","فريدون شهر"),
("63","4","فلاورجان"),
("64","4","گلپايگان"),
("65","4","دهاقان"),
("66","4","نطنز"),
("67","4","نايين"),
("68","4","تيران"),
("69","4","كاشان"),
("70","4","فولاد شهر"),
("71","4","اردستان"),
("72","4","سميرم"),
("73","4","درچه"),
("74","4","کوهپایه"),
("75","4","مباركه"),
("76","4","شهرضا"),
("77","4","خميني شهر"),
("78","4","شاهين شهر"),
("79","4","نجف آباد"),
("80","4","دولت آباد"),
("81","4","زرين شهر"),
("82","4","آران و بيدگل"),
("83","4","باغ بهادران"),
("84","4","خوانسار"),
("85","4","مهردشت"),
("86","4","علويجه"),
("87","4","عسگران"),
("88","4","نهضت آباد"),
("89","4","حاجي آباد"),
("90","4","تودشک"),
("91","4","ورزنه"),
("92","6","ايلام"),
("93","6","مهران"),
("94","6","دهلران"),
("95","6","آبدانان"),
("96","6","شيروان چرداول"),
("97","6","دره شهر"),
("98","6","ايوان"),
("99","6","سرابله"),
("100","7","بوشهر");
INSERT INTO city VALUES
("101","7","تنگستان"),
("102","7","دشتستان"),
("103","7","دير"),
("104","7","ديلم"),
("105","7","كنگان"),
("106","7","گناوه"),
("107","7","ريشهر"),
("108","7","دشتي"),
("109","7","خورموج"),
("110","7","اهرم"),
("111","7","برازجان"),
("112","7","خارك"),
("113","7","جم"),
("114","7","کاکی"),
("115","7","عسلویه"),
("116","7","بردخون"),
("117","8","تهران"),
("118","8","ورامين"),
("119","8","فيروزكوه"),
("120","8","ري"),
("121","8","دماوند"),
("122","8","اسلامشهر"),
("123","8","رودهن"),
("124","8","لواسان"),
("125","8","بومهن"),
("126","8","تجريش"),
("127","8","فشم"),
("128","8","كهريزك"),
("129","8","پاكدشت"),
("130","8","چهاردانگه"),
("131","8","شريف آباد"),
("132","8","قرچك"),
("133","8","باقرشهر"),
("134","8","شهريار"),
("135","8","رباط كريم"),
("136","8","قدس"),
("137","8","ملارد"),
("138","9","شهركرد"),
("139","9","فارسان"),
("140","9","بروجن"),
("141","9","چلگرد"),
("142","9","اردل"),
("143","9","لردگان"),
("144","9","سامان"),
("145","10","قائن"),
("146","10","فردوس"),
("147","10","بيرجند"),
("148","10","نهبندان"),
("149","10","سربيشه"),
("150","10","طبس مسینا"),
("151","10","قهستان"),
("152","10","درمیان"),
("153","11","مشهد"),
("154","11","نيشابور"),
("155","11","سبزوار"),
("156","11","كاشمر"),
("157","11","گناباد"),
("158","11","طبس"),
("159","11","تربت حيدريه"),
("160","11","خواف"),
("161","11","تربت جام"),
("162","11","تايباد"),
("163","11","قوچان"),
("164","11","سرخس"),
("165","11","بردسكن"),
("166","11","فريمان"),
("167","11","چناران"),
("168","11","درگز"),
("169","11","كلات"),
("170","11","طرقبه"),
("171","11","سر ولایت"),
("172","12","بجنورد"),
("173","12","اسفراين"),
("174","12","جاجرم"),
("175","12","شيروان"),
("176","12","آشخانه"),
("177","12","گرمه"),
("178","12","ساروج"),
("179","13","اهواز"),
("180","13","ايرانشهر"),
("181","13","شوش"),
("182","13","آبادان"),
("183","13","خرمشهر"),
("184","13","مسجد سليمان"),
("185","13","ايذه"),
("186","13","شوشتر"),
("187","13","انديمشك"),
("188","13","سوسنگرد"),
("189","13","هويزه"),
("190","13","دزفول"),
("191","13","شادگان"),
("192","13","بندر ماهشهر"),
("193","13","بندر امام خميني"),
("194","13","اميديه"),
("195","13","بهبهان"),
("196","13","رامهرمز"),
("197","13","باغ ملك"),
("198","13","هنديجان"),
("199","13","لالي"),
("200","13","رامشیر");
INSERT INTO city VALUES
("201","13","حمیدیه"),
("202","13","دغاغله"),
("203","13","ملاثانی"),
("204","13","شادگان"),
("205","13","ویسی"),
("206","14","زنجان"),
("207","14","ابهر"),
("208","14","خدابنده"),
("209","14","طارم"),
("210","14","ماهنشان"),
("211","14","خرمدره"),
("212","14","ايجرود"),
("213","14","زرين آباد"),
("214","14","آب بر"),
("215","14","قيدار"),
("216","15","سمنان"),
("217","15","شاهرود"),
("218","15","گرمسار"),
("219","15","ايوانكي"),
("220","15","دامغان"),
("221","15","بسطام"),
("222","16","زاهدان"),
("223","16","چابهار"),
("224","16","خاش"),
("225","16","سراوان"),
("226","16","زابل"),
("227","16","سرباز"),
("228","16","نيكشهر"),
("229","16","ايرانشهر"),
("230","16","راسك"),
("231","16","ميرجاوه"),
("232","17","شيراز"),
("233","17","اقليد"),
("234","17","داراب"),
("235","17","فسا"),
("236","17","مرودشت"),
("237","17","خرم بيد"),
("238","17","آباده"),
("239","17","كازرون"),
("240","17","ممسني"),
("241","17","سپيدان"),
("242","17","لار"),
("243","17","فيروز آباد"),
("244","17","جهرم"),
("245","17","ني ريز"),
("246","17","استهبان"),
("247","17","لامرد"),
("248","17","مهر"),
("249","17","حاجي آباد"),
("250","17","نورآباد"),
("251","17","اردكان"),
("252","17","صفاشهر"),
("253","17","ارسنجان"),
("254","17","قيروكارزين"),
("255","17","سوريان"),
("256","17","فراشبند"),
("257","17","سروستان"),
("258","17","ارژن"),
("259","17","گويم"),
("260","17","داريون"),
("261","17","زرقان"),
("262","17","خان زنیان"),
("263","17","کوار"),
("264","17","ده بید"),
("265","17","باب انار/خفر"),
("266","17","بوانات"),
("267","17","خرامه"),
("268","17","خنج"),
("269","17","سیاخ دارنگون"),
("270","18","قزوين"),
("271","18","تاكستان"),
("272","18","آبيك"),
("273","18","بوئين زهرا"),
("274","19","قم"),
("275","5","طالقان"),
("276","5","نظرآباد"),
("277","5","اشتهارد"),
("278","5","هشتگرد"),
("279","5","كن"),
("280","5","آسارا"),
("281","5","شهرک گلستان"),
("282","5","اندیشه"),
("283","5","كرج"),
("284","5","نظر آباد"),
("285","5","گوهردشت"),
("286","5","ماهدشت"),
("287","5","مشکین دشت"),
("288","20","سنندج"),
("289","20","ديواندره"),
("290","20","بانه"),
("291","20","بيجار"),
("292","20","سقز"),
("293","20","كامياران"),
("294","20","قروه"),
("295","20","مريوان"),
("296","20","صلوات آباد"),
("297","20","حسن آباد"),
("298","21","كرمان"),
("299","21","راور"),
("300","21","بابك");
INSERT INTO city VALUES
("301","21","انار"),
("302","21","کوهبنان"),
("303","21","رفسنجان"),
("304","21","بافت"),
("305","21","سيرجان"),
("306","21","كهنوج"),
("307","21","زرند"),
("308","21","بم"),
("309","21","جيرفت"),
("310","21","بردسير"),
("311","22","كرمانشاه"),
("312","22","اسلام آباد غرب"),
("313","22","سر پل ذهاب"),
("314","22","كنگاور"),
("315","22","سنقر"),
("316","22","قصر شيرين"),
("317","22","گيلان غرب"),
("318","22","هرسين"),
("319","22","صحنه"),
("320","22","پاوه"),
("321","22","جوانرود"),
("322","22","شاهو"),
("323","23","ياسوج"),
("324","23","گچساران"),
("325","23","دنا"),
("326","23","دوگنبدان"),
("327","23","سي سخت"),
("328","23","دهدشت"),
("329","23","ليكك"),
("330","24","گرگان"),
("331","24","آق قلا"),
("332","24","گنبد كاووس"),
("333","24","علي آباد كتول"),
("334","24","مينو دشت"),
("335","24","تركمن"),
("336","24","كردكوي"),
("337","24","بندر گز"),
("338","24","كلاله"),
("339","24","آزاد شهر"),
("340","24","راميان"),
("341","25","رشت"),
("342","25","منجيل"),
("343","25","لنگرود"),
("344","25","رود سر"),
("345","25","تالش"),
("346","25","آستارا"),
("347","25","ماسوله"),
("348","25","آستانه اشرفيه"),
("349","25","رودبار"),
("350","25","فومن"),
("351","25","صومعه سرا"),
("352","25","بندرانزلي"),
("353","25","كلاچاي"),
("354","25","هشتپر"),
("355","25","رضوان شهر"),
("356","25","ماسال"),
("357","25","شفت"),
("358","25","سياهكل"),
("359","25","املش"),
("360","25","لاهیجان"),
("361","25","خشک بيجار"),
("362","25","خمام"),
("363","25","لشت نشا"),
("364","25","بندر کياشهر"),
("365","26","خرم آباد"),
("366","26","ماهشهر"),
("367","26","دزفول"),
("368","26","بروجرد"),
("369","26","دورود"),
("370","26","اليگودرز"),
("371","26","ازنا"),
("372","26","نور آباد"),
("373","26","كوهدشت"),
("374","26","الشتر"),
("375","26","پلدختر"),
("376","27","ساري"),
("377","27","آمل"),
("378","27","بابل"),
("379","27","بابلسر"),
("380","27","بهشهر"),
("381","27","تنكابن"),
("382","27","جويبار"),
("383","27","چالوس"),
("384","27","رامسر"),
("385","27","سواد كوه"),
("386","27","قائم شهر"),
("387","27","نكا"),
("388","27","نور"),
("389","27","بلده"),
("390","27","نوشهر"),
("391","27","پل سفيد"),
("392","27","محمود آباد"),
("393","27","فريدون كنار"),
("394","28","اراك"),
("395","28","آشتيان"),
("396","28","تفرش"),
("397","28","خمين"),
("398","28","دليجان"),
("399","28","ساوه"),
("400","28","سربند");
INSERT INTO city VALUES
("401","28","محلات"),
("402","28","شازند"),
("403","29","بندرعباس"),
("404","29","قشم"),
("405","29","كيش"),
("406","29","بندر لنگه"),
("407","29","بستك"),
("408","29","حاجي آباد"),
("409","29","دهبارز"),
("410","29","انگهران"),
("411","29","ميناب"),
("412","29","ابوموسي"),
("413","29","بندر جاسك"),
("414","29","تنب بزرگ"),
("415","29","بندر خمیر"),
("416","29","پارسیان"),
("417","29","قشم"),
("418","30","همدان"),
("419","30","ملاير"),
("420","30","تويسركان"),
("421","30","نهاوند"),
("422","30","كبودر اهنگ"),
("423","30","رزن"),
("424","30","اسدآباد"),
("425","30","بهار"),
("426","31","يزد"),
("427","31","تفت"),
("428","31","اردكان"),
("429","31","ابركوه"),
("430","31","ميبد"),
("431","31","طبس"),
("432","31","بافق"),
("433","31","مهريز"),
("434","31","اشكذر"),
("435","31","هرات"),
("436","31","خضرآباد"),
("437","31","شاهديه"),
("438","31","حمیدیه شهر"),
("439","31","سید میرزا"),
("440","31","زارچ");




CREATE TABLE `configuration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item` varchar(255) DEFAULT NULL,
  `value` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;


INSERT INTO configuration VALUES
("1","url","http://my-class.ir/crm/"),
("2","title","سیستم ارتباط با مشتریان گروه فناوری اطلاعات رز سرخ"),
("3","sms_url","http://ip.sms.ir/ws/SendReceive.asmx?wsdl"),
("4","sms_number","30004505002008"),
("5","sms_username","09151234219"),
("6","sms_password","176525"),
("7","signature","شرکت یکتا رز سرخ\n05138941555\nmy-class.ir"),
("8","headerColor",""),
("9","sidebarColor",""),
("10","backgroundColor",""),
("11","logo","807975.png");




CREATE TABLE `contact_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;


INSERT INTO contact_groups VALUES
("1","2","1"),
("3","4","1"),
("4","5","1"),
("5","6","1"),
("6","7","1"),
("7","8","1"),
("8","9","1"),
("9","14","2"),
("10","15","1"),
("11","16","2"),
("12","17","1"),
("13","18","1"),
("43","20","1"),
("44","20","2"),
("47","3","1"),
("48","3","2"),
("49","3","3"),
("50","3","4"),
("51","19","1"),
("52","19","2"),
("53","19","3"),
("54","21","4");




CREATE TABLE `custom_tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contacts` varchar(255) DEFAULT NULL,
  `date` varchar(11) DEFAULT NULL,
  `message` text,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;


INSERT INTO custom_tasks VALUES
("11","15","1518327321","ولیتاین مبارک","0"),
("12","14","1518327409","ولیتاین مبارک","0"),
("13","","1518255885","تبریک","0"),
("14","3","1518328128","همایش دانش آموزان ممتاز","0"),
("15","19","1518500659","عید شما مبارک","0"),
("16","","1518482776","","0"),
("17","15,17,19","1518500857","ارسال دستی عید شما مبارک ","0");




CREATE TABLE `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `family` varchar(150) DEFAULT NULL,
  `mobile` varchar(12) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `birthdate` varchar(11) DEFAULT NULL,
  `title_id` int(11) DEFAULT NULL,
  `gender` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `address` text,
  `description` text,
  `postcode` int(11) DEFAULT NULL,
  `register_date` varchar(12) DEFAULT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `official` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;


INSERT INTO customers VALUES
("21","مهرداد","میرشاهی","09155036317","mehrdad77@yahoo.com","","1","1","1","0","0","","","0","","","2"),
("22","علی ","بهروش","09155194992","","547590600","1","1","1","","","","","","","","2"),
("23","شهزاد ","دوزنده","09373397495","","","1","1","1","","","","","","","","2"),
("24","سرور","","09354051233","","","1","1","1","","","","","","","","2"),
("25","محمدرضا","شیشه چی","09398587498","","802726200","1","2","1","","","","","","","","2");




CREATE TABLE `event_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;


INSERT INTO event_group VALUES
("1","1","1"),
("2","2","2"),
("3","3","1"),
("4","4","1"),
("5","5","1"),
("6","6","1"),
("7","7","1"),
("8","8","1"),
("9","9","1"),
("10","9","2"),
("11","10","3"),
("12","10","2"),
("13","10","1");




CREATE TABLE `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `date` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;


INSERT INTO events VALUES
("1","مناسبت 1","1517689800"),
("2","مناسبت 2","1517776200"),
("3","مناسبت 3","1517689800"),
("5","نیرو هوایی","1517862600"),
("6","مناسبت 5","1518035400"),
("7","عید ","1518035400"),
("8","روز پرستار ","1518035400"),
("9","ولیتاین","1518035400"),
("10","روز دانش آموز","1518208200");




CREATE TABLE `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `text` text,
  `gender` int(11) DEFAULT NULL,
  `official` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;


INSERT INTO messages VALUES
("1","1","متن مناسبت 1","1","1"),
("2","2","پیام مناسبت 2","1","1"),
("3","3","پیام مناسبت 3","3","3"),
("4","4","پیام تست 4","3","3"),
("6","6","متن پیام 5","1","1"),
("7","7","عید شما مبارک","3","3"),
("8","8","روز پرستار مبارک","1","1"),
("9","9","ولیتاین مبارک","3","3"),
("10","10","همایش دانش آموزان ممتاز","3","3");




CREATE TABLE `province` (
  `id` int(12) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;


INSERT INTO province VALUES
("1","آذربايجان شرقي"),
("2","آذربايجان غربي"),
("3","اردبيل"),
("4","اصفهان"),
("5","البرز"),
("6","ايلام"),
("7","بوشهر"),
("8","تهران"),
("9","چهارمحال بختياري"),
("10","خراسان جنوبي"),
("11","خراسان رضوي"),
("12","خراسان شمالي"),
("13","خوزستان"),
("14","زنجان"),
("15","سمنان"),
("16","سيستان و بلوچستان"),
("17","فارس"),
("18","قزوين"),
("19","قم"),
("20","كردستان"),
("21","كرمان"),
("22","كرمانشاه"),
("23","كهكيلويه و بويراحمد"),
("24","گلستان"),
("25","گيلان"),
("26","لرستان"),
("27","مازندران"),
("28","مركزي"),
("29","هرمزگان"),
("30","همدان"),
("31","يزد");




CREATE TABLE `special_event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `day` int(11) DEFAULT NULL,
  `month` int(11) DEFAULT NULL,
  `message_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;






CREATE TABLE `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_id` int(11) NOT NULL,
  `message_id` int(11) NOT NULL,
  `send_date` varchar(11) NOT NULL COMMENT 'تاریخی که باید پیغام ارسال شود',
  `sent_date` varchar(11) NOT NULL COMMENT 'تاریخی که ارسال شده است',
  `status` int(11) NOT NULL,
  `sms_result` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;


INSERT INTO tasks VALUES
("13","13","6","1518035400","1518083315","1","{\"SendMessageWithLineNumberResult\":{\"long\":2494168},\"message\":\"\"}"),
("19","2","6","1518035400","1518083324","1","{\"SendMessageWithLineNumberResult\":{\"long\":2494171},\"message\":\"\"}"),
("20","4","6","1518035400","","0","{\"SendMessageWithLineNumberResult\":{},\"message\":\"\"}"),
("23","8","6","1518035400","","1","{\"SendMessageWithLineNumberResult\":{},\"message\":\"\"}"),
("24","9","6","1518035400","1518083371","1","{\"SendMessageWithLineNumberResult\":{\"long\":2494205},\"message\":\"\"}"),
("25","3","7","1518035400","1518084215","1","{\"SendMessageWithLineNumberResult\":{\"long\":2494975},\"message\":\"\"}"),
("26","3","6","1518035400","1518084331","1","{\"SendMessageWithLineNumberResult\":{\"long\":2495149},\"message\":\"\"}"),
("27","3","8","1518035400","1518084390","1","{\"SendMessageWithLineNumberResult\":{\"long\":2495231},\"message\":\"\"}"),
("28","15","7","1518035400","1518084633","1","{\"SendMessageWithLineNumberResult\":{\"long\":2495506},\"message\":\"\"}"),
("29","3","9","1518035400","1518084808","1","{\"SendMessageWithLineNumberResult\":{\"long\":2495667},\"message\":\"\"}"),
("30","14","9","1518035400","1518084813","1","{\"SendMessageWithLineNumberResult\":{\"long\":2495670},\"message\":\"\"}"),
("31","15","9","1518035400","1518084819","1","{\"SendMessageWithLineNumberResult\":{\"long\":2495676},\"message\":\"\"}"),
("32","14","10","1518208200","1518241413","1","{\"SendMessageWithLineNumberResult\":{\"long\":2588067},\"message\":\"\"}"),
("33","16","10","1518208200","1518241419","1","{\"SendMessageWithLineNumberResult\":{\"long\":2588113},\"message\":\"\"}"),
("34","3","10","1518208200","1518241425","1","{\"SendMessageWithLineNumberResult\":{\"long\":2588204},\"message\":\"\"}"),
("35","15","10","1518208200","1518241431","1","{\"SendMessageWithLineNumberResult\":{\"long\":2588250},\"message\":\"\"}"),
("36","17","10","1518208200","1518241436","1","{\"SendMessageWithLineNumberResult\":{\"long\":2588297},\"message\":\"\"}"),
("37","19","10","1518208200","1518243155","1","{\"SendMessageWithLineNumberResult\":{\"long\":2590781},\"message\":\"\"}");




CREATE TABLE `titles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;


INSERT INTO titles VALUES
("1","سرور گرامی"),
("3","همکار گرامی");




CREATE TABLE `user_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `family` varchar(255) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;


INSERT INTO user_info VALUES
("1","2","سرور","سامانی","09354051233"),
("2","3","mehrdad","mirshahi","09155036317");




CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `access` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;


INSERT INTO users VALUES
("2","soroor.samani@gemil.com","123","1"),
("3","mehrdad77@yahoo.com","1234","1");




/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;