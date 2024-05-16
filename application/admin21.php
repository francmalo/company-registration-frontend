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

    // Prepare the SQL statement to fetch application data
   $stmt = $pdo->prepare("SELECT a.id, a.fullname, a.username, a.address, a.mobile, a.status, COUNT(sd.id) AS num_shareholders_directors
                       FROM applications a
                       LEFT JOIN shareholders_directors sd ON a.id = sd.application_id
                       GROUP BY a.id");

    // Execute the statement
    $stmt->execute();

    // Fetch the results
    $applications = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h2>Admin Dashboard</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                <tr>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Mobile</th>
                    <th>Status</th>
                    <th>Shareholders/Directors</th>
                    <th>Action</th>
                </tr>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($applications as $application) : ?>
                <tr>
                    <td><?php echo $application['fullname']; ?></td>
                    <td><?php echo $application['username']; ?></td>
                    <td><?php echo $application['address']; ?></td>
                    <td><?php echo $application['mobile']; ?></td>
                    <td><?php echo $application['status']; ?></td>

                    <td><?php echo $application['num_shareholders_directors']; ?></td>
                    <td><a href="view_application.php?id=<?php echo $application['id']; ?>" class="btn btn-primary">View
                            More</a></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>