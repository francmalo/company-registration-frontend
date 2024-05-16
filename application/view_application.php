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

    // Get the application ID from the query string
    $application_id = $_GET['id'];

    // Prepare the SQL statement to fetch application and shareholder/director data
   $stmt = $pdo->prepare("SELECT a.*, a.status, sd.person_type, sd.name, sd.postal_address, sd.national_id, sd.pin_certificate, sd.passport_photo, sd.residential_address, sd.phone_number, sd.email, sd.shares
                       FROM applications a
                       LEFT JOIN shareholders_directors sd ON a.id = sd.application_id
                       WHERE a.id = :application_id");

    // Bind the application ID
    $stmt->bindParam(':application_id', $application_id);

    // Execute the statement
    $stmt->execute();

    // Fetch the results
    $application_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Application Details</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h2>Application Details</h2>
        <div class="card">
            <div class="card-header">
                <h3>Contact Person Information</h3>
            </div>
            <div class="card-header">
                <h3>Application Status</h3>
            </div>
            <div class="card-body">
                <p><strong>Status:</strong> <?php echo $application_data[0]['status']; ?></p>
            </div>
            <div class="card-body">
                <p><strong>Full Name:</strong> <?php echo $application_data[0]['fullname']; ?></p>
                <p><strong>Email:</strong> <?php echo $application_data[0]['username']; ?></p>
                <p><strong>Address:</strong> <?php echo $application_data[0]['address']; ?></p>
                <p><strong>Mobile:</strong> <?php echo $application_data[0]['mobile']; ?></p>
            </div>
        </div>
        <br>
        <div class="card">
            <div class="card-header">
                <h3>Proposed Company Names</h3>
            </div>
            <div class="card-body">
                <p><strong>Name 1:</strong> <?php echo $application_data[0]['name1']; ?></p>
                <p><strong>Name 2:</strong> <?php echo $application_data[0]['name2']; ?></p>
                <p><strong>Name 3:</strong> <?php echo $application_data[0]['name3']; ?></p>
                <?php if (!empty($application_data[0]['name4'])) : ?>
                <p><strong>Name 4:</strong> <?php echo $application_data[0]['name4']; ?></p>
                <?php endif; ?>
                <?php if (!empty($application_data[0]['name5'])) : ?>
                <p><strong>Name 5:</strong> <?php echo $application_data[0]['name5']; ?></p>
                <?php endif; ?>
            </div>
        </div>
        <br>
        <div class="card">
            <div class="card-header">
                <h3>Business Information</h3>
            </div>
            <div class="card-body">
                <p><strong>Business Activities:</strong> <?php echo $application_data[0]['business_activities']; ?></p>
                <p><strong>Number of Employees:</strong> <?php echo $application_data[0]['num_employees']; ?></p>
            </div>
        </div>
        <br>
        <div class="card">
            <div class="card-header">
                <h3>Registered Office Addresses</h3>
            </div>
            <div class="card-body">
                <p><strong>County:</strong> <?php echo $application_data[0]['county']; ?></p>
                <p><strong>District:</strong> <?php echo $application_data[0]['district']; ?></p>
                <p><strong>Locality:</strong> <?php echo $application_data[0]['locality']; ?></p>
                <p><strong>Building/Plot No.:</strong> <?php echo $application_data[0]['building_plot']; ?></p>
                <p><strong>Floor/Room No.:</strong> <?php echo $application_data[0]['floor_room']; ?></p>
                <p><strong>Postal Address:</strong> <?php echo $application_data[0]['application_postal_address']; ?>
                </p>
                <p><strong>Email Address:</strong> <?php echo $application_data[0]['application_email']; ?></p>
                <p><strong>Phone Number:</strong> <?php echo $application_data[0]['phone']; ?></p>
            </div>
        </div>
        <br>
        <div class="card">
            <div class="card-header">
                <h3>Shareholders/Directors Information</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Person Type</th>
                            <th>Name</th>
                            <th>Postal Address</th>
                            <th>National ID</th>
                            <th>PIN Certificate</th>
                            <th>Passport Photo</th>
                            <th>Residential Address</th>
                            <th>Phone Number</th>
                            <th>Email</th>
                            <th>Shares</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($application_data as $data) : ?>
                        <?php if (!empty($data['person_type'])) : ?>
                        <tr>
                            <td><?php echo $data['person_type']; ?></td>
                            <td><?php echo $data['name']; ?></td>
                            <td><?php echo $data['postal_address']; ?></td>
                            <td><a href="<?php echo $data['national_id']; ?>" target="_blank">View</a></td>
                            <td><a href="<?php echo $data['pin_certificate']; ?>" target="_blank">View</a></td>
                            <td><a href="<?php echo $data['passport_photo']; ?>" target="_blank">View</a></td>
                            <td><?php echo $data['residential_address']; ?></td>
                            <td><?php echo $data['phone_number']; ?></td>
                            <td><?php echo $data['email']; ?></td>
                            <td><?php echo $data['shares']; ?></td>
                        </tr>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>


        <form method="post" action="update_status.php">
            <input type="hidden" name="application_id" value="<?php echo $application['id']; ?>">
            <td>
                <select name="status" class="form-control">
                    <option value="pending" <?php echo $application['status'] == 'pending' ? 'selected' : ''; ?>>Pending
                    </option>
                    <option value="processed" <?php echo $application['status'] == 'processed' ? 'selected' : ''; ?>>
                        Processed
                    </option>
                </select>
            </td>
            <td><button type="submit" class="btn btn-primary">Update Status</button></td>
        </form>
    </div>
</body>

</html>