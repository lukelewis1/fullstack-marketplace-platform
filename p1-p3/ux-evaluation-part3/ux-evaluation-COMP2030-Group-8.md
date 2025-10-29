# Usability Testing Report COMP2030 Group 8
**Group Members**

| Name          | FAN      |
|---------------|----------|
| Oliver Wuttke | WUTT0019 |
| Hans Pujalte  | PUJA0009 |
| Luke Lewis    | LEWI0454 |
| Seth Lear     | LEAR0022 |
****
## Table of Contents
- [Introduction](#introduction)
- [Test Plan](#test-plan)
- [Summary and Analysis](#summary-and-analysis)
- [Iteration Description](#iteration-description)
- [Appendices](#appendices)
  - [Appendix 1](#appendix-1-script---instructor-copy)
  - [Appendix 2](#appendix-2-script---participant-copy)
  - [Appendix 3](#appendix-3-usability-test-results)
  - [Appendix 4](#appendix-4-tables-and-figures)

****
## Introduction
This report contains developmental insights into the FUSS website's features and design choices and how they can be improved.
The user experience evaluation has a focus on core functionality for both regular users and administrators and with a primary focus on the ease of navigation whilst performing tasks on the FUSS website.
Five scenarios have been created to help us test and improve the usability of the FUSS website.
****
## Test Plan
When conducting our tests, when asking our testers to fill out information about themselves, from these three of our four testers are enrolled in Computer Science degree. With this we saw our testers were in the age range of 16-30 and were very confident in using a new web application however none of them had ever used an online skill exchange application before.

Specific Tests Conducted:
Test 1: Posting a skill
-	Navigate to post service section
-	Fill in form ensuring timeslots are filled
-	Confirm Skill posted

Test 2: Delete a user
-	Login with admin credentials
-	Navigate to Dashboard then User Management
-	Hover over options button on a user then select delete
-	Confirm deletion by selecting yes

Test 3: Create account
-	Sign up
-	Enter valid credentials
-	Fill in form, agree to T’s and C’s
-	Enter your new username and password

Task 4: Book a service
-	Skill share
-	Select Skill
-	Select time
-	Confirm booking

Task 5: Confirm booking and leave a review
-	Skill Bookings
-	Service Complete
-	Fill in form
-	Submit review

For the methodology of our site, we used a pre-test demographic questionnaire to find our information about our users. From this we asked questions regarding our testers background knowledge with using web applications and if they had used a skill share service before. With this we use a SUS at the end of our tests to receive feedback on how easy tasks were to complete, one being not confident and five being very. We also used SEQ’s at the end of the test so the user could sum up their experience with the tasks. With this we also asked our testers to leave other post-test questions, so we were able to receive more feedback on our application.

With our Metrics for success, we measured success by if completed the task successfully, their navigation efficiency and SUS score. With this we measured success by at the end of each test asking our users to provide a score out of five as to how they found the task and how confident they completed the task. We measured success by how users navigated to the task and how easy to find the menus to navigate around the site.
****
## Summary and Analysis

****
## Iteration Description
Based on the user feedback from usability testing for the FUSS website, several changes can be made to improve the user experience. Although single ease and system usability questions indicate that users generally had a fluid and positive experience performing tasks, observations show that there were some clear pain points and parts that users struggled on. Most of these include some sort of bad or non-existent user feedback for task completion and confusing naming conventions and placements of elements that made it harder for users to complete intended tasks.

Login and signup input boxes have issue where you need to click to the side of the placeholder text and can't click on the placeholder text. This issue seemed to be an annoyance that multiple users ran into when testing the FUSS website. The issue stems from the dynamic effect when users click on the input box, which instead of removing the placeholder text, it instead jumps above the input box. By removing the dynamic effect and using the standard placeholder text within the HTML element, it'll resolve this issue.

A minor bug where users couldn't enter non-integer types of numbers for FUSS credit amounts for a skill listing was also found. Although the database and other parts of the site support floating-point types for FUSS credit balances, the HTML input field doesn't allow users to enter those floating point types. To fix this, we can adjust the *step* attribute of that input tag to allow for floating-point types of input.

The admin dashboard also wasn't distinct enough from other nav-bar elements for users to clearly know where it was and resulted in users taking more time than needed to find the admin dashboard. This fix will just require some styling to make the admin dashboard more distinct from other elements on the page. In addition, another more clear element separate from the nav-bar could be used to take users to the admin section of the site.

The skill share area and its naming conventions also proved to be a point of confusion for users during testing, multiple users were unclear on affordances based on the names of different areas. The combination of it being the largest drop-down menu and having a confusing naming convention that leads to false affordances. The solution is to overhaul the naming convention for this area and possibly to break up the skill area into two distinct areas, one for a users' own skills and another for managing skills they seek.

Overall, users seemed to enjoy using FUSS and navigating the site. Most of the identified issues came down to annoyances and inconveniences instead of site breaking bugs. This in mind are demographics were exclusively university students with experience in using web applications. Further testing on a more diverse demographic may yield different results and find issues that weren't uncovered yet.
****
## Appendices

****
### Appendix 1: Script - Instructor Copy

****
### Appendix 2: Script - Participant Copy

****
### Appendix 3: Usability Test Results

****
### Appendix 4: Tables and Figures