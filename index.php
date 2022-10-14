<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title> World of Technology </title>
   <link rel="stylesheet" href="style.css">
   <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>
<body style="background-color: #a59554;>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<?php
    session_start();
    include_once("connection.php");
?>
<nav class="navbar navbar-light bg-light fixed-top">
  <div class="container-fluid" >
  <a class="navbar-brand" href="index.php" ><alt="" width="40" height="40"><span class="text-warning">World of Technology</span></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           Management
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="?page=product_management">Product</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="?page=category_management">Caterory</a></li>
          </ul>
        </li>
        <?php
         if(isset($_SESSION['us']) && $_SESSION['us'] != ""){
         ?>
        <a class="nav-link" href="?page=update_customer">
        <li class="nav-item"></li>Hi, <?php echo $_SESSION['us']?></a>
        <a class="nav-link" href="?page=logout">
        <li class="nav-item"></li>Logout</a>
         <?php
        }
         else
        {
         ?>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="?page=login">Login</a>
        </li>
        <li class="nav-item">
         <a class="nav-link" href="?page=register">Register</a>
        </li>   
        <?php
         }
        ?>
      </ul>
      </div>
    </div>
  </div>
</nav>
<?php
    if(isset($_GET['page']))
        {
         $page = $_GET['page'];
        if($page=="register")
        {
        include_once("Register.php");
        }

        elseif($page=="login")
        {
        include_once("Login.php");
        }

        elseif($page=="category_management")
        {
        include_once("Category_Management.php");
        }

        elseif($page=="update_customer")
        {
        include_once("Update_customer.php");
        }

        elseif($page=="product_management")
        {
        include_once("Product_Management.php");
        }

        elseif($page=="add_category")
        {
        include_once("Add_Category.php");
        }

        elseif($page=="add_product")
        {
        include_once("Add_Product.php");
        }

        elseif($page=="update_category")
        {
        include_once("Update_Category.php");
        }

        elseif($page=="update_product") 
        {
        include_once("Update_Product.php");
        }
        
        elseif($page=="logout")
        {
        include_once("Logout.php");
        }
        }
        else
        {
        include("Content.php");
        }
      ?>
  <footer class="text-center text-white" style="background-color: #ffff;">
    <!-- Grid container -->
    <div class="container pt-4">
      <!-- Section: Social media -->
      <section class="mb-4">
        <!-- Facebook -->
        <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="bi bi-facebook"></i></a>

        <!-- Twitter -->
        <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="bi bi-twitter"></i></a>

        <!-- Google -->
        <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="bi bi-google"></i></a>

        <!-- Instagram -->
        <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="bi bi-instagram"></i></a>

        <!-- Linkedin -->
        <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="bi bi-linkedin"></i></a>
        <!-- Github -->
        <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="bi bi-github"></i></a>
      </section>
      <!-- Section: Social media -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center text-dark p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2020 Copyright:
      <a class="text-dark" href="index.php">World of Technology.com</a>
    </div>
  </footer>
</body>
</html>