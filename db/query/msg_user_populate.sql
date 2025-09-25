USE FUSS_DB;

INSERT INTO Users (user_name, email, hashed_password, f_name, l_name, bio, dob, is_admin, acc_status, role)
VALUES
    ('oliver','oliver@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Oliver','Wuttke','Hi, I am Oliver, testing FUSS.','2000-01-01',TRUE,1,'Admin'),
    ('hans','hans@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Hans','Zimmer','Music lover and producer.','1995-03-15',FALSE,1,'User'),
    ('luke','luke@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Luke','Skywalker','Aspiring Jedi trader.','1998-05-04',FALSE,1,'User'),
    ('seth','seth@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Seth','Rogan','Comedian exploring the platform.','1992-08-20',FALSE,1,'User');

INSERT INTO Friendships (user_id, friend_id, status)
VALUES
      (1,2,'accepted'),
      (1,3,'accepted'),
      (1,4,'accepted'),
      (2,3,'accepted'),
      (2,4,'accepted'),
      (3,4,'accepted');

# INSERT INTO Messages (sender_id, receiver_id, start_date, end_date, unseen)
# VALUES
#     (1,2,'2025-09-20 10:00:00','2025-09-20 10:30:00',0),
#     (2,1,'2025-09-21 09:00:00','2025-09-21 09:20:00',1),
#     (3,1,'2025-09-22 14:00:00','2025-09-22 14:10:00',0),
#     (4,1,'2025-09-23 18:00:00','2025-09-23 18:05:00',1);
#
# INSERT INTO ChatMessages (conversation_id, sender_id, message_text, sent_at)
# VALUES
#     (1,1,'Hey Hans, welcome to FUSS!','2025-09-20 10:01:00'),
#     (1,2,'Thanks Oliver, glad to join.','2025-09-20 10:05:00'),
#     (2,2,'Hi Oliver, I need help with my first listing.','2025-09-21 09:02:00'),
#     (2,1,'Sure Hans, I can walk you through.','2025-09-21 09:10:00'),
#     (3,3,'Hey Oliver, how do I negotiate prices?','2025-09-22 14:02:00'),
#     (3,1,'Hi Luke, check the ConsumerProducerRelationship feature.','2025-09-22 14:05:00'),
#     (4,4,'Hey Oliver, loving the platform so far!','2025-09-23 18:01:00');
