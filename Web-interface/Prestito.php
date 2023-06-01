<?php 

    //IMPORTA LA CONNESSIONE DEL DATABASE
    include_once("config.php");
    //CONTROLLO CHE I VALORI INIVIATI NON SIANO NULLI
    try{
        $DATA_PRESTITO = $_POST['DATA_PRESTITO'];
        $MATRICOLA = $_POST['MATRICOLA'];
        $COD_LIBRO = $_POST['COD_LIBRO'];
    }catch(mysqli_sql_exception $e) {
        echo("Errore per Authors.csv: " . $e->getMessage());
    }
    


    //INTERROGAZIONI (QUERY)
    $sql = 

?>

<html>

    <head>
    
        <title>Pagina Prestito</title>
        <!-- INSERIMENTO DELLO STILE GRAFICO -->
        <link rel="stylesheet" href="css/retro.css">
        <link rel="stylesheet" href="css/mycss.css">
        

    <head>

    <body>
        <!-- STAMPA INSERIMENTO -->

    </body>
</html>

<?php 

    //AGGIUNGERE L'INSERIMENTO DEL NUOVO PRESTITO A LIVELLO GRAFICO

    //CONTROLLO CHE I VALORI INIVIATI NON SIANO NULLI
    //if $var != NULL CONTROLLO CHE LA VARIABILE NON SIA NULLA


    //INTERROGAZIONI (QUERY)


?>