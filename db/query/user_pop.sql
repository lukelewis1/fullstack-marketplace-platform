USE FUSS_DB;

INSERT INTO Users (user_name, email, hashed_password, f_name, l_name, bio, dob, is_admin, acc_status, role, fuss_credit)
VALUES
    ('Oliver','oliver@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Oliver','Wuttke','Hi, I am Oliver, testing FUSS.','2000-01-01',TRUE,1,'Admin', 5),
    ('Hans','hans@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Hans','Zimmer','Music lover and producer.','1995-03-15',FALSE,1,'User', 5),
    ('Luke','luke@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Luke','Skywalker','Aspiring Jedi trader.','1998-05-04',FALSE,1,'User', 5),
    ('Seth','seth@example.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Seth','Rogan','Comedian exploring the platform.','1992-08-20',FALSE,1,'User', 5);

