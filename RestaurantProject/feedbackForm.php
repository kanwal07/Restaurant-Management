<?php 
include_once 'dbconfig.php';
include_once 'Feedback.Class.php';
include_once 'bootstrap.php';
include_once 'navbarFeedback.php';
try {
    $connection = new PDO("mysql:host = $host; dbname=$dbname",$username,$password);
    
?>
<html>
<link rel="stylesheet" type="text/css" href="style.css"/>
<body style="background-color:lightgrey">
	<div class="container-fluid">
		<div class="row">
		<div class="col-sm-6">
    	<form id='feedback' action='' method='post' class="needs-validation" >
            <fieldset >
    	        
            	<div class="form-group">
            		<label for='customerName' >Customer Name:</label>
            		<input type='text' class="form-control" name='customerName' id='customerName'  maxlength="50"/>
            	</div>
            	<div class="form-group">
            		<label for='dishName' >Dish Name:</label>
            		<input type='text' class="form-control" name='dishName' id='dishName' maxlength="50"/>
            	</div>
            	<div class="form-group">
            		<label for='comments' >Comments:</label>
            		<input type='text' class="form-control" name='comments' id='comments' maxlength="50"/>
            	</div>
            	<div class="form-group">
            		<label>Rate the dish from 0-10 (0:lowest and 10:highest)</label>
            		<label for='rating' >Rating:</label>
            		<input type='text' class="form-control" name='rating' id='rating' maxlength="50"/>
            	</div>
            	<input type='submit' name='submit' value='Submit' class="btn btn-success"/>
            	
            
            </fieldset>
        </form>
        </div>
        <div class="col-sm-6">
        	<img src="Images/feedback.jpg" style="width:100%;height:50%;margin-top:100px;"/>
        </div>
        </div>
     </div>
</body>
</html>

<?php 
if(isset($_POST['submit']))
{
    $customerName = $_POST['customerName'];
    $dishName = $_POST['dishName'];
    $comments = $_POST['comments'];
    $rating = $_POST['rating'];
    
    $feed = new FeedBack($customerName,$dishName,$comments,$rating);
    $result = $feed->submitFeedback($connection);
    
    if($result==true)
    {
        ?>
        <script>
			$('#Add').click(function(){
				$("input").prop('required',true);
				$('#feedback').addClass('needs-validation');
				});
        </script>
        <?php 
        
        ?>
        <div class="alert alert-success alert-dismissible fade show">
  			<button type="button" class="close" data-dismiss="alert">&times;</button>
  			<strong>Success!</strong> Your feedback has been submitted. Thank You.
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
}

catch(Exception $exception) {
    $error = $connection.Error[2];
    echo $error;
}

?>