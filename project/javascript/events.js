function toggleMenu() {
    const menuIcon = document.getElementById("menu-icon");
    const menuOptions = document.getElementById("menu-options");

    if (menuOptions.style.transform === "translateX(110%)" || menuOptions.style.transform === "") {
        menuOptions.style.transform = "translateX(0%)"; 
        menuIcon.textContent = "×";  
    } else {
        menuOptions.style.transform = "translateX(110%)";  
        menuIcon.textContent = "☰";  
    }
}

document.addEventListener('click', (event) => {
    const menu = document.getElementById("menu-options");
    const menuIcon = document.getElementById("menu-icon");

    if (!menu.contains(event.target) && !menuIcon.contains(event.target)) {
        menu.style.transform = "translateX(110%)";
        menuIcon.textContent = "☰";
    }
});


document.addEventListener("DOMContentLoaded", function () {
    // Select all "View More" buttons
    document.querySelectorAll(".view-more").forEach((button) => {
        button.addEventListener("click", function () {
            // Get the corresponding event content
            let content = this.previousElementSibling;
            
            // Add class to slide it in
            content.classList.add("slide-in");
            content.classList.remove("slide-out");
        });
    });

    // Select all "Close" buttons
    document.querySelectorAll("#nav-back-button").forEach((closeBtn) => {
        closeBtn.addEventListener("click", function () {
            // Find the parent content div and slide it out
            let content = this.closest(".event-content");
            if (content) {
                content.classList.remove("slide-in");
                content.classList.add("slide-out");

                // Wait for animation to finish before hiding the element
                setTimeout(() => {
                    content.style.display = "block";
                }, 500); // Matches the animation duration
            }
        });
    });
});


document.addEventListener("DOMContentLoaded", () => {
    const buttons = document.querySelectorAll('.filter-bar div'); 
    const eventContents = document.querySelectorAll('.event-body-content'); 
    let activeFilters = new Set(); // Stores active filters

    buttons.forEach(button => {
        button.addEventListener('click', () => {
            const selectedCategory = button.id;

            // Toggle filter (Add if not present, Remove if present)
            if (activeFilters.has(selectedCategory)) {
                activeFilters.delete(selectedCategory);
                button.classList.remove('active');
            } else {
                activeFilters.add(selectedCategory);
                button.classList.add('active');
            }

            // Update event contents visibility
            eventContents.forEach(content => {
                const categories = content.getAttribute('data-category').split(' ');

                // Show if it matches at least one selected category or no filters are selected
                if ([...activeFilters].some(filter => categories.includes(filter)) || activeFilters.size === 0) {
                    content.style.display = "block"; 
                } else {
                    content.style.display = "none";
                }
            });
        });
    });
});
