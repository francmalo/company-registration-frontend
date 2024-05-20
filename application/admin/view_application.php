<?php
// Set session cookie parameters
session_set_cookie_params([
    'lifetime' => 0,
    'path' => '/',
    'domain' => '',
    'secure' => true, // Set to true if using HTTPS
    'httponly' => true,
    'samesite' => 'Strict'
]);

// Start session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // User is not logged in, redirect to the login page
    header("Location: login.php");
    exit();
}

// Check if the logout parameter is set
if (isset($_GET['logout'])) {
    // Destroy the session and remove session data
    session_unset();
    session_destroy();

    // Redirect to the login page
    header("Location: login.php");
    exit();
}

// Rest of the code for applications.php
// ...

// Database connection details
$host = 'localhost';
$dbname = 'business';
$username = 'root';
$password = 'safaricom';

try {
    // Create a new PDO instance
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check if the update_status form has been submitted
 if (isset($_POST['update_status']) && isset($_POST['application_id'])) {
    $application_id = $_POST['application_id'];
    $new_status = $_POST['update_status'];

    // Update the status with the selected value
    $update_stmt = $pdo->prepare("UPDATE applications SET status = :new_status WHERE id = :application_id");
    $update_stmt->bindParam(':new_status', $new_status, PDO::PARAM_STR);
    $update_stmt->bindParam(':application_id', $application_id, PDO::PARAM_INT);
    $update_stmt->execute();

    // Redirect to avoid form resubmission
    header("Location: " . $_SERVER['REQUEST_URI']);
    exit();
}

    // Get the application ID from the query string
    $application_id = $_GET['id'];

    // Prepare the SQL statement to fetch application and shareholder/director data
    $stmt = $pdo->prepare("SELECT a.*, a.status, sd.person_type, sd.name, sd.postal_address, sd.national_id, sd.pin_certificate, sd.passport_photo, sd.residential_address, sd.phone_number, sd.email, sd.shares
                           FROM applications a
                           LEFT JOIN shareholders_directors sd ON a.id = sd.application_id
                           WHERE a.id = :application_id");

    // Bind the application ID
    $stmt->bindParam(':application_id', $application_id, PDO::PARAM_INT);

    // Execute the statement
    $stmt->execute();

    // Fetch the results
    $application_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>Matrix Template - The Ultimate Multipurpose admin template</title>
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    <style>
    .image-container {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 20px;
    }

    .passport-photo {
        max-width: 300px;
        max-height: 400px;
        border: 1px solid #ddd;
        border-radius: 4px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                        <i class="ti-menu ti-close"></i>
                    </a>
                    <!-- Logo -->
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon -->
                        <b class="logo-icon p-l-10">
                            <!-- Dark Logo icon -->
                            <img src="assets/images/logo-icon.png" alt="homepage" class="light-logo" />
                        </b>
                        <!-- Logo text -->
                        <span class="logo-text">
                            <img src="assets/images/logo-text.png" alt="homepage" class="light-logo" />
                        </span>
                    </a>
                    <!-- Toggle which is visible on mobile only -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                        data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="ti-more"></i>
                    </a>
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item d-none d-md-block">
                            <a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)"
                                data-sidebartype="mini-sidebar">
                                <i class="mdi mdi-menu font-24"></i>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="d-none d-md-block">Create New <i class="fa fa-angle-down"></i></span>
                                <span class="d-block d-md-none"><i class="fa fa-plus"></i></span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li>
                        <li class="nav-item search-box">
                            <a class="nav-link waves-effect waves-dark" href="javascript:void(0)"><i
                                    class="ti-search"></i></a>
                            <form class="app-search position-absolute">
                                <input type="text" class="form-control" placeholder="Search &amp; enter">
                                <a class="srh-btn"><i class="ti-close"></i></a>
                            </form>
                        </li>
                    </ul>
                    <ul class="navbar-nav float-right">

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-bell font-24"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" id="2"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="font-24 mdi mdi-comment-processing"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown"
                                aria-labelledby="2">
                                <ul class="list-style-none">
                                    <li>
                                        <div class="">
                                            <a href="javascript:void(0)" class="link border-top">
                                                <div class="d-flex no-block align-items-center p-10">
                                                    <span class="btn btn-success btn-circle"><i
                                                            class="ti-calendar"></i></span>
                                                    <div class="m-l-10">
                                                        <h5 class="m-b-0">Event today</h5>
                                                        <span class="mail-desc">Just a reminder that event</span>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="javascript:void(0)" class="link border-top">
                                                <div class="d-flex no-block align-items-center p-10">
                                                    <span class="btn btn-info btn-circle"><i
                                                            class="ti-settings"></i></span>
                                                    <div class="m-l-10">
                                                        <h5 class="m-b-0">Settings</h5>
                                                        <span class="mail-desc">You can customize this template</span>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="javascript:void(0)" class="link border-top">
                                                <div class="d-flex no-block align-items-center p-10">
                                                    <span class="btn btn-primary btn-circle"><i
                                                            class="ti-user"></i></span>
                                                    <div class="m-l-10">
                                                        <h5 class="m-b-0">Pavan kumar</h5>
                                                        <span class="mail-desc">Just see the my admin!</span>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="javascript:void(0)" class="link border-top">
                                                <div class="d-flex no-block align-items-center p-10">
                                                    <span class="btn btn-danger btn-circle"><i
                                                            class="fa fa-link"></i></span>
                                                    <div class="m-l-10">
                                                        <h5 class="m-b-0">Launch Admin</h5>
                                                        <span class="mail-desc">Just see the my new admin!</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href=""
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="assets/images/users/1.jpg" alt="user" class="rounded-circle" width="31">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated">
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-user m-r-5 m-l-5"></i>
                                    My Profile</a>
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-wallet m-r-5 m-l-5"></i>
                                    My Balance</a>
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-email m-r-5 m-l-5"></i>
                                    Inbox</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0)"><i
                                        class="ti-settings m-r-5 m-l-5"></i> Account Setting</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0)"><i
                                        class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                                <div class="dropdown-divider"></div>
                                <div class="p-l-30 p-10"><a href="javascript:void(0)"
                                        class="btn btn-sm btn-success btn-rounded">View Profile</a></div>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-danger" href="?logout" title="Logout">
                                <i class="fas fa-sign-out-alt"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="p-t-30">
                        <!-- <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="index.php" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                                    class="hide-menu">Dashboard</span></a></li> -->
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="applications.php" aria-expanded="false"><i class="mdi mdi-receipt"></i><span
                                    class="hide-menu">Applications</span></a></li>

                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">

                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">
                            Application Details
                        </h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="applications.php">applications</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">view application</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            </li>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-body printableArea">
                            <div class="container">
                                <div class="card">
                                    <div class="card-header">
                                        <h3>Application Status</h3>
                                    </div>
                                    <div class="card-body">
                                        <?php if ($application_data[0]['status'] == 'pending' || $application_data[0]['status'] == 'in progress') : ?>
                                        <form method="post" action="">
                                            <input type="hidden" name="application_id"
                                                value="<?php echo $application_data[0]['id']; ?>">
                                            <select name="update_status" class="form-control">
                                                <option value="pending"
                                                    <?php if ($application_data[0]['status'] == 'pending') echo 'selected'; ?>>
                                                    Pending</option>
                                                <option value="in progress"
                                                    <?php if ($application_data[0]['status'] == 'in progress') echo 'selected'; ?>>
                                                    In Progress</option>
                                                <option value="completed">Mark as Completed</option>
                                            </select>
                                            <button type="submit" class="btn btn-primary mt-2">Update Status</button>
                                        </form>
                                        <?php else : ?>
                                        <span
                                            class="badge badge-pill badge-success"><?php echo $application_data[0]['status']; ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="card-header">
                                        <h3>Contact Person Information</h3>
                                    </div>
                                    <div class="card-body">
                                        <p><strong>Full Name:</strong> <?php echo $application_data[0]['fullname']; ?>
                                        </p>
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
                                        <p><strong>Business Activities:</strong>
                                            <?php echo $application_data[0]['business_activities']; ?></p>
                                        <p><strong>Number of Employees:</strong>
                                            <?php echo $application_data[0]['num_employees']; ?></p>
                                    </div>
                                </div>
                                <br>
                                <div class="card">
                                    <div class="card-header">
                                        <h3>Registered Office Addresses</h3>
                                    </div>
                                    <div class="card-body">
                                        <p><strong>County:</strong> <?php echo $application_data[0]['county']; ?></p>
                                        <p><strong>District:</strong> <?php echo $application_data[0]['district']; ?>
                                        </p>
                                        <p><strong>Locality:</strong> <?php echo $application_data[0]['locality']; ?>
                                        </p>
                                        <p><strong>Building/Plot No.:</strong>
                                            <?php echo $application_data[0]['building_plot']; ?></p>
                                        <p><strong>Floor/Room No.:</strong>
                                            <?php echo $application_data[0]['floor_room']; ?></p>
                                        <p><strong>Postal Address:</strong>
                                            <?php echo $application_data[0]['application_postal_address']; ?></p>
                                        <p><strong>Email Address:</strong>
                                            <?php echo $application_data[0]['application_email']; ?></p>
                                        <p><strong>Phone Number:</strong> <?php echo $application_data[0]['phone']; ?>
                                        </p>
                                    </div>
                                </div>
                                <br>
                                <div class="card">
                                    <div class="card-header">
                                        <h3>Shareholders/Directors Information</h3>
                                    </div>
                                    <div class="card-body">
                                        <table class="table">
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
                                                    <td><a href="../<?php echo $data['national_id']; ?>"
                                                            target="_blank">
                                                            <i class="fas fa-eye"></i> View
                                                        </a></td>
                                                    <td><a href="../<?php echo $data['pin_certificate']; ?>"
                                                            target="_blank">
                                                            <i class="fas fa-eye"></i> View
                                                        </a></td>
                                                    <td>
                                                        <img src="../<?php echo $data['passport_photo']; ?>"
                                                            alt="Passport Photo" style="max-width: 100%; height: auto;">
                                                        <br>
                                                        <a href="../<?php echo $data['passport_photo']; ?>"
                                                            target="_blank">
                                                            <i class="fas fa-eye"></i> View
                                                        </a> |
                                                        <a href="../<?php echo $data['passport_photo']; ?>"
                                                            download>Download</a>
                                                    </td>
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
                            </div>
                        </div>

                    </div>
                </div>

                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                All Rights Reserved by Matrix-admin. Designed and Developed by <a
                    href="https://wrappixel.com">WrapPixel</a>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <!-- Include PDF.js library -->

    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
</body>

</html>