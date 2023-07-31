CREATE TABLE `users` (
  `user_id` INTEGER UNSIGNED AUTO_INCREMENT NOT NULL,
  `username` VARCHAR(50) UNIQUE NOT NULL,
  `password` VARCHAR(100) NOT NULL,
  `fade_password` VARCHAR(100) DEFAULT NULL COMMENT 'quick password, which automatically deleted after specific time period',
  `role` VARCHAR(50) DEFAULT NULL COMMENT 'in club Which type of role play user',
  `status` boolean DEFAULT false,
  `token` VARCHAR(255) DEFAULT NULL,
  `is_verified` boolean DEFAULT false,
  `two_factor` boolean DEFAULT false,
  `registration_date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `last_login` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  primary key (user_id)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

DROP TABLE IF EXISTS countrys;

CREATE TABLE `countrys` (
  `country_code` VARCHAR(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY(country_code)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

DROP TABLE IF EXISTS user_details;

CREATE TABLE `user_details` (
  `user_id` INTEGER UNSIGNED,
  `country_code` VARCHAR(50),
  `name` VARCHAR(100) DEFAULT NULL,
  `gender` VARCHAR(50) DEFAULT NULL,
  `birth` VARCHAR(100) DEFAULT NULL,
  `nid` VARCHAR(100) DEFAULT NULL,
  `image` VARCHAR(300) DEFAULT NULL,
  `blood` VARCHAR(50) DEFAULT NULL,
  `facebook` VARCHAR(100) DEFAULT NULL,
  `linkedin` VARCHAR(100) DEFAULT NULL,
  `github` VARCHAR(100) DEFAULT NULL,
  `bio` TEXT DEFAULT NULL,
  FOREIGN KEY (`user_id`) REFERENCES `users`(`user_id`) ON DELETE CASCADE,
  FOREIGN KEY (`country_code`) REFERENCES `countrys`(`country_code`) ON DELETE
  SET
    NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

DROP TABLE IF EXISTS colleges;

CREATE TABLE `colleges` (
  `college_id` integer UNSIGNED AUTO_INCREMENT NOT NULL,
  `country_code` VARCHAR(50),
  `name` varchar(255) NOT NULL,
  primary key (college_id),
  FOREIGN KEY (`country_code`) REFERENCES `countrys`(`country_code`) ON DELETE
  SET
    NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

DROP TABLE IF EXISTS facultys;

CREATE TABLE `facultys` (
  `fac_id` integer UNSIGNED AUTO_INCREMENT NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY(fac_id)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

DROP TABLE IF EXISTS sessions;

CREATE TABLE `sessions` (
  `session_id` integer UNSIGNED AUTO_INCREMENT NOT NULL,
  `session` varchar(100) NOT NULL,
  PRIMARY KEY (session_id)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

DROP TABLE IF EXISTS educations;

CREATE TABLE `educations` (
  `edu_id` INTEGER UNSIGNED AUTO_INCREMENT NOT NULL,
  `college_id` INTEGER UNSIGNED COMMENT 'Foreign key',
  `fac_id` INTEGER UNSIGNED COMMENT 'Foreign key',
  `user_id` INTEGER UNSIGNED COMMENT 'Foreign key',
  `session_id` INTEGER UNSIGNED COMMENT 'Foreign key',
  `result` VARCHAR(100) DEFAULT NULL,
  `graduation_year` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`user_id`) REFERENCES `users`(`user_id`) ON DELETE CASCADE,
  FOREIGN KEY (`college_id`) REFERENCES `colleges`(`college_id`) ON DELETE
  SET
    NULL,
    FOREIGN KEY (`fac_id`) REFERENCES `facultys`(`fac_id`) ON DELETE
  SET
    NULL,
    FOREIGN KEY (`session_id`) REFERENCES `sessions`(`session_id`) ON DELETE
  SET
    NULL,
    PRIMARY KEY (`edu_id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

DROP TABLE IF EXISTS results;

CREATE TABLE `results` (
  `user_id` integer UNSIGNED,
  `l1_s1` varchar(10) DEFAULT NULL,
  `l1_s2` varchar(10) DEFAULT NULL,
  `l2_s1` varchar(10) DEFAULT NULL,
  `l2_s2` varchar(10) DEFAULT NULL,
  `l3_s1` varchar(10) DEFAULT NULL,
  `l3_s2` varchar(10) DEFAULT NULL,
  `l4_s1` varchar(10) DEFAULT NULL,
  `l4_s2` varchar(10) DEFAULT NULL,
  `cgpa` varchar(10) DEFAULT NULL,
  FOREIGN KEY (`user_id`) REFERENCES `users`(`user_id`) ON DELETE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

DROP TABLE IF EXISTS citys;

CREATE TABLE `citys` (
  `postal_code` integer UNSIGNED AUTO_INCREMENT NOT NULL,
  `country_code` VARCHAR(50),
  `name` varchar(255) NOT NULL,
  PRIMARY KEY(postal_code),
  FOREIGN KEY (`country_code`) REFERENCES `countrys`(`country_code`) ON DELETE
  SET
    NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

DROP TABLE IF EXISTS blog_categories;

CREATE TABLE `blog_categories` (
  `category_id` integer UNSIGNED AUTO_INCREMENT NOT NULL,
  `name` varchar(200) UNIQUE NOT NULL,
  `description` text,
  `creation_date` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY(category_id)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

DROP TABLE IF EXISTS blogs;

CREATE TABLE `blogs` (
  `blog_id` integer UNSIGNED AUTO_INCREMENT NOT NULL,
  `category_id` integer UNSIGNED,
  `user_id` integer UNSIGNED,
  `title` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `creation_date` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY(blog_id),
  FOREIGN KEY (`user_id`) REFERENCES `users`(`user_id`) ON DELETE CASCADE,
  FOREIGN KEY (`category_id`) REFERENCES `blog_categories`(`category_id`) ON DELETE
  SET
    NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

DROP TABLE IF EXISTS courses;

CREATE TABLE `courses` (
  `course_id` integer UNSIGNED AUTO_INCREMENT NOT NULL,
  `course_name` varchar(200) NOT NULL,
  `credit` varchar(30) NOT NULL,
  `course_des` text NOT NULL,
  PRIMARY KEY(course_id)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

DROP TABLE IF EXISTS instructors;

CREATE TABLE `instructors` (
  `ins_id` integer UNSIGNED,
  `course_id` integer UNSIGNED,
  FOREIGN KEY (`ins_id`) REFERENCES `users`(`user_id`) ON DELETE CASCADE,
  FOREIGN KEY (`course_id`) REFERENCES `courses`(`course_id`) ON DELETE
  SET
    NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

DROP TABLE IF EXISTS takes;

CREATE TABLE `takes` (
  `course_id` integer UNSIGNED,
  `user_id` integer UNSIGNED,
  PRIMARY KEY (course_id, user_id),
  FOREIGN KEY (course_id) REFERENCES courses (course_id) ON DELETE CASCADE,
  FOREIGN KEY (user_id) REFERENCES `users`(user_id) ON DELETE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

DROP TABLE IF EXISTS projects;

CREATE TABLE `projects` (
  `project_id` integer UNSIGNED AUTO_INCREMENT NOT NULL,
  `user_id` integer UNSIGNED,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `start_date` timestamp DEFAULT CURRENT_TIMESTAMP,
  `end_date` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY(project_id),
  FOREIGN KEY (`user_id`) REFERENCES `users`(`user_id`) ON DELETE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

DROP TABLE IF EXISTS collaborators;

CREATE TABLE `collaborators` (
  `colla_id` integer UNSIGNED AUTO_INCREMENT NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `start` timestamp DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(255) NOT NULL,
  `address` text NOT NULL,
  PRIMARY KEY(colla_id)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

DROP TABLE IF EXISTS events;

CREATE TABLE `events` (
  `event_id` integer UNSIGNED AUTO_INCREMENT NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `event_des` text NOT NULL,
  `event_date` date NOT NULL,
  `event_time` time NOT NULL,
  `event_loc` text NOT NULL,
  `event_image` varchar(255) NOT NULL,
  `participants` int DEFAULT NULL,
  PRIMARY KEY(event_id)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

DROP TABLE IF EXISTS event_vol;

CREATE TABLE `event_vol`(
  `user_id` int UNSIGNED,
  `event_id` int UNSIGNED,
  `role` varchar(50) NOT NULL,
  `res` varchar(200) NOT NULL,
  FOREIGN KEY (`user_id`) REFERENCES `users`(`user_id`) ON DELETE CASCADE,
  FOREIGN KEY (`event_id`) REFERENCES `events`(`event_id`) ON DELETE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

DROP TABLE IF EXISTS event_reg;

CREATE TABLE `event_reg` (
  `reg_id` integer UNSIGNED AUTO_INCREMENT NOT NULL,
  `event_id` int UNSIGNED,
  `college_id` int UNSIGNED,
  `student_id` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `team_name` varchar(50) NOT NULL,
  `password` varchar(150) DEFAULT NULL,
  PRIMARY KEY(reg_id),
  FOREIGN KEY (`event_id`) REFERENCES `events`(`event_id`) ON DELETE CASCADE,
  FOREIGN KEY (`college_id`) REFERENCES `colleges`(`college_id`) ON DELETE
  SET
    NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

DROP TABLE IF EXISTS faqs;

CREATE TABLE `faqs` (
  `faq_id` integer UNSIGNED AUTO_INCREMENT NOT NULL,
  `question` varchar(50) NOT NULL,
  `ans` varchar(50) NOT NULL,
  PRIMARY KEY(faq_id)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

DROP TABLE IF EXISTS messages;

CREATE TABLE `messages` (
  `mess_id` integer UNSIGNED AUTO_INCREMENT NOT NULL,
  `sender_email` varchar(200) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY(mess_id)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

DROP TABLE IF EXISTS aluminis;

CREATE TABLE `aluminis` (
  `user_id` int UNSIGNED,
  `job_title` varchar(200) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  FOREIGN KEY (`user_id`) REFERENCES `users`(`user_id`) ON DELETE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

DROP TABLE IF EXISTS gallerys;

CREATE TABLE `gallerys` (
  `file_id` integer UNSIGNED AUTO_INCREMENT NOT NULL,
  `title` VARCHAR(255) DEFAULT NULL,
  `description` TEXT DEFAULT NULL,
  `file_type` VARCHAR(50) NOT NULL,
  PRIMARY KEY(file_id)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

DROP TABLE IF EXISTS notices;

CREATE TABLE `notices` (
  `notice_id` integer UNSIGNED AUTO_INCREMENT NOT NULL,
  `title` varchar(200) NOT NULL,
  `des` varchar(200) DEFAULT "Soon description comming",
  `file_name` varchar(50) DEFAULT null,
  PRIMARY KEY(notice_id)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

DROP TABLE IF EXISTS committees;

CREATE TABLE `committees` (
  `user_id` int UNSIGNED,
  `role_title` varchar(200) NOT NULL,
  `role_des` varchar(200) NOT NULL,
  `duration` timestamp DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`user_id`) REFERENCES `users`(`user_id`) ON DELETE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

DROP TABLE IF EXISTS polls;

CREATE TABLE `polls` (
  `poll_id` integer UNSIGNED AUTO_INCREMENT NOT NULL,
  `question` varchar(100) NOT NULL,
  `option1` varchar(100) DEFAULT NULL,
  `option2` varchar(100) DEFAULT NULL,
  `option3` varchar(100) DEFAULT NULL,
  `option4` varchar(100) DEFAULT NULL,
  `option5` varchar(100) DEFAULT NULL,
  `option6` varchar(100) DEFAULT NULL,
  `option7` varchar(100) DEFAULT NULL,
  `option8` varchar(100) DEFAULT NULL,
  `begin_date` timestamp DEFAULT CURRENT_TIMESTAMP,
  `end_date` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY(poll_id)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

DROP TABLE IF EXISTS poll_votes;

CREATE TABLE `poll_votes` (
  `user_id` int UNSIGNED,
  `poll_id` int UNSIGNED,
  `option_chosen` varchar(255) NOT NULL,
  FOREIGN KEY (`user_id`) REFERENCES `users`(`user_id`) ON DELETE CASCADE,
  FOREIGN KEY (`poll_id`) REFERENCES `polls`(`poll_id`) ON DELETE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

DROP TABLE IF EXISTS complaints;

CREATE TABLE `complaints` (
  `complaint_id` integer UNSIGNED AUTO_INCREMENT NOT NULL,
  `user_id` int UNSIGNED,
  `subject` varchar(255) NOT NULL,
  `complaint_date` timestamp DEFAULT CURRENT_TIMESTAMP,
  `complaint_description` text DEFAULT NULL,
  PRIMARY KEY(complaint_id),
  FOREIGN KEY (`user_id`) REFERENCES `users`(`user_id`) ON DELETE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

-- Frontend
DROP TABLE IF EXISTS abouts;

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
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY(abouts_id)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

DROP TABLE IF EXISTS settings;

CREATE TABLE `settings` (
  `id` integer UNSIGNED NOT NULL,
  `logo` varchar(191) NOT NULL,
  `favicon` varchar(191) NOT NULL,
  `title` varchar(191) NOT NULL DEFAULT 'Patuakhali Science and Technology University',
  `short_name` varchar(191) NOT NULL DEFAULT 'PSTU',
  `description` text DEFAULT NULL,
  `meta_author` varchar(191) DEFAULT 'Patuakhali Science and Technology University',
  `meta_description` text DEFAULT NULL,
  `meta_keywords` varchar(191) DEFAULT 'Patuakhali Science and Technology University, PSTU',
  `notice_status` tinyint(1) NOT NULL DEFAULT 1 COMMENT ' 1 = Notice Visible in Front Page | 0 = Invisible',
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY(id)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

DROP TABLE IF EXISTS sliders;

CREATE TABLE `sliders` (
  `slider_id` integer UNSIGNED AUTO_INCREMENT NOT NULL,
  `priority` tinyint(3) UNSIGNED NOT NULL,
  `image` varchar(191) NOT NULL,
  `text` varchar(191) DEFAULT NULL,
  PRIMARY KEY(slider_id)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

DROP TABLE IF EXISTS course_materials;

CREATE TABLE `course_materials` (
  `id` integer UNSIGNED AUTO_INCREMENT NOT NULL,
  `user_id` int UNSIGNED,
  `course_id` int UNSIGNED,
  `title` varchar(191) NOT NULL,
  `file` varchar(191) NOT NULL,
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY(id),
  FOREIGN KEY (`user_id`) REFERENCES `users`(`user_id`) ON DELETE CASCADE,
  FOREIGN KEY (`course_id`) REFERENCES `courses`(`course_id`) ON DELETE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;