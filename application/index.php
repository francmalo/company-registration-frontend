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

                    <div class="row">
                        <div class="col-sm-12">

                            <p class="text-muted font-13 m-b-30">
                                <small></small>
                            </p>



                            <form id="myform" class="form-horizontal form-label-top" enctype="multipart/form-data"
                                method="post" action="claude.php">

                                <div class="col-md-7">

                                    <div class="x_panel">
                                        <div class="x_title">
                                            <h2>Contact-Person-info</h2>

                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="x_content">
                                            <br />

                                            <div class="row">
                                                <div class="col-md-12 col-sm-12  " style="border-right1:solid 1px">
                                                    <div class="form-group row">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Full
                                                            Name
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
                                                        <label
                                                            class="control-label col-md-3 col-sm-3 col-xs-3">Address:</label>
                                                        <div class="col-md-9 col-sm-9 col-xs-9">
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="address" value="" />
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Mobile
                                                            :</label>
                                                        <div class="col-md-9 col-sm-9 col-xs-9">
                                                            <input type="number" class="form-control form-control-sm"
                                                                name="mobile" placeholder="" />

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
                                                <i>The minimum number of names that you can add is 3 and the maximum is
                                                    5.
                                                    Be keen to add the names in the order of priority since the
                                                    registrar
                                                    will approve the first available name. The names may be rejected if
                                                    it
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

                                                </div>



                                            </div>




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
                                                <label class="control-label col-md-3 col-sm-3 col-xs-3">Business
                                                    Activities <span class="text-danger">*</span>:</label>
                                                <div class="col-md-9 col-sm-9 col-xs-9">
                                                    <textarea class="form-control form-control-sm"
                                                        name="business_activities" rows="3"
                                                        placeholder="Provide the main business activities of the company"
                                                        required></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-3">Number of
                                                    Employees <span class="text-danger">*</span>:</label>
                                                <div class="col-md-9 col-sm-9 col-xs-9">
                                                    <input type="number" class="form-control form-control-sm"
                                                        name="num_employees" placeholder="Enter the number of employees"
                                                        required>
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
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-3">County
                                                            <span class="text-danger">*</span>:</label>
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
                                                        <label
                                                            class="control-label col-md-3 col-sm-3 col-xs-3">Floor/Room
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
                                                                name="application_postal_address" placeholder="" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Email
                                                            Address <span class="text-danger">*</span>:</label>
                                                        <div class="col-md-9 col-sm-9 col-xs-9">
                                                            <input type="email" class="form-control form-control-sm"
                                                                name="application_email" placeholder="" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Phone
                                                            Number
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

                                    <span id="shareholder-director-container">

                                    </span>
                                    <!-- end of panel -->



                                    <div class="form-group row">
                                        <div class="col-md-9 col-sm-9 col-xs-9 col-md-offset-3">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </div>




                            </form>




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
    <script>
    function add_shareholder_row(count = 0) {
        var mybutton = '';
        if (count == 0) {
            mybutton += '<button type="button" name="add_more" id="add_more" class="btn btn-success btn-xs">+</button>';
        } else {
            mybutton += '<button type="button" name="remove" id="' + count +
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
        html += '<label class="control-label col-md-3 col-sm-3 col-xs-3">Person Type';
        html += '<span class="text-danger">*</span>:</label>';
        html += '<div class="col-md-9 col-sm-9 col-xs-9">';
        html += '<div class="radio">';
        html += '<label>';
        html += '<input type="radio" name="person_type_' + count + '[]" value="shareholder"> Shareholder';
        html += '</label>';
        html += '<label>';
        html += '<input type="radio" name="person_type_' + count + '[]" value="director"> Director';
        html += '</label>';
        html += '</div>';
        html += '</div>';
        html += '</div>';
        html += '<div class="form-group row">';
        html +=
            '<label class="control-label col-md-3 col-sm-3 col-xs-3">Name <span class="text-danger">*</span>:</label> ';

        html += '<div class="col-md-9 col-sm-9 col-xs-9">';
        html += '<input type="text" class="form-control form-control-sm" name="name[]" placeholder="" required>';
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
        html += '  <label class="control-label col-md-3 col-sm-3 col-xs-3">National ID';
        html += '<span class="text-danger">*</span>:</label>';
        html += '  <div class="col-md-9 col-sm-9 col-xs-9">';
        html +=
            '  <input type="file" class="form-control form-control-sm" name="national_id[]"  id="national_id" accept="image/*,application/pdf" required>';
        html += '  <small class="text-muted">Provide a copy of the National Identity Card.</small>';
        html += '  </div>';
        html += '</div>';
        html += '  <div class="form-group row">';
        html += '  <label class="control-label col-md-3 col-sm-3 col-xs-3">PIN Certificate';
        html += '<span class="text-danger">*</span>:</label>';
        html += '  <div class="col-md-9 col-sm-9 col-xs-9">';
        html +=
            '  <input type="file" class="form-control form-control-sm" name="pin_certificate[]"  id="pin_certificate" accept="image/*,application/pdf" required>';
        html += '<small class="text-muted">Provide a copy of the PIN certificate.</small>';
        html += '  </div>';
        html += '  </div>';
        html += '  <div class="form-group row">';
        html += '<label class="control-label col-md-3 col-sm-3 col-xs-3">Passport Photo';
        html += '  <span class="text-danger">*</span>:</label>';
        html += '  <div class="col-md-9 col-sm-9 col-xs-9">';
        html +=
            ' <input type="file" class="form-control form-control-sm" name="passport_photo[]"  id="passport_photo" accept="image/*" required>';
        html += '  <small class="text-muted">Provide one passport photo.</small>';
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
        html += '  <label class="control-label col-md-3 col-sm-3 col-xs-3">Phone Number';
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
        html += '<input type="email" class="form-control form-control-sm" name="email[]" placeholder="" required>';
        html += '  </div>';
        html += '  </div>';
        html += '  <div class="form-group row">';
        html += '<label class="control-label col-md-3 col-sm-3 col-xs-3">Number of Shares';
        html += '<span class="text-danger">*</span>:</label>';
        html += '<div class="col-md-9 col-sm-9 col-xs-9">';
        html +=
            '  <input type="number" class="form-control form-control-sm"   name="shares[]" placeholder="" required>';
        html += '<small class="text-muted">Enter the number of shares to be allocated to this person.</small>';
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



    // $(document).on('submit', '#myform', function(e) {
    //     e.preventDefault();
    //     var form_data = $(this).serialize();
    //     $.ajax({
    //         type: "post",
    //         url: "claude.php",
    //         data: form_data,
    //         dataType: "text",
    //         success: function(data) {

    //         }
    //     })
    // });
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


</body>

</html>