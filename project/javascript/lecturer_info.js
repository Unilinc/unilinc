const lecturer_data = {
    SAAT: {
        departments: [
            "Agribusiness",
            "Agricultural Economics",
            "Agricultural Extension",
            "Animal Science and Technology",
            "Crop Science and Technology",
            "Fisheries and Aquaculture Technology",
            "Forestry and Wildlife Technology",
            "Soil Science and Technology"
        ]
    },
    SBMS: {
        departments: [
            "Human Anatomy",
            "Radiography",
            "Human Physiology"
        ]
    },
    SEET: {
        departments: [
            "Agricultural and Bio resources Engineering",
            "Biomedical Engineering",
            "Chemical Engineering",
            "Civil Engineering",
            "Food Science and technology",
            "Material and Metallurgical Engineering",
            "Mechanical Engineering",
            "Petroleum Engineering",
            "Polymer and Textile Engineering"
        ]
    },
    SESET: {
        departments: [
            "Computer Engineering",
            "Electrical (Power Systems) Engineering",
            "Electrical and Electronic Engineering",
            "Electronics Engineering",
            "Mechatronics Engineering",
            "Telecommunications Engineering"
        ]
    },
    SOBS: {
        departments: [
            "Biochemistry",
            "Biology",
            "Biotechnology",
            "Microbiology",
            "Forensic Science"
        ]
    },
    SOES: {
        departments: [
            "Architecture",
            "Building Technology",
            "Estate Management and Evaluation",
            "Environmental Management",
            "Quantity Surveying",
            "Surveying and Geoinformatics",
            "Urban and Regional Planning"
        ]
    },
    SOHT: {
        departments: [
            "Dental Technology",
            "Environmental Health Science",
            "Optometry",
            "Prosthetics and Orthotics",
            "Public Health Technology"
        ]
    },
    SOPS: {
        departments: [
            "Chemistry",
            "Geology",
            "Mathematics",
            "Physics",
            "Science Laboratory Technology",
            "Statistics"
        ]
    },
    SCIT: {
        departments: [
            "Computer Science",
            "Cyber Security",
            "Information Technology",
            "Software Engineering"
        ]
    },
    SLIT: {
        departments: [
            "Entrepreneurship and Innovation",
            "Estate Management and Valuation",
            "Logistics and Transport Technology",
            "Maritime Technology and Logistics",
            "Supply Chain Management",
            "Project Management Technology"
        ]
    }
};

function updateDepartment() {
    const facultySelect = document.getElementById("faculty");
    const departmentSelect = document.getElementById("department");
    const selectedFaculty = facultySelect.value;

    // Reset department dropdown
    departmentSelect.innerHTML = '<option value="" disabled selected hidden>--Department--</option>';

    // Populate departments based on selected faculty
    if (selectedFaculty && lecturer_data[selectedFaculty]) {
        const departments = lecturer_data[selectedFaculty].departments;
        departments.forEach(department => {
            const option = document.createElement("option");
            option.value = department;
            option.textContent = department;
            departmentSelect.appendChild(option);
        });
    }
}

