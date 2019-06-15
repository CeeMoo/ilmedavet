-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 15 Haz 2019, 18:34:42
-- Sunucu sürümü: 10.1.31-MariaDB
-- PHP Sürümü: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `ilmedavet`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayarlar`
--

CREATE TABLE `ayarlar` (
  `id` int(11) NOT NULL,
  `type` varchar(10) NOT NULL DEFAULT 'input',
  `baslik` varchar(255) NOT NULL,
  `veri` varchar(255) NOT NULL,
  `deger` text NOT NULL,
  `gosterim` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `ayarlar`
--

INSERT INTO `ayarlar` (`id`, `type`, `baslik`, `veri`, `deger`, `gosterim`) VALUES
(1, 'input', 'Site Url', 'site_url', 'http://192.168.1.48/ilmedavet/', 1),
(2, 'input', 'Site Başlık', 'site_baslik', 'İlme Davet', 1),
(4, 'input', 'description', 'description', 'Site ile ilgili kısa açıklama', 1),
(5, 'input', 'Google Maps', 'google_maps', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3008.4371109394046!2d28.984869315713073!3d41.05943702422349!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14cab71b2602e557%3A0x4fe8bc0a8daf7523!2sBir+Bilet+Turizm!5e0!3m2!1str!2str!4v1526834505611', 3),
(6, 'input', 'Mail Host', 'mail_host', 'mail.islamvakti.com', 4),
(7, 'input', 'Port', 'mail_port', '587', 4),
(8, 'input', 'Mail Kullanıcı', 'mail_kullanici', 'islamvak', 4),
(9, 'input', 'Şifre', 'mail_sifre', '9Dz2s5vMu55.', 4),
(10, 'input', 'Mail Limit', 'mail_limit', '10', 4),
(11, 'input', 'Alıcak Kişi adı', 'mail_alici_adi', 'Cemal Baş', 4),
(12, 'input', 'Alıcak E-mail Kişi', 'mail_alici_eposta', 'qdale.123@gmail.com', 4),
(13, 'input', 'Alıcak Kişi adı2', 'mail_alici_adi2', '', 4),
(14, 'input', 'Alıcak E-mail Kişi', 'mail_alici_eposta2', '', 4),
(15, 'input', 'Alıcak Kişi adı3', 'mail_alici_adi3', '', 4),
(16, 'input', 'Alıcak E-mail Kişi', 'mail_alici_eposta3', '', 4),
(17, 'input', 'Sayfa Başlık', 'iletisim_baslik', 'İletişim BÖlümü', 3),
(18, 'textarea', 'İletişim Açıklama', 'iletisim_aciklama', '<ul>\r\n	<li>Merkez Mahallesi, Halaskargazi Cad. Ayka&ccedil; Plaza, No:199, K:6, D:7, 24381 Şişli/İstanbul</li>\r\n	<li>270 - 188 - 6026</li>\r\n	<li><a href=\"mailto:domain@expooler.com\">domain@expooler.com</a></li>\r\n</ul>\r\n', 3),
(19, 'input', 'Site Gösterim', 'site_status', '1', 1),
(20, 'input', 'Site Template', 'site_template', 'ilmedavet', 1),
(21, 'input', 'Admin Yol', 'admin_yol', 'adminci', 1),
(22, 'input', 'Yazar Yolu', 'yazar_yol', 'ilme_yazar', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `calisma`
--

CREATE TABLE `calisma` (
  `id` int(11) NOT NULL,
  `baslik` varchar(255) NOT NULL,
  `resim` varchar(255) NOT NULL,
  `tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `calisma`
--

INSERT INTO `calisma` (`id`, `baslik`, `resim`, `tarih`) VALUES
(1, 'Türk hava yollarıasd', 'images/calisma/1692077282-thy.jpg', '2018-05-20 14:50:17'),
(2, 'Atlas Jet', 'images/calisma/46400798-pegasus.jpg', '2018-05-20 14:51:52'),
(3, 'Anadolu jet', 'images/calisma/1944305999-anadolujet.jpg', '2018-05-20 14:59:35'),
(6, 'Atlas Global', 'images/calisma/410682121-atlasglobal.jpg', '2018-05-20 15:51:13'),
(7, 'Anadolu Jet', 'images/calisma/650175314-anadolujet.jpg', '2018-05-20 15:51:26'),
(8, 'SunExpress', 'images/calisma/949391278-sunexpress.jpg', '2018-05-20 15:51:41'),
(9, 'Tursab', 'images/calisma/1780799093-tursab.png', '2018-05-20 15:51:55');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `dost_dernek`
--

CREATE TABLE `dost_dernek` (
  `id` int(11) NOT NULL,
  `dost_dernek_kat_id` smallint(6) NOT NULL DEFAULT '0',
  `baslik` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `kisa_aciklama` text,
  `aciklama` text NOT NULL,
  `maps` text,
  `aktif` tinyint(4) NOT NULL DEFAULT '0',
  `tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `dost_dernek`
--

INSERT INTO `dost_dernek` (`id`, `dost_dernek_kat_id`, `baslik`, `slug`, `kisa_aciklama`, `aciklama`, `maps`, `aktif`, `tarih`) VALUES
(1, 2, 'Bir deneme dernek', 'bir-deneme-dernek', 'Deneme 1 dernek\r\nMerhaba derneğimize hoşgeldiniz.', '<p style=\\\"text-align:center\\\"><strong>Deneme 1 dernek</strong></p>\r\n\r\n<p style=\\\"text-align:center\\\"><strong>Merhaba derneğimize hoşgeldiniz.</strong></p>', '<iframe src=\\\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6016.701142035369!2d28.973405178046796!3d41.061329006810745!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14cab7185db29931%3A0xc9deed207ce371cc!2zSGFsaWRlIEVkaXAgQWTEsXZhciBNYWhhbGxlc2ksIDM0Mzg0IMWeacWfbGkvxLBzdGFuYnVs!5e0!3m2!1str!2str!4v1560525106680!5m2!1str!2str\\\" width=\\\"600\\\" height=\\\"450\\\" frameborder=\\\"0\\\" style=\\\"border:0\\\" allowfullscreen></iframe>', 1, '2019-03-21 20:47:26'),
(2, 2, 'Bir deneme dernek2', 'bir-deneme-dernek2', '', '<p style=\\\"text-align:center\\\"><strong>Deneme 1 dernek</strong></p>\r\n\r\n<p style=\\\"text-align:center\\\"><strong>Merhaba derneğimize hoşgeldiniz.</strong></p>', '', 1, '2019-03-21 20:47:26'),
(3, 3, 'Bir deneme dernek3', 'bir-deneme-dernek3', '', '<p style=\\\"text-align:center\\\"><strong>Deneme 1 dernek</strong></p>\r\n\r\n<p style=\\\"text-align:center\\\"><strong>Merhaba derneğimize hoşgeldiniz.</strong></p>', '', 1, '2019-03-21 20:47:26'),
(4, 1, 'Bir deneme dernek4', 'bir-deneme-dernek4', '', '<p style=\\\"text-align:center\\\"><strong>Deneme 1 dernek</strong></p>\r\n\r\n<p style=\\\"text-align:center\\\"><strong>Merhaba derneğimize hoşgeldiniz.</strong></p>', '', 1, '2019-03-21 20:47:26'),
(5, 4, 'Bir deneme dernek5', 'bir-deneme-dernek5', '', '<p style=\\\"text-align:center\\\"><strong>Deneme 1 dernek</strong></p>\r\n\r\n<p style=\\\"text-align:center\\\"><strong>Merhaba derneğimize hoşgeldiniz.</strong></p>', '', 1, '2019-03-21 20:47:26'),
(6, 2, 'Bir deneme dernek6', 'bir-deneme-dernek6', '', '<p style=\\\"text-align:center\\\"><strong>Deneme 1 dernek</strong></p>\r\n\r\n<p style=\\\"text-align:center\\\"><strong>Merhaba derneğimize hoşgeldiniz.</strong></p>', '', 1, '2019-03-21 20:47:26'),
(7, 2, 'Bir deneme dernek7', 'bir-deneme-dernek7', NULL, '<p style=\\\"text-align:center\\\"><strong>Deneme 1 dernek</strong></p>\r\n\r\n<p style=\\\"text-align:center\\\"><strong>Merhaba derneğimize hoşgeldiniz.</strong></p>', '', 1, '2019-03-21 20:47:26'),
(8, 2, 'Bir deneme dernek8', 'bir-deneme-dernek8', '“Sizi annelerinizin karınlarında, üç karanlık içinde, bir yaratılıştan başka bir yaratılışa geçirerek yaratmaktadır. İşte Rabbiniz olan Allah budur, mülk O’nundur. O’ndan başka İlah yoktur. Buna rağmen nasıl çevriliyorsunuz?” (Zümer Suresi: 6)\r\n\r\nKur’an, bebeğin rahimdeki üç karanlık devresine bu ayet-i kerimesiyle dikkat çekmiş ve insanın anne karnında üç aşamalı bir yaratılışla yaratıldığını bildirilmiştir.\r\n\r\nTürkçeye “üç karanlık içinde” manasıyla çevrilen Arapça فِي ظُلُمَاتٍ ثَلَاثٍ ifadesi, embriyonun gelişimi sırasında bulunduğu üç karanlık bölgeye işaret etmektedir.\r\n\r\nBu bölgeler sırasıyla:\r\n\r\n1- Batın duvarı karanlığı\r\n\r\n2- Rahim duvarı karanlığı\r\n\r\n3- Amniyon zarı karanlığıdır.\r\n\r\nGörüldüğü gibi, bugün modern biyoloji, bebeğin embriyolojik gelişiminin ayet-i kerimede bildirildiği şekilde, üç farklı karanlık bölgede gerçekleştiğini ortaya koymuştur.\r\n\r\nAyrıca embriyoloji alanındaki gelişmeler bu bölgelerin de üçer katmandan oluştuğunu göstermiştir.\r\n\r\nAyrıca ayette, insanın anne karnında, birinden diğerine farklılaşan üç ayrı evrede meydana geldiğine işaret edilmektedir. Gerçekten de bugün modern biyoloji, bebeğin anne karnındaki embriyolojik gelişiminin üç farklı devrede gerçekleştiğini de ortaya koymuştur.\r\n\r\nBugün tıp fakültelerinde ders kitabı olarak okutulan bütün embriyoloji kitaplarında bu konu en temel bilgiler arasında yer alır. Örneğin, embriyoloji hakkında temel başvuru kitaplarından biri olan Basic Human Embryology (Temel İnsan Embriyolojisi) isimli kaynakta bu gerçek şöyle ifade edilmektedir:\r\n\r\nRahimdeki hayat 3 evreden oluşur:\r\n\r\nPreembriyonik evre (ilk 2,5 hafta).\r\n\r\nEmbriyonik evre (8. haftanın sonuna kadar).\r\n\r\nVe Fetal evre (8. haftadan doğuma kadar).\r\n\r\nBu evreler bebeğin farklı gelişim aşamalarını içerir. Anne rahmindeki gelişim ile ilgili bu bilgiler, ancak modern teknolojik aletlerle yapılan gözlemler sayesinde elde edilmiştir.\r\n\r\nAncak görüldüğü gibi bu bilgilere de diğer pek çok bilimsel gerçek gibi mucizevî bir biçimde Kur’an ayetlerinde dikkat çekilmiştir.\r\n\r\nİnsanlığın tıbbi konularda hiçbir detaylı bilgiye sahip olmadığı bir dönemde, Kur’an’da bu derece ayrıntılı ve doğru bilgilerin verilmiş olması, elbette Kur’an’ın Allah’ın sözü olduğunun açık bir delildir.\r\n\r\nBu makamda şu söz ne kadar da güzeldir: “Evet bir bilim adamı bin bir zahmetle bir dağa tırmanmaya başlar. Onun zannınca hiç çıkılmamış bir dağdır bu. Tam dağın tepesine gelir, dağın zirvesine ilk ayak basacak olan adam olmak keyfiyle son hamlesini yapıp zirveye çıktığında orada oturan bir ilahiyatçıyı görür.\r\n\r\nOna sorar: Sen buraya nasıl çıktın?\r\n\r\nBen binler zahmetle ancak ulaşabilmiştim. İlahiyatçı adam tevazu ile cevap verir: Kitabım olan Kur’an basamak oldu. Bir sıçrama ile ulaştım.', '<p style=\\\"text-align:center\\\"><strong>Deneme 1 dernek</strong></p>\r\n\r\n<p style=\\\"text-align:center\\\"><strong>Merhaba derneğimize hoşgeldiniz.</strong></p>', '', 1, '2019-03-21 20:47:26'),
(9, 1, 'bir dernek daha 9', 'bir-dernek-daha-9', '', '<p><strong>&ldquo;Sizi annelerinizin karınlarında, &uuml;&ccedil; karanlık i&ccedil;inde, bir yaratılıştan başka bir yaratılışa ge&ccedil;irerek yaratmaktadır. İşte Rabbiniz olan Allah budur, m&uuml;lk O&rsquo;nundur. O&rsquo;ndan başka İlah yoktur. Buna rağmen nasıl &ccedil;evriliyorsunuz?&rdquo; (Z&uuml;mer Suresi: 6)</strong></p>\r\n\r\n<p>Kur&rsquo;an, bebeğin rahimdeki &uuml;&ccedil; karanlık devresine bu ayet-i kerimesiyle dikkat &ccedil;ekmiş ve insanın anne karnında &uuml;&ccedil; aşamalı bir yaratılışla yaratıldığını bildirilmiştir.</p>\r\n\r\n<p>T&uuml;rk&ccedil;eye &ldquo;&uuml;&ccedil; karanlık i&ccedil;inde&rdquo; manasıyla &ccedil;evrilen Arap&ccedil;a فِي ظُلُمَاتٍ ثَلَاثٍ ifadesi, embriyonun gelişimi sırasında bulunduğu &uuml;&ccedil; karanlık b&ouml;lgeye işaret etmektedir.</p>\r\n\r\n<p>Bu b&ouml;lgeler sırasıyla:</p>\r\n\r\n<p>1- Batın duvarı karanlığı</p>\r\n\r\n<p>2- Rahim duvarı karanlığı</p>\r\n\r\n<p>3- Amniyon zarı karanlığıdır.</p>\r\n\r\n<p>G&ouml;r&uuml;ld&uuml;ğ&uuml; gibi, bug&uuml;n modern biyoloji, bebeğin embriyolojik gelişiminin ayet-i kerimede bildirildiği şekilde, &uuml;&ccedil; farklı karanlık b&ouml;lgede ger&ccedil;ekleştiğini ortaya koymuştur.</p>\r\n\r\n<p>Ayrıca embriyoloji alanındaki gelişmeler bu b&ouml;lgelerin de &uuml;&ccedil;er katmandan oluştuğunu g&ouml;stermiştir.</p>\r\n\r\n<p>Ayrıca ayette, insanın anne karnında, birinden diğerine farklılaşan &uuml;&ccedil; ayrı evrede meydana geldiğine işaret edilmektedir. Ger&ccedil;ekten de bug&uuml;n modern biyoloji, bebeğin anne karnındaki embriyolojik gelişiminin &uuml;&ccedil; farklı devrede ger&ccedil;ekleştiğini de ortaya koymuştur.</p>\r\n\r\n<p>Bug&uuml;n tıp fak&uuml;ltelerinde ders kitabı olarak okutulan b&uuml;t&uuml;n embriyoloji kitaplarında bu konu en temel bilgiler arasında yer alır. &Ouml;rneğin, embriyoloji hakkında temel başvuru kitaplarından biri olan Basic Human Embryology (Temel İnsan Embriyolojisi) isimli kaynakta bu ger&ccedil;ek ş&ouml;yle ifade edilmektedir:</p>\r\n\r\n<p>Rahimdeki hayat 3 evreden oluşur:</p>\r\n\r\n<p>Preembriyonik evre (ilk 2,5 hafta).</p>\r\n\r\n<p>Embriyonik evre (8. haftanın sonuna kadar).</p>\r\n\r\n<p>Ve Fetal evre (8. haftadan doğuma kadar).</p>\r\n\r\n<p>Bu evreler bebeğin farklı gelişim aşamalarını i&ccedil;erir. Anne rahmindeki gelişim ile ilgili bu bilgiler, ancak modern teknolojik aletlerle yapılan g&ouml;zlemler sayesinde elde edilmiştir.</p>\r\n\r\n<p>Ancak g&ouml;r&uuml;ld&uuml;ğ&uuml; gibi bu bilgilere de diğer pek &ccedil;ok bilimsel ger&ccedil;ek gibi mucizev&icirc; bir bi&ccedil;imde Kur&rsquo;an ayetlerinde dikkat &ccedil;ekilmiştir.</p>\r\n\r\n<p>İnsanlığın tıbbi konularda hi&ccedil;bir detaylı bilgiye sahip olmadığı bir d&ouml;nemde, Kur&rsquo;an&rsquo;da bu derece ayrıntılı ve doğru bilgilerin verilmiş olması, elbette Kur&rsquo;an&rsquo;ın Allah&rsquo;ın s&ouml;z&uuml; olduğunun a&ccedil;ık bir delildir.</p>\r\n\r\n<p>Bu makamda şu s&ouml;z ne kadar da g&uuml;zeldir: &ldquo;Evet bir bilim adamı bin bir zahmetle bir dağa tırmanmaya başlar. Onun zannınca hi&ccedil; &ccedil;ıkılmamış bir dağdır bu. Tam dağın tepesine gelir, dağın zirvesine ilk ayak basacak olan adam olmak keyfiyle son hamlesini yapıp zirveye &ccedil;ıktığında orada oturan bir ilahiyat&ccedil;ıyı g&ouml;r&uuml;r.</p>\r\n\r\n<p>Ona sorar: Sen buraya nasıl &ccedil;ıktın?</p>\r\n\r\n<p>Ben binler zahmetle ancak ulaşabilmiştim. İlahiyat&ccedil;ı adam tevazu ile cevap verir: Kitabım olan Kur&rsquo;an basamak oldu. Bir sı&ccedil;rama ile ulaştım.</p>\r\n', '', 1, '2019-06-14 16:55:07'),
(10, 1, 'Elif Lam Mim Derneği - Zeytinburnu', 'elif-lam-mim-dernegi-zeytinburnu', '', '<p><a href=\"https://tr-tr.facebook.com/eliflammimder/\">Facebook Sayfamız</a></p>\r\n', '', 1, '2019-06-15 15:54:33');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `dost_dernek_kat`
--

CREATE TABLE `dost_dernek_kat` (
  `id` int(11) NOT NULL,
  `baslik` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `aktif` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `dost_dernek_kat`
--

INSERT INTO `dost_dernek_kat` (`id`, `baslik`, `slug`, `tarih`, `aktif`) VALUES
(1, 'istanbul', 'istanbul', '2019-03-21 20:11:14', 1),
(2, 'Ankara', 'ankara', '2019-03-21 20:32:09', 1),
(3, 'İzmir', 'izmir', '2019-03-21 20:32:15', 1),
(4, 'Bursa', 'bursa', '2019-03-21 20:32:22', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `goruntulu_dersler`
--

CREATE TABLE `goruntulu_dersler` (
  `id` int(11) NOT NULL,
  `kat_id` smallint(6) NOT NULL DEFAULT '0',
  `uye_id` smallint(6) NOT NULL DEFAULT '0',
  `duz_id` smallint(6) NOT NULL DEFAULT '0',
  `baslik` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `resim` varchar(255) DEFAULT NULL,
  `kisa_aciklama` text NOT NULL,
  `aciklama` text NOT NULL,
  `aktif` tinyint(4) NOT NULL DEFAULT '0',
  `tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `goruntulu_dersler`
--

INSERT INTO `goruntulu_dersler` (`id`, `kat_id`, `uye_id`, `duz_id`, `baslik`, `slug`, `resim`, `kisa_aciklama`, `aciklama`, `aktif`, `tarih`) VALUES
(1, 1, 1, 1, 'Deneme görüntü', 'deneme-goruentue', 'https://i.ytimg.com/vi/2IHBNaNCzQw/hqdefault.jpg?sqp=-oaymwEYCKgBEF5IVfKriqkDCwgBFQAAiEIYAXAB&rs=AOn4CLDdFpuFXSDzFOWRvEgKI4iH1CRawg', 'Deneme görüntü', '<p style=\"text-align:center\"><span style=\"font-size:20px\"><strong>Deneme g&ouml;r&uuml;nt&uuml;</strong></span></p>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-size:14px\">Merhab D&uuml;nya nasıl gidiyor.</span></p>\r\n', 1, '2019-03-31 17:58:59'),
(4, 1, 1, 1, 'asd', 'asd', 'https://i.ytimg.com/vi/9QMWo2Pj6eE/hqdefault.jpg?sqp=-oaymwEYCKgBEF5IVfKriqkDCwgBFQAAiEIYAXAB&rs=AOn4CLAOYStGoWJ7VpnplVEVQRSkkTYDdQ', 'asd kısa_acıklama', '<p>Daralan kalplere şifa i&ccedil;in inen Hicr Suresinin son 15 &Acirc;yetinin kelime kelime incelenmesi</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h1><strong>Daralan kalplere şifa i&ccedil;in inen Hicr Suresinin son 15 &Acirc;yetinin kelime kelime incelenmesi</strong></h1>\r\n', 1, '2019-04-16 21:19:13'),
(5, 1, 1, 0, 'İlme Davet', 'ilme-davet', 'https://i.ytimg.com/vi/zd4tjnxsz7E/hqdefault.jpg?sqp=-oaymwEYCKgBEF5IVfKriqkDCwgBFQAAiEIYAXAB&rs=AOn4CLBRjiLuRCI5MaLnGLSIrbgiy-pVcw', '', '<p>Deneme&nbsp;&lt;iframe width=&quot;560&quot; height=&quot;315&quot; src=&quot;https://www.youtube.com/embed/FVKYgl_ul_E&quot; frameborder=&quot;0&quot; allow=&quot;accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture&quot; allowfullscreen&gt;&lt;/iframe&gt;</p>\r\n', 1, '2019-06-15 16:16:07');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `goruntulu_dersler_kat`
--

CREATE TABLE `goruntulu_dersler_kat` (
  `id` int(11) NOT NULL,
  `ust_kat` smallint(6) NOT NULL DEFAULT '0',
  `baslik` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `aktif` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `goruntulu_dersler_kat`
--

INSERT INTO `goruntulu_dersler_kat` (`id`, `ust_kat`, `baslik`, `slug`, `tarih`, `aktif`) VALUES
(1, 0, 'Denemek Görüntülüüü', 'denemek-goruentuelueueue', '2019-03-31 17:58:07', 1),
(2, 1, 'Denemek Görüntülü 2', 'denemek-goruentuelue-2', '2019-03-31 18:05:16', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `goruntulu_extra`
--

CREATE TABLE `goruntulu_extra` (
  `id` int(11) NOT NULL,
  `goruntulu_id` int(11) NOT NULL,
  `baslik` varchar(255) NOT NULL,
  `aciklama` text NOT NULL,
  `tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `goruntulu_extra`
--

INSERT INTO `goruntulu_extra` (`id`, `goruntulu_id`, `baslik`, `aciklama`, `tarih`) VALUES
(2, 4, 'Youtube', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/2IHBNaNCzQw\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2019-04-16 21:19:13'),
(7, 4, 'Youtube2', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/ZJ28YAIYLZM\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2019-04-16 22:17:06'),
(8, 4, 'Youtube3', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/9bMPk6pRcPQ\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2019-04-16 22:17:25'),
(9, 1, 'Youtube', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/i_aiJfZUDto\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2019-04-16 22:18:00'),
(10, 5, 'Ders1', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/FVKYgl_ul_E\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2019-06-15 16:16:07'),
(11, 5, 'Ders2', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/FVKYgl_ul_E\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2019-06-15 16:16:07'),
(12, 5, 'Ders3', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/FVKYgl_ul_E\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2019-06-15 16:16:07'),
(13, 5, 'Ders4', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/FVKYgl_ul_E\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2019-06-15 16:16:07');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iletisim`
--

CREATE TABLE `iletisim` (
  `id` int(11) NOT NULL,
  `adi` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `konu` varchar(255) NOT NULL,
  `mesaj` text NOT NULL,
  `tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `iletisim`
--

INSERT INTO `iletisim` (`id`, `adi`, `email`, `konu`, `mesaj`, `tarih`) VALUES
(36, 'asdasd', 'qdale.123@gmail.com', 'Site Sorunları', 'asdas', '2018-06-04 23:20:39'),
(37, 'asdasd', 'qdale.123@gmail.com', 'Film Sorunları', 'asdasdasd', '2018-06-04 23:20:52'),
(38, 'asdasd', 'qdale.123@gmail.com', 'Site Sorunları', 'asdasd', '2018-06-04 23:21:16'),
(39, 'asdasd', 'asdasd', 'Site Sorunları', 'asd', '2018-06-04 23:22:13'),
(40, 'cemal baş', 'cemal@grandoriatours.com', 'Film Sorunları', 'bir başka sorun denemesi', '2018-06-21 21:37:12'),
(41, 'CeeMoo', 'cemal@grandoriatours.com', '05325544532', 'Benim telefon numaram doğrudur arkadaş', '2018-06-21 21:42:39'),
(42, 'asdasd', 'qdale123@gmail.com', 'Site Sorunları', 'asdasdasdasd', '2018-07-09 15:26:29'),
(43, 'birbilete', 'qdale123@gmail.com', 'Site Sorunları', 'asdasdasd', '2018-07-09 15:27:14');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mail_sistem`
--

CREATE TABLE `mail_sistem` (
  `id` int(11) NOT NULL,
  `froma` varchar(255) NOT NULL,
  `fromname` varchar(255) NOT NULL,
  `addaddress` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tarih_strtotime` varchar(255) NOT NULL,
  `durum` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `mail_sistem`
--

INSERT INTO `mail_sistem` (`id`, `froma`, `fromname`, `addaddress`, `subject`, `body`, `tarih`, `tarih_strtotime`, `durum`) VALUES
(1, 'islamvak@islamvakti.com', 'İslamVakti', '', 'Film Sorunları - İle İlgili', '<table>\r\n					<tr><td>Adı : </td><td>cemal baş</td></tr>\r\n					<tr><td>Email : </td><td>cemal@grandoriatours.com</td></tr>\r\n					<tr><td>Konu : </td><td>Film Sorunları</td></tr>\r\n					<tr><td>Mesaj : </td><td>bu bir deneme yazısıdır</td></tr>\r\n				</table>', '2018-06-21 20:26:34', '1529612794', 0),
(2, 'islamvak@islamvakti.com', 'İslamVakti', '', 'Film Sorunları - İle İlgili', '<table>\r\n					<tr><td>Adı : </td><td>cemal baş</td></tr>\r\n					<tr><td>Email : </td><td>cemal@grandoriatours.com</td></tr>\r\n					<tr><td>Konu : </td><td>Film Sorunları</td></tr>\r\n					<tr><td>Mesaj : </td><td>bu bir deneme yazısıdır</td></tr>\r\n				</table>', '2018-06-21 20:26:37', '1529612797', 0),
(3, 'islamvak@islamvakti.com', 'İslamVakti', '', 'Film Sorunları - İle İlgili', '<table>\r\n					<tr><td>Adı : </td><td>cemal baş</td></tr>\r\n					<tr><td>Email : </td><td>cemal@grandoriatours.com</td></tr>\r\n					<tr><td>Konu : </td><td>Film Sorunları</td></tr>\r\n					<tr><td>Mesaj : </td><td>bu bir deneme yazısıdır</td></tr>\r\n				</table>', '2018-06-21 20:31:49', '1529613109', 0),
(9, 'islamvak@islamvakti.com', 'İslamVakti', '', 'Site Sorunları - İle İlgili', '<table>\r\n						<tr><td>Adı : </td><td>asdasd</td></tr>\r\n						<tr><td>Email : </td><td>qdale123@gmail.com</td></tr>\r\n						<tr><td>Konu : </td><td>Site Sorunları</td></tr>\r\n						<tr><td>Mesaj : </td><td>asdasdasdasd</td></tr>\r\n					</table>', '2018-07-09 15:26:29', '1531149989', 1),
(10, 'islamvak@islamvakti.com', 'İslamVakti', '', 'Site Sorunları - İle İlgili', '<table>\r\n						<tr><td>Adı : </td><td>birbilete</td></tr>\r\n						<tr><td>Email : </td><td>qdale123@gmail.com</td></tr>\r\n						<tr><td>Konu : </td><td>Site Sorunları</td></tr>\r\n						<tr><td>Mesaj : </td><td>asdasdasd</td></tr>\r\n					</table>', '2018-07-09 15:27:14', '1531150034', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sabit_extra`
--

CREATE TABLE `sabit_extra` (
  `id` int(11) NOT NULL,
  `gorunum` tinyint(4) NOT NULL DEFAULT '1',
  `baslik` varchar(255) NOT NULL,
  `aktif` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `sabit_extra`
--

INSERT INTO `sabit_extra` (`id`, `gorunum`, `baslik`, `aktif`) VALUES
(1, 1, 'Youtube', 1),
(2, 2, 'SoundCloud', 1),
(3, 1, 'Vimeo', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sayfalar`
--

CREATE TABLE `sayfalar` (
  `id` int(11) NOT NULL,
  `baslik` varchar(250) NOT NULL,
  `slug` varchar(250) NOT NULL,
  `kisa_aciklama` text,
  `aciklama` text NOT NULL,
  `tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `aktif` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `sayfalar`
--

INSERT INTO `sayfalar` (`id`, `baslik`, `slug`, `kisa_aciklama`, `aciklama`, `tarih`, `aktif`) VALUES
(1, 'Hakkımızda', 'hakkimizda', '', '<h1>5- Ahlakının g&uuml;zelliği doğruluktandır</h1>\r\n\r\n<p>G&uuml;zel ahlakın hakikat zeminiyle olan bağı doğruluktur. Doğruluk, adeta kalbin v&uuml;cuda kanı pompalaması gibi, g&uuml;zel ahlakın her hasletine kan pompalar. B&uuml;t&uuml;n g&uuml;zel hasletler, ancak sıdk ve doğruluk ile hayat bulabilirler. Bir kişide doğruluk yoksa, g&uuml;zel ahlak o kişide yerleşmez ve b&uuml;t&uuml;n g&uuml;zel hasletler &ouml;l&uuml;r gider.</p>\r\n\r\n<p>G&uuml;zel ahlakı bir ağaca benzetsek ve her g&uuml;zel haslet bu ağacın bir meyvesi olsa; sıdk ve doğruluk bu ağacın suyu ya da k&ouml;k&uuml; olurdu. Nasıl ki ağaca su verilmezse ya da k&ouml;k&uuml; kesilirse ağa&ccedil; kuru gider ve meyveleri &ccedil;&uuml;r&uuml;r; aynen bunun gibi, g&uuml;zel ahlak ağacının suyu ve k&ouml;k&uuml; olan sıdk ve doğruluk olmazsa, diğer b&uuml;t&uuml;n hasletler yok olup gider. B&uuml;t&uuml;n g&uuml;zel hasletlere hayat veren, kuvvet veren, onların devamını sağlayan yalnız sıdk ve doğruluktur.</p>\r\n\r\n<p>Siz yalan s&ouml;yleyen ve insanları aldatan birisinde; takva, z&uuml;hd, samimiyet, cesaret gibi sıfatları bulabilir misiniz? Bulamazsınız, nerde kaldı, b&uuml;t&uuml;n g&uuml;zel hasletler, hem de zirve seviyede onda olacak&hellip;</p>\r\n\r\n<p>Bu genel kaideyle, şimdi Hz. Muhammed (sav)&rsquo;e bakalım, O, g&uuml;zel ahlakın b&uuml;t&uuml;n hasletleriyle donatılmıştı. Bu da O&rsquo;nun sıdkına ve doğruluğuna işaret eder. Zira doğru olmasaydı, o g&uuml;zel hasletler onda asla g&ouml;z&uuml;kmeyecekti. Zira doğruluk gittiği zaman, g&uuml;zel ahlak kurur ve meyveleri &ccedil;&uuml;r&uuml;r gider. O zaman:</p>\r\n\r\n<p>Madem O zat, g&uuml;zel ahlakın her hasletiyle donatılmıştır o halde mutlaka sıdk ve doğruluk sahibidir. Zira &ouml;ğrendiğimiz bu kaideye binaen, doğru olmasaydı, ahlakı bu derece g&uuml;zel olamazdı.<br />\r\nVe madem sıdk ve doğruluk sahibidir, o halde her dediği doğrudur ve yalanı olamaz.<br />\r\nVe madem her dediği doğrudur, o halde bu zat Allah&rsquo;ın peygamberi olmalıdır. Zira bu zat, &ldquo;Ben Allah&rsquo;ın peygamberiyim.&rdquo; diyor. Her halinde son derece sadık ve doğru olan birinin b&ouml;yle bir meselede yalan s&ouml;ylemesi m&uuml;mk&uuml;n değildir.</p>\r\n\r\n<p>Şu noktaya da dikkatinizi &ccedil;ekmek istiyoruz: Eğer bu zat doğru s&ouml;ylemiyorsa, o zaman -h&acirc;ş&acirc; y&uuml;z bin defa h&acirc;ş&acirc;- Allah&rsquo;a iftira ediyor ve yalan s&ouml;yl&uuml;yordur. &Ouml;yle ya, bu ikisinin ortası yoktur. O, ya doğruların en doğrusudur. Ya da -h&acirc;ş&acirc; y&uuml;z bin defa h&acirc;ş&acirc;- Allah&rsquo;a iftira edebilecek kadar haddi aşmış, yalancıların en yalancısıdır. Bu ikisinin ortası yoktur.</p>\r\n\r\n<p>Şimdi siz, g&uuml;zel ahlakın her neviyle donatılan bu zatın, yalancıların en yalancısı olmasına ihtimal verebiliyor musunuz? Buna, Şeytan bile ihtimal verdiremez.</p>\r\n\r\n<script>alert(\'deneme\');</script>', '2018-05-20 15:49:03', 1),
(2, 'Bağış', 'bagis', 'Deneme 1 başlıkDeneme 1 başlık', '<p>E DAVET K&Uuml;LT&Uuml;R VE YARDIMLAŞMA DERNEĞİ</p>\r\n\r\n<p>Pazari&ccedil;i Mah. Ordu Cad. No:306 &nbsp;GAZİOSMANPAŞA &ndash; İSTANBUL</p>\r\n\r\n<p>TEL: 0534&nbsp;625 48 49</p>\r\n\r\n<p><a href=\"https://www.facebook.com/ilmedavetdernegiistanbul/\">https://www.facebook.com/ilmedavetdernegiistanbul/</a></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><iframe frameborder=\"0\" height=\"450\" src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d752.1128456941781!2d28.934653829206617!3d41.05912499870597!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14cab0bed3e3a6db%3A0xba050159cb5ebd19!2zxLBsbWUgRGF2ZXQgRGVybmXEn2k!5e0!3m2!1str!2str!4v1501776866015\" width=\"600\"></iframe></p>\r\n', '2019-03-23 16:56:14', 1),
(3, 'İletişim Sayfası', 'iletisim-sayfasi', 'İLME DAVET KÜLTÜR VE YARDIMLAŞMA DERNEĞİ Pazariçi Mah. Ordu Cad. No:306  GAZİOSMANPAŞA – İSTANBUL TEL: 0534 625 48 49', '<p>İLME DAVET K&Uuml;LT&Uuml;R VE YARDIMLAŞMA DERNEĞİ</p>\r\n\r\n<p>Pazari&ccedil;i Mah. Ordu Cad. No:306 &nbsp;GAZİOSMANPAŞA &ndash; İSTANBUL</p>\r\n\r\n<p>TEL: 0534&nbsp;625 48 49</p>\r\n\r\n<p><a href=\"https://www.facebook.com/ilmedavetdernegiistanbul/\">https://www.facebook.com/ilmedavetdernegiistanbul/</a></p>\r\n\r\n<p><iframe frameborder=\"0\" height=\"450\" src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1504.225691358762!2d28.935201!3d41.059125!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xba050159cb5ebd19!2zxLBsbWUgRGF2ZXQgRGVybmXEn2k!5e0!3m2!1str!2str!4v1559488518322!5m2!1str!2str\" style=\"border:0\" width=\"100%\"></iframe></p>\r\n', '2019-06-02 14:56:48', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sesli_dersler`
--

CREATE TABLE `sesli_dersler` (
  `id` int(11) NOT NULL,
  `kat_id` smallint(6) NOT NULL DEFAULT '0',
  `uye_id` smallint(6) NOT NULL DEFAULT '0',
  `duz_id` smallint(6) NOT NULL DEFAULT '0',
  `baslik` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `kisa_aciklama` text NOT NULL,
  `aciklama` text NOT NULL,
  `aktif` tinyint(4) NOT NULL DEFAULT '0',
  `tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `sesli_dersler`
--

INSERT INTO `sesli_dersler` (`id`, `kat_id`, `uye_id`, `duz_id`, `baslik`, `slug`, `kisa_aciklama`, `aciklama`, `aktif`, `tarih`) VALUES
(1, 2, 1, 1, 'Sesli 1', 'sesli-1', 'Sesli 1Sesli 1', '<p style=\"text-align:center\"><span style=\"font-size:18px\"><strong>Sesli 1</strong></span></p>\r\n\r\n<p style=\"text-align:center\"><strong><span style=\"font-size:14px\">Merhaba D&Uuml;nya nasılsınız nasıl gidiyor</span></strong></p>\r\n', 1, '2019-03-31 18:10:26'),
(2, 1, 1, 1, 'bir denemek2', 'bir-denemek2', 'bir denemek2', '<p>bir denemek2</p>\r\n', 1, '2019-05-28 16:54:34'),
(3, 2, 1, 1, 'ders 1 alternarif', 'ders-1-alternarif', 'ders 1 alternarif', '<p>ders 1 alternarif</p>\r\n', 1, '2019-06-14 21:26:33'),
(4, 1, 1, 1, 'ders 2 alternarif', 'ders-2-alternarif', 'ders 2 alternarif', '<p>ders 2 alternarif</p>\r\n', 1, '2019-06-14 21:26:44');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sesli_dersler_kat`
--

CREATE TABLE `sesli_dersler_kat` (
  `id` int(11) NOT NULL,
  `ust_kat` smallint(6) NOT NULL DEFAULT '0',
  `baslik` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `aktif` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `sesli_dersler_kat`
--

INSERT INTO `sesli_dersler_kat` (`id`, `ust_kat`, `baslik`, `slug`, `tarih`, `aktif`) VALUES
(1, 0, 'SEsli ders kat', 'sesli-ders-kat', '2019-03-31 18:07:34', 1),
(2, 0, 'İlmihal', 'ilmihal', '2019-06-14 21:25:22', 1),
(3, 0, 'Akaid', 'akaid', '2019-06-14 21:25:31', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sesli_extra`
--

CREATE TABLE `sesli_extra` (
  `id` int(11) NOT NULL,
  `sesli_id` int(11) NOT NULL,
  `baslik` varchar(255) NOT NULL,
  `aciklama` text NOT NULL,
  `tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `sesli_extra`
--

INSERT INTO `sesli_extra` (`id`, `sesli_id`, `baslik`, `aciklama`, `tarih`) VALUES
(1, 3, 'SoundCloud', '<iframe src=\"https://archive.org/embed/Namaz_Tesbihati\" width=\"500\" height=\"240\" frameborder=\"0\" webkitallowfullscreen=\"true\" mozallowfullscreen=\"true\" allowfullscreen></iframe>', '2019-06-14 21:26:33'),
(2, 4, 'Archive', '<iframe src=\"https://archive.org/embed/Namaz_201412\" width=\"500\" height=\"140\" frameborder=\"0\" webkitallowfullscreen=\"true\" mozallowfullscreen=\"true\" allowfullscreen></iframe>', '2019-06-14 21:26:44'),
(3, 1, 'ders3', '<iframe frameborder=\"0\" height=\"315\" scrolling=\"no\" src=\"https://www.youtube.com/embed/HqOASJExWUI\" width=\"560\"></iframe>', '2019-06-14 22:35:08'),
(4, 1, 'SoundCloud', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/rh2Av8P5tvU\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2019-06-14 22:35:08'),
(5, 1, 'ders2', '<iframe src=\"https://player.vimeo.com/video/341538522?color=ffffff&title=0&byline=0&portrait=0\" width=\"640\" height=\"360\" frameborder=\"0\" allow=\"autoplay; fullscreen\"></iframe>', '2019-06-14 22:35:08'),
(6, 2, 'SoundCloud', 'bir denemek2', '2019-06-14 22:35:20'),
(7, 1, 'ders4', '<iframe frameborder=\"0\" height=\"315\" scrolling=\"no\" src=\"https://www.youtube.com/embed/HqOASJExWUI\" width=\"560\"></iframe>', '2019-06-14 23:33:26'),
(8, 4, 'SoundCloud', '<iframe width=\"100%\" height=\"300\" scrolling=\"no\" frameborder=\"no\" allow=\"autoplay\" src=\"https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/568198284&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true\"></iframe>', '2019-06-15 10:47:41'),
(9, 4, 'dailymotion', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/FVKYgl_ul_E\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2019-06-15 16:09:25');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `baslik` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `resim` varchar(255) NOT NULL,
  `aktif` tinyint(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `slider`
--

INSERT INTO `slider` (`id`, `baslik`, `link`, `resim`, `aktif`) VALUES
(1, 'Deneme1', '', 'images/slider/Deneme1_slider.jpg', 1),
(2, 'Slider 2', '', 'images/slider/slider-2-slider.jpg', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uyeler`
--

CREATE TABLE `uyeler` (
  `id` int(11) NOT NULL,
  `adi` varchar(250) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `sifre` varchar(250) NOT NULL,
  `eposta` varchar(200) NOT NULL,
  `tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `rutbe` tinyint(4) NOT NULL DEFAULT '0',
  `onay` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `uyeler`
--

INSERT INTO `uyeler` (`id`, `adi`, `slug`, `sifre`, `eposta`, `tarih`, `rutbe`, `onay`) VALUES
(0, 'bilinmiyor', 'bilinmiyor', 'bilinmiyorbilinmiyorbilinmiyorbilinmiyor', 'bilinmiyor@yok.com', '2019-04-15 15:56:46', 0, 0),
(1, 'cemal', 'cemal', 'e0d619eac09c5f42a2cca6b8762a1465', 'qdale.123@gmail.com', '2018-05-13 16:13:53', 1, 1),
(2, 'admin', 'admin', 'e0d619eac09c5f42a2cca6b8762a1465', 'qdale.123@gmail.com', '2018-05-13 16:13:53', 1, 1),
(3, 'deneme2', 'deneme2', '0efe53366e7e886c9203698b425ee8bf', '', '2019-03-17 17:02:21', 2, 1),
(4, 'deneme3', 'deneme3', '484ebb0bae6165150647d2f470b9a47b', '', '2019-06-15 15:48:58', 2, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yazarlar`
--

CREATE TABLE `yazarlar` (
  `id` int(11) NOT NULL,
  `uye_id` mediumint(9) NOT NULL,
  `resim` varchar(255) NOT NULL,
  `aciklama` text NOT NULL,
  `kisa_aciklama` text,
  `aktif` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `yazarlar`
--

INSERT INTO `yazarlar` (`id`, `uye_id`, `resim`, `aciklama`, `kisa_aciklama`, `aktif`) VALUES
(21, 3, 'images/yazar_profil/deneme2-yazar.jpg', '<p>asd</p>\r\n', 'asdasd', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yazar_makale`
--

CREATE TABLE `yazar_makale` (
  `id` int(11) NOT NULL,
  `kat_id` smallint(6) NOT NULL DEFAULT '0',
  `uye_id` smallint(6) NOT NULL DEFAULT '0',
  `duz_id` mediumint(9) NOT NULL DEFAULT '0',
  `baslik` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `kisa_aciklama` text NOT NULL,
  `aciklama` text NOT NULL,
  `aktif` tinyint(4) NOT NULL DEFAULT '0',
  `tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `yazar_makale`
--

INSERT INTO `yazar_makale` (`id`, `kat_id`, `uye_id`, `duz_id`, `baslik`, `slug`, `kisa_aciklama`, `aciklama`, `aktif`, `tarih`) VALUES
(1, 1, 3, 1, 'Bir bilen', 'bir-bilen', 'asdasd', '<p><strong>asdasd</strong></p>\r\n\r\n<div style=\"\\&quot;\\\\&quot;\\\\\\\\&quot;\\\\\\\\\\\\\\\\&quot;\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\&quot;page-break-after:always\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\&quot;\\\\\\\\\\\\\\\\&quot;\\\\\\\\&quot;\\\\&quot;\\&quot;\"><strong>&nbsp;asdasd</strong></div>\r\n\r\n<p>&nbsp;</p>\r\n', 2, '2019-04-15 14:56:47'),
(2, 1, 3, 0, 'Yazı deneme1', 'yazi-deneme1', 'Yazı deneme1', '<h1>5- Ahlakının g&uuml;zelliği doğruluktandır</h1>\r\n\r\n<p><strong>G&uuml;zel ahlakın hakikat zeminiyle olan bağı doğruluktur. Doğruluk, adeta kalbin v&uuml;cuda kanı pompalaması gibi, g&uuml;zel ahlakın her hasletine kan pompalar. B&uuml;t&uuml;n g&uuml;zel hasletler, ancak sıdk ve doğruluk ile hayat bulabilirler. Bir kişide doğruluk yoksa, g&uuml;zel ahlak o kişide yerleşmez ve b&uuml;t&uuml;n g&uuml;zel hasletler &ouml;l&uuml;r gider.</strong></p>\r\n\r\n<p><span style=\\\"color:#3498db\\\">G&uuml;zel ahlakı bir ağaca benzetsek ve her g&uuml;zel haslet bu ağacın bir meyvesi olsa; sıdk ve doğruluk bu ağacın suyu ya da k&ouml;k&uuml; olurdu. Nasıl ki ağaca su verilmezse ya da k&ouml;k&uuml; kesilirse ağa&ccedil; kuru gider ve meyveleri &ccedil;&uuml;r&uuml;r; aynen bunun gibi, g&uuml;zel ahlak ağacının suyu ve k&ouml;k&uuml; olan sıdk ve doğruluk olmazsa, diğer b&uuml;t&uuml;n hasletler yok olup gider. B&uuml;t&uuml;n g&uuml;zel hasletlere hayat veren, kuvvet veren, onların devamını sağlayan yalnız sıdk ve doğruluktur.</span></p>\r\n\r\n<p>Siz yalan s&ouml;yleyen ve insanları aldatan birisinde; takva, z&uuml;hd, samimiyet, cesaret gibi sıfatları bulabilir misiniz? Bulamazsınız, nerde kaldı, b&uuml;t&uuml;n g&uuml;zel hasletler, hem de zirve seviyede onda olacak&hellip;</p>\r\n\r\n<p>Bu genel kaideyle, şimdi Hz. Muhammed (sav)&rsquo;e bakalım, O, g&uuml;zel ahlakın b&uuml;t&uuml;n hasletleriyle donatılmıştı. Bu da O&rsquo;nun sıdkına ve doğruluğuna işaret eder. Zira doğru olmasaydı, o g&uuml;zel hasletler onda asla g&ouml;z&uuml;kmeyecekti. Zira doğruluk gittiği zaman, g&uuml;zel ahlak kurur ve meyveleri &ccedil;&uuml;r&uuml;r gider. O zaman:</p>\r\n\r\n<p>Madem O zat, g&uuml;zel ahlakın her hasletiyle donatılmıştır o halde mutlaka sıdk ve doğruluk sahibidir. Zira &ouml;ğrendiğimiz bu kaideye binaen, doğru olmasaydı, ahlakı bu derece g&uuml;zel olamazdı.<br />\r\nVe madem sıdk ve doğruluk sahibidir, o halde her dediği doğrudur ve yalanı olamaz.<br />\r\nVe madem her dediği doğrudur, o halde bu zat Allah&rsquo;ın peygamberi olmalıdır. Zira bu zat, &ldquo;Ben Allah&rsquo;ın peygamberiyim.&rdquo; diyor. Her halinde son derece sadık ve doğru olan birinin b&ouml;yle bir meselede yalan s&ouml;ylemesi m&uuml;mk&uuml;n değildir.</p>\r\n\r\n<p>Şu noktaya da dikkatinizi &ccedil;ekmek istiyoruz: Eğer bu zat doğru s&ouml;ylemiyorsa, o zaman -h&acirc;ş&acirc; y&uuml;z bin defa h&acirc;ş&acirc;- Allah&rsquo;a iftira ediyor ve yalan s&ouml;yl&uuml;yordur. &Ouml;yle ya, bu ikisinin ortası yoktur. O, ya doğruların en doğrusudur. Ya da -h&acirc;ş&acirc; y&uuml;z bin defa h&acirc;ş&acirc;- Allah&rsquo;a iftira edebilecek kadar haddi aşmış, yalancıların en yalancısıdır. Bu ikisinin ortası yoktur.</p>\r\n\r\n<p>Şimdi siz, g&uuml;zel ahlakın her neviyle donatılan bu zatın, yalancıların en yalancısı olmasına ihtimal verebiliyor musunuz? Buna, Şeytan bile ihtimal verdiremez.</p>', 1, '2019-06-02 14:09:54'),
(3, 1, 3, 0, 'makale deneme 3', 'makale-deneme-3', 'makale deneme 3', '<p><strong>makale deneme 3</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\\\"text-align:center\\\"><u><em><strong>makale deneme 3</strong></em></u></p>', 1, '2019-06-02 14:10:24'),
(4, 3, 3, 0, 'Bir deneme farklı kategori', 'bir-deneme-farkli-kategori', 'Bir deneme farklı kategori', '<p>Bir deneme farklı kategori</p>', 1, '2019-06-02 14:11:45'),
(5, 2, 3, 0, 'Buhari hadis 1', 'buhari-hadis-1', 'Buhari hadis 1', '<p><strong>Buhari hadis 1Buhari hadis 1Buhari hadis 1</strong></p>', 1, '2019-06-02 14:12:03');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yazar_makale_kat`
--

CREATE TABLE `yazar_makale_kat` (
  `id` int(11) NOT NULL,
  `ust_kat` mediumint(9) NOT NULL DEFAULT '0',
  `baslik` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `aktif` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `yazar_makale_kat`
--

INSERT INTO `yazar_makale_kat` (`id`, `ust_kat`, `baslik`, `slug`, `tarih`, `aktif`) VALUES
(1, 0, 'Deneme2', 'deneme2', '2019-04-14 20:04:25', 1),
(2, 0, 'Sahih Hadis', 'sahih-hadis', '2019-06-02 14:10:48', 1),
(3, 0, 'Fıkıh', 'fikih', '2019-06-02 14:10:59', 1),
(4, 0, 'Haberler', 'haberler', '2019-06-02 14:11:05', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yazili_dersler`
--

CREATE TABLE `yazili_dersler` (
  `id` int(11) NOT NULL,
  `kat_id` smallint(6) NOT NULL DEFAULT '0',
  `uye_id` smallint(6) NOT NULL DEFAULT '0',
  `duz_id` mediumint(9) NOT NULL DEFAULT '0',
  `baslik` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `kisa_aciklama` text NOT NULL,
  `aciklama` text NOT NULL,
  `aktif` tinyint(4) NOT NULL DEFAULT '0',
  `tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `yazili_dersler`
--

INSERT INTO `yazili_dersler` (`id`, `kat_id`, `uye_id`, `duz_id`, `baslik`, `slug`, `kisa_aciklama`, `aciklama`, `aktif`, `tarih`) VALUES
(3, 4, 1, 1, 'Ya Allah', 'ya-allah', 'Ya Allah kısa açıklama asda', '<p style=\"text-align:center\"><span style=\"font-size:22px\"><span style=\"color:#27ae60\"><strong>Ya Allah a&ccedil;ıklama</strong></span></span></p>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-size:18px\">asdasdasdasdasdasdasdasdasdasdasdasd</span></p>\r\n', 1, '2019-03-31 15:00:15'),
(4, 1, 1, 0, 'Allah ismi şerifi ve bu ismin özellikleri', 'allah-ismi-serifi-ve-bu-ismin-ozellikleri', 'Bu kâinatın sahibi ve bu âlem sarayının sultanı ve bu mülkün maliki olan zatın adı Allah’tır. Ve O, kitabında kendinden bahsederken “Enallah” yani “Ben Allah’ım” diyor.\r\n\r\nBu ismi diğer isimlerden ayıran bazı özellikleri vardır. Şimdi bunları anlamaya çalışalım:\r\n\r\n– Kur’an’da ilk inen ayet besmeledir. Ve Allah ismi besmelede geçen üç isimden ilkidir. Demek Allah ismi Kur’an’da nazil olan ilk isimdir.\r\n\r\n– Allah ismi Esma-ül Hüsna içinde asıldır. Diğer isimler ise bu isme izafe edilir. Mesela “Şâfi, Allah’ın bir ismidir.” denilir ama “Allah, Şâfi’nin bir ismidir.” denilmez. Ya da “Rahman, Allah’ın bir ismidir.” denilir ancak “Allah, Rahman’ın bir ismidir.” denilmez.\r\n\r\n-Allah ismi ism-i âlemdir yani özel isimdir. Mecaz yoluyla da olsa başkası için söylenemez. Bu isim Allah’a has ve ancak ona işaret eden bir isimdir. İlahlık davasına kalkışan Firavun dahi “Ene rabbükümül a’la” “Ben sizin yüce Rabbinizim!” demiş fakat “Enellah” “Ben Allah’ım!” diyememiştir. Allah’ın Rab ismini kullanırken Allah ismini kullanmaya cüret edememiştir.\r\n\r\nYine Mekke müşrikleri Kâbe’nin etrafını 360 putla doldurmuşlar, her birine farklı isimler vermişler ama hiç birine Allah diyememişlerdir. Demek bu isim ancak Allah’a mahsus bir isimdir.\r\n\r\n– İmana girmek kelime-i şehadet ile mümkündür. İmanın temeli olan kelime-i şehadet ise ancak Allah ismi ile kabul olur. Mesela bir gayrimüslim, Müslüman olmak için “Eşhedü enla ilahe illallah…” yerine “Eşhedü enla ilahe ille-r Rahman” veya “Eşhedü enla ilahe ille-l Melik” dese İslam’a girmiş olmaz. Çünkü Allah ismi, tek ve ortaksız olarak Cenab-ı Hakk’ın zatını ifade eden has bir isimdir. Has isimlerde ortaklık manasını düşünmek mümkün değildir. Bunun için bu isimde hakiki bir tevhid vardır. Diğer isimlerde ise bu hakiki tevhid olmadığından ve onlar ile Allah’ın birliği ikrar edilmediğinden iman kabul edilmez.\r\n\r\n– Allah ismini teşkil eden harfler birer birer kaldırılsa mana yine de bozulmaz. Bu özellik diğer isimlerde yoktur. Mesela Melik ismindeki “mim” harfi kaldırılsa “lik” olur ki hiçbir mana ifade etmez. Ya da Samed ismindeki “sad” kaldırılsa “med” olur ki bu da hiçbir mana ifade etmez.\r\n\r\nHâlbuki Allah isminin lafzında bir camiiyyet yani toplayıcılık vardır. Mesela:\r\n\r\n• Baştaki elif kaldırılırsa “lillah” olur, bu da Allah demektir.\r\n\r\n• “Lillah”daki birinci lam kaldırılsa “lehu” olur, bu da ona işaret eder.\r\n\r\n• Bu “lam” da kaldırılsa “hu” olur ki yine Allah’ı ifade eder.\r\n\r\n• Hatta “hu”daki gizli “vav” kaldırılıp “he” kalsa yine Allah’a delalet eder. Çünkü “hu” isminin de aslı “he”dir. ”Vav” asıl değil, ilavedir. Bu sırdan dolayı her canlı teneffüs ederken “he, he, he” demek suretiyle Allah’ı zikretmektedir.\r\n\r\n– Allah isminin manasında toplayıcılık vardır, diğer isimlerde bu yoktur. Diğer isimler yalnız bir manaya işaret ederler. Mesela “Hadi” ismi sadece “hidayet veren” manasında, “Nafi” ismi ise sadece “menfaat veren” manasında, “Halik” ismi” ise sadece “yaratıcı” manasındadır. Fakat Allah ismi bunlardaki ve diğer isimlerdeki manaların hepsini toplu bir şekilde ifade eder.\r\n\r\nNasıl ki Güneş dediğimizde yedi renk, ısı ve ışık gibi sıfatlara sahip olan bir ışık kaynağı aklımıza gelir ve bu sıfatları kendinde bulunduramayan Güneş olamaz.\r\n\r\nAynen bunun gibi, “Allah” ismi denildiğinde de bütün kemal sıfatları ve isimleri kendinde bulunduran Zat-ı Akdes akla gelir. Bu isim ve sıfatları kendinde bulunduramayana Allah denilemez.\r\n\r\nO hâlde madem Allah’tır, bütün kemal sıfatlarla sıfatlanmıştır. Bunun içindir ki bu manadaki topluluğu düşünerek “Allah” diyen bir kimse Cenab-ı Hakk’ı bütün isim ve sıfatlarıyla zikretmiş olur.', '<p>Bu k&acirc;inatın sahibi ve&nbsp;bu &acirc;lem sarayının sultanı ve bu m&uuml;lk&uuml;n maliki olan zatın adı Allah&rsquo;tır. Ve O, kitabında kendinden bahsederken &ldquo;Enallah&rdquo; yani &ldquo;Ben Allah&rsquo;ım&rdquo; diyor.</p>\r\n\r\n<p>Bu ismi diğer isimlerden ayıran bazı &ouml;zellikleri vardır. Şimdi bunları anlamaya &ccedil;alışalım:</p>\r\n\r\n<p>&ndash; Kur&rsquo;an&rsquo;da ilk inen ayet besmeledir. Ve Allah ismi besmelede ge&ccedil;en &uuml;&ccedil; isimden ilkidir. Demek&nbsp;<strong>Allah ismi Kur&rsquo;an&rsquo;da nazil olan ilk isimdir.</strong></p>\r\n\r\n<p><strong>&ndash; Allah ismi Esma-&uuml;l H&uuml;sna i&ccedil;inde asıldır.</strong>&nbsp;Diğer isimler ise bu isme izafe edilir. Mesela &ldquo;Ş&acirc;fi, Allah&rsquo;ın bir ismidir.&rdquo; denilir ama &ldquo;Allah, Ş&acirc;fi&rsquo;nin bir ismidir.&rdquo; denilmez. Ya da &ldquo;Rahman, Allah&rsquo;ın bir ismidir.&rdquo; denilir ancak &ldquo;Allah, Rahman&rsquo;ın bir ismidir.&rdquo; denilmez.</p>\r\n\r\n<p><strong>-Allah ismi ism-i &acirc;lemdir yani &ouml;zel isimdir.</strong>&nbsp;Mecaz yoluyla da olsa başkası i&ccedil;in s&ouml;ylenemez. Bu isim Allah&rsquo;a has ve ancak ona işaret eden bir isimdir. İlahlık davasına kalkışan Firavun dahi &ldquo;Ene rabb&uuml;k&uuml;m&uuml;l a&rsquo;la&rdquo; &ldquo;Ben sizin y&uuml;ce Rabbinizim!&rdquo; demiş fakat &ldquo;Enellah&rdquo; &ldquo;Ben Allah&rsquo;ım!&rdquo; diyememiştir. Allah&rsquo;ın Rab ismini kullanırken Allah ismini kullanmaya c&uuml;ret edememiştir.</p>\r\n\r\n<p>Yine Mekke m&uuml;şrikleri K&acirc;be&rsquo;nin etrafını 360 putla doldurmuşlar, her birine farklı isimler vermişler ama hi&ccedil; birine Allah diyememişlerdir. Demek bu isim ancak Allah&rsquo;a mahsus bir isimdir.</p>\r\n\r\n<p><strong>&ndash; İmana girmek kelime-i şehadet ile m&uuml;mk&uuml;nd&uuml;r.</strong>&nbsp;İmanın temeli olan kelime-i şehadet ise ancak Allah ismi ile kabul olur. Mesela bir gayrim&uuml;slim, M&uuml;sl&uuml;man olmak i&ccedil;in &ldquo;Eşhed&uuml; enla ilahe illallah&hellip;&rdquo; yerine &ldquo;Eşhed&uuml; enla ilahe ille-r Rahman&rdquo; veya &ldquo;Eşhed&uuml; enla ilahe ille-l Melik&rdquo; dese İslam&rsquo;a girmiş olmaz. &Ccedil;&uuml;nk&uuml; Allah ismi, tek ve ortaksız olarak Cenab-ı Hakk&rsquo;ın zatını ifade eden has bir isimdir. Has isimlerde ortaklık manasını d&uuml;ş&uuml;nmek m&uuml;mk&uuml;n değildir. Bunun i&ccedil;in bu isimde hakiki bir tevhid vardır. Diğer isimlerde ise bu hakiki tevhid olmadığından ve onlar ile Allah&rsquo;ın birliği ikrar edilmediğinden&nbsp;iman kabul edilmez.</p>\r\n\r\n<p><strong>&ndash; Allah ismini teşkil eden harfler birer birer kaldırılsa mana yine de bozulmaz.</strong>&nbsp;Bu &ouml;zellik diğer isimlerde yoktur. Mesela Melik ismindeki &ldquo;mim&rdquo; harfi kaldırılsa &ldquo;lik&rdquo; olur ki hi&ccedil;bir mana ifade etmez. Ya da Samed ismindeki &ldquo;sad&rdquo; kaldırılsa &ldquo;med&rdquo; olur ki bu da hi&ccedil;bir mana ifade etmez.</p>\r\n\r\n<p>H&acirc;lbuki Allah isminin lafzında bir camiiyyet yani toplayıcılık vardır. Mesela:</p>\r\n\r\n<p>&bull; Baştaki elif kaldırılırsa &ldquo;lillah&rdquo; olur, bu da Allah demektir.</p>\r\n\r\n<p>&bull; &ldquo;Lillah&rdquo;daki birinci lam kaldırılsa &ldquo;lehu&rdquo; olur, bu da ona işaret eder.</p>\r\n\r\n<p>&bull; Bu &ldquo;lam&rdquo; da kaldırılsa &ldquo;hu&rdquo; olur ki yine Allah&rsquo;ı ifade eder.</p>\r\n\r\n<p>&bull; Hatta &ldquo;hu&rdquo;daki gizli &ldquo;vav&rdquo; kaldırılıp &ldquo;he&rdquo; kalsa yine Allah&rsquo;a delalet eder. &Ccedil;&uuml;nk&uuml; &ldquo;hu&rdquo; isminin de aslı &ldquo;he&rdquo;dir. &rdquo;Vav&rdquo; asıl değil, ilavedir. Bu sırdan dolayı her canlı teneff&uuml;s ederken &ldquo;he, he, he&rdquo; demek suretiyle Allah&rsquo;ı zikretmektedir.</p>\r\n\r\n<p><strong>&ndash; Allah isminin manasında toplayıcılık vardır</strong>, diğer isimlerde bu yoktur. Diğer isimler yalnız bir manaya işaret ederler. Mesela &ldquo;Hadi&rdquo; ismi sadece &ldquo;hidayet veren&rdquo; manasında, &ldquo;Nafi&rdquo; ismi ise sadece &ldquo;menfaat veren&rdquo; manasında, &ldquo;Halik&rdquo; ismi&rdquo; ise sadece &ldquo;yaratıcı&rdquo; manasındadır. Fakat Allah ismi bunlardaki ve diğer isimlerdeki manaların hepsini toplu bir şekilde ifade eder.</p>\r\n\r\n<p>Nasıl ki G&uuml;neş dediğimizde yedi renk, ısı ve ışık gibi sıfatlara sahip olan bir ışık kaynağı aklımıza gelir ve bu sıfatları kendinde bulunduramayan G&uuml;neş olamaz.</p>\r\n\r\n<p>Aynen bunun gibi, &ldquo;Allah&rdquo; ismi denildiğinde de b&uuml;t&uuml;n kemal sıfatları ve isimleri kendinde bulunduran Zat-ı Akdes akla gelir. Bu isim ve sıfatları kendinde bulunduramayana Allah denilemez.</p>\r\n\r\n<p>O h&acirc;lde madem Allah&rsquo;tır, b&uuml;t&uuml;n kemal sıfatlarla sıfatlanmıştır. Bunun i&ccedil;indir ki bu manadaki topluluğu d&uuml;ş&uuml;nerek &ldquo;Allah&rdquo; diyen bir kimse Cenab-ı Hakk&rsquo;ı b&uuml;t&uuml;n isim ve sıfatlarıyla zikretmiş olur.</p>\r\n', 1, '2019-06-15 11:00:32'),
(5, 1, 1, 0, 'Er-Rahman', 'er-rahman', 'Rahman: Bütün mahlukatına sayısız nimetler ve rızıklar veren, onların ihtiyaçlarını gören ve yarattıkları hakkında hayır ve rahmet dileyen manasındadır. Şu âleme baktığımızda gözümüzle görüyoruz ki birisi var, yeryüzünü bir sofra yapmış, o sofrayı en leziz yiyecekler ile doldurmuş ve o sofraya bütün canlıları davet etmiş. Şimdi gelin hayalen bu sofralarda gezelim:\r\n\r\nİşte hayvanatın sofrası! Bakın, her hayvana layık olduğu ve ihtiyaç duyduğu rızık veriliyor.\r\n\r\n1- İşte balıklar! Onları besleyen ne de güzel besliyor, rızıkları ağızlarına kadar konuluyor. Kim onları böyle zahmetsizce besleyen?', '<p>Rahman: B&uuml;t&uuml;n mahlukatına sayısız nimetler ve rızıklar veren, onların ihtiya&ccedil;larını g&ouml;ren ve yarattıkları hakkında hayır ve rahmet dileyen manasındadır. Şu &acirc;leme baktığımızda g&ouml;z&uuml;m&uuml;zle g&ouml;r&uuml;yoruz ki birisi var, yery&uuml;z&uuml;n&uuml; bir sofra yapmış, o sofrayı en leziz yiyecekler ile doldurmuş ve o sofraya b&uuml;t&uuml;n canlıları davet etmiş. Şimdi gelin hayalen bu sofralarda gezelim:</p>\r\n\r\n<p>İşte hayvanatın sofrası! Bakın, her hayvana layık olduğu ve ihtiya&ccedil; duyduğu rızık veriliyor.</p>\r\n\r\n<p>1- İşte balıklar! Onları besleyen ne de g&uuml;zel besliyor, rızıkları&nbsp;ağızlarına kadar konuluyor. Kim onları b&ouml;yle zahmetsizce besleyen?</p>\r\n\r\n<p>2- İşte denizlerin dipleri! Karanlık, ıssız, acı bir su, kum ve &ccedil;aresiz mahluklar! Ancak hi&ccedil;birinin rızkı unutulmuyor, hi&ccedil;biri a&ccedil; bırakılmıyor ve ihtiya&ccedil;ları m&uuml;kemmel bir şekilde karşılanıyor. Kim onları b&ouml;yle merhametle besleyip denizin dibini onlara Rahman&icirc; bir sofra yapan? Ve o sofradan istifade edebilmeleri i&ccedil;in gerekli cihazları onlara takan?</p>\r\n\r\n<p>3- İşte b&ouml;cekler! K&uuml;&ccedil;&uuml;c&uuml;k, zayıf ve &acirc;cizler! Ama ne kadar da kolay besleniyorlar. Muhta&ccedil;lar. G&uuml;&ccedil;leri yok. Kimi elsiz, kimi g&ouml;zs&uuml;z, kimi ayaksız. Ancak ihtiya&ccedil;ları ve rızıkları ellerinin yetişmediği yerlerden&nbsp;ne de&nbsp;m&uuml;kemmel veriliyor. Kim bu &acirc;cizlere merhamet edip ihtiya&ccedil;larını g&ouml;ren?</p>\r\n\r\n<p>4- İşte &acirc;ciz ve merhamete muhta&ccedil; yavrular! Rızıkları umulmadık ve ellerinin yetişmediği bir yerden, m&uuml;nasip bir vakitte ve ihtiya&ccedil; nispetinde onlara veriliyor. Yardımlarına koşuluyor. H&acirc;lbuki ihtiya&ccedil;larının y&uuml;zde birini karşılamaya kendi g&uuml;&ccedil;leri yetmez. Demek onların ihtiyacını bilen, onları merhamet ve&nbsp;şefkatle besleyen perde arkasında birisi var. Kim bu zat?&nbsp;Cevabı Kur&rsquo;an versin:</p>\r\n\r\n<p><strong>&ldquo;Yery&uuml;z&uuml;nde rızkı Allah&rsquo;a ait olmayan hi&ccedil;bir canlı yoktur. O, onların karar kıldıkları yerleri de emaneten durdukları yerleri de bilir. Onların hepsi apa&ccedil;ık bir kitaptadır.&rdquo; (Hud 6)</strong></p>\r\n\r\n<p>Ve Rahman&rsquo;ın o sofrasından istifade eden&nbsp;diğer muhta&ccedil;lar! Şimdi de Rahman&rsquo;ın sofrasında misafir olan bitkiler taifesine bakalım!&nbsp;Hayvanlara kıyasla daha &acirc;ciz ve daha fakir! Ama &acirc;cizliklerine binaen Rahman olan Allah onları daha zahmetsiz besliyor. Rızıkları ayaklarına g&ouml;nderiliyor. Bazen oluyor sıcaktan ve susuzluktan feryat eden o bitkilere bir bulut ordusu ile imdat ediliyor. G&uuml;neş başlarında lamba ve soba, toprak altlarında mineraller ile dolu bir mahzen. Ciğerleri h&uuml;km&uuml;nde olan yaprakları ile havayı teneff&uuml;s ediyorlar.</p>\r\n\r\n<p>Kim bu bitkilerin feryadını işitip&nbsp;cansız mahlukatın elleriyle onlara yardım eden?</p>\r\n\r\n<p>Ve şimdi&nbsp;bu bu Rahman&icirc; sofranın en şerefli misafirine geldik! Sofranın kurulmasının sebebi, yery&uuml;z&uuml;n&uuml;n halifesi ve Rahman olan Allah&rsquo;ın has muhatabı olan insan! Bakalım şerefine sofraların kurulduğu insan i&ccedil;in Allah neler hazırlamış ve Rahman isminin tecellisini o sofralarda nasıl g&ouml;stermiş!</p>\r\n\r\n<p>Acaba Rahman olan Allah&rsquo;ımız, rahmetinin bu kadar s&uuml;sl&uuml; meyveleriyle kendini bize sevdirmek istese. Mukabilinde insan&nbsp;ibadetle kendini&nbsp;O&rsquo;na sevdirmese. Hem bu kadar t&uuml;rl&uuml; t&uuml;rl&uuml; nimetlerle muhabbet ve rahmetini g&ouml;sterse. Mukabilinde insan ş&uuml;k&uuml;r ve hamd ile ona h&uuml;rmet etmezse&nbsp;bu insan, insan&nbsp;ismine layık mıdır?</p>\r\n\r\n<p>H&acirc;lbuki b&uuml;t&uuml;n bu nimetlerin veriliş sebebini Rabbimiz kitabında ş&ouml;yle beyan etmiştir:</p>\r\n\r\n<p><strong>&ldquo;Ey iman edenler! Size verdiğimiz rızıkların hoş ve temiz olanlarından yiyin ve Allah&rsquo;a ş&uuml;kredin! Eğer yalnız O&rsquo;na kulluk ediyorsanız.&rdquo; (Bakara 172)</strong></p>\r\n', 1, '2019-06-15 11:01:05');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yazili_dersler_kat`
--

CREATE TABLE `yazili_dersler_kat` (
  `id` int(11) NOT NULL,
  `ust_kat` mediumint(9) NOT NULL DEFAULT '0',
  `baslik` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `aktif` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `yazili_dersler_kat`
--

INSERT INTO `yazili_dersler_kat` (`id`, `ust_kat`, `baslik`, `slug`, `tarih`, `aktif`) VALUES
(1, 0, 'Deneme', 'deneme', '2019-03-31 14:34:31', 1),
(2, 1, 'Alt Kategori 1', 'alt-kategori-1', '2019-03-31 14:34:45', 1),
(3, 1, 'Alt Kategori 2', 'alt-kategori-2', '2019-03-31 14:35:41', 1),
(4, 1, 'Alt Kategori 3', 'alt-kategori-3', '2019-03-31 14:35:50', 1),
(5, 0, 'Deneme1', 'deneme1', '2019-04-14 20:03:59', 1);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ayarlar`
--
ALTER TABLE `ayarlar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `calisma`
--
ALTER TABLE `calisma`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `dost_dernek`
--
ALTER TABLE `dost_dernek`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `dost_dernek_kat`
--
ALTER TABLE `dost_dernek_kat`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `goruntulu_dersler`
--
ALTER TABLE `goruntulu_dersler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `goruntulu_dersler_kat`
--
ALTER TABLE `goruntulu_dersler_kat`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `goruntulu_extra`
--
ALTER TABLE `goruntulu_extra`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `iletisim`
--
ALTER TABLE `iletisim`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `mail_sistem`
--
ALTER TABLE `mail_sistem`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sabit_extra`
--
ALTER TABLE `sabit_extra`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sayfalar`
--
ALTER TABLE `sayfalar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sesli_dersler`
--
ALTER TABLE `sesli_dersler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sesli_dersler_kat`
--
ALTER TABLE `sesli_dersler_kat`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sesli_extra`
--
ALTER TABLE `sesli_extra`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `uyeler`
--
ALTER TABLE `uyeler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `yazarlar`
--
ALTER TABLE `yazarlar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `yazar_makale`
--
ALTER TABLE `yazar_makale`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `yazar_makale_kat`
--
ALTER TABLE `yazar_makale_kat`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `yazili_dersler`
--
ALTER TABLE `yazili_dersler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `yazili_dersler_kat`
--
ALTER TABLE `yazili_dersler_kat`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `ayarlar`
--
ALTER TABLE `ayarlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Tablo için AUTO_INCREMENT değeri `calisma`
--
ALTER TABLE `calisma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `dost_dernek`
--
ALTER TABLE `dost_dernek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `dost_dernek_kat`
--
ALTER TABLE `dost_dernek_kat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `goruntulu_dersler`
--
ALTER TABLE `goruntulu_dersler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `goruntulu_dersler_kat`
--
ALTER TABLE `goruntulu_dersler_kat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `goruntulu_extra`
--
ALTER TABLE `goruntulu_extra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Tablo için AUTO_INCREMENT değeri `iletisim`
--
ALTER TABLE `iletisim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Tablo için AUTO_INCREMENT değeri `mail_sistem`
--
ALTER TABLE `mail_sistem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `sabit_extra`
--
ALTER TABLE `sabit_extra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `sayfalar`
--
ALTER TABLE `sayfalar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `sesli_dersler`
--
ALTER TABLE `sesli_dersler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `sesli_dersler_kat`
--
ALTER TABLE `sesli_dersler_kat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `sesli_extra`
--
ALTER TABLE `sesli_extra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `uyeler`
--
ALTER TABLE `uyeler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `yazarlar`
--
ALTER TABLE `yazarlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Tablo için AUTO_INCREMENT değeri `yazar_makale`
--
ALTER TABLE `yazar_makale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `yazar_makale_kat`
--
ALTER TABLE `yazar_makale_kat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `yazili_dersler`
--
ALTER TABLE `yazili_dersler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `yazili_dersler_kat`
--
ALTER TABLE `yazili_dersler_kat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
