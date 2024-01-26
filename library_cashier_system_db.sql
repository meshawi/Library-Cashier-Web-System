SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `library_cashier_system_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `library_cashier_system_db`;

CREATE TABLE `books` (
  `barcode` int(11) NOT NULL,
  `Book_Name` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `publication_year` int(11) DEFAULT NULL,
  `details` text DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `language` varchar(50) DEFAULT NULL,
  `page_count` int(11) DEFAULT NULL,
  `is_available` char(1) DEFAULT NULL,
  `price` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `books` (`barcode`, `Book_Name`, `author`, `publication_year`, `details`, `category`, `language`, `page_count`, `is_available`, `price`) VALUES
(1, 'Nightmare S Cabaret', 'Fausto Bianchi', 2023, 'Welcome to the creepiest show on Earth! ...', 'horror', 'english', 96, 'T', 45.00),
(2, '101 Ghost & Horror Stories', 'Staffs of OM Books', 2022, 'Skeletons playing cricket in a lonely stadium...', 'horror', 'english', 64, 'T', 29.00),
(3, 'Creepella Von Cacklefur: Meet Me in Horrorwood', 'Staffs of Geronimo Stilton', 2011, 'This NEW Geronimo Stilton series spinoff stars spooky, silly Creepella von Cacklefur! ...', 'horror', 'english', 112, 'T', 19.00),
(4, 'Dr. Maniac Vs. Robby Schwartz', 'R. L. Stine', 2008, 'Robby creates comic strips on his computer. His favorite creation is Dr. Maniac, weird and wicked supervillan...', 'horror', 'english', 132, 'T', 19.00),
(5, 'My Friends Call Me Monster', 'R. L. Stine', 2009, 'It\'s a whole new ride from master of fright and bestselling author R.L. Stine--with a story so fiendish that it can\'t be contained in just one book! ...', 'horror', 'english', 144, 'T', 19.00),
(6, 'Creep from the Deep', 'R. L. Stine', 2008, 'Billy and Sheena always expect adventure when they join their uncle, Dr. Deep, aboard his hi-tech boat. ...', 'horror', 'english', 160, 'T', 19.00),
(7, 'Goosebumps: One Day at Horrorland', 'R. L. Stine', 2015, 'The next ride might be their last. . . . The Morris family got lost trying to find Zoo Gardens Theme Park. ...', 'horror', 'english', 144, 'T', 15.00),
(8, 'Monster Blood for Breakfast', 'R. L. Stine', 2008, 'For an athlete like Matt Daniels, breakfast is the most important meal of the day. It\'s also the most dangerous. ...', 'horror', 'english', 137, 'T', 19.00),
(9, 'Who\'s Your Mummy', 'R. L. Stine', 2009, 'Abby and Peter are staying with Uncle Jonathan in an eerie old village. Their uncle knows a lot about Egyptian pyramids, ...', 'horror', 'english', 152, 'T', 35.00),
(10, 'Say Cheese & Die Screaming', 'R. L. Stine', 2008, 'A picture is worth a thousand screams--if it’s taken with an evil camera that has a nasty vision of the future. ...', 'horror', 'english', 152, 'T', 35.00),
(11, 'Science of Strength Training', 'Austin Current', 2021, 'Packed with research that supports the notion that body weight exercises help you reach your weight and fitness goals...', 'science', 'english', 224, 'T', 89.00),
(12, 'Cambridge Primary Science', 'Jon Board', 2014, 'Cambridge Primary Science is a flexible, engaging course written specifically for the Cambridge Primary Science curriculum framework...', 'science', 'english', 28, 'T', 15.00),
(13, 'Science of Yoga', 'Ann Swanson', 2019, 'Did you know that yoga practice can help treat age-related memory loss better than brain-training games? ...', 'science', 'english', 224, 'T', 89.00),
(14, 'Cambridge Primary Science', 'Jon Board', 2021, 'Cambridge Primary Science is a flexible, engaging course written specifically for the Cambridge Primary Science curriculum framework...', 'science', 'english', 196, 'T', 89.00),
(15, 'Guinness Worlds Records: Science & Stuff', 'Staffs of Guinness', 2018, 'Join us as we rise from the depths of the ocean, home to vampire squids from hell, to the dizzy heights of the International Space Station...', 'science', 'english', 216, 'T', 39.00),
(16, 'Cambridge Lower Secondary Science', 'Mary Jones', 2021, 'Discover our new resources for the Cambridge International Primary and Lower Secondary Curriculum Frameworks ...', 'science', 'english', 344, 'T', 149.00),
(17, 'Start Up Computer Science', 'Sharadha Prathap', 2010, 'The beginning of entering the world of computers', 'science', 'english', 68, 'T', 5.00),
(18, 'Stem Activity Book: Science', 'Staffs of Dreamland', 2019, 'Science, Technology, Engineering, Engineering, and Mathematics. ...', 'science', 'english', 64, 'T', 15.00),
(19, 'Outlive - The Science & Art of Longevity', 'Peter Attia', 2023, 'For all its successes, mainstream medicine has failed to make much progress against the diseases of aging that kill most people: heart disease, cancer, Alzheimer\'s disease, and type 2 diabetes...', 'science', 'english', 496, 'T', 139.00),
(20, 'Aircraft Basic Science', 'Michael Kroes', 2013, 'Aircraft Basic Science, Eighth Edition, is a valuable resource for students of aviation technology that provides updated information needed to prepare for an FAA airframe and powerplant maintenance certification...', 'science', 'english', 480, 'T', 335.00),
(21, 'The Motorbike Book', 'DK', 2015, 'The Motorbike Book shows the brilliance and impracticality of different designs and features detailed cross-sections of engines such as the air-cooled two-stroke. ...', 'history', 'english', 320, 'T', 79.00),
(22, 'Atlas Hajj & Umrah', 'Sami Ibn Abdullah', 2019, 'This book is an atlas of Hajj and Umrah in terms of historical, geographical, spatial, and conceptual maps, and images with a legitimate purpose...', 'history', 'english', 415, 'T', 109.00),
(23, 'How to Argue with a Racist - History', 'Adam Rutherford', 2021, 'Race is real because we perceive it. Racism is real because we enact it. But the appeal to science to strengthen racist ideologies is on the rise - and increasingly part of the public discourse on politics...', 'history', 'english', 272, 'T', 79.00),
(24, 'Atlas of the Transatlantic Slave Trade', 'David Eltis', 2010, 'Between 1501 and 1867, the transatlantic slave trade claimed an estimated 12.5 million Africans and involved almost every country with an Atlantic coastline...', 'history', 'english', 320, 'T', 59.00),
(25, 'Battles that Changed History', 'DK', 2018, 'This book chronicles the 50 most important battles spanning over 2,500 years of human history...', 'history', 'english', 360, 'T', 89.00),
(26, 'The First World War', 'Gary Sheffield', 2014, 'The First World War was a watershed in world history. Tragic but far from futile, its origins, events and legacy have roused impassioned debate...', 'history', 'english', 304, 'T', 79.00),
(27, 'Routledge History of the Ancient World', 'Walter Scheidel', 2019, 'The Routledge History of the Ancient World explores how different civilizations and cultures in the ancient world perceived themselves and others,...', 'history', 'english', 944, 'T', 299.00),
(28, 'Babel - an Arcane History', '‎R. F. Kuang‎', 2022, '“Absolutely phenomenal. One of the most brilliant, razor-sharp books I\'ve had the pleasure of reading that isn\'t just an alternative fantastical history, but an interrogative one; one that grabs colonial history and the Industrial Revolution, turns it over, and shakes it out.” -- Shannon Chakraborty, bestselling author of The City of BrassFrom award-winning author R. F. Kuang comes Babel, a thematic response to The Secret History and a tonal retort to Jonathan Strange & Mr. Norrell that grapples with student revolutions, colonial resistance, and the use of language and translation as the dominating tool of the British empire.', 'history', 'english', 560, 'T', 89.00),
(29, 'A Brief History of Time', '‎Stephen Hawking‎', 1989, 'Told in language we all can understand, A Brief History of Time plunges into the exotic realms of black holes and quarks, of antimatter and \"arrows of time,\" of the big bang and a bigger God--where the possibilities are wondrous and unexpected. With exciting images and profound imagination, Stephen Hawking brings us closer to the ultimate secrets at the very heart of creation.', 'history', 'english', 224, 'T', 55.00),
(30, 'Train Book', 'Staffs of DK (Dorling Kindersley)', 2015, 'Packed with stunning photography, The Train Book catalogues the development of trains from early steam to diesel engines and electric locomotives, explores in detail iconic trains such as the Palace on Wheels and the Orient Express, and chronicles the social, political, and cultural backdrop against which railways were built the world over.', 'history', 'english', 320, 'T', 99.00),
(31, 'Larousse Gastronomique', 'Prosper Montagne', 2009, 'Larousse Gastronomique has been the foremost resource of culinary knowledge since its initial publication in 1938. Long revered for its encyclopedic entries on everything from cooking techniques, ingredients, and recipes to equipment, food histories, and culinary biographies, it is the one book every professional chef and avid home cook must have on his or her kitchen shelf. In fact, Julia Child once wrote, \"If I were allowed only one reference book in my library, Larousse Gastronomique would be it, without question.\"', 'cooking', 'english', 1152, 'T', 329.00),
(32, 'Ramadan Cookbook', '‎Anisa Karolia', 2023, 'Discover 80 delicious, easy-to-make recipes perfect for the holy month of Ramadan.In this cookbook, you\'ll find all the recipes you need to make your Ramadan meals family-friendly, fuss-free and filling.From perfect predawn meals for Suhoor, to hearty and satisfying meals for Iftar, as well as dishes made for celebrating with friends and family during Eid al-Fitr, and all the accompanying salads, chutneys, breads, drinks and desserts you\'ll need, this book has all the most popular Ramadan dishes covered.Accompanied by gorgeous photographs throughout, these recipes from much-loved food blogger Anisa Karolia are for anyone looking to eat well before and after fasting.', 'cooking', 'english', 192, 'T', 99.00),
(33, 'Cooking Her Heritage', 'Awatif Al Keneibit', 2020, 'Born in Italy, Anna Francese Gass came to the United States as a young child and grew up eating her mother’s Italian cooking. But when this professional cook realized she did not know how to make her family’s beloved meatballs—a recipe that existed only in her mother’s memory—Anna embarked on a project to record and preserve her mother’s recipes for generations to come.', 'cooking', 'english', 337, 'T', 289.00),
(34, 'The Science of Cooking', 'Stuart Farrimond', 2017, 'Which vegetables should you eat raw? How do you make the perfect poached egg? And should you keep your eggs in the fridge? Why does chocolate taste so good? Is it OK to reheat cooked rice? How do I cook the perfect steak or make succulent fish every time? TV personality, food scientist and bestselling author, Dr. Stuart Farrimond answers all these questions and more with The Science of Cooking - equipping you with the scientific know-how to take your cooking to new levels.', 'cooking', 'english', 256, 'T', 155.00),
(35, 'Indian - A Collection of Over 100 Everyday Recipes', 'Charlie Paul‎', 2011, 'Indian cooking is among the most popular of eastern cuisines Home cooks have now discovered how easy it is to prepare tasty nutritious and authentic Indian dishes using a subtle and aromatic blend of spices. This collection of recipes includes a variety of delicious cuisines from different regions of India and features main dishes, breads, snacks, side dishes and desserts. Whether you are an adventurous cook wanting to expand your culinary repertoire or a beginner experimenting with spices for the first time, you will find a wealth of everyday recipes in this book.', 'cooking', 'english', 206, 'T', 22.00),
(36, 'The Complete Book of Baking - 200 Irresistable', '‎Carole Clements', 2011, 'Here is home baking in all its variety. This heartwarming book contains over 200 irresistible recipes.', 'cooking', 'english', 256, 'T', 35.00),
(37, 'Good Housekeeping: Classic Home Cooking - 300 Traditional Recipes for Every Day', 'Beth Allen', 2010, 'Home cooking never goes out of styleand neither do these dishes, from Southern Fried Chicken to New England Clam Chowder. Good Housekeeping presents the best of traditional American cuisine in one big, beautiful book, complete with delectable photos and the history of each dish--and now availabe in paperback. These are the time-tested, classic choices that families love and home cooks keep coming back to again and again, like Barbecued Ribs, Skillet Cornbread, and Strawberry Shortcake. Historical sidebars inform and entertain the reader with information on a variety of culinary subjects, from Friday Night Fish Fries to Victory Gardens.', 'cooking', 'english', 367, 'T', 35.00),
(38, 'Chocolate (Fine Cooking) - 150 Delicious and Decadent Recipes', '‎Staffs of Fine Cooking‎', 2013, 'So many choices, so many ways to enjoy chocolate. Recipes include a dazzling array of tempting choices from cookies and bars, to cakes, pies, frozen treats, truffles, candies, breads, and muffins. Your most pressing dilemma may just be: which one of these 150 delights should you make first?', 'cooking', 'english', 240, 'T', 39.00),
(39, 'Slow Cooking (Funky Cookbook)', '‎Toni Rament', 2013, 'With over 200 easy recipes for a host of nutritious one-pot meals - including soups, curries, chilies, casseroles, risottos, tagines, pot roasts, stews, and even desserts - The Slow Cook Book offers a variety of delicious recipes. Simply add your ingredients to the pot, let the slow cooker work its magic through the day, and enjoy a delicious home-cooked meal - just \"set it and forget it\".', 'cooking', 'english', 192, 'T', 25.00),
(40, '500 Cheeses (500 Cooking)', '‎Roberta Muir‎', 2010, 'This tempting and wide-ranging guide to cheeses is packed full of information on selecting and tasting cheese from around the globe. Learn the basics of how cheese is made, plus how to choose the perfect cheese and how best to serve and enjoy your selections.', 'cooking', 'english', 288, 'T', 32.00),
(41, 'Battling Boredom', '‎Bryan Harris‎', 2017, 'Drive boredom out of your classroom – and keep it out – with the student-engagement strategies in this book. You’ll learn how to gain and sustain the attention of your students from the moment the bell rings. Perfect for teachers of all subjects and grade levels, these activities go head-to-head with student boredom and disengagement, resulting in class time that’s more efficient, more educational, and loads more fun!', 'education', 'english', 114, 'T', 69.00),
(42, 'Islamic Education', 'Maulvi Abdul Aziz', 2008, 'The series of books prepared by Mr. Abdul Aziz for Grades One to six , has in it units that acquaint the children with Islamic belief , the pillars of Islam , its basic teachings , the life of seal of the Prophet , may the blessings and peace of Allah be upon him, and a few Surahs from the Holy Quran. These lessons are essential to the Muslim children and this is why this series of books is useful and bears importance .Every part of it contains correct Islamic beliefs , it discusses the Life of the prophet and explains its great importance. Since the author possesses a correct ‘Aqeedah” and has knowledge of education and psychology, this series stands out unique in its nature.', 'education', 'english', 113, 'T', 52.00),
(43, 'Childrens Health Education', '‎Staffs of Dreamland', 2020, 'Health education means learning about the importance of social, mental, physical health. By learning it child gradually learns how to maintain their body, how to stay fit, and how to keep their mind healthy. Keeping in view, all these aspects, Dreamland Publications has endeavoured to bring this series that aims at a practical approach to the ways of attaining good health.', 'education', 'english', 80, 'T', 29.00),
(44, 'You', '‎Ken Robinson', 2018, 'Parents everywhere are deeply concerned about the education of their children, especially now, when education has become a minefield of politics and controversy.  One of the world’s most influential educators, Robinson has had countless conversations with parents about the dilemmas they face. As a parent, what should you look for in your children’s education? How can you tell if their school is right for them and what can you do if it isn’t? In this important new book, he offers clear principles and practical advice on how to support your child through the K-12 education system, or outside it if you choose to homeschool or un-school.  Dispelling many myths and tackling critical schooling options and controversies, You, Your Child, and School is a key book for parents to learn about the kind of education their children really need and what they can do to make sure they get it.', 'education', 'english', 304, 'T', 55.00),
(45, 'A Deadly Education (Scholomance) - Lesson 1', '‎Naomi Novik‎', 2021, 'In the start of an all-new series, the bestselling author of Uprooted and Spinning Silver introduces you to a dangerous school for the magically gifted where failure means certain death - until one girl begins to rewrite its rules.', 'education', 'english', 336, 'T', 59.00),
(46, 'Economics', '‎Paul Samuelson‎', 2009, 'The Art of War is a renowned ancient Chinese military treatise written by Sun Tzu, a military strategist and philosopher. Composed around the fifth century BC, it provides valuable insights into warfare and strategy. The book emphasizes the importance of careful planning, understanding the enemy, exploiting weaknesses, and employing tactics to achieve victory. It covers various aspects of warfare, including tactics, intelligence gathering, leadership, and the importance of adaptability. It continues to be studied and applied in various fields beyond the military, including business and politics.', 'education', 'english', 800, 'T', 249.00),
(47, 'Value Education 3', 'Jaya Krishnaswamy', 2008, 'Preschool, kindergarten, nursery LKG (KG 1), UKG (KG 2) and for children 3-8 year old series includes Hindi alphabets (Varnmala Akshar and vyanjan), Hindi 2/3/4 lettered word (shabd) formation, Hindi listening, writing and speaking (swar), English alphabets, phonics, number writing 1-20, number writing 1-50, number writing 1-100, multiplication table book, pattern writing, capital and small letter, drawing and coloring, craft, Hindi rhymes (Bal Geet), English rhymes and activity based workbooks. Primary, middle and senior Class 1 to 12 Series includes Hindi literature, Hindi grammar, Mathematics, mental math, EVS, Science, computer, value education, General Knowledge (GK), English handwriting, Hindi handwriting and drawing. Based on NCERT for CBSE and state boards as per curriculum and exam paper pattern. E-book, combo Pack and gift set also available on discount. Watch video for features, benefits and advantages of the book.', 'education', 'english', 48, 'T', 12.00),
(48, 'Physics for Cambridge IGCSE Coursebook', 'David Sang', 2021, 'This print and digital coursebook has been developed from extensive research through lesson observations, interviews and work with our research community (the Cambridge Panel) to meet specific needs. Activities and questions develop students’ essential skills, including practical work. English as a second language learners are supported with command terms, accessible language and glossary definitions. Exam-style questions build student confidence. Projects provide opportunities for assessment for learning, cross-curricular learning and developing skills for life. There are multiple opportunities to engage in active learning, from scripting a podcast, to discussions and debates. In each chapter students are given the chance to reflect on their work, helping them become responsible, independent learners, thinking not just ‘what’ they did well or not well, but ‘why’ and ‘how’ they came up with the answer they did, and how they might improve this in future. Regular self-assessment and peer-assessment features give students the opportunity to assess their own work or the work of their peers in relation to the learning intentions and learn from one another. Answers are accessible to teachers for free on the Cambridge GO platform.', 'education', 'english', 511, 'T', 199.00),
(49, 'Educational Psychology', 'S. B. Kakkar', 2004, 'Designed as an undergraduate textbook for students offering courses in Educational Psychology, this well-organized study gives a detailed description of key concepts such as learning, intelligence and personality and various contemporary theories governing these. The significance of educational and vocational guidance, particularly of exceptional children, is clearly and forcefully brought out. The text is well illustrated with diagrams to elucidate the concepts discussed.', 'education', 'english', 208, 'T', 49.00),
(50, '1100 Words You Need to Know', 'Murray Bromberg', 2018, 'All new words for students to learn are placed in the context of sentences that have been selected from well-known novels, plays, poems, newspaper editorials, and TV broadcasts. For optimal ease and enjoyment in learning, the authors recommend 15-minute sessions with this book.', 'education', 'english', 432, 'T', 59.00),
(51, 'My Brilliantly Blue', 'Staffs of Hinkler', 2011, 'Packed with appealing games, puzzles, picture activities and more than 350 easy-to-peel stickers, My Brilliantly Blue Sticker Book will keep your youngster busy all day long Children will have fun as they learn about Farms, Wild Animals, Cars, Mighty Movers, Dinosaurs and Space with this exciting sticker book My Brilliantly Blue Sticker Book guarantees hours and hours of fun for young children.', 'education', 'english', 36, 'T', 10.00);

CREATE TABLE `invoices` (
  `invoice_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `invoice_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `total_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `invoice_items` (
  `item_id` int(11) NOT NULL,
  `invoice_id` int(11) DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `Full_Name` varchar(15) DEFAULT NULL,
  `pass` varchar(11) DEFAULT NULL,
  `Email` varchar(40) DEFAULT NULL,
  `Address` varchar(30) DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `users` (`user_id`, `username`, `Full_Name`, `pass`, `Email`, `Address`, `role`) VALUES
(1, '1', 'Mohammed', 'Aa123123', '', NULL, 'admin');

ALTER TABLE `books`
  ADD PRIMARY KEY (`barcode`);

ALTER TABLE `invoices`
  ADD PRIMARY KEY (`invoice_id`);

ALTER TABLE `invoice_items`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `invoice_id` (`invoice_id`),
  ADD KEY `invoice_items_ibfk_2` (`book_id`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

ALTER TABLE `invoices`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `invoice_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `invoice_items`
  ADD CONSTRAINT `invoice_items_ibfk_1` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`invoice_id`),
  ADD CONSTRAINT `invoice_items_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`barcode`) ON DELETE CASCADE,
  ADD CONSTRAINT `new_invoice_items_fk` FOREIGN KEY (`book_id`) REFERENCES `books` (`barcode`) ON DELETE CASCADE;
COMMIT;
