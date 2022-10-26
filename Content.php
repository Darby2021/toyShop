<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
<?php
include_once("connection.php");
?>
<div class="slider-area">
			<div class="block-slider block-slider4">
         <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="image/lu.jpg" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block"></div>
            </div>  
                <h5></h5>
                <p></p>
              </div>
            </div>
			</div>
    </div> 
    <div class="maincontent-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">
                        <h2 class="section-title">Product</h2>
                        <div class="product-carousel">
                           <?php
		  				   	           $result = pg_query($Connect, "SELECT * FROM product" );
			                      if (!$result) {
                                die('Invalid query: ' . "Could not is connect");
                                }
			                      while($row = pg_fetch_array($result)){
				                      ?>
                            <div class="col-md-4" >
                            <div class="card" style="text-align:center;">
                                <img src="imgProduct/<?=$row['pro_image']?>"class="card-img-top" style="" width="200"height="200"/>
                                <a href="#" class="text-decoration-none"> <h5 class="card-title"><?=$row['product_name']?></h5></a>
                                <h6 class="card-subtitle mb-2 text-muted"><span>&#8363;</span><?=$row['price']?></h6>
                                <a href="#" class="btn btn-primary">Buy</a>
                            </div>
                            <br>
                            </div>        
                         </div>
                         <?php   
				                  }
				                  ?>
                        </div>
                        
                </div>
            </div>
        </div>
        </div>
        </div>
    
    
    
   
  