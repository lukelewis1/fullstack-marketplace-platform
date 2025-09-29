-- 25 users with admin as password
INSERT INTO Users (user_name,email,hashed_password,f_name,l_name,bio,dob,is_admin,acc_status,role,fuss_credit)
VALUES
    ('alice','alice@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Alice','Smith','Loves teaching math','2000-01-01',0,1,'student',15.5),
    ('bob','bob@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Bob','Johnson','Physics tutor','1998-02-14',0,1,'tutor',22.0),
    ('carol','carol@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Carol','Davis','Enjoys tech support','1999-03-30',0,1,'tech',30.0),
    ('dave','dave@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Dave','Miller','Web developer','1995-05-11',0,1,'tutor',40.0),
    ('eve','eve@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Eve','Brown','Design skills','1997-07-20',0,1,'life_skill',5.0),
    ('frank','frank@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Frank','Wilson','General handyman','1994-04-04',0,1,'practical',17.0),
    ('grace','grace@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Grace','Taylor','Music lessons','1996-08-08',0,1,'tutor',9.0),
    ('henry','henry@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Henry','Anderson','Data engineer','1995-09-01',0,1,'tech',11.0),
    ('irene','irene@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Irene','Thomas','Cooking classes','1992-10-12',0,1,'life_skill',35.0),
    ('jack','jack@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Jack','Moore','Tutor for algorithms','1990-12-22',0,1,'tutor',55.0),
    ('kate','kate@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Kate','Martin','DIY workshops','1993-03-17',0,1,'practical',19.0),
    ('leo','leo@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Leo','White','Linux support','1991-06-25',0,1,'tech',27.0),
    ('mia','mia@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Mia','Garcia','English tutor','1999-11-01',0,1,'tutor',8.0),
    ('nick','nick@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Nick','Clark','French lessons','1997-09-19',0,1,'tutor',14.0),
    ('olivia','olivia@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Olivia','Rodriguez','Photography','1998-07-23',0,1,'life_skill',42.0),
    ('peter','peter@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Peter','Lewis','Guitar lessons','1994-10-10',0,1,'tutor',23.0),
    ('quinn','quinn@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Quinn','Walker','Excel training','1992-05-05',0,1,'tech',6.0),
    ('ruby','ruby@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Ruby','Hall','Painting','1996-03-03',0,1,'life_skill',38.0),
    ('sam','sam@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Sam','Allen','Hardware repair','1993-12-15',0,1,'tech_support',33.0),
    ('tina','tina@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Tina','Young','Yoga teacher','1990-09-09',0,1,'life_skill',29.0),
    ('uma','uma@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Uma','Hernandez','Spanish tutor','1995-04-14',0,1,'tutor',31.0),
    ('victor','victor@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Victor','King','Carpentry','1991-01-01',0,1,'practical',16.0),
    ('wendy','wendy@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Wendy','Wright','Graphic design','1997-02-02',0,1,'life_skill',21.0),
    ('xavier','xavier@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Xavier','Lopez','JavaScript tutor','1994-03-12',0,1,'tech',44.0),
    ('yara','yara@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Yara','Hill','UI/UX mentor','1998-04-18',0,1,'tech',39.0);

-- Some friendships
INSERT INTO Friendships (user_id, friend_id, requester_id, status)
VALUES
    (1,2,1,'accepted'),
    (1,3,3,'pending'),
    (2,4,2,'accepted'),
    (5,6,5,'accepted'),
    (7,8,7,'accepted'),
    (9,10,9,'pending'),
    (11,12,11,'accepted'),
    (13,14,13,'accepted'),
    (15,16,15,'pending');

-- Some listings
INSERT INTO Listings (user_id, price, title, topic, description, successful_exchanges, is_negotiable, likes, dislikes, type)
VALUES
    (1,20,'Math Tutoring','Mathematics','Algebra and calculus sessions',5,1,10,0,'tutoring'),
    (2,15,'Physics Crash Course','Physics','High school physics help',3,0,5,1,'tutoring'),
    (3,30,'Computer Fix','Tech Support','I will fix your PC issues',10,1,25,2,'tech_support'),
    (4,50,'Web Dev Bootcamp','Programming','Learn HTML CSS JS',8,0,12,1,'technical'),
    (5,18,'Cooking 101','Cooking','Learn basic cooking skills',1,1,3,0,'life_skill'),
    (6,45,'Guitar Lessons','Music','Beginner guitar classes',6,1,14,0,'life_skill'),
    (7,10,'Yoga for Beginners','Health','Relax and stretch',2,0,7,0,'practical'),
    (8,35,'Data Engineering Basics','Data','Intro to pipelines',0,1,2,0,'technical'),
    (9,25,'Photography Tips','Photography','Basics of DSLR cameras',4,1,6,0,'life_skill'),
    (10,15,'Spanish Practice','Language','Conversational Spanish',5,1,9,0,'tutoring');

-- Availability for the above listings
INSERT INTO Availability (service_id, day, start, end) VALUES
                                                           (1,'monday','09:00:00','12:00:00'),
                                                           (1,'wednesday','14:00:00','17:00:00'),
                                                           (2,'tuesday','10:00:00','12:00:00'),
                                                           (3,'friday','13:00:00','18:00:00'),
                                                           (4,'thursday','09:00:00','11:00:00'),
                                                           (5,'saturday','15:00:00','18:00:00'),
                                                           (6,'sunday','10:00:00','12:00:00'),
                                                           (7,'monday','07:00:00','08:30:00'),
                                                           (8,'tuesday','09:00:00','11:30:00'),
                                                           (9,'wednesday','16:00:00','19:00:00'),
                                                           (10,'thursday','17:00:00','20:00:00');
