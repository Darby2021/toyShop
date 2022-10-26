     <!-- Bootstrap -->
     <link rel="stylesheet" type="text/css" href="style.css" />
     <meta charset="utf-8" />
     <link rel="stylesheet" href="css/bootstrap.min.css">

     <?php
		include_once("connection.php");
		if (isset($_POST["btnAdd"])) {
			$id = $_POST["txtID"];
			$name = $_POST["txtName"];
            $address = $_POST["txtAddress"];
			$host = $_POST["txtHost"];
			$err = "";
			if ($id == "") {
				$err .= "<li>Enter Supplier ID, please</li>";
			}
			if ($name == "") {
				$err .= "<li>Enter Supplier Name, please</li>";
			}
			if ($err != "") {
				echo "<li>$err</li>";
			} else {
				include_once("connection.php");
				$sq = "SELECT * FROM supplier where sup_id = '$id' or sup_name = '$name'";
				$result = pg_query($Connect, $sq);
				if (pg_num_rows($result) == 0) {
					pg_query($Connect, "INSERT INTO supplier (sup_id, sup_name, address_sup, hostline) VALUES ('$id', '$name', '$address','$host')");
					echo '<meta http-equiv="refresh" content = "0; URL=?page=supplier"/>';
				} else {
					echo "<li>Duplicate category ID or Name</li>";
				}
			}
		}
		?>

     <div class="container">
     	<h2>Adding Supplier</h2>
     	<form id="form1" name="form1" method="post" action="" class="form-horizontal" role="form">
     		<div class="form-group">
     			<label for="txtTen" class="col-sm-2 control-label">Supplier ID(*): </label>
     			<div class="col-sm-10">
     				<input type="text" name="txtID" id="txtID" class="form-control" placeholder="Supplier ID" value='<?php echo isset($_POST["txtID"]) ? ($_POST["txtID"]) : ""; ?>'>
     			</div>
     		</div>
     		<div class="form-group">
     			<label for="txtTen" class="col-sm-2 control-label">Supplier Name(*): </label>
     			<div class="col-sm-10">
     				<input type="text" name="txtName" id="txtName" class="form-control" placeholder="Supplier Name" value='<?php echo isset($_POST["txtName"]) ? ($_POST["txtName"]) : ""; ?>'>
     			</div>
     		</div>
			 <div class="form-group">
     			<label for="txtTen" class="col-sm-2 control-label">Address(*): </label>
     			<div class="col-sm-10">
     				<input type="text" name="txtAddress" id="txtAddress" class="form-control" placeholder="Address" value='<?php echo isset($_POST["txtAddress"]) ? ($_POST["txtAddress"]) : ""; ?>'>
     			</div>
     		</div>
     		<div class="form-group">
     			<label for="txtMoTa" class="col-sm-2 control-label">HostLine(*): </label>
     			<div class="col-sm-10">
     				<input type="text" name="txtHost" id="txtHost" class="form-control" placeholder="HostLine" value='<?php echo isset($_POST["txtHost"]) ? ($_POST["txtHost"]) : ""; ?>'>
     			</div>
     		</div>

     		<div class="form-group">
     			<div class="col-sm-offset-2 col-sm-10">
     				<input type="submit" class="btn btn-primary" name="btnAdd" id="btnAdd" value="Add new"meta http-equiv="refresh" content = "0; URL=?page=category_management" />
     				<input type="button" class="btn btn-primary" name="btnIgnore" id="btnIgnore" value="Ignore" onclick="window.location='?page=category_management'" />

     			</div>
     		</div>
     	</form>
     </div>