<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title> Shop Toy 369 </title>
   <link rel="stylesheet" href="style.css">
   <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</head>

<body style="background-color: #a59554">
  <?php
      session_start();
      include_once("connection.php");
      include_once("header.php")
  ?>
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
          elseif($page=="add_shop")
          {
          include_once("Add_Shop.php");
          }
          elseif($page=="campus_shop")
          {
          include_once("Campus_Shop.php");
          }
          elseif($page=="update_shop")
          {
          include_once("Update_Shop.php");
          }
          elseif($page == "search")
          {
            include_once("Search.php");
          }
          elseif($page=="supplier")
          {
          include_once("Supplier.php");
          }
          elseif($page=="add_supplier")
          {
          include_once("Add_Supplier.php");
          }
          elseif($page=="update_supplier")
          {
          include_once("Update_Supplier.php");
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
          include_once("Content.php");
          }

          include_once("footer.php")
        ?>
</body>
</html>