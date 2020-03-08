<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Qual é o lanche?</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='blue.css'>
    <link href="https://fonts.googleapis.com/css?family=Bebas+Neue|Sen&display=swap" rel="stylesheet">
    <meta name="theme-color" content="#1f2833">
</head>
<body>
    <header>
        <h1>QUAL É O LANCHE?</h1>
        <p>@ IFRN,SC</p>
        <!-- <button>Curiosos</button> -->
    </header>
    <main>
        <?php

            const CSV_URL = 'https://docs.google.com/spreadsheets/d/e/2PACX-1vSaWBRz6jILgQ5G1HHmE2psuTQhxXs4z9Js-sATSAfEVQsvYZWbOWy8Q5TAesRstHx2bBugW19jfWoh/pub?gid=1377027604&single=true&output=csv';

            function getCSV() {
                $file = fopen(CSV_URL, "r");
                $result = array();
                $i = 0;
                while (!feof($file)):
                if (substr(($result[$i] = fgets($file)), 0, 10) !== ';;;;;;;;') :
                    $i++;
                endif;
                endwhile;
                fclose($file);
                return $result;
            }
            
            $lanches = getCSV();

            foreach ($lanches as $lanche) {
                $lancheArray = explode(",", $lanche); // elimina nome da música

                echo "<section>";
                echo "<h2>".$lancheArray[0]."</h2>";
                echo "<p>".$lancheArray[1]."</p>";
                echo "<div class='status'>".$lancheArray[2]."</div>";
                echo "</section>";
            }
        ?>
    </main>
    <footer>© isaacmsl (2020)</footer>
</body>
</html>