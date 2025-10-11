//<!-- Authored by Hans Pujalte, FAN PUJA0009 -->

document.addEventListener("DOMContentLoaded", function () {
  const modal = document.getElementById("confirmModal");
  const closeBtn = document.querySelector("#confirmModal .close");
  const submitForm = document.getElementById("submitForm");

  let deleteUrl = "";

  // Open modal
  document.querySelectorAll(".delete-btn").forEach((btn) => {
    btn.addEventListener("click", (e) => {
      e.preventDefault();
      deleteUrl = btn.getAttribute("href");
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

    fetch(deleteUrl)
      .then((response) => response.text())
      .then(() => {
        modal.style.display = "none";
        location.reload(); // refresh page after deletion
      })
      .catch((error) => console.error("Error:", error));
  });
});
