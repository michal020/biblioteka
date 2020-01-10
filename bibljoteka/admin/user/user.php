<?php

	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: boks.php');
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

<body>
	

<?php
echo '<section class="up">';
   echo '<div class="container">';
   echo '<div class="row">';
   echo '<div class="col">';
   echo'<div class="one">'; 
   
					   
						echo "<p>Witaj ".$_SESSION['user'].'! [ <a href="logout.php">Wyloguj się!</a> ]</p>';
						echo '<a href="../">Strona głowna</a> <br /><br /><br />';


						  if (isset($_POST['usun']))
						{
							//Udana walidacja? Załóżmy, że tak!
							$wszystko_OK=true;
							
							$usun = $_POST['usun'];
							

							


						  
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
										

									//
									//TU nie działą
									
									// czy uzytokwnik
								$rezultat = $polaczenie->query("SELECT id FROM uzytkownicy WHERE id='$usun'");
				
								if (!$rezultat) throw new Exception($polaczenie->error);
								
				
								$ile_takich_user = $rezultat->num_rows;
								if($ile_takich_user>0)
								{
									$wszystko_OK=false;
									
										$_SESSION['e_usun']=" uzytkownik ma wypo ksiazke";
												}
												else
							               	    	{
									                 throw new Exception($polaczenie->error);
								                    }
										
										
										
										
										
										if ($polaczenie->query("DELETE FROM uzytkownicy WHERE   id='$usun' "))
										{
											$_SESSION['udanarejestracja']=true;
											
											echo ('<div id="compsoul-adult" class="compsoul-adult">
					  <div class="compsoul-adult-box">
						<p><h2>Użytkownik usunuęty pomyślnie.</h2></p>
						<div class="compsoul-adult-buttons">
						</div>
					  </div>  
					</div>');

										}
										else
										{
											throw new Exception($polaczenie->error);
										}
										
				       
									
									$polaczenie->close();
								}
								
							}
							catch(Exception $e)
							{
								echo '<span style="color:red;">Uzytkownik ma wypożyczoną ksiązkę.</span>';
								echo '<br />Informacja developerska: '.$e;
							}
							}
						
						
						


								
					  echo '<div class="boks2">';
					  echo '<div class="col-6">';
						echo'<form method="post">';
						
						echo'Podaj id  użytkownika aby usunąć:&nbsp;<br /> <input type="text&nbsp;"  name="usun" />';
							
							
								if (isset($_SESSION['e_usun']))
								{
									echo '<div class="error">'.$_SESSION['e_usun'].'</div>';
									unset($_SESSION['e_usun']);
								}
								echo'<input type="submit" value="&nbsp;Usuń użytkownika " <br />';
						echo'</form>';
						echo '</div>';	
						?>
<?php
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

					$sql = "SELECT  id, user,email  FROM uzytkownicy";
					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
						// output data of each row
						while($row = $result->fetch_assoc()) {
							echo 

							"Id uzytkwoanika: " . $row["id"]. 
							"|Nazwa uzytkownika   : " . $row["user"]. 
							"| Email  : " . $row["email"].  "<br>";
						  
						
						}
					} else {
						echo "0 results";
					}
					$conn->close();

					echo "<br><br />";

					$dataczas = new DateTime();
						echo "Akrualna data: ".$dataczas->format('Y-m-d | H:i:s')."<br><br />";
						
						
		echo '</div>';
	echo '</div>';
	echo '</div>';
	echo '</div>';
	echo '</div>';
	echo '</section>';					
?>



</body>
</html>