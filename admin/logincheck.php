	<?php
session_start();

$con = pg_connect("host=ec2-34-225-103-117.compute-1.amazonaws.com port=5432 dbname=dcg72tr1l83dd3 user=eophfavabkrorx password=cada536917ba323da06136f1b0fd36d8eeae9fee194a8d611e249fd04c60fa78");
if($con){
	echo"connection successful";
}else{
	echo "no connection";
}

$db = pg_select_db($con, 'dcg72tr1l83dd3');

if(isset($_POST['loginSubmit'])){
	$username=$_POST['name'];
	$password=$_POST['pass'];

	$sql="select * from account where user_name='$username'
	 and password='$password'";
	 $query= pg_query($con, $sql);

	 $row= pg_num_rows($query);
	 	if($row == 1){
	 		echo "login successful";
	 		$_SESSION['name'] =$username;
	 		header('location:home.php'); 
	 	}else{
	 		echo "login failed";
	 		header('location: home.php');
	 	}
	 
}

?>

