<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Application | </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">

</head>

<body class="pl-3" style="background:white;">
    <div class="container">
        <div class="row">




            <!-- page content -->
            <div class="col-md-12">
                <div>
                    <div class="page-title">
                        <div class="title_left">
                            <h2>Update Member Details</h2>
                        </div>

                        <div class="title_right">

                        </div>
                    </div>

                    <div class="clearfix"></div>
                    <?php echo $sms ?>
                    <div class="row">
                        <div class="col-sm-12">

                            <p class="text-muted font-13 m-b-30">
                                <small></small>
                            </p>



                            <div class="col-md-7">
                                <form class="form-horizontal form-label-top"></form>
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Applicant-info</h2>

                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <br />

                                        <div class="row">
                                            <div class="col-md-12 col-sm-12  " style="border-right1:solid 1px">
                                                <div class="form-group row">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Full Name
                                                        :</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="fullname" value='' />

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Email
                                                        :</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                                        <input type="email" class="form-control form-control-sm"
                                                            name="username" value='' />

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Address
                                                        :</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="username" value='' />

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Mobile
                                                        :</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                                        <input type="number" class="form-control form-control-sm"
                                                            name="password" placeholder="" />

                                                    </div>
                                                </div>


                                            </div>
                                            <div class="col-md-6 col-sm-12  ">

                                            </div>


                                        </div>



                                    </div>
                                </div>
                                <!-- end of panel -->


                                <!-- panel template -->
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Proposed Company Names</h2><br>


                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <div>
                                            <i>The minimum number of names that you can add is 3 and the maximum is 5.
                                                Be keen to add the names in the order of priority since the registrar
                                                will approve the first available name. The names may be rejected if it
                                                is too close to a name of an already-registered Kenyan business.</i>
                                        </div>
                                        <br />

                                        <div class="row">
                                            <div class="col-md-12 col-sm-12  " style="border-right1:solid 1px">

                                                <div class="form-group row">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Proposed
                                                        name 1 <span class="text-danger">*</span> :</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="name1" placeholder="" />

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Proposed
                                                        name 2 <span class="text-danger">*</span> :</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="name2" placeholder="" />

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Proposed
                                                        name 3 <span class="text-danger">*</span> :</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="name3" placeholder="" />

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Proposed
                                                        name 4 :</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="name4" placeholder="" />

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Proposed
                                                        name 5 :</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="name5" placeholder="" />

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Gender
                                                        :</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                                        <select name="gender" required="required" id="select"
                                                            class="form-control form-control-sm">
                                                            <option value="">--select--</option>

                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                            <option value="Other">Other</option>
                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label
                                                        class="control-label col-md-3 col-sm-3 col-xs-3">D.O.R</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                                        <input type="date" name="dor"
                                                            class="form-control form-control-sm" value='' />

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label
                                                        class="control-label col-md-3 col-sm-3 col-xs-3">Plans:</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                                        <select name="plan" required="required" id="select"
                                                            class="form-control form-control-sm">
                                                            <option value="">--select--</option>


                                                        </select>

                                                    </div>
                                                </div>
                                            </div>



                                        </div>
                                        </form>


                                    </div>
                                </div>
                                <!-- end of panel -->





                                <!-- panel template -->

                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Business Activities</h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <div class="form-group row">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Business Activities
                                                <span class="text-danger">*</span>:</label>
                                            <div class="col-md-9 col-sm-9 col-xs-9">
                                                <textarea class="form-control form-control-sm"
                                                    name="business_activities" rows="3"
                                                    placeholder="Provide the main business activities of the company"
                                                    required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end of panel -->

                                <!-- panel template -->
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Title </h2><br>

                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <div>
                                            <i>description or relevant info to help the user</i>
                                        </div>
                                        <br />

                                        <div class="row">
                                            <div class="col-md-12 col-sm-12  " style="border-right1:solid 1px">

                                                <div class="form-group row">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Proposed
                                                        name 1 <span class="text-danger">*</span> :</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="name1" placeholder="" />

                                                    </div>
                                                </div>
                                                <!-- more inputs -->


                                            </div>



                                        </div>



                                    </div>
                                </div>
                                <!-- end of panel -->



                                <!-- panel template -->
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Registered Office Addresses</h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <div>
                                            <i>Please fill in the registered office addresses.</i>
                                        </div>
                                        <br />
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <div class="form-group row">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-3">County <span
                                                            class="text-danger">*</span>:</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="county" placeholder="" />
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-3">District
                                                        <span class="text-danger">*</span>:</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="district" placeholder="" />
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Locality
                                                        <span class="text-danger">*</span>:</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="locality" placeholder="" />
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label
                                                        class="control-label col-md-3 col-sm-3 col-xs-3">Building/Plot
                                                        No. <span class="text-danger">*</span>:</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="building_plot" placeholder="" />
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Floor/Room
                                                        No. <span class="text-danger">*</span>:</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="floor_room" placeholder="" />
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Postal
                                                        Address <span class="text-danger">*</span>:</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="postal_address" placeholder="" />
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Email
                                                        Address <span class="text-danger">*</span>:</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                                        <input type="email" class="form-control form-control-sm"
                                                            name="email" placeholder="" />
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Phone Number
                                                        <span class="text-danger">*</span>:</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                                        <input type="tel" class="form-control form-control-sm"
                                                            name="phone" placeholder="" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- panel template -->
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Shareholder/Director Information</h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <div class="form-group row">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Person Type <span
                                                    class="text-danger">*</span>:</label>
                                            <div class="col-md-9 col-sm-9 col-xs-9">
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="person_type" value="shareholder">
                                                        Shareholder
                                                    </label>
                                                    <label>
                                                        <input type="radio" name="person_type" value="director">
                                                        Director
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Name <span
                                                    class="text-danger">*</span>:</label>
                                            <div class="col-md-9 col-sm-9 col-xs-9">
                                                <input type="text" class="form-control form-control-sm" name="name"
                                                    placeholder="" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Postal Address <span
                                                    class="text-danger">*</span>:</label>
                                            <div class="col-md-9 col-sm-9 col-xs-9">
                                                <input type="text" class="form-control form-control-sm"
                                                    name="postal_address" placeholder="" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-3">National ID <span
                                                    class="text-danger">*</span>:</label>
                                            <div class="col-md-9 col-sm-9 col-xs-9">
                                                <input type="file" class="form-control form-control-sm"
                                                    name="national_id" accept="image/*,application/pdf" required>
                                                <small class="text-muted">Provide a copy of the National Identity
                                                    Card.</small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-3">PIN Certificate
                                                <span class="text-danger">*</span>:</label>
                                            <div class="col-md-9 col-sm-9 col-xs-9">
                                                <input type="file" class="form-control form-control-sm"
                                                    name="pin_certificate" accept="image/*,application/pdf" required>
                                                <small class="text-muted">Provide a copy of the PIN certificate.</small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Passport Photo <span
                                                    class="text-danger">*</span>:</label>
                                            <div class="col-md-9 col-sm-9 col-xs-9">
                                                <input type="file" class="form-control form-control-sm"
                                                    name="passport_photo" accept="image/*" required>
                                                <small class="text-muted">Provide one passport photo.</small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Residential Address
                                                <span class="text-danger">*</span>:</label>
                                            <div class="col-md-9 col-sm-9 col-xs-9">
                                                <input type="text" class="form-control form-control-sm"
                                                    name="residential_address"
                                                    placeholder="Plot Number, Estate, House Number, and Road" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Phone Number <span
                                                    class="text-danger">*</span>:</label>
                                            <div class="col-md-9 col-sm-9 col-xs-9">
                                                <input type="tel" class="form-control form-control-sm"
                                                    name="phone_number" placeholder="" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Email Address <span
                                                    class="text-danger">*</span>:</label>
                                            <div class="col-md-9 col-sm-9 col-xs-9">
                                                <input type="email" class="form-control form-control-sm" name="email"
                                                    placeholder="" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Number of Shares
                                                <span class="text-danger">*</span>:</label>
                                            <div class="col-md-9 col-sm-9 col-xs-9">
                                                <input type="number" class="form-control form-control-sm" name="shares"
                                                    placeholder="" required>
                                                <small class="text-muted">Enter the number of shares to be allocated to
                                                    this person.</small>
                                            </div>
                                        </div>







                                        <div class="form-group row">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Signature <span
                                                    class="text-danger">*</span>:</label>
                                            <div class="col-md-9 col-sm-9 col-xs-9">
                                                <div id="signature-pad" style="width: 100%; height: 300px;"></div>
                                                <div class="signature-actions">
                                                    <button type="button" class="btn btn-sm btn-secondary"
                                                        id="clear-signature">Clear</button>
                                                    <button type="button" class="btn btn-sm btn-secondary"
                                                        id="undo-signature">Undo</button>
                                                </div>
                                                <input type="hidden" name="signature" id="signature-input">
                                            </div>
                                        </div>



                                    </div>
                                </div>
                                <!-- end of panel -->









                            </div>




                        </div>
                    </div>

                </div>
            </div>
            <!-- /page content -->

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