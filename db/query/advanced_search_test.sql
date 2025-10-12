USE FUSS_DB;

INSERT INTO Listings (user_id, price, title, topic, description, successful_exchanges, is_negotiable, likes, dislikes, type)
VALUES
-- Programming & Tech (Oliver)
(1, 25.0, 'Python Tutoring', 'Programming', 'Learn Python basics and automation scripting.', 10, TRUE, 20, 3, 'Tutoring'),
(1, 40.0, 'C++ Masterclass', 'Programming', 'Advanced C++ for performance-critical systems.', 8, FALSE, 35, 2, 'Technical'),
(1, 30.0, 'Web Development Basics', 'Programming', 'HTML, CSS, JS fundamentals for beginners.', 12, TRUE, 18, 1, 'Tutoring'),
(1, 45.0, 'SQL Database Design', 'Programming', 'Normalization, schema design, and indexing.', 6, TRUE, 25, 3, 'Technical'),
(1, 20.0, 'Linux Command Line', 'Programming', 'Master shell commands, bash scripting, and system tools.', 15, TRUE, 17, 2, 'Tech Support'),

-- Music (Hans)
(2, 35.0, 'Guitar Lessons', 'Music', 'Acoustic and electric guitar for all levels.', 8, TRUE, 30, 1, 'Practical'),
(2, 25.0, 'Piano for Beginners', 'Music', 'Learn to play simple pieces and scales.', 5, TRUE, 18, 4, 'Tutoring'),
(2, 50.0, 'Music Production', 'Music', 'Mixing and mastering tracks in Ableton.', 9, FALSE, 40, 5, 'Technical'),
(2, 30.0, 'Drum Techniques', 'Music', 'Improve rhythm and timing with guided practice.', 6, TRUE, 10, 0, 'Practical'),

-- Fitness (Luke)
(3, 30.0, 'Personal Training', 'Fitness', 'Custom training plans and nutrition advice.', 15, FALSE, 50, 4, 'Life Skill'),
(3, 20.0, 'Yoga Classes', 'Fitness', 'Guided vinyasa and balance exercises.', 8, TRUE, 22, 3, 'Life Skill'),
(3, 25.0, 'Boxing Fundamentals', 'Fitness', 'Learn defense, stance, and combinations.', 9, TRUE, 19, 2, 'Practical'),
(3, 35.0, 'Marathon Training', 'Fitness', 'Structured running programs for all levels.', 4, TRUE, 16, 1, 'Life Skill'),

-- Art & Tutoring (Seth)
(4, 28.0, 'Digital Illustration', 'Art', 'Procreate and Photoshop drawing techniques.', 10, TRUE, 23, 2, 'Practical'),
(4, 22.0, 'Oil Painting Basics', 'Art', 'Learn blending, brush control, and color mixing.', 7, TRUE, 15, 0, 'Life Skill'),
(4, 20.0, 'Photography Workshop', 'Art', 'Lighting and composition for portraits.', 5, TRUE, 12, 1, 'Practical'),
(4, 30.0, 'High School Math Tutoring', 'Tutoring', 'Algebra, geometry, and calculus help.', 11, TRUE, 26, 3, 'Tutoring'),
(4, 18.0, 'Essay Writing Help', 'Tutoring', 'Improve structure, flow, and academic style.', 13, TRUE, 17, 1, 'Tutoring'),
(4, 20.0, 'Gardening Basics', 'Lifestyle', 'Plant care, soil prep, and sustainable practices.', 9, TRUE, 14, 2, 'Life Skill'),
(4, 15.0, 'Cooking 101', 'Lifestyle', 'Basic cooking skills and recipes for beginners.', 5, TRUE, 8, 0, 'Life Skill');

INSERT INTO Availability (service_id, day, start, end)
VALUES
-- 1–5 (Programming)
(1, 'monday', '09:00:00', '12:00:00'),
(2, 'tuesday', '13:00:00', '17:00:00'),
(3, 'wednesday', '10:00:00', '13:00:00'),
(4, 'thursday', '09:30:00', '11:30:00'),
(5, 'friday', '14:00:00', '17:00:00'),

-- 6–9 (Music)
(6, 'monday', '15:00:00', '18:00:00'),
(7, 'tuesday', '10:00:00', '12:00:00'),
(8, 'friday', '16:00:00', '19:00:00'),
(9, 'saturday', '11:00:00', '14:00:00'),

-- 10–13 (Fitness)
(10, 'wednesday', '07:00:00', '10:00:00'),
(11, 'monday', '18:00:00', '20:00:00'),
(12, 'thursday', '08:00:00', '10:30:00'),
(13, 'saturday', '06:00:00', '08:00:00'),

-- 14–20 (Art, Tutoring, Lifestyle)
(14, 'tuesday', '09:00:00', '11:00:00'),
(15, 'wednesday', '13:00:00', '15:00:00'),
(16, 'friday', '10:00:00', '12:00:00'),
(17, 'sunday', '09:00:00', '11:00:00'),
(18, 'saturday', '10:00:00', '12:00:00'),
(19, 'thursday', '14:00:00', '17:00:00'),
(20, 'sunday', '16:00:00', '19:00:00');
