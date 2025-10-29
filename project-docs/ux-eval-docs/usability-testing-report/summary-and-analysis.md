# Testing Summary & Analysis

The usability tests were conducted to assess how easy and effective users found the FUSS website, as well as to identify any common issues experienced during use. Both qualitative and quantitative data were collected to measure overall success and highlight potential areas of improvement. Five participants, aged between 16 and 30, took part in the testing phase, each with diverse educational and occupational backgrounds. Importantly, none of the participants had prior experience with online skill exchange marketplaces, providing valuable insight into how first-time users interact with the site. Each participant completed a set of five tasks representing typical system interactions, such as logging in, posting a skill, and booking a service. The testing process also included pre-test demographic questions, task performance evaluations, and post-test System Usability Scale (SUS) questionnaires to capture user perceptions. Observations and direct feedback were documented throughout the sessions to help identify key usability strengths, recurring challenges, and opportunities for refinement.

---

## Summary of Results

### Areas of Success

All participants successfully completed all tasks as intended, indicating that the platform is generally functional for new users. Task performance scores were consistently high for ease of use and success of task completion, with all users giving a score above 6. 

![Average Scores Graph](/p1-p3/ux-evaluation-part3/data/processed/figures-and-charts/avg-task-scores.png)

The average completion time ranged between 8 and 13 minutes, with most tasks completed smoothly and with minimal assistance. One participant reported that the website was “really well designed” and believed that “a lot of university students would use a system like this”. Several users also tested extra functionality beyond the assigned tasks, suggesting confidence and interest with other components of the site.

![SUS Scores Graph](/p1-p3/ux-evaluation-part3/data/processed/figures-and-charts/time-per-user.png)

Participants recorded strong SUS scores ranging from 80 to 92.5, with an average score of 88. This indicates excellent usability with only minor improvements needed. This aligns with high ratings for statements such as “I thought the system was easy to use” and “I felt very confident using this system”.

| Participant | SUS Score (/100) | Interpretation |
|------------|------------------|----------------|
| Participant 1 | 92.5 | Excellent |
| Participant 2 | 80.0 | Good |
| Participant 3 | 87.5 | Excellent |
| Participant 4 | 87.5 | Excellent |
| Participant 5 | 92.5 | Excellent |
| **Average** | **88.0** | **Excellent overall usability** |

---

## Areas for Improvement

Several clear trends emerged during the testing phase. Multiple users experienced confusion with text input fields, often unsure where to click to begin typing. Participants also had difficulty locating the dashboard or skill areas due to unclear naming conventions and occasionally needed assistance to proceed. These findings suggest that improved visual cues or clearer menu labelling could help guide users more effectively.

Minor issues were also identified with login validation feedback, where no message appeared after a failed login attempt, leaving users unsure of the cause of the issue. One participant also highlighted unclear button affordances in the admin table, mistaking a hoverable element for a clickable button.

---

## Usability Issues to Address

Based on the user testing, the following usability issues should be prioritised:

1. **Improve Input Field Accessibility**  
   Ensure that all input and text fields are clearly interactive and that placeholder text does not interfere with clicking functionality. This will likely require small code level changes.

2. **Unambiguous and Clear Navigation Labels**  
   Revise the names of several navigation links to be more intuitive and reduce confusion for first-time users.

3. **Clear Error Feedback**  
   Introduce appropriate validation messages to notify users when an error has occurred. This should include what went wrong, why it happened, and how to fix it. Consider additional visual cues to draw attention to the error.

4. **Refine Button/Icon Design**  
   Redesign elements in the admin table to remove false affordances and clearly differentiate between hover and clickable interactions. Similar improvements should be applied throughout the interface where needed.

---

