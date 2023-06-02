<?php 

    //IMPORTA LA CONNESSIONE DEL DATABASE
    include_once("config.php");



    //CONTROLLO CHE I VALORI INIVIATI NON SIANO NULLI
    //if $var != NULL CONTROLLO CHE LA VARIABILE NON SIA NULLA


    //INTERROGAZIONI (QUERY)


    try{
        $MATRICOLA = $_POST['MATRICOLA'];
        $COD_LIBRO = $_POST['COD_LIBRO'];
        $DATA_PRESTITO = $_POST["DATA_PRESTITO"];
    }catch(mysqli_sql_exception $e) {
        echo("Errore per Inserimento: " . $e->getMessage());
    }
    


    //INTERROGAZIONI (QUERY)
    try{
        $sql = "INSERT INTO PRESTITO (MATRICOLA, COD_LIBRO, DATA_PRESTITO) VALUES ( '$MATRICOLA', '$COD_LIBRO', '$DATA_PRESTITO')";

        $query= mysqli_query($link, $sql);
        echo "<h1>Inserimento andato a buon fine</h1>";
    }catch(mysqli_sql_exception $e) {
        echo("Errore...". $e->getMessage());
    }

    mysqli_close($link);
    header('Refresh: 3; URL=../html/Prestito.html');

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Inserimento</title>
        <link rel="stylesheet" href="../css/retro.css">
        <link rel="stylesheet" href="../css/mycss.css">
    </head>
    <body>
        
    </body>
</html>