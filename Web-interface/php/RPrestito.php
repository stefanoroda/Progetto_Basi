<html>
    <head>
        <meta charset="UTF-8">
        <title>Autori</title>
        <link rel="stylesheet" href="../css/retro.css">
        <link rel="stylesheet" href="../css/mycss.css">
    </head>
    <body>
        <h1>Ricerca Prestito</h1>
        <p>Ricerca dei prestiti effettuati in un range di date – nel caso in cui non vengano
            inserite date deve mostrare i prossimi in scadenza (quelli che scadranno in futuro)</p>
        <form action="RPrestito.php" method="POST">
            <fieldset>
                <label>Inserisci la prima data</label>
                <input type="date" name="DATA_1">
            </fieldset>
            <fieldset>
                <label>Inserisci la seconda data</label>
                <input type="date" name="DATA_2">
            </fieldset>
            <input type="submit" value="Cerca">
        </form>
        <br>
        <a href="../index.html">Home</a><br>
        <?php
        
        include_once("config.php");
        $query="";
        if($_POST != null){
        if(!isset($_POST['DATA_1']) || $_POST['DATA_1'] != '' ){
            $DATA1=$_POST['DATA_1'];
            $DATA2=$_POST['DATA_2'];
            try{
                $sql = "SELECT *
                FROM PRESTITO
                WHERE DATA_PRESTITO BETWEEN '$DATA1' AND '$DATA2'";
                


                $query = mysqli_query($link, $sql);
                

            }catch(mysqli_sql_exception $e){
                echo "Error1: " . $e->getMessage();
            }
        } else {
            echo "Today is " . date("Y-m-d") . "<br>";
            $DATA_OGGI=strtotime(date("Y-m-d"));
            $DATA_SCADENZA=strtotime("+30 days", $DATA_OGGI);
            echo "Date expiration is ".date("Y-m-d", $DATA_SCADENZA);

            try{
                $sql = "SELECT * 
                FROM PRESTITO
                WHERE DATA_PRESTITO<'".date("Y-m-d", $DATA_SCADENZA)."'";
                


                $query = mysqli_query($link, $sql);
                

            }catch(mysqli_sql_exception $e){
                echo "Error2: " . $e->getMessage();
            }
        }
        $PRESTITO=array();
            $i=0;
            while($row=mysqli_fetch_array($query)){
                $PRESTITO[$i]=$row;
                $i++;
            }
            echo "<table>
            <tr>
            <th>Codice prestito</th>
            <th>Data prestito</th>
            <th>Matricola</th>
            <th>Codice libro</th>
            </tr>";
            foreach($PRESTITO as $PRE):
                echo "<tr><th>".$PRE[0]."</th>";
                echo "<th>".$PRE[1]."</th>";
                echo "<th>".$PRE[2]."</th>";
                echo "<th>".$PRE[3]."</th></tr>";
            endforeach;
            echo "</table>";
    }
        

        mysqli_close($link);
        ?>
    </body>
</html>