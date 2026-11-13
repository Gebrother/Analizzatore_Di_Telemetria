<?php 
    
    $ping_grezzi = [45, 120, -1, 32, 210, 85, -1, 18, 95, 310, 45, 60, -1, 150, 28, 240, 18, 72];
    
    array_push($ping_grezzi, 55, 190, 12);

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

    $ping_max = $ping_validi[0];
    $ping_min = $ping_validi[0];

    foreach ($ping_validi as $valori){
        $somma += $valori;
        $cont++;

        if($ping_max < $valori){
            $ping_max = $valori;
        }

        if($ping_min > $valori){
            $ping_min = $valori;
        }


    }

    $media = $somma/$cont;

    $ping_critici = [];

    foreach($ping_validi as $valori){
        if($valori >= 150){
            $ping_critici[] = $valori;
        }
    }

    $ping_unici = array_unique($ping_validi);
    
    $ping_ordinati = $ping_unici;

    sort($ping_ordinati);

    $top_3_veloci = array_slice($ping_ordinati, 0, 3);

    $controllo_100ms = "";

    if(in_array(100, $ping_ordinati)) {
        $controllo_100ms = "Si" ;

    }
    else{
        $controllo_100ms = "No";
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
    <ul>
        <li>Totale Rilevazione: <?= (count($ping_grezzi)); ?></li>
        <li>Pacchetti validi: <?= count($ping_validi)?></li>
        <li>Pacchetti Persi: <?= $pacchetti_persi ?> </li>
        <li>Media: <?= round($media, 2 ) ?></li>
        <li>Minimo: <?= $ping_min ?></li>
        <li>Massimo: <?= $ping_max ?></li>
    </ul>

</body>
</html>