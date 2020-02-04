<?php 
include_once 'dbconfig.php';
include_once 'mainMenu.Class.php';
include_once 'footer.php';
include_once 'navbarMainMenu.php';
include_once 'bootstrap.php';
include_once 'order.Class.php';
try {
    $connection = new PDO("mysql:host = $host; dbname=$dbname",$username,$password);
    
?>

<html>
<head></head>
<title>Main Menu</title>
<link rel="stylesheet" type="text/css" href="style.css"/>
<body>
<?php 
$dishes = new menuDishes();
$listOfDishes = $dishes->getAllDishes($connection);
$counter = 0;
$counterId = 0;
?>
	<div class="container">
		
		<div class="" style="text-align: center">
		<div style="margin-top:10px;">
		<label>Enter your Table Number: </label>
		<input type="text" id="tableNumber" name="tableNumber"/>
		<button type="submit" name="placeOrder" class="btn btn-success" data-toggle="modal" data-target="#myModal">Place Order</button>
		</div>
		<form method="post">  	
		
			<?php 
			
			foreach($listOfDishes as $oneDish)
			{
			?>
			
			<div class="insideDish" style="border: 1px solid black; margin:20px;padding: 20px; display:inline-block; ">
				<table>
				<tr><th><?php echo $oneDish->getDishName();?></th></tr>
				<tr><td><input type="hidden" name="dishId" value="<?php echo $oneDish->getDishID();?>"></td></tr>
				<tr><td><input type="hidden" name="orderId" value='<?php echo $counter++;?>'></td></tr>
				<tr><td><img style="height:200px;width:200px;" src='./Images/DishImages/<?php echo $oneDish->getImage();?>'/></td></tr>
				<tr><td><?php echo $oneDish->getDescription();?></td></tr>
				<tr><td>$<input type="text" value='<?php echo $oneDish->getPrice();?>' readOnly /></td></tr>
				<tr><td>Quantity: 
					<select name="quantity">
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
					</select>
				</td></tr>
				<tr><td><input type="button" name="Add" value="Add" class="btn btn-info" id="add"/></td></tr>
				<tr><td><input type="button" name="Remove" value="Remove" class="btn btn-danger" id="remove"/></td></tr>
				</table>
			</div>
			<?php }?>
	</form>  	
		</div>
		
	</div>
	        <script>
			
    		$("#add").click(function(){   	
    			$('#add').removeClass('btn-info');
    			$('#add').addClass('btn-success');
    			$('#remove').removeClass('btn-success');
    			$('#remove').addClass('btn-danger');
            });

    		$('#remove').click(function(){
            	
    			$('#remove').removeClass('btn-danger');
    			$('#remove').addClass('btn-success');
    			$('#add').addClass('btn-info');
    			$('#add').removeClass('btn-success');
    			
            });
			
			
            </script>

	<?php 

	$orderId = $counter;
	//$tableNumber = $_POST['tableNumber'];
	//$dishId = $_POST['dishId'];
	//$price = $_POST['price'];
	//$quantity = $_POST['quantity'];
	for($i=0;$i<2;$i++)
	{
	if(isset($_POST['Add'.$i])){
	    
	    
		$script= "<script>myFunction();</script>";
		echo $script;
           
	    //$order = new Orders($orderId,$tableNumber,$dishId,$price,$quantity);
	    //$result1 = $order->create($connection);
	    //if($result1 == true)
	    //{
	     //   echo "dish added";
	   // }
	   // else {
	    //    echo "error";
	    //}
	}
	
	}
	if(isset($_POST['remove']))
	{
	    
            
	    $order = new Orders();
	    $order->setOrderId($orderId);
	    $result2 = $order->remove($connection);
	    if($result2 == true)
	    {
	        echo "delete";
	    }
	}
	
$price = 10;
$tax = 15;
$totalPrice = $price + ($price*$tax)/100;
	
}
catch(Exception $exception) {
    $error = $connection.Error[2];
    echo $error;
}

	?>
	<!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Your order</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          
          Item price: $ <?php echo $price."</br>";
          echo "Tax: ".$tax."%</br>";
          echo "Total Price: $".$totalPrice."</br>";
          
          ?>
          
          
          
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <a  class="btn btn-danger"  href="thankYouOrder.php">Close</a>
        </div>
        
      </div>
    </div>
  </div>
	
</body>
</html>