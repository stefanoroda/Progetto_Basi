<html>
    <head>
        <meta charset="UTF-8">
        <title>Ricerca</title>
        <link rel="stylesheet" href="../css/retro.css">
        <link rel="stylesheet" href="../css/mycss.css">
    </head>
    <body>
        <h1>Ricerca Prestito</h1>
        <form method="POST" action="../php/RUtente.php">
            <fieldset>
                <label>Inserisci la Matricola dell'utente:</label>
                <input type="number" name="MATRICOLA">
                <input type="submit" value="Cerca">
            </fieldset>
        </form>
        <br>
        <a href="../index.html">Home</a>
        <br><br>
        <table>
        <tr>
                <th>Codice Prestito</th>
                <th>Data Prestito</th>
                <th>Titolo Libro</th>
                <th>ISBN</th>
                <th>Lingua</th>
                <th>Data pubblicazione</th>
        </tr>
        <?php
        include_once("config.php");
        if($_POST != NULL) {
          if($_POST['MATRICOLA'] != ''){

          
            $MATRICOLA = 0;
            $MATRICOLA = $_POST['MATRICOLA'];
        
            try{
                $sql = "SELECT PRESTITO.COD_LIBRO, DATA_PRESTITO,TITOLO,ISBN,LINGUA,ANNO_PUB
                FROM (PRESTITO 
                INNER JOIN LIBRO ON PRESTITO.COD_LIBRO = LIBRO.COD_LIBRO) 
                WHERE MATRICOLA=".$MATRICOLA;
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
            echo "</tr>";
            endforeach;
        }}
            mysqli_close($link);
        ?>
        </table>
    </body>
</html>