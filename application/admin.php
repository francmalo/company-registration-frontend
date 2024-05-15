<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
    .card-header {
        background-color: #007bff;
        color: #fff;
    }

    .table th {
        background-color: #f8f9fa;
    }

    .file-link {
        color: #007bff;
    }

    .file-link:hover {
        text-decoration: underline;
    }
    </style>
</head>

<body>
    <div class="container my-5">
        <div class="card">
            <div class="card-header">
                <h1 class="mb-0"><i class="fas fa-chart-line"></i> Admin Panel</h1>
            </div>
            <div class="card-body">
                <h2><i class="fas fa-file-alt"></i> Applications</h2>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Mobile</th>
                                <th>Proposed Names</th>
                                <th>Business Activities</th>
                                <th>Number of Employees</th>
                                <th>Registered Office Address</th>
                            </tr>
                        </thead>
                        <tbody>
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

                                // Fetch applications data
                                $stmt = $pdo->query('SELECT * FROM applications');
                                $applications = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                foreach ($applications as $application) {
                                    echo '<tr>';
                                    echo '<td>' . $application['id'] . '</td>';
                                    echo '<td>' . $application['fullname'] . '</td>';
                                    echo '<td>' . $application['username'] . '</td>';
                                    echo '<td>' . $application['address'] . '</td>';
                                    echo '<td>' . $application['mobile'] . '</td>';
                                    echo '<td>' . implode(', ', array_filter([$application['name1'], $application['name2'], $application['name3'], $application['name4'], $application['name5']])) . '</td>';
                                    echo '<td>' . $application['business_activities'] . '</td>';
                                    echo '<td>' . $application['num_employees'] . '</td>';
                                    echo '<td>' . $application['building_plot'] . ', ' . $application['floor_room'] . ', ' . $application['locality'] . ', ' . $application['district'] . ', ' . $application['county'] . '</td>';
                                    echo '</tr>';
                                }
                            } catch (PDOException $e) {
                                echo "Error: " . $e->getMessage();
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

                <h2 class="mt-5"><i class="fas fa-user-friends"></i> Shareholders/Directors</h2>
                <div class="table-responsive">
                    <table class="table table-striped">
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
                                <th>Number of Shares</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            try {
                                // Fetch shareholders/directors data
                                $stmt = $pdo->query('SELECT * FROM shareholders_directors');
                                $shareholders_directors = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                foreach ($shareholders_directors as $shareholder_director) {
                                    echo '<tr>';
                                    echo '<td>' . $shareholder_director['id'] . '</td>';
                                    echo '<td>' . $shareholder_director['application_id'] . '</td>';
                                    echo '<td>' . $shareholder_director['person_type'] . '</td>';
                                    echo '<td>' . $shareholder_director['name'] . '</td>';
                                    echo '<td>' . $shareholder_director['postal_address'] . '</td>';
                                    echo '<td><a href="' . $shareholder_director['national_id'] . '" target="_blank" class="file-link"><i class="fas fa-file-pdf"></i> View</a></td>';
                                    echo '<td><a href="' . $shareholder_director['pin_certificate'] . '" target="_blank" class="file-link"><i class="fas fa-file-pdf"></i> View</a></td>';
                                    echo '<td><a href="' . $shareholder_director['passport_photo'] . '" target="_blank" class="file-link"><i class="fas fa-file-image"></i> View</a></td>';
                                    echo '<td>' . $shareholder_director['residential_address'] . '</td>';
                                    echo '<td>' . $shareholder_director['phone_number'] . '</td>';
                                    echo '<td>' . $shareholder_director['email'] . '</td>';
                                    echo '<td>' . $shareholder_director['shares'] . '</td>';
                                    echo '</tr>';
                                }
                            } catch (PDOException $e) {
                                echo "Error: " . $e->getMessage();
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>