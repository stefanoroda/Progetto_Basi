<?php
include_once("config.php");

//open file autori.csv
$filename = '../20-21/Author.csv';
$file=fopen($filename,'r');
while(($row = fgetcsv($file, 1000, ",")) != FALSE){
    print_r($row);
    $sql = "INSERT INTO AUTORE VALUES('$row[0]', '$row[1]', '$row[2]', '$row[3]', '$row[4]')";
    $query = mysqli_query($link,$sql);
     if (!$query) {
        echo "Si è verificato un errore: " . mysqli_error($link);
        exit;
    }

}


//open file Library_Branch.csv
$filename = '../20-21/Library_Branch.csv';
$file = fopen($filename,'r');
while(($row = fgetcsv($file, 1000, ",")) != FALSE){
    $row[2] = str_replace("'", "\'", $row[2]);
    $sql1 = "INSERT INTO SUCCURSALE VALUES('$row[0]', '$row[1]', '$row[2]', '$row[3]', '$row[4]', '$row[5]')";

    $query1 = mysqli_query($link,$sql1);
    if (!$query) {
        echo "Si è verificato un errore: " . mysqli_error($link);
        exit;
    }

}

//open file Books.csv
$filename = '../20-21/Book.csv';
$file = fopen($filename, 'r');
while(($row = fgetcsv($file, 1000, ",")) !== FALSE){
    $sql = "INSERT INTO LIBRO VALUES('$row[0]', '$row[1]', '$row[2]', '$row[3]', '$row[4]', '$row[5]')";
}

$query = mysqli_query($link,$sql);
if (!$query) {
    echo "Si è verificato un errore: " . mysqli_error($link);
    exit;
}

//open file Book_Authors.csv
$filename = '../20-21/Book_Authors.csv';
while(($row = fgetcsv($file, 1000, ",")) !== FALSE){
    $sql = "INSERT INTO BOOK_AUTHORS VALUES('$row[0]', '$row[1]', '$row[2]')";
}



$query = mysqli_query($link,$sql);
if (!$query) {
    echo "Si è verificato un errore: " . mysqli_error($link);
    exit;
}

mysqli_close($link);
?>