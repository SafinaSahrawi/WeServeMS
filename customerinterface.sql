-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2020 at 07:49 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `customerinterface`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getcat` (IN `cid` INT)  SELECT * FROM categories WHERE cat_id=cid$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(3) NOT NULL,
  `product_id` int(3) NOT NULL,
  `customer_id` int(3) NOT NULL,
  `product_name` text NOT NULL,
  `product_img` text NOT NULL,
  `product_quantity` int(3) NOT NULL,
  `product_price` double NOT NULL,
  `payment_complete` tinyint(4) NOT NULL,
  `sp_confirm` tinyint(4) DEFAULT NULL,
  `item_status` int(11) NOT NULL,
  `O_status` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `product_id`, `customer_id`, `product_name`, `product_img`, `product_quantity`, `product_price`, `payment_complete`, `sp_confirm`, `item_status`, `O_status`) VALUES
(43, 11, 8, 'White Long Sleeves Shirt Men Business Casual Shirts Plus Size Social Dress Shirt Large Size Shirt Men Fashion\r\nSize:M-8XL.', 'clothes.jfif', 1, 82, 0, NULL, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(2) NOT NULL,
  `username` varchar(50) NOT NULL,
  `C_CustAddress` varchar(100) NOT NULL,
  `C_CustPhoneNumber` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `username`, `C_CustAddress`, `C_CustPhoneNumber`) VALUES
(4, 'CHOONG ZHEN YUAN', 'NO32, JLN HANG KASTURI 31, TMN SKUDAI BARU', '071234567'),
(5, 'Customer', 'CustAddress', 'CustPhoneNum'),
(6, 'kam', 'ipoh perak', '01678909'),
(7, 'KAM', '33, mala', '0198909876'),
(8, 'YAMUNNA', '45 jalan cengal', '0198909876'),
(9, 'yamunnawahthi', '370 cengal kedah', '0989765456'),
(10, 'Yam', '45 jalan cengal', '0983213223'),
(11, 'jhj', '45 jalan cengal', '0198909876'),
(12, 'jgjg', '45 jalan cengal', '0198909876');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` int(11) NOT NULL,
  `name` varchar(200) CHARACTER SET utf8 NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `des` text CHARACTER SET utf8 NOT NULL,
  `quantity` int(11) NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `name`, `price`, `des`, `quantity`, `img`) VALUES
(1, 'Nestle Milo Actigen E (1kg)', '23.10', '1KG\r\n\r\n- Malaysia’s much-loved beverage, MILO is not just any chocolate malt drink. It contains PROTOMALT, a malted barley extract that supplies complex carbohydrates, the preferred, recommended source of energy in a balanced diet. It also has a good part of the nutrients naturally present in barley.\r\n\r\n- MILO also contains ACTIGEN-E, a mix of eight vitamins (Vitamin B1, B2, B3, B5, B6, B8, B12 and C) and four minerals (Iron, Magnesium, Calcium and Phosphorus). It is ACTIGEN-E that “unlock” energy and optimises it for the muscles and brain, giving you the energy to take on the demands of the day.', 11, 'milo1.jpg'),
(2, 'Quaker Oats Oat So Simple Variety Porridge, Haferflocken, 9 x 33g', '16.00', 'Product Description\r\nwholegrain rolled oats: 3 x Original, 3 x Golden Syrup, 3 x Apple & Blueberry\r\n\r\nContent\r\n297g: 9 x 33g Portionen\r\n\r\nIngredients\r\nOriginal: Quaker Wholegrain Rolled Oats Golden Syrup Flavour: Quaker Wholegrain Rolled Oats (80%), Sugar, Natural Flavouring, Salt, Apple & Blueberry:Quaker Wholegrain Rolled Oats (77%), Sugar, Dried Apple Pieces (1%), Dried Blueberries (1%), Natural Flavouring, Salt, Sunflower Oil,', 1, 'Quaker-Range1.jpg'),
(3, 'Maggi Hot Cup Instant Noodles', '1.69', '-Maggi Hot Cup Instant Noodles Curry (58g)\r\n-Maggi Hot Cup Instant Noodles Ayam (57g)\r\n-Maggi Hot Cup Instant Noodles Tomyam (61g)\r\n-Maggi Hot Cup Instant Noodles Laksa (58g)\r\n\r\n#maggi #hot #cup #instant #noodles \r\n\r\nAdditional information:\r\n- We do ship out within 48hours (not included weekend and public holiday). \r\n- Delivery time may take 2 to 7 working days, and it’s out of seller control. \r\n- Cash On Delivery is not supported. \r\n- For sure, we will ensure all the parcels are being packed or wrapped properly and securely in good condition, any damage or packing pop due to air pressure or third party courier during shipping, we will not refund.\r\n- Your kind understanding is highly appreciated! ', 1, 'maggie cup.jpg'),
(4, 'Mister Potato (75g x 12 Packs) - Original / BBQ / Tomato / Hot & Spicy', '28.31', '1 Purchase is 12 Packs\r\n\r\nFlavors you can choose: \r\n1. Original (75g)\r\n2. BBQ (75g)\r\n3. Tomato (75g)\r\n4. Hot & Spicy (75g)\r\n\r\n#misterpotato #mister #potato #original #bbq #hot&spicy # spicy #pedas #hot #tomato #chips #biscuit #party #event #food #leisure #localfood #malaysia #jaja #localfood #malaysia #snek', 1, 'misterpotatopack.jpg'),
(5, 'BRAND\'S Essence of chicken 15 x 70g', '72.90', 'Product Details\r\n\r\n\"For over 180 years, BRAND’S® Essence of Chicken is the Original Essence of Chicken. It is made of an all-natural extract of fine quality chicken hygienically processed under high temperatures.\r\n\r\n\r\n\r\nFat-free and cholesterol-free with no artificial chemicals or preservatives, the goodness of BRAND\'S® Essence of Chicken is sealed air-tight by a patented triple safety cap and packaged in an easily digestible form.\r\n\r\n\r\n\r\nWith over 40 published scientific papers, BRAND’S® Essence of Chicken is the only clinically proven Essence of Chicken for a healthy body and sharp mind. It has been shown to increase metabolism by reducing tiredness and increasing oxygen flow to the brain for improved concentration\r\n\r\nImproves concentration\r\n\r\nImproves recovery after exercise\r\n\r\nImproves mood\r\n\r\nImproves quality of breast milk\r\n\r\nReduces tiredness\r\n\r\nReduce glycaemic response\r\n\r\n\r\n\r\n\r\n\r\nProduct Usage\r\n\r\nFor external use only in the intimate area.\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nProduct Ingredients\r\n\r\nESSENCE OF CHICKEN, CARAMEL', 1, 'ayambrands.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `good`
--

CREATE TABLE `good` (
  `id` int(11) NOT NULL,
  `name` varchar(200) CHARACTER SET utf8 NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `des` text CHARACTER SET utf8 NOT NULL,
  `quantity` int(11) NOT NULL,
  `img` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `good`
--

INSERT INTO `good` (`id`, `name`, `price`, `des`, `quantity`, `img`) VALUES
(11, 'White Long Sleeves Shirt Men Business Casual Shirts Plus Size Social Dress Shirt Large Size Shirt Men Fashion\r\nSize:M-8XL.', '82.00', '60% Polyester, 40% Cotton\r\nPocket at chest\r\nSpread collar \r\nButton closure\r\nMachine Wash or Hand Wash\r\nPoint collar\r\nRegular cuff', 1, 'clothes.jfif'),
(12, 'Embroidery Summer Women Blue Midi Dresses Fashion Casual Elegant Party Clothes', '46.00', '★Welcome to our shop！\r\n★Our products are factory direct sales, inexpensive, and good quality control.\r\n★Orders will be shipped in the first 1-3 days,\r\n\r\n❤Ready Stock❤\r\n❤100% New Brand And ??High Quality??❤\r\n\r\nStyle: Fashion\r\n\r\n\r\n?Size data in the second picture? \r\n\r\nplease allow 1-2cm differs due to manual measurement, thanks (All measurement in cm and please note 1cm=0.39inch)\r\nNotes：\r\n     Due to camera equipment, light, angle, display different effect and other reasons, Goods between photos and real may have off color, such issues do not belong to the quality problems, the actual color quasi.\r\n\r\n#highquality #weddingdress #readystock #elegantdress #dressfesta #EveningDress #Rockabilly #Retrodress #casualdress #summerdress #Ladiesdresses   #prom  #girlsdress   #fashiondress  #glamorousdress  #DinnerDress  #floraldresses', 1, 'womenclothes.jfif'),
(13, '2020 new summer Korean Daisy women\'s skirt set', '22.93', 'Style: simple commute / Korean version\r\n\r\nPopular elements: gauze, printing\r\n\r\nStyle: skirt suit\r\n\r\nSleeve length: short sleeve\r\n\r\nFabric / material: other / polyester (polyester)\r\n\r\nComponent content: 96% (including) - 100% (excluding)\r\n\r\nApplicable age: young and middle-aged (26-40 years old)\r\n\r\nPlush or not: No Plush\r\n\r\nLaunch season: Summer 2020\r\n\r\nSIZE	Top length(cm)	Bust(cm)	Skirt length(cm)	Waist(cm)\r\nS	59	88	68	Elastic\r\nM	60	92	69	Elastic\r\nL	61	96	70	Elastic\r\nXL	62	100	71	Elastic\r\n2XL	63	104	72	Elastic\r\n				\r\nWarm reminder: The above dimensions are obtained by hand tiling. If there is 1-3cm deviation, it is normal.', 1, 'clothes1.jpeg'),
(14, '13A UK Standard Home Power Electrical Plug Outlet Socket Adpter, AC 110-250V,Gray glass panel ,grey', '16.12', 'Note:\r\n- MAXIMUM ONE UNIT PER ORDER, kindly separate order if you want to order more than one unit.\r\n= 1 unit = 1 order\r\n= If buy more than 1 in an order or combine order we will call customer to top up the shipping fees.\r\nAny inquiries kindly live chat us or contact our customer care line 017-9382755 to avoid misunderstanding\r\n\r\nFEATURES\r\n==========\r\n•	Heavy duty stainless steel for commercial application.\r\n•	Automatic heating then in homothermal mode, temp range: 0- 200 oC\r\n•	Cross bar to hag basket\r\n•	Volume of each oil cylinder is 17L\r\n•	Well fried foods each time and keep the original taste\r\n•	Saving time to cook large volume quantity of food at one time\r\n•	Application: “Ayam Gunting” or fried chicken tempura, chips, dough, shrimp and etc\r\nSPECIFICATION\r\n=============\r\no	Capacity: 17L\r\no	Temperature: 0 ~ 200 oC\r\no	Net Dimension: 290x525x360 mm\r\no	Gross Dimension:600x360x440 mm\r\no	Net Weight:7kg\r\no	Gross Weight: 8kg\r\no	Remarks:1 Tank\r\no	Power: 3000W\r\no	Voltage: 220V~50Hz\r\n\r\nPACKAGE CONTENT\r\n=================\r\no	1 x cover\r\no	1 x fryer basket', 1, 'eleticalsocket.jfif'),
(15, 'Philips Kettle HD9303 (1.2L) Polished Stainless Steel', '73.99', ' Product Description \r\n  \r\n The body of the new Philips Jug Kettle HD9303 uses food-grade standard stainless steel, providing rapid water boiling with peace of mind! \r\n  \r\n Easy to use \r\n - Easy opening and filling \r\n - Cord winder for easy storage \r\n - Polished stainless steel finish for easy cleaning \r\n - Wide opening for easy filling and cleaning \r\n - 360° cordless pirouette base, for easier handling \r\n  \r\n Why choose SJK for Philips Kettle HD9303&amp;nbsp;? \r\n  \r\n 1. 2 years warranty by Philips Malaysia (Original Warranty). \r\n 2. All Philips product sold by SJK are 100% genuine from Philips Malaysia, strictly not privately imported from unknown sources. \r\n 3. SJK ensures safe delivery by protecting all goods purchased with bubble wrap and stretch film. \r\n 4. Express delivery, dispatch within the same or the next working day. \r\n 5. 100% brand new products, strictly not display unit. \r\n  \r\n Highlights \r\n  \r\n 1.2 Liter \r\n - Philips Jug Kettle HD9303 1.2 Liter with steam sensor, dry boiling and overheating prevention. \r\n  \r\n Polished stainless steel Inner pot &amp;amp; body \r\n - Philips Jug Kettle HD9303 using Food-grade stainless steel inner pot and body material. \r\n  \r\n Cord winder \r\n - Power cable length adjustable as required for easy storage. \r\n  \r\n Polished stainless steel \r\n - Polished stainless steel finish for easy cleaning. \r\n  \r\n Wide opening \r\n - Philips Jug Kettle HD9303 design is for easy filling and cleaning \r\n  \r\n 360° cordless pirouette base \r\n - With cordless base,Philips Jug Kettle HD9303 is more convenient to use and handle. \r\n  \r\n Specifications of&amp;nbsp;Philips Kettle HD9303 \r\n  \r\n Technical specifications \r\n - Capacity: 1.2 Liter \r\n - Rated input power: 1800 W \r\n - Cord length: 0.75 m \r\n - Rated frequency: 50 Hz \r\n - Rated voltage: 220 V \r\n - Plug Head: 3 pin \r\n  \r\n Design and Finishing \r\n - Colour: Metallic silver \r\n - Materials of main body: Stainless steel-Black \r\n - Materials of inner pot: Stainless Steel \r\n  \r\n Weight and Dimensions \r\n - Product Dimensions (L × W × H): 21.20 x 16.00 x 19.50 (cm) \r\n - Net Weight: 0.75 kg\r\n ', 1, 'kette.jfif');

-- --------------------------------------------------------

--
-- Table structure for table `medical`
--

CREATE TABLE `medical` (
  `id` int(11) NOT NULL,
  `name` varchar(200) CHARACTER SET utf8 NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `des` text CHARACTER SET utf8 NOT NULL,
  `quantity` int(11) NOT NULL,
  `img` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medical`
--

INSERT INTO `medical` (`id`, `name`, `price`, `des`, `quantity`, `img`) VALUES
(21, 'Winner Medical 3 PLY Face Mask 50pcs ( Soft Earloop ) ', '24.99', 'Winner 3 Ply Medical Face Mask Specification\r\n- BFE ≥ 98% \r\n   ≥ 98% Filtration Against Virus & Bacteria\r\n- Fluid Resistance: 120mmHg\r\n   Splash resistant layer protection against blood & bodily fluids 120mmHg  (ASTM F1862)\r\n-Soft EarLoop\r\n  With Special Design on the Ear Loop, it let user wear the face mask comfortably and no pressure on it \r\n- High Breathability\r\n- Hypoallergenic\r\n- Form-Fit Design\r\n- Super Soft Feel\r\n- 100% Latex-Free\r\n\r\nSize : 17.5cm x 9.5 cm / 3 Layers', 1, 'mask.jpg'),
(22, 'Medical Mini Pill Cases Box Portable Medicine Drug Storage Plastic Case', '0.83', 'Type:Pill Storage Boxes\r\nColor: Blue/Transparent\r\nMaterial: Plastic\r\nSize: 5.8*3.6*1.2cm\r\nFEATURES\r\nMade of high quality Waterproof :Food Grade plastic material, it is mini cute square shape.\r\nThere are two compartments, good for people with many small daily pills .\r\nIt also could be Vitamins Organizer Box, Portable and very convenient for carrying pills and little things.\r\nWill easily fit into the palm of your hand, making it easy to put pills in and take them out\r\nThe tight lid will keep pills secure. Note: Not child safe. Handy to fit into your pocket or bag, carry around your important pills for the day .\r\n', 1, 'medicalminipill.jfif'),
(23, 'Plastic Health Care First Aid Kit Emergency Medical Box\r\n Easy Storage and Carry First Aid Box that contain 21 items .', '55.90', 'Product Description\r\n- Great for treating minor first aid injuries and wounds\r\n- Can timely handle unexpected emergencies\r\n- Compact & Lightweight\r\n- Ideal for in the home, travelling, caravan,camping, sports activities etc.\r\n\r\n*Handsaplast Elastic 5pcs\r\n*Alcohol Swab 10 Pcs\r\n*Glove (pair)\r\n*Surgical Tape 1/2\"\r\n*Gauze\r\n*Cotton Ball\r\n*Dettol liquid\r\n*Yellow lotion\r\n*Bacidin Antiseptic cr 15gm\r\n*Axe oil 5ml\r\n*Paracetamol 500mg tab\r\n*Cotton Bud 10pcs\r\n*Analgesic Cr 30gm\r\n*Gauze bandage 2\'\r\n*Gauze bandage 3\'\r\n*Gauze bandage 4\'\r\n*Crepe bandage 5cm\r\n*Crepe bandage 7.5cm\r\n*Forcep\r\n*Safety pin\r\n*Scissor \r\n\r\n#worthbuying \r\n#smallfirstaidbox \r\n#easystorage \r\n#21items\r\n#allyouneedinside ', 1, 'plastichealthcare.jfif'),
(24, '[Spot] 60 pumps 75% alcohol sterilization wipes household medical wipes protection safety health epidemic prevention products', '13.00', 'product features:\r\nName: 60 pumped 75% alcohol disinfection wipes\r\nMain ingredients: cotton soft non-woven fabric, 75% alcohol, RO pure water, etc.\r\nHow to use: Open the sealing cap, tear off the sealing paste, pull out the wet wipes, apply the sealing paste after use, and cover the sealing cap.\r\nStorage method: Please store in a cool place away from fire sources;\r\nNote: This product is only for daily use. Wipe the ingestible items after the alcohol is volatilized. Use caution when contacting optical coatings or soluble alcohol and other substances to avoid damage to such substances. Sensitive and allergic skin is not recommended. Please keep it out of reach of infants and young children to avoid accidental ingestion. This product is not soluble. Do not throw wet paper towels in the toilet. Avoid direct contact with eyes. If you accidentally get into your eyes, immediately rinse with water or consult a doctor. If you have an allergic condition, please stop using it immediately and consult your doctor for flammable items, please do not get near the source of fire;\r\nChecklist: 60 packs of 75% alcohol disinfected wipes.', 1, 'alcoholsterilization.png\r\n'),
(25, 'Dettol Instant Hand Sanitizer-200ml', '18.24', 'HIGHLY FLAMMABLE. Keep away from fire or flame. For external use only. Avoid eyes. In case of eye contact, flush with water. Discontinue use if skin irritation occurs. If condition persists consult a doctor. Keep out of reach of children.\r\n\r\nFIRST AID\r\nIn case of eye contact, flush with water. Discontinue use if skin irritation occurs. If condition persists consult a doctor. If swallowed, contact a Poisons Information Centre (Phone: Australia 13 11 26, New Zealand 0800 764 766) or a doctor.\r\nIngredients\r\nAlcohol Denat., Water, PEG/PPG-17/6 Copolymer, Propylene Glycol, Acrylates/C10-30 Alkyl Acrylate Crosspolymer, Tetrahydroxypropyl Ethylenediamine, Aloe Barbadensis Gel, Fragrance, Limonene, CI19140, CI42090.\r\nDirections\r\nSqueeze ½ teaspoon amount of Dettol instant hand sanitizer in your palm then briskly rub hands together thoroughly until dry.\r\n\r\ngoods product\r\n1.White Long Sleeves Shirt Men Business Casual Shirts Plus Size Social Dress Shirt Large Size Shirt Men Fashion\r\nSize:M-8XL, Please check the size image carefully before you place the order.\r\n\r\n60% Polyester, 40% Cotton\r\nPocket at chest\r\nSpread collar \r\nButton closure\r\nMachine Wash or Hand Wash\r\nPoint collar\r\nRegular cuff', 1, 'dettol.jfif');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `customer_id` text NOT NULL,
  `firstname` text DEFAULT NULL,
  `email` text NOT NULL,
  `cust_add1` text NOT NULL,
  `cust_add2` text NOT NULL,
  `cust_postal_code` text NOT NULL,
  `cust_city` text NOT NULL,
  `cust_state` text NOT NULL,
  `cardNumber` text NOT NULL,
  `total_price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `customer_id`, `firstname`, `email`, `cust_add1`, `cust_add2`, `cust_postal_code`, `cust_city`, `cust_state`, `cardNumber`, `total_price`) VALUES
(6, '5', 'yamunna', 'yam@gmail.com', 'no 370', '0900', '09000', 'kedah', 'kulim', '0000-98765-9887', 34),
(11, '1', 'cb18059', 'zongbao1101@gmail.com', 'No 32', 'Jalan hang kasturi 31', '81300', 'Skudai', 'Johor', '22', 0),
(22, '8', 'Tang', 'yamunnawahthi@yahoo.com', '33', 'mala', '09000', 'ksxmsk', 'kedah', '33', 105.1);

-- --------------------------------------------------------

--
-- Table structure for table `runner`
--

CREATE TABLE `runner` (
  `id` int(2) NOT NULL,
  `username` varchar(50) NOT NULL,
  `R_Runner_License` varchar(50) NOT NULL,
  `R_Runner_Vehicletype` varchar(50) NOT NULL,
  `R_Runner_VehicleNo` varchar(50) NOT NULL,
  `R_Runner_PhoneNo` varchar(50) NOT NULL,
  `R_Runner_Address` varchar(50) NOT NULL,
  `R_Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `runner`
--

INSERT INTO `runner` (`id`, `username`, `R_Runner_License`, `R_Runner_Vehicletype`, `R_Runner_VehicleNo`, `R_Runner_PhoneNo`, `R_Runner_Address`, `R_Status`) VALUES
(2, 'Runner', 'license', 'type', 'V.no', 'P.no', 'Address', 0),
(3, 'yamunnawati', 'B', 'car', 'poi9876', '0987656789', 'penang', 0),
(4, 'SAM', 'B', 'car', 'TYI0987', '01789098756', 'iPOH', 0),
(6, 'SEAN', 'D', 'bike', 'PHY1234', '+60987654321', 'Seremban', 0),
(13, 'hg', 'B', 'bike', 'PYT6789', '0987654321', 'kulim kedah', 0),
(14, 'jk', 'B', 'bike', 'PYT6780', '01789098756', 'Seremban', 0),
(15, 'kl', 'B', 'Bike', 'PYT6789', '0167893458', 'kulim kedah', 0);

-- --------------------------------------------------------

--
-- Table structure for table `serviceprovider`
--

CREATE TABLE `serviceprovider` (
  `id` int(2) NOT NULL,
  `username` varchar(50) NOT NULL,
  `S_Company_Name` varchar(100) NOT NULL,
  `S_CompanyAddress` varchar(100) NOT NULL,
  `S_ServiceProviderPhoneNo` varchar(50) NOT NULL,
  `S_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `serviceprovider`
--

INSERT INTO `serviceprovider` (`id`, `username`, `S_Company_Name`, `S_CompanyAddress`, `S_ServiceProviderPhoneNo`, `S_status`) VALUES
(3, 'Service Provider 123456', 'Company Name', 'Company Address', 'Phone Number', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usertype` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `usertype`, `created_at`) VALUES
(1, 'cb18059', '$2y$10$JfCvDs/OcK7v3QjA4GgAUOJtBXQ2VkTifeBZg2PBtei0XGvzTYfDe', 'Customer', '2020-07-11 19:17:25'),
(2, 'alex', '$2y$10$7xDQeydqZjbOfjfJNJAaueWyYF2veO/CLmXOTItRlq2INYVQ1xnIu', 'Customer', '2020-07-13 10:07:28'),
(3, 'Choong', '$2y$10$SKLJf9KL4tEsYclBv8jeNOoNiBmxhTxMEyfbqEp/FLY/CnRvJc.fO', 'Customer', '2020-07-13 10:14:49'),
(4, 'yamunnawati', '$2y$10$p5ngBgTiZmSMod2bX19BwehoSWmrSzFm/cibIQktoEnFuAI8sjqsO', 'Runner', '2020-07-15 14:29:55'),
(5, 'SAM', '$2y$10$vkfqYWIdEWEpaxRBNLwVju6bHdk2cDeL9vs2hhoF3507rvssg9gYy', 'Runner', '2020-07-18 16:11:09'),
(6, 'admin', '$2y$10$K7xWP86Frxf8lFBTDjI8C.vhHNaEoEAufLNxLVjdcmLu4TJNp3swG', 'Runner', '2020-07-19 01:00:34'),
(7, 'SEAN', '$2y$10$Vp2wQmIMaPZwY2tji6nkue9i75ehlBzEIngAS8KvrTRK7YFNsED8W', 'Runner', '2020-07-19 03:32:18'),
(8, 'Tang', '$2y$10$iPDgtJXKxwugw.xxrmFjUOk7jHNlg9BccQ.QcDc/wTWjPgf4aY5Zu', 'Runner', '2020-07-19 10:34:44'),
(9, 'admin', 'admin123', 'Admin', '2020-07-19 14:34:55'),
(10, 'KAM', '$2y$10$hj.QhvssEx0pnJ3BmhBucuqM9WFD74WH2KI1eZV3zk2NL2ylSQvwi', 'Customer', '2020-07-19 20:51:53'),
(11, 'YAMUNNA', '$2y$10$8yKOI004AbzYepVmhh6JiOmZdoYq/BYA6276qXtrW3TBcS12zu8Fm', 'Customer', '2020-07-19 21:55:33'),
(12, 'yamunnawahthi', '$2y$10$YTYLPTE9DZXtWp7HVnPEZuGupeLTei6zrRcfxmWkduWTe5ZjlGqg6', 'Customer', '2020-07-19 22:28:16'),
(13, 'Yam', '$2y$10$IuOZnyhrl/8CpqB6Lp24xOj9ucjM0Tp3hI6rAUeJJWay7ncPzYEmC', 'Customer', '2020-07-19 22:31:12'),
(14, 'KSKS', '$2y$10$uXUAJ2ppCDZKshUK3kleX.LW7BxxjdbA057aF2VRJKkLheSFMRD/q', 'Runner', '2020-07-19 22:40:53'),
(15, 'KSKp', '$2y$10$Q5eOQYsZ.rdxNWY7bcOTteX7gXoC7HrzvG1ssGNYzagJzzwN7MvJS', 'Runner', '2020-07-19 22:44:08'),
(16, 'KSKuy', '$2y$10$lgufwl7nVSdoCPJhUju.PuNcLXT3IlaSenDCAcwSUp02TQ75ORs4W', 'Runner', '2020-07-19 22:45:27'),
(17, 'jhj', '$2y$10$UB3.2uP57PrZD4VxbauluemhumDp6Vw7QbgvFnEXNj/SEFl8xVW3e', 'Customer', '2020-07-19 22:46:49'),
(18, 'jgjg', '$2y$10$/HjvLdRpP3qD04y01C22E.qZW5D5ioIRa.PAlQQg8dHjOsRsgHUV.', 'Customer', '2020-07-19 22:51:26'),
(19, 'Siti', '$2y$10$pGoRStxYBRihvuIiB6WUZeRQJRmjDeVMn1E/egbXKh/LIJ.g6UIrm', 'Runner', '2020-07-19 23:20:15'),
(20, 'Shar', '$2y$10$kwvkvnP98iZ.uUWWfN04KesJVsfsQlC0Wzdqw83fItN8khDhKdNci', 'Runner', '2020-07-19 23:21:21'),
(21, 'hg', '$2y$10$Bwxn0AjchkwWjcPYx/IfC.ddtc2vX1HZHUvjo9tV6WRmKS85RnpBa', 'Runner', '2020-07-19 23:24:57'),
(22, 'jk', '$2y$10$4dw7dql9wJtm9ZFwbTBRmudw4iTxdVlXlgaTfFw/plN.muz0F6o.a', 'Runner', '2020-07-19 23:26:47'),
(23, 'kl', '$2y$10$afaLUs0Yb4ChQ0.8cd9dXu2DCmnhtkQ1sQSLGphc9IQkqAVxIk2c.', 'Runner', '2020-07-19 23:30:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `good`
--
ALTER TABLE `good`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medical`
--
ALTER TABLE `medical`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `runner`
--
ALTER TABLE `runner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `serviceprovider`
--
ALTER TABLE `serviceprovider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `good`
--
ALTER TABLE `good`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `medical`
--
ALTER TABLE `medical`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `runner`
--
ALTER TABLE `runner`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `serviceprovider`
--
ALTER TABLE `serviceprovider`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
