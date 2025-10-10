-- === LISTINGS ===
INSERT INTO Listings (user_id, price, title, topic, description, is_negotiable, type)
VALUES
    (2, 25.0, 'Piano Lessons', 'Music', 'Learn piano from scratch.', TRUE, 'Skill'),
    (2, 30.0, 'Music Composition', 'Music', 'Compose your first song.', TRUE, 'Skill'),
    (3, 50.0, 'Jedi Mindfulness Training', 'Meditation', 'Mindfulness and focus exercises.', FALSE, 'Skill'),
    (3, 40.0, 'Light Saber Maintenance', 'DIY', 'Maintain and tune your saber.', FALSE, 'Workshop'),
    (4, 20.0, 'Comedy Writing 101', 'Writing', 'Develop your comedic voice.', TRUE, 'Skill'),
    (4, 15.0, 'Stand-up Coaching', 'Comedy', 'Stage presence and delivery.', TRUE, 'Session'),
    (4, 10.0, 'Script Editing', 'Writing', 'Polish your script for performance.', FALSE, 'Service');

-- === TRANSACTION HISTORY FOR OLIVER ===
INSERT INTO TransactionHistory (service_id, service_title, service_topic, provider_id, booker_id, price)
VALUES
    -- Music: 3 times
    (1, 'Piano Lessons', 'Music', 2, 1, 25),
    (2, 'Music Composition', 'Music', 2, 1, 30),
    (1, 'Piano Lessons', 'Music', 2, 1, 25),

    -- Writing: 2 times
    (5, 'Comedy Writing 101', 'Writing', 4, 1, 20),
    (7, 'Script Editing', 'Writing', 4, 1, 10),

    -- Meditation: 1 time
    (3, 'Jedi Mindfulness Training', 'Meditation', 3, 1, 50);
