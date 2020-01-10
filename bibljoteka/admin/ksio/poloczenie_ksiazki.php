<?php
require_once "connect.php";
if (!$_POST)
  
 
mysqli_select_db("biblioteka", $_POST);
 
$result = mysqli_query("SELECT * FROM books");
 
echo '<table><tr><th>id</th><th>ksiazka</th><th>wyda</th></tr>';
while($rows = mysqli_fetch_array($result)) {
     echo "<tr><td>{$rows['id']}</td><td>{$rows['ksiazka']}</td><td>{$rows['wyda']}</td></tr>";
	 echo "<tr><td>{$rows['id']}</td><td>{$rows['ksiazka']}</td><td>{$rows['wyda']}</td></tr>";
	 echo "<tr><td>{$rows['id']}</td><td>{$rows['ksiazka']}</td><td>{$rows['wyda']}</td></tr>";
	 echo "<tr><td>{$rows['id']}</td><td>{$rows['ksiazka']}</td><td>{$rows['wyda']}</td></tr>";
	 echo "<tr><td>{$rows['id']}</td><td>{$rows['ksiazka']}</td><td>{$rows['wyda']}</td></tr>";
	 echo "<tr><td>{$rows['id']}</td><td>{$rows['ksiazka']}</td><td>{$rows['wyda']}</td></tr>";
	 echo "<tr><td>{$rows['id']}</td><td>{$rows['ksiazka']}</td><td>{$rows['wyda']}</td></tr>";
	 echo "<tr><td>{$rows['id']}</td><td>{$rows['ksiazka']}</td><td>{$rows['wyda']}</td></tr>";
}
echo '</table>';
 
mysqli_close();
?>


