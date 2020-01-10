<?php


	if (isset($_POST['id']))
	{
		//Udana walidacja? Załóżmy, że tak!
		$wszystko_OK=true;
		
			  $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = '';
   $dbname = 'biblioteka';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);

  

   $id = isset($_POST['name']) ? $_POST['id'] : '';
	 $ile = isset($_POST['ile']) ? $_POST['ile'] : '';

   
   
   if(! $conn ) {
      die('Could not connect: ' . mysqli_error());
   }
   echo 'Connected successfully<br>';  
   $sql = (" UPDATE books SET  ile='.$ile.'  WHERE id='.$id.'");
   
   if (mysqli_query($conn, $sql)) {
      echo "Record updated successfully";
   } else {
      echo "Error updating record: " . mysqli_error($conn);
   }
   mysqli_close($conn);
	}
   ?>
   <!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Panel administratora</title>
</head>

<body>
<form method="post">
   'Podaj id ksiązki <br /> <input type="text"  name="id" /><br />'
		<?php 
		if (isset($_SESSION['e_id']))
			?>
		
		ile wypozyczył: <br /> <input type="text"  name="ile" /><br />'
		<?php 
		if (isset($_SESSION['e_ile']))
			?>
	 
	<input type="submit" value="Dodaj wypożczenie" />
	
</form>
</body>
</html>