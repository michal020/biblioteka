<?php

	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit();
	}
	
?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Panel uzytkownika</title>
		<link rel="stylesheet" href="css/bootstrap.min.css" >
	<link rel="stylesheet" href="style.css" >
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body class="body">
<?php
$id1=$_SESSION['id'];
   echo '<section class="up">';
   echo '<div class="container">';
   echo '<div class="row">';
   echo '<div class="col-sm-3">';	  
	echo'<div class="one">';	

			 
			echo "Witaj ".$_SESSION['user'].'! [ <a href="logout.php">  Wyloguj się!</a> ]';
			echo "<p><b>Twoje ID</b>: ".$_SESSION['id']."</p>";
		
	echo '</div>';
	echo '</div>';
	echo '<div class="col-sm-3">';
	echo '<div class="one1">';
			
			echo "<p><b>E-mail</b>: ".$_SESSION['email']."<br>";
	
	echo '</div>';
	echo '</div>';
	echo '<div class="col-sm-3">';
	echo '<div class="one2">';
		
			$dataczas = new DateTime();
			$koniec = DateTime::createFromFormat('Y-m-d H:i:s', $_SESSION['dayregister']);
			
			$roznica = $dataczas->diff($koniec);
			
			if($dataczas<$koniec)
			echo "Ilość pozostałych dni darmowego wypożyczenia ksiązki:".$roznica->format(' %m mies, %d dni, %h godz, %i min');
			else
			echo "Dni od rejetracji : ".$roznica->format('%m mies ,%d dni');	
			echo "<br />";
			echo "Aktualna data: ".$dataczas->format('Y-m-d H:i')."<br><br />";

	
echo '</div>';
echo '</div>';
echo '</div>';
echo '<div class="col-sm-10">';
 



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "biblioteka";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Połącznie nie udane: " . $conn->connect_error);
}
  
$id="SELECT id FROM uzytkownicy WHERE id LIKE '$id1'";

$sql = "SELECT  id, user, ksiozka ,czas FROM wypozyczenia WHERE `user`='$id1'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo " Id wypozyczenia  : " . $row["id"]. "  | Id ksiązki  : " . $row["ksiozka"]. "  | Do kiedy powinieneś zwrócić  ksiazke by nie płacić kary:  " . $row["czas"]. "<br>";
    }
} else {
    echo "Nie masz wypożyczonych ksiązek";
}
$conn->close();

echo "<br><br />";


echo '<p>Mkasymalna ilość ksiązek których możez wyporzyć to 5 , każdy dzień dłuzej niz wyznaczony oznacza naliczie 1,5zł kazdy dzień</p>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</section>';

?>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="stylesheet" href="css/bootstrap.min.css" ></script>
</body>
</html>





