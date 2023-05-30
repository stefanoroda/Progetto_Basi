<?php
//open file autori.csv
$filename = '../20-21/Author.csv';
$file=fopen($filename,'r');
while(($row = fgetcsv($file, 1000, ",")) !== FALSE){
    print_r($row);
    $sql = "INSERT INTO AUTORI VALUES('$row[0]', '$row[1]', '$row[2]', '$row[3]', '$row[4]')";
}

//open file Library_Branch.csv
$filename = '../20-21/Library_Branch.csv';
$file = fopen($filename,'r');
while(($row = fgetcsv($file, 1000, ",")) !== FALSE){
    $sql = "INSERT INTO SUCCURSALE VALUES('$row[0]', '$row[1]', '$row[2]', '$row[3]', '$row[4]'), '$row[5]')";
}

//open file Books.csv
$filename = '../20-21/Book.csv';
$file = fopen($filename, 'r');
while(($row = fgetcsv($file, 1000, ",")) !== FALSE){
    $sql = "INSERT INTO LIBRO VALUES('$row[0]', '$row[1]', '$row[2]', '$row[3]', '$row[4]'), '$row[5]')";
}

//open file Book_Authors.csv
$filename = '../20-21/Book_Authors.csv';
while(($row = fgetcsv($file, 1000, ",")) !== FALSE){
    $sql = "INSERT INTO LIBRO VALUES('$row[0]', '$row[1]', '$row[2]')";
}
?>