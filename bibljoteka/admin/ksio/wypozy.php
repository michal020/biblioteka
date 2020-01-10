<?php

	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: ../');
		exit();
	}
	
?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Administrator baza ksiązek	</title>
	<link rel="stylesheet" href="../../style.css" >
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body class="body">
	

<?php
  echo'<div class="one1">';
						echo "<p>Witaj ".$_SESSION['user'].'! [ <a href="logout.php">Wyloguj się!</a> ]</p>';
						echo '<a href="../">Strona głowna</a> <br /><br /><br />';

echo '</div>';
echo'<div class="one1">';
						  if (isset($_POST['usun']))
						{
							//Udana walidacja? Załóżmy, że tak!
							$wszystko_OK=true;
							
							$usun = $_POST['usun'];
							$ksiozka=$_POST['ksiozka'];
						  
							require_once "connect.php";
							mysqli_report(MYSQLI_REPORT_STRICT);
							
							try 
							{
								$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
								if ($polaczenie->connect_errno!=0)
								{
									throw new Exception(mysqli_connect_errno());
								}
								else
								{
										

									
									
									if ($wszystko_OK==true)
									{
										
										if ($polaczenie->query("DELETE FROM wypozyczenia WHERE   id='$usun' "))
										{
											$_SESSION['udanarejestracja']=true;
											
											
        
										}
										
										else
										{
											throw new Exception($polaczenie->error);
										}
										
                                  
									
									//$sql = "SELECT  id, user, ksiozka=$ksiozka ,czas FROM wypozyczenia";
									if ($polaczenie->query("UPDATE books SET ile= ile +1  WHERE id=$ksiozka;"))
									                              {
									                         	$_SESSION['udanawalidacja']=true;
									                        	echo ('<div id="compsoul-adult" class="compsoul-adult">
					                           <div class="compsoul-adult-box">
					                        	<p><h2>Usunuęto pomyślnie.</h2></p>
					                        	<div class="compsoul-adult-buttons">
					                    	</div>
					                       </div>  
					                     </div>');
																
							                        	    	}
							                             		else
							                          	    	{
									                        	throw
										     new Exception($polaczenie->error);
																}
									$polaczenie->close();

									
	
	
	
									}
									
								}
								
							}
							catch(Exception $e)
							{
								echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</span>';
								echo '<br />Informacja developerska: '.$e;
							}
							
						}
						
						


								
					  
                      
	
	 echo'<form method="post">';
						echo'Podaj id  wypożyczenia:&nbsp;<br /> <input type="text"  name="usun" />';
							
							
								if (isset($_SESSION['e_usun']))
								{
									echo '<div class="error">'.$_SESSION['e_usun'].'</div>';
									unset($_SESSION['e_usun']);
								}
								
								
								echo'<br />';
	                    echo'Podaj id  Książki która jest zwrócona:&nbsp;<br /> <input type="text"  name="ksiozka" />';
							
							
								if (isset($_SESSION['e_ksiozka']))
								{
									echo '<div class="error">'.$_SESSION['e_ksiozka'].'</div>';
									unset($_SESSION['e_ksiozka']);
								}
								echo'<input type="submit" value="&nbsp;Usuń wypożczenie" <br />';
 echo'</form>';	
echo'</div>';
echo'</div>';





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

$sql = "SELECT  id, user, ksiozka ,czas FROM wypozyczenia";
$result = $conn->query($sql);
echo'<div class="one1">';
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " |ID uzytkownika ktory wypozyczył   : " . $row["user"]. " | id ksiazki  : " . $row["ksiozka"]. "  | Do kiedy powinien zwrocic ksiazke:  " . $row["czas"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();

echo "<br><br />";
echo '</div>';
$dataczas = new DateTime();
	echo "Akrualna data: ".$dataczas->format('Y-m-d H:i')."<br><br />";
?>


</body>
</html>