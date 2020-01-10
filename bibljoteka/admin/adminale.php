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
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Panel administratora</title>
<link rel="stylesheet" href="../style.css" >
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body class="body">
	
<?php
echo '<section class="up">';
   echo '<div class="container">';
   echo '<div class="row">';
   echo '<div class="col">';
   echo'<div class="one">';
   
			echo "<p>Witaj ".$_SESSION['user'].'! [ <a href="logout.php">Wyloguj się!</a> ]</p>';
			echo "<p><b>Dzieńdobry</b>: ".$_SESSION['user']."</p>";
	echo '</div>';
	echo '</div>';
	echo '<div class="col">';
	echo '<div class="one1">';
	
			echo '<a href="ksio/boks.php">Baza ksiązek/Dodajksiązkę</a> <br />';
			
			echo '<a href="user/user.php">Baza użytkowników</a> <br />';
			
			echo '<a href="ksio/wypozy.php">Wypożyczone książki</a> <br />';
			
	echo '</div>';
	echo '</div>';
	echo '<div class="col-sm-3">';
	echo '<div class="col">';
			echo "<p><b>E-mail</b>: ".$_SESSION['email']."<br>";
			echo "<br />";
				
			$dataczas = new DateTime();
			
			echo "Aktualna data: ".$dataczas->format('Y-m-d H:i')."<br><br />";
echo '</div>';
echo '</div>';		
echo '</div>';


	

   
   
	
					if (isset($_POST['user']))
					{
						//Udana walidacja? Załóżmy, że tak!
						$wszystko_OK=true;
						
						$user = $_POST['user'];
						$ksiozka = $_POST['ksiozka'];
					
						
						
						
						
					
						

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
									//Hurra, wszystkie testy zaliczone, dodajemy gracza do bazy
									
									
									                                     
															       if ($polaczenie->query("UPDaTE books SET ile= ile -1  where id=$ksiozka;"))
									                              {
									                         	$_SESSION['udanawalidacja']=true;
									                        	header('Location:adminale.php');
							                        	    	}
							                             		else
							                          	    	{
									                        	throw new Exception($polaczenie->error);
								                            	}

																 
								 if ($polaczenie->query("INSERT INTO wypozyczenia VALUES (NULL, '$user', '$ksiozka',now() + INTERVAL 7 DAY )"))
									{
										$_SESSION['udanawalidacja']=true;
										header('Location:adminale.php');
									}
									else
									{
										throw new Exception($polaczenie->error);
									}
								
								}
								
								$polaczenie->close();
							}
							
						}
						catch(Exception $e)
						{
							echo '<span style="color:red;">Błąd serwera! Brak ksiązki w bazie bądz jest są wszystkie wypożczone</span>';
							echo '<br />Informacja developerska: '.$e;
						}
						
					}
	
	 



echo '<div class="col">';
   echo'<h2>2Wpisz dane by użytkownik mógł wypozyczyć ksiązkę</h2>';
	echo'<form method="post">';
	echo '<div>';
	echo '<div class="col">';
		echo'Podaj id uzytkownika który chce wypożyczyć książke: <br /> <input type="text"  name="user" /><br />';
		
		
			if (isset($_SESSION['e_user']))
			{
				echo '<div class="error">'.$_SESSION['e_user'].'</div>';
				unset($_SESSION['e_user']);
			}
		
		
		echo'Podaj id ksiązki: <br /> <input type="text"  name="ksiozka" /><br />';
		
		
			if (isset($_SESSION['e_ksiozka']))
			{
				echo '<div class="error">'.$_SESSION['e_ksiozka'].'</div>';
				unset($_SESSION['e_ksiozka']);
			}
		
		
		
		
		echo'<p> Pmiętaj mozesz wpisać tylko liczby całkowite </p>';
		
		
		
		
		echo'<br />';
		
		echo'<input type="submit" value="Dodaj wypożczenie" />';
		
	echo'</form>';
	echo '</div>';
	echo '</div>';
	echo '</div>';
	echo '</div>';
	echo '</div>';
	echo '</section>';
?>
	
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="stylesheet" href="../css/bootstrap.min.css" ></script>
</body>
</html>