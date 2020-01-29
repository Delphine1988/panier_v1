<?php

$a = 1;
$b = 5;

// calculer la somme

$s = $a + $b;
?>


<html>
    <head>
        <style>

    #somme{
        background : green;
        color: yellow;
        font-weight: bold;
    }
        </style>
    </head>
<body>
<!--- integration de variable php -->
    <div id="somme"> La somme de <?= $a;?> et <?= $b;?> = <?= $s;?></div>

</body>
</html>