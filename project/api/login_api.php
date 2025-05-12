<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

include 'db.php';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    echo json_encode(['status' => 'error', 'message' => 'Database connection failed']);
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_type = $_POST['user_type'] ?? '';
    $response = [];

    if ($user_type === 'lecturer') {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        if (empty($email) || empty($password)) {
            $response = ['status' => 'error', 'message' => 'Email and password are required'];
        } else {
            $sql = "SELECT lecturer_id, name, phone, faculty, department, password FROM lecturers WHERE email = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('s', $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                if (password_verify($password, $row['password'])) {
                    $response = [
                        'status' => 'success',
                        'user_type' => 'lecturer',
                        'data' => [
                            'lecturer_id' => $row['lecturer_id'],
                            'name' => $row['name'],
                            'email' => $email,
                            'phone' => $row['phone'],
                            'faculty' => $row['faculty'],
                            'department' => $row['department']
                        ]
                    ];
                } else {
                    $response = ['status' => 'error', 'message' => 'Invalid password'];
                }
            } else {
                $sqlPasswordCheck = "SELECT * FROM lecturers WHERE password = ?";
                $stmt = $conn->prepare($sqlPasswordCheck);
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Note: This is for checking hashed password existence
                $stmt->bind_param('s', $hashedPassword);
                $stmt->execute();
                $resultPassword = $stmt->get_result();

                $response = ['status' => 'error', 'message' => $resultPassword->num_rows > 0 ? 'Invalid email' : 'Invalid account'];
            }
            $stmt->close();
        }
    } elseif ($user_type === 'student') {
        $sname = $_POST['sname'] ?? '';
        $reg_no = $_POST['reg_no'] ?? '';

        if (empty($sname) || empty($reg_no)) {
            $response = ['status' => 'error', 'message' => 'Name and registration number are required'];
        } else {
            $sql = "SELECT fac, dept, dept_short, level, email, phone_no, courses FROM students WHERE Sname = ? AND reg_no = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('ss', $sname, $reg_no);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $response = [
                    'status' => 'success',
                    'user_type' => 'student',
                    'data' => [
                        'reg_no' => $reg_no,
                        'name' => $sname,
                        'email' => $row['email'],
                        'phone_no' => $row['phone_no'],
                        'faculty' => $row['fac'],
                        'level' => $row['level'],
                        'department' => $row['dept'],
                        'department_short' => $row['dept_short'],
                        'courses' => $row['courses']
                    ]
                ];
            } else {
                $sqlNameCheck = "SELECT * FROM students WHERE Sname = ?";
                $stmtName = $conn->prepare($sqlNameCheck);
                $stmtName->bind_param('s', $sname);
                $stmtName->execute();
                $resultName = $stmtName->get_result();

                $sqlRegCheck = "SELECT * FROM students WHERE reg_no = ?";
                $stmtReg = $conn->prepare($sqlRegCheck);
                $stmtReg->bind_param('s', $reg_no);
                $stmtReg->execute();
                $resultReg = $stmtReg->get_result();

                if ($resultName->num_rows == 0 && $resultReg->num_rows == 0) {
                    $response = ['status' => 'error', 'message' => 'Invalid name and registration number'];
                } elseif ($resultName->num_rows == 0) {
                    $response = ['status' => 'error', 'message' => 'Invalid name'];
                } elseif ($resultReg->num_rows == 0) {
                    $response = ['status' => 'error', 'message' => 'Invalid registration number'];
                }
                $stmtName->close();
                $stmtReg->close();
            }
            $stmt->close();
        }
    } else {
        $response = ['status' => 'error', 'message' => 'Invalid user type'];
    }

    echo json_encode($response);
}

$conn->close();
?>