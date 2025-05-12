const stats = {
    IFT: {
        levels: {
            "100 LEVEL": ["MTH 101", "CHM 101", "BIO 101"],
            "200 LEVEL": ["IFT 201", "IFT 202", "IFT 203", "IFT 204", "IFT 205", "IFT 206", "IFT 207", "IFT 208"],
            "300 LEVEL": ["IFT 301", "IFT 302", "IFT 303", "IFT 304", "IFT 305", "IFT 306", "IFT 307", "IFT 308"],
            "400 LEVEL": ["IFT 401", "IFT 402", "IFT 403", "IFT 404", "IFT 405", "IFT 406", "IFT 407", "IFT 408"],
            "500 LEVEL": ["IFT 501", "IFT 502", "IFT 503", "IFT 504", "IFT 505", "IFT 506", "IFT 507", "IFT 508"]
        }
    },
    SOE: {
        levels: {
            "100 LEVEL": ["Intro to Programming", "Computer Fundamentals"],
            "200 LEVEL": ["SOE 201", "SOE 202", "SOE 203", "SOE 204", "SOE 205", "SOE 206", "SOE 207", "SOE 208"],
            "300 LEVEL": ["SOE 301", "SOE 302", "SOE 303", "SOE 304", "SOE 305", "SOE 306", "SOE 307", "SOE 308"],
            "400 LEVEL": ["SOE 401", "SOE 402", "SOE 403", "SOE 404", "SOE 405", "SOE 406", "SOE 407", "SOE 408"],
            "500 LEVEL": ["SOE 501", "SOE 502", "SOE 503", "SOE 504", "SOE 505", "SOE 506", "SOE 507", "SOE 508"]
        }
    },
    CSC: {
        levels: {
            "100 LEVEL": ["Intro to CS", "Mathematics for CS"],
            "200 LEVEL": ["CSC 201", "CSC 202", "CSC 203", "CSC 204", "CSC 205", "CSC 206", "CSC 207", "CSC 208"],
            "300 LEVEL": ["CSC 301", "CSC 302", "CSC 303", "CSC 304", "CSC 305", "CSC 306", "CSC 307", "CSC 308"],
            "400 LEVEL": ["CSC 401", "CSC 402", "CSC 403", "CSC 404", "CSC 405", "CSC 406", "CSC 407", "CSC 408"],
            "500 LEVEL": ["CSC 501", "CSC 502", "CSC 503", "CSC 504", "CSC 505", "CSC 506", "CSC 507", "CSC 508"]
        }
    },
    CYB: {
        levels: {
            "100 LEVEL": ["Intro to CS", "Mathematics for CS"],
            "200 LEVEL": ["CYB 201", "CYB 202", "CYB 203", "CYB 204", "CYB 205", "CYB 206", "CYB 207", "CYB 208"],
            "300 LEVEL": ["CYB 301", "CYB 302", "CYB 303", "CYB 304", "CYB 305", "CYB 306", "CYB 307", "CYB 308"],
            "400 LEVEL": ["CYB 401", "CYB 402", "CYB 403", "CYB 404", "CYB 405", "CYB 406", "CYB 407", "CYB 408"],
            "500 LEVEL": ["CYB 501", "CYB 502", "CYB 503", "CYB 504", "CYB 505", "CYB 506", "CYB 507", "CYB 508"]
        }
    },
    AEC: {
        levels: {
            "100 LEVEL": ["Intro to CS", "Mathematics for CS"],
            "200 LEVEL": ["AEC 201", "AEC 202", "AEC 203", "AEC 204", "AEC 205", "AEC 206", "AEC 207", "AEC 208"],
            "300 LEVEL": ["AEC 301", "AEC 302", "AEC 303", "AEC 304", "AEC 305", "AEC 306", "AEC 307", "AEC 308"],
            "400 LEVEL": ["AEC 401", "AEC 402", "AEC 403", "AEC 404", "AEC 405", "AEC 406", "AEC 407", "AEC 408"],
            "500 LEVEL": ["AEC 501", "AEC 502", "AEC 503", "AEC 504", "AEC 505", "AEC 506", "AEC 507", "AEC 508"]
        }
    },
    AGR: {
        levels: {
            "100 LEVEL": ["Intro to CS", "Mathematics for CS"],
            "200 LEVEL": ["AGR 201", "AGR 202", "AGR 203", "AGR 204", "AGR 205", "AGR 206", "AGR 207", "AGR 208"],
            "300 LEVEL": ["AGR 301", "AGR 302", "AGR 303", "AGR 304", "AGR 305", "AGR 306", "AGR 307", "AGR 308"],
            "400 LEVEL": ["AGR 401", "AGR 402", "AGR 403", "AGR 404", "AGR 405", "AGR 406", "AGR 407", "AGR 408"],
            "500 LEVEL": ["AGR 501", "AGR 502", "AGR 503", "AGR 504", "AGR 505", "AGR 506", "AGR 507", "AGR 508"]
        }
    },
    AST: {
        levels: {
            "100 LEVEL": ["Intro to CS", "Mathematics for CS"],
            "200 LEVEL": ["AST 201", "AST 202", "AST 203", "AST 204", "AST 205", "AST 206", "AST 207", "AST 208"],
            "300 LEVEL": ["AST 301", "AST 302", "AST 303", "AST 304", "AST 305", "AST 306", "AST 307", "AST 308"],
            "400 LEVEL": ["AST 401", "AST 402", "AST 403", "AST 404", "AST 405", "AST 406", "AST 407", "AST 408"],
            "500 LEVEL": ["AST 501", "AST 502", "AST 503", "AST 504", "AST 505", "AST 506", "AST 507", "AST 508"]
        }
    },
    AEX: {
        levels: {
            "100 LEVEL": ["Intro to CS", "Mathematics for CS"],
            "200 LEVEL": ["AEX 201", "AEX 202", "AEX 203", "AEX 204", "AEX 205", "AEX 206", "AEX 207", "AEX 208"],
            "300 LEVEL": ["AEX 301", "AEX 302", "AEX 303", "AEX 304", "AEX 305", "AEX 306", "AEX 307", "AEX 308"],
            "400 LEVEL": ["AEX 401", "AEX 402", "AEX 403", "AEX 404", "AEX 405", "AEX 406", "AEX 407", "AEX 408"],
            "500 LEVEL": ["AEX 501", "AEX 502", "AEX 503", "AEX 504", "AEX 505", "AEX 506", "AEX 507", "AEX 508"]
        }
    },
    AST: {
        levels: {
            "100 LEVEL": ["Intro to CS", "Mathematics for CS"],
            "200 LEVEL": ["AST 201", "AST 202", "AST 203", "AST 204", "AST 205", "AST 206", "AST 207", "AST 208"],
            "300 LEVEL": ["AST 301", "AST 302", "AST 303", "AST 304", "AST 305", "AST 306", "AST 307", "AST 308"],
            "400 LEVEL": ["AST 401", "AST 402", "AST 403", "AST 404", "AST 405", "AST 406", "AST 407", "AST 408"],
            "500 LEVEL": ["AST 501", "AST 502", "AST 503", "AST 504", "AST 505", "AST 506", "AST 507", "AST 508"]
        }
    },
    CST: {
        levels: {
            "100 LEVEL": ["Intro to CS", "Mathematics for CS"],
            "200 LEVEL": ["CST 201", "CST 202", "CST 203", "CST 204", "CST 205", "CST 206", "CST 207", "CST 208"],
            "300 LEVEL": ["CST 301", "CST 302", "CST 303", "CST 304", "CST 305", "CST 306", "CST 307", "CST 308"],
            "400 LEVEL": ["CST 401", "CST 402", "CST 403", "CST 404", "CST 405", "CST 406", "CST 407", "CST 408"],
            "500 LEVEL": ["CST 501", "CST 502", "CST 503", "CST 504", "CST 505", "CST 506", "CST 507", "CST 508"]
        }
    },
    FAT: {
        levels: {
            "100 LEVEL": ["Intro to CS", "Mathematics for CS"],
            "200 LEVEL": ["FAT 201", "FAT 202", "FAT 203", "FAT 204", "FAT 205", "FAT 206", "FAT 207", "FAT 208"],
            "300 LEVEL": ["FAT 301", "FAT 302", "FAT 303", "FAT 304", "FAT 305", "FAT 306", "FAT 307", "FAT 308"],
            "400 LEVEL": ["FAT 401", "FAT 402", "FAT 403", "FAT 404", "FAT 405", "FAT 406", "FAT 407", "FAT 408"],
            "500 LEVEL": ["FAT 501", "FAT 502", "FAT 503", "FAT 504", "FAT 505", "FAT 506", "FAT 507", "FAT 508"]
        }
    },
    FMT: {
        levels: {
            "100 LEVEL": ["Intro to CS", "Mathematics for CS"],
            "200 LEVEL": ["FMT 201", "FMT 202", "FMT 203", "FMT 204", "FMT 205", "FMT 206", "FMT 207", "FMT 208"],
            "300 LEVEL": ["FMT 301", "FMT 302", "FMT 303", "FMT 304", "FMT 305", "FMT 306", "FMT 307", "FMT 308"],
            "400 LEVEL": ["FMT 401", "FMT 402", "FMT 403", "FMT 404", "FMT 405", "FMT 406", "FMT 407", "FMT 408"],
            "500 LEVEL": ["FMT 501", "FMT 502", "FMT 503", "FMT 504", "FMT 505", "FMT 506", "FMT 507", "FMT 508"]
        }
    },
    FWT: {
        levels: {
            "100 LEVEL": ["Intro to CS", "Mathematics for CS"],
            "200 LEVEL": ["FWT 201", "FWT 202", "FWT 203", "FWT 204", "FWT 205", "FWT 206", "FWT 207", "FWT 208"],
            "300 LEVEL": ["FWT 301", "FWT 302", "FWT 303", "FWT 304", "FWT 305", "FWT 306", "FWT 307", "FWT 308"],
            "400 LEVEL": ["FWT 401", "FWT 402", "FWT 403", "FWT 404", "FWT 405", "FWT 406", "FWT 407", "FWT 408"],
            "500 LEVEL": ["FWT 501", "FWT 502", "FWT 503", "FWT 504", "FWT 505", "FWT 506", "FWT 507", "FWT 508"]
        }
    },
    SST: {
        levels: {
            "100 LEVEL": ["Intro to CS", "Mathematics for CS"],
            "200 LEVEL": ["ANT 201", "ANT 202", "ANT 203", "ANT 204", "ANT 205", "ANT 206", "ANT 207", "ANT 208"],
            "300 LEVEL": ["ANT 301", "ANT 302", "ANT 303", "ANT 304", "ANT 305", "ANT 306", "ANT 307", "ANT 308"],
            "400 LEVEL": ["ANT 401", "ANT 402", "ANT 403", "ANT 404", "ANT 405", "ANT 406", "ANT 407", "ANT 408"],
            "500 LEVEL": ["ANT 501", "ANT 502", "ANT 503", "ANT 504", "ANT 505", "ANT 506", "ANT 507", "ANT 508"]
        }
    },
    ANT: {
        levels: {
            "100 LEVEL": ["Intro to CS", "Mathematics for CS"],
            "200 LEVEL": ["ANT 201", "ANT 202", "ANT 203", "ANT 204", "ANT 205", "ANT 206", "ANT 207", "ANT 208"],
            "300 LEVEL": ["ANT 301", "ANT 302", "ANT 303", "ANT 304", "ANT 305", "ANT 306", "ANT 307", "ANT 308"],
            "400 LEVEL": ["ANT 401", "ANT 402", "ANT 403", "ANT 404", "ANT 405", "ANT 406", "ANT 407", "ANT 408"],
            "500 LEVEL": ["ANT 501", "ANT 502", "ANT 503", "ANT 504", "ANT 505", "ANT 506", "ANT 507", "ANT 508"]
        }
    },
    RAD: {
        levels: {
            "100 LEVEL": ["Intro to CS", "Mathematics for CS"],
            "200 LEVEL": ["RAD 201", "RAD 202", "RAD 203", "RAD 204", "RAD 205", "RAD 206", "RAD 207", "RAD 208"],
            "300 LEVEL": ["RAD 301", "RAD 302", "RAD 303", "RAD 304", "RAD 305", "RAD 306", "RAD 307", "RAD 308"],
            "400 LEVEL": ["RAD 401", "RAD 402", "RAD 403", "RAD 404", "RAD 405", "RAD 406", "RAD 407", "RAD 408"],
            "500 LEVEL": ["RAD 501", "RAD 502", "RAD 503", "RAD 504", "RAD 505", "RAD 506", "RAD 507", "RAD 508"]
        }
    },
    HPH: {
        levels: {
            "100 LEVEL": ["Intro to CS", "Mathematics for CS"],
            "200 LEVEL": ["HPH 201", "HPH 202", "HPH 203", "HPH 204", "HPH 205", "HPH 206", "HPH 207", "HPH 208"],
            "300 LEVEL": ["HPH 301", "HPH 302", "HPH 303", "HPH 304", "HPH 305", "HPH 306", "HPH 307", "HPH 308"],
            "400 LEVEL": ["HPH 401", "HPH 402", "HPH 403", "HPH 404", "HPH 405", "HPH 406", "HPH 407", "HPH 408"],
            "500 LEVEL": ["HPH 501", "HPH 502", "HPH 503", "HPH 504", "HPH 505", "HPH 506", "HPH 507", "HPH 508"]
        }
    },
    ABE: {
        levels: {
            "100 LEVEL": ["Intro to CS", "Mathematics for CS"],
            "200 LEVEL": ["ABE 201", "ABE 202", "ABE 203", "ABE 204", "ABE 205", "ABE 206", "ABE 207", "ABE 208"],
            "300 LEVEL": ["ABE 301", "ABE 302", "ABE 303", "ABE 304", "ABE 305", "ABE 306", "ABE 307", "ABE 308"],
            "400 LEVEL": ["ABE 401", "ABE 402", "ABE 403", "ABE 404", "ABE 405", "ABE 406", "ABE 407", "ABE 408"],
            "500 LEVEL": ["ABE 501", "ABE 502", "ABE 503", "ABE 504", "ABE 505", "ABE 506", "ABE 507", "ABE 508"]
        }
    },
    BME: {
        levels: {
            "100 LEVEL": ["Intro to CS", "Mathematics for CS"],
            "200 LEVEL": ["BME 201", "BME 202", "BME 203", "BME 204", "BME 205", "BME 206", "BME 207", "BME 208"],
            "300 LEVEL": ["BME 301", "BME 302", "BME 303", "BME 304", "BME 305", "BME 306", "BME 307", "BME 308"],
            "400 LEVEL": ["BME 401", "BME 402", "BME 403", "BME 404", "BME 405", "BME 406", "BME 407", "BME 408"],
            "500 LEVEL": ["BME 501", "BME 502", "BME 503", "BME 504", "BME 505", "BME 506", "BME 507", "BME 508"]
        }
    },
    CHE: {
        levels: {
            "100 LEVEL": ["Intro to CS", "Mathematics for CS"],
            "200 LEVEL": ["CHE 201", "CHE 202", "CHE 203", "CHE 204", "CHE 205", "CHE 206", "CHE 207", "CHE 208"],
            "300 LEVEL": ["CHE 301", "CHE 302", "CHE 303", "CHE 304", "CHE 305", "CHE 306", "CHE 307", "CHE 308"],
            "400 LEVEL": ["CHE 401", "CHE 402", "CHE 403", "CHE 404", "CHE 405", "CHE 406", "CHE 407", "CHE 408"],
            "500 LEVEL": ["CHE 501", "CHE 502", "CHE 503", "CHE 504", "CHE 505", "CHE 506", "CHE 507", "CHE 508"]
        }
    },
    CIE: {
        levels: {
            "100 LEVEL": ["Intro to CS", "Mathematics for CS"],
            "200 LEVEL": ["CIE 201", "CIE 202", "CIE 203", "CIE 204", "CIE 205", "CIE 206", "CIE 207", "CIE 208"],
            "300 LEVEL": ["CIE 301", "CIE 302", "CIE 303", "CIE 304", "CIE 305", "CIE 306", "CIE 307", "CIE 308"],
            "400 LEVEL": ["CIE 401", "CIE 402", "CIE 403", "CIE 404", "CIE 405", "CIE 406", "CIE 407", "CIE 408"],
            "500 LEVEL": ["CIE 501", "CIE 502", "CIE 503", "CIE 504", "CIE 505", "CIE 506", "CIE 507", "CIE 508"]
        }
    },
    FST: {
        levels: {
            "100 LEVEL": ["Intro to CS", "Mathematics for CS"],
            "200 LEVEL": ["FST 201", "FST 202", "FST 203", "FST 204", "FST 205", "FST 206", "FST 207", "FST 208"],
            "300 LEVEL": ["FST 301", "FST 302", "FST 303", "FST 304", "FST 305", "FST 306", "FST 307", "FST 308"],
            "400 LEVEL": ["FST 401", "FST 402", "FST 403", "FST 404", "FST 405", "FST 406", "FST 407", "FST 408"],
            "500 LEVEL": ["FST 501", "FST 502", "FST 503", "FST 504", "FST 505", "FST 506", "FST 507", "FST 508"]
        }
    },
    MME: {
        levels: {
            "100 LEVEL": ["Intro to CS", "Mathematics for CS"],
            "200 LEVEL": ["MME 201", "MME 202", "MME 203", "MME 204", "MME 205", "MME 206", "MME 207", "MME 208"],
            "300 LEVEL": ["MME 301", "MME 302", "MME 303", "MME 304", "MME 305", "MME 306", "MME 307", "MME 308"],
            "400 LEVEL": ["MME 401", "MME 402", "MME 403", "MME 404", "MME 405", "MME 406", "MME 407", "MME 408"],
            "500 LEVEL": ["MME 501", "MME 502", "MME 503", "MME 504", "MME 505", "MME 506", "MME 507", "MME 508"]
        }
    },
    MEE: {
        levels: {
            "100 LEVEL": ["Intro to CS", "Mathematics for CS"],
            "200 LEVEL": ["MEE 201", "MEE 202", "MEE 203", "MEE 204", "MEE 205", "MEE 206", "MEE 207", "MEE 208"],
            "300 LEVEL": ["MEE 301", "MEE 302", "MEE 303", "MEE 304", "MEE 305", "MEE 306", "MEE 307", "MEE 308"],
            "400 LEVEL": ["MEE 401", "MEE 402", "MEE 403", "MEE 404", "MEE 405", "MEE 406", "MEE 407", "MEE 408"],
            "500 LEVEL": ["MEE 501", "MEE 502", "MEE 503", "MEE 504", "MEE 505", "MEE 506", "MEE 507", "MEE 508"]
        }
    },
    PET: {
        levels: {
            "100 LEVEL": ["Intro to CS", "Mathematics for CS"],
            "200 LEVEL": ["PET 201", "PET 202", "PET 203", "PET 204", "PET 205", "PET 206", "PET 207", "PET 208"],
            "300 LEVEL": ["PET 301", "PET 302", "PET 303", "PET 304", "PET 305", "PET 306", "PET 307", "PET 308"],
            "400 LEVEL": ["PET 401", "PET 402", "PET 403", "PET 404", "PET 405", "PET 406", "PET 407", "PET 408"],
            "500 LEVEL": ["PET 501", "PET 502", "PET 503", "PET 504", "PET 505", "PET 506", "PET 507", "PET 508"]
        }
    },
    PTE: {
        levels: {
            "100 LEVEL": ["Intro to CS", "Mathematics for CS"],
            "200 LEVEL": ["PTE 201", "PTE 202", "PTE 203", "PTE 204", "PTE 205", "PTE 206", "PTE 207", "PTE 208"],
            "300 LEVEL": ["PTE 301", "PTE 302", "PTE 303", "PTE 304", "PTE 305", "PTE 306", "PTE 307", "PTE 308"],
            "400 LEVEL": ["PTE 401", "PTE 402", "PTE 403", "PTE 404", "PTE 405", "PTE 406", "PTE 407", "PTE 408"],
            "500 LEVEL": ["PTE 501", "PTE 502", "PTE 503", "PTE 504", "PTE 505", "PTE 506", "PTE 507", "PTE 508"]
        }
    },
    CPE: {
        levels: {
            "100 LEVEL": ["Intro to CS", "Mathematics for CS"],
            "200 LEVEL": ["CPE 201", "CPE 202", "CPE 203", "CPE 204", "CPE 205", "CPE 206", "CPE 207", "CPE 208"],
            "300 LEVEL": ["CPE 301", "CPE 302", "CPE 303", "CPE 304", "CPE 305", "CPE 306", "CPE 307", "CPE 308"],
            "400 LEVEL": ["CPE 401", "CPE 402", "CPE 403", "CPE 404", "CPE 405", "CPE 406", "CPE 407", "CPE 408"],
            "500 LEVEL": ["CPE 501", "CPE 502", "CPE 503", "CPE 504", "CPE 505", "CPE 506", "CPE 507", "CPE 508"]
        }
    },
    EPE: {
        levels: {
            "100 LEVEL": ["Intro to CS", "Mathematics for CS"],
            "200 LEVEL": ["EPE 201", "EPE 202", "EPE 203", "EPE 204", "EPE 205", "EPE 206", "EPE 207", "EPE 208"],
            "300 LEVEL": ["EPE 301", "EPE 302", "EPE 303", "EPE 304", "EPE 305", "EPE 306", "EPE 307", "EPE 308"],
            "400 LEVEL": ["EPE 401", "EPE 402", "EPE 403", "EPE 404", "EPE 405", "EPE 406", "EPE 407", "EPE 408"],
            "500 LEVEL": ["EPE 501", "EPE 502", "EPE 503", "EPE 504", "EPE 505", "EPE 506", "EPE 507", "EPE 508"]
        }
    },
    ELE: {
        levels: {
            "100 LEVEL": ["Intro to CS", "Mathematics for CS"],
            "200 LEVEL": ["ELE 201", "ELE 202", "ELE 203", "ELE 204", "ELE 205", "ELE 206", "ELE 207", "ELE 208"],
            "300 LEVEL": ["ELE 301", "ELE 302", "ELE 303", "ELE 304", "ELE 305", "ELE 306", "ELE 307", "ELE 308"],
            "400 LEVEL": ["ELE 401", "ELE 402", "ELE 403", "ELE 404", "ELE 405", "ELE 406", "ELE 407", "ELE 408"],
            "500 LEVEL": ["ELE 501", "ELE 502", "ELE 503", "ELE 504", "ELE 505", "ELE 506", "ELE 507", "ELE 508"]
        }
    },
    MCE: {
        levels: {
            "100 LEVEL": ["Intro to CS", "Mathematics for CS"],
            "200 LEVEL": ["MCE 201", "MCE 202", "MCE 203", "MCE 204", "MCE 205", "MCE 206", "MCE 207", "MCE 208"],
            "300 LEVEL": ["MCE 301", "MCE 302", "MCE 303", "MCE 304", "MCE 305", "MCE 306", "MCE 307", "MCE 308"],
            "400 LEVEL": ["MCE 401", "MCE 402", "MCE 403", "MCE 404", "MCE 405", "MCE 406", "MCE 407", "MCE 408"],
            "500 LEVEL": ["MCE 501", "MCE 502", "MCE 503", "MCE 504", "MCE 505", "MCE 506", "MCE 507", "MCE 508"]
        }
    },
    TCE: {
        levels: {
            "100 LEVEL": ["Intro to CS", "Mathematics for CS"],
            "200 LEVEL": ["TCE 201", "TCE 202", "TCE 203", "TCE 204", "TCE 205", "TCE 206", "TCE 207", "TCE 208"],
            "300 LEVEL": ["TCE 301", "TCE 302", "TCE 303", "TCE 304", "TCE 305", "TCE 306", "TCE 307", "TCE 308"],
            "400 LEVEL": ["TCE 401", "TCE 402", "TCE 403", "TCE 404", "TCE 405", "TCE 406", "TCE 407", "TCE 408"],
            "500 LEVEL": ["TCE 501", "TCE 502", "TCE 503", "TCE 504", "TCE 505", "TCE 506", "TCE 507", "TCE 508"]
        }
    },
    BCH: {
        levels: {
            "100 LEVEL": ["Intro to CS", "Mathematics for CS"],
            "200 LEVEL": ["BCH 201", "BCH 202", "BCH 203", "BCH 204", "BCH 205", "BCH 206", "BCH 207", "BCH 208"],
            "300 LEVEL": ["BCH 301", "BCH 302", "BCH 303", "BCH 304", "BCH 305", "BCH 306", "BCH 307", "BCH 308"],
            "400 LEVEL": ["BCH 401", "BCH 402", "BCH 403", "BCH 404", "BCH 405", "BCH 406", "BCH 407", "BCH 408"],
            "500 LEVEL": ["BCH 501", "BCH 502", "BCH 503", "BCH 504", "BCH 505", "BCH 506", "BCH 507", "BCH 508"]
        }
    },
    BIO: {
        levels: {
            "100 LEVEL": ["Intro to CS", "Mathematics for CS"],
            "200 LEVEL": ["BIO 201", "BIO 202", "BIO 203", "BIO 204", "BIO 205", "BIO 206", "BIO 207", "BIO 208"],
            "300 LEVEL": ["BIO 301", "BIO 302", "BIO 303", "BIO 304", "BIO 305", "BIO 306", "BIO 307", "BIO 308"],
            "400 LEVEL": ["BIO 401", "BIO 402", "BIO 403", "BIO 404", "BIO 405", "BIO 406", "BIO 407", "BIO 408"],
            "500 LEVEL": ["BIO 501", "BIO 502", "BIO 503", "BIO 504", "BIO 505", "BIO 506", "BIO 507", "BIO 508"]
        }
    },
    BTC: {
        levels: {
            "100 LEVEL": ["Intro to CS", "Mathematics for CS"],
            "200 LEVEL": ["BTC 201", "BTC 202", "BTC 203", "BTC 204", "BTC 205", "BTC 206", "BTC 207", "BTC 208"],
            "300 LEVEL": ["BTC 301", "BTC 302", "BTC 303", "BTC 304", "BTC 305", "BTC 306", "BTC 307", "BTC 308"],
            "400 LEVEL": ["BTC 401", "BTC 402", "BTC 403", "BTC 404", "BTC 405", "BTC 406", "BTC 407", "BTC 408"],
            "500 LEVEL": ["BTC 501", "BTC 502", "BTC 503", "BTC 504", "BTC 505", "BTC 506", "BTC 507", "BTC 508"]
        }
    },
    MCB: {
        levels: {
            "100 LEVEL": ["Intro to CS", "Mathematics for CS"],
            "200 LEVEL": ["MCB 201", "MCB 202", "MCB 203", "MCB 204", "MCB 205", "MCB 206", "MCB 207", "MCB 208"],
            "300 LEVEL": ["MCB 301", "MCB 302", "MCB 303", "MCB 304", "MCB 305", "MCB 306", "MCB 307", "MCB 308"],
            "400 LEVEL": ["MCB 401", "MCB 402", "MCB 403", "MCB 404", "MCB 405", "MCB 406", "MCB 407", "MCB 408"],
            "500 LEVEL": ["MCB 501", "MCB 502", "MCB 503", "MCB 504", "MCB 505", "MCB 506", "MCB 507", "MCB 508"]
        }
    },
    FRS: {
        levels: {
            "100 LEVEL": ["Intro to CS", "Mathematics for CS"],
            "200 LEVEL": ["FRS 201", "FRS 202", "FRS 203", "FRS 204", "FRS 205", "FRS 206", "FRS 207", "FRS 208"],
            "300 LEVEL": ["FRS 301", "FRS 302", "FRS 303", "FRS 304", "FRS 305", "FRS 306", "FRS 307", "FRS 308"],
            "400 LEVEL": ["FRS 401", "FRS 402", "FRS 403", "FRS 404", "FRS 405", "FRS 406", "FRS 407", "FRS 408"],
            "500 LEVEL": ["FRS 501", "FRS 502", "FRS 503", "FRS 504", "FRS 505", "FRS 506", "FRS 507", "FRS 508"]
        }
    },
    ARC: {
        levels: {
            "100 LEVEL": ["Intro to CS", "Mathematics for CS"],
            "200 LEVEL": ["ARC 201", "ARC 202", "ARC 203", "ARC 204", "ARC 205", "ARC 206", "ARC 207", "ARC 208"],
            "300 LEVEL": ["ARC 301", "ARC 302", "ARC 303", "ARC 304", "ARC 305", "ARC 306", "ARC 307", "ARC 308"],
            "400 LEVEL": ["ARC 401", "ARC 402", "ARC 403", "ARC 404", "ARC 405", "ARC 406", "ARC 407", "ARC 408"],
            "500 LEVEL": ["ARC 501", "ARC 502", "ARC 503", "ARC 504", "ARC 505", "ARC 506", "ARC 507", "ARC 508"]
        }
    },
    BLD: {
        levels: {
            "100 LEVEL": ["Intro to CS", "Mathematics for CS"],
            "200 LEVEL": ["BLD 201", "BLD 202", "BLD 203", "BLD 204", "BLD 205", "BLD 206", "BLD 207", "BLD 208"],
            "300 LEVEL": ["BLD 301", "BLD 302", "BLD 303", "BLD 304", "BLD 305", "BLD 306", "BLD 307", "BLD 308"],
            "400 LEVEL": ["BLD 401", "BLD 402", "BLD 403", "BLD 404", "BLD 405", "BLD 406", "BLD 407", "BLD 408"],
            "500 LEVEL": ["BLD 501", "BLD 502", "BLD 503", "BLD 504", "BLD 505", "BLD 506", "BLD 507", "BLD 508"]
        }
    },
    EME: {
        levels: {
            "100 LEVEL": ["Intro to CS", "Mathematics for CS"],
            "200 LEVEL": ["EME 201", "EME 202", "EME 203", "EME 204", "EME 205", "EME 206", "EME 207", "EME 208"],
            "300 LEVEL": ["EME 301", "EME 302", "EME 303", "EME 304", "EME 305", "EME 306", "EME 307", "EME 308"],
            "400 LEVEL": ["EME 401", "EME 402", "EME 403", "EME 404", "EME 405", "EME 406", "EME 407", "EME 408"],
            "500 LEVEL": ["EME 501", "EME 502", "EME 503", "EME 504", "EME 505", "EME 506", "EME 507", "EME 508"]
        }
    },
    EVM: {
        levels: {
            "100 LEVEL": ["Intro to CS", "Mathematics for CS"],
            "200 LEVEL": ["EVM 201", "EVM 202", "EVM 203", "EVM 204", "EVM 205", "EVM 206", "EVM 207", "EVM 208"],
            "300 LEVEL": ["EVM 301", "EVM 302", "EVM 303", "EVM 304", "EVM 305", "EVM 306", "EVM 307", "EVM 308"],
            "400 LEVEL": ["EVM 401", "EVM 402", "EVM 403", "EVM 404", "EVM 405", "EVM 406", "EVM 407", "EVM 408"],
            "500 LEVEL": ["EVM 501", "EVM 502", "EVM 503", "EVM 504", "EVM 505", "EVM 506", "EVM 507", "EVM 508"]
        }
    },
    QST: {
        levels: {
            "100 LEVEL": ["Intro to CS", "Mathematics for CS"],
            "200 LEVEL": ["QST 201", "QST 202", "QST 203", "QST 204", "QST 205", "QST 206", "QST 207", "QST 208"],
            "300 LEVEL": ["QST 301", "QST 302", "QST 303", "QST 304", "QST 305", "QST 306", "QST 307", "QST 308"],
            "400 LEVEL": ["QST 401", "QST 402", "QST 403", "QST 404", "QST 405", "QST 406", "QST 407", "QST 408"],
            "500 LEVEL": ["QST 501", "QST 502", "QST 503", "QST 504", "QST 505", "QST 506", "QST 507", "QST 508"]
        }
    },
    SVG: {
        levels: {
            "100 LEVEL": ["Intro to CS", "Mathematics for CS"],
            "200 LEVEL": ["SVG 201", "SVG 202", "SVG 203", "SVG 204", "SVG 205", "SVG 206", "SVG 207", "SVG 208"],
            "300 LEVEL": ["SVG 301", "SVG 302", "SVG 303", "SVG 304", "SVG 305", "SVG 306", "SVG 307", "SVG 308"],
            "400 LEVEL": ["SVG 401", "SVG 402", "SVG 403", "SVG 404", "SVG 405", "SVG 406", "SVG 407", "SVG 408"],
            "500 LEVEL": ["SVG 501", "SVG 502", "SVG 503", "SVG 504", "SVG 505", "SVG 506", "SVG 507", "SVG 508"]
        }
    },
    URP: {
        levels: {
            "100 LEVEL": ["Intro to CS", "Mathematics for CS"],
            "200 LEVEL": ["URP 201", "URP 202", "URP 203", "URP 204", "URP 205", "URP 206", "URP 207", "URP 208"],
            "300 LEVEL": ["URP 301", "URP 302", "URP 303", "URP 304", "URP 305", "URP 306", "URP 307", "URP 308"],
            "400 LEVEL": ["URP 401", "URP 402", "URP 403", "URP 404", "URP 405", "URP 406", "URP 407", "URP 408"],
            "500 LEVEL": ["URP 501", "URP 502", "URP 503", "URP 504", "URP 505", "URP 506", "URP 507", "URP 508"]
        }
    },
    DNT: {
        levels: {
            "100 LEVEL": ["Intro to CS", "Mathematics for CS"],
            "200 LEVEL": ["DNT 201", "DNT 202", "DNT 203", "DNT 204", "DNT 205", "DNT 206", "DNT 207", "DNT 208"],
            "300 LEVEL": ["DNT 301", "DNT 302", "DNT 303", "DNT 304", "DNT 305", "DNT 306", "DNT 307", "DNT 308"],
            "400 LEVEL": ["DNT 401", "DNT 402", "DNT 403", "DNT 404", "DNT 405", "DNT 406", "DNT 407", "DNT 408"],
            "500 LEVEL": ["DNT 501", "DNT 502", "DNT 503", "DNT 504", "DNT 505", "DNT 506", "DNT 507", "DNT 508"]
        }
    },
    EHS: {
        levels: {
            "100 LEVEL": ["Intro to CS", "Mathematics for CS"],
            "200 LEVEL": ["EHS 201", "EHS 202", "EHS 203", "EHS 204", "EHS 205", "EHS 206", "EHS 207", "EHS 208"],
            "300 LEVEL": ["EHS 301", "EHS 302", "EHS 303", "EHS 304", "EHS 305", "EHS 306", "EHS 307", "EHS 308"],
            "400 LEVEL": ["EHS 401", "EHS 402", "EHS 403", "EHS 404", "EHS 405", "EHS 406", "EHS 407", "EHS 408"],
            "500 LEVEL": ["EHS 501", "EHS 502", "EHS 503", "EHS 504", "EHS 505", "EHS 506", "EHS 507", "EHS 508"]
        }
    },
    OPT: {
        levels: {
            "100 LEVEL": ["Intro to CS", "Mathematics for CS"],
            "200 LEVEL": ["OPT 201", "OPT 202", "OPT 203", "OPT 204", "OPT 205", "OPT 206", "OPT 207", "OPT 208"],
            "300 LEVEL": ["OPT 301", "OPT 302", "OPT 303", "OPT 304", "OPT 305", "OPT 306", "OPT 307", "OPT 308"],
            "400 LEVEL": ["OPT 401", "OPT 402", "OPT 403", "OPT 404", "OPT 405", "OPT 406", "OPT 407", "OPT 408"],
            "500 LEVEL": ["OPT 501", "OPT 502", "OPT 503", "OPT 504", "OPT 505", "OPT 506", "OPT 507", "OPT 508"]
        }
    },
    PTO: {
        levels: {
            "100 LEVEL": ["Intro to CS", "Mathematics for CS"],
            "200 LEVEL": ["PTO 201", "PTO 202", "PTO 203", "PTO 204", "PTO 205", "PTO 206", "PTO 207", "PTO 208"],
            "300 LEVEL": ["PTO 301", "PTO 302", "PTO 303", "PTO 304", "PTO 305", "PTO 306", "PTO 307", "PTO 308"],
            "400 LEVEL": ["PTO 401", "PTO 402", "PTO 403", "PTO 404", "PTO 405", "PTO 406", "PTO 407", "PTO 408"],
            "500 LEVEL": ["PTO 501", "PTO 502", "PTO 503", "PTO 504", "PTO 505", "PTO 506", "PTO 507", "PTO 508"]
        }
    },
    PUH: {
        levels: {
            "100 LEVEL": ["Intro to CS", "Mathematics for CS"],
            "200 LEVEL": ["PUH 201", "PUH 202", "PUH 203", "PUH 204", "PUH 205", "PUH 206", "PUH 207", "PUH 208"],
            "300 LEVEL": ["PUH 301", "PUH 302", "PUH 303", "PUH 304", "PUH 305", "PUH 306", "PUH 307", "PUH 308"],
            "400 LEVEL": ["PUH 401", "PUH 402", "PUH 403", "PUH 404", "PUH 405", "PUH 406", "PUH 407", "PUH 408"],
            "500 LEVEL": ["PUH 501", "PUH 502", "PUH 503", "PUH 504", "PUH 505", "PUH 506", "PUH 507", "PUH 508"]
        }
    },
    CHM: {
        levels: {
            "100 LEVEL": ["Intro to CS", "Mathematics for CS"],
            "200 LEVEL": ["CHM 201", "CHM 202", "CHM 203", "CHM 204", "CHM 205", "CHM 206", "CHM 207", "CHM 208"],
            "300 LEVEL": ["CHM 301", "CHM 302", "CHM 303", "CHM 304", "CHM 305", "CHM 306", "CHM 307", "CHM 308"],
            "400 LEVEL": ["CHM 401", "CHM 402", "CHM 403", "CHM 404", "CHM 405", "CHM 406", "CHM 407", "CHM 408"],
            "500 LEVEL": ["CHM 501", "CHM 502", "CHM 503", "CHM 504", "CHM 505", "CHM 506", "CHM 507", "CHM 508"]
        }
    },
    GEO: {
        levels: {
            "100 LEVEL": ["Intro to CS", "Mathematics for CS"],
            "200 LEVEL": ["GEO 201", "GEO 202", "GEO 203", "GEO 204", "GEO 205", "GEO 206", "GEO 207", "GEO 208"],
            "300 LEVEL": ["GEO 301", "GEO 302", "GEO 303", "GEO 304", "GEO 305", "GEO 306", "GEO 307", "GEO 308"],
            "400 LEVEL": ["GEO 401", "GEO 402", "GEO 403", "GEO 404", "GEO 405", "GEO 406", "GEO 407", "GEO 408"],
            "500 LEVEL": ["GEO 501", "GEO 502", "GEO 503", "GEO 504", "GEO 505", "GEO 506", "GEO 507", "GEO 508"]
        }
    },
    MTH: {
        levels: {
            "100 LEVEL": ["Intro to CS", "Mathematics for CS"],
            "200 LEVEL": ["MTH 201", "MTH 202", "MTH 203", "MTH 204", "MTH 205", "MTH 206", "MTH 207", "MTH 208"],
            "300 LEVEL": ["MTH 301", "MTH 302", "MTH 303", "MTH 304", "MTH 305", "MTH 306", "MTH 307", "MTH 308"],
            "400 LEVEL": ["MTH 401", "MTH 402", "MTH 403", "MTH 404", "MTH 405", "MTH 406", "MTH 407", "MTH 408"],
            "500 LEVEL": ["MTH 501", "MTH 502", "MTH 503", "MTH 504", "MTH 505", "MTH 506", "MTH 507", "MTH 508"]
        }
    },
    PHY: {
        levels: {
            "100 LEVEL": ["Intro to CS", "Mathematics for CS"],
            "200 LEVEL": ["PHY 201", "PHY 202", "PHY 203", "PHY 204", "PHY 205", "PHY 206", "PHY 207", "PHY 208"],
            "300 LEVEL": ["PHY 301", "PHY 302", "PHY 303", "PHY 304", "PHY 305", "PHY 306", "PHY 307", "PHY 308"],
            "400 LEVEL": ["PHY 401", "PHY 402", "PHY 403", "PHY 404", "PHY 405", "PHY 406", "PHY 407", "PHY 408"],
            "500 LEVEL": ["PHY 501", "PHY 502", "PHY 503", "PHY 504", "PHY 505", "PHY 506", "PHY 507", "PHY 508"]
        }
    },
    SLT: {
        levels: {
            "100 LEVEL": ["Intro to CS", "Mathematics for CS"],
            "200 LEVEL": ["SLT 201", "SLT 202", "SLT 203", "SLT 204", "SLT 205", "SLT 206", "SLT 207", "SLT 208"],
            "300 LEVEL": ["SLT 301", "SLT 302", "SLT 303", "SLT 304", "SLT 305", "SLT 306", "SLT 307", "SLT 308"],
            "400 LEVEL": ["SLT 401", "SLT 402", "SLT 403", "SLT 404", "SLT 405", "SLT 406", "SLT 407", "SLT 408"],
            "500 LEVEL": ["SLT 501", "SLT 502", "SLT 503", "SLT 504", "SLT 505", "SLT 506", "SLT 507", "SLT 508"]
        }
    },
    STA: {
        levels: {
            "100 LEVEL": ["Intro to CS", "Mathematics for CS"],
            "200 LEVEL": ["STA 201", "STA 202", "STA 203", "STA 204", "STA 205", "STA 206", "STA 207", "STA 208"],
            "300 LEVEL": ["STA 301", "STA 302", "STA 303", "STA 304", "STA 305", "STA 306", "STA 307", "STA 308"],
            "400 LEVEL": ["STA 401", "STA 402", "STA 403", "STA 404", "STA 405", "STA 406", "STA 407", "STA 408"],
            "500 LEVEL": ["STA 501", "STA 502", "STA 503", "STA 504", "STA 505", "STA 506", "STA 507", "STA 508"]
        }
    },
    EMV: {
        levels: {
            "100 LEVEL": ["Intro to CS", "Mathematics for CS"],
            "200 LEVEL": ["EMV 201", "EMV 202", "EMV 203", "EMV 204", "EMV 205", "EMV 206", "EMV 207", "EMV 208"],
            "300 LEVEL": ["EMV 301", "EMV 302", "EMV 303", "EMV 304", "EMV 305", "EMV 306", "EMV 307", "EMV 308"],
            "400 LEVEL": ["EMV 401", "EMV 402", "EMV 403", "EMV 404", "EMV 405", "EMV 406", "EMV 407", "EMV 408"],
            "500 LEVEL": ["EMV 501", "EMV 502", "EMV 503", "EMV 504", "EMV 505", "EMV 506", "EMV 507", "EMV 508"]
        }
    },
    LTT: {
        levels: {
            "100 LEVEL": ["Intro to CS", "Mathematics for CS"],
            "200 LEVEL": ["LTT 201", "LTT 202", "LTT 203", "LTT 204", "LTT 205", "LTT 206", "LTT 207", "LTT 208"],
            "300 LEVEL": ["LTT 301", "LTT 302", "LTT 303", "LTT 304", "LTT 305", "LTT 306", "LTT 307", "LTT 308"],
            "400 LEVEL": ["LTT 401", "LTT 402", "LTT 403", "LTT 404", "LTT 405", "LTT 406", "LTT 407", "LTT 408"],
            "500 LEVEL": ["LTT 501", "LTT 502", "LTT 503", "LTT 504", "LTT 505", "LTT 506", "LTT 507", "LTT 508"]
        }
    },
    MTL: {
        levels: {
            "100 LEVEL": ["Intro to CS", "Mathematics for CS"],
            "200 LEVEL": ["MTL 201", "MTL 202", "MTL 203", "MTL 204", "MTL 205", "MTL 206", "MTL 207", "MTL 208"],
            "300 LEVEL": ["MTL 301", "MTL 302", "MTL 303", "MTL 304", "MTL 305", "MTL 306", "MTL 307", "MTL 308"],
            "400 LEVEL": ["MTL 401", "MTL 402", "MTL 403", "MTL 404", "MTL 405", "MTL 406", "MTL 407", "MTL 408"],
            "500 LEVEL": ["MTL 501", "MTL 502", "MTL 503", "MTL 504", "MTL 505", "MTL 506", "MTL 507", "MTL 508"]
        }
    },
    LSCM: {
        levels: {
            "100 LEVEL": ["Intro to CS", "Mathematics for CS"],
            "200 LEVEL": ["LSCM 201", "LSCM 202", "LSCM 203", "LSCM 204", "LSCM 205", "LSCM 206", "LSCM 207", "LSCM 208"],
            "300 LEVEL": ["LSCM 301", "LSCM 302", "LSCM 303", "LSCM 304", "LSCM 305", "LSCM 306", "LSCM 307", "LSCM 308"],
            "400 LEVEL": ["LSCM 401", "LSCM 402", "LSCM 403", "LSCM 404", "LSCM 405", "LSCM 406", "LSCM 407", "LSCM 408"],
            "500 LEVEL": ["LSCM 501", "LSCM 502", "LSCM 503", "LSCM 504", "LSCM 505", "LSCM 506", "LSCM 507", "LSCM 508"]
        }
    },
    PMT: {
        levels: {
            "100 LEVEL": ["Intro to CS", "Mathematics for CS"],
            "200 LEVEL": ["PMT 201", "PMT 202", "PMT 203", "PMT 204", "PMT 205", "PMT 206", "PMT 207", "PMT 208"],
            "300 LEVEL": ["PMT 301", "PMT 302", "PMT 303", "PMT 304", "PMT 305", "PMT 306", "PMT 307", "PMT 308"],
            "400 LEVEL": ["PMT 401", "PMT 402", "PMT 403", "PMT 404", "PMT 405", "PMT 406", "PMT 407", "PMT 408"],
            "500 LEVEL": ["PMT 501", "PMT 502", "PMT 503", "PMT 504", "PMT 505", "PMT 506", "PMT 507", "PMT 508"]
        }
    }
};

function updateLvl() {
    const deptSelect = document.getElementById("dept");
    const lvlSelect = document.getElementById("lvl");
    const courseSelect = document.getElementById("course");
    const selectedDept = deptSelect.value;

    lvlSelect.innerHTML = '<option value="" disabled selected hidden>Select Level</option>';
    courseSelect.innerHTML = '<option value="" disabled selected hidden>Select Course</option>';

    if (selectedDept && stats[selectedDept]) {
        const levels = stats[selectedDept].levels;
        for (const lvl in levels) {
            const option = document.createElement("option");
            option.value = lvl;
            option.textContent = lvl;
            lvlSelect.appendChild(option);
        }
    }
}

function updateCourse() {
    const deptSelect = document.getElementById("dept");
    const lvlSelect = document.getElementById("lvl");
    const courseSelect = document.getElementById("course");
    const selectedDept = deptSelect.value;
    const selectedLevel = lvlSelect.value;

    courseSelect.innerHTML = '<option value="" disabled selected hidden>Select Course</option>';

    if (selectedDept && selectedLevel && stats[selectedDept].levels[selectedLevel]) {
        const courses = stats[selectedDept].levels[selectedLevel];
        courses.forEach(course => {
            const option = document.createElement("option");
            option.value = course;
            option.textContent = course;
            courseSelect.appendChild(option);
        });
    }
}

function showMessage(message) {
    const popupMessage = document.getElementById('popup_message');
    popupMessage.textContent = message;
    popupMessage.style.display = 'block';
    setTimeout(() => {
        popupMessage.style.display = 'none';
    }, 3000); // Hide after 3 seconds
}

function showTimeRange(filter) {
    const timeRangeContainer = document.getElementById('time_range_container');
    timeRangeContainer.innerHTML = ''; // Clear previous time range fields
    document.getElementById('filter').value = filter; // Set the selected filter

   if (filter === 'semester') {
        timeRangeContainer.innerHTML = `
            <label>Start Date: <input type="date" id="semester_start_date" name="semester_start_date"></label><br>
            <label>End Date: <input type="date" id="semester_end_date" name="semester_end_date"></label>
        `;
    }
}

    function fetchStats(event) {
        event.preventDefault();

        const dept = document.getElementById('dept').value;
        const lvl = document.getElementById('lvl').value;
        const course = document.getElementById('course').value;
        const filter = document.getElementById('filter').value;
    
        if (!dept || !lvl || !course) {
            const popup = document.getElementById('popup_message');
            popup.classList.add('show');
            setTimeout(() => popup.classList.remove('show'), 3000);
            return;
        }

        let data = `dept=${encodeURIComponent(dept)}&lvl=${encodeURIComponent(lvl)}&course=${encodeURIComponent(course)}&filter=${encodeURIComponent(filter)}`;

        if (filter === 'semester') {
            const semesterStartDate = document.getElementById('semester_start_date').value;
            const semesterEndDate = document.getElementById('semester_end_date').value;
    
            if (!semesterStartDate || !semesterEndDate) {
                showMessage("Please select both Start and End Date.");
                return;
            }
    
            data += `&semester_start_date=${encodeURIComponent(semesterStartDate)}&semester_end_date=${encodeURIComponent(semesterEndDate)}`;
        }
    
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "attendance_statistics.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                let resultsDiv = document.getElementById("statistics_results");
    
                if (!resultsDiv) {
                    resultsDiv = document.createElement("div");
                    resultsDiv.id = "statistics_results";
    
                    // Create close button
                    let closeButton = document.createElement("button");
                    closeButton.id = "close-result";
                    closeButton.innerHTML = "X";
    
                    // Remove div when clicking the close button
                    closeButton.addEventListener("click", function () {
                        resultsDiv.remove();
                        document.removeEventListener("click", outsideClickHandler);
                    });
    
                    resultsDiv.appendChild(closeButton);
                    document.body.appendChild(resultsDiv);
    
                    // Click outside to remove the div
                    document.addEventListener("click", outsideClickHandler);
                }
    
                // Function to remove the div when clicking outside
                function outsideClickHandler(event) {
                    if (!resultsDiv.contains(event.target) && event.target.id !== "close-result") {
                        resultsDiv.remove();
                        document.removeEventListener("click", outsideClickHandler);
                    }
                }
    
                // Ensure only content is updated without removing the close button
                let contentDiv = document.createElement("div");
                contentDiv.innerHTML = xhr.responseText;
    
                // Remove old content but keep the close button
                while (resultsDiv.childNodes.length > 1) {
                    resultsDiv.removeChild(resultsDiv.lastChild);
                }
    
                resultsDiv.appendChild(contentDiv);
    
                // Create and add the Download PDF button
                let downloadBtn = document.createElement("button");
                downloadBtn.id = "downloadBtn";
                downloadBtn.innerHTML = "Download PDF";
                downloadBtn.style.display = "block"; // Make it visible
    
                downloadBtn.addEventListener("click", function () {
                    const semesterStart = document.getElementById("semester_start_date")?.value || null;
                    const semesterEnd = document.getElementById("semester_end_date")?.value || null;
                    downloadPDF(course, dept, lvl, filter, semesterStart, semesterEnd);
                });
    
                resultsDiv.appendChild(downloadBtn);
            }
        };
    
        xhr.send(data);
    }
    
    // Function to handle PDF download request
    function downloadPDF(course, dept, lvl, filter, semesterStart = null, semesterEnd = null) {
        let form = document.createElement("form");
        form.method = "POST";
        form.action = "/project/dashboard/lecturer/download_pdf.php";
    
        let courseInput = document.createElement("input");
        courseInput.type = "hidden";
        courseInput.name = "course";
        courseInput.value = course;
    
        let deptInput = document.createElement("input");
        deptInput.type = "hidden";
        deptInput.name = "department";
        deptInput.value = dept;
    
        let lvlInput = document.createElement("input");
        lvlInput.type = "hidden";
        lvlInput.name = "level";
        lvlInput.value = lvl;

        let filterInput = document.createElement("input");
        lvlInput.type = "hidden";
        lvlInput.name = "filter";
        lvlInput.value = filter;
    
        form.appendChild(courseInput);
        form.appendChild(deptInput);
        form.appendChild(lvlInput);
        form.appendChild(filterInput);

        if (filter === "semester") {
            if (!semesterStart || !semesterEnd) {
                showMessage("Semester start and end dates are required.");
                return;
            }
    
            let startDateInput = document.createElement("input");
            startDateInput.type = "hidden";
            startDateInput.name = "semester_start_date";
            startDateInput.value = semesterStart;
    
            let endDateInput = document.createElement("input");
            endDateInput.type = "hidden";
            endDateInput.name = "semester_end_date";
            endDateInput.value = semesterEnd;
    
            form.appendChild(startDateInput);
            form.appendChild(endDateInput);
        }

        document.body.appendChild(form);
        form.submit();
    }   

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

document.addEventListener("DOMContentLoaded", function() {
    let reportDiv = document.getElementById("report");
    if (reportDiv && reportDiv.parentElement) {
        reportDiv.parentElement.classList.add("report-container");
    }
});