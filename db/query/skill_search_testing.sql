USE FUSS_DB;

-- =========================================
-- Populate Listings (reduced prices 1–5 credits)
-- =========================================
INSERT INTO Listings (user_id, price, title, topic, description, successful_exchanges, is_negotiable, likes, dislikes, type)
VALUES
-- Hans' listings
(2, 3, 'Java Tutoring', 'Programming', 'Learn Java basics to advanced topics', 3, TRUE, 5, 0, 'tutoring'),
(2, 2, 'PC Troubleshooting', 'Tech', 'Help fix your slow PC and install software', 2, FALSE, 2, 1, 'tech_support'),

-- Luke's listings
(3, 4, 'Cooking Basics', 'Life Skills', 'Beginner-friendly cooking lessons', 5, TRUE, 8, 0, 'life_skill'),
(3, 5, 'Data Structures Help', 'CS', 'Advanced DSA for uni assignments', 1, FALSE, 1, 0, 'tutoring'),

-- Seth's listings
(4, 1, 'Math Tutoring', 'Mathematics', 'Calculus, Linear Algebra, and beyond', 4, TRUE, 10, 2, 'tutoring'),
(4, 2, '3D Printing Setup', 'Practical', 'Help you set up and calibrate your 3D printer', 0, FALSE, 0, 0, 'practical');

-- =========================================
-- Populate Availability for each service
-- =========================================

-- Hans' Java Tutoring (service_id = 1)
INSERT INTO Availability (service_id, day, start, end)
VALUES
    (1, 'monday', '09:00:00', '12:00:00'),
    (1, 'wednesday', '13:00:00', '16:00:00'),
    (1, 'friday', '10:00:00', '14:00:00');

-- Hans' PC Troubleshooting (service_id = 2)
INSERT INTO Availability (service_id, day, start, end)
VALUES
    (2, 'tuesday', '15:00:00', '18:00:00'),
    (2, 'thursday', '09:00:00', '12:00:00'),
    (2, 'saturday', '11:00:00', '13:00:00');

-- Luke's Cooking Basics (service_id = 3)
INSERT INTO Availability (service_id, day, start, end)
VALUES
    (3, 'monday', '17:00:00', '20:00:00'),
    (3, 'wednesday', '10:00:00', '13:00:00'),
    (3, 'saturday', '09:00:00', '11:00:00');

-- Luke's Data Structures Help (service_id = 4)
INSERT INTO Availability (service_id, day, start, end)
VALUES
    (4, 'tuesday', '14:00:00', '17:00:00'),
    (4, 'thursday', '10:00:00', '12:00:00'),
    (4, 'sunday', '11:00:00', '14:00:00');

-- Seth's Math Tutoring (service_id = 5)
INSERT INTO Availability (service_id, day, start, end)
VALUES
    (5, 'monday', '08:00:00', '10:00:00'),
    (5, 'wednesday', '14:00:00', '17:00:00'),
    (5, 'friday', '09:00:00', '11:00:00');

-- Seth's 3D Printing Setup (service_id = 6)
INSERT INTO Availability (service_id, day, start, end)
VALUES
    (6, 'tuesday', '13:00:00', '16:00:00'),
    (6, 'thursday', '09:00:00', '11:00:00'),
    (6, 'saturday', '10:00:00', '12:00:00');
