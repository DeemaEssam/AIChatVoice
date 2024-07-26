<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Handle CORS
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

$servername = "localhost";
$username = "test";
$password = "test";
$dbname = "robot";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    header('HTTP/1.1 500 Internal Server Error');
    echo "Connection failed: " . $conn->connect_error;
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['transcript'])) {
        $transcript = $conn->real_escape_string($_POST['transcript']);

        // Check for duplicates
        $check_sql = "SELECT * FROM chatbotUser WHERE text = '$transcript'";
        $result = $conn->query($check_sql);

        if ($result->num_rows == 0) {
            // Insert if not duplicate
            $sql = "INSERT INTO chatbotUser (text) VALUES ('$transcript')";
            if ($conn->query($sql) === TRUE) {
                echo "Transcript saved successfully";
                header('HTTP/1.1 200 OK');
            } else {
                header('HTTP/1.1 500 Internal Server Error');
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Duplicate transcript detected.";
        }
    } elseif (isset($_POST['aiResponse'])) {
        $aiResponse = $conn->real_escape_string($_POST['aiResponse']);

        // Check for duplicates
        $check_sql = "SELECT * FROM chatbotAi WHERE response = '$aiResponse'";
        $result = $conn->query($check_sql);

        if ($result->num_rows == 0) {
            // Insert if not duplicate
            $sql = "INSERT INTO chatbotAi (response) VALUES ('$aiResponse')";
            if ($conn->query($sql) === TRUE) {
                echo "AI response saved successfully";
                header('HTTP/1.1 200 OK');
            } else {
                header('HTTP/1.1 500 Internal Server Error');
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Duplicate AI response detected.";
        }
    } else {
        header('HTTP/1.1 400 Bad Request');
        echo "No data provided.";
    }
}

$conn->close();
?>

<!-- 
CREATE TABLE chatbotAi (
    id INT AUTO_INCREMENT PRIMARY KEY,
    response TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE chatbotUser (
    id INT AUTO_INCREMENT PRIMARY KEY,
    text TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
 -->