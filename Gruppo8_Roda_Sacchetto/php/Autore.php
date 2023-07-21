<html>

    <head>
    
        <title>Pagina Autore</title>
        <!-- INSERIMENTO DELLO STILE GRAFICO -->
        <link rel="stylesheet" href="../css/mycss.css">
        <link rel="stylesheet" href="../css/retro.css">

    <head>

    <body>
        <!-- STAMPA INSERIMENTO -->
        <h1>
            Ricerca libri per autore 
        </h1>
        <form method="post" action="../php/Autore.php">
            <fieldset>
                <p>Inserire il codice autore per la ricerca:</p>
                <input type="number" name="COD_AUTORE">
                <input type="submit" value="Cerca">
            </fieldset>
        </form>
        <br>
        <a href="../index.html">Home</a>
        <br><br>
        <table>
            <tr>
                <th>Codice Libro</th>
                <th>Titolo Libro</th>
                <th>ISBN</th>
                <th>Lingua</th>
                <th>Data pubblicazione</th>
            </tr>
            <?php

            //IMPORTA LA CONNESSIONE DEL DATABASE
            include_once("connessione.php");
            if($_POST!= NULL){
                $COD_AUTORE   = $_POST['COD_AUTORE'];
            


            try{
                $sql = "SELECT LIBRO.*
                        FROM (LIBRO
                        INNER JOIN BOOK_AUTHORS ON BOOK_AUTHORS.COD_LIBRO = LIBRO.COD_LIBRO)
                        WHERE COD_AUTORE='$COD_AUTORE'
                        ORDER BY ANNO_PUB";
                    
                $query = mysqli_query($link, $sql);

            }catch(mysqli_sql_exception $e){
                echo "Error: " . $e->getMessage();
            }
            $libro=array();
            $i=0;
            while($row= mysqli_fetch_array($query)){
                $libro[$i]= $row;
                $i++;
            }
            foreach($libro as $lib):
            echo "<tr>";
            echo "<td>".$lib[0]."</td>";
            echo "<td>".$lib[1]."</td>";
            echo "<td>".$lib[2]."</td>"; 
            echo "<td>".$lib[3]."</td>";
            echo "<td>".$lib[4]."</td>";
            echo "</tr>";
            endforeach;}
            mysqli_close($link);
            ?>
        </table>
    </body>
</html>
