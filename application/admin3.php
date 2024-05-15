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
                                                        <input type="text" class="form-control" id="locality<div class="
                                                            row">
                                                        <div class="col-md-12">
                                                            <div>
                                                                <div class="page-title">
                                                                    <div class="title_left">
                                                                        <h2>New Application</h2>
                                                                    </div>
                                                                </div>

                                                                <div class="clearfix"></div>

                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <form id="myform"
                                                                            class="form-horizontal form-label-top"
                                                                            enctype="multipart/form-data" method="post"
                                                                            action="claude.php">
                                                                            <div class="col-md-7">
                                                                                <div class="x_panel">
                                                                                    <div class="x_title">
                                                                                        <h2>Contact-Person-info</h2>
                                                                                        <div class="clearfix"></div>
                                                                                    </div>
                                                                                    <div class="x_content">
                                                                                        <br />
                                                                                        <div class="row">
                                                                                            <div
                                                                                                class="col-md-12 col-sm-12">
                                                                                                <div
                                                                                                    class="form-group row">
                                                                                                    <label
                                                                                                        class="control-label col-md-3 col-sm-3 col-xs-3">Full
                                                                                                        Name:</label>
                                                                                                    <div
                                                                                                        class="col-md-9 col-sm-9 col-xs-9">
                                                                                                        <input
                                                                                                            type="text"
                                                                                                            class="form-control form-control-sm"
                                                                                                            name="fullname"
                                                                                                            value="" />
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="form-group row">
                                                                                                    <label
                                                                                                        class="control-label col-md-3 col-sm-3 col-xs-3">Email:</label>
                                                                                                    <div
                                                                                                        class="col-md-9 col-sm-9 col-xs-9">
                                                                                                        <input
                                                                                                            type="email"
                                                                                                            class="form-control form-control-sm"
                                                                                                            name="username"
                                                                                                            value="" />
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="form-group row">
                                                                                                    <label
                                                                                                        class="control-label col-md-3 col-sm-3 col-xs-3">Address:</label>
                                                                                                    <div
                                                                                                        class="col-md-9 col-sm-9 col-xs-9">
                                                                                                        <input
                                                                                                            type="text"
                                                                                                            class="form-control form-control-sm"
                                                                                                            name="address"
                                                                                                            value="" />
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="form-group row">
                                                                                                    <label
                                                                                                        class="control-label col-md-3 col-sm-3 col-xs-3">Mobile:</label>
                                                                                                    <div
                                                                                                        class="col-md-9 col-sm-9 col-xs-9">
                                                                                                        <input
                                                                                                            type="number"
                                                                                                            class="form-control form-control-sm"
                                                                                                            name="mobile"
                                                                                                            placeholder="" />
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="x_panel">
                                                                                    <div class="x_title">
                                                                                        <h2>Proposed Company Names</h2>
                                                                                        <br>
                                                                                        <div class="clearfix"></div>
                                                                                    </div>
                                                                                    <div class="x_content">
                                                                                        <div>
                                                                                            <i>The minimum number of
                                                                                                names that you can add
                                                                                                is 3 and the maximum is
                                                                                                5. Be keen to add the
                                                                                                names in the order of
                                                                                                priority since the
                                                                                                registrar will approve
                                                                                                the first available
                                                                                                name. The names may be
                                                                                                rejected if it is too
                                                                                                close to a name of an
                                                                                                already-registered
                                                                                                Kenyan business.</i>
                                                                                        </div>
                                                                                        <br />
                                                                                        <div class="row">
                                                                                            <div
                                                                                                class="col-md-12 col-sm-12">
                                                                                                <div
                                                                                                    class="form-group row">
                                                                                                    <label
                                                                                                        class="control-label col-md-3 col-sm-3 col-xs-3">Proposed
                                                                                                        name 1 <span
                                                                                                            class="text-danger">*</span>:</label>
                                                                                                    <div
                                                                                                        class="col-md-9 col-sm-9 col-xs-9">
                                                                                                        <input
                                                                                                            type="text"
                                                                                                            class="form-control form-control-sm"
                                                                                                            name="name1"
                                                                                                            placeholder="" />
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="form-group row">
                                                                                                    <label
                                                                                                        class="control-label col-md-3 col-sm-3 col-xs-3">Proposed
                                                                                                        name 2 <span
                                                                                                            class="text-danger">*</span>:</label>
                                                                                                    <div
                                                                                                        class="col-md-9 col-sm-9 col-xs-9">
                                                                                                        <input
                                                                                                            type="text"
                                                                                                            class="form-control form-control-sm"
                                                                                                            name="name2"
                                                                                                            placeholder="" />
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="form-group row">
                                                                                                    <label
                                                                                                        class="control-label col-md-3 col-sm-3 col-xs-3">Proposed
                                                                                                        name 3 <span
                                                                                                            class="text-danger">*</span>:</label>
                                                                                                    <div
                                                                                                        class="col-md-9 col-sm-9 col-xs-9">
                                                                                                        <input
                                                                                                            type="text"
                                                                                                            class="form-control form-control-sm"
                                                                                                            name="name3"
                                                                                                            placeholder="" />
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="form-group row">
                                                                                                    <label
                                                                                                        class="control-label col-md-3 col-sm-3 col-xs-3">Proposed
                                                                                                        name 4:</label>
                                                                                                    <div
                                                                                                        class="col-md-9 col-sm-9 col-xs-9">
                                                                                                        <input
                                                                                                            type="text"
                                                                                                            class="form-control form-control-sm"
                                                                                                            name="name4"
                                                                                                            placeholder="" />
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="form-group row">
                                                                                                    <label
                                                                                                        class="control-label col-md-3 col-sm-3 col-xs-3">Proposed
                                                                                                        name 5:</label>
                                                                                                    <div
                                                                                                        class="col-md-9 col-sm-9 col-xs-9">
                                                                                                        <input
                                                                                                            type="text"
                                                                                                            class="form-control form-control-sm"
                                                                                                            name="name5"
                                                                                                            placeholder="" />
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="x_panel">
                                                                                    <div class="x_title">
                                                                                        <h2>Business Activities</h2>
                                                                                        <div class="clearfix"></div>
                                                                                    </div>
                                                                                    <div class="x_content">
                                                                                        <div class="form-group row">
                                                                                            <label
                                                                                                class="control-label col-md-3 col-sm-3 col-xs-3">Business
                                                                                                Activities <span
                                                                                                    class="text-danger">*</span>:</label>
                                                                                            <div
                                                                                                class="col-md-9 col-sm-9 col-xs-9">
                                                                                                <textarea
                                                                                                    class="form-control form-control-sm"
                                                                                                    name="business_activities"
                                                                                                    rows="3"
                                                                                                    placeholder="Provide the main business activities of the company"
                                                                                                    required></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group row">
                                                                                            <label
                                                                                                class="control-label col-md-3 col-sm-3 col-xs-3">Number
                                                                                                of Employees <span
                                                                                                    class="text-danger">*</span>:</label>
                                                                                            <div
                                                                                                class="col-md-9 col-sm-9 col-xs-9">
                                                                                                <input type="number"
                                                                                                    class="form-control form-control-sm"
                                                                                                    name="num_employees"
                                                                                                    placeholder="Enter the number of employees"
                                                                                                    required>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="x_panel">
                                                                                    <div class="x_title">
                                                                                        <h2>Registered Office Addresses
                                                                                        </h2>
                                                                                        <div class="clearfix"></div>
                                                                                    </div>
                                                                                    <div class="
                                                                                    <div class=" x_content">
                                                                                        <div>
                                                                                            <i>Please fill in the
                                                                                                registered office
                                                                                                addresses.</i>
                                                                                        </div>
                                                                                        <br />
                                                                                        <div class="row">
                                                                                            <div
                                                                                                class="col-md-12 col-sm-12">
                                                                                                <div
                                                                                                    class="form-group row">
                                                                                                    <label
                                                                                                        class="control-label col-md-3 col-sm-3 col-xs-3">County
                                                                                                        <span
                                                                                                            class="text-danger">*</span>:</label>
                                                                                                    <div
                                                                                                        class="col-md-9 col-sm-9 col-xs-9">
                                                                                                        <input
                                                                                                            type="text"
                                                                                                            class="form-control form-control-sm"
                                                                                                            name="county"
                                                                                                            placeholder="" />
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="form-group row">
                                                                                                    <label
                                                                                                        class="control-label col-md-3 col-sm-3 col-xs-3">District
                                                                                                        <span
                                                                                                            class="text-danger">*</span>:</label>
                                                                                                    <div
                                                                                                        class="col-md-9 col-sm-9 col-xs-9">
                                                                                                        <input
                                                                                                            type="text"
                                                                                                            class="form-control form-control-sm"
                                                                                                            name="district"
                                                                                                            placeholder="" />
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="form-group row">
                                                                                                    <label
                                                                                                        class="control-label col-md-3 col-sm-3 col-xs-3">Locality
                                                                                                        <span
                                                                                                            class="text-danger">*</span>:</label>
                                                                                                    <div
                                                                                                        class="col-md-9 col-sm-9 col-xs-9">
                                                                                                        <input
                                                                                                            type="text"
                                                                                                            class="form-control form-control-sm"
                                                                                                            name="locality"
                                                                                                            placeholder="" />
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="form-group row">
                                                                                                    <label
                                                                                                        class="control-label col-md-3 col-sm-3 col-xs-3">Building/Plot
                                                                                                        No. <span
                                                                                                            class="text-danger">*</span>:</label>
                                                                                                    <div
                                                                                                        class="col-md-9 col-sm-9 col-xs-9">
                                                                                                        <input
                                                                                                            type="text"
                                                                                                            class="form-control form-control-sm"
                                                                                                            name="building_plot"
                                                                                                            placeholder="" />
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="form-group row">
                                                                                                    <label
                                                                                                        class="control-label col-md-3 col-sm-3 col-xs-3">Floor/Room
                                                                                                        No. <span
                                                                                                            class="text-danger">*</span>:</label>
                                                                                                    <div
                                                                                                        class="col-md-9 col-sm-9 col-xs-9">
                                                                                                        <input
                                                                                                            type="text"
                                                                                                            class="form-control form-control-sm"
                                                                                                            name="floor_room"
                                                                                                            placeholder="" />
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="form-group row">
                                                                                                    <label
                                                                                                        class="control-label col-md-3 col-sm-3 col-xs-3">Postal
                                                                                                        Address <span
                                                                                                            class="text-danger">*</span>:</label>
                                                                                                    <div
                                                                                                        class="col-md-9 col-sm-9 col-xs-9">
                                                                                                        <input
                                                                                                            type="text"
                                                                                                            class="form-control form-control-sm"
                                                                                                            name="application_postal_address"
                                                                                                            placeholder="" />
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="form-group row">
                                                                                                    <label
                                                                                                        class="control-label col-md-3 col-sm-3 col-xs-3">Email
                                                                                                        Address <span
                                                                                                            class="text-danger">*</span>:</label>
                                                                                                    <div
                                                                                                        class="col-md-9 col-sm-9 col-xs-9">
                                                                                                        <input
                                                                                                            type="email"
                                                                                                            class="form-control form-control-sm"
                                                                                                            name="application_email"
                                                                                                            placeholder="" />
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="form-group row">
                                                                                                    <label
                                                                                                        class="control-label col-md-3 col-sm-3 col-xs-3">Phone
                                                                                                        Number <span
                                                                                                            class="text-danger">*</span>:</label>
                                                                                                    <div
                                                                                                        class="col-md-9 col-sm-9 col-xs-9">
                                                                                                        <input
                                                                                                            type="tel"
                                                                                                            class="form-control form-control-sm"
                                                                                                            name="phone"
                                                                                                            placeholder="" />
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <span
                                                                                    id="shareholder-director-container"></span>

                                                                                <div class="form-group row">
                                                                                    <div
                                                                                        class="col-md-9 col-sm-9 col-xs-9 col-md-offset-3">
                                                                                        <button type="submit"
                                                                                            class="btn btn-primary">Submit</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <script
                                                        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js">
                                                    </script>
                                                    <script
                                                        src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js">
                                                    </script>
                                                    <script>
                                                    function add_shareholder_row(count = 0) {
                                                        var mybutton = '';
                                                        if (count == 0) {
                                                            mybutton +=
                                                                '<button type="button" name="add_more" id="add_more" class="btn btn-success btn-xs">+</button>';
                                                        } else {
                                                            mybutton += '<button type="button" name="remove" id="' +
                                                                count +
                                                                '" class="btn btn-danger btn-xs remove">-</button>';
                                                            mybutton +=
                                                                '| <button type="button" name="add_more" " class="btn btn-success btn-xs add_more2">+</button>';
                                                        }
                                                        var html = '';
                                                        html += '<span id="row' + count + '"><div class="x_panel">';
                                                        html += '<div class="x_title">';
                                                        html += '<h2>Shareholder/Director Information</h2>';
                                                        html += '<div class="clearfix"></div>';
                                                        html += '</div>';
                                                        html += '<div class="x_content">';
                                                        html += '<div class="form-group row">';
                                                        html +=
                                                            '<label class="control-label col-md-3 col-sm-3 col-xs-3">Person Type';
                                                        html += '<span class="text-danger">*</span>:</label>';
                                                        html += '<div class="col-md-9 col-sm-9 col-xs-9">';
                                                        html += '<div class="radio">';
                                                        html += '<label>';
                                                        html += '<input type="radio" name="person_type_' + count +
                                                            '[]" value="shareholder"> Shareholder';
                                                        html += '</label>';
                                                        html += '<label>';
                                                        html += '<input type="radio" name="person_type_' + count +
                                                            '[]" value="director"> Director';
                                                        html += '</label>';
                                                        html += '</div>';
                                                        html += '</div>';
                                                        html += '</div>';
                                                        html += '<div class="form-group row">';
                                                        html +=
                                                            '<label class="control-label col-md-3 col-sm-3 col-xs-3">Name <span class="text-danger">*</span>:</label> ';
                                                        html += '<div class="col-md-9 col-sm-9 col-xs-9">';
                                                        html +=
                                                            '<input type="text" class="form-control form-control-sm" name="name[]" placeholder="" required>';
                                                        html += '  </div>';
                                                        html += '</div>';
                                                        html += '  <div class="form-group row">';
                                                        html +=
                                                            '  <label class="control-label col-md-3 col-sm-3 col-xs-3">Postal Address <span class="text-danger">*</span>:</label>';
                                                        html += '<div class="col-md-9 col-sm-9 col-xs-9">';
                                                        html +=
                                                            '<input type="text" class="form-control form-control-sm" name="postal_address[]" placeholder="" required>';
                                                        html += '  </div>';
                                                        html += '</div>';
                                                        html += '  <div class="form-group row">';
                                                        html +=
                                                            '  <label class="control-label col-md-3 col-sm-3 col-xs-3">National ID'; <
                                                        span class = "text-danger" > * < /span>:</label > ';
                                                        html += '  <div class="col-md-9 col-sm-9 col-xs-9">';
                                                        html +=
                                                            '  <input type="file" class="form-control form-control-sm" name="national_id[]"  id="national_id" accept="image/*,application/pdf" required>';
                                                        html +=
                                                            '  <small class="text-muted">Provide a copy of the National Identity Card.</small>';
                                                        html += '  </div>';
                                                        html += '</div>';
                                                        html += '  <div class="form-group row">';
                                                        html +=
                                                            '  <label class="control-label col-md-3 col-sm-3 col-xs-3">PIN Certificate';
                                                        html += '<span class="text-danger">*</span>:</label>';
                                                        html += '  <div class="col-md-9 col-sm-9 col-xs-9">';
                                                        html +=
                                                            '  <input type="file" class="form-control form-control-sm" name="pin_certificate[]"  id="pin_certificate" accept="image/*,application/pdf" required>';
                                                        html +=
                                                            '<small class="text-muted">Provide a copy of the PIN certificate.</small>';
                                                        html += '  </div>';
                                                        html += '  </div>';
                                                        html += '  <div class="form-group row">';
                                                        html +=
                                                            '<label class="control-label col-md-3 col-sm-3 col-xs-3">Passport Photo';
                                                        html += '  <span class="text-danger">*</span>:</label>';
                                                        html += '  <div class="col-md-9 col-sm-9 col-xs-9">';
                                                        html +=
                                                            ' <input type="file" class="form-control form-control-sm" name="passport_photo[]"  id="passport_photo" accept="image/*" required>';
                                                        html +=
                                                            '  <small class="text-muted">Provide one passport photo.</small>';
                                                        html += '  </div>';
                                                        html += '</div>';
                                                        html += '  <div class="form-group row">';
                                                        html +=
                                                            '  <label class="control-label col-md-3 col-sm-3 col-xs-3">Residential Address <span class="text-danger">*</span>:</label>';
                                                        html += '<div class="col-md-9 col-sm-9 col-xs-9">';
                                                        html +=
                                                            '  <input type="text" class="form-control form-control-sm" name="residential_address[]" placeholder="Plot Number, Estate, House Number, and Road" required>';
                                                        html += '  </div>';
                                                        html += '  </div>';
                                                        html += '  <div class="form-group row">';
                                                        html +=
                                                            '  <label class="control-label col-md-3 col-sm-3 col-xs-3">Phone Number';
                                                        html += '<span class="text-danger">*</span>:</label>';
                                                        html += '  <div class="col-md-9 col-sm-9 col-xs-9">';
                                                        html +=
                                                            '    <input type="tel" class="form-control form-control-sm" name="phone_number[]" placeholder="" required>';
                                                        html += '</div>';
                                                        html += '  </div>';
                                                        html += '<div class="form-group row">';
                                                        html +=
                                                            '<label class="control-label col-md-3 col-sm-3 col-xs-3">Email Address <span class="text-danger">*</span>:</label>';
                                                        html += '  <div class="col-md-9 col-sm-9 col-xs-9">';
                                                        html +=
                                                            '<input type="email" class="form-control form-control-sm" name="email[]" placeholder="" required>';
                                                        html += '  </div>';
                                                        html += '  </div>';
                                                        html += '  <div class="form-group row">';
                                                        html +=
                                                            '<label class="control-label col-md-3 col-sm-3 col-xs-3">Number of Shares';
                                                        html += '<span class="text-danger">*</span>:</label>';
                                                        html += '<div class="col-md-9 col-sm-9 col-xs-9">';
                                                        html +=
                                                            '  <input type="number" class="form-control form-control-sm"   name="shares[]" placeholder="" required>';
                                                        html +=
                                                            '<small class="text-muted">Enter the number of shares to be allocated to this person.</small>';
                                                        html += '  </div>';
                                                        html += '  </div>';
                                                        html += '  <div>' + mybutton + '</div>';
                                                        html += '</div>';
                                                        html += '</div></span>';
                                                        $('#shareholder-director-container').append(html);
                                                    }

                                                    var count = 0;
                                                    $(document).ready(function() {
                                                        //add one share holder by default
                                                        add_shareholder_row();
                                                    });

                                                    //add share holder
                                                    $(document).on('click', '#add_more', function() {
                                                        count = count + 1;
                                                        add_shareholder_row(count);
                                                    });

                                                    //add share holder
                                                    $(document).on('click', '.add_more2', function() {
                                                        count = count + 1;
                                                        add_shareholder_row(count);
                                                    });

                                                    //remove share holder
                                                    $(document).on('click', '.remove', function() {
                                                        var row_no = $(this).attr("id");
                                                        $('#row' + row_no).remove();
                                                    });

                                                    $(document).on('submit', '#myform', function(e) {
                                                        e.preventDefault();

                                                        var formData = new FormData(this);

                                                        $.ajax({
                                                            type: "POST",
                                                            url: "claude.php",
                                                            data: formData,
                                                            dataType: "text",
                                                            contentType: false,
                                                            processData: false,
                                                            success: function(data) {
                                                                // Handle the successful response
                                                                console.log(data);
                                                            },
                                                            error: function(xhr, status, error) {
                                                                // Handle the error
                                                                console.error(error);
                                                            }
                                                        });
                                                    });
                                                    </script>