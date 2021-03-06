<?php include 'partials/header.php' ?>
<?php
if(!$this->session->userdata('loggedin')) {
    redirect('Home');

}

?>

<style media="screen">
#image{
    border-style:solid;
    border-width:5px;
    border-color:redrgb(198, 146, 153);
}
#f{
  font-weight: bold;
}
</style>

<script type="text/javascript">
    function validatenum(){
        var number=document.getElementById("t1").value;
        var len=number.length;
        var phcode=number.substr(0,3);
        if(number==""){
            document.getElementById("err").innerHTML="empty";
            document.getElementById("t1").style.borderColor="red";
        }

        <!--NaN = add numbers only-->
        else if(isNaN(number)){
            document.getElementById("err").innerHTML="numbers only";
            document.getElementById("t1").style.borderColor="red";
        }

        else if(number!=0 && len!=10){
            document.getElementById("err").innerHTML="number is not valid";
            document.getElementById("t1").style.borderColor="red";
        }




        else{
            document.getElementById("err").innerHTML="";
            document.getElementById("t1").style.borderColor="";
        }

    }
    function validatenum1(){
        var number=document.getElementById("t2").value;
        var len=number.length;
        var phcode=number.substr(0,3);
        if(number==""){
            document.getElementById("err2").innerHTML="empty";
            document.getElementById("t2").style.borderColor="red";
        }

        <!--NaN = add numbers only-->
        else if(isNaN(number)){
            document.getElementById("err2").innerHTML="numbers only";
            document.getElementById("t2").style.borderColor="red";
        }

        else if(number!=0 && len!=10){
            document.getElementById("err2").innerHTML="number is not valid";
            document.getElementById("t2").style.borderColor="red";
        }

        else{
            document.getElementById("err2").innerHTML="";
            document.getElementById("t2").style.borderColor="";
        }

    }

    function confirmPwd() {
        var pwddd = document.getElementById("pwdd").value;
        var cpwddd = document.getElementById("cpwdd").value;

        if (pwddd != cpwddd) {
            document.getElementById("confm").innerHTML = "password not matched";
            document.getElementById("cpwdd").style.borderColor = "red";
        } else  {
            document.getElementById("cpwdd").style.borderColor = "";
            document.getElementById("confm").innerHTML = "";
        }

    }
    function confirmPwd1() {
        var pwddd = document.getElementById("pwdd1").value;
        var cpwddd = document.getElementById("cpwdd1").value;

        if (pwddd != cpwddd) {
            document.getElementById("confm1").innerHTML = "password not matched";
            document.getElementById("cpwdd1").style.borderColor = "red";
        } else  {
            document.getElementById("cpwdd1").style.borderColor = "";
            document.getElementById("confm1").innerHTML = "";
        }

    }



</script>


<div class="container-fluid" >

    <h2>Employee Profiles</h2>
    <?php if($this->session->flashdata('success8')){?>
      <div class="alert alert-success" role="alert">
        <?php echo $this->session->flashdata('success8'); ?>
      </div>
    <?php } ?>

    <ul class="nav nav-tabs">
        <li class="active"><a href="#Admin">View Profiles</a></li>
        <li><a href="#SalesEmployee">Update Profiles</a></li>
        <li><a href="#Delete">Delete Profiles</a></li>

    </ul>

    <div class="tab-content">
        <div id="Admin" class="tab-pane fade in active">

                <h2>View Profiles</h2>
                <div class="row">
                  <form action = "<?php echo site_url('Viewemployee/viewempprof');?>" method = "POST">

                    <div class="col-md-6">
                      <div class="form-group">
                          <label for="pwd">Employee ID</label>
                          <input type="text" class="form-control" placeholder="Employee ID" name = "empid" required>
                      </div>

                      <input type="submit"  class="btn btn-primary" name="search" value="Search">

                    </div>

                    <div class="col-md-6">



                    </div>
                </form>

                </div>
                <br>
                <br>
                <div class="row">
                  <div class="col-md-6" id="f">
                    <?php if (isset($results2)){?>
                    <?php foreach($results2 as $row1){?>

                    <div class="col-sm-5 col-xs-6 tital " >NIC Number:</div><div class="col-sm-7 col-xs-6 "><?php echo $row1['NIC'];?></div>
                    <div class="clearfix"></div>
                    <div class="bot-border"></div>
                    <br>

                    <div class="col-sm-5 col-xs-6 tital " >First Name:</div><div class="col-sm-7 col-xs-6 "><?php echo $row1['FirstName'];?></div>
                    <div class="clearfix"></div>
                    <div class="bot-border"></div>
                    <br>

                    <div class="col-sm-5 col-xs-6 tital " >Last Name:</div><div class="col-sm-7 col-xs-6 "><?php echo $row1['LastName'];?></div>
                    <div class="clearfix"></div>
                    <div class="bot-border"></div>
                    <br>

                    <div class="col-sm-5 col-xs-6 tital " >Address:</div><div class="col-sm-7 col-xs-6 "><?php echo $row1['AddressL1'];?></div>
                    <div class="clearfix"></div>
                    <div class="bot-border"></div>
                    <br>

                    <div class="col-sm-5 col-xs-6 tital " >Gender:</div><div class="col-sm-7 col-xs-6 "><?php echo $row1['Gender'];?></div>
                    <div class="clearfix"></div>
                    <div class="bot-border"></div>
                    <br>

                    <div class="col-sm-5 col-xs-6 tital " >Registration Date:</div><div class="col-sm-7 col-xs-6 "><?php echo $row1['Date'];?></div>
                    <div class="clearfix"></div>
                    <div class="bot-border"></div>
                    <br>
                    <?php }?>
                    <?php }?>
                    <?php if (isset($results1)){?>
                    <?php foreach($results1 as $row){?>
                    <div class="col-sm-5 col-xs-6 tital " >Employee ID:</div><div class="col-sm-7 col-xs-6 "><?php echo $row['EmpID'];?></div>
                    <div class="clearfix"></div>
                    <div class="bot-border"></div>
                    <br>

                    <div class="col-sm-5 col-xs-6 tital " >Availability:</div><div class="col-sm-7 col-xs-6 "><?php echo $row['Availability'];?></div>
                    <div class="clearfix"></div>
                    <div class="bot-border"></div>
                    <br>

                    <div class="col-sm-5 col-xs-6 tital " >Vehicle Number:</div><div class="col-sm-7 col-xs-6 "><?php echo $row['VehicleNo'];?></div>
                    <div class="clearfix"></div>
                    <div class="bot-border"></div>
                    <br>

                    <div class="col-sm-5 col-xs-6 tital " >Allocated Manager ID:</div><div class="col-sm-7 col-xs-6 "><?php echo $row['ManagerID'];?></div>
                    <div class="clearfix"></div>
                    <div class="bot-border"></div>
                    <br>
                    <?php }?>
                    <?php }?>
                    <?php if (isset($results3)){?>
                    <?php foreach($results3 as $row2){?>
                    <div class="col-sm-5 col-xs-6 tital " >Phone Number:</div><div class="col-sm-7 col-xs-6 "><?php echo $row2['Number'];?></div>
                    <div class="clearfix"></div>
                    <div class="bot-border"></div>
                    <br>
                    <?php }?>
                    <?php }?>
                    <?php if (isset($results4)){?>
                    <?php foreach($results4 as $row3){?>
                    <div class="col-sm-5 col-xs-6 tital " >Username:</div><div class="col-sm-7 col-xs-6 "><?php echo $row3['Username'];?></div>
                    <div class="clearfix"></div>
                    <div class="bot-border"></div>
                    <br>

                    <div class="col-sm-5 col-xs-6 tital " >Password:</div><div class="col-sm-7 col-xs-6 "><?php echo $row3['Password'];?></div>
                    <div class="clearfix"></div>
                    <div class="bot-border"></div>
                    <br>
                    <?php }?>
                    <?php }?>





                  </div>
                  <div class="col-md-6">
                    <?php if (isset($results2)){?>
                    <?php foreach($results2 as $row1){?>
                    <img src="../../assets/img/employee/<?php echo $row1['Picture'];?>" alt="" id="image">
                    <?php }?>
                    <?php }?>

                  </div>




                </div>


        </div>
        <div id="SalesEmployee" class="tab-pane fade">
            <h2>Update Profiles</h2>



            <form action = "<?php echo site_url('Viewemployee/updateemployee');?>" method = "POST">

                <div class="form-group">
                    <label for="usr">First Name</label>
                    <input type="text" class="form-control" name="fname" required>
                </div>

                <div class="form-group">
                    <label for="usr">Last Name</label>
                    <input type="text" class="form-control" name="lname" required>
                </div>

                <div class="form-group">
                    <label for="pwd">Gender</label>
                    <select class = "form-control" name="gender">
                        <option value="Male" name="Male">Male</option>
                        <option value="Female" name = "Female">Female</option>
                        <option value="Other" name = "Other">Other</option>

                    </select>
                </div>

                <div class="form-group">
                    <label for="usr">NIC</label>
                    <input type="text" class="form-control" name = "nic" required>
                </div>

                <div class="form-group">
                    <label for="usr">Address</label>
                    <input type="text" class="form-control" name = "address" required>
                </div>

                <div class="form-group">
                    <label for="usr">Employee ID</label>
                    <input type="text" class="form-control" name="empid" required>
                </div>

                <div class="form-group">
                    <label for="pwd">Manager ID</label>
                    <input type="text" class="form-control" name="managerid" required>
                </div>

                <div class="form-group">
                    <label for="pwd">Contact NO</label>
                    <input type="text" class="form-control" id ="t2" name = "contact" required onkeyup="validatenum1()">
                    <span id="err2" Style="color:red"></span>
                </div>

                <div class="form-group">
                    <label for="pwd">Registration Date</label>
                    <input type="date" class="form-control" name = "date" required>
                </div>

                <div class="form-group">
                    <label for="pwd">Vehicle No</label>
                    <input type="text" class="form-control" name = "vehicleno" required>
                </div>

                <div class="form-group">
                    <label for="pwd">Availablity</label>
                    <select class = "form-control" name="availability">
                        <option value="Engaged" name="Engaged">Engaged</option>
                        <option value="Available" name = "Available">Available</option required>

                    </select>
                </div>

                <input type="hidden" value="1" class="form-control"   name = "type" required >

                <div class="form-group">
                    <label for="pwd">Username</label>
                    <input type="text" class="form-control" name="username" required>
                </div>

                <div class="form-group">
                    <label for="pwd">Password</label>
                    <input type="password" class="form-control" name="password" required id = "pwdd1">
                </div>

                <div class="form-group">
                    <label for="pwd">Confirm Password</label>
                    <input type="password" class="form-control" required id = "cpwdd1" onkeyup="confirmPwd1()">
                    <span id="confm1" Style="color:red"></span>
                </div>

                </br>
                <input type="submit"  class="btn btn-primary" name="submit2" value="Update">
            </form>
        </div>

        <div id="Delete" class="tab-pane fade">

                <h2>Delete Profiles</h2>
                <div class="row">
                  <form action = "<?php echo site_url('Viewemployee/deleteempprof');?>" method = "POST">

                    <div class="col-md-6">
                      <div class="form-group">
                          <label for="pwd">NIC Of The Employee</label>
                          <input type="text" class="form-control" placeholder="NIC" name = "nic" required>
                      </div>

                      <input type="submit"  class="btn btn-primary" name="delete" value="Delete">

                    </div>


                </form>

                </div>

        </div>



    </div>
</div>

<script>
    $(document).ready(function(){
        $(".nav-tabs a").click(function(){
            $(this).tab('show');
        });
    });
</script>


<?php include 'partials/footer.php' ?>
