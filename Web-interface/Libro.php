<?php 

    //IMPORTA LA CONNESSIONE DEL DATABASE
    include_once("config.php");

    /*USE BIBLIOTECA;

SELECT *
FROM LIBRO
WHERE TITOLO LIKE '%%';*/

?>

<html>

    <head>
    
        <title>Pagina Libro</title>
        <!-- INSERIMENTO DELLO STILE GRAFICO -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">

    <head>

    <body>
        <!-- STAMPA INSERIMENTO -->

        <h1>Ricerca di un titolo</h1>
        <fieldset>
            <label>Inserire titolo:</label>
            <input type="text" name="TITOLO">
        </fieldset>

    </body>
</html>


<?php

$TITOLO   = $_POST['TITOLO'];

try{
    $sql = "SELECT * FROM LIBRO WHERE  LIKE '%TITOLO%'";
    if($sql == NULL){
        $sql = "SELECT * FROM LIBRO ";
    }


    $query = mysqli_query($link, $sql);
    

}catch(mysqli_sql_exception $e){
    echo "Error: " . $e->getMessage();
}

mysqli_close($link);




    





?>