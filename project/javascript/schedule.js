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
    const addScheduleButton = document.getElementById('add-schedule');
    const scheduleModal = document.getElementById('schedule-modal');
    const scheduleForm = document.getElementById('schedule-form');
    const closeButton = document.getElementById('close-modal');
    const deleteModal = document.getElementById('delete-modal');
    const confirmDeleteButton = document.getElementById('confirm-delete');
    const cancelDeleteButton = document.getElementById('cancel-delete');
    const successModal = document.getElementById('success-modal');
    const successMessage = document.getElementById('success-message');
    const currentDateElement = document.getElementById("current-date");
    const prevDateButton = document.getElementById("prev-date");
    const nextDateButton = document.getElementById("next-date");
    const dateContainer = document.querySelector(".date-container");

    let currentDate = new Date();
    const options = { weekday: 'long', year: 'numeric', month: 'short', day: 'numeric' };

    const showSuccessMessage = (message) => {
        successMessage.textContent = message;
        successModal.style.display = 'block';

        setTimeout(() => {
            successModal.style.display = 'none';
        }, 3000);
    };

    addScheduleButton.addEventListener('click', () => {
        scheduleForm.reset();
        scheduleModal.style.display = 'block';
    });

    closeButton.addEventListener('click', () => {
        scheduleModal.style.display = 'none';
    });

    scheduleForm.addEventListener('submit', (e) => {
        e.preventDefault();

        const formData = new FormData(scheduleForm);
        
        const lectureStartTime = formData.get('lecture_start_time'); 

        const currentTime = new Date();
        const currentHours = currentTime.getHours();
        const currentMinutes = currentTime.getMinutes();

        const formattedCurrentTime = `${currentHours % 12 || 12}:${currentMinutes.toString().padStart(2, '0')} ${currentHours >= 12 ? 'PM' : 'AM'}`;
        
        const currentDateStr = currentDate.toISOString().split('T')[0]; // Format: YYYY-MM-DD
        const currentFullTime = new Date(`${currentDateStr}T${currentHours}:${currentMinutes}:00`); // Current date and time
        
        const startTime = new Date(`${currentDate.toISOString().split('T')[0]}T${lectureStartTime}:00`);

        const timeDifferenceInSeconds = (startTime - currentFullTime) / 1000;
        
        if (timeDifferenceInSeconds < 1800) {
            showSuccessMessage(`Schedule cannot be added. Start time must be at least 30 minutes from now. Current time: ${formattedCurrentTime}`);
            return;
        }
        
        fetch('/project/dashboard/lecturer/schedule_handler.php', { method: 'POST', body: formData })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showSuccessMessage("Schedule added successfully");
                    scheduleModal.style.display = 'none';
                    loadSchedules();
                } else {
                    showSuccessMessage(data.message); 
                }
            });
    });

    const formatTimeRange = (startTime, endTime) => {
        const formatTime = (time) => {
            const [hour, minute] = time.split(":");
            const hourNum = parseInt(hour, 10);
            const ampm = hourNum >= 12 ? "pm" : "am";
            const formattedHour = hourNum % 12 || 12;
            return `${formattedHour}:${minute}${ampm}`;
        };
        return `${formatTime(startTime)} - ${formatTime(endTime)}`;
    };

    const loadSchedules = () => {
        fetch(`/project/dashboard/lecturer/schedule_handler.php?date=${currentDate.toISOString().split('T')[0]}`)
            .then(response => response.json())
            .then(data => {
                const scheduleBody = document.getElementById('schedule-body');
                scheduleBody.innerHTML = '';

                if (data.length === 0) {
                    scheduleBody.innerHTML = '<tr><td colspan="4" style="text-align: center;">No lectures today. 😉</td></tr>';
                    return;
                }

                data.forEach((schedule) => {
                    const row = document.createElement('tr');
                    const indicatorClass = schedule.status === 'active' ? 'status-active' : 'status-cancelled';
                    const timeRange = formatTimeRange(schedule.lecture_start_time, schedule.lecture_end_time);

                    row.innerHTML = `
                        <td id="td_indicator">
                            <div class="status-indicator ${indicatorClass}" data-id="${schedule.id}" data-status="${schedule.status}" onclick="toggleStatus(${schedule.id}, '${schedule.status}')"></div>
                        </td>
                        <td id="td_details">
                            <div id="td_details_box">
                                <p id="course"><b>${schedule.course_name} (${schedule.topic})</b></p>
                                <p id="Lname">${schedule.lecturer_name}</p>
                                <p id="venue">${schedule.venue}</p>
                            </div>
                        </td>
                        <td id="td_time">
                            <div id="td_time_box">
                                <span id="timeframe">${timeRange}</span>
                            </div>
                        </td>
                        <td id="td_opt">
                            <span><img id="click-icons-delete" src="/project/images/delete-button.JPG" alt="delete-button" width="18px" height="18px" onclick="deleteSchedule(${schedule.id})" /></span>
                        </td>
                    `;
                    scheduleBody.appendChild(row);
                });
            })
            .catch(error => {
                console.error('Error loading schedules:', error);
                document.getElementById('schedule-body').innerHTML = '<tr><td colspan="4">Failed to load schedules. Please try again later.</td></tr>';
            });
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

    window.toggleStatus = (id, currentStatus) => {
        const newStatus = currentStatus === 'active' ? 'cancelled' : 'active';
        fetch('/project/dashboard/lecturer/schedule_handler.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `action=toggle_status&schedule_id=${id}&status=${newStatus}`
        }).then(response => response.json())
          .then(data => {
              if (data.success) {
                  const statusMessage = newStatus === 'active' 
                                        ? "Lecture Schedule: Active" 
                                        : "Lecture Schedule: Cancelled";
                  showSuccessMessage(statusMessage);
                  loadSchedules();
              } else {
                  showSuccessMessage(data.message);
              }
          });
    };

    window.deleteSchedule = (id) => {
        scheduleToDeleteId = id;
        deleteModal.style.display = 'block'; 
    };

    confirmDeleteButton.addEventListener('click', () => {
        if (scheduleToDeleteId !== null) {
            fetch("/project/dashboard/lecturer/schedule_handler.php", {
                method: "POST",
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                body: `action=delete_schedule&schedule_id=${scheduleToDeleteId}`
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showSuccessMessage("Schedule deleted successfully");
                    loadSchedules();
                } else {
                    showSuccessMessage(data.message);
                }
                deleteModal.style.display = 'none'; 
            });
        }
    });

    cancelDeleteButton.addEventListener('click', () => {
        deleteModal.style.display = 'none';
    });

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
            showSuccessMessage("Invalid date selected. Please try again.");
            return;
        }

        currentDate = selectedDate;
        currentDateElement.textContent = currentDate.toLocaleDateString("en-US", options);
        calendarModal.style.display = "none";

        loadSchedules();
    });

    loadSchedules(); // Initial load
});
