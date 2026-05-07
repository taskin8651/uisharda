// Sharda Placement - Main JS
// Keep this file for future interactive features:
// - Scrollspy / active menu highlight
// - Smooth scrolling
// - Form validations
// - Dynamic jobs rendering (API integration)

document.addEventListener("DOMContentLoaded", () => {
  // Footer year
  const yr = document.getElementById("yr");
  if (yr) yr.textContent = new Date().getFullYear();

  // Smooth scroll for anchor links
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener("click", function(e) {
      const target = document.querySelector(this.getAttribute("href"));
      if (!target) return;

      e.preventDefault();
      target.scrollIntoView({ behavior: "smooth" });
    });
  });
});

document.addEventListener("DOMContentLoaded", () => {
  const nav = document.querySelector(".navbar-premium");
  if (!nav) return;

  const onScroll = () => {
    if (window.scrollY > 10) {
      nav.style.boxShadow = "0 10px 30px rgba(2,6,23,.08)";
      nav.style.background = "rgba(255,255,255,.92)";
    } else {
      nav.style.boxShadow = "none";
      nav.style.background = "rgba(255,255,255,.82)";
    }
  };

  onScroll();
  window.addEventListener("scroll", onScroll, { passive: true });
});

document.addEventListener("DOMContentLoaded", () => {
  const nav = document.querySelector(".navbar-premium");

  const onScroll = () => {
    if (window.scrollY > 20) {
      nav.classList.add("scrolled");
    } else {
      nav.classList.remove("scrolled");
    }
  };

  window.addEventListener("scroll", onScroll, { passive: true });
});

// Premium Preloader
(function () {
  const preloader = document.getElementById("preloader");
  if (!preloader) return;

  // lock scroll
  document.body.classList.add("is-loading");

  const hide = () => {
    preloader.classList.add("is-hidden");
    document.body.classList.remove("is-loading");
    // Optional: remove from DOM after animation
    setTimeout(() => preloader.remove(), 600);
  };

  // When full page load completes
  window.addEventListener("load", () => {
    // Small delay makes it feel premium, not abrupt
    setTimeout(hide, 250);
  });

  // Safety fallback (in case load event doesn't fire)
  setTimeout(hide, 4000);
})();