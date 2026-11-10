<?php
    $ping_grezzi = [45, 120, -1, 32, 210, 85, -1, 18, 95, 310, 45, 60, -1, 150, 28, 240, 18, 72];

    $ping_grezzi[] = 55;
    $ping_grezzi[] = 190;
    $ping_grezzi[] = 12;



    $ping_validi = [];
    $pacchetti_persi = 0;

    foreach ($ping_grezzi as $valori ){
        if($valori == -1){
            $pacchetti_persi++;
        }
        else{
            $ping_validi[] = $valori;
        }
    }

    $somma = 0;
    $media = 0;
    $cont = 0;

    $max = $ping_validi[0];
    $min = $ping_validi[0];

    foreach ($ping_validi as $valori){
        $somma += $valori;
        $cont++;

        if($max < $valori){
            $max = $valori;
        }

        if($min > $valori){
            $min = $valori;
        }


    }

    $media = $somma/$cont;

    $ping_critici = [];

    foreach($ping_validi as $valori){
        if($valori >= 150){
            $ping_critici[] = $valori;
        }
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Pachetti Persi <?php echo($pacchetti_persi) ?></h1>

    <ul>
        <?php foreach ($ping_validi as $valori ): ?>
            <li><?php echo($valori); ?></li>
        <?php endforeach; ?> 
    </ul>

    <h2>La media è: <?php echo(round($media, 2)) ?></h2>
    <h2>Il massimo è: <?php echo($max) ?></h2>
    <h2>Il minimo è: <?php echo($min) ?></h2>
    
    <h3>Pacchetti Critici</h3>
    <ul>
        <?php foreach ($ping_critici as $valori ): ?>
            <li><?php echo($valori); ?></li>
        <?php endforeach; ?> 
    </ul>


</body>
</html>