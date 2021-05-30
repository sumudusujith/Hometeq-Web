

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `hometeq`
--

-- --------------------------------------------------------

--
-- Table structure for table `Product`
--

CREATE TABLE `Product` (
  `prodId` int(4) NOT NULL,
  `prodName` varchar(30) NOT NULL,
  `prodPicNameSmall` varchar(100) NOT NULL,
  `prodPicNameLarge` varchar(100) NOT NULL,
  `prodDescripShort` varchar(1000) NOT NULL,
  `prodDescripLong` varchar(3000) NOT NULL,
  `prodPrice` decimal(6,2) NOT NULL,
  `prodQuantity` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Product`
--

INSERT INTO `Product` (`prodId`, `prodName`, `prodPicNameSmall`, `prodPicNameLarge`, `prodDescripShort`, `prodDescripLong`, `prodPrice`, `prodQuantity`) VALUES
(1, 'Apple Watch Series 5', 'watch.jpg', 'watch.jpg', 'Apple Watch is the ultimate device for a healthy life. Choose from all the latest models like Apple Watch Series 5 with the Always-On Retina display.', 'Get connected through sport. Apple Watch Nike is the perfect running partner with the Nike Run Club app. Featuring a world of workouts, coaching, and motivation to help take your fitness to the next level. And with Apple Watch Series 5, every Nike watch face is optimized for the new Always-On Retina display.', '1399.00', 10),
(2, 'Apple AirPods', 'airpod.jpeg', 'airpod.jpeg', 'AirPods deliver effortless, all-day audio on the go. And AirPods Pro bring Active Noise Cancellation to an in-ear headphone — with a customizable fit', 'The new AirPods — complete with Wireless Charging Case — deliver the wireless headphone experience, reimagined. Just pull them out of the case and they\'re ready to use with your iPhone, Apple Watch, iPad, or Mac. After a simple one-tap setup, AirPods work like magic. They\'re automatically on and always connected.', '199.00', 55),
(4, 'Apple MacBook Air', 'air.jpeg', 'air.jpeg', 'The new thinner and lighter MacBook Air features a Retina display, Touch ID, and the latest-generation butterfly keyboard with Force Touch trackpad.', 'The most loved Mac is about to make you fall in love all over again. Available in silver, space gray, and gold, the new thinner and lighter MacBook Air features a brilliant Retina display with True Tone technology, Touch ID, the latest-generation keyboard, and a Force Touch trackpad. The iconic wedge is created from 100 percent recycled aluminum, making it the greenest Mac ever.1 And with all-day battery life, MacBook Air is your perfectly portable, do-it-all notebook.', '2530.00', 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Product`
--
ALTER TABLE `Product`
  ADD PRIMARY KEY (`prodId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Product`
--
ALTER TABLE `Product`
  MODIFY `prodId` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
