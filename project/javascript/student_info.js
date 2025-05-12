const student_data = {
    SAAT: {
        departments: {
            "Agribusiness": { short: "AGR", levels: ["100 LEVEL", "200 LEVEL", "300 LEVEL", "400 LEVEL", "500 LEVEL"]},
            "Agricultural Economics": { short: "AEC", levels: ["100 LEVEL", "200 LEVEL", "300 LEVEL", "400 LEVEL", "500 LEVEL"]},
            "Agricultural Extension": { short: "AEX", levels:  ["100 LEVEL", "200 LEVEL", "300 LEVEL", "400 LEVEL", "500 LEVEL"]},
            "Animal Science and Technology": { short: "AST", levels:  ["100 LEVEL", "200 LEVEL", "300 LEVEL", "400 LEVEL", "500 LEVEL"]},
            "Crop Science and Technology": { short: "CST", levels: ["100 LEVEL", "200 LEVEL", "300 LEVEL", "400 LEVEL", "500 LEVEL"]},
            "Fisheries and Aquaculture Technology": { short: "FAT", levels: ["100 LEVEL", "200 LEVEL", "300 LEVEL", "400 LEVEL", "500 LEVEL"]},
            "Forestry and Wildlife Technology": { short: "FWT", levels: ["100 LEVEL", "200 LEVEL", "300 LEVEL", "400 LEVEL", "500 LEVEL"]},
            "Soil Science and Technology": { short: "SST", levels: ["100 LEVEL", "200 LEVEL", "300 LEVEL", "400 LEVEL", "500 LEVEL"]}
        }
    },

    SBMS: {
        departments: {
            "Human Anatomy": { short: "ANT", levels: ["100 LEVEL", "200 LEVEL", "300 LEVEL", "400 LEVEL", "500 LEVEL"]},
            "Human Physiology": { short: "HPH", levels: ["100 LEVEL", "200 LEVEL", "300 LEVEL", "400 LEVEL", "500 LEVEL"]},
            "Radiography": { short: "RAD", levels: ["100 LEVEL", "200 LEVEL", "300 LEVEL", "400 LEVEL", "500 LEVEL"]}
        }
    },

    SEET: {
        departments: {
            "Agricultural and Bio resources Engineering": { short: "ABE", levels: ["100 LEVEL", "200 LEVEL", "300 LEVEL", "400 LEVEL", "500 LEVEL"]},
            "Biomedical Engineering": { short: "BME", levels:["100 LEVEL", "200 LEVEL", "300 LEVEL", "400 LEVEL", "500 LEVEL"]},
	        "Chemical Engineering": { short: "CHE", levels:["100 LEVEL", "200 LEVEL", "300 LEVEL", "400 LEVEL", "500 LEVEL"]},
            "Civil Engineering": { short: "CIE", levels:["100 LEVEL", "200 LEVEL", "300 LEVEL", "400 LEVEL", "500 LEVEL"]},
            "Food Science and technology": { short: "FST", levels:["100 LEVEL", "200 LEVEL", "300 LEVEL", "400 LEVEL", "500 LEVEL"]},
            "Material and Metallurgical Engineering": { short: "MME", levels: ["100 LEVEL", "200 LEVEL", "300 LEVEL", "400 LEVEL", "500 LEVEL"]},
            "Mechanical Engineering": { short: "MEE", levels: ["100 LEVEL", "200 LEVEL", "300 LEVEL", "400 LEVEL", "500 LEVEL"]},
            "Petroleum Engineering": { short: "PME", levels: ["100 LEVEL", "200 LEVEL", "300 LEVEL", "400 LEVEL", "500 LEVEL"]},
	        "Polymer and Textile Engineering": { short: "PTE", levels: ["100 LEVEL", "200 LEVEL", "300 LEVEL", "400 LEVEL", "500 LEVEL"]}
        }
    },

    SESET: {
        departments: {
            "Computer Engineering": { short: "CPE", levels: ["100 LEVEL", "200 LEVEL", "300 LEVEL", "400 LEVEL", "500 LEVEL"]},
            "Electrical (Power Systems) Engineering": { short: "EPE", levels: ["100 LEVEL", "200 LEVEL", "300 LEVEL", "400 LEVEL", "500 LEVEL"]},
	        "Electronics Engineering": { short: "ELE", levels: ["100 LEVEL", "200 LEVEL", "300 LEVEL", "400 LEVEL", "500 LEVEL"]},
            "Mechatronics Engineering": { short: "MCE", levels: ["100 LEVEL", "200 LEVEL", "300 LEVEL", "400 LEVEL", "500 LEVEL"]},
            "Telecommunications Engineering": { short: "TEI", levels: ["100 LEVEL", "200 LEVEL", "300 LEVEL", "400 LEVEL", "500 LEVEL"]}
        }
    },

    SOBS: {
        departments: {
            "Biochemistry": { short: "BCH", levels: ["100 LEVEL", "200 LEVEL", "300 LEVEL", "400 LEVEL", "500 LEVEL"]},
            "Biology": { short: "BIO", levels: ["100 LEVEL", "200 LEVEL", "300 LEVEL", "400 LEVEL", "500 LEVEL"]},
            "Biotechnology": { short: "BTC", levels: ["100 LEVEL", "200 LEVEL", "300 LEVEL", "400 LEVEL", "500 LEVEL"]},
            "Microbiology": { short: "MCB", levels: ["100 LEVEL", "200 LEVEL", "300 LEVEL", "400 LEVEL", "500 LEVEL"]},
            "Forensic Science": { short: "FRS", levels: ["100 LEVEL", "200 LEVEL", "300 LEVEL", "400 LEVEL", "500 LEVEL"]}
        }
    },

    SOES: {
        departments: {
	        "Architecture": { short: "ARC", levels: ["100 LEVEL", "200 LEVEL", "300 LEVEL", "400 LEVEL", "500 LEVEL"]},
	        "Building Technology": { short: "BTY", levels: ["100 LEVEL", "200 LEVEL", "300 LEVEL", "400 LEVEL", "500 LEVEL"]},
    	    "Estate Management and Evaluation": { short: "EME", levels: ["100 LEVEL", "200 LEVEL", "300 LEVEL", "400 LEVEL", "500 LEVEL"]},
    	    "Environmental Management": { short: "EVM", levels: ["100 LEVEL", "200 LEVEL", "300 LEVEL", "400 LEVEL", "500 LEVEL"]},
	        "Quantity Surveying": { short: "QST", levels: ["100 LEVEL", "200 LEVEL", "300 LEVEL", "400 LEVEL", "500 LEVEL"]},
	        "Surveying and Geoinformatics": { short: "SVG", levels: ["100 LEVEL", "200 LEVEL", "300 LEVEL", "400 LEVEL", "500 LEVEL"]},
    	    "Urban and Regional Planning": { short: "URP", levels: ["100 LEVEL", "200 LEVEL", "300 LEVEL", "400 LEVEL", "500 LEVEL"]}
        }
    },

    SOHT: {
        departments: {
    	    "Dental Technology": { short: "DNT", levels: ["100 LEVEL", "200 LEVEL", "300 LEVEL", "400 LEVEL", "500 LEVEL"]},
	        "Environmental Health Science": { short: "EHS", levels: ["100 LEVEL", "200 LEVEL", "300 LEVEL", "400 LEVEL", "500 LEVEL"]},
	        "Optometry": { short: "OPT", levels: ["100 LEVEL", "200 LEVEL", "300 LEVEL", "400 LEVEL", "500 LEVEL"]},
    	    "Prosthetics and Orthotics": { short: "PTO", levels: ["100 LEVEL", "200 LEVEL", "300 LEVEL", "400 LEVEL", "500 LEVEL"]},
	        "Public Health Technology": { short: "PUH", levels: ["100 LEVEL", "200 LEVEL", "300 LEVEL", "400 LEVEL", "500 LEVEL"]}
        }
    },

    SOPS: {
        departments: {
    	    "Chemistry": { short: "ICH", levels: ["100 LEVEL", "200 LEVEL", "300 LEVEL", "400 LEVEL", "500 LEVEL"]},
	        "Geology": { short: "GEO", levels: ["100 LEVEL", "200 LEVEL", "300 LEVEL", "400 LEVEL", "500 LEVEL"]},
	        "Mathematics": { short: "MTH", levels: ["100 LEVEL", "200 LEVEL", "300 LEVEL", "400 LEVEL", "500 LEVEL"]},
    	    "Physics": { short: "PHY", levels: ["100 LEVEL", "200 LEVEL", "300 LEVEL", "400 LEVEL", "500 LEVEL"]},
	        "Science Laboratory Technology": { short: "SLT", levels: ["100 LEVEL", "200 LEVEL", "300 LEVEL", "400 LEVEL", "500 LEVEL"]},
	        "Statistics": { short: "STA", levels: ["100 LEVEL", "200 LEVEL", "300 LEVEL", "400 LEVEL", "500 LEVEL"]}
        }
    },

    SCIT: {
        departments: {
    	    "Computer Science": { short: "CSC", levels: ["100 LEVEL", "200 LEVEL", "300 LEVEL", "400 LEVEL", "500 LEVEL"]},
	        "Cyber Security": { short: "CYB", levels: ["100 LEVEL", "200 LEVEL", "300 LEVEL", "400 LEVEL", "500 LEVEL"]},
	        "Information Technology": { short: "IFT", levels: ["100 LEVEL", "200 LEVEL", "300 LEVEL", "400 LEVEL", "500 LEVEL"]},
    	    "Software Engineering": { short: "SOE", levels: ["100 LEVEL", "200 LEVEL", "300 LEVEL", "400 LEVEL", "500 LEVEL"]}
        }
    },

    SLIT: {
        departments: {
    	    "Estate Management and Valuation": { short: "EMV", levels: ["100 LEVEL", "200 LEVEL", "300 LEVEL", "400 LEVEL", "500 LEVEL"]},
    	    "Entrepreneurship and Innovation": { short: "ENI", levels: ["100 LEVEL", "200 LEVEL", "300 LEVEL", "400 LEVEL", "500 LEVEL"]},
	        "Logistics and Transport Technology": { short: "LTT", levels: ["100 LEVEL", "200 LEVEL", "300 LEVEL", "400 LEVEL", "500 LEVEL"]},
	        "Maritime Technology and Logistics": { short: "MTL", levels: ["100 LEVEL", "200 LEVEL", "300 LEVEL", "400 LEVEL", "500 LEVEL"]},
    	    "Logistics Supply Chain Management": { short: "LSCM", levels: ["100 LEVEL", "200 LEVEL", "300 LEVEL", "400 LEVEL", "500 LEVEL"]},
	        "Project Management Technology": { short: "PMT", levels: ["100 LEVEL", "200 LEVEL", "300 LEVEL", "400 LEVEL", "500 LEVEL"]}
        }
    }
};    


function updateDept() {
    const facSelect = document.getElementById("fac");
    const deptSelect = document.getElementById("dept");
    const levelSelect = document.getElementById("level");
    const deptShortInput = document.getElementById("department_short");

    const selectedFac = facSelect.value;

    deptSelect.innerHTML = '<option value="" disabled selected hidden>--Department--</option>';
    levelSelect.innerHTML = '<option value="" disabled selected hidden>--Level--</option>';
    deptShortInput.value = "";

    if (selectedFac && student_data[selectedFac]) {
        const departments = student_data[selectedFac].departments;
        for (const dept in departments) {
            const option = document.createElement("option");
            option.value = dept;
            option.textContent = dept;
            deptSelect.appendChild(option);
        }
    }
    updateDeptShort();
}

function updateDeptShort() {
    const facSelect = document.getElementById("fac");
    const deptSelect = document.getElementById("dept");
    const deptShortInput = document.getElementById("department_short");

    const selectedFac = facSelect.value;
    const selectedDept = deptSelect.value;

    if (selectedFac && selectedDept && student_data[selectedFac].departments[selectedDept]) {
        deptShortInput.value = student_data[selectedFac].departments[selectedDept].short;
    } else {
        deptShortInput.value = "";
    }
}

function updateLvl() {
    const facSelect = document.getElementById("fac");
    const deptSelect = document.getElementById("dept");
    const levelSelect = document.getElementById("level");

    const selectedFac = facSelect.value;
    const selectedDept = deptSelect.value;

    levelSelect.innerHTML = '<option value="" disabled selected hidden>--Level--</option>';

    if (selectedFac && selectedDept && student_data[selectedFac].departments[selectedDept]) {
        const levels = student_data[selectedFac].departments[selectedDept].levels;
        levels.forEach(level => {
            const option = document.createElement("option");
            option.value = level;
            option.textContent = level;
            levelSelect.appendChild(option);
        });
    }
    updateDeptShort();
}
