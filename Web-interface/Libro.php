<?php 

    //IMPORTA LA CONNESSIONE DEL DATABASE
    include_once("config.php");

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
        <form method="post" action="Libro.php">
            <fieldset>
                <label>Inserire titolo:</label>
                <input type="text" name="TITOLO">
            </fieldset>
            <input type="submit" value="invio"> 
        </form>
        
    </body>
</html>


<?php

$TITOLO   = $_POST['TITOLO'];

try{
    $sql = "SELECT * FROM LIBRO WHERE TITOLO LIKE '%TITOLO%'";
    


    $query = mysqli_query($link, $sql);
    

}catch(mysqli_sql_exception $e){
    echo "Error: " . $e->getMessage();
}

mysqli_close($link);




    





?>