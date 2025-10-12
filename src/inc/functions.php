<?php
//<!-- Authored by Hans Pujalte, FAN puja0009, Edited by (Oliver Wuttke, FAN WUTT0019), (Hans Pujalte, FAN puja0009), (Luke Lewis, lewi0454) -->

// Include the appropriate header based on user role
function include_header($username) {
    global $conn;

    if (!$username) {
        include 'user_header.php';
        return;
    }

    $sql = "SELECT is_admin FROM Users WHERE user_name = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 's', $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);

    include ($row && (int)$row['is_admin'] === 1)
        ? 'admin_header.php'
        : 'user_header.php';
}

// Function to get profile image path using username
function get_profile_image($username) {
    global $conn;

    if ($username) {
        $sql = "SELECT id FROM Users WHERE user_name = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 's', $username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $id);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);

        if (!empty($id)) {
            $img = "../images/user_pfp/{$id}.png"; // Handle different file types
        }
    }
    return $img;
}

// Function to get user role using userid
function get_role($userid){
    global $conn;

    if ($userid) {
        $sql = "SELECT role FROM Users WHERE user_name = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 's', $userid);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $role);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);
        return $role ?? 'Student'; // fallback if role is null
    } else {
        return 'Student';
    }

}

// Function which returns the user_id for a given username
function get_uid($username) {
    global $conn;

    $sql = 'SELECT id FROM Users WHERE user_name = ?;';
    $statement = $conn->prepare($sql);
    $statement->bind_param('s', $username);
    $statement->execute();
    $statement->bind_result($uid);
    $statement->fetch();
    $statement->close();

    return $uid;
}

// Function that returns the booker id for a given booking id
function get_booker($bid): int {
    global $conn;

    $sql = "SELECT booker_id FROM Bookings WHERE booking_id = ?;";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $bid);
    $stmt->execute();
    $stmt->bind_result($booker);
    $stmt->fetch();
    $stmt->close();

    return $booker;
}

// Function that returns the provider id for a given booking id
function get_provider($bid): int {
    global $conn;

    $sql = "SELECT service_provider_id FROM Bookings WHERE booking_id = ?;";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $bid);
    $stmt->execute();
    $stmt->bind_result($provider);
    $stmt->fetch();
    $stmt->close();

    return $provider;
}

// Function to return uid based on a listing id
function get_uid_listing($lid): int {
    global $conn;

    $sql = "SELECT user_id FROM Listings WHERE listing_id = ?;";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $lid);
    $stmt->execute();
    $stmt->bind_result($uid);
    $stmt->fetch();
    $stmt->close();

    return $uid;
}


// Function which takes a user_id and listing title and returns a listing id
function get_lid($uid, $title) {
    global $conn;

    $sql = 'SELECT listing_id FROM Listings WHERE user_id = ? AND title = ?;';
    $statement = $conn->prepare($sql);
    $statement->bind_param('is', $uid, $title);
    $statement->execute();
    $statement->bind_result($lid);
    $statement->fetch();
    $statement->close();

    return $lid;
}

//Function to get a username from a id
function get_username($uid) {
    global $conn;

    $sql = 'SELECT user_name FROM Users WHERE id = ?;';
    $statement = $conn->prepare($sql);
    $statement->bind_param('i', $uid);
    $statement->execute();
    $statement->bind_result($username);
    $statement->fetch();
    $statement->close();

    return $username;
}

// Function to get the listing name from a listing id
function get_listing_name($lid) {
    global $conn;

    $sql = 'SELECT title FROM Listings WHERE listing_id = ?;';
    $statement = $conn->prepare($sql);
    $statement->bind_param('i', $lid);
    $statement->execute();
    $statement->bind_result($listing_name);
    $statement->fetch();
    $statement->close();

    return $listing_name;
}

//Function to return the amount of FUSS Credits a certain listing costs
function get_creds($lid) {
    global $conn;

    $sql = 'SELECT price FROM Listings WHERE listing_id = ?;';
    $statement = $conn->prepare($sql);
    $statement->bind_param('i', $lid);
    $statement->execute();
    $statement->bind_result($price);
    $statement->fetch();
    $statement->close();

    return $price;
}


/*
--- The following section contains a series of functions to be used for displaying listings for services and skills ---
 */

// Function to display the 20 most liked listings
function get_popular(): array {
    global $conn;

    $sql = 'SELECT * FROM Listings ORDER BY likes DESC LIMIT 20;';
    $statement = $conn->prepare($sql);
    $statement->execute();

    $result = $statement->get_result();
    $listings = [];

    while ($row = $result->fetch_assoc()) {
        $listings[] = $row;
    }

    $statement->close();

    return $listings;
}

// Function to return all listings that contain the parsed word in the title or description

function get_listings($search): array {
    global $conn;

    $sql = "SELECT * FROM Listings WHERE title LIKE CONCAT('%', ?, '%') OR description LIKE CONCAT('%', ?, '%');";
    $statement = $conn->prepare($sql);
    $statement->bind_param('ss', $search, $search);
    $statement->execute();

    $result = $statement->get_result();
    $listings = [];

    while ($row = $result->fetch_assoc()) {
        $listings[] = $row;
    }

    $statement->close();

    return $listings;
}

// Function to return all listings that contain the parsed word in the title, topic, or description but orders the results based on likes
function get_listings_popular($search): array {
    global $conn;

    $sql = "SELECT * FROM Listings WHERE title LIKE CONCAT('%', ?, '%')
            OR description LIKE CONCAT('%', ?, '%')
            OR topic LIKE CONCAT('%', ?, '%')
            ORDER BY likes;";
    $statement = $conn->prepare($sql);
    $statement->bind_param('sss', $search, $search, $search);
    $statement->execute();

    $result = $statement->get_result();
    $listings = [];

    while ($row = $result->fetch_assoc()) {
        $listings[] = $row;
    }

    $statement->close();

    return $listings;
}

// Function that returns the given topic for a listing id
function get_topic($lid): string {
    global $conn;

    $sql = "SELECT topic FROM Listings WHERE listing_id = ?;";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $lid);
    $stmt->execute();
    $stmt->bind_result($topic);
    $stmt->fetch();
    $stmt->close();

    return $topic;
}

// Function to return all listings that contain the parsed word in the title or description but orders the results based on successful transactions
function get_listings_success($search): array {
    global $conn;

    $sql = "SELECT * FROM Listings WHERE title LIKE CONCAT('%', ?, '%')
            OR description LIKE CONCAT('%', ?, '%') 
            ORDER BY successful_exchanges;";
    $statement = $conn->prepare($sql);
    $statement->bind_param('ss', $search, $search);
    $statement->execute();

    $result = $statement->get_result();
    $listings = [];

    while ($row = $result->fetch_assoc()) {
        $listings[] = $row;
    }

    $statement->close();

    return $listings;
}

// Function that returns all listings for a given friend id
function get_listings_friend($fid): array {
    global $conn;

    $sql = "SELECT * FROM Listings WHERE user_id = ?;";
    $statement = $conn->prepare($sql);
    $statement->bind_param('i', $fid);
    $statement->execute();

    $result = $statement->get_result();
    $listings = [];

    while ($row = $result->fetch_assoc()) {
        $listings[] = $row;
    }

    $statement->close();

    return $listings;
}

// Function that returns all listings for a given friend id and a search term
function get_listings_friend_search($search, $fid): array {
    global $conn;

    $sql = "SELECT * FROM Listings WHERE title LIKE CONCAT('%', ?, '%') 
            OR description LIKE CONCAT('%', ?, '%') AND user_id = ?;";
    $statement = $conn->prepare($sql);
    $statement->bind_param('ssi', $search, $search, $fid);
    $statement->execute();

    $result = $statement->get_result();
    $listings = [];

    while ($row = $result->fetch_assoc()) {
        $listings[] = $row;
    }

    $statement->close();

    return $listings;
}

// Function to return listings that are also available given an array of  availabilities
function get_listings_available(string $keyword, array $availability): array {
    global $conn;

    $search = "%$keyword%";
    $params = [];
    $sql = "SELECT DISTINCT l.* FROM Listings l ";
    $joinIndex = 1;

    foreach ($availability as $a) {
        $alias = "a$joinIndex";
        $sql .= "JOIN Availability $alias
                 ON $alias.service_id = l.listing_id
                 AND $alias.day = ?
                 AND $alias.start <= ?
                 AND $alias.end >= ? ";
        $params[] = $a['day'];
        $params[] = $a['start'];
        $params[] = $a['end'];
        $joinIndex++;
    }

    $sql .= "WHERE (l.title LIKE ? OR l.description LIKE ?)";
    $params[] = $search;
    $params[] = $search;

    $statement = $conn->prepare($sql);
    $types = str_repeat('s', count($params));
    $statement->bind_param($types, ...$params);
    $statement->execute();
    $result = $statement->get_result();
    $listings = $result->fetch_all(MYSQLI_ASSOC);
    $statement->close();

    return $listings;
}

// Function to return a listing from its id
function get_listings_by_id($lid): array {
    global $conn;

    $sql = "SELECT * FROM Listings WHERE listing_id = ? LIMIT 1;";
    $statement = $conn->prepare($sql);
    $statement->bind_param('i', $lid);
    $statement->execute();

    $result = $statement->get_result();
    $row = $result->fetch_assoc();

    $statement->close();

    return $row;
}

// Function to return FUSS credit amount from given user id
function get_user_credits($uid) {
    global $conn;

    $sql = "SELECT fuss_credit FROM Users WHERE user_name = ?;";
    $statement = $conn->prepare($sql);
    $statement->bind_param('s', $uid);
    $statement->execute();
    $statement->bind_result($credits);
    $statement->fetch();
    $statement->close();

    return $credits;
}

// Function to return available slots for given listing 
 function get_available_slots_for_listing(int $listingId, int $daysAhead = null): array {
    global $conn;
    // Pull weekly availability for the listing
    $stmt = $conn->prepare("
        SELECT day, `start`, `end`
        FROM Availability
        WHERE service_id = ?
        ORDER BY FIELD(day,'monday','tuesday','wednesday','thursday','friday','saturday','sunday'), `start`
    ");
    $stmt->bind_param('i', $listingId);
    $stmt->execute();
    $avail = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    $stmt->close();

    if (!$avail) return [];

    // Map day strings to ISO-8601 day numbers (1=Mon .. 7=Sun)
    $dow = ['monday'=>1,'tuesday'=>2,'wednesday'=>3,'thursday'=>4,'friday'=>5,'saturday'=>6,'sunday'=>7];

    $out = [];
    $today = new DateTime('today');                // set your TZ globally if needed
    $now   = new DateTime();

    for ($i = 0; $i < $daysAhead; $i++) {
        $date = (clone $today)->modify("+$i day");
        $iso  = (int)$date->format('N');           // 1..7

        foreach ($avail as $a) {
            if (($dow[$a['day']] ?? 0) !== $iso) continue;

            // Compose concrete start/end
            $startDT = new DateTime($date->format('Y-m-d') . ' ' . $a['start']);
            $endDT   = new DateTime($date->format('Y-m-d') . ' ' . $a['end']);
            if ($endDT <= $now) continue;          // skip past

            $start = $startDT->format('Y-m-d H:i:s');
            $end   = $endDT->format('Y-m-d H:i:s');

            // Overlap check against existing bookings
            $chk = $conn->prepare("
                SELECT 1
                FROM Bookings
                WHERE service_id = ?
                  AND status IN ('pending','confirmed')
                  AND NOT (end <= ? OR start >= ?)
                LIMIT 1
            ");
            $chk->bind_param('iss', $listingId, $start, $end);
            $chk->execute();
            $busy = $chk->get_result()->fetch_column();
            $chk->close();

            if ($busy) continue;

            $out[] = [
                'start' => $start,
                'end'   => $end,
                'label' => $startDT->format('D, d M Y · H:i') . ' – ' . $endDT->format('H:i'),
            ];
        }
    }

    return $out;
}

// Function to return the booking details from given booking id
function get_booking_details($bid) {
    global $conn;

    $sql = "SELECT * FROM Bookings WHERE booking_id = ? LIMIT 1;";
    $statement = $conn->prepare($sql);
    $statement->bind_param('i', $bid);
    $statement->execute();

    $result = $statement->get_result();
    $row = $result->fetch_assoc();

    $statement->close();

    return $row;    
}

// Function that for a given user returns listings based on the users transaction history, returns listings with highest count of a users most purchased category
function recommended($uid): array
{
    global $conn;

    $sql = "SELECT l.*,
            COALESCE(topic_counts.topic_count, 0) AS topic_popularity
            FROM Listings AS l
            LEFT JOIN (
                SELECT
                    service_topic,
                    COUNT(*) AS topic_count
                    FROM TransactionHistory
                    WHERE booker_id = ?
                    GROUP BY service_topic
            ) AS topic_counts
            ON l.topic = topic_counts.service_topic
            ORDER BY topic_counts.topic_count DESC, l.title ASC;";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $uid);
    $stmt->execute();
    $result = $stmt->get_result();

    $listings = [];

    while ($row = $result->fetch_assoc()) {
        $listings[] = $row;
    }

    return $listings;
}

// Function that applies advanced search weighting by how strong of a match the term is in skill title and description,
// also orders results by popularity based on like to dislike ratio
function advanced_search ($term): array {
    global $conn;

    $sql = "
            SELECT listing_id, user_id, title, description, topic, likes, dislikes, price, (likes - dislikes) AS popularity,
            CASE
                WHEN title = ? THEN 3
                WHEN title LIKE CONCAT(?, '%') THEN 2
                WHEN title LIKE CONCAT('%', ?, '%') THEN 1
                WHEN description LIKE CONCAT('%', ?, '%') THEN 0
                ELSE -1
            END AS relevance
            FROM Listings
            WHERE title LIKE CONCAT('%', ?, '%')
            OR description LIKE CONCAT('%', ?, '%')
            ORDER BY 
                relevance DESC,
                popularity DESC;
            ";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssssss', $term, $term, $term, $term, $term, $term);
    $stmt->execute();
    $result = $stmt->get_result();
    $listings = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();

    return $listings;
}

// Function that does the same as the above one but also adds a topic filter term to the results
function advanced_search_category($term, $cat): array {
    global $conn;

    $sql = "
            SELECT listing_id, user_id, title, description, topic, likes, dislikes, price, (likes - dislikes) AS popularity,
            CASE
                WHEN title = ? THEN 3
                WHEN title LIKE CONCAT(?, '%') THEN 2
                WHEN title LIKE CONCAT('%', ?, '%') THEN 1
                WHEN description LIKE CONCAT('%', ?, '%') THEN 0
                ELSE -1
            END AS relevance
            FROM Listings
            WHERE type = ?
            AND title LIKE CONCAT('%', ?, '%')
            OR description LIKE CONCAT('%', ?, '%')
            ORDER BY 
                relevance DESC,
                popularity DESC;
            ";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssssss', $term, $term, $term, $term, $cat, $term, $term);
    $stmt->execute();
    $result = $stmt->get_result();
    $listings = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();

    return $listings;
}

// Function that uses same weighting as before but also joins on the availability where it can match
function advanced_search_availability($term, $day, $start, $end): array {
    global $conn;

    $sql = "
         SELECT 
            L.listing_id,
            L.user_id,
            L.title,
            L.description,
            L.topic,
            L.likes,
            L.dislikes,
            L.price,
            (L.likes - L.dislikes) AS popularity,
            CASE
                WHEN L.title = ? THEN 3
                WHEN L.title LIKE CONCAT(?, '%') THEN 2
                WHEN L.title LIKE CONCAT('%', ?, '%') THEN 1
                WHEN L.description LIKE CONCAT('%', ?, '%') THEN 0
                ELSE -1
            END AS relevance
        FROM Listings L
        INNER JOIN Availability A ON L.listing_id = A.service_id
        WHERE 
            (L.title LIKE CONCAT('%', ?, '%')
             OR L.description LIKE CONCAT('%', ?, '%'))
            AND A.day = ?
            AND A.start <= ?
            AND A.end >= ?
        ORDER BY 
            relevance DESC,
            popularity DESC;
    ";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssssssss', $term, $term, $term, $term, $term, $term, $day, $start, $end);
    $stmt->execute();
    $results = $stmt->get_result();
    $listings = $results->fetch_all(MYSQLI_ASSOC);
    $stmt->close();

    return $listings;
}

// same as one above but also takes a category param
function advanced_search_availability_category($term, $day, $start, $end, $cat): array {
    global $conn;

    $sql = "
         SELECT 
            L.listing_id,
            L.user_id,
            L.title,
            L.description,
            L.topic,
            L.likes,
            L.dislikes,
            L.price,
            (L.likes - L.dislikes) AS popularity,
            CASE
                WHEN L.title = ? THEN 3
                WHEN L.title LIKE CONCAT(?, '%') THEN 2
                WHEN L.title LIKE CONCAT('%', ?, '%') THEN 1
                WHEN L.description LIKE CONCAT('%', ?, '%') THEN 0
                ELSE -1
            END AS relevance
        FROM Listings L
        INNER JOIN Availability A ON L.listing_id = A.service_id
        WHERE 
            type = ?
            AND (L.title LIKE CONCAT('%', ?, '%')
             OR L.description LIKE CONCAT('%', ?, '%'))
            AND A.day = ?
            AND A.start <= ?
            AND A.end >= ?
        ORDER BY 
            relevance DESC,
            popularity DESC;
    ";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssssssssss', $term, $term, $term, $term, $cat, $term, $term, $day, $start, $end);
    $stmt->execute();
    $results = $stmt->get_result();
    $listings = $results->fetch_all(MYSQLI_ASSOC);
    $stmt->close();

    return $listings;
}

/*
 * AI Tool used
 * Line Number: 35 in AI-Acknowledgements
 * AI was used to help craft the 4 SQL queries above that help support the advanced search system. All 4 where based on the AI interpretation of the current database schema
 * These queries are quite involved and I don't believe I could come up with these on my own given what I wanted them to return
 */