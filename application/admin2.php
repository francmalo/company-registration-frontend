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
                                    <th>Business Activities</th>
                                    <th>Employees</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($applications as $application): ?>
                                <tr>
                                    <td><?= htmlspecialchars($application['id']) ?></td>
                                    <td><?= htmlspecialchars($application['fullname']) ?></td>
                                    <td><?= htmlspecialchars($application['username']) ?></td>
                                    <td><?= htmlspecialchars($application['business_activities']) ?></td>
                                    <td><?= htmlspecialchars($application['num_employees']) ?></td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#applicationModal<?= htmlspecialchars($application['id']) ?>">
                                            View Details
                                        </button>
                                    </td>
                                </tr>

                                <!-- Modal for Application Details -->
                                <div class="modal fade" id="applicationModal<?= htmlspecialchars($application['id']) ?>"
                                    tabindex="-1"
                                    aria-labelledby="applicationModalLabel<?= htmlspecialchars($application['id']) ?>"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title"
                                                    id="applicationModalLabel<?= htmlspecialchars($application['id']) ?>">
                                                    Application Details</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                    <div class="mb-3">
                                                        <label for="fullName" class="form-label">Full Name</label>
                                                        <input type="text" class="form-control" id="fullName"
                                                            value="<?= htmlspecialchars($application['fullname']) ?>"
                                                            readonly>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="username" class="form-label">Username</label>
                                                        <input type="text" class="form-control" id="username"
                                                            value="<?= htmlspecialchars($application['username']) ?>"
                                                            readonly>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="address" class="form-label">Address</label>
                                                        <input type="text" class="form-control" id="address"
                                                            value="<?= htmlspecialchars($application['address']) ?>"
                                                            readonly>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="mobile" class="form-label">Mobile</label>
                                                        <input type="text" class="form-control" id="mobile"
                                                            value="<?= htmlspecialchars($application['mobile']) ?>"
                                                            readonly>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="businessActivities" class="form-label">Business
                                                            Activities</label>
                                                        <input type="text" class="form-control" id="businessActivities"
                                                            value="<?= htmlspecialchars($application['business_activities']) ?>"
                                                            readonly>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="numEmployees" class="form-label">Number of
                                                            Employees</label>
                                                        <input type="text" class="form-control" id="numEmployees"
                                                            value="<?= htmlspecialchars($application['num_employees']) ?>"
                                                            readonly>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="county" class="form-label">County</label>
                                                        <input type="text" class="form-control" id="county"
                                                            value="<?= htmlspecialchars($application['county']) ?>"
                                                            readonly>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="district" class="form-label">District</label>
                                                        <input type="text" class="form-control" id="district"
                                                            value="<?= htmlspecialchars($application['district']) ?>"
                                                            readonly>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="locality" class="form-label">Locality</label>
                                                        <input type="text" class="form-control" id="locality"
                                                            value="<?= htmlspecialchars($application['locality']) ?>"
                                                            readonly>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="buildingPlot"
                                                            class="form-label">Building/Plot</label>
                                                        <input type="text" class="form-control" id="buildingPlot"
                                                            value="<?= htmlspecialchars($application['building_plot']) ?>"
                                                            readonly>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="floorRoom" class="form-label">Floor/Room</label>
                                                        <input type="text" class="form-control" id="floorRoom"
                                                            value="<?= htmlspecialchars($application['floor_room']) ?>"
                                                            readonly>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="postalAddress" class="form-label">Postal
                                                            Address</label>
                                                        <input type="text" class="form-control" id="postalAddress"
                                                            value="<?= htmlspecialchars($application['application_postal_address']) ?>"
                                                            readonly>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="email" class="form-label">Email</label>
                                                        <input type="email" class="form-control" id="email"
                                                            value="<?= htmlspecialchars($application['application_email']) ?>"
                                                            readonly>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="phone" class="form-label">Phone</label>
                                                        <input type="text" class="form-control" id="phone"
                                                            value="<?= htmlspecialchars($application['phone']) ?>"
                                                            readonly>
                                                    </div>

                                                    <h5>Shareholders/Directors</h5>
                                                    <table class="table table-striped table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Person Type</th>
                                                                <th>Shares</th>
                                                                <th>Email</th>
                                                                <th>Phone Number</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $application_shareholders_directors = array_filter($shareholders_directors, function($sd) use ($application) {
                                                                return $sd['application_id'] == $application['id'];
                                                            });
                                                            foreach ($application_shareholders_directors as $sd):
                                                            ?>
                                                            <tr>
                                                                <td><?= htmlspecialchars($sd['name']) ?></td>
                                                                <td><?= htmlspecialchars($sd['person_type']) ?></td>
                                                                <td><?= htmlspecialchars($sd['shares']) ?></td>
                                                                <td><?= htmlspecialchars($sd['email']) ?></td>
                                                                <td><?= htmlspecialchars($sd['phone_number']) ?></td>
                                                            </tr>
                                                            <?php endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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