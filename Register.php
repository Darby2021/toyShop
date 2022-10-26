<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<meta charset="utf-8" />
<script src="js/jquery-3.2.0.min.js" />
</script>
<script src="js/jquery.dataTables.min.js" />
</script>
<script src="js/dataTables.bootstrap.min.js" />
</script>
<br>
	<br>
    <br>
<?php
if (isset($_POST['btnRegister'])) {
    $us = $_POST['txtUsername'];
    $pass1 = $_POST['txtPass1'];
    $pass2 = $_POST['txtPass2'];
    $fullname = $_POST['txtFullname'];
    $email = $_POST['txtEmail'];
    $address = $_POST['txtAddress'];
    $tel = $_POST['txtTel'];

    if (isset($_POST['grpRender'])) {
        $sex = $_POST['grpRender'];
    }

    $day = $_POST['slDay'];
    $month = $_POST['slMonth'];
    $year = $_POST['slYear'];

    $err = "";
    if ($us == "" || $pass1 == "" || $pass2 == "" || $fullname == "" || $email == "" || $address == "" || !isset($sex)) {
        $err .= "<li> Enter fileds with marks(*), please</li>";
    }
    if (strlen($pass1) <= 5) {
        $err .= "<li>Password must be greater than 5 chars</li>";
    }
    if ($pass1 != $pass2) {
        $err .= "<li> Password and confirm password are the same</li>";
    }
    if ($_POST['slYear'] == "0") {
        $err .= "<li> Choose Years of Birth, please</li>";
    }
    if ($err != "") {
        echo $err;
    } else {
        include_once("connection.php");
        $pass = md5($pass1);
        $sq = "select * from account where username = '$us' or email= '$email'";
        $res = pg_query($Connect, $sq);
        if (pg_num_rows($res) == 0) {
            pg_query($Connect, "INSERT INTO account (username, password, custname, gender, address, telephone, email, CusDay, CusMonth, CusYear, state)
                                    VALUES ('$us', '$pass', '$fullname', '$sex', '$address', '$tel', '$email', '$day', '$month', '$year', 0)")
                or die("Could not Connect");
            echo "You have registered successfully";
        } else {
            echo "Username or email already exists";
        }
    }
}
?>
<div class="container-fluid">
	<div class="row">
        <div class="col-lg-6">
        </div>  
        <div class="col-lg-12">
            <div class="container">
                <h2>Member Registration</h2>
                <form id="form1" name="form1" method="post" action="" class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="txtTen" class="col-sm-2 control-label">Username(*): </label>
                        <div class="col-sm-10">
                            <input type="text" name="txtUsername" id="txtUsername" class="form-control" placeholder="Username" value="" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Password(*): </label>
                        <div class="col-sm-10">
                            <input type="password" name="txtPass1" id="txtPass1" class="form-control" placeholder="Password" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Confirm_Password(*): </label>
                        <div class="col-sm-10">
                            <input type="password" name="txtPass2" id="txtPass2" class="form-control" placeholder="Confirm your Password" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="lblFullName" class="col-sm-2 control-label">Full_Name(*): </label>
                        <div class="col-sm-10">
                            <input type="text" name="txtFullname" id="txtFullname" value="" class="form-control" placeholder="Enter Fullname" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="lblEmail" class="col-sm-2 control-label">Email(*): </label>
                        <div class="col-sm-10">
                            <input type="text" name="txtEmail" id="txtEmail" value="" class="form-control" placeholder="Email" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="lblDiaChi" class="col-sm-2 control-label">Address(*): </label>
                        <div class="col-sm-10">
                            <input type="text" name="txtAddress" id="txtAddress" value="" class="form-control" placeholder="Address" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="lblDienThoai" class="col-sm-2 control-label">Telephone(*): </label>
                        <div class="col-sm-10">
                            <input type="text" name="txtTel" id="txtTel" value="" class="form-control" placeholder="Telephone" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="lblSex" class="col-sm-2 control-label">Gender(*): </label>
                        <div class="col-sm-10">
                            <label class="radio-inline"><input type="radio" name="grpRender" value="0" id="grpRender" />
                                Male</label>

                            <label class="radio-inline"><input type="radio" name="grpRender" value="1" id="grpRender" />

                                Female</label>

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lblBirthDay" class="col-sm-2 control-label">Date of Birth(*): </label>
                        <div class="col-sm-10 input-group">
                            <span class="input-group-btn">
                                <select name="slDate" id="slDate" class="form-control">
                                    <option value="0">Choose Date</option>
                                    <?php
                                    for ($i = 1; $i <= 31; $i++) {
                                        echo "<option value='" . $i . "'>" . $i . "</option>";
                                    }
                                    ?>
                                </select>
                            </span>
                            <span class="input-group-btn">
                                <select name="slMonth" id="slMonth" class="form-control">
                                    <option value="0">Choose Month</option>
                                    <?php
                                    for ($i = 1; $i <= 12; $i++) {
                                        echo "<option value='" . $i . "'>" . $i . "</option>";
                                    }

                                    ?>
                                </select>
                            </span>
                            <span class="input-group-btn">
                                <select name="slYear" id="slYear" class="form-control">
                                    <option value="0">Choose Year</option>
                                    <?php
                                    for ($i = 1970; $i <= 2020; $i++) {
                                        echo "<option value='" . $i . "'>" . $i . "</option>";
                                    }
                                    ?>
                                </select>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" class="btn btn-primary" name="btnRegister" id="btnRegister" value="Register" />
                        </div>
                    </div>
                </form>
            </div>
	</div>
</div>