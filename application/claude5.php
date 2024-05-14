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

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Insert application data into the applications table
    $fullname = $_POST['fullname'] ?? '';
    $username = $_POST['username'] ?? '';
    $address = $_POST['address'] ?? '';
    $mobile = $_POST['mobile'] ?? '';
    $name1 = $_POST['name1'] ?? '';
    $name2 = $_POST['name2'] ?? '';
    $name3 = $_POST['name3'] ?? '';
    $name4 = $_POST['name4'] ?? '';
    $name5 = $_POST['name5'] ?? '';
    $business_activities = $_POST['business_activities'] ?? '';
    $num_employees = $_POST['num_employees'] ?? '';
    $county = $_POST['county'] ?? '';
    $district = $_POST['district'] ?? '';
    $locality = $_POST['locality'] ?? '';
    $building_plot = $_POST['building_plot'] ?? '';
    $floor_room = $_POST['floor_room'] ?? '';
    $postal_address = $_POST['postal_address'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';

    $sql = "INSERT INTO applications (fullname, username, address, mobile, name1, name2, name3, name4, name5, business_activities, num_employees, county, district, locality, building_plot, floor_room, postal_address, email, phone)
    VALUES ('$fullname', '$username', '$address', '$mobile', '$name1', '$name2', '$name3', '$name4', '$name5', '$business_activities', '$num_employees', '$county', '$district', '$locality', '$building_plot', '$floor_room', '$postal_address', '$email', '$phone')";

    if ($conn->query($sql) === TRUE) {
        $application_id = $conn->insert_id;

        // Insert shareholder/director data into the shareholders_directors table
        $person_types = $_POST['person_type'] ?? [];
        $names = $_POST['name'] ?? [];
        $postal_addresses = $_POST['postal_address'] ?? [];
        $national_ids = $_FILES['national_id']['name'] ?? [];
        $pin_certificates = $_FILES['pin_certificate']['name'] ?? [];
        $passport_photos = $_FILES['passport_photo']['name'] ?? [];
        $residential_addresses = $_POST['residential_address'] ?? [];
        $phone_numbers = $_POST['phone_number'] ?? [];
        $emails = $_POST['email'] ?? [];
        $shares = $_POST['shares'] ?? [];

        $uploads_dir = 'uploads/';

        for ($i = 0; $i < count($person_types); $i++) {
            // Debugging information
            error_log("Processing entry $i");

            $national_id_target_file = '';
            $pin_certificate_target_file = '';
            $passport_photo_target_file = '';

            if (isset($_FILES["national_id"]["tmp_name"][$i]) && $_FILES["national_id"]["error"][$i] == UPLOAD_ERR_OK) {
                $national_id_target_file = $uploads_dir . basename($_FILES["national_id"]["name"][$i]);
                move_uploaded_file($_FILES["national_id"]["tmp_name"][$i], $national_id_target_file);
            }

            if (isset($_FILES["pin_certificate"]["tmp_name"][$i]) && $_FILES["pin_certificate"]["error"][$i] == UPLOAD_ERR_OK) {
                $pin_certificate_target_file = $uploads_dir . basename($_FILES["pin_certificate"]["name"][$i]);
                move_uploaded_file($_FILES["pin_certificate"]["tmp_name"][$i], $pin_certificate_target_file);
            }

            if (isset($_FILES["passport_photo"]["tmp_name"][$i]) && $_FILES["passport_photo"]["error"][$i] == UPLOAD_ERR_OK) {
                $passport_photo_target_file = $uploads_dir . basename($_FILES["passport_photo"]["name"][$i]);
                move_uploaded_file($_FILES["passport_photo"]["tmp_name"][$i], $passport_photo_target_file);
            }

            $sql = "INSERT INTO shareholders_directors (application_id, person_type, name, postal_address, national_id, pin_certificate, passport_photo, residential_address, phone_number, email, shares)
            VALUES ('$application_id', '" . $person_types[$i] . "', '" . $names[$i] . "', '" . $postal_addresses[$i] . "', '" . $national_id_target_file . "', '" . $pin_certificate_target_file . "', '" . $passport_photo_target_file . "', '" . $residential_addresses[$i] . "', '" . $phone_numbers[$i] . "', '" . $emails[$i] . "', '" . $shares[$i] . "')";

            // Debugging information
            error_log("SQL: $sql");

            if ($conn->query($sql) === FALSE) {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

        echo "Data inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>