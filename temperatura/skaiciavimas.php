<?php

$file = fopen("./temp.txt", "r");
$temperatura = array();

while (!feof($file)){
    $line = fgets($file);
    if (!empty($line)) {        //empty tikrina, kad nebūtų failas tuščias
        $temperatura[] = (float)$line;      //float tam, kad pakeistų skaičius iš string į numbers, nes min,max,avg kitaip neskaičiuos
    }
}
fclose($file);

$min_temp = min($temperatura);
$max_temp = max($temperatura);
$avg_temp = round(array_sum($temperatura) / count($temperatura), 2);


?>



<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="temperatura.css.">
</head>

<body>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navigacija</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../atlyginimas/atlyginimas.php">Atlyginimas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../lyginiainelyginiai/skaiciai.php">Lyginiai/Nelyginiai</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./temperatura.php">Temperatūra</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="wrapper">
    <div class="header">
        <h1>Temperatūra</h1>
        <p>Norėdami apskaičiuoti minimalią, maksimalią ir vidutinę temperatūras, turite įkelti failą su temperatūrų nuoskaitomis. </p>

        <form action="skaiciavimas.php" class="post" enctype="multipart/form-data">
            <input id="input" type="file" name="data"><br>
            <button name="send" class="btn btn-secondary mb-3">Apskaičiuoti</button>
            <h3 id="text">Rezultatas:</h3> <span id="span"><?="Minimali temperatūra: " . $min_temp . " laipsnis(-ių); <br>";?>
                                    <?="Maksimali temperatūra: " . $max_temp . " laipsnis(-ių); <br>";?>
                                        <?="Temperatūros vidurkis: " . $avg_temp . " laipsnis(-ių) <br>";?>
                            </span>
        </form>
    </div>
</div>

</body>
</html>
