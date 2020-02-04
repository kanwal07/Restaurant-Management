<?php
include_once 'bootstrap.php';
include_once 'navbarHomepage.php';
?>
<html>
	<title>HomePage</title>
	
	<link rel="stylesheet" type="text/css" href="style.css">
 	
	
	<body style="overflow:hidden;">
	
				
<div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>

  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="Images/rest.jpg" alt="restaurant image 1" id="mainImage">
      <div class="carousel-caption lightGrey black">
        	<h3 class="display-3">BONNE APPETIT</h3>
        	<p>It's time for the good mood FOOD!</p>
      	</div>
    </div>
    <div class="carousel-item">
      <img src="Images/rest1.jpg" alt="restaurant image 2" id="mainImage">
        <div class="carousel-caption lightGrey black">
        	<h3 class="display-3">BONNE APPETIT</h3>
        	<p>Don't bother me I'm EATING!</p>
      	</div>
    </div>
    <div class="carousel-item">
      <img src="Images/rest2.jpg" alt="restaurant image 3" id="mainImage">
      <div class="carousel-caption lightGrey black">
        	<h3 class="display-3">BONNE APPETIT</h3>
        	<p>Always FRESH, Never frozen!</p>
      	</div>
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>

</div>
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
        
	</body>
</html>


<?php 
if(isset($_POST['orderNow']))
{
    header("Location:mainMenu.php");
}
if(isset($_POST['login']))
{
    header("Location:Login.php");
}
?>