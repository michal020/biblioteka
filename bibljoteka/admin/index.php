<?php

	session_start();
	
	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		header('Location: gra.php');
		exit();
	}

?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Administartor</title>
		<link rel="stylesheet" href="../bootstrap.min.css" >
	<link rel="stylesheet" href="../style.css" >
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body class="body">
<?php
echo '	<div class="log">';
echo '	Podaj dane administratora <br /><br />';


    echo '	<form action="zaloguj.php" method="post">';
	echo '	Login: <br /> <input type="text" name="login" /> <br />';
	echo '	Hasło: <br /> <input type="password" name="haslo" /> <br /><br />';
	echo '	<input type="submit" value="Zaloguj się" />';
	
echo '</form>';
	
    echo '<a href="../">Uzytkownik</a> <br />';
	echo'</div>';
?>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="stylesheet" href="../css/bootstrap.min.css" ></script>
</body>
</html>