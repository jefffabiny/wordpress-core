document.addEventListener("DOMContentLoaded", function () {
  const comprehensiveNav = document.getElementById("comprehensive-nav");
  if (window.innerWidth >= 768) {
    // Desktop
    const header = document.querySelector("header");

    window.addEventListener("scroll", function () {
      const scrollPosition = window.scrollY;
      const maxScroll = 300; // Maximum scroll position to reach
      const maxLeft = -100; // Maximum left position in percentage
      const calculated = (-scrollPosition / maxScroll) * maxLeft;

      header.style.left = calculated * 3 + "%";

      comprehensiveNav.classList.toggle("visible", scrollPosition > 500);
    });
  } else {
    // Mobile
    comprehensiveNav.classList.add("visible");
  }

  // Global
  document.querySelector(".hamburger").addEventListener("click", function () {
    this.classList.toggle("active");
    comprehensiveNav.classList.toggle("active");
  });

  // Create an Intersection Observer instance
  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add("show"); // Add 'show' class when target is in view
        } else {
          entry.target.classList.remove("show"); // Remove 'show' class when target is out of view
        }
      });
    },
    { threshold: 0.5 }
  ); // Trigger callback when at least 50% of target is in view

  // Get all elements with the 'fade-in' class
  const targets = document.querySelectorAll(".fade-in");

  // Start observing each target element
  targets.forEach((target) => {
    observer.observe(target);
  });

  // Define a function to handle the parallax effect
  function handleParallax() {
    // Get the container's position relative to the viewport
    rect = parallaxContainer.getBoundingClientRect();
    if (window.scrollY >= containerTop - viewportHeight) {
      // Element in view; begin parallax scroll effect
      // The scroll should be a calculation relative to the height of the viewport
      let scrollDistance = window.scrollY - (containerTop - viewportHeight);
      let parallaxFactor = 0.4; // Adjust this value as needed for desired speed

      // Calculate the translation based on the scroll distance and parallax factor
      let translate = scrollDistance * parallaxFactor;

      // Apply the calculated translation to the background's transform style property
      parallaxBg.style.transform = `translateY(-${translate}px)`;
    }
  }

  // Select the parallax container once
  const parallaxContainer = document.querySelector(".parallax-container");
  const parallaxBg = parallaxContainer.querySelector(".parallax-bg");
  let rect = parallaxContainer.getBoundingClientRect();
  let containerTop = rect.top;
  const viewportHeight = window.innerHeight;

  // Call the function to position the parallax element initially
  handleParallax();

  // Add event listener for scroll events
  window.addEventListener("scroll", handleParallax);
});
