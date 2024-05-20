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

// Initialize variables
$applications = [];
$start_date = isset($_GET['start_date']) ? $_GET['start_date'] : '';
$end_date = isset($_GET['end_date']) ? $_GET['end_date'] : '';
$status = isset($_GET['status']) ? $_GET['status'] : '';
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$per_page = 10; // Number of results to display per page

try {
    // Create a new PDO instance
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $where = '';
    $params = [];

    // Build the WHERE clause based on the selected filters
    if (!empty($start_date) && !empty($end_date)) {
        $where .= " AND a.created_at BETWEEN :start_date AND :end_date";
        $params[':start_date'] = $start_date;
        $params[':end_date'] = $end_date . ' 23:59:59'; // Include the end of the day
    }

    if (!empty($status)) {
        $where .= " AND a.status = :status";
        $params[':status'] = $status;
    }

    // Calculate the offset for pagination
    $offset = ($page - 1) * $per_page;

    // Prepare the SQL statement to fetch application data with pagination
    $stmt = $pdo->prepare("SELECT a.id, a.fullname, a.username, a.address, a.mobile, a.status, COUNT(sd.id) AS num_shareholders_directors
                           FROM applications a
                           LEFT JOIN shareholders_directors sd ON a.id = sd.application_id
                           WHERE 1 $where
                           GROUP BY a.id
                           ORDER BY a.created_at DESC
                           LIMIT :offset, :per_page");

    // Bind the parameters
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->bindValue(':per_page', $per_page, PDO::PARAM_INT);
    foreach ($params as $key => $value) {
        $stmt->bindValue($key, $value);
    }

    // Execute the statement
    $stmt->execute();

    // Fetch the results
    $applications = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Count the total number of results for pagination
    $total_results_stmt = $pdo->prepare("SELECT COUNT(*) AS total FROM (
                                            SELECT a.id
                                            FROM applications a
                                            LEFT JOIN shareholders_directors sd ON a.id = sd.application_id
                                            WHERE 1 $where
                                            GROUP BY a.id
                                         ) AS subquery");
    foreach ($params as $key => $value) {
        $total_results_stmt->bindValue($key, $value);
    }
    $total_results_stmt->execute();
    $total_results = $total_results_stmt->fetch(PDO::FETCH_ASSOC)['total'];

    // Calculate the total number of pages
    $total_pages = ceil($total_results / $per_page);
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
    <link rel="stylesheet" type="text/css" href="assets/extra-libs/multicheck/multicheck.css">
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
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
                        <h4 class="page-title"></h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Applications</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Business Applications</h5>

                                <form method="get" class="mb-3">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="start_date">Start Date:</label>
                                                <input type="date" class="form-control" id="start_date"
                                                    name="start_date" value="<?php echo $start_date; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="end_date">End Date:</label>
                                                <input type="date" class="form-control" id="end_date" name="end_date"
                                                    value="<?php echo $end_date; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="status">Status:</label>
                                                <select class="form-control" id="status" name="status">
                                                    <option value="">All</option>
                                                    <option value="pending"
                                                        <?php echo $status == 'pending' ? 'selected' : ''; ?>>Pending
                                                    </option>
                                                    <option value="in progress"
                                                        <?php echo $status == 'in progress' ? 'selected' : ''; ?>>In
                                                        Progress</option>
                                                    <option value="completed"
                                                        <?php echo $status == 'completed' ? 'selected' : ''; ?>>
                                                        Completed</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </form>

                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Full Name</th>
                                                <th>Email</th>
                                                <th>Address</th>
                                                <th>Mobile</th>
                                                <th>Status</th>
                                                <th>Shareholders/Directors</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (!empty($applications)) : ?>
                                            <?php foreach ($applications as $application) : ?>
                                            <tr>
                                                <td><?php echo $application['fullname']; ?></td>
                                                <td><?php echo $application['username']; ?></td>
                                                <td><?php echo $application['address']; ?></td>
                                                <td><?php echo $application['mobile']; ?></td>
                                                <td>
                                                    <?php
                                            $status = $application['status'];
                                            $badge_class = '';

                                            if ($status == 'pending') {
                                                $badge_class = 'badge badge-pill badge-warning';
                                            } elseif ($status == 'in progress') {
                                                $badge_class = 'badge badge-pill badge-primary';
                                            } elseif ($status == 'completed') {
                                                $badge_class = 'badge badge-pill badge-success';
                                            }
                                            ?>
                                                    <span
                                                        class="<?php echo $badge_class; ?>"><?php echo $status; ?></span>
                                                </td>
                                                <td><?php echo $application['num_shareholders_directors']; ?></td>
                                                <td><a href="view_application.php?id=<?php echo $application['id']; ?>"
                                                        class="btn btn-primary">View More</a></td>
                                            </tr> <?php endforeach; ?> <?php else : ?> <tr>
                                                <td colspan="7" class="text-center">No applications found.</td>
                                            </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>

                                <?php if ($total_pages > 1) : ?>
                                <nav aria-label="Page navigation">
                                    <ul class="pagination justify-content-center">
                                        <li class="page-item <?php echo ($page == 1) ? 'disabled' : ''; ?>">
                                            <a class="page-link"
                                                href="?<?php echo http_build_query(array_merge($_GET, ['page' => 1])); ?>"
                                                aria-label="First">
                                                <span aria-hidden="true">&laquo;</span>
                                                <span class="sr-only">First</span>
                                            </a>
                                        </li>
                                        <li class="page-item <?php echo ($page == 1) ? 'disabled' : ''; ?>">
                                            <a class="page-link"
                                                href="?<?php echo http_build_query(array_merge($_GET, ['page' => $page - 1])); ?>"
                                                aria-label="Previous">
                                                <span aria-hidden="true">&lsaquo;</span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                        </li>
                                        <?php for ($i = max(1, $page - 2); $i <= min($total_pages, $page + 2); $i++) : ?>
                                        <li class="page-item <?php echo ($page == $i) ? 'active' : ''; ?>">
                                            <a class="page-link"
                                                href="?<?php echo http_build_query(array_merge($_GET, ['page' => $i])); ?>"><?php echo $i; ?></a>
                                        </li>
                                        <?php endfor; ?>
                                        <li class="page-item <?php echo ($page == $total_pages) ? 'disabled' : ''; ?>">
                                            <a class="page-link"
                                                href="?<?php echo http_build_query(array_merge($_GET, ['page' => $page + 1])); ?>"
                                                aria-label="Next">
                                                <span aria-hidden="true">&rsaquo;</span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </li>
                                        <li class="page-item <?php echo ($page == $total_pages) ? 'disabled' : ''; ?>">
                                            <a class="page-link"
                                                href="?<?php echo http_build_query(array_merge($_GET, ['page' => $total_pages])); ?>"
                                                aria-label="Last">
                                                <span aria-hidden="true">&raquo;</span>
                                                <span class="sr-only">Last</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                                <?php endif; ?>

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
        <!-- this page js -->
        <script src="assets/extra-libs/multicheck/datatable-checkbox-init.js"></script>
        <script src="assets/extra-libs/multicheck/jquery.multicheck.js"></script>
        <script src="assets/extra-libs/DataTables/datatables.min.js"></script>
        <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $('#zero_config').DataTable();
        </script>

</body>

</html>