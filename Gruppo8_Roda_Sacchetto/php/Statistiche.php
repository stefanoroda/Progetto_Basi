<html>
    <head>
        <meta charset="UTF-8">
        <title>Statistiche</title>
        <link rel="stylesheet" href="../css/retro.css">
        <link rel="stylesheet" href="../css/mycss.css">
    </head>
    <body>
        <h1>Statistiche</h1>
        <form action="Statistiche.php" method="post">
            <fieldset>
                <label>Numero di libri pubblicati in un determinato anno.</label>
                <br>
                <label>Inserisci l'anno di pubblicazione del libro:</label>
                <input type="number" name="ANNO">
            </fieldset>
            <br>
            <fieldset>
                <label>Numero di prestiti effettuati in una determinata succursale.</label>
                <br>
                <label>Inserisci il codice ID della succursale:</label>
                <input type="number" name="SUCCURSALE">
            </fieldset>
            <fieldset>
                <label>Visualizzazione del numero di libri pubblicati per autore</label>
            </fieldset>
            <input type="submit" value="Invia">
        </form>
        <br>
        <a href="../index.html">Home</a>
        <br>
        <?php
            include_once("connessione.php");
            if($_POST!=null){
                $ANNO=$_POST['ANNO'];
                $SUCCURSALE=$_POST['SUCCURSALE'];
                try{
                    $sql = "SELECT COUNT(*) 
                    FROM LIBRO
                    WHERE ANNO_PUB LIKE '".$ANNO."'";
                    
    
    
                    $query = mysqli_query($link, $sql);
                    
    
                }catch(mysqli_sql_exception $e){
                    echo "Error: " . $e->getMessage();
                }

                echo "<p>Numero di libri nell'anno ".$ANNO.":</p>";

                $query = mysqli_fetch_column($query);
                echo $query."<br>";
                echo "<p>Numero prestiti effettuati per la succursale N°(".$SUCCURSALE."):</p>";
                try{
                    $sql = "SELECT COUNT(*)
                    FROM (PRESTITO
                    INNER JOIN LIBRO 
                    ON LIBRO.COD_LIBRO= PRESTITO.COD_LIBRO)
                    WHERE COD_SUC LIKE '".$SUCCURSALE."'";
                    
    
    
                    $query = mysqli_query($link, $sql);
                    
    
                }catch(mysqli_sql_exception $e){
                    echo "Error: " . $e->getMessage();
                }
                $row = mysqli_fetch_array($query);
                $query=$row[0];
                echo $query."<br>";
                echo "<p>Numero libri pubblicati per autore: </p><br>";
                try{
                    $sql = "SELECT COUNT(*), NOME, COGNOME
                    FROM ((LIBRO INNER JOIN BOOK_AUTHORS 
                    ON BOOK_AUTHORS.COD_LIBRO=LIBRO.COD_LIBRO)
                    INNER JOIN AUTORE
                    ON AUTORE.COD_AUTORE=BOOK_AUTHORS.COD_AUTORE)
                    GROUP BY AUTORE.COD_AUTORE";
                    
    
    
                    $query = mysqli_query($link, $sql);
                    
    
                }catch(mysqli_sql_exception $e){
                    echo "Error: " . $e->getMessage();
                }
                $PRESTITI = array();
                $i =0;
                while($row = mysqli_fetch_array($query)){
                    $PRESTITI[$i] = $row;
                    $i++;
                }
                echo "<table>
                <tr>
                <th>Numero libri</th>
                <th>Nome Autore</th>
                <th>Cognome Autore</th>
                </tr>";
                foreach ($PRESTITI as $PRE):
                    echo "<tr>
                                    <td>".$PRE[0]."</td>
                                    <td>".$PRE[1]."</td>
                                    <td>".$PRE[2]."</td></tr>";
                endforeach;
                echo "</table>";
    
            }
            mysqli_close($link);
        ?>
    </body>
</html>