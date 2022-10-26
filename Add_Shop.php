     <!-- Bootstrap -->
     <link rel="stylesheet" type="text/css" href="style.css" />
     <meta charset="utf-8" />
     <link rel="stylesheet" href="css/bootstrap.min.css">

     <?php
		include_once("connection.php");
		if (isset($_POST["btnAdd"])) {
			$id = $_POST["txtID"];
			$name = $_POST["txtName"];
			$addr = $_POST["txtAddress"];
			$err = "";
			if ($id == "") {
				$err .= "<li>Enter Shop ID, please</li>";
			}
			if ($name == "") {
				$err .= "<li>Enter Shop Name, please</li>";
			}
			if ($err != "") {
				echo "<li>$err</li>";
			} else {
				include_once("connection.php");
				$sq = "SELECT * FROM shop where shop_id = '$id' or shop_name = '$name'";
				$result = pg_query($Connect, $sq);
				if (pg_num_rows($result) == 0) {
					pg_query($Connect, "INSERT INTO shop (shop_id, shop_name, address_shop) VALUES ('$id', '$name', '$addr')");
					echo '<meta http-equiv="refresh" content = "0; URL=?page=campus_shop"/>';
				} else {
					echo "<li>Duplicate Shop ID or Name</li>";
				}
			}
		}
		?>

     <div class="container">
     	<h2>Adding Category</h2>
     	<form id="form1" name="form1" method="post" action="" class="form-horizontal" role="form">
     		<div class="form-group">
     			<label for="txtTen" class="col-sm-2 control-label">Shop ID(*): </label>
     			<div class="col-sm-10">
     				<input type="text" name="txtID" id="txtID" class="form-control" placeholder="Shop ID" value='<?php echo isset($_POST["txtID"]) ? ($_POST["txtID"]) : ""; ?>'>
     			</div>
     		</div>
     		<div class="form-group">
     			<label for="txtTen" class="col-sm-2 control-label">Shop Name(*): </label>
     			<div class="col-sm-10">
     				<input type="text" name="txtName" id="txtName" class="form-control" placeholder="Shop Name" value='<?php echo isset($_POST["txtName"]) ? ($_POST["txtName"]) : ""; ?>'>
     			</div>
     		</div>

     		<div class="form-group">
     			<label for="txtMoTa" class="col-sm-2 control-label">Address(*): </label>
     			<div class="col-sm-10">
     				<input type="text" name="txtAddress" id="txtAddress" class="form-control" placeholder="Address" value='<?php echo isset($_POST["txtAddress"]) ? ($_POST["txtAddress"]) : ""; ?>'>
     			</div>
     		</div>

     		<div class="form-group">
     			<div class="col-sm-offset-2 col-sm-10">
     				<input type="submit" class="btn btn-primary" name="btnAdd" id="btnAdd" value="Add new"meta http-equiv="refresh" content = "0; 'URL=?page=campus_shop'" />
     				<input type="button" class="btn btn-primary" name="btnIgnore" id="btnIgnore" value="Ignore" onclick="window.location='?page=campus_shop'" />
     			</div>
     		</div>
     	</form>
     </div>