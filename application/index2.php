<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Application</title>
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <link href="../build/css/custom.min.css" rel="stylesheet">
</head>

<body class="pl-3" style="background:white;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <div class="page-title">
                        <div class="title_left">
                            <h2>Update Member Details</h2>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="col-md-7">
                                <form class="form-horizontal form-label-top" enctype="multipart/form-data" method="post"
                                    action="process.php">
                                    <!-- Applicant Information -->
                                    <!-- ... -->

                                    <!-- Business Activities -->
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <h2>Business Activities</h2>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="x_content">
                                            <div class="form-group row">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-3">Business
                                                    Activities:</label>
                                                <div class="col-md-9 col-sm-9 col-xs-9">
                                                    <textarea class="form-control form-control-sm"
                                                        name="business_activities" rows="3" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Registered Office Addresses -->
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <h2>Registered Office Addresses</h2>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="x_content">
                                            <div>
                                                <i>Please fill in the registered office addresses.</i>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group row">
                                                        <label
                                                            class="control-label col-md-3 col-sm-3 col-xs-3">County:</label>
                                                        <div class="col-md-9 col-sm-9 col-xs-9">
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="county" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label
                                                            class="control-label col-md-3 col-sm-3 col-xs-3">District:</label>
                                                        <div class="col-md-9 col-sm-9 col-xs-9">
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="district" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label
                                                            class="control-label col-md-3 col-sm-3 col-xs-3">Locality:</label>
                                                        <div class="col-md-9 col-sm-9 col-xs-9">
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="locality" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label
                                                            class="control-label col-md-3 col-sm-3 col-xs-3">Building/Plot
                                                            No.:</label>
                                                        <div class="col-md-9 col-sm-9 col-xs-9">
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="building_plot" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label
                                                            class="control-label col-md-3 col-sm-3 col-xs-3">Floor/Room
                                                            No.:</label>
                                                        <div class="col-md-9 col-sm-9 col-xs-9">
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="floor_room" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Postal
                                                            Address:</label>
                                                        <div class="col-md-9 col-sm-9 col-xs-9">
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="postal_address" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Email
                                                            Address:</label>
                                                        <div class="col-md-9 col-sm-9 col-xs-9">
                                                            <input type="email" class="form-control form-control-sm"
                                                                name="registered_email" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Phone
                                                            Number:</label>
                                                        <div class="col-md-9 col-sm-9 col-xs-9">
                                                            <input type="tel" class="form-control form-control-sm"
                                                                name="registered_phone" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Shareholder/Director Information -->
                                    <div id="shareholder-director-container">
                                        <div class="x_panel">
                                            <div class="x_title">
                                                <h2>Shareholder/Director Information</h2>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="x_content">
                                                <div class="form-group row">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Person
                                                        Type:</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                                        <div class="radio">
                                                            <label>
                                                                <input type="radio" name="person_type[]"
                                                                    value="shareholder" required>
                                                                Shareholder
                                                            </label>
                                                            <label>
                                                                <input type="radio" name="person_type[]"
                                                                    value="director" required>
                                                                Director
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label
                                                        class="control-label col-md-3 col-sm-3 col-xs-3">Name:</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="name[]" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Postal
                                                        Address:</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="postal_address[]" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-3">National
                                                        ID:</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                                        <input type="file" class="form-control form-control-sm"
                                                            name="national_id[]" accept="image/*,application/pdf"
                                                            required>
                                                        <small class="text-muted">Provide a copy of the National
                                                            Identity Card.</small>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-3">PIN
                                                        Certificate:</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                                        <input type="file" class="form-control form-control-sm"
                                                            name="pin_certificate[]" accept="image/*,application/pdf"
                                                            required>
                                                        <small class="text-muted">Provide a copy of the PIN
                                                            certificate.</small>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Passport
                                                        Photo:</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                                        <input type="file" class="form-control form-control-sm"
                                                            name="passport_photo[]" accept="image/*" required>
                                                        <small class="text-muted">Provide one passport photo.</small>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Residential
                                                        Address:</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="residential_address[]"
                                                            placeholder="Plot Number, Estate, House Number, and Road"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Phone
                                                        Number:</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                                        <input type="tel" class="form-control form-control-sm"
                                                            name="phone_number[]" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Email
                                                        Address:</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                                        <input type="email" class="form-control form-control-sm"
                                                            name="email[]" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Number of
                                                        Shares:</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                                        <input type="number" class="form-control form-control-sm"
                                                            name="shares[]" required>
                                                        <small class="text-muted">Enter the number of shares to be
                                                            allocated to this person.</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-9 col-sm-9 col-xs-9 col-md-offset-3">
                                                    <button type="button" class="remove-panel">Remove</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end of panel -->
                                    <button type="button" id="add-shareholder-director">Add
                                        Shareholder/Director</button>


                                    <div class="form-group row">
                                        <div class="col-md-9 col-sm-9 col-xs-9 col-md-offset-3">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </form> <!-- End of form -->

                                <!-- footer content -->
                                <footer>
                                    <div class="pull-right">

                                    </div>
                                    <div class="clearfix"></div>
                                </footer>
                                <!-- /footer content -->
                            </div>
                        </div>
                        <!-- Include the Signature Pad library -->

                        <script>
                        const shareholderDirectorPanel = document.querySelector(
                            '#shareholder-director-container .x_panel');

                        document.getElementById('add-shareholder-director').addEventListener('click', function() {
                            const panelTemplate = shareholderDirectorPanel.cloneNode(true);
                            document.getElementById('shareholder-director-container').appendChild(
                            panelTemplate);
                        });

                        document.getElementById('shareholder-director-container').addEventListener('click', function(
                            event) {
                            if (event.target.classList.contains('remove-panel')) {
                                const panel = event.target.closest('.x_panel');
                                panel.remove();
                            }
                        });
                        </script>

                        <!-- jQuery -->
                        <script src="../vendors/jquery/dist/jquery.min.js"></script>
                        <!-- Bootstrap -->
                        <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
                        <!-- FastClick -->
                        <script src="../vendors/fastclick/lib/fastclick.js"></script>
                        <!-- NProgress -->
                        <script src="../vendors/nprogress/nprogress.js"></script>
                        <!-- jQuery Smart Wizard -->
                        <script src="../vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
                        <!-- Custom Theme Scripts -->
                        <script src="../build/js/custom.min.js"></script>


</body>

</html>