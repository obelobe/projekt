<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Untitled Document</title>
    </head>
    
    <body>
    	<?php
			$namn = $_POST['projektnamn'];
			
			echo $namn;
			
			$host = "localhost"; // Den server som kör MySQL
			$user = "root"; // Användarnamn till MySQL
			$pass = ""; // Lösenord till MySQL
			$databas = "oskar"; // Databasens namn
			
			$conn = mysqli_connect($host, $user, $pass, $databas);
			if(! $conn)
			{
				echo "Anslutningen misslyckades.";
				exit; 
			}
			
			$sql = "insert into förslag (namn) values ('$namn');";
			mysqli_query($conn, $sql);
			mysqli_close($conn);
			
			//header('Location: index.php');
		?>
        
    </body>
</html>