USE FUSS_DB;

INSERT INTO Users (user_name, email, hashed_password, f_name, l_name, bio, dob, is_admin, acc_status, role, fuss_credit)
VALUES
    ('Alice','alice@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Alice','Wonderland','Adventurer exploring the platform.','1997-07-12',FALSE,1,'User',5),
    ('Bruce','bruce@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Bruce','Wayne','Businessman and night enthusiast.','1988-02-19',FALSE,1,'User',5),
    ('Clark','clark@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Clark','Kent','Journalist looking for new skills.','1990-06-18',FALSE,1,'User',5),
    ('Diana','diana@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Diana','Prince','Explorer of learning opportunities.','1992-12-01',FALSE,1,'User',5),
    ('Ethan','ethan@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Ethan','Hunt','Thrill seeker and skill builder.','1993-03-23',FALSE,1,'User',5),
    ('Fiona','fiona@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Fiona','Shaw','Loves music and networking.','1994-09-30',FALSE,1,'User',5),
    ('George','george@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','George','Martin','Writer looking to share knowledge.','1985-11-11',FALSE,1,'User',5),
    ('Hannah','hannah@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Hannah','Lee','Student ready to learn and teach.','2001-04-25',FALSE,1,'User',5),
    ('Ian','ian@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Ian','Curtis','Music enthusiast and lifelong learner.','1996-01-13',FALSE,1,'User',5),
    ('Julia','julia@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Julia','Roberts','Creative exploring the platform.','1989-10-02',FALSE,1,'User',5);
