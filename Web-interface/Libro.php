<?php 

    //IMPORTA LA CONNESSIONE DEL DATABASE
    include_once("config.php");

?>

<html>

    <head>
    
        <title>Pagina Libro</title>
        <!-- INSERIMENTO DELLO STILE GRAFICO -->
        <link rel="stylesheet" href="css/retro.css">
        <link rel="stylesheet" href="css/mycss.css">
    <head>

    <body>
        <!-- STAMPA INSERIMENTO -->

        <h1>Ricerca di un titolo</h1>
        <form method="post" action="Libro.php">
            <fieldset>
                <label>Inserire titolo:</label>
                <input type="text" name="TITOL">
            </fieldset>
            <input type="submit" value="invio"> 
        </form>
        
    </body>
</html>


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

foreach($libro):
    echo $libro
    echo $libro[1];
    echo $libro[2];
    echo $libro[3];

mysqli_close($link);




    





?>