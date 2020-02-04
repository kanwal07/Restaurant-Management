<?php
include_once 'dbconfig.php';
include_once 'menuCRUD.Class.php';
include_once 'bootstrap.php';
include_once 'navbarmenuCRUD.php';
try {
    $connection = new PDO("mysql:host = $host; dbname=$dbname",$username,$password);

?>


<html>
<link rel="stylesheet" type="text/css" href="style.css"/>
<body>
	<div class="container">
    	<form id='menu' action='' method='post' class="needs-validation">
            <fieldset >
    	        <legend>Dishes</legend>
            		<div class="form-group">
                    	<label for='dishId' >Dish Id:</label>
                    	<input type='text' class="form-control" name='dishId' id='dishId'  maxlength="50" />
                	</div>
                	<div class="form-group">
                		<label for='name' >Name:</label>
                		<input type='text' class="form-control" name='name' id='name' maxlength="50" />
                	</div>
                	<div class="form-group">
                		<label for='description' >Description:</label>
                		<input type='text' class="form-control" name='description' id='description' maxlength="50" />
                	</div>
                	<div class="form-group">
                    	<label for='price' >Price:</label>
                    	<input type='text' class="form-control" name='price' id='price' maxlength="50" />
                	</div>
                	<div class="form-group">
                		<label for='image' >Image:</label>
                		<input type='file' class="form-control" name='image' id='image' maxlength="50" />
                	</div>
                	<input type='submit' name='Add' value='Add' id = "Add" class="btn btn-success"/>
                	<input type='submit' name='Update' value='Update' id="Update" class="btn btn-success"/>
                	<input type='submit' name='Delete' value='Delete' id="Delete" class="btn btn-success"/>
            		<input type='submit' name='Display' value='Display' id="Display" class="btn btn-success"/>
            
            </fieldset>
            </form>
       </div>

<?php 
if(isset($_POST['dishId']))
{
    $dishId = $_POST['dishId'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    
    /*INSERT*/
    if(isset($_POST['Add']))
    {
        
        ?>
        <script>
			$('#Add').click(function(){
				$("input").prop('required',true);
				$('#menu').addClass('needs-validation');
				});
        </script>
        <?php 
        
        $dish1 = new Dishes($dishId,$name,$description,$price,$image);
        
        $result1 = $dish1->create($connection);
        
        if($result1 == true)
        {
            ?>
        <div class="alert alert-success alert-dismissible fade show">
  			<button type="button" class="close" data-dismiss="alert">&times;</button>
  			<strong>Success!</strong> Dish added successfully.
		</div>
        <?php 
        }
        else
        {
            ?>
        <div class="alert alert-danger alert-dismissible fade show">
  			<button type="button" class="close" data-dismiss="alert">&times;</button>
  			<strong>Something went Wrong!</strong> Please try again.
		</div>
        <?php 
        }
        
    }
    
    
    
    
    /*UPDATE*/
    if(isset($_POST['Update']))
    {
        ?>
        <script>
        $('#Update').click(function(){
        	$("input").prop('required',true);
			$('#menu').addClass('needs-validation');
        });
            </script>
            <?php
        
        $dish2 = new Dishes();
        $dish2->setDishId($dishId);
        $dish2->setName($name);
        $dish2->setDescription($description);
        $dish2->setPrice($price);
        $dish2->setImage($image);
        
        $result2= $dish2->update($connection);
        
        if($result2 == true)
        {
            ?>
        <div class="alert alert-success alert-dismissible fade show">
  			<button type="button" class="close" data-dismiss="alert">&times;</button>
  			<strong>Success!</strong> Dish updated successfully.
		</div>
        <?php 
            
        }
        else
        {
            ?>
        <div class="alert alert-danger alert-dismissible fade show">
  			<button type="button" class="close" data-dismiss="alert">&times;</button>
  			<strong>Something went Wrong!</strong> Please try again.
		</div>
        <?php 
        }
        
    }
    
    
    
    /*DELETE*/
    
    if(isset($_POST['Delete']))
    {
        $dish3=new Dishes();
        
        $dish3->setDishId($dishId);
        $result3=$dish3->delete($connection);
        
        if($result3 == true)
        {
            ?>
        <div class="alert alert-success alert-dismissible fade show">
  			<button type="button" class="close" data-dismiss="alert">&times;</button>
  			<strong>Success!</strong> Dish deleted successfully.
		</div>
        <?php 
            
        }
        else
        {
            ?>
        <div class="alert alert-danger alert-dismissible fade show">
  			<button type="button" class="close" data-dismiss="alert">&times;</button>
  			<strong>Something went Wrong!</strong> Please try again.
		</div>
        <?php 
        }
        
    }
    
    /*DISPLAY*/
    
   if(isset($_POST['Display']))
    {
        $dish4= new Dishes();
        $listOfDishes = $dish4->getAllDishes($connection);
        $dish4->displayAllDishes($listOfDishes);
        
    }
    
}

}

catch(Exception $exception) {
    $error = $connection.Error[2];
    echo $error;
}


?>

</body>
</html>
