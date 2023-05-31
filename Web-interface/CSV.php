<?php
include_once("config.php");
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>CSV</title>
        <link rel="stylesheet" href="css/retro.css">
        <link rel="stylesheet" href="css/mycss.css">
    </head>
    <body>
        <h1>Inserimento dei CSV</h1>
        <br>
        <p>Inserimento del file Authors.csv:</p><br>
        <?php
        //open file autori.csv
        $filename = '../20-21/Author.csv';
        $file=fopen($filename,'r');
        while(($row = fgetcsv($file, 1000, ",")) != FALSE){
            $sql = "INSERT INTO AUTORE VALUES('$row[0]', '$row[1]', '$row[2]', '$row[3]', '$row[4]')";
            $query = mysqli_query($link,$sql);
            if (!$query) {
                echo "Si è verificato un errore: " . mysqli_error($link);
                exit;
            }
        }
        echo "E' stato inserito correttamente. <br>";
        ?>
        <br>
        <p>Inserimento del file Library_Branch.csv:</p><br>
        <?php
        //open file Library_Branch.csv
        $filename = '../20-21/Library_Branch.csv';
        $file = fopen($filename,'r');
        while(($row = fgetcsv($file, 1000, ",")) != FALSE){
            $row[2] = str_replace("'", "\'", $row[2]);
            $sql = "INSERT INTO SUCCURSALE VALUES('$row[0]', '$row[1]', '$row[2]', '$row[3]', '$row[4]', '$row[5]')";

            $query = mysqli_query($link,$sql);
            if (!$query) {
                echo "Si è verificato un errore: " . mysqli_error($link);
                exit;
            }
        }
        echo "E' stato inserito correttamente.<br>";
        ?>
        <br>
        <p>Inserimento del file Books.csv:</p><br>
        <?php
        //open file Books.csv
        $filename = '../20-21/Book.csv';
        $file = fopen($filename, 'r');
        while(($row = fgetcsv($file, 1000, ",")) != FALSE){
            $sql = "INSERT INTO LIBRO VALUES('$row[0]', '$row[1]', '$row[2]', '$row[3]', '$row[4]', '$row[5]')";

            $query = mysqli_query($link,$sql);
            if (!$query) {
                echo "Si è verificato un errore: " . mysqli_error($link);
                exit;
            }
        }
        echo "E' stato inserito correttamente.<br>";
        ?>
        <br>
        <p>Inserimento del file Book_Authors.csv:</p><br>
        <?php
        //open file Book_Authors.csv
        $filename = '../20-21/Book_Authors.csv';
        while(($row = fgetcsv($file, 1000, ",")) !== FALSE){
            $sql = "INSERT INTO BOOK_AUTHORS VALUES('$row[0]', '$row[1]', '$row[2]')";
            $query = mysqli_query($link,$sql);
            if (!$query) {
                echo "Si è verificato un errore: " . mysqli_error($link);
                exit;
            }
        }
        echo "E' stato inserito correttamente.<br>";
        ?>
        <br>
        <a href="./index.php">Home</a>
    </body>
</html>
<?php
mysqli_close($link);
?>