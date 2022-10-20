<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-3"></div>
				<div class="col-lg-6">
				<div class="col-lg-6">
				<br>
				<br>
				<br>
				</div>
			<form id="form1" name="form1" method="POST" action="">
			<h1 align='midlle'>Login</h1>
				<div class="row" align='midlle'>
					<div class="form-group">
					<label for="txtUsername" class="col-sm-1 control-label" align='right'>Username(*): </label>
					<div class="col-sm-10">
						<input type="text" name="txtUsername" id="txtUsername" class="form-control" placeholder="Username" value="<?php if (isset($_POST['txtUsername'])) echo $_POST['txtUsername'] ?>" />
					</div>
					</div>
					<div class="form-group">
						<label for="txtPass" class="col-sm-1 control-label" align='right'>Password(*): </label>
						<div class="col-sm-10">
							<input type="password" name="txtPass" id="txtPass" class="form-control" placeholder="Password" value="" />
						</div>
					</div>
					<div class="form-group">
					<div class="col-sm-2"></div>
					<div class="col-sm-10">
						<input type="submit" name="btnLogin" class="btn btn-primary" id="btnLogin" value="Login" />
						<input type="submit" name="btnCancel" class="btn btn-primary" id="btnLogin" value="Cancel" />
						<a href="index.php?page=register" class="btn btn-success">Register</a>
					</div>
				</div>	
			</form>
		</div>
	</div>
</div>
<?php
if (isset($_POST['btnLogin'])) {
	$us = $_POST['txtUsername'];
	$pa = $_POST['txtPass'];

	$err = "";
	if ($us == "") {
		$err .= "Enter Username, please<br/>";
	}
	if ($pa == "") {
		$err .= "Enter Password, please<br/>";
	}
	if ($err != "") {
		echo $err;
	} else {
		include_once("connection.php");
		$pass = md5($pa);
		$res = pg_query($Connect, "SELECT username, password, state FROM account WHERE username = '$us' AND password = '$pass'")
		 or die("Could not connect");
		$row = pg_fetch_array($res);
		if (pg_num_rows($res) == 1) {
			$_SESSION["us"] = $us;
			$_SESSION["admin"] = $row["state"];
			echo '<meta http-equiv="refresh" content = "0; URL=index.php"/>';
		} else {
			echo "You loged in fail";
		}
	}
}
?>
</body>
</html>