document.addEventListener("DOMContentLoaded", function () {
  const modal = document.getElementById("suspendModal");
  const closeBtn = document.querySelector("#suspendModal .close");
  const submitForm = document.getElementById("submitForms");

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

    fetch(suspUrl)
      .then((response) => response.text())
      .then(() => {
        modal.style.display = "none";
        location.reload(); // refresh page after deletion
      })
      .catch((error) => console.error("Error:", error));
  });
});
