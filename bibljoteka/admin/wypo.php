<?php

	session_start();
	
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
					
					if ($polaczenie->query("INSERT INTO wypozyczenia VALUES (NULL, '$user', '$ksiozka',now() + INTERVAL 14 DAY )"))
					{
						$_SESSION['udanarejestracja']=true;
						header('Location: wypo.php');
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
	
	
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Panel administratora</title>

	
	<style>
		.error
		{
			color:red;
			margin-top: 10px;
			margin-bottom: 10px;
		}
	</style>
</head>

<body>
  <?php
echo '<a href="../">Strona głowna</a> <br /><br /><br />';
	?>
	<form method="post">
	
		Podaj id uzytkownika: <br /> <input type="text"  name="user" /><br />
		
		<?php
			if (isset($_SESSION['e_user']))
			{
				echo '<div class="error">'.$_SESSION['e_user'].'</div>';
				unset($_SESSION['e_user']);
			}
		?>
		
		Podaj id ksiązki: <br /> <input type="text"  name="ksiozka" /><br />
		
		<?php
			if (isset($_SESSION['e_ksiozka']))
			{
				echo '<div class="error">'.$_SESSION['e_ksiozka'].'</div>';
				unset($_SESSION['e_ksiozka']);
			}
		?>
		
		
		
		<p> Pmiętaj mozesz wpisać tylko liczby całkowite </p>
		
		
		
		
		<br />
		
		<input type="submit" value="Dodaj wypożczenie" />
		
	</form>

	<?php
	
	
	
	
	
	
	?>
	
</body>
</html>