const sidebar = document.getElementById("sidebar");
const closeBtn = document.getElementById("close-btn");
const openBtn = document.getElementById("open-btn");
const mainContent = document.getElementById("main-content");

closeBtn.addEventListener("click", function () {
    sidebar.classList.add("closed");
    mainContent.classList.add("expanded");
});

openBtn.addEventListener("click", function () {
    sidebar.classList.remove("closed");
    mainContent.classList.remove("expanded");
});

document.querySelectorAll(".see-more").forEach((button) => {
    button.addEventListener("click", (event) => {
        event.preventDefault(); // Prevent default anchor behavior
        const fullContent = button.previousElementSibling;
        const previewContent = fullContent.previousElementSibling;

        if (fullContent.style.display === "none") {
            fullContent.style.display = "block";
            previewContent.style.display = "none";
            button.textContent = "Tutup";
        } else {
            fullContent.style.display = "none";
            previewContent.style.display = "block";
            button.textContent = "Lihat Selengkapnya";
        }
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const openBtn = document.querySelector(".open-btn");
    const toggleBtn = document.querySelector(".toggle-btn");
    const sidebar = document.querySelector(".sidebar");

    // Toggle sidebar visibility on open button click
    openBtn.addEventListener("click", function () {
        sidebar.classList.add("open");
    });

    // Hide sidebar on toggle button click
    toggleBtn.addEventListener("click", function () {
        sidebar.classList.remove("open");
    });
});
