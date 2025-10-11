INSERT INTO Notifications (user_id, type, seen)
VALUES
    -- Service requests (unseen)
    (1, 'service_request', FALSE),
    (2, 'service_request', FALSE),
    (3, 'service_request', FALSE),

    -- Accepted requests (some seen)
    (1, 'accepted_request', TRUE),
    (2, 'accepted_request', FALSE),
    (4, 'accepted_request', TRUE),

    -- Completed service confirmations (mixed)
    (4, 'completed_service_confirm', FALSE),
    (1, 'completed_service_confirm', TRUE),
    (3, 'completed_service_confirm', FALSE),

    -- Completed services (some seen)
    (2, 'completed_service', TRUE),
    (3, 'completed_service', FALSE),
    (4, 'completed_service', TRUE),

    -- Reviews (mixed)
    (1, 'review', FALSE),
    (2, 'review', TRUE),
    (3, 'review', FALSE),
    (4, 'review', TRUE);

