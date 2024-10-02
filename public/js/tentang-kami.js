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

document.querySelectorAll(".team-card").forEach((card) => {
    card.addEventListener("click", function () {
        this.classList.toggle("flipped");
    });
});
