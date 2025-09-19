DROP DATABASE IF EXISTS FUSS_DB;
CREATE DATABASE FUSS_DB;
USE FUSS_DB;

DROP TABLE IF EXISTS ChatMessages;
DROP TABLE IF EXISTS Messages;
DROP TABLE IF EXISTS Disputes;
DROP TABLE IF EXISTS InactiveListings;
DROP TABLE IF EXISTS ConsumerProducerRelationship;
DROP TABLE IF EXISTS CurrentInterests;
DROP TABLE IF EXISTS ActiveListings;
DROP TABLE IF EXISTS Users;

CREATE TABLE Users(
    id int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    user_name varchar(30) NOT NULL UNIQUE,
    email varchar(50) NOT NULL UNIQUE,
    hashed_password varchar(50) NOT NULL,
    f_name varchar(25) NOT NULL,
    l_name varchar(25) NOT NULL,
    age int NOT NULL CHECK (age > 0),
    is_admin bool NOT NULL,
    acc_status int NOT NULL,
    role varchar(25) NOT NULL
);

CREATE TABLE ActiveListings(
    listing_id int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    user_id int NOT NULL,
    price int NOT NULL CHECK (100 > price AND price > 0),
    description varchar(100),
    successful_exchanges int NOT NULL CHECK (successful_exchanges >= 0),
    current_interests int NOT NULL CHECK (current_interests >= 0),
    FOREIGN KEY (user_id) REFERENCES Users(id)
);

CREATE TABLE CurrentInterests(
    ci_id int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    consumer_id int NOT NULL,
    producer_id int NOT NULL,
    listing int NOT NULL,
    FOREIGN KEY (consumer_id) REFERENCES Users(id),
    FOREIGN KEY (producer_id) REFERENCES  Users(id),
    FOREIGN KEY (listing) REFERENCES ActiveListings(listing_id),
    UNIQUE (consumer_id, listing)
);

CREATE TABLE ConsumerProducerRelationship(
    cpr_id int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    producer_id int NOT NULL,
    consumer_id int NOT NULL,
    listing int NOT NULL,
    original_price int NOT NULL CHECK (original_price > 0),
    neg_price int NOT NULL CHECK (neg_price > 0),
    FOREIGN KEY (producer_id) REFERENCES Users(id),
    FOREIGN KEY (consumer_id) REFERENCES Users(id),
    FOREIGN KEY (listing) REFERENCES ActiveListings(listing_id),
    UNIQUE (listing, producer_id, consumer_id)
);

CREATE TABLE InactiveListings(
    listing_id int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    user_id int NOT NULL,
    price int NOT NULL CHECK (price > 0),
    description varchar(100),
    successful_transactions int NOT NULL CHECK (successful_transactions >= 0),
    FOREIGN KEY (user_id) REFERENCES Users(id)
);

CREATE TABLE Disputes(
    dispute_id int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    initiator_id int NOT NULL,
    respondent_id int NOT NULL,
    listing_id int NOT NULL,
    status varchar(20) NOT NULL,
    FOREIGN KEY (initiator_id) REFERENCES Users(id),
    FOREIGN KEY (respondent_id) REFERENCES Users(id),
    FOREIGN KEY (listing_id) REFERENCES ActiveListings(listing_id)
);

CREATE TABLE Messages(
    conversation_id int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    sender_id int NOT NULL,
    receiver_id int NOT NULL,
    start_date DATETIME NOT NULL,
    end_date DATETIME NOT NULL,
    buyer_seller bool NOT NULL,
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