<?php
include 'db_connect.php'; // Include your database connection code here

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $facebook = $_POST['facebook'];
    $password = $_POST['password'];

    // Check if a file was uploaded
    if (isset($_FILES['instructorImage']) && $_FILES['instructorImage']['error'] === UPLOAD_ERR_OK) {
        $image = file_get_contents($_FILES['instructorImage']['tmp_name']);

        // Encode image data
        $encodedImage = base64_encode($image);
    } else {
        // Handle case where no file was selected
        echo "No image selected.";
        exit;
    }

    // Insert data into the database
    $insertQuery = "INSERT INTO coordinator (id, coordinatorImage, name, email, facebook, password)
                    VALUES (?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($insertQuery);
    $stmt->bind_param("ssssss", $id, $encodedImage, $name, $email, $facebook, $password);

    if ($stmt->execute()) {
        echo "Coordinator added successfully!";
    } else {
        echo "Error adding coordinator: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>