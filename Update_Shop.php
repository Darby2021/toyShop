     <!-- Bootstrap -->
     <link rel="stylesheet" type="text/css" href="style.css" />
     <meta charset="utf-8" />
     <link rel="stylesheet" href="css/bootstrap.min.css">
     <?php
		include_once("connection.php");
		if (isset($_GET["id"])) {
			$id = $_GET["id"];
			$result = pg_query($Connect, "SELECT * FROM shop WHERE shop_id = '$id'");
			$row = pg_fetch_array($result);
			$shop_id = $row["shop_id"];
			$shop_name = $row["shop_name"];
			$address_shop = $row["address_shop"];

		?>
     	<div class="container">
     		<h2>Updating Campus</h2>
     		<form id="form1" name="form1" method="post" action="" class="form-horizontal" role="form">
     			<div class="form-group">
     				<label for="txtTen" class="col-sm-2 control-label">Shop ID(*): </label>
     				<div class="col-sm-10">
     					<input type="text" name="txtID" id="txtID" class="form-control" placeholder="Shop ID" readonly value='<?php echo $shop_id; ?>'>
     				</div>
     			</div>
     			<div class="form-group">
     				<label for="txtTen" class="col-sm-2 control-label">Shop Name(*): </label>
     				<div class="col-sm-10">
     					<input type="text" name="txtName" id="txtName" class="form-control" placeholder="Shop Name" value='<?php echo $shop_name ?>'>
     				</div>
     			</div>

     			<div class="form-group">
     				<label for="txtMoTa" class="col-sm-2 control-label">Address(*): </label>
     				<div class="col-sm-10">
     					<input type="text" name="txtAddress" id="txtAddress" class="form-control" placeholder="Address" value='<?php echo $address_shop ?>'>
     				</div>
     			</div>

     			<div class="form-group">
     				<div class="col-sm-offset-2 col-sm-10">
     					<input type="submit" class="btn btn-primary" name="btnUpdate" id="btnUpdate" value="Update" />
     					<input type="button" class="btn btn-primary" name="btnIgnore" id="btnIgnore" value="Ignore" onclick="window.location='?page=campus_shop'" />

     				</div>
     			</div>
     		</form>
     	</div>
     	<?php
			if(isset($_POST["btnUpdate"])) {
				$id = $_POST["txtID"];
				$name = $_POST["txtName"];
				$addr = $_POST["txtAddress"];
				$err = "";
				if ($name == "") {
					$err . "<li>Enter Campus Name, please</li>";
				}
				if ($err != "") {
					echo "<ul>$err</ul>";
				} else {
					$sq = "SELECT * FROM shop WHERE shop_id != '$id' and shop_name = '$name'";
					$result = pg_query($Connect, $sq);
					if (pg_num_rows($result) == 0) {
						pg_query($Connect, "UPDATE shop SET shop_name = '$name', address_shop = '$addr' WHERE shop_id = '$id'");
						echo '<meta http-equiv="refresh" content = "0; URL=?page=campus_shop"/>';
					} else {
						echo "<li> Dulicate Campus Name</li>";
					}
				}
			}
			?>
     <?php
		} else {
			echo '<meta http-equiv="refresh" content = "0; URL=?page=campus_shop"/>';
		}
		?>