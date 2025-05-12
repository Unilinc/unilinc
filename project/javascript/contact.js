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
    document.querySelectorAll(".view-more").forEach(function (toggle) {
        toggle.addEventListener("click", function () {
            let bottomContent = this.closest(".event-body-content").querySelector(".event-body-content-down");
            
            document.querySelectorAll(".event-body-content-down").forEach(function (content) {
                if (content !== bottomContent) {
                    content.style.maxHeight = null;
                    content.style.opacity = 0;
                    content.closest(".event-body-content").querySelector(".view-more").innerHTML = "...";
                }
            });
            
            if (bottomContent.style.maxHeight) {
                bottomContent.style.maxHeight = null;
                bottomContent.style.opacity = 0;
                this.innerHTML = "...";
            } else {
                bottomContent.style.maxHeight = bottomContent.scrollHeight + "px";
                bottomContent.style.opacity = 1;
                this.innerHTML = "&dwangle;"; 
            }
        });
    });
});

