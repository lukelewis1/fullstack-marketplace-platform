//<!-- Authored by Hans Pujalte, FAN PUJA0009 -->

// Run after the DOM is fully loaded
document.addEventListener("DOMContentLoaded", function () {
  const modal = document.getElementById("editModal");
  const closeBtn = document.querySelector(".modal .close");
  const editForm = document.getElementById("editForm");

  // Handle clicking Edit buttons
  document.querySelectorAll(".edit-btn").forEach((btn) => {
    btn.addEventListener("click", (e) => {
      e.preventDefault();
      modal.style.display = "block";

      // Populate form fields
      document.getElementById("edit-id").value = btn.dataset.id;
      document.getElementById("edit-f_name").value = btn.dataset.fname;
      document.getElementById("edit-l_name").value = btn.dataset.lname;
      document.getElementById("edit-email").value = btn.dataset.email;
      document.getElementById("edit-role").value = btn.dataset.role;
      document.getElementById("edit-credits").value = btn.dataset.credits;
    });
  });

  // Close modal window
  closeBtn.onclick = () => (modal.style.display = "none");

  // If user clicks outside the modal, close it
  window.onclick = (event) => {
    if (event.target == modal) modal.style.display = "none";
  };

  // Submit form (AJAX)
  editForm.addEventListener("submit", function (e) {
    e.preventDefault();
    const formData = new FormData(editForm); // Collect form data

    // Send data to server
    fetch("edit_user.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => response.text())
      .then((data) => {
        modal.style.display = "none"; // Close modal
        location.reload(); // Refresh to show updates
      })
      .catch((error) => console.error("Error:", error));
  });
});
