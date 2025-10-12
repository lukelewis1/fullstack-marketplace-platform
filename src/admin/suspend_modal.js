//<!-- Authored by Hans Pujalte, FAN PUJA0009 -->

// Run after the DOM is fully loaded
document.addEventListener("DOMContentLoaded", function () {
  const modal = document.getElementById("suspendModal");
  const closeBtn = document.querySelector("#suspendModal .close");
  const submitForm = document.getElementById("submitForms");

  // Temporary variable to hold the suspend URL
  let suspUrl = "";

  // Open modal
  document.querySelectorAll(".suspend-btn").forEach((btn) => {
    btn.addEventListener("click", (e) => {
      e.preventDefault();
      suspUrl = btn.getAttribute("href");
      modal.style.display = "block";
    });
  });

  // Close modal
  closeBtn.onclick = () => (modal.style.display = "none");
  window.onclick = (event) => {
    if (event.target === modal) modal.style.display = "none";
  };

  // Handle confirm action
  submitForm.addEventListener("submit", function (e) {
    e.preventDefault();

    // Send suspend request to server
    fetch(suspUrl)
      .then((response) => response.text())
      .then(() => {
        modal.style.display = "none";
        location.reload(); // refresh page after deletion
      })
      .catch((error) => console.error("Error:", error));
  });
});

/*
 * AI Tool used
 * Line Number: 72 in AI-Acknowledgements
 * AJAX code structure inspired by ChatGPT. Also used ChatGPT to explain code.
 */
