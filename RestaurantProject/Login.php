<?php 
include_once 'dbconfig.php';
include_once 'Login.Class.php';
include_once 'bootstrap.php';
include_once 'footer.php';
include_once 'navbarLogin.php';
try {
    $connection = new PDO("mysql:host = $host; dbname=$dbname",$username,$password);

?>

<html>
	<head></head>
	<Title>Login</Title>
	<link rel="stylesheet" type="text/css" href="style.css"/>
	<body class="lightGrey">
		<div class="container">
    		<form id='login' action='' method='get' class="needs-validation">
            <fieldset>
            	
    	        <legend><img alt="memberLogin" src="Images/loginIcon.jpg" id="loginIcon">&nbsp;&nbsp;Member Login</legend>
            	<div class="form-group">
                	<label for='username' >UserName:</label>
                	<input type='text' class="form-control" name='username' id='username'  maxlength="50" required/>
                </div>
                <div class="form-group">
                	<label for='password' >Password:</label>
                	<input type='password'  class="form-control" name='password' id='password' maxlength="50" required/>
            	</div>
            	<input type='submit' name='Submit' value='Submit' class="btn btn-success"/>
            
            </fieldset>
            </form>
         </div>
	</body>
</html>


<?php


if(isset($_GET['username']) != "" && isset($_GET['password']) != "")
{
    $username = $_GET['username'];
    $password = $_GET['password'];
    
    $login = new Login($username,$password);
    $login = $login->checkLogin($connection);    
    if($login != null)
    {
        
        
        header("Location:adminDashboard.php");
    }
    else
    {
        ?>
        <div class="alert alert-danger alert-dismissible fade show">
  			<button type="button" class="close" data-dismiss="alert">&times;</button>
  			<strong>Invalid!</strong> The username or password is incorrect.
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