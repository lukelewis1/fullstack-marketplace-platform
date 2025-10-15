-- A script to be used during the presentation to populate the site
USE FUSS_DB;
SET sql_mode = ''; -- disable strict mode to prevent FK/default errors

-- ---------- USERS ----------
-- All users use SHA-256('admin'): 8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918
INSERT INTO Users (user_name, email, hashed_password, f_name, l_name, bio, dob, is_admin, acc_status, role, fuss_credit) VALUES
-- Admins
('tungsten','oliver@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Oliver','Wuttke','Builder of FUSS.','2001-01-01 00:00:00',TRUE,TRUE,'Computer Science',42.0),
('HansComposer','hans@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Hans','Zimmer','Music & code enjoyer.','1998-03-15 00:00:00',TRUE,TRUE,'Music Tech',15.5),
('SkyPilot','luke@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Luke','Walker','Tutor & tinkerer.','1999-07-07 00:00:00',TRUE,TRUE,'Software Eng',23.0),
('ForgeMaster','seth@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Seth','Stone','Practical skills person.','1997-11-11 00:00:00',TRUE,TRUE,'Mechanical Eng',11.0),

-- Students / general users
('ByteKnight','ava@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Ava','Nguyen','CS undergrad who loves KNN.','2003-02-02 00:00:00',FALSE,TRUE,'IT',8.0),
('CircuitSeeker','mason@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Mason','Lee','Electronics hobbyist.','2002-05-04 00:00:00',FALSE,TRUE,'Electrical Eng',5.0),
('AlgoRanger','mia@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Mia','Patel','Maths + ML.','2004-09-09 00:00:00',FALSE,TRUE,'Data Science',6.5),
('PixelPioneer','noah@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Noah','Brown','Design + FE dev.','2001-12-12 00:00:00',FALSE,TRUE,'HCI',9.0),
('StackSmith','emily@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Emily','Clark','Backend enjoyer.','2000-04-14 00:00:00',FALSE,TRUE,'Computer Science',7.0),
('CacheHunter','liam@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Liam','Wilson','Loves databases.','2002-08-21 00:00:00',FALSE,TRUE,'Information Sys',10.5),
('QuantumQuokka','sophia@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Sophia','Taylor','Tutor: stats.','2003-10-01 00:00:00',FALSE,TRUE,'Statistics',6.0),
('KernelKrafter','ethan@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Ethan','Harris','Linux wizard.','1999-06-06 00:00:00',FALSE,TRUE,'Cybersecurity',4.0),
('DataDruid','grace@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Grace','Hall','ETL & viz.','2001-03-03 00:00:00',FALSE,TRUE,'Analytics',13.0),
('BitBarista','jack@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Jack','Allen','Coffee + code.','1998-09-30 00:00:00',FALSE,TRUE,'Software Eng',2.0),
('MatrixMuse','isabella@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Isabella','Young','Linear algebra fan.','2000-02-29 00:00:00',FALSE,TRUE,'Mathematics',14.0),
('CacheKitten','olivia@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Olivia','King','Frontend tutor.','2004-05-05 00:00:00',FALSE,TRUE,'Design',3.0),
('ScriptSailor','william@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','William','Wright','Shell scripts.','1997-01-20 00:00:00',FALSE,TRUE,'IT',9.5),
('TensorTinker','charlotte@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Charlotte','Green','Intro ML tutor.','2003-07-17 00:00:00',FALSE,TRUE,'Data Science',12.0),
('NullNinja','james@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','James','Baker','Debug helper.','2002-10-10 00:00:00',FALSE,TRUE,'Software Eng',5.0),
('LambdaLancer','amelia@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Amelia','Adams','Functional fan.','2001-09-13 00:00:00',FALSE,TRUE,'Computer Science',8.5),
('PatchPanda','henry@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Henry','Carter','Sysadmin basics.','2000-01-05 00:00:00',FALSE,TRUE,'Cybersecurity',6.5),
('VectorVibe','ella@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Ella','Evans','Stats tutor.','2002-02-22 00:00:00',FALSE,TRUE,'Statistics',7.5),
('BugBard','alex@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Alex','Bell','QA + testing.','1999-09-09 00:00:00',FALSE,TRUE,'IT',4.5),
('HeapHacker','chloe@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Chloe','Mitchell','Pointers make sense!','2003-11-23 00:00:00',FALSE,TRUE,'Software Eng',5.5),
('ProtoPenguin','daniel@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Daniel','Phillips','Arduino builder.','2001-04-04 00:00:00',FALSE,TRUE,'Mechatronics',6.0),
('IndexImp','ruby@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Ruby','Turner','DB indexing nerd.','2000-10-28 00:00:00',FALSE,TRUE,'Information Sys',9.0),
('LintLurker','harry@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Harry','Scott','Code style cop.','2002-06-18 00:00:00',FALSE,TRUE,'Computer Science',3.5);

-- Helpful shorthands
SET @oliver := (SELECT id FROM Users WHERE f_name='Oliver');
SET @hans   := (SELECT id FROM Users WHERE f_name='Hans');
SET @luke   := (SELECT id FROM Users WHERE f_name='Luke');
SET @seth   := (SELECT id FROM Users WHERE f_name='Seth');

-- ---------- LISTINGS (credit ≤5) ----------
INSERT INTO Listings (user_id, price, title, topic, description, successful_exchanges, is_negotiable, likes, dislikes, type) VALUES
                                                                                                                                 (@hans,3.5,'Beginning Piano','Music','One-on-one piano basics.',0,TRUE,12,1,'Tutoring'),
                                                                                                                                 (@hans,5.0,'Home Studio Setup','Audio','Configure DAWs, interfaces, mics.',0,FALSE,9,2,'Technical'),
                                                                                                                                 (@hans,2.5,'Music Theory Crash','Theory','Intervals, chords, progressions.',0,TRUE,7,0,'Tutoring'),

                                                                                                                                 (@luke,3.0,'Frontend Debug Help','Web','I’ll debug HTML/CSS/JS issues.',0,TRUE,15,2,'Tech Support'),
                                                                                                                                 (@luke,4.5,'DS & Algo Tutoring','CS','Kahn/Kadane/BFS/DFS practice.',0,FALSE,18,3,'Tutoring'),
                                                                                                                                 (@luke,3.5,'React Component Clinic','React','Polish your components.',0,TRUE,11,1,'Technical'),

                                                                                                                                 (@seth,4.5,'3D Printer Calibration','Makers','Dial in your printer for perfect first layers.',0,TRUE,10,1,'Practical'),
                                                                                                                                 (@seth,5.0,'Bike Maintenance 101','Cycling','Tune gears, brakes & chain.',0,TRUE,8,0,'Life Skill'),
                                                                                                                                 (@seth,5.0,'CNC Basics','Workshop','CAM, feeds/speeds, workholding.',0,FALSE,6,2,'Technical'),

                                                                                                                                 (@oliver,4.0,'SQL for Students','Databases','Normalize, index, and query like a pro.',0,TRUE,20,1,'Tutoring'),
                                                                                                                                 (@oliver,2.5,'Laptop Cleanup','PC Care','Speed up your slow laptop.',0,TRUE,14,0,'Tech Support'),

                                                                                                                                 ((SELECT id FROM Users WHERE f_name='Ava'),2.0,'KNN Intuition Session','ML','Distance metrics & scaling.',0,TRUE,9,1,'Tutoring'),
                                                                                                                                 ((SELECT id FROM Users WHERE f_name='Mason'),3.5,'Soldering Practice','Electronics','Through-hole & simple SMD.',0,TRUE,7,1,'Practical'),
                                                                                                                                 ((SELECT id FROM Users WHERE f_name='Mia'),3.0,'Probability Primer','Math','Discrete & continuous basics.',0,TRUE,5,0,'Tutoring'),
                                                                                                                                 ((SELECT id FROM Users WHERE f_name='Noah'),2.8,'Portfolio Polish','Design','Colour, layout, typography.',0,TRUE,6,2,'Technical'),
                                                                                                                                 ((SELECT id FROM Users WHERE f_name='Emily'),4.5,'REST API Review','Backend','Endpoints, auth, pagination.',0,FALSE,8,0,'Technical'),
                                                                                                                                 ((SELECT id FROM Users WHERE f_name='Liam'),2.2,'SQL Query Tuning','DB','Indexes & EXPLAIN.',0,TRUE,10,1,'Technical'),
                                                                                                                                 ((SELECT id FROM Users WHERE f_name='Sophia'),3.2,'Stats Tutoring','Stats','Variance, bias, CIs.',0,TRUE,12,2,'Tutoring'),
                                                                                                                                 ((SELECT id FROM Users WHERE f_name='Ethan'),3.8,'Linux Basics','SysAdmin','Shell, users, services.',0,TRUE,10,0,'Life Skill'),
                                                                                                                                 ((SELECT id FROM Users WHERE f_name='Grace'),2.7,'ETL Basics','Data','From CSV to dashboard.',0,TRUE,7,1,'Technical'),
                                                                                                                                 ((SELECT id FROM Users WHERE f_name='Jack'),1.2,'Perfect Coffee @ Home','Life','Grind size, ratio, brew.',0,TRUE,9,4,'Life Skill'),
                                                                                                                                 ((SELECT id FROM Users WHERE f_name='Isabella'),3.4,'Linear Algebra Help','Math','Vectors, matrices, eigenthings.',0,TRUE,13,1,'Tutoring'),
                                                                                                                                 ((SELECT id FROM Users WHERE f_name='Olivia'),2.6,'CSS Layout Tricks','Web','Grid & Flexbox.',0,TRUE,8,2,'Technical'),
                                                                                                                                 ((SELECT id FROM Users WHERE f_name='William'),1.8,'Shell Scripting 101','CLI','Automate your chores.',0,TRUE,6,0,'Technical'),
                                                                                                                                 ((SELECT id FROM Users WHERE f_name='Charlotte'),2.9,'Intro ML Mentoring','ML','Models and metrics.',0,TRUE,10,1,'Tutoring'),
                                                                                                                                 ((SELECT id FROM Users WHERE f_name='James'),2.4,'Debugging Buddy','General','Rubber duck sessions.',0,TRUE,5,0,'Practical'),
                                                                                                                                 ((SELECT id FROM Users WHERE f_name='Amelia'),3.1,'FP Concepts','PL','Map, reduce, compose.',0,TRUE,6,1,'Technical'),
                                                                                                                                 ((SELECT id FROM Users WHERE f_name='Henry'),2.2,'Home Network Basics','NetOps','Routers, DHCP, Wi-Fi.',0,TRUE,7,2,'Tech Support'),
                                                                                                                                 ((SELECT id FROM Users WHERE f_name='Ella'),2.8,'Regression Clinic','Stats','From OLS to diagnostics.',0,TRUE,9,0,'Tutoring'),
                                                                                                                                 ((SELECT id FROM Users WHERE f_name='Alex'),2.0,'Write Test Cases','QA','Unit, integration, E2E.',0,TRUE,5,1,'Technical'),
                                                                                                                                 ((SELECT id FROM Users WHERE f_name='Chloe'),3.3,'C++ Pointers Workshop','C++','Refs, pointers, RAII.',0,FALSE,8,3,'Technical'),
                                                                                                                                 ((SELECT id FROM Users WHERE f_name='Daniel'),3.6,'Arduino Starter','IoT','Blink to sensors.',0,TRUE,6,1,'Practical'),
                                                                                                                                 ((SELECT id FROM Users WHERE f_name='Ruby'),2.3,'Indexing Deep Dive','DB','B-Trees, hash, covering.',0,TRUE,7,0,'Technical'),
                                                                                                                                 ((SELECT id FROM Users WHERE f_name='Harry'),1.9,'Code Style Clinic','Style','Linters & formatters.',0,TRUE,4,0,'Technical');

-- ---------- AVAILABILITY ----------
INSERT INTO Availability (service_id, day, start, end) VALUES
                                                           ((SELECT listing_id FROM Listings WHERE title='Beginning Piano' LIMIT 1),'tuesday','15:00:00','17:00:00'),
                                                           ((SELECT listing_id FROM Listings WHERE title='Beginning Piano' LIMIT 1),'friday','10:00:00','12:00:00'),
                                                           ((SELECT listing_id FROM Listings WHERE title='DS & Algo Tutoring' LIMIT 1),'wednesday','13:00:00','15:00:00'),
                                                           ((SELECT listing_id FROM Listings WHERE title='Bike Maintenance 101' LIMIT 1),'saturday','09:00:00','12:00:00'),
                                                           ((SELECT listing_id FROM Listings WHERE title='SQL for Students' LIMIT 1),'thursday','16:00:00','18:00:00');

-- ---------- TRANSACTION HISTORY (price ≤5) ----------
INSERT INTO TransactionHistory (service_title, service_topic, provider_id, booker_id, price, time) VALUES
                                                                                                       ('Beginning Piano','Music',@hans,@oliver,3.5,NOW()-INTERVAL 60 DAY),
                                                                                                       ('Home Studio Setup','Audio',@hans,@oliver,5.0,NOW()-INTERVAL 55 DAY),
                                                                                                       ('Music Theory Crash','Theory',@hans,@oliver,2.5,NOW()-INTERVAL 54 DAY),
                                                                                                       ('Frontend Debug Help','Web',@luke,@oliver,3.0,NOW()-INTERVAL 48 DAY),
                                                                                                       ('DS & Algo Tutoring','CS',@luke,@oliver,4.5,NOW()-INTERVAL 47 DAY),
                                                                                                       ('React Component Clinic','React',@luke,@oliver,3.5,NOW()-INTERVAL 40 DAY),
                                                                                                       ('3D Printer Calibration','Makers',@seth,@oliver,4.5,NOW()-INTERVAL 38 DAY),
                                                                                                       ('Bike Maintenance 101','Cycling',@seth,@oliver,5.0,NOW()-INTERVAL 35 DAY),
                                                                                                       ('CNC Basics','Workshop',@seth,@oliver,5.0,NOW()-INTERVAL 34 DAY),
                                                                                                       ('KNN Intuition Session','ML',(SELECT user_id FROM Listings WHERE title='KNN Intuition Session'),@oliver,2.0,NOW()-INTERVAL 33 DAY),
                                                                                                       ('Soldering Practice','Electronics',(SELECT user_id FROM Listings WHERE title='Soldering Practice'),@oliver,3.5,NOW()-INTERVAL 32 DAY),
                                                                                                       ('Probability Primer','Math',(SELECT user_id FROM Listings WHERE title='Probability Primer'),@oliver,3.0,NOW()-INTERVAL 31 DAY),
                                                                                                       ('Portfolio Polish','Design',(SELECT user_id FROM Listings WHERE title='Portfolio Polish'),@oliver,2.8,NOW()-INTERVAL 30 DAY),
                                                                                                       ('REST API Review','Backend',(SELECT user_id FROM Listings WHERE title='REST API Review'),@oliver,4.5,NOW()-INTERVAL 29 DAY),
                                                                                                       ('Stats Tutoring','Stats',(SELECT user_id FROM Listings WHERE title='Stats Tutoring'),@oliver,3.2,NOW()-INTERVAL 28 DAY),
                                                                                                       ('Linux Basics','SysAdmin',(SELECT user_id FROM Listings WHERE title='Linux Basics'),@oliver,3.8,NOW()-INTERVAL 27 DAY),
                                                                                                       ('ETL Basics','Data',(SELECT user_id FROM Listings WHERE title='ETL Basics'),@oliver,2.7,NOW()-INTERVAL 26 DAY),
                                                                                                       ('Perfect Coffee @ Home','Life',(SELECT user_id FROM Listings WHERE title='Perfect Coffee @ Home'),@oliver,1.2,NOW()-INTERVAL 25 DAY),
                                                                                                       ('Linear Algebra Help','Math',(SELECT user_id FROM Listings WHERE title='Linear Algebra Help'),@oliver,3.4,NOW()-INTERVAL 24 DAY),
                                                                                                       ('SQL for Students','Databases',@oliver,@hans,4.0,NOW()-INTERVAL 20 DAY),
                                                                                                       ('SQL for Students','Databases',@oliver,@luke,4.0,NOW()-INTERVAL 19 DAY),
                                                                                                       ('Laptop Cleanup','PC Care',@oliver,@seth,2.5,NOW()-INTERVAL 18 DAY),
                                                                                                       ('SQL for Students','Databases',@oliver,(SELECT id FROM Users WHERE f_name='Ava'),4.0,NOW()-INTERVAL 17 DAY),
                                                                                                       ('Laptop Cleanup','PC Care',@oliver,(SELECT id FROM Users WHERE f_name='Mia'),2.5,NOW()-INTERVAL 16 DAY),
                                                                                                       ('Frontend Debug Help','Web',@luke,@hans,3.0,NOW()-INTERVAL 15 DAY),
                                                                                                       ('3D Printer Calibration','Makers',@seth,@hans,4.5,NOW()-INTERVAL 14 DAY),
                                                                                                       ('Home Studio Setup','Audio',@hans,@luke,5.0,NOW()-INTERVAL 13 DAY),
                                                                                                       ('Bike Maintenance 101','Cycling',@seth,@luke,5.0,NOW()-INTERVAL 12 DAY),
                                                                                                       ('CNC Basics','Workshop',@seth,(SELECT id FROM Users WHERE f_name='Emily'),5.0,NOW()-INTERVAL 11 DAY),
                                                                                                       ('React Component Clinic','React',@luke,(SELECT id FROM Users WHERE f_name='Liam'),3.5,NOW()-INTERVAL 10 DAY),
                                                                                                       ('Beginning Piano','Music',@hans,(SELECT id FROM Users WHERE f_name='Chloe'),3.5,NOW()-INTERVAL 9 DAY);

-- Update successful exchanges to match counts
UPDATE Listings L
    JOIN (SELECT provider_id, service_title, COUNT(*) AS c FROM TransactionHistory GROUP BY provider_id, service_title) T
    ON T.provider_id = L.user_id AND T.service_title = L.title
SET L.successful_exchanges = T.c;

-- ---------- REVIEWS ----------
INSERT INTO Reviews (service_id, type, review)
SELECT listing_id,
       CASE (listing_id % 3)
           WHEN 0 THEN 'positive'
           WHEN 1 THEN 'neutral'
           ELSE 'negative'
           END AS type_choice,
       CONCAT('Auto-review for ', title, ' (listing ', listing_id, ').')
FROM Listings;

INSERT INTO Reviews (service_id, type, review) VALUES
                                                   ((SELECT listing_id FROM Listings WHERE title='SQL for Students'),'positive','Clear explanations and great pacing.'),
                                                   ((SELECT listing_id FROM Listings WHERE title='Beginning Piano'),'positive','Patient and motivating.'),
                                                   ((SELECT listing_id FROM Listings WHERE title='DS & Algo Tutoring'),'positive','Helped me crack tricky DP problems.'),
                                                   ((SELECT listing_id FROM Listings WHERE title='3D Printer Calibration'),'positive','Dialed in perfectly — first layer magic!');

-- ---------- FRIENDSHIPS ----------
SET @ids_4 := CONCAT_WS(',', @oliver, @hans, @luke, @seth);
INSERT INTO Friendships (user_id, friend_id, requester_id, status) VALUES
                                                                       (LEAST(@oliver,@hans),GREATEST(@oliver,@hans),@oliver,'accepted'),
                                                                       (LEAST(@oliver,@luke),GREATEST(@oliver,@luke),@luke,'accepted'),
                                                                       (LEAST(@oliver,@seth),GREATEST(@oliver,@seth),@seth,'accepted'),
                                                                       (LEAST(@hans,@luke),GREATEST(@hans,@luke),@hans,'accepted'),
                                                                       (LEAST(@hans,@seth),GREATEST(@hans,@seth),@seth,'accepted'),
                                                                       (LEAST(@luke,@seth),GREATEST(@luke,@seth),@luke,'accepted'),
                                                                       ((SELECT id FROM Users WHERE f_name='Ava'),(SELECT id FROM Users WHERE f_name='Mia'),(SELECT id FROM Users WHERE f_name='Ava'),'accepted'),
                                                                       ((SELECT id FROM Users WHERE f_name='Emily'),(SELECT id FROM Users WHERE f_name='Liam'),(SELECT id FROM Users WHERE f_name='Emily'),'accepted'),
                                                                       ((SELECT id FROM Users WHERE f_name='Grace'),(SELECT id FROM Users WHERE f_name='Sophia'),(SELECT id FROM Users WHERE f_name='Grace'),'accepted');

-- ---------- MESSAGES ----------
INSERT INTO Messages (sender_id, receiver_id, start_date, end_date, unseen, unseen_2) VALUES
                                                                                          (@oliver,@hans,NOW()-INTERVAL 5 DAY,NOW()-INTERVAL 4 DAY,0,0),
                                                                                          (@oliver,@luke,NOW()-INTERVAL 4 DAY,NOW()-INTERVAL 3 DAY,1,0),
                                                                                          (@oliver,@seth,NOW()-INTERVAL 3 DAY,NOW()-INTERVAL 2 DAY,0,2),
                                                                                          (@hans,@luke,NOW()-INTERVAL 6 DAY,NOW()-INTERVAL 5 DAY,0,0),
                                                                                          ((SELECT id FROM Users WHERE f_name='Emily'),(SELECT id FROM Users WHERE f_name='Liam'),NOW()-INTERVAL 2 DAY,NOW()-INTERVAL 1 DAY,0,1);

INSERT INTO ChatMessages (conversation_id, sender_id, message_text, sent_at) VALUES
                                                                                 ((SELECT conversation_id FROM Messages WHERE sender_id=@oliver AND receiver_id=@hans LIMIT 1),@oliver,'Hey Hans, can you review my studio chain?',NOW()-INTERVAL 5 DAY),
                                                                                 ((SELECT conversation_id FROM Messages WHERE sender_id=@oliver AND receiver_id=@hans LIMIT 1),@hans,'Sure — send me your plugins list.',NOW()-INTERVAL 5 DAY + INTERVAL 1 HOUR),
                                                                                 ((SELECT conversation_id FROM Messages WHERE sender_id=@oliver AND receiver_id=@luke LIMIT 1),@oliver,'Got a React prop drilling issue.',NOW()-INTERVAL 4 DAY),
                                                                                 ((SELECT conversation_id FROM Messages WHERE sender_id=@oliver AND receiver_id=@luke LIMIT 1),@luke,'Try context or a composition pattern.',NOW()-INTERVAL 4 DAY + INTERVAL 2 HOUR),
                                                                                 ((SELECT conversation_id FROM Messages WHERE sender_id=@oliver AND receiver_id=@seth LIMIT 1),@seth,'I can help tune your printer belts.',NOW()-INTERVAL 3 DAY),
                                                                                 ((SELECT conversation_id FROM Messages WHERE sender_id=@oliver AND receiver_id=@seth LIMIT 1),@oliver,'Legend, thanks!',NOW()-INTERVAL 3 DAY + INTERVAL 90 MINUTE),
                                                                                 ((SELECT conversation_id FROM Messages WHERE sender_id=@hans AND receiver_id=@luke LIMIT 1),@hans,'Any tips for async in JS?',NOW()-INTERVAL 6 DAY),
                                                                                 ((SELECT conversation_id FROM Messages WHERE sender_id=@hans AND receiver_id=@luke LIMIT 1),@luke,'Promises/await — keep it clean.',NOW()-INTERVAL 6 DAY + INTERVAL 1 HOUR),
                                                                                 ((SELECT conversation_id FROM Messages WHERE sender_id=(SELECT id FROM Users WHERE f_name='Emily') AND receiver_id=(SELECT id FROM Users WHERE f_name='Liam') LIMIT 1),
                                                                                  (SELECT id FROM Users WHERE f_name='Emily'),'DB is slow — index advice?',NOW()-INTERVAL 2 DAY),
                                                                                 ((SELECT conversation_id FROM Messages WHERE sender_id=(SELECT id FROM Users WHERE f_name='Emily') AND receiver_id=(SELECT id FROM Users WHERE f_name='Liam') LIMIT 1),
                                                                                  (SELECT id FROM Users WHERE f_name='Liam'),'Covering index on (status, created_at).',NOW()-INTERVAL 2 DAY + INTERVAL 45 MINUTE);

-- ---------- BOOKINGS ----------
SET @piano := (SELECT listing_id FROM Listings WHERE title='Beginning Piano');
SET @studio := (SELECT listing_id FROM Listings WHERE title='Home Studio Setup');
SET @dsalgo := (SELECT listing_id FROM Listings WHERE title='DS & Algo Tutoring');
SET @reactcl := (SELECT listing_id FROM Listings WHERE title='React Component Clinic');
SET @bike := (SELECT listing_id FROM Listings WHERE title='Bike Maintenance 101');
SET @calib := (SELECT listing_id FROM Listings WHERE title='3D Printer Calibration');
SET @sql := (SELECT listing_id FROM Listings WHERE title='SQL for Students');
SET @cleanup := (SELECT listing_id FROM Listings WHERE title='Laptop Cleanup');

INSERT INTO Bookings (booker_id, service_provider_id, start, end, service_id, status, provider_confirm, booker_confirm) VALUES
                                                                                                                            (@oliver,(SELECT user_id FROM Listings WHERE listing_id=@piano),NOW()+INTERVAL 1 DAY,NOW()+INTERVAL 1 DAY + INTERVAL 1 HOUR,@piano,'pending',FALSE,FALSE),
                                                                                                                            (@oliver,(SELECT user_id FROM Listings WHERE listing_id=@dsalgo),NOW()+INTERVAL 2 DAY,NOW()+INTERVAL 2 DAY + INTERVAL 2 HOUR,@dsalgo,'pending',TRUE,FALSE),
                                                                                                                            (@oliver,(SELECT user_id FROM Listings WHERE listing_id=@bike),NOW()+INTERVAL 3 DAY,NOW()+INTERVAL 3 DAY + INTERVAL 2 HOUR,@bike,'confirmed',TRUE,TRUE),
                                                                                                                            (@oliver,(SELECT user_id FROM Listings WHERE listing_id=@reactcl),NOW()+INTERVAL 4 DAY,NOW()+INTERVAL 4 DAY + INTERVAL 90 MINUTE,@reactcl,'confirmed',TRUE,TRUE),
                                                                                                                            (@oliver,(SELECT user_id FROM Listings WHERE listing_id=@calib),NOW()+INTERVAL 5 DAY,NOW()+INTERVAL 5 DAY + INTERVAL 2 HOUR,@calib,'pending',FALSE,TRUE),
                                                                                                                            ((SELECT id FROM Users WHERE f_name='Luke'),@hans,NOW()+INTERVAL 1 DAY,NOW()+INTERVAL 1 DAY + INTERVAL 1 HOUR,@piano,'confirmed',TRUE,TRUE),
                                                                                                                            (@hans,(SELECT user_id FROM Listings WHERE listing_id=@reactcl),NOW()+INTERVAL 2 DAY,NOW()+INTERVAL 2 DAY + INTERVAL 1 HOUR,@reactcl,'pending',TRUE,FALSE),
                                                                                                                            ((SELECT id FROM Users WHERE f_name='Seth'),@luke,NOW()+INTERVAL 6 DAY,NOW()+INTERVAL 6 DAY + INTERVAL 2 HOUR,@dsalgo,'pending',FALSE,FALSE),
                                                                                                                            (@luke,@hans,NOW()+INTERVAL 7 DAY,NOW()+INTERVAL 7 DAY + INTERVAL 2 HOUR,@studio,'confirmed',TRUE,TRUE),
                                                                                                                            (@seth,@oliver,NOW()+INTERVAL 8 DAY,NOW()+INTERVAL 8 DAY + INTERVAL 2 HOUR,@sql,'confirmed',TRUE,TRUE),
                                                                                                                            ((SELECT id FROM Users WHERE f_name='Ava'),@luke,NOW()+INTERVAL 9 DAY,NOW()+INTERVAL 9 DAY + INTERVAL 1 HOUR,@dsalgo,'pending',TRUE,FALSE),
                                                                                                                            ((SELECT id FROM Users WHERE f_name='Emily'),@seth,NOW()+INTERVAL 10 DAY,NOW()+INTERVAL 10 DAY + INTERVAL 2 HOUR,@calib,'confirmed',TRUE,TRUE),
                                                                                                                            ((SELECT id FROM Users WHERE f_name='Liam'),@oliver,NOW()+INTERVAL 11 DAY,NOW()+INTERVAL 11 DAY + INTERVAL 1 HOUR,@sql,'pending',FALSE,TRUE),
                                                                                                                            ((SELECT id FROM Users WHERE f_name='Mia'),@hans,NOW()+INTERVAL 12 DAY,NOW()+INTERVAL 12 DAY + INTERVAL 1 HOUR,@piano,'confirmed',TRUE,TRUE);

-- ---------- FINAL CHECK ----------
UPDATE Listings L
    JOIN (SELECT provider_id, service_title, COUNT(*) AS c FROM TransactionHistory GROUP BY provider_id, service_title) T
    ON T.provider_id=L.user_id AND T.service_title=L.title
SET L.successful_exchanges=T.c;
