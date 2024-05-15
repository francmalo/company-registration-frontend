<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "safaricom";
$dbname = "business";

try {
    // Create connection
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare the SQL statement to insert application data
    $stmt = $conn->prepare("INSERT INTO applications (fullname, username, address, mobile, name1, name2, name3, name4, name5, business_activities, num_employees, county, district, locality, building_plot, floor_room, application_postal_address, application_email, phone) VALUES (:fullname, :username, :address, :mobile, :name1, :name2, :name3, :name4, :name5, :business_activities, :num_employees, :county, :district, :locality, :building_plot, :floor_room, :application_postal_address, :application_email, :phone)");

    // Bind the parameters
    $stmt->bindParam(':fullname', $fullname, PDO::PARAM_STR);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->bindParam(':address', $address, PDO::PARAM_STR);
    $stmt->bindParam(':mobile', $mobile, PDO::PARAM_STR);
    $stmt->bindParam(':name1', $name1, PDO::PARAM_STR);
    $stmt->bindParam(':name2', $name2, PDO::PARAM_STR);
    $stmt->bindParam(':name3', $name3, PDO::PARAM_STR);
    $stmt->bindParam(':name4', $name4, PDO::PARAM_STR);
    $stmt->bindParam(':name5', $name5, PDO::PARAM_STR);
    $stmt->bindParam(':business_activities', $business_activities, PDO::PARAM_STR);
    $stmt->bindParam(':num_employees', $num_employees, PDO::PARAM_INT);
    $stmt->bindParam(':county', $county, PDO::PARAM_STR);
    $stmt->bindParam(':district', $district, PDO::PARAM_STR);
    $stmt->bindParam(':locality', $locality, PDO::PARAM_STR);
    $stmt->bindParam(':building_plot', $building_plot, PDO::PARAM_STR);
    $stmt->bindParam(':floor_room', $floor_room, PDO::PARAM_STR);
    $stmt->bindParam(':application_postal_address', $application_postal_address, PDO::PARAM_STR);
    $stmt->bindParam(':application_email', $application_email, PDO::PARAM_STR);
    $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);

    // Assign the values from the form data
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
    $application_postal_address = $_POST['application_postal_address'] ?? '';
    $application_email = $_POST['application_email'] ?? '';
    $phone = $_POST['phone'] ?? '';

    // Execute the statement
    if ($stmt->execute()) {
        $application_id = $conn->lastInsertId();

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

            // Prepare the SQL statement to insert shareholder/director data
            $stmt = $conn->prepare("INSERT INTO shareholders_directors (application_id, person_type, name, postal_address, national_id, pin_certificate, passport_photo, residential_address, phone_number, email, shares) VALUES (:application_id, :person_type, :name, :postal_address, :national_id, :pin_certificate, :passport_photo, :residential_address, :phone_number, :email, :shares)");

            // Bind the parameters
            $stmt->bindParam(':application_id', $application_id, PDO::PARAM_INT);
            $stmt->bindParam(':person_type', $person_types[$i], PDO::PARAM_STR);
            $stmt->bindParam(':name', $names[$i], PDO::PARAM_STR);
            $stmt->bindParam(':postal_address', $postal_addresses[$i], PDO::PARAM_STR);
            $stmt->bindParam(':national_id', $national_id_target_file, PDO::PARAM_STR);
            $stmt->bindParam(':pin_certificate', $pin_certificate_target_file, PDO::PARAM_STR);
            $stmt->bindParam(':passport_photo', $passport_photo_target_file, PDO::PARAM_STR);
            $stmt->bindParam(':residential_address', $residential_addresses[$i], PDO::PARAM_STR);
            $stmt->bindParam(':phone_number', $phone_numbers[$i], PDO::PARAM_STR);
            $stmt->bindParam(':email', $emails[$i], PDO::PARAM_STR);
            $stmt->bindParam(':shares', $shares[$i], PDO::PARAM_STR);

           // Execute the statement
           $stmt->execute();
       }

       echo "Data inserted successfully";
   } else {
       echo "Error inserting data: " . $stmt->errorInfo()[2];
   }
}

$conn = null;
?>