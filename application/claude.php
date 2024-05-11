<?php
// Database connection details
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert application data into the applications table
$fullname = $_POST['fullname'];
$email = $_POST['username']; // Assuming 'username' is the email field
$address = $_POST['address'];
$mobile = $_POST['password']; // Assuming 'password' is the mobile field
$proposed_name1 = $_POST['name1'];
$proposed_name2 = $_POST['name2'];
$proposed_name3 = $_POST['name3'];
$proposed_name4 = $_POST['name4'];
$proposed_name5 = $_POST['name5'];
$business_activities = $_POST['business_activities'];
$county = $_POST['county'];
$district = $_POST['district'];
$locality = $_POST['locality'];
$building_plot = $_POST['building_plot'];
$floor_room = $_POST['floor_room'];
$postal_address = $_POST['postal_address'];
$registered_email = $_POST['email'];
$registered_phone = $_POST['phone'];

$sql = "INSERT INTO applications (fullname, email, address, mobile, proposed_name1, proposed_name2, proposed_name3, proposed_name4, proposed_name5, business_activities, county, district, locality, building_plot, floor_room, postal_address, registered_email, registered_phone)
VALUES ('$fullname', '$email', '$address', '$mobile', '$proposed_name1', '$proposed_name2', '$proposed_name3', '$proposed_name4', '$proposed_name5', '$business_activities', '$county', '$district', '$locality', '$building_plot', '$floor_room', '$postal_address', '$registered_email', '$registered_phone')";


if ($conn->query($sql) === TRUE) {
    $application_id = $conn->insert_id;

    // Insert shareholder/director data into the shareholders_directors table
    $person_types = $_POST['person_type'];
    $names = $_POST['name'];
    $postal_addresses = $_POST['postal_address'];
    $phone_numbers = $_POST['phone_number'];
    $emails = $_POST['email'];
    $shares = $_POST['shares'];

    $count = count($person_types);

    for ($i = 0; $i < $count; $i++) {
        $person_type = $person_types[$i];
        $name = $names[$i];
        $postal_address = $postal_addresses[$i];
        $phone_number = $phone_numbers[$i];
        $email = $emails[$i];
        $share = $shares[$i];

        // Handle file uploads
        $national_id_file = $_FILES['national_id']['tmp_name'][$i];
        $national_id_name = $_FILES['national_id']['name'][$i];
        $national_id_path = 'uploads/national_ids/' . $national_id_name;
        move_uploaded_file($national_id_file, $national_id_path);

        $pin_certificate_file = $_FILES['pin_certificate']['tmp_name'][$i];
        $pin_certificate_name = $_FILES['pin_certificate']['name'][$i];
        $pin_certificate_path = 'uploads/pin_certificates/' . $pin_certificate_name;
        move_uploaded_file($pin_certificate_file, $pin_certificate_path);

        $passport_photo_file = $_FILES['passport_photo']['tmp_name'][$i];
        $passport_photo_name = $_FILES['passport_photo']['name'][$i];
        $passport_photo_path = 'uploads/passport_photos/' . $passport_photo_name;
        move_uploaded_file($passport_photo_file, $passport_photo_path);

        $sql = "INSERT INTO shareholders_directors (application_id, person_type, name, postal_address, national_id, pin_certificate, passport_photo, residential_address, phone_number, email, shares)
        VALUES ('$application_id', '$person_type', '$name', '$postal_address', '$national_id_path', '$pin_certificate_path', '$passport_photo_path', '$residential_address', '$phone_number', '$email', '$share')";

        if ($conn->query($sql) === FALSE) {
            echo "Error inserting shareholder/director data: " . $conn->error;
        }
    }

    echo "Data inserted successfully";
} else {
    echo "Error inserting application data: " . $conn->error;
}

$conn->close();
?>