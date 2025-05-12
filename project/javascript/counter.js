document.addEventListener("DOMContentLoaded", () => {
    function animateCounter(element, start, end, duration) {
        let startTime = null;

        function updateCounter(timestamp) {
            if (!startTime) startTime = timestamp;
            const progress = Math.min((timestamp - startTime) / duration, 1);
            const value = Math.floor(progress * (end - start) + start);
            element.textContent = formatValue(value, end);

            if (progress < 1) {
                requestAnimationFrame(updateCounter);
            }
        }

        requestAnimationFrame(updateCounter);
    }

    function formatValue(value, endValue) {
        if (endValue >= 1000000) return (value / 1000000).toFixed(1) + "M";
        if (endValue >= 1000) return (value / 1000).toFixed(0) + "K";
        return value.toString();
    }

    function parseTargetValue(value) {
        const multiplier = value.endsWith("K") ? 1000 : value.endsWith("M") ? 1000000 : 1;
        const numericValue = parseFloat(value.replace(/[KM]/, ""));
        return numericValue * multiplier;
    }

    function isInViewport(element) {
        const rect = element.getBoundingClientRect();
        return (
            rect.top >= 0 &&
            rect.left >= 0 &&
            rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
            rect.right <= (window.innerWidth || document.documentElement.clientWidth)
        );
    }

    function initCounters() {
        const counters = [
            { id: "download-counter", value: "750K" },
            { id: "universities-counter", value: "5K" },
            { id: "departments-counter", value: "120K" },
            { id: "staffs-counter", value: "400K" },
            { id: "students-counter", value: "1.2M" },
            { id: "accounts-counter", value: "1.1M" },
        ];

        counters.forEach((counter) => {
            const element = document.getElementById(counter.id);
            const numericValue = parseTargetValue(counter.value);
            animateCounter(element, 0, numericValue, 2000); // 
        });
    }

    let hasStarted = false;
    window.addEventListener("scroll", () => {
        const coverageSection = document.getElementById("coverage");
        if (isInViewport(coverageSection) && !hasStarted) {
            hasStarted = true;
            initCounters();
        }
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const postContainer = document.querySelector(".post-container");
    const posts = Array.from(postContainer.children); 
    const prevButton = document.getElementById("prev-post");
    const nextButton = document.getElementById("next-post");

    let currentIndex = 0;

    function updateDisplay() {
        posts.forEach((post, index) => {
            post.style.transition = "transform 0.5s ease, opacity 0.5s ease";
            post.style.height = "100%";
            if (index === currentIndex) {
                post.style.transform = "translateX(0)";
                post.style.opacity = "1";
                post.style.zIndex = "1";
            } else if (index < currentIndex) {
                post.style.transform = "translateX(-100%)";
                post.style.opacity = "0";
                post.style.zIndex = "0";
            } else {
                post.style.transform = "translateX(100%)";
                post.style.opacity = "0";
                post.style.zIndex = "0";
            }
        });
    }

    nextButton.addEventListener("click", function () {
        currentIndex = (currentIndex + 1) % posts.length; 
        updateDisplay();
    });

    prevButton.addEventListener("click", function () {
        currentIndex = (currentIndex - 1 + posts.length) % posts.length; 
        updateDisplay();
    });

    posts.forEach((post, index) => {
        post.style.position = "absolute";
        post.style.height = "100%";
        post.style.width = "100%";
        post.style.transition = "transform 0.5s ease, opacity 0.5s ease";
        if (index === currentIndex) {
            post.style.transform = "translateX(0)";
            post.style.opacity = "1";
        } else {
            post.style.transform = "translateX(100%)";
            post.style.opacity = "0";
        }
    });
});

function toggleMenu() {
    const navCenter = document.querySelector('.nav-options-center');

    navCenter.classList.toggle('active');
    
    document.addEventListener('click', (event) => {
        if (!navCenter.contains(event.target) && !event.target.matches('.menu-icon')) {
            navCenter.classList.remove('active');
        }
    });
    
    const menuOptions = navCenter.querySelectorAll('a');
    menuOptions.forEach(option => {
        option.addEventListener('click', (event) => {
            navCenter.classList.remove('active');
            
            const targetSection = document.querySelector(option.getAttribute('data-target'));
            if (targetSection) {
                targetSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });
}
