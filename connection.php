<?php
$Connect = pg_connect("host=ec2-52-207-15-147.compute-1.amazonaws.com port=5432 dbname=d576ln3hnra3q8 user=ivwufnuxemonov password=c940d25d60efad6fdf4497d72d4f9ea3a3835f6c02d270282b0ed8ba526e2e0a");	
if (!$Connect) 
{
     die("Connection failed");
}
?>