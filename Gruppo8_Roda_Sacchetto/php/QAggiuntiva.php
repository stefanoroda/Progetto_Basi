<html>
    <head>
        <meta charset="UTF-8">
        <title>QueryAg1</title>
        <link rel="stylesheet" href="../css/retro.css">
        <link rel="stylesheet" href="../css/mycss.css">
    </head>
    <body>
        <h1>Query aggiuntiva 1</h1>
        <p>Inserita la lingua utilizzata per la scrittura del libro, viene visualizzato il numero totale dei libri scritti in quella lingua presi in prestito, affiancato dal nome e cognome del suo autore.</p>
        <form action="QAggiuntiva.php" method="post">
        
            <fieldset> 
                <label>Inserisci Lingua:</label>
                <input type="text" name="LINGUA">
            </fieldset>
            <input type="submit" value="Invia">
        </form>
        <br>
        <a href="../index.html">Home</a>

        <?php

            include_once("connessione.php");

            
            if($_POST != null){
                $LINGUA = $_POST['LINGUA'];

                try{
                $sql = "SELECT COUNT(LIBRO.COD_LIBRO),AUTORE.COD_AUTORE,AUTORE.NOME, AUTORE.COGNOME
                FROM (((PRESTITO
                INNER JOIN LIBRO 
                ON LIBRO.COD_LIBRO=PRESTITO.COD_LIBRO)
                INNER JOIN BOOK_AUTHORS
                ON BOOK_AUTHORS.COD_LIBRO=LIBRO.COD_LIBRO)
                INNER JOIN AUTORE
                ON BOOK_AUTHORS.COD_AUTORE=AUTORE.COD_AUTORE)
                WHERE LINGUA='$LINGUA'
                GROUP BY AUTORE.COD_AUTORE;";

                $query = mysqli_query($link, $sql);
                }catch(mysqli_sql_exception $e){
                    echo "Error2: " . $e->getMessage();
                }

            $LIBRO=array();
            $i=0;
            while($row=mysqli_fetch_array($query)){
                $LIBRO[$i]=$row;
                $i++;
            }
            echo "<table>
            <tr>
            <th>Numero Libri presi in prestito</th>
            <th>Codice Autore</th>
            <th>Nome Autore</th>
            <th>Cognome Autore</th>
            </tr>";
            foreach($LIBRO as $LIB):
                echo "<tr><th>".$LIB[0]."</th>";
                echo "<th>".$LIB[1]."</th>";
                echo "<th>".$LIB[2]."</th>";
                echo "<th>".$LIB[3]."</th></tr>";
            endforeach;
            echo "</table>";
            }
            
            mysqli_close($link);
          
        ?>


    </body>
</html>