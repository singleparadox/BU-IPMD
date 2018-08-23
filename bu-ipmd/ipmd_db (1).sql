-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2018 at 02:31 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ipmd_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_type`
--

CREATE TABLE `account_type` (
  `account_type_id` int(1) NOT NULL,
  `account_type_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_type`
--

INSERT INTO `account_type` (`account_type_id`, `account_type_name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `account_type_id` int(11) DEFAULT NULL,
  `admin_username` varchar(255) DEFAULT NULL,
  `admin_password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `account_type_id`, `admin_username`, `admin_password`) VALUES
(1, 1, 'admin', '');

-- --------------------------------------------------------

--
-- Table structure for table `agencies`
--

CREATE TABLE `agencies` (
  `agency_id` int(11) NOT NULL,
  `agency_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agencies`
--

INSERT INTO `agencies` (`agency_id`, `agency_name`) VALUES
(1, 'BUCE'),
(2, 'BUCS'),
(3, 'BUPC'),
(4, 'BUCAF'),
(5, 'BUCBEM'),
(6, 'BUCSSP'),
(7, 'BUCAL'),
(8, 'BUIPESR'),
(9, 'BUCN'),
(10, 'BUCIT'),
(11, 'BUCENG'),
(12, 'BUGC'),
(13, 'BUTC'),
(14, 'BUGS'),
(15, 'BU-Arki'),
(16, 'BUCM');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'Student Research'),
(2, 'Faculty Research'),
(3, 'Student & Faculty Research'),
(4, 'Invention'),
(6, 'Non research'),
(7, 'Undergrad Thesis'),
(8, 'For verification'),
(9, 'Utility Model'),
(10, 'Design'),
(11, 'Industrial Design'),
(20, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `class_id` int(11) NOT NULL,
  `class_name` varchar(2) DEFAULT NULL,
  `class_desc` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`class_id`, `class_name`, `class_desc`) VALUES
(2, 'A', 'Books, Phamplet'),
(3, 'B', 'Periodicals and newspaper'),
(4, 'C', 'Lectures,sermons,addresses,dissertations for oral delivery,whether or not reduced in writing or other material form'),
(5, 'D', 'Letters'),
(6, 'E', 'Dramatic or dramatico-musical compositions;choreographic works or entertainment in dumb shows'),
(7, 'F', 'Musical compositions with or without words'),
(8, 'G', 'Works of drawing,painting,architecture,sculpture,engraving lithography or other works of arts,model or design for works of arts'),
(9, 'H', 'original ornamental designs,or models for articles of manufacture, whether or not registrable as an industrial designs and other works of applied art'),
(10, 'I', 'Illustration maps,plans,sketches,charts and three-dimensional works relative to geography,topography,architecture or science'),
(11, 'J', 'Drawings or plastic works of a scientific or technical character'),
(12, 'K', 'Photographic works including works produced by a process analogous to photography,lantern slide'),
(13, 'L', 'Audiovisual works and cinematographic works produced by a process analogous to cinematography or any process for making audio-visual recordings'),
(14, 'M', 'Pictorial illustrations and advertisements'),
(15, 'N', 'Computer Programs'),
(16, 'O', 'Other literary;scholarly,scientific and artistic works'),
(17, 'P', 'Sound recordings'),
(18, 'Q', 'Broadcast recordings');

-- --------------------------------------------------------

--
-- Table structure for table `copyrights`
--

CREATE TABLE `copyrights` (
  `copyrights_id` int(10) NOT NULL,
  `copyrights_received_date` date DEFAULT NULL,
  `agency_id` int(3) DEFAULT NULL,
  `copyrights_title` longtext,
  `copyrights_authors` longtext,
  `class_id` int(2) DEFAULT NULL,
  `copyrights_reg_date` date DEFAULT NULL,
  `copyrights_reg_no` varchar(255) DEFAULT NULL,
  `copyrights_issue_date` date DEFAULT NULL,
  `copyrights_submitted_date` date DEFAULT NULL,
  `copyrights_created_date` date DEFAULT NULL,
  `category_id` int(2) DEFAULT NULL,
  `filestatus_id` int(2) DEFAULT NULL,
  `copyrights_year` year(4) DEFAULT NULL,
  `copyrights_owner` varchar(255) DEFAULT NULL,
  `copyrights_fee` int(255) DEFAULT NULL,
  `copyrights_address` varchar(255) DEFAULT NULL,
  `copyrights_project_duration` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `copyrights`
--

INSERT INTO `copyrights` (`copyrights_id`, `copyrights_received_date`, `agency_id`, `copyrights_title`, `copyrights_authors`, `class_id`, `copyrights_reg_date`, `copyrights_reg_no`, `copyrights_issue_date`, `copyrights_submitted_date`, `copyrights_created_date`, `category_id`, `filestatus_id`, `copyrights_year`, `copyrights_owner`, `copyrights_fee`, `copyrights_address`, `copyrights_project_duration`) VALUES
(1, NULL, 1, 'FS4 Exploring the Curriculum Guidebook (Teacher’s Edition)\r\n', 'Rebecca Rosario O. Bercasio\r\n', 2, '2011-10-26', ' A2011-2653\r\n', '2011-11-03', '2011-09-26', '2011-06-30', 6, 2, 2011, 'Rebecca Rosario O. Bercasio\r\n', NULL, NULL, NULL),
(2, NULL, 1, 'FS3 Technology in the Learning Environment Guidebook (Teacher’s Edition)\r\n', 'Rebecca Rosario O. Bercasio\r\n', 2, '2011-10-26', 'A2011-2651\r\n', '2011-11-03', '2011-09-26', '2011-06-30', 6, 2, 2011, 'Rebecca Rosario O. Bercasio\r\n', NULL, NULL, NULL),
(3, NULL, 1, 'FS4 Exploring the Curriculum Guidebook (Student’s Edition)\r\n', 'Rebecca Rosario O. Bercasio\r\n', 2, '2011-10-26', 'A2011-2652\r\n', '2011-11-03', '2011-09-26', '2011-06-30', 6, 2, 2011, 'Rebecca Rosario O. Bercasio\r\n', NULL, NULL, NULL),
(4, NULL, 1, 'FS4 Exploring the Curriculum Guidebook (Teacher’s Edition)\r\n', 'Rebecca Rosario O. Bercasio\r\n', 2, '2011-10-26', ' A2011-2653\r\n', '2011-11-03', '2011-09-26', '2011-06-30', 6, 2, 2011, 'Rebecca Rosario O. Bercasio\r\n', NULL, NULL, NULL),
(5, '2011-12-19', 9, 'Role Strain Among Male Professional Nurses and Male Student Nurses\r\n', 'Maria janet O. Receirdo, Elena A. Barela, Emerlinda E. Alcala, and Artemio Buitre, Jr.\r\n', 16, '2012-02-21', 'O2012-50\r\n', '2012-03-06', '2012-01-21', '2011-12-03', 6, 2, 2011, 'Maria janet O. Receirdo, Elena A. Barela, Emerlinda E. Alcala, and Artemio Buitre, Jr.\r\n', NULL, NULL, NULL),
(6, NULL, 11, 'Decolorization of Reactive Blue-19 Dye by Photo-Fenton Process: Optimization by Response Surface Methodology.\r\n', 'Junel Bon Borbo, Jenelyn Z. Balmes, Krizzel Jane R. Bigol, Joan C. Lita, Jane M. Montas, Claribelle L. Pempeña & Michelle Kay B. Villanueva\r\n', 16, '2012-06-27', 'O2012-330\r\n', '2012-07-04', '2012-05-27', '2012-03-19', 7, 2, 2012, 'Junel Bon Borbo, Jenelyn Z. Balmes, Krizzel Jane R. Bigol, Joan C. Lita, Jane M. Montas, Claribelle L. Pempeña & Michelle Kay B. Villanueva\r\n', NULL, NULL, NULL),
(7, '0000-00-00', 2, 'Field Guide for Red Tide Monitoring of Sorsogon Bay\r\n', 'Ida Francia H. Revale, Michael Montealegre and Ma. Crispina Baltazar\r\n', 16, '2012-06-27', 'O2012-331\r\n', '2012-07-04', '2012-05-27', '2011-01-16', 20, 2, 2012, 'Ida Francia H. Revale, Michael Montealegre and Ma. Crispina Baltazar\r\n', 0, '', 'August 1, 2008 to June 30, 2010'),
(8, '0000-00-00', 3, 'Shelf-Life Study of Arrowroot  Starch and Commercialization of Baked Products\r\n', 'Eden M. Llamera, Violeta S. Ronda and Ruby L. Rosasenia\r\n', 16, '2012-06-27', 'O2012-332\r\n', '2012-07-04', '2012-05-27', '2011-10-30', 20, 2, 2012, 'Eden M. Llamera, Violeta S. Ronda and Ruby L. Rosasenia\r\n', 0, '', 'January 2, 2009 to December 31, 2009'),
(9, NULL, NULL, 'An Analysis of Social Networking Sites Based on Jean Baudrillard''s Simulacra and Hyperreality\r\n', 'Marck Zaldy O. Camba and Ruben C Cardiño\r\n', 16, '2012-06-27', 'O2012-333\r\n', '2012-07-04', '2012-05-27', '2011-04-26', 7, 2, 2012, 'Marck Zaldy O. Camba and Ruben C. Cardiño\r\n', NULL, NULL, NULL),
(10, NULL, 3, 'E-Teaching Guide on Financial Literacy: Sibika at Kultura/HEKASI\r\n', 'Anthony C. Cabrillas, Jennifer C. Brondial, Ma. Cherissa B. Nueva and Catherine M. Sales\r\n', 16, '2012-06-27', 'O2012-334\r\n', '2012-07-04', '2012-05-27', '2012-05-19', 7, 2, 2012, 'Anthony C. Cabrillas, Jennifer C. Brondial, Ma. Cherissa B. Nueva and Catherine M. Sales\r\n', NULL, NULL, NULL),
(11, NULL, 3, 'Healing Effect of Artemisia Vulgaris Leaf Extract on Experimental Incised Wound on Female Albino Mice\r\n', 'Jennifer R. Arbo, Antonio Jose D. Cañaveral, Christine Jane O. Cayago, Diana Jane R. Gonzaga, Celso V. Oñate, Jr. and Deo M. Siares\r\n', 16, '2012-06-27', 'O2012-335\r\n', '2012-07-04', '2012-05-27', '2012-02-29', 7, 2, 2012, 'Jennifer R. Arbo, Antonio Jose D. Cañaveral, Christine Jane O. Cayago, Diana Jane R. Gonzaga, Celso V. Oñate, Jr. and Deo M. Siares\r\n', NULL, NULL, NULL),
(12, NULL, 11, 'Design and Fabrication of Essential Oil Distiller for Pili\r\n', 'Jocelyn R. Balisnomo, Raymund V. Albuero, Jan Carlo P. Baltazar, Mary Rose N. De Lima, Genesis L. Fabia, Ela Marie D. Locsin, Jam Krista L. Madrona, & Mark Frances R. Naag\r\n', 16, '2012-06-27', 'O2012-336\r\n', '2012-07-04', '2012-05-27', '2012-05-19', 7, 2, 2012, 'Jocelyn R. Balisnomo, Raymund V. Albuero, Jan Carlo P. Baltazar, Mary Rose N. De Lima, Genesis L. Fabia, Ela Marie D. Locsin, Jam Krista L. Madrona, & Mark Frances R. Naag\r\n', NULL, NULL, NULL),
(13, NULL, 2, 'Formulation of Abaca Sap Hydroponic Solution for Lettuce ( Lactiva Saliva)\r\n', 'Ida Francia H. Revale, Allan A. Bitancur, Erwin B. Espartinez and John Neil F. Galias\r\n', 16, '2012-06-27', 'O2012-337\r\n', '2012-07-04', '2012-05-27', '2012-03-16', 7, 2, 2012, 'Ida Francia H. Revale, Allan A. Bitancur, Erwin B. Espartinez and John Neil F. Galias\r\n', NULL, NULL, NULL),
(14, NULL, 9, 'The Performance of Graduates in the Nurses'' Licensure Examination: An Assessment\r\n', 'Alma S. Banua, Jean Annette S. Ibo and Conchita A. Palencia\r\n', 16, '2012-06-27', 'O2012-338\r\n', '2012-07-04', '2012-05-27', '2009-11-30', NULL, 2, 2012, 'Alma S. Banua, Jean Annette S. Ibo and Conchita A. Palencia\r\n', NULL, NULL, 'June 1, 2009 to October 31, 2009\r\n'),
(15, NULL, NULL, 'Mga Stratehiya Sa Pangangalaga sa Matatanda\r\n', 'Maria janet O. Receirdo, Elena A. Barela, Emerlinda E. Alcala, and Rosario M. Ludovice\r\n', 16, NULL, 'O2012-339\r\n', '2012-07-04', '2012-05-27', '2012-06-01', NULL, 2, 2012, 'Maria Janet O. Receirdo, Elena A. Barela, Emerlinda E. Alcala, and Rosario M. Ludovice\r\n', NULL, NULL, '(No Details)\r\n'),
(21, '0000-00-00', 4, '', '', 6, '0000-00-00', '', '0000-00-00', '0000-00-00', '0000-00-00', 4, 3, 2018, '', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `copyrights_remarks`
--

CREATE TABLE `copyrights_remarks` (
  `copyrights_remarks_id` int(11) NOT NULL,
  `copyrights_id` int(10) DEFAULT NULL,
  `copy_remarks_time` datetime DEFAULT NULL,
  `copy_remarks_desc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `copyrights_remarks`
--

INSERT INTO `copyrights_remarks` (`copyrights_remarks_id`, `copyrights_id`, `copy_remarks_time`, `copy_remarks_desc`) VALUES
(6, 21, '0000-00-00 00:00:00', 'a'),
(7, 21, '0000-00-00 00:00:00', 'wew');

-- --------------------------------------------------------

--
-- Table structure for table `filestatus`
--

CREATE TABLE `filestatus` (
  `filestatus_id` int(11) NOT NULL,
  `filestatus_name` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `filestatus`
--

INSERT INTO `filestatus` (`filestatus_id`, `filestatus_name`) VALUES
(1, 'Applied'),
(2, 'Granted'),
(3, 'Registered'),
(4, 'NO STATUS YET');

-- --------------------------------------------------------

--
-- Table structure for table `industrial_design`
--

CREATE TABLE `industrial_design` (
  `industrial_id` int(11) NOT NULL,
  `industrial_reg_no` varchar(255) DEFAULT NULL,
  `industrial_title` longtext,
  `industrial_sketch` varchar(255) DEFAULT NULL,
  `agency_id` int(3) DEFAULT NULL,
  `category_id` int(1) DEFAULT NULL,
  `inventor` varchar(255) DEFAULT NULL,
  `industrial_issue_date` date DEFAULT NULL,
  `industrial_filing_date` date DEFAULT NULL,
  `industrial_publication_date` date DEFAULT NULL,
  `industrial_design_year` year(4) DEFAULT NULL,
  `filestatus_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `industrial_design`
--

INSERT INTO `industrial_design` (`industrial_id`, `industrial_reg_no`, `industrial_title`, `industrial_sketch`, `agency_id`, `category_id`, `inventor`, `industrial_issue_date`, `industrial_filing_date`, `industrial_publication_date`, `industrial_design_year`, `filestatus_id`) VALUES
(1, '900', 'Hocus Pocus', 'sample image here', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, '32010000370\r\n', 'CHARCOAL STOVE ORGANIZER \r\n', NULL, NULL, 10, 'ERLINDA C . RELUCIO\r\n', '2011-03-28', '2011-05-19', '2011-03-28', 2010, NULL),
(3, '3-2017-000706\r\n', 'Teaching Kit Bag\r\n', NULL, 3, 11, 'Arthur Olila / Baby Boy D. Nebres III\r\n', NULL, '2017-08-18', NULL, 2017, 1),
(4, '3-2017-050184\r\n', 'Multi-Visual Learning  Board for Grade School\r\n', NULL, 3, 11, 'Josephine E. Caceres / Baby Boy D. Nebres III\r\n', NULL, '2017-10-20', NULL, 2017, 1),
(5, '3 - 2018 - 050040\r\n', 'All - in - one Mobile Library Cabinet for Grade School\r\n', NULL, 1, 2, 'Baby Boy Benjamin D. Nebres, Racquel S. Brides\r\n', '0000-00-00', '2018-02-28', '0000-00-00', 2018, 2),
(6, '3 - 2018 - 050041\r\n', 'Bicol University : Official University Academic Garb\r\n', NULL, NULL, 2, 'Baby Boy Benjamin D. Nebres\r\n', NULL, '2018-02-28', NULL, 2018, NULL),
(7, '3 - 2018 - 050041\r\n', '11111111111111111111', NULL, 2, 2, 'Baby Boy Benjamin D. Nebres\r\n', '0000-00-00', '2018-02-28', '0000-00-00', 2018, 1);

-- --------------------------------------------------------

--
-- Table structure for table `industrial_remarks`
--

CREATE TABLE `industrial_remarks` (
  `industrial_remarks_id` int(100) NOT NULL,
  `industrial_remarks_time` datetime DEFAULT NULL,
  `industrial_remarks_desc` varchar(255) DEFAULT NULL,
  `industrial_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `industrial_remarks`
--

INSERT INTO `industrial_remarks` (`industrial_remarks_id`, `industrial_remarks_time`, `industrial_remarks_desc`, `industrial_id`) VALUES
(0, NULL, '1111111', 7);

-- --------------------------------------------------------

--
-- Table structure for table `invention`
--

CREATE TABLE `invention` (
  `invention_id` int(10) NOT NULL,
  `invention_title` longtext,
  `invention_inventors` longtext,
  `invention_application_no` varchar(255) DEFAULT NULL,
  `invention_filing_date` varchar(255) DEFAULT NULL,
  `invention_issue_date` varchar(255) DEFAULT NULL,
  `invention_received_date` varchar(255) DEFAULT NULL,
  `agency_id` int(11) DEFAULT NULL,
  `invention_year` varchar(255) DEFAULT NULL,
  `filestatus_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invention`
--

INSERT INTO `invention` (`invention_id`, `invention_title`, `invention_inventors`, `invention_application_no`, `invention_filing_date`, `invention_issue_date`, `invention_received_date`, `agency_id`, `invention_year`, `filestatus_id`, `category_id`) VALUES
(1, 'CROP PROCESSING MACHINE \r\n', 'LIZANO HERMINIGILDO CALPE ESTRELLA BALUTE ELEANOR MALINIS ARNULFO\r\n', '12002000530\r\n', '7/23/2002\r\n', NULL, '3/16/2004\r\n', 4, '2002\r\n', 2, 4),
(2, 'MULTIPURPOSE OVERHEAD FARM DEVICE \r\n', 'MALINIS, ARNULFO CALPE, ESTRLLA A. CERDENA SAJID O.\r\n', '12002000531\r\n', '7/23/2002\r\n', NULL, '9/29/2004\r\n', 4, '2002\r\n', 2, 4),
(3, 'MULTI-BRAKE BONDING APPARATUS\r\n', 'MARIO J. AYCARDO, JOHN REY B. ROTUGAL, JOHN ERWIN S. CASTRO, JOEL N. SABIO, DOMINGO A. SAPO\r\n', '12012000289\r\n', '9/28/2012\r\n', NULL, NULL, 3, '2012', 1, 4),
(4, 'HYDROPONICS SOLUTION USING ABACA SAP AND THE PROCESS THEREOF\r\n', 'IDA FRANCIA H. REVALE, ALLAN A. BITANCUR, ERWIN B. ESPARTINEZ, JOHN NIEL F. GALIAS\r\n', '12012000290\r\n', '9/28/2012\r\n', NULL, NULL, 2, '2012', 1, 4),
(5, 'PILI NUT DEPULPING MACHINE \r\n', 'ARNULFO P. MALINIS ELEANOR L. BALUTE FLORA TAGARINO HERMINIGILDO N. LIZANO-MINTO\r\n', '12002000528\r\n', '7/23/2002\r\n', '6/2/2008\r\n', '3/16/2004\r\n', 4, '2002\r\n', 2, 4),
(6, 'PILI NUT CRACKING MACHINE \r\n', 'MALINIS ARNULFO RABE ALAN CALPE ESTRELLA\r\n', '12002000529\r\n', '9/28/2012\r\n7/23/2002\r\n', NULL, '3/16/2004\r\n', 4, '2002\r\n', 2, 4),
(7, 'CASTRATING APPARATUS\r\n', 'ALDEN R. DE VERA, ALAN P. RABE, ERILO B. CARILO, EFREN N. GONZALES\r\n', '12012000371\r\n', '11/23/2012\r\n', NULL, NULL, 4, '2012', 1, 4),
(8, 'THE FORMULATION OF BIOPLASTIC AND THE PROCESS THEREOF\r\n', 'CHRISTOPHER O. PACARDO, ARNULFO P. MALINIS\r\n', '12012000372\r\n', '11/23/2012\r\n', NULL, NULL, 2, '2012', 1, 4),
(9, 'METHOD OF CULTURING PEARL\r\n', '"Ronnel R. Dioneda Sr.\r\nMa. Ilna Tabinas\r\nEileen Pena"\r\n', '12014000295\r\n', '10/23/14\r\n', NULL, NULL, 2, '2014\r\n', 1, 4),
(10, 'MULTI PURPOSE DUAL HEAT SOURCE FOOD DRYER\r\n', 'JOEL B. HABALO, MAURINA BANTOG\r\n', '12014000296\r\n', '10/23/2014\r\n', NULL, NULL, 10, '2014', 1, 4),
(11, '4-in-1 Refrigeration and Aircon Service Equipment with Cooling System\r\n', 'Nicanor Balbin, et al\r\n', '1-2015000431\r\n', '12/11/2015\r\n', NULL, NULL, 10, '2015\r\n', 1, 4),
(12, 'Multi Functional Stethoscope\r\n', 'Michael M. Navera\r\n', '1 - 2017 - 050083\r\n', '17-Nov-17\r\n', NULL, NULL, 16, '2017', NULL, 2),
(13, 'Coconut Grater\r\n', 'Richard B. Colasito\r\n', '1 -2018 - 050141\r\n', '23-Mar-18\r\n', NULL, NULL, 3, '2018', NULL, 2),
(14, 'Multi - port Wireless Storage Device Reader\r\n', 'Bryan D. Buen,                Christian E. Noga, John Laurenze R. Benisano,  Herminio lii M. Folloso\r\n', '1 - 2018 - 050150\r\n', '27-Mar-18\r\n', NULL, NULL, 3, '2018', NULL, 1),
(21, '1111111111111111111', '', '1111111', '', '', '', 4, '2018', 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `invention_remarks`
--

CREATE TABLE `invention_remarks` (
  `in_remarks_id` int(100) NOT NULL,
  `invention_id` int(10) DEFAULT NULL,
  `in_remarks_time` datetime DEFAULT NULL,
  `in_remarks_desc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invention_remarks`
--

INSERT INTO `invention_remarks` (`in_remarks_id`, `invention_id`, `in_remarks_time`, `in_remarks_desc`) VALUES
(0, 21, '0000-00-00 00:00:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `task_id` int(11) NOT NULL,
  `task_name` varchar(250) NOT NULL,
  `task_file` varchar(200) NOT NULL,
  `task_remarks` text NOT NULL,
  `task_progress_id` int(1) NOT NULL,
  `task_taggedto` int(11) NOT NULL,
  `task_tagby` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `task_progress`
--

CREATE TABLE `task_progress` (
  `task_progress_id` int(1) NOT NULL,
  `task_progress_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trademarks`
--

CREATE TABLE `trademarks` (
  `trademark_id` int(255) NOT NULL,
  `Calendar_Year` year(4) DEFAULT NULL,
  `Mark` varchar(255) DEFAULT NULL,
  `Applicant` varchar(255) DEFAULT NULL,
  `trademark_reg_no` varchar(255) DEFAULT NULL,
  `Class_es` varchar(255) DEFAULT NULL,
  `File_no` varchar(255) DEFAULT NULL,
  `filing_date` date DEFAULT NULL,
  `filestatus_id` int(11) DEFAULT NULL,
  `registration_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trademarks`
--

INSERT INTO `trademarks` (`trademark_id`, `Calendar_Year`, `Mark`, `Applicant`, `trademark_reg_no`, `Class_es`, `File_no`, `filing_date`, `filestatus_id`, `registration_date`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `trademarks_remarks`
--

CREATE TABLE `trademarks_remarks` (
  `trademark_remarks_id` int(11) NOT NULL,
  `trademark_id` int(255) DEFAULT NULL,
  `trademark_time` datetime DEFAULT NULL,
  `trademark_desc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `account_type` int(11) NOT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `user_firstname` varchar(50) NOT NULL,
  `user_lastname` varchar(50) NOT NULL,
  `user_position` varchar(100) NOT NULL,
  `user_pass` varchar(200) DEFAULT NULL,
  `user_lastloginn` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `account_type`, `user_name`, `user_firstname`, `user_lastname`, `user_position`, `user_pass`, `user_lastloginn`) VALUES
(2, 1, 'ipadmin1', 'ip', 'admin', 'superadmin', '40d8d15f5d595c4ee87c384730dd4e8f', '2018-06-04 14:56:07'),
(3, 2, 'ipemp1', 'first', 'last', 'employee 1', 'a186351b2dd67bfcbe9e8c031c099063', '2018-06-04 10:38:33'),
(4, 2, 'user1', 'first', 'last', 'position', 'a722c63db8ec8625af6cf71cb8c2d939', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `utility_model`
--

CREATE TABLE `utility_model` (
  `um_id` int(10) NOT NULL,
  `um_title` text,
  `um_reg_no` varchar(20) DEFAULT NULL,
  `agency_id` int(2) DEFAULT NULL,
  `category_id` int(2) DEFAULT NULL,
  `um_filing_date` date DEFAULT NULL,
  `um_issue_date` date DEFAULT NULL,
  `um_inventor` text,
  `um_publication_date` date DEFAULT NULL,
  `um_year` int(4) DEFAULT NULL,
  `filestatus_id` int(2) DEFAULT NULL,
  `um_image` text,
  `um_comment` text,
  `user_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utility_model`
--

INSERT INTO `utility_model` (`um_id`, `um_title`, `um_reg_no`, `agency_id`, `category_id`, `um_filing_date`, `um_issue_date`, `um_inventor`, `um_publication_date`, `um_year`, `filestatus_id`, `um_image`, `um_comment`, `user_name`) VALUES
(1, 'EQUIPMENT FOR ZERO WASTE GINGER PROCESSING TECHNOLOGY / PROCESS FOR PRODUCING GINGER BREW AND POWDER FROM GINGER RHIZOMES \r\n', '2-2007-000205', 4, 4, '2007-07-12', '2009-07-13', 'ARNULFO P . MALINIS; CHRISTOPHER O . PACARDO\r\n', '2009-07-13', 2007, 2, NULL, NULL, ''),
(2, 'PROCESS OF PRODUCING STARCH AND FLOUR FROM ARROWROOT TUBERS \r\n', '2-2007-000206', 4, 4, '2007-07-12', '2009-07-13', 'ARNULFO P . MALINIS; CHRISTOPHER O . PACARDO; SALVADOR T . ALBIA;\r\n', '2009-07-13', 2007, 2, NULL, NULL, ''),
(3, 'FUEL EFFICIENT CHARCOAL STOVE\r\n', '2-2009-000005', 10, 4, '2009-01-12', '2009-07-13', 'ERLINDA C . RELUCIO;', '2009-07-13', 2009, 2, NULL, NULL, ''),
(4, 'PROCESS OF PRODUCING PILI PULP VIRGIN OIL, PILI PULP FLOUR AND COLORING POWDER FROM PILI FRUITS\r\n', '2-2009-000333', 3, 4, '2009-09-01', '2009-11-09', 'ARNULFO MALINIS\r\n', '2009-11-09', 2009, 2, NULL, NULL, ''),
(5, 'AUTOMOTIVE CHARGING SYSTEM TRAINER WITH SAFETY DEVICE FOR INSTRUCTIONAL USE\r\n', '2-2010-000438', 10, 4, '2010-09-01', '2011-03-28', 'NICANOR BALBIN\r\n', '2011-03-28', 2010, 2, NULL, NULL, ''),
(6, 'MULTI SYSTEM AUTOMOTIVE ENGINE ELECTRICAL TRAINER\r\n', '2-2011-000070', 10, 4, '2011-02-17', '2011-09-26', 'NICANOR BALBIN\r\n', '2011-09-26', 2011, 2, NULL, NULL, ''),
(7, 'VARIABLE ENGINE VALVE SPRING COMPRESSOR\r\n', '2-2011-000167', 10, 4, '2011-04-19', '2013-06-14', 'NICANOR B. BALBIN\r\n', '2013-06-14', 2011, 2, NULL, NULL, ''),
(8, 'MECHANIZED BEARING GREASE REPACKER\r\n', '2-2011-000168', 10, 4, '2011-04-19', '2013-06-14', 'NICANOR B. BALBIN\r\n', '2013-06-14', 2011, 2, NULL, NULL, ''),
(9, 'PRE-CAST WALL PANEL\r\n', '2-2011-000379', 11, 4, '2011-08-17', NULL, 'MELVIN B. BALLARES\r\n', NULL, 2011, 3, NULL, NULL, ''),
(10, 'PROCESS OF FORMULATING HEALTH DRINK FROM LEMON GRASS (Andropogon citratus)\r\n', '2-2011-000380', 3, 4, '2011-08-17', '2011-08-11', 'LEONORA S. LANUZO\r\n', '2012-06-12', 2011, 2, NULL, NULL, ''),
(11, 'PROCESS OF FORMULATING HEALTH DRINK FROM OF PANDAN (Pandanus amaryllifolius)\r\n', '2-2011-000381', 3, 4, '2011-08-17', '2012-08-22', 'MERLIE R. ARBO', '2012-08-17', 2011, 2, NULL, NULL, ''),
(12, 'PROCESS OF FORMULATING HEALTH DRINK FROM OF PANDAN (Pandanus amaryllifolius) and LEMON GRASS (Andropogon citratus)\r\n', '2-2011-000382', 3, 4, '2011-08-17', '2012-08-22', 'VIOLETA S. RONDA\r\n', '2012-06-18', 2011, 2, NULL, NULL, ''),
(13, 'A PROCESS OF PRODUCING COCO PILI (Canarium ovatum) SWEET DESSERT\r\n', '2-2011-000592', 12, 4, '2011-11-24', '2012-10-08', 'TERESITA REQUEÑA; LEONY GALAROSA;', '2012-10-08', 2011, 2, NULL, NULL, ''),
(14, ' A PROCESS OF PRODUCING CHOCO TARO (Colocasia esculenta) CHIPS\r\n', '2-2011-000593', 12, 4, '2011-11-24', '2012-10-08', 'DOMINGO NACE; LEA F. DIVINA\r\n', NULL, 2011, 2, '', '', ''),
(15, 'AN AUTOMATED MUSHROOM FRUITING HOUSE AND SYSTEMS THEREOF\r\n', '2-2011-000594', 12, 4, '2011-11-24', NULL, 'DOMINGO BERNIDO; JISELLE ESTRELLADO; RUSHEL ESTUARIA\r\n', NULL, 2011, 3, '', '', ''),
(16, 'PROCESS OF PRODUCING NATURAL FOOD SEASONING\r\n', '2-2013-000026', 3, 4, '2013-01-25', '2015-07-03', 'LEONORA S. LANUZO\r\n', '2015-07-03', 2013, 2, '', '', ''),
(17, 'AUTO AIRCONDITIONING SYSTEM TRAINER\r\n', '2-2013-000027', 3, 4, NULL, '2013-01-25', 'ZALDY C. MAGNATE\r\n', NULL, 2013, 3, '', '', ''),
(18, 'METHOD OF PROCESSING MORINGA\r\n', '2-2013-000542', 3, 4, '2013-11-11', '2014-08-04', 'ARNULFO P. MALINIS; CHRISTOPHER O. PACARDO\r\n', '2014-08-04', 2013, 2, '', '', ''),
(19, 'THE PROCESS OF PRODUCING MORINGA TEA\r\n', '2-2013-000543', 3, 4, '2013-11-11', '2014-08-04', 'EDEN M. LLAMERA\r\n', '2014-08-04', 2013, 2, '', '', ''),
(20, 'PROCESS OF PRODUCING FRUIT WINE\r\n', '2-2013-000636', 3, 4, '2013-12-05', NULL, 'VIOLETA S. RONDA; MA. MERLIE R. ARBO; LEONORA S. LANUZO; VILMA B. AYCARDO; NELLY B. BELCHEZ\r\n', NULL, 2013, 2, '', '', ''),
(21, 'MULTI PURPOSE CABINET\r\n', '2-2014-000136', 3, 4, '2014-03-25', NULL, 'BABY BOY BENJAMIN D. NEBRES III\r\n', NULL, 2014, 3, '', '', ''),
(22, 'THE PROCESS OF PRODUCING TEA FROM THE COMBINATION OF TURMERIC AND GINGER\r\n', '2-2014-000418', 3, 4, '2014-07-09', NULL, 'Rosemarie R. Romero\r\n', NULL, 2014, 3, NULL, NULL, ''),
(23, 'PORTABLE MULTI-TESTER WITH BUILT-IN BATTERY CHARGER\r\n', '2-2014-000578', 3, 4, '2014-10-23', NULL, 'Mario J. Aycardo\r\n', NULL, 2014, 3, '', '', ''),
(26, 'PORTABLE MULTI-TESTER WITH BUILT-IN BATTERY CHARGER\r\n', '2-2015-000352', 3, 9, '2015-07-23', '2018-06-13', 'Mario J. Aycardo\r\n', '2018-06-15', 2019, 3, '', '', ''),
(31, 'SECURED DUAL SOURCE ELECTRIC CHARGER VENDING APPARATUS\r\n', '2-2015-000426', 3, 4, '2015-08-24', NULL, 'Norlijun V. Hilutin; Jenlo Diamse; Edsel Samaniego\r\n', NULL, 2015, 3, '', '', ''),
(32, 'PORTABLE AUTO-ELECTRONICS MULTI-TESTER\r\n', '2-2015-000423', 3, 4, '2015-08-24', '0000-00-00', 'Mario J. Aycardo\r\n', '0000-00-00', 2015, 3, '', '', ''),
(33, 'VEHICLE SECURITY APPARATUS USING RADIO FREQUENCY IDENTIFICATION CARD AND BIOMETRICS AND THE SYSTEM THEREOF\r\n', '2-2015-000667', 3, 4, '2015-10-12', '0000-00-00', 'Richard Colasito; Amador Edaugal; Dominic MascariÅˆas; Kim Candy Cayago\r\n', NULL, 2015, 3, '', '', ''),
(34, 'BOND PAPER VENDING MACHINE\r\n', '2-2015-000664', 3, 4, '2015-10-12', NULL, 'Richard Colasito; Ivan Jay Buere; John Paul Rayco; Sarah Jane Sionicio\r\n', NULL, 2015, 3, '', '', ''),
(35, 'ANTI-BACTERIALS SOAP FROM KAKAWATE (Gliricidia sepium) AND AKAPULCO (Cassia alata)\r\n', '2-2015-000666', 12, 4, '2015-10-12', NULL, 'Rosemarie R. Jadie\r\n', NULL, 2015, 2, '', '', ''),
(36, 'AUTOMATIC COCKTAIL DISPENSER\r\n', '2-2015-000668', 3, 4, '2015-10-12', NULL, 'Ben Saminiano; Justine Ponting; Benedict Supat; Francis Rabe\r\n', NULL, 2015, 3, '', '', ''),
(37, 'PROCESS OF PRODUCING FIBER FROM SANSEVIERIA TRIFASCIATA\r\n', '2-2015-000672', 5, 4, '2015-10-12', NULL, 'Nolan G. Belaro\r\n', NULL, 2015, 2, '', '', ''),
(38, ' PROCESS OF PRODUCING TEA FROM TURMERIC (Curcuma longa) AND GINGER (Zingiber officinale)\r\n', '2-2015-000671', 12, 4, '2015-10-12', NULL, 'Rosemarie R. Jadie\r\n', NULL, 2015, 2, '', '', ''),
(39, 'AUTO AIRCONDITIONING SYSTEM TRAINER APPARATUS\r\n', '2-2015-000665', 3, 4, '2015-10-12', NULL, 'ZALDY C. MAGNATE\r\n', NULL, 2015, 3, '', '', ''),
(40, 'POWER STEERING SYSTEM TRAINER\r\n', '2-2015-000766', 10, 4, '2015-12-11', NULL, 'NICANOR BALBIN, et. Al\r\n', NULL, 2015, 3, '', '', ''),
(42, '22222222222', '11111111111111111111', 2, 3, '0000-00-00', '2018-06-06', '21321312', '0000-00-00', 2018, 1, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `utility_remarks`
--

CREATE TABLE `utility_remarks` (
  `um_remarks_id` int(11) NOT NULL,
  `um_id` int(10) DEFAULT NULL,
  `um_remarks_time` datetime DEFAULT NULL,
  `um_remarks_desc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utility_remarks`
--

INSERT INTO `utility_remarks` (`um_remarks_id`, `um_id`, `um_remarks_time`, `um_remarks_desc`) VALUES
(5, 15, '2013-05-27 00:00:00', 'withdrawn application \r\n'),
(6, 9, '2017-10-10 00:00:00', 'withdrawn application\r\n'),
(7, 16, '2014-08-08 00:00:00', 'mailed the formality examination report\r\n'),
(8, 17, '2017-10-10 00:00:00', 'received the revival order\r\n'),
(9, 18, '2017-10-10 00:00:00', 'received the notice of issuance of certificate\r\n'),
(10, 19, '2017-10-10 00:00:00', 'received the notice of issuance of certificate\r\n'),
(11, 21, '2017-10-10 00:00:00', 'received the formality examination report'),
(12, 26, '4567-02-11 00:00:00', 'new remarks'),
(13, 26, '2018-06-05 00:00:00', 'received new'),
(14, 26, '2018-06-06 00:00:00', 'try'),
(15, 42, '0000-00-00 00:00:00', 'remarksu'),
(16, 42, '0000-00-00 00:00:00', 'desu'),
(18, 42, '0000-00-00 00:00:00', 'another'),
(19, 42, '0000-00-00 00:00:00', 'wew');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_type`
--
ALTER TABLE `account_type`
  ADD PRIMARY KEY (`account_type_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD KEY `account_type_id` (`account_type_id`);

--
-- Indexes for table `agencies`
--
ALTER TABLE `agencies`
  ADD PRIMARY KEY (`agency_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `copyrights`
--
ALTER TABLE `copyrights`
  ADD PRIMARY KEY (`copyrights_id`),
  ADD KEY `FK_agency_copyrights` (`agency_id`),
  ADD KEY `FK_filestatus_copyrights` (`filestatus_id`),
  ADD KEY `FK_category_copyrights` (`category_id`),
  ADD KEY `FK_class_copyrights` (`class_id`);

--
-- Indexes for table `copyrights_remarks`
--
ALTER TABLE `copyrights_remarks`
  ADD PRIMARY KEY (`copyrights_remarks_id`),
  ADD KEY `FK_copyremarks` (`copyrights_id`);

--
-- Indexes for table `filestatus`
--
ALTER TABLE `filestatus`
  ADD PRIMARY KEY (`filestatus_id`);

--
-- Indexes for table `industrial_design`
--
ALTER TABLE `industrial_design`
  ADD PRIMARY KEY (`industrial_id`),
  ADD KEY `FK_agency_industrial_design` (`agency_id`),
  ADD KEY `FK_category_industrial_design` (`category_id`),
  ADD KEY `FK_filestatus_industrial_design` (`filestatus_id`);

--
-- Indexes for table `industrial_remarks`
--
ALTER TABLE `industrial_remarks`
  ADD PRIMARY KEY (`industrial_remarks_id`),
  ADD KEY `FK_remarks_industrial` (`industrial_id`);

--
-- Indexes for table `invention`
--
ALTER TABLE `invention`
  ADD PRIMARY KEY (`invention_id`),
  ADD KEY `FK_agency_invention` (`agency_id`),
  ADD KEY `FK_filestatus_invention` (`filestatus_id`),
  ADD KEY `FK_category_invention` (`category_id`);

--
-- Indexes for table `invention_remarks`
--
ALTER TABLE `invention_remarks`
  ADD PRIMARY KEY (`in_remarks_id`),
  ADD KEY `FK_invention_in_remarks` (`invention_id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `task_progress`
--
ALTER TABLE `task_progress`
  ADD PRIMARY KEY (`task_progress_id`);

--
-- Indexes for table `trademarks`
--
ALTER TABLE `trademarks`
  ADD PRIMARY KEY (`trademark_id`),
  ADD KEY `FK_trade_filestatus` (`filestatus_id`);

--
-- Indexes for table `trademarks_remarks`
--
ALTER TABLE `trademarks_remarks`
  ADD PRIMARY KEY (`trademark_remarks_id`),
  ADD KEY `FK_trademark_id_trademarks_remarks` (`trademark_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `utility_model`
--
ALTER TABLE `utility_model`
  ADD PRIMARY KEY (`um_id`),
  ADD KEY `FK_agency_id_utility_model` (`agency_id`),
  ADD KEY `FK_category_id_utility_model` (`category_id`),
  ADD KEY `FK_filestatus_id_utility_model` (`filestatus_id`);

--
-- Indexes for table `utility_remarks`
--
ALTER TABLE `utility_remarks`
  ADD PRIMARY KEY (`um_remarks_id`),
  ADD KEY `FK_um_id_um_remarks` (`um_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agencies`
--
ALTER TABLE `agencies`
  MODIFY `agency_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `copyrights`
--
ALTER TABLE `copyrights`
  MODIFY `copyrights_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `copyrights_remarks`
--
ALTER TABLE `copyrights_remarks`
  MODIFY `copyrights_remarks_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `filestatus`
--
ALTER TABLE `filestatus`
  MODIFY `filestatus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `industrial_design`
--
ALTER TABLE `industrial_design`
  MODIFY `industrial_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `invention`
--
ALTER TABLE `invention`
  MODIFY `invention_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `task_progress`
--
ALTER TABLE `task_progress`
  MODIFY `task_progress_id` int(1) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `trademarks`
--
ALTER TABLE `trademarks`
  MODIFY `trademark_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `utility_model`
--
ALTER TABLE `utility_model`
  MODIFY `um_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `utility_remarks`
--
ALTER TABLE `utility_remarks`
  MODIFY `um_remarks_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`account_type_id`) REFERENCES `account_type` (`account_type_id`);

--
-- Constraints for table `copyrights`
--
ALTER TABLE `copyrights`
  ADD CONSTRAINT `FK_agency_copyrights` FOREIGN KEY (`agency_id`) REFERENCES `agencies` (`agency_id`),
  ADD CONSTRAINT `FK_category_copyrights` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`),
  ADD CONSTRAINT `FK_class_copyrights` FOREIGN KEY (`class_id`) REFERENCES `classes` (`class_id`),
  ADD CONSTRAINT `FK_filestatus_copyrights` FOREIGN KEY (`filestatus_id`) REFERENCES `filestatus` (`filestatus_id`);

--
-- Constraints for table `copyrights_remarks`
--
ALTER TABLE `copyrights_remarks`
  ADD CONSTRAINT `FK_copyremarks` FOREIGN KEY (`copyrights_id`) REFERENCES `copyrights` (`copyrights_id`);

--
-- Constraints for table `industrial_design`
--
ALTER TABLE `industrial_design`
  ADD CONSTRAINT `FK_agency_industrial_design` FOREIGN KEY (`agency_id`) REFERENCES `agencies` (`agency_id`),
  ADD CONSTRAINT `FK_category_industrial_design` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`),
  ADD CONSTRAINT `FK_filestatus_industrial_design` FOREIGN KEY (`filestatus_id`) REFERENCES `filestatus` (`filestatus_id`);

--
-- Constraints for table `industrial_remarks`
--
ALTER TABLE `industrial_remarks`
  ADD CONSTRAINT `FK_remarks_industrial` FOREIGN KEY (`industrial_id`) REFERENCES `industrial_design` (`industrial_id`);

--
-- Constraints for table `invention`
--
ALTER TABLE `invention`
  ADD CONSTRAINT `FK_agency_invention` FOREIGN KEY (`agency_id`) REFERENCES `agencies` (`agency_id`),
  ADD CONSTRAINT `FK_category_invention` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`),
  ADD CONSTRAINT `FK_filestatus_invention` FOREIGN KEY (`filestatus_id`) REFERENCES `filestatus` (`filestatus_id`);

--
-- Constraints for table `invention_remarks`
--
ALTER TABLE `invention_remarks`
  ADD CONSTRAINT `FK_invention_in_remarks` FOREIGN KEY (`invention_id`) REFERENCES `invention` (`invention_id`);

--
-- Constraints for table `trademarks`
--
ALTER TABLE `trademarks`
  ADD CONSTRAINT `FK_trade_filestatus` FOREIGN KEY (`filestatus_id`) REFERENCES `filestatus` (`filestatus_id`);

--
-- Constraints for table `trademarks_remarks`
--
ALTER TABLE `trademarks_remarks`
  ADD CONSTRAINT `FK_trademark_id_trademarks_remarks` FOREIGN KEY (`trademark_id`) REFERENCES `trademarks` (`trademark_id`);

--
-- Constraints for table `utility_model`
--
ALTER TABLE `utility_model`
  ADD CONSTRAINT `FK_agency_id_utility_model` FOREIGN KEY (`agency_id`) REFERENCES `agencies` (`agency_id`),
  ADD CONSTRAINT `FK_category_id_utility_model` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`),
  ADD CONSTRAINT `FK_filestatus_id_utility_model` FOREIGN KEY (`filestatus_id`) REFERENCES `filestatus` (`filestatus_id`);

--
-- Constraints for table `utility_remarks`
--
ALTER TABLE `utility_remarks`
  ADD CONSTRAINT `FK_um_id_um_remarks` FOREIGN KEY (`um_id`) REFERENCES `utility_model` (`um_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
