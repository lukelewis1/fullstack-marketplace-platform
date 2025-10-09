USE FUSS_DB;

-- Temporarily disable foreign key constraints
SET FOREIGN_KEY_CHECKS = 0;

-- Wipe all data from every table
TRUNCATE TABLE TransactionHistory;
TRUNCATE TABLE Reviews;
TRUNCATE TABLE Availability;
TRUNCATE TABLE Bookings;
TRUNCATE TABLE Friendships;
TRUNCATE TABLE ChatMessages;
TRUNCATE TABLE Messages;
-- Disputes table is not currently defined, skip if not present
-- TRUNCATE TABLE Disputes;
TRUNCATE TABLE Listings;
TRUNCATE TABLE Users;

-- Re-enable foreign key constraints
SET FOREIGN_KEY_CHECKS = 1;
