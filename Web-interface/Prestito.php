<?php 

    //IMPORTA LA CONNESSIONE DEL DATABASE
    include_once("config.php");

?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Inserimento</title>
        <link rel="stylesheet" href="css/retro.css">
        <link rel="stylesheet" href="css/mycss.css">
    </head>
    <body>
        <h1>Inserimento Prestito</h1>
        <p>Inserisci il prestito e clicca invia per confermare</p>
        <form action="Prestito.php" method="post">
            <fieldset>
                <label>Matricola utente</label>
                <input type="number"  name="MATRICOLA">
            </fieldset>
            <fieldset>
                <label>Codice libro</label>
                <input type="number" name="COD_LIBRO">
            </fieldset>
            <fieldset>
                <label>Data prestito</label>
                <input type="date" name="DATA_PRESTITO"  placeholder="AAAA/MM/GG">
            </fieldset>
            <input type="submit" value="invia">
        </form>
    </body>
</html>

<?php 

    //AGGIUNGERE L'INSERIMENTO DEL NUOVO PRESTITO A LIVELLO GRAFICO

    //CONTROLLO CHE I VALORI INIVIATI NON SIANO NULLI
    //if $var != NULL CONTROLLO CHE LA VARIABILE NON SIA NULLA


    //INTERROGAZIONI (QUERY)


    try{
        $MATRICOLA = $_POST['MATRICOLA'];
        $COD_LIBRO = $_POST['COD_LIBRO'];
        $DATA_PRESTITO = $_POST["DATA_PRESTITO"];
    }catch(mysqli_sql_exception $e) {
        echo("Errore per Authors.csv: " . $e->getMessage());
    }
    


    //INTERROGAZIONI (QUERY)
    try{
        $sql = "INSERT INTO PRESTITO (MATRICOLA, COD_LIBRO, DATA_PRESTITO) VALUES ( '$MATRICOLA', '$COD_LIBRO', '$DATA_PRESTITO')";

        $query= mysqli_query($link, $sql);
    }catch(mysqli_sql_exception $e) {
        echo("Errore...". $e->getMessage());
    }

    mysqli_close($link);


?>