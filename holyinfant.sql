CREATE TABLE tbl_admin (
    admin_id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    admin_name VARCHAR(255) NOT NULL,
    access_level INT DEFAULT 4
);

CREATE TABLE tbl_director (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    firstname VARCHAR(255) NOT NULL,
    lastname VARCHAR(255) NOT NULL,
    birthdate DATE NOT NULL,
    gender VARCHAR(10) NOT NULL, -- Added gender column
    email VARCHAR(255) NOT NULL,
    contact_number VARCHAR(20) NOT NULL,
    address VARCHAR(255) NOT NULL,
    access_level INT DEFAULT 3,
    profile_picture VARCHAR(255) NOT NULL,
    date_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    registered BOOLEAN DEFAULT FALSE
);

CREATE TABLE tbl_bookkeeper (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    firstname VARCHAR(255) NOT NULL,
    lastname VARCHAR(255) NOT NULL,
    birthdate DATE NOT NULL,
    gender VARCHAR(10) NOT NULL, -- Added gender column
    email VARCHAR(255) NOT NULL,
    contact_number VARCHAR(20) NOT NULL,
    address VARCHAR(255) NOT NULL,
    access_level INT DEFAULT 2,
    profile_picture VARCHAR(255) NOT NULL,
    date_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    registered BOOLEAN DEFAULT FALSE
);

CREATE TABLE tbl_housekeeper (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    firstname VARCHAR(255) NOT NULL,
    lastname VARCHAR(255) NOT NULL,
    birthdate DATE NOT NULL,
    gender VARCHAR(10) NOT NULL, -- Added gender column
    email VARCHAR(255) NOT NULL,
    contact_number VARCHAR(20) NOT NULL,
    address VARCHAR(255) NOT NULL,
    access_level INT DEFAULT 1,
    profile_picture VARCHAR(255) NOT NULL,
    date_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    registered BOOLEAN DEFAULT FALSE
);

CREATE TABLE tbl_hk_schedule (
    schedule_id INT PRIMARY KEY AUTO_INCREMENT,
    housekeeper_id INT,
    FOREIGN KEY (housekeeper_id) REFERENCES tbl_housekeeper(user_id),
    shift_start DATETIME,
    shift_end DATETIME
);

CREATE TABLE tbl_children (
    child_id INT PRIMARY KEY AUTO_INCREMENT,
    firstname VARCHAR(255) NOT NULL,
    lastname VARCHAR(255) NOT NULL,
    birthdate DATE,
    status VARCHAR(50),
    child_description VARCHAR(255) NOT NULL
);

CREATE TABLE tbl_donation (
    donation_id INT PRIMARY KEY AUTO_INCREMENT,
    amount DECIMAL(10, 2) NOT NULL,
    donor_name VARCHAR(255) NOT NULL,
    donation_date DATE,
    donation_type VARCHAR(255) NOT NULL,
    status VARCHAR(50),

);

CREATE TABLE tbl_admissions (
    admission_id INT PRIMARY KEY AUTO_INCREMENT,
    child_id INT,
    admin_id INT,
    admission_date DATE,
    approval_status VARCHAR(50),
    FOREIGN KEY (child_id) REFERENCES tbl_children(child_id),
    FOREIGN KEY (admin_id) REFERENCES tbl_admin(admin_id)
);
