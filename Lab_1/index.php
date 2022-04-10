<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Lab_1</title>
    </head>
    <body>
        <?php
            echo "<h2>Pierwszy skrypt PHP</h2>";
        $x = 13.232323;
        $y = 123;
        echo "$x " . "$y ";
        echo "<br>";
        echo "$x " + "$y";
        echo "<br>";
        //echo '$x' + '$y';
        printf("Zaokraglenie %d", $x);
        echo "<br>";
        printf("Zaokraglenie do dwoch miejsc %.2f", $x);
        ?>
    </body>
</html>
