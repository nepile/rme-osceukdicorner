// Sidebar
document.getElementById("sidebarToggle").addEventListener("click", function () {
    document.getElementById("sidebar").classList.toggle("show");
    document.getElementById("overlay").classList.toggle("show");
});

document.getElementById("overlay").addEventListener("click", function () {
    document.getElementById("sidebar").classList.remove("show");
    document.getElementById("overlay").classList.remove("show");
});

var tooltipTriggerList = [].slice.call(
    document.querySelectorAll('[data-bs-toggle="tooltip"]')
);
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl);
});
