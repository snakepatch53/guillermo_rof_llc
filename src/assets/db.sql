DROP TABLE IF EXISTS info;

DROP TABLE IF EXISTS themes;

CREATE TABLE themes (
    theme_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    theme_name VARCHAR(50),
    -- light
    theme_color_danger TEXT,
    theme_color_info TEXT,
    theme_color_warn TEXT,
    theme_color_success TEXT,
    theme_color1 TEXT,
    theme_color1_translucent TEXT,
    theme_color1_text TEXT,
    theme_color1_text2 TEXT,
    theme_color1_logo_s1 TEXT,
    theme_color1_logo_s2 TEXT,
    theme_color1_logo_s3 TEXT,
    theme_color1_logo_text TEXT,
    theme_color1_btn TEXT,
    theme_color1_btn_text TEXT,
    theme_color2 TEXT,
    theme_color2_text TEXT,
    theme_color2_text2 TEXT,
    theme_color4 TEXT,
    theme_color4_text TEXT,
    theme_color4_text2 TEXT,
    theme_color4_text3 TEXT,
    theme_color4_logo_s1 TEXT,
    theme_color4_logo_s2 TEXT,
    theme_color4_logo_s3 TEXT,
    theme_color4_logo_text TEXT,
    theme_color5 TEXT,
    theme_color5_text TEXT,
    theme_color5_text2 TEXT,
    theme_color5_logo_s1 TEXT,
    theme_color5_logo_s2 TEXT,
    theme_color5_logo_s3 TEXT,
    theme_color5_logo_text TEXT,
    theme_color5_btn TEXT,
    theme_color5_btn_text TEXT,
    theme_color6 TEXT,
    theme_color6_text TEXT,
    theme_color6_text2 TEXT,
    -- dark
    theme_dark_color_danger TEXT,
    theme_dark_color_info TEXT,
    theme_dark_color_warn TEXT,
    theme_dark_color_success TEXT,
    theme_dark_color1 TEXT,
    theme_dark_color1_translucent TEXT,
    theme_dark_color1_text TEXT,
    theme_dark_color1_text2 TEXT,
    theme_dark_color1_logo_s1 TEXT,
    theme_dark_color1_logo_s2 TEXT,
    theme_dark_color1_logo_s3 TEXT,
    theme_dark_color1_logo_text TEXT,
    theme_dark_color1_btn TEXT,
    theme_dark_color1_btn_text TEXT,
    theme_dark_color2 TEXT,
    theme_dark_color2_text TEXT,
    theme_dark_color2_text2 TEXT,
    theme_dark_color4 TEXT,
    theme_dark_color4_text TEXT,
    theme_dark_color4_text2 TEXT,
    theme_dark_color4_text3 TEXT,
    theme_dark_color4_logo_s1 TEXT,
    theme_dark_color4_logo_s2 TEXT,
    theme_dark_color4_logo_s3 TEXT,
    theme_dark_color4_logo_text TEXT,
    theme_dark_color5 TEXT,
    theme_dark_color5_text TEXT,
    theme_dark_color5_text2 TEXT,
    theme_dark_color5_logo_s1 TEXT,
    theme_dark_color5_logo_s2 TEXT,
    theme_dark_color5_logo_s3 TEXT,
    theme_dark_color5_logo_text TEXT,
    theme_dark_color5_btn TEXT,
    theme_dark_color5_btn_text TEXT,
    theme_dark_color6 TEXT,
    theme_dark_color6_text TEXT,
    theme_dark_color6_text2 TEXT,
    theme_last VARCHAR(50),
    theme_created VARCHAR(50)
) ENGINE INNODB;

INSERT INTO
    themes
SET
    theme_id = 1,
    theme_name = 'Default',
    -- light
    theme_color_danger = '#c71c22',
    theme_color_info = '#2fa4e7',
    theme_color_warn = '#eab518',
    theme_color_success = '#73a839',
    theme_color1 = '#4594EB',
    theme_color1_translucent = 'rgba(69, 148, 235, 0.79)',
    theme_color1_text = '#ffffff',
    theme_color1_text2 = '#af1940',
    theme_color1_logo_s1 = '#ad002d',
    theme_color1_logo_s2 = '#000000',
    theme_color1_logo_s3 = '#ffffff',
    theme_color1_logo_text = '#ffffff',
    theme_color1_btn = '#ad002d',
    theme_color1_btn_text = '#ffffff',
    theme_color2 = '#EB665B',
    theme_color2_text = '#ffffff',
    theme_color2_text2 = '#000000',
    theme_color4 = '#ffffff',
    theme_color4_text = '#000000',
    theme_color4_text2 = '#363636',
    theme_color4_text3 = '#4594EB',
    theme_color4_logo_s1 = '#4594EB',
    theme_color4_logo_s2 = '#ad002d',
    theme_color4_logo_s3 = '#ffffff',
    theme_color4_logo_text = '#4594EB',
    theme_color5 = '#1b2831',
    theme_color5_text = '#ffffff',
    theme_color5_text2 = '#a7a7a7',
    theme_color5_logo_s1 = '#ffffff',
    theme_color5_logo_s2 = '#ff4838',
    theme_color5_logo_s3 = '#ffffff',
    theme_color5_logo_text = '#ffffff',
    theme_color5_btn = '#ad002d',
    theme_color5_btn_text = '#000000',
    theme_color6 = 'linear-gradient(rgba(69, 148, 235, 0.67), rgba(235, 102, 91, 0.33))',
    theme_color6_text = '#000000',
    theme_color6_text2 = '#ffffff',
    -- dark
    theme_dark_color_danger = '#c71c22',
    theme_dark_color_info = '#2fa4e7',
    theme_dark_color_warn = '#eab518',
    theme_dark_color_success = '#73a839',
    theme_dark_color1 = '#2c5f97',
    theme_dark_color1_translucent = 'rgba(44, 95, 151, 0.79)',
    theme_dark_color1_text = '#ffffff',
    theme_dark_color1_text2 = '#af1940',
    theme_dark_color1_logo_s1 = '#ad002d',
    theme_dark_color1_logo_s2 = '#ffffff',
    theme_dark_color1_logo_s3 = '#ffffff',
    theme_dark_color1_logo_text = '#ffffff',
    theme_dark_color1_btn = '#ad002d',
    theme_dark_color1_btn_text = '#ffffff',
    theme_dark_color2 = '#EB665B',
    theme_dark_color2_text = '#ffffff',
    theme_dark_color2_text2 = '#000000',
    theme_dark_color4 = '#1b2831',
    theme_dark_color4_text = '#ffffff',
    theme_dark_color4_text2 = '#d1d1d1',
    theme_dark_color4_text3 = '#4594EB',
    theme_dark_color4_logo_s1 = '#4594EB',
    theme_dark_color4_logo_s2 = '#ad002d',
    theme_dark_color4_logo_s3 = '#ffffff',
    theme_dark_color4_logo_text = '#4594EB',
    theme_dark_color5 = '#192229',
    theme_dark_color5_text = '#ffffff',
    theme_dark_color5_text2 = '#a7a7a7',
    theme_dark_color5_logo_s1 = '#ffffff',
    theme_dark_color5_logo_s2 = '#ff4838',
    theme_dark_color5_logo_s3 = '#ffffff',
    theme_dark_color5_logo_text = '#ffffff',
    theme_dark_color5_btn = '#ad002d',
    theme_dark_color5_btn_text = '#000000',
    theme_dark_color6 = 'linear-gradient(rgba(42, 99, 160, 0.67), rgba(121, 52, 47, 0.33))',
    theme_dark_color6_text = '#000000',
    theme_dark_color6_text2 = '#ffffff',
    theme_last = '2023-01-01 00:00:00',
    theme_created = '2023-01-01 00:00:00';

DROP TABLE IF EXISTS user;

CREATE TABLE info (
    info_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    info_name VARCHAR(50),
    info_country VARCHAR(50),
    info_state VARCHAR(50),
    info_city VARCHAR(50),
    info_whatsapp VARCHAR(20),
    info_location TEXT,
    info_desc TEXT,
    info_mision TEXT,
    info_vision TEXT,
    info_logo VARCHAR(50) DEFAULT '',
    info_icon VARCHAR(50) DEFAULT '',
    -- information of sdk facebook api
    info_fb_app_id TEXT DEFAULT '',
    info_fb_app_secret TEXT DEFAULT '',
    info_fb_page_id TEXT DEFAULT '',
    info_fb_access_token TEXT DEFAULT '',
    -- page home
    info_home_title VARCHAR(100),
    info_home_subtitle VARCHAR(100),
    -- page services
    info_services_title VARCHAR(100),
    info_services_subtitle VARCHAR(100),
    info_services_image VARCHAR(50) DEFAULT '',
    -- page portfolio
    info_portfolio_title VARCHAR(100),
    info_portfolio_subtitle VARCHAR(100),
    info_portfolio_image VARCHAR(50) DEFAULT '',
    -- page about
    info_about_title VARCHAR(100),
    info_about_subtitle VARCHAR(100),
    info_about_image VARCHAR(50) DEFAULT '',
    -- others
    theme_id INT,
    info_last VARCHAR(50),
    info_created VARCHAR(50),
    FOREIGN KEY (theme_id) REFERENCES themes(theme_id)
) ENGINE INNODB;

INSERT INTO
    info
SET
    info_id = 1,
    info_name = 'Guillermo Roof LLC',
    info_country = 'United States',
    info_state = 'Connecticut',
    info_city = 'Bridgeport',
    info_whatsapp = '+20 3 5481772',
    info_location = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d28580.4656281124!2d-73.23276733454493!3d41.15304787908842!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89e80e259e21e975%3A0x3111a70aa674cc0b!2sBridgeport%2C%20Connecticut%2006605%2C%20EE.%20UU.!5e0!3m2!1ses!2sec!4v1685723115007!5m2!1ses!2sec" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
    info_desc = 'Guillermo Roof LLC: Trusted Roofing Experts. We provide reliable and customized solutions for roof construction, remodeling, and repair. Safeguard your home or business with our exceptional services!',
    info_mision = "Our mission is to deliver exceptional roofing solutions that provide our customers with long-lasting protection, outstanding craftsmanship, and unmatched customer service. We strive to exceed expectations, enhance the value of properties, and create safe and comfortable environments for our clients.",
    info_vision = "Our vision is to be the leading roofing construction company in the industry, recognized for our unwavering commitment to quality, innovation, and customer satisfaction. We aim to continuously improve our processes, expand our expertise, and embrace sustainable practices to meet the evolving needs of our clients and contribute to the communities we serve.",
    info_home_title = 'Building Quality Roofs for Your Home or Business',
    info_home_subtitle = 'Experts in Roof Construction and Remodeling for a Safe and Aesthetic Environment',
    info_services_title = 'Our Expert Roofing Services',
    info_services_subtitle = 'Comprehensive Solutions for Your Roofing Needs',
    info_portfolio_title = 'Our Impressive Roofing Projects',
    info_portfolio_subtitle = 'Discover Our Exceptional Roofing Works',
    info_about_title = 'About Guillermo Roof LLC',
    info_about_subtitle = 'Passionate Roofing Experts Dedicated to Excellence',
    theme_id = 1,
    info_last = '2023-01-01 00:00:00',
    info_created = '2023-01-01 00:00:00';

CREATE TABLE user (
    user_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    user_name VARCHAR(50),
    user_user VARCHAR(50),
    user_pass TEXT,
    user_photo VARCHAR(50) DEFAULT 'default.png',
    user_last VARCHAR(50),
    user_created VARCHAR(50)
) ENGINE INNODB;

INSERT INTO
    user (
        user_id,
        user_name,
        user_user,
        user_pass,
        user_last,
        user_created
    )
VALUES
    (
        1,
        'Administrator',
        'admin',
        'admin',
        '2023-01-01 00:00:00',
        '2023-01-01 00:00:00'
    ),
    (
        2,
        'Root',
        'erazobrothers',
        'ZXa1A%1IC$KtMlb6',
        '2023-01-01 00:00:00',
        '2023-01-01 00:00:00'
    );

DROP TABLE IF EXISTS team;

CREATE TABLE team (
    team_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    team_name VARCHAR(50),
    team_position VARCHAR(50),
    team_photo VARCHAR(50) DEFAULT 'default.png',
    team_link TEXT,
    team_last VARCHAR(50),
    team_created VARCHAR(50)
) ENGINE INNODB;

INSERT INTO
    team
VALUES
    (
        1,
        'John Doe',
        'CEO',
        '1.png',
        'https://www.facebook.com/erazobrothers',
        '2023-01-01 00:00:00',
        '2023-01-01 00:00:00'
    ),
    (
        2,
        'Bryan Sans',
        'Manager',
        '2.png',
        'https://www.facebook.com/erazobrothers',
        '2023-01-01 00:00:00',
        '2023-01-01 00:00:00'
    ),
    (
        3,
        'Eliot Smith',
        'Adviser',
        '3.png',
        'https://www.facebook.com/erazobrothers',
        '2023-01-01 00:00:00',
        '2023-01-01 00:00:00'
    ),
    (
        4,
        'Michael Thompson',
        'Agent',
        '4.png',
        'https://www.facebook.com/erazobrothers',
        '2023-01-01 00:00:00',
        '2023-01-01 00:00:00'
    );

DROP TABLE IF EXISTS slider;

CREATE TABLE slider (
    slider_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    slider_img VARCHAR(150),
    slider_title VARCHAR(50),
    slider_desc TEXT,
    slider_last VARCHAR(50),
    slider_created VARCHAR(50)
) ENGINE INNODB;

INSERT INTO
    slider
VALUES
    (
        1,
        '1.png',
        '',
        '',
        '2023-01-01 00:00:00',
        '2023-01-01 00:00:00'
    ),
    (
        2,
        '2.png',
        '',
        '',
        '2023-01-01 00:00:00',
        '2023-01-01 00:00:00'
    ),
    (
        3,
        '3.png',
        '',
        '',
        '2023-01-01 00:00:00',
        '2023-01-01 00:00:00'
    );

DROP TABLE IF EXISTS contacts;

CREATE TABLE contacts (
    contact_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    contact_name VARCHAR(50),
    contact_value VARCHAR(50),
    contact_link TEXT,
    contact_icon VARCHAR(50),
    contact_color VARCHAR(50),
    contact_type ENUM('contact', 'social') DEFAULT 'contact',
    contact_last VARCHAR(50),
    contact_created VARCHAR(50)
) ENGINE INNODB;

INSERT INTO
    contacts
VALUES
    (
        1,
        'Phone',
        '+20 3 5481772',
        'tel:+20 3 5481772',
        'fas fa-phone-alt',
        '#0d6efd',
        'contact',
        '2023-01-01 00:00:00',
        '2023-01-01 00:00:00'
    ),
    (
        2,
        'Email',
        'guillermostalin@hotmail.com',
        'mailto:guillermostalin@hotmail.com',
        'fas fa-envelope',
        '#0d6efd',
        'contact',
        '2023-01-01 00:00:00',
        '2023-01-01 00:00:00'
    ),
    (
        3,
        'Address',
        'Bridgeport, CT, United States, 06605',
        'https://goo.gl/maps/Xn79SBuSnvbLhSPs5',
        'fas fa-map-marker-alt',
        '#0d6efd',
        'contact',
        '2023-01-01 00:00:00',
        '2023-01-01 00:00:00'
    ),
    (
        4,
        'Facebook',
        '@guillermoroofct',
        'https://www.facebook.com/guillermoroofct',
        'fab fa-facebook',
        '#0d6efd',
        'social',
        '2023-01-01 00:00:00',
        '2023-01-01 00:00:00'
    ),
    (
        5,
        'Instagram',
        '@guillermoroofct',
        'https://www.instagram.com/guillermoroofct',
        'fab fa-instagram',
        '#833ab4',
        'social',
        '2023-01-01 00:00:00',
        '2023-01-01 00:00:00'
    ),
    (
        6,
        'Twitter',
        '@guillermoroofct',
        'https://www.twitter.com/guillermoroofct',
        'fab fa-twitter',
        '#00acee',
        'social',
        '2023-01-01 00:00:00',
        '2023-01-01 00:00:00'
    );

DROP TABLE IF EXISTS qualities;

CREATE TABLE qualities (
    quality_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    quality_title VARCHAR(50),
    quality_desc TEXT,
    quality_img VARCHAR(50),
    quality_last VARCHAR(50),
    quality_created VARCHAR(50)
) ENGINE INNODB;

INSERT INTO
    qualities
VALUES
    (
        1,
        'Innovation',
        'Pioneering cutting-edge solutions with a spirit of innovation',
        '1.jpg',
        '2023-01-01 00:00:00',
        '2023-01-01 00:00:00'
    ),
    (
        2,
        'Commitment',
        "Delivering exceptional results with unwavering commitment",
        '2.jpg',
        '2023-01-01 00:00:00',
        '2023-01-01 00:00:00'
    ),
    (
        3,
        'Elegance',
        'Creating captivating spaces with timeless elegance',
        '3.jpg',
        '2023-01-01 00:00:00',
        '2023-01-01 00:00:00'
    );

DROP TABLE IF EXISTS goals;

CREATE TABLE goals (
    goal_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    goal_name VARCHAR(50),
    goal_icon VARCHAR(50),
    goal_last VARCHAR(50),
    goal_created VARCHAR(50)
) ENGINE INNODB;

INSERT INTO
    goals
VALUES
    (
        1,
        'Advise',
        'fa fa-hand-holding-heart',
        '2023-01-01 00:00:00',
        '2023-01-01 00:00:00'
    ),
    (
        2,
        'Escort',
        'fa fa-handshake',
        '2023-01-01 00:00:00',
        '2023-01-01 00:00:00'
    ),
    (
        3,
        'Innvate',
        'fa fa-lightbulb',
        '2023-01-01 00:00:00',
        '2023-01-01 00:00:00'
    );

DROP TABLE IF EXISTS services;

CREATE TABLE services (
    service_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    service_title VARCHAR(50),
    service_desc TEXT,
    service_img VARCHAR(50),
    service_wtsp_msg TEXT,
    service_last VARCHAR(50),
    service_created VARCHAR(50)
) ENGINE INNODB;

INSERT INTO
    services
VALUES
    (
        1,
        'Patios',
        'We remodel and fix your outdoor spaces to give you a different and lively style.',
        '1.jpg',
        'Hello, I would like to know more about the patio construction service.',
        '2023-01-01 00:00:00',
        '2023-01-01 00:00:00'
    ),
    (
        2,
        'Retaining Walls',
        'A retaining wall is important and needs to be very well built, we guarantee it.',
        '2.jpg',
        'Hello, I would like to know more about the retaining wall construction service.',
        '2023-01-01 00:00:00',
        '2023-01-01 00:00:00'
    ),
    (
        3,
        'Sidewalks',
        'Give your home a better presentation by building beautiful and elegant sidewalks.',
        '3.jpg',
        'Hello, I would like to know more about the sidewalk construction service.',
        '2023-01-01 00:00:00',
        '2023-01-01 00:00:00'
    ),
    (
        4,
        'Lawn Care',
        'Your lawn also deserves to have a good presentation, keep it trimmed and well cared for.',
        '4.jpg',
        'Hello, I would like to know more about the lawn care service.',
        '2023-01-01 00:00:00',
        '2023-01-01 00:00:00'
    ),
    (
        5,
        'Mulch',
        'Apply the best organic material to your plots and give it life and color for longer.',
        '5.jpg',
        'Hello, I would like to know more about the mulch service.',
        '2023-01-01 00:00:00',
        '2023-01-01 00:00:00'
    ),
    (
        6,
        'Trimming',
        'Apply beautifiers and make your house have a different touch from the others.',
        '6.jpg',
        'Hello, I would like to know more about the trimming service.',
        '2023-01-01 00:00:00',
        '2023-01-01 00:00:00'
    ),
    (
        7,
        'Roofing',
        'We repair and build roofs, we have the best materials and the best prices.',
        '7.jpg',
        'Hello, I would like to know more about the roofing service.',
        '2023-01-01 00:00:00',
        '2023-01-01 00:00:00'
    );

DROP TABLE IF EXISTS projects;

CREATE TABLE projects (
    project_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    project_title VARCHAR(50),
    project_desc TEXT,
    project_img TEXT,
    project_link TEXT,
    project_origin VARCHAR(50) DEFAULT 'website',
    project_last VARCHAR(50),
    project_created VARCHAR(50),
    service_id INT,
    FOREIGN KEY (service_id) REFERENCES services(service_id)
) ENGINE INNODB;

INSERT INTO
    projects
VALUES
    (
        1,
        'Project 1',
        'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.',
        '1.jpg',
        '',
        'website',
        '2023-01-01 00:00:00',
        '2023-01-01 00:00:00',
        3
    ),
    (
        2,
        'Project 2',
        'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.',
        '2.jpg',
        '',
        'website',
        '2023-01-01 00:00:00',
        '2023-01-01 00:00:00',
        6
    ),
    (
        3,
        'Project 3',
        'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.',
        '3.jpg',
        '',
        'website',
        '2023-01-01 00:00:00',
        '2023-01-01 00:00:00',
        3
    ),
    (
        4,
        'Project 4',
        'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.',
        '4.jpg',
        '',
        'website',
        '2023-01-01 00:00:00',
        '2023-01-01 00:00:00',
        1
    ),
    (
        5,
        'Project 5',
        'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.',
        '5.jpg',
        '',
        'website',
        '2023-01-01 00:00:00',
        '2023-01-01 00:00:00',
        4
    ),
    (
        6,
        'Project 6',
        'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.',
        '6.jpg',
        '',
        'website',
        '2023-01-01 00:00:00',
        '2023-01-01 00:00:00',
        7
    ),
    (
        7,
        'Project 7',
        'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.',
        '7.jpg',
        '',
        'website',
        '2023-01-01 00:00:00',
        '2023-01-01 00:00:00',
        1
    ),
    (
        8,
        'Project 7',
        'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.',
        '8.jpg',
        '',
        'website',
        '2023-01-01 00:00:00',
        '2023-01-01 00:00:00',
        1
    ),
    (
        9,
        'Project 9',
        'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.',
        '9.jpg',
        '',
        'website',
        '2023-01-01 00:00:00',
        '2023-01-01 00:00:00',
        3
    ),
    (
        10,
        'Project 10',
        'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.',
        '9.jpg',
        '',
        'website',
        '2023-01-01 00:00:00',
        '2023-01-01 00:00:00',
        3
    ),
    (
        11,
        'Project 11',
        'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.',
        '11.jpg',
        '',
        'website',
        '2023-01-01 00:00:00',
        '2023-01-01 00:00:00',
        5
    );

DROP TABLE IF EXISTS mailbox;

CREATE TABLE mailbox (
    mail_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    mail_name VARCHAR(50),
    mail_email VARCHAR(50),
    mail_phone VARCHAR(50),
    mail_subject VARCHAR(50),
    mail_location VARCHAR(50),
    mail_message TEXT,
    mail_last VARCHAR(50),
    mail_created VARCHAR(50)
) ENGINE INNODB;

DROP TABLE IF EXISTS customers;

CREATE TABLE customers (
    customer_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    customer_name VARCHAR(50),
    customer_link TEXT,
    customer_logo VARCHAR(50) DEFAULT 'default.png',
    customer_last VARCHAR(50),
    customer_created VARCHAR(50)
) ENGINE INNODB;

INSERT INTO
    customers
VALUES
    (
        1,
        'Customer 1',
        '#',
        'default.png',
        '2023-01-01 00:00:00',
        '2023-01-01 00:00:00'
    ),
    (
        2,
        'Customer 2',
        '#',
        'default.png',
        '2023-01-01 00:00:00',
        '2023-01-01 00:00:00'
    ),
    (
        3,
        'Customer 3',
        '#',
        'default.png',
        '2023-01-01 00:00:00',
        '2023-01-01 00:00:00'
    ),
    (
        4,
        'Customer 4',
        '#',
        'default.png',
        '2023-01-01 00:00:00',
        '2023-01-01 00:00:00'
    );