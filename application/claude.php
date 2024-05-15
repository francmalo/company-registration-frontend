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

    // Prepare the SQL statement for the applications table
    $stmt_applications = $pdo->prepare("INSERT INTO applications (fullname, username, address, mobile, name1, name2, name3, name4, name5, business_activities, num_employees, county, district, locality, building_plot, floor_room, application_postal_address, application_email, phone) VALUES (:fullname, :username, :address, :mobile, :name1, :name2, :name3, :name4, :name5, :business_activities, :num_employees, :county, :district, :locality, :building_plot, :floor_room, :application_postal_address, :application_email, :phone)");

    // Bind the values for the applications table
    $stmt_applications->bindParam(':fullname', $_POST['fullname']);
    $stmt_applications->bindParam(':username', $_POST['username']);
    $stmt_applications->bindParam(':address', $_POST['address']);
    $stmt_applications->bindParam(':mobile', $_POST['mobile']);
    $stmt_applications->bindParam(':name1', $_POST['name1']);
    $stmt_applications->bindParam(':name2', $_POST['name2']);
    $stmt_applications->bindParam(':name3', $_POST['name3']);
    $stmt_applications->bindParam(':name4', $_POST['name4']);
    $stmt_applications->bindParam(':name5', $_POST['name5']);
    $stmt_applications->bindParam(':business_activities', $_POST['business_activities']);
    $stmt_applications->bindParam(':num_employees', $_POST['num_employees']);
    $stmt_applications->bindParam(':county', $_POST['county']);
    $stmt_applications->bindParam(':district', $_POST['district']);
    $stmt_applications->bindParam(':locality', $_POST['locality']);
    $stmt_applications->bindParam(':building_plot', $_POST['building_plot']);
    $stmt_applications->bindParam(':floor_room', $_POST['floor_room']);
    $stmt_applications->bindParam(':application_postal_address', $_POST['application_postal_address']);
    $stmt_applications->bindParam(':application_email', $_POST['application_email']);
    $stmt_applications->bindParam(':phone', $_POST['phone']);

    // Execute the statement for the applications table
    $stmt_applications->execute();

    // Get the last inserted ID for the application
    $application_id = $pdo->lastInsertId();

    // Prepare the SQL statement for the shareholders_directors table
    $stmt_shareholders_directors = $pdo->prepare("INSERT INTO shareholders_directors (application_id, person_type, name, postal_address, national_id, pin_certificate, passport_photo, residential_address, phone_number, email, shares) VALUES (:application_id, :person_type, :name, :postal_address, :national_id, :pin_certificate, :passport_photo, :residential_address, :phone_number, :email, :shares)");

    // Loop through the shareholders/directors data and insert into the shareholders_directors table
    foreach ($_POST['name'] as $key => $value) {
        $person_type = $_POST['person_type_' . $key][0];
        $name = $_POST['name'][$key];
        $postal_address = $_POST['postal_address'][$key];
        $national_id = uploadFile($_FILES['national_id']['name'][$key], $_FILES['national_id']['tmp_name'][$key]);
        $pin_certificate = uploadFile($_FILES['pin_certificate']['name'][$key], $_FILES['pin_certificate']['tmp_name'][$key]);
        $passport_photo = uploadFile($_FILES['passport_photo']['name'][$key], $_FILES['passport_photo']['tmp_name'][$key]);
        $residential_address = $_POST['residential_address'][$key];
        $phone_number = $_POST['phone_number'][$key];
        $email = $_POST['email'][$key];
        $shares = $_POST['shares'][$key];

        $stmt_shareholders_directors->bindParam(':application_id', $application_id);
        $stmt_shareholders_directors->bindParam(':person_type', $person_type);
        $stmt_shareholders_directors->bindParam(':name', $name);
        $stmt_shareholders_directors->bindParam(':postal_address', $postal_address);
        $stmt_shareholders_directors->bindParam(':national_id', $national_id);
        $stmt_shareholders_directors->bindParam(':pin_certificate', $pin_certificate);
        $stmt_shareholders_directors->bindParam(':passport_photo', $passport_photo);
        $stmt_shareholders_directors->bindParam(':residential_address', $residential_address);
        $stmt_shareholders_directors->bindParam(':phone_number', $phone_number);
        $stmt_shareholders_directors->bindParam(':email', $email);
        $stmt_shareholders_directors->bindParam(':shares', $shares);

        $stmt_shareholders_directors->execute();
    }

    echo "Data inserted successfully!";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Function to upload files
function uploadFile($fileName, $tempName)
{
    $targetDir = "uploads/";
    $targetPath = $targetDir . basename($fileName);

    if (move_uploaded_file($tempName, $targetPath)) {
        return $targetPath;
    } else {
        return "";
    }
}
?>