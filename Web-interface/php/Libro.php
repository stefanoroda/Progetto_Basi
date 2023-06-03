<?php 

    //IMPORTA LA CONNESSIONE DEL DATABASE
    include_once("config.php");

?>

<html>

    <head>
    
        <title>Pagina Libro</title>
        <!-- INSERIMENTO DELLO STILE GRAFICO -->
        <link rel="stylesheet" href="../css/retro.css">
        <link rel="stylesheet" href="../css/mycss.css">
    <head>

    <body>
        <!-- STAMPA INSERIMENTO -->

        <h1>Ricerca titolo di un libro</h1>
        <form method="post" action="Libro.php">
            <fieldset>
                <label>Inserire titolo:</label>
                <input type="text" name="TITOL">
                <input type="submit" value="invio"> 
            </fieldset>
            
        </form>
        <a href="../index.html">Home</a>
        <br><br>
        <table>
    <thead>
        <tr>
            <th>Titolo</th>
            <th>ISBN</th>
            <th>Succursale</th>
        </tr>
        </thead>
        <tbody>
        <?php

            $TITOL   = $_POST['TITOL'];

            try{
                $sql = "SELECT * FROM LIBRO WHERE TITOLO LIKE '%$TITOL%'";
                


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
                echo"<tr>";
                echo "<td>$lib[1]</td>";
                echo "<td>$lib[2]</td>";
                echo "<td>$lib[3]</td>";
                echo "</tr>";
            endforeach;
            mysqli_close($link);


        ?>

    </tbody>
        </table>
    </body>
</html>


