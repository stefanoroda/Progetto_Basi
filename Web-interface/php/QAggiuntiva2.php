<html>
    <head>
        <meta charset="UTF-8">
        <title>QueryAg2</title>
        <link rel="stylesheet" href="../css/retro.css">
        <link rel="stylesheet" href="../css/mycss.css">
    </head>
    <body>
        <h1>Query aggiuntiva 2</h1>
        <p>Si visualizzano gli utenti che hanno effettuato un numero di prestiti per un dipartimento</p>
        <a href="../index.html">Home</a>
        <table>
            <tr>
                <th>Matricola</th>
                <th>Nome</th>
                <th>Cognome</th>
                <th>Dipartimento</th>
                <th>Conteggio Prestiti</th>
            </tr>
        <?php
            include_once("config.php");
            
            try {
                $sql="SELECT UTENTE.MATRICOLA, UTENTE.NOME, UTENTE.COGNOME, CONTEGGIO.DIPARTIMENTO,CONTEGGIO.CONTEGGIO
                FROM UTENTE
                 JOIN (
                    SELECT PRESTITO.MATRICOLA, SUCCURSALE.DIPARTIMENTO, COUNT(*) AS CONTEGGIO
                    FROM PRESTITO
                    JOIN LIBRO ON LIBRO.COD_LIBRO = PRESTITO.COD_LIBRO
                    JOIN SUCCURSALE ON LIBRO.COD_SUC = SUCCURSALE.COD_SUC
                    GROUP BY PRESTITO.MATRICOLA, SUCCURSALE.DIPARTIMENTO
                ) AS CONTEGGIO ON CONTEGGIO.MATRICOLA = UTENTE.MATRICOLA ORDER BY CONTEGGIO DESC";

                $query = mysqli_query($link, $sql);
            } catch (mysqli_sql_exception $e) {
                echo "Error: " . $e->getMessage();
            }
            $utente=array();
            $i=0;
            while($row= mysqli_fetch_array($query)){
                $utente[$i]= $row;
                $i++;
            }
            foreach($utente as $ut):
                echo "<tr>";
                echo "<td>".$ut[0]."</td>";
                echo "<td>".$ut[1]."</td>";
                echo "<td>".$ut[2]."</td>"; 
                echo "<td>".$ut[3]."</td>";
                echo "<td>".$ut[4]."</td>";
                echo "</tr>";
                endforeach;
                mysqli_close($link);
            ?>
        </table>   
    </body>
</html>