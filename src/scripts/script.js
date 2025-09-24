const sidebar = document.getElementById("sidebar");
const toggleBtn = document.getElementById("toggleBtn");

let sidebarCollapsed = false;

// Collapsable Sidebar Functionality
toggleBtn.addEventListener("click", () => {
  sidebarCollapsed = !sidebarCollapsed;
  sidebar.classList.toggle("collapsed", sidebarCollapsed);
  toggleBtn.textContent = sidebarCollapsed ? "▶" : "◀";
});
