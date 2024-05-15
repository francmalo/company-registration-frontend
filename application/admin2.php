<?php
$host = 'localhost';
$dbname = 'business';
$username = 'root';
$password = 'safaricom';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt_applications = $pdo->query("SELECT * FROM applications");
    $applications = $stmt_applications->fetchAll(PDO::FETCH_ASSOC);

    $stmt_shareholders_directors = $pdo->query("SELECT * FROM shareholders_directors");
    $shareholders_directors = $stmt_shareholders_directors->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
    body {
        background-color: #f0f2f5;
    }

    .navbar {
        margin-bottom: 20px;
    }

    .card-header {
        background-color: #007bff;
        color: white;
    }

    .table th,
    .table td {
        vertical-align: middle;
    }

    .table-responsive {
        max-height: 500px;
    }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Admin Dashboard</a>
        </div>
    </nav>

    <div class="container">
        <h1 class="mb-4">Dashboard</h1>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h2>Applications</h2>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Full Name</th>
                                    <th>Username</th>
                                    <th>Address</th>
                                    <th>Mobile</th>
                                    <th>Business Activities</th>
                                    <th>Employees</th>
                                    <th>County</th>
                                    <th>District</th>
                                    <th>Locality</th>
                                    <th>Building Plot</th>
                                    <th>Floor Room</th>
                                    <th>Postal Address</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($applications as $application): ?>
                                <tr>
                                    <td><?= htmlspecialchars($application['id']) ?></td>
                                    <td><?= htmlspecialchars($application['fullname']) ?></td>
                                    <td><?= htmlspecialchars($application['username']) ?></td>
                                    <td><?= htmlspecialchars($application['address']) ?></td>
                                    <td><?= htmlspecialchars($application['mobile']) ?></td>
                                    <td><?= htmlspecialchars($application['business_activities']) ?></td>
                                    <td><?= htmlspecialchars($application['num_employees']) ?></td>
                                    <td><?= htmlspecialchars($application['county']) ?></td>
                                    <td><?= htmlspecialchars($application['district']) ?></td>
                                    <td><?= htmlspecialchars($application['locality']) ?></td>
                                    <td><?= htmlspecialchars($application['building_plot']) ?></td>
                                    <td><?= htmlspecialchars($application['floor_room']) ?></td>
                                    <td><?= htmlspecialchars($application['application_postal_address']) ?></td>
                                    <td><?= htmlspecialchars($application['application_email']) ?></td>
                                    <td><?= htmlspecialchars($application['phone']) ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h2>Shareholders/Directors</h2>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Application ID</th>
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
                                <?php foreach ($shareholders_directors as $sd): ?>
                                <tr>
                                    <td><?= htmlspecialchars($sd['id']) ?></td>
                                    <td><?= htmlspecialchars($sd['application_id']) ?></td>
                                    <td><?= htmlspecialchars($sd['person_type']) ?></td>
                                    <td><?= htmlspecialchars($sd['name']) ?></td>
                                    <td><?= htmlspecialchars($sd['postal_address']) ?></td>
                                    <td><a href="<?= htmlspecialchars($sd['national_id']) ?>" target="_blank"><i
                                                class="fas fa-file-alt"></i> View</a></td>
                                    <td><a href="<?= htmlspecialchars($sd['pin_certificate']) ?>" target="_blank"><i
                                                class="fas fa-file-alt"></i> View</a></td>
                                    <td><a href="<?= htmlspecialchars($sd['passport_photo']) ?>" target="_blank"><i
                                                class="fas fa-file-alt"></i> View</a></td>
                                    <td><?= htmlspecialchars($sd['residential_address']) ?></td>
                                    <td><?= htmlspecialchars($sd['phone_number']) ?></td>
                                    <td><?= htmlspecialchars($sd['email']) ?></td>
                                    <td><?= htmlspecialchars($sd['shares']) ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>

</html>