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

<body class="boodya">
	

	
	

<?php
echo '<section class="up">';
   echo '<div class="container">';
   echo '<div class="row">';
   echo '<div class="col">';

 echo '<div class="one">';
			echo "<p>Witaj ".$_SESSION['user'].'! [ <a href="logout.php">Wyloguj się!</a> ]';
  echo '</div>';		
  echo '<div class="one">';
  
           echo '<a href="../">Strona głowna</a>';
		   echo '</div>';
		    echo '<div class="boks2">';
           $dataczas = new DateTime();
	echo "Aktualna data: ".$dataczas->format('Y-m-d H:i:s')."<br><br />";
	echo '</div>';
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
					

				
				
				if ($wszystko_OK==true)
				{
					
					
					if ($polaczenie->query("DELETE FROM books WHERE   id='$usun' "))
					{
						$_SESSION['udanarejestracja']=true;
						if ($polaczenie->query(" FROM wypozyczenia WHERE   id='$usun' "))
										{
											$_SESSION['udanarejestracja']=false;
											
											echo ('<div id="compsoul-adult" class="compsoul-adult">
					  <div class="compsoul-adult-box">
						<p><h2>Ksiązka jest wypozyczona</h2></p>
						<div class="compsoul-adult-buttons">
						</div>
					  </div>  
					</div>');

										}
										else {
						echo ('<div id="compsoul-adult" class="compsoul-adult">
  <div class="compsoul-adult-box">
    <p><h2>Książka została usunięta pomyślnie.</h2></p>
    <div class="compsoul-adult-buttons">
    </div>
  </div>  
</div>');
										}

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
			echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności !</span>';
			echo '<br />Informacja developerska: '.$e;
		}
		
	}
	
	


			
  echo '<div class="boks2">';
  echo '<div class="col-6">';
	echo'<form method="post">';
	
	echo'Podaj id  ksiązki aby usunąć: <br /> <input type="text"  name="usun" /><br />';
		
		
			if (isset($_SESSION['e_usun']))
			{
				echo '<div class="error">'.$_SESSION['e_usun'].'</div>';
				unset($_SESSION['e_usun']);
			}
			echo'<input type="submit" value="Usuń ksiązke" />';
    echo'</form>';
	echo '</div>';	
	
	
	
	
	
	
	if (isset($_POST['ksiazka']))
	{
		//Udana walidacja? Załóżmy, że tak!
		$wszystko_OK=true;
		
		$ksiazka = $_POST['ksiazka'];
		$wyda = $_POST['wyda'];

		


       echo'<div class="boks>';
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
					
					if ($polaczenie->query("INSERT INTO books VALUES (NULL, '$ksiazka', '$wyda', '$ile')"))
					{
						$_SESSION['udanarejestracja']=true;
						header('Location: boks.php');
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
			echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</span>';
			echo '<br />Informacja developerska: '.$e;
		}
		
	}
	
	


	  echo '<div class="one">';
	  echo '<div class="col-12">';
	echo'<form method="post">';
	
	echo'Podaj nawe ksiązki: <br /> <input type="text"  name="ksiazka" /><br />';
		
		
			if (isset($_SESSION['e_ksiazka']))
			{
				echo '<div class="error">'.$_SESSION['e_ksiazka'].'</div>';
				unset($_SESSION['e_ksiazka']);
			}
		
		
		echo'Podaj wydawnictwo: <br /> <input type="text"  name="wyda" /><br />';
		
		
			if (isset($_SESSION['e_ksiazka']))
			{
				echo '<div class="error">'.$_SESSION['e_ksiazka'].'</div>';
				unset($_SESSION['e_ksiazka']);
			}
		
		
		echo'Podaj ilośc ksiązek: <br /> <input type="text"  name="ile" /><br />';
		
		
			if (isset($_SESSION['e_ile']))
			{
				echo '<div class="error">'.$_SESSION['e_ile'].'</div>';
				unset($_SESSION['e_ile']);
			}
				
		
		echo'<p> Pmiętaj w ilości możesz podać tylko liczby </p>';
		
		
		
		
		echo'<br />';
		
		echo'<input type="submit" value="Dodaj ksiązke" />';
		

	echo '</form';
	
	 
	  echo '<div class="col-12">';
	  echo '</div class="one">';
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

$sql = "SELECT  id, ksiazka, wyda ,ile FROM books";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " |Nazwa ksiązki   : " . $row["ksiazka"]. " | Wydawnictwo  : " . $row["wyda"]. "  |  Ile jest ksiązek w bibljotece :  " . $row["ile"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();

echo "<br><br />";

echo '</div>';
echo '</div>';
echo '</div>';
	echo '</div>';
	echo '</div>';
	echo '</section>';
	//
	
	

?>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="stylesheet" href="../../css/bootstrap.min.css" ></script>
</body>
</html>