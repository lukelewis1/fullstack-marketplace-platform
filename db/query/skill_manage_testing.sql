-- A query that populates some bookings for skills so skill management testing can be streamlined, to be ran in combo with msg_user_populate.sql

USE FUSS_DB;


INSERT INTO Listings (user_id, price, title, topic, description, successful_exchanges, is_negotiable, likes, dislikes, type)
VALUES
-- Hans' listings
(2, 25, 'Java Tutoring', 'Programming', 'Learn Java basics to advanced topics', 3, TRUE, 5, 0, 'tutoring'),
(2, 15, 'PC Troubleshooting', 'Tech', 'Help fix your slow PC and install software', 2, FALSE, 2, 1, 'tech_support'),

-- Luke's listings
(3, 30, 'Cooking Basics', 'Life Skills', 'Beginner-friendly cooking lessons', 5, TRUE, 8, 0, 'life_skill'),
(3, 40, 'Data Structures Help', 'CS', 'Advanced DSA for uni assignments', 1, FALSE, 1, 0, 'tutoring'),

-- Seth's listings
(4, 20, 'Math Tutoring', 'Mathematics', 'Calculus, Linear Algebra, and beyond', 4, TRUE, 10, 2, 'tutoring'),
(4, 50, '3D Printing Setup', 'Practical', 'Help you set up and calibrate your 3D printer', 0, FALSE, 0, 0, 'practical');

-- ================================
-- Bookings where Oliver (id=1) is the booker
-- ================================

INSERT INTO Bookings (booker_id, service_provider_id, start, end, service_id, status)
VALUES
-- Hans' services
(1, 2, '2025-10-06 10:00:00', '2025-10-06 11:00:00', 1, 'confirmed'),
(1, 2, '2025-10-07 15:00:00', '2025-10-07 16:00:00', 2, 'pending'),

-- Luke's services
(1, 3, '2025-10-08 09:00:00', '2025-10-08 10:30:00', 3, 'confirmed'),
(1, 3, '2025-10-09 14:00:00', '2025-10-09 15:00:00', 4, 'pending'),

-- Seth's services
(1, 4, '2025-10-10 18:00:00', '2025-10-10 19:30:00', 5, 'pending'),
(1, 4, '2025-10-11 12:00:00', '2025-10-11 13:00:00', 6, 'confirmed');