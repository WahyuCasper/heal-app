document.addEventListener("DOMContentLoaded", function () {
    // Scroll detection for header hiding
    let lastScrollTop = 0;
    const header = document.querySelector("header");

    window.addEventListener("scroll", function () {
        let currentScroll =
            window.pageYOffset || document.documentElement.scrollTop;

        if (currentScroll > lastScrollTop) {
            // Scrolling down
            header.classList.add("header-hidden");
        } else {
            // Scrolling up
            header.classList.remove("header-hidden");
        }

        lastScrollTop = currentScroll <= 0 ? 0 : currentScroll; // For Mobile or negative scrolling
    });

    // Smooth scrolling for anchor links
    const links = document.querySelectorAll('nav a[href^="#"]');

    links.forEach((link) => {
        link.addEventListener("click", function (e) {
            e.preventDefault();

            // Get the target element
            const targetId = this.getAttribute("href").substring(1);
            const targetElement = document.getElementById(targetId);

            // Scroll to the target element
            targetElement.scrollIntoView({
                behavior: "smooth",
            });
        });
    });

    // Hamburger menu functionality
    const hamburgerMenu = document.getElementById("hamburger-menu");
    const hideButton = document.getElementById("hide-button");
    const nav = document.getElementById("nav-links");

    hamburgerMenu.addEventListener("click", function () {
        nav.classList.remove("nav-closed");
        nav.classList.add("nav-open");
    });

    hideButton.addEventListener("click", function () {
        nav.classList.remove("nav-open");
        nav.classList.add("nav-closed");
    });
});

// Mendapatkan elemen modal
var modal = document.getElementById("ratingModal");

// Mendapatkan tombol yang membuka modal
var btn = document.querySelector(".btn-rating");

// Mendapatkan elemen <span> yang menutup modal
var span = document.getElementsByClassName("close-button")[0];

// Pastikan modal tidak terbuka saat halaman dimuat (ini penting)
document.addEventListener("DOMContentLoaded", function () {
    modal.style.display = "none"; // Set modal agar tetap tersembunyi saat halaman pertama kali dimuat
});

// Ketika tombol diklik, buka modal
btn.onclick = function (event) {
    event.preventDefault(); // Mencegah aksi default jika tombol adalah link
    modal.style.display = "block"; // Hanya buka modal saat tombol diklik
};

// Ketika pengguna mengklik <span> (x), tutup modal
span.onclick = function () {
    modal.style.display = "none"; // Tutup modal saat tombol tutup (x) diklik
};

// Ketika pengguna mengklik di luar modal, tutup modal
window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none"; // Tutup modal saat pengguna mengklik di luar modal
    }
};

// Menutup modal setelah form submit
document.getElementById("ratingForm").addEventListener("submit", function () {
    modal.style.display = "none"; // Modal ditutup setelah form dikirim
});
