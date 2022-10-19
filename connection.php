<?php
$Connect = pg_connect("postgres://ivwufnuxemonov:c940d25d60efad6fdf4497d72d4f9ea3a3835f6c02d270282b0ed8ba526e2e0a@ec2-52-207-15-147.compute-1.amazonaws.com:5432/d576ln3hnra3q8");	
if (!$Connect) {
    die("Connection failed");
}
?>