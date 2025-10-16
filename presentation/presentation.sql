-- ---------- SEED: CORE USERS ----------
-- SHA-256('admin') -> 8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918
INSERT INTO Users (user_name, email, hashed_password, f_name, l_name, bio, dob, is_admin, acc_status, role, fuss_credit) VALUES
                                                                                                                             ('WUTT0019','oliver.wuttke@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Oliver','Wuttke','Builder of FUSS.','2005-02-01 00:00:00', TRUE, TRUE, 'Computer Science', 75.0),
                                                                                                                             ('PUJA0009','hans.pujalte@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Hans','Pujalte','Builder of FUSS.','2004-08-19 00:00:00', TRUE, TRUE, 'Computer Science', 42.0),
                                                                                                                             ('LEWI0454','luke.lewis@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Luke','Lewis','Builder of FUSS.','2006-01-11 00:00:00', TRUE, TRUE, 'Software Engineer', 38.0),
                                                                                                                             ('LEAR0022','seth.lear@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Seth','Lear','Builder of FUSS.','2005-07-07 00:00:00', TRUE, TRUE, 'Game Development', 50.0);

-- ---------- SEED: +20 MORE USERS (varied roles) ----------
INSERT INTO Users (user_name, email, hashed_password, f_name, l_name, bio, dob, is_admin, acc_status, role, fuss_credit) VALUES
                                                                                                                             ('ALEX0001','alex.cs@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Alex','Chan','Data wrangler.','2005-05-05 00:00:00', FALSE, TRUE, 'Data Science', 15.0),
                                                                                                                             ('MIA0002','mia.ui@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Mia','Nguyen','UI/UX curious.','2004-12-12 00:00:00', FALSE, TRUE, 'Human Factors', 10.0),
                                                                                                                             ('NOAH0003','noah.se@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Noah','Smith','API tinkerer.','2005-03-17 00:00:00', FALSE, TRUE, 'Software Engineering', 8.0),
                                                                                                                             ('AVA0004','ava.ml@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Ava','Patel','Models & metrics.','2006-04-10 00:00:00', FALSE, TRUE, 'Machine Learning', 12.0),
                                                                                                                             ('LIAM0005','liam.sec@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Liam','Kaur','Security basics.','2004-06-21 00:00:00', FALSE, TRUE, 'Cybersecurity', 20.0),
                                                                                                                             ('EMMA0006','emma.devops@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Emma','Lee','Pipelines > code.','2005-09-30 00:00:00', FALSE, TRUE, 'DevOps', 18.0),
                                                                                                                             ('JACK0007','jack.db@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Jack','Ivanov','SQL artist.','2005-01-25 00:00:00', FALSE, TRUE, 'Database Systems', 14.0),
                                                                                                                             ('SOPH0008','soph.math@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Sophie','Brown','Math & stats.','2006-02-02 00:00:00', FALSE, TRUE, 'Applied Mathematics', 9.0),
                                                                                                                             ('ETHA0009','ethan.net@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Ethan','Garcia','Routers & bits.','2005-08-14 00:00:00', FALSE, TRUE, 'Networking', 7.0),
                                                                                                                             ('OLIV0010','olivia.fe@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Olivia','Davis','CSS whisperer.','2004-11-09 00:00:00', FALSE, TRUE, 'Front-end', 11.0),
                                                                                                                             ('ISAB0011','isabella.be@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Isabella','Wilson','BEs & queues.','2005-10-22 00:00:00', FALSE, TRUE, 'Back-end', 13.0),
                                                                                                                             ('MATE0012','mateo.qa@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Mateo','Martinez','Tests are love.','2006-06-03 00:00:00', FALSE, TRUE, 'QA', 6.0),
                                                                                                                             ('AMEL0013','amelia.phys@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Amelia','Lopez','Simulations.','2005-07-19 00:00:00', FALSE, TRUE, 'Computational Physics', 5.0),
                                                                                                                             ('LUCAS014','lucas.ai@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Lucas','Anderson','RL newbie.','2005-04-28 00:00:00', FALSE, TRUE, 'AI', 16.0),
                                                                                                                             ('HARPE015','harper.bioinf@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Harper','Thomas','Genomes & code.','2006-03-13 00:00:00', FALSE, TRUE, 'Bioinformatics', 10.0),
                                                                                                                             ('BENJ016','ben.jammin@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Benjamin','Taylor','Music + ML.','2004-04-04 00:00:00', FALSE, TRUE, 'Digital Media', 9.0),
                                                                                                                             ('EVEL017','evelyn.stats@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Evelyn','Moore','Bayes believer.','2005-12-01 00:00:00', FALSE, TRUE, 'Statistics', 12.0),
                                                                                                                             ('HENR018','henry.iot@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Henry','Jackson','Tiny devices.','2005-09-05 00:00:00', FALSE, TRUE, 'IoT', 7.5),
                                                                                                                             ('ABIG019','abigail.cloud@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Abigail','White','Cloud curious.','2004-10-10 00:00:00', FALSE, TRUE, 'Cloud', 19.0),
                                                                                                                             ('ELIJ020','elijah.hci@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Elijah','Harris','HCI all day.','2006-01-02 00:00:00', FALSE, TRUE, 'HCI', 8.5);

-- ---------- SEED: FRIENDSHIPS (first 4 all friends with each other) ----------
-- Insert both directions as 'accepted'
INSERT INTO Friendships (user_id, friend_id, requester_id, status) VALUES
-- WUTT0019 with PUJA0009, LEWI0454, LEAR0022
((SELECT id FROM Users WHERE user_name='WUTT0019'), (SELECT id FROM Users WHERE user_name='PUJA0009'), (SELECT id FROM Users WHERE user_name='WUTT0019'), 'accepted'),
((SELECT id FROM Users WHERE user_name='PUJA0009'), (SELECT id FROM Users WHERE user_name='WUTT0019'), (SELECT id FROM Users WHERE user_name='WUTT0019'), 'accepted'),
((SELECT id FROM Users WHERE user_name='WUTT0019'), (SELECT id FROM Users WHERE user_name='LEWI0454'), (SELECT id FROM Users WHERE user_name='LEWI0454'), 'accepted'),
((SELECT id FROM Users WHERE user_name='LEWI0454'), (SELECT id FROM Users WHERE user_name='WUTT0019'), (SELECT id FROM Users WHERE user_name='LEWI0454'), 'accepted'),
((SELECT id FROM Users WHERE user_name='WUTT0019'), (SELECT id FROM Users WHERE user_name='LEAR0022'), (SELECT id FROM Users WHERE user_name='LEAR0022'), 'accepted'),
((SELECT id FROM Users WHERE user_name='LEAR0022'), (SELECT id FROM Users WHERE user_name='WUTT0019'), (SELECT id FROM Users WHERE user_name='LEAR0022'), 'accepted'),
-- PUJA0009 with LEWI0454, LEAR0022
((SELECT id FROM Users WHERE user_name='PUJA0009'), (SELECT id FROM Users WHERE user_name='LEWI0454'), (SELECT id FROM Users WHERE user_name='PUJA0009'), 'accepted'),
((SELECT id FROM Users WHERE user_name='LEWI0454'), (SELECT id FROM Users WHERE user_name='PUJA0009'), (SELECT id FROM Users WHERE user_name='PUJA0009'), 'accepted'),
((SELECT id FROM Users WHERE user_name='PUJA0009'), (SELECT id FROM Users WHERE user_name='LEAR0022'), (SELECT id FROM Users WHERE user_name='PUJA0009'), 'accepted'),
((SELECT id FROM Users WHERE user_name='LEAR0022'), (SELECT id FROM Users WHERE user_name='PUJA0009'), (SELECT id FROM Users WHERE user_name='PUJA0009'), 'accepted'),
-- LEWI0454 with LEAR0022
((SELECT id FROM Users WHERE user_name='LEWI0454'), (SELECT id FROM Users WHERE user_name='LEAR0022'), (SELECT id FROM Users WHERE user_name='LEWI0454'), 'accepted'),
((SELECT id FROM Users WHERE user_name='LEAR0022'), (SELECT id FROM Users WHERE user_name='LEWI0454'), (SELECT id FROM Users WHERE user_name='LEWI0454'), 'accepted');

-- ---------- SEED: LISTINGS (≤ 5 credits, types from the allowed set) ----------
-- Allowed types: 'Life Skill','Tech Support','Technical','Practical','Tutoring'
INSERT INTO Listings (user_id, price, title, topic, description, successful_exchanges, is_negotiable, likes, dislikes, type) VALUES
                                                                                                                                 ((SELECT id FROM Users WHERE user_name='WUTT0019'), 5.0, 'Intro to Python', 'Programming Basics', 'Beginner Python session.', 12, TRUE, 48, 2, 'Tutoring'),
                                                                                                                                 ((SELECT id FROM Users WHERE user_name='WUTT0019'), 3.0, 'Git & GitHub Help', 'Version Control', 'Hands-on branching & PRs.', 9, TRUE, 35, 4, 'Tech Support'),
                                                                                                                                 ((SELECT id FROM Users WHERE user_name='WUTT0019'), 4.5, 'Build a Simple Website', 'Web Basics', 'HTML/CSS layout workshop.', 7, FALSE, 28, 5, 'Practical'),
                                                                                                                                 ((SELECT id FROM Users WHERE user_name='PUJA0009'), 2.5, 'Music Theory Crash', 'Harmony & Rhythm', 'Intervals, chords, progressions.', 6, TRUE, 31, 3, 'Life Skill'),
                                                                                                                                 ((SELECT id FROM Users WHERE user_name='LEWI0454'), 5.0, 'Data Structures Tutor', 'Algorithms', 'Lists, trees, graphs in C++.', 10, FALSE, 40, 1, 'Tutoring'),
                                                                                                                                 ((SELECT id FROM Users WHERE user_name='LEWI0454'), 1.5, 'Laptop Cleanup & Speedup', 'Maintenance', 'Remove bloat, tune startup.', 8, TRUE, 22, 6, 'Tech Support'),
                                                                                                                                 ((SELECT id FROM Users WHERE user_name='LEAR0022'), 4.0, 'Unity Basics', 'Game Dev', 'Scenes, prefabs, simple scripts.', 11, TRUE, 27, 3, 'Technical'),
                                                                                                                                 ((SELECT id FROM Users WHERE user_name='ALEX0001'), 2.0, 'SQL Query Clinic', 'Databases', 'Joins, indexes, explain.', 5, TRUE, 19, 2, 'Technical'),
                                                                                                                                 ((SELECT id FROM Users WHERE user_name='EMMA0006'), 3.5, 'Docker for Beginners', 'DevOps', 'Images, containers, compose.', 4, FALSE, 15, 1, 'Technical'),
                                                                                                                                 ((SELECT id FROM Users WHERE user_name='SOPH0008'), 2.0, 'Study Skills Tune-up', 'Study Habits', 'Spaced repetition planning.', 3, TRUE, 12, 2, 'Life Skill'),
                                                                                                                                 ((SELECT id FROM Users WHERE user_name='OLIV0010'), 4.0, 'CSS Grid & Flexbox', 'Front-end', 'Modern layout patterns.', 6, TRUE, 23, 3, 'Practical'),
                                                                                                                                 ((SELECT id FROM Users WHERE user_name='LIAM0005'), 5.0, 'Basic PC Security', 'Security', 'Passwords, 2FA, backups.', 9, FALSE, 29, 4, 'Tech Support');

-- ---------- SEED: AVAILABILITY (ALL listings get availability) ----------
INSERT INTO Availability (service_id, day, start, end) VALUES
                                                           ((SELECT listing_id FROM Listings WHERE title='Intro to Python'), 'monday', '09:00:00','11:00:00'),
                                                           ((SELECT listing_id FROM Listings WHERE title='Intro to Python'), 'wednesday', '14:00:00','16:00:00'),
                                                           ((SELECT listing_id FROM Listings WHERE title='Git & GitHub Help'), 'tuesday', '09:00:00','10:30:00'),
                                                           ((SELECT listing_id FROM Listings WHERE title='Build a Simple Website'), 'thursday', '15:00:00','17:00:00'),
                                                           ((SELECT listing_id FROM Listings WHERE title='Music Theory Crash'), 'friday', '13:00:00','14:30:00'),
                                                           ((SELECT listing_id FROM Listings WHERE title='Data Structures Tutor'), 'monday', '09:00:00','11:00:00'),
                                                           ((SELECT listing_id FROM Listings WHERE title='Laptop Cleanup & Speedup'), 'saturday', '11:00:00','12:30:00'),
                                                           ((SELECT listing_id FROM Listings WHERE title='Unity Basics'), 'wednesday', '10:00:00','12:00:00'),
                                                           ((SELECT listing_id FROM Listings WHERE title='SQL Query Clinic'), 'tuesday', '17:00:00','18:30:00'),
                                                           ((SELECT listing_id FROM Listings WHERE title='Docker for Beginners'), 'monday', '09:00:00','11:00:00'),
                                                           ((SELECT listing_id FROM Listings WHERE title='Study Skills Tune-up'), 'sunday', '10:00:00','11:00:00'),
                                                           ((SELECT listing_id FROM Listings WHERE title='CSS Grid & Flexbox'), 'friday', '15:00:00','17:00:00'),
                                                           ((SELECT listing_id FROM Listings WHERE title='Basic PC Security'), 'saturday', '09:00:00','11:00:00');

-- ---------- SEED: REVIEWS (≥3 per listing, vary types) ----------
INSERT INTO Reviews (service_id, type, review) VALUES
-- Intro to Python
((SELECT listing_id FROM Listings WHERE title='Intro to Python'),'positive','Clear explanations and great pacing.'),
((SELECT listing_id FROM Listings WHERE title='Intro to Python'),'positive','Loved the hands-on challenges.'),
((SELECT listing_id FROM Listings WHERE title='Intro to Python'),'neutral','Good intro; wish it went deeper.'),
-- Git & GitHub Help
((SELECT listing_id FROM Listings WHERE title='Git & GitHub Help'),'positive','Rebased my fear away.'),
((SELECT listing_id FROM Listings WHERE title='Git & GitHub Help'),'positive','Super practical.'),
((SELECT listing_id FROM Listings WHERE title='Git & GitHub Help'),'negative','A bit fast for total beginners.'),
-- Build a Simple Website
((SELECT listing_id FROM Listings WHERE title='Build a Simple Website'),'positive','My first site is live!'),
((SELECT listing_id FROM Listings WHERE title='Build a Simple Website'),'neutral','Decent overview.'),
((SELECT listing_id FROM Listings WHERE title='Build a Simple Website'),'positive','Great CSS tips.'),
-- Music Theory Crash
((SELECT listing_id FROM Listings WHERE title='Music Theory Crash'),'positive','Chords finally make sense.'),
((SELECT listing_id FROM Listings WHERE title='Music Theory Crash'),'neutral','Helpful refresher.'),
((SELECT listing_id FROM Listings WHERE title='Music Theory Crash'),'positive','Engaging and fun.'),
-- Data Structures Tutor
((SELECT listing_id FROM Listings WHERE title='Data Structures Tutor'),'positive','Ace’d my exam.'),
((SELECT listing_id FROM Listings WHERE title='Data Structures Tutor'),'positive','Crystal-clear on trees.'),
((SELECT listing_id FROM Listings WHERE title='Data Structures Tutor'),'neutral','Challenging but rewarding.'),
-- Laptop Cleanup & Speedup
((SELECT listing_id FROM Listings WHERE title='Laptop Cleanup & Speedup'),'positive','My laptop boots twice as fast.'),
((SELECT listing_id FROM Listings WHERE title='Laptop Cleanup & Speedup'),'positive','Gentle and thorough.'),
((SELECT listing_id FROM Listings WHERE title='Laptop Cleanup & Speedup'),'neutral','Good basics.'),
-- Unity Basics
((SELECT listing_id FROM Listings WHERE title='Unity Basics'),'positive','Got my first scene running.'),
((SELECT listing_id FROM Listings WHERE title='Unity Basics'),'positive','Great starter tips.'),
((SELECT listing_id FROM Listings WHERE title='Unity Basics'),'negative','Audio section was brief.'),
-- SQL Query Clinic
((SELECT listing_id FROM Listings WHERE title='SQL Query Clinic'),'positive','Explains EXPLAIN!'),
((SELECT listing_id FROM Listings WHERE title='SQL Query Clinic'),'neutral','Wish for more indexing tricks.'),
((SELECT listing_id FROM Listings WHERE title='SQL Query Clinic'),'positive','Joins finally clicked.'),
-- Docker for Beginners
((SELECT listing_id FROM Listings WHERE title='Docker for Beginners'),'positive','Compose made easy.'),
((SELECT listing_id FROM Listings WHERE title='Docker for Beginners'),'positive','No more “works on my machine”.'),
((SELECT listing_id FROM Listings WHERE title='Docker for Beginners'),'neutral','Wanted Kubernetes teaser.'),
-- Study Skills Tune-up
((SELECT listing_id FROM Listings WHERE title='Study Skills Tune-up'),'positive','SPACED REP FTW.'),
((SELECT listing_id FROM Listings WHERE title='Study Skills Tune-up'),'neutral','Nice routines.'),
((SELECT listing_id FROM Listings WHERE title='Study Skills Tune-up'),'positive','Immediate improvements.'),
-- CSS Grid & Flexbox
((SELECT listing_id FROM Listings WHERE title='CSS Grid & Flexbox'),'positive','Layouts finally sane.'),
((SELECT listing_id FROM Listings WHERE title='CSS Grid & Flexbox'),'positive','Grid + Flex = ❤️'),
((SELECT listing_id FROM Listings WHERE title='CSS Grid & Flexbox'),'neutral','Could use more examples.'),
-- Basic PC Security
((SELECT listing_id FROM Listings WHERE title='Basic PC Security'),'positive','Backups saved me.'),
((SELECT listing_id FROM Listings WHERE title='Basic PC Security'),'positive','2FA everywhere now.'),
((SELECT listing_id FROM Listings WHERE title='Basic PC Security'),'neutral','Solid fundamentals.');

-- ---------- SEED: TRANSACTIONS (make Oliver’s history clear; use listing type as service_topic) ----------
-- Oliver as PROVIDER on his own listings
INSERT INTO TransactionHistory (service_id, service_title, service_topic, provider_id, booker_id, price, time) VALUES
                                                                                                                   ((SELECT listing_id FROM Listings WHERE title='Intro to Python'), 'Intro to Python', 'Tutoring', (SELECT id FROM Users WHERE user_name='WUTT0019'), (SELECT id FROM Users WHERE user_name='ALEX0001'), 5, NOW() - INTERVAL 20 DAY),
                                                                                                                   ((SELECT listing_id FROM Listings WHERE title='Git & GitHub Help'), 'Git & GitHub Help', 'Tech Support', (SELECT id FROM Users WHERE user_name='WUTT0019'), (SELECT id FROM Users WHERE user_name='MIA0002'), 3, NOW() - INTERVAL 14 DAY),
                                                                                                                   ((SELECT listing_id FROM Listings WHERE title='Build a Simple Website'), 'Build a Simple Website', 'Practical', (SELECT id FROM Users WHERE user_name='WUTT0019'), (SELECT id FROM Users WHERE user_name='NOAH0003'), 4, NOW() - INTERVAL 7 DAY);

-- Oliver as BOOKER on others’ listings
INSERT INTO TransactionHistory (service_id, service_title, service_topic, provider_id, booker_id, price, time) VALUES
                                                                                                                   ((SELECT listing_id FROM Listings WHERE title='Data Structures Tutor'), 'Data Structures Tutor', 'Tutoring', (SELECT id FROM Users WHERE user_name='LEWI0454'), (SELECT id FROM Users WHERE user_name='WUTT0019'), 5, NOW() - INTERVAL 26 DAY),
                                                                                                                   ((SELECT listing_id FROM Listings WHERE title='Unity Basics'), 'Unity Basics', 'Technical', (SELECT id FROM Users WHERE user_name='LEAR0022'), (SELECT id FROM Users WHERE user_name='WUTT0019'), 4, NOW() - INTERVAL 10 DAY),
                                                                                                                   ((SELECT listing_id FROM Listings WHERE title='Basic PC Security'), 'Basic PC Security', 'Tech Support', (SELECT id FROM Users WHERE user_name='LIAM0005'), (SELECT id FROM Users WHERE user_name='WUTT0019'), 5, NOW() - INTERVAL 3 DAY);

-- ---------- SEED: BOOKINGS (Oliver both provider & booker; mix pending/confirmed) ----------
-- Oliver PROVIDER: some currently being booked
INSERT INTO Bookings (booker_id, service_provider_id, start, end, service_id, status, provider_confirm, booker_confirm)
VALUES
    ((SELECT id FROM Users WHERE user_name='ALEX0001'), (SELECT id FROM Users WHERE user_name='WUTT0019'), NOW() + INTERVAL 2 DAY, NOW() + INTERVAL 2 DAY + INTERVAL 1 HOUR, (SELECT listing_id FROM Listings WHERE title='Intro to Python'), 'pending', FALSE, TRUE),
    ((SELECT id FROM Users WHERE user_name='MIA0002'), (SELECT id FROM Users WHERE user_name='WUTT0019'), NOW() + INTERVAL 4 DAY, NOW() + INTERVAL 4 DAY + INTERVAL 90 MINUTE, (SELECT listing_id FROM Listings WHERE title='Git & GitHub Help'), 'confirmed', TRUE, TRUE);

-- Oliver BOOKER: a pending and a confirmed
INSERT INTO Bookings (booker_id, service_provider_id, start, end, service_id, status, provider_confirm, booker_confirm)
VALUES
    ((SELECT id FROM Users WHERE user_name='WUTT0019'), (SELECT id FROM Users WHERE user_name='LEWI0454'), NOW() + INTERVAL 3 DAY, NOW() + INTERVAL 3 DAY + INTERVAL 2 HOUR, (SELECT listing_id FROM Listings WHERE title='Data Structures Tutor'), 'pending', FALSE, TRUE),
    ((SELECT id FROM Users WHERE user_name='WUTT0019'), (SELECT id FROM Users WHERE user_name='LEAR0022'), NOW() + INTERVAL 6 DAY, NOW() + INTERVAL 6 DAY + INTERVAL 2 HOUR, (SELECT listing_id FROM Listings WHERE title='Unity Basics'), 'confirmed', TRUE, TRUE);

-- (Optional) A couple more bookings across other listings for variety
INSERT INTO Bookings (booker_id, service_provider_id, start, end, service_id, status, provider_confirm, booker_confirm)
VALUES
    ((SELECT id FROM Users WHERE user_name='EMMA0006'), (SELECT id FROM Users WHERE user_name='LEWI0454'), NOW() + INTERVAL 1 DAY, NOW() + INTERVAL 1 DAY + INTERVAL 2 HOUR, (SELECT listing_id FROM Listings WHERE title='Data Structures Tutor'), 'confirmed', TRUE, TRUE),
    ((SELECT id FROM Users WHERE user_name='NOAH0003'), (SELECT id FROM Users WHERE user_name='LIAM0005'), NOW() + INTERVAL 5 DAY, NOW() + INTERVAL 5 DAY + INTERVAL 2 HOUR, (SELECT listing_id FROM Listings WHERE title='Basic PC Security'), 'pending', FALSE, TRUE);

-- ---------- (Optional) NOTIFICATIONS to illustrate flow ----------
INSERT INTO Notifications (user_id, type)
VALUES
    ((SELECT id FROM Users WHERE user_name='WUTT0019'), 'service_request'),
    ((SELECT id FROM Users WHERE user_name='WUTT0019'), 'accepted_request'),
    ((SELECT id FROM Users WHERE user_name='ALEX0001'), 'completed_service');


