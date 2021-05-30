
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hometeq`
--

-- --------------------------------------------------------

--
-- Table structure for table `messgae`
--

CREATE TABLE `messgae` (
  `messageId` int(11) NOT NULL,
  `senderId` int(11) NOT NULL,
  `receiverId` int(11) NOT NULL,
  `message` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messgae`
--

INSERT INTO `messgae` (`messageId`, `senderId`, `receiverId`, `message`) VALUES
(19, 7, 12, 'Hello admin'),
(20, 7, 12, 'Can I ask you a question'),
(21, 12, 7, 'What\'s your question pasindu'),
(34, 7, 3, 'HELLO ');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderNo` int(4) NOT NULL,
  `userId` int(4) NOT NULL,
  `orderDateTime` datetime NOT NULL,
  `orderTotal` decimal(8,2) DEFAULT '0.00',
  `orderStatus` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderNo`, `userId`, `orderDateTime`, `orderTotal`, `orderStatus`) VALUES
(28, 7, '2020-04-09 19:23:19', '4680.00', 'Collected'),
(30, 7, '2020-04-09 20:41:59', '4680.00', 'Ready'),
(31, 7, '2020-04-09 20:42:30', '4680.00', 'Placed'),
(34, 7, '2020-04-11 22:00:29', '999.00', 'Placed'),
(35, 7, '2020-06-19 23:30:09', '600.00', 'Placed');

-- --------------------------------------------------------

--
-- Table structure for table `order_line`
--

CREATE TABLE `order_line` (
  `orderLineId` int(4) NOT NULL,
  `orderNo` int(4) NOT NULL,
  `prodId` int(4) NOT NULL,
  `quantityOrdered` int(4) NOT NULL,
  `subTotal` decimal(8,2) DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_line`
--

INSERT INTO `order_line` (`orderLineId`, `orderNo`, `prodId`, `quantityOrdered`, `subTotal`) VALUES
(5, 28, 1, 1, '200.00'),
(6, 28, 3, 9, '1980.00'),
(7, 28, 6, 10, '2500.00'),
(11, 30, 1, 1, '200.00'),
(12, 30, 3, 9, '1980.00'),
(13, 30, 6, 10, '2500.00'),
(14, 31, 1, 1, '200.00'),
(15, 31, 3, 9, '1980.00'),
(16, 31, 6, 10, '2500.00'),
(19, 34, 3, 1, '399.00'),
(20, 34, 7, 1, '600.00'),
(21, 35, 7, 1, '600.00');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prodId` int(4) NOT NULL,
  `prodName` varchar(30) NOT NULL,
  `prodPicNameSmall` varchar(100) NOT NULL,
  `prodPicnameLarge` varchar(100) NOT NULL,
  `prodDescripShort` varchar(1000) DEFAULT NULL,
  `prodDescripLong` varchar(3000) DEFAULT NULL,
  `prodPrice` decimal(10,0) NOT NULL,
  `prodQuantity` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prodId`, `prodName`, `prodPicNameSmall`, `prodPicnameLarge`, `prodDescripShort`, `prodDescripLong`, `prodPrice`, `prodQuantity`) VALUES
(1, 'LG G8 ThinQ - 128GB', 'lg_small.jpg', 'lg_large.jpg', 'Released 2019, April\r\n167g, 8.4mm thickness\r\nAndroid 9.0, up to Android 10.0; LG UX 9.0\r\n128GB storage, microSDXC', 'Network 	Technology 	\r\nGSM / CDMA / HSPA / EVDO / LTE\r\nLaunch 	Announced 	2019, February\r\nStatus 	Available. Released 2019, April\r\nBody 	Dimensions 	151.9 x 71.8 x 8.4 mm (5.98 x 2.83 x 0.33 in)\r\nWeight 	167 g (5.89 oz)\r\nBuild 	Glass front (Gorilla Glass 5), glass back (Gorilla Glass 6), aluminum frame\r\nSIM 	Single SIM (Nano-SIM) or Hybrid Dual SIM (Nano-SIM, dual stand-by)\r\n 	IP68 dust/water resistant (up to 1.5m for 30 mins)\r\nMIL-STD-810G compliant\r\nDisplay 	Type 	P-OLED capacitive touchscreen, 16M colors\r\nSize 	6.1 inches, 91.0 cm2 (~83.5% screen-to-body ratio)\r\nResolution 	1440 x 3120 pixels, 19.5:9 ratio (~564 ppi density)\r\nProtection 	Corning Gorilla Glass 5\r\n 	DCI-P3 100%\r\nHDR10\r\nDolby Vision\r\nAlways-on display\r\nPlatform 	OS 	Android 9.0 (Pie), upgradable to Android 10.0; LG UX 9.0\r\nChipset 	Qualcomm SM8150 Snapdragon 855 (7 nm)\r\nCPU 	Octa-core (1x2.84 GHz Kryo 485 & 3x2.42 GHz Kryo 485 & 4x1.78 GHz Kryo 485)\r\nGPU 	Adreno 640\r\nMemory 	Card slot 	microSDXC (dedicated slot) - single-SIM model\r\nmicroSDXC (uses shared SIM slot) - dual-SIM model\r\nInternal 	128GB 6GB RAM\r\n 	UFS 2.1\r\nMain Camera 	Dual or Triple 	12 MP, f/1.5, 27mm (standard), 1/2.55\", 1.4µm, Dual pixel PDAF, OIS\r\n16 MP, f/1.9, 16mm (ultrawide), 1/3.1\", 1.0µm, no AF\r\nor\r\n12 MP, f/1.5, 27mm (standard), 1/2.55\", 1.4µm, dual pixel PDAF, OIS\r\n16 MP, f/1.9, 16mm (ultrawide), 1/3.1\", 1.0µm, no AF\r\n12 MP, 52mm (telephoto), f/2.4, 1.0µm, 2x optical zoom, dual pixel PDAF, OIS\r\nFeatures 	LED flash, HDR, panorama\r\nVideo 	2160p@30/60fps, 1080p@30/60fps, 720p@240fps, HDR10, 24-bit/192kHz stereo sound rec.\r\nSelfie camera 	Dual 	8 MP, f/1.7, 26mm (wide), 1/3.6\", 1.22µm, AF\r\nTOF 3D, f/1.4, (depth/biometrics sensor)\r\nFeatures 	HDR\r\nVideo 	1080p@60fps\r\nSound 	Loudspeaker 	Yes\r\n3.5mm jack 	Yes\r\n 	32-bit/192kHz audio\r\nComms 	WLAN 	Wi-Fi 802.11 a/b/g/n/ac, dual-band, Wi-Fi Direct, DLNA, hotspot\r\nBluetooth 	5.0, A2DP, LE, aptX HD\r\nGPS 	Yes, with A-GPS, GLONASS, GALILEO, BDS\r\nNFC 	Yes\r\nRadio 	FM radio\r\nUSB 	3.1, Type-C 1.0 reversible connector, USB On-The-Go\r\nFeatures 	Sensors 	Face ID, Hand ID, fingerprint (rear-mounted), accelerometer, gyro, proximity, compass, barometer\r\nBattery 	  	Non-removable Li-Po 3500 mAh battery\r\nCharging 	Fast battery charging 21W (Quick Charge 3.0)\r\nUSB Power Delivery\r\nWireless charging 9W\r\nMisc 	Colors 	Platinum Gray, New Aurora Black, New Moroccan Blue, Carmine Red\r\nModels 	LMG820QM7, LM-G820UMB, LMG820UM0, LMG820UM1, LMG820UM2, LM-G820N, LM-G820, LM-G850\r\nPrice 	$?270.00 / £?290.00\r\nTests 	Performance 	AnTuTu: 331537 (v7), 362730 (v8)\r\nGeekBench: 10735 (v4.4), 2700 (v5.1)\r\nGFXBench: 20fps (ES 3.1 onscreen)\r\nDisplay 	Contrast ratio: infinite\r\nCamera 	Photo / Video\r\nLoudspeaker 	Voice 68dB / Noise 74dB / Ring 92dB\r\nAudio quality 	Noise -94.1dB / Crosstalk -87.6dB\r\nBattery life 	\r\nEndurance rating 79h', '200', 56),
(3, 'Google Pixel 3', 'pixel_small.jpg', 'pixel_large.jpg', 'Released 2018, November\r\n148g, 7.9mm thickness\r\nAndroid 9.0, up to Android 10.0\r\n64GB/128GB storage, no card slot', 'Network 	Technology 	\r\nGSM / CDMA / HSPA / EVDO / LTE\r\n2G bands 	GSM 850 / 900 / 1800 / 1900\r\n  	CDMA 800 / 1900\r\n3G bands 	HSDPA 850 / 900 / 1700(AWS) / 1900 / 2100\r\n  	CDMA2000 1xEV-DO\r\n4G bands 	LTE band 1(2100), 2(1900), 3(1800), 4(1700/2100), 5(850), 7(2600), 8(900), 12(700), 13(700), 17(700), 18(800), 19(800), 20(800), 25(1900), 26(850), 28(700), 29(700), 32(1500), 38(2600), 39(1900), 40(2300), 41(2500), 42(3500), 46(5200), 66(1700/2100), 71(600)\r\nSpeed 	HSPA 42.2/5.76 Mbps, LTE-A (5CA) Cat16 1024/75 Mbps\r\nLaunch 	Announced 	2018, October\r\nStatus 	Available. Released 2018, November\r\nBody 	Dimensions 	145.6 x 68.2 x 7.9 mm (5.73 x 2.69 x 0.31 in)\r\nWeight 	148 g (5.22 oz)\r\nBuild 	Glass front (Gorilla Glass 5), glass back (Gorilla Glass 5), aluminum frame\r\nSIM 	Nano-SIM card & eSIM\r\n 	IP68 dust/water resistant (up to 1.5m for 30 mins)\r\nDisplay 	Type 	P-OLED capacitive touchscreen, 16M colors\r\nSize 	5.5 inches, 76.7 cm2 (~77.2% screen-to-body ratio)\r\nResolution 	1080 x 2160 pixels, 18:9 ratio (~443 ppi density)\r\nProtection 	Corning Gorilla Glass 5\r\n 	DCI-P3 100%\r\nHDR\r\nAlways-on display\r\nPlatform 	OS 	Android 9.0 (Pie), upgradable to Android 10.0\r\nChipset 	Qualcomm SDM845 Snapdragon 845 (10 nm)\r\nCPU 	Octa-core (4x2.5 GHz Kryo 385 Gold & 4x1.6 GHz Kryo 385 Silver)\r\nGPU 	Adreno 630\r\nMemory 	Card slot 	No\r\nInternal 	64GB 4GB RAM, 128GB 4GB RAM\r\n 	UFS 2.1\r\nMain Camera 	Single 	12.2 MP, f/1.8, 28mm (wide), 1/2.55\", 1.4µm, dual pixel PDAF, OIS\r\nFeatures 	Dual-LED flash, Auto-HDR, panorama\r\nVideo 	2160p@30fps, 1080p@30/60/120fps, 1080p@30fps (gyro-EIS)\r\nSelfie camera 	Dual 	8 MP, f/1.8, 28mm (wide), PDAF\r\n8 MP, f/2.2, 19mm (ultrawide), no AF\r\nFeatures 	Auto-HDR\r\nVideo 	1080p@30fps\r\nSound 	Loudspeaker 	Yes, with stereo speakers\r\n3.5mm jack 	No\r\nComms 	WLAN 	Wi-Fi 802.11 a/b/g/n/ac, dual-band, Wi-Fi Direct, DLNA, hotspot\r\nBluetooth 	5.0, A2DP, LE, aptX HD\r\nGPS 	Yes, with A-GPS, GLONASS, BDS, GALILEO\r\nNFC 	Yes\r\nRadio 	No\r\nUSB 	3.1, Type-C 1.0 reversible connector\r\nFeatures 	Sensors 	Fingerprint (rear-mounted), accelerometer, gyro, proximity, compass, barometer\r\nBattery 	  	Non-removable Li-Po 2915 mAh battery\r\nCharging 	Fast battery charging 18W\r\nUSB Power Delivery 2.0\r\nQI wireless charging\r\nMisc 	Colors 	Clearly White, Just Black, Not Pink\r\nPrice 	$?262.87 / €?449.48 / £?450.00 / ??47,999\r\nTests 	Performance 	AnTuTu: 285044 (v7)\r\nGeekBench: 8337 (v4.4)\r\nGFXBench: 33fps (ES 3.1 onscreen)\r\nDisplay 	Contrast ratio: Infinite (nominal), 4.350 (sunlight)\r\nCamera 	Photo / Video\r\nLoudspeaker 	Voice 77dB / Noise 71dB / Ring 81dB\r\nAudio quality 	Noise -71.7dB / Crosstalk -70.1dB\r\nBattery life 	\r\nEndurance rating 69h', '399', 26),
(5, 'Motorola Moto G8+ Plus XT2019-', 'motorola_small.jpg', 'motorola_large.jpg', 'Released 2019, October\r\n188g, 9.1mm thickness\r\nAndroid 9.0\r\n64GB storage, microSDXC', 'Network 	Technology 	\r\nGSM / HSPA / LTE\r\n2G bands 	GSM 850 / 900 / 1800 / 1900 - SIM 1 & SIM 2 (dual-SIM model only)\r\n3G bands 	HSDPA 850 / 900 / 1700(AWS) / 1900 / 2100\r\n4G bands 	LTE band 1(2100), 2(1900), 3(1800), 4(1700/2100), 5(850), 7(2600), 8(900), 18(800), 19(800), 20(800), 26(850), 28(700), 38(2600), 40(2300), 41(2500)\r\n  	LTE band 1(2100), 2(1900), 3(1800), 4(1700/2100), 5(850), 7(2600), 8(900), 12(700), 17(700), 28(700), 66(1700/2100) - LATAM\r\nSpeed 	HSPA 42.2/5.76 Mbps, LTE-A (2CA) Cat13 600/100 Mbps\r\nLaunch 	Announced 	2019, October\r\nStatus 	Available. Released 2019, October\r\nBody 	Dimensions 	158.4 x 75.8 x 9.1 mm (6.24 x 2.98 x 0.36 in)\r\nWeight 	188 g (6.63 oz)\r\nBuild 	Glass front, plastic back, plastic frame\r\nSIM 	Single SIM (Nano-SIM) or Hybrid Dual SIM (Nano-SIM, dual stand-by)\r\n 	Splash resistant\r\nDisplay 	Type 	LTPS IPS LCD capacitive touchscreen, 16M colors\r\nSize 	6.3 inches, 99.1 cm2 (~82.5% screen-to-body ratio)\r\nResolution 	1080 x 2280 pixels, 19:9 ratio (~400 ppi density)\r\nPlatform 	OS 	Android 9.0 (Pie)\r\nChipset 	Qualcomm SDM665 Snapdragon 665 (11 nm)\r\nCPU 	Octa-core (4x2.0 GHz Kryo 260 Gold & 4x1.8 GHz Kryo 260 Silver)\r\nGPU 	Adreno 610\r\nMemory 	Card slot 	microSDXC (uses shared SIM slot)\r\nInternal 	64GB 4GB RAM\r\n 	eMMC 5.1\r\nMain Camera 	Triple 	48 MP, f/1.7, 26mm (wide), 1/2.0\", 0.8µm, PDAF, Laser AF\r\n16 MP, f/2.2, 14mm (ultrawide), dedicated video camera (1080p)\r\n5 MP, f/2.2, (depth)\r\nFeatures 	LED flash, HDR, panorama\r\nVideo 	2160p@30fps, 1080p@30/60/120fps, 1080p@30fps (gyro-EIS)\r\nSelfie camera 	Single 	25 MP, f/2.0, 0.9µm\r\nFeatures 	HDR\r\nVideo 	1080p@30/120fps\r\nSound 	Loudspeaker 	Yes, with stereo speakers\r\n3.5mm jack 	Yes\r\nComms 	WLAN 	Wi-Fi 802.11 a/b/g/n/ac, dual-band, Wi-Fi Direct, hotspot\r\nBluetooth 	5.0, A2DP, LE, aptX\r\nGPS 	Yes, with A-GPS, GLONASS, BDS, GALILEO\r\nNFC 	Yes (market dependent)\r\nRadio 	FM radio\r\nUSB 	2.0, Type-C 1.0 reversible connector, USB On-The-Go\r\nFeatures 	Sensors 	Fingerprint (rear-mounted), accelerometer, gyro, proximity, compass\r\nBattery 	  	Non-removable Li-Po 4000 mAh battery\r\nCharging 	Fast battery charging 15W\r\nMisc 	Colors 	Dark Blue, Dark Red\r\nModels 	XT2019, XT2019-2\r\nSAR 	0.59 W/kg (head)     1.58 W/kg (body)    \r\nSAR EU 	0.59 W/kg (head)     0.88 W/kg (body)    \r\nPrice 	$?205.20 / €?248.33 / £?199.90 / ??12,999\r\nTests 	Performance 	AnTuTu: 168699 (v8)\r\nGeekBench: 5641 (v4.4), 1385 (v5.1)\r\nGFXBench: 6.5fps (ES 3.1 onscreen)\r\nDisplay 	Contrast ratio: 1505:1 (nominal)\r\nCamera 	Photo\r\nLoudspeaker 	Voice 79dB / Noise 74dB / Ring 80dB\r\nAudio quality 	Noise -93.2dB / Crosstalk -94.2dB\r\nBattery life 	\r\nEndurance rating 87h', '250', 30),
(6, 'Motorola Moto G8+ Plus XT2019-', 'motorola_small.jpg', 'motorola_large.jpg', 'Released 2019, October\r\n188g, 9.1mm thickness\r\nAndroid 9.0\r\n64GB storage, microSDXC', 'Network 	Technology 	\r\nGSM / HSPA / LTE\r\n2G bands 	GSM 850 / 900 / 1800 / 1900 - SIM 1 & SIM 2 (dual-SIM model only)\r\n3G bands 	HSDPA 850 / 900 / 1700(AWS) / 1900 / 2100\r\n4G bands 	LTE band 1(2100), 2(1900), 3(1800), 4(1700/2100), 5(850), 7(2600), 8(900), 18(800), 19(800), 20(800), 26(850), 28(700), 38(2600), 40(2300), 41(2500)\r\n  	LTE band 1(2100), 2(1900), 3(1800), 4(1700/2100), 5(850), 7(2600), 8(900), 12(700), 17(700), 28(700), 66(1700/2100) - LATAM\r\nSpeed 	HSPA 42.2/5.76 Mbps, LTE-A (2CA) Cat13 600/100 Mbps\r\nLaunch 	Announced 	2019, October\r\nStatus 	Available. Released 2019, October\r\nBody 	Dimensions 	158.4 x 75.8 x 9.1 mm (6.24 x 2.98 x 0.36 in)\r\nWeight 	188 g (6.63 oz)\r\nBuild 	Glass front, plastic back, plastic frame\r\nSIM 	Single SIM (Nano-SIM) or Hybrid Dual SIM (Nano-SIM, dual stand-by)\r\n 	Splash resistant\r\nDisplay 	Type 	LTPS IPS LCD capacitive touchscreen, 16M colors\r\nSize 	6.3 inches, 99.1 cm2 (~82.5% screen-to-body ratio)\r\nResolution 	1080 x 2280 pixels, 19:9 ratio (~400 ppi density)\r\nPlatform 	OS 	Android 9.0 (Pie)\r\nChipset 	Qualcomm SDM665 Snapdragon 665 (11 nm)\r\nCPU 	Octa-core (4x2.0 GHz Kryo 260 Gold & 4x1.8 GHz Kryo 260 Silver)\r\nGPU 	Adreno 610\r\nMemory 	Card slot 	microSDXC (uses shared SIM slot)\r\nInternal 	64GB 4GB RAM\r\n 	eMMC 5.1\r\nMain Camera 	Triple 	48 MP, f/1.7, 26mm (wide), 1/2.0\", 0.8µm, PDAF, Laser AF\r\n16 MP, f/2.2, 14mm (ultrawide), dedicated video camera (1080p)\r\n5 MP, f/2.2, (depth)\r\nFeatures 	LED flash, HDR, panorama\r\nVideo 	2160p@30fps, 1080p@30/60/120fps, 1080p@30fps (gyro-EIS)\r\nSelfie camera 	Single 	25 MP, f/2.0, 0.9µm\r\nFeatures 	HDR\r\nVideo 	1080p@30/120fps\r\nSound 	Loudspeaker 	Yes, with stereo speakers\r\n3.5mm jack 	Yes\r\nComms 	WLAN 	Wi-Fi 802.11 a/b/g/n/ac, dual-band, Wi-Fi Direct, hotspot\r\nBluetooth 	5.0, A2DP, LE, aptX\r\nGPS 	Yes, with A-GPS, GLONASS, BDS, GALILEO\r\nNFC 	Yes (market dependent)\r\nRadio 	FM radio\r\nUSB 	2.0, Type-C 1.0 reversible connector, USB On-The-Go\r\nFeatures 	Sensors 	Fingerprint (rear-mounted), accelerometer, gyro, proximity, compass\r\nBattery 	  	Non-removable Li-Po 4000 mAh battery\r\nCharging 	Fast battery charging 15W\r\nMisc 	Colors 	Dark Blue, Dark Red\r\nModels 	XT2019, XT2019-2\r\nSAR 	0.59 W/kg (head)     1.58 W/kg (body)    \r\nSAR EU 	0.59 W/kg (head)     0.88 W/kg (body)    \r\nPrice 	$?205.20 / €?248.33 / £?199.90 / ??12,999\r\nTests 	Performance 	AnTuTu: 168699 (v8)\r\nGeekBench: 5641 (v4.4), 1385 (v5.1)\r\nGFXBench: 6.5fps (ES 3.1 onscreen)\r\nDisplay 	Contrast ratio: 1505:1 (nominal)\r\nCamera 	Photo\r\nLoudspeaker 	Voice 79dB / Noise 74dB / Ring 80dB\r\nAudio quality 	Noise -93.2dB / Crosstalk -94.2dB\r\nBattery life 	\r\nEndurance rating 87h', '250', 5),
(7, 'IPhone 7', 'Iphone7_small.jfif ', 'Iphone7_large.jfif', 'Best Battery Life Ever in an iPhone and Water & Dust Resistance', 'iPhone 7 and iPhone 7 Plus take the worldâ€™s most popular camera and make it even better with entirely new camera systems. The 12-megapixel camera includes optical image stabilization on both iPhone 7 and iPhone 7 Plus, and a larger Æ’/1.8 aperture and 6-element lens enable brighter, more detailed photos and videos, and a wide color capture allows for more vibrant colors with more detail. iPhone 7 Plus features the same 12-megapixel wide angle camera as iPhone 7 and adds a 12-megapixel telephoto camera that together offer optical zoom at two times and up to 10 times digital zoom for photos.', '600', 50);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(4) NOT NULL,
  `userType` varchar(1) NOT NULL,
  `userFName` varchar(50) NOT NULL,
  `userSName` varchar(50) NOT NULL,
  `userAddress` varchar(50) NOT NULL,
  `userPostCode` varchar(50) NOT NULL,
  `userTelNo` varchar(50) NOT NULL,
  `userEmail` varchar(50) NOT NULL,
  `userPassword` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userType`, `userFName`, `userSName`, `userAddress`, `userPostCode`, `userTelNo`, `userEmail`, `userPassword`) VALUES
(3, 'C', 'Donald', 'Duck', 'donald lane', 'N2 5DY', '02079115000', 'donaldDuck', 'D123'),
(7, 'C', 'Pasindu', 'Fernando', 'wadduwa', '12500', '0382294165', 'pasindu.fer@gmail.com', 'laptop1234'),
(11, 'C', 'Amesh', 'Fernando', 'Panadura', '13500', '0112123456', 'amesh@gmail.com', '123'),
(12, 'A', 'Tharindu', 'Samaraweera', 'Panadura', '12500', '038123456', 'tharindu@gmail.com', 'tharindu1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messgae`
--
ALTER TABLE `messgae`
  ADD PRIMARY KEY (`messageId`),
  ADD KEY `senderId` (`senderId`),
  ADD KEY `receiverId` (`receiverId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderNo`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `order_line`
--
ALTER TABLE `order_line`
  ADD PRIMARY KEY (`orderLineId`),
  ADD KEY `orderNo` (`orderNo`),
  ADD KEY `prodId` (`prodId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prodId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messgae`
--
ALTER TABLE `messgae`
  MODIFY `messageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderNo` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `order_line`
--
ALTER TABLE `order_line`
  MODIFY `orderLineId` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prodId` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `messgae`
--
ALTER TABLE `messgae`
  ADD CONSTRAINT `messgae_ibfk_1` FOREIGN KEY (`senderId`) REFERENCES `users` (`userId`),
  ADD CONSTRAINT `messgae_ibfk_2` FOREIGN KEY (`receiverId`) REFERENCES `users` (`userId`);

--
-- Constraints for table `order_line`
--
ALTER TABLE `order_line`
  ADD CONSTRAINT `order_line_ibfk_1` FOREIGN KEY (`orderNo`) REFERENCES `orders` (`orderNo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
