<nav class="navbar navbar-light bg-light fixed-top">
    <div class="container-fluid" >
    <a class="navbar-brand" href="index.php" ><alt="" width="40" height="40"><span class="text-warning">ShopToy369</span></a>
  
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
            <a class="nav-link active" href="?page=product_management">Product</a>
            <a class="nav-link active" href="?page=category_management">Category</a>
            <a class="nav-link active" href="?page=campus_shop">Campus_Shop</a>
            <a class="nav-link active" href="?page=supplier">Supplier</a>
            <div class="container-fluid">
         </div>
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
             <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <div id="user-btn" class="fas fa-user"></div>
            <form class="d-flex" action="?page=search" method="POST">
              <input class="form-control me-2" type="search" placeholder="Search" name="txtSearch" aria-label="Search">
              <button class="btn btn-outline-success" name="btnsearch" type="submit">Search</button>
            </form>
            
         </div>
        </ul>
        </div>
      </div>
    </div>
  </nav