// <!-- Authored by Oliver Wuttke, FAN WUTT0019, Edited by (Oliver Wuttke, FAN WUTT0019) -->

document.addEventListener("DOMContentLoaded", () => {
    const scheduler = document.querySelector(".scheduler");
    const postButton = document.querySelector(".btn");

    function validateTimeSlots() {
        // Get all start/end inputs in the scheduler
        const starts = scheduler.querySelectorAll("input[type='time'][name$='_start[]']");
        const ends = scheduler.querySelectorAll("input[type='time'][name$='_end[]']");

        let validFound = false;

        // Loop over each day by index — assumes start[i] pairs with end[i]
        starts.forEach((startInput, i) => {
            const startVal = startInput.value.trim();
            const endVal = ends[i]?.value.trim() || "";

            if (startVal !== "" && endVal !== "") {
                validFound = true; // At least one complete slot
            }
        });

        // Enable or disable the submit button
        postButton.disabled = !validFound;
    }

    // Run validation whenever a time field changes
    scheduler.addEventListener("input", validateTimeSlots);

    // Run once at page load
    validateTimeSlots();
});