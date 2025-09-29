DROP DATABASE IF EXISTS FUSS_DB;
CREATE DATABASE FUSS_DB;
USE FUSS_DB;

DROP TABLE IF EXISTS Reviews;
DROP TABLE IF EXISTS Availability;
DROP TABLE IF EXISTS Bookings;
DROP TABLE IF EXISTS Friendships;
DROP TABLE IF EXISTS ChatMessages;
DROP TABLE IF EXISTS Messages;
DROP TABLE IF EXISTS Disputes;
DROP TABLE IF EXISTS Listings;
DROP TABLE IF EXISTS Users;

CREATE TABLE Users(
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    user_name VARCHAR(30) NOT NULL UNIQUE,
    email VARCHAR(50) NOT NULL UNIQUE,
    hashed_password VARCHAR(256) NOT NULL,
    f_name VARCHAR(25) NOT NULL,
    l_name VARCHAR(25) NOT NULL,
    bio VARCHAR(500),
    dob DATETIME NOT NULL,
    is_admin BOOL NOT NULL,
    acc_status INT NOT NULL,
    role VARCHAR(25) NOT NULL,
    fuss_credit FLOAT NOT NULL
);

CREATE TABLE Listings(
    listing_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    user_id INT NOT NULL,
    price FLOAT NOT NULL CHECK (100 > price AND price > 0),
    title VARCHAR(50) NOT NULL,
    topic VARCHAR(60) NOT NULL,
    description VARCHAR(250),
    successful_exchanges INT NOT NULL CHECK (successful_exchanges >= 0),
    is_negotiable BOOL NOT NULL,
    likes INT,
    dislikes INT,
    type ENUM('tutoring', 'life_skill', 'tech_support', 'technical', 'practical') NOT NULL,
    FOREIGN KEY (user_id) REFERENCES Users(id),
    UNIQUE KEY service_owner(user_id, title)
);

CREATE TABLE Disputes(
    dispute_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    initiator_id INT NOT NULL,
    respondent_id INT NOT NULL,
    listing_id INT NOT NULL,
    status VARCHAR(20) NOT NULL,
    FOREIGN KEY (initiator_id) REFERENCES Users(id),
    FOREIGN KEY (respondent_id) REFERENCES Users(id),
    FOREIGN KEY (listing_id) REFERENCES Listings(listing_id)
);

CREATE TABLE Messages(
    conversation_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    sender_id INT NOT NULL,
    receiver_id INT NOT NULL,
    start_date DATETIME NOT NULL,
    end_date DATETIME NOT NULL,
    unseen INT,
    unseen_2 INT,
    FOREIGN KEY (sender_id) REFERENCES Users(id),
    FOREIGN KEY (receiver_id) REFERENCES Users(id)
);

CREATE TABLE ChatMessages(
    msg_id INT AUTO_INCREMENT PRIMARY KEY,
    conversation_id INT NOT NULL,
    sender_id INT NOT NULL,
    message_text TEXT NOT NULL,
    sent_at DATETIME NOT NULL,
    FOREIGN KEY (conversation_id) REFERENCES Messages(conversation_id),
    FOREIGN KEY (sender_id) REFERENCES Users(id)
);

CREATE TABLE Friendships (
    friendship_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    friend_id INT NOT NULL,
    requester_id INT NOT NULL,
    status ENUM('pending', 'accepted', 'blocked') DEFAULT 'pending',
    FOREIGN KEY (user_id) REFERENCES Users(id),
    FOREIGN KEY (friend_id) REFERENCES Users(id),
    FOREIGN KEY (requester_id) REFERENCES Users(id),
    UNIQUE KEY unique_friendship (user_id, friend_id)
);

CREATE TABLE Bookings (
    booking_id INT PRIMARY KEY AUTO_INCREMENT,
    booker_id INT NOT NULL,
    service_provider_id INT NOT NULL,
    start DATETIME NOT NULL,
    end DATETIME NOT NULL,
    service_id INT NOT NULL,
    status ENUM('confirmed', 'pending') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (booker_id) REFERENCES Users(id),
    FOREIGN KEY (service_provider_id) REFERENCES Users(id),
    FOREIGN KEY (service_id) REFERENCES Listings(listing_id)
);

CREATE TABLE Availability (
    availability_id INT AUTO_INCREMENT PRIMARY KEY,
    service_id INT NOT NULL,
    day ENUM('monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday') NOT NULL,
    start TIME NOT NULL,
    end TIME NOT NULL,
    FOREIGN KEY (service_id) REFERENCES Listings(listing_id)
);

CREATE TABLE Reviews (
    review_id INT AUTO_INCREMENT PRIMARY KEY,
    service_id INT NOT NULL,
    type ENUM('positive', 'negative', 'neutral') DEFAULT 'neutral' NOT NULL,
    review VARCHAR(500) NOT NULL,
    FOREIGN KEY (service_id) REFERENCES Listings(listing_id)
);