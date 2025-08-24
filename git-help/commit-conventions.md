### Updating content in the repo

For every edit, addition, deletion, or small change that you will work on with your repositories, you will follow the same steps outlined below:
1. Identify a change is required
1. Ensure your `main` branch is up-to-date
1. Create a branch from the `main` branch
    - Your branch should have a name that starts with the type of change, followed by a /, then your FAN, then another /, then a brief two to five word statement about the change (use hyphens to separate words), e.g.,:
        - `feature/turn0123/new-login-system`
        - `bugfix/turn0123/incorrect-data-display`
        - `docs/turn0123/update-research-methods-section`
1. Make the changes to the project in your branch
1. Commit your changes to your branch
1. Sync or push your changes
1. Submit a Pull Request (PR) to have someone review your contribution
1. Another person in your team is responsible for reviewing and accepting your change, they will follow these steps:
    1. Once a PR is submitted, review the changes
    1. If satisfied with the changes, report with comments the success of the change
    1. Merge the branch with `main`, resolve any merge conflicts with the author of the PR
    1. DO NOT delete the branch

### Let's practice!

With the person you are currently sharing your repo with, you need to change the following two lines in this document, each person should change the content for one of the lines to represent their details.  Read all the instructions below first and then implement the steps to make the necessary changes.

---

- Name of Team Member 1, FAN, Degree
- Name of Team Member 2, FAN, Degree

---

**Step One** is to identify a change is required, e.g., we want to modify the two lines above.

**Step Two** is to ensure the `main` branch is up-to-date.  There are various ways to do this, but we will use VS Code to complete this step.  Click on the Source Control button in the left menu and if there has been any changes to the `main` branch you would see a button like the following:

<details open>
    <summary>Make sure main branch is up-to-date</summary>
    <img src="./imgs/Worksheet00_0013.png" style="border: solid black 1px">
</details>

For your repo, for this step, you are not likely to see any changes that need to be sync'ed at this stage.

**Step Three** is to create a new branch for the changes you want to make.  Each person should create a branch and use the naming conventions above for modifying this doc.  To create a branch in VS Code:
- click on the Source Control button, if you are not currently looking at the Source Control panel
- hover over **CHANGES** in the Source Control panel
- five widget buttons should appear when you hover, click on the elipses (...)
- go down to Branch, and select Create Branch

<details open>
    <summary>Create a branch</summary>
    <img src="./imgs/Worksheet00_0014.png" style="border: solid black 1px" width="95%">
</details>

In the panel that opens for a prompt at the top of the window, type an appropriate branch name (using the conventions above), e.g., `docs/wilk0077/update-my-details`.  Hit Enter.  
Click the Publish Branch button.

**Step Four** you make the changes to the document for your name and details - note that when you make those changes the content in the Source Control panel changes.  You should see the Commit button is highlighted, and a list of Changes has been included (M next to the file name denotes it has been modified).

Verify that the content in the text box of the Source Control panel correctly identifies the branch that you are in, e.g.,  
`docs/YOUR-FAN/update-my-details`

<details open>
    <summary>Source Control shows changes and the branch for those changes</summary>
    <img src="./imgs/Worksheet00_0015.png" style="border: solid black 1px">
</details>

**Step Five** click in the text box and write a suitable commit message.  Your commits should be descriptive.  Imagine you are reviewing a PR and someone pushed a commit with the message "changed files" - this does not provide enough context or information.

Ideally, your commit messages should follow this structure:
```
type(scope): subject
body
```
Where:
- type:
    - feat - a new feature
    - fix - a bug fix
    - docs - changes in documentation
    - style - style changes, formatting, missing semicolons or whitespaces
    - refactor - code that neither fixes a bug or adds a feature
    - perf - changes that improve performance
    - test - add a missing test
    - chore - regular code maintenance
- scope:
    - a phrase describing parts of the code or files affected by the change
- subject:
    - a short description of the applied changes (no more than 50 characters)
- body
    - must begin one blank line after subject.  Should provide additional contextual information.  If the subject provides enough detail, this can be removed.

So, for your commit message add something like:
```
docs(Worksheet00): Replace the placeholder text with details

Details were my name, FAN, and my degree. Changes were implemented on line 192
```

<details open>
    <summary>Commit message</summary>
    <img src="./imgs/Worksheet00_0016.png" style="border: solid black 1px">
</details>

When typing in your commit message, just use Enter to add a new line to the text box.

Hit the Commit button.  In the prompt that appears you can select Yes.  For our simple projects, we could click Always and not deal with the pop up every time, but it is best to review and verify everything before you stage (or commit) your work.

The Commit button has changed to a Sync Changes button.  Clicking this button will push your content to the remote repository at github.com.  In the pop up that appears, click OK to push your content to the repo.

**Step Seven** is to submit the Pull Request, i.e., ask someone in the team to review and accept your code changes.  In VS Code, in the Source Control panel, hover over CHANGES again and note the third widget Create Pull Request.

<details open>
    <summary>Create Pull Request button</summary>
    <img src="./imgs/Worksheet00_0017.png" style="border: solid black 1px">
</details>

When you click Create Pull Request the CREATE panel will replace the CHANGES panel.  This panel will show a default template for a Pull Request.  We have set up a template for you to use, so that there is consistency within your project.  You will see that the panel shows:
- BASE - where the changes will be merged into, i.e., `main`
- MERGE - the branch we are working in
- Subject block - this is taken directly from the commit statement
- Body block - content from the commit is added to the start of the body.  Where necessary, for a reviewer to understand what the change is and what it will affect, you should include a longer description.  There is also a checkbox list to help identify what change has occurred, simply place an x inside the square brackets to check that item.  Then finally, there is a checklist to ensure you have completed the necessary steps, make sure you place an x in each appropriate item.  Finally, the last checkbox is to indicate who you have assigned this PR to.

<details open>
    <summary>Pull Request Template</summary>
    <img src="./imgs/Worksheet00_0018.png" style="border: solid black 1px">
</details>

To assign this PR to one of your team members, click the widget that looks like an avatar within a circle (highlighted in the previous image).  From the list that appears, select the other person who you are sharing your repo with.  Click Ok - that person will now appear under the subject line of the Pull Request.

Once you have completed the necessary details, click the Create button.

**Step Eight** once you have a PR assigned to you, you will need to review it and if it is suitable, create a merge commit.  When reviewing a PR, you must leave a Comment.  This should be a short statement that identifies that this PR has been reviewed and why the code changes should be merged.

In the PR review page you will see the list of changes as the filenames of the files that were changed.  Click on a file name will show you that file and the change that was made.

If you feel the change is appropriate and won't break your code, leave a comment, and click Create Merge Commit.

This is the process that you should follow for each change you make to your repo.  This is crititcal for your assignment work and your marks will be adjusted based on your interactions with this process.

Congratulations :tada::tada::tada:.  You have completed the set up of your tutorials project.  Next week we will add a new folder to this repository and work through some examples.