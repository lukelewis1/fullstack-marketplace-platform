# COMP2030 Group 8 Tonsley Website Markers Guide
Names and FAN's of group members:

| Student Name  | FAN      |
| -------------- | -------- |
| Oliver Wuttke  | WUTT0019 |
| Hans Pujalte   | PUJA0009 |
| Luke Lewis     | LEWI0454 |
| Seth Lear      | LEAR0022 |

This document will contain all other references and serve as a guide for marking this assignment explaining which parts of the directory contain requirement implementations
alongside anything else considered noteworthy. To view who has created a file a comment at the top defines the author and who else has edited it.
****
## Helper Script:
Go to [marker](../marking-help) to find a DB populate script that will insert 30 users some listings and pretty much every table with something, passwords are all admin.
Users Brett and Bod are both admins and when logged in as Brett or Bod they will have admin privileges. There is also a folder containing profile pictures for Brett and Bod users.
Just copy the 2 pfp images into [here](images/user_pfp) and they will appear normally when testing when logged in as Brett or Bob if logged in as another user you will need to change pfp through the edit profile page.
****
## Database:
The database export is found [here](sql-exports/FUSS_DB_2025-10-12_120133.sql) but in codespaces you can connect to the database using HOST: db, USER: admin, PASSWORD: admin, DATABASE: FUSS_DB.
Host is different if your using a different container it will be: localhost instead.
****
## Other References (NOT AI):
The [AI-Acknowledgements](AI-Acknowledgement.md) document contains all AI references for this assignment this section will summarise some other sources used in this assignment.

Licensed code found in the dev_assets directory contains multiple elements in HTML, CSS and JS that were adapted to our website,
there is a free use [license](dev_assets/LICENSE.txt) inside the directory that explains the reasonable terms of use for this code.

It is also worth mentioning that a variety of other sources were used for inspiration and troubleshooting, these sources include but are not limited to:
- [StackOverflow](https://stackoverflow.com/questions)
- [Youtube](https://www.youtube.com/)
- [Reddit](https://www.reddit.com/)
- [GeeksforGeeks](https://www.geeksforgeeks.org/)
- [Figma](https://www.figma.com/)
- Much more

****
## Requirement Implementations
This section will include each requirement for the FUSS website and where/how they were implemented.

### Core Requirements:
- Student Profile and FUSS Management
  - Secure registration process handled [here](login).
  - Secure login/logout and session management handled [here](inc/logout.php) and [here](scripts/logout_script.js).
- Student Profile
  - Students can manage their personal details (name, degree, College, academic year, brief bio, profile picture) handled [here](user/edit_profile.php).
  - Skills Offered: students can list specific academic, skills offered are tied to profiles when you view someones profile you can see what skills they offer [here](user/view_profile.php).
  - Skills Requested: Students list skills they need assistance with. Students can list skills they want in the bio section of their profile.
  - FUSSCredit Balance: Display the student's current FUSSCredit balance. Handled by headers that appear in every page [here](inc/admin_header.php) and [here](inc/user_header.php).
  - Transaction History: View a detailed list of past services provided and received (showing hours and FUSSCredit impact). Also displayed on profiles but can't be edited for obvious reasons [here](user/view_profile.php).
- Peer Skill Exchange Core mechanics
  - Search and Browse Skills/Students
    - Students can browse or search for specific skills or students offering particular services. Handled [here](user/skill_search.php) through a search bar.
    - Dynamic Filters: Filter by skill category, also handled on the search page [here](user/skill_search.php).
  - Request a Service
    - A student (the "Requester") can initiate a request for service from another student (the "Provider") who offers that skill. Done on the skill view page [here](user/skill_search_handler/skill_listing.php).
    - The request specifies the desired service, preferred time/date, estimated hours needed, and a brief message. Also handled on the skill view page [here](user/skill_search_handler/skill_listing.php).
    - Negotiation (Basic): the Provider can accept, reject, or propose an alternative time/scope via the internal messaging system. Done through the message inbox [here](messages).
  - Service Fulfillment and FUSSCredit Transfer
    - Upon completion of a service, both the Requester and Provider, must confirm the completion and the agreed-upon hours. Done by the provider [here](user/my_skills.php) and the requester [here](user/skill_bookings.php).
    - Once confirmed by both parties, the agreed hours are transferred from the Requester's FUSSCredit balance to the Provider's balance. Requester has FUSS credits deducted on request and refunded if canceled provider gets credits when service is complete [here](inc/skill_confirm_validator.php).
    - Balance Validation: the system must prevent negative FUSSCredit balances for Requesters. Implemented [here](user/skill_search_handler/skill_listing.php) and in DB there is a check for negative credits as well [here](../db/init).
  - Peer Review System
    - After a service is confirmed, both parties can leave a brief review and rating (e.g., 1-5 stars) for the other student. Not a 1-5 star rating but a like and dislike option, review and sentiment (acts as a 1-3 scale) found [here](user/skill_bookings.php).
    - Student profiles display their average rating and testimonials. Ratings are displayed on profiles [here](user/view_profile.php) but testimonials are tied to skills found [here](user/skill_search_handler/skill_listing.php).
  - Scheduling and Communication
    - Availability Management, Students can set their general availability. This is implemented through skills being forced to have availability tied to them instead of users having a given availability this allows users to be much more flexible/restrictive with their availability. This is implemented through Availability table in the DB [here](../db/init/schema.sql) and when users post a skill [here](user/skill_post.php).
    - Internal Messaging System
      - Students can send direct messages to each other within the platform, especially for service requests, negotiations, and coordination. Done [here](messages).
      - A simple inbox/outbox for managing conversations. Also [here](messages).
  - Administrator Features
    - Admin Dashboard, Overview of system activity (total active students, active services, FUSSCredit distribution, popular skills). Found [here](admin/insights.php).
    - Student Management, View, edit, suspend, or delete any student account. Done [here](admin/insights.php) handled [suspend](admin/suspend_user.php), [delete](admin/delete_user.php) and [view](admin/edit_user.php).
    - FUSSCredit Adjustment, Manually adjust a student's FUSSCredit balance. Also handled through [edit user](admin/edit_user.php).
    - Skill and Category Management, Manage the pre-defined list of skill categories. Done through [here](admin/skill_category_management.php) and stored [here](data/skill_categories.json).
    - Content Moderation, Monitor and remove inappropriate content in profiles, skill descriptions, or messages. Done [here](admin/edit_user.php).

### Stretch Goals:
- SG1: Advanced Availability and Scheduling Integration
  - Calendar-based Availability: instead of just general text, implement a functional interactive calendar view on the student's profile where they can visually select specific time slots or block out unavailable periods.  This should integrate with the service request process, allowing Requesters to see the Provider's precise available slots when making a request. 
  - Conflict Detection: the system should prevent double-booking for a Provider and alert the Requester if their requested time conflicts with the Provider's existing commitments (either other FUSS services or blocked-out times).
  - **Implementation**: The interactive calendar is found [here](user/calendar.php) it shows all booking types and there status and when clicked on will take the user to the correct part of the site to manage those bookings. Conflict detection was done differently instead of allowing users to create conflicts and alerting them we went with the approach of not letting them happen in the first place by checking when a user requests a skill at a certain time, whether or not them or the provider is already booked for that time and providing dynamic feedback based on the condition that implementation for that is [here](user/skill_search_handler).
- SG2: Intelligent Skill and Student Matching
  - Recommendation Engine: based on a student's "Skills Requested" or past service history, implement a basic recommendation system to suggest relevant "Skills Offered" or other students who might be able to help.  This could be as simple as suggesting students offering skills relevant to common academic topics or popular non-academic categories the user has interacted with.
  - **Implementation**: When users click on the skill search area it will be populated with recommended skills based on their past skill history, this is achieved through a SQL query found [here](inc/functions.php) and displayed to the user [here](user/skill_search.php).
- SG3: Notifications and Real-time Updates
  - In-App Notifications: implement a robust notification system to alert users to new service requests, accepted/rejected requests, completed services requiring confirmation, new messages, or new reviews.  Notifications should be visible in a dedicated "Notifications" area within the platform.
  - Basic Real-time Messaging: while not a full chat application, messages between two users should refresh without a full page reload, providing a more fluid communication experience.  This would require more advanced AJAX polling or long-polling techniques.
  - **Implementation**: A dedicated notification section is found [here](notifications/notifications.php) where all notifications besides messages and cancellations of skills are found, they are both handled through the messages section [here](messages). Then the live messages is handled [here](messages) for the actual messages and the no refresh is handled [here](scripts/real_time_msg_script.js).

### Master Goal:
- MG3: Advanced Search and Filtering with Weighted Relevance
  - Complex Query Construction: enhance the search functionality to allow more complex queries, potentially combining keywords, skill categories, topics, and availability.
  - Weighted Relevance Ranking: implement a system where search results are not just filtered by also ranked by relevance.  This could involve:
    - Skill Match Strength: prioritising exact skill matches over partial ones.
    - Provider Reputation: higher rated providers appear higher.
    - Availability Alignment: providers with immediate or upcoming availability for the requested time appearing higher.
    - Recency: more recently active providers or skill listings being prioritised.
  - This would require more sophisticated SQL queries, potentially involving JOIN operations and subqueries (it VERY well does).
  - **Implementation**: The functions that handle the advanced searching are found [here](inc/functions.php) near the bottom and they are seamlessly integrated into the search page [here](user/skill_search.php). The way it works is when skills are searched for the query looks for partial and full matches in skill titles and descriptions and orders based on the strength of the match, additionally users can add category filtering and search for skills with a specific availability and chain all these filters together.

****

