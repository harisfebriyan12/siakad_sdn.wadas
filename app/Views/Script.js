const themeToggleButton = document.getElementById("theme-toggle");
const sidebarToggleButton = document.getElementById("toggle-sidebar");
const body = document.body;
const sidebar = document.getElementById("sidebar");

themeToggleButton.addEventListener("click", () => {
  body.classList.toggle("dark-mode");
});

sidebarToggleButton.addEventListener("click", () => {
  sidebar.classList.toggle("sidebar-open");
});