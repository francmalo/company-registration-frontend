CREATE TABLE applications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    mobile VARCHAR(20) NOT NULL,
    proposed_name1 VARCHAR(255) NOT NULL,
    proposed_name2 VARCHAR(255) NOT NULL,
    proposed_name3 VARCHAR(255) NOT NULL,
    proposed_name4 VARCHAR(255) DEFAULT NULL,
    proposed_name5 VARCHAR(255) DEFAULT NULL,
    business_activities TEXT NOT NULL,
    county VARCHAR(255) NOT NULL,
    district VARCHAR(255) NOT NULL,
    locality VARCHAR(255) NOT NULL,
    building_plot VARCHAR(255) NOT NULL,
    floor_room VARCHAR(255) NOT NULL,
    postal_address VARCHAR(255) NOT NULL,
    registered_email VARCHAR(255) NOT NULL,
    registered_phone VARCHAR(20) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE shareholders_directors (
    id INT AUTO_INCREMENT PRIMARY KEY,
    application_id INT NOT NULL,
    person_type VARCHAR(20) NOT NULL,
    name VARCHAR(255) NOT NULL,
    postal_address VARCHAR(255) NOT NULL,
    national_id VARCHAR(255) NOT NULL,
    pin_certificate VARCHAR(255) NOT NULL,
    passport_photo VARCHAR(255) NOT NULL,
    residential_address VARCHAR(255) NOT NULL,
    phone_number VARCHAR(20) NOT NULL,
    email VARCHAR(255) NOT NULL,
    shares INT NOT NULL,
    FOREIGN KEY (application_id) REFERENCES applications(id)
);