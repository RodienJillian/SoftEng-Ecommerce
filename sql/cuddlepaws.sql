-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/ 
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2024 at 04:39 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cuddlepaws`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Admin_Id` int(6) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
--
-- Dumping data for table admin
--

INSERT INTO admin (Admin_Id, Username, Password) VALUES
(1, 'cuddlepawspandi', 'cuddlepaws24-25');

-- ---------------------------------------------------------- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `Cart_Id` int(4) NOT NULL,
  `User_Id` int(5) NOT NULL,
  `Product_Id` varchar(4) NOT NULL,
  `Quantity` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Category_Id` int(11) NOT NULL,
  `Category_Name` varchar(100) NOT NULL,
  `Description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_address`
--

CREATE TABLE `delivery_address` (
  `Address_Id` int(5) NOT NULL,
  `User_Id` varchar(5) NOT NULL,
  `Phase` text NOT NULL,
  `Barangay` text NOT NULL,
  `Municipality` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Order_Id` int(4) NOT NULL,
  `User_Id` varchar(5) NOT NULL,
  `Total_Amount` decimal(10,2) NOT NULL,
  `Order_Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `Order_ItemId` int(4) NOT NULL,
  `Order_Id` int(4) NOT NULL,
  `Product_Id` varchar(4) NOT NULL,
  `Quantity` int(4) NOT NULL,
  `Price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `Product_Id` int(4) NOT NULL,
  `Product_Name` varchar(50) NOT NULL,
  `Product_Description` text NOT NULL,
  `Product_ImageUrl` text NOT NULL,
  `Product_Category` text NOT NULL,
  `Product_Quantity` int(4) NOT NULL,
  `Product_Stocks` int(4) NOT NULL,
  `Product_Price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `products` (`Product_Name`, `Product_Description`, `Product_ImageUrl`, `Product_Category`, `Product_Quantity`, `Product_Stocks`, `Product_Price`) VALUES
--Dog
('Brit Premium by Nature 400g', 'Specialty Diet: Dairy Free, Gluten Free, No GMO, Shelf Life: 24 Months, Country of Origin: Czech Republic, Health Consideration: Fussy Appetite, Hypoallergenic, Sensitive Digestion, Weaning, Weight Control, Medication Functions: Digestive Remedies, Eye Care, Hair & Skin Care, Hairball Remedies, Hip & Joint Care. Weight: 400g, by Nature Dog wet food 400g. The ideal addition to granules. As a complete food or snack, or to add extra flavor to granules for junior dogs of all breeds. Improves food intake and hydration. Contains chamomile for sensitive digestion, salmon oil, fruit and herbs. Excellent digestibility and exquisite flavor. Balanced content of nutrients, vitamins, and minerals. No GRAINS No SALT No GMOs.','https://res.cloudinary.com/dpjhzyge9/image/upload/v1728896846/britVariant3_rqb2sc.webp','Dog Food', 10, 20, 98.00),
('Heartfull Pouch', 'Heartfull Chicken Chunks Flavor in Gravy Pouch for Puppy is a made in Thailand wet food that will fill their bowls with love and joy but also provide them with essential nutrition from an early age. Ingredients: Chicken by product, tuna red meat, wheat gluten, thickeners, vitamins and minerals, taurine, natural color. Vitamins and minerals include choline chloride, vitamin A, B1 (Thiamine), vitamin B2 (Riboflavin), niacin, pantothenic acid, vitamin B6 (Pyridoxine), folic acid, vitamin B12, D3, E, K3, taurine, calcium sulfate, phosphorus, sodium, potassium, magnesium, zinc, iron, copper, manganese, iodine, and selenium.', 'https://res.cloudinary.com/dpjhzyge9/image/upload/v1728905903/DogWet_iwszel.webp','Dog Food', 10, 20, 75.00),
('Pedigree Pouch','DEVELOPED BY VETERINARY NUTRITIONISTS AND EXPERTS, OUR PET FOOD IS DESIGNED TO PROVIDE THE NUTRIENTS YOUR DOG NEEDS, AND IN ADDITION, CONTAIN INGREDIENTS TO SUPPORT THE FIVE SIGNS OF GOOD HEALTH. Available in 5 varieties! 1. Pedigree Beef Flavor 2. Pedigree Beef Chunk & Vegetables 3. Pedigree Grilled Liver Loaf 4. Pedigree Chicken & Liver Flavor 5. Pedigree Puppy Chicken Flavor Great amount of protein for strong muscles With omega 6 & zinc for healthy skin & coat Calcium & phosphorus for strong bones & teeth Loaded with vitamins & minerals for body system to work effectively','https://res.cloudinary.com/dpjhzyge9/image/upload/v1728906763/wetfood1_qy9hmf.webp','Dog Food',10,20,60.00),
('Maxwell Real Meat Dog Canned','Maxwell Real Meat Wet Dog Food, 100% made with real meat, Natural meat loaf for dogs, carefully blended in order to provide your dog with a nutritional complete and balanced meal., This products is formulated to meet the nutritional standard established by AAFCO dog food nutrient profile for all life stages.','https://res.cloudinary.com/dpjhzyge9/image/upload/v1728907386/dogwet2_zg8tbv.webp',' Dog Food',10,20,80.00),
('Pedigree Canned Food','Pedigree Dog Food contain: Good for skin health makes Dog hair shine Maintain Dog bone health strength Maintain Dog digestion Make Dog muscles stronger Nutrition is right for building a good Dog immune system.','https://res.cloudinary.com/dpjhzyge9/image/upload/v1728908319/dogwet5_fqppzy.webp','Dog Food',10,20,135.00),
--Dog
('Maxime Dry Dog Food Adult Beef Flavor','Formulated with highly digestible ingredients and prebiotics for an easy digestion., Contains nutrients promoting a healthy skin and a shiny coat, High quality proteins to promote vitality and agility on adult dogs. Ingredients: Whole Grain Cereals (wheat, maize, rice), Poultry Meal, Meat Meal (beef), Soya by-products, Fiber Brans (rice/wheat), Poultry Fat (natural source of Omega 6), Vitamins (A, D3, E, K3, B1, B2, B6, B12, Pantothen-ic Acid, Biotin, Folic acid) & Minerals (Iron, Copper, Manganese, Zinc, Iodine, Selenium), Iodized salt, Choline Chloride, Monocalcium phosphate, Calcium carbonate, Mannan-oligosaccharides, Antimold, Antioxidant, Palatants, Pigments, Yucca Schidigera extract.','https://res.cloudinary.com/dpjhzyge9/image/upload/v1728909026/maxime_nlzizf.webp',' Dog Food',10,20,87.00),
('Pedigree Mother and Baby Dry Dog Food 1.3kg','Pedigree Starter Mother and Baby Dog - can be given once breast feeding is over to continue a healthy growth. puppies can be weaned and transit to his solid meal at 6-8 weeks of age., Pedigree Starter Mother and Baby Dog - has all nutrients to support puppy growth, like protein, essential vitamin and mineral, and easy to digest for better absorption.','https://res.cloudinary.com/dpjhzyge9/image/upload/v1728909188/ped_amuztd.webp','Dog Food',10,20,470.00),
('Alpha Pro Adult Beef 20kg','Nutri Chunks Alpha Pro Dog Dry Food Regular Bites 20kg With Yucca Extract for less stool odor and better stool quality. Natural prebiotic enhancer for better digestion and improved gut health. Palatability enhancers for better palatability with omega-3 & 6 for healthy skin and coat. 100% complete and balanced nutrition and suitable for all breeds of over 1 year of age. INGREDIENTS: Wheat and Corn Grains, Wheat Bran, Soybean Meal:, Meat and Bone Meal, Brewers Dried Grains, Distillers Dried Grains, Tallow, Palatant, Source of Omega-3 and 6 Fatty Acids, Salt, Vitamin Premix, Mineral Premix, Amino Acids, Yucca Extract, Antioxidant.','https://res.cloudinary.com/dpjhzyge9/image/upload/v1728909370/alpha_hetxmu.webp','Dog Food',10,20,1550.00),
('Nutri Chunks Coatshine Adult Salmon','Key benefits With real salmon meat rich in Omega 3 &amp; 6 to achieve healthy skin and shinier coat Prebiotics for Better Digestion Yucca Extract for less stool odor Available in Salmon flavor  It is formulated by pet nutrition experts, recommended by experienced veterinarians, and manufactured in International Standards Organization (ISO) accredited facilities. No artificial color added, so you can be sure of its safety and quality. Ingredients: Corn, Wheat, Soybean Meal, Wheat Bran, Corn Gluten Meal, Full Fat Soybean, Meat and Bone Meal(Bovine), Poultry Meal Chicken Fat, Fish Meal, Salmon oil, Vitamins, Minerals, Mannan oligosaccharide, Yucca, Preservative','https://res.cloudinary.com/dpjhzyge9/image/upload/v1728909531/nutri_sntrfa.webp','Dog Food',10,20,1210.00),
('Smart Heart Dry Dog Food 1.5kg','SmartHeart dog food is formulated to meet adult dogs requirements using the best quality ingredients and supplemented with fish oil (rich in DHA and Omega-3 fatty acid) and Lecithin (rich in Choline) to help enhance brain and nervous system function and promote heart health.','https://res.cloudinary.com/dpjhzyge9/image/upload/v1728909704/smart_uqkvce.webp','Dog Food',10,20,315.00),
--Cats
('Smart Heart Cat Dry Food','For Adult Cats & Kitten Cats of All Breeds,Complete and balanced nutrition to meets their requirements to maintain good health and condition. Promote Brain Function - DHA (from fish oil) and choline to enhance brain and nervous system function, Healthy Heart - Omega 3 Fatty acids from fish oil for a healthy heart,Triple DHA Enhancement -Supplemental level of DHA for improved cats memory, Healthy Skin and Coat - The combination of Biotin, Zinc and Omega 3 and 6 fatty acids for a healthy skin and shiny coat,Vision Nourishing - Taurine supplement for healthy eyesight','https://res.cloudinary.com/dpjhzyge9/image/upload/v1728917785/SmartheartKittenChixFishEgg_Milk1_1kg_jpg_ojyldk.webp','Cat Food',10,20,370.00),
('Royal Canin Kitten Dry Food 2kg','Benifits: During the growth period, the kittens digestive system is not yet fully developed. A combination of highly digestible protein (L.I.P.) and specific fibers (including psyllium and prebiotics) promotes a balance in the intestinal flora and contributes to good stool quality. During the growth period, the kittens digestive system is not yet fully developed. A combination of highly digestible protein (L.I.P.) and specific fibers (including psyllium and prebiotics) promotes a balance in the intestinal flora and contributes to good stool quality. Adapted content of protein, vitamins and minerals including vitamin D and calcium. High energy content to fit this intense growth period.','https://res.cloudinary.com/dpjhzyge9/image/upload/v1728896884/CatDryFood4_mskurm.webp',' Cat Food',10,20,1233.00),
('Morando Professional Cat Beef And Chicken 15kg','Why choose Morando Professional Adult Kibbles: With ZINC for healthy and shiny coat, With Vitamins A, D3, E - to satisfy nutritional requirements, With Yeast as a source of Vitamins and Minerals,','https://res.cloudinary.com/dpjhzyge9/image/upload/v1728896887/CatDryFood9_ltja0h.webp','Cat Food',10,20,1730.00),
('Vitality Cat Care Food','CATCARE Cat Food is a natural product made without artificial colors. Color variation in the kibbles may occur due to the natural seasonal changes in raw materials. This does not compromise the nutritional properties of the product.','https://res.cloudinary.com/dpjhzyge9/image/upload/v1728896885/CatDryFood6_ovgbjs.webp','Cat Food',10,20,265.00),
('Aozi Cat Food Natural Organic','20KG, GRAIN FREE, NO MSG, NO GMO, MADE FROM REAL FRESH SALMON, LESS SALT LESS BURDEN TO KIDNEY AND LIVER, WITH SPINACH AND EGG, WITH OMEGA 3 & 6, GOOD FOR PICKY EATERS , GOOD FOR DIGESTION , ALL LIFE STAGE','https://res.cloudinary.com/dpjhzyge9/image/upload/v1728896883/CatDryFood2_wbicnv.webp','Cat Food',10,20,705.00),

--Fish
('Optimum Betta Food 20g','Highly Nutrition Food for All Betta Fish & Other Small Fish 20g, Promotes Growth, Enhances Color by Spirulina, Rich in Vitamins C & E, Complete Nutrition, Non-Water Fouling.','https://res.cloudinary.com/dpjhzyge9/image/upload/v1728913852/betta_cgo30v.webp','Fish Food',5,10,75.00),
('DDC Growth Koi Feeds 1kg','As a product expert in Koi fish care and nutrition, I can confidently recommend the DDC Koi Fish Food Growth Koi Feeds. This 1kg bag offers balanced and high-quality nutrition for your Koi fish, promoting healthy growth and vitality. Made from premium ingredients, this feed will benefit your Koi fish significantly.','https://res.cloudinary.com/dpjhzyge9/image/upload/v1728913995/koi_cacffz.webp','Fish Food',5,10,477.00),
('OKIKO Fish Food','Features: 1.Formulated with natural astaxanthin and purines give bright and beautiful colors to the fish 2.Rice in high quality calcium formula help the growth of the fish front. 3.Constrains stable vitamins C and helps bio availability of the fish, avoids nutrient leach into the water. 4.Concentrated with active yeast powder, helps probiotic growth and enhances immunity. Ingredients: High quality fish meal,Yeast germ, Wheat flour, Yeas powder, Astaxanthin,krill meal, Fish oil, Attractant, Soy lecithin, Vitamins, Minerals.','Feeding Guide: Feed your fish 2 to 3 times a day; the amount of each feeding should be eaten up within 3 minutes.','https://res.cloudinary.com/dpjhzyge9/image/upload/v1728914705/okiko_save7e.webp','Fish Food',5,10,135.00),
('Of Tropical Fish','A balanced staple diet for all types of tropical fish. Floats on the surface of the water to keep the tank clean. Scientifically developed to meet the basic dietary needs of your fish for healthy color and accelerated growth. Made with the best natural ingredients, such as spirulina to meet the needs of your growing fishes while also keeping their bright and beautiful color. Feeding Instructions: Feed 2-3 times daily. Sprinkle just enough food that the fish can consume within 5 minutes period. Do not overfeed. Remove the excess food to keep the water and aquarium clean. Ingredients: Corn, wheat, bean, yeast, fish meal, vitamins, minerals, etc.','https://res.cloudinary.com/dpjhzyge9/image/upload/v1728914794/of_l5plmk.webp','Fish Food',5,10,60.00),
('Sanyu Betta Fish Food 8g','To reinforce the colour combination of Betta by high percentage of natural colour pigment. -Strongly outline the original colourful combination of Betta. -Contains basic nutrition to keep Betta in good health -With Vit C to help promote effective growth by reducing stress and reinforcing resistance','https://res.cloudinary.com/dpjhzyge9/image/upload/v1728914824/sanyu_zwnnkb.webp','Fish Food',5,10,135.00),
--Small Pet
('Mazuri Rat & Mouse Diet 560g','Features and Benefits: Contains dried Yucca schidigera extract to help reduce waste odor, Large block shape to encourage chewing and help support dental health, Nutritionally complete, no supplementation needed, No artificial colors or flavors','https://res.cloudinary.com/dpjhzyge9/image/upload/v1728915641/MazuriRat_Mouse_scqsdr.webp','Small Pet Food',5,10,535.00),
('Mazuri Insectivore Diet','Mazuri® Insectivore Diet is a highly palatable insectivore food that simulates the high-protein, high-fiber diet of a wide range of insectivores, including mammals, birds, reptiles and amphibians. This diet may be used as a replacement for all or some of the insect component of the diet. Although gut loaded insects may be part of the insectivore diet, no supplementation is needed when using this insectivore diet, which contains taurine at levels that meet the recommendations for carnivores. Insectivore food is best for insectivorous reptiles such as Anoles, Basilisks, Bearded Dragons, Chameleons, Geckos and Water Dragons.','https://res.cloudinary.com/dpjhzyge9/image/upload/v1728915640/MazuriInsectibore_o0nw4c.webp','Small Pet Food',5,10,535.00);



--Table structure for table search

CREATE TABLE `search` (
  `Product_Id` int(4) NOT NULL,
   `Product_Name` varchar(50) NOT NULL,
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

  
-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_Id` int(5) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Firstname` text NOT NULL,
  `Lastname` text NOT NULL,
  `Phone_Num` varchar(11) NOT NULL,
  `Phase` text NOT NULL,
  `Barangay` text NOT NULL,
  `Municipality` text NOT NULL,
  `Account_DateCreated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_Id`, `Username`, `Email`, `Password`, `Firstname`, `Lastname`, `Phone_Num`, `Phase`, `Barangay`, `Municipality`, `Account_DateCreated`) VALUES
(5, 'RodienJillian', 'rodiengorg@gmail.com', '$2y$10$SwhJs8QEuqoVZFa79pwOW.u9z5N.NiqCTM72Q26K7oBf3QwBOaaua', 'Rodien', 'Ellorando', '09272830230', 'Blk. 1, Lot 16, Woodbridge', 'Poblacion', 'Pandi', '2024-10-11 23:16:19'),
(6, 'Zeldrickqt', 'zeldrickjoaquin@gmail.com', '$2y$10$E5RWX8zPGcEgqII8avbn3eNINMeBrmAqzfVE3G9CBUKRMAUg8gBcu', 'Zeldrick Jesus', 'Delos Santos', '09477030508', '27 E. Rodriguez St.', 'Poblacion', 'Pandi', '2024-10-12 11:14:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin_Id`);

--
-- Indexes for table `cart`
--
ALTER TABLE cart
  ADD PRIMARY KEY (Cart_Id),
  ADD KEY cart_ibfk_1 (User_Id),
  ADD KEY Product_Id (Product_Id);

--
-- Indexes for table category
--
ALTER TABLE category
  ADD PRIMARY KEY (Category_Id);

--
-- Indexes for table delivery_address
--
ALTER TABLE delivery_address
  ADD PRIMARY KEY (Address_Id),
  ADD KEY User_Id (User_Id);

--
-- Indexes for table `orders`
--
ALTER TABLE orders
  ADD PRIMARY KEY (Order_Id),
  ADD KEY User_Id (User_Id);

--
-- Indexes for table order_items
--
ALTER TABLE order_items
  ADD PRIMARY KEY (Order_ItemId),
  ADD KEY Order_Id (Order_Id),
  ADD KEY Product_Id (Product_Id);

--
-- Indexes for table products
--
ALTER TABLE products
  ADD PRIMARY KEY (Product_Id);

--
-- Indexes for table `users`
--
ALTER TABLE users
  ADD PRIMARY KEY (User_Id),
  ADD UNIQUE KEY Username (Username),
  ADD UNIQUE KEY Email (Email),
  ADD UNIQUE KEY Username_2 (Username,Email);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table admin
--
ALTER TABLE admin
  MODIFY Admin_Id int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table cart
--
ALTER TABLE cart
  MODIFY Cart_Id int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE category
  MODIFY Category_Id int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table delivery_address
--
ALTER TABLE delivery_address
  MODIFY Address_Id int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table orders
--
ALTER TABLE orders
  MODIFY Order_Id int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table order_items
--
ALTER TABLE order_items
  MODIFY Order_ItemId int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE products
  MODIFY Product_Id int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table users
--
ALTER TABLE users
  MODIFY User_Id int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

-- Constraints for dumped tables
--

--
-- Constraints for table cart
--
ALTER TABLE cart
  ADD CONSTRAINT cart_ibfk_1 FOREIGN KEY (User_Id) REFERENCES users (User_Id),
  ADD CONSTRAINT cart_ibfk_2 FOREIGN KEY (Product_Id) REFERENCES products (Product_Id);

--
-- Constraints for table delivery_address
--
ALTER TABLE delivery_address
  ADD CONSTRAINT delivery_address_ibfk_1 FOREIGN KEY (User_Id) REFERENCES users (User_Id);

--
-- Constraints for table orders
--
ALTER TABLE orders
  ADD CONSTRAINT orders_ibfk_1 FOREIGN KEY (User_Id) REFERENCES users (User_Id);

--
-- Constraints for table order_items
--
ALTER TABLE order_items
  ADD CONSTRAINT order_items_ibfk_1 FOREIGN KEY (Order_Id) REFERENCES orders (Order_Id),
  ADD CONSTRAINT order_items_ibfk_2 FOREIGN KEY (Product_Id) REFERENCES products (Product_Id);
COMMIT;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
