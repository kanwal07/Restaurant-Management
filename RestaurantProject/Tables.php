<?php 
include_once 'dbconfig.php';
include_once 'bootstrap.php';
include_once 'navbarReserve.php';
//include_once 'footer.php';
?>

<html>
<link rel="stylesheet" type="text/css" href="style.css"/>
<body class="lightgrey">
	<div class="container">
	<img src="./Images/DishImages/reservation.jpg" style="width:100%; height:200px;"/>
    	<form id='menu' action='' method='post' style="border:1px dashed black; padding:15px; margin-top:5px;">
            <fieldset >
    	        <legend>Reserve Table</legend>
            		<div class="form-group">
                		<label for='name' >Customer Name:</label>
                		<input type='text' class="form-control" name='name' id='name' maxlength="50" />
                	</div>
            		<div class="form-group">
                    	<label for='dishId' >Table Type:</label>
                    	<select class="form-control">
                    		<option></option>
                    		<option>1</option>
                    		<option>2</option>
                    		<option>3</option>
                    		<option>4</option>
                    		<option>5</option>
                    	</select>
                	</div>
                	<div class="form-group">
                		<label for='description' >Date:</label>
                		<input type="date" name="date" class="form-control"/>
                	</div>
                	<div class="form-group">
                		<label for='description' >Time:</label>
                		<select class="form-control">
                		<option></option>
                			<option>11am</option>
                			<option>3pm</option>
                			<option>7pm</option>
                			<option>9pm</option>
                		</select>
                	</div>
                
                	<input type='button' name='save' value='Save' id = "save" class="btn btn-primary" data-toggle="modal" data-target="#myModal"/>
                
            </fieldset>
            </form>
       </div>
       <div class="container">
  
  

  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Table Reservation</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          Your table is reserved. 
          Reservation id: <p id="id"></p>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  
</div>


<script>
document.getElementById("id").innerHTML =
Math.floor(Math.random() * 100) + 1;
</script>

</body>
<!-- 
<script>
	$(document).ready(function(){
			$("#alert").hide();
		});
		$('#save').click(function(){
			$("#alert").show();
			});
</script>
 -->
</html>