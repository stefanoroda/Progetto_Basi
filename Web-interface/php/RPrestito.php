<html>
    <head>
        <meta charset="UTF-8">
        <title>Autori</title>
        <link rel="stylesheet" href="../css/retro.css">
        <link rel="stylesheet" href="../css/mycss.css">
    </head>
    <body>
        <h1>Ricerca Prestito</h1>
        <p></p>
        <?php
        echo "Today is " . date("Y-m-d") . "<br>";
        $DATA_OGGI=strtotime(date("Y-m-d"));
        $DATA_SCADENZA=strtotime("+30 days", $DATA_OGGI);
        echo date("Y-m-d", $DATA_SCADENZA);
        ?>
    </body>
</html>