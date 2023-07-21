<html>
    <head>
        <meta charset="UTF-8">
        <title>Ricerca Autore</title>
        <link rel="stylesheet" href="../css/retro.css">
        <link rel="stylesheet" href="../css/mycss.css">
    </head>
    <body>
        <h1>Ricerca Autore</h1>
        <form action="RAutore.php" method="post">

            <fieldset>
                <label>Inserisci il codice autore (anche parziale)</label>
                <input type="number" name="COD_AUTORE">
            </fieldset>

            <fieldset>
                <label>Inserisci il nome dell'autore (anche parziale)</label>
                <input type="text" name="NOME">
            </fieldset>

            <fieldset>
                <label>Inserisci il cognome dell'autore (anche parziale)</label>
                <input type="text" name="COGNOME">
            </fieldset>

            <fieldset>
                <label>Inserisci la data di nascita dell'autore (anche parziale)</label>
                <input type="date" name="DATA_NASCITA">
            </fieldset>

            <fieldset>
                <label>Inserisci il luogo di nascita (anche parziale)</label>
                <input type="text" name="LUOGO">
            </fieldset>
            <input type="submit" value="cerca">
        </form>

        <br><br>
        <a href="../index.html">Home</a>
        <?php
            include_once("config.php");
            if($_POST!=null){
                $COD_AUTORE=$_POST['COD_AUTORE'];
                $NOME=$_POST['NOME'];
                $COGNOME=$_POST['COGNOME'];
                $DATA_NASCITA=$_POST['DATA_NASCITA'];
                $LUOGO=$_POST['LUOGO'];

                $sql="SELECT * 
                FROM AUTORE
                WHERE COD_AUTORE LIKE '%$COD_AUTORE%'
                AND NOME LIKE '%$NOME%'
                AND COGNOME LIKE '%$COGNOME%'
                AND DATA_NASCITA LIKE '%$DATA_NASCITA%'
                AND LUOGO_NASCITA LIKE '%$LUOGO%'";
            }
            else
                $sql="SELECT *
                FROM AUTORE";
            try{
                $query = mysqli_query($link, $sql);
            }catch(mysqli_sql_exception $e){
                echo "Error: " . $e->getMessage();
            }
            $autore=array();
            $i=0;
            while($row= mysqli_fetch_array($query)){
                $autore[$i]= $row;
                $i++;
            }
            echo "<table>
            <tr>
            <th>Codice autore</th>
            <th>Nome</th>
            <th>Cognome</th>
            <th>Data Nascita</th>
            <th>Luogo Nascita</th>
            </tr>";
            foreach($autore as $aut):
                echo"<tr>";
                echo "<td>$aut[0]</td>";
                echo "<td>$aut[1]</td>";
                echo "<td>$aut[2]</td>";
                echo "<td>$aut[3]</td>";
                echo "<td>$aut[4]</td>";
                echo "</tr>";
            endforeach;
            echo "</table>";
            mysqli_close($link);
        ?>
    </body>
</html>