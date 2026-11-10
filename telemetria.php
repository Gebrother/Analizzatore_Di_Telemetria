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
</body>
</html>