USE FUSS_DB;

INSERT INTO Users (id, user_name, email, hashed_password, f_name, l_name, bio, dob, is_admin, acc_status, role, fuss_credit)
VALUES
    (1, 'tester', 'tester@testing.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'tester', 'tester', '', '2000-01-01', FALSE, 1, 'Tester', 0),
    (2, 'tester2', 'tester2@testing.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'tester', 'tester', '', '2000-01-01', FALSE, 1, 'Tester', 0);

INSERT INTO Listings (user_id, price, title, topic, description, successful_exchanges, is_negotiable, type)
VALUES
    (2, 25.0, 'Test Coaching', 'Tutoring', 'A demo listing owned by tester2.', 0, TRUE, 'service');


INSERT INTO Availability (service_id, day, start, end)
VALUES
    (1, 'monday', '09:00:00', '11:00:00');

INSERT INTO Bookings (booker_id, service_provider_id, start, end, service_id, status, provider_confirm, booker_confirm)
VALUES
    (1, 2, '2025-10-21 09:00:00', '2025-10-21 11:00:00', 1, 'confirmed', TRUE, FALSE);


