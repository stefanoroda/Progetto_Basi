<?php 
    //IMPORTA LA CONNESSIONE DEL DATABASE
    include_once("connessione.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Utente</title>
        <link rel="stylesheet" href="../css/retro.css">
        <link rel="stylesheet" href="../css/mycss.css">
    </head>
    <body>
        <h1>Visualizzazione degli utenti</h1>
        <br>
        <a href="../index.html">Home</a>
        <br><br>
        <table>
            <tr>
                <th>Matricola</th>
                <th>Nome utente</th>
                <th>Cognome utente</th>
                <th>Numero Telefono</th>
                <th>Via</th>
                <th>Numero Civico</th>
                <th>CAP</th>
                <th>Città</th>
            </tr>
            <?php
            try{
                $sql = "SELECT * FROM UTENTE";
                $query=mysqli_query($link,$sql);
            }catch (mysqli_sql_exception $e) {
                echo("Errore per la visualizzazione di utenti: " . $e->getMessage() . "<br>");
            }

            $utente = array();
            $i=0;
            while($row= mysqli_fetch_array($query)){
                $utente[$i]= $row;
                $i++;
            }

            foreach($utente as $ut):
                echo "<tr>";
                echo "<td>".$ut[0]."</td>";
                echo "<td>".$ut[1]."</td>";
                echo "<td>".$ut[2]."</td>";
                echo "<td>".$ut[3]."</td>";
                echo "<td>".$ut[4]."</td>";
                echo "<td>".$ut[5]."</td>";
                echo "<td>".$ut[6]."</td>";
                echo "<td>".$ut[7]."</td>";
                echo "</tr>";
            endforeach;

            mysqli_close($link);
            ?>
        </table>
    </body>
</html>
    