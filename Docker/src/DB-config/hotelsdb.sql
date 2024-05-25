
ALTER TABLE hotels
ADD free_rooms INT NOT NULL;

--create db
CREATE DATABASE hotelsDB
    DEFAULT CHARACTER SET = 'utf8mb4';

ALTER TABLE booking_audit DROP FOREIGN KEY IF EXISTS booking_audit_ibfk_1;

DROP TABLE IF EXISTS booking_audit;

DROP TABLE IF EXISTS hotels;

CREATE TABLE hotels (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    location VARCHAR(255) NOT NULL,
    price_per_night DECIMAL(10, 2) NOT NULL,
    stars INT NOT NULL,
    free_rooms INT NOT NULL, 
    image VARCHAR(255) NULL
);

CREATE TABLE booking_audit (
    audit_id INT AUTO_INCREMENT PRIMARY KEY,
    hotel_id INT NOT NULL,
    old_price_per_night DECIMAL(10, 2) NOT NULL,
    new_price_per_night DECIMAL(10, 2) NOT NULL,
    old_free_rooms INT NOT NULL,
    new_free_rooms INT NOT NULL,
    old_stars INT NOT NULL,
    new_stars INT NOT NULL,
    booking_timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (hotel_id) REFERENCES hotels(id) ON DELETE CASCADE
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL
);
ALTER TABLE users
ADD COLUMN user_type VARCHAR(255);

DROP TABLE IF EXISTS users;