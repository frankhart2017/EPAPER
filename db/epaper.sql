-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2019 at 10:32 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epaper`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `uid` text NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `pid`, `uid`, `comment`) VALUES
(10, 3, 'RA1611003010876', 'first post'),
(11, 3, 'RA1611003010876', 'hello comment on archived post'),
(12, 4, 'RA1611003010876', 'ooo this is python'),
(13, 3, 'RA1611003010876', 'comment'),
(14, 4, 'RA1611003010984', 'ok ok this'),
(16, 4, 'Machine Learning Admin', 'yeah this is correct'),
(17, 3, 'Machine Learning Admin', 'ok this may be incorrect'),
(18, 5, 'IoT Admin', 'Test iot post'),
(19, 4, 'RA1611003010876', 'mera comment'),
(20, 4, 'ra1611003010984', 'ye kya chal rha hai be');

-- --------------------------------------------------------

--
-- Table structure for table `dept_table`
--

CREATE TABLE `dept_table` (
  `DEPT_ID` int(11) NOT NULL,
  `DEPT_NAME` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dept_table`
--

INSERT INTO `dept_table` (`DEPT_ID`, `DEPT_NAME`) VALUES
(11, 'CIVIL ENGINEERING'),
(12, 'COMPUTER SCIENCE AND ENGINEERING'),
(13, 'ELECTRICAL AND ELECTRONICS ENGINEERING'),
(14, 'ELECTRONICS AND COMMUNICATION ENGINEERING'),
(15, 'ELECTRONICS AND INSTRUMENTATION ENGINEERING'),
(16, 'INFORMATION TECHNOLOGY'),
(17, 'MECHANICAL ENGINEERING'),
(18, 'MASTERS AND BUSINESS ADMINISTRATION');

-- --------------------------------------------------------

--
-- Table structure for table `learning`
--

CREATE TABLE `learning` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `a` text NOT NULL,
  `b` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `learning`
--

INSERT INTO `learning` (`id`, `question`, `a`, `b`) VALUES
(1, 'I understand something better after I ', 'try it out', 'think it through'),
(2, 'I would rather be considered', 'realistic', 'innovative'),
(3, 'When I think about what I did yesterday, I am most likely to get', 'a picture', 'words'),
(4, 'I tend to understand', 'details of a subject but unsure about its overall structure', 'the overall structure but unsure about details'),
(5, 'When I am learning something new, it helps me to', 'talk about it', 'think about it'),
(6, 'As a student, I like to learn a subject that deals with', 'facts and real life situations', 'ideas and theories'),
(7, 'I prefer to get new information in', 'pictures, diagrams, graphs, or maps', 'written directions or verbal information'),
(8, 'Once I understand', 'all the parts, I understand the whole thing', 'the whole thing, I see how the parts fit'),
(9, 'In a study group working on difficult material, I am more likely to', 'jump in and contribute ideas', 'sit back and listen'),
(10, 'I find it easier', 'to learn facts', 'to learn concepts'),
(11, 'In a book with lots of pictures and charts, I am likely to', 'look over the pictures and charts carefully', 'focus on the written text'),
(12, 'When I solve math problems', 'I usually work my way to the solutions one step at a time', 'I often know the solution but have struggle with the steps'),
(13, 'In my class', 'I have gotten to know many of my classmates', 'I have rarely gotten to know many of my classmates'),
(14, 'In reading non-fiction stories, I prefer', 'stories that gives new facts or tells me how to do something', 'stories that gives me new ideas to think about'),
(15, 'I like teachers who', 'puts a lot of diagrams on board', 'spends a lot of time explaining'),
(16, 'When I’m analyzing a story or a novel', 'I think of the incidents and try to put them together to figure out the theme', 'I just know what the themes are when I finish reading and then I have to go back and find the incidents that demonstrate them'),
(17, 'When I start a homework problem, I am more likely to', 'start working on the solution immediately', 'try to fully understand the problem first'),
(18, 'I prefer the idea of', 'certainty', 'theory'),
(19, 'I remember best', 'what I see', 'what I hear'),
(20, 'It is more important to me that my teacher', 'lay out the material in clear sequential steps', 'give me an overall picture and relate the material to other subjects'),
(21, 'I prefer to study', 'in a study group', 'alone'),
(22, 'I am more likely to be considered', 'careful about the details of my work', 'creative about how to do my work'),
(23, 'When I get directions to a new place, I prefer', 'a map', 'written instructions'),
(24, 'I learn', 'at a regular pace. If I study hard, I’ll “get it.”', 'in random way. I’ll be totally confused and then suddenly it all “clicks.”'),
(25, 'I would rather first', 'try things out', 'think about how I’m going to do it'),
(26, 'When I am reading for enjoyment, I like writers of books to', 'clearly say what they mean', 'say things in creative, interesting ways'),
(27, 'When I see a diagram or sketch in class, I am most likely to remember', 'the picture', 'what the teacher said about it'),
(28, 'When considering a body of information,  I am more likely to', 'focus on details and miss the big picture', 'try to understand the big picture before getting into the details'),
(29, 'I more easily remember', 'something I have done', 'something I have thought a lot about'),
(30, 'When I have to perform a task, I prefer to', 'master one way of doing it', 'come up with new ways of doing it'),
(31, 'When someone is showing me data, I prefer', 'charts or graphs', 'text summarizing the results'),
(32, 'When writing a paper, I am more likely to', 'work on the beginning of the paper and progress forward', 'work on (think about or write) different parts of the paper and then order them'),
(33, 'When I have to work on a group project, I first want to', 'have “group brainstorming” where everyone contributes ideas', 'brainstorm individually and then come together as a group to compare ideas'),
(34, 'I consider it higher praise to call someone', 'sensible', 'imaginative'),
(35, 'When I meet people at a party, I am more likely to remember', 'what they looked like', 'what they said about themselves'),
(36, 'When I am learning a new subject, I prefer to', 'stay focused on that subject, learning as much about it as I can', 'try to make connections between that subject and related subjects'),
(37, 'I am more likely to be considered', 'outgoing', 'reserved'),
(38, 'I prefer courses that emphasize', 'concrete material (facts, data)', 'abstract material (concepts, theories)'),
(39, 'For entertainment, I would rather', 'watch television', 'read a book'),
(40, 'Some teachers start their lectures with an outline of what they will cover. Such outlines are', 'somewhat helpful to me', 'very helpful to me'),
(41, 'The idea of doing homework in groups, with one grade for the entire group', 'appeals to me', 'does not appeal to me'),
(42, 'When I am doing long calculations', 'I tend to repeat all my steps and check my work carefully', 'I find checking tiresome and have to force myself to do it'),
(43, 'I tend to picture places I have been', 'easily and fairly accurately', 'with difficulty and without much detail'),
(44, 'When solving problems in a group, I would be more likely to', 'think of the steps in the solution process', 'think of possible  applications of the solution in a wide range of areas');

-- --------------------------------------------------------

--
-- Table structure for table `leisure`
--

CREATE TABLE `leisure` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `leisure`
--

INSERT INTO `leisure` (`id`, `question`) VALUES
(1, 'In your spare time, would you enjoy...  participating in athletic activities e.g. cricket, football, shuttle, tennis, etc?'),
(2, 'In your spare time, would you enjoy...  organizing business or financial records for a youth club or an organization?'),
(3, 'In your spare time, would you enjoy...  promoting a good cause for a community or an organization?'),
(4, 'In your spare time, would you enjoy...  doing voluntary mentoring, teaching or counseling those needing help?'),
(5, 'In your spare time, would you enjoy...  using the internet to compare prices and quality of products?'),
(6, 'In your spare time, would you enjoy...  visiting science fairs, museums, aquariums or zoos?'),
(7, 'In your spare time, would you enjoy...  reading mechanical, automotive or product review magazines?'),
(8, 'In your spare time, would you enjoy...  using a computer to record and keep track of your personal records?'),
(9, 'In your spare time, would you enjoy...  using your own website to promote an idea or topic of interest?'),
(10, 'In your spare time, would you enjoy...  keeping a diary of your personal experiences?'),
(11, 'In your spare time, would you enjoy...  playing a musical instrument, painting or drawing?'),
(12, 'In your spare time, would you enjoy...  doing charity work?'),
(13, 'In your spare time, would you enjoy...  collecting rocks, minerals, fossils, shells, etc?'),
(14, 'In your spare time, would you enjoy...  making jewelry, pottery, sculpting, or similar crafts for pleasure?'),
(15, 'In your spare time, would you enjoy...  outdoor activities such as camping, hiking, biking or fishing?'),
(16, 'In your spare time, would you enjoy...  singing, dancing or performing on stage?'),
(17, 'In your spare time, would you enjoy...  reading and analyzing financial or business magazines?'),
(18, 'In your spare time, would you enjoy...  improving your home PC with new hardware and software?'),
(19, 'In your spare time, would you enjoy...  volunteering your time to help the disabled, elderly or the needy?'),
(20, 'In your spare time, would you enjoy...  designing cards or brochures on your computer?'),
(21, 'In your spare time, would you enjoy...  organizing your finances and expense records to better manage your money?'),
(22, 'In your spare time, would you enjoy...  taking courses or studying subjects simply to learn about new things?'),
(23, 'In your spare time, would you enjoy...  building furniture, doing home repair and maintenance?'),
(24, 'In your spare time, would you enjoy…  reading about technology, science or health?'),
(25, 'In your spare time, would you enjoy...  writing poetry, stories, songs or plays?'),
(26, 'In your spare time, would you enjoy...  doing yard work, growing a garden or planting flowers?'),
(27, 'In your spare time, would you enjoy...  doing voluntary work with children or teenagers?'),
(28, 'In your spare time, would you enjoy...  campaigning or fund raising for a worthwhile cause?'),
(29, 'In your spare time, would you enjoy...  visiting art galleries, going to film festivals or music recitals?'),
(30, 'In your spare time, would you enjoy...  collecting stamps, coins, books, or organizing a photo album, etc?'),
(31, 'In your spare time, would you enjoy...  lending money as well as following and investing in the stock market?'),
(32, 'In your spare time, would you enjoy...  participating in community meetings, social events and activities?'),
(33, 'In your spare time, would you enjoy...  surfing the web to research things you are curious about?'),
(34, 'In your spare time, would you enjoy...  conducting yard sales, running a booth at a flea market, etc?'),
(35, 'In your spare time, would you enjoy...  going on nature or science field trips?'),
(36, 'In your spare time, would you enjoy...  doing voluntary work as a coach, advisor or referee for youth activities?');

-- --------------------------------------------------------

--
-- Table structure for table `leisure_score`
--

CREATE TABLE `leisure_score` (
  `id` int(11) NOT NULL,
  `uid` text NOT NULL,
  `a1` int(11) NOT NULL,
  `a2` int(11) NOT NULL,
  `a3` int(11) NOT NULL,
  `a4` int(11) NOT NULL,
  `a5` int(11) NOT NULL,
  `a6` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `leisure_score`
--

INSERT INTO `leisure_score` (`id`, `uid`, `a1`, `a2`, `a3`, `a4`, `a5`, `a6`) VALUES
(3, 'RA1611003010876', 23, 13, 20, 17, 13, 18);

-- --------------------------------------------------------

--
-- Table structure for table `mindset`
--

CREATE TABLE `mindset` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mindset`
--

INSERT INTO `mindset` (`id`, `question`, `type`) VALUES
(1, 'Our intelligence is something very basic about us that we can’t change very much. ', 0),
(2, 'No matter how much intelligence we have, we can always change it quite a bit.', 1),
(3, 'We can always substantially change how intelligent we are. 	', 1),
(4, 'We are a certain kind of person, and there is not much that can be done to really change that. ', 0),
(5, 'We can always change basic things about the kind of person we are. ', 1),
(6, 'Music talent can be learned by anyone', 1),
(7, 'Only a few people will be truly good at sports – we have to be “born with it.”', 0),
(8, 'Math is much easier to learn if we are male or maybe come from a culture who values math.', 0),
(9, 'The harder we work at something, the better we will be at it.', 1),
(10, 'No matter what kind of person we are, we can always change substantially. ', 1),
(11, 'Trying new things is stressful for me and I avoid it', 0),
(12, 'Some people are good and kind, and some are not – it’s not often that people change', 0),
(13, 'I appreciate when people, parents, teachers give me feedback about my performance', 1),
(14, 'I often get angry when I get feedback about my performance', 0),
(15, 'All human beings without a brain injury / birth defect are capable of the same amount of learning.', 1),
(16, 'We can learn new things, but we can’t really change how intelligent we are. ', 0),
(17, 'We can do things differently, but the important parts of who we are can’t really be changed. ', 0),
(18, 'Human beings are basically good, but sometimes make terrible decisions.', 1),
(19, 'An important reason why I do my work is that I like to learn new things.', 1),
(20, 'Truly smart people do not need to try hard.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `uid` text NOT NULL,
  `notif` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `paper`
--

CREATE TABLE `paper` (
  `id` int(11) NOT NULL,
  `topic` text NOT NULL,
  `filename` text NOT NULL,
  `link` text NOT NULL,
  `putdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `question` text NOT NULL,
  `inputs` text NOT NULL,
  `outputs` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `paper`
--

INSERT INTO `paper` (`id`, `topic`, `filename`, `link`, `putdate`, `question`, `inputs`, `outputs`) VALUES
(3, 'mladmin', 'nalu.txt', 'https://arxiv.org/pdf/1808.00508', '2018-12-11 18:30:00', '', '', ''),
(4, 'mladmin', 'narme.txt', 'www.google.com', '2019-01-19 09:14:47', 'Question number 1, implement a two layer nn using deep genetic network architecture', 'test case input 1; test case input 2', 'output 1; output 2'),
(5, 'iotadmin', 'test iot paper.txt', 'www.google.com', '2018-12-22 17:38:39', '', '', ''),
(12, 'bhadmin', 'blockchain.txt', 'www.google.com', '2018-12-23 15:43:42', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `reflection`
--

CREATE TABLE `reflection` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reflection`
--

INSERT INTO `reflection` (`id`, `question`) VALUES
(1, 'When I am working on some activities, I can do them without thinking about what I am doing'),
(2, 'This course requires us to understand concepts taught by the lecturer'),
(3, 'I sometimes question the way others do something and try to think of a better way'),
(4, 'As a result of this course I have changed the way I look at myself'),
(5, 'In this course we do things so many times that I started to do them without thinking about it'),
(6, 'To pass this course you need to understand the content'),
(7, 'I like to think over what I have been doing and consider alternative ways of doing it'),
(8, 'This course has challenged some of my firmly held ideas'),
(9, 'As long as I can remember handout material for examinations, I do not have to think too much'),
(10, 'I need to understand the material taught by the lecturer in order to perform practical tasks'),
(11, 'I often reflect on my actions to see whether I could have improved on what I did'),
(12, 'As a result of this course I have changed my normal way of doing things'),
(13, 'If I follow what the lecturer says, I do not have to think too much on this course'),
(14, 'In this course you have to continually think about the material you are being taught'),
(15, 'I often re-appraise my experience so I can learn from it and improve my next performance'),
(16, 'During this course I discovered faults in what I had previously believed to be right');

-- --------------------------------------------------------

--
-- Table structure for table `security_questions_table`
--

CREATE TABLE `security_questions_table` (
  `ID` int(11) NOT NULL,
  `QUESTION` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `security_questions_table`
--

INSERT INTO `security_questions_table` (`ID`, `QUESTION`) VALUES
(11, 'What is the first name of your childhood friend?'),
(12, 'Which phone number do you remember most from your childhood?\r\n'),
(13, 'What was your favorite place to visit as a child?'),
(14, 'Who is your favorite actor, musician, or artist?\r\n'),
(15, 'What is the name of your favorite pet?'),
(16, 'In what city were you born?\r\n'),
(17, 'What high school did you attend?'),
(18, 'What is the name of your first school?'),
(19, 'What is your favorite movie?'),
(20, 'What is your mother\'s maiden name?'),
(21, 'What street did you grow up on?'),
(22, 'What was the make of your first car?'),
(23, 'When is your anniversary?'),
(24, 'What is your favorite color?'),
(25, 'What is your father\'s middle name?'),
(26, 'What is the name of your first grade teacher?'),
(27, 'What was your high school mascot?'),
(28, 'Which is your favorite web browser?'),
(29, 'What is your favorite website?'),
(30, 'What is your favorite laptop?');

-- --------------------------------------------------------

--
-- Table structure for table `thinking`
--

CREATE TABLE `thinking` (
  `id` int(11) NOT NULL,
  `a` text NOT NULL,
  `b` text NOT NULL,
  `c` text NOT NULL,
  `d` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `thinking`
--

INSERT INTO `thinking` (`id`, `a`, `b`, `c`, `d`) VALUES
(1, 'Am I Imaginative ?AR', 'Am I Investigative ?CR', 'Am I Truthful ?CS', 'Am I Methodical ?AS'),
(2, 'Am I Organized ?CS', 'Am I Adaptable ?AR', 'Am I Critical ?AS', 'Am I Inquisitive ?CR'),
(3, 'Am I Debating ?AS', 'Am I Getting to the point ?CS', 'Am I Creative ?AR', 'Am I Relating ?CR'),
(4, 'Am I Personal ?AR', 'Am I Practical ?CS', 'Am I Speculative ?AS', 'Am I Adventurous ?CR'),
(5, 'Am I Precise ?CS', 'Am I Flexible ?AR', 'Am I Systematic ?AS', 'Am I Inventive ?CR'),
(6, 'Am I Sharing ?AR', 'Am I Orderly ?CS', 'Am I Sensible ?AS', 'Am I Independent ?CR'),
(7, 'Am I Competitive ?CR', 'Am I Perfectionist ?CS', 'Am I Cooperative ?AR', 'Am I Logical ?AS'),
(8, 'Am I Intellectual ?AS', 'Am I Sensitive ?AR', 'Am I Hardworking ?CS', 'Am I Risk-taking ?CR'),
(9, 'Am I a Reader ?AS', 'Am I a People’s Person ?CR', 'Am I a Problem Solver ?AR', 'Am I a Planner ?CS'),
(10, 'Am I Memorizing ?CS', 'Am I Associating ?AR', 'Am I Thinking-through ?AS', 'Am I Originating ?CR'),
(11, 'Am I a Changer ?CR', 'Am I a Judger ?AS', 'Am I Spontaneous ?AR', 'Am I a direction seeker ?CS'),
(12, 'Am I Communicating ?AR', 'Am I Discovering ?CR', 'Am I Cautious ?CS', 'Am I Reasoning ?AS'),
(13, 'Am I Challenging ?CR', 'Am I Practicing ?CS', 'Am I Caring ?AR', 'Am I Examining ?AS'),
(14, 'Am I Completing work ?CS', 'Am I Seeing possibilities ?CR', 'Am I Gaining Ideas ?AS', 'Am I Interpreting ?AR'),
(15, 'Am I Doing ?CS', 'Am I Feeling ?AR', 'Am I Thinking ?AS', 'Am I Experimenting ?CR');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `topic` text NOT NULL,
  `admin` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `topic`, `admin`) VALUES
(1, 'Machine Learning', 'mladmin'),
(2, 'IoT', 'iotadmin'),
(3, 'Blockchain', 'bhadmin');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `USER_ID` varchar(15) NOT NULL,
  `FIRST_NAME` text NOT NULL,
  `LAST_NAME` text NOT NULL,
  `EMAIL_ID` text NOT NULL,
  `MOBILE` text NOT NULL,
  `ROLE` varchar(1) NOT NULL,
  `PASSWORD` text NOT NULL,
  `DEPARTMENT` text NOT NULL,
  `FORGOT_Q_1` text NOT NULL,
  `FORGOT_A_1` text NOT NULL,
  `FORGOT_Q_2` text NOT NULL,
  `FORGOT_A_2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`USER_ID`, `FIRST_NAME`, `LAST_NAME`, `EMAIL_ID`, `MOBILE`, `ROLE`, `PASSWORD`, `DEPARTMENT`, `FORGOT_Q_1`, `FORGOT_A_1`, `FORGOT_Q_2`, `FORGOT_A_2`) VALUES
('bhadmin', 'Blockchain Admin', 'KAT', 'sample@mail.com', '1234567890', 'A', '5f4dcc3b5aa765d61d8327deb882cf99', 'KAT', 'a', 'a', 'a', 'a'),
('iotadmin', 'IoT Admin', 'KAT', 'sample@mail.com', '1234567890', 'A', '5f4dcc3b5aa765d61d8327deb882cf99', 'KAT', 'a', 'a', 'a', 'a'),
('mladmin', 'Machine Learning Admin', 'KAT', 'sample@mail.com', '1234567890', 'A', '5f4dcc3b5aa765d61d8327deb882cf99', 'KAT', 'a', 'a', 'a', 'a'),
('RA1611003010876', 'Siddhartha Dhar', 'Choudhury', 'siddharthadhar_soumen@srmuniv.edu.in', '1234567890', 'S', '5f4dcc3b5aa765d61d8327deb882cf99', 'COMPUTER SCIENCE AND ENGINEERING', 'What is your mother\'s maiden name?', 'abc', 'What is the name of your first school?', 'abcd'),
('ra1611003010984', 'Shashank', 'Pandey', 'pandeyji@gmail.com', '1234567890', 'S', '5f4dcc3b5aa765d61d8327deb882cf99', 'MECHANICAL ENGINEERING', 'What is your favorite website?', 'medium', 'What is the name of your first grade teacher?', 'chulbul');

-- --------------------------------------------------------

--
-- Table structure for table `user_write`
--

CREATE TABLE `user_write` (
  `id` int(11) NOT NULL,
  `uid` text NOT NULL,
  `topic` text NOT NULL,
  `status` int(11) NOT NULL,
  `text` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_write`
--

INSERT INTO `user_write` (`id`, `uid`, `topic`, `status`, `text`) VALUES
(55, 'RA1611003010876', '0', 2, 'Q3g1Y0w2QlZicnU1cjBiQjZwS2JZY1Y1dEVZMlp5azBrK2UwemtOSHJvQT0=~+~dnJzVlBDYmRYT3ZvcEdRUDE3OXBGZz09~+~dnJzVlBDYmRYT3ZvcEdRUDE3OXBGZz09~+~dnJzVlBDYmRYT3ZvcEdRUDE3OXBGZz09~+~dnJzVlBDYmRYT3ZvcEdRUDE3OXBGZz09~+~dnJzVlBDYmRYT3ZvcEdRUDE3OXBGZz09~+~dnJzVlBDYmRYT3ZvcEdRUDE3OXBGZz09~+~dnJzVlBDYmRYT3ZvcEdRUDE3OXBGZz09~+~dnJzVlBDYmRYT3ZvcEdRUDE3OXBGZz09~+~dnJzVlBDYmRYT3ZvcEdRUDE3OXBGZz09~+~dnJzVlBDYmRYT3ZvcEdRUDE3OXBGZz09~+~SjgySnJSbEVHZjZrMmxhamhQQ3huWkJiYWx4czVyWk1IeE1sVVJ5WWNnST0=~+~'),
(56, 'RA1611003010876', '2', 2, 'dnJzVlBDYmRYT3ZvcEdRUDE3OXBGZz09~+~dnJzVlBDYmRYT3ZvcEdRUDE3OXBGZz09~+~dnJzVlBDYmRYT3ZvcEdRUDE3OXBGZz09~+~TFpZSXAwUlAxTFBVMjVaNFhCVDBySVRoRytyd2thMkh5Z0JWVDJIN25oRT0=~+~dnJzVlBDYmRYT3ZvcEdRUDE3OXBGZz09~+~'),
(57, 'RA1611003010876', '7', 2, 'dnJzVlBDYmRYT3ZvcEdRUDE3OXBGZz09~+~dnJzVlBDYmRYT3ZvcEdRUDE3OXBGZz09~+~Yy9HU1pMc05kR3lKZ0Z6RTFsVjE5TUFLZVpHVVJhdzNlellXdDR0d0hZdz0=~+~'),
(58, 'RA1611003010876', '3', 2, 'dnJzVlBDYmRYT3ZvcEdRUDE3OXBGZz09~+~dnJzVlBDYmRYT3ZvcEdRUDE3OXBGZz09~+~akM2RE5PZVE0WjFzYlNWTFRNRDRRNzBLQnVldTdvTXpJbW1RaHNDOXM1ND0=~+~dnJzVlBDYmRYT3ZvcEdRUDE3OXBGZz09~+~dnJzVlBDYmRYT3ZvcEdRUDE3OXBGZz09~+~'),
(59, 'RA1611003010876', '4', 2, 'US9CSlNCOWNIdGhHZE10cmNvUnNqRHVqOVJZNEkwQlFEbTVMTTlEZnh2MjNuTTNhTzBCQUNWSGxsVWdpbkpFaA==~+~dnJzVlBDYmRYT3ZvcEdRUDE3OXBGZz09~+~dnJzVlBDYmRYT3ZvcEdRUDE3OXBGZz09~+~dnJzVlBDYmRYT3ZvcEdRUDE3OXBGZz09~+~'),
(60, 'RA1611003010876', '6', 2, 'dnJzVlBDYmRYT3ZvcEdRUDE3OXBGZz09~+~dnJzVlBDYmRYT3ZvcEdRUDE3OXBGZz09~+~dnJzVlBDYmRYT3ZvcEdRUDE3OXBGZz09~+~dnJzVlBDYmRYT3ZvcEdRUDE3OXBGZz09~+~MDJTTWhlZ2MwNFpmbjN6Y3pPMEZzaGxDaStRdzVWUXZ1K2VyK09DT2tPRT0=~+~'),
(61, 'RA1611003010876', '5', 2, 'dnJzVlBDYmRYT3ZvcEdRUDE3OXBGZz09~+~dnJzVlBDYmRYT3ZvcEdRUDE3OXBGZz09~+~N3FnanE4bzBNNzhmSkZqenpwaWpiZWVWNkoxZXR4elFvdVJJOW5vYnF4WT0=~+~'),
(62, 'RA1611003010876', '1', 2, 'Q29mYUdkdDZjeUJBNDJDNmw3NTZkbldWNXZaUkgzUnN5Qm1wMGtKTVd1YzNlWkJVclpFK085TWllaExJbHBUM3ErUW0vaEQzcHJlTVdoSkNzbFJmeDVER1liV08xTXpLMzNLYmVUSXB3aHZCU05mTHpLRHhid2VjYUc4RGlXYjFnc0plWXdMV3FvaWs1M1MrOXlCWm54YndaWWxna1ovdVZ2SVVMWlp0VUJvPQ==~+~dnJzVlBDYmRYT3ZvcEdRUDE3OXBGZz09~+~dnJzVlBDYmRYT3ZvcEdRUDE3OXBGZz09~+~dnJzVlBDYmRYT3ZvcEdRUDE3OXBGZz09~+~dnJzVlBDYmRYT3ZvcEdRUDE3OXBGZz09~+~dnJzVlBDYmRYT3ZvcEdRUDE3OXBGZz09~+~dnJzVlBDYmRYT3ZvcEdRUDE3OXBGZz09~+~dnJzVlBDYmRYT3ZvcEdRUDE3OXBGZz09~+~dnJzVlBDYmRYT3ZvcEdRUDE3OXBGZz09~+~dnJzVlBDYmRYT3ZvcEdRUDE3OXBGZz09~+~VzJjOC9PelNjdGNTai9VSWNEY1VrREVPMzBtbVN5aGpPVGlhbHRKd3Rmbz0=~+~NGpDVjVtdUIrOUgvK1pKa3VxUmJBOEhRd1IrSnNPYk5aeENHQmJsa3FCMD0=~+~'),
(63, 'ra1611003010984', '0', 2, 'VkpzV3ZIQnBhQW4veDNUZU1RODFQdz09~+~MkFvZWhJRFBpL3YyOTB2N3Rabjhadz09~+~blFBVG9TRW1FMXJpbkoyNUxNR3Z5QT09~+~blFBVG9TRW1FMXJpbkoyNUxNR3Z5QT09~+~blFBVG9TRW1FMXJpbkoyNUxNR3Z5QT09~+~blFBVG9TRW1FMXJpbkoyNUxNR3Z5QT09~+~blFBVG9TRW1FMXJpbkoyNUxNR3Z5QT09~+~blFBVG9TRW1FMXJpbkoyNUxNR3Z5QT09~+~blFBVG9TRW1FMXJpbkoyNUxNR3Z5QT09~+~blFBVG9TRW1FMXJpbkoyNUxNR3Z5QT09~+~blFBVG9TRW1FMXJpbkoyNUxNR3Z5QT09~+~UGNwVFM3V0hPWjFvTXZzY3VNdzF1aWtqRWY2NUNGRWZpZ01kc0p2SzlEbz0=~+~'),
(64, 'ra1611003010984', '1', 2, 'TUdmOU5rYi9PMWRrWnJST29NeDdBb2VzSzhKalVvSmVUUmNvb1Q4KzJoVT0=~+~VnM4OHFWNi8rMjIyVnBmdklBQ2lsZz09~+~blFBVG9TRW1FMXJpbkoyNUxNR3Z5QT09~+~blFBVG9TRW1FMXJpbkoyNUxNR3Z5QT09~+~blFBVG9TRW1FMXJpbkoyNUxNR3Z5QT09~+~blFBVG9TRW1FMXJpbkoyNUxNR3Z5QT09~+~blFBVG9TRW1FMXJpbkoyNUxNR3Z5QT09~+~blFBVG9TRW1FMXJpbkoyNUxNR3Z5QT09~+~blFBVG9TRW1FMXJpbkoyNUxNR3Z5QT09~+~blFBVG9TRW1FMXJpbkoyNUxNR3Z5QT09~+~blFBVG9TRW1FMXJpbkoyNUxNR3Z5QT09~+~V1FiM245YzJaV2k4UHd1Q2M1RE5Vdz09~+~'),
(65, 'ra1611003010984', '2', 2, 'QmpZZWJVZ1BjZ2NINlh1Q0syU2h2bnlZTEltK0J4MjQ0VUJodGtOVm9XND0=~+~VnM4OHFWNi8rMjIyVnBmdklBQ2lsZz09~+~blFBVG9TRW1FMXJpbkoyNUxNR3Z5QT09~+~blFBVG9TRW1FMXJpbkoyNUxNR3Z5QT09~+~V1FiM245YzJaV2k4UHd1Q2M1RE5Vdz09~+~'),
(66, 'ra1611003010984', '3', 2, 'UGtVQ05WcWowYmJ0MUd2Uy9xSE1mZz09~+~ZHI2RHpaNXdKM3JxdkY4QytRcTdwUT09~+~blFBVG9TRW1FMXJpbkoyNUxNR3Z5QT09~+~blFBVG9TRW1FMXJpbkoyNUxNR3Z5QT09~+~V1FiM245YzJaV2k4UHd1Q2M1RE5Vdz09~+~'),
(67, 'ra1611003010984', '4', 2, 'dnJrUmIvVkFVU0JaRi9acktIWktaN3FOQlFQdFh0TDJEWnRiYUE0YUR4TT0=~+~clZHaDJkaEVvV3R4Wm9odWJXdVk2QT09~+~clZHaDJkaEVvV3R4Wm9odWJXdVk2QT09~+~clZHaDJkaEVvV3R4Wm9odWJXdVk2QT09~+~');

-- --------------------------------------------------------

--
-- Table structure for table `work`
--

CREATE TABLE `work` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `work`
--

INSERT INTO `work` (`id`, `question`) VALUES
(1, 'To what degree, would you enjoy... designing graphic art images and illustrations for advertising media?'),
(2, 'To what degree, would you enjoy... researching how fatigue affects airplane pilots\' reaction time and judgment?'),
(3, 'To what degree, would you enjoy... leading and motivating a sales team\'s marketing activities?'),
(4, 'To what degree, would you enjoy... working in a national park to preserve its forests, wildlife and natural features?'),
(5, 'To what degree, would you enjoy... analyzing and evaluating a company\'s financial statements?'),
(6, 'To what degree, would you enjoy... designing drama/theatre stage sets, lighting and special effects for plays or TV shows?'),
(7, 'To what degree, would you enjoy... classifying and analyzing data contained in hospital records?'),
(8, 'To what degree, would you enjoy... writing a review about a theatrical performance for a newspaper?'),
(9, 'To what degree, would you enjoy... teaching courses to students in an academic setting?'),
(10, 'To what degree, would you enjoy... working with equipment designed to reduce air pollution?'),
(11, 'To what degree, would you enjoy... counseling students about their career and educational plans?'),
(12, 'To what degree, would you enjoy... designing or working with technical instruments and machines?'),
(13, 'To what degree, would you enjoy... analyzing insurance policy data to determine the prices for new policies?'),
(14, 'To what degree, would you enjoy... administering treatment and therapy to people with health problems?'),
(15, 'To what degree, would you enjoy...  creating an artistic video with narration and music for a show?'),
(16, 'To what degree, would you enjoy...  leading, persuading and motivating employees to achieve a business goal?'),
(17, 'To what degree, would you enjoy...  studying earthquakes to predict when and where they will most likely occur?'),
(18, 'To what degree, would you enjoy...  doing research with humans and animals to test the effects of new drugs?'),
(19, 'To what degree, would you enjoy...  counseling and advising troubled teenagers in a community social services center?'),
(20, 'To what degree, would you enjoy...  selling office products and services to commercial firms and agencies?'),
(21, 'To what degree, would you enjoy...  using mathematics or statistical methods to solve technical or scientific problems?'),
(22, 'To what degree, would you enjoy...  evaluating the efficiency and reliability of a new vehicle?'),
(23, 'To what degree, would you enjoy...  specifying the construction materials for a new house?'),
(24, 'To what degree, would you enjoy...  selecting art objects, paintings to be shown in a public art exhibition?'),
(25, 'To what degree, would you enjoy...  giving sales speeches and presentations to customers at business meetings?'),
(26, 'To what degree, would you enjoy...  doing psychological research to evaluate teaching methods?'),
(27, 'To what degree, would you enjoy...  managing employees, assigning their tasks and measuring their progress?'),
(28, 'To what degree, would you enjoy...  analyzing a bank\'s records to keep track of customer accounts, mortgages, interest rates, etc?'),
(29, 'To what degree, would you enjoy...  doing creative work in music, writing, performing, painting or other forms of art?'),
(30, 'To what degree, would you enjoy...  acting as a business and legal advisor for professionals?'),
(31, 'To what degree, would you enjoy...  working with numeric data and information systems requiring precise standards?'),
(32, 'To what degree, would you enjoy...  helping people to recover from illness, injuries or disabilities?'),
(33, 'To what degree, would you enjoy...  doing analytical research and investigation to solve scientific, business or social problems?'),
(34, 'To what degree, would you enjoy...  designing new machine parts and equipment to improve machine performance?'),
(35, 'To what degree, would you enjoy...  calculating a business firm\'s earnings, expenses and taxes owed?'),
(36, 'To what degree, would you enjoy...  working on a team to counsel and help families cope with health or financial problems?');

-- --------------------------------------------------------

--
-- Table structure for table `write`
--

CREATE TABLE `write` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `topic` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `write`
--

INSERT INTO `write` (`id`, `question`, `topic`) VALUES
(1, 'What was done ? What was found ?', 'abstract'),
(2, 'What is the problem this paper addresses ? ', 'abstract'),
(3, 'What other approaches exist ? ', 'abstract'),
(4, 'What can we do now that we couldn’t do before? Quantify if possible.', 'abstract'),
(5, 'What was the significance of this work and what problem can change the world ?', 'abstract'),
(6, 'Why was it done ?', 'abstract'),
(7, 'Why is this problem hard ? and /or the difficulty other solutions face ? ', 'abstract'),
(8, 'What did you discover? or How did you approach the problem differently? ', 'abstract'),
(9, 'When and where was it done ? ', 'abstract'),
(10, 'Who/Whom got benefitted ? ', 'abstract'),
(11, 'What is the specific detail about the solution.', 'abstract'),
(12, 'What is a quick gist of the evidence (say a proof, an implementation or quantitative result) we have for our approach.', 'abstract'),
(13, 'What is the rationale for this study ? ', 'introduction'),
(14, 'What is still unknown or still needs a solution', 'introduction'),
(15, 'What is the importance of the study? or Why was this worth doing in the first place? (', 'introduction'),
(16, 'What is already available?', 'introduction'),
(17, 'What problem is identified? and the main outcomes of this research and why is it unique? ', 'introduction'),
(18, 'What is the Basic Concept?', 'introduction'),
(19, 'What solution we propose? or What exactly is the predicted result of the entire project ? ', 'introduction'),
(20, 'What was the reasons that led us to select this hypothesis?', 'introduction'),
(21, 'Why did we use this particular organism or system? ', 'introduction'),
(22, 'What are its advantages? (suitability from a theoretical point of view as well as indicate practical reasons for using it) ', 'introduction'),
(23, 'What is the brief description of the experimental design? and how it accomplished the stated objectives?', 'introduction'),
(24, 'How is the rest of the research paper organized?', 'introduction'),
(29, 'What are the existing works in this field and why isn’t it already solved? ', 'analysis'),
(30, 'What did we understand from the existing work? ', 'analysis'),
(31, 'What is our analysis of the existing work?', 'analysis'),
(32, 'What is our Identified research work, its depth and why we have chosen this apporach? ', 'analysis'),
(33, 'What are all the Tools / Technologies / Equipment’s / Models / Dataset / Tasks / knowledge / Skills / Abilities / Attitude / Values required for our research? and why did we select them ?', 'analysis'),
(34, 'What is the overall layout / outline and Plan of our study?', 'design'),
(35, 'What is our Step-by-step study conduction procedure?', 'design'),
(36, 'What were our sample / Initial Prototype tests? ', 'design'),
(37, 'What were our opening points and closing points of our research study?', 'design'),
(38, 'What is the created evaluation strategy for our study? \r\n', 'design'),
(39, 'What is that we created as a new research content? ', 'development'),
(40, 'What new demonstrations or actual experimentation did we create?', 'development'),
(41, 'What methods are used to gather all data, analysis, plots and tables?', 'development'),
(42, 'What are the test strategy adopted and how did we plan to demonstrate the same?', 'development'),
(43, 'What is the procedure we followed for the development / delivery / data collection etc ?', 'implementation'),
(44, 'How did we create the research sequence?', 'implementation'),
(45, 'How did we measure reactions, collect data, check accuracy and test?', 'implementation'),
(46, 'What did we evaluate in this study ? ', 'evaluation'),
(47, 'How does our finding compare / contrast / improve itself with those of others?', 'evaluation'),
(48, 'Are there any unexpected findings / innovations?', 'evaluation'),
(49, 'What did we learn from the results and what can we interpret as findings, what is its significance? ', 'evaluation'),
(50, 'Are there any limitations / discrepancies / generalizability / interpretations etc ?', 'evaluation'),
(51, 'What did we expect and what did we find? ', 'conclusion'),
(52, 'What is the significance that we could derive from this study and why did it occur?', 'conclusion'),
(53, 'Who all could benefit and what else could be improved for further study?', 'conclusion');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dept_table`
--
ALTER TABLE `dept_table`
  ADD PRIMARY KEY (`DEPT_ID`);

--
-- Indexes for table `learning`
--
ALTER TABLE `learning`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leisure`
--
ALTER TABLE `leisure`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leisure_score`
--
ALTER TABLE `leisure_score`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mindset`
--
ALTER TABLE `mindset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paper`
--
ALTER TABLE `paper`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reflection`
--
ALTER TABLE `reflection`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `security_questions_table`
--
ALTER TABLE `security_questions_table`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `thinking`
--
ALTER TABLE `thinking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`USER_ID`);

--
-- Indexes for table `user_write`
--
ALTER TABLE `user_write`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work`
--
ALTER TABLE `work`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `write`
--
ALTER TABLE `write`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `dept_table`
--
ALTER TABLE `dept_table`
  MODIFY `DEPT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `learning`
--
ALTER TABLE `learning`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `leisure`
--
ALTER TABLE `leisure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `leisure_score`
--
ALTER TABLE `leisure_score`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mindset`
--
ALTER TABLE `mindset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paper`
--
ALTER TABLE `paper`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `reflection`
--
ALTER TABLE `reflection`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `security_questions_table`
--
ALTER TABLE `security_questions_table`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `thinking`
--
ALTER TABLE `thinking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_write`
--
ALTER TABLE `user_write`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `work`
--
ALTER TABLE `work`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `write`
--
ALTER TABLE `write`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
