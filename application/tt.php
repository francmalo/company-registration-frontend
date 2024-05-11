<?php include 'includes/header.php'; 
$id=$_GET['id'];

if(isset($_POST['submit'])){
    $fullname = $_POST["fullname"];    
    $username = $_POST["username"];
    $dor = $_POST["dor"];
    $gender = $_POST["gender"];
    $services = $_POST["services"];
    $amount = $_POST["amount"];
    $plan = $_POST["plan"];
    $address = $_POST["address"];
    $contact = $_POST["contact"];
    $id = $_POST["id"];

    $totalamount = $amount * $plan;
    
    $sms ='';
    //code after connection is successfull
    //update query
    $qry = "update members set fullname='$fullname', username='$username',dor='$dor', gender='$gender', services='$services', amount='$totalamount', plan='$plan', address='$address', contact='$contact' where user_id='$id'";
    $result = mysqli_query($con,$qry); //query executes

    if(!$result){
        $sms = '<div class="alert alert-success">Member updated successfully</div>';
    }else{
        $sms = '<div class="alert alert-success">Whoops! An error occured</div>';
    }
}
?>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
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


                <?php 
                    $qry= "select * from members where user_id='$id'";
                    $result=mysqli_query($con,$qry);
                    
                     while($row=mysqli_fetch_array($result)){ 
                            ?>
                <div class="row">
                    <div class="col-md-6 col-sm-12  ">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Personal-info</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <br />
                                <form class="form-horizontal form-label-left">

                                    <div class="form-group row">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Full Name :</label>
                                        <div class="col-md-9 col-sm-9 col-xs-9">
                                            <input type="text" class="form-control" name="fullname"
                                                value='<?php echo $row['fullname']; ?>' />

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Username :</label>
                                        <div class="col-md-9 col-sm-9 col-xs-9">
                                            <input type="text" class="form-control" name="username"
                                                value='<?php echo $row['username']; ?>' />

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Password :</label>
                                        <div class="col-md-9 col-sm-9 col-xs-9">
                                            <input type="password" class="form-control" name="password" disabled=""
                                                placeholder="**********" />

                                            <i>Note: Only the members are allowed to change their password until and
                                                unless it's an emergency.</i>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Gender :</label>
                                        <div class="col-md-9 col-sm-9 col-xs-9">
                                            <select name="gender" required="required" id="select" class="form-control">
                                                <option value="">--select--</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                <option value="Other">Other</option>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-3">D.O.R</label>
                                        <div class="col-md-9 col-sm-9 col-xs-9">
                                            <input type="date" name="dor" class="form-control"
                                                value='<?php echo $row['dor']; ?>' />

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Plans:</label>
                                        <div class="col-md-9 col-sm-9 col-xs-9">
                                            <select name="plan" required="required" id="select" class="form-control">
                                                <option value="">--select--</option>


                                            </select>

                                        </div>
                                    </div>



                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12  ">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Service Details</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <br />


                                <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Services</label>
                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                        <input type="text" class="form-control">

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Total Amount</label>
                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                        <input type="number" value='<?php echo $row['amount']; ?>' name="amount"
                                            class="form-control">

                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <h2>Contact Details</h2>
                                <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Contact Number :</label>
                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                        <input type="number" id="mask-phone" name="contact"
                                            value='<?php echo $row['contact']; ?>' class="form-control">

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Address :</label>
                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                        <input type="text" class="form-control" name="address"
                                            value='<?php echo $row['address']; ?>' />

                                    </div>
                                </div>

                                <div class="ln_solid"></div>

                                <div class="form-group row">
                                    <div class="col-md-9 offset-md-3">
                                        <a href="members.php" class="btn btn-dark">Back</a>
                                        <button type="submit" name="submit" class="btn btn-success">Update</button>
                                    </div>
                                </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                <?php
                             } ?>


            </div>
        </div>

    </div>
</div>
<!-- /page content -->

<!-- footer content -->
<?php include 'includes/footer.php'; ?>

</body>

</html>