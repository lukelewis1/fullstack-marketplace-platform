USE FUSS_DB;

-- ======================================================
-- 1) USERS (30 total) - Bob & Brett are admins
-- ======================================================
INSERT INTO Users (user_name, email, hashed_password, f_name, l_name, bio, dob, is_admin, acc_status, role, fuss_credit)
VALUES
    ('Bob', 'bob@example.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'Bob', 'Anderson', 'System admin, developer, and musician.', '1985-02-12', TRUE, TRUE, 'Computer Science', 50),
    ('Brett', 'brett@example.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'Brett', 'Taylor', 'Platform administrator and security specialist.', '1987-09-08', TRUE, TRUE, 'Software Engineering', 60),
    ('Alice', 'alice@example.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'Alice', 'Nguyen', 'Web designer and artist.', '1999-06-10', FALSE, TRUE, 'Graphic Design', 35),
    ('Liam', 'liam@example.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'Liam', 'Brown', 'Musician and guitar teacher.', '1996-07-05', FALSE, TRUE, 'Music', 40),
    ('Sophie', 'sophie@example.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'Sophie', 'Miller', 'Yoga instructor and wellness coach.', '1993-01-15', FALSE, TRUE, 'Health Sciences', 25),
    ('Ethan', 'ethan@example.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'Ethan', 'Harris', 'Python developer and data analyst.', '1998-11-23', FALSE, TRUE, 'Data Science', 30),
    ('Isabella', 'isabella@example.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'Isabella', 'Lopez', 'Baker and cake decorator.', '1994-04-07', FALSE, TRUE, 'Culinary Arts', 20),
    ('Noah', 'noah@example.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'Noah', 'Clark', 'Economics tutor and trader.', '1997-03-03', FALSE, TRUE, 'Economics', 45),
    ('Olivia', 'olivia@example.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'Olivia', 'Jones', 'Front-end developer and mentor.', '1999-09-01', FALSE, TRUE, 'Information Technology', 50),
    ('Mason', 'mason@example.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'Mason', 'King', 'Photographer and cinematographer.', '1995-05-20', FALSE, TRUE, 'Media Studies', 10),
    ('Emma', 'emma@example.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'Emma', 'Wilson', 'Personal trainer and fitness coach.', '1994-08-09', FALSE, TRUE, 'Exercise Physiology', 15),
    ('Aiden', 'aiden@example.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'Aiden', 'Evans', 'Electrician offering practical training.', '1990-02-17', FALSE, TRUE, 'Engineering', 25),
    ('Chloe', 'chloe@example.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'Chloe', 'Roberts', 'Mathematics tutor for high school students.', '2000-12-25', FALSE, TRUE, 'Mathematics', 40),
    ('Lucas', 'lucas@example.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'Lucas', 'White', 'Physics tutor and problem-solving coach.', '1998-03-02', FALSE, TRUE, 'Physics', 50),
    ('Amelia', 'amelia@example.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'Amelia', 'Hall', 'UI/UX designer for web and mobile.', '1997-10-15', FALSE, TRUE, 'Interaction Design', 30),
    ('Elijah', 'elijah@example.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'Elijah', 'Scott', 'Java and Spring Boot developer.', '1996-07-21', FALSE, TRUE, 'Computer Science', 45),
    ('Grace', 'grace@example.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'Grace', 'Turner', 'Nutritionist and meal planner.', '1995-09-13', FALSE, TRUE, 'Nutrition', 30),
    ('Henry', 'henry@example.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'Henry', 'Young', 'Entrepreneurship and marketing mentor.', '1992-05-25', FALSE, TRUE, 'Business', 55),
    ('Zoe', 'zoe@example.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'Zoe', 'Perez', 'French and Spanish tutor.', '1999-11-19', FALSE, TRUE, 'Linguistics', 22),
    ('Ryan', 'ryan@example.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'Ryan', 'Hill', 'AI researcher and ML practitioner.', '1996-01-11', FALSE, TRUE, 'Artificial Intelligence', 75),
    ('Aria', 'aria@example.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'Aria', 'Green', 'Vocal coach for beginners.', '1998-02-03', FALSE, TRUE, 'Music', 28),
    ('Leo', 'leo@example.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'Leo', 'Baker', 'Cybersecurity enthusiast and pentester.', '1997-08-16', FALSE, TRUE, 'Cyber Security', 42),
    ('Mia', 'mia@example.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'Mia', 'Parker', 'Tutor for primary school students.', '2001-06-22', FALSE, TRUE, 'Education', 25),
    ('Nathan', 'nathan@example.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'Nathan', 'Morgan', 'Game developer and Unity instructor.', '1999-04-28', FALSE, TRUE, 'Game Design', 30),
    ('Ava', 'ava@example.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'Ava', 'Cook', 'Fashion design and textile specialist.', '1994-09-09', FALSE, TRUE, 'Fashion Design', 40),
    ('Jack', 'jack@example.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'Jack', 'Ward', 'Matlab and R programming tutor.', '1998-07-17', FALSE, TRUE, 'Statistics', 50),
    ('Ella', 'ella@example.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'Ella', 'Bennett', 'Digital marketing strategist.', '1993-02-11', FALSE, TRUE, 'Marketing', 55),
    ('Caleb', 'caleb@example.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'Caleb', 'Peterson', 'Chemistry tutor for university students.', '1996-10-05', FALSE, TRUE, 'Chemistry', 30),
    ('Scarlett', 'scarlett@example.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'Scarlett', 'Gray', 'Sculptor and ceramics instructor.', '1995-12-14', FALSE, TRUE, 'Fine Arts', 20),
    ('Daniel', 'daniel@example.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'Daniel', 'Murphy', 'Finance and investing tutor.', '1991-11-18', FALSE, TRUE, 'Finance', 75);

-- Expect user ids from 1..30 in the insert order above.


-- ======================================================
-- 2) LISTINGS (24 total; varied owners, topics, categories (type), likes/dislikes/prices)
-- ======================================================
INSERT INTO Listings (user_id, price, title, topic, description, successful_exchanges, is_negotiable, likes, dislikes, type)
VALUES
    (1,  35.0, 'Python Tutoring',          'Programming', 'Intro to Python and automation.',            12, TRUE,  30,  4, 'Tutoring'),
    (2,  45.0, 'C# for Beginners',         'Programming', 'Start building with .NET.',                   7,  FALSE, 22,  3, 'Tutoring'),
    (3,  28.0, 'Logo Design Sprint',       'Design',      'Rapid brand marks in 90 minutes.',           10, TRUE,  26,  2, 'Practical'),
    (4,  32.0, 'Guitar Lessons',           'Music',       'Acoustic & electric techniques.',             9, TRUE,  31,  1, 'Life Skill'),
    (5,  20.0, 'Yoga Flow Class',          'Wellness',    'Vinyasa/balance for beginners.',             14, TRUE,  24,  3, 'Life Skill'),
    (6,  40.0, 'Data Cleaning in Python',  'Data',        'Pandas, regex, csv wrangling.',               8, FALSE, 18,  2, 'Technical'),
    (7,  22.0, 'Cake Decorating Basics',   'Culinary',    'Piping, fondant, finishes.',                  6, TRUE,  15,  1, 'Practical'),
    (8,  38.0, 'Microeconomics Tutoring',  'Economics',   'Elasticity, utility, markets.',               5, TRUE,  17,  2, 'Tutoring'),
    (9,  42.0, 'Frontend Mentoring',       'Web',         'JS/React best practices.',                    7, FALSE, 29,  5, 'Tech Support'),
    (10, 25.0, 'Portrait Photography',     'Media',       'Natural light portraits.',                    4, TRUE,  11,  0, 'Practical'),
    (11, 30.0, 'Strength Training',        'Fitness',     'Progressive overload fundamentals.',         13, FALSE, 27,  3, 'Life Skill'),
    (12, 23.0, 'Electrical Basics',        'Trades',      'Safety, tools, circuits (theory).',           6, TRUE,  14,  2, 'Practical'),
    (13, 27.0, 'Algebra Coaching',         'Math',        'Linear equations & factoring.',              15, TRUE,  33,  4, 'Tutoring'),
    (14, 34.0, 'Physics Problem Solving',  'Physics',     'Kinematics and dynamics drills.',             9, TRUE,  21,  1, 'Tutoring'),
    (15, 36.0, 'UX Portfolio Review',      'Design',      'Case study critique & polish.',               8, FALSE, 19,  2, 'Tech Support'),
    (16, 44.0, 'Spring Boot APIs',         'Backend',     'REST, JPA, testing quickstart.',              5, FALSE, 23,  2, 'Technical'),
    (17, 24.0, 'Meal Planning',            'Nutrition',   'Macros, recipes, shopping lists.',            7, TRUE,  16,  1, 'Life Skill'),
    (18, 41.0, 'Pitch Deck Coaching',      'Business',    'Story, flow, numbers.',                      10, TRUE,  25,  3, 'Tutoring'),
    (19, 26.0, 'French Conversation',      'Language',    'Practical speaking and idioms.',              6, TRUE,  12,  1, 'Life Skill'),
    (20, 48.0, 'Intro to Deep Learning',   'AI',          'TensorFlow/PyTorch primer.',                  4, FALSE, 28,  6, 'Technical'),
    (21, 29.0, 'Vocal Coaching',           'Music',       'Breath support and tone.',                    8, TRUE,  18,  2, 'Life Skill'),
    (22, 39.0, 'Pentesting 101',           'Security',    'Recon, OWASP Top 10 overview.',               6, FALSE, 26,  5, 'Technical'),
    (23, 19.0, 'Primary Tutoring',         'Education',   'Literacy & numeracy sessions.',               9, TRUE,  20,  2, 'Tutoring'),
    (24, 37.0, 'Unity Game Basics',        'GameDev',     'Scripting, physics, scenes.',                 5, TRUE,  17,  2, 'Technical');

-- Expect listing_ids 1..24 in this block’s order.


-- ======================================================
-- 3) AVAILABILITY (at least one slot per listing; mix of days/times)
-- ======================================================
INSERT INTO Availability (service_id, day, start, end) VALUES
                                                           (1,  'monday',    '09:00:00', '11:00:00'),
                                                           (1,  'wednesday', '14:00:00', '16:00:00'),
                                                           (2,  'tuesday',   '10:00:00', '12:00:00'),
                                                           (3,  'friday',    '09:30:00', '11:30:00'),
                                                           (4,  'thursday',  '15:00:00', '18:00:00'),
                                                           (5,  'monday',    '18:00:00', '20:00:00'),
                                                           (6,  'tuesday',   '13:00:00', '16:00:00'),
                                                           (7,  'saturday',  '10:00:00', '12:00:00'),
                                                           (8,  'wednesday', '09:00:00', '11:00:00'),
                                                           (9,  'thursday',  '18:00:00', '20:00:00'),
                                                           (10, 'sunday',    '11:00:00', '13:00:00'),
                                                           (11, 'monday',    '07:00:00', '09:00:00'),
                                                           (12, 'tuesday',   '16:00:00', '18:00:00'),
                                                           (13, 'saturday',  '08:00:00', '10:00:00'),
                                                           (14, 'wednesday', '17:00:00', '19:00:00'),
                                                           (15, 'friday',    '10:00:00', '12:00:00'),
                                                           (16, 'tuesday',   '09:00:00', '11:30:00'),
                                                           (17, 'thursday',  '12:00:00', '14:00:00'),
                                                           (18, 'monday',    '13:00:00', '15:00:00'),
                                                           (19, 'sunday',    '09:30:00', '11:00:00'),
                                                           (20, 'wednesday', '19:00:00', '21:00:00'),
                                                           (21, 'friday',    '14:00:00', '16:00:00'),
                                                           (22, 'tuesday',   '18:00:00', '20:00:00'),
                                                           (23, 'thursday',  '09:00:00', '11:00:00'),
                                                           (24, 'saturday',  '13:00:00', '15:00:00');


-- ======================================================
-- 4) FRIENDSHIPS (mix of pending/accepted/blocked)
-- ======================================================
INSERT INTO Friendships (user_id, friend_id, requester_id, status) VALUES
                                                                       (1,  2,  1, 'accepted'),
                                                                       (1,  3,  3, 'pending'),
                                                                       (2,  4,  2, 'accepted'),
                                                                       (3,  5,  5, 'accepted'),
                                                                       (4,  6,  4, 'blocked'),
                                                                       (7,  8,  7, 'accepted'),
                                                                       (9, 10,  9, 'pending'),
                                                                       (11,12, 11, 'accepted'),
                                                                       (13,14, 13, 'accepted'),
                                                                       (15,16, 15, 'pending'),
                                                                       (17,18, 18, 'accepted'),
                                                                       (19,20, 19, 'accepted');


-- ======================================================
-- 5) MESSAGES (conversations) + CHAT MESSAGES
-- ======================================================
-- Conversations (Messages)
INSERT INTO Messages (sender_id, receiver_id, start_date, end_date, unseen, unseen_2) VALUES
                                                                                          (1,  9,  '2025-09-10 09:00:00', '2025-09-10 10:00:00', 0, 0),
                                                                                          (4,  5,  '2025-09-11 15:00:00', '2025-09-11 15:30:00', 1, 0),
                                                                                          (13, 23, '2025-09-12 18:00:00', '2025-09-12 18:45:00', 0, 2),
                                                                                          (20, 22, '2025-09-13 12:00:00', '2025-09-13 12:40:00', 0, 0),
                                                                                          (2,  1,  '2025-09-14 08:30:00', '2025-09-14 09:05:00', 0, 1),
                                                                                          (8,  3,  '2025-09-15 19:00:00', '2025-09-15 19:20:00', 0, 0);

-- Chat messages (assumes conversation_id auto-increments 1..6)
INSERT INTO ChatMessages (conversation_id, sender_id, message_text, sent_at) VALUES
                                                                                 (1, 1,  'Hey, can you help me with React state?',          '2025-09-10 09:02:00'),
                                                                                 (1, 9,  'Sure, let’s jump on a call at 9:30.',             '2025-09-10 09:05:00'),
                                                                                 (2, 4,  'Yoga schedule available this week?',               '2025-09-11 15:05:00'),
                                                                                 (2, 5,  'Yes! Monday and Wednesday evenings.',              '2025-09-11 15:07:00'),
                                                                                 (3,13,  'Are you free for Algebra practice tomorrow?',      '2025-09-12 18:05:00'),
                                                                                 (3,23,  'Yes, after 5pm works for me.',                     '2025-09-12 18:10:00'),
                                                                                 (4,20,  'Pentesting 101 availability on Tuesday?',          '2025-09-13 12:05:00'),
                                                                                 (4,22,  'I can do 6–8pm. Want to book?',                    '2025-09-13 12:06:00'),
                                                                                 (5,2,   'Can you review my C# project?',                    '2025-09-14 08:35:00'),
                                                                                 (5,1,   'Yep, send the repo link.',                         '2025-09-14 08:40:00'),
                                                                                 (6,8,   'Logo design sprint — do you do moodboards?',       '2025-09-15 19:02:00'),
                                                                                 (6,3,   'Yes, included in the sprint package.',             '2025-09-15 19:04:00');


-- ======================================================
-- 6) BOOKINGS (mix of confirmed/pending; various confirms)
--     booker_id = who books; service_provider_id = Listings.user_id
-- ======================================================
INSERT INTO Bookings (booker_id, service_provider_id, start, end, service_id, status, provider_confirm, booker_confirm)
VALUES
-- Confirmed bookings
(9,   1,  '2025-09-20 09:00:00', '2025-09-20 10:00:00', 1,  'confirmed', TRUE,  TRUE),
(5,   4,  '2025-09-21 15:30:00', '2025-09-21 16:30:00', 4,  'confirmed', TRUE,  TRUE),
(23, 13,  '2025-09-22 08:00:00', '2025-09-22 09:00:00', 13, 'confirmed', TRUE,  TRUE),
(22, 20,  '2025-09-23 18:00:00', '2025-09-23 19:30:00', 20, 'confirmed', TRUE,  TRUE),

-- Pending bookings
(1,   9,  '2025-09-24 18:00:00', '2025-09-24 19:00:00', 9,  'pending',   FALSE, TRUE),
(8,   3,  '2025-09-25 10:00:00', '2025-09-25 11:00:00', 3,  'pending',   TRUE,  FALSE),
(12, 11,  '2025-09-26 07:00:00', '2025-09-26 08:00:00', 11, 'pending',   FALSE, FALSE),
(19, 22,  '2025-09-27 18:00:00', '2025-09-27 19:30:00', 22, 'pending',   TRUE,  TRUE);


-- ======================================================
-- 7) TRANSACTION HISTORY (tie to confirmed bookings)
--    Price here is INT; we’ll use rounded values from listing prices.
-- ======================================================
INSERT INTO TransactionHistory (service_id, service_title, service_topic, provider_id, booker_id, price, time)
VALUES
    (1,  'Python Tutoring',         'Programming',  1,  9,  35,  '2025-09-20 10:05:00'),
    (4,  'Guitar Lessons',          'Music',        4,  5,  32,  '2025-09-21 16:35:00'),
    (13, 'Algebra Coaching',        'Math',         13, 23, 27,  '2025-09-22 09:05:00'),
    (20, 'Intro to Deep Learning',  'AI',           20, 22, 48,  '2025-09-23 19:35:00');


-- ======================================================
-- 8) REVIEWS (on various services)
-- ======================================================
INSERT INTO Reviews (service_id, type, review) VALUES
                                                   (1,  'positive', 'Great intro to Python — clear explanations.'),
                                                   (4,  'positive', 'Improved a lot in just a few sessions!'),
                                                   (9,  'neutral',  'Good mentor, a bit fast-paced.'),
                                                   (11, 'positive', 'Solid training plan — seeing progress.'),
                                                   (13, 'positive', 'Algebra finally makes sense.'),
                                                   (16, 'positive', 'Great Spring Boot crash course.'),
                                                   (20, 'negative', 'Too advanced for a beginner, but knowledgeable.'),
                                                   (22, 'positive', 'Excellent overview of security basics.'),
                                                   (23, 'positive', 'Kids loved the session!'),
                                                   (24, 'neutral',  'Good start for Unity, needs more examples.');


-- ======================================================
-- 9) NOTIFICATIONS (varied types)
-- ======================================================
INSERT INTO Notifications (user_id, type, time) VALUES
                                                    (9,  'service_request',         '2025-09-18 09:00:00'),
                                                    (1,  'accepted_request',        '2025-09-18 10:00:00'),
                                                    (5,  'completed_service',       '2025-09-21 16:40:00'),
                                                    (4,  'completed_service_confirm','2025-09-21 16:45:00'),
                                                    (13, 'review',                  '2025-09-22 09:10:00'),
                                                    (20, 'service_request',         '2025-09-23 17:45:00'),
                                                    (22, 'accepted_request',        '2025-09-23 17:50:00'),
                                                    (23, 'review',                  '2025-09-22 09:15:00'),
                                                    (11, 'service_request',         '2025-09-26 06:30:00'),
                                                    (22, 'completed_service',       '2025-09-27 19:40:00');
