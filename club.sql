-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:5222
-- Generation Time: Aug 16, 2023 at 01:06 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `club`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `abouts_id` int(10) UNSIGNED NOT NULL,
  `area` varchar(191) NOT NULL,
  `established` varchar(191) NOT NULL,
  `short_overview` text NOT NULL,
  `overview_image` varchar(191) DEFAULT NULL,
  `overview_description` text NOT NULL,
  `mission_image` varchar(191) DEFAULT NULL,
  `mission_description` text DEFAULT NULL,
  `vision_image` varchar(191) DEFAULT NULL,
  `vision_description` text DEFAULT NULL,
  `map_description` varchar(191) DEFAULT NULL,
  `google_map_latitude` varchar(191) DEFAULT NULL,
  `google_map_langitude` varchar(191) DEFAULT NULL,
  `phone` varchar(191) NOT NULL,
  `fax` varchar(191) DEFAULT NULL,
  `pabx` varchar(191) DEFAULT NULL,
  `email` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `aluminis`
--

CREATE TABLE `aluminis` (
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `job_title` varchar(200) NOT NULL,
  `description` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `blog_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text DEFAULT NULL,
  `creation_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `car`
-- (See below for the actual view)
--
CREATE TABLE `car` (
`carnival_id` int(10) unsigned
,`title` varchar(300)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `carival`
-- (See below for the actual view)
--
CREATE TABLE `carival` (
`carnival_id` int(10) unsigned
,`title` varchar(300)
);

-- --------------------------------------------------------

--
-- Table structure for table `carnivals`
--

CREATE TABLE `carnivals` (
  `carnival_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(300) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `banner` varchar(255) DEFAULT NULL,
  `start` timestamp NOT NULL DEFAULT current_timestamp(),
  `end` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carnivals`
--

INSERT INTO `carnivals` (`carnival_id`, `title`, `slug`, `banner`, `start`, `end`, `status`) VALUES
(2, 'It Carnival 2023', 'it-carnival-2023', 'it-carnival-2023.png', '2023-08-07 18:00:00', '2023-08-16 18:00:00', 1),
(6, 'Hello World', 'hello-world', 'hello-world.svg', '2023-08-16 18:00:00', '2023-09-01 18:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `citys`
--

CREATE TABLE `citys` (
  `postal_code` int(10) UNSIGNED NOT NULL,
  `country_code` varchar(50) DEFAULT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `citys`
--

INSERT INTO `citys` (`postal_code`, `country_code`, `name`) VALUES
(1600, 'BD', 'Narsingdi'),
(1605, 'BD', 'Patuakhali');

-- --------------------------------------------------------

--
-- Table structure for table `collaborators`
--

CREATE TABLE `collaborators` (
  `colla_id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `start` timestamp NOT NULL DEFAULT current_timestamp(),
  `image` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `web` varchar(500) DEFAULT NULL,
  `status` int(50) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `collaborators`
--

INSERT INTO `collaborators` (`colla_id`, `email`, `phone`, `name`, `description`, `start`, `image`, `address`, `web`, `status`) VALUES
(3, 'nagarajan@apscode.com', '+91 9605086639', 'ApsCode', 'Apscode.com is a professional software developer\r\nTransforming your ideas into cutting-edge software\r\niOS app design & development', '2023-08-09 09:34:30', 'apscode.svg', 'Dhaka', 'https://www.apscode.com/home', 1),
(4, 'sales@brainstation-23.com', '+8801404055227', 'Brainstation-23', 'It was in 2006, with little capital but a pocketful of belief our CEO, Raisul Kabir started Brain Station 23, a software company, right after graduating from BUET. The new company initially focused on the international market with the local market added in 2010. Since then the company has shown a continuous growth and currently employs over 700+ software engineers. Brain Station 23 is now not only an established name in Bangladesh but also in countries like the USA, UK, Netherlands, Denmark, Japan, Norway, Sweden, Germany, Canada, Switzerland, Turkey and the Middle East etc.', '2023-08-09 09:42:34', 'brainstation-23.png', '(Building-3) 3rd Floor, Mirpur DOHS Cultural Centre, Road 9, Mirpur DOHS, Dhaka 1216, Bangladesh', 'https://brainstation-23.com/', 1),
(5, 'contact@vivasoftltd.com', '+880 1713428432', 'Vivasoft', 'Vivasoft specializes in providing custom software development services. Get premium software solutions from a reliable outsourcing partner and set your business apart. Skilled teams that can design, build, space and scale your vision in the most efficient way.', '2023-08-09 09:48:14', 'vivasoft.svg', 'Dhaka Office\r\nFloor #11, 16 & 19 Ahmed Tower, 28, 30, 1213 Kemal Ataturk Ave, Dhaka 1213 ', 'https://www.vivasoftltd.com/', 1),
(6, 'nestle@gmail.com', '01403487219', 'Nestlé', 'We unlock the power of food to enhance quality of life for everyone, today and for generations to come', '2023-08-09 09:52:59', 'nestl-.png', 'We unlock the power of food to enhance quality of life for everyone, today and for generations to come', 'https://www.nestle.com/', 1);

-- --------------------------------------------------------

--
-- Table structure for table `colleges`
--

CREATE TABLE `colleges` (
  `college_code` varchar(50) NOT NULL,
  `website` varchar(500) DEFAULT NULL,
  `country_code` varchar(50) DEFAULT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colleges`
--

INSERT INTO `colleges` (`college_code`, `website`, `country_code`, `name`) VALUES
('1780', 'http://pstu.ac.bd/campus', 'AE', 'Patuakhali Science & Technology University'),
('4546', 'https://www.sust.edu/', 'BA', 'Shahjalal University of Science & Technology ');

-- --------------------------------------------------------

--
-- Table structure for table `committees`
--

CREATE TABLE `committees` (
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `role_title` varchar(200) NOT NULL,
  `role_des` varchar(200) NOT NULL,
  `duration` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `complaint_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `subject` varchar(255) NOT NULL,
  `complaint_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `complaint_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countrys`
--

CREATE TABLE `countrys` (
  `country_code` varchar(50) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countrys`
--

INSERT INTO `countrys` (`country_code`, `name`) VALUES
('AE', 'United Arab Emirates'),
('AF', 'Afghanistan'),
('AG', 'Antigua and Barbuda'),
('AL', 'Albania'),
('AM', 'Armenia'),
('AO', 'Angola'),
('AR', 'Argentina'),
('AT', 'Austria'),
('AU', 'Australia'),
('AZ', 'Azerbaijan'),
('BA', 'Bosnia and Herzegovina'),
('BB', 'Barbados'),
('BD', 'Bangladesh'),
('BE', 'Belgium'),
('BF', 'Burkina Faso'),
('BG', 'Bulgaria'),
('BH', 'Bahrain'),
('BI', 'Burundi'),
('BJ', 'Benin'),
('BN', 'Brunei'),
('BO', 'Bolivia'),
('BR', 'Brazil'),
('BS', 'Bahamas'),
('BT', 'Bhutan'),
('BW', 'Botswana'),
('BY', 'Belarus'),
('BZ', 'Belize'),
('CA', 'Canada'),
('CD', 'Congo (Kinshasa)'),
('CF', 'Central African Republic'),
('CG', 'Congo (Brazzaville)'),
('CH', 'Switzerland'),
('CL', 'Chile'),
('CM', 'Cameroon'),
('CN', 'China'),
('CO', 'Colombia'),
('CR', 'Costa Rica'),
('CU', 'Cuba'),
('CV', 'Cape Verde'),
('CY', 'Cyprus'),
('CZ', 'Czech Republic'),
('DE', 'Germany'),
('DJ', 'Djibouti'),
('DK', 'Denmark'),
('DM', 'Dominica'),
('DO', 'Dominican Republic'),
('DZ', 'Algeria'),
('EC', 'Ecuador'),
('EE', 'Estonia'),
('EG', 'Egypt'),
('ER', 'Eritrea'),
('ES', 'Spain'),
('ET', 'Ethiopia'),
('FI', 'Finland'),
('FJ', 'Fiji'),
('FM', 'Micronesia'),
('FR', 'France'),
('GA', 'Gabon'),
('GB', 'United Kingdom'),
('GD', 'Grenada'),
('GE', 'Georgia'),
('GH', 'Ghana'),
('GM', 'Gambia'),
('GN', 'Guinea'),
('GQ', 'Equatorial Guinea'),
('GR', 'Greece'),
('GT', 'Guatemala'),
('GW', 'Guinea-Bissau'),
('GY', 'Guyana'),
('HN', 'Honduras'),
('HR', 'Croatia'),
('HT', 'Haiti'),
('HU', 'Hungary'),
('ID', 'Indonesia'),
('IE', 'Ireland'),
('IL', 'Israel'),
('IN', 'India'),
('IQ', 'Iraq'),
('IR', 'Iran'),
('IS', 'Iceland'),
('IT', 'Italy'),
('JM', 'Jamaica'),
('JO', 'Jordan'),
('JP', 'Japan'),
('KE', 'Kenya'),
('KG', 'Kyrgyzstan'),
('KH', 'Cambodia'),
('KI', 'Kiribati'),
('KM', 'Comoros'),
('KN', 'Saint Kitts and Nevis'),
('KP', 'North Korea'),
('KR', 'South Korea'),
('KW', 'Kuwait'),
('KZ', 'Kazakhstan'),
('LA', 'Laos'),
('LB', 'Lebanon'),
('LC', 'Saint Lucia'),
('LI', 'Liechtenstein'),
('LK', 'Sri Lanka'),
('LR', 'Liberia'),
('LS', 'Lesotho'),
('LT', 'Lithuania'),
('LU', 'Luxembourg'),
('LV', 'Latvia'),
('LY', 'Libya'),
('MA', 'Morocco'),
('MC', 'Monaco'),
('MD', 'Moldova'),
('ME', 'Montenegro'),
('MG', 'Madagascar'),
('MH', 'Marshall Islands'),
('MK', 'North Macedonia'),
('ML', 'Mali'),
('MM', 'Myanmar'),
('MN', 'Mongolia'),
('MR', 'Mauritania'),
('MT', 'Malta'),
('MU', 'Mauritius'),
('MV', 'Maldives'),
('MW', 'Malawi'),
('MX', 'Mexico'),
('MY', 'Malaysia'),
('MZ', 'Mozambique'),
('NA', 'Namibia'),
('NE', 'Niger'),
('NG', 'Nigeria'),
('NI', 'Nicaragua'),
('NL', 'Netherlands'),
('NO', 'Norway'),
('NP', 'Nepal'),
('NR', 'Nauru'),
('NZ', 'New Zealand'),
('OM', 'Oman'),
('PA', 'Panama'),
('PE', 'Peru'),
('PG', 'Papua New Guinea'),
('PH', 'Philippines'),
('PK', 'Pakistan'),
('PL', 'Poland'),
('PS', 'Palestinian territories'),
('PT', 'Portugal'),
('PW', 'Palau'),
('PY', 'Paraguay'),
('QA', 'Qatar'),
('RO', 'Romania'),
('RS', 'Serbia'),
('RU', 'Russia'),
('RW', 'Rwanda'),
('SA', 'Saudi Arabia'),
('SB', 'Solomon Islands'),
('SC', 'Seychelles'),
('SD', 'Sudan'),
('SE', 'Sweden'),
('SG', 'Singapore'),
('SI', 'Slovenia'),
('SK', 'Slovakia'),
('SL', 'Sierra Leone'),
('SM', 'San Marino'),
('SN', 'Senegal'),
('SO', 'Somalia'),
('SR', 'Suriname'),
('SS', 'South Sudan'),
('ST', 'Sao Tome and Principe'),
('SV', 'El Salvador'),
('SY', 'Syria'),
('SZ', 'Swaziland'),
('TD', 'Chad'),
('TG', 'Togo'),
('TH', 'Thailand'),
('TJ', 'Tajikistan'),
('TL', 'Timor-Leste (East Timor)'),
('TM', 'Turkmenistan'),
('TN', 'Tunisia'),
('TO', 'Tonga'),
('TR', 'Turkey'),
('TT', 'Trinidad and Tobago'),
('TV', 'Tuvalu'),
('TZ', 'Tanzania'),
('UA', 'Ukraine'),
('UG', 'Uganda'),
('US', 'United States of America'),
('UY', 'Uruguay'),
('UZ', 'Uzbekistan'),
('VA', 'Vatican City (Holy See)'),
('VC', 'Saint Vincent and the Grenadines'),
('VE', 'Venezuela'),
('VN', 'Vietnam'),
('VU', 'Vanuatu'),
('WS', 'Samoa'),
('YE', 'Yemen'),
('ZA', 'South Africa'),
('ZM', 'Zambia'),
('ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_code` varchar(100) NOT NULL,
  `course_name` varchar(200) NOT NULL,
  `credit` varchar(100) NOT NULL,
  `course_des` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_code`, `course_name`, `credit`, `course_des`) VALUES
('4545', 'Amal Manning', 'Ad asperiores aperia', 'Et itaque aliquam in');

-- --------------------------------------------------------

--
-- Table structure for table `course_materials`
--

CREATE TABLE `course_materials` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `course_code` varchar(100) DEFAULT NULL,
  `title` varchar(191) NOT NULL,
  `file` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `educations`
--

CREATE TABLE `educations` (
  `edu_id` int(10) UNSIGNED NOT NULL,
  `college_code` varchar(50) DEFAULT NULL COMMENT 'Foreign key',
  `fac_id` int(10) UNSIGNED DEFAULT NULL COMMENT 'Foreign key',
  `user_id` int(10) UNSIGNED DEFAULT NULL COMMENT 'Foreign key',
  `session_id` int(10) UNSIGNED DEFAULT NULL COMMENT 'Foreign key',
  `result` varchar(100) DEFAULT NULL,
  `graduation_year` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(10) UNSIGNED NOT NULL,
  `carnival_id` int(10) DEFAULT NULL,
  `event_name` varchar(255) DEFAULT NULL,
  `event_des` text DEFAULT NULL,
  `reg_date` date NOT NULL DEFAULT current_timestamp(),
  `event_date` date NOT NULL DEFAULT current_timestamp(),
  `event_time` time NOT NULL DEFAULT current_timestamp(),
  `event_loc` text DEFAULT NULL,
  `event_image` varchar(255) DEFAULT NULL,
  `participants` int(11) DEFAULT 0,
  `status` tinyint(5) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `carnival_id`, `event_name`, `event_des`, `reg_date`, `event_date`, `event_time`, `event_loc`, `event_image`, `participants`, `status`) VALUES
(7, 2, 'Hackathon', 'An inter university 24-hour competition where participants will be given a problem to solve using the development skills they have.', '2023-08-19', '2023-08-22', '06:23:00', 'PSTU Auditorium', 'hackathon.jpg', 0, 1),
(8, 2, 'Deep Learning Sprint 2.0', 'A month long deep learning competition where participants will be given a problem and a dataset and the competition will be held in Kaggle.', '2023-08-17', '2023-08-18', '21:28:00', 'PSTU Auditorium', 'deep-learning-sprint-2-0.jpg', 0, 1),
(9, 2, 'Capture the Flag', 'Capture The Flag (CTF) is a thrilling cybersecurity contest where participants use their computer skills to find and exploit weaknesses in systems, competing to capture virtual flags and earn points.', '2023-08-11', '2023-08-31', '21:31:00', 'On Campus', 'capture-the-flag.png', 0, 1),
(10, 2, 'GameJam', 'A Gamejam competition is an event where participants, typically game developers or enthusiasts, come together to create playable games within a set timeframe of 72 hours', '2023-08-18', '2023-08-18', '22:34:00', 'CSE Building', 'gamejam.jpg', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `event_reg`
--

CREATE TABLE `event_reg` (
  `reg_id` int(10) UNSIGNED NOT NULL,
  `event_id` int(10) UNSIGNED DEFAULT NULL,
  `college_code` varchar(50) DEFAULT NULL,
  `student_id` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `team_name` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_sponsor`
--

CREATE TABLE `event_sponsor` (
  `id` int(10) UNSIGNED NOT NULL,
  `carnival_id` int(10) UNSIGNED DEFAULT NULL,
  `colla_id` int(10) UNSIGNED DEFAULT NULL,
  `function` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_sponsor`
--

INSERT INTO `event_sponsor` (`id`, `carnival_id`, `colla_id`, `function`) VALUES
(2, 2, 4, 'Title Sponsor'),
(3, 2, 3, 'Co Sponsor'),
(4, 2, 6, 'Food Sponsor'),
(5, 2, 5, 'Organazed Sponsor');

-- --------------------------------------------------------

--
-- Table structure for table `event_vol`
--

CREATE TABLE `event_vol` (
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `event_id` int(10) UNSIGNED DEFAULT NULL,
  `role` varchar(50) NOT NULL,
  `res` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `facultys`
--

CREATE TABLE `facultys` (
  `fac_id` int(10) UNSIGNED NOT NULL,
  `fac_code` varchar(100) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `facultys`
--

INSERT INTO `facultys` (`fac_id`, `fac_code`, `name`) VALUES
(3, 'CSIT', 'Computer Science And  Information Technology'),
(4, 'CCE', 'Computer & Comunication Engineering'),
(5, 'Ag', 'Agriculture'),
(6, 'CSE', 'Computer Science And Engineering'),
(7, 'EEE', 'Electrical & Electronics Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `faq_id` int(10) UNSIGNED NOT NULL,
  `question` varchar(50) NOT NULL,
  `ans` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gallerys`
--

CREATE TABLE `gallerys` (
  `file_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `file_type` varchar(50) NOT NULL,
  `source` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `instructors`
--

CREATE TABLE `instructors` (
  `ins_id` int(10) UNSIGNED DEFAULT NULL,
  `course_code` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(10) UNSIGNED NOT NULL,
  `fname` varchar(300) DEFAULT NULL,
  `lname` varchar(300) DEFAULT NULL,
  `email` varchar(300) DEFAULT NULL,
  `company` varchar(300) DEFAULT NULL,
  `subject` varchar(300) DEFAULT NULL,
  `des` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `fname`, `lname`, `email`, `company`, `subject`, `des`) VALUES
(1, 'Libby Carver', 'Leigh Barr', 'jycawylyz@mailinator.com', 'Ayers and Weiss Associates', 'Corrupti beatae qui', 'Et vel magni tempora'),
(2, 'Gareth Heath', 'Ainsley Benson', 'nynuhaqe@mailinator.com', 'Mcfadden Jimenez Traders', 'Ea aute fugiat haru', 'Ad quos vero saepe h'),
(3, 'Scarlet Marks', 'Lars Martin', 'zugota@mailinator.com', 'Castaneda Zamora Plc', 'Possimus neque obca', 'Deserunt est iusto '),
(4, 'Audra Key', 'Luke Suarez', 'vygoguta@mailinator.com', 'Schultz and Montgomery Co', 'Quibusdam eiusmod mi', 'Placeat ad quis dol'),
(5, 'Noah Dejesus', 'Nasim Case', 'voca@mailinator.com', 'Blake Mcleod Associates', 'Veniam laboriosam ', 'Modi omnis voluptate'),
(6, 'Nichole Vasquez', 'Wynter Valenzuela', 'jedikareca@mailinator.com', 'Randall and Bright Trading', 'Enim autem recusanda', 'Dolor in dicta ut es'),
(7, 'Hannah Tate', 'Kelsey Herrera', 'cityjypuny@mailinator.com', 'Rosa Donovan LLC', 'Qui non mollitia ut ', 'Enim sint doloremqu'),
(8, 'Jamal Washington', 'Kennan Cardenas', 'tetovaty@mailinator.com', 'Gay and Nelson Plc', 'Ad id laborum dolor', 'Soluta omnis ut moll'),
(9, 'Willa Horn', 'Azalia Rush', 'pawady@mailinator.com', 'Chaney Espinoza Traders', 'Incididunt voluptas ', 'Unde et exercitation'),
(10, 'Hilary Boyd', 'Austin Key', 'qykex@mailinator.com', 'Fleming Delacruz Associates', 'Est ab quaerat ut ut', 'Deserunt aliquip aut'),
(11, 'Shishir', 'Bhuiyan', 'shishir.cse.pstu@gmail.com', 'PSTU', 'Corrupti beatae qui', 'erytryr');

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `notice_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(200) NOT NULL,
  `des` varchar(200) DEFAULT 'Soon description comming',
  `file_source` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`notice_id`, `title`, `des`, `file_source`) VALUES
(13, 'Shishir', '<p>                                                            http://localhost/cseclub/admin/notice/edit/13#Shishir                                                      </p>', 'shishir.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `polls`
--

CREATE TABLE `polls` (
  `poll_id` int(10) UNSIGNED NOT NULL,
  `question` varchar(100) NOT NULL,
  `option1` varchar(100) DEFAULT NULL,
  `option2` varchar(100) DEFAULT NULL,
  `option3` varchar(100) DEFAULT NULL,
  `option4` varchar(100) DEFAULT NULL,
  `option5` varchar(100) DEFAULT NULL,
  `option6` varchar(100) DEFAULT NULL,
  `option7` varchar(100) DEFAULT NULL,
  `option8` varchar(100) DEFAULT NULL,
  `begin_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `end_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `poll_votes`
--

CREATE TABLE `poll_votes` (
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `poll_id` int(10) UNSIGNED DEFAULT NULL,
  `option_chosen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `project_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `logo` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `start_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `end_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `title` varchar(255) NOT NULL,
  `status` int(50) NOT NULL DEFAULT 1,
  `sourcecode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_id`, `user_id`, `logo`, `description`, `start_date`, `end_date`, `title`, `status`, `sourcecode`) VALUES
(8, 2, 'cse-club.png', 'asdasa', '2023-08-09 13:02:12', '2023-08-09 13:02:12', 'CSE CLUB', 0, 'http://localhost/cseclub/'),
(9, 2, 'cse-club-website.png', 'CSE club is one of the largest scientific clubs in Algeria. Working since 2008, our main goal is to offer original and innovative content throughout our hackathons, workshops, training and social media.', '2023-08-09 13:12:08', '2023-08-09 13:12:08', 'CSE CLUB WEBSITE', 1, 'https://buetcsefest2023.com/gamejam'),
(10, 2, 'pstu-automation.svg', 'CSE club is one of the largest scientific clubs in Algeria. Working since 2008, our main goal is to offer original and innovative content throughout our hackathons, workshops, training and social media.', '2023-08-09 13:12:35', '2023-08-09 13:12:35', 'PSTU Automation', 1, 'http://localhost/cseclub/');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `l1_s1` varchar(10) DEFAULT NULL,
  `l1_s2` varchar(10) DEFAULT NULL,
  `l2_s1` varchar(10) DEFAULT NULL,
  `l2_s2` varchar(10) DEFAULT NULL,
  `l3_s1` varchar(10) DEFAULT NULL,
  `l3_s2` varchar(10) DEFAULT NULL,
  `l4_s1` varchar(10) DEFAULT NULL,
  `l4_s2` varchar(10) DEFAULT NULL,
  `cgpa` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `session_id` int(10) UNSIGNED NOT NULL,
  `session` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`session_id`, `session`) VALUES
(3, '1998-1999'),
(4, '1999-2000'),
(5, '2000-2001'),
(6, '2001-2002');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `logo` varchar(191) DEFAULT NULL,
  `favicon` varchar(191) DEFAULT NULL,
  `title` varchar(191) DEFAULT NULL,
  `short_des` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `meta_author` varchar(191) DEFAULT NULL,
  `meta_keywords` varchar(191) DEFAULT NULL,
  `notice_status` tinyint(1) NOT NULL DEFAULT 1 COMMENT ' 1 = Notice Visible in Front Page | 0 = Invisible',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `video` varchar(255) DEFAULT NULL,
  `navLogo` varchar(255) DEFAULT NULL,
  `project_section_text` text DEFAULT NULL,
  `partners_section_text` text DEFAULT NULL,
  `nav_carnival_id` int(50) DEFAULT NULL COMMENT ' 1 = Notice Visible in Front Page | 0 = Invisible',
  `copyright` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `logo`, `favicon`, `title`, `short_des`, `description`, `meta_author`, `meta_keywords`, `notice_status`, `created_at`, `updated_at`, `video`, `navLogo`, `project_section_text`, `partners_section_text`, `nav_carnival_id`, `copyright`) VALUES
(1, 'logo.svg', 'favicon.svg', 'CSE CLUB PSTU', 'CSE club is one of the largest scientific clubs in Algeria. Working since 2008, our main goal is to offer original and innovative content throughout our hackathons, workshops, training and social media.', 'CSE Club PSTU is a dynamic student organization at the PAtuakhali Science & Technology University, dedicated to fostering a passion for computer science and technology among its members. Our club welcomes students who are enthusiastic about exploring the realms of computers, high tech, robotics, design, and everything related to cutting-edge technology.With our commitment to innovation and continuous learning, CSE Club PSTU has earned its reputation as a prominent force on both national and international stages. Through our remarkable efforts in organizing major tech events, including hosting the most prestigious hackathon in the region, we have solidified our position as one of the largest and most active clubs in the country.', 'Patuakhali Science And Technology University', 'PSTU, Patuakhali Science And Technology University, CSE PSTU, Agriculture PSTU', 1, '2023-08-09 17:55:06', '2023-08-09 17:55:06', 'video.mp4', 'navLogo.svg', 'At CSE, we never cease learning and working on projects, that help us unleash our creativity and gather all of our brilliant ideas to create great projects!At CSE, innovation knows no bounds, and we are excited to share our passion with you. Do you want to take a look at what we\'ve built? Well, click on this button!', 'We work with the world’s most progressive companies and visionaries with the same aspirations as us from different parts of the universe.', 2, '© 2023 CSE CLUB PSTU. All rights reserved.');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `slider_id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) NOT NULL,
  `des` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`slider_id`, `image`, `des`) VALUES
(11, 'one.jpg', 'one'),
(12, 'two.jpg', 'two'),
(13, 'three.jpg', 'three'),
(14, 'four.jpg', 'four'),
(15, 'five.jpg', 'five');

-- --------------------------------------------------------

--
-- Table structure for table `support_category_image`
--

CREATE TABLE `support_category_image` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(300) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `support_category_image`
--

INSERT INTO `support_category_image` (`id`, `title`, `image`, `status`) VALUES
(2, 'Goodies (stickers, t-shirts )', 'goodies-stickers-t-shirts-.png', 1),
(3, 'Gifts for the winners', 'gifts-for-the-winners.png', 0),
(4, 'Development material.', 'development-material-.png', 0),
(5, 'Organize Events.', 'organize-events-.png', 0),
(6, 'Fund an event.', 'fund-an-event-.png', 0),
(7, 'Sponsor our social media.', 'sponsor-our-social-media-.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `takes`
--

CREATE TABLE `takes` (
  `course_code` varchar(100) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fade_password` varchar(100) DEFAULT NULL COMMENT 'quick password, which automatically deleted after specific time period',
  `role` varchar(50) DEFAULT '1' COMMENT 'in club Which type of role play user',
  `status` tinyint(1) DEFAULT 0,
  `token` varchar(255) DEFAULT NULL,
  `is_verified` tinyint(1) DEFAULT 0,
  `two_factor` tinyint(1) DEFAULT 0,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_login` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `fade_password`, `role`, `status`, `token`, `is_verified`, `two_factor`, `registration_date`, `last_login`, `created_at`, `updated_at`) VALUES
(1, 'shishir.cse.pstu@gmail.com', '$2y$10$j1jtJziW16xBGbd.cYC7TeesswXtTOSGE6QxPOKeCSF1b4JGxUPo6', NULL, '2', 0, NULL, 1, 0, '2023-07-31 11:19:51', '2023-07-31 11:19:51', '2023-07-31 11:19:51', '2023-07-31 11:19:51'),
(2, 'shishir@gmail.com', '$2y$10$uz.f5ubgy2k8yLEdCdKbPecihtW1hP6CNnQkf8Uu.yy3iiuns660q', NULL, '1', 1, NULL, 1, 0, '2023-08-15 13:23:48', '2023-08-15 13:23:48', '2023-08-15 13:23:48', '2023-08-15 13:23:48');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int(100) NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `country_code` varchar(50) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `birth` varchar(100) DEFAULT NULL,
  `nid` varchar(100) DEFAULT NULL,
  `image` varchar(300) DEFAULT NULL,
  `college` varchar(255) DEFAULT NULL,
  `department` varchar(455) DEFAULT '',
  `sid` varchar(255) DEFAULT NULL,
  `blood` varchar(50) DEFAULT NULL,
  `facebook` varchar(100) DEFAULT NULL,
  `linkedin` varchar(100) DEFAULT NULL,
  `github` varchar(100) DEFAULT NULL,
  `bio` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `user_id`, `country_code`, `name`, `gender`, `birth`, `nid`, `image`, `college`, `department`, `sid`, `blood`, `facebook`, `linkedin`, `github`, `bio`) VALUES
(1, 1, NULL, 'yuiuiuiui', 'Male', 'uiuiui', 'uiuiui', 'uiuiui', NULL, '', NULL, 'uiuui', 'uiui', NULL, 'uiui', 'uuiui'),
(5, 2, 'BD', 'Shishir Bhuiyan', 'male', '2020-06-05', '8651311444', '2.jpg', '1780', 'CSIT', '1802043', 'B+', ' https://www.facebook.com/Engg.Shishir/', 'nkedin.com/in/engg-shishir/', 'https://github.com/Engg-Shishir ', 'I\'m Shishir and interested in doing positive things about every aspect of life. I love projects with challenges. I like working to make an impact in the real world. I always try to work for my world with my community. I learn to extend. Also, I specialize in Front-End and Back-End web Development. At the end of the day, I believe Code never lies');

-- --------------------------------------------------------

--
-- Structure for view `car`
--
DROP TABLE IF EXISTS `car`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `car`  AS SELECT `carnivals`.`carnival_id` AS `carnival_id`, `carnivals`.`title` AS `title` FROM `carnivals` ;

-- --------------------------------------------------------

--
-- Structure for view `carival`
--
DROP TABLE IF EXISTS `carival`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `carival`  AS SELECT `carnivals`.`carnival_id` AS `carnival_id`, `carnivals`.`title` AS `title` FROM `carnivals` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`abouts_id`);

--
-- Indexes for table `aluminis`
--
ALTER TABLE `aluminis`
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`blog_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `carnivals`
--
ALTER TABLE `carnivals`
  ADD PRIMARY KEY (`carnival_id`);

--
-- Indexes for table `citys`
--
ALTER TABLE `citys`
  ADD PRIMARY KEY (`postal_code`),
  ADD KEY `country_code` (`country_code`);

--
-- Indexes for table `collaborators`
--
ALTER TABLE `collaborators`
  ADD PRIMARY KEY (`colla_id`);

--
-- Indexes for table `colleges`
--
ALTER TABLE `colleges`
  ADD PRIMARY KEY (`college_code`),
  ADD KEY `country_code` (`country_code`);

--
-- Indexes for table `committees`
--
ALTER TABLE `committees`
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`complaint_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `countrys`
--
ALTER TABLE `countrys`
  ADD PRIMARY KEY (`country_code`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_code`);

--
-- Indexes for table `course_materials`
--
ALTER TABLE `course_materials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `course_code` (`course_code`);

--
-- Indexes for table `educations`
--
ALTER TABLE `educations`
  ADD PRIMARY KEY (`edu_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `college_code` (`college_code`),
  ADD KEY `fac_id` (`fac_id`),
  ADD KEY `session_id` (`session_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `event_reg`
--
ALTER TABLE `event_reg`
  ADD PRIMARY KEY (`reg_id`),
  ADD KEY `event_id` (`event_id`),
  ADD KEY `college_code` (`college_code`);

--
-- Indexes for table `event_sponsor`
--
ALTER TABLE `event_sponsor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carnival_id` (`carnival_id`),
  ADD KEY `colla_id` (`colla_id`);

--
-- Indexes for table `event_vol`
--
ALTER TABLE `event_vol`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `facultys`
--
ALTER TABLE `facultys`
  ADD PRIMARY KEY (`fac_id`),
  ADD UNIQUE KEY `fac_code` (`fac_code`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`faq_id`);

--
-- Indexes for table `gallerys`
--
ALTER TABLE `gallerys`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `instructors`
--
ALTER TABLE `instructors`
  ADD KEY `ins_id` (`ins_id`),
  ADD KEY `course_code` (`course_code`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`notice_id`);

--
-- Indexes for table `polls`
--
ALTER TABLE `polls`
  ADD PRIMARY KEY (`poll_id`);

--
-- Indexes for table `poll_votes`
--
ALTER TABLE `poll_votes`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `poll_id` (`poll_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`project_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `support_category_image`
--
ALTER TABLE `support_category_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `takes`
--
ALTER TABLE `takes`
  ADD PRIMARY KEY (`course_code`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `country_code` (`country_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `blog_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `carnivals`
--
ALTER TABLE `carnivals`
  MODIFY `carnival_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `citys`
--
ALTER TABLE `citys`
  MODIFY `postal_code` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1606;

--
-- AUTO_INCREMENT for table `collaborators`
--
ALTER TABLE `collaborators`
  MODIFY `colla_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `complaint_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_materials`
--
ALTER TABLE `course_materials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `educations`
--
ALTER TABLE `educations`
  MODIFY `edu_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `event_reg`
--
ALTER TABLE `event_reg`
  MODIFY `reg_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_sponsor`
--
ALTER TABLE `event_sponsor`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `facultys`
--
ALTER TABLE `facultys`
  MODIFY `fac_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `faq_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gallerys`
--
ALTER TABLE `gallerys`
  MODIFY `file_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `notice_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `polls`
--
ALTER TABLE `polls`
  MODIFY `poll_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `session_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `slider_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `support_category_image`
--
ALTER TABLE `support_category_image`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aluminis`
--
ALTER TABLE `aluminis`
  ADD CONSTRAINT `aluminis_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `blogs_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `blog_categories` (`category_id`) ON DELETE SET NULL;

--
-- Constraints for table `citys`
--
ALTER TABLE `citys`
  ADD CONSTRAINT `citys_ibfk_1` FOREIGN KEY (`country_code`) REFERENCES `countrys` (`country_code`) ON DELETE SET NULL;

--
-- Constraints for table `colleges`
--
ALTER TABLE `colleges`
  ADD CONSTRAINT `colleges_ibfk_1` FOREIGN KEY (`country_code`) REFERENCES `countrys` (`country_code`) ON DELETE SET NULL;

--
-- Constraints for table `committees`
--
ALTER TABLE `committees`
  ADD CONSTRAINT `committees_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `complaints`
--
ALTER TABLE `complaints`
  ADD CONSTRAINT `complaints_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `course_materials`
--
ALTER TABLE `course_materials`
  ADD CONSTRAINT `course_materials_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_materials_ibfk_2` FOREIGN KEY (`course_code`) REFERENCES `courses` (`course_code`) ON DELETE CASCADE;

--
-- Constraints for table `educations`
--
ALTER TABLE `educations`
  ADD CONSTRAINT `educations_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `educations_ibfk_2` FOREIGN KEY (`college_code`) REFERENCES `colleges` (`college_code`) ON DELETE SET NULL,
  ADD CONSTRAINT `educations_ibfk_3` FOREIGN KEY (`fac_id`) REFERENCES `facultys` (`fac_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `educations_ibfk_4` FOREIGN KEY (`session_id`) REFERENCES `sessions` (`session_id`) ON DELETE SET NULL;

--
-- Constraints for table `event_reg`
--
ALTER TABLE `event_reg`
  ADD CONSTRAINT `event_reg_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `event_reg_ibfk_2` FOREIGN KEY (`college_code`) REFERENCES `colleges` (`college_code`) ON DELETE SET NULL;

--
-- Constraints for table `event_sponsor`
--
ALTER TABLE `event_sponsor`
  ADD CONSTRAINT `event_sponsor_ibfk_1` FOREIGN KEY (`carnival_id`) REFERENCES `carnivals` (`carnival_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `event_sponsor_ibfk_2` FOREIGN KEY (`colla_id`) REFERENCES `collaborators` (`colla_id`) ON DELETE CASCADE;

--
-- Constraints for table `event_vol`
--
ALTER TABLE `event_vol`
  ADD CONSTRAINT `event_vol_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `event_vol_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`) ON DELETE CASCADE;

--
-- Constraints for table `instructors`
--
ALTER TABLE `instructors`
  ADD CONSTRAINT `instructors_ibfk_1` FOREIGN KEY (`ins_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `instructors_ibfk_2` FOREIGN KEY (`course_code`) REFERENCES `courses` (`course_code`) ON DELETE SET NULL;

--
-- Constraints for table `poll_votes`
--
ALTER TABLE `poll_votes`
  ADD CONSTRAINT `poll_votes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `poll_votes_ibfk_2` FOREIGN KEY (`poll_id`) REFERENCES `polls` (`poll_id`) ON DELETE CASCADE;

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `takes`
--
ALTER TABLE `takes`
  ADD CONSTRAINT `takes_ibfk_1` FOREIGN KEY (`course_code`) REFERENCES `courses` (`course_code`) ON DELETE CASCADE,
  ADD CONSTRAINT `takes_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `user_details`
--
ALTER TABLE `user_details`
  ADD CONSTRAINT `user_details_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_details_ibfk_2` FOREIGN KEY (`country_code`) REFERENCES `countrys` (`country_code`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
