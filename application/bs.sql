CREATE DATABASE IF NOT EXISTS business;

USE business;

CREATE TABLE IF NOT EXISTS applications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(255),
    username VARCHAR(255),
    address VARCHAR(255),
    mobile VARCHAR(20),
    name1 VARCHAR(255),
    name2 VARCHAR(255),
    name3 VARCHAR(255),
    name4 VARCHAR(255),
    name5 VARCHAR(255),
    business_activities TEXT,
    num_employees INT,
    county VARCHAR(255),
    district VARCHAR(255),
    locality VARCHAR(255),
    building_plot VARCHAR(255),
    floor_room VARCHAR(255),
    postal_address VARCHAR(255),
    email VARCHAR(255),
    phone VARCHAR(20)
);

CREATE TABLE IF NOT EXISTS shareholders_directors (
    id INT AUTO_INCREMENT PRIMARY KEY,
    application_id INT,
    person_type VARCHAR(20),
    name VARCHAR(255),
    postal_address VARCHAR(255),
    national_id VARCHAR(255),
    pin_certificate VARCHAR(255),
    passport_photo VARCHAR(255),
    residential_address VARCHAR(255),
    phone_number VARCHAR(20),
    email VARCHAR(255),
    shares INT,
    FOREIGN KEY (application_id) REFERENCES applications(id)
);