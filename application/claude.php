<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "safaricom";
$dbname = "business";

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
$mobile = $_POST['mobile']; // Assuming 'password' is the mobile field
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
  $person_types = isset($_POST['person_type']) ? array_map('trim', $_POST['person_type']) : [];
$names = isset($_POST['name']) ? array_map('trim', $_POST['name']) : [];
$postal_addresses = isset($_POST['postal_address']) ? array_map('trim', $_POST['postal_address']) : [];
$phone_numbers = isset($_POST['phone_number']) ? array_map('trim', $_POST['phone_number']) : [];
$emails = isset($_POST['email']) ? array_map('trim', $_POST['email']) : [];
$shares = isset($_POST['shares']) ? array_map('trim', $_POST['shares']) : [];
$residential_addresses = isset($_POST['residential_address']) ? array_map('trim', $_POST['residential_address']) : [];

$count = count($person_types);

for ($i = 0; $i < $count; $i++) {
    $person_type = $conn->real_escape_string($person_types[$i]);
    $name = $conn->real_escape_string($names[$i]);
    $postal_address = $conn->real_escape_string($postal_addresses[$i]);
    $phone_number = $conn->real_escape_string($phone_numbers[$i]);
    $email = $conn->real_escape_string($emails[$i]);
    $share = $conn->real_escape_string($shares[$i]);
    $residential_address = $conn->real_escape_string($residential_addresses[$i]);

    // Handle file uploads
    $national_id_file = $_FILES['national_id']['tmp_name'][$i] ?? null;
    $national_id_name = $_FILES['national_id']['name'][$i] ?? null;
    $national_id_path = $national_id_file ? 'uploads/national_ids/' . $national_id_name : null;

    $pin_certificate_file = $_FILES['pin_certificate']['tmp_name'][$i] ?? null;
    $pin_certificate_name = $_FILES['pin_certificate']['name'][$i] ?? null;
    $pin_certificate_path = $pin_certificate_file ? 'uploads/pin_certificates/' . $pin_certificate_name : null;

    $passport_photo_file = $_FILES['passport_photo']['tmp_name'][$i] ?? null;
    $passport_photo_name = $_FILES['passport_photo']['name'][$i] ?? null;
    $passport_photo_path = $passport_photo_file ? 'uploads/passport_photos/' . $passport_photo_name : null;

    if ($national_id_file) {
        move_uploaded_file($national_id_file, $national_id_path);
    }

    if ($pin_certificate_file) {
        move_uploaded_file($pin_certificate_file, $pin_certificate_path);
    }

    if ($passport_photo_file) {
        move_uploaded_file($passport_photo_file, $passport_photo_path);
    }

    $sql = "INSERT INTO shareholders_directors (application_id, person_type, name, postal_address, national_id, pin_certificate, passport_photo, residential_address, phone_number, email, shares)
    VALUES ('$application_id', '$person_type', '$name', '$postal_address', '$national_id_path', '$pin_certificate_path', '$passport_photo_path', '$residential_address', '$phone_number', '$email', '$share')";

    if ($conn->query($sql) === FALSE) {
        echo "Error inserting shareholder/director data: " . $conn->error;
    }
}


echo "Data inserted successfully";} 
else {
echo "Error inserting application data: " . $conn->error;
}
$conn->close();