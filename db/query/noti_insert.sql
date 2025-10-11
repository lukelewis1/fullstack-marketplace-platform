INSERT INTO Notifications (user_id, type)
VALUES
    -- Service requests
    (1, 'service_request'),
    (2, 'service_request'),
    (3, 'service_request'),

    -- Accepted requests
    (1, 'accepted_request'),
    (2, 'accepted_request'),
    (4, 'accepted_request'),

    -- Canceled requests
    (3, 'canceled_request'),
    (2, 'canceled_request'),
    (1, 'canceled_request'),

    -- Completed service confirmations
    (4, 'completed_service_confirm'),
    (1, 'completed_service_confirm'),
    (3, 'completed_service_confirm'),

    -- Completed services
    (2, 'completed_service'),
    (3, 'completed_service'),
    (4, 'completed_service'),

    -- Reviews
    (1, 'review'),
    (2, 'review'),
    (3, 'review'),
    (4, 'review');
