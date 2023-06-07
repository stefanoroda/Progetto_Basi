<html>
    <head>
        <meta charset="UTF-8">
        <title>Statistiche</title>
    </head>
    <body>
        <h1>Statistiche</h1>
        <form action="Statistica.php" method="post">
            <fieldset>
                <label>Numero di libri pubblicati in un determinato anno.</label>
                <input type="number" name="ANNO">
            </fieldset>
            <br>
            <fieldset>
                <label>Numero di prestiti effettuati in una determinata succursale</label>
                <input type="number" name="SUCCURSALE">
            </fieldset>
            <fieldset>
                <label>Numero di libri pubblicati per autore</label>
            </fieldset>
            <input type="submit" value="Invia">
        </form>
        <br>
        <a href="../index.html">Home</a>
        <br>
        <?php
            if($_POST!=null){
                $ANNO=$_POST['ANNO'];
                $SUCCURSALE=$_POST['SUCCURSALE'];
                try{
                    $sql = "SELECT * FROM LIBRO WHERE TITOLO LIKE '%$TITOL%'";
                    
    
    
                    $query = mysqli_query($link, $sql);
                    
    
                }catch(mysqli_sql_exception $e){
                    echo "Error: " . $e->getMessage();
                }
    
            }
        ?>
    </body>
</html>