     <!-- Bootstrap -->
     <link rel="stylesheet" type="text/css" href="style.css" />
     <meta charset="utf-8" />
     <link rel="stylesheet" href="css/bootstrap.min.css">
     <?php
		include_once("connection.php");
		if (isset($_GET["id"])) {
			$id = $_GET["id"];
			$result = pg_query($Connect, "SELECT * FROM supplier WHERE sup_id = '$id'");
			$row = pg_fetch_array($result);
			$sup_id = $row["sup_id"];
			$sup_name = $row["sup_name"];
			$address_sup = $row["address_sup"];
            $hostline = $row["hostline"];

		?>
     	<div class="container">
     		<h2>Updating Supplier</h2>
     		<form id="form1" name="form1" method="post" action="" class="form-horizontal" role="form">
     			<div class="form-group">
     				<label for="txtTen" class="col-sm-2 control-label">Supplier ID(*): </label>
     				<div class="col-sm-10">
     					<input type="text" name="txtID" id="txtID" class="form-control" placeholder="Supplier ID" readonly value='<?php echo $sup_id; ?>'>
     				</div>
     			</div>
     			<div class="form-group">
     				<label for="txtTen" class="col-sm-2 control-label">Supplier Name(*): </label>
     				<div class="col-sm-10">
     					<input type="text" name="txtName" id="txtName" class="form-control" placeholder="Supplier Name" value='<?php echo $sup_name ?>'>
     				</div>
     			</div>

     			<div class="form-group">
     				<label for="txtMoTa" class="col-sm-2 control-label">Address(*): </label>
     				<div class="col-sm-10">
     					<input type="text" name="txtAddress" id="txtAddress" class="form-control" placeholder="Address" value='<?php echo $address_sup ?>'>
     				</div>
     			</div>

                 <div class="form-group">
     				<label for="txtMoTa" class="col-sm-2 control-label">HostLine(*): </label>
     				<div class="col-sm-10">
     					<input type="text" name="txtHost" id="txtHost" class="form-control" placeholder="HostLine" value='<?php echo $hostline ?>'>
     				</div>
     			</div>

     			<div class="form-group">
     				<div class="col-sm-offset-2 col-sm-10">
     					<input type="submit" class="btn btn-primary" name="btnUpdate" id="btnUpdate" value="Update" />
     					<input type="button" class="btn btn-primary" name="btnIgnore" id="btnIgnore" value="Ignore" onclick="window.location='?page=supplier'" />

     				</div>
     			</div>
     		</form>
     	</div>
     	<?php
			if(isset($_POST["btnUpdate"])) {
				$id = $_POST["txtID"];
				$name = $_POST["txtName"];
				$address_sup = $_POST["txtAddress"];
                $hostline = $_POST["txtHost"];
				$err = "";
				if ($name == "") {
					$err . "<li>Enter Supplier Name, please</li>";
				}
				if ($err != "") {
					echo "<ul>$err</ul>";
				} else {
					$sq = "SELECT * FROM supplier WHERE sup_id != '$id' and sup_name = '$name'";
					$result = pg_query($Connect, $sq);
					if (pg_num_rows($result) == 0) {
						pg_query($Connect, "UPDATE supplier SET sup_name = '$name', hostline = '$hostline' WHERE sup_id = '$id'");
						echo '<meta http-equiv="refresh" content = "0; URL=?page=supplier"/>';
					} else {
						echo "<li>Duplicate Supplier Name</li>";
					}
				}
			}
			?>
     <?php
		} else {
			echo '<meta http-equiv="refresh" content = "0; URL=?page=supplier"/>';
		}
		?>