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

document.addEventListener("DOMContentLoaded", () => {
    const currentDateElement = document.getElementById("current-date");
    const prevDateButton = document.getElementById("prev-date");
    const nextDateButton = document.getElementById("next-date");
    const dateContainer = document.querySelector(".date-container");
    const popupMessage = document.getElementById('popup_message');

    function showMessage(message) {
        popupMessage.textContent = message;
        popupMessage.style.display = 'block';
        setTimeout(() => {
            popupMessage.style.display = 'none';
        }, 3000);
    }

    let now = new Date();
    let currentDate = new Date(); 
    const options = { weekday: "long", year: "numeric", month: "short", day: "numeric" };
    
    const loadSchedules = () => {
        const currentDateFormatted = new Date(currentDate).toISOString().split("T")[0];
    
        fetch(`/project/dashboard/student/schedule_loader.php?date=${currentDateFormatted}`)
            .then((response) => response.json())
            .then((data) => {
                const scheduleBody = document.getElementById("schedule-body");
                scheduleBody.innerHTML = "";

                if (data.length === 0) {
                    scheduleBody.innerHTML = '<tr><td colspan="4" style="text-align: center;">No lectures scheduled for today. 😉</td></tr>';
                    return;
                }

                data.forEach((schedule) => {
                    const row = document.createElement("tr");
                    const indicatorClass = schedule.status === "active" ? "status-active" : "status-cancelled";
                    const timeRange = formatTimeRange(schedule.lecture_start_time, schedule.lecture_end_time);

                    row.innerHTML = `
                        <td id="td_indicator">
                            <div class="status-indicator ${indicatorClass}" title="${schedule.status}"></div>
                        </td>
                        <td id="td_details">
                            <div id="td_details_box">
                                <p id="course"><b>${schedule.course_name} (${schedule.topic})</b></p>
                                <p id="Lname">Lecturer: ${schedule.lecturer_name}</p>
                                <p id="venue">Venue: ${schedule.venue}</p>
                            </div>
                        </td>
                        <td id="td_time">
                            <div id="td_time_box">
                                <span id="timeframe">${timeRange}</span>
                            </div>
                        </td>
                        <td id="td_rate">
                            <button class="rate-btn" data-course="${schedule.course_name}">Rate</button>
                        </td>
                    `;
                    scheduleBody.appendChild(row);
                });

                attachRateButtonListeners();
            })
            .catch((error) => {
                console.error("Error loading schedules:", error);
                document.getElementById("schedule-body").innerHTML =
                    '<tr><td colspan="4">Failed to load schedules. Please try again later.</td></tr>';
            });
    };


function attachRateButtonListeners() {
    document.querySelectorAll(".rate-btn").forEach((button) => {
        button.addEventListener("click", function () {
            const courseName = this.getAttribute("data-course");

            verifyAttendance(courseName, this);
        });
    });
}

function verifyAttendance(course, button) {
    const now = new Date();
    const year = now.getFullYear();
    const month = String(now.getMonth() + 1).padStart(2, '0'); 
    const day = String(now.getDate()).padStart(2, '0');
    const localDate = `${year}-${month}-${day}`; 

    fetch(`/project/dashboard/student/rating.php?course=${course}&date=${localDate}`)
        .then((response) => response.json())
        .then((data) => {
            if (data.alreadyRated) {
                button.disabled = true;
                button.innerText = "Rated";
                showMessage("You have already rated this lecture.");
                return;
            }

            if (data.attended) {
                showRatingPopup(course, data.topic, data.lecturer, button);
            } else {
                showMessage("Sorry! You did not attend this class.");
            }
        })
        .catch((error) => {
            console.error("Error verifying attendance:", error);
            showMessage("An error occurred. Please try again later.");
        });
}

function showRatingPopup(course, topic, lecturer, button) {
    const ratingPopup = document.createElement("div");
    ratingPopup.classList.add("rating-popup");
    ratingPopup.innerHTML = `
        <div class="rating-container">
            <h3>Rate Lecture: ${course} (${topic})</h3>
            <p id="lecturer-name">Lecturer: ${lecturer}</p>
            <div class="stars">
                <span class="star-button" data-value="1">⭐</span>
                <span class="star-button" data-value="2">⭐</span>
                <span class="star-button" data-value="3">⭐</span>
                <span class="star-button" data-value="4">⭐</span>
                <span class="star-button" data-value="5">⭐</span>
            </div>
            <button id="submit-rating">Submit</button>
        </div>
    `;

    document.body.appendChild(ratingPopup);

    if (ratingPopup) {
        let closeButton = document.createElement("button");
        closeButton.id = "close-rating";
        closeButton.innerHTML = "X";
        closeButton.style.fontWeight = "bolder";

        closeButton.addEventListener("click", function () {
            ratingPopup.remove();
        });

        ratingPopup.appendChild(closeButton);
        document.body.appendChild(ratingPopup);
    }

    document.querySelectorAll(".star-button").forEach((star) => {
        star.addEventListener("click", function () {
            document.querySelectorAll(".star-button").forEach((s) => s.classList.remove("selected"));
            this.classList.add("selected");
        });
    });

    document.getElementById("submit-rating").addEventListener("click", () => {
        const selectedStar = document.querySelector(".stars .selected");
        if (!selectedStar) {
            showMessage("Please select a rating before submitting.");
            return;
        }

        const ratingValue = selectedStar.getAttribute("data-value");
        submitRating(course, lecturer, ratingValue, button);
        document.body.removeChild(ratingPopup);
    });

    ratingPopup.addEventListener("click", (e) => {
        if (e.target === ratingPopup) document.body.removeChild(ratingPopup);
    });
}

function submitRating(course, lecturer, rating, button) {
    fetch("/project/dashboard/student/rating.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({
            course: course,
            lecturer: lecturer,
            rating: rating
        })
    })
.then((response) => response.json())
    .then((data) => {
        if (data.success) {
            showMessage("Thank you for rating!");

            if (button) {
                button.disabled = true;
                button.innerText = "Rated";
            }
        } else {
            showMessage("Error submitting rating. Please try again.");
        }
    })
    .catch((error) => {
        console.error("Error submitting rating:", error);
        showMessage("An error occurred. Please try again later.");
    });
}

    const formatTimeRange = (startTime, endTime) => {
        const start = new Date(`1970-01-01T${startTime}`);
        const end = new Date(`1970-01-01T${endTime}`);
        const options = { hour: '2-digit', minute: '2-digit' };
        return `${start.toLocaleTimeString('en-US', options)} - ${end.toLocaleTimeString('en-US', options)}`;
    };
    

    const updateDateDisplay = (direction) => {
        const offset = direction === "left" ? "-100%" : "100%";

        currentDateElement.style.transition = "transform 0.5s ease";
        currentDateElement.style.transform = `translateX(${offset})`;

        currentDateElement.addEventListener(
            "transitionend",
            () => {
                currentDate.setDate(
                    currentDate.getDate() + (direction === "left" ? 1 : -1)
                );
                currentDateElement.textContent = currentDate.toLocaleDateString(
                    "en-US",
                    options
                );

                currentDateElement.style.transition = "none";
                currentDateElement.style.transform = "translateX(0)";
                loadSchedules();
            },
            { once: true }
        );
    };

    const resetToCurrentDate = () => {
        currentDate = new Date(); 
        currentDateElement.textContent = currentDate.toLocaleDateString("en-US", options);
        loadSchedules();
    };

    currentDateElement.textContent = currentDate.toLocaleDateString("en-US", options);

    prevDateButton.addEventListener("click", () => updateDateDisplay("right"));
    nextDateButton.addEventListener("click", () => updateDateDisplay("left"));

    dateContainer.addEventListener("click", resetToCurrentDate);

    const calendarModal = document.getElementById("calendar-modal");
    const calendarInput = document.getElementById("calendar-input");
    const calendarSelect = document.getElementById("calendar-select");
    const calendarClose = document.getElementById("calendar-close");
    const calendarIcon = document.getElementById("check_calendar_button");

    calendarIcon.addEventListener("click", () => {
        calendarInput.value = currentDate.toISOString().split("T")[0]; 
        calendarModal.style.display = "block";
    });

    calendarClose.addEventListener("click", () => {
        calendarModal.style.display = "none";
    });

    calendarSelect.addEventListener("click", () => {
        const selectedDate = new Date(calendarInput.value);
        if (isNaN(selectedDate)) {
            showMessage("Invalid date selected. Please try again.");
            return;
        }

        currentDate = selectedDate;
        currentDateElement.textContent = currentDate.toLocaleDateString("en-US", options);
        calendarModal.style.display = "none";

        loadSchedules();
    });

    loadSchedules(); 
});
