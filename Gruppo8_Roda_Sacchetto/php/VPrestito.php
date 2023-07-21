<html>
    <head>
        <meta charset="UTF-8">
        <title>Prestito</title>
        <link rel="stylesheet" href="../css/retro.css">
        <link rel="stylesheet" href="../css/mycss.css">
    </head>
    <body>
        <h1>Visualizzazione Prestiti</h1>
        <a href="../index.html">Home</a>
        <br><br>
        <table>
            <tr>
                <th>Codice Prestito</th>
                <th>Data Prestito</th>
                <th>Codice Libro</th>
                <th>Titolo</th>
                <th>Matricola</th>
                <th>Nome</th>
                <th>Cognome</th>
            </tr>
            <?php
            include_once("connessione.php");
            try{
                $sql = "SELECT COD_PRESTITO, DATA_PRESTITO, PRESTITO.COD_LIBRO, TITOLO, PRESTITO.MATRICOLA, NOME, COGNOME 
                FROM ((PRESTITO
                INNER JOIN UTENTE ON PRESTITO.MATRICOLA=UTENTE.MATRICOLA)
                INNER JOIN LIBRO ON PRESTITO.COD_LIBRO = LIBRO.COD_LIBRO)";
                $query=mysqli_query($link,$sql);
            }catch (mysqli_sql_exception $e) {
                echo("Errore per la visualizzazione dei prestiti: " . $e->getMessage() . "<br>");
            }

            $PRESTITO = array();
            $i=0;
            while($row= mysqli_fetch_array($query)){
                $PRESTITO[$i]= $row;
                $i++;
            }
            foreach($PRESTITO as $pre):
            echo "<tr>";
            echo "<td>".$pre[0]."</td>";
            echo "<td>".$pre[1]."</td>";
            echo "<td>".$pre[2]."</td>"; 
            echo "<td>".$pre[3]."</td>";
            echo "<td>".$pre[4]."</td>";
            echo "<td>".$pre[5]."</td>";
            echo "<td>".$pre[6]."</td>";
            echo "</tr>";
            endforeach;
        
            mysqli_close($link);
            ?>
        </table>
    </body>
</html>