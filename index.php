

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Projekt namn</title>
        <link type="text/css" href="style.css" rel="stylesheet">    
    </head>
    <body background="bg.jpg">        
    
        <h1>Langa projektnamn här!</h1>
        <p>Projektnamn</p>
    
        <div class="stuff"> //förslagsrutan och submit knappen
            <form action="send.php" method="POST">
                <input type="text" name="projektnamn" placeholder="max 20 tecken" autofocus>
                <input type="submit" value="Skicka" name="btn">
            </form>
        </div>       
            <h2>Föreslagna namn!</h2>    
        <div class="namn">
                <?php
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
                //hämta allt från table
                $sql = "SELECT * FROM forslag";
                $resultat = mysqli_query($conn, $sql);
                if(mysqli_num_rows($resultat) > 0)
                    {
                    //sätt in allt från åvan så att de kan visas på sidan
                    echo "<ul>";
                    while($rad = mysqli_fetch_assoc($resultat))
                    {
                            echo "<li>" . utf8_encode($rad["namn"]) . "</li> ";
                    }
                            echo "</ul>";
                    }
                            else
                    {
                            echo "Inga namn ännu";
                    }
	               mysqli_close($conn);
                ?>
        </div>      
    </body>
</html>