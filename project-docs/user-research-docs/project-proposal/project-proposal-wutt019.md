# Project Proposal
****
This document serves as a project proposal for the Flinders University Skill Share (FUSS) website.
This document is specifically for the project proposal for COMP2030 Group 8 Semester 2, 2025.
****
## Website Concept
The Flinders University Skill Share website will serve the purpose of empowering Flinders University students with a skill exchange marketplace.
This marketplace will allow students to advertise and seek a variety of services from other students in exchange for FUSSCredits.
> Definition: FUSSCredits are a time based virtual currency in which 1 FUSSCredit can be exchanged for an hour of a given service.

This solves the problem of there not being a standardised and official channel for this kind of student interaction. 
It won't only protect students from being scammed out of their services but protects students seeking services as well.
This will be enforced through administrator moderation and reputation systems.
Not only will this solve the problem of safety and trust, but it will also provide students with the unique opportunity to advertise their services to the broader university community.
****
## Target Audience Profile
Our primary target audience will be consisting of undergraduate Flinders University students.

### Demographics and Background:
- Age Range: 18-25+
- Gender: All genders
- Location: Within the Adelaide area but some users will be out of state and/or country.
- Year of Study: From first years to PhD's.
- Type of Study: Full-time, part-time and deferred students.
- Area of Study: All fields of study (STEM, Social Science, Art and Humanities ect…).

### Behaviors and Preferences:
- Device Preference: Laptop/Desktop because all University students are required to own/have access to one.
- Communication Preference: Informal 'text message' style of communication.
- Mental Model: Will be familiar with existing Flinders University online services such as FLO and Okta Apps.
- Attention/Memory: Longer attention/memory span for tasks that users 'want' to do compared to mundane/boring tasks.

### Needs and Constraints:
- Socioeconomic Condition: University students often do not have a lot in any disposable income therefore they would be considered lower on the socioeconomic ladder.
- Technical Ability: Low to average technical ability.
- Availability:  Will vary extremely from user to user.
- Motivations: To improve academically and professionally.
- Trust: Students may be skeptical/distrusting of student provide services without credibility.

### Accessibility Considerations:
- Colour blind colour schemes.
- Short/long-sightedness, blindness.
- Deafness.
- Physical impairment (lack of sense of touch).
- Mobility issues (wheelchair, limbs, head movement).
****
## Scope Statement
This section will include key features and content areas alongside simple backend implementations for certain functionalities.

### Key Features:
- Secure registration and login/logout session management.
- Student profile customisation.
- Search and browse skills and students with advanced filtering with weighted relevance.
- Recommendation engine.
- Student requesting a specific service.
- Service fulfillment and FUSSCredit transfer validation.
- Peer review system including a trust and reputation system.
- Advanced availability and scheduling integration.
- Internal peer to peer messaging.
- Real time notifications.
- Admin control dashboard.
- Student management including advanced dispute resolution and mediation tools.
- FUSSCredit moderation.
- Skill and category management.
- Content moderation.

### Content Areas and Backend Implementations:
****
**User Registration and Login/Logout Session Management:**

User registration will be handled through an option on the welcome/login page where if a potential user wants to create an account they will navigate to a sign-up/new user section.
Here they will be directed to enter certain information which will be validated against a database of current users to ensure this is truly a new user.

For existing users that same login/welcome page will include a sign-in form where users will enter an email/username and a password.
That information will be validated against the user database whereupon validation a session token will be generated for that users current login session. 
This token will be used in all request sent by the user to validate the session and when a user 'times out' or logs out that session token will be destroyed and new one created upon the next login session.
****
**Student Profile Customization and Management:**

Students will be able to customise their profile with certain details (name, course, academic year, bio, profile picture and more).
This will be implemented similar to how most social media platforms enable user profile customisation and will try to match that same mental model to make the process as frictionless as possible.

Students will also be able to list their currently available skills and services and the types/categories of these skills and services.
In addition to what skills a student has to offer they will also be able to list particular services and skills they seek for themselves.
These options will be made available through the same form/page that they will use to customise their profiles.

Students will also be able to see their current FUSSCredit balance alongside a transaction history.
This information can be stored as attributes within the user database to ensure the validity of balance and transaction history.
****
**Peer Skill Exchange Mechanics and Functionality:**

Students will be able to search and browse for services with advanced filtering alongside a recommendation engine.
Students will have a variety of drop-down style menus to perform advanced filtering.
A recommendation engine will look at student transaction history and preference set by the student to find better matches for that student.
Proximity matching will look at what areas students have listed for available services and match that up against the area in which the service seeking student is located in to filter results by distance as well.

A student will also be able to request a service from another student who offers that skill.
The requester can specify stuff like time and date, estimated time for the service and a short message.
Provider will then have the option to accept that request or send a counter-offer which the requester can accept.
This functionality will be handled through a variety of webforms where a history of the 'conversation' will be logged for in-case admin intervention is needed.

Service fulfillment will be determined by if both parties agree that the service was completed after the service has been completed.
After confirmation by both the requester and provider are verified the credits will be transferred.
Before a service is requested the requestee will have their balance checked (server side) to ensure enough funds are available for the service.

A trust and reputation system will be in-place alongside a service review system to ensure the credibility and reputation of the service provider.
Users who have used a service will have a period of time to leave a review and 'rate' the service provider.
These metrics will be displayed on the service providers profile alongside their advertised service.
****
**Scheduling and Communication:**

Students will be able to provide a schedule for their services.
This schedule will be integrated into a calendar where students can see their services they have requested and any service they need to provide.
This calendar will also be able to detect conflicts in bookings and warn/not let the user 'double book'.

A simple internal messaging system will also be inplace for students to directly communicate with one another.
The possible use of web-sockets will allow the platform to have real time messages and notifications so users don't need to actively refresh the page.
****
**Administrator Features:**

An admin dashboard will be the first thing an admin sees when they log in.
This dashboard will show a summary of stats related to active users, active disputes, FUSSCredit balances and much more.

An admin will also have the ability to view, edit, suspend and ban student accounts as needed.
There will also be advanced dispute resolution and mediation tools.
These tools will provide admins with full logs of the two disputing parties interaction as well as full profile history and other summary statistics to provide the admin with enough information to make fair and informed decisions.
The admin will also be able to freeze and adjust the FUSSCredits on the accounts of the disputing parties until a resolution is found.
Finally the admin will have the power to decide the outcome of the dispute.

Admins will also have the ability the manage categories and skills, in the sense that they can decide what is allowed to be offered and what categories are available and too which skills they encompass.

Admins will also have moderation tools that will allow them to remove and/or edit student listings and profiles if inappropriate content is reported or detected.
****
