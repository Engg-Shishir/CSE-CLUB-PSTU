
CREATE TABLE abouts (
  abouts_id int(10) UNSIGNED NOT NULL,
  area varchar(191) NOT NULL,
  established varchar(191) NOT NULL,
  short_overview text NOT NULL,
  overview_image varchar(191) DEFAULT NULL,
  overview_description text NOT NULL,
  mission_image varchar(191) DEFAULT NULL,
  mission_description text DEFAULT NULL,
  vision_image varchar(191) DEFAULT NULL,
  vision_description text DEFAULT NULL,
  map_description varchar(191) DEFAULT NULL,
  google_map_latitude varchar(191) DEFAULT NULL,
  google_map_langitude varchar(191) DEFAULT NULL,
  phone varchar(191) NOT NULL,
  fax varchar(191) DEFAULT NULL,
  pabx varchar(191) DEFAULT NULL,
  email varchar(191) NOT NULL,
  created_at DATETIME DEFAULT current_timestamp(),
  updated_at DATETIME DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;







CREATE TABLE aluminis (
  user_id int(10) UNSIGNED DEFAULT NULL,
  job_title varchar(200) NOT NULL,
  description varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;







CREATE TABLE blogs (
  blog_id int(10) UNSIGNED NOT NULL,
  category_id int(10) UNSIGNED DEFAULT NULL,
  user_id int(10) UNSIGNED DEFAULT NULL,
  title varchar(255) NOT NULL,
  details text NOT NULL,
  creation_date DATETIME DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;







CREATE TABLE blog_categories (
  category_id int(10) UNSIGNED NOT NULL,
  name varchar(200) NOT NULL,
  description text DEFAULT NULL,
  creation_date DATETIME DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;







CREATE TABLE carnivals (
  carnival_id int(10) UNSIGNED NOT NULL,
  title varchar(300) DEFAULT NULL,
  slug varchar(255) DEFAULT NULL,
  banner varchar(255) DEFAULT NULL,
  start DATETIME DEFAULT current_timestamp(),
  end DATETIME DEFAULT current_timestamp(),
  status tinyint(2) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;










CREATE TABLE citys (
  postal_code int(10) UNSIGNED NOT NULL,
  country_code varchar(50) DEFAULT NULL,
  name varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;












CREATE TABLE collaborators (
  colla_id int(10) UNSIGNED NOT NULL,
  email varchar(255) NOT NULL,
  phone varchar(20) NOT NULL,
  name varchar(255) NOT NULL,
  description text DEFAULT NULL,
  start DATETIME DEFAULT current_timestamp(),
  image varchar(255) NOT NULL,
  address text NOT NULL,
  web varchar(500) DEFAULT NULL,
  status int(50) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;










CREATE TABLE colleges (
  college_code varchar(50) NOT NULL,
  website varchar(500) DEFAULT NULL,
  country_code varchar(50) DEFAULT NULL,
  name varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;











CREATE TABLE committees (
  user_id int(10) UNSIGNED DEFAULT NULL,
  role_title varchar(200) NOT NULL,
  role_des varchar(200) NOT NULL,
  duration DATETIME DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;







CREATE TABLE complaints (
  complaint_id int(10) UNSIGNED NOT NULL,
  user_id int(10) UNSIGNED DEFAULT NULL,
  subject varchar(255) NOT NULL,
  complaint_date DATETIME DEFAULT current_timestamp(),
  complaint_description text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;







CREATE TABLE countrys (
  country_code varchar(50) NOT NULL,
  name varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO countrys (country_code, name) VALUES
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

CREATE TABLE courses (
  course_code varchar(100) NOT NULL,
  course_name varchar(200) NOT NULL,
  credit varchar(100) NOT NULL,
  course_des text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;











CREATE TABLE course_materials (
  id int(10) UNSIGNED NOT NULL,
  user_id int(10) UNSIGNED DEFAULT NULL,
  course_code varchar(100) DEFAULT NULL,
  title varchar(191) NOT NULL,
  file varchar(191) NOT NULL,
  created_at DATETIME DEFAULT current_timestamp(),
  updated_at DATETIME DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;







CREATE TABLE educations (
  edu_id int(10) UNSIGNED NOT NULL,
  college_code varchar(50) DEFAULT NULL COMMENT 'Foreign key',
  fac_id int(10) UNSIGNED DEFAULT NULL COMMENT 'Foreign key',
  user_id int(10) UNSIGNED DEFAULT NULL COMMENT 'Foreign key',
  session_id int(10) UNSIGNED DEFAULT NULL COMMENT 'Foreign key',
  result varchar(100) DEFAULT NULL,
  graduation_year DATETIME DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;







CREATE TABLE events (
  event_id int(10) UNSIGNED NOT NULL,
  carnival_id int(10) DEFAULT NULL,
  event_name varchar(255) DEFAULT NULL,
  event_slug varchar(500) DEFAULT NULL,
  event_des text DEFAULT NULL,
  reg_date DATETIME DEFAULT current_timestamp(),
  event_date DATETIME DEFAULT current_timestamp(),
  event_time DATETIME DEFAULT current_timestamp(),
  event_loc text DEFAULT NULL,
  event_image varchar(255) DEFAULT NULL,
  participants int(11) DEFAULT 0,
  status tinyint(5) DEFAULT 1,
  event_schedule text DEFAULT NULL,
  event_roles text DEFAULT NULL,
  video varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;










CREATE TABLE event_reg (
  reg_id int(10) UNSIGNED NOT NULL,
  event_id int(10) UNSIGNED DEFAULT NULL,
  college_code varchar(50) DEFAULT NULL,
  student_id varchar(50) NOT NULL,
  name varchar(50) NOT NULL,
  email varchar(100) NOT NULL,
  team_name varchar(50) NOT NULL,
  password varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;







CREATE TABLE event_sponsor (
  id int(10) UNSIGNED NOT NULL,
  carnival_id int(10) UNSIGNED DEFAULT NULL,
  colla_id int(10) UNSIGNED DEFAULT NULL,
  function varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;











CREATE TABLE event_vol (
  user_id int(10) UNSIGNED DEFAULT NULL,
  event_id int(10) UNSIGNED DEFAULT NULL,
  role varchar(50) NOT NULL,
  res varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;







CREATE TABLE facultys (
  fac_id int(10) UNSIGNED NOT NULL,
  fac_code varchar(100) NOT NULL,
  name varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;











CREATE TABLE faqs (
  faq_id int(10) UNSIGNED NOT NULL,
  question varchar(50) NOT NULL,
  ans varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;











CREATE TABLE gallerys (
  file_id int(10) UNSIGNED NOT NULL,
  title varchar(255) DEFAULT NULL,
  description text DEFAULT NULL,
  file_type varchar(50) NOT NULL,
  source varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;








CREATE TABLE instructors (
  ins_id int(10) UNSIGNED DEFAULT NULL,
  course_code varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;







CREATE TABLE message (
  id int(10) UNSIGNED NOT NULL,
  fname varchar(300) DEFAULT NULL,
  lname varchar(300) DEFAULT NULL,
  email varchar(300) DEFAULT NULL,
  company varchar(300) DEFAULT NULL,
  subject varchar(300) DEFAULT NULL,
  des varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE notices (
  notice_id int(10) UNSIGNED NOT NULL,
  title varchar(200) NOT NULL,
  des varchar(200) DEFAULT 'Soon description comming',
  file_source varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;









CREATE TABLE polls (
  poll_id int(10) UNSIGNED NOT NULL,
  question varchar(100) NOT NULL,
  option1 varchar(100) DEFAULT NULL,
  option2 varchar(100) DEFAULT NULL,
  option3 varchar(100) DEFAULT NULL,
  option4 varchar(100) DEFAULT NULL,
  option5 varchar(100) DEFAULT NULL,
  option6 varchar(100) DEFAULT NULL,
  option7 varchar(100) DEFAULT NULL,
  option8 varchar(100) DEFAULT NULL,
  begin_date DATETIME DEFAULT current_timestamp(),
  end_date DATETIME DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;







CREATE TABLE poll_votes (
  user_id int(10) UNSIGNED DEFAULT NULL,
  poll_id int(10) UNSIGNED DEFAULT NULL,
  option_chosen varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;







CREATE TABLE projects (
  project_id int(10) UNSIGNED NOT NULL,
  user_id int(10) UNSIGNED DEFAULT NULL,
  logo varchar(255) NOT NULL,
  description text NOT NULL,
  start_date DATETIME DEFAULT current_timestamp(),
  end_date DATETIME DEFAULT current_timestamp(),
  title varchar(255) NOT NULL,
  status int(50) DEFAULT 1,
  sourcecode varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;








CREATE TABLE results (
  user_id int(10) UNSIGNED DEFAULT NULL,
  l1_s1 varchar(10) DEFAULT NULL,
  l1_s2 varchar(10) DEFAULT NULL,
  l2_s1 varchar(10) DEFAULT NULL,
  l2_s2 varchar(10) DEFAULT NULL,
  l3_s1 varchar(10) DEFAULT NULL,
  l3_s2 varchar(10) DEFAULT NULL,
  l4_s1 varchar(10) DEFAULT NULL,
  l4_s2 varchar(10) DEFAULT NULL,
  cgpa varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;







CREATE TABLE sessions (
  session_id int(10) UNSIGNED NOT NULL,
  session varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;










CREATE TABLE settings (
  id int(10) UNSIGNED DEFAULT 1,
  logo varchar(191) DEFAULT NULL,
  favicon varchar(191) DEFAULT NULL,
  title varchar(191) DEFAULT NULL,
  short_des text DEFAULT NULL,
  description text DEFAULT NULL,
  meta_author varchar(191) DEFAULT NULL,
  meta_keywords varchar(191) DEFAULT NULL,
  notice_status tinyint(1) DEFAULT 1 COMMENT ' 1 = Notice Visible in Front Page | 0 = Invisible',
  created_at DATETIME DEFAULT current_timestamp(),
  updated_at DATETIME DEFAULT current_timestamp(),
  video varchar(255) DEFAULT NULL,
  navLogo varchar(255) DEFAULT NULL,
  project_section_text text DEFAULT NULL,
  partners_section_text text DEFAULT NULL,
  nav_carnival_id int(50) DEFAULT NULL COMMENT ' 1 = Notice Visible in Front Page | 0 = Invisible',
  copyright varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;









CREATE TABLE sliders (
  slider_id int(10) UNSIGNED NOT NULL,
  image varchar(191) NOT NULL,
  des varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;









CREATE TABLE support_category_image (
  id int(10) UNSIGNED NOT NULL,
  title varchar(300) DEFAULT NULL,
  image varchar(255) NOT NULL,
  status tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;








CREATE TABLE takes (
  course_code varchar(100) NOT NULL,
  user_id int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE users (
  user_id int(10) UNSIGNED NOT NULL,
  username varchar(50) NOT NULL,
  password varchar(100) NOT NULL,
  fade_password varchar(100) DEFAULT NULL COMMENT 'quick password, which automatically deleted after specific time period',
  role varchar(50) DEFAULT 'user' COMMENT 'in club Which type of role play user',
  status tinyint(1) DEFAULT 0,
  token varchar(255) DEFAULT NULL,
  is_verified tinyint(1) DEFAULT 0,
  two_factor tinyint(1) DEFAULT 0,
  registration_date DATETIME DEFAULT current_timestamp(),
  last_login DATETIME DEFAULT current_timestamp(),
  created_at DATETIME DEFAULT current_timestamp(),
  updated_at DATETIME DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;








CREATE TABLE user_details (
  id int(100) NOT NULL,
  user_id int(10) UNSIGNED DEFAULT NULL,
  country_code varchar(50) DEFAULT NULL,
  name varchar(100) DEFAULT NULL,
  gender varchar(50) DEFAULT NULL,
  birth varchar(100) DEFAULT NULL,
  nid varchar(100) DEFAULT NULL,
  image varchar(300) DEFAULT NULL,
  college varchar(255) DEFAULT NULL,
  department varchar(455) DEFAULT '',
  sid varchar(255) DEFAULT NULL,
  blood varchar(50) DEFAULT NULL,
  facebook varchar(100) DEFAULT NULL,
  linkedin varchar(100) DEFAULT NULL,
  github varchar(100) DEFAULT NULL,
  bio text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;





CREATE TABLE printTable (
  pid varchar(100) NOT NULL,
  user_id int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;







ALTER TABLE abouts
  ADD PRIMARY KEY (abouts_id);




ALTER TABLE aluminis
  ADD KEY user_id (user_id);




ALTER TABLE blogs
  ADD PRIMARY KEY (blog_id),
  ADD KEY user_id (user_id),
  ADD KEY category_id (category_id);




ALTER TABLE blog_categories
  ADD PRIMARY KEY (category_id),
  ADD UNIQUE KEY name (name);




ALTER TABLE carnivals
  ADD PRIMARY KEY (carnival_id);




ALTER TABLE citys
  ADD PRIMARY KEY (postal_code),
  ADD KEY country_code (country_code);




ALTER TABLE collaborators
  ADD PRIMARY KEY (colla_id);




ALTER TABLE colleges
  ADD PRIMARY KEY (college_code),
  ADD KEY country_code (country_code);




ALTER TABLE committees
  ADD KEY user_id (user_id);




ALTER TABLE complaints
  ADD PRIMARY KEY (complaint_id),
  ADD KEY user_id (user_id);




ALTER TABLE countrys
  ADD PRIMARY KEY (country_code);




ALTER TABLE courses
  ADD PRIMARY KEY (course_code);




ALTER TABLE course_materials
  ADD PRIMARY KEY (id),
  ADD KEY user_id (user_id),
  ADD KEY course_code (course_code);




ALTER TABLE educations
  ADD PRIMARY KEY (edu_id),
  ADD KEY user_id (user_id),
  ADD KEY college_code (college_code),
  ADD KEY fac_id (fac_id),
  ADD KEY session_id (session_id);




ALTER TABLE events
  ADD PRIMARY KEY (event_id);




ALTER TABLE event_reg
  ADD PRIMARY KEY (reg_id),
  ADD KEY event_id (event_id),
  ADD KEY college_code (college_code);




ALTER TABLE event_sponsor
  ADD PRIMARY KEY (id),
  ADD KEY carnival_id (carnival_id),
  ADD KEY colla_id (colla_id);




ALTER TABLE event_vol
  ADD KEY user_id (user_id),
  ADD KEY event_id (event_id);




ALTER TABLE facultys
  ADD PRIMARY KEY (fac_id),
  ADD UNIQUE KEY fac_code (fac_code);




ALTER TABLE faqs
  ADD PRIMARY KEY (faq_id);




ALTER TABLE gallerys
  ADD PRIMARY KEY (file_id);




ALTER TABLE instructors
  ADD KEY ins_id (ins_id),
  ADD KEY course_code (course_code);




ALTER TABLE message
  ADD PRIMARY KEY (id);




ALTER TABLE notices
  ADD PRIMARY KEY (notice_id);




ALTER TABLE polls
  ADD PRIMARY KEY (poll_id);




ALTER TABLE poll_votes
  ADD KEY user_id (user_id),
  ADD KEY poll_id (poll_id);




ALTER TABLE projects
  ADD PRIMARY KEY (project_id),
  ADD KEY user_id (user_id);




ALTER TABLE results
  ADD KEY user_id (user_id);




ALTER TABLE sessions
  ADD PRIMARY KEY (session_id);




ALTER TABLE settings
  ADD PRIMARY KEY (id);




ALTER TABLE sliders
  ADD PRIMARY KEY (slider_id);




ALTER TABLE support_category_image
  ADD PRIMARY KEY (id);




ALTER TABLE takes
  ADD PRIMARY KEY (course_code,user_id),
  ADD KEY user_id (user_id);




ALTER TABLE users
  ADD PRIMARY KEY (user_id),
  ADD UNIQUE KEY username (username);


ALTER TABLE user_details
  ADD PRIMARY KEY (id),
  ADD KEY user_id (user_id),
  ADD KEY country_code (country_code);








ALTER TABLE blogs
  MODIFY blog_id int(10) UNSIGNED NOT NULL AUTO_INCREMENT;




ALTER TABLE blog_categories
  MODIFY category_id int(10) UNSIGNED NOT NULL AUTO_INCREMENT;




ALTER TABLE carnivals
  MODIFY carnival_id int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;




ALTER TABLE citys
  MODIFY postal_code int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16051;




ALTER TABLE collaborators
  MODIFY colla_id int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;




ALTER TABLE complaints
  MODIFY complaint_id int(10) UNSIGNED NOT NULL AUTO_INCREMENT;




ALTER TABLE course_materials
  MODIFY id int(10) UNSIGNED NOT NULL AUTO_INCREMENT;




ALTER TABLE educations
  MODIFY edu_id int(10) UNSIGNED NOT NULL AUTO_INCREMENT;




ALTER TABLE events
  MODIFY event_id int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;




ALTER TABLE event_reg
  MODIFY reg_id int(10) UNSIGNED NOT NULL AUTO_INCREMENT;




ALTER TABLE event_sponsor
  MODIFY id int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;




ALTER TABLE facultys
  MODIFY fac_id int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;




ALTER TABLE faqs
  MODIFY faq_id int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;




ALTER TABLE gallerys
  MODIFY file_id int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;




ALTER TABLE message
  MODIFY id int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;




ALTER TABLE notices
  MODIFY notice_id int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;




ALTER TABLE polls
  MODIFY poll_id int(10) UNSIGNED NOT NULL AUTO_INCREMENT;




ALTER TABLE projects
  MODIFY project_id int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;




ALTER TABLE sessions
  MODIFY session_id int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;




ALTER TABLE sliders
  MODIFY slider_id int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;




ALTER TABLE support_category_image
  MODIFY id int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;




ALTER TABLE users
  MODIFY user_id int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;




ALTER TABLE user_details
  MODIFY id int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;








ALTER TABLE aluminis
  ADD CONSTRAINT aluminis_ibfk_1 FOREIGN KEY (user_id) REFERENCES users (user_id) ON DELETE CASCADE;




ALTER TABLE blogs
  ADD CONSTRAINT blogs_ibfk_1 FOREIGN KEY (user_id) REFERENCES users (user_id) ON DELETE CASCADE,
  ADD CONSTRAINT blogs_ibfk_2 FOREIGN KEY (category_id) REFERENCES blog_categories (category_id) ON DELETE SET NULL;




ALTER TABLE citys
  ADD CONSTRAINT citys_ibfk_1 FOREIGN KEY (country_code) REFERENCES countrys (country_code) ON DELETE SET NULL;




ALTER TABLE colleges
  ADD CONSTRAINT colleges_ibfk_1 FOREIGN KEY (country_code) REFERENCES countrys (country_code) ON DELETE SET NULL;




ALTER TABLE committees
  ADD CONSTRAINT committees_ibfk_1 FOREIGN KEY (user_id) REFERENCES users (user_id) ON DELETE CASCADE;




ALTER TABLE complaints
  ADD CONSTRAINT complaints_ibfk_1 FOREIGN KEY (user_id) REFERENCES users (user_id) ON DELETE CASCADE;




ALTER TABLE course_materials
  ADD CONSTRAINT course_materials_ibfk_1 FOREIGN KEY (user_id) REFERENCES users (user_id) ON DELETE CASCADE,
  ADD CONSTRAINT course_materials_ibfk_2 FOREIGN KEY (course_code) REFERENCES courses (course_code) ON DELETE CASCADE;




ALTER TABLE educations
  ADD CONSTRAINT educations_ibfk_1 FOREIGN KEY (user_id) REFERENCES users (user_id) ON DELETE CASCADE,
  ADD CONSTRAINT educations_ibfk_2 FOREIGN KEY (college_code) REFERENCES colleges (college_code) ON DELETE SET NULL,
  ADD CONSTRAINT educations_ibfk_3 FOREIGN KEY (fac_id) REFERENCES facultys (fac_id) ON DELETE SET NULL,
  ADD CONSTRAINT educations_ibfk_4 FOREIGN KEY (session_id) REFERENCES sessions (session_id) ON DELETE SET NULL;


ALTER TABLE event_reg
  ADD CONSTRAINT event_reg_ibfk_1 FOREIGN KEY (event_id) REFERENCES events (event_id) ON DELETE CASCADE,
  ADD CONSTRAINT event_reg_ibfk_2 FOREIGN KEY (college_code) REFERENCES colleges (college_code) ON DELETE SET NULL;




ALTER TABLE event_sponsor
  ADD CONSTRAINT event_sponsor_ibfk_1 FOREIGN KEY (carnival_id) REFERENCES carnivals (carnival_id) ON DELETE CASCADE,
  ADD CONSTRAINT event_sponsor_ibfk_2 FOREIGN KEY (colla_id) REFERENCES collaborators (colla_id) ON DELETE CASCADE;




ALTER TABLE event_vol
  ADD CONSTRAINT event_vol_ibfk_1 FOREIGN KEY (user_id) REFERENCES users (user_id) ON DELETE CASCADE,
  ADD CONSTRAINT event_vol_ibfk_2 FOREIGN KEY (event_id) REFERENCES events (event_id) ON DELETE CASCADE;




ALTER TABLE instructors
  ADD CONSTRAINT instructors_ibfk_1 FOREIGN KEY (ins_id) REFERENCES users (user_id) ON DELETE CASCADE,
  ADD CONSTRAINT instructors_ibfk_2 FOREIGN KEY (course_code) REFERENCES courses (course_code) ON DELETE SET NULL;




ALTER TABLE poll_votes
  ADD CONSTRAINT poll_votes_ibfk_1 FOREIGN KEY (user_id) REFERENCES users (user_id) ON DELETE CASCADE,
  ADD CONSTRAINT poll_votes_ibfk_2 FOREIGN KEY (poll_id) REFERENCES polls (poll_id) ON DELETE CASCADE;




ALTER TABLE projects
  ADD CONSTRAINT projects_ibfk_1 FOREIGN KEY (user_id) REFERENCES users (user_id) ON DELETE CASCADE;




ALTER TABLE results
  ADD CONSTRAINT results_ibfk_1 FOREIGN KEY (user_id) REFERENCES users (user_id) ON DELETE CASCADE;




ALTER TABLE takes
  ADD CONSTRAINT takes_ibfk_1 FOREIGN KEY (course_code) REFERENCES courses (course_code) ON DELETE CASCADE,
  ADD CONSTRAINT takes_ibfk_2 FOREIGN KEY (user_id) REFERENCES users (user_id) ON DELETE CASCADE;




ALTER TABLE user_details
  ADD CONSTRAINT user_details_ibfk_1 FOREIGN KEY (user_id) REFERENCES users (user_id) ON DELETE CASCADE,
  ADD CONSTRAINT user_details_ibfk_2 FOREIGN KEY (country_code) REFERENCES countrys (country_code) ON DELETE SET NULL;



ALTER TABLE printTable
  ADD PRIMARY KEY (pid),
  ADD CONSTRAINT user_details_ibfk_1 FOREIGN KEY (user_id) REFERENCES users (user_id) ON DELETE CASCADE