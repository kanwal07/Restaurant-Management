<?php 
include_once 'bootstrap.php';
include_once 'footer.php';
include_once 'navbarAdmin.php';
?>

<html>
<body>

<div class="container" style="text-align:center">
	<h2>Welcome Admin!</h2>
	<form method="post">
		</br>
		</br>
		<button type = "submit"  name="menu" class="btn btn-info">Menu Information</button>
		</br>
		</br>
		<button type="submit" name="employee" class="btn btn-info">Employee Information</button>
	</form>
	</div>
</body>
</html>

<?php 
if(isset($_POST['menu']))
{
    header("Location:menuCRUD.php");
}
if(isset($_POST['employee']))
{
    header("Location:employeeCRUD.php");
}
?>