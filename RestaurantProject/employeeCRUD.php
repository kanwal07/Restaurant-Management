<?php
include_once 'dbconfig.php';
include_once 'Employee.Class.php';
include_once 'bootstrap.php';
include_once 'navbarEmployees.php';
include_once 'footer.php';
try {
    $connection = new PDO("mysql:host = $host; dbname=$dbname",$username,$password);

?>


<html>
<link rel="stylesheet" type="text/css" href="style.css"/>
<body >
<div  id="employeeImage">
	<div class="container">
	<form id='menu' action='' method='post'>
        <fieldset >
	        <legend>Employees</legend>
        
        	<div class="form-group">
        	<label for='employeeId' >Employee Id:</label>
        	<input type='text' class="form-control" name='employeeId' id='employeeId'  maxlength="50" />
        	</div>
        	<div class="form-group">
        	<label for='name' >Name:</label>
        	<input type='text' class="form-control" name='name' id='name' maxlength="50" />
        	</div>
        	<div class="form-group">
        	<label for='employeeType' >Employee Type:</label>
        	<input type='text' class="form-control" name='employeeType' id='employeeType' maxlength="50" />
        	</div>
        	<div class="form-group">
        	<input type='submit' name='Add' value='Add' id = "Add" class="btn btn-success"/>
        	<input type='submit' name='Update' value='Update' id="Update" class="btn btn-success"/>
        	<input type='submit' name='Delete' value='Delete' id="Delete" class="btn btn-success"/>
        	<input type='submit' name='Display' value='Display' id="Display" class="btn btn-success"/>
        </div>
        </fieldset>
     </form>
     </div>
 

<?php 
if(isset($_POST['employeeId']))
{
    $employeeId = $_POST['employeeId'];
    $name = $_POST['name'];
    $employeeType = $_POST['employeeType'];
    
    
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
        
        $emp1 = new Employee($employeeId, $employeeType, $name);
        
        $result1 = $emp1->create($connection);
        
        if($result1 == true)
        {
            ?>
        <div class="alert alert-success alert-dismissible fade show">
  			<button type="button" class="close" data-dismiss="alert">&times;</button>
  			<strong>Success!</strong> Employee added successfully.
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
        
        
        $emp2 = new Employee();
        $emp2->setEmployeeId($employeeId);
        $emp2->setName($name);
        $emp2->setEmployeeType($employeeType);
        
        
        $result2= $emp2->update($connection);
        
        if($result2 == true)
        {
            ?>
        <div class="alert alert-success alert-dismissible fade show">
  			<button type="button" class="close" data-dismiss="alert">&times;</button>
  			<strong>Success!</strong> Employee updated successfully.
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
        $emp3 = new Employee();
        $emp3->setEmployeeId($employeeId);
        $result3=$emp3->delete($connection);
        
        if($result3 == true)
        {
            ?>
        <div class="alert alert-success alert-dismissible fade show">
  			<button type="button" class="close" data-dismiss="alert">&times;</button>
  			<strong>Success!</strong> Employee deleted successfully.
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
   
        $emp4 = new Employee();
        $listOfEmployees = $emp4->getAllEmployees($connection);
        echo "<div class='col-sm-4'></div>";
        $emp4->displayAllEmployees($listOfEmployees);
        echo "<div class='col-sm-4'></div>";
    }
    
    
}

}

catch(Exception $exception) {
    $error = $connection.Error[2];
    echo $error;
}


?>
</div>    
</body>

</html>