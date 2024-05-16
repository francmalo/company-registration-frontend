<?php
// Database connection details
$host = 'localhost';
$dbname = 'business';
$username = 'root';
$password = 'safaricom';

try {
    // Create a new PDO instance
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get the application ID and new status from the form
    $application_id = $_POST['application_id'];
    $new_status = $_POST['status'];

    // Prepare the SQL statement to update the status
    $stmt = $pdo->prepare("UPDATE applications SET status = :status WHERE id = :application_id");
    $stmt->bindParam(':status', $new_status);
    $stmt->bindParam(':application_id', $application_id);

    // Execute the statement
    $stmt->execute();

    // Redirect back to the admin dashboard
    header("Location: view_application.php");
    exit();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}