-- phpMyAdmin SQL Dump
-- version 4.7.1
-- https://www.phpmyadmin.net/
--
-- Host: remotemysql.com
-- Generation Time: Mar 25, 2020 at 08:54 AM
-- Server version: 8.0.13-4
-- PHP Version: 7.0.33-0ubuntu0.16.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gAhuN8MGYk`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` int(11) NOT NULL,
  `img_path` text NOT NULL,
  `title` text NOT NULL,
  `author` text NOT NULL,
  `publisher` text NOT NULL,
  `description` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `category` text,
  `publish_date` date DEFAULT NULL,
  `upload_id` int(11) DEFAULT NULL,
  `isbn` varchar(20) DEFAULT NULL,
  `sku` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `img_path`, `title`, `author`, `publisher`, `description`, `quantity`, `category`, `publish_date`, `upload_id`, `isbn`, `sku`) VALUES
(1, 'https://images-na.ssl-images-amazon.com/images/I/41egpUfqC1L._SX403_BO1,204,203,200_.jpg', 'Basic Physics: A Self-Teaching Guide', 'Karl F. Kuhn', 'Wiley Publishing & Co.', 'Here is the most practical, complete, and easy-to-use guide available for understanding physics and the physical world. Even if you don\'t consider yourself a \"science\" person, this book helps make learning key concepts a pleasure, not a chore. Whether you need help in a course, want to review the basics for an exam, or simply have always been curious about such physical phenomena as energy, sound, electricity, light, and color, you\'ve come to the right place! This fully up-to-date edition of Basic Physics.', 149000, 'Sains', '2020-01-09', 1, 'ISBN 849357486-0', '123445'),
(2, 'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1407257288l/22876442.jpg', 'No bullshit guide to math and physics 5th Edition', 'Ivan Savov', 'Ivan George Company', 'Often calculus and mechanics are taught as separate subjects. It shouldn\'t be like that. Learning calculus without mechanics is incredibly boring. Learning mechanics without calculus is missing the point. This textbook integrates both subjects and highlights the profound connections between them.\r\n\r\nThis is the deal. Give me 350 pages of your attention, and I\'ll teach you everything you need to know about functions, limits, derivatives, integrals, vectors, forces, and accelerations. This book is the only math book you\'ll need for the first semester of undergraduate studies in science.', 59000, 'Matematika', '2020-01-13', 2, 'ISBN 849357486-0', '523578'),
(3, 'https://upload.wikimedia.org/wikipedia/en/thumb/e/e2/TheElegantUniverse.jpg/220px-TheElegantUniverse.jpg', 'The Elegant Universe: Superstrings, Hidden Dimensions, and the Quest for the Ultimate Theory', 'Brian Greene', 'W. W. Norton & Company Inc.', 'Brian Greene, one of the world\'s leading string theorists, peels away layers of mystery to reveal a universe that consists of eleven dimensions, where the fabric of space tears and repairs itself, and all matter?from the smallest quarks to the most gargantuan supernovas?is generated by the vibrations of microscopically tiny loops of energy. The Elegant Universe makes some of the most sophisticated concepts ever contemplated accessible and thoroughly entertaining, bringing us closer than ever to understanding how the universe works.', 55000, 'Geografi', '2020-01-20', 3, 'ISBN 849313586-0', '895956'),
(4, 'https://images-na.ssl-images-amazon.com/images/I/51JiIBADkNL._SX331_BO1,204,203,200_.jpg', 'Death by Black Hole: And Other Cosmic Quandaries', 'Neil deGrasse Tyson', 'Book Lovers Inc', 'Loyal readers of the monthly \"Universe\" essays in Natural History magazine have long recognized Neil deGrasse Tyson\'s talent for guiding them through the mysteries of the cosmos with clarity and enthusiasm. Bringing together more than forty of Tyson\'s favorite essays, ?Death by Black Hole? explores a myriad of cosmic topics, from what it would be like to be inside a black hole to the movie industry\'s feeble efforts to get its night skies right. One of America\'s best-known astrophysicists, Tyson is a natural teacher who simplifies the complexities of astrophysics while sharing his infectious fascination for our universe.', 219000, 'Novel', '2020-01-26', 4, 'ISBN 849357486-0', '864678'),
(5, 'https://images-na.ssl-images-amazon.com/images/I/51w4axfzN6L._SX331_BO1,204,203,200_.jpg', 'The Origin of Overweight', 'Yvonne Foss', 'Lilian John Books', 'Why is it so easy to gain weight and yet so difficult to lose it? Why is extra weight so bad for your health if it is just a store of energy? Why have no safe and effective weight-loss drugs been developed? Why is obesity higher among the rich in poor countries and among the poor in rich countries? Why is the prevalence of obesity particularly high in island nations? What can we all do immediately (whatever our size) to improve our health and prevent weight gain? The Origin of Overweight investigates the link between vitamin D and body weight. This eye-opening exploration reveals that the effect of fossil fuel emissions on ultraviolet radiation is one aspect of climate change that has been overlooked - yet it could be the main cause of the rise in obesity. It shows why a deeper understanding of biology and climate change is necessary to deal with the problem of overweight and obesity, and why our obsession with the usual suspects of food, drink, diet, and exercise is having little effect.', 350000, 'Umum', '2020-01-30', 5, 'ISBN 815657486-0', '315653'),
(6, 'https://images-na.ssl-images-amazon.com/images/I/51FGOpABSBL._SX348_BO1,204,203,200_.jpg', 'Monarchs in a Changing World: Biology and Conservation of an Iconic Butterfly', 'Karen S. Oberhauser and Kelly R. Nail', 'Cornell University Press', 'Monarch butterflies are among the most popular insect species in the world and are an icon for conservation groups and environmental education programs. Monarch caterpillars and adults are easily recognizable as welcome visitors to gardens in North America and beyond, and their spectacular migration in eastern North America (from breeding locations in Canada and the United States to overwintering sites in Mexico) has captured the imagination of the public.\r\n\r\nMonarch migration, behavior, and chemical ecology have been studied for decades. Yet many aspects of monarch biology have come to light in only the past few years. These aspects include questions regarding large-scale trends in monarch population sizes, monarch interactions with pathogens and insect predators, and monarch molecular genetics and large-scale evolution. A growing number of current research findings build on the observations of citizen scientists, who monitor monarch migration, reproduction, survival, and disease. Monarchs face new threats from humans as they navigate a changing landscape marked by deforestation, pesticides, genetically modified crops, and a changing climate, all of which place the future of monarchs and their amazing migration in peril.\r\n\r\nTo meet the demand for a timely synthesis of monarch biology, conservation and outreach, Monarchs in a Changing World summarizes recent developments in scientific research, highlights challenges and responses to threats to monarch conservation, and showcases the many ways that monarchs are used in citizen science programs, outreach, and education. It examines issues pertaining to the eastern and western North American migratory populations, as well as to monarchs in South America, the Pacific and Caribbean Islands, and Europe. The target audience includes entomologists, population biologists, conservation policymakers, and K–12 teachers.', 350000, 'Sains', '2020-02-04', 6, 'ISBN 849352467-0', '357447'),
(7, 'https://images-na.ssl-images-amazon.com/images/I/41PrfZL3V1L._SX328_BO1,204,203,200_.jpg', 'The Buzz about Bees: Biology of a Superorganism', 'Jurgen Tautz', 'Spring Corporation', 'Tis book, already translated into ten languages, may at frst sight appear to be just about honeybees and their biology. It c- tains, however, a number of deeper messages related to some of the most basic and important principles of modern biology. Te bees are merely the actors that take us into the realm of phys- ology, genetics, reproduction, biophysics and learning, and that introduce us to the principles of natural selection underlying the evolution of simple to complex life forms. Te book destroys the cute notion of bees as anthropomorphic icons of busy self-sacr -i fcing individuals and presents us with the reality of the colony as an integrated and independent being?a “superorganism”?with its own, almost eerie, emergent group intelligence. We are s- prised to learn that no single bee, from queen through drone to sterile worker, has the oversight or control over the colony. - stead, through a network of integrated control systems and fee- backs, and communication between individuals, the colony - rives at consensus decisions from the bottom up through a type of “swarm intelligence”. Indeed, there are remarkable parallels between the functional organization of a swarming honeybee colony and vertebrate brains.', 149000, 'Sains', '2020-02-14', 7, 'ISBN 8493585547-0', '584367'),
(8, 'https://images-na.ssl-images-amazon.com/images/I/516A0zsr5tL._SY457_BO1,204,203,200_.jpg', 'Madhur Jaffrey\'s Quick & Easy Indian Cooking', 'Madhur Jaffrey', 'Chronicle Books LLC', 'With more than ten reprints, it\'s clear cookbook author Madhur Jaffrey wins the popular vote for delicious Indian recipes that can be prepared in 30 minutes or less. Now with a beautiful new design and all-new photographs, Madhur Jaffrey\'s Quick & Easy Indian Cooking is ready to wow another generation of home cooks. Written by the world\'s foremost authority on Indian cooking, this terrific volume boasts a tantalizing array of appetizers, entres, beverages, and desserts for every occasion. From Silken Chicken and Pork Vindaloo to Fresh Red Chutney with Almonds and Sweet, Pale Orange, Mango Lassi, Quick & Easy Indian Cooking makes this exotic cuisine accessible and enjoyableas perfect for entertaining as it is for everyday cooking.\n\nThis title was selected in the New York Times list of \"most-stained\" favorite cookbooks from a miscellany of chefs, authors, shop and restaurant owners, stylists and bloggers.', 215000, 'Drama', '2020-02-23', 8, 'ISBN 849337952-0', '563768'),
(9, 'https://images-na.ssl-images-amazon.com/images/I/51o2wpCzQsL._SX397_BO1,204,203,200_.jpg', 'The Book of Veganish: The Ultimate Guide to Easing into a Plant-Based, Cruelty-Free, Awesomely Delicious Way to Eat, with 70 Easy Recipes Anyone can Make', 'Kathy Freston', 'PAM KRAUSS BOOKS AVERY', 'The Book of Veganish contains everything curious young adults need to help them navigate through the transition to a vegan lifestyle. The 70 simple recipes are perfect for those with tight budgets and rudimentary cooking tools (and skills). Filled with insights on the benefits of adopting a plant-based diet and how to best deal with parents and the rest of the nonvegan world, The Book of Veganish will allow existing and aspiring vegans to feel confident about their new lifestyle choices.', 345000, 'Seni', '2020-03-03', 9, 'ISBN 849335684-0', '058974'),
(10, 'https://images-na.ssl-images-amazon.com/images/I/51oHUvYzbsL._SX327_BO1,204,203,200_.jpg', 'The Theory of Everything: The Origin and Fate of the Universe', 'Stephen W Hawking', 'Phoenix Books', 'Based on a series of lectures given at Cambridge University, Professor Hawking\'s work introduced \"the history of ideas about the universe\" as well as today\'s most important scientific theories about time, space, and the cosmos in a clear, easy-to-understand way.', 49900, 'Literatur', '2020-03-06', 10, 'ISBN 847648486-0', '245743'),
(11, 'file_buku/Buku Fadil.jpg', 'Buku Fadil', 'Julian Septiana Aji', '', 'Materi diorama kehidupan, terkadang diatas terkadang dibawah', 150000, 'Sastra', '2020-03-22', 11, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `no` int(11) NOT NULL,
  `sub_category` varchar(30) DEFAULT NULL,
  `category` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`no`, `sub_category`, `category`) VALUES
(1, 'Umum', 'Non Fiksi'),
(2, 'Filsafat', 'Non Fiksi'),
(3, 'Psikologi', 'Non Fiksi'),
(4, 'Agama', 'Non Fiksi'),
(5, 'Sejarah', 'Non Fiksi'),
(6, 'Sosial', 'Non Fiksi'),
(7, 'Bahasa', 'Non Fiksi'),
(8, 'Sains', 'Non Fiksi'),
(9, 'Geografi', 'Non Fiksi'),
(10, 'Teknologi', 'Non Fiksi'),
(11, 'Seni', 'Non Fiksi'),
(12, 'Literatur', 'Non Fiksi'),
(13, 'Sastra', 'Non Fiksi'),
(14, 'Biografi', 'Non Fiksi'),
(15, 'Matematika', 'Non Fiksi'),
(16, 'Novel', 'Fiksi'),
(17, 'Cerpen', 'Fiksi'),
(18, 'Puisi', 'Fiksi'),
(19, 'Drama', 'Fiksi'),
(20, 'Komik', 'Fiksi'),
(21, 'Dongeng', 'Fiksi'),
(22, 'Fabel', 'Fiksi'),
(23, 'Mitos', 'Fiksi');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `purchase_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`purchase_id`, `book_id`, `user_id`, `date`, `content`) VALUES
(1, 10, 3, '2016-11-10', 'With a title inspired as much by Douglas Adams\' Hitchhiker series as Einstein, The Theory of Everything delivers almost as much as it promises. Transcribed from Stephen Hawking\'s Cambridge Lectures, the slim volume may not present a single theory unifying gravity with the other fundamental forces, but it does carefully explain the state of late 20th-century physics with the great scientist\'s characteristic humility and charm. Explicitly shunning math, Hawking explains the fruits of 100 years of heavy thinking with metaphors that are simple but never condescending--he compares the settling of the newborn universe into symmetry to the formation of ice crystals in a glass of water, for example. While he explores his own work (especially when speaking about black holes), he also discusses the important milestones achieved by others like Richard Feynman. Though occasionally an impenetrably obscure phrase does slip by, the reader will find the bulk of the text enlightening and engaging. The material, from the nature of time to the possibility that the universe has no beginning or end, is rich and deep and inevitably ignites metaphysical thinking. After all, Hawking is famous for his \"we would know the mind of God\" remark, which ends the final lecture herein. --Rob Lightner --This text refers to an out of print or unavailable edition of this title.'),
(2, 10, 4, '2016-11-11', '\"...can explain the complexities of cosmological physics with an engaging combination of clarity and with..his is a brain of extraordinary power.\" --The New York Review of Books ');

-- --------------------------------------------------------

--
-- Table structure for table `submission`
--

CREATE TABLE `submission` (
  `submission_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `submission`
--

INSERT INTO `submission` (`submission_id`, `book_id`, `user_id`) VALUES
(1, 2, 8),
(2, 3, 3),
(3, 4, 5),
(4, 6, 7),
(5, 1, 6),
(6, 4, 10),
(7, 10, 3),
(8, 8, 7),
(9, 4, 8),
(10, 9, 9);

-- --------------------------------------------------------

--
-- Table structure for table `unggah`
--

CREATE TABLE `unggah` (
  `no` int(11) NOT NULL,
  `title` text,
  `author` varchar(100) DEFAULT NULL,
  `category` varchar(30) DEFAULT NULL,
  `description` text,
  `file` text,
  `upload_date` date DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `user_id` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `unggah`
--

INSERT INTO `unggah` (`no`, `title`, `author`, `category`, `description`, `file`, `upload_date`, `status`, `user_id`) VALUES
(1, 'Basic Physics: A Self-Teaching Guide', 'Karl F. Kuhn', 'Sains', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras efficitur, ex aliquam tempus rhoncus, enim erat viverra felis, at volutpat orci purus sit amet ante. Maecenas luctus scelerisque velit. Mauris sit amet iaculis turpis, at venenatis ante.', 'Basic Physics.pdf', '2020-01-06', 'Pengajuan Diterima', 'euler'),
(2, 'No bullshit guide to math and physics 5th Edition', 'Ivan Sayov', 'Matematika', 'Often calculus and mechanics are taught as separate subjects. It shouldn\'t be like that. Learning calculus without mechanics is incredibly boring. Learning mechanics without calculus is missing the point. This textbook integrates both subjects and highlights the profound connections between them.\r\n\r\nThis is the deal. Give me 350 pages of your attention, and I\'ll teach you everything you need to know about functions, limits, derivatives, integrals, vectors, forces, and accelerations. This book is the only math book you\'ll need for the first semester of undergraduate studies in science.', 'No Bullshit Guide to Math.pdf', '2020-01-10', 'Pengajuan Diterima', 'faraday'),
(3, 'The Elegant Universe: Superstrings, Hidden Dimensions, and the Quest for the Ultimate Theory', 'Brian Greene', 'Geografi', 'Brian Greene, one of the world\'s leading string theorists, peels away layers of mystery to reveal a universe that consists of eleven dimensions, where the fabric of space tears and repairs itself, and all matter?from the smallest quarks to the most gargantuan supernovas?is generated by the vibrations of microscopically tiny loops of energy. The Elegant Universe makes some of the most sophisticated concepts ever contemplated accessible and thoroughly entertaining, bringing us closer than ever to understanding how the universe works.', 'The Elegant Universe.pdf', '2020-01-17', 'Pengajuan Diterima', 'faraday'),
(4, 'Death by Black Hole: And Other Cosmic Quandaries', 'Neil deGrasse Tyson', 'Novel', 'Loyal readers of the monthly \"Universe\" essays in Natural History magazine have long recognized Neil deGrasse Tyson\'s talent for guiding them through the mysteries of the cosmos with clarity and enthusiasm. Bringing together more than forty of Tyson\'s favorite essays, ?Death by Black Hole? explores a myriad of cosmic topics, from what it would be like to be inside a black hole to the movie industry\'s feeble efforts to get its night skies right. One of America\'s best-known astrophysicists, Tyson is a natural teacher who simplifies the complexities of astrophysics while sharing his infectious fascination for our universe.', 'Death By Black Hole.pdf', '2020-01-23', 'Pengajuan Diterima', 'newton'),
(5, 'The Origin of Overweight', 'Yvonne Foss', 'Umum', '• Why is it so easy to gain weight and yet so difficult to lose it? • Why is extra weight so bad for your health if it is just a store of energy? • Why have no safe and effective weight-loss drugs been developed? • Why is obesity higher among the rich in poor countries and among the poor in rich countries? • Why is the prevalence of obesity particularly high in island nations? • What can we all do immediately (whatever our size) to improve our health and prevent weight gain? The Origin of Overweight investigates the link between vitamin D and body weight. This eye-opening exploration reveals that the effect of fossil fuel emissions on ultraviolet radiation is one aspect of climate change that has been overlooked - yet it could be the main cause of the rise in obesity. It shows why a deeper understanding of biology and climate change is necessary to deal with the problem of overweight and obesity, and why our obsession with the usual suspects of food, drink, diet, and exercise is having little effect.', 'The Origin of Overweight.pdf', '2020-01-27', 'Pengajuan Diterima', 'euler'),
(6, 'Monarchs in a Changing World: Biology and Conservation of an Iconic Butterfly', 'Karen S. Oberhauser and Kelly R. Nail', 'Sains', 'Monarch butterflies are among the most popular insect species in the world and are an icon for conservation groups and environmental education programs. Monarch caterpillars and adults are easily recognizable as welcome visitors to gardens in North America and beyond, and their spectacular migration in eastern North America (from breeding locations in Canada and the United States to overwintering sites in Mexico) has captured the imagination of the public.\r\n\r\nMonarch migration, behavior, and chemical ecology have been studied for decades. Yet many aspects of monarch biology have come to light in only the past few years. These aspects include questions regarding large-scale trends in monarch population sizes, monarch interactions with pathogens and insect predators, and monarch molecular genetics and large-scale evolution. A growing number of current research findings build on the observations of citizen scientists, who monitor monarch migration, reproduction, survival, and disease. Monarchs face new threats from humans as they navigate a changing landscape marked by deforestation, pesticides, genetically modified crops, and a changing climate, all of which place the future of monarchs and their amazing migration in peril.\r\n\r\nTo meet the demand for a timely synthesis of monarch biology, conservation and outreach, Monarchs in a Changing World summarizes recent developments in scientific research, highlights challenges and responses to threats to monarch conservation, and showcases the many ways that monarchs are used in citizen science programs, outreach, and education. It examines issues pertaining to the eastern and western North American migratory populations, as well as to monarchs in South America, the Pacific and Caribbean Islands, and Europe. The target audience includes entomologists, population biologists, conservation policymakers, and K–12 teachers.', 'Monarchs in a Changing World.pdf', '2020-02-01', 'Pengajuan Diterima', 'faraday'),
(7, 'The Buzz about Bees: Biology of a Superorganism', 'Jurgen Tautz', 'Sains', 'Tis book, already translated into ten languages, may at frst sight appear to be just about honeybees and their biology. It c- tains, however, a number of deeper messages related to some of the most basic and important principles of modern biology. Te bees are merely the actors that take us into the realm of phys- ology, genetics, reproduction, biophysics and learning, and that introduce us to the principles of natural selection underlying the evolution of simple to complex life forms. Te book destroys the cute notion of bees as anthropomorphic icons of busy self-sacr -i fcing individuals and presents us with the reality of the colony as an integrated and independent being?a “superorganism”?with its own, almost eerie, emergent group intelligence. We are s- prised to learn that no single bee, from queen through drone to sterile worker, has the oversight or control over the colony. - stead, through a network of integrated control systems and fee- backs, and communication between individuals, the colony - rives at consensus decisions from the bottom up through a type of “swarm intelligence”. Indeed, there are remarkable parallels between the functional organization of a swarming honeybee colony and vertebrate brains.', 'The Buzz about Bees.pdf', '2020-02-11', 'Pengajuan Diterima', 'newton'),
(8, 'Madhur Jaffrey\'s Quick & Easy Indian Cooking', 'Madhur Jaffrey', 'Drama', 'With more than ten reprints, it\'s clear cookbook author Madhur Jaffrey wins the popular vote for delicious Indian recipes that can be prepared in 30 minutes or less. Now with a beautiful new design and all-new photographs, Madhur Jaffrey\'s Quick & Easy Indian Cooking is ready to wow another generation of home cooks. Written by the world\'s foremost authority on Indian cooking, this terrific volume boasts a tantalizing array of appetizers, entres, beverages, and desserts for every occasion. From Silken Chicken and Pork Vindaloo to Fresh Red Chutney with Almonds and Sweet, Pale Orange, Mango Lassi, Quick & Easy Indian Cooking makes this exotic cuisine accessible and enjoyableas perfect for entertaining as it is for everyday cooking.\r\n\r\nThis title was selected in the New York Times list of \"most-stained\" favorite cookbooks from a miscellany of chefs, authors, shop and restaurant owners, stylists and bloggers.', 'Madhur Jaffrey Indian Cooking.pdf', '2020-02-20', 'Pengajuan Diterima', 'faraday'),
(9, 'The Book of Veganish: The Ultimate Guide to Easing into a Plant-Based, Cruelty-Free', 'Kathy Freston', 'Sosial', 'The Book of Veganish contains everything curious young adults need to help them navigate through the transition to a vegan lifestyle. The 70 simple recipes are perfect for those with tight budgets and rudimentary cooking tools (and skills). Filled with insights on the benefits of adopting a plant-based diet and how to best deal with parents and the rest of the nonvegan world, The Book of Veganish will allow existing and aspiring vegans to feel confident about their new lifestyle choices.', 'The Book of Veganish.pdf', '2020-02-29', 'Pengajuan Diterima', 'newton'),
(10, 'The Theory of Everything: The Origin and Fate of the Universe', 'Stephen W Hawking', 'Literatur', 'Based on a series of lectures given at Cambridge University, Professor Hawking\'s work introduced \"the history of ideas about the universe\" as well as today\'s most important scientific theories about time, space, and the cosmos in a clear, easy-to-understand way.', 'The Theory of Everything.pdf', '2020-03-03', 'Pengajuan Diterima', 'euler'),
(11, 'Buku Fadil', 'Julian Septiana Aji', 'Sastra', 'Materi tentang diorama kehidupan, kadang diatas kadang bisa dibawah', 'Buku Fadil.pdf', '2020-03-22', 'Pengajuan Diterima', 'fidrian');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `nama_lengkap` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `role`, `email`, `nama_lengkap`) VALUES
(1, 'admin', 'admin', 'admin', 'admin@anabatic.com', 'Administrator'),
(2, 'test', '123', 'editor', 'learningsupport@anabatic.com', 'Learning Center'),
(3, 'newton', 'isaac', 'user', NULL, NULL),
(4, 'euler', 'leonhard', 'user', NULL, NULL),
(5, 'faraday', 'michael', 'user', NULL, NULL),
(6, 'fidrian', 'qwerty123', 'user', 'fidrian123@gmail.com', 'M. Fadil Fidrian'),
(7, 'julian', 'julian', 'user', 'julian@gmail.com', 'julian'),
(8, 'binar', 'qwerty1234.', 'user', 'binar@gmail.com', 'binariyantoaji'),
(9, 'kartiko', '123456', 'user', 'kartiko@gmail.com', 'Kartiko Pramudito');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`purchase_id`),
  ADD KEY `book_id` (`book_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `submission`
--
ALTER TABLE `submission`
  ADD PRIMARY KEY (`submission_id`),
  ADD KEY `book_id` (`book_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `unggah`
--
ALTER TABLE `unggah`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `submission`
--
ALTER TABLE `submission`
  MODIFY `submission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `unggah`
--
ALTER TABLE `unggah`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `purchase`
--
ALTER TABLE `purchase`
  ADD CONSTRAINT `purchase_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `purchase_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
